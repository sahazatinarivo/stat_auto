<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Montages extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function selectIfExiste($_b,$_p){
		$sQl = $this->db->from('st_code_html')
					    ->where('id_block',$_b)
					    ->where('id_page',$_p)
					    ->get()->result();

		return $sQl;
	}

	public function selectHtml($idPg = null){
		$sQl = $this->db->select('
						h.id as id_html,
						b.nom_block as block,
						p.nom_page as page,
						t.type_block as type,
						h.ordre as ordre
						')
						->from('st_code_html h')
						->join('st_pages p','h.id_page = p.id')
			   			->join('st_blocks b','h.id_block = b.id')
			   			->join('st_type_block t', 'b.type_block = t.id_type_block')
			   			->where('h.id_page',$idPg)
			   			->order_by('h.ordre')
			   			->get()->result();

		return $sQl;
	}

	public function getBlockGen(){
		$sQl = $this->db->select('
					ch.id_page as idpg,
					ch.id_block as idblock,
					bc.nom_block as nom,
					pg.nom_page as page
			   ')
				->from('st_code_html ch')
				->join('st_blocks bc','ch.id_block = bc.id')
				->join('st_pages pg','ch.id_page = pg.id')
				->order_by('pg.id')
				->get()->result();

		return $sQl;
	}
}
