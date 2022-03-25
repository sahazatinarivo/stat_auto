<div class="container-fluid block-container">
	<div class="row">
		<div class="col-md-9">
			<form action="<?php echo base_url(); ?>index.php/save_admin" method="post" id="form_admin">
				<h2 align="center"><i><u>Ajout nouveau administrateur</u></i></h2><br>
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="nom_admin" class="label-admin">Nom operateur:</label>
			  		</div>
			  		<div class="col-md-9">
			  			<input type="text" class="form-control input-admin" id="nom_admin" placeholder="Nom" name="nom_admin" value="<?php echo isset($nom) ? $nom:"" ?>">
			  		</div>
			  	</div>
			  	<br>
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="email_admin" class="label-admin">E-mail:</label>
			  		</div>
			  		<div class="col-md-9">
			  			<input type="text" class="form-control input-admin" id="email_admin" placeholder="E-mail" name="email_admin" value="<?php echo isset($mail) ? $mail:"" ?>">
			  		</div>
			  	</div>
				<br>
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="password_admin" class="label-admin">Mot de passe:</label>
			  		</div>
			  		<div class="col-md-9">
			  			<input type="password" class="form-control input-admin" id="password_admin" placeholder="Mot de passe" name="password_admin" required="true">
			  		</div>
			  	</div>

			  	<br>
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="c_password_admin" class="label-admin">Confirmation mot passe:</label>
			  		</div>
			  		<div class="col-md-9">
			  			<input type="password" class="form-control input-admin" id="c_password_admin" placeholder="Confirmation mot de passe" name="c_password_admin" required="true">
			  			<div id="error_password"></div>
			  		</div>
			  	</div>
			  	
			  	<br>
			  	<div class="row">
			  		<div class="col-md-9"></div>
			  		<div class="col-md-3">
			  			<input type="hidden" name="ad_token" value="<?php echo isset($slug) ? $slug:""; ?>">
			  			<button type="button" id="save_admin" class="btn btn-success form-control"><i class="fa fa-save"></i> Enregistrer</button>
			  		</div>
			  	</div>	
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>