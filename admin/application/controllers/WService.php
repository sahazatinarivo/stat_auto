<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'Afficher.php';

class WService extends Afficher {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('user','_u');
		$this->load->model('wservices','_w');
		$this->load->library('session');
	}

	public function envoiLien(){
		$_cles = isset($_POST['_cle']) ? $_POST['_cle'] : "";
		$_lien = isset($_POST['_lien']) ? $_POST['_lien'] : "";
		$_key = $this->_u->getWsKey();
		$data = array();
		if (trim($_cles) == trim($_key)) {
			$data['res'] = "ok";
			$data['lien'] = $_lien;
		}else{
			$data['res'] = "ko";
		}
		echo json_encode($data);
	}

	public function getAcount(){
		$_keyA = $this->_u->getWsKey();
		$_keyO = isset($_POST['_key']) ? $_POST['_key'] : "";
		$_mail = isset($_POST['mail']) ? $_POST['mail'] : "";
		$_pswd = isset($_POST['psswd']) ? $_POST['psswd'] : "";
		$data = array();

		if ($_keyA == $_keyO) {
			$acount = $this->_u->getAcount( $_mail , md5($_pswd) );
			if ($acount > 0) {
				foreach ($acount as $acounts) {
					$data['_nm'] = $acounts->nom;
					$data['_ml'] = $acounts->mail;
					$data['_md'] = $acounts->mdpss;
					$data['_ss'] = $acounts->saisie;
				}
				$data['res'] = "ok";
			}else{
				$data['res'] = "ko";
			}
		}else{
			$data['res'] = "ko";
		}
		echo json_encode($data);
	}

	public function tableListe(){
		$_keyA = $this->_u->getWsKey();
		$_keyO = isset($_POST['_key']) ? $_POST['_key'] : "";
		$data = array();
		if ($_keyA == $_keyO) {
			$data['col'] = $this->_w->getColListe('st_liste_evalue');
			$data['res'] = "ok";
		}else{
			$data['res'] = "ko";
		}

		echo json_encode($data);
	}

	public function tableDonne(){
		$_keyA = $this->_u->getWsKey();
		$_keyO = isset($_POST['_key']) ? $_POST['_key'] : "";
		$data = array();
		if ($_keyA == $_keyO) {
			$data['col'] = $this->_w->getColListe('st_datas_1s');
			$data['res'] = "ok";
		}else{
			$data['res'] = "ko";
		}

		echo json_encode($data);
	}

	public function getParamsTheme(){
		$_keyA = $this->_u->getWsKey();
		$_keyO = isset($_POST['_key']) ? $_POST['_key'] : "";
		$data = array();
		if ($_keyA == $_keyO) {
			$data['thm'] = $this->_w->getTables('st_themes');
			$data['res'] = "ok";
		}else{
			$data['res'] = "ko";
		}

		echo json_encode($data);
	}

	public function getParamsColonne(){
		$_keyA = $this->_u->getWsKey();
		$_keyO = isset($_POST['_key']) ? $_POST['_key'] : "";
		$data = array();
		if ($_keyA == $_keyO) {
			$data['cln'] = $this->db->select('p.champ as champ, c.nom_champ as value')
									->from('st_params_stock p')
									->join('st_champs_block c','p.value = c.id')
									->get()->result();
			$data['res'] = "ok";
		}else{
			$data['res'] = "ko";
		}

		echo json_encode($data);
	}

	public function donneListe(){
		$_keyA = $this->_u->getWsKey();
		$_keyO = isset($_POST['_key']) ? $_POST['_key'] : "";
		$data = array();
		if ($_keyA == $_keyO) {
			$data['lst'] = $this->_w->getTables('st_liste_evalue');
			$data['col'] = $this->_w->getColListe('st_liste_evalue');
			$data['pgs'] = $this->_w->getTables('st_pages');
			$data['res'] = "ok";
		}else{
			$data['res'] = "ko";
		}

		echo json_encode($data);
	}

	public function paramsSearch(){
		$_keyA = $this->_u->getWsKey();
		$_keyO = isset($_POST['_key']) ? $_POST['_key'] : "";
		$data = array();
		if ($_keyA == $_keyO) {
			$data['rch'] = $this->_w->getTables('st_recherche');
			$data['res'] = "ok";
		}else{
			$data['res'] = "ko";
		}

		echo json_encode($data);
	}

	public function codeHtml(){
		$_keyA = $this->_u->getWsKey();
		$_keyO = isset($_POST['_key']) ? $_POST['_key'] : "";
		$data = array();
		if ($_keyA == $_keyO) {
			$data['cdh'] = $this->_w->getTables('st_code_html');
			$data['res'] = "ok";
		}else{
			$data['res'] = "ko";
		}

		echo json_encode($data);
	}

	public function envoiData(){
		$_keyA = $this->_u->getWsKey();
		$_keyO = isset($_POST['_key']) ? $_POST['_key'] : "";
		$data = array();
		if ($_keyA == $_keyO) {
			$dSasie = isset($_POST['_dss']) ? $_POST['_dss'] : "";
			$clDats = $this->_w->getColListe('st_datas_1s');
			for ($i=0; $i < count($dSasie) ; $i++) { 
				$value = array();
				foreach ($clDats as $key) {
					if ($key->Field !== 'id') {
						$value[$key->Field] = $dSasie[$i][$key->Field];
					}
				}
				$siEx = $this->db->from('st_datas_1s')
							 	 ->where('id_liste',$dSasie[$i]['id_liste'])
							 	 ->where('quest',$dSasie[$i]['quest'])
							 	 ->get()->result();
				if (count($siEx) > 0) {
					$this->db->where('id_liste',$dSasie[$i]['id_liste']);
					$this->db->where('quest',$dSasie[$i]['quest']);
					$this->db->update('st_datas_1s',$value);
				}else{
					$this->db->insert('st_datas_1s',$value);
				}
			}
			$data['res'] = "ok";
		}else{
			$data['res'] = "ko";
		}
	}
}
