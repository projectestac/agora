/*
 //########################################################################
 //  GLOBAL VARIABLES
 //########################################################################
 */

/**
 * GLOBAL VARS
 */
var DEFAULT_GOOGLE_MAPS_WIDTH = 400;
var DEFAULT_GOOGLE_MAPS_HEIGHT = 400;
var GOOGLE_MAP_PLUGIN_NAME = 'InsertGooglemap';
var GOOGLE_MAP_BASE = 'http://maps.google.com/maps/api/staticmap';
var GOOGLE_MAP_URL_TEMPLATE = "http://maps.google.com/maps/api/staticmap?center=#LAT#,#LNG#&zoom=14&size=#WIDTH#x#HEIGHT#&sensor=false";
var GOOGLE_MAP_REPLACE_LAT = /#LAT#/gi;
var GOOGLE_MAP_REPLACE_LNG = /#LNG#/gi;
var GOOGLE_MAP_REPLACE_HEIGHT = /#HEIGHT#/gi;
var GOOGLE_MAP_REPLACE_WIDTH = /#WIDTH#/gi;

/**
 * Constructor
 * @param editor , xinha editor
 */
function InsertGooglemap(editor) {
    this.editor = editor;
    var cfg = editor.config;
    var self = this;
    cfg.registerButton({
        id       : "insertgooglemap",
        tooltip  : this._lc("Insert Google Map"),
        image    : editor.imgURL("insert-googlemap.png", GOOGLE_MAP_PLUGIN_NAME),
        textMode : false,
        action   : function() {
            self.show();
        }
    });
    cfg.addToolbarElement("insertgooglemap", "createlink", 1);

}

InsertGooglemap._pluginInfo = {
    name          : GOOGLE_MAP_PLUGIN_NAME,
    origin        : "version: 1.0",
    version       : "1.0",
    developer     : "M.Milicevic",
    developer_url : "http://www.onehippo.com",
    c_owner       : "OneHippo",
    sponsor       : "SourceSense",
    sponsor_url   : "http://www.sourcesense.com",
    license       : "APL"
};

InsertGooglemap.prototype._lc = function(string) {
    return Xinha._lc(string, GOOGLE_MAP_PLUGIN_NAME);
};

InsertGooglemap.prototype.onGenerate = function() {
    // NO CSS NEEDED
    //this.editor.addEditorStylesheet(Xinha.getPluginDir(GOOGLE_MAP_PLUGIN_NAME) + '/insert-googlemap.css');
};

/**
 * This is out "EDIT" view, we do nothing
 * @param html
 */
InsertGooglemap.prototype.inwardHtml = function(html) {
    return html;
};

/**
 * Outward HTML is output HTML (which is saved)
 * @param html
 */
InsertGooglemap.prototype.outwardHtml = function(html) {
    // it's all ok, no replacement needed
    return html;
};

InsertGooglemap.prototype.onGenerateOnce = function() {
    this._prepareDialog();
};

InsertGooglemap.prototype._prepareDialog = function() {
    var self = this;
    var editor = this.editor;

    if (!this.html) {
        Xinha._getback(Xinha.getPluginDir(GOOGLE_MAP_PLUGIN_NAME) + '/dialog.html', function(getback) {
            self.html = getback;
            self._prepareDialog();
        });
        return;
    }

    // Now we have everything we need, so we can build the dialog.
    // TODO remove name

    this.dialog = new Xinha.Dialog(editor, this.html, GOOGLE_MAP_PLUGIN_NAME, {longitude:'', latiude:''});
    this.dialog.getElementById('ok').onclick = function() {
        self.apply();
    };

    this.dialog.getElementById('selectMap').onclick = function() {
        var nw = window.open(Xinha.getPluginDir(GOOGLE_MAP_PLUGIN_NAME) + '/gmap_choose.html', 'gmapselect');
        if (nw && nw.focus) {
            nw.focus();
        }
        return false;

    };

    this.ready = true;
};

