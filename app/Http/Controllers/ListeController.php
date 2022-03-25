<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Liste;
use App\StThemes;
use App\Mask;
use App\Installs;

class ListeController extends Controller
{
    public function liste(){
        if (session()->get("saisie_user") == null){ return redirect()->route('login'); };
    	$data = array();
    	$data["liste"] = Liste::findListe();
    	$data['colnn'] = Liste::colonne();

        $data['logo_1'] = DB::table('st_themes')->where('nom_params','=','params_logo_1')->get();
        $data['logo_2'] = DB::table('st_themes')->where('nom_params','=','params_logo_2')->get();
        $data['blocks'] = DB::table('st_themes')->where('nom_params','=','params_blocks')->get();
        $data['dscrpt'] = DB::table('st_themes')->where('nom_params','=','params_description')->get();
        $data['header'] = DB::table('st_themes')->where('nom_params','=','params_head')->get();

    	return view("content/liste_evalue",$data);
    }

    public function searche(){
        if (session()->get("saisie_user") == null){ return redirect()->route('login'); };
    	$cleRch = isset($_POST['cle']) ? $_POST['cle'] : null;
        $minPge = Mask::minPage();
    	$cActiv = Liste::colonne_active();
    	$data['colnn'] = Liste::colonne();
    	$data['liste'] = Liste::searche($cActiv,$cleRch);
    	$data['clesr'] = $cleRch;
        $data['iPges'] = Mask::pgById($minPge);
        
    	return view("blocks/liste",$data);
    }
}
