<?php

namespace App\Http\Controllers;

use App\StOperateur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
	public function login(){
		return view("login"); 
	}

	public function connecter(Request $request){
		$parameters= $request->except(['_token']);
		$user = $parameters['email_operateur'];
		$pdps = md5($parameters['password_operateur']);

		$oPer = DB::table('st_operateur')->where('mail','=',$user)->first();
		if (is_object($oPer)) {
			$oPer = DB::table('st_operateur')->where('mail','=',$user)->where('mdpss','=',$pdps)->first();
			if (is_object($oPer)) {
				Session::put('id_user', $oPer->id);
				Session::put('nom_user', $oPer->nom);
				Session::put('saisie_user', $oPer->saisie);	
				return redirect()->route('accueil');			
			}else{
				return redirect()->route('login')->with('error','mot de passe incorrect');
			}
		}else{
			return redirect()->route('login')->with('error','Nom d\'utilisateur invalide');
		}
	}

	public function logout(){
		Session::flush();
		return redirect()->route('login');
	}
}
