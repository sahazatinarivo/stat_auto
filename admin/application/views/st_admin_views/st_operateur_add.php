<div class="container-fluid block-container">
	<div class="row">
		<div class="col-md-9">
			<form action="<?php echo base_url(); ?>index.php/save_operat" method="post" id="form_operat">
				<h2 align="center"><i><u>Ajout nouveau operateur</u></i></h2><br>
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="nom_operat" class="label-operateur">Nom operateur:</label>
			  		</div>
			  		<div class="col-md-9">
			  			<input type="text" class="form-control input-operateur" id="nom_operat" placeholder="Nom" name="nom_operat" value="<?php echo isset($nom) ? $nom:""; ?>">
			  		</div>
			  	</div>
			  	<br>
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="email_operat" class="label-operateur">E-mail:</label>
			  		</div>
			  		<div class="col-md-9">
			  			<input type="text" class="form-control input-operateur" id="email_operat" placeholder="E-mail" name="email_operat" value="<?php echo isset($mail) ? $mail:""; ?>">
			  		</div>
			  	</div><br>
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="type_operat" class="label-operateur">Saisie type</label>
			  		</div>
			  		<div class="col-md-9">
			  			<select name="type_operat" class="form-control input-operateur">
			  				<option value="uns" <?php if (isset($saisie) && $saisie=="uns") echo "selected"; ?>>saisie 1</option>
			  				<option value="deuxs" <?php if (isset($saisie) && $saisie=="deuxs") echo "selected"; ?>>saisie 2</option>
			  			</select>
			  		</div>
			  	</div>
				<br>
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="password_operat" class="label-operateur">Mot de passe:</label>
			  		</div>
			  		<div class="col-md-9">
			  			<input type="password" class="form-control input-operateur" id="password_operat" placeholder="Mot de passe" name="password_operat" required="true">
			  		</div>
			  	</div>

			  	<br>
			  	<div class="row">
			  		<div class="col-md-3">
			  			<label for="c_password_operat" class="label-operateur">Confirmation mot passe:</label>
			  		</div>
			  		<div class="col-md-9">
			  			<input type="password" class="form-control input-operateur" id="c_password_operat" placeholder="Confirmation mot de passe" name="c_password_operat" required="true">
			  			<div id="error_password"></div>
			  		</div>

			  	</div>
			  	
			  	<br>
			  	<div class="row">
			  		<div class="col-md-9"></div>
			  		<div class="col-md-3">
			  			<input type="hidden" name="op_token" value="<?php echo isset($slug) ? $slug:""; ?>">
			  			<button type="button" id="save_operateur" class="btn btn-success form-control"><i class="fa fa-save"></i> Enregistrer</button>
			  		</div>
			  	</div>	
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>