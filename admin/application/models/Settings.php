<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getSetting(){
		$sQl = $this->db->select('GROUP_CONCAT(IF(nom_params="params_logo_1",valeurs,"")) as logo_1 ,
								  GROUP_CONCAT(IF(nom_params="params_logo_2",valeurs,"")) as logo_2 ,
								  GROUP_CONCAT(IF(nom_params="params_head",valeurs,"")) as head ,
								  GROUP_CONCAT(IF(nom_params="params_description",valeurs,"")) as description ,
								  GROUP_CONCAT(IF(nom_params="params_blocks",valeurs,"")) as blocks
								')
						->from('st_themes')
						->get()->result();
		return $sQl;
	}

	public function getParamStock(){
		$sQl1 = $this->db->query("DESCRIBE st_datas_1s")->result();

		$sQl2 = 'SELECT id ';
		foreach ($sQl1 as $sQl1s => $n) {
			if ($n->Field!=="id" && $n->Field!=="id_liste" && $n->Field!=="quest" && $n->Field!=="user_save" && $n->Field!=="user_update" && $n->Field!=="updated_at" && $n->Field!=="created_at"){
			
				$sQl2 .= ',SUM(IF(champ="'.$n->Field.'",value,0)) as "'.$n->Field.'"';
			}
		}

		$sQl2 .= 'FROM st_params_stock';

		return $this->db->query($sQl2)->result();
	}

	public function getPages(){
		$sQl = $this->db->from("st_pages")
						->get()->result();

		return $sQl;
	}

	public function getHtmlById($idPg){
		$sQl = $this->db->from("st_code_html")
						->where("id_page",$idPg)
						->order_By('ordre')
						->get()->result();

		return $sQl;
	}
}
