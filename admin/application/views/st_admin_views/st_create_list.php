<div class="container-fluid">
	<div class="div-btn-ajout-liste">
		<button type="button" class="btn btn-primary btn-sm btn-ajout-liste">
		<i class="fa fa-plus"></i> Ajouter un liste</button>
	</div>
	<hr>
	<div class="block-ajout-liste">
	  <table class="table table-striped table-bordered table-sm">
	    <thead>
	      <tr>
	        <th class="text-center" width="10%">N°</th>
	        <th class="text-center" width="40%">Nom</th>
	        <th class="text-center" width="20%">Type</th>
	        <th class="text-center" width="10%">Etat</th>
	        <th class="text-center" width="20%">Action</th>
	      </tr>
	    </thead>
	    <tbody>
	      <?php $i=0; ?>
	      <?php foreach ($liste as $listes => $l) { ?>
	      <?php $i++ ?>
	      <tr>
	        <td><span class="span-num-list"><?php echo $i; ?></span></td>
	        <td><strong><i><?php echo $l->nom_liste; ?></i></strong></td>
	        <td><strong><i><?php echo $l->libelle; ?></i></strong></td>
	        <td class="text-center">
	        	<strong>
	        		<?php 
	        			if ((int)$l->etat== 0) {
	        				echo '<i class="fa fa-exclamation-circle btn-sm btn btn-danger" style="border-radius: 50%;"></i>';
	        			}else{
	        				echo '<i class="fa fa-check-circle btn-sm btn btn-success" style="border-radius: 50%;"></i>';
	        			}
	        		?>
	        	</strong>
	    	</td>
	        <td class="text-center">
	        	<button class="btn btn-primary btn-sm btn_action_creation" id="edite_liste_<?php echo $l->id ?>">
	        		<i class="fa fa-edit"></i>
	        	</button>
	        	<button class="btn btn-info btn-sm btn_action_creation" id="detail_liste_<?php echo $l->id ?>">
	        		<i class="fa fa-plus-circle"></i>
	        	</button>
	        	<button class="btn btn-danger btn-sm btn_action_creation" id="delete_liste_<?php echo $l->id ?>">
	        		<i class="fa fa-trash"></i>
	        	</button>
	        </td>
	      </tr>
	  	  <?php } ?>
	    </tbody>
	  </table>
	</div>
</div>