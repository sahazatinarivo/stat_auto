<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Liste extends Model
{
    public static function findListe(){
    	$sQl = DB::table('st_liste_evalue')
    					->get();

    	return $sQl;
    }

    public static function colonne(){
    	$sQl = DB::select('DESCRIBE st_liste_evalue');
    	
    	return $sQl;
    }

    public static function colonne_active(){
        $sQl = DB::table('st_recherche')
               ->where("id_cle","=",1)
               ->get();

        $colonne = "";
        foreach ($sQl as $sQls => $s) {
            $colonne = $s->colonne;
        }
        return $colonne;
    }

    public static function searche($field,$value){
        $sQl = DB::table('st_liste_evalue')
               ->where($field, 'like', '%'.$value.'%')
               ->get();
        
        return $sQl;
    }
}
