var dbtools = {};

(function() {
    var co = new air.SQLConnection(),
        xmlString = air.NativeApplication.nativeApplication.applicationDescriptor,
        appXml = new DOMParser();
    var xmlObject = appXml.parseFromString(xmlString, "text/xml");
    var root = xmlObject.getElementsByTagName('application')[0];
    var appVersion = root.getElementsByTagName("versionNumber")[0];
    var appName = root.getElementsByTagName("name")[0];
    var appli_vers = appVersion.firstChild.data.replace(/\./g,'_'),
        nameDb = 'reqapp.db';
        nameDb = 'stat_auto.db';
    dbtools.baseExist = false;
    if(_dbInApp && _dbInApp == 1) {
        var db_file = air.File.applicationDirectory.resolvePath('src/datas/' + nameDb), ioErrorHandler = function(e){ };
        dbtools.dbInApp = true;
    } else {
        var db_file = air.File.userDirectory.resolvePath('RequestAPP/sources/'+nameDb), ioErrorHandler = function(e){ };
        dbtools.dbInApp = false;
    }
    
    if(db_file.exists){
        co.open(db_file);
        dbtools.baseExist = true;
    }else{
        var prefsFile = air.File.userDirectory;
            prefsFile = prefsFile.resolvePath("RequestAPP");
            var cheminDirectory = prefsFile.nativePath.replace(/\\/g,"\/" );
        var destPath = cheminDirectory+"/sources/" + nameDb;
        var dataTarget = "reqapp.db";
        try{
            var path = webserviceAssetUrl + dataTarget,
                onBytesLoader = function(evt){
                    var myFile = new air.File(air.File.applicationDirectory.resolvePath(destPath).nativePath),
                        myFileStream = new air.FileStream();
                    myFileStream.open(myFile, air.FileMode.WRITE);
                    myFileStream.writeBytes(evt.target.data, 0, evt.target.data);
                    myFileStream.close();
                    var db_files = air.File.userDirectory.resolvePath('RequestAPP/sources/' + nameDb);
                    try{
                        co.open(db_files);
                         dbtools.baseExist = true;
                    }catch(err){}
                }; alert(path);
            var byteLoader = new air.URLLoader();
            byteLoader.dataFormat = air.URLLoaderDataFormat.BINARY;
            byteLoader.addEventListener(air.Event.COMPLETE,onBytesLoader);
            byteLoader.addEventListener(air.IOErrorEvent.IO_ERROR, ioErrorHandler,false,0,true); 
            var fileRequest = new air.URLRequest(path);
            byteLoader.load(fileRequest);
            
        }catch(err){}
    }
    /*
    try{
        co.open(db_file);
    }catch (er){}
    */  
    var getResult = function(sql, params) {
        var cmd = new air.SQLStatement();
        cmd.sqlConnection = co;
        cmd.text = sql;

        if (params) {
            for (var i = 0; i < params.length; i++) {
                cmd.parameters[i] = params[i];
            }
        }

        cmd.execute();
        return cmd.getResult().data;
    };

    var createData = function(sql, params) {
        var cmd = new air.SQLStatement();
        cmd.sqlConnection = co;
        cmd.text = sql;

        if (params) {
            for (var i = 0; i < params.length; i++) {
                cmd.parameters[i] = params[i];
            }
        }
        return cmd.execute();
    };

    var getRow = function(sql, params) {
        var cmd = new air.SQLStatement();
        cmd.sqlConnection = co;
        cmd.text = sql;

        if (params) {
            for (var i = 0; i < params.length; i++) {
                cmd.parameters[i] = params[i];
            }
        }
        cmd.execute();
        var results, result;
        if (cmd.getResult) {
            results = cmd.getResult().data;
        }
        if (results && results.length > 0) {
            result = results[0];
        }
        return result;
    };

    /* Transactions  */
    var open_db = function openDb() {
        var co = new DBCo();
        co.open(db_file);
        return co;
    };

    var DBCo = function() {
        this.conn = new air.SQLConnection();
    };

    DBCo.prototype = {
        open: function(filepath) {
            this.conn.open(filepath);
        },
        begin: function() {
            this.conn.begin();
        },
        getStatement: function() {
            var st = new air.SQLStatement();
            st.sqlConnection = this.conn;
            return st;
        },
        fillRequest: function(st, keys, values, exceptionColumnMap) {
            if (!keys) {
                return;
            }

            if (!values) {
                var v = keys;
                for (var i = 0; i < v.length; i++) {
                    st.parameters[i] = v[i];
                }
                return;
            }

            keys.forEach(function(k) {
                value = values[k];
                if (exceptionColumnMap) {
                    for (var key in exceptionColumnMap) {
                        if (key == k) {
                            value = values[exceptionColumnMap[key]];
                        }
                    }
                }

                st.parameters[":" + k] = value;

            });
        },
        getResult: function(sql, key, values) {
            var st = this.getStatement();
            st.text = sql;

            this.fillRequest(st, key, values);

            st.execute();
            return st.getResult().data;
        },
        getRow: function(sql, key, values) {
            var st = this.getStatement();
            st.text = sql;

            this.fillRequest(st, key, values);

            st.execute();
            var result = st.getResult().data;
            if (result[0]) {
                return result[0];
            } else {
                return [];
            }
        },
        execute: function(sql, key, values) {
            var st = this.getStatement();
            st.text = sql;

            this.fillRequest(st, key, values);

            st.execute();
        },
        massExecute: function(sql, key, valueslist, exceptionColumnMap, returnLastId) {
            var st = this.getStatement();
            st.text = sql;
            var self = this;
            valueslist.forEach(function(values) {
                self.fillRequest(st, key, values, exceptionColumnMap, returnLastId);
                st.execute();
            });
        },
        getTableFieldNames: function(tableName) {
            this.conn.loadSchema(air.SQLTableSchema, tableName);
            var schema = this.conn.getSchemaResult();
            return schema.tables[0].columns.map(function(el) {
                return el.name;
            });
        },
        commit: function() {
            this.conn.commit();
        },
        rollback: function() {
            this.conn.rollback();
        }
    };


    dbtools.getResult = getResult;
    dbtools.createData = createData;
    dbtools.getSingleResult = getRow;
    dbtools.openDb = open_db;
    dbtools.execute = createData;

}());

