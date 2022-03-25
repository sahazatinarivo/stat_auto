<div class="container-fluid" id="block-creation-table">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<span id="nbr_row_importer"><?php echo isset($lsteAl) ? count($lsteAl): 0; ?></span> <strong> Row importé(s)</strong>
			<span type="button" class="btn btn-primary btn-sm" id="afficher_modal_import">
				<i class="fa fa-file-upload"></i> Import
			</span>
			<a href="<?php echo base_url(); ?>index.php/init_table" class="btn btn-danger btn-sm" id="vider_liste_importer" onclick="return(confirm('Etes-vous sûr de vouloir reinitialiser?'));">
				<i class="fa fa-eraser"></i> Vider table
			</a>
		</div>
	</div><hr>
	<div id="block-donne-importer">
		<table class="table table-striped table-bordered table-sm">
		    <thead>
		      <tr>
		      	<?php if (isset($clnTbl)) { $i=0;?>
			    	<?php foreach ($clnTbl as $clnTbls => $c){ $i++;?>
			    		<?php if ($c->Field !== "slug") { ?>
				        <th class="text-center" width="5%"><?php echo $c->Field; ?></th>
				       	<?php } ?>
			        <?php } ?>
		    	<?php } ?>
		      </tr>
		    </thead>
		    <tbody id="body-table-liste-importer">
		    	<?php if (isset($lsteIp) and count($lsteIp) > 0) { ?>
		    		<?php foreach ($lsteIp as $lsteIps => $l){?>
		    			<tr>
					    	<?php foreach ($clnTbl as $clnTbls => $c){ ;?>
					    		<?php if ($c->Field !== "slug") { ?>
						    		<?php if ($c->Field == "id") { ?>
						    			<td class="text-center" width="5%">
						    				<span class="span-num-list"><?php echo $l->{$c->Field}; ?></span>
						    			</td>
						    		<?php }else{ ?>
						    			<td><?php echo $l->{$c->Field}; ?></td>
						    		<?php } ?>
						    	<?php } ?>
					        <?php } ?>
		    			</tr>
		    		<?php } ?>
		    	<?php } ?>
		    </tbody>
		</table>
		<?php if (isset($lsteIp) and count($lsteIp) == 0) { ?>
			<div class="alert alert-danger alert_aucun"><i>Auccun liste importé</i></div>
		<?php } ?>
		<div class="btn-group pagination_btn">
			<?php 
				$count = isset($lsteAl) ? count($lsteAl) : 0;
				$nCont = $count/100;
				$pDnr = 0;
				if ($count <= 100) {
					$pDnr = 1;
				}else{
					$pDnr = $count - 100;
				}
			?>
			<a href="<?php echo base_url()?>index.php/import_donne?dePg=0" class="btn btn-primary btn-sm"> << </a>
			<?php $pr= $nCont; $sv= $nCont + 100;?>
			<?php for ($i=0; $i <= (int)$nCont ; $i++) { ?>
			<?php 
				$pr+=100; 
				$nvPrc = $pr -100;
			?>
			<a href="<?php echo base_url()?>index.php/import_donne?dePg=<?php echo round($nvPrc); ?>" class="btn btn-info btn-sm <?php if (isset($_GET['dePg']) and round($nvPrc) == (int)$_GET['dePg']) { echo "active"; } ?>"><?php echo $i+1; ?></a>
			<?php } ?>
			<a href="<?php echo base_url()?>index.php/import_donne?dePg=<?php echo $pDnr; ?>" class="btn btn-primary btn-sm"> >> </a>
		</div> 
	</div>
</div>