(function(){
	models.mask = {
		getPages:function(){
			var sQl = "select * from st_pages"+
				  	  " where etat = 1";
			rows = dbtools.getResult(sQl,[]);
			return rows;
		},

		activerPgSave:function( _l , _p ){
			sQl = "update st_page_actives set saisie_"+session.get('saisie')+"=1"+
				  " where id_liste=? and page=?";
			
			dbtools.execute(sQl,[ _l , _p ]);
		},

		recupDonneSaisie:function( iLst ){
			var sQl = "select * from st_datas_"+session.get('saisie')+""+
				  	  " where id_liste = ?";
			rows = dbtools.getResult(sQl,[ iLst ]);
			return rows;
		},

		getPgWithListe:function( _o , _iLst ){
			var sQl = "select pa.page as iPg,"+
							  " pa.id_liste as iLst,"+
							  " pg.nom_page as nPg,"+
							  " pa.saisie_"+_o+" as eSsi"+
					  " from st_page_actives pa"+
					  " join st_pages pg on pa.page = pg.id"+
				  	  " where pg.etat = 1 and pa.id_liste=?";

			rows = dbtools.getResult(sQl,[ _iLst ]);
			return rows;
		},

		getParamsPg:function( _o ){
			var sQl = "select pa.id_liste as lst,pa.page as id,pg.nom_page as nom_page,pa.saisie_"+_o+" as etat"+
				      " from st_page_actives pa"+
					  " join st_pages pg on pa.page=pg.id";
			rows = dbtools.getResult(sQl,[]);
			return rows;
		},

		getPagesMin:function(){
			var sQl = "select min(id) as idmin from st_pages"+
				  	  " where etat = 1";
			rows = dbtools.getSingleResult(sQl,[]);
			return rows;
		},

		getPagesMax:function(){
			var sQl = "select max(id) as idmax from st_pages"+
				  	  " where etat = 1";
			rows = dbtools.getSingleResult(sQl,[]);
			return rows;
		},

		pageBySlug:function( _slug ){
			var sQl = "select id as idpages from st_pages"+
				  	  " where slug = ?";
			rows = dbtools.getSingleResult(sQl,[ _slug ]);
			return rows;
		},

		getHtml:function( _page ){
			var sQl = "select * from st_code_html"+
				  	  " where id_page = ? order by ordre";
			rows = dbtools.getResult(sQl,[ _page ]);
			return rows;
		},

		siPagesSave:function( _l , _p ){
			var sQl = "select * from st_page_actives"+
				  	  " where id_liste = ? and page = ?";
			rows = dbtools.getSingleResult(sQl,[ _l , _p ]);
			return rows;
		},

		savePgAct:function( _o , _l , _p ){
			var sQl = null;
			if ( _o == "uns") {
				sQl = "insert into st_page_actives(id_liste,page,saisie_uns) values(?,?,0)";
			}else{
				sQl = "insert into st_page_actives(id_liste,page,saisie_deuxs) values(?,?,0)";
			}
			dbtools.execute(sQl,[ _l , _p ]);
		},

		insertDataSaisie:function( _col , _lst , _qst , _arr , _us , _uu, _di , _du ){
			var _sqlVrf = "select * from st_datas_"+session.get('saisie')+
						  " where id_liste="+_lst+" and quest='"+_qst+"'";
			rslVr = dbtools.getSingleResult(_sqlVrf,[]);
			var sQl = null;

			if (jQuery.isEmptyObject(rslVr)) {
				sQl = 	"insert into st_datas_"+session.get('saisie')+"(id_liste, quest";
					   	for (var i = 0; i < _col.length; i++) {
					  		sQl += ",'"+_col[i].champ+"'"
						};
						
						sQl += ",user_save,created_at) values("+_lst+",'"+_qst+"'";

						for (var i = 0; i < _col.length; i++) {
					  		sQl += ",'"+_arr[""+_col[i].value.toLowerCase()+""]+"'";
						};

						sQl += ","+_us+",'"+_di+"')";
			}else{
				sQl = "update st_datas_"+session.get('saisie')+" set quest='"+_qst+"'";
					  for (var i = 0; i < _col.length; i++) {
					  	sQl += ",'"+_col[i].champ+"'='"+_arr[""+_col[i].value.toLowerCase()+""]+"'";
					  };
					  sQl += ",user_update='"+_uu+"',updated_at='"+_du+"' where id_liste="+_lst+" and quest='"+_qst+"'";
			}

			dbtools.execute(sQl,[]);
		},

		saveDataMask:function( _o ){
			var vrf = "select * from st_datas_"+session.get('saisie')+" where colonne= ?";
			rows = dbtools.getResult(vrf,[ _o.rch[i].colonne ]);
			if (jQuery.isEmptyObject(rows)) {
				sQl = "insert into st_recherche(colonne) values(?)";
				dbtools.execute(sQl,[ _o.rch[i].colonne ]);
			}else{
				var sQl = "update st_recherche set colonne = ? where colonne= ? ";
				dbtools.execute(sQl,[ _o.rch[i].colonne , _o.rch[i].colonne ]);
			}
		}
	}
})();