InsertGooglemap.prototype.show = function() {
    // if the user is too fast clicking the, we have to make them wait
    if (!this.ready) {
        var self = this;
        window.setTimeout(function() {
            self.show();
        }, 100);
        return;
    }
    var editor = this.editor;
    this.selectedHTML = editor.getSelectedHTML();
    var sel = editor.getSelection();
    var range = editor.createRange(sel);
    this.mapObject = editor.activeElement(sel);

    if (this.mapObject != null && this.mapObject.tagName.toLowerCase() == 'img') {
        var lat = '';
        var lng = '';
        if (!this.isEmpty(this.mapObject.alt)) {
            var lat_lng = this.mapObject.alt.split(',');
            lat = lat_lng[0];
            lng = lat_lng[1];
        }
        inputs = {
            longitude : lng,
            latitude : lat,
            height:this.mapObject.height,
            width: this.mapObject.width
        };
    }
    else {
        inputs = {
            //=52.361306,4.899265
            latitude :52.361306,
            longitude : 4.899265,
            height:DEFAULT_GOOGLE_MAPS_HEIGHT,
            width: DEFAULT_GOOGLE_MAPS_WIDTH
        };
    }

    this.dialog.show(inputs);
    this.dialog.getElementById("latitude").focus();
};

InsertGooglemap.prototype.isEmpty = function (obj) {
    return obj == null || obj.length == 0;
};
InsertGooglemap.prototype.createUrl = function (height, width, lat, lng) {
    var result = GOOGLE_MAP_URL_TEMPLATE;
    result = result.replace(GOOGLE_MAP_REPLACE_LAT, lat)
            .replace(GOOGLE_MAP_REPLACE_LNG, lng)
            .replace(GOOGLE_MAP_REPLACE_HEIGHT, height)
            .replace(GOOGLE_MAP_REPLACE_WIDTH, width);
    return result;


};
InsertGooglemap.prototype.apply = function () {
    var editor = this.editor;
    var param = this.dialog.hide();
    var mapLongitude = param['longitude'];
    var mapLatitude = param['latitude'];
    var mapHeight = param['height'];
    var mapWidth = param['width'];
    var mapObject = this.mapObject;
    if (this.isEmpty(mapHeight)) {
        mapHeight = DEFAULT_GOOGLE_MAPS_HEIGHT;
    }
    if (this.isEmpty(mapWidth)) {
        mapWidth = DEFAULT_GOOGLE_MAPS_WIDTH;
    }
    var self = this;
    if (this.isEmpty(mapLatitude) || this.isEmpty(mapLongitude)) {
        if (mapObject) {
            var child = self.outwardHtml(mapObject.innerHTML);
            mapObject.parentNode.removeChild(mapObject);
            editor.insertHTML(child);
        }
        return;
    }
    try {

        var parameter;
        var doc = editor._doc;
        if (!mapObject) {
            // creating new object
            mapObject = doc.createElement("img");
            mapObject.src = this.createUrl(mapHeight, mapWidth, mapLatitude, mapLongitude);
            mapObject.height = mapHeight;
            mapObject.width = mapWidth;
            mapObject.alt = mapLatitude + ',' + mapLongitude;
            mapObject.className = "googlemap";
            var html = editor.getSelectedHTML();
            if (html) {
                mapObject.innerHTML += html;
            }
            if (Xinha.is_ie) {
                range.pasteHTML(mapObject.outerHTML);
            }
            else {
                editor.insertNodeAtSelection(mapObject);
            }
        }
        else {

            mapObject.src = this.createUrl(mapHeight, mapWidth, mapLatitude, mapLongitude);
            mapObject.className = "googlemap";
            mapObject.height = mapHeight;
            mapObject.width = mapWidth;
            mapObject.alt = mapLatitude + ',' + mapLongitude;
        }
    }
    catch (e) {
        alert(e);
    }

};
