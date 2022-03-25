<div class="contenu-modal-ajout-champ">
	<form method="post" action="save_champ" name="{form_save_champ}">
		<div class="row">
			<div class="col-md-5 form-group">
				<label>Libelle</label>
				<input type="text" class="form-control" name="{nom_champ}" value="<?php echo isset($nmCl)?$nmCl:""; ?>" required="true">
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-3 form-group">
				<label>Activer ou non?</label><br>
				<input type="radio" name="{etat_champ}" value="1" id="etat_champ_1"
				<?php if (isset($etCl) and $etCl == 1) echo "checked='checked'"; ?> required="required">
				<label>OUI</label><br>
				<input type="radio" name="{etat_champ}" value="0" id="etat_champ_0"
				<?php if (isset($etCl) and $etCl == 0) echo "checked='checked'"; ?> required="required">
				<label>NON</label>
			</div>
		</div><hr>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<label>Dégre d'evaluation</label>
				<select class="form-control" name="{degre_eval}" required="required">
					<option value="">-------Selectionner degre------</option>
					<?php foreach ($liste as $listes => $d) {?>
					<option value="<?php echo $d->id ?>" <?php if (isset($dgCl) and $dgCl==$d->id) echo "selected"; ?>><?php echo $d->nom_liste; ?></option>
					<?php } ?>
					<option value="0" <?php if (isset($dgCl) and $dgCl==0) echo "selected"; ?>>Libre</option>
				</select>
			</div>		
			<div class="col-md-4"></div>
		</div><hr>
		<div class="row">
			<input type="hidden" name="{stock_id_champ}" value="<?php echo isset($idCl)?$idCl:""; ?>">
			<button type="submit" class="btn btn-success btn-sm save_nv_champ"><i class="fa fa-save"></i> Sauvegarder</button>&nbsp;
			<button type="button" class="btn btn-danger btn-sm annuler_sv_champ"><i class="fa fa-remove"></i> Annuler</button>
		</div>
	</form>
</div>