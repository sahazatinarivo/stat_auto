<div class="contenu-modal-detail-liste">
	<div class="row">
		<div class="col-md-4">
			 <h6><i>Nom de la liste: <strong><span class="detail_nom_liste"><?php echo isset($nls) ? $nls:""; ?></span></strong></i></h6>
		</div>
		<div class="col-md-4">
			<h6><i>Type: <strong><span class="detail_type_liste"></span><?php echo isset($tls) ? $tls:""; ?></strong></i></h6>
		</div>
		<div class="col-md-3">
			<h6>
				<i>Etat: </i>
				<?php 
        			if (isset($ett) && (int)$ett == 0) {
        				echo '<i class="fa fa-exclamation-circle btn-sm btn btn-danger" style="border-radius: 50%;"></i>';
        			}else{
        				echo '<i class="fa fa-check-circle btn-sm btn btn-success" style="border-radius: 50%;"></i>';
        			}
        		?>
			</h6>
		</div>
		<div class="col-md-1">
			<button type="button" class="btn btn-primary btn-sm" id="toogle-ajout-l" >
				<i class="fa fa-plus"></i>
			</button>
		</div>
	</div><hr>

	<div id="demo" class="collapse">
		<div class="row">
			<div class="col-md-4">
				<label>Libelle</label>
				<input type="text" class="form-control" name="{nom_liste_l}">
			</div>
			<div class="col-md-6">
				<label>Activer ou non?</label><br>
				<input type="radio" name="{etat_liste_l}" value="1" id="etat_liste_l_1">
				<label>OUI</label><br>
				<input type="radio" name="{etat_liste_l}" value="0" id="etat_liste_l_0" checked="checked">
				<label>NON</label>
			</div>
			<div class="col-md-2">
				<input type="hidden" name="{stk_id_liste}" value="<?php echo isset($idl) ? $idl:""; ?>">
				<input type="hidden" name="{stk_id_liste_l}" value="0">
				<button type="button" class="btn btn-success btn-sm" id="save_liste_l">
					<i class="fa fa-save"></i></button>
				<button type="button" class="btn btn-danger btn-sm" id="fermer_clps_l">X</button>
			</div>
		</div>
	<hr>
	</div> 

	<div class="row">
		<table class="table table-striped table-bordered table-sm">
		    <thead>
		      <tr>
		        <th class="text-center" width="10%">N°</th>
		        <th class="text-center" width="50%">Nom</th>
		        <th class="text-center" width="20%">etat</th>
		        <th class="text-center" width="20%">Action</th>
		      </tr>
		    </thead>
		    <tbody id="c_liste_liste">
		    	<?php $i=0; ?>
		    	<?php foreach ($liste as $listes => $l) { ?>
		    	<?php $i++; ?>
		    	<tr>
					<td><span class="span-num-list"><?php echo $i; ?></span></td>
					<td class="text-left"><strong><i><?php echo isset($l) ? $l->libelle:""; ?></i></strong></td>
					<td>
						<strong>
		        		<?php 
		        			if ((int)$l->etat == 0) {
		        				echo '<i class="fa fa-exclamation-circle btn-sm btn btn-danger" style="border-radius: 50%;"></i>';
		        			}else{
		        				echo '<i class="fa fa-check-circle btn-sm btn btn-success" style="border-radius: 50%;"></i>';
		        			}
		        		?>
	        			</strong>
	        		</td>
					<td class="text-center">
					    <button type="button" class="btn btn-primary btn-sm btn_action_creation" id="edite_listel_<?php echo isset($l) ? $l->id:""; ?>">
					       	<i class="fa fa-edit"></i>
					    </button>
					    <button type="button" class="btn btn-danger btn-sm btn_action_creation" id="delete_listel_<?php echo isset($l) ? $l->id:""; ?>">
					       	<i class="fa fa-trash"></i>
					    </button>
					</td>
				</tr>
				<?php } ?>
		    </tbody>
		  </table>
	</div>
</div>	