(function(){
	var installs = {
		init:function(){
			$('#suivant_installation').on('click',function(){
				var host = $('input[name="host"]').val();
				var user = $('input[name="user"]').val();
				var pssd = $('input[name="password"]').val();
				var dats = $('input[name="database"]').val();
				var port = $('input[name="port"]').val();	
				var _url = $("#url_base").val()+"etape1.php";			
				var data = {"host":host,"user":user,"password":pssd,"database":dats,"port":port};
				
				installs.control_1(_url,data);
			});

			$('#test_connex_db').on('click',function(){
				var host = $('input[name="host"]').val();
				var user = $('input[name="user"]').val();
				var pssd = $('input[name="password"]').val();
				var dats = $('input[name="database"]').val();
				var port = $('input[name="port"]').val();
				var _url = $("#url_base").val()+"test_db.php";	
				var data = {"host":host,"user":user,"password":pssd,"database":dats,"port":port};

				installs.control_2(_url,data);
			});

			$('#suivant_install_2').on('click',function(){
				var noms = $('input[name="nom_admin"]').val();
				var mail = $('input[name="email_admin"]').val();
				var mdps = $('input[name="password_admin"]').val();
				var _url = $("#url_base").val()+"etape2.php";
				var data = {"noms":noms,"mail":mail,"mdps":mdps};

				installs.control_3(_url,data);
			});

			$('#suivant_finish').on('click',function(){
				var bpth = $('input[name="base_path"]').val();
				var _url = $("#url_base").val()+"etape3.php";
				var data = {"base_path":bpth};

				installs.install_finish(_url,data);
			});
		},

		install_finish:function(_url,_d){
			$.ajax({
				url: _url,
				method:"POST",
				data:_d,
				success:function(data){
				   location.reload();
				},
				error:function(){
					alert('Erreur de chargement');
				}
			});
		},

		save_admin:function(_url,_d){
			$.ajax({
				url: _url,
				method:"POST",
				data:_d,
				success:function(data){
				   location.reload();
				},
				error:function(){
					alert('Erreur de chargement');
				}
			});
		},

		test_db:function(_url,_d){

			$.ajax({
				url: _url,
				method:"POST",
				data:_d,
				success:function(data){
				   $('#message_test_db').html(data);
				},
				error:function(){
					alert('Erreur de chargement');
				}
			});
		},

		control_3:function(_url,_d){
			if ($('input[name="nom_admin"]').val() == "") {
				$('input[name="nom_admin"]').focus();
			}else

			if ($('input[name="email_admin"]').val() == "") {
				$('input[name="email_admin"]').focus();
			}else

			if ($('input[name="password_admin"]').val() == "") {
				$('input[name="password_admin"]').focus();
			}else

			if ($('input[name="retape_passord"]').val() == "") {
				$('input[name="retape_passord"]').focus();
			}else{
				if ($('input[name="password_admin"]').val() == $('input[name="retape_passord"]').val()) {
					installs.save_admin(_url,_d);
				}else{
					var erreur = '<div class="alert alert-danger">'+
									  'Confirmez bien votre mot de passe.'+
								  '</div>';
					$(".error_dmpss").html(erreur);
				}
			}
		},

		control_2:function(_url,_d){
			if ($('input[name="host"]').val() == "") {
				$('input[name="host"]').focus();
			}else

			if ($('input[name="user"]').val() == "") {
				$('input[name="user"]').focus();
			}else

			if ($('input[name="database"]').val() == "") {
				$('input[name="database"]').focus();
			}else

			if ($('input[name="port"]').val() == "") {
				$('input[name="port"]').focus();
			}else{
				installs.test_db(_url,_d);
			}
		},


		control_1:function(_url,_d){
			if ($('input[name="host"]').val() == "") {
				$('input[name="host"]').focus();
			}else

			if ($('input[name="user"]').val() == "") {
				$('input[name="user"]').focus();
			}else

			if ($('input[name="database"]').val() == "") {
				$('input[name="database"]').focus();
			}else

			if ($('input[name="port"]').val() == "") {
				$('input[name="port"]').focus();
			}else{
				installs.submit_1(_url,_d);
			}
		},

		submit_1:function(_url,_d){

			$.ajax({
				url: _url,
				method:"POST",
				data:_d,
				beforeSend:function(){
					$('.btn-suivant').attr("disabled","disabled");
				},
				success:function(data){
					var porcentage = 0;

					var timer = setInterval(function(){
						porcentage = porcentage + 1;
						installs.progress_marche(porcentage,timer);
					},1000);
				},
				error:function(){
					alert('Erreur de chargement');
				}
			});
		},

		progress_marche:function(porcentage,timer){
			$('.progress-bar').css('width',porcentage+"%");
			$('.progress-bar').text(porcentage+"% complete");

			if (porcentage > 100) {
				clearInterval(timer);
				$('.progress-bar').css('width',"0%");
				location.reload();
			}
		},
	}

	installs.init();
})();