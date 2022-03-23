var session={};

(function() {
        
        var sessionData={};
        
        session.get=function(key) {
            return sessionData[key];
        };
        
        session.set=function(key,value) {
            sessionData[key]=value;
        };
        
        session.del=function(key) {
            delete sessionData[key];
        };
        
        session.clear=function() {
            sessionData={};
        };
        
        session.clone=function() {
            var s={};
            for(var k in sessionData) {
                s[k]=sessionData[k];
            }
            return s;
        };
        
}());
