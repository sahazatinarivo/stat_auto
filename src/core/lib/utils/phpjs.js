function base64_encode(data) {
    //  discuss at: http://phpjs.org/functions/base64_encode/
    // original by: Tyler Akins (http://rumkin.com)
    // improved by: Bayron Guevara
    // improved by: Thunder.m
    // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // improved by: Rafał Kukawski (http://kukawski.pl)
    // bugfixed by: Pellentesque Malesuada
    //   example 1: base64_encode('Kevin van Zonneveld');
    //   returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA=='
    //   example 2: base64_encode('a');
    //   returns 2: 'YQ=='

    var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
    var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
    ac = 0,
    enc = '',
    tmp_arr = [];

    if (!data) {
        return data;
    }

    do { // pack three octets into four hexets
        o1 = data.charCodeAt(i++);
        o2 = data.charCodeAt(i++);
        o3 = data.charCodeAt(i++);

        bits = o1 << 16 | o2 << 8 | o3;

        h1 = bits >> 18 & 0x3f;
        h2 = bits >> 12 & 0x3f;
        h3 = bits >> 6 & 0x3f;
        h4 = bits & 0x3f;

        // use hexets to index into b64, and append result to encoded string
        tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
    } while (i < data.length);

    enc = tmp_arr.join('');

    var r = data.length % 3;

    return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
}


