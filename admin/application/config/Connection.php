<?php 

class Connection
{	
	private $host;
	private $user;
	private $password;
	private $database;
	private $port;

	public function getDB(){
		$db = new SQLite3(__DIR__.'/../../../database/database.sqlite');
		
		return $db;
	}

	public function getMysql(){
		$servername = $this->host();
		$username = $this->user();
		$password = $this->password();
		$database = $this->databases();

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    	echo "<span style='color: #3c763d;'>Success!</strong> Connected successfully </span>";

		    return $conn;
		}
		catch(PDOException $e)
		{
		    echo "<span style='color: #a94442;'><strong>Alert!</strong> Connection failed</span>";
		}
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
