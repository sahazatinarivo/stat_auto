<?php

namespace App\Http\Controllers;

use App\StPages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
	public function addLink(Request $request){
		// Session::put("prenom","onja");
		return view("Link/addLink"); 
	}

	public function listLink(){
		$pages = StPages::selectPg(3);
		// echo Session::get('prenom');
		return view("Link/listLink")->with('page',$pages); 
	}

	public function savePage(Request $request){
		$parameters= $request->except(['_token']);

		// var_dump($parameters);
		$pages = new StPages();
		$col = DB::getSchemaBuilder()->getColumnListing("st_pages");

		$date = new \Datetime();
		$pages->slug =  Str::slug($parameters['nom_page'].$date->format('Ydmhis'));
		
		for ($i= 1; $i < count($col)-3; $i++) { 
			$pages->{$col[$i]} =  $parameters[$col[$i]];
		}

		$pages->save();
		// foreach ($variable as $key => $value) {
		// 	# code...
		// }
		// var_dump($pages);
		// $date = new \Datetime();
		// $pages->nom_page =  $parameters['nom_page'];
		// $pages->etat =  $parameters['etat'];
		// $pages->slug =  Str::slug($parameters['nom_page'].$date->format('Ydmhis'));
		// $pages->save();

		return redirect()->route('listLink')->with('message',"<strong>Success!</strong> Indicates a successful or positive action.");
	}

	public function allJson(){
		$personne = [
			["nom" => "sahaza"],
			["prenom" => "tinarivo"],
			["age" => "22ans"]
		];
		return response()->json($personne);
	}

	public function detailPg($slug){
		$page =  StPages::where("slug","=",$slug)->first();
		return view("Link/detail")->with('page',$page); 
	}

	public function deletePg($slug){
		$page = StPages::where('slug','=',$slug)->first();
		$page->delete();
		return redirect()->route('listLink')->with('message','remove ok');
	}

	public function editePg(Request $request, $slug){
		$page = StPages::where('slug','=',$slug)->first();
		
		if ($request->isMethod('post')) {
			$parameters = $request->except(['_token']);

			$date = new \Datetime();
			$page->nom_page =  $parameters['nom_page'];
			$page->etat =  $parameters['etat'];
			$page->slug =  Str::slug($parameters['nom_page'].$date->format('Ydmhis'));
			$page->save();

			return redirect()->route('listLink')->with('message','modification ok');
		}

		return view('Link/addLink')->with('page',$page);
	}
}
