<?php
// Load configuration constants
if(!isset($CFG)) {
    require_once('../../../config.php');
}
require_once($CFG->dirroot . '/filter/wiris/wrs_config.php');

// get the current language
$lang = current_language();
if($lang) {
    $lang = substr($lang,0, 2);  //ignoring specific country code
}

// getting wiris cas config
$cas_codebase = $CFG->wiriscascodebase;
$cas_class = $CFG->wiriscasclass;
$cas_archive = $CFG->wiriscasarchive;
$cas_lang = '';

if(isset($langlist) && isset($langlist[0])) {
    foreach($langlist as $i=>$value) {
        if($langlist[$i] == $lang) {
            $cas_lang = $lang;
        }
    }
    if(!$cas_lang) {
        $cas_lang = $langlist[0];
    }
    // applying language
    $cas_archive = preg_replace('/_..\.jar$/i', '_' . $cas_lang . '.jar', $cas_archive);
    $cas_class = preg_replace('/_..$/i', '_' . $cas_lang, $cas_class);
} else {
    $langlist = false;
    echo ("// $cas_archive\n");
    if(preg_match('/_(..)\.jar/i', $cas_archive, $m)) {
        $cas_lang = $m[1];
    }
}

if(!$cas_lang) {
    die("Error in WIRIS plugin configuration file. Cannot find applet language.");
}
?>

/* constants */
var _lang="<?php  echo($lang);?>";

var defaultapplet = {
    code : "<?php echo $cas_class;?>",
    archive : "<?php echo $cas_archive;?>",
    codebase : "<?php echo $cas_codebase;?>",
    width : 450,
    height : 400,
    lang : "<?php  echo $cas_lang;?>",
    params : {}
};

var countGetImageBytes=0;

function _clone(obj) {
    if(typeof(obj) != 'object') return obj;
    if(obj == null) return obj;
    var cloned = new obj.constructor();
    for(var i in obj)
        cloned[i] = _clone(obj[i]);
        return cloned;
}

function _parseAppletCode(code, defApplet) {
    var applet = _clone(defApplet);
    var re = /\x3Capplet([^\x3E]*)\x3E([\s\S]*)\x3C\/applet\s*\x3E/i;
    var m = code.match(re);
    
    getAttr = function(text, name) {
        // getting simple quot or double quot
        var re = new RegExp("" + name + "\\s*=\\s*([\x22\x27])", "i");
        var m = text.match(re);
        if(m){
            var quot = m[1];
            re = new RegExp("" + name + "\\s*=\\s*" + quot + "([^"+ quot +"]*)" + quot, "i");
            m = text.match(re);
            if(m) return m[1];
        }
        return null;
    }
    
    if(m){
        var attributes = m[1];
        var params = m[2];
        applet.code = getAttr(attributes, "code");
        applet.codebase = getAttr(attributes, "codebase");
        applet.archive = getAttr(attributes, "archive");
        applet.width = getAttr(attributes, "width");
        applet.height = getAttr(attributes, "height");
        re = new RegExp("<param", "i");
        var p = params.split(re);
        for(var i=0; i<p.length; i++){
            var n = getAttr(p[i], "name");
            var v = getAttr(p[i], "value");
            if(v && n){
                n = n.toLowerCase();
                applet.params[n] = v;
            }
        }
        var m = applet.archive.match(/_(..)\.jar/i);
        if(m) applet.lang = m[1];
    }
    return applet;
}

function _createApplet(applet) {
    var parent = document.getElementById("appletcontainer");
    while(parent.lastChild){
        parent.removeChild(parent.lastChild);
    }
    var elem = document.createElement("applet");
    elem.setAttribute('name', "wirisapplet");
    elem.setAttribute('code', applet.code);
    elem.setAttribute('codebase', applet.codebase);
    elem.setAttribute('archive', applet.archive);
    elem.setAttribute('width', "100%");
    elem.setAttribute('height', "100%");
    for(var p in applet.params) {
        var param = document.createElement("param");
        param.setAttribute('name', p);
        param.setAttribute('value', applet.params[p]);
        elem.appendChild(param);
    }
  
    try {
        elem.innerHTML += '<p>You need JAVA&reg; to use WIRIS tools.<br />FREE download from <a target="_blank" href="http://www.java.com">www.java.com</a></p>';
    } 
    catch (e) {
    }
  
    parent.appendChild(elem);
}

function _updateOptions(applet) {
    var n = document.optionForm.width;
    n.value = applet.width;
    n = document.optionForm.height;
    n.value = applet.height;
    if(document.optionForm.language){
        var select = document.optionForm.language;
        var langs = select.options;
        var index = 0;
        for(var i=0; i <langs.length; i++){
            if(langs[i].value == applet.lang){
                index = i;
                break;
            }
        }
        select.selectedIndex = index;
    }
    var cb = document.optionForm.toolbar;
    cb.checked = !(applet.params.toolbar && (applet.params.toolbar == "floating"));
    cb = document.optionForm.executeonload;
    cb.checked = applet.params.requestfirstevaluation && (applet.params.requestfirstevaluation == "true");
    cb = document.optionForm.focusonload;
    cb.checked = applet.params.requestfocus && (applet.params.requestfocus == "true");
    cb = document.optionForm.level;
    cb.checked = applet.params.level && (applet.params.level == "primary");
}

