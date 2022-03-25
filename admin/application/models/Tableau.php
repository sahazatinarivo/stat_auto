<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tableau extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_tbl($_n,$data){
		$tbl = $this->db->from('st_tableau')
				 		->where('nom',$_n);
		$_er = 0;
		if (count($tbl->get()->result()) > 0) {
			$_er = 1; 
		}else{
			$this->db->insert('st_tableau',$data);
			$_er = 0;
		}
		return $_er;
	}

	public function liste_tbl(){
		$tbl = $this->db->from('st_tableau')
				 		->order_by('id');

		return $tbl->get()->result();
	}

	public function select_by_id($id){
		$tbl = $this->db->from('st_tableau')
						->where('id',$id);

		return $tbl->get()->result();
	}

	public function select_liste_degre(){
		$tbl = $this->db->from('st_nom_degre');

		return $tbl->get()->result();
	}
}