function get_html_translation_table(table, quote_style) {
    //  discuss at: http://phpjs.org/functions/get_html_translation_table/
    // original by: Philip Peterson
    //  revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // bugfixed by: noname
    // bugfixed by: Alex
    // bugfixed by: Marco
    // bugfixed by: madipta
    // bugfixed by: Brett Zamir (http://brett-zamir.me)
    // bugfixed by: T.Wild
    // improved by: KELAN
    // improved by: Brett Zamir (http://brett-zamir.me)
    //    input by: Frank Forte
    //    input by: Ratheous
    //        note: It has been decided that we're not going to add global
    //        note: dependencies to php.js, meaning the constants are not
    //        note: real constants, but strings instead. Integers are also supported if someone
    //        note: chooses to create the constants themselves.
    //   example 1: get_html_translation_table('HTML_SPECIALCHARS');
    //   returns 1: {'"': '&quot;', '&': '&amp;', '<': '&lt;', '>': '&gt;'}

    var entities = {},
    hash_map = {},
    decimal;
    var constMappingTable = {},
    constMappingQuoteStyle = {};
    var useTable = {},
    useQuoteStyle = {};

    // Translate arguments
    constMappingTable[0] = 'HTML_SPECIALCHARS';
    constMappingTable[1] = 'HTML_ENTITIES';
    constMappingQuoteStyle[0] = 'ENT_NOQUOTES';
    constMappingQuoteStyle[2] = 'ENT_COMPAT';
    constMappingQuoteStyle[3] = 'ENT_QUOTES';

    useTable = !isNaN(table) ? constMappingTable[table] : table ? table.toUpperCase() : 'HTML_SPECIALCHARS';
    useQuoteStyle = !isNaN(quote_style) ? constMappingQuoteStyle[quote_style] : quote_style ? quote_style.toUpperCase() :
    'ENT_COMPAT';

    if (useTable !== 'HTML_SPECIALCHARS' && useTable !== 'HTML_ENTITIES') {
        throw new Error('Table: ' + useTable + ' not supported');
    // return false;
    }

    entities['38'] = '&amp;';
    if (useTable === 'HTML_ENTITIES') {
        entities['160'] = '&nbsp;';
        entities['161'] = '&iexcl;';
        entities['162'] = '&cent;';
        entities['163'] = '&pound;';
        entities['164'] = '&curren;';
        entities['165'] = '&yen;';
        entities['166'] = '&brvbar;';
        entities['167'] = '&sect;';
        entities['168'] = '&uml;';
        entities['169'] = '&copy;';
        entities['170'] = '&ordf;';
        entities['171'] = '&laquo;';
        entities['172'] = '&not;';
        entities['173'] = '&shy;';
        entities['174'] = '&reg;';
        entities['175'] = '&macr;';
        entities['176'] = '&deg;';
        entities['177'] = '&plusmn;';
        entities['178'] = '&sup2;';
        entities['179'] = '&sup3;';
        entities['180'] = '&acute;';
        entities['181'] = '&micro;';
        entities['182'] = '&para;';
        entities['183'] = '&middot;';
        entities['184'] = '&cedil;';
        entities['185'] = '&sup1;';
        entities['186'] = '&ordm;';
        entities['187'] = '&raquo;';
        entities['188'] = '&frac14;';
        entities['189'] = '&frac12;';
        entities['190'] = '&frac34;';
        entities['191'] = '&iquest;';
        entities['192'] = '&Agrave;';
        entities['193'] = '&Aacute;';
        entities['194'] = '&Acirc;';
        entities['195'] = '&Atilde;';
        entities['196'] = '&Auml;';
        entities['197'] = '&Aring;';
        entities['198'] = '&AElig;';
        entities['199'] = '&Ccedil;';
        entities['200'] = '&Egrave;';
        entities['201'] = '&Eacute;';
        entities['202'] = '&Ecirc;';
        entities['203'] = '&Euml;';
        entities['204'] = '&Igrave;';
        entities['205'] = '&Iacute;';
        entities['206'] = '&Icirc;';
        entities['207'] = '&Iuml;';
        entities['208'] = '&ETH;';
        entities['209'] = '&Ntilde;';
        entities['210'] = '&Ograve;';
        entities['211'] = '&Oacute;';
        entities['212'] = '&Ocirc;';
        entities['213'] = '&Otilde;';
        entities['214'] = '&Ouml;';
        entities['215'] = '&times;';
        entities['216'] = '&Oslash;';
        entities['217'] = '&Ugrave;';
        entities['218'] = '&Uacute;';
        entities['219'] = '&Ucirc;';
        entities['220'] = '&Uuml;';
        entities['221'] = '&Yacute;';
        entities['222'] = '&THORN;';
        entities['223'] = '&szlig;';
        entities['224'] = '&agrave;';
        entities['225'] = '&aacute;';
        entities['226'] = '&acirc;';
        entities['227'] = '&atilde;';
        entities['228'] = '&auml;';
        entities['229'] = '&aring;';
        entities['230'] = '&aelig;';
        entities['231'] = '&ccedil;';
        entities['232'] = '&egrave;';
        entities['233'] = '&eacute;';
        entities['234'] = '&ecirc;';
        entities['235'] = '&euml;';
        entities['236'] = '&igrave;';
        entities['237'] = '&iacute;';
        entities['238'] = '&icirc;';
        entities['239'] = '&iuml;';
        entities['240'] = '&eth;';
        entities['241'] = '&ntilde;';
        entities['242'] = '&ograve;';
        entities['243'] = '&oacute;';
        entities['244'] = '&ocirc;';
        entities['245'] = '&otilde;';
        entities['246'] = '&ouml;';
        entities['247'] = '&divide;';
        entities['248'] = '&oslash;';
        entities['249'] = '&ugrave;';
        entities['250'] = '&uacute;';
        entities['251'] = '&ucirc;';
        entities['252'] = '&uuml;';
        entities['253'] = '&yacute;';
        entities['254'] = '&thorn;';
        entities['255'] = '&yuml;';
    }

    if (useQuoteStyle !== 'ENT_NOQUOTES') {
        entities['34'] = '&quot;';
    }
    if (useQuoteStyle === 'ENT_QUOTES') {
        entities['39'] = '&#39;';
    }
    entities['60'] = '&lt;';
    entities['62'] = '&gt;';

    // ascii decimals to real symbols
    for (decimal in entities) {
        if (entities.hasOwnProperty(decimal)) {
            hash_map[String.fromCharCode(decimal)] = entities[decimal];
        }
    }

    return hash_map;
}


