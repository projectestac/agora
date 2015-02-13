/**
 * SET YOUR PREFERED OPTIONS IN THIS FILE
 */
var GM_PLUGIN_MAP;
function loadGoogleMap() {
    var GM_PLUGIN_LAT_LNG = new google.maps.LatLng(-34.397, 150.644);
    var GM_PLUGIN_OPTIONS = {
        zoom: 8,
        center: GM_PLUGIN_LAT_LNG,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    // INSTANTIATE IT:
    GM_PLUGIN_MAP = new google.maps.Map(document.getElementById("google_maps_selector"), GM_PLUGIN_OPTIONS);
    alert("I am executed");
}