/*
 //########################################################################
 //  GLOBAL VARIABLES
 //########################################################################
 */
var YOUTUBE_PLUGIN_NAME = 'InsertYoutube';
// default values if no width/height is defined
var DEFAULT_YOUTUBE_WIDTH = 425;
var DEFAULT_YOUTUBE_HEIGHT = 344;
var DEFAULT_YOUTUBE_URL = 'http://www.youtube.com/v/zPgfAfuXxiE&hl=en_US&fs=1';
// placeholder matcher
var YOUTUBE_REG_EXP_IMAGE = '(<img[^>]*title="?YOUTUBE_placeholder"?[^>]*>)';
var YOUTUBE_REG_EXP_IMAGE_HEIGHT = '(?:height="([0-9]*)(?:"))';
var YOUTUBE_REG_EXP_IMAGE_WIDTH = '(?:width="([0-9]*)(?:"))';
//var YOUTUBE_REG_EXP_IMAGE_ALT = '(<img\\s+.+alt\\=[\\x27\\x22])([^\\x27\\x22]*)(?:[\\x27\\x22])';
//var YOUTUBE_REG_EXP_OBJECT_DATA = '<object\\s+([^>]*)data="([^"]*)"(.*?)>(.*?)<\/object>';
var YOUTUBE_REG_EXP_OBJECT_HEIGHT = '<object\\s+([^>]*)height="([^"]*)"(.*?)>(.*?)<\/object>';
var YOUTUBE_REG_EXP_OBJECT_WIDTH = '<object\\s+([^>]*)width="([^"]*)"(.*?)>(.*?)<\/object>';
var YOUTUBE_REG_EXP_IMAGE_REPLACE = '(<img[^>]*title="?YOUTUBE_placeholder"?[^>]*>)';
var YOUTUBE_REG_EXP_IMAGE_ALT = '(<img\\s+.+alt\\=[\\x27\\x22])([^\\x27\\x22]*)(?:[\\x27\\x22])';
var YOUTUBE_REG_EXP_OBJECT_DATA = '(<object\\s+.+data\\=[\\x27\\x22])([^\\x27\\x22]*)(?:[\\x27\\x22])';
//var YOUTUBE_IMAGE_MATCHER = /(<img[^>]*title="?YOUTUBE_placeholder?"[^>]*>)/ig
//var YOUTUBE_OBJECT_MATCHER = '(<object[^>]*(?:title="youtube")*>[\\S\\s]*?<\/object>)';
//var YOUTUBE_OBJECT_MATCHER = /<object\b[^>]*(?:title="youtube")*>(?:<param[^>]*name="movie"?[^>]*>)<\/object>/gi;
var YOUTUBE_OBJECT_TEMPLATE = '<object title="youtube" type="application/x-shockwave-flash" data="#DATA#" width="#WIDTH#" height="#HEIGHT#"><param name="movie" value="#DATA#" /></object>';
var YOUTUBE_IMG_TEMPLATE = null;
var YOUTUBE_OBJECT_REPLACE_DATA = /#DATA#/gi;
var YOUTUBE_OBJECT_REPLACE_WIDTH = /#WIDTH#/gi;
var YOUTUBE_OBJECT_REPLACE_HEIGHT = /#HEIGHT#/gi;


//########################################################################
//  STANDARD METHODS
//########################################################################
function InsertYoutube(editor) {
    this.editor = editor;
    var cfg = editor.config;

    this.placeHolderImagePath = Xinha.getPluginDir(YOUTUBE_PLUGIN_NAME) + '/img/youtube_preview.png';
    this.template = '<img title="YOUTUBE_placeholder" alt="#DATA#"  width="#WIDTH#" height="#HEIGHT#" src="' + this.placeHolderImagePath + '" />';
    this.youtube = null;
    this.dialog = null;

    var self = this;
    cfg.registerButton({
        id       : "insertyoutube",
        tooltip  : this._lc("Insert Youtube"),
        image    : editor.imgURL("insert-youtube.jpg", YOUTUBE_PLUGIN_NAME),
        textMode : false,
        action   : function() {
            self.show();
        }
    });
    cfg.addToolbarElement("insertyoutube", "createlink", 1);
}