function html_entity_decode(string, quote_style) {
    //  discuss at: http://phpjs.org/functions/html_entity_decode/
    // original by: john (http://www.jd-tech.net)
    //    input by: ger
    //    input by: Ratheous
    //    input by: Nick Kolosov (http://sammy.ru)
    // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // improved by: marc andreu
    //  revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    //  revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // bugfixed by: Onno Marsman
    // bugfixed by: Brett Zamir (http://brett-zamir.me)
    // bugfixed by: Fox
    //  depends on: get_html_translation_table
    //   example 1: html_entity_decode('Kevin &amp; van Zonneveld');
    //   returns 1: 'Kevin & van Zonneveld'
    //   example 2: html_entity_decode('&amp;lt;');
    //   returns 2: '&lt;'

    var hash_map = {},
    symbol = '',
    tmp_str = '',
    entity = '';
    tmp_str = string.toString();

    if (false === (hash_map = get_html_translation_table('HTML_ENTITIES', quote_style))) {
        return false;
    }

    // fix &amp; problem
    // http://phpjs.org/functions/get_html_translation_table:416#comment_97660
    delete(hash_map['&']);
    hash_map['&'] = '&amp;';

    for (symbol in hash_map) {
        entity = hash_map[symbol];
        tmp_str = tmp_str.split(entity)
        .join(symbol);
    }
    tmp_str = tmp_str.split('&#039;')
    .join("'");

    return tmp_str;
}


function preg_replace(pattern, pattern_replace, subject, limit) {
    // Perform a regular expression search and replace
    // 
    // discuss at: http://geekfg.net/
    // +   original by: Francois-Guillaume Ribreau (http://fgribreau)
    // *     example 1: preg_replace("/(\\@([^\\s,\\.]*))/ig",'<a href="http://twitter.com/\\0">\\1</a>','#followfriday @FGRibreau @GeekFG',1);
    // *     returns 1: "#followfriday <a href="http://twitter.com/@FGRibreau">@FGRibreau</a> @GeekFG"
    // *     example 2: preg_replace("/(\\@([^\\s,\\.]*))/ig",'<a href="http://twitter.com/\\0">\\1</a>','#followfriday @FGRibreau @GeekFG');
    // *     returns 2: "#followfriday <a href="http://twitter.com/@FGRibreau">@FGRibreau</a> @GeekFG"
    // *     example 3: preg_replace("/(\\#[^\\s,\\.]*)/ig",'<strong>$0</strong>','#followfriday @FGRibreau @GeekFG');
    // *     returns 3: "<strong>#followfriday</strong> @FGRibreau @GeekFG"

    if (limit === undefined) {
        limit = -1;
    }

    var _flag = pattern.substr(pattern.lastIndexOf(pattern[0]) + 1),
    _pattern = pattern.substr(1, pattern.lastIndexOf(pattern[0]) - 1),
    reg = new RegExp(_pattern, _flag),
    rs = null,
    res = [],
    x = 0,
    y = 0,
    ret = subject;

    if (limit === -1) {
        var tmp = [];

        do {
            tmp = reg.exec(subject);
            if (tmp !== null) {
                res.push(tmp);
            }
        } while (tmp !== null && _flag.indexOf('g') !== -1)
    }
    else {
        res.push(reg.exec(subject));
    }

    for (x = res.length - 1; x > -1; x--) {//explore match
        tmp = pattern_replace;

        for (y = res[x].length - 1; y > -1; y--) {
            tmp = tmp.replace('${' + y + '}', res[x][y])
            .replace('$' + y, res[x][y])
            .replace('\\' + y, res[x][y]);
        }
        ret = ret.replace(res[x][0], tmp);
    }
    return ret;
}



