(function(){
	var montage = {
		init:function(){
			jQuery('#save_code_html').on("click", function(){
				var _html = $('#contenue-html-mask').html();
				var _idPg = $('input[name="{stock_id_page}"]').val();
				var _idBc = $('input[name="{stock_id_bloc}"]').val();
				data = {"_html":_html,"_idPg":_idPg,"_idBc":_idBc};
				montage.save_html(data);
			});

			jQuery('#cree-table-liste').on('click',function(){
				var nbrChmp = $('input[name="input-nbr-champ"]').val();
				var nTables = $(this).val();
				var inChamp = nbrChmp ? parseInt(nbrChmp) : 0;
				var ___data = {"idChm":inChamp,"table":nTables};
				if (inChamp > 0) {
					montage.create_table_stock(___data,inChamp);
				}else{
					$('input[name="input-nbr-champ"]').focus();
				}
			});

			jQuery('a[id^="edite_column_table"]').on('click',function(){
				var nChmp = $(this).attr('id').split('-')[1];
				var datas = {"nChmp":nChmp};
				montage.edite_column_table(datas);
			});

			jQuery('a[id^="edite_column_datas"]').on('click',function(){
				var nChmp = $(this).attr('id').split('-')[1];
				var datas = {"nChmp":nChmp};
				montage.edite_column_datas(datas);
			});

			jQuery('.modal-body').on('click','#run-creation-table',function(){
				var nbrChmp = $('#stock-nombre-champ').val();
				var nTables = $(this).val();
				var nChmp = [], tChmp = [], lChmp = [], oChmp= [];
				for (var i = 1; i <= nbrChmp; i++) {
					nChmp[i] = $('input[id="input-nom-champ-'+i+'"]').val();
					tChmp[i] = $('select[id="select-type-champ-'+i+'"]').val();
					lChmp[i] = $('input[id="input-limit-champ-'+i+'"]').val();
					oChmp[i] = $('select[id="select-null-champ-'+i+'"]').val();
				}

				var _data = {"nChmp":nChmp,"tChmp":tChmp,"lChmp":lChmp,"nbrChmp":nbrChmp,"oChmp":oChmp,"table":nTables};
				montage.run_creation_table(_data);
			});

			jQuery('.modal-body').on('click','#run-modif-table',function(){
				var onChp = $('#stock-old-name').val();
				var nChmp = $('input[id="input-nom-champ"]').val();
				var tChmp = $('select[id="select-type-champ"]').val();
				var lChmp = $('input[id="input-limit-champ"]').val();
				var oChmp = $('select[id="select-null-champ"]').val();
				var nTble = $(this).val();

				var _data = {"nChmp":nChmp,"tChmp":tChmp,"lChmp":lChmp,"oChmp":oChmp,"onChp":onChp,"table":nTble};
				montage.run_modif_table(_data);
			});

			jQuery('#afficher_modal_import').on('click',function(){	
				var _url = $('#url_modal_import').val();
				montage.afficher_modal_import(_url);
			});

			jQuery('.modal-body').on('click','#run_import_donne',function(){	
				var form = $('#form-import-liste')[0];
				var tHis = $(this);
			    var data = new FormData(form);
				montage.demmarer_import(data,tHis);
			});
		},

		afficher_modal_import:function(_url){
			$.ajax({
				url: _url,
				method: "POST",
				dataType: "html",
				success:function(html){
					$('.modal-views').css('display','block');
					$('#titre-modal').html('Import donné(s)');
					$('.modal-body').html(html);
				},				
				error:function(_e){
					alert("Erreur! Veillez ressayer plus tard");
				}
			});
		},

		demmarer_import:function(_d,tHis){
			var _url = $('#url_run_import_donne').val();

		    $.ajax({
		        url: _url,
		        type: 'POST',
		        data: _d,
		        contentType: false,
		        processData: false,
		        beforeSend:function(){
		        	tHis.html('<i class="fa fa-file-upload"></i> Demmarage de l`\'importation...');
		        },
		        success: function (data) {
		        	location.reload();
		        },
		        error: function (_e) {
		           alert(_e);
		        }
		    });
		},

		run_modif_table:function(_d){
			var _url = $('#url_run_modif_table').val();

			$.ajax({
				url: _url,
				method: "POST",
				data:_d,
				success:function(data){
					location.reload();
				},				
				error:function(_e){
					alert("Erreur! Veillez ressayer plus tard");
				}
			});
		},

		edite_column_table:function(_d){
			var _url = $('#url_edite_table').val();

			$.ajax({
				url: _url,
				method: "POST",
				data:_d,
				dataType:"html",
				success:function(html){
					$('.modal-views').css('display','block');
					$('#titre-modal').html('Modification Colonne');
					$('.modal-body').html(html);
				},				
				error:function(_e){
					alert("Erreur! Veillez ressayer plus tard");
				}
			});
		},

		edite_column_datas:function(_d){
			var _url = $('#url_edite_table_datas').val();

			$.ajax({
				url: _url,
				method: "POST",
				data:_d,
				dataType:"html",
				success:function(html){
					$('.modal-views').css('display','block');
					$('#titre-modal').html('Modification Colonne');
					$('.modal-body').html(html);
				},				
				error:function(_e){
					alert("Erreur! Veillez ressayer plus tard");
				}
			});
		},

		run_creation_table:function(_d){
			var _url = $('#url_save_table').val();

			$.ajax({
				url: _url,
				method: "POST",
				data:_d,
				success:function(data){
					location.reload();
				},				
				error:function(_e){
					alert("Erreur! Veillez ressayer plus tard");
				}
			});
		},

		create_table_stock:function(_d,inChamp){
			var _url = $('#url_creation_table').val();

			$.ajax({
				url: _url,
				method: "POST",
				data:_d,
				dataType:"html",
				success:function(html){
					$('.modal-views').css('display','block');
					$('#titre-modal').html('Ajout colonne(s) table');
					$('.modal-body').html(html);
					$('#stock-nombre-champ').val(inChamp);
				},				
				error:function(_e){
					alert(_e);
				}
			});
		},

		save_html:function(_d){
			var _url = $('#url_genere_block').val();

			$.ajax({
				url: _url,
				method: "post",
				data:_d,
				success:function(data){
					window.location.href = data;
				},				
				error:function(_e){
					alert(_e);
				}
			});
		}
	};

	montage.init();
})();