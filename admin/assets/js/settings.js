(function(){
	var settings = {
		init:function(){
			jQuery('#btn-import-logo-1').on('click',function(){	
				var form = $('#import-logo-1')[0];
				var tHis = $(this);
			    var data = new FormData(form);
				settings.import_logo_1(data,tHis);
			});

			jQuery('#btn-import-logo-2').on('click',function(){	
				var form = $('#import-logo-2')[0];
				var tHis = $(this);
			    var data = new FormData(form);
				settings.import_logo_2(data,tHis);
			});

			jQuery('button[id^="theme-button"]').on('click',function(){
				var prfx = $(this).attr('id').split('-')[2];
				var btns = "<button type=\"button\" class=\"btn btn-success btn-sm\" id=\"theme-save-"+prfx+"\">"
							+"<i class=\"fa fa fa-check-circle\"></i>"
						+"</button>";
				$("#block-button-"+prfx).html(btns);
				var height = 0;
				/*description seulement*/
				if (prfx=="description") { 
					var desc = $(".theme-h2-description").text();
					height = '45px';
					$(".theme-h2-description").remove();
					$(".theme-input-description").val(desc);
				 }else{ 
				 	height = '32px' 
				 }
				/*fin description seulement*/
				$(".theme-input-"+prfx).animate({
				  	display:'block',
				    left: '250px',
				    height: height,
				    width: '100%',
				});
			});

			jQuery('div[id^="block-button"]').on('click','button[id^="theme-save"]',function(){
				var prfx = $(this).attr('id').split('-')[2];
				var iclr = $('.theme-input-'+prfx).val();
				var nPrs = "params_"+prfx;
				var data = {"nParams":nPrs,"vParams":iclr};
				if (iclr == "") {
					$('.theme-input-'+prfx).focus();
				}else{
					settings.save_params(data);
				}
			});

			jQuery('.params-recherche').on('click',function(){
				settings.params_recherche();
			});

			jQuery('.params-stock').on('click',function(){
				settings.params_stockage();
			});

			jQuery('.body_autre_setting').on('click','#save_params_stock',function(){
				var _this = $(this);
				$('input[name^="colonne"]').each(function(){
					var field = $(this).attr('name').split('_')[1];
					var cLnne = $(this).val();
					var iValu = $('select[name="valuec_'+field+'"]').val(); 
					var datas = {"cLnne":cLnne,"iValu":iValu};
					
					settings.save_colonne(datas,_this);
				});
			});

			jQuery("#btn_afficher_donner").on('click',function(){
				var bUrl = $('#base_url').val();
				var cLnn = $('select[name="cln"]').val();
				window.location.href = bUrl+"index.php/export-donne.html?c="+cLnn;
			});

			jQuery("#btn_exporte_donner").on('click',function(){
				$("#form_exporte_donner").submit();
			});

			jQuery("#export_stat").on('click',function(){
				var urls = $(this).attr('name');
				window.location.href = urls;
			});
		},

		save_colonne:function(_d,_this){
			var _url = $('#url_save_stock').val();
			
			$.ajax({
		        url:_url,
		        type:'POST',
		        data:_d,
		        beforeSend:function(){
		        	_this.html('Enregistrement...');
		        },
		        success:function(data) {
		        	$('#message').html(data);
		        	_this.html('<i class="fa fa-save"></i> Enregistrer le parametre');
		        },
		        error:function(_e) {
		           alert(_e);
		        }
		    });
		},

		params_stockage:function(){
			var _url = $('#url_params_stockage').val();
			
			$.ajax({
		        url:_url,
		        type: 'POST',
		        success: function (data) {
		        	$('.body_autre_setting').html(data);
		        },
		        error: function (_e) {
		           alert(_e);
		        }
		    });
		},

		params_recherche:function(){
			var _url = $('#url_params_recherche').val();

		    $.ajax({
		        url: _url,
		        type: 'POST',
		        success: function (data) {
		        	$('.body_autre_setting').html(data);
		        },
		        error: function (_e) {
		           alert(_e);
		        }
		    });
		},

		save_params:function(_d){
			var _url = $('#url_save_setting').val();

		    $.ajax({
		        url: _url,
		        type: 'POST',
		        data: _d,
		        success: function (data) {
		        	location.reload();
		        },
		        error: function (_e) {
		           alert(_e);
		        }
		    });
		},
		
		import_logo_1:function(_d,tHis){
			var _url = $('#url_import_logo_1').val();

		    $.ajax({
		        url: _url,
		        type: 'POST',
		        data: _d,
		        contentType: false,
		        processData: false,
		        success: function (data) {
		        	location.reload();
		        },
		        error: function (_e) {
		           alert(_e);
		        }
		    });
		},

		import_logo_2:function(_d,tHis){
			var _url = $('#url_import_logo_2').val();

		    $.ajax({
		        url: _url,
		        type: 'POST',
		        data: _d,
		        contentType: false,
		        processData: false,
		        success: function (data) {
		        	location.reload();
		        },
		        error: function (_e) {
		           alert(_e);
		        }
		    });
		},
	}

	settings.init();
})()