<?php
/*
 * Plugin for HTMLAREA editor
 */
require_once('../../../config.php');
require_once($CFG->dirroot . '/filter/wiris/wrs_config.php');
require_once($CFG->dirroot . '/filter/wiris/lib/wrs_lang_inc.php');

if (!isset($CFG->filter_wiris_editor_enable)) {
	$CFG->filter_wiris_editor_enable = $CFG->wirisformulaeditorenabled;
}

if (!isset($CFG->filter_wiris_cas_enable)) {
	$CFG->filter_wiris_cas_enable = $CFG->wiriscasenabled;
}

$activefilters = (isset($CFG->textfilters)) ? $CFG->textfilters : '';
$filterwiris = "wiris";
$pos = strpos($activefilters, $filterwiris);

if ($pos === false) {
    $CFG->filter_wiris_editor_enable = false;
    $CFG->filter_wiris_cas_enable = false;
}

if ($CFG->wirisformulaeditorenabled == false) $CFG->filter_wiris_editor_enable = false;
if ($CFG->wiriscasenabled == false) $CFG->filter_wiris_cas_enable = false;

?>

_wiris_plugin_url = '<?php echo $CFG->wwwroot?>/filter/wiris/editor/';
_wiris_filter_url = '<?php echo $CFG->wwwroot?>/filter/wiris/filter/';

_wiris_formula_class ='<?php echo $CFG->wirisformulaimageclass?>';
_wiris_cas_class ='<?php echo $CFG->wiriscasimageclass?>';

<?php
$lang = current_language();
$lang = substr($lang,0, 2);
?>
_wiris_title_text ='<?php echo wrs_get_string($lang, 'wiristitletext') ?>';


//Set the initial valor of current CAS inserted
if(typeof window.WirisCasCounter =="undefined"){
    WirisCasCounter=0;
}
newWindow=null;

function Wiris(editor) {
    Wiris.register(editor.config);
}

Wiris.register = function(config){
    if(typeof window.WirisImgCache =="undefined"){
        WirisImgCache=new WrsImgCache();
    } //We only create the cache if it isn't already created

    var cfg = config;
    var bl = Wiris.btnList;
    var tt = Wiris.I18N;
    /* register the toolbar buttons provided by this plugin */
    var toolbar = [];
    for (var i in bl) {
        var btn = bl[i];
        if (!btn) {
            toolbar.push("separator");
        } else {
            var id = "WRS-" + btn[0];
            cfg.registerButton(id, tt[id], _wiris_plugin_url + "icons/" + btn[0] + ".gif", false,
                function(editor, id) {
                    // dispatch button press event
                    Wiris.buttonPress(editor, id);
                }, btn[1]);
            toolbar.push(id);
        }
    }

    for (var i in toolbar) {
        cfg.toolbar[0].push(toolbar[i]);
    }

    /* Hacking HTMLArea */
    if(!Wiris._init){
        var f = HTMLArea.prototype.updateToolbar;
        HTMLArea.prototype.updateToolbar = function(noStatus) {
            f.apply(this, arguments);
            Wiris.updateToolBar(this);
        }

        var g = HTMLArea.prototype.getHTML;
        HTMLArea.prototype.getHTML = function() {
            Wiris.beforeGetHTML(this);
            var html = g.apply(this, arguments);
            return Wiris.afterGetHTML(this, html);
        }

        var h = HTMLArea.prototype._editorEvent;
        HTMLArea.prototype._editorEvent = function(ev){
            var keyEvent = (HTMLArea.is_ie && ev.type == "keydown") || (ev.type == "keypress");
            if(keyEvent){
                Wiris.keyPress(this, ev);
            }

            h.apply(this, arguments);
        }

        //Hack generate HTMLArea function
        var k =HTMLArea.prototype.generate;
        HTMLArea.prototype.generate=function(){
            k.apply(this, arguments);
            Wiris.generateImages(this);
            Wiris.setWirisEvents(this);
            Wiris.setOnsubmitForm(this);
        }

        var l=HTMLArea.prototype.execCommand ;

        HTMLArea.prototype.execCommand=function(cmdID, UI, param){
            l.apply(this,arguments);//We execute parent's command

            if (cmdID.toLowerCase()== "popupeditor"){
                this.focusEditor();
                //this object will be passed to the newly opened window
                HTMLArea._object = this;

                //Fullscreen window must be opened so this just captures it, if else, it would open a blank window that might cause some error on closing
                newWindow=window.open("", "ha_fullscreen");
                HTMLArea._addEvent(newWindow,"unload",close_fullscreen);
                setWirisEventsFullscreen(newWindow);

                this.updateToolbar();
                return false;
            }
        }

        Wiris._init = true;
    }
}

Wiris._init = false;

Wiris.I18N = {
<?php if($CFG->filter_wiris_editor_enable) { ?>
    "WRS-wiris-formula" : "Wiris Editor"
    <?php if($CFG->filter_wiris_cas_enable) { ?>
        ,
    <?php } ?>
<?php } ?>

<?php if($CFG->filter_wiris_cas_enable) { ?>
    "WRS-wiris-cas" : "Wiris CAS"
<?php } ?>
};

Wiris._pluginInfo = {
    name          : "Wiris",
    version       : "0.1",
    developer     : "",
    developer_url : "",
    c_owner       : "",
    sponsor       : "",
    sponsor_url   : "",
    license       : ""
};


