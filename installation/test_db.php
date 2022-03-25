 <?php
	$servername = isset($_POST['host']) ? $_POST['host']:"";
	$username = isset($_POST['user']) ? $_POST['user']:"";
	$password = isset($_POST['password']) ? $_POST['password']:"";
	$database = isset($_POST['database']) ? $_POST['database']:"";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	echo "<span style='color: #3c763d;'>Success!</strong> Connected successfully </span>";
	    }
	catch(PDOException $e)
	    {
	    	echo "<span style='color: #a94442;'><strong>Alert!</strong> Connection failed</span>";
	    }
?> 