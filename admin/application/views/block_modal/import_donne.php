<fieldset class="fieldset-import-donne">
	<legend class="legend-new-table">Importer le liste a evalué</legend>
	<div class="form-content">
		<form id="form-import-liste" method="post" enctype="multipart/form-data">
			<table class="table table-striped table-bordered table-sm">
			    <thead>
			      <tr>
			        <th class="text-center" width="5%">N°</th>
			        <th class="text-center" width="20%">Champ</th>
			        <th class="text-center" width="40%">Type</th>
			        <th class="text-center" width="15%">Null</th>
			        <th class="text-center" width="20%">Cellule</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<input type="hidden" name="nombre_table" class="input-nbr-champ" value="<?php echo (int)count($clnTbl); ?>">
			    	<?php if (isset($clnTbl)) { $i=0;?>
			    	<?php foreach ($clnTbl as $clnTbls => $c){ $i++;?>
			      	<tr>
			        	<td class="text-center"><span class="span-num-list"><?php echo $i; ?></span></td>
			        	<td><strong><i><?php echo $c->Field; ?></i></strong></td>
			        	<td><strong><i><?php echo $c->Type." ".$c->Extra; ?></i></strong></td>
			        	<td class="text-center"><strong><i><?php echo $c->Null; ?></i></strong></td>
			        	<td class="text-center">
			        		<?php if ($c->Field!=="id" and $c->Field!=="slug") { ?>
			        			<input type="text" name="cellule_<?php echo $i; ?>" class="form-control" required="true">
			        			<input type="hidden" name="champ_<?php echo $i; ?>" class="input-nbr-champ" value="<?php echo $c->Field; ?>">
			        		<?php } ?>
			        	</td>
			    	</tr>
			    	<?php } ?>
			    	<?php } ?>
			    </tbody>
			</table>
			<hr>
			<div class="row block-file-excel">
				<div class="col-md-1"></div>
				<div class="col-md-3"><h4><i>File Excel:</i></h4></div>
				<div class="col-md-3">
					<input type="file" name="file_Excel_importer" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required="true"/>
				</div>
				<div class="col-md-5">
					<span type="button" class="btn btn-primary" id="run_import_donne">
						<i class="fa fa-file-upload"></i> Demmarer l'importation
					</span>
				</div>
			</div>
		</form>
	</div>
</fieldset>