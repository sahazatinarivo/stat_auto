<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saisies extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function comparaison($cLns){
		$sQl = "SELECT 
					A.quest as quest,
					A.$cLns as colonneA,
					B.$cLns as colonneB,
					Oa.nom as oper_1,
					Ob.nom as oper_2
				FROM   st_datas_1s A
				INNER JOIN st_datas_2s B ON A.quest = B.quest
				INNER JOIN st_operateur Oa ON A.user_save = Oa.id
				INNER JOIN st_operateur Ob On B.user_save = Ob.id 
				WHERE  A.$cLns <>  B.$cLns";
		return $this->db->query($sQl)->result();
	}
}
