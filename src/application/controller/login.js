(function() {
    templates.registerPage('st_login.html',{
        init:function() {
            $("#megadiv").on('click','#connecter-operateur',function(e) {
                e.preventDefault();
                var args = new Object();
                var _email = $("input[name='email-operat-login']").val();
                var _paswd = $("input[name='mdpss-operat-login']").val();
                var _bUrl = models.params.getUrlWs()._urlws;
                var _key = models.params.getKeyWs();
                
                if (models.params.getAcount().count > 0 ) {
                    var count = models.params.getAcountByOper( _email , hex_md5(_paswd) );
                    if (count) {
                        session.set('id_oper',count.id);
                        session.set('nom_oper',count.nom);
                        session.set('mail_oper',count.mail);
                        session.set('saisie',count.saisie);
                        templates.display('st_accueil.html');
                    }else{
                        args.erreur = "COMPTE NON VALIDE";
                        templates.display('st_login.html',args);
                    }
                }else{
                    $.ajax({
                        url:_bUrl+"admin/index.php/get-acount.html",
                        data:{ '_key':_key.valeur,'mail':_email,'psswd':_paswd },
                        type:"post",
                        dataType:"json",
                        success:function( _o ){
                            if (_o.res == "ok") {
                                models.params.saveOperateur( _o._nm , _o._ml , _o._md , _o._ss );
                                var count = models.params.getAcountByOper( _o._ml , _o._md );
                                session.set('id_oper',count.id);
                                session.set('nom_oper',count.nom);
                                session.set('mail_oper',count.mail);
                                session.set('saisie',count.saisie);
                                templates.display('st_accueil.html');
                            }else{
                                args.erreur = "CLE WEBSERVICE NON VALIDE";
                                templates.display('st_login.html',args);
                            }
                        },
                        error:function( _e ){
                            erreur = "PROBLEME DE CONNEXION AU SERVEUR ONLINE";
                            air.Introspector.Console(erreur);
                        }
                    });
                }
            });
        },

        post:function(){
            $("input[name='email-operat-login']").focus();
        },

        pre:function(args) {
            args.isLoginForm = 1;
        }
    });
})();
