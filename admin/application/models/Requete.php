<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requete extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function affiche_colonne(){
		return $this->db->list_fields('f_evaluation_save');
	}
}
