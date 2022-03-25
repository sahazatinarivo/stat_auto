<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creations extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function select_tbl($tbl,$order,$where_1=null,$where_2=null){
		$this->db->from($tbl);
		if ($where_1) { $this->db->where("id_page",$where_1); }
		if ($where_2) { $this->db->where("id_block",$where_2); }
		$this->db->order_by($order);

		return $this->db->get()->result();
	}
	public function select_block($block,$page){
		$this->db->from('st_blocks')
				 ->where('id',$block)
				 ->where('id_page',$page)
				 ->where('etat',1);
		return $this->db->get()->result();
	}
	public function select_champ(){
		$this->db->from('st_champs_block')
			     ->where('etat',1);
		return $this->db->get()->result();
	}
	public function select_ligne($liste){
		$this->db->from('st_liste_liste')
				 ->where('id_liste',$liste)
				 ->where('etat',1);
		return $this->db->get()->result();
	}
	public function select_liste(){
		$this->db->select('l.nom_liste as nom_liste,t.libelle as libelle,l.id as id,l.etat as etat')
				 ->from('st_liste l')
			  	 ->join('st_type_liste t','l.type_liste=t.id');
		return $this->db->get()->result();
	}
}