Wiris.btnList = [
<?php if($CFG->filter_wiris_editor_enable||$CFG->filter_wiris_cas_enable) { ?>
    null, // separator
<?php } ?>
<?php if($CFG->filter_wiris_editor_enable) { ?>
    ["wiris-formula"],
<?php } ?>
<?php if($CFG->filter_wiris_cas_enable) { ?>
    ["wiris-cas"],
<?php } ?>
];

Wiris.buttonPress = function(editor, id) {
    switch (id) {
    <?php if($CFG->filter_wiris_editor_enable) {?>
        case "WRS-wiris-formula":
        Wiris._insertElement(editor, "formula");
        break;
    <?php } ?>
    <?php if($CFG->filter_wiris_cas_enable) { ?>
        case "WRS-wiris-cas":
        Wiris._insertElement(editor, "cas");
        break;
        <?php } ?>
    }
};

//Some regular expressions used
Wiris.ReWidth=/width=\s*'[0-9]*'|width=\s*"[0-9]*"/i;
Wiris.ReHeight=/height=\s*'[0-9]*'|height=\s*"[0-9]*"/i;
Wiris.ReSrc=/src=\s*'[^']*'|src=\s*"[^"]*"/i;
Wiris.ReAppletIni=/(\u00ABapplet[^\u00BB]*\u00BB)/gi;
Wiris.ReAppletFi=/(\u00AB\/applet\s*\u00BB)/gi;
Wiris.ReMathIni=/(\u00ABmath[^\u00BB]*[^\/]\u00BB|\u00ABmath\u00BB)/gi;
Wiris.ReMathFi=/(\u00AB\/math\s*\u00BB)/gi;
Wiris.ReMd5= /[\w]*(?=\u002Epng)/;

Wiris._lastParent = null;
Wiris._lastBgCol = null;
Wiris._lastImage = null;

Wiris.updateToolBar = function(editor) {
var text = (editor._editMode == "textmode");
var parent = editor.getParentElement();

    if(!text && parent && (parent != Wiris._lastParent)){
        if(Wiris._lastParent && Wiris._lastParent.style){
            Wiris._lastParent.style.backgroundColor = Wiris._lastBgCol;
            Wiris._lastBgCol = null;
        }

        var elem = Wiris._getElement(parent);
        if(elem){
            Wiris._lastBgCol = parent.style.backgroundColor;

            switch (elem.type) {
            <?php if($CFG->filter_wiris_cas_enable) { ?>
                case "cas":
                parent.style.backgroundColor = "#fcedc2";
                break;
            <?php } ?>
            <?php if($CFG->filter_wiris_editor_enable) {?>
                case "formula":
                parent.style.backgroundColor = "#cfe9c9";
                break;
            <?php }?>
            }

        }
        Wiris._lastParent = parent;
    }
}

Wiris.keyPress = function(editor, event) {
    Wiris._unhighlight();
}


Wiris._unhighlight = function (){
    if(Wiris._lastParent){
        Wiris._lastParent.style.backgroundColor = Wiris._lastBgCol;
        Wiris._lastBgCol = null;
        Wiris._lastParent = null;
    }
}

Wiris.beforeGetHTML = function(editor){
    Wiris._unhighlight();
}

Wiris.afterGetHTML = function(editor, html){
    return html;
}

/* search a wiris element in the selection
 * returns An array(before, element, after)
 * The property 'type' of the array gives the type of the wiris element found
 * The property 'node' of the array is the text node where the element is found
 */
