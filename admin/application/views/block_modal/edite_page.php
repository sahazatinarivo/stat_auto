<div class="contenu-modal-ajout-page">
	<form method="post" action="save_page" name="{form_save_page}">
		<div class="row">
			<div class="col-md-6 form-group">
				<label>Nom de page</label>
				<input type="text" class="form-control" name="{nom_page}" value="<?php echo isset($npg)?$npg:"";?>" required="true">
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5 form-group">
				<label>Activer ou non?</label><br>
				<input type="radio" name="{etat_page}" value="1" id="etat_page_1" 
				<?php if (isset($epg) and (int)$epg==1) echo "checked='checked'"; ?> required="true">
				<label>OUI</label><br>
				<input type="radio" name="{etat_page}" value="0" id="etat_page_0" 
				<?php if (isset($epg) and (int)$epg==0 ) echo "checked='checked'"; ?> required="true">
				<label>NON</label>
			</div>
		</div><hr>
		<div class="row">
			<input type="hidden" name="{stock_id_page}" value="<?php echo isset($idp) ? $idp:0;?>">
			<button type="submit" class="btn btn-success btn-sm save_nv_page"><i class="fa fa-save"></i> Sauvegarder</button>&nbsp;
			<button type="button" class="btn btn-danger btn-sm annuler_sv_page"><i class="fa fa-remove"></i> Annuler</button>
		</div>
	</form>
</div>

