(function(){
	templates.registerPage('st_mask.html',{
		init:function(){
            $("#megadiv").on("click","a[id^='page-mask']",function(e){
                e.preventDefault();
                var args = new Object();
                args.iPge = $(this).attr("id").split("[")[1].replace(']-','');
                args.iLst = $(this).attr("id").split("[")[2].replace(']','');
                args.pages = models.mask.getPgWithListe( session.get("saisie") , args.iLst );
                args.mask = models.mask.getHtml( args.iPge );
                args._sse = "etat_active_"+session.get("saisie");
                templates.display('st_mask.html',args);
            });

            $("#megadiv").on("click","#save_donne_saisie", function(){
                var idPrnt = $(this).data('identif');
                var idList = idPrnt.split('[')[2].replace(']','');
                var idPage = idPrnt.split('[')[1].replace(']','');
                
                $('span[id^="[span][array]"]').each(function(){
                    var ident = $(this).attr('id');
                    var idLgn = ident.split('][')[2].replace(']','');
                    var stqAr = $('span[id="[span][array]['+idLgn+']"]').text();
                    var nArry = stqAr.split(',');
                    var ival = {};
                    for (var i = 0; i < nArry.length-1; i++) {
                        ival[nArry[i].trim()] = $('[id^="[champ]['+idLgn+']['+nArry[i].trim().toLowerCase()+']"]').val();
                    }
                    var quest = ival.ligne;
                    var lstPr = $('#stock_slug_pers').val();
                    var _clne = models.params.getParamsStock();
                    var _date = Date();
                    models.mask.insertDataSaisie( _clne , lstPr , quest , ival , session.get("id_oper"),session.get("id_oper"),_date,_date);
                });

                models.mask.activerPgSave(idList.trim(),idPage.trim());
            });

            $('#megadiv').on('click','#passer_page_suivant',function(){
                var args = new Object();
                var idPrnt = $(this).data('identif');
                var idList = idPrnt.split('[')[2].replace(']','');
                var idPage = idPrnt.split('[')[1].replace(']','');
                var iPgmin = models.mask.getPagesMin();
                var iPgmax = models.mask.getPagesMax();
                var __repm = 0;
                if (idPage == iPgmax.idmax) {
                    templates.display('st_recherche.html',args);
                    __repm = 1;
                }
                if (idPage < iPgmax.idmax) {
                    idPage = parseInt(idPage) + 1;
                }
                args.pages = models.mask.getPgWithListe( session.get("saisie") , idList );
                args.mask = models.mask.getHtml( idPage );
                args._sse = "etat_active_"+session.get("saisie");
                args.iLst = idList;
                args.iPge = idPage;

                if (__repm == 0) {
                    templates.display('st_mask.html',args);
                }
            });
		},

        post: function( args ){
            var donne = models.mask.recupDonneSaisie( args.iLst );
            var _clne = models.params.getParamsStock();
            
            if (!jQuery.isEmptyObject(donne)) {
                for (var j = 0; j < donne.length; j++) {
                    var lbIdn = donne[j].quest.split(']')[1];
                    var idIdn = donne[j].quest.split(']')[0].replace('[','');

                    for (var i = 0; i < _clne.length; i++) {
                        var preInd = "[champ]["+idIdn+"]["+_clne[i].value.toLowerCase()+"]["+lbIdn+"]";
                        $("select[id='"+preInd+"']").val(donne[j][_clne[i].champ.toLowerCase()]);
                        $("input[id='"+preInd+"']").val(donne[j][_clne[i].champ.toLowerCase()]);
                    }
                }
            }
        },

		pre:function( args ){
			args.isLoginForm = 0;
		}
	});
})();