Wiris._getElement = function(parent){
    if (parent && /^span$/i.test(parent.tagName)) {
        var child = parent.firstChild;
        var result = {};
        while(child){
            if(child.nodeName == "#text") {
            var text = child.nodeValue;
            var m=false;
                <?php if($CFG->filter_wiris_cas_enable) { ?>
                // First check for WIRIS Cas
                // '[\s\S]*' instead of '.*' to include line feed
                re = /\u00ABapplet[^\u00BB]*archive=['"]wrs_.*\.jar[^\u00BB]*\u00BB[\s\S]*\u00AB\/applet\s*\u00BB/mi;
                m = text.match(re);
                if(m) {
                    // wiris cas applet found
                    result.type = "cas";
                } else {
                <?php } ?>
                    <?php if($CFG->filter_wiris_editor_enable) {?>
                    //look for a formula
                    re = /(\u00ABmath[^\u00BB]*\u00BB[\s\S]*\u00AB\/math\s*\u00BB)/;
                    var m = text.match(re);
                    if(m) {
                        // wiris formula found
                        result.type = "formula";
                    }
                    <?php } ?>
                    <?php if($CFG->filter_wiris_cas_enable) { ?>
                }
                <?php } ?>
                if(m) {
                    result.node = child;
                    result.prev = text.substring(0, m.index);
                    result.elem = m[0];
                    result.next = text.substring(m.index + m[0].length);
                    return result;
                }
            }
            child = child.nextSibling;
        }
    }
    return null;
}

/* search a wiris image element in the selection
 * returns An object with the type and the mathml of the element, or null if it is not found
 * The property 'type' of the array gives the type of the wiris element found
 * The property 'elem' of the array is the mathml of the element
 */
Wiris._getImageElement = function(parent){
    if (parent && /^img$/i.test(parent.tagName))
    {
        var className=parent.className?parent.className:"";
        var result = {};

            <?php if($CFG->filter_wiris_cas_enable) { ?>
            if(className==_wiris_cas_class) {// wiris cas applet found
                result.type = "cas";
                var imgName=(parent.getAttribute("name"))?parent.getAttribute("name"):'undefined';
                var mathml=getMathml(imgName);

                if(!mathml) {
                    mathml=parent.getAttribute("xml");
                    mathml=mathml.replace(/\u00A8/g,'"');  // � -> "
                    mathml=mathml.replace(/\u00B4/g,"'");  // � -> '
                }
                result.elem=mathml;
                return result;
            }
            <?php } ?>

            <?php if($CFG->filter_wiris_editor_enable) {?>
            if(className==_wiris_formula_class) {// wiris formula found
                result.type = "formula";
                var imgSrc=(parent.getAttribute("src"))?parent.getAttribute("src"):'undefined';
                var md5 = imgFromSrc(imgSrc);
                var mathml=getMathml(md5);

                if(!mathml) {
                    mathml=parent.getAttribute("xml");
                    mathml=mathml.replace(/\u00A8/g,'"');  // � -> "
                    mathml=mathml.replace(/\u00B4/g,"'");  // � -> '
                }

                result.elem=mathml;
                return result;
            }
            <?php } ?>
    }
    return null;
}

Wiris._insertElement = function(editor, type) {
    editor.focusEditor(); // needed to retreive the selection??
    var content = "";
    var parent = editor.getParentElement();

    var uiurl = _wiris_plugin_url;

    switch (type)
    {
        <?php if($CFG->filter_wiris_cas_enable) { ?>
        case "cas":
            uiurl += "wrs_cas.php";
            break;
        <?php } ?>
        <?php if($CFG->filter_wiris_editor_enable) { ?>
        case "formula":
            uiurl += "wrs_editor.php";
            break;
        <?php } ?>
    }

    var sel=Wiris._getImageElement(parent);
    if(sel){
        // old sytle edition
        if(sel.type != type){
            content = "";
            parent = null;
        } else {
            content=sel.elem;

        <?php if($CFG->filter_wiris_cas_enable) { ?>
            if (type=="cas") content=Wiris.htmldecode(content);
        <?php } ?>
            content = Wiris.untransformXML(content);
            parent = null;
        }
    } else {
        sel = Wiris._getElement(parent);
        if(sel){
            if(sel.type != type){
                content = "";
            } else {
            content=sel.elem;
            <?php if($CFG->filter_wiris_cas_enable) { ?>
                if (type=="cas") content=Wiris.htmldecode(content);
            <?php } ?>
                content = Wiris.untransformXML(content);
            }
        } else {
            parent = null;
        }
    }

    if (content == '') {
        Wiris._lastImage = null;
    }

    // Opening Editor
    var param = {content : content};

    callInsertion = function(result){
        Wiris.doInsertion(result,type,editor,sel,parent);
    }

    Wiris.openDialog(
        uiurl,
        callInsertion,
        param,
        500,
        400,
        "yes"
    );
}


Wiris.doInsertion = function(result,type,editor,sel,parent){
    editor.focusEditor();
    Wiris._unhighlight();
    if(result){
        result.content = Wiris.transformXML(result.content);
    if(parent) {
            // parent!=null means old sytle edition
            sel.elem = result.content;
            var doc = parent.ownerDocument;

            // Moving the fragment before the element to another node
            var node = parent.cloneNode(false);
            var child = parent.firstChild;
            while(child != sel.node){
                parent.removeChild(child);
                node.appendChild(child);
                child = parent.firstChild;
            }
            if(sel.prev.length > 0){
                node.appendChild(doc.createTextNode(sel.prev));
            }
            if(node.firstChild){
                parent.parentNode.insertBefore(node, parent);
            }

            // inserting the element
            if(sel.elem.length > 0){
                node = parent.cloneNode(false);
                node.appendChild(doc.createTextNode(sel.elem));
                parent.parentNode.insertBefore(node, parent);
                node = parent.cloneNode(false);
            }

            // Moving the fragment after the element to another node
            if(sel.next.length > 0){
                node.appendChild(doc.createTextNode(sel.next));
                parent.parentNode.insertBefore(node, parent);
            }
            child = sel.node.nextSibling;
            while(child)
            {
                parent.removeChild(child);
                node.appendChild(child);
                child = sel.node.nextSibling;
            }
            if(!node.parentNode && node.firstChild){
                parent.parentNode.insertBefore(node, parent);
            }
            parent.parentNode.removeChild(parent);
        } else if (result.content.length > 0) {
            if (result.content.length > 0) {
                function createHTMLObject(htmlCode) {
                    var div = editor._iframe.contentWindow.document.createElement('div');
                    div.innerHTML = htmlCode;
                    return div.firstChild;
                }

                if (!Wiris._lastImage && HTMLArea.is_ie) {
                    var selection = editor._getSelection();
                    if(selection.type=="Control") selection.clear();
                }

                switch (type) {
                    <?php if ($CFG->filter_wiris_cas_enable) { ?>
                    case 'cas':
                        //Insertion of a CAS applet
                        var wi=result.content.match(Wiris.ReWidth);
                        var he=result.content.match(Wiris.ReHeight);
                        WirisCasCounter++;
                        var filename='default';
                        var casName=WirisCasCounter;

                        //Case we get correctly the image from the applet
                        if (result.success === true) {
                            var data1 = encodeURIComponent(result.img);
                            var data2 = encodeURIComponent(result.content);
                            var md5 = getDataServer(_wiris_plugin_url + 'wrs_casimage.php','img=' + data1 + '&xml=' + data2);
                            if (md5) {
                                filename = md5 + '.png';
                                casName = md5;
                            }
                        }

                        var imgCode = createCasImageCode(filename,casName,wi,he, result.content)

                        if (Wiris._lastImage) {
                            var appletImage = createHTMLObject(imgCode);
                            Wiris._lastImage.node.parentNode.insertBefore(appletImage, Wiris._lastImage.node);
                        }
                        else {
                            editor.insertHTML(imgCode);
                            WirisImgCache.insert(casName,result.content);
                        }

                        break;
                    <?php
                    }
                    if ($CFG->filter_wiris_editor_enable) {
                    ?>
                    case 'formula':
                        //Insertion of a wiris formula
                        if (Wiris._lastImage) {
                            var newFormula = createHTMLObject(getImage(result.content));
                            Wiris._lastImage.node.parentNode.insertBefore(newFormula, Wiris._lastImage.node);
                        }
                        else {
                            //We must generate the formula image and insert it into the editor
                            //result.content has the mathML code we want to convert to an image

                            var imgCode = getImage(result.content);
                            editor.insertHTML(imgCode);

                            //We get the source attribute from the img code, from where we will extract the image code
                            var source = imgCode.match(Wiris.ReSrc);
                            var m;

                            if (source) {
                                m = imgFromSrc(source[0]);
                            }
                            else {
                                m = imgFromSrc(imgCode);
                            }

                            WirisImgCache.insert(m, result.content);
                        }

                        break;
                    <?php } ?>
                }
            }

            if (Wiris._lastImage) {
                Wiris._lastImage.node.parentNode.removeChild(Wiris._lastImage.node);
            }
        }

        Wiris.updateToolBar(editor);
        editor.forceRedraw();
    }
}

function createCasImageCode(filename,casName,wi,he, mathml) {
    var casSrc=_wiris_plugin_url+"wrs_showcasimage.php";
    <?php if ($CFG->slasharguments) { ?>        // Use this method if possible for better caching
    casSrc = casSrc+'/';
    <?php } else { ?>
    casSrc = casSrc+'?file=';
    <?php } ?>

    casSrc=casSrc+filename;

    var imgCode ='<img align="baseline" src="'+casSrc+'" class="'+_wiris_cas_class+'" name="';
    imgCode=imgCode+casName+'"';

    <?php if($CFG->filter_wiris_cas_enable) { ?>
    imgCode=imgCode+'title="'+_wiris_title_text+'"';
    <?php } ?>

    if(wi) imgCode=imgCode+wi;
    if(he) imgCode=imgCode+he;

    //Insert the mathml as an auxiliar atribute called xml
    //Use auxiliar symbols to prevent html confusion
    var xml=mathml;

    //first escape the protected symbols
    xml = xml.replace(/\u00A8/g, "\u00A7\u0023xa8;");  // � -> �#xa8;
    xml = xml.replace(/\u00B4/g, "\u00A7\u0023xb4;");  // � -> �#xb4;

    xml = xml.replace(/"/g,"\u00A8"); // " -> �
    xml = xml.replace(/'/g,"\u00B4"); // ' -> �

    var xml='xml="'+xml+'"';

    imgCode=imgCode+xml;

    imgCode=imgCode+'/>';

    return imgCode;
}

Wiris.generateImages=function(editor) {
    //	var html=editor.getHTML();
    var html=editor.getInnerHTML();



    //In version 2.2, images have in their inner code the xml code, that would create conflicts
    //when replacing first applets and then formulas. To solve this, applets and formulas are replaced
    //at the same time

    var subHtml;
    var htmlOut = '';

    var m;
    var img;
    var mathml;

    var ReMathIni=Wiris.ReMathIni;
    ReMathIni.lastIndex=0;
    var ReMathFi=Wiris.ReMathFi;
    ReMathFi.lastIndex=0;

    var ReAppletIni=Wiris.ReAppletIni;
    ReAppletIni.lastIndex=0;
    var ReAppletFi=Wiris.ReAppletFi;
    ReAppletFi.lastIndex=0;

    var ReSpan;

    var lastending = 0;					// Stores html buffer position
    var WirisCasCounter = 0;			// To prevent WIRIS CAS overwriting
    var imagesCreated = Array();
    do {
        var applet = subMathml(html, ReAppletIni, ReAppletFi, lastending);		// Getting applet buffer information
        var formula = subMathml(html, ReMathIni, ReMathFi, lastending);			// Getting formula buffer information

        // If applet is the first, parse applet mathml
        if (applet.start < formula.start) {
            // Add to html output the text between last formula/applet and this applet
            htmlOut += html.substring(lastending, applet.start);

            if (applet.end != 0) {
                lastending = applet.end;
                var mathml = html.substring(applet.start, applet.end);
                var width = mathml.match(Wiris.ReWidth);
                var height = mathml.match(Wiris.ReHeight);

                ++WirisCasCounter;

                var filename = 'default';
                var casName = WirisCasCounter;

                var md5 = getDataServer(_wiris_filter_url + 'editor_applet_filter.php', 'var=' + mathml);
                if (md5) {
                    filename = md5 + '.png';
                    casName = md5;
                }

                img = createCasImageCode(filename, casName, width, height, mathml);
                imagesCreated.push(img);

                // Adding new applet img
                htmlOut += img;

                WirisImgCache.insert(casName, mathml);
            }
        }
        // Else parse formula mathml
        else {
            // Add to html output the text between last formula/applet and this formula
            htmlOut += html.substring(lastending, formula.start);

            if (formula.end != 0) {
                lastending = formula.end;
                var mathml = html.substring(formula.start, formula.end);
                var img = getImage(mathml);
                imagesCreated.push(img);

                // Adding new applet img
                htmlOut += img;

                var source = img.match(Wiris.ReSrc);
                if (source) {
                    m = imgFromSrc(source[0]);
                }
                else {
                    m = imgFromSrc(img);
                }

                WirisImgCache.insert(m, mathml);
            }
        }
    } while (formula.end != 0 || applet.end != 0);

    // Replacing <span class="nolink"> img </span>
    for (var i = 0; i < imagesCreated.length; ++i) {
        var tempRegexp = new RegExp('<span class="nolink">\\s*' + imagesCreated[i].replace(/([\\\^\$*+[\]?{}.=!:(|)])/g,"\\$1") + '\\s*</span>', 'gi');
        htmlOut = htmlOut.replace(tempRegexp, imagesCreated[i]);
    }

    html=htmlOut;

    editor.setHTML(html);
}

Wiris.setWirisEvents=function(editor) {
    var editDoc = editor._doc;
    editDoc.parent_editor=editor; //As we'll need to access the editor later on when we handle the event, he must save a reference to it
    HTMLArea._removeEvent(editDoc,"dblclick",wirisDblClickHandler);
    HTMLArea._addEvent(editDoc,"dblclick",wirisDblClickHandler);
    HTMLArea._addEvent(editor._doc, "mousedown",
    function (aEvent){

        //var selectedNode=editor.getParentElement();
        var realEvent = (aEvent) ? aEvent : window.aEvent;
        var selectedNode = realEvent.srcElement ? realEvent.srcElement : realEvent.target;
        Wiris._lastImage = null;

        if(selectedNode&&(selectedNode.nodeName.toLowerCase()=="img"))
        {
            var className=selectedNode.className?selectedNode.className:"";
            if((className==_wiris_formula_class)||(className==_wiris_cas_class)) {
                Wiris._lastImage=new Object();
                Wiris._lastImage.node=selectedNode;
                Wiris._lastImage.width=selectedNode.width;
                Wiris._lastImage.height=selectedNode.height;
            }
        }
        return true;
    });

    HTMLArea._addEvent(editor._doc, "mouseup",
    function (aEvent) {

    setTimeout(
        function ()
        {
            if(Wiris._lastImage)
            {
                Wiris._lastImage.node.width=Wiris._lastImage.width;
                Wiris._lastImage.node.nodeheight=Wiris._lastImage.height;
                Wiris._lastImage.node.style.width=Wiris._lastImage.width;
                Wiris._lastImage.node.style.height=Wiris._lastImage.height;
            }
        //Wiris._lastImage=null;
        },10);

    });
}

Wiris.setOnsubmitForm=function (editor) {
    var textarea=editor._textArea;
    if(textarea)
    {
        if(textarea.form)
        {
            var f = textarea.form;
            var previous=f.onsubmit;
            f.onsubmit=function()
            {
                //Instead of looping through the text, we do an object oriented search
                //This implies changing the htmlarea instead of the textarea so we must execute the previous onsubmit function after our intervention
                var htmleditor=editor;
                htmleditor.setMode("wysiwyg");//We must save from HTML to work with DOM objects
                var doc=htmleditor._doc;

                //variables used through the algorism
                var img;
                var className;
                var newText;
                var newSpan;
                var imgParentNode;
                var imgSrc;
                var md5;
                var mathml;

                //imageNodes is a live list, when changes are made to the DOM, it must be recalculated each time is used. To improve efficiency
                //we copy it to a static images vector
                //If we used only imageNodes, we must go backwards because imageNodes is a live list and while we are replacing the images they are
                //getting removed from it so if we went forward indexs of images would change!

                var imageNodes=doc.getElementsByTagName("img");//Live list of page's nodes

                var images = [];
                for( var i = 0; i < imageNodes.length; i++ )
                {
                    images[images.length] = imageNodes[i];
                }

                for(var i=images.length-1; i>=0; i--)
                {//see WirisDblClickHandler
                    img=images[i];
                    className=img.className?img.className:"";

                    if(className==_wiris_formula_class)
                    {
                        imgSrc=(img.getAttribute("src"))?img.getAttribute("src"):'undefined';
                        md5 = imgFromSrc(imgSrc);
                        mathml=getMathml(md5);

                        if(!mathml)
                        {
                            mathml=img.getAttribute("xml");
                            mathml=mathml.replace(/\u00A8/g,'"');  // � -> "
                            mathml=mathml.replace(/\u00B4/g,"'");  // � -> '
                        }

                        //If we didn't find the mathml, we leave the image as it was, only if it was a formula (an image of a CAS is unuseful)
                        if (mathml)
                        {
                            newSpan = doc.createElement("span");
                            newSpan.className = "nolink";
                            newText=doc.createTextNode(mathml);
                            newSpan.appendChild(newText);

                            imgParentNode=img.parentNode;
                            imgParentNode.replaceChild(newSpan,img);
                        }
                    }
                    else if(className==_wiris_cas_class)
                    {
                        imgName=(img.getAttribute("name"))?img.getAttribute("name"):'undefined';
                        mathml=getMathml(imgName);

                        if(!mathml)
                        {
                            mathml=img.getAttribute("xml");
                            mathml=mathml.replace(/\u00A8/g,'"');  // � -> "
                            mathml=mathml.replace(/\u00B4/g,"'");  // � -> '
                        }

                        newSpan = doc.createElement("span");
                        newSpan.className = "nolink";
                        newText=doc.createTextNode(mathml);
                        newSpan.appendChild(newText);

                        imgParentNode=img.parentNode;
                        imgParentNode.replaceChild(newSpan,img);
                    }
                }
                images=null;

                previous.apply(this, arguments);

                return true;
            }

            //We also set the onreset although it is a wrong moodle function
            var previousReset=f.onreset;
            f.onreset=function()
            {
                previousReset.apply(this, arguments);
                generateImages(editor);
            }
        }
    }
}

function setWirisEventsFullscreen(newWindow) {
    //If the newWindow has already performed init(), then calls to setWirisEvents. Otherwise, waits 500ms and tries again
    if(window.newWindow){
        if(window.newWindow.editor){
            if (window.newWindow.editor._doc){
                Wiris.setWirisEvents(newWindow.editor);
            }
            else setTimeout("setWirisEventsFullscreen(newWindow)",500); //keep trying till the new Window is fully loaded
        }
        else setTimeout("setWirisEventsFullscreen(newWindow)",500); //keep trying till the new Window is fully loaded
    }
    //if it comes here, newWindow doesn't exist, so init will never be performed. We return without retrying
    newWindow.focus();
}


/****************************
 * Utilities
 ****************************/

Wiris.transformXML = function(xmlSample) {
    xml = xmlSample;
    //Escape the auxiliar symbols
    xml = xml.replace(/\u00A7/g, "\u00A7\u0023xa7;");  // � -> �#xa7;
    xml = xml.replace(/\u00AB/g, "\u00A7\u0023xab;");  // � -> �#xab;
    xml = xml.replace(/\u00BB/g, "\u00A7\u0023xbb;");  // � -> �#xbb;
    xml = xml.replace(/</g, "\u00AB");       // < -> �
    xml = xml.replace(/>/g, "\u00BB");       // > -> �
    xml = xml.replace(/\u00A0/g, '&nbsp;');  // (space)  -> &nbsp;
    xml = xml.replace(/&/g, "\u00A7");       // & -> �
    return xml;
}

Wiris.untransformXML = function(sample) {
    xml = sample;
    //xml=Wiris.htmldecode(xml);
    xml = xml.replace(/\u00AB/g, '<');  // � -> <
    xml = xml.replace(/\u00BB/g, '>');  // � -> >
    xml = xml.replace(/\u00A7/g, '&');  // � -> &
    return xml;
}

Wiris.htmldecode = function(text) {
    text=text.replace(/&lt;/g,'<');
    text=text.replace(/&gt;/g,'>');
    text=text.replace(/&quot;/g,'"');
    text=text.replace(/&amp;/g,'&');
    text=text.replace(/&apos;/g,"'");
    return text;
}


/* Reimplementation of the function _geckoOpenModal of 'dialog.js' (htmlarea)
 * because the original implementation gives a default size of 50x50
 * to all non default plugin
 */
Wiris.openDialog = function(url, action, params, width, height, resizable) {
    var x = width;
    var y = height;
    var lx = (screen.width - x) / 2;
    var tx = (screen.height - y) / 2;
    Dialog._arguments = params;//Changed the order of operations to have the arguments before calling the function
    var dlg = window.open(url, "ha_dialog", "toolbar=no,menubar=no,personalbar=no, width="+ x +",height="+ y +",scrollbars=no,resizable=" + resizable + ", left="+ lx +", top="+ tx +"");
    Dialog._modal = dlg;

    /* capture some window's events */
    function capwin(w) {
        HTMLArea._addEvent(w, "click", Dialog._parentEvent);
        HTMLArea._addEvent(w, "mousedown", Dialog._parentEvent);
        HTMLArea._addEvent(w, "focus", Dialog._parentEvent);
    };
    /* release the captured events */
    function relwin(w) {
        HTMLArea._removeEvent(w, "click", Dialog._parentEvent);
        HTMLArea._removeEvent(w, "mousedown", Dialog._parentEvent);
        HTMLArea._removeEvent(w, "focus", Dialog._parentEvent);
    };
    capwin(window);
    /* capture other frames */
    if(document.all) {
        for (var i = 0; i < window.frames.length; capwin(window.frames[i++]));
    }
    /* make up a function to be called when the Dialog ends.*/
    Dialog._return = function (val) {
        relwin(window);

        /* capture other frames */
        if(document.all) {
            for (var i = 0; i < window.frames.length; relwin(window.frames[i++]));
        }
        if (val && action) {
            action(val);
        }
        Dialog._modal = null;
    };
};


//Auxiliar function for the AJAX communication that handles the XMLHttpRequest
function getDataServer(url, vars){
    var xml = null;
    try
    {
        xml = new ActiveXObject("Microsoft.XMLHTTP");
    }catch(exception){
        xml = new XMLHttpRequest();
    }
    xml.open("POST",url, false);
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=utf-8");

    xml.send(vars);

    if(xml.status != 200) return false;

    return xml.responseText;
}

//retrieve the image from the mathml code
function getImage(mathmlcode) {
    //var param=mathmlcode;

    var param=Wiris.untransformXML(mathmlcode);
    param=encodeURIComponent(param);

    var image = getDataServer(_wiris_filter_url+'editor_math_filter.php','var='+param);

    //In prevention of errors, check out if the ajax connection fails and in that case return the mathml
    if(image)
    {
        //Insert the mathml as an auxiliar atribute called xml in the image and return the image code

        //Use auxiliar symbols to prevent html confusion
        var xml=mathmlcode;

        //first escape the protected symbols
        xml = xml.replace(/\u00A8/g, "\u00A7\u0023xa8;");  // � -> �#xa8;
        xml = xml.replace(/\u00B4/g, "\u00A7\u0023xb4;");  // � -> �#xb4;

        xml = xml.replace(/"/g,"\u00A8"); // " -> �
        xml = xml.replace(/'/g,"\u00B4"); // ' -> �

        var xml='xml="'+xml+'"';

        image=image.replace("/>", xml+" />");
        return image;
    }
    return '<span class="nolink">' + mathmlcode + '</span> ';
}

//retrieve the mathml code from the image
function getMathml(imgcode) {
    var reg=WirisImgCache.getFromImg(imgcode);
    var mathml;
    if(reg==null) {
        mathml='';
    } else {
        mathml=reg.mathml;
    }
    return mathml;
}

//Deprecated function used only in versions prior to 2.2
//Given some text, replaces the applet mathml code by the images
function applet2img(html)
{
    var htmlOut=html;
    var subHtml;
    var mathml;
    var imgCode;

    var ReIni=Wiris.ReAppletIni;
    ReIni.lastIndex=0;
    var ReFi=Wiris.ReAppletFi;
    ReFi.lastIndex=0;
    var wi;
    var he;
    var ReSpan;

    var open=ReIni.exec(html);
    var close=ReFi.exec(html);

    while (open&&close)
    {
        if(open.index<close.index)
        {
            subHtml=html.substring(open.index,ReFi.lastIndex);
            mathml=subHtml;

            var wi=mathml.match(Wiris.ReWidth);
            var he=mathml.match(Wiris.ReHeight);

            WirisCasCounter++;

            var filename='default';
            var casName=WirisCasCounter;

            var data=mathml;
            data=encodeURIComponent(data);
            var md5= getDataServer(_wiris_filter_url+'editor_applet_filter.php','var='+data);
            if (md5)
            {
                filename=md5+'.png';
                casName=md5;
            }

            imgCode=createCasImageCode(filename, casName, wi, he, mathml);

            //			ReSpan=new RegExp('<SPAN[^>]*>\\s*'+subHtml+'</SPAN>','gi');
            ReSpan=new RegExp('<SPAN[^>]*>\\s*'+subHtml.replace(/([\\\^\$*+[\]?{}.=!:(|)])/g,"\\$1")+'\\s*</SPAN>','gi');


            htmlOut=htmlOut.replace(ReSpan,subHtml);
            htmlOut=htmlOut.replace(subHtml,imgCode);

            WirisImgCache.insert(casName,mathml);

            open=ReIni.exec(html);
            close=ReFi.exec(html);
        }
        else
        {
            close=ReFi.exec(html);
        }
    }
    return htmlOut;
}


//Deprecated function used only in versions prior to 2.2
//Given a String, finds the mathml codes and replaces it for the corresponding images
function mathml2img(html) {

    var subHtml;
    var htmlOut=html;

    var m;
    var img;
    var mathml;

    var ReIni=Wiris.ReMathIni;
    ReIni.lastIndex=0;
    var ReFi=Wiris.ReMathFi;
    ReFi.lastIndex=0;
    var ReSpan;

    var formula=subMathml(html,ReIni,ReFi,0);

    while(formula.end!=0)
    {
        subHtml=html.substring(formula.start,formula.end);
        mathml=subHtml;

        img=getImage(mathml);

        //ReSpan=new RegExp('<SPAN[^>]*>\\s*'+subHtml+'</SPAN>','gi');
        ReSpan=new RegExp('<SPAN[^>]*>\\s*'+subHtml.replace(/([\\\^\$*+[\]?{}.=!:(|)])/g,"\\$1")+'\\s*</SPAN>','gi');

        htmlOut=htmlOut.replace(ReSpan,subHtml);
        htmlOut=htmlOut.replace(subHtml,img);

        var source = img.match(Wiris.ReSrc);
        if(source){
            m=imgFromSrc (source[0]);
        } else {
            m = imgFromSrc (img);
        }

        WirisImgCache.insert(m,mathml);

        formula=subMathml(html,ReIni, ReFi, formula.end);
    }

    return htmlOut;
}


//Auxiliar function that given an opening and a closing regular expression,
//finds the first subelement in a string from a given starting position

function subMathml(html, ReIni, ReFi, pos) {
    ReIni.lastIndex = ReFi.lastIndex = pos;

    var opened = ReIni.exec(html);
    if (opened) {
        var closed = ReFi.exec(html);
        if (closed) {
            return {
                start: opened.index,
                end: closed.index + closed[0].length
            };
        }
    }
    return {
        start: html.length,
        end: 0
    };
}

/*function subMathml (html,ReIni,ReFi, pos)
{
    ReIni.lastIndex=pos;
    ReFi.lastIndex=pos;

    var open=ReIni.exec(html);
    var close;

    var indexFirst;
    var indexLast;

    var subHtml;
    var count;

    var formula={start:html.length,end:0};

    if (open)
    {
        formula.start=open.index;
        count=1;
        while (count>0)
        {
            open=ReIni.exec(html);
            close=ReFi.exec(html);

            if(!close)
            {
                    return formula;
            }
            else
            {
                if(!open)
                {
                        count--;
                }
                else
                {
                    if(open.index<close.index)
                    {//opening inside opening
                        ReFi.lastIndex=ReIni.lastIndex;
                        count++;
                    }
                    else
                    {
                        ReIni.lastIndex=ReFi.lastIndex;
                        count--;
                    }
                }
            }
        }
        formula.end=ReFi.lastIndex;
    }
    return formula;
}*/


//captures the md5 code from the source of a Wiris inserted formula
function imgFromSrc (src) {
    var img=src.match(Wiris.ReMd5);
    if(!img) return '';
    return img[0];
}


function wirisDblClickHandler(aEvent) {

    //first of all, we test if the element that has thrown the event is a Wiris formula or a CAS. In this case we get the img name
    var myEvent = window.event ? window.event : aEvent;
    var elem=myEvent.srcElement ? myEvent.srcElement : myEvent.target;
    if(elem.nodeName.toLowerCase()=="img")
    {
        var className=elem.className?elem.className:"";
        if((className==_wiris_formula_class)||(className==_wiris_cas_class)) {
            var editor=elem.ownerDocument.parent_editor;
            var uiurl = _wiris_plugin_url;
            var mathml;
            var content = "";
            var type="formula";
            editor.focusEditor();

            switch (className) {
                <?php if($CFG->filter_wiris_cas_enable) { ?>
                case _wiris_cas_class:
                    uiurl += "wrs_cas.php";
                    var eventName=(elem.getAttribute("name"))?elem.getAttribute("name"):'undefined';
                    mathml=getMathml(eventName);

                    if(!mathml) {
                        mathml=elem.getAttribute("xml");
                        mathml=mathml.replace(/\u00A8/g,'"');  // � -> "
                        mathml=mathml.replace(/\u00B4/g,"'");  // � -> '
                    }

                    type="cas";
                    break;
                <?php } ?>
                <?php if($CFG->filter_wiris_editor_enable) {?>
                case _wiris_formula_class:
                    uiurl += "wrs_editor.php";
                    var eventSrc=(elem.getAttribute("src"))?elem.getAttribute("src"):'undefined';
                    var img = imgFromSrc(eventSrc);
                    mathml=getMathml(img);

                    if(!mathml) {
                        mathml=elem.getAttribute("xml");
                        mathml=mathml.replace(/\u00A8/g,'"');  // � -> "
                        mathml=mathml.replace(/\u00B4/g,"'");  // � -> '
                    }

                    type="formula";
                    break;
                <?php }?>
                default:
                    return;
            }

            content=mathml;

            <?php if($CFG->filter_wiris_cas_enable) { ?>
            if (type=="cas") content=Wiris.htmldecode(content);
            <?php } ?>

            content = Wiris.untransformXML(content);

            var par = {content : content};

            callInsertion = function(result) {
                Wiris.doInsertion(result,type,editor,null,null)
            }

            Wiris.openDialog(
                uiurl,
                callInsertion,
                par,
                500,
                400,
                "yes"
            );

        }
    }
};


//Data structure used as a cache for the image-mathml registers.
WrsImgCache= function () {
    this.cache=new Object();
};

WrsImgCache.prototype.insert = function (md5,mathml) {
    this.cache[md5]=mathml;
};

WrsImgCache.prototype.findImg = function(img) {
    if (this.cache[img]) return true;
    return false;
};


WrsImgCache.prototype.findMathml =function(mathml) {
    for(var md5 in this.cache) {
        if(this.cache[md5]==mathml) return true;
    }
    return false;
};


WrsImgCache.prototype.findReg = function(reg) {
    var md5=reg.md5;
    var mathml=reg.mathml;

    if(this.cache[md5]==mathml) return true;
    return false;
};

WrsImgCache.prototype.getFromImg = function(img) {
    var mathml;
    if(mathml=this.cache[img])
    {
        var reg= new Object();
        reg.md5=img;
        reg.mathml=mathml;
        return reg;
    }
    return null;
};

WrsImgCache.prototype.getFromMathml =function(mathml) {
    for(var md5 in this.cache) {
        if(this.cache[md5]==mathml) {
            var reg= new Object();
            reg.md5=md5;
            reg.mathml=mathml;
            return reg;
        }
    }
    return null;
};


//Function    : close_fullscreen  Description : actualizes the main editor when closing the fullscreen
//
//We use this function to handle the closing of the popup window. As Wiris._lastParent references an object from the
//fullscreen window, we use updateToolbar to make it reference the new correct _lastParent.
//As we have this function declared in our original editor window, our scope isn't the popup window, to get it, we
//use the global variable newWindow instead to work at our new window
//

function close_fullscreen(aEvent) {
    if(window.newWindow) {
        if(newWindow.update_parent) newWindow.update_parent();
        if(newWindow.parent_object) newWindow.parent_object.updateToolbar();
    } else {//We shouldn't enter here, added for safety purpose
        update_parent();
        parent_object.updateToolbar();
    }
}