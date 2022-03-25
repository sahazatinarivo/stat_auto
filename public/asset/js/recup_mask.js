(function(){
	var mask = {
		init: function(){
			jQuery('#recherche_liste').on('keyup',function(){
				var cle = $(this).val();
				var data = {"cle":cle};
				var _url = $('#url_recherche_liste').val();

				mask.recherche_liste(data,_url);
			});

			jQuery('#save_donne_saisie').on('click', function(){
				var _url = $('#url_save_donne').val();
				$('span[id^="[span][array]"]').each(function(){
					var ident = $(this).attr('id');
					var idLgn = ident.split('][')[2].replace(']','');
					var stqAr = $('span[id="[span][array]['+idLgn+']"]').text();
					var nArry = stqAr.split(',');
					var sPers = $('#stock_slug_pers').val();
					var ival = {};
					for (var i = 0; i < nArry.length-1; i++) {
						ival[nArry[i].trim()] = $('[id^="[champ]['+idLgn+']['+nArry[i].trim().toLowerCase()+']"]').val();
					}
					var data = {"ival":ival,"sPers":sPers};
					mask.save_donne(data,_url);
				});
			});

			$(window).load(function(){
				var _url = $('#url_recup_donne').val();
				$('span[id^="[span][array]"]').each(function(){
					var ident = $(this).attr('id');
					
					var idLgn = ident.split('][')[2].replace(']','');
					var stqAr = $('span[id="[span][array]['+idLgn+']"]').text();
					console.log(stqAr);
					var nArry = stqAr.split(',');
					var sPers = $('#stock_slug_pers').val();
					var ival = {};
					for (var i = 0; i < nArry.length-1; i++) {
						ival[nArry[i].trim()] = $('[id^="[champ]['+idLgn+']['+nArry[i].trim().toLowerCase()+']"]').val();
					}
					var data = {"ival":ival,"sPers":sPers};
					mask.recup_donne(data,_url);
				});
			});
		},

		recup_donne:function(_d,_url){
			mask.ajax_csrf();
			
			$.ajax({
				url : _url,
				method :"post",
				data: _d,
				dataType :"json",
				success:function( _d ){
					var cLn_l = _d['colonne'].length;
					var iQest = _d['value'][0]['quest'].split(']')[1];
					var iLign = _d['value'][0]['quest'].split('[')[1].replace(']','').replace(iQest,"");
					var cLn_v = _d['colonne'];
					for (var i = 0; i < cLn_l; i++) {
						$('[id="[champ]['+iLign+']['+mask._resp(cLn_v[i]['value'])+']['+mask._resp(iQest)+']"]').val(_d['value'][0][cLn_v[i]['champ']]);
					}
				},
				error:function(_e){
					alert("ERREUR DE SERVEUR, RESSAYER PLUS TARD");
				}
			});
		},

		_resp:function(cons){
			return cons.replace(" ","_").replace("'","_").toLowerCase();
		},

		save_donne:function(_d,_url){
			mask.ajax_csrf();
			
			$.ajax({
				url : _url,
				method :"post",
				data: _d,
				beforeSend:function(){
					$('#loader_gif').show();
				},
				success:function(data){	
					$('#loader_gif').hide();
				},
				error:function(_e){
					alert("ERREUR DE SERVEUR, RESSAYER PLUS TARD");
				}
			});
		},

		ajax_csrf:function(){
			$.ajaxSetup({
				headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		},

		recherche_liste:function(data,_url){
			mask.ajax_csrf();

			$.ajax({
				url : _url,
				method :"post",
				data: data,
				dataType: "html",
				beforeSend:function(){
					$('#block-loader-ajax').css('display','block');
					$("#contenu_result_liste").html("");
				},
				success:function(html){
					$('#block-loader-ajax').css('display','none');
					$("#contenu_result_liste").html(html);
				},
				error:function(_e){
					$("#contenu_result_liste").html(_e);
				}
			});
		}
	}

	mask.init();
})();