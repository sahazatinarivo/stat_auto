
(function(){
	models.liste = {
		getParams:function( _p ){
			var sQl = "select count(*) as count from st_params"+
				  	  " where params = ? and etat = ?";
			rows = dbtools.getSingleResult(sQl,[ _p , 1 ]);
			return rows;
		},

		searchePers:function( _cln , _cle ){
			var sQl = "select "+_cln+" as cln, id as id from st_liste_evalue"+
				  	  " where "+_cln+" like '%"+_cle+"%'";
			rows = dbtools.getResult(sQl,[]);
			return rows;
		},

		getClnSearche:function(){
			var sQl = "select colonne as cln from st_recherche"+
				  	  " where etat = 1 limit 1";
			rows = dbtools.getSingleResult(sQl,[]);
			return rows;
		}
	}
})();