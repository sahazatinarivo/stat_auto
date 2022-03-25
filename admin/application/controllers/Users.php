<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'Afficher.php';

class Users extends Afficher {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('user','_u');
		$this->load->library('session');
	}

	public function connecter_admin(){
		$ptokn = isset($_POST['_token']) ? $_POST['_token'] : "";
		$email = isset($_POST['email_admin']) ? $_POST['email_admin'] : "";
		$pssds = isset($_POST['password_admin']) ? $_POST['password_admin'] : "";
		$stokn = $this->session->_token_user;
		$rdrct = null;
		if ($ptokn == $stokn) {
			$getm = $this->_u->userByMail($email);
			if (count($getm) > 0) {
				$getUser = $this->_u->userByUser($email,md5($pssds));
				if (count($getUser) > 0) {
					foreach ($getUser as $getUsers => $u) {
						$_SESSION['id_admin'] = $u->id;
					}
					$rdrct = "tableau-bord.html";
				}else{
					$this->session->set_flashdata('message', 'Mot de passe incorrect');
					$rdrct = "login.html";
				}
			}else{
				$this->session->set_flashdata('message', 'Votre adresse email n\'existe pas dans le systeme');
				$rdrct = "login.html";
			}
		}else{
			$this->session->set_flashdata('message', 'Erreur de token');
			$rdrct = "login.html";
		}
		redirect($rdrct);
	}

	public function index(){
		$this->session->set_userdata('_token_user',md5(mt_rand(0,mt_getrandmax())));
		$this->load->view('st_login');
	}

	public function admin()
	{	
		if (!isset($this->session->id_admin)) redirect('login.html');
		$data["admin"] = $this->db->from('st_admin')
								  ->get()->result();

		$this->Affiche('admin_user',$data);
	}

	public function operateur(){
		if (!isset($this->session->id_admin)) redirect('login.html');
		$data["operat"] = $this->db->from('st_operateur')
								  ->get()->result();

		$this->Affiche('operateur_user',$data);
	}

	public function add_operateur(){
		if (!isset($this->session->id_admin)) redirect('login.html');
		$operat = isset($_GET['o']) ? $_GET['o'] : 0;
		$data = array();
		if ($operat !== 0) {
			$o = $this->db->from('st_operateur')
						  ->where('slug',$operat)
						  ->get()->result();
			foreach ($o as $op => $o) {
				$data['nom'] = $o->nom;
				$data['mail'] = $o->mail;
				$data['saisie'] = $o->saisie;
				$data['slug'] = $o->slug;
			}

		}
		$this->Affiche('operateur_add',$data);
	}

	public function add_admin(){
		if (!isset($this->session->id_admin)) redirect('login.html');
		$operat = isset($_GET['a']) ? $_GET['a'] : 0;
		$data = array();
		if ($operat !== 0) {
			$a = $this->db->from('st_admin')
						  ->where('slug',$operat)
						  ->get()->result();
			foreach ($a as $ad => $a) {
				$data['nom'] = $a->nom;
				$data['mail'] = $a->mail;
				$data['slug'] = $a->slug;
			}

		}
		$this->Affiche('admin_add',$data);
	}

	public function edit_nom_a($slug){
		if (!isset($this->session->id_admin)) redirect('login.html');
		$data = array();
		if ($slug !== 0) {
			$a = $this->db->from('st_admin')
						  ->where('slug',$slug)
						  ->get()->result();
			foreach ($a as $ad => $a) {
				$data['nom'] = $a->nom;
				$data['mail'] = $a->mail;
				$data['slug'] = $a->slug;
			}

		}
		$this->Affiche('edite_nom_admin',$data);
	}

	public function edit_mdps_a($slug){
		if (!isset($this->session->id_admin)) redirect('login.html');
		$data = array();
		if ($slug !== 0) {
			$a = $this->db->from('st_admin')
						  ->where('slug',$slug)
						  ->get()->result();
			foreach ($a as $ad => $a) {
				$data['nom'] = $a->nom;
				$data['mail'] = $a->mail;
				$data['slug'] = $a->slug;
			}

		}
		$this->Affiche('edite_mdps_admin',$data);
	}

	public function save_operat(){
		$uni1 = mt_rand(0,mt_getrandmax());
		$uni2 = mt_rand(0,mt_getrandmax());
		$date = date('Ydmhs');
		$op_token = isset($_POST['op_token']) ? $_POST['op_token'] : "";
		$data['slug'] = $uni1.$date.$uni2;
		$data['nom'] = isset($_POST['nom_operat']) ? $_POST['nom_operat'] : "";
		$data['mail'] = isset($_POST['email_operat']) ? $_POST['email_operat'] : "";
		$data['saisie'] = isset($_POST['type_operat']) ? $_POST['type_operat'] : "";
		$data['mdpss'] = isset($_POST['password_operat']) ? md5($_POST['password_operat']) : "";
		$sQl = $this->_u->saveOperateur($op_token,$data);

		if ($sQl) {
			redirect('user-operat.html');
		}else{
			echo "ERROR";
		}
	}

	public function save_admin(){
		$uni1 = mt_rand(0,mt_getrandmax());
		$uni2 = mt_rand(0,mt_getrandmax());
		$date = date('Ydmhs');
		$ad_token = isset($_POST['ad_token']) ? $_POST['ad_token'] : "";
		$data['slug'] = $uni1.$date.$uni2;
		$data['nom'] = isset($_POST['nom_admin']) ? $_POST['nom_admin'] : "";
		$data['mail'] = isset($_POST['email_admin']) ? $_POST['email_admin'] : "";
		$data['mdpss'] = isset($_POST['password_admin']) ? md5($_POST['password_admin']) : "";
		$sQl = $this->_u->saveAdmin($ad_token,$data);

		if ($sQl) {
			redirect('user-admin.html');
		}else{
			echo "ERROR";
		}
	}

	public function suppr_operat(){
		$slug = isset($_GET['o']) ? $_GET['o']: "";
		if ($slug !== "") {
			$this->db->where('slug',$slug);
			$this->db->delete('st_operateur');
			redirect('user-operat.html');
		}else{
			echo "ERREUR DE SUPPRESSION";
		}
	}
	public function suppr_admin(){
		$slug = isset($_GET['a']) ? $_GET['a']: "";
		if ($slug !== "") {
			$this->db->where('slug',$slug);
			$this->db->delete('st_admin');	
			redirect('user-admin.html');
		}else{
			echo "ERREUR DE SUPPRESSION";
		}
	}

	public function deconnexion(){
		$this->session->sess_destroy();

		redirect('login.html');
	}
}
