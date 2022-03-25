(function() {   
	var creation = {
		ajout_tbl:function(){

    		jQuery('select[name="{num_page}"]').on('change',function(){
    			var page = $(this).val();
    			var _url = $('#url_change_page').val();
    			var data = {"page":page};
    			creation.select_page(_url,data,"block-select-block");
    		});

    		jQuery('.modal-body').on('change','select[name="{num_page}"]',function(){
    			var page = $(this).val();
    			var _url = $('#url_change_block').val();
    			var data = {"page":page};
    			creation.select_page(_url,data,"block-select-block-champ");
    		});

    		jQuery('.btn_action_creation').on('click',function(){
    			var iDentid = $(this).attr('id');
    			var idActio = iDentid.split("_")[2];
    			var tpActio = iDentid.replace("_"+idActio+"","");
    			creation.action_creation(tpActio,idActio,$(this));
    		});

    		jQuery('.btn-ajout-liste').on('click',function(){
    			creation.edite_liste(0);    			
    		});

    		jQuery('.remove-modal').on('click',function(){
    			$('.modal-views').css('display','none');
    		});

    		jQuery('.modal-body').on('click','#save_liste_l',function(){
    			var libelle = $('input[name="{nom_liste_l}"]').val();
    			var idListe = $('input[name="{stk_id_liste}"]').val();
    			var idLstel = $('input[name="{stk_id_liste_l}"]').val();
    			var etat = $('input[name="{etat_liste_l}"]:checked').val();
    			var data = {"libelle":libelle,"idListe":idListe,"idLstel":idLstel,"etat":etat};
    			creation.save_liste_l(libelle,"nom_liste_l",data);
    		});

    		jQuery('.modal-body').on('click','button[id^="edite_listel"]',function(){
    			var idListe = $(this).attr('id').split("_")[2];
    			creation.edite_listel(idListe);
    		});

    		jQuery('.modal-body').on('click','button[id="toogle-ajout-l"]',function(){
    			$('input[name="{stk_id_liste_l}"]').val(0);
    			$('#demo').collapse("show");
    		});

    		jQuery('.modal-body').on('click','button[id="fermer_clps_l"]',function(){
    			$('input[name="{stk_id_liste_l}"]').val(0);
    			$('input[name="{nom_liste_l}"]').val("");
				$('input[id="etat_liste_l_0')[0].checked = true;
    			$('#demo').collapse("hide");
    		});

    		$('.modal-body').on('change','select[name^="{type_blck}"]',function(){
    			var idtp = $(this).val();
    			creation.type_block(idtp);
    		});

    		$('.modal-body').on('click','button[id^="delete_listel"]',function(){
    			var idListe = $(this).attr('id').split("_")[2];
    			creation.delete_listel(idListe,$(this));
    		});

    		jQuery('.btn-ajout-page').on('click',function(){
    			$('.modal-views').css('display','block');
    			creation.edite_page(0);
    		});

    		jQuery('.btn-ajout-block').on('click',function(){
    			$('.modal-views').css('display','block');
    			creation.edite_block(0);
    		});

    		jQuery('.btn-ajout-champ').on('click',function(){
    			$('.modal-views').css('display','block');
    			creation.edite_champ(0);
    		});

    		jQuery('button[id^="btn-edit-ordre"]').on('click',function(){
    			var idHtml = $(this).attr('id').split('-')[3];
    			var ordre = $(this).val();
    			var _this = $(this);
    			creation.edite_ordre(idHtml,ordre,_this);
    		});

    		jQuery('#contenue-html-mask').on('click','button[id^="btn-save-ordre"]',function(){
    			var idHtml = $(this).attr('id').split('-')[3];
    			var ordre = $("input[id^='input-ordre-"+idHtml+"']").val();
    			var _this = $(this);
    			creation.save_ordre(idHtml,ordre,_this);
    		});
    	},

    	save_ordre:function(idHtml,ordre,_this){
    		var _url = $('#url_save_ordre').val();

			$.ajax({
				url: _url,
				method:"POST",
				data:{"ordre": ordre,"idHtml":idHtml},
				success:function(data){
				   	location.reload();
				},
				error:function(){
					alert('erreur de sauvegarde');
				}
			});
    	},

    	action_creation:function(_t,_id,_this=null){
			switch(_t){
				/*liste*/
				case "edite_liste": creation.edite_liste(_id); break;
				case "active_liste": creation.active_liste(_id); break;
				case "desactive_liste": creation.desactive_liste(_id); break;
				case "detail_liste": creation.detail_liste(_id); break;
				case "delete_liste": creation.delete_liste(_id,_this); break;
				/*page*/
				case "edite_page": creation.edite_page(_id); break;
				/*block*/
				case "edite_block": creation.edite_block(_id); break;
				/*champ*/
				case "edite_champ": creation.edite_champ(_id); break;
			}
		},

		delete_listel:function(_id,_this){
			var _url = $('#url_delete_listel').val();

			if (confirm("Vouler vous supprimer cet liste?")) {
				$.ajax({
					url: _url,
					method:"POST",
					data:{"id":_id},
					success:function(data){
					  _this.parents('tr').remove();
					},
					error:function(){
						alert('erreur de suppression');
					}
				});
			}
		},

		edite_listel:function(_id){
			var _url = $('#url_edite_liste_l').val();

			$.ajax({
				url: _url,
				method:"POST",
				data:{"id":_id},
				dataType:"JSON",
				success:function(data){
					$('#demo').collapse("show");
					$('input[name="{stk_id_liste_l}"]').val(_id);
					$('input[name="{nom_liste_l}"]').val(data[0]['libelle']);
					$('input[id="etat_liste_l_'+data[0]['etat']+'"]')[0].checked = true;
				},
				error:function(){
					alert('erreur de modification');
				}
			});
		},

		edite_liste:function(_id){
			var _url = $('#url_edite_liste').val();
			$('.modal-views').css('display','block');
			$('#titre-modal').html('Ajout-Modification liste');

			$.ajax({
				url: _url,
				method:"POST",
				data:{"id":_id},
				dataType:"html",
				beforeSend:function(){
					$('.modal-body').html("<h4>Chargement......</h4>");
					$('.modal-body').css("text-align","center");
				},
				success:function(html){
					$('.modal-body').css("text-align","left");
					$('.modal-body').html(html);
				},
				error:function(){
					alert('erreur de suppression');
				}
			});
		},

		save_liste_l:function(_l,_id,_d,_c){
			var _url = $('#url_save_liste_l').val();
			if (_l=="") 
				$('input[name="{'+_id+'}"]').css('border','1px solid red');
			else
				$.ajax({
					url: _url,
					method:"POST",
					data:_d,
					dataType:"html",
					beforeSend:function(){
						$('#c_liste_liste').html("<h4>Chargement......</h4>");
						$('#c_liste_liste').css("text-align","center");
					},
					success:function(html){
						$('input[name="{stk_id_liste_l}"]').val(0);
						$('input[id="etat_liste_l_0')[0].checked = true;
						$('#c_liste_liste').html(html);
						$('input[name="{nom_liste_l}"]').val("");
						$('input[id="etat_liste_l_0"]').attr('checked',true);
					}
				});
		},

		detail_liste:function(_id){
			var _url = $('#url_detail_liste').val();
			var html_detail_liste = $('.contenu-modal-detail-liste').html();
			$('.modal-views').css('display','block');
			$('#titre-modal').html('Detail liste');

			$.ajax({
				url: _url,
				method:"POST",
				data:{"id":_id},
				dataType:"html",
				beforeSend:function(){
					$('.modal-body').html("<h4>Chargement......</h4>");
					$('.modal-body').css("text-align","center");
				},
				success:function(html){
					$('.modal-body').html(html);
				},
				error:function(){
					alert('erreur de chargement');
				}
			});
		},

		delete_liste:function(_id,_this){
			var _url = $('#url_delete_liste').val();

			if (confirm("Vouler vous supprimer cet liste?")) {
				$.ajax({
					url: _url,
					method:"POST",
					data:{"id":_id},
					success:function(){
						_this.parents("tr").remove();
					},
					error:function(){
						alert('erreur de suppression');
					}
				});
			}
		},

		select_page:function(_u,_d,_idntif){
			$.ajax({
				url: _u,
				method:"POST",
				data:_d,
				success:function(data){
					$('.generer-table').find('.block-select-block').html(data);
				},
				error:function(){
					alert('erreur de chargement');
				}
			});
		},

		edite_page:function(_id){
			var _url = $('#url_edite_page').val();

			$.ajax({
				url: _url,
				method:"POST",
				data: {"id":_id},
				dataType:"html",
				success:function(html){
					$('.modal-views').css('display','block');
					$('#titre-modal').html('Ajout-Modification pages');
					$('.modal-body').html(html);
				},
				error:function(){
					alert('erreur de chargement');
				}
			});
		},

		edite_block:function(_id){
			var _url = $('#url_edite_block').val();

			$.ajax({
				url: _url,
				method:"POST",
				data: {"id":_id},
				dataType:"html",
				success:function(html){
					$('.modal-views').css('display','block');
					$('#titre-modal').html('Ajout-Modification block');
					$('.modal-body').html(html);
				}
			});
		},

		type_block:function(idtp){
			var _url = $('#url_change_type_block').val();

			$.ajax({
				url: _url,
				method:"POST",
				data: {"idtp":idtp},
				dataType:"html",
				success:function(html){
					$('#block_ligne_blck').html(html);
				}
			});
		},

		edite_champ:function(_id){
			var _url = $('#url_edite_colonne').val();

			$.ajax({
				url: _url,
				method:"POST",
				data: {"id":_id},
				dataType:"html",
				success:function(html){
					$('.modal-views').css('display','block');
					$('#titre-modal').html('Ajout-Modification colonne');
					$('.modal-body').html(html);
				},
				error:function(){
					alert('erreur de chargement');
				}
			});
		},

		edite_ordre:function(idHtml,ordre,_this){
			var html = '<input type="text" class="form-control" id="input-ordre-'+idHtml+'" value="'+ordre+'">';
			var btns = '<button type="button" id="btn-save-ordre-'+idHtml+'" value="'+ordre+'" class="btn btn-success btn-sm"><i class="fa fa-save"></i></button>';
			$('#edit-ordre-'+idHtml).html(html);
			_this.parents('td').html(btns);
		},

		number:function(_d){
			jQuery(_d).on('input',function(){
				$(this).val($(this).val().replace(/[^0-9]/g, ''));
			});
		},
	};  

	creation.ajout_tbl();
})();