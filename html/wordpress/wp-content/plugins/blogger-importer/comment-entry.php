<?php

/**
 * @author Andy Clark
 * @copyright 2013
 * A data object representing the data to be added into Wordpress 
 */

if (!class_exists('CommentEntry'))
{
    class CommentEntry {
        
            var $links = array();
            var $categories = array();
            
            function parselinks() {
                // Drop the #fragment and we have the comment's old post permalink.
                foreach ($this->links as $link)
                {
                    if ($link['rel'] == 'alternate')
                    {
                        $parts = parse_url($link['href']);
                        $this->old_permalink = $parts['fragment'];
                    }
                    //Parent post for nested links
                    if ($link['rel'] == 'related')
                    {
                        $parts = parse_url($link['href']);
                        $this->related = $parts['path'];
                    }
                    if ($link['rel'] == 'self')
                    {
                        $parts = parse_url($link['href']);
                        $this->self = $parts['path'];
                    }
                }
            }
            
            function import() {

                $comment_author = $this->author;
                $comment_author_url = $this->authoruri;
                $comment_author_email = $this->authoremail;
                $comment_date = $this->updated;
    
                $comment_content = $this->content;
                $comment_post_ID = $this->post_ID;
                $comment_author_IP = '127.0.0.1'; //Blogger does not supply the IP so default this
    
                // Clean up content
                // Simplepie does some cleaning but does not do these.
                $comment_content = str_replace('<br>', '<br />', $comment_content);
                $comment_content = str_replace('<hr>', '<hr />', $comment_content);
    
                $comment_parent = isset($this->parentcommentid) ? $this->parentcommentid : 0;
    
                $comment = compact('comment_post_ID', 'comment_author', 'comment_author_url', 'comment_author_email','comment_author_IP','comment_date', 'comment_content', 'comment_parent');
    
                $comment = wp_filter_comment($comment);
                $comment_id = wp_insert_comment($comment);
                
                //links of the form  /feeds/417730729915399755/8397846992898424746/comments/default/7732208643735403000
                add_comment_meta($comment_id, 'blogger_internal', $this->self, true);

            return $comment_id;
        }
        
        function exists()
        {
            //Do we have 2 comments for the same author at the same time, on the same post?
            //returns comment id
            
            //Updated to first check the internal id
            //Can we use get_comments here?
            global $wpdb;
            $c = $this->get_comment_by_oldID($this->self);
            if ($c <> 0) {
                return ($c);
                }
            else {
                $commentID = $wpdb->get_var($wpdb->prepare("SELECT comment_ID FROM $wpdb->comments
			                                             WHERE comment_post_ID = %s and comment_author = %s AND comment_date = %s",
                                                $this->post_ID, $this->author, $this->updated));
                return ($commentID);
            }
        }
        
        function get_comment_by_oldID($oldID) {
            //Check to see if this post has been loaded already
            //Can we use get_comments for this?
            global $wpdb;
            $query = "SELECT c.comment_id FROM $wpdb->commentmeta m inner join $wpdb->comments c on c.comment_ID = m.comment_id where meta_key = 'blogger_internal' and meta_value = '%s' LIMIT 0 , 1";
            $c = (int) $wpdb->get_var( $wpdb->prepare($query, $oldID) );
            return $c;            
        }

        
            
        }
}

?>