function substr(str, start, len) {
    //  discuss at: http://phpjs.org/functions/substr/
    //     version: 909.322
    // original by: Martijn Wieringa
    // bugfixed by: T.Wild
    // improved by: Onno Marsman
    // improved by: Brett Zamir (http://brett-zamir.me)
    //  revised by: Theriault
    //        note: Handles rare Unicode characters if 'unicode.semantics' ini (PHP6) is set to 'on'
    //   example 1: substr('abcdef', 0, -1);
    //   returns 1: 'abcde'
    //   example 2: substr(2, 0, -6);
    //   returns 2: false
    //   example 3: ini_set('unicode.semantics',  'on');
    //   example 3: substr('a\uD801\uDC00', 0, -1);
    //   returns 3: 'a'
    //   example 4: ini_set('unicode.semantics',  'on');
    //   example 4: substr('a\uD801\uDC00', 0, 2);
    //   returns 4: 'a\uD801\uDC00'
    //   example 5: ini_set('unicode.semantics',  'on');
    //   example 5: substr('a\uD801\uDC00', -1, 1);
    //   returns 5: '\uD801\uDC00'
    //   example 6: ini_set('unicode.semantics',  'on');
    //   example 6: substr('a\uD801\uDC00z\uD801\uDC00', -3, 2);
    //   returns 6: '\uD801\uDC00z'
    //   example 7: ini_set('unicode.semantics',  'on');
    //   example 7: substr('a\uD801\uDC00z\uD801\uDC00', -3, -1)
    //   returns 7: '\uD801\uDC00z'

    var i = 0,
    allBMP = true,
    es = 0,
    el = 0,
    se = 0,
    ret = '';
    str += '';
    var end = str.length;

    // BEGIN REDUNDANT
    this.php_js = this.php_js || {};
    this.php_js.ini = this.php_js.ini || {};
    // END REDUNDANT
    switch ((this.php_js.ini['unicode.semantics'] && this.php_js.ini['unicode.semantics'].local_value.toLowerCase())) {
        case 'on':
            // Full-blown Unicode including non-Basic-Multilingual-Plane characters
            // strlen()
            for (i = 0; i < str.length; i++) {
                if (/[\uD800-\uDBFF]/.test(str.charAt(i)) && /[\uDC00-\uDFFF]/.test(str.charAt(i + 1))) {
                    allBMP = false;
                    break;
                }
            }

            if (!allBMP) {
                if (start < 0) {
                    for (i = end - 1, es = (start += end); i >= es; i--) {
                        if (/[\uDC00-\uDFFF]/.test(str.charAt(i)) && /[\uD800-\uDBFF]/.test(str.charAt(i - 1))) {
                            start--;
                            es--;
                        }
                    }
                } else {
                    var surrogatePairs = /[\uD800-\uDBFF][\uDC00-\uDFFF]/g;
                    while ((surrogatePairs.exec(str)) != null) {
                        var li = surrogatePairs.lastIndex;
                        if (li - 2 < start) {
                            start++;
                        } else {
                            break;
                        }
                    }
                }

                if (start >= end || start < 0) {
                    return false;
                }
                if (len < 0) {
                    for (i = end - 1, el = (end += len); i >= el; i--) {
                        if (/[\uDC00-\uDFFF]/.test(str.charAt(i)) && /[\uD800-\uDBFF]/.test(str.charAt(i - 1))) {
                            end--;
                            el--;
                        }
                    }
                    if (start > end) {
                        return false;
                    }
                    return str.slice(start, end);
                } else {
                    se = start + len;
                    for (i = start; i < se; i++) {
                        ret += str.charAt(i);
                        if (/[\uD800-\uDBFF]/.test(str.charAt(i)) && /[\uDC00-\uDFFF]/.test(str.charAt(i + 1))) {
                            // Go one further, since one of the "characters" is part of a surrogate pair
                            se++;
                        }
                    }
                    return ret;
                }
                break;
            }
        // Fall-through
        case 'off':
        // assumes there are no non-BMP characters;
        //    if there may be such characters, then it is best to turn it on (critical in true XHTML/XML)
        default:
            if (start < 0) {
                start += end;
            }
            end = typeof len === 'undefined' ? end : (len < 0 ? len + end : len + start);
            // PHP returns false if start does not fall within the string.
            // PHP returns false if the calculated end comes before the calculated start.
            // PHP returns an empty string if start and end are the same.
            // Otherwise, PHP returns the portion of the string from start to end.
            return start >= str.length || start < 0 || start > end ? !1 : str.slice(start, end);
    }
    // Please Netbeans
    return undefined;
}


