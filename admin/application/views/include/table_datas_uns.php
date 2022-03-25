<div class="container-fluid" id="block-creation-table">
	<div id="rech_db">
		<fieldset class="fieldset-new-table">
			<legend class="legend-new-table">Ajout colonne table</legend>
			<div class="form-content">
				<span>Nom</span>
				<span class="span-nom-table"> st_datas</span>
				<span>Nombre de colonnes</span>
				<input type="number" name="input-nbr-champ" class="input-nbr-champ" value="0">
			</div>
		</fieldset>
	</div>
	<div id="bas_nv_table">
		<button type="button" id="cree-table-liste" value="datas_uns">Executer</button>
	</div>
	<hr>
	<table class="table table-striped table-bordered table-sm">
	    <thead>
	      <tr>
	        <th class="text-center" width="5%">N°</th>
	        <th class="text-center" width="25%">Champ</th>
	        <th class="text-center" width="25%">Type</th>
	        <th class="text-center" width="25%">Null</th>
	        <th class="text-center" width="20%">Action</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php if (isset($clnTbl)) { $i=0;?>
	    	<?php foreach ($clnTbl as $clnTbls => $c){ $i++;?>
	    	<?php if ($c->Field !== "id_liste" && $c->Field !== "quest" && $c->Field !== "user_save" && $c->Field !== "user_update" && $c->Field !== "created_at" && $c->Field !== "updated_at") { ?>
	      	<tr>
	        	<td class="text-center"><span class="span-num-list"><?php echo $i; ?></span></td>
	        	<td><strong><i><?php echo $c->Field; ?></i></strong></td>
	        	<td><strong><i><?php echo $c->Type." ".$c->Extra; ?></i></strong></td>
	        	<td><strong><i><?php echo $c->Null; ?></i></strong></td>
	        	<td class="text-center">
	        		<?php if ($c->Field!=="id" and $c->Field!=="slug") { ?>
	        			<a href="#" class="btn btn-primary btn-sm" id="edite_column_datas-<?php echo $c->Field; ?>">
	        				<i class="fa fa-edit"></i>
	        			</a>
	        			<a href="<?php echo base_url(); ?>index.php/drop_column_table?{n}=<?php echo urlencode($c->Field); ?>&&{t}=datas_uns" class="btn btn-danger btn-sm" onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'));">
	        				<i class="fa fa-trash-alt"></i>
	        			</a>
	        		<?php } ?>
	        	</td>
	    	</tr>
	    	<?php } ?>
	    	<?php } ?>
	    	<?php } ?>
	    </tbody>
	</table>
	<?php if (isset($tblExs)) { ?>
		<div class="alert alert-danger info-aucune">
			Aucune table pour stoquer le liste a evalué
		</div>
	<?php } ?>
</div>