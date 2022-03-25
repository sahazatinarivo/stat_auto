<table class="table table-striped table-bordered table-sm">
    <thead>
      <tr>
        <th class="text-center" width="40%">Nom du champ</th>
        <th class="text-center" width="25%">Type</th>
        <th class="text-center" width="20%">Nbr Char</th>
        <th class="text-center" width="15%">Null</th>
      </tr>
    </thead>
    <tbody>
    	<?php if (isset($nbrChmp)) { ?>
	    	<?php for ($i=1; $i <= intval($nbrChmp) ; $i++) { ?>
	      	<tr>
        		<td class="text-center">
        			<input type="text" class="form-control" id="input-nom-champ-<?php echo $i; ?>">
        			<input type="hidden" class="form-control" id="stock-nombre-champ" value="0">
        		</td>
        		<td class="text-center">
        			<select class="form-control" id="select-type-champ-<?php echo $i; ?>">
        				<option value="">-------</option>
        				<option value="INT">Integer</option>
        				<option value="VARCHAR">Varchart</option>
        				<option value="TEXT">Text</option>
        			</select>
        		</td>
        		<td class="text-center"><input type="number" class="form-control" id="input-limit-champ-<?php echo $i; ?>"></td>
                <td class="text-center">                    
                    <select class="form-control" id="select-null-champ-<?php echo $i; ?>">
                        <option value="1">OUI</option>
                        <option value="0">NON</option>
                    </select>
                </td>
	    	</tr>
	    	<?php }?>
    	<?php } ?>
    </tbody>
</table>
<hr>
<button class="btn btn-danger btn-sm" id="annuler-creation-table"><i class="fa fa-remove"></i> Annuler</button>
<button class="btn btn-primary btn-sm" id="run-creation-table" value="<?php echo isset($table) ? $table:"" ?>"><i class="fa fa-save"></i> Créer le table</button>