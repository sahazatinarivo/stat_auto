<?php
namespace App\Http\Controllers;

use App\StPages;
use App\StThemes;
use App\Installs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
    public function index(){
    	if (session()->get("saisie_user") == null){ return redirect()->route('login'); };
    	$data['logo_1'] = DB::table('st_themes')->where('nom_params','=','params_logo_1')->get();
    	$data['logo_2'] = DB::table('st_themes')->where('nom_params','=','params_logo_2')->get();
    	$data['blocks'] = DB::table('st_themes')->where('nom_params','=','params_blocks')->get();
    	$data['dscrpt'] = DB::table('st_themes')->where('nom_params','=','params_description')->get();
    	$data['header'] = DB::table('st_themes')->where('nom_params','=','params_head')->get();
    	return view("content/accueil",$data);
    }
}
