<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'Afficher.php';
class Accueil extends Afficher {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
		$data = array();
		if (!isset($this->session->id_admin)) redirect('login.html');
		$this->affiche('accueil',$data);
	}
}
