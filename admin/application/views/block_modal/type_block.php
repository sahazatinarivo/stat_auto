<?php if(!empty($tpbck) and $tpbck==1) { ?>
<label>Liste correspondant</label>
<select class="form-control" name="{ligne_blck}" required="required">
	<option value="">-----Selectionner Listes-----</option>
	<?php foreach ($liste as $listes => $p) {?>
	<option value="<?php echo $p->id ?>"><?php echo $p->nom_liste; ?></option>
	<?php } ?>
</select>
<?php }else{ ?>

<?php } ?>