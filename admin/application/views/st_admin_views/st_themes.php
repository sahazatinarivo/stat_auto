<div class="container-fluid" id="block-theme">
	<div class="row block-head-theme">
		<div class="col-md-10"></div>
		<div class="col-md-2">
			<div class="row">
				<div class="col-md-8" id="block-input-head">
					<input type="text" class="theme-input-head" placeholder="#code couleur" value="<?php echo isset($heads) ? str_replace(",", "", $heads):""; ?>">
				</div>
				<div class="col-md-4" id="block-button-head">
					<button type="button" class="btn btn-primary btn-sm" id="theme-button-head">
						<i class="fa fa fa-edit"></i>
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="row head-team" style="background-color: <?php echo isset($heads) ? str_replace(",", "", $heads):""; ?>">
		<?php 
			if (isset($logo1) and $logo1!=="") {
				$logo_1 = "../public/image_profils/".str_replace(",","",$logo1);
			}else{
				$style1 = "rounded-circle";
				$logo_1 = "assets/image/no-image.png";
			}

			if (isset($logo2) and $logo2!=="") {
				$logo_2 = "../public/image_profils/".str_replace(",","",$logo2);
			}else{
				$style2 = "rounded-circle";
				$logo_2 = "assets/image/no-image.png";
			}
		?>
		<div class="col-md-3" id="block_img_profil_1">
			<img class="img-profile <?php echo isset($style1) ? $style1:"" ?>" id="theme_image_profile_1" src="<?php echo base_url().$logo_1; ?>">
			<form id="import-logo-1" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-9">
						<input type="file" name="theme_logo_1">
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-success btn-sm" id="btn-import-logo-1">
							<i class="fa fa fa-check-circle"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6" id="theme_titre">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-9" id="block-h2-description">
					<h2 class="theme-h2-description"><strong><?php echo isset($dcrpt) ? str_replace(",", "", $dcrpt):"Description de votre logiciel"; ?></strong></h2>
					<input type="text" class="theme-input-description" value="<?php echo isset($dcrpt) ? str_replace(",", "", $dcrpt):"Description de votre logiciel"; ?>">
				</div>
				<div class="col-md-1" id="block-button-description">
					<button type="button" class="btn btn-primary" id="theme-button-description">
						<i class="fa fa fa-edit"></i>
					</button>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
		<div class="col-md-3" id="block_img_profil_2">
			<img class="img-profile <?php echo isset($style2) ? $style2:"" ?>" id="theme_image_profile_2" src="<?php echo base_url().$logo_2; ?>">
			<form id="import-logo-2" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-9 block-input-head-block">
						<input type="file" name="theme_logo_2">
					</div>
					<div class="col-md-3">
						<button type="button" class="btn btn-success btn-sm" id="btn-import-logo-2">
							<i class="fa fa fa-check-circle"></i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="theme_menue">
		<nav class="menu_navbar" style="background-color: <?php echo isset($block) ? str_replace(",", "", $block):""; ?>">
			<div class="row">
				<div class="col-md-10"></div>
				<div class="col-md-2">
					<div class="row">
						<div class="col-md-8" id="block-input-blocks">
							<input type="text" class="theme-input-blocks" placeholder="#code couleur" value="<?php echo isset($block) ? str_replace(",", "", $block):""; ?>">
						</div>
						<div class="col-md-4" id="block-button-blocks">
							<button type="button" class="btn btn-primary btn-sm" id="theme-button-blocks">
								<i class="fa fa fa-edit"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</nav><br>
		<div class="container-fluid">
			<div class="btn-group btn-group-justified" id="theme_page">
				<?php if ($page) { ?>
					<?php foreach ($page as $pages => $p) { ?>
						<a href="<?php echo base_url(); ?>index.php/theme.html?p=<?php echo $p->id; ?>" class="btn btn-<?php if(isset($PgAc) and $PgAc==$p->id){ echo "default page_active_theme"; }else{ echo "primary"; } ?>"><?php echo $p->nom_page; ?></a>
					<?php } ?>
				<?php } ?>
			</div><hr>
			<div class="block-theme-mask">
				<?php if ($html) { ?>
					<?php foreach ($html as $htmls => $h) { ?>
						<?php echo $h->html; ?>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-md-4">
					<button type="button" class="btn btn-primary form-control">
						<i class="fa fa-angle-left"></i> Page precedent
					</button>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-success form-control">
						<i class="fa fa-save"></i> Sauvegarder
					</button>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-primary form-control">Page suivant 
						<i class="fa fa-angle-right"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>