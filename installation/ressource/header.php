<!DOCTYPE html>
<html>
<head>
	<title>Installation</title>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="<?php echo $conf->base_url(); ?>installation/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $conf->base_url(); ?>installation/assets/css/installation.css">
</head>
<body id="body-installation">
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="row" id="block_installation">
				<div class="inst-head">
					<h1> <span id="logo_st">St</span><span id="Logo_txt">Auto</span></h1>
					<input type="hidden" id="url_base" value="<?php echo $conf->base_url(); ?>installation/">
				</div><hr>