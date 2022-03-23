(function(){
	templates.registerPage('st_recherche.html',{
		init:function(){
			$("#megadiv").on('click','#menue-synch',function(e) {
                e.preventDefault();
                var args = new Object();
                args.isLoginForm = 0;
                templates.display('st_synchr.html', args);
            });
           	$("#megadiv").on('click','#menue-envoi',function(e) {
                e.preventDefault();
                var args = new Object();
                args.isLoginForm = 0;
                templates.display('st_envoi.html', args);
            });
            $("#megadiv").on('click','#menue-accueil',function(e) {
                e.preventDefault();
                var args = new Object();
                args.isLoginForm = 0;
                templates.display('st_accueil.html', args);
            });
            $("#megadiv").on('click','#menue-deconnexion',function(e) {
                e.preventDefault();
                var args = new Object();
                args.isLoginForm = 1;
                templates.display('st_login.html', args);
            });

            $("#megadiv").on('keyup','#recherche-liste',function(e){
                e.preventDefault();
                var _cle = $(this).val();
                var args = new Object();
                var _cln = models.liste.getClnSearche().cln;
                args._prs = models.liste.searchePers( _cln , _cle );
                args._cle = _cle;
                args._cln = _cln;
                templates.display('st_recherche.html', args);
            });

            $("#megadiv").on("click","i[id^='btn-vers-saisie']",function(e){
                e.preventDefault();
                var args = new Object();
                var page = models.mask.getPages();
                args.iLst = $(this).attr("id").split("-")[3];
                args.mask = models.mask.getHtml( models.mask.getPagesMin().idmin );
                args._sse = "etat_active_"+session.get("saisie");
                args.iPge = models.mask.getPagesMin().idmin;
                for (var i = 0; i < page.length; i++) { 
                   var sEx = models.mask.siPagesSave( args.iLst ,page[i].id );
                   if (jQuery.isEmptyObject(sEx)) {
                        models.mask.savePgAct( session.get("saisie") , args.iLst , page[i].id );
                   }
                }
                args.pages = models.mask.getPgWithListe( session.get("saisie") , args.iLst );
                templates.display('st_mask.html',args);
            });
		},

        post: function( args ){
            $('#recherche-liste').focus();
            $('#recherche-liste').val( args._cle );
        },

		pre:function(args){
			args.isLoginForm = 0;
		}
	});
})();