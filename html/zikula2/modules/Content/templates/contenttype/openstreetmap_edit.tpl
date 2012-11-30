<script type='text/javascript'>
    //<![CDATA[
    var map;
    function drawmap() {
        OpenLayers.Lang.setCode('{{$language}}');
        map = new OpenLayers.Map('map', {
            projection: new OpenLayers.Projection("EPSG:900913"),
            displayProjection: new OpenLayers.Projection("EPSG:4326"),
            controls: [
                new OpenLayers.Control.MouseDefaults(),
                new OpenLayers.Control.Attribution()],
            maxExtent:
            new OpenLayers.Bounds(-20037508.34,-20037508.34,
                                    20037508.34, 20037508.34),
            numZoomLevels: 20,
            maxResolution: 156543,
            units: 'meters'
        });

        map.addControl(new OpenLayers.Control.PanZoomBar());
        map.addLayer(new OpenLayers.Layer.OSM.Mapnik("Mapnik"));
        var markers = new OpenLayers.Layer.Markers("Markers");
        map.addLayer(markers);

        // set position and zoom - Berlin as default
        lon = 13.408056;
        lat = 52.518611;
        zoom = 6;
        jumpTo(lon,lat,zoom);

        // add click events
        var click = new OpenLayers.Control.Click();
        map.addControl(click);
        click.activate();
    }

    OpenLayers.Control.Click = OpenLayers.Class(OpenLayers.Control, {                
        defaultHandlerOptions: {
            'single': true,
            'double': false,
            'pixelTolerance': 0,
            'stopSingle': false,
            'stopDouble': false
        },

        initialize: function(options) {
            this.handlerOptions = OpenLayers.Util.extend(
                {}, this.defaultHandlerOptions
            );
            OpenLayers.Control.prototype.initialize.apply(
                this, arguments
            ); 
            this.handler = new OpenLayers.Handler.Click(
                this, {
                    'click': this.trigger
                }, this.handlerOptions
            );
        }, 

        trigger: function(e) {
            // get coordinates and zoom level
            var lonlat = map.getLonLatFromViewPortPx(e.xy).transform(new OpenLayers.Projection("EPSG:900913"), new OpenLayers.Projection("EPSG:4326"));
            var zoom = map.getZoom();

            // set form values
            document.getElementById('latitude').value = lonlat.lat;
            document.getElementById('longitude').value = lonlat.lon;
            document.getElementById('zoom').value = zoom;

            // set marker
            addMarker(layer_markers,lonlat.lon,lonlat.lat,"<div><h4>Click</h4></div>",false,0);

            // jump to click position
            jumpTo(lonlat.lon,lonlat.lat,zoom);
        }
    });
    Event.observe(window, 'load', drawmap);
    //]]>
</script>
<div class="content-openstreetmap">
    <div class="openstreetmap" id="map" style="width: 100%; height: 350px"></div>
</div>

<p>{gt text="Select a geographical position either by clicking on the map or writing the position (latitude and longitude) directly. You can drag the map with your mouse, and double-click to zoom and select position."}</p>

<div class="z-formrow">
    {formlabel for='latitude' __text='Latitude'}
    {formtextinput id='latitude' group='data' mandatory='1' maxLength='30'}
    {contentlabelhelp __text='(a comma-separated numeral that has a precision to 6 decimal places. For example, 40.714728)'}
</div>

<div class="z-formrow">
    {formlabel for='longitude' __text='Longitude'}
    {formtextinput id='longitude' group='data' mandatory='1' maxLength='30'}
    {contentlabelhelp __text='(a comma-separated numeral that has a precision to 6 decimal places. For example, 40.714728)'}
</div>

<div class="z-formrow">
    {formlabel for='zoom' __text='Zoom level'}
    {formtextinput id='zoom' group='data' mandatory='1' maxLength='2'}
    {contentlabelhelp __text='(from 0 for the entire world to 21 for individual buildings)'}
</div>

<div class="z-formrow">
    {formlabel for='height' __text='Height of the displayed map in pixels'}
    {formtextinput id='height' group='data' mandatory='1' maxLength='30'}
    {contentlabelhelp __text='(below 350 pixels the navigation controls will be small)'}
</div>

<div class="z-formrow">
    {formlabel for='text' __text='Description to be shown below the map'}
    {formtextinput id='text' group='data' maxLength='255'}
</div>
