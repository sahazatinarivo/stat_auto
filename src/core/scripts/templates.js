var templates={};

(function() {
        
        var pad=function (number, length) {
            
            var str = '' + number;
            while (str.length < length) {
                str = '0' + str;
            }
            return str;
        };
        
        var env = new nunjucks.Environment(new nunjucks.HttpLoader('application/views'));
        
        /* Custom filters */
        env.addFilter('formatDate',function(date,kwargs) {
                var newDate=date;
                
                if(kwargs && kwargs.addDay) {
                    newDate=new Date();
                    newDate.setTime(date.getTime());
                    newDate.setDate(newDate.getDate()+30);
                }
                
                return [pad(newDate.getDate(),2),pad(newDate.getMonth()+1,2),newDate.getFullYear()].join('/');
        });
        
        env.addFilter('sep_millier', function(nombre){
            nombre += '';
            var sep = ' ';
            var reg = /(\d+)(\d{3})/;
            while( reg.test( nombre)) {
                nombre = (Math.round(nombre*100) / 100).toString() ; 
                nombre = nombre.replace( reg, '$1' + sep +'$2');
            }
            return nombre;
        });
        
        env.addFilter('crop_string', function(str){
            var new_str = '', 
                length = 20;
            
            if(str.length > length)
            {
                new_str = str.substring(0, length);
                new_str = new_str.substring(0, new_str.lastIndexOf(' ') + 1) + ' ...';                
            }
            
            return (new_str || str);
        });
        
        /**
        * HTML-Truncate Utility
        * This utility truncates html text and keep tag safe(close properly)
        */
        env.addFilter('html_truncate', function(string, maxLength, moreText){
            var Stack = function () {
                this.items = [];
            };

            Stack.prototype = {
                size: function () {
                    return this.items.length;
                },

                push: function (key) {
                    this.items.push(key);
                },

                pop: function () {
                    return this.items.pop();
                },

                /**
                 * dump all close tags and append to truncated content while reaching upperbound
                 */
                dumpCloseTag: function () {
                    var html = '',
                        i, len, tag;

                    for(i = 0, len = this.size(); i < len; ++i) {
                        tag = this.pop();
                        html += '</' + tag.tag + '>';
                    }

                    return html;
                }
            };

            var stack = new Stack();
            
            var content = "",       // traced text
               total = 0,          // record how many characters we traced so far
               matches = true,
               result, index, tag, tail;

            if(string.length >= maxLength){
                while(matches) {
                    matches = /<\/?\w+(\s+\w+="[^"]*")*>/g.exec(string);

                    if ( ! matches) { 
                        content = substr(string, 0, maxLength)+"...<br/>" ;
                        break; 
                    }else{
                        result = matches[0];
                        index = matches.index;

                        // overceed, dump everything to clear stack
                        if (total + index > maxLength) {
                            content += string.substring(0, maxLength - total);
                            content += stack.dumpCloseTag();
                            break;
                        } else {
                            total += index;
                            content += string.substring(0, index);
                        }

                        if (-1 === result.indexOf('</')) {
                            tail = result.indexOf(' ');
                            tail = (-1 === tail) ? result.indexOf('>') : tail;
                            stack.push({
                                tag: result.substring(1, tail),
                                html: result
                            });
                        } else {
                            stack.pop();
                        }
                        content += result;
                        string = string.substring(index + result.length);
                    }
                }
            }else{
                content = string;
            }
            return content;
        });
        
        /* Filtre strip tags */
        env.addFilter('strip_tags', function(input, allowed){
            var str = removeTagsAttr(input);
            return strip_tags(str, allowed);
        });
        
        /* Remove empty tags */
        env.addFilter('clean_html', function(input){
            return removeEmptyTags(input);
        });
        
        env.addFilter('clean_comment', function(input){
            return input.replace(/<!--([\s\S]*?)-->/mig, '');
        });
        
        
        /* End Custom filters */
        
        var divElem=null;
        var pageTable={};
        var currentPage=null;
        
        env.getTemplate('st_header.html',true);
        env.getTemplate('st_login.html',true);
        env.getTemplate('st_accueil.html',true);
        env.getTemplate('st_recherche.html',true);
        env.getTemplate('st_params.html',true);
        env.getTemplate('st_envoi.html',true);
        env.getTemplate('st_synchr.html',true);
        env.getTemplate('st_footer.html',true);
        env.getTemplate('st_mask.html',true);
       
        var execFunc=function(f,self,args) {
            if(f) {
                f.call(self,args);
            }
        };
        
        var createArgs=function(args) {
            var newArgs={};
            
            
            if(args) {
                for(k in args) {
                    newArgs[k]=args[k];
                }
            }
            
            newArgs.session=session.clone();
            return newArgs;
        };
        
        var render=function(name,args) {
            return env.render(name,createArgs(args));
        };
        
        var display=function(name,args) {
            divElem= divElem || $('#megadiv');
            
            var cb=pageTable[name];
            var newArgs=createArgs(args);
            
            if(currentPage) {
                var oldCb=pageTable[currentPage];
                if(oldCb) {
                    execFunc(oldCb.cleanup,oldCb);
                }
            }
            
            if(cb && !cb.initDone) {
                execFunc(cb.init,cb,newArgs);
                cb.initDone=true;
            }
            
            execFunc(cb && cb.pre,cb,newArgs);
            divElem.html(env.render(name,newArgs));
            execFunc(cb && cb.post,cb,newArgs);
            
            currentPage=name;
        };
        
        var registerPage=function(name,cbTable) {
            env.getTemplate(name,true);
            if(cbTable) {
                pageTable[name]=cbTable;
            }
        };
        
        templates.render=render;
        templates.display=display;
        templates.registerPage=registerPage;
}());
