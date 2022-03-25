<div class="container-fluid block-container">
	<div class="head-user-operateur">
		<a href="<?php echo base_url('index.php/ajout-operateur.html'); ?>" class="btn btn-primary btn-sm">
			<i class="fa fa-plus-circle"></i> Ajouter nouveau operateur
		</a><hr>
	</div>
	<div class="row">
		<?php 
		if (isset($operat)) { 
		foreach ($operat as $operats => $o) { ?>
			<div class="col-md-2 block-operateur">
				<div class="photo-profil-user">
					<img class="img_operateur rounded-circle" src="<?php echo base_url('assets/image/no-image.png'); ?>">
				</div>
				
				<div class="nom-operateur">
					<span class="n_operateur"><?php echo $o->nom; ?></span><br>
					<span class="m_operateur"><?php echo $o->mail; ?></span>
				</div>
				
				<div class="action-operateur">
					<div class="row">
						<div class="col-md-6">
							<a href="<?php echo base_url(); ?>index.php/ajout-operateur.html?o=<?php echo $o->slug; ?>" class="btn btn-primary btn-sm btn-operateur"><i class="fa fa-edit"></i></a>
						</div>
						<div class="col-md-6">
							<a href="javascript:void(0)" onclick="if(confirm('Voulez vous supprimer?')) location.href='<?php echo base_url(); ?>index.php/suppr_operat?o=<?php echo $o->slug; ?>';" class="btn btn-danger btn-sm btn-operateur"><strong>x</strong></a>
						</div>
					</div>
				</div><br>
			</div>
		<?php }
		} ?>
	</div>
</div>