InsertYoutube._pluginInfo = {
    name          : YOUTUBE_PLUGIN_NAME,
    origin        : "version: 1.0",
    version       : "1.0",
    developer     : "M.Milicevic",
    developer_url : "http://www.onehippo.com",
    c_owner       : "OneHippo",
    sponsor       : "SourceSense",
    sponsor_url   : "http://www.sourcesense.com",
    license       : "APL"
};

InsertYoutube.prototype._lc = function(string) {
    return Xinha._lc(string, YOUTUBE_PLUGIN_NAME);
};

InsertYoutube.prototype.onGenerateOnce = function() {
    var self = this;
    Xinha._getback(Xinha.getPluginDir(YOUTUBE_PLUGIN_NAME) + '/dialog.html', function(getback) {
        self.html = getback;
        self._prepareDialog();
    });
};

InsertYoutube.prototype._prepareDialog = function() {
    var self = this;
    var editor = this.editor;

    this.dialog = new Xinha.Dialog(editor, this.html, YOUTUBE_PLUGIN_NAME, {width:DEFAULT_YOUTUBE_WIDTH, height:DEFAULT_YOUTUBE_HEIGHT, name:''});
    this.dialog.getElementById('ok').onclick = function() {
        self.apply();
    };

    this.dialog.getElementById('cancel').onclick = function() {
        self.dialog.hide()
    };
};

/**
 * Called when editor button is clicked
 */
InsertYoutube.prototype.show = function(el) {
    if (this.dialog == null) {
        this._prepareDialog();
    }

    if (typeof el == "undefined") {
        el = this.editor.getParentElement();
        if (el && el.tagName.toLowerCase() != 'img') {
            el = null;
        }
    }

    var w, h, n;
    if (el == null) {
        this.youtube = null;
        w = DEFAULT_YOUTUBE_WIDTH;
        h = DEFAULT_YOUTUBE_HEIGHT;
        n = DEFAULT_YOUTUBE_URL;
    } else {
        this.youtube = el;
        w = typeof this.youtube['width'] !== 'undefined' ? this.youtube['width'] : DEFAULT_YOUTUBE_WIDTH;
        h = typeof this.youtube['height'] !== 'undefined' ? this.youtube['height'] : DEFAULT_YOUTUBE_HEIGHT;
        n = typeof this.youtube['alt'] !== 'undefined' ? this.youtube['alt'] : '';
    }

    this.dialog.show({name : n, height : h, width : w});
    this.dialog.getElementById("name").focus();
};

InsertYoutube.prototype.apply = function () {
    var editor = this.editor;
    var param = this.dialog.hide();
    var url = param['name'];
    var height = param['height'];
    var width = param['width'];

    if (height == null || height.length == 0) {
        height = DEFAULT_YOUTUBE_HEIGHT;
    }
    if (width == null || width.length == 0) {
        width = DEFAULT_YOUTUBE_WIDTH;
    }

    if (url == null || url.length == 0) {
        if (this.youtube != null) {
            var child = this.outwardHtml(this.youtube.innerHTML);
            this.youtube.parentNode.removeChild(this.youtube);
            editor.insertHTML(child);
        } else {
            alert('url empty and youtube as well??');
        }
        return;
    }

    //IE doesn't understand	setting properties after insert, so workaround it.
    var create = this.youtube == null;
    if (create) {
        this.youtube = editor._doc.createElement("img");
    }

    this.youtube.src = this.placeHolderImagePath;
    this.youtube.alt = parseYoutubeLink(url);
    this.youtube.height = height;
    this.youtube.width = width;
    this.youtube.title = "YOUTUBE_placeholder";

    if (create) {
        editor.insertNodeAtSelection(this.youtube);
    }
};


//########################################################################
//  =====================================================================
//########################################################################

/**
 * For given link, check if format is embedded link or not. If not auto-convert it into embedded link
 * ex: http://www.youtube.com/watch?v=XXX_YYY_ZZZ&hl=en_US&fs=1&
 * should return:
 * http://www.youtube.com/v/XXX_YYY_ZZZ
 * @param link youtube link
 */
function parseYoutubeLink(link) {
    if (link == null) {
        return "";
    }
    if (link.indexOf("watch") != -1) {
        var arr = link.split('?');
        if (arr.length > 1) {
            var start = "http://www.youtube.com/v/";
            var q = extractQuery(arr[1]);
            if (q.v) {
                return start + q.v + "&fs=1";
            }
        }
    }
    return link;
}

