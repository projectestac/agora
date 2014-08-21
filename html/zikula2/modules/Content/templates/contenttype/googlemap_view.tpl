{ajaxheader modname='Content'}

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
    var directionsService{{$contentId}} = new google.maps.DirectionsService();
    var directionsDisplay{{$contentId}};
*}}    
    var map{{$contentId}};
    var myLatlng{{$contentId}} = new google.maps.LatLng({{$latitude|safetext}}, {{$longitude|safetext}}); 
    Event.observe(window, 'load',
        function() { 
            var myMapOptions{{$contentId}} = { 
                zoom: {{$zoom|safetext}},
                center: myLatlng{{$contentId}},
                scaleControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                streetViewControl: {{if $streetviewcontrol}}true{{else}}false{{/if}}
            }; 
            map{{$contentId}} = new google.maps.Map($('googlemap{{$contentId}}'), myMapOptions{{$contentId}}); 
            
            {{* This code is for displaying directions directly into the inline map
            directionsDisplay{{$contentId}} = new google.maps.DirectionsRenderer();
            *}}
            
            // add a marker to the map
            var marker{{$contentId}} = new google.maps.Marker({ 
                position: myLatlng{{$contentId}}, 
                map: map{{$contentId}}, 
                title: '{{$text|strip_tags|truncate:200|safetext}}'
            }); 

            // display an infowindow when clicking on the marker
            var contentString{{$contentId}} = '{{$infotext|strip|safehtml}}';
            var infowindow{{$contentId}} = new google.maps.InfoWindow({ 
                content: contentString{{$contentId}}
            }); 
            google.maps.event.addListener(marker{{$contentId}}, 'click', function() { 
                infowindow{{$contentId}}.open(map{{$contentId}}, marker{{$contentId}}); 
            });

            {{* This code is for displaying an traffic and/or bicycle overlay
            // overlay the map with a traficlayer if available in your region:
            // http://code.google.com/apis/maps/documentation/javascript/overlays.html#TrafficLayer
            var trafficLayer{{$contentId}} = new google.maps.TrafficLayer();
            trafficLayer{{$contentId}}.setMap(map{{$contentId}});

            // overlay the map with a bicyclelayer (currently ony in the US)
            // http://code.google.com/apis/maps/documentation/javascript/overlays.html#BicyclingLayer
            var bikeLayer{{$contentId}} = new google.maps.BicyclingLayer();
            bikeLayer{{$contentId}}.setMap(map{{$contentId}});
            *}}
        }
    );
{{* This code is for displaying directions directly into the inline map
    function calcRoute() {
        var start = $F("routestart");
        var request = {
            origin: start, 
            destination: myLatlng{{$contentId}},
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };
        directionsService{{$contentId}}.route(request, function(result, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                // adjust the width of the map and directions panel
                $('googlemap{{$contentId}}').setStyle({width: '50%', height: '600px'});
                $('directions{{$contentId}}').setStyle({width: '50%', height: '600px'});
                directionsDisplay{{$contentId}}.setDirections(result);
                directionsDisplay{{$contentId}}.setMap(map{{$contentId}});
                directionsDisplay{{$contentId}}.setPanel($('directions{{$contentId}}'));
            }
        });
    }
    function clearRoute() {
        $('googlemap{{$contentId}}').setStyle({width: '100%', height: '{{$height}}px'});
        $('directions{{$contentId}}').setStyle({width: '0%', height: '{{$height}}px'});
        map{{$contentId}}.setCenter(myLatlng{{$contentId}});
        directionsDisplay{{$contentId}}.setMap(null);
        directionsDisplay{{$contentId}}.setPanel(null);
        directionsDisplay{{$contentId}}.setDirections(null);
    }
*}}
    //]]>
</script>
