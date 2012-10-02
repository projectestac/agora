function toggledisplay (id, indicator){ 
	if (document.getElementById) { 	// regular browser
		var obj = document.getElementById(id);
		var pic = document.getElementsByName(indicator);
		obj.style.display = (obj.style.display=='block'?'none':'block');
		pic[0].src = (obj.style.display=='block'?document.location.pnbaseURL + 'modules/MyMap/pnimages/hide.gif':document.location.pnbaseURL + 'modules/MyMap/pnimages/show.gif');
	} else if(document.all) { 		// Internet Exploder
		id.style.display = (id.style.display=='block'?'none':'block');
		indicator.src = (id.style.display=='block'?document.location.pnbaseURL + 'modules/MyMap/pnimages/hide.gif':document.location.pnbaseURL + 'modules/MyMap/pnimages/show.gif');
	} else if (document.layers) { 	// Netscape 4.x
		document.id.style.display = (document.id.style.display=='block'?'none':'block');
		document.indicator.src = (document.id.style.display=='block'?document.location.pnbaseURL + 'modules/MyMap/pnimages/hide.gif':document.location.pnbaseURL + 'modules/MyMap/pnimages/show.gif');
	}
}


function change(url,element)
{
	new Ajax.Updater(
		element,
		url, 
		{
			method: 'get',
			evalScripts: true
		}
	);
}

var linepnt = new Array();
function ajaxAddMapItems(map, data) {
	var i;

	if ( data.waypoints ) {
		for ( i=0, len=data.waypoints.length ; i < len; i++ ) {
			linepnt.push(new LatLonPoint(
				data.waypoints[i].lat,
				data.waypoints[i].lng
			));
		}
		//map.addPolyline( new Polyline( linepnt ) );
	}
	if ( data.markers ) {
		for ( i=0, len=data.markers.length ; i < len; i++ ) {
			var marker = new Marker( new LatLonPoint(
				data.markers[i].lat,
				data.markers[i].lng ) );
			if ( data.markers[i].title )
				marker.setLabel(data.markers[i].title);
			if ( data.markers[i].text )
				marker.setInfoBubble(
					'<strong>'+data.markers[i].title+'</strong><br/>'
					+data.markers[i].text);
			else
				marker.setInfoBubble(
					'<strong>'+data.markers[i].title+'</strong><br/>');
			map.addMarker( marker );
		}
	}
	if ( data.newoffset < 0 ) {
		map.addPolyline( new Polyline( linepnt ) );
		map.autoCenterAndZoom();
	}
	return data.newoffset;
};

function ajaxLoadMap(url, map, mid, wp, mk, off) {
	$('mymap_indicator_'+mid).show();
	new Ajax.Request( url, {
		method: 'get',
		parameters: { mid: mid, wp: wp, mk: mk, off: off },
		onSuccess: function(transport) {
			var json = transport.responseText.evalJSON();
			var newoff = ajaxAddMapItems(map, json.data);
			if ( newoff > 0 ) {
				ajaxLoadMap(url, map, mid, wp, mk, newoff);
			} else {
				$('mymap_indicator_'+mid).hide();
			}
			if ( json.authid )
				pnupdateauthid(json.authid);
		},
		onFailure: function() { alert("Oops failed to load '"+url+"'"); }
	});
};

// vim:sw=4:ts=4:si:hls
