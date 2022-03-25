<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-4 btn btn-primary etat_saisie">
			<h4><strong><i class="fa fa-keyboard"></i><i> Etat saisie 1</i></strong></h4>
			<span class="valeur-etat-saisie"><?php echo isset($saisieUns) ? $saisieUns : 0; ?> %</span>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-4 btn btn-info etat_saisie">
			<h4><strong><i class="fa fa-keyboard"></i><i> Etat saisie 2</i></strong></h4>
			<span class="valeur-etat-saisie"><?php echo isset($saisieDex) ? $saisieDex : 0; ?> %</span>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>