/**
 * Content google map script
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://code.zikula.org/content
 * @version $Id: pnuser.php,v 1.21 2007/09/04 15:15:22 jornlind Exp $
 * @license See license.txt
 */

var googlemap = {};

googlemap.editMap = function(lat, lng, zoom)
{
  if (GBrowserIsCompatible()) 
  { 
    var map = new GMap2(document.getElementById("googlemap"));
    map.addControl(new GSmallMapControl());
    map.addControl(new GMapTypeControl());

    if (lat && lng && zoom) {
      map.setCenter(new GLatLng(lat, lng), Number(zoom));
    } else {
      map.setCenter(new GLatLng(54.33686989052731, 10.119942426681519), 5);
    }

    map.addOverlay(new GMarker(new GLatLng(lat, lng)));

    GEvent.addListener(map, "click", function(marker, point) 
    {
      if (point != null)
      {
        map.clearOverlays();
        var myPoint = new GMarker(point);
        map.addOverlay(myPoint);
        coordinates = point.toString();
        coordinates = coordinates.split(", ");
        latitude = coordinates[0].replace(/\(/, "");
        longitude = coordinates[1].replace(/\)/, "");
        zoom = map.getZoom();
        document.getElementById("longitude").value=longitude;
        document.getElementById("latitude").value=latitude;
        document.getElementById("zoom").value=zoom;
      }
    });
	} 
}


googlemap.showMap = function(id, lat, lng, zoom)
{
  if (GBrowserIsCompatible()) 
  { 
    var map = new GMap2(document.getElementById("googlemap"+id)); 
    map.setCenter(new GLatLng(lat, lng), Number(zoom)); 
    map.addOverlay(new GMarker(new GLatLng(lat, lng)));
    map.addControl(new GSmallMapControl());
    map.addControl(new GMapTypeControl());
    map.enableDoubleClickZoom();
    map.enableContinuousZoom();
	} 
}