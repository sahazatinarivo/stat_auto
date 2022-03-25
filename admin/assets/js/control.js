(function(){
	var control = {
		init:function(){
			$("#save_operateur").on('click',function(){
				var pswd = $("#password_operat").val();
				var cpwd = $("#c_password_operat").val();
				var _cat = "operat";
				control.save_pers(pswd,cpwd,_cat);
			});

			$("#save_admin").on('click',function(){
				var pswd = $("#password_admin").val();
				var cpwd = $("#c_password_admin").val();
				var _cat = "admin";
				control.save_pers(pswd,cpwd,_cat);
			});
		},
		preSubmit:function(pswd,cpwd,_cat){
			var res = true;
			if($("#nom_"+_cat).val() == ""){
				$("#nom_"+_cat).focus();
				res = false;
			}
			if($("#email_"+_cat).val() == ""){
				$("#email_"+_cat).focus();
				res = false;
			}
			if($("#password_"+_cat).val() == ""){
				$("#password_"+_cat).focus();
				res = false;
			}
			if($("#c_password_"+_cat).val() == ""){
				$("#c_password_"+_cat).focus();
				res = false;
			}
			if (pswd !== cpwd) {
				var error = '<br><div class="alert alert-danger">'
							  +'<strong>Confirmez bien le mot de passe!</strong>'
							+'</div>';

				$("#error_password").html(error);
				$("#c_password_"+_cat).focus();
				$("#c_password_"+_cat).css("border","1px solid #fadbd8");
				res = false;
			}

			return res;
		},
		save_pers:function(pswd,cpwd,_cat){
			if (control.preSubmit(pswd,cpwd,_cat) == true) {
				$("#form_"+_cat).submit();
			}
		}
	}
	control.init();
})();