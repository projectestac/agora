var p_moodle = "http://localhost/agora/eoi1/moodle/mod/eoicampus/action/servlets.php";
var ws_host = "http://localhost:8080/eoicampus/services/EOICampusWS";
var ws_user = "eoicampus";
var ws_pass = "eoicampus";
var p_level = '';


function setHost(t) {
    ws_host = t;
}
function setUser(t) {
    ws_user = t;
}
function setPass(t) {
    ws_pass = t;
}
function setMoodleServer(t) {
    p_moodle = t;
}

function changeType(elem) {
    getPathways(null, null);
}

function getPathways(level, pwid) {
    set_pvars();
//XTEC ************ AFEGIT - yui2 to yui 2in3 conversion. Open function.
//2013.01.14 @aginard
    YUI().use('yui2-dom', function (Y) {
        // This will make your YUI 2 code run unmodified
        var YAHOO = Y.YUI2;
//************ FI

        //alert("function getPathways ("+level+", "+pwid+")"); //just for debug
        var pwlevel = document.getElementsByName('pwslevel')[0].value;
        var lang = document.getElementsByName('pwlang')[0].value;
        var profile = document.getElementsByName('pwprofile')[0].value;
        var centre = document.getElementsByName('pwcentre')[0].value;
        var type = YAHOO.util.Dom.get('id_pwtype').value;
        var pwid_sel = YAHOO.util.Dom.get('id_pwid');

        var request = 'xml=';
        request += '<item>';
        request += '<user>85</user>';
        request += '<level>' + pwlevel + '</level>';
        request += '<types><type>' + type + '</type></types>';
        request += '<lang>' + lang + '</lang>';
        request += '<profile>' + profile + '</profile>';
        request += '<centre>' + centre + '</centre>';
        request += '</item>';
        //alert(p_moodle+'?host='+p_host+'&port='+p_port+'&path='+p_getPathways); //just for debug
        //alert(request); //just for debug
        sendRequest(p_moodle + '?host=' + ws_host, request, pwid);
        pwid_sel.options.length = 0;
        pwid_sel.options[0] = new Option("Loading...", 0);
        YAHOO.util.Dom.get('id_pwtype').disabled = false;

//XTEC ************ AFEGIT - yui2 to yui 2in3 conversion. Close function.
//2013.01.14 @aginard
    });
//************ FI

}

function loadPathways(t, pwid_sel) {

//XTEC ************ AFEGIT - yui2 to yui 2in3 conversion. Open function.
//2013.01.14 @aginard
    YUI().use('yui2-dom', function (Y) {
        // This will make your YUI 2 code run unmodified
        var YAHOO = Y.YUI2;
//************ FI

//alert("function loadPathways("+t+", "+pwid_sel+")"); //just for debug
        var ePathways = getXMLElements(t.responseXML, 'pathway');
        YAHOO.util.Dom.get('id_pwid').options[0] = new Option("Choose...", 0);
        for (i = 0; i < ePathways.length; i++) {
            var pwId = getXMLAttribute(ePathways[i], 'id');
            var pwTitle = getXMLText(ePathways[i], 'title');
            YAHOO.util.Dom.get('id_pwid').options[i + 1] = new Option(pwTitle, pwId);
            //Added this condition to resolve the issue of selected option on google chrome. 10/12/2013. @Nadim
            if (pwId == pwid_sel) {
                document.getElementById('id_pwid').value = pwid_sel;
            }
        }
        //alert(pwid_sel);


//XTEC ************ AFEGIT - yui2 to yui 2in3 conversion. Close function.
//2013.01.14 @aginard
    });
//************ FI

}


function sendRequest(service, params, pwid) {

//XTEC ************ AFEGIT - yui2 to yui 2in3 conversion. Open function.
//2013.01.14 @aginard
    YUI().use('yui2-connection', function (Y) {
        // This will make your YUI 2 code run unmodified
        var YAHOO = Y.YUI2;
//************ FI

        //alert("function sendRequest( "+service+", "+xml+", "+pwid+")"); //just for debug
        var callback = {
            success: function (request) {
                //alert("sendRequest response: "+request.responseText); //just for debug
                loadPathways(request, pwid);
            },
            failure: function (request) {
                alert("sendRequest failed: " + request.statusText);
            }
        };

        var Ajax = YAHOO.util.Connect.asyncRequest('POST', service, callback, params);

//XTEC ************ AFEGIT - yui2 to yui 2in3 conversion.
//2013.01.14 @aginard
    });
//************ FI

}

function getXMLElements(e, elemName) {
    //alert("function getXMLElements("+e+", "+elemName+")"); //just for debug
    if (e.getElementsByTagName(elemName).length > 0) {
        return e.getElementsByTagName(elemName);
    }
    return "";
}

function getXMLAttribute(e, attName) {
    if (e.attributes.getNamedItem(attName) != null) {
        return e.attributes.getNamedItem(attName).value;
    }
    return "";
}

function getXMLText(e, elemName) {
    var text = "";
    if (elemName == null && e != null) {
        if (e.childNodes[1] == null) text = e.firstChild.nodeValue;
        else text = e.childNodes[1].nodeValue;
    } else if (e.getElementsByTagName(elemName).length > 0 && e.getElementsByTagName(elemName)[0].firstChild != null) {
        text = e.getElementsByTagName(elemName)[0].firstChild.nodeValue;
    }
    return text;
}

