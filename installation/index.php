<?php 
	$path = __DIR__."/app/";
	$pdbs = __DIR__."/../database/database.sqlite";

	include_once $path."config/Connection.php";
	include_once $path."Models/Models.php";
	include_once $path."Controller/Installs.php";
	include_once $path."Config/Config.php";
	/*---------------------------------------
	|
	|
	|
	|----------------------------------------
	*/
	$bdds = new Connection($pdbs);
	$cnDb = $bdds->getDB();
	$mdls = new Models($cnDb);
	$cntr = new Installs();
	$conf = new Configs();
	/*
	|
	|
	|*/
	$insTrm = $mdls->getCount();
	$etapes = $mdls->getEtap();
	$etapSv = (int)$etapes+1;

	if ((int)$insTrm == 3) {
		header('location:'.$conf->base_url().'');
	}else{
		require_once'ressource/header.php';
		if ($etapes > 0) {
			require_once'ressource/views/etape_'.$etapSv.'.php';
		}else{
			require_once'ressource/views/etape_1.php';
		}
		require_once'ressource/footer.php';
	}
?>