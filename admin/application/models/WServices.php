<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WServices extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getColListe($_table){
		$sQl1 = $this->db->query("DESCRIBE $_table")
						 ->result();

		return $sQl1;
	}

	public function getTables($_table){
		$sQl = $this->db->from($_table)
						->get()
						->result();
		return $sQl;
	}
}
