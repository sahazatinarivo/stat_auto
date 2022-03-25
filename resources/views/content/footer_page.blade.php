<hr>
<div id="footer-mask" class="container-fluid">
	<div class="col-md-4">
		<a href="{{ Route('mask') }}?pers={{ $pers }}&nmpg={{ isset($pPag) ? $pPag:1 }}" class="btn btn-primary form-control">
			<i class="fa fa-angle-left"></i> Précedent
		</a>
	</div>
	<div class="col-md-4">
		<button type="button" class="btn btn-success form-control" id="save_donne_saisie">
			<span id="loader_gif"><img src="{{ asset('asset/images/loader.gif') }}"></span><i class="fa fa-save"></i> Enregistrer
		</button>
	</div>
	<div class="col-md-4">
		<a href="{{ Route('mask') }}?pers={{ $pers }}&nmpg={{ isset($sPag) ? $sPag:1 }}" class="btn btn-primary form-control">
			Suivant <i class="fa fa-angle-right"></i>
		</a>
	</div>
</div>
<br>