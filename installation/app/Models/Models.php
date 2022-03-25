<?php

class Models
{
	public $db;
	public $id_etape;
	public $countIns;
	function __construct($db){
		$this->db = $db;
	}

	public function getEtap(){
		$etap = $this->db->query('SELECT MAX("id") as id FROM st_installation WHERE etat=1');
		while ($row = $etap->fetchArray()) {
			$id_etape = $row['id'];
		}
		return $id_etape;
	}

	public function getCount(){
		$etap = $this->db->query('SELECT count("id") as count FROM st_installation WHERE etat=1');
		while ($row = $etap->fetchArray()) {
			$countIns = $row['count'];
		}
		return $countIns;
	}

	public function desactive_database($etat){
		$stm = $this->db->prepare("UPDATE st_databases SET etat=?");
		$stm->bindParam(1, $etat);

		$stm->execute();
	}

	public function update_inst($etat,$etape){
		$stm = $this->db->prepare("UPDATE st_installation SET etat=? WHERE etape=?");
		$stm->bindParam(1, $etat);
		$stm->bindParam(2, $etape);

		$stm->execute();
	}

	public function save_database($host,$user,$pssd,$data,$port,$etat,$cret,$updt){
		$stm = $this->db->prepare("INSERT INTO st_databases(host,user,password,database,port,etat,created_at,updated_at) VALUES (?,?,?,?,?,?,?,?)");
		$stm->bindParam(1, $host);
		$stm->bindParam(2, $user);
		$stm->bindParam(3, $pssd);
		$stm->bindParam(4, $data);
		$stm->bindParam(5, $port);
		$stm->bindParam(6, $etat);
		$stm->bindParam(7, $cret);
		$stm->bindParam(8, $updt);

		$stm->execute();
	}

	public function insert_admin($slug,$nom,$mail,$mdpss){
		$sQl = "INSERT INTO `st_admin`(slug,nom,mail,mdpss) VALUES (?,?,?,?)";

		$exec = $this->db->prepare($sQl);
		$exec->execute([$slug,$nom,$mail,$mdpss]);
	}

	public function update_urls($etat){
		$stm = $this->db->prepare("UPDATE st_urls SET etat=?");
		$stm->bindParam(1, $etat);

		$stm->execute();
	}

	public function insert_url($url,$etat){
		$stm = $this->db->prepare("INSERT INTO `st_urls`(url,etat) VALUES (?,?)");
		$stm->bindParam(1, $url);
		$stm->bindParam(2, $etat);

		$stm->execute();
	}
}