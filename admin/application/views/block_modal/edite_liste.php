<div class="contenu-modal-ajout-liste">
	<form method="post" action="save_liste" name="{form_save_liste}">
		<div class="row">
			<div class="col-md-4 form-group">
				<label>Nom de liste</label>
				<input type="text" class="form-control" name="{nom_liste}" value="<?php echo isset($nomlist) ? $nomlist:""; ?>" required="true">
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4 form-group">
				<label>Type de liste</label>
				<select class="form-control" name="{type_liste}" required="true">
					<option value="">------Select type-----</option>
					<?php foreach ($tpLst as $tpLsts => $tp) {?>
						<option value="<?php echo $tp->id; ?>" 
							<?php if (isset($tpliste) and $tpliste == $tp->id) echo "selected"; ?>><?php echo isset($tp)? $tp->libelle:""; ?>
						</option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-2 form-group">
				<label>Activer ou non?</label><br>
				<input type="radio" name="{etat_liste}" value="1" id="etat_liste_1" 
				<?php if (isset($ettlist) and $ettlist == 1) echo "checked='checked'"; ?> required="true">
				<label>OUI</label><br>
				<input type="radio" name="{etat_liste}" value="0" id="etat_liste_0" 
				<?php if (isset($ettlist) and $ettlist == 0) echo "checked='checked'"; ?> required="true">
				<label>NON</label>
			</div>
		</div>
		<hr>
		<div class="row" id="modal-footer">
			<input type="hidden" name="{stock_id}" value="<?php echo isset($idliste) ? $idliste:""; ?>">
			<button type="submit" class="btn btn-success btn-sm save_nv_liste"><i class="fa fa-save"></i> Sauvegarder</button>&nbsp;
			<button type="button" class="btn btn-danger btn-sm annuler_sv_liste"><i class="fa fa-remove"></i> Annuler</button>
		</div>
	</form>
</div>	