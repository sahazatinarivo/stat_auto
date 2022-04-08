<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excels extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->dbforge();
	}

	public function findAll($_table){
		$sQl = $this->db->from("st_".$_table)
					    ->get()->result();
		return $sQl;
	}

	public function distQest(){
		$sQl = "SELECT DISTINCT(quest) as lgne FROM st_datas_1s";
		return $this->db->query($sQl)->result();
	}

	public function getCountQst($cln,$note,$quest){
		$sQl = $this->db->select('COUNT(quest) as nbrQst')
						->from('st_datas_1s')
						->where($cln,$note)
						->where('quest',$quest)
						->get()->result();
		$nbrQst = 0;
		foreach ($sQl as $sQls => $s) {
			$nbrQst = (int)$s->nbrQst;
		}
		return $nbrQst;
	}

	public function getCnQst($quest){
		$sQl = $this->db->select('COUNT(quest) as nbrQst')
						->from('st_datas_1s')
						->where('quest',$quest)
						->get()->result();
		$nbrQst = 0;
		foreach ($sQl as $sQls => $s) {
			$nbrQst = (int)$s->nbrQst;
		}
		return $nbrQst;
	}

	public function getColonneStat($cLn){
		$sQl = $this->db->select('DISTINCT('.$cLn.')')
						->from('st_datas_1s')
						->order_by($cLn,'ASC')
						->get()->result();

		return $sQl;
	}

	public function distIdliste(){
		$sQl = "SELECT DISTINCT(id_liste) as id_liste FROM st_datas_1s";
		return $this->db->query($sQl)->result();
	}

	public function queryExport($Qst,$cLnn,$lst,$clnAct){
		$sQl = "SELECT
				DISTINCT(l.id), l.$clnAct as nom";

				foreach ($Qst as $Qsts => $q) {
					$sQl .=	",SUM(IF(d.quest = '".str_replace("'","_",$q->lgne)."', d.".$cLnn.",0)) as '".str_replace("'","_",$q->lgne)."'";
				}
				
		$sQl .= " FROM
				st_liste_evalue l
				INNER JOIN st_datas_1s d
				ON l.id = d.id_liste GROUP BY d.id_liste";
		return $this->db->query($sQl)->result();
	}

	public function queryExports($Qst,$cLnn,$lst,$clnAct){
		$sQl = "SELECT
				DISTINCT(l.id), l.$clnAct as nom";

				foreach ($Qst as $Qsts => $q) {
					$sQl .=	",GROUP_CONCAT(IF(d.quest = '".str_replace("'","_",$q->lgne)."', d.".$cLnn.",0)) as '".str_replace("'","_",$q->lgne)."'";
				}
				
		$sQl .= " FROM
				st_liste_evalue l
				INNER JOIN st_datas_1s d
				ON l.id = d.id_liste GROUP BY d.id_liste";
		return $this->db->query($sQl)->result();
	}

	public function findLimite($_table,$dep){
		$sQl = $this->db->from("st_".$_table)
						->limit('100',$dep)
					    ->get()->result();
		return $sQl;
	}

	public function import_data($data){
		$res = $this->db->insert_batch("st_liste_evalue",$data);

		if($res){
            return TRUE;
        }else{
            return FALSE;
        }
	}

	public function findBy($_t,$_c,$_v){
		$sQl = $this->db->from("st_".$_table)
						->where($_c,$_v)
					    ->get()->result();
		return $sQl;
	}

	public function champStock($table){
		$sQl = "DESCRIBE $table";
		$Query = $this->db->query($sQl)->result();

		return $Query;
	}


	public function champDatas(){
		$sQl = "DESCRIBE st_datas_1s";
		$Query = $this->db->query($sQl)->result();

		return $Query;
	}

	public function getColDatas($clnn){
		$sQl = "SELECT 
					COLUMN_NAME as nom,
					DATA_TYPE as type,
					COLUMN_TYPE as limits,
					IS_NULLABLE as nulls
				FROM INFORMATION_SCHEMA.COLUMNS
				WHERE table_name = 'st_datas_1s' 
				AND COLUMN_NAME='$clnn'";
		$stdata = $this->db->query($sQl)->result();

		$type = "";
		foreach ($stdata as $stdatas => $d) {
			$type = $d->type;
		}

		return $type;
	}

	public function selectColonne($nCln,$table){
		$sQl = "SELECT COLUMN_NAME as nom,DATA_TYPE as type,COLUMN_TYPE as limits,IS_NULLABLE as nulls
				FROM INFORMATION_SCHEMA.COLUMNS
				WHERE table_name = '$table' AND COLUMN_NAME='".$nCln."'";
		$Query = $this->db->query($sQl)->result();

		return $Query;
	}
}
