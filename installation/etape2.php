<?php
	$path = __DIR__."/app/";
	$pdbs = __DIR__."/../database/database.sqlite";

	include_once $path."config/Connection.php";
	include_once $path."Models/Models.php";
/*
|
|
|
|*/
	$slug = mt_rand(0,mt_getrandmax()).date("Ymd").mt_rand(0,mt_getrandmax());
	$noms = isset($_POST['noms']) ? $_POST['noms']:"";
	$mail = isset($_POST['mail']) ? $_POST['mail']:"";
	$mdps = isset($_POST['mdps']) ? md5($_POST['mdps']):"";
/*
|
|
|
|*/
	$dabses = new Connection($pdbs);
	$mysQls = $dabses->getMysql();
	$sQlite = $dabses->getDB();
	$mMysql = new Models($mysQls);
	$msQlit = new Models($sQlite);
/*
|
|
|
|*/
	$mMysql->insert_admin($slug,$noms,$mail,$mdps);
	$msQlit->update_inst(1,"etape_2");
?>