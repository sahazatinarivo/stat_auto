(function(){
	templates.registerPage('st_params.html',{
		init:function(){
			$("#megadiv").on('click','#params-submit',function(e) {
                e.preventDefault();
                var args = new Object();
                var _lenWs = $("input[name='lien-ws-input']").val();
                var _cleWs = $("input[name='cle-ws-input']").val();
                var _data = { '_lien':_lenWs,'_cle':_cleWs };
                var _url = _lenWs+"admin/index.php/lien-ws.html";
               
               	$.ajax({
					url:_url,
					data:_data,
					type:"post",
					dataType:"json",
					success:function( _o ){
						if (_o.res == "ok") {
							models.params.saveParams( _o.lien , 1, "host");
							models.params.saveParams( _cleWs , 1, "cle_ws");
							templates.display('st_login.html');
						}else{
							args.erreur = "CLE WEBSERVICE NON VALIDE";
							templates.display('st_params.html',args);
						}
					},
					error:function( _e ){
						args.erreur = "LIEN WEBSERVICE NON VALIDE OU PROBLEME DE SERVEUR";
						templates.display('st_params.html',args);
					}
				});
            });
        },

		pre:function(args){
			args.isLoginForm = 1;
		}
	});
})();