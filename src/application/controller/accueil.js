(function(){
	templates.registerPage('st_accueil.html',{
		init:function(){
			$("#megadiv").on('click','#menue-synch',function(e) {
                e.preventDefault();
                var args = new Object();
                args.isLoginForm = 0;
                templates.display('st_synchr.html', args);
            });
           	$("#megadiv").on('click','#menue-liste',function(e) {
                e.preventDefault();
                var args = new Object();
                args.isLoginForm = 0;
                templates.display('st_recherche.html', args);
            });
            $("#megadiv").on('click','#menue-envoi',function(e) {
                e.preventDefault();
                var args = new Object();
                args.isLoginForm = 0;
                templates.display('st_envoi.html', args);
            });
            $("#megadiv").on('click','#menue-deconnexion',function(e) {
                e.preventDefault();
                var args = new Object();
                args.isLoginForm = 1;
                session.clear();
                templates.display('st_login.html', args);
            });
		},

		pre:function(args){
			args.isLoginForm = 0;
			args.saisie = session.get('saisie');
		}
	});
})();