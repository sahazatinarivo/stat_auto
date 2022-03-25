<div class="contenu-modal-ajout-block">
	<form method="post" action="save_block" name="{form_save_block}">
		<div class="row">
			<div class="col-md-4 form-group">
				<label>Libelle</label>
				<input type="text" class="form-control" name="{nom_block}" value="<?php echo isset($nblc)?$nblc:""; ?>" required="true">
			</div>
			<div class="col-md-4 form-group">
				<label>Page</label>
				<select class="form-control" name="{num_page_block}" required="required">
					<option value="">-------Selectionner pages-------</option>
					<?php foreach ($pages as $page => $p) {?>
					<option value="<?php echo $p->id ?>" 
						<?php if (isset($idpg) && $p->id == $idpg) { echo "selected"; } ?>>
						<?php echo $p->nom_page; ?>		
					</option>
					<?php } ?>
				</select>
			</div>
			<div class="col-md-1"></div>		
			<div class="col-md-3 form-group">
				<label>Activer ou non?</label><br>
				<input type="radio" name="{etat_block}" value="1" id="etat_block_1"
				<?php if (isset($eblc) and $eblc == 1) echo "checked='checked'"; ?> required="required">
				<label>OUI</label><br>
				<input type="radio" name="{etat_block}" value="0" id="etat_block_0"
				<?php if (isset($eblc) and $eblc == 0) echo "checked='checked'"; ?> required="required">
				<label>NON</label>
			</div>
		</div><hr>
		<div class="row">
			<div class="col-md-2 form-group"></div>	
			<div class="col-md-4 form-group">
				<?php if(isset($tp_bc)) { ?>
				<label>Type block</label>
				<select class="form-control" name="{type_blck}" required="required">
					<option value="">-----Selectionner type block-----</option>
					<?php foreach ($tp_bc as $tp_bcs => $tp) {?>
					<option value="<?php echo $tp->id_type_block ?>" <?php if (isset($tpbc) && $tp->id_type_block == $tpbc) { echo "selected"; } ?>><?php echo $tp->type_block; ?></option>
					<?php } ?>
				</select>
				<?php } ?>
			</div>
			<div class="col-md-4 form-group" id="block_ligne_blck">
				<?php if(!empty($tpbc) and $tpbc==1) { ?>
				<label>Liste correspondant</label>
				<select class="form-control" name="{ligne_blck}" required="required">
					<option value="">-----Selectionner Listes-----</option>
					<?php foreach ($liste as $listes => $p) {?>
					<option value="<?php echo $p->id ?>" <?php if (isset($lblc) && $p->id == $lblc) { echo "selected"; } ?>><?php echo $p->nom_liste; ?></option>
					<?php } ?>
				</select>
				<?php } ?>
			</div>	
			<div class="col-md-2 form-group"></div>	
		</div>
		<hr>
		<div class="row">
			<input type="hidden" name="{stock_id_block}" value="<?php echo isset($idbc)?$idbc:""; ?>">
			<button type="submit" class="btn btn-success btn-sm save_nv_block"><i class="fa fa-save"></i> Sauvegarder</button>&nbsp;
			<button type="button" class="btn btn-danger btn-sm annuler_sv_block"><i class="fa fa-remove"></i> Annuler</button>
		</div>
	</form>
</div>