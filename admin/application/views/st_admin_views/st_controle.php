<div class="container-fluid">
	<div class="row head-control">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form method="GET" action="<?php echo base_url(); ?>index.php/controle-saisie.html">
				<div class="row">
					<div class="col-md-8">
						<select class="form-control" name="{n}" required="required">
							<option value="">-----Selectionner colonne----</option>
							<?php foreach ($cChamp as $cChamps => $p) {?>
							<option value="<?php echo $p->champ ?>" <?php if (isset($_GET['{n}']) && $p->champ == $_GET['{n}']) { echo "selected"; } ?>><?php echo $p->champ; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-4">
						<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Afficher</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div><hr>
	<div class="row body-control">
		<table class="table table-striped table-bordered table-sm">
			<thead>
			  <tr>
			    <th width="30%" class="text-center">Questionnaire</th>
			    <th width="15%" class="text-center">Saisie 1</th>
			    <th width="15%" class="text-center">Saisie 2</th>
			   	<th width="20%" class="text-center">Opérateur saisie 1</th>
			    <th width="20%" class="text-center">Opérateur saisie 2</th>
			  </tr>
			</thead>
			<tbody>
				<?php if (isset($nCmpr)): ?>
					<?php foreach ($nCmpr as $nCmprs): ?>
						<tr>
					    	<td><span class="span-num"><?php echo $nCmprs->quest; ?></span></td>
					    	<td><span class="span-num"><?php echo $nCmprs->colonneA; ?></span></td>
					    	<td><span class="span-num"><?php echo $nCmprs->colonneB; ?></span></td>
					    	<td><span class="span-num"><?php echo $nCmprs->oper_1; ?></span></td>
					    	<td><span class="span-num"><?php echo $nCmprs->oper_2; ?></span></td>
					  	</tr>
					<?php endforeach ?>
				<?php endif ?>
			</tbody>
		</table>
	</div>
</div>