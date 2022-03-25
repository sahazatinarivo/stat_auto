<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function saveOperateur($op_token,$data){
		$sQl = null;
		if ($op_token !== "") {
			$sQl = $this->db->where('slug',$op_token)
							->update('st_operateur',$data);
		}else{
			$sQl = $this->db->insert('st_operateur',$data);
		}
		return $sQl;
	}

	public function saveAdmin($op_token,$data){
		$sQl = null;
		if ($op_token !== "") {
			$sQl = $this->db->where('slug',$op_token)
							->update('st_admin',$data);
		}else{
			$sQl = $this->db->insert('st_admin',$data);
		}
		return $sQl;
	}

	public function userBySlug($slug){
		$sQl = $this->db->select('mdpss as mdps')
						->from('st_admin')
						->where('slug',$slug)
						->get()
						->result();
		$mdps = null;
		foreach ($sQl as $sQls => $s) {
			$mdps = $s->mdps;
		}
		return $mdps;
	}

	public function userByMail($email){
		$sQl = $this->db->select('mdpss as mdps')
						->from('st_admin')
						->where('mail',$email)
						->get()
						->result();
		return $sQl;
	}

	public function userByUser($email,$mdpss){
		$sQl = $this->db->from('st_admin')
						->where('mail',$email)
						->where('mdpss',$mdpss)
						->get()
						->result();
		return $sQl;
	}

	public function getWsKey(){
		$sQl = $this->db->from('st_service')
						->where('params','key')
						->where('etat',1)
						->get()->result();
		$key = null;
		foreach ($sQl as $sQls) {
			$key = $sQls->valeur;
		}

		return $key;
	}

	public function getAcount( $_m , $_p ){
		$sQl = $this->db->from('st_operateur')
						->where('mail', $_m )
						->where('mdpss', $_p )
						->get()->result();

		return $sQl;
	}
}
