(function() { 
    
    function cnt_del_user( _uid ) { 
        if (_uid > 0 && confirm('ETES-VOUS DE VOULOIR SUPPRIMER CET UTILISATEUR?')) {
            models.user.delete_user(_uid);
            templates.display("cnt_users.html");
        }  
    }
    
    function cnt_edit_user( _uid ) {
        var args = new Object();
        args.uid = _uid;
        templates.display("cnt_user.html", args);
    }
    
    templates.registerPage('cnt_users.html', {
        
        init:function() {       
                 
            /* Suppression d'utilisateur' */
            $('#megadiv').on('click','a.del-user', function(e) {
                e.preventDefault();
                cnt_del_user($(this).data('idu'));
            });
            
            /* Edition d'utilisateur */
            $('#megadiv').on('click','a.edit-user', function(e) {
                e.preventDefault();
                cnt_edit_user($(this).data('idu'));
            });
            
            /* Ajout de nouveau utilisateur */
            $('#megadiv').on('click','a.add-user',function(e){ 
                e.preventDefault();
                templates.display("cnt_user.html");
            });
        },
        
        pre:function(args) {
            var ida = session.get('user_ida');
            args.lev00 = services.configs.get('LIST_ETAB_VALID_AS' + ida + '_N0S0'); 
            args.lev01 = services.configs.get('LIST_ETAB_VALID_AS' + ida + '_N0S1'); 
            args.lev10 = services.configs.get('LIST_ETAB_VALID_AS' + ida + '_N1S0'); 
            args.lev11 = services.configs.get('LIST_ETAB_VALID_AS' + ida + '_N1S1'); 
            args.lev20 = services.configs.get('LIST_ETAB_VALID_AS' + ida + '_N2S0'); 
            args.lev21 = services.configs.get('LIST_ETAB_VALID_AS' + ida + '_N2S1'); 
            args.lev30 = services.configs.get('LIST_ETAB_VALID_AS' + ida + '_N3S0'); 
            args.lev31 = services.configs.get('LIST_ETAB_VALID_AS' + ida + '_N3S1');
            args.logged_user = models.user.one(session.get('user_id'));
            args.users = models.user.liste(session.get('user_id'));
        },
        
        post: function(){
            var d = new Date();
            var $listeJS = jQuery( "#liste-js-dynamique" );
            var table1 = $listeJS.DataTable( {
                pageLength: 10,
                dom: 'Bfrtip',
                buttons: [],  
                aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                bStateSave: true,
                language: {
                    decimal:        ",",
                    emptyTable:     "Aucun \351l\351ment",
                    info:           "Affichage de _START_ \340 _END_ sur _TOTAL_ \351l\351ments",
                    infoEmpty:      "Affichage de 0 to 0 of 0 \351l\351ment",
                    infoFiltered:   "(filtre de _MAX_ total 351ment)",
                    infoPostFix:    "",
                    thousands:      ",",
                    lengthMenu:     "Afficher _MENU_ \351l\351ments par page",
                    loadingRecords: "Chargement...",
                    processing:     "Traitement...",
                    search:         "Chercher:",
                    zeroRecords:    "Aucun enregistrement trouv\351",
                    paginate: {
                        first:      "<<",
                        last:       ">>",
                        next:       ">",
                        previous:   "<"
                    },
                    aria: {
                        sortAscending:  ": Ordonner suivant l'ordre croissant",
                        sortDescending: ": Ordonner suivant l'ordre d\351croissant"
                    }
                }
            } );
        }
    });
})();
