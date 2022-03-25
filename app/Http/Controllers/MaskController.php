<?php

namespace App\Http\Controllers;

use App\StPages;
use App\StDatasUns;
use App\StDatasDeuxs;
use App\StThemes;
use App\StPageActive;
use App\Mask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class MaskController extends Controller
{
    public function mask(){
        if (session()->get("saisie_user") == null){ return redirect()->route('login'); };
    	$sPge = isset($_GET['nmpg']) ? $_GET['nmpg']:1;
        $pers = isset($_GET['pers']) ? $_GET['pers']:1;
        $idps = Mask::getBySlug($pers);
        $nmpg = Mask::pgBySlug($sPge);
        $cPag = Mask::maxPage();
        $pges = StPages::All();
        $pPag = 0; $sPag = 0;
        $saisie = session()->get("saisie_user");
        $eSasie = $saisie == "uns" ? 1 : 2;
        /*Enregister tous les page dans table page_active*/
        foreach ($pges as $pge => $p) {
            $tstAct = Mask::siSaveEtat($idps,$p->id);
            if (count($tstAct) == 0) {
                $etatPg = new StPageActive();
                $etatPg->id_liste = $idps;
                $etatPg->page = $p->id;
                $etatPg->etat_active_{$eSasie};

                $etatPg->save();
            }
        }

        /*Activer la page precedent*/
        if ($nmpg !== 0) {
            $sPag = $nmpg + 1;
            if ($nmpg > 1) {
                $pPag = $nmpg - 1;
                Mask::activerPg((int)$idps,$pPag,$saisie);
            }else{
                $pPag = $nmpg;
            }
        }else{
            Mask::activerPg((int)$idps,$cPag,$saisie);
            return redirect()->route('liste');
        }

    	$data["mask"] = Mask::maskAll($nmpg);
    	$data["page"] = Mask::getPages($idps);
        $data['pers'] = $pers; $data['getp'] = $nmpg;
        $data['sPag'] = Mask::pgById($sPag); 
        $data['pPag'] = Mask::pgById($pPag);

        $data['logo_1'] = DB::table('st_themes')->where('nom_params','=','params_logo_1')->get();
        $data['logo_2'] = DB::table('st_themes')->where('nom_params','=','params_logo_2')->get();
        $data['blocks'] = DB::table('st_themes')->where('nom_params','=','params_blocks')->get();
        $data['dscrpt'] = DB::table('st_themes')->where('nom_params','=','params_description')->get();
        $data['header'] = DB::table('st_themes')->where('nom_params','=','params_head')->get();

    	return view("content/mask",$data);
    }

    public function save_donne(){
        if (session()->get("saisie_user") == null){ return redirect()->route('login'); };
        $saisie = session()->get("saisie_user");
        $pers = isset($_POST['sPers']) ? $_POST['sPers']: "0";
    	$iChp = isset($_POST["ival"]) ? $_POST["ival"] : "0";
        $prms = Mask::getParamsStock();
		$ifEx = Mask::getDataByPers(Mask::getBySlug($pers),$iChp["ligne"],$saisie);
        $data = null;
        if (count($ifEx) > 0) {
            $idprs = Mask::getBySlug($pers);
            if ($saisie == "uns") {
                $data = StDatasUns::where("id_liste","=",$idprs)->where("quest","=",$iChp["ligne"])->first();
            }else{
                $data = StDatasDeuxs::where("id_liste","=",$idprs)->where("quest","=",$iChp["ligne"])->first();
            }
            
        }else{
            if ($saisie == "uns") {
                $data = new StDatasUns();
            }else{
                $data = new StDatasDeuxs();
            }
        }

        $data['id_liste'] = Mask::getBySlug($pers);
		$data['quest'] = $iChp["ligne"];
    	foreach ($prms as $paramse => $p) {
            $data[$p->champ] = $iChp[strtolower(str_replace(" ","_",str_replace("'","_",$p->value)))];
    	}
        $data["user_save"] = session()->get("id_user");
        $data["user_update"] = session()->get("id_user");
        $data->save();
    }

    public function recup_donne(){
        if (session()->get("saisie_user") == null){ return redirect()->route('login'); };
        $saisie = session()->get("saisie_user");
        $pers = isset($_POST['sPers']) ? $_POST['sPers']: "";
        $iChp = isset($_POST["ival"]) ? $_POST["ival"] : "";
        $ifEx = Mask::getDataByPers(Mask::getBySlug($pers),$iChp["ligne"],$saisie);
        
        $data["colonne"] = Mask::getParamsStock();
        $data['count'] = count($ifEx);
        if (count($ifEx) > 0) {
            $idprs = Mask::getBySlug($pers);
            $data['value'] = Mask::getDataByPers($idprs,$iChp["ligne"],$saisie);
        }
        return response()->json($data);
    }
}