function strip_tags(input, allowed) {
    //  discuss at: http://phpjs.org/functions/strip_tags/
    // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // improved by: Luke Godfrey
    // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    //    input by: Pul
    //    input by: Alex
    //    input by: Marc Palau
    //    input by: Brett Zamir (http://brett-zamir.me)
    //    input by: Bobby Drake
    //    input by: Evertjan Garretsen
    // bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // bugfixed by: Onno Marsman
    // bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // bugfixed by: Eric Nagel
    // bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // bugfixed by: Tomasz Wesolowski
    //  revised by: Rafał Kukawski (http://blog.kukawski.pl/)
    //   example 1: strip_tags('<p>Kevin</p> <br /><b>van</b> <i>Zonneveld</i>', '<i><b>');
    //   returns 1: 'Kevin <b>van</b> <i>Zonneveld</i>'
    //   example 2: strip_tags('<p>Kevin <img src="someimage.png" onmouseover="someFunction()">van <i>Zonneveld</i></p>', '<p>');
    //   returns 2: '<p>Kevin van Zonneveld</p>'
    //   example 3: strip_tags("<a href='http://kevin.vanzonneveld.net'>Kevin van Zonneveld</a>", "<a>");
    //   returns 3: "<a href='http://kevin.vanzonneveld.net'>Kevin van Zonneveld</a>"
    //   example 4: strip_tags('1 < 5 5 > 1');
    //   returns 4: '1 < 5 5 > 1'
    //   example 5: strip_tags('1 <br/> 1');
    //   returns 5: '1  1'
    //   example 6: strip_tags('1 <br/> 1', '<br>');
    //   returns 6: '1 <br/> 1'
    //   example 7: strip_tags('1 <br/> 1', '<br><br/>');
    //   returns 7: '1 <br/> 1'

    allowed = (((allowed || '') + '')
        .toLowerCase()
        .match(/<[a-z][a-z0-9]*>/g) || [])
    .join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
    var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
    commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
    return input.replace(commentsAndPhpTags, '')
    .replace(tags, function($0, $1) {
        return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
    });
}


/**
 * Remove some tags attributs
 * style, class
 */
function removeTagsAttr(str) {
    str = str.replace(/style="[^"]*"/, "");
    str = str.replace(/class="[^"]*"/, "");

    return str;
}

/*
 * Clean html text
 * Remove empty tags
 */
function removeEmptyTags(str) {
    /*var pattern = "/<p[^>]*><\\/p[^>]*>/";   
     var content = preg_replace(pattern, '', str);*/

    str = str.replace("<p></p>", "");
    str = str.replace("<p>&nbsp;</p>", "");
    str = str.replace("<p>&nbsp;</p>", "");

    return str;
}

function strstr(haystack, needle, bool) {
    //  discuss at: http://phpjs.org/functions/strstr/
    // original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // bugfixed by: Onno Marsman
    // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    //   example 1: strstr('Kevin van Zonneveld', 'van');
    //   returns 1: 'van Zonneveld'
    //   example 2: strstr('Kevin van Zonneveld', 'van', true);
    //   returns 2: 'Kevin '
    //   example 3: strstr('name@example.com', '@');
    //   returns 3: '@example.com'
    //   example 4: strstr('name@example.com', '@', true);
    //   returns 4: 'name'

    var pos = 0;

    haystack += '';
    pos = haystack.indexOf(needle);
    if (pos == -1) {
        return false;
    } else {
        if (bool) {
            return haystack.substr(0, pos);
        } else {
            return haystack.slice(pos);
        }
    }
}
