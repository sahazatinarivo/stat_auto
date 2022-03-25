<div class="container-fluid">
	<div class="div-btn-ajout-liste">
		<button type="button" class="btn btn-primary btn-sm btn-ajout-page">
		<i class="fa fa-plus"></i> Ajouter un page</button>
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
	      <?php $i=0; ?>
	      <?php foreach ($page as $pages => $l) { ?>
	      <?php $i++ ?>
	      <tr>
	        <td><span class="span-num-list"><?php echo $i; ?></span></td>
	        <td><strong><i><?php echo $l->nom_page; ?></i></strong></td>
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
	        	<button class="btn btn-primary btn-sm btn_action_creation" id="edite_page_<?php echo $l->id ?>">
	        		<i class="fa fa-edit"></i>
	        		</button>
	        	<button class="btn btn-danger btn-sm btn_action_creation" onclick="if(confirm('Voulez vous vraiment supprimer ce page?')) location.href='<?php echo base_url(); ?>index.php/suppr_page?id=<?php echo $l->id; ?>'; " id="detail_page_<?php echo $l->id ?>">
	        		<i class="fa fa-trash"></i>
	        	</button>
	        </td>
	      </tr>
	  	  <?php } ?>
	    </tbody>
	  </table>
	</div>
</div>