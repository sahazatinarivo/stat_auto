<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once 'Afficher.php';

class Creation extends Afficher {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Creations','create');
		$this->load->library('session');
	}

	public function create_list(){
		$this->load->helper('url');
		if (!isset($this->session->id_admin)) redirect('login.html');
		$data['liste'] = $this->create->select_liste();
		$data['tpLst'] = $this->db->from("st_type_liste")->get()->result();
		$this->affiche("create_list", $data);
	}

	public function create_page()
	{
		$this->load->helper('url');
		if (!isset($this->session->id_admin)) redirect('login.html');
		$data['page'] = $this->create->select_tbl("st_pages","id");
		$this->affiche("create_page", $data);
	}

	public function create_bloc(){
		$this->load->helper('url');
		if (!isset($this->session->id_admin)) redirect('login.html');
		$n_pge = isset($_GET['{num_page}']) ? $_GET['{num_page}'] : null;
		$data['n_pg'] = $n_pge;
		$data['block'] = $this->create->select_tbl("st_blocks","id",$n_pge);
		$data['page'] = $this->create->select_tbl("st_pages","id");
		$data['liste'] = $this->db->from("st_liste")->where('type_liste',1)->get()->result();
		$this->affiche("create_block", $data);
	}

	public function create_chmp(){
		$this->load->helper('url');
		if (!isset($this->session->id_admin)) redirect('login.html');
		$n_pge = isset($_GET['{num_page}']) ? $_GET['{num_page}'] : null;
		$n_blc = isset($_GET['{num_block}']) ? $_GET['{num_block}'] : null;
		$data['n_pg'] = $n_pge;
		$data['n_bc'] = $n_blc;
		$data['block'] = $this->create->select_tbl("st_blocks","id",$n_pge);
		$data['champ'] = $this->create->select_tbl("st_champs_block","id",$n_pge);
		$data['page'] = $this->create->select_tbl("st_pages","id");
		$data['liste'] = $this->db->from("st_liste")->where('type_liste',2)->get()->result();
		$this->affiche("create_champ", $data);
	}

	public function change_page(){
		$this->load->helper('url');
		$page = $this->input->post('page');
		$slct_block = $this->create->select_tbl("st_blocks","id",$page);
		$block = '<select class="form-control" name="{num_block}" required="required">';
				$block.= '<option value="">-------Selectionner block------</option>';
				foreach ($slct_block as $slct_blocks => $b) {
				$block.= '<option value="'.$b->id.'">'.$b->nom_block.'</option>';
				}
		$block .='</select>';
		echo $block;
	}

	public function change_champ_page(){
		$this->load->helper('url');
		$page = $this->input->post('page');
		$slct_block = $this->create->select_tbl("st_blocks","id",$page);
		$block = '<label>Block</label>';
				$block.= '<select class="form-control" name="{num_block}" required="required">';
				$block.= '<option value="">-------Selectionner block------</option>';
				foreach ($slct_block as $slct_blocks => $b) {
				$block.= '<option value="'.$b->id.'">'.$b->nom_block.'</option>';
				}
		$block .='</select>';
		echo $block;
	}

	

	/*creation listes*/
	public function save_liste(){
		$this->load->helper('url');
		$data['nom_liste'] = $this->input->post('{nom_liste}');
		$data['type_liste'] = $this->input->post('{type_liste}');
		$data['etat'] = $this->input->post('{etat_liste}');
		$idListe = $this->input->post("{stock_id}");
		if ($idListe == 0) {
			$this->db->insert('st_liste',$data);
		}else{
			$this->db->where('id',$idListe);
			$this->db->update('st_liste',$data);
		}
		redirect("creation-list.html");
	}

	public function delete_liste(){
		$this->load->helper('url');
		$idListe = $this->input->post('id');
		$this->db->where('id',$idListe);
		$this->db->delete('st_liste');
	}

	public function delete_listel(){
		$this->load->helper('url');
		$idListe = $this->input->post('id');
		$this->db->where('id',$idListe);
		$this->db->delete('st_liste_liste');
	}

	public function edite_liste(){
		$this->load->helper('url');
		$idListe = $this->input->post('id');
		$liste = $this->db->from('st_liste')
						  ->where('id',$idListe)
						  ->get()->result();
		  
		$data['tpLst'] = $this->db->from("st_type_liste")->get()->result();
		foreach ($liste as $listes => $l) {
			$data['idliste'] = $l->id;
			$data['nomlist'] = $l->nom_liste;
			$data['tpliste'] = $l->type_liste;
			$data['ettlist'] = $l->etat;
		}
		
		$this->load->view('block_modal/edite_liste', $data);
	}

	public function detail_liste(){
		$this->load->helper('url');
		$idListe = $this->input->post('id');
		$data['liste'] = $this->db->from("st_liste_liste")
								 ->where("id_liste",$idListe)
								 ->get()->result();

		$lliste = $this->db->from("st_liste")
								 ->where("id",$idListe)
								 ->get()->result();

		foreach ($lliste as $llistes => $cl) {
			$data['nls'] = $cl->nom_liste;
			$data['idl'] = $cl->id;
			$data['tls'] = $cl->type_liste;
			$data['ett'] = $cl->etat;
		}

		$this->load->view('block_modal/detail_liste', $data);
	}

	public function save_liste_l(){
		$this->load->helper('url');
		$idListe = $this->input->post('idListe');
		$idLstel = $this->input->post('idLstel');
		$data["libelle"] = $this->input->post('libelle');
		$data["id_liste"] = $this->input->post('idListe');
		$data["etat"] = $this->input->post('etat');
		if ($idLstel == 0) {
			$this->db->insert('st_liste_liste',$data);
		}else{
			$this->db->where('id',$idLstel);
			$this->db->update('st_liste_liste',$data);
		}
		
		$cliste["cl"] = $this->db->from("st_liste_liste")
								 ->where("id_liste",$idListe)
								 ->get()->result();
		
		$this->load->view('block_modal/save_listel', $cliste);
	}

	public function edite_listel(){
		$this->load->helper('url');
		$idListe = $this->input->post('id');
		$select =  $this->db->from("st_liste_liste")
							->where("id",$idListe)
							->get()->result();

		echo json_encode($select);
	}

	/*creation page*/
	public function save_page(){
		$this->load->helper('url');
		$uni1 = mt_rand(0,mt_getrandmax());
		$uni2 = mt_rand(0,mt_getrandmax());
		$date = date('Ymdih');
		$data['nom_page'] = $this->input->post('{nom_page}');
		$data['etat'] = $this->input->post('{etat_page}');
		$data['slug'] = $uni1.$date.$uni2;

		$idPage = $this->input->post("{stock_id_page}");
		if ($idPage == 0) {
			$this->db->insert('st_pages',$data);
		}else{
			$this->db->where('id',$idPage);
			$this->db->update('st_pages',$data);
		}
		redirect("creation-page.html");
	}

	public function suppr_page(){
		$this->load->helper('url');
		$idPage = $_GET['id'];
		$this->db->where('id',$idPage);
		$this->db->delete('st_pages');

		redirect("creation-page.html");
	}

	public function edite_page(){
		$this->load->helper('url');
		$idPage = $this->input->post("id");
		$lpage =  $this->db->from("st_pages")
							->where("id",$idPage)
							->get()->result();
		$data = [];
		foreach ($lpage as $lpages => $lp) {
			$data['npg'] = $lp->nom_page;
			$data['idp'] = $lp->id;
			$data['epg'] = $lp->etat;
		}

		$this->load->view('block_modal/edite_page', $data);
	}

	/*creation block*/
	public function save_block(){
		$this->load->helper('url');
		$data['id_page'] = $this->input->post('{num_page_block}');
		$data['nom_block'] = $this->input->post('{nom_block}');
		$data['type_block'] = isset($_POST['{type_blck}']) ? $_POST['{type_blck}'] : 0;
		$data['ligne'] = isset($_POST['{ligne_blck}']) ? $_POST['{ligne_blck}'] : 0;
		$data['etat'] = $this->input->post('{etat_block}');
		$idBlock = $this->input->post("{stock_id_block}");
		if ($idBlock == 0) {
			$this->db->insert('st_blocks',$data);
		}else{
			$this->db->where('id',$idBlock);
			$this->db->update('st_blocks',$data);
		}
		redirect("creation-blck.html");
	}

	public function suppr_block(){
		$this->load->helper('url');
		$idPage = $_GET['id'];
		$this->db->where('id',$idPage);
		$this->db->delete('st_blocks');

		redirect("creation-blck.html");
	}

	public function edite_block(){
		$this->load->helper('url');
		$idBlock = $this->input->post("id");
		$block =  $this->db->from("st_blocks")
							->where("id",$idBlock)
							->get()->result();
		foreach ($block as $blocks => $b) {
			$data['idbc'] = $b->id;
			$data['idpg'] = $b->id_page;
			$data['tpbc'] = $b->type_block;
			$data['nblc'] = $b->nom_block;
			$data['lblc'] = $b->ligne;
			$data['eblc'] = $b->etat;
		}

		$data['liste'] = $this->db->from('st_liste')
								  ->where('type_liste',1)
								  ->get()->result();
		$data['pages'] = $this->db->from("st_pages")
								  ->get()->result();
		$data['tp_bc'] = $this->db->from("st_type_block")
						  		  ->get()->result();

		$this->load->view('block_modal/edite_block', $data);
	}

	public function type_block(){
		$this->load->helper('url');
		$data['tpbck'] = $idBlock = $this->input->post("idtp");
		$data['liste'] = $this->db->from('st_liste')
						  ->where('type_liste',1)
						  ->get()->result();

		$this->load->view('block_modal/type_block', $data);
	}

	/*creation champ block*/
	public function save_champ(){
		$this->load->helper('url');
		$data['nom_champ'] = $this->input->post('{nom_champ}');
		$data['degre'] = $this->input->post('{degre_eval}');
		$data['etat'] = $this->input->post('{etat_champ}');
		$idBlock = $this->input->post("{stock_id_champ}");
		if ($idBlock == 0) {
			$this->db->insert('st_champs_block',$data);
		}else{
			$this->db->where('id',$idBlock);
			$this->db->update('st_champs_block',$data);
		}
		redirect("creation-chmp.html");
	}

	public function suppr_champ(){
		$this->load->helper('url');
		$idPage = $_GET['id'];
		$this->db->where('id',$idPage);
		$this->db->delete('st_champs_block');

		redirect("creation-chmp.html");
	}

	public function edite_champ(){
		$this->load->helper('url');
		$idBlock = $this->input->post("id");
		$colonne =  $this->db->from("st_champs_block")
							->where("id",$idBlock)
							->get()->result();

		foreach ($colonne as $colonnes => $c) {
			$data['idCl'] = $c->id;
			$data['nmCl'] = $c->nom_champ;
			$data['dgCl'] = $c->degre;
			$data['etCl'] = $c->etat;
		}
		$data['liste'] = $this->db->from('st_liste')
								  ->where('type_liste',2)
								  ->get()->result();
		$this->load->view('block_modal/edite_colonne', $data);
	}
}
