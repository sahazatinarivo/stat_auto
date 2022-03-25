<div class="container-fluid block-container">
	<div class="head-user-operateur">
		<a href="<?php echo base_url('index.php/ajout-admin.html'); ?>" class="btn btn-primary btn-sm">
			<i class="fa fa-plus-circle"></i> Ajouter nouveau Administrateur
		</a><hr>
	</div>
	<div class="row">
		<?php 
			if (isset($admin)) {
			foreach ($admin as $admins => $a) {
	  	?>
		<div class="col-md-2 block-operateur">
			<div class="photo-profil-user">
				<img class="img_operateur rounded-circle" src="<?php echo base_url('assets/image/no-image.png'); ?>">
			</div>


			<div class="nom_user">
				<div class="row">
					<div class="col-md-10">
						<span class="n_operateur"><?php echo $a->nom; ?></span><br>
						<span class="m_operateur"><?php echo $a->mail; ?></span>
					</div>
					<div class="col-md-2">
						<a href="<?php echo base_url(); ?>index.php/edit-nom-admin-<?php echo $a->slug; ?>.html" class="btn btn-info btn-sm edite_apropos_user"><i class="fa fa-edit"></i></a>
					</div>
				</div>
			</div>
			
			<div class="action-operateur">
				<div class="row">
					<div class="col-md-6">
						<a href="<?php echo base_url(); ?>index.php/edit-mdps-admin-<?php echo $a->slug; ?>.html" class="btn btn-primary btn-sm btn-operateur"><i class="fa fa-edit"></i></a>
					</div>
					<div class="col-md-6">
						<button type="button" onclick="if(confirm('Voulez vous vraiment supprimer ce page?')) location.href='<?php echo base_url(); ?>index.php/suppr_admin?a=<?php echo $a->slug; ?>'; " class="btn btn-danger btn-sm btn-operateur"><strong>x</strong></button>
					</div>
				</div>
			</div><br>
		</div>
		<?php 
			} 
		}
		?>

	<?php $message = $this->session->message ?>
  	<?php echo $message; ?>
	</div>
</div>
