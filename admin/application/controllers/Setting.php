<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'Afficher.php';
class Setting extends Afficher {  

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('settings','_s');
		$this->load->model('excels','_e');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function theme(){
		if (!isset($this->session->id_admin)) redirect('login.html');
		$idPg = isset($_GET['p']) ? $_GET['p'] : 1;
		$cnfg = $this->_s->getSetting();
		$data["page"] = $this->_s->getPages();
		$data["html"] = $this->_s->getHtmlById($idPg);
		$data["PgAc"] = $idPg;
		foreach ($cnfg as $cnfgs => $c) {
			$data['logo1'] = $c->logo_1;
			$data['logo2'] = $c->logo_2;
			$data['heads'] = $c->head;
			$data['dcrpt'] = $c->description;
			$data['block'] = $c->blocks;
		}
 		$this->affiche("themes", $data);
	}

	public function autre_setting(){
		$this->affiche("autre_params");
	}

	public function params_recherche(){
		$data = array();
		$pSearch = $this->db->from('st_recherche')->limit('1')->get()->result();
		if (is_array($pSearch)) {
			foreach ($pSearch as $pSearchs => $p) {
				$data['pActiv'] = $p->colonne;
			}
		}

		$data['nChamp'] = $this->_e->champStock("st_liste_evalue");
		$this->load->view('block_modal/params_recherche.php',$data);
	}

	public function params_stockage(){
		$data['nChamp'] = $this->_e->champDatas();
		$data['cChamp'] = $this->db->from('st_champs_block')->get()->result();
		$data['pStock'] = $this->_s->getParamStock();
		
		$this->load->view('block_modal/params_stockage.php',$data);
	}

	public function save_searche(){
		$data['colonne'] = isset($_POST['cActiveRech']) ? $_POST['cActiveRech'] : 0;
		$this->db->truncate('st_recherche');
		$this->db->insert('st_recherche',$data);
		redirect('autre-setting.html');
	}

	public function save_stock(){
		$cln = isset($_POST['cLnne']) ? $_POST['cLnne'] : "";
		$data['value'] = isset($_POST['iValu']) ? $_POST['iValu'] : 0;
		$data['champ'] = $cln; 
		$getPrs = $this->db->from('st_params_stock')->where('champ',$cln)->get()->result();
		$message = "";
		if (count($getPrs) > 0) {
			$this->db->where('champ',$cln);
			$this->db->update('st_params_stock',$data);
			$message = "Parametre bien modifier";
		}else{
			$this->db->insert('st_params_stock',$data);
			$message = "Parametre bien inserer";
		}
		echo "<br><div class=\"alert alert-success\"><i>".$message."</i></div>";
	}

	public function save_setting(){
		$nParams = isset($_POST['nParams']) ? $_POST['nParams']:"";
		$vParams = isset($_POST['vParams']) ? $_POST['vParams']:"";

		$getParams = $this->db->from("st_themes")
						   ->where("nom_params",$nParams)
						   ->get()->result();
		$params["nom_params"] = $nParams;
		$params["valeurs"] = $vParams;
		if (count($getParams) >0) {
			$this->db->where("nom_params",$nParams);
			$this->db->update("st_themes",$params);
		}else{
			$this->db->insert("st_themes",$params);
		}
	}

	public function logo1(){
		$path = '../public/image_profils/';
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'png|jpeg|jpg';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);            
		if (!$this->upload->do_upload('theme_logo_1')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
		}

		if(empty($error)){
		   	if (!empty($data['upload_data']['file_name'])) {
		 		$logo1 = $data['upload_data']['file_name'];
			} else {
				$logo1 = 0;
			}
			
			$logo["nom_params"] = "params_logo_1";
			$logo["valeurs"] = $logo1;
			$getlg1 = $this->db->from("st_themes")
							   ->where("nom_params","params_logo_1")
							   ->get()->result();
			if (count($getlg1)>0) {
				$this->db->where("nom_params","params_logo_1");
				$this->db->update("st_themes",$logo);
			}else{
				$this->db->insert("st_themes",$logo);
			}
		}
	}

	public function logo2(){
		$path = '../public/image_profils/';
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'png|jpeg|jpg';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);            
		if (!$this->upload->do_upload('theme_logo_2')) {
			$error = array('error' => $this->upload->display_errors());
		} else {
			$data = array('upload_data' => $this->upload->data());
		}

		if(empty($error)){
		   	if (!empty($data['upload_data']['file_name'])) {
		 		$logo2 = $data['upload_data']['file_name'];
			} else {
				$logo2 = 0;
			}
			
			$logo["nom_params"] = "params_logo_2";
			$logo["valeurs"] = $logo2;
			$getlg1 = $this->db->from("st_themes")
							   ->where("nom_params","params_logo_2")
							   ->get()->result();
			if (count($getlg1)>0) {
				$this->db->where("nom_params","params_logo_2");
				$this->db->update("st_themes",$logo);
			}else{
				$this->db->insert("st_themes",$logo);
			}
		}
	}
}

