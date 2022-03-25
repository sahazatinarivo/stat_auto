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
      	<tr>
    		<td class="text-center">
    			<input type="text" value="<?php echo isset($nom) ? $nom:""; ?>" class="form-control" id="input-nom-champ">
    			<input type="hidden" class="form-control" id="stock-old-name" value="<?php echo isset($nom) ? $nom:""; ?>">
    		</td>
    		<td class="text-center">
    			<select class="form-control" id="select-type-champ">
    				<option value="">-------</option>
    				<option value="INT" <?php if (isset($typ) and $typ=="int") echo "selected"; ?>>Integer</option>
    				<option value="VARCHAR" <?php if (isset($typ) and $typ=="varchar") echo "selected"; ?>>Varchart</option>
    				<option value="TEXT" <?php if (isset($typ) and $typ=="text") echo "selected"; ?>>Text</option>
    			</select>
    		</td>
    		<td class="text-center">
    			<input type="number" value="<?php echo isset($lmts) ? $lmts:""; ?>" class="form-control" id="input-limit-champ">
    		</td>
            <td class="text-center">                    
                <select class="form-control" id="select-null-champ">
                    <option value="1" <?php if (isset($nul) and $nul=="YES") echo "selected"; ?>>OUI</option>
                    <option value="0" <?php if (isset($nul) and $nul=="NO") echo "selected"; ?>>NON</option>
                </select>
            </td>
    	</tr>
    </tbody>
</table>
<hr>
<button class="btn btn-danger btn-sm" id="annuler-modif-table"><i class="fa fa-remove"></i> Annuler</button>
<button class="btn btn-primary btn-sm" id="run-modif-table" value="datas_uns"><i class="fa fa-save"></i> Enregistrer la modification</button>