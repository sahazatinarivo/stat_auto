<?php 

class AutreConnections
{	
	private $host;
	private $user;
	private $password;
	private $database;
	private $port;

	public function getDB(){
		$db = new SQLite3('../database/database.sqlite');
		return $db;
	}

	public function database(){
		$db = $this->getDB();
		$result = $db->query('SELECT * FROM st_databases WHERE etat=1');
		return $result;
	}

	public function host(){
		$result = $this->database();
		
		while ($row = $result->fetchArray()) {
		    $host = $row['host'];
		}
		return $host;
	}

	public function user(){
		$result = $this->database();
		
		while ($row = $result->fetchArray()) {
		    $user = $row['user'];
		}
		return $user;
	}
	
	public function password(){
		$result = $this->database();
		
		while ($row = $result->fetchArray()) {
		    $password = $row['password'];
		}
		return $password;
	}

	public function databases(){
		$result = $this->database();
		
		while ($row = $result->fetchArray()) {
		    $database = $row['database'];
		}
		return $database;
	}

	public function port(){
		$result = $this->database();
		
		while ($row = $result->fetchArray()) {
		    $port = $row['port'];
		}
		return $port;
	}
}
