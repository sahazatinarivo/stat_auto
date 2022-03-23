var models = new Object();

(function(){
	models.params = {
		getParams:function( _p ){
			var sQl = "select count(*) as count from st_params"+
				  	  " where params = ? and etat = ?";
			rows = dbtools.getSingleResult(sQl,[ _p , 1 ]);
			return rows;
		},

		selectDatas:function(){
			var sQl = "select * from st_datas_"+session.get('saisie')+"";
			rows = dbtools.getResult(sQl,[]);
			return rows;
		},

		saveParams:function(_v , _e , _p){
			var sQl = "update st_params set valeur = ?, etat = ?"+
					   " where params = ?";
			dbtools.execute(sQl,[ _v , _e , _p ]);
		},

		getUrlWs:function(){
			var sQl = "select valeur as _urlws from st_params"+
				  	  " where params = ? and etat = ? limit 1";
			rows = dbtools.getSingleResult(sQl,[ 'host' , 1 ]);
			return rows;
		},

		getAcount:function(){
			var sQl = "select count(*) as count from st_operateur";
			rows = dbtools.getSingleResult(sQl);
			return rows;
		},

		getAcountByOper:function( _m , _d ){
			var sQl = "select id, nom, mail, mdpss, saisie from st_operateur"+
				  	  " where mail = ? and mdpss = ?";
			rows = dbtools.getSingleResult(sQl,[ _m , _d ]);
			return rows;
		},

		getKeyWs:function(){
			var sQl = "select valeur from st_params"+
				  	  " where params = ? and etat = ?";
			rows = dbtools.getSingleResult(sQl,[ "cle_ws" , 1 ]);
			return rows;
		},

		saveOperateur:function( _n , _m , _md , _s ){
			var sQl = "insert into st_operateur(nom,mail,mdpss,saisie)"+
				  	  " values(?,?,?,?)";
			dbtools.createData(sQl,[ _n , _m , _md , _s ]);
		},

		dropTableEx:function( _t ){
			var sQl = "DROP TABLE IF EXISTS "+_t+"";
			dbtools.execute(sQl);
		},

		tableListe:function( _t , _o ){
			var sQl = "CREATE TABLE "+_t+"("+
					  "id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL ";
					  for (var i = 0; i < _o.col.length; i++) {
					  		if ( _o.col[i].Field !== "id") {
					  			var _null = _o.col[i].Null == "YES" ? "DEFAULT NULL" : "NOT NULL";
					  			sQl += ","+_o.col[i].Field+" "+_o.col[i].Type+" "+_null
					  		}
					  }
					  sQl += ")";
			dbtools.execute(sQl);
		},

		insertParamsSearche:function( _o ){
			for (var i = 0; i < _o.rch.length; i++) {
				var vrf = "select * from st_recherche where colonne= ?";
				rows = dbtools.getResult(vrf,[ _o.rch[i].colonne ]);
				if (jQuery.isEmptyObject(rows)) {
					sQl = "insert into st_recherche(colonne,etat) values(?,1)";
					dbtools.execute(sQl,[ _o.rch[i].colonne ]);
				}else{
					var sQl = "update st_recherche set colonne = ? where colonne= ? ";
					dbtools.execute(sQl,[ _o.rch[i].colonne , _o.rch[i].colonne ]);
				}
			}
		},

		insertPages:function( _o ){
			for (var i = 0; i < _o.pgs.length; i++) {
				var vrf = "select * from st_pages where slug = ?";
				rows = dbtools.getResult(vrf,[ _o.pgs[i].slug ]);
				if (jQuery.isEmptyObject(rows)) {
					sQl = "insert into st_pages(id,slug,nom_page,etat) values(?,?,?,?)";
					dbtools.execute(sQl,[ _o.pgs[i].id ,_o.pgs[i].slug , _o.pgs[i].nom_page , _o.pgs[i].etat ]);
				}else{
					var sQl = "update st_pages set id = ?, nom_page = ?, etat = ? where slug= ? ";
					dbtools.execute(sQl,[ _o.pgs[i].id,_o.pgs[i].nom_page , _o.pgs[i].etat, _o.pgs[i].slug ]);
				}
			}
		},

		insertParamsCouleur:function( _o ){
			for (var i = 0; i < _o.thm.length; i++) {
				var vrf = "select * from st_themes where nom_params= ?";
				rows = dbtools.getResult(vrf,[ _o.thm[i].nom_params ]);
				if (jQuery.isEmptyObject(rows)) {
					sQl = "insert into st_themes(nom_params,valeurs) values(?,?)";
					dbtools.execute(sQl,[ _o.thm[i].nom_params , _o.thm[i].valeurs ]);
				}else{
					var sQl = "update st_themes set valeurs = ? where nom_params= ? ";
					dbtools.execute(sQl,[ _o.thm[i].valeurs , _o.thm[i].nom_params ]);
				}
			}
		},

		insertParamsColonne:function( _o ){
			for (var i = 0; i < _o.cln.length; i++) {
				var vrf = "select * from st_params_stock where champ= ?";
				rows = dbtools.getResult(vrf,[ _o.cln[i].champ ]);
				if (jQuery.isEmptyObject(rows)) {
					sQl = "insert into st_params_stock(champ,value) values(?,?)";
					dbtools.execute(sQl,[ _o.cln[i].champ , _o.cln[i].value ]);
				}else{
					var sQl = "update st_params_stock set value = ? where champ= ? ";
					dbtools.execute(sQl,[ _o.cln[i].value , _o.cln[i].champ ]);
				}
			}
		},

		getParamsStock:function(){
			var sQl = "select * from st_params_stock";
			rows = dbtools.getResult(sQl,[]);
			return rows;
		},

		insertCodeHtml:function( _o ){
			for (var i = 0; i < _o.cdh.length; i++) {
				var vrf = "select * from st_code_html where id_block= ?";
				rows = dbtools.getResult(vrf,[ _o.cdh[i].id_block ]);
				if (jQuery.isEmptyObject(rows)) {
					sQl = "insert into st_code_html(id_page,id_block,html,ordre) values(?,?,?,?)";
					dbtools.execute(sQl,[ _o.cdh[i].id_page , _o.cdh[i].id_block,_o.cdh[i].html , _o.cdh[i].ordre ]);
				}else{
					var sQl = "update st_code_html set id_page=?, id_block=?, html=? , ordre=? where id_block= ? ";
					dbtools.execute(sQl,[ _o.cdh[i].id_page , _o.cdh[i].id_block,_o.cdh[i].html , _o.cdh[i].ordre, _o.cdh[i].id_block ]);
				}
			}
		},

		insertDonneListe:function( _o ){
			for (var i = 0; i < _o.lst.length; i++) {
				var vrf = "select * from st_liste_evalue where slug= ?";
				rows = dbtools.getResult(vrf,[ _o.lst[i].slug ]);

				if (jQuery.isEmptyObject(rows)) {
				  	var sQl = "insert into st_liste_evalue(slug";
						for (var j = 0; j < _o.col.length; j++ ) {
							if (_o.col[j].Field !== "id" && _o.col[j].Field !== "slug") {
									sQl += ","+_o.col[j].Field+"";
						  	}
						}
						  
						sQl +=") values('"+_o.lst[i].slug+"'";

						for (var j = 0; j < _o.col.length; j++ ) {
							if (_o.col[j].Field !== "id" && _o.col[j].Field !== "slug") {
								if (_o.col[j].Type.split("(")[0] !== "int") {
									sQl += ",'"+_o.lst[i][_o.col[j].Field]+"'";
								}else{
									sQl += ","+_o.lst[i][_o.col[j].Field];
								}
							}
						}

						sQl +=")";
					dbtools.createData(sQl,[]);
				}else{
					var sQl = "update st_liste_evalue set slug='"+_o.lst[i].slug+"'";
						for (var j = 0; j < _o.col.length; j++ ) {
							if (_o.col[j].Field !== "id" && _o.col[j].Field !== "slug") {
								if (_o.col[j].Type.split("(")[0] !== "int") {
									sQl += " ,"+_o.col[j].Field +" = '"+_o.lst[i][_o.col[j].Field]+"'";
								}else{
									sQl += " ,"+_o.col[j].Field +" = "+_o.lst[i][_o.col[j].Field];
								}
							}
						}

						sQl += " where slug = '"+_o.lst[i].slug+"'";
					dbtools.execute(sQl);
				}
			}
		}
	}
})();