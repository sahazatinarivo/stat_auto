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
	$base_path = isset($_POST['base_path']) ? $_POST['base_path']:"";
/*
|
|
|
|*/
	$dabses = new Connection($pdbs);
	$sQlite = $dabses->getDB();
	$msQlit = new Models($sQlite);
/*
|
|
|
|*/	$msQlit->update_urls(0);
	$msQlit->insert_url($base_path,1);
	$msQlit->update_inst(1,"etape_3");