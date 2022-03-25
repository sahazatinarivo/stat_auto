<?php 
	function base_url(){
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
			$base_url = "https://";
		}else{
			$base_url = "http://";
		}
		$base_url .= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		return explode("installation/",$base_url)[0];
	}
?>

<form id="form_etap_3">
	<div id="block_etap_3">
		<input type="hidden" name="base_path" value="<?php echo base_url(); ?>">
		<h1 id="ce_partie">C'est parti!</h1>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-10"></div>
		<div class="col-md-2">
			<button type="button" class="btn btn-primary btn-suivant" id="suivant_finish">Finish >></button>
		</div>
	</div>
</form>
