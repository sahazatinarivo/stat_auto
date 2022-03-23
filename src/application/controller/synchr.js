(function() {
    templates.registerPage('st_synchr.html',{
        init:function() {
			$("#megadiv").on('click','#menue-accueil',function(e) {
                e.preventDefault();
                var args = new Object();
                args.isLoginForm = 0;
                templates.display('st_accueil.html', args);
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

            $("#megadiv").on('click','#synchr-table-liste',function(e){
                e.preventDefault();
                if(confirm('Voulez vous demmarer cette action et ecraser le table s\'il existe?')){
                    var args = new Object();
                    var _bUrl = models.params.getUrlWs()._urlws+"admin/index.php/synchr-table-liste.html";
                    var _key = models.params.getKeyWs();
                    var _this = $(this);
                    $.ajax({
                        url:_bUrl,
                        data:{ '_key':_key.valeur },
                        type:"post",
                        dataType:"json",
                        beforeSend:function(){
                            _this.css('display','none');
                            _this.next('img').css('display','block');
                        },
                        success:function( _o ){
                            models.params.dropTableEx('st_liste_evalue');
                            models.params.tableListe('st_liste_evalue', _o );
                            alert("SYNCHRONISATION TERMINE");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        },
                        error:function( _e ){
                            alert("PROBLEME DE SERVEUR");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        }
                    });
                }
            });

            $("#megadiv").on('click','#synchr-table-donnee',function(e){
                e.preventDefault();
                if(confirm('Voulez vous demmarer cette action et ecraser le table s\'il existe?')){
                    var args = new Object();
                    var _bUrl = models.params.getUrlWs()._urlws+"admin/index.php/synchr-table-donne.html";
                    var _key = models.params.getKeyWs();
                    var _this = $(this);
                    $.ajax({
                        url:_bUrl,
                        data:{ '_key':_key.valeur },
                        type:"post",
                        dataType:"json",
                        beforeSend:function(){
                            _this.css('display','none');
                            _this.next('img').css('display','block');
                        },
                        success:function( _o ){
                            var table = 'st_datas_'+session.get('saisie')+'';
                            models.params.dropTableEx( table );
                            models.params.tableListe( table , _o );
                            alert("SYNCHRONISATION TERMINE");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        },
                        error:function( _e ){
                            alert("PROBLEME DE SERVEUR");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        }
                    });
                }
            });

            $("#megadiv").on('click','#synchr-params-couleur',function(e){
                e.preventDefault();
                if(confirm('Voulez vous demmarer cette action et ecraser le table s\'il existe?')){
                    var args = new Object();
                    var _bUrl = models.params.getUrlWs()._urlws+"admin/index.php/synchr-params-couleur.html";
                    var _key = models.params.getKeyWs();
                    var _this = $(this);
                    $.ajax({
                        url:_bUrl,
                        data:{ '_key':_key.valeur },
                        type:"post",
                        dataType:"json",
                        beforeSend:function(){
                            _this.css('display','none');
                            _this.next('img').css('display','block');
                        },
                        success:function( _o ){
                            models.params.insertParamsCouleur( _o );
                            alert("SYNCHRONISATION TERMINE");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        },
                        error:function( _e ){
                            alert("PROBLEME DE SERVEUR");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        }
                    });
                }
            });

            $("#megadiv").on('click','#synchr-params-colonne',function(e){
                e.preventDefault();
                if(confirm('Voulez vous demmarer cette action et ecraser le table s\'il existe?')){
                    var args = new Object();
                    var _bUrl = models.params.getUrlWs()._urlws+"admin/index.php/synchr-params-colonne.html";
                    var _key = models.params.getKeyWs();
                    var _this = $(this);
                    $.ajax({
                        url:_bUrl,
                        data:{ '_key':_key.valeur },
                        type:"post",
                        dataType:"json",
                        beforeSend:function(){
                            _this.css('display','none');
                            _this.next('img').css('display','block');
                        },
                        success:function( _o ){
                            models.params.insertParamsColonne( _o );
                            alert("SYNCHRONISATION TERMINE");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        },
                        error:function( _e ){
                            alert("PROBLEME DE SERVEUR");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        }
                    });
                }
            });

            $("#megadiv").on('click','#synchr-params-logos',function(e){
                e.preventDefault();
                var _bUrl = models.params.getUrlWs();
                function getBaseUrl() {
                    var re = new RegExp(/^.*\//);
                    return re.exec(window.location.hostname);
                }

                alert(getBaseUrl());
            });

            $("#megadiv").on('click','#synchr-params-searche',function(e){
                e.preventDefault();
                if(confirm('Voulez vous demmarer cette action et ecraser le table s\'il existe?')){
                    var args = new Object();
                    var _bUrl = models.params.getUrlWs()._urlws+"admin/index.php/synchr-params-searche.html";
                    var _key = models.params.getKeyWs();
                    var _this = $(this);
                    $.ajax({
                        url:_bUrl,
                        data:{ '_key':_key.valeur },
                        type:"post",
                        dataType:"json",
                        beforeSend:function(){
                            _this.css('display','none');
                            _this.next('img').css('display','block');
                        },
                        success:function( _o ){
                            models.params.insertParamsSearche( _o );
                            alert("SYNCHRONISATION TERMINE");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        },
                        error:function( _e ){
                            alert("PROBLEME DE SERVEUR");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        }
                    });
                }
            });

            $("#megadiv").on('click','#synchr-donne-liste',function(e){
                e.preventDefault();
                if(confirm('Voulez vous demmarer cette action et ecraser le table s\'il existe?')){
                    var args = new Object();
                    var _bUrl = models.params.getUrlWs()._urlws+"admin/index.php/synchr-donne-liste.html";
                    var _key = models.params.getKeyWs();
                    var _this = $(this);
                    $.ajax({
                        url:_bUrl,
                        data:{ '_key':_key.valeur },
                        type:"post",
                        dataType:"json",
                        beforeSend:function(){
                            _this.css('display','none');
                            _this.next('img').css('display','block');
                        },
                        success:function( _o ){
                            models.params.insertDonneListe( _o );
                            models.params.insertPages( _o );
                            alert("SYNCHRONISATION TERMINE");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        },
                        error:function( _e ){
                            alert("PROBLEME DE SERVEUR");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        }
                    });
                }
            });

            $("#megadiv").on('click','#synchr-code-html',function(e){
                e.preventDefault();
                if(confirm('Voulez vous demmarer cette action et ecraser le table s\'il existe?')){
                    var args = new Object();
                    var _bUrl = models.params.getUrlWs()._urlws+"admin/index.php/synchr-code-html.html";
                    var _key = models.params.getKeyWs();
                    var _this = $(this);
                    $.ajax({
                        url:_bUrl,
                        data:{ '_key':_key.valeur },
                        type:"post",
                        dataType:"json",
                        beforeSend:function(){
                            _this.css('display','none');
                            _this.next('img').css('display','block');
                        },
                        success:function( _o ){
                            models.params.insertCodeHtml( _o );
                            alert("SYNCHRONISATION TERMINE");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        },
                        error:function( _e ){
                            alert("PROBLEME DE SERVEUR");
                            _this.css('display','block');
                            _this.next('img').css('display','none');
                        }
                    });
                }
            });
        },

        pre:function(args) {
            args.isLoginForm = 0;
        }
    });
})();
