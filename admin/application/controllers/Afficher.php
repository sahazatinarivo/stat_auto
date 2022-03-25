<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Afficher extends CI_Controller {

		public function affiche($_r, $data = array()){
			$data['view'] = $_r;
			$this->load->view('st_admin_layout',$data);
		}
	}
?>