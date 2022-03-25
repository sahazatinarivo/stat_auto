<div class="container-fluid">
	<div class="div-btn-ajout-liste">
		<button type="button" class="btn btn-primary btn-sm btn-ajout-champ">
		<i class="fa fa-plus"></i> Ajouter un champ</button>
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
	      <?php if (isset($block)) { ?>
	      <?php $i=0; ?>
	      <?php foreach ($champ as $champs => $c) { ?>
	      <?php $i++ ?>
	      <tr>
	        <td><span class="span-num-list"><?php echo $i; ?></span></td>
	        <td><strong><i><?php echo $c->nom_champ; ?></i></strong></td>
	        <td class="text-center">	        	
	        	<strong>	        		
	        		<?php 
	        			if ((int)$c->etat== 0) {
	        				echo '<i class="fa fa-exclamation-circle btn-sm btn btn-danger" style="border-radius: 50%;"></i>';
	        			}else{
	        				echo '<i class="fa fa-check-circle btn-sm btn btn-success" style="border-radius: 50%;"></i>';
	        			}
	        		?>
	        	</strong></td>
	        <td class="text-center">
	        	<button class="btn btn-primary btn-sm btn_action_creation" id="edite_champ_<?php echo $c->id ?>">
	        		<i class="fa fa-edit"></i>
	        	</button>
	        	<button class="btn btn-danger btn-sm" onclick="if(confirm('Voulez vous vraiment supprimer ce champ?')) location.href='<?php echo base_url(); ?>index.php/suppr_champ?id=<?php echo $c->id; ?>';">
	        		<i class="fa fa-trash"></i>
	        	</button>
	        </td>
	      </tr>
	  	  <?php } } ?>
	    </tbody>
	  </table>
	</div>
</div>