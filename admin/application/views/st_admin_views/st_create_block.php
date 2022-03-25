<div class="container-fluid">
	<div class="div-btn-ajout-liste">
		<button type="button" class="btn btn-primary btn-sm btn-ajout-block">
		<i class="fa fa-plus"></i> Ajouter un block</button>
	</div>
	<hr>
	<div class="div-filtre-block row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="GET" action="creation-blck.html">
			<div class="row">
				<div class="col-md-8">
					<select class="form-control" name="{num_page}" required="required">
						<option value="">-------------Selectionner pages--------</option>
						<?php foreach ($page as $pages => $p) {?>
						<option value="<?php echo $p->id ?>" <?php if (isset($n_pg) && $p->id == $n_pg) { echo "selected"; } ?>><?php echo $p->nom_page; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Afficher</button>
				</div>
			</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
	<hr>
	<div class="block-ajout-liste">
	  <table class="table table-striped table-bordered table-sm">
	    <thead>
	      <tr>
	        <th width="10%" class="text-center">N°</th>
	        <th width="60%" class="text-center">Nom</th>
	        <th width="10%" class="text-center">Etat</th>
	        <th width="20%" class="text-center">Action</th>
	      </tr>
	    </thead>
	    <tbody>
	      <?php if ($block) { ?>
	      <?php $i=0; ?>
	      <?php foreach ($block as $pages => $l) { ?>
	      <?php $i++ ?>
	      <tr>
	        <td><span class="span-num-list"><?php echo $i; ?></span></td>
	        <td><strong><i><?php echo $l->nom_block; ?></i></strong></td>
	        <td class="text-center">	        	
	        	<strong>	        		
	        		<?php 
	        			if ((int)$l->etat== 0) {
	        				echo '<i class="fa fa-exclamation-circle btn-sm btn btn-danger" style="border-radius: 50%;"></i>';
	        			}else{
	        				echo '<i class="fa fa-check-circle btn-sm btn btn-success" style="border-radius: 50%;"></i>';
	        			}
	        		?>
	        	</strong></td>
	        <td class="text-center">
	        	<button class="btn btn-primary btn-sm btn_action_creation" id="edite_block_<?php echo $l->id ?>">
	        		<i class="fa fa-edit"></i>
	        	</button>
	        	<button class="btn btn-danger btn-sm btn_action_creation" onclick="if(confirm('Voulez vous vraiment supprimer ce block?')) location.href='<?php echo base_url(); ?>index.php/suppr_block?id=<?php echo $l->id; ?>';">
	        		<i class="fa fa-trash"></i>
	        	</button>
	        </td>
	      </tr>
	  	  <?php } } ?>
	    </tbody>
	  </table>
	</div>
</div>