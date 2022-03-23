(function(){
	templates.registerPage('st_envoi.html',{
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
                session.clear();
                templates.display('st_login.html', args);
            });

            $("#megadiv").on('click','#envoi_donne_saisie',function(e) {
                e.preventDefault();
                if(confirm('Apres avoir envoie cet données, les données online sont ecrasé! voulez vous continuer?')){
                    var args = new Object();
                    var _bUrl = models.params.getUrlWs()._urlws+"admin/index.php/envoi-donne-saisie.html";
                    var _key = models.params.getKeyWs();
                    var _dss = models.params.selectDatas();
                    var _this = $(this);
                    $.ajax({
                        url:_bUrl,
                        data:{ '_key':_key.valeur,'_dss':_dss },
                        type:"post",
                        dataType:"html",
                        beforeSend:function(){
                            _this.css('display','none');
                            _this.next('img').css('display','block');
                        },
                        success:function( _o ){
                            alert(_o);
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        },
                        error:function( _e ){
                            alert(_e);
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        }
                    });
                }
            });
		},

		pre:function(args){
			args.isLoginForm = 0;
			args.saisie = session.get('saisie');
		}
	});
})();