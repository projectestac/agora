var adapter = {
	startTime : Math.floor(new Date().getTime() / 1000),

	applet : new Object(),

	properties : new Array(),

	propertyString : "",

	init : function() {
		this.decodeProperties();
		if (this.properties['state'] != undefined) {
			this.applet.setBase64(unescape(this.properties['state']));
		}
		if (this.properties['duration'] === undefined) {
			this.properties['duration'] = 0;
		}
	},

	doExit : function() {
		duration = Math.floor(new Date().getTime() / 1000) - this.startTime;
		this.properties['state'] = this.applet.getBase64();
		this.properties['grade'] = this.applet.getValue('grade');
		this.properties['duration'] = parseInt(this.properties['duration']) + duration;
		this.encodeProperties();
	},

	decodeProperties : function() {
		tmp = this.propertyString.split('&');
		for (i in tmp) {
			tmppr = tmp[i].split('=');
			this.properties[tmppr[0]] = tmppr[1];
		}
	},

	encodeProperties : function() {
		tmp = "";
		for ( var i in this.properties) {
			tmp += i + '=' + this.properties[i] + '&';
		}
		this.propertyString = tmp;
	}
}

function geogebra_addEvent(object, eventName, callback) {
	if (object.addEventListener) {
		object.addEventListener(eventName, callback, false);
	} else {
		object.attachEvent('on' + eventName, callback);
	}
}

function geogebra_submit_attempt(){
	var form = document.getElementById('geogebra_form');
        var movie = document.getElementById('geogebra_object');

        if (movie.nodeName.toLowerCase() == 'applet') { // is java
                adapter.doExit();
                form.appletInformation.value = adapter.propertyString;
                return true;
        }

        alert('The geogebra_object applet is missing');
        return false;    
}


geogebra_addEvent(window, 'load', function() {
	var form = document.getElementById('geogebra_form');
	adapter.propertyString = form.prevAppletInformation.value;
	adapter.applet = document.ggbApplet;
	adapter.init();

	geogebra_addEvent(form, 'submit', function(e) {
		return geogebra_submit_attempt();
	});
});

