<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'Afficher.php';

class Montage extends Afficher {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Creations','create');
		$this->load->model('Montages','montage');
		$this->load->library('session');
	}

	/*generer tableau*/
	public function generer_tableau(){
		$this->load->helper('url');
		if (!isset($this->session->id_admin)) redirect('login.html');
		$page = isset($_GET['{num_page}']) ? $_GET['{num_page}']: 0;
		$bloc = isset($_GET['{num_block}']) ? $_GET['{num_block}']: 0;
		$data['page'] = $this->create->select_tbl("st_pages","id");
		$data['block'] = $this->create->select_tbl("st_blocks","id");
		$data['n_pg'] = $page; $data['n_bc'] = $bloc;
		$data['chtml'] = $this->montage->getBlockGen();

		if ($page !== 0 || $bloc !== 0) {
			$champ = $this->create->select_block($bloc,$page);
			$data['nmCln'] = $this->create->select_champ($page);
			$ligne = 0; $types = 0;
			foreach ($champ as $champs => $c) {
				$ligne = (int)$c->ligne;
				$types = (int)$c->type_block;
			}
			$data['ligne'] = $this->create->select_ligne($ligne);
			$data['titre'] = $champ;
			$data['types'] = $types;
		}
		$this->affiche("generer_tbl", $data);
	}

	public function params_block(){
		$this->load->helper('url');
		if (!isset($this->session->id_admin)) redirect('login.html');
		$idPg = isset($_GET['{num_page}']) ? $_GET['{num_page}'] : null;
		$data['page'] = $this->create->select_tbl("st_pages","id");
		$data['html'] = $this->montage->selectHtml($idPg);
		$data['idpg'] = $idPg;
		
		$this->affiche("parametre_block", $data);
	}

	public function save_ordre(){
		$this->load->helper('url');
		$data['ordre'] = isset($_POST['ordre']) ? $_POST['ordre']: 0;
		$ihtml = isset($_POST['idHtml']) ? $_POST['idHtml']: 0;

		$this->db->where('id',$ihtml);
		$this->db->update('st_code_html',$data);
	}

	public function save_html(){
		$this->load->helper('url');
		$idPg = isset($_POST['_idPg']) ? $_POST['_idPg']: 0;
		$idbc = isset($_POST['_idBc']) ? $_POST['_idBc']: 0;
		$data['id_page'] = isset($_POST['_idPg']) ? $_POST['_idPg']: 0;
		$data['id_block'] = isset($_POST['_idBc']) ? $_POST['_idBc']: 0;
		$data['html'] = isset($_POST['_html']) ? trim($_POST['_html']): 0;
		$sIex = $this->montage->selectIfExiste($idbc,$idPg);
		if (count($sIex) > 0) {
			$this->db->where('id_page',$idPg)
					 ->where('id_block',$idbc)
					 ->update('st_code_html',$data);
		}else{
			$this->db->insert("st_code_html",$data);
		}

		echo base_url("index.php/generer-block.html");
 	}
}
