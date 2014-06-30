<?php

/**
 * Based on WP_SimplePieAtomPub_Item
 * Expect this to become part of core wordpress at some point.
 * See http://core.trac.wordpress.org/ticket/7652
 * 
 * http://codex.wordpress.org/Geodata
 * 
 */

define('SIMPLEPIE_NAMESPACE_ATOMPUB', 'http://purl.org/atom/app#');
define('SIMPLEPIE_NAMESPACE_GEOTAG', 'http://www.georss.org/georss');

/**
 * SimplePie Helper for AtomPub 
 * 
 * @package WordPress 
 * @subpackage Publishing 
 * @since 3.1 
 */
if (!class_exists('WP_SimplePie_Blog_Item'))
{
    class WP_SimplePie_Blog_Item extends SimplePie_Item
    {
        /**
         * Constructor 
         */
        function __construct($feed, $data)
        {
            parent::__construct($feed, $data);
        }

        /**
         * Get the status of the entry 
         * 
         * @return bool True if the item is a draft, false otherwise 
         */
        function get_draft_status()
        {
            $draft = false;
            if (($control = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOMPUB, 'control')) && !empty($control[0]['child'][SIMPLEPIE_NAMESPACE_ATOMPUB]['draft'][0]['data']))
            {
                $draft = ('yes' == $control[0]['child'][SIMPLEPIE_NAMESPACE_ATOMPUB]['draft'][0]['data']);
            }
            return $draft;
        }

        //Tried using date functions from http://core.trac.wordpress.org/attachment/ticket/7652/7652-separate.diff
        //but ended up with 1970s dates so returned to Otto's version which is much simplified
        function get_updated()
        {
            $temparray = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'updated');
            if (isset($temparray[0]['data']))
                return $this->convert_date($temparray[0]['data']);
            else
                return null;
        }

        function get_published()
        {
            $temparray = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'published');
            if (isset($temparray[0]['data']))
                return $this->convert_date($temparray[0]['data']);
            else
                return null;
        }

        function get_geotags()
        {//Return an array of geo tags see http://codex.wordpress.org/Geodata
            //example source
            //        <georss:featurename>Rådhuspladsen 3, 1550 Copenhagen, Denmark</georss:featurename>
            //        <georss:point>55.6760968 12.5683371</georss:point>
            

            $latlong = $this->get_item_tags(SIMPLEPIE_NAMESPACE_GEOTAG, 'point');
            
            if (isset($latlong[0]['data'])) {
                preg_match('/([0-9.-]+).+?([0-9.-]+)/', $latlong[0]['data'], $matches);
                $lat=(float)$matches[1];
                $long=(float)$matches[2];
            }
            
            if (!isset($lat) |!isset($long)) {
                return null; //Without lat long we can't have a valid location
            }
                
            $address = $this->get_item_tags(SIMPLEPIE_NAMESPACE_GEOTAG, 'featurename');
            if (isset($address[0]['data']))
                $geo_address =  $address[0]['data'];
            else
                $geo_address = null;
            
            $geo = array('geo_latitude' => $lat, 'geo_longitude' => $long, 'geo_address' => $geo_address );
            
            return $geo;
        }
            
        function convert_date($date)
        {
            preg_match('#([0-9]{4})-([0-9]{2})-([0-9]{2})T([0-9]{2}):([0-9]{2}):([0-9]{2})(?:\.[0-9]+)?(Z|[\+|\-][0-9]{2,4}){0,1}#', $date, $date_bits);
            $offset = iso8601_timezone_to_offset($date_bits[7]);
            $timestamp = gmmktime($date_bits[4], $date_bits[5], $date_bits[6], $date_bits[2], $date_bits[3], $date_bits[1]);
            $timestamp -= $offset; // Convert from Blogger local time to GMT
            $timestamp += get_option('gmt_offset') * 3600; // Convert from GMT to WP local time
            return gmdate('Y-m-d H:i:s', $timestamp);
        }

        //Don't Sanitize the ID, the default get_id was cleaning our IDs and that meant that nested comments did not work
        function get_id()
        {
            if ($return = $this->get_item_tags(SIMPLEPIE_NAMESPACE_ATOM_10, 'id'))
            {
                return $return[0]['data'];
            }
        }
        
        //Prefiltered links
        function get_links($linktypes) {
        
            $mylinks = array();
            foreach ($linktypes as $type)
            {
                $links =parent::get_links($type);

                if (!is_null($links)) {
                    foreach ($links as $link) {
                        $mylinks[] = array('rel' => $type, 'href' => $link);
                    }
                }
            }
            return $mylinks;
        }

        //Preprocessed categories
        function get_categories() {
            $cats = parent::get_categories();
            $mycats = array();

            if (!is_null($cats)) {
                foreach ($cats as $cat) {
                    $mycats[] = $cat->term;
                }
            }
            return $mycats;
        }
        
        function get_source() {
            $temp = $this->get_item_tags('http://purl.org/syndication/thread/1.0', 'in-reply-to');

            foreach ($temp as $t) {
                if (isset($t['attribs']['']['source'])) {
                    $source = $t['attribs']['']['source'];
                }
            }
            return $source;
        }

    }

}

?>