function extractQuery(query) {
    var obj = {}, ret = [];
    query.replace(/([^=&]+)=([^&]*)/g, function(m, key, value) {
        obj[key] = (obj[key] ? obj[key] + "," : "") + value;
    });
    return obj;
}

//########################################################################
//  HTML PARSING / INSERTING
//########################################################################
/**
 * This is producing HTML which is used within "EDIT" view,
 * (so it is a fake one). We add an image after the object tag, so editing is not messed up
 * (otherwise all content ends up within <object> tags)
 * @param html editor html
 */
InsertYoutube.prototype.inwardHtml = function(html) {
    // first we'll replace old image, if any
    // (shouldn't be there, but just to be sure):
    var placeholder = this.placeHolderImagePath;
    var YOUTUBE_OBJECT_MATCHER = /<object\b[^>]*(?:title="youtube")*>(?:[^>]*)(<param[^>]*name="movie"?[^>]*>)[^>]*<\/object>/gi;
    html.replace(YOUTUBE_OBJECT_MATCHER, function(object, param) {
        var widthRex = new RegExp(YOUTUBE_REG_EXP_IMAGE_WIDTH, "gi");
        var width = populateFromImage(object, widthRex, DEFAULT_YOUTUBE_WIDTH, 1);
        var heightRex = new RegExp(YOUTUBE_REG_EXP_IMAGE_HEIGHT, "gi");
        var height = populateFromImage(object, heightRex, DEFAULT_YOUTUBE_HEIGHT, 1);
        var dataRex = new RegExp(YOUTUBE_REG_EXP_OBJECT_DATA, "gi");
        var data = populateFromImage(object, dataRex, "", 2);
        var replaced = populateImageTemplate(placeholder, height, width, data);
        html = html.replace(object, replaced);
    });
    return html;
};

/**
 * Outward HTML is output HTML (which is saved).
 * We only remove all images we inserted for the EDIT view (images with YOUTUBE_placholder class)
 * @param html editor html (source)
 */
InsertYoutube.prototype.outwardHtml = function(html) {
    // we'll replace image placeholders with object tags:
    var YOUTUBE_IMAGE_MATCHER = /<img[^>]*(?:title="YOUTUBE_placeholder")[^>]*>/ig;
    html.replace(YOUTUBE_IMAGE_MATCHER, function(img) {
        var altRex = new RegExp(YOUTUBE_REG_EXP_IMAGE_ALT, "gi");
        var heightRex = new RegExp(YOUTUBE_REG_EXP_IMAGE_HEIGHT, "gi");
        var widthRex = new RegExp(YOUTUBE_REG_EXP_IMAGE_WIDTH, "gi");
        // extract height:
        var width = populateFromImage(img, widthRex, DEFAULT_YOUTUBE_WIDTH, 1);
        var height = populateFromImage(img, heightRex, DEFAULT_YOUTUBE_HEIGHT, 1);
        var alt = populateFromImage(img, altRex, "", 2);
        var replaced = populateTemplate(false, height, width, alt);
        html = html.replace(img, replaced);
    });

    return html;//.replace(/(<img[^>]*class="?YOUTUBE_placeholder"?[^>]*>)/ig, "");
};

/**
 * Parses values from the image placeholder, so we can populate the dialog
 * @param html image html (as text)
 * @param regexp regular expression object
 * @param defaultValue value returned if no match found
 * @param idx which matched group to return
 */
function populateFromImage(html, regexp, defaultValue, idx) {
    var res = regexp.exec(html);
    if (res == null) {
        return defaultValue;
    }
    return res[idx];
}

function populateImageTemplate(src, height, width, url) {
    return '<img title="YOUTUBE_placeholder" alt="' + url
            + '" width="' + width
            + '" src="' + src
            + '" height="' + height
            + '" />';
}

function populateTemplate(imageTemplate, height, width, url) {
    var result = YOUTUBE_OBJECT_TEMPLATE;
    result = result.replace(YOUTUBE_OBJECT_REPLACE_DATA, url);
    result = result.replace(YOUTUBE_OBJECT_REPLACE_WIDTH, width);
    result = result.replace(YOUTUBE_OBJECT_REPLACE_HEIGHT, height);
    return result;
}