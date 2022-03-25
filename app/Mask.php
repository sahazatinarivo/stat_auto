<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mask extends Model
{
    public static function maskAll($idPg){
    	$sQl = DB::table('st_code_html')
    				->where('id_page','=',$idPg)
    				->orderBy('st_code_html.ordre')
    				->get();

    	return $sQl;
    }

    public static function getBySlug($slug){
        $sQl  = DB::table("st_liste_evalue")
                        ->where("slug","=",$slug)
                        ->get();
        $idPrs = 0;
        foreach ($sQl as $sQls => $s) {
            $idPrs = (int)$s->id;
        }
        return $idPrs;
    }

    public static function pgById($id){
        $sQl  = DB::table("st_pages")
                        ->where("id","=",$id)
                        ->get();
        $slgPg = "";
        foreach ($sQl as $sQls => $s) {
            $slgPg = $s->slug;
        }
        return $slgPg;
    }

    public static function pgBySlug($slug){
        $sQl  = DB::table("st_pages")
                        ->where("slug","=",$slug)
                        ->get();
        $idPg = 0;
        foreach ($sQl as $sQls => $s) {
            $idPg = (int)$s->id;
        }
        return $idPg;
    }

    public static function insertData($data){
        $sQl = DB::table('st_datas_uns')
        			->insert($data);

        return $sQl;
    }

    public static function maxPage(){
        $sQl = DB::select("select MAX(id) as max from st_pages");
        $max = 0;
        foreach ($sQl as $sQls => $s) {
            $max = $s->max;            
        }
        return $max;
    }

    public static function minPage(){
        $sQl = DB::select("select MIN(id) as min from st_pages");
        $min = 0;
        foreach ($sQl as $sQls => $s) {
            $min = $s->min;            
        }
        return $min;
    }

    public static function plusActPage($w_1,$saisie){
        $sQl1 = "SELECT p.id as id FROM st_page_actives a
                           INNER JOIN st_pages p ON a.page=p.id
                           WHERE a.id_liste=$w_1
                           AND a.etat_active_$saisie=1";

        $sQl2 = DB::select("SELECT MAX(id) as plusAct FROM ($sQl1) as st_page_actives");

        return $sQl2;
    }

    public static function activerPg($w_1,$w_2,$saisie){
        $sQl = DB::select("UPDATE st_page_actives 
                           SET etat_active_$saisie=1 
                           WHERE id_liste=$w_1 
                           AND page=$w_2");

        return $sQl;
    }

    public static function getPages($w){
        $sQl = DB::select("SELECT * FROM st_page_actives a
                           INNER JOIN st_pages p ON a.page=p.id
                           WHERE a.id_liste=$w");

        return $sQl;
    }

    public static function updateData($data,$where){
        $sQl = DB::table('st_datas_uns')
                    ->update($data)
                    ->where('quest','=',$where);

        return $sQl;
    }

    public static function getParamsStock(){
        $sQl = "SELECT 
                    p.champ as champ,
                    c.nom_champ as value 
                FROM st_params_stock p
                INNER JOIN st_champs_block c
                ON p.value=c.id";

    	$query = DB::select($sQl);
    	return $query;
    }

    public static function paramsByChamp($value){
    	$sQl = DB::table('st_params_stock')
    				->where('value','=',$value)
					->get();

    	return $sQl;
    }

    public static function siSaveEtat($liste,$page){
        $sQl = DB::table('st_page_actives')
                    ->where('id_liste','=',$liste)
                    ->where('page',$page)
                    ->get();

        return $sQl;
    }

    public static function counIfPageActive($liste,$saisie){
        $sQl = DB::table('st_page_actives')
                    ->where('id_liste','=',$liste)
                    ->where('etat_active_$saisie','=',1)
                    ->get();

        return count($sQl);
    }

    public static function ifPageActive($liste,$page,$saisie){
        $sQl = DB::table('st_page_actives')
                    ->where('id_liste','=',$liste)
                    ->where('page','=',$page)
                    ->where('etat_active_$saisie','=',1)
                    ->get();
        $etat = 0;
        foreach ($sQl as $sQls => $s) {
            $etat = (int)$s->etat_active_{$saisie};
        }

        return $etat;
    }

    public static function getDataByPers($liste,$quest,$saisie){
        $sQl = DB::table('st_datas_'.$saisie.'')
                    ->where('id_liste','=',$liste)
                    ->where('quest','=',$quest)
                    ->get();

        return $sQl;
    }
}
