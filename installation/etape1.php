<?php
	$path = __DIR__."/app/";
	$pdbs = __DIR__."/../database/database.sqlite";

	include_once $path."config/Connection.php";
	include_once $path."Models/Models.php";
	include_once $path."Models/Migration.php";
/*
|
|
|
|*/
	$host = isset($_POST['host']) ? $_POST['host']:"";
	$user = isset($_POST['user']) ? $_POST['user']:"";
	$pssd = isset($_POST['password']) ? $_POST['password']:"";
	$data = isset($_POST['database']) ? $_POST['database']:"";
	$port = isset($_POST['port']) ? $_POST['port']:"";
/*
|
|
|
|*/
	$dabses = new Connection($pdbs);
	$cDbses = $dabses->getDB();
	$models = new Models($cDbses);
	$models->desactive_database(0);
	$models->save_database($host,$user,$pssd,$data,$port,1,date("Y:m:d H:i"),date("Y:m:d H:i"));
/*
|
|
|
|*/
	$getSql = $dabses->getMysql();
	$mMysql = new Migration($getSql);
	$mMysql->migrate();
	$models->update_inst(1,"etape_1");
?>