{ajaxheader modname='content'}

<script type="text/javascript" 
    src="http://maps.google.com/maps/api/js?v=3&language={$language}&sensor=false">
</script>

<div class="content-googlemap">
    <div id="googlemap" class="map" style="width: 100%; height: 400px"></div>
</div>

<script type="text/javascript">
    //<![CDATA[
    Event.observe(window, 'load',
        function() { 
            {{if !empty($latitude) AND !empty($longitude)}}
            var myLatlng = new google.maps.LatLng({{$latitude|safetext}}, {{$longitude|safetext}});
            {{else}}
            var myLatlng = new google.maps.LatLng(54.336869, 10.119942);
            {{/if}}
            var myMapOptions = { 
                zoom: {{if !empty($zoom)}}{{$zoom|safetext}}{{else}}5{{/if}},
                center: myLatlng, 
                scaleControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            }; 
            var map = new google.maps.Map($('googlemap'), myMapOptions); 
            
            // add a marker to the map
            var marker = new google.maps.Marker({ 
                position: myLatlng,
                map: map
            });
            
            google.maps.event.addListener(map, 'click', function(event) { 
                marker.setMap(null);
                marker = null;
                marker = new google.maps.Marker({ 
                    position: event.latLng,
                    map: map
                });
                map.setCenter(event.latLng);
                coord = event.latLng.toString();
                coord = coord.split(", ");
                latitude = coord[0].replace(/\(/, "");
                longitude = coord[1].replace(/\)/, "");
                $('latitude').value = latitude;
                $('longitude').value = longitude;
                $('zoom').value = map.getZoom();
            });
        }
    );
    //]]>
</script>

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
    {formtextinput id='zoom' group='data' mandatory='1' maxLength='30'}
    {contentlabelhelp __text='(from 0 for the entire world to 21 for individual buildings)'}
</div>

<div class="z-formrow">
    {formlabel for='height' __text='Height of the displayed map in pixels'}
    {formtextinput id='height' group='data' mandatory='1' maxLength='30'}
    {contentlabelhelp __text='(below 350 pixels the navigation controls will be small)'}
</div>

<div class="z-formrow">
    {formlabel for='streetviewcontrol' __text='Display the streetview control'}
    {formcheckbox id='streetviewcontrol' group='data'}
</div>

<div class="z-formrow">
    {formlabel for='directionslink' __text='Display a link to directions to this location in Google Maps '}
    {formcheckbox id='directionslink' group='data'}
</div>

<div class="z-formrow">
    {formlabel for='text' __text='Description to be shown below the map'}
    {formtextinput id='text' group='data' maxLength='255'}
</div>

<div class="z-formrow">
    {formlabel for='infotext' __text='Text to be shown in the popup window of the marker'}
    {formtextinput id='infotext' textMode='multiline' group='data' cols='60' rows='8'}
    {contentlabelhelp __text='(can contain HTML markup. Leave this field empty for disabling the popup window.'}
</div>