function _updateApplet(applet) {
    var n = parseInt(document.optionForm.width.value);
    if(!isNaN(n) && (n>0)) applet.width = n;
    n = parseInt(document.optionForm.height.value);
    if(!isNaN(n) && (n>0)) applet.height = n;
    if(document.optionForm.language){
        var select = document.optionForm.language;
        var lang = select.options[select.selectedIndex].value;
        applet.archive = applet.archive.replace(/_..\.jar$/i, "_" + lang + ".jar");
        applet.code = applet.code.replace(/_..$/i, "_" + lang);
        applet.lang = lang;
    } else {
        applet.lang = defaultapplet.lang;
    }
    applet.params.toolbar = (document.optionForm.toolbar.checked)?null:"floating";
    applet.params.requestfirstevaluation = (document.optionForm.executeonload.checked)?"true":null;
    applet.params.requestfocus = (document.optionForm.focusonload.checked)?"true":null;
    applet.params.level = (document.optionForm.level.checked)?"primary":null;
    var content = "" + document.applets[0].getXML();
    applet.params.xmlinitialtext = content;
    applet.params.interface="false";
    applet.params.commands="false";
    applet.params.command="false";
    _updateOptions(applet);
}

function _generateCode(applet) {
    var code = "<applet";
    code += " codebase='" + applet.codebase + "'";
    code += " code='" + applet.code + "'";
    code += " archive='" + applet.archive + "'";
    code += " width='" + applet.width + "'";
    code += " height='" + applet.height + "'";
    code +=">";
    for (var i in applet.params){
        if(applet.params[i] != null){
            code += "<param name='" + i + "' value='" + applet.params[i] + "'/>";
        }
    }
    code += '<p>You need JAVA&reg; to use WIRIS tools.<br />FREE download from <a target="_blank" href="http://www.java.com">www.java.com</a></p>';
    return code + "</applet>";
}

function _resizeApplet(applet) {
    document.applets[0].setAttribute('width', applet.width);
    document.applets[0].setAttribute('height', applet.height);
}

/*************************
 * Events
 *************************/
 
function wrs_accept() {
    _updateApplet(window.appletcfg);
    var code = _generateCode(window.appletcfg);
    var result = {
        type: "cas", 
        content: code
    };
    _resizeApplet(window.appletcfg);

    function _getImageBytes() {
        countGetImageBytes++;
        var applet=window.appletcfg;
        var dim=document.applets[0].getSize();
        if((!(dim.width==applet.width)||!(dim.height==applet.height))&&(countGetImageBytes<=10000)) {
            setTimeout(_getImageBytes,100);
        } else {
            try {
                result.img=document.applets[0].getImageBase64('png');
                result.success=true;
            }
            catch(e) {
                result.img="";
                result.success=false;
            }
            wrs_close(result);
        }
    }
    _getImageBytes();
}

function wrs_cancel() {
    wrs_close(null);
}

function wrs_apply() {
    _updateApplet(window.appletcfg);
    _createApplet(window.appletcfg);
}

function wrs_remove() {
    var result = {
        type: "cas", 
        content: ""
    };
    wrs_close(result);
}

function wrs_close(result) {
    opener.Dialog._return(result);
    opener.Dialog._return = null;
    opener._arguments = null;
    window.close();
}

function wrs_initDocument() {
    /* Setting event hanlder */
    document.getElementById("button_Ok").onclick = wrs_accept;
    document.getElementById("button_Cancel").onclick = wrs_cancel;
    //    document.getElementById("button_Remove").onclick = wrs_remove;
    document.getElementById("button_Apply").onclick = wrs_apply;
    
    /* Initializing Applet */
    var param =  opener.Dialog._arguments
    window.appletcfg = _parseAppletCode(param.content, defaultapplet);
    _createApplet(window.appletcfg);
    _updateOptions(window.appletcfg);

	setInterval(function () {
		var page = document.getElementById('page');
		page.style.height = (document.body.offsetHeight - page.offsetTop) + 'px';
		
		var content = document.getElementById('content');
		content.style.padding = 0;
		content.style.height = (page.offsetHeight - content.offsetTop - page.offsetTop) + 'px';
		
		var applet = document.getElementById('appletcontainer');
		var controls = document.getElementById('controls');
		applet.style.height = (content.offsetHeight - controls.offsetHeight - applet.offsetTop - content.offsetTop - page.offsetTop) + 'px';
	}, 100);
	
    window.focus();
}