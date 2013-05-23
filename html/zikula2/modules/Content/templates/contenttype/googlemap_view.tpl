{ajaxheader modname='Content'}

<script type="text/javascript" 
    src="http://maps.google.com/maps/api/js?v=3&language={$language}&sensor=false">
</script> 

{* This code is for displaying directions directly into the inline map
<div class="z-formrow">
    <label for="routestart">{gt text="Get directions from start address"}</label>
    <input type="text" id="routestart" name="routestart" maxlength="255" class="text" value=""/>
    <input onclick="calcRoute();" type="submit" name="calcRoute" value="{gt text="Show Directions"}" />
    <input onclick="clearRoute();" type="submit" name="clearRoute" value="{gt text="Clear Directions"}" />
</div>
*}

{* See for maps parameters: http://mapki.com/wiki/Google_Map_Parameters *}
{if $directionslink}
<a href="http://maps.google.com/maps?f=d&daddr={$latitude|safetext},{$longitude|safetext}&mrsp=1&hl={$language}&ie=UTF8&z=10" title="">{gt text="Get directions to this location"}</a>
{/if}

<div class="content-googlemap">
    <div id="googlemap{$contentId}" class="map" style="width: 100%; height: {$height|safetext}px"></div>
    <p class="content-description">{$text|safehtml}</p>
{* This code is for displaying directions directly into the inline map
    <div id="googlemap{$contentId}" class="map" style="float:left; width: 100%; height: {$height|safetext}px"></div>
    <div id="directions{$contentId}" class="map" style="float: right; width: 0%; height: {$height|safetext}px"></div>
*}
</div>

<script type="text/javascript">
    //<![CDATA[
{{* This code is for displaying directions directly into the inline map
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay;
*}}    
    var map;
    var myLatlng = new google.maps.LatLng({{$latitude|safetext}}, {{$longitude|safetext}}); 
    Event.observe(window, 'load',
        function() { 
            var myMapOptions = { 
                zoom: {{$zoom|safetext}},
                center: myLatlng,
                scaleControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                streetViewControl: {{if $streetviewcontrol}}true{{else}}false{{/if}}
            }; 
            map = new google.maps.Map($('googlemap{{$contentId}}'), myMapOptions); 
            
            {{* This code is for displaying directions directly into the inline map
            directionsDisplay = new google.maps.DirectionsRenderer();
            *}}
            
            // add a marker to the map
            var marker = new google.maps.Marker({ 
                position: myLatlng, 
                map: map, 
                title: '{{$text|strip_tags|truncate:200|safetext}}'
            }); 

            // display an infowindow when clicking on the marker
            var contentString = '{{$infotext|strip|safehtml}}';
            var infowindow = new google.maps.InfoWindow({ 
                content: contentString
            }); 
            google.maps.event.addListener(marker, 'click', function() { 
                infowindow.open(map, marker); 
            });

            {{* This code is for displaying an traffic and/or bicycle overlay
            // overlay the map with a traficlayer if available in your region:
            // http://code.google.com/apis/maps/documentation/javascript/overlays.html#TrafficLayer
            var trafficLayer = new google.maps.TrafficLayer();
            trafficLayer.setMap(map);

            // overlay the map with a bicyclelayer (currently ony in the US)
            // http://code.google.com/apis/maps/documentation/javascript/overlays.html#BicyclingLayer
            var bikeLayer = new google.maps.BicyclingLayer();
            bikeLayer.setMap(map);
            *}}
        }
    );
{{* This code is for displaying directions directly into the inline map
    function calcRoute() {
        var start = $F("routestart");
        var request = {
            origin: start, 
            destination: myLatlng,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService.route(request, function(result, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                // adjust the width of the map and directions panel
                $('googlemap{{$contentId}}').setStyle({width: '50%', height: '600px'});
                $('directions{{$contentId}}').setStyle({width: '50%', height: '600px'});
                directionsDisplay.setDirections(result);
                directionsDisplay.setMap(map);
                directionsDisplay.setPanel($('directions{{$contentId}}'));
            }
        });
    }
    function clearRoute() {
        $('googlemap{{$contentId}}').setStyle({width: '100%', height: '{{$height}}px'});
        $('directions{{$contentId}}').setStyle({width: '0%', height: '{{$height}}px'});
        map.setCenter(myLatlng);
        directionsDisplay.setMap(null);
        directionsDisplay.setPanel(null);
        directionsDisplay.setDirections(null);
    }
*}}
    //]]>
</script>