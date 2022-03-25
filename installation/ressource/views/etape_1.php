<form id="form_etap_1">
	<div class="form-class-database">
		 <table class="table table-striped">
		    <tbody>
		      	<tr>
		        	<td><span class="span-num-list"><label>Host</label></span></td>
		        	<td>
		        		<input type="text" class="form-control" name="host" required="true">
		        	</td>
		      	</tr>
		      	<tr>
		        	<td><span class="span-num-list"><label>User</label></span></td>
		        	<td>
		        		<input type="text" class="form-control" name="user" required="true">
		        	</td>
		      	</tr>
		      	<tr>
		        	<td><span class="span-num-list"><label>Password</label></span></td>
		        	<td>
		        		<input type="text" class="form-control" name="password">
		        	</td>
		      	</tr>
		      	<tr>
		        	<td><span class="span-num-list"><label>Database</label></span></td>
		        	<td>
		        		<input type="text" class="form-control" name="database" required="true">
		        	</td>
		      	</tr>
		      	<tr>
		        	<td><span class="span-num-list"><label>Port</label></span></td>
		        	<td>
		        		<input type="text" class="form-control" value="3306" name="port" required="true">
		        	</td>
		      	</tr>
		    </tbody>
		  </table>
	</div>
	<div class="progress" id="progress_install">
	  <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
	  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
	  </div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-8" id="message_test_db"></div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-6">
					<button type="button" class="btn btn-default btn-suivant" id="test_connex_db">Tester la connexion BD</button>
				</div>
				<div class="col-md-6">
					<button type="button" class="btn btn-primary btn-suivant" id="suivant_installation">Suivant >></button>
				</div>
			</div>
		</div>
	</div>
</form>