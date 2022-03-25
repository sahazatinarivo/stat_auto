<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<form action="<?php echo base_url(); ?>index.php/stat-tableau.html" method="get">
				<div class="row">
					<div class="col-md-3">
						<?php if (isset($nChamp)): ?>
							<select class="form-control" name="{c}" required="true">
								<?php foreach ($nChamp as $nChamps => $n): ?>
								<?php if ($n->Field!=="id" && $n->Field!=="id_liste" && $n->Field!=="quest" && $n->Field!=="user_save" && $n->Field!=="user_update" && $n->Field!=="updated_at" && $n->Field!=="created_at" && explode("(",$n->Type)[0]=="int"): ?>
									<option value="<?php echo $n->Field ?>" <?php if (isset($gClnne) and $gClnne == $n->Field) echo "selected"; ?>><?php echo $n->Field ?></option>
								<?php endif ?>
	        			   		<?php endforeach ?>
							</select>
	   					<?php endif ?>
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-success btn-sm form-control"><i class="fa fa-list"></i> Afficher</button>
					</div>
					<div class="col-md-3">
						<button type="button" name="<?php if (isset($clne)){ echo base_url('index.php/export_stat?{c}='.$clne.''); }else{ echo "javascript:void(0)"; } ?>"  class="btn btn-primary btn-sm form-control" 
							<?php if (!isset($clne)){ echo 'disabled="disabled"'; } ?> id="export_stat">
							<i class="fa fa-file-excel"></i> Exporter</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6"></div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-9">
			<div class="block-donne-exporter">
				<table class="table table-striped table-bordered table-sm">
				    <thead>
				      <tr>
				        <th class="text-center" width="50%">Quest/Degré</th>
				        <?php if(isset($clnn)): ?>
					        <?php foreach($clnn as $clnns => $c): ?>
					        	<?php if (str_replace(" ","",$c->{ isset($clne)? $clne:0 } ) !== ""): ?>
					       			<th class="text-center"><?php echo $c->{ isset($clne)? $clne:0 }; ?></th>
					       		<?php endif ?>
					    	<?php endforeach ?>
				    	<?php endif ?>
				      </tr>
				    </thead>
				    <tbody>
				     <?php if(isset($qust)): ?>
					    <?php foreach($qust as $qusts => $q): ?>
					    	<tr>
						       	<td><?php echo str_replace("_", " ", explode("]", $q->lgne)[1]); ?></td>
						       	<?php if(isset($clnn)): ?>
					        		<?php foreach($clnn as $clnns => $c): ?>
					        			<?php 
					        				$cgbl = (int)$this->_exc->getCnQst($q->lgne);
							                $cont = (int)$this->_exc->getCountQst($clne,$c->{isset($clne)?$clne:""},$q->lgne);
							                $prcn = ($cont*100)/$cgbl;
					        			?>
					        			<?php if (str_replace(" ","",$c->{ isset($clne)? $clne:0 } ) !== ""): ?>
						       				<td class="text-center"><?php echo $prcn; ?> %</td>
						       			<?php endif ?>
						       		<?php endforeach ?>
				    			<?php endif ?>
					    	</tr>
					 	<?php endforeach ?>
				    <?php endif ?>
				    </tbody>
				</table>
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>