<?php

/**
 * @author Andy Clark
 * @copyright 2013
 * A data object representing the data to be added into Wordpress 
 */

if (!class_exists('BloggerEntry'))
{
    class BloggerEntry
        {
            var $links = array();
            var $categories = array();
            var $blogurl = '';
            
            function parselinks() {
                foreach ($this->links as $link) {
                    // save the self link as meta
                    if ($link['rel'] == 'self')
                    {
                        $postself = $link['href'];
                        $parts = parse_url($link['href']);
                        $this->old_permalink = $parts['path'];
                    }
    
                    // get the old URI for the page when available
                    if ($link['rel'] == 'alternate')
                    {
                        $parts = parse_url($link['href']);
                        $this->bookmark = $parts['path'];
                    }
    
                    // save the replies feed link as meta (ignore the comment form one)
                    if ($link['rel'] == 'replies' && false === strpos($link['href'], '#comment-form'))
                    {
                        $this->postreplies = $link['href'];
                    }
                }
            }
            
            function import() {

                $post_date = $this->published;
                $post_content = $this->content;
                $post_title = $this->title;
                $post_status = $this->isDraft ? 'draft' : 'publish';
        		//AGC:24/10/2013 Turn off the pingbacks
        		$post_pingback = Blogger_Import::POST_PINGBACK;

                // N.B. Clean up of $post_content is now part of the sanitize class
                // Check for duplication part of calling function
                $post = compact('post_date', 'post_content', 'post_title', 'post_status', 'post_pingback');

                $post_id = wp_insert_post($post);
                if (is_wp_error($post_id))
                    return $post_id;
                    
                wp_create_categories(array_map('addslashes', $this->categories), $post_id);

                add_post_meta($post_id, 'blogger_blog', $this->blogurl, true);
                add_post_meta($post_id, 'blogger_author', $this->author, true);

                if (!$this->isDraft && isset($this->bookmark))
                    add_post_meta($post_id, 'blogger_permalink', $this->bookmark, true);

                add_post_meta($post_id, 'blogger_internal', $this->old_permalink, true);
                
                if (isset($this->geotags)) {
                    add_post_meta($post_id,'geo_latitude',$this->geotags['geo_latitude']);
                    add_post_meta($post_id,'geo_longitude',$this->geotags['geo_longitude']);
                    add_post_meta($post_id,'geo_public',1);
                    if (isset($this->geotags['geo_address'])) {
                        add_post_meta($post_id,'geo_address',$this->geotags['geo_address']);
                    }
                }

                return $post_id;
        }
        
        
        function post_exists() {
            $p = $this->get_post_by_oldID($this->old_permalink);

            if ($p == 0 && isset($this->bookmark)) {
                $p = $this->get_post_by_oldID($this->bookmark);
            }         
            return $p;
        }
        
        function get_post_by_oldID($oldID) {
            //Check to see if this post has been loaded already
            //Can we use get_posts for this?
            global $wpdb;
            $query = "SELECT post_id FROM $wpdb->postmeta m inner join $wpdb->posts p on p.ID = m.post_id where meta_key = 'blogger_internal' and meta_value = '%s' and p.post_type = 'post' LIMIT 0 , 1";
            $p = (int) $wpdb->get_var( $wpdb->prepare($query, $oldID) );
            return $p;            
        }
    }          
}


?>