<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'Afficher.php';

class Saisie extends Afficher {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('saisies','_s');
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function etat_saisie(){
		$data = array();
		$cPers = $this->db->from('st_liste_evalue')->get()->result();
		$cPags = $this->db->from('st_pages')->get()->result();
		$pAuns = $this->db->from('st_page_actives')->where('etat_active_1',1)->get()->result();
		$pAdex = $this->db->from('st_page_actives')->where('etat_active_2',1)->get()->result();
		$tSais = count($cPags) * count($cPers);
		$data['saisieUns'] = (count($pAuns) * 100) / isset($tSais) <> 0 ? $tSais : 0;
		$data['saisieDex'] = (count($pAdex) * 100) / isset($tSais) <> 0 ? $tSais : 0;
		$this->affiche('etat_saisie',$data);
	}

	public function controle(){
		$data = array();
		$nCln = isset($_GET['{n}']) ? $_GET['{n}'] : null;
		$data['cChamp'] = $this->db->from('st_params_stock')->get()->result();
		$data['n_chmp'] = $nCln;
		if (!is_null($nCln)) {
			$data['nCmpr'] = $this->_s->comparaison($nCln);
		}
		$this->affiche('controle',$data);
	}
}
