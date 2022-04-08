<div class="container-fluid">
	<form action="<?php echo base_url('index.php/export_donne') ?>" method="GET" id="form_exporte_donner">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-3">
						<label><i>Donne à partir de</i></label>
					</div>
						<div class="col-md-3">
							<?php if (isset($nChamp)): ?>
								<select class="form-control" name="cln" required="true">
									<?php foreach ($nChamp as $nChamps => $n): ?>
									<?php if ($n->Field!=="id" && $n->Field!=="id_liste" && $n->Field!=="quest" && $n->Field!=="user_save" && $n->Field!=="user_update" && $n->Field!=="updated_at" && $n->Field!=="created_at"): ?>
										<option value="<?php echo $n->Field ?>" <?php if (isset($gClnne) and $gClnne == $n->Field) echo "selected"; ?>><?php echo $n->Field ?></option>
									<?php endif ?>
	            			   		<?php endforeach ?>
								</select>
	       					<?php endif ?>
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-success form-control" id="btn_afficher_donner">
								<i class="fa fa-list"></i> Afficher
							</button>
						</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-primary form-control" id="btn_exporte_donner">
							<i class="fa fa-file-excel"></i> Exporter
						</button>
					</div>
				</div>
			</div>	
			<div class="col-md-6"></div>
		</div>
	</form>
	<hr>
	<div class="block-donne-exporter" style="width: 100%;overflow-y: scroll;background-color: white;margin-bottom: 20px;">
		<table class="table table-striped table-bordered table-sm">
		    <thead id="header-export-donne">
		      <tr>
		        <th class="text-center">Nom et prénom(s)</th>
		        <?php if (isset($quest)) { ?>
		        	<?php $scln = 100/ count($quest) <> 0 ? count($quest) : 1; ?> 
			        <?php foreach ($quest as $quests => $q) { ?>
			        	<th style="width: <?php echo $scln ?> %"  class="text-center"><?php echo str_replace("_"," ", explode("]", $q->lgne)[1]); ?></th>
			    	<?php } ?>
				<?php } ?>
		      </tr>
		    </thead>
		    <tbody>
		    <?php if (isset($donne)) { ?>
			    <?php foreach ($donne as $donne => $d) { ?>
			      <tr>
			      	<td><?php echo $d->nom; ?></td>
			      	<?php if ($quest) { ?>
			        	<?php foreach ($quest as $quests => $q) { ?>
			        		<td>
			        			<?php 
			        				if (isset($type)) {
			        					if ($type !== "int") {
			        						echo str_replace(",","",str_replace("0","",$d->{str_replace("'","_",$q->lgne)} ));
			        					}else{
			        						echo $d->{str_replace("'","_",$q->lgne)}; 
			        					}
			        				} 
			        			?>
			        		</td>
			        	<?php } ?>
					<?php } ?>
			      </tr>
			   <?php } ?>
			<?php } ?>
		    </tbody>
		  </table>
	</div>
</div>