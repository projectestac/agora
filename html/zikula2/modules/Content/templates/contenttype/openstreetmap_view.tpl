<div class="content-openstreetmap">
    <script type='text/javascript'>
    //<![CDATA[
    var map;
    var showPopupOnHover = false;
    text = new Array('{{gt text="Show information on the map"}}','{{gt text="Hide information on the map"}}');

    function drawmap() {
        OpenLayers.Lang.setCode('{{$language}}');
        map = new OpenLayers.Map('map', {
            projection: new OpenLayers.Projection("EPSG:900913"),
            displayProjection: new OpenLayers.Projection("EPSG:4326"),
            controls: [
                new OpenLayers.Control.MousePosition(),
                new OpenLayers.Control.Attribution(),
                new OpenLayers.Control.ZoomPanel(),
                new OpenLayers.Control.Navigation({'zoomWheelEnabled': false})
            ],
            maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34, 20037508.34, 20037508.34),
            numZoomLevels: 18,
            maxResolution: 156543,
            units: 'meters'
        });

    // position and zoomlevel on the map
    var lat={{$latitude|safetext}};
    var lon={{$longitude|safetext}};
    var zoom={{$zoom|safetext}};;

    checkForPermalink();

    // add overlay layers
    layer_markers = new OpenLayers.Layer.Markers("Marker", { projection: new OpenLayers.Projection("EPSG:4326"),visibility: true, displayInLayerSwitcher: false });
    layer_vectors = new OpenLayers.Layer.Vector("Drawings", { displayInLayerSwitcher: false } );map.addLayer(layer_vectors);map.addLayer(layer_markers)
    layers = new Array();

    layer_layerMapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
    map.addLayer(layer_layerMapnik);

    layers.push(new Array(layer_layerMapnik,'layer_layerMapnik'));
    setLayer(0);

    // jump to the correct location...
    jumpTo(lon,lat,zoom);

    // add the used markers icons...
    icons = new Array();
    icons[0] = new Array('http://openlayers.org/api/img/marker.png','21','25','0.5','1');

    // add the marker
    addMarker(layer_markers,lon,lat,"<div><h4>{{$text|safehtml}}</h4></div>",false,0);

    geometries = new Array();
    
    // again a jump to location
    jumpTo(lon, lat, zoom);
    checkUtilVersion(4);
    }

    // draw map after page
    Event.observe(window, 'load', drawmap);
    //]]>
    </script>

    <div class="openstreetmap{$contentId}" id="map" style="width: 100%; height: {$height}px"></div>
</div>
