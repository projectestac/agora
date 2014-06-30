<?php

/**
 * @author Andy Clark
 * @copyright 2013
 * The overall blog, stats and methods for importing
 */

class Blogger_Importer_Blog 
{
    var $ID;
    var $comments_url;
    
        function init_defaults($totalposts,$totalcomments)
        {
            $this->total_posts = $totalposts;
            $this->total_comments = $totalcomments;

            $this->posts_done = $this->count_imported_posts();
            $this->comments_done = $this->count_imported_comments();

            //Initialise other vars
            $this->posts_skipped = 0;
            $this->comments_skipped = 0;

            $this->images_done = $this->count_imported_images();
            $this->images_progress = 0;
            $this->images_skipped = 0;
            $this->links_done = 0; //Can't count these as we don't store them in separately in the DB
            $this->links_progress = 0;

            $this->mode = 'init';
        }
           
        //Return the blog from the options or false for failure
        static function read_option($blogID)
        {
            $blog = false;
            $blogopt = get_option('blogger_importer_blog_'.$blogID);
            if (is_array($blogopt)) {
               $blog = new Blogger_Importer_Blog();
               foreach ($blogopt as $key => $value)
                    $blog->$key = $value;
               }
            return $blog;
        }            
    
        function import_blog($connector)
        {
            //AGC: Moved the parameter parsing out to start and the importing into separate functions.
            //25/1/2013 Suppress post revisions whilst we are importing
            remove_post_type_support('post', 'revisions');
            
            $this->importer_started = time();
            
            if (!$this->import_posts($connector))
                return ('continue');
            if (!$this->import_comments($connector))
                return ('continue');

            if (Blogger_Import::IMPORT_IMG)
            {
                if (!$this->process_images())
                    return('continue');
            }

            if (!$this->process_links()) 
                return('continue');

            $this->mode = 'authors';
            $this->save_vars();

            if (!$this->posts_done && !$this->comments_done)
                return('nothing');

            //Thought: Should this be passing an ID so we know which blog just got imported.
            do_action('import_done', 'blogger');
            
            return('done');
        }
        
        
        function import_posts($connector)
        {
            //Simpler counting for posts as we load them forwards
            if (isset($this->posts_start_index))
                $start_index = (int)$this->posts_start_index;
            else
                $start_index = 1;

            if ($this->total_posts > $start_index)
            {
                // Grab all the posts
                $this->mode = 'posts';
                do
                {
                    $index = $struct = $entries = array();

                    $url = $this->posts_url;

                    //Thought, how do we decouple this method from the source?
                    //Perhaps the "get data function" can somehow be passed through as a parameter to this.
                    //This decoupling would then allow an easier re-code for say when the blogger data arrives as a file not as a URL
                    $response = $connector->oauth_get($url, array('max-results' => Blogger_Import::MAX_RESULTS, 'start-index' => $start_index));

                    if ($response == false)
                        break;

                    // parse the feed
                    $feed = new SimplePie();

                    //set_xxxx methods depreciated (and not working?) replaced with get_registry as per docs
                    $reg = $feed->get_registry();

                    $reg->register('Sanitize', 'Blogger_Importer_Sanitize');
                    $feed->sanitize = $reg->create('Sanitize'); //Should not really need to do this but there seems to be an issue with the SimplePie class?
                    $reg->register('Item', 'WP_SimplePie_Blog_Item');

                    $feed->set_raw_data($response);
                    $feed->init();

                    foreach ($feed->get_items() as $item)
                    {
                        $blogentry = new BloggerEntry();

                        $blogentry->blogurl = $this->host;
                        $blogentry->id = $item->get_id();
                        $blogentry->published = $item->get_published();
                        $blogentry->updated = $item->get_updated();
                        $blogentry->isDraft = $item->get_draft_status();
                        $blogentry->title = $item->get_title();
                        $blogentry->content = $item->get_content();
                        $blogentry->author = $item->get_author()->get_name();
                        $blogentry->geotags = $item->get_geotags();

                        $blogentry->links = $item->get_links(array('replies', 'edit', 'self', 'alternate'));
                        $blogentry->parselinks();

                        $blogentry->categories = $item->get_categories();

                        // Checks for duplicates
                        $post_id = $blogentry->post_exists();

                        if ($post_id != 0)
                        {
                            $this->posts_skipped++;
                        } else
                        {
                            //Unique new post so import it
                            $post_id = $blogentry->import();
                            $this->posts_done++;
                            $this->save_vars();
                        }

                        //Ref: Not importing properly http://core.trac.wordpress.org/ticket/19096
                        //Simplified this section to count what is loaded rather than parsing the results again
                        $start_index++;
                    }

                    $this->posts_start_index = $start_index;

                    $this->save_vars();

                } while ($this->total_posts > $start_index && $this->have_time());
            }
            return ($this->total_posts <= $start_index);
        }

        function import_comments($connector)
        {
            if (isset($this->comments_start_index))
                $start_index = (int)$this->comments_start_index;
            else
                $start_index = 1;

            if ($start_index > 0 && $this->total_comments > 0)
            {

                $this->mode = 'comments';
                do
                {
                    $index = $struct = $entries = array();

                    //So we can link up the comments as we go we need to load them in reverse order
                    //Reverse the start index as the GData Blogger feed can't be sorted
                    $batch = ((floor(($this->total_comments - $start_index) / Blogger_Import::MAX_RESULTS) * Blogger_Import::MAX_RESULTS) + 1);

                    $response = $connector->oauth_get($this->comments_url,array('max-results' => Blogger_Import::MAX_RESULTS, 'start-index' => $batch));
                    // parse the feed
                    $feed = new SimplePie();
                    //3/1/2012 Updated syntax for registering the item
                    $reg = $feed->get_registry();
                    $reg->register('Item', 'WP_SimplePie_Blog_Item');
                    // Use the standard "stricter" sanitize class for comments
                    $feed->set_raw_data($response);
                    $feed->init();

                    //Reverse the batch so we load the oldest comments first and hence can link up nested comments
                    $comments = array_reverse($feed->get_items());

                    if (!is_null($comments))
                    {
                        foreach ($comments as $item)
                        {
                            $commententry = new CommentEntry();

                            $commententry->id = $item->get_id();
                            $commententry->updated = $item->get_updated();
                            $commententry->content = $item->get_content();
                            $commententry->author = $item->get_author()->get_name();
                            $commententry->authoruri = $item->get_author()->get_link();
                            $commententry->authoremail = $item->get_author()->get_email();

                            $commententry->source = $item->get_source();
                            $parts = parse_url($commententry->source);
                            $commententry->old_post_permalink = $parts['path']; //Will be something like this '/feeds/417730729915399755/posts/default/8397846992898424746'
                                            
                            $commententry->post_ID = BloggerEntry::get_post_by_oldID($commententry->old_post_permalink);

                            //Get the links
                            $commententry->links = $item->get_links(array('edit', 'self', 'alternate', 'related'));
                            $commententry->parselinks();

                            // Nested comment?
                            if (isset($commententry->related))
                            {
                                $commententry->parentcommentid = CommentEntry::get_comment_by_oldID($commententry->related);
                            }

                            //Perhaps could log errors here?
                            if ($commententry->post_ID != 0)
                            {
                                // Checks for duplicates
                                if ($comment_id = $commententry->exists())
                                {
                                    $this->comments_skipped++;
                                } else
                                {
                                    $comment_id = $commententry->import();
                                    $this->comments_done++;
                                }
                            } else
                            {
                                $this->comments_skipped++;
                            }
                            $this->save_vars();
                            $start_index++;
                        }
                    }

                    $this->comments_start_index = $start_index;
                    $this->save_vars();
                } while ($this->total_comments > $start_index && $this->have_time());
            }
            return ($this->total_comments <= $start_index);
        }
        
        function save_authors()
        {
            global $wpdb;

            //Change to take authors as a parameter
            $authors = (array )$_POST['authors'];

            //Todo: Handle the case where there are no more authors to remap

            // Get an array of posts => authors          
            $post_ids = (array )$wpdb->get_col($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'blogger_blog' AND meta_value = %s", $this->host));
            $post_ids = join(',', $post_ids);
            $results = (array )$wpdb->get_results("SELECT post_id, meta_value FROM $wpdb->postmeta WHERE meta_key = 'blogger_author' AND post_id IN ($post_ids)");
            foreach ($results as $row)
                $authors_posts[$row->post_id] = $row->meta_value;

            foreach ($authors as $author => $user_id)
            {
                $user_id = (int)$user_id;

                // Skip authors that haven't been changed
                if ($user_id == $this->authors[$author][1])
                    continue;

                // Get a list of the selected author's posts
                $post_ids = (array )array_keys($authors_posts, $this->authors[$author][0]);
                $post_ids = join(',', $post_ids);

                $wpdb->query($wpdb->prepare("UPDATE $wpdb->posts SET post_author = %d WHERE id IN ($post_ids)", $user_id));
                $this->authors[$author][1] = $user_id;
                
                //Should we be tidying up the post meta data here, rather than in restart?
                //$wpdb->query("DELETE FROM $wpdb->postmeta WHERE meta_key = 'blogger_author'");
            }
            return '';
        }
    
   
           /**
         * Return count of imported posts from WordPress database
         *
         * @return int
         */
        function count_imported_posts()
        {
            global $wpdb;
            $count = 0;
            $meta_key = 'blogger_blog';
            $sql = $wpdb->prepare("SELECT count(post_id) as cnt FROM $wpdb->postmeta  m
                                inner join $wpdb->posts p on p.id = m.post_id and post_type = 'post'
                                 where meta_key = '%s' and meta_value = '%s'", $meta_key, $this->host);

            $result = $wpdb->get_results($sql);

            if (!empty($result))
                $count = intval($result[0]->cnt);

            // unset to save memory
            unset($results);

            return $count;
        }

        /**
         * Return count of imported images from WordPress database
         *
         * @param string $bloghost url
         * @return int
         */
        function count_imported_images()
        {
            global $wpdb;
            $count = 0;
            $meta_key = 'blogger_blog';
            $sql = $wpdb->prepare("SELECT count(post_id) as cnt FROM $wpdb->postmeta  m
                                inner join $wpdb->posts p on p.id = m.post_id and post_type = 'attachment'
                                 where meta_key = '%s' and meta_value = '%s'", $meta_key, $this->host);

            $result = $wpdb->get_results($sql);

            if (!empty($result))
                $count = intval($result[0]->cnt);

            // unset to save memory
            unset($results);

            return $count;
        }

        /**
         * Return count of imported comments from WordPress database
         *
         * @param string $bloghost url
         * @return int
         */
        function count_imported_comments()
        {
            global $wpdb;
            $count = 0;
            $meta_key = 'blogger_blog';
            $sql = $wpdb->prepare("SELECT count(post_id) as cnt FROM $wpdb->postmeta  m
                                inner join $wpdb->posts p on p.id = m.post_id and post_type = 'post'
                                inner join $wpdb->comments c on p.id = c.comment_post_ID 
                                 where meta_key = '%s' and meta_value = '%s'
                                       and c.comment_type <> 'pingback'", $meta_key, $this->host);

            $result = $wpdb->get_results($sql);

            if (!empty($result))
                $count = intval($result[0]->cnt);

            // unset to save memory
            unset($results);

            return $count;
        }

        function process_links()
        {
            //Update all of the links in the blog
            global $wpdb;

            $postsprocessed = $this->links_progress;
            if ($postsprocessed == 0)
            {
                $linksprocessed = 0;
            } else
            {
                $linksprocessed = $this->links_done;
            }
            $batchsize = 20;            

            $oldurlsearch = $this->host;

            if (substr($oldurlsearch, 0, 3) == 'www.')
            {
                $oldurlsearch = substr($oldurlsearch, 3, strlen($oldurlsearch - 3));
            }

            $oldurlsearch = str_replace('.', '\.', $oldurlsearch);

            $blogspot = stripos($oldurlsearch, '\.blogspot\.');
            if ($blogspot)
            { //Blogspot addresses can be international e.g. myblog.blogspot.com, myblog.blogspot.com.au or myblog.blogspot.co.uk or myblog.blogspot.de both resolve to the same blog.
                //See http://www.searchenginejournal.com/google-blogger-url-censorship/39724/
                $oldurlsearch = substr($oldurlsearch, 0, $blogspot + 12) . '[\w\.]{2,6}';
            }

            $loadedposts = get_posts(array('meta_key' => 'blogger_blog', 'meta_value' => $this->host, 'posts_per_page' => $batchsize, 'offset' => $postsprocessed, 'post_status' => array('draft', 'publish','future')));

            //Stop if nothing left
            if (count($loadedposts) == 0){
                return true;
            }

            foreach ($loadedposts as $importedpost) {
                $importedcontent = $importedpost->post_content;

                $regexp = '<a\s[^>]*href=([\"\'`])(https?:\/\/(?:www\.)*' . $oldurlsearch . '\/)([^\" >]*?)\1[^>]*>(.*)<\/a>';
                if (preg_match_all("/$regexp/siU", $importedcontent, $matches, PREG_SET_ORDER))
                {
                    foreach ($matches as $match)
                    {
                        $HostURL = substr($match[2], 0, strlen($match[2]) - 1); //e.g. http://minitemp.blogspot.co.uk
                        $PageURL = '/' . $match[3]; //e.g. '/2011/04/what-happens-if-blog-title-is-really.html'
                        $sql = $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta  m
                                inner join $wpdb->posts p on p.id = m.post_id and post_type = 'post'
                                 where meta_key = '%s' and meta_value = '%s'", 'blogger_permalink', $PageURL);

                        $linkpostid = $wpdb->get_var($sql);

                        if ($linkpostid != 0) {
                            $NewURL = get_permalink($linkpostid);
                        } else { // Page not found, update content with just the new domain
                            $NewURL = site_url($PageURL);
                        }
                     
                        $importedcontent = str_replace($HostURL . $PageURL, $NewURL, $importedcontent);
                        $linksprocessed++;
                    }

                    if ($importedcontent == '')
                    {
                        return new WP_Error('Empty Content', __("Attempting to write back empty content"));
                    }

                    $importedpost->post_content = $importedcontent;
                    wp_update_post($importedpost);

                }
                $postsprocessed++;

                //For some reason the intermediate values are not getting written, is it that the options are cached hence not read back?
                $this->links_done = $linksprocessed;
                $this->links_progress = $postsprocessed;
                $saved = $this->save_vars();
            }
            unset($loadedposts);
            return ($postsprocessed >= $this->total_posts);;
        }

        function isurlimage($srcurl)
        {
            //Process picasaweb links and files that are images
            if (substr($srcurl, 0, 27) == 'http://picasaweb.google.com')
                return true;
            return preg_match('/(?i)\.(jpe?g|png|gif|bmp)$/i', $srcurl);
        }
        
        //Get the current status for this blog
        function get_js_status()
        {
            //Trap for division by zero errors
            if ($this->total_posts == 0) {
                $p1 = 100;
                $i2 = 100;
                $l2 = 100;
            } else {
                $p1 = ($this->posts_done / $this->total_posts) * 100;
                $i2 = ($this->images_progress / $this->total_posts) * 100;
                $l2 = ($this->links_progress / $this->total_posts) * 100;
            }

            $p2 = sprintf(__('%d of %d', 'blogger-importer'), $this->posts_done, $this->total_posts);
            $p3 = sprintf(__('%d posts skipped', 'blogger-importer'), $this->posts_skipped);
            $c1 = $this->total_comments == 0 ? 100 : ($this->comments_done / $this->total_comments) * 100;
            $c2 = sprintf(__('%d of %d', 'blogger-importer'), $this->comments_done, $this->total_comments);
            $c3 = sprintf(__('%d comments skipped', 'blogger-importer'), $this->comments_skipped);
            $i1 = isset($this->images_done) ? (int)$this->images_done : 0; 
            $i3 = sprintf(__('%d images skipped', 'blogger-importer'), $this->images_skipped);
            
            $l1 = isset($this->links_done) ? (int)$this->links_done : 0;

            return "{p1:$p1,p2:\"$p2\",p3:\"$p3\",c1:$c1,c2:\"$c2\",c3:\"$c3\",i1:$i1,i2:$i2,i3:\"$i3\",l1:$l1,l2:$l2}";
        }
        
        function get_authors()
        {
            global $wpdb;
            global $current_user;
        
                $post_ids = (array )$wpdb->get_col($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = 'blogger_blog' AND meta_value = %s", $this->host));
                $post_ids = join(',', $post_ids);
                $authors = (array )$wpdb->get_col($wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'blogger_author' AND post_id IN (%s)",$post_ids));
                
                $this->authors = array_map(null, $authors, array_fill(0, count($authors), $current_user->ID));
        }
        
        /*
        * Search for either a linked image or a non linked image within the supplied html
        * <a href="xxx" yyyy><img src="zzz" ></a> or <img src="zzz" >
        * Ref: http://www.the-art-of-web.com/php/parse-links/
        *        "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>"  
        *      http://wordpress.org/extend/plugins/blogger-image-import/
        *        "<a[^>]+href\=([\"'`])(.*)\\1[^<]*?<img[^>]*src\=([\"'`])(.*)\\3[^>]*>"
        */
        function get_images($content)
        {
            $highrez = array();
            $lowrez = array();

            //First images with links
            //Might be nice to expand this top try and get Alt and/or Title attributes for use as description
            $regexp = "<a\s[^>]*href\=([\"'`])([^> ]*?)\\1[^<]*?<img[^>]*src\=([\"'`])([^\> ]*?)\\3[^>]*>";

            if (preg_match_all("/$regexp/siU", $content, $matches1, PREG_SET_ORDER))
            {
                //http://www.techrepublic.com/article/17-useful-functions-for-manipulating-arrays-in-php/5792851
                foreach ($matches1 as $match)
                {
                    if ($this->isurlimage($match[2]))
                    {
                        $highrez[$match[4]] = $match[2];
                    } else
                    {
                        $lowrez[$match[4]] = '';
                    }
                }
            }

            //Now any image (n.b. this overlaps the previous set)
            $regexp = "<img[^>]*src\=([\"'`])([^\> ]*?)\\1[^>]*>";

            if (preg_match_all("/$regexp/siU", $content, $matches2, PREG_SET_ORDER))
            {
                foreach ($matches2 as $match)
                {
                    $lowrez[$match[2]] = '';
                }
            }

            //Remove any rows from this second set that are already in the first set and merge two sets of results
            $images = array_merge($lowrez, $highrez);
            return $images;
        }

        /**
         * Update all of the images in the posts that have already been imported
         */
        function process_images()
        {
            $postsprocessed = $this->images_progress;
            if ($postsprocessed == 0)
            {
                $imagesprocessed = 0;
                $imagesskipped = 0;
            } else
            {
                $imagesprocessed = $this->images_done;
                $imagesskipped = $this->images_skipped;
            }

            $batchsize = 20;

            $loadedposts = get_posts(array('meta_key' => 'blogger_blog', 'meta_value' => $this->host, 'posts_per_page' => $batchsize, 'offset' => $postsprocessed, 'post_status' => array('draft', 'publish','future')));

            //Stop if nothing left
            if (count($loadedposts) == 0){
                return true;
            }

            foreach ($loadedposts as $importedpost)
            {

                $importedcontent = $importedpost->post_content;
                $author = get_post_meta($importedpost->ID, 'blogger_author', true);

                $img_count = 0; //Count of images for this post
                foreach ($this->get_images($importedcontent) as $lowrez => $highrez)
                {
                    if (!$this->image_filter($lowrez))
                    {
                        //Pass null for description so that the default (filename) is used, might be good to use Alt tag instead?
                        $newcontent = $this->import_image($importedpost->ID, $lowrez, $highrez, null, $img_count, $importedcontent, $this->host, $author);
                        if (!is_wp_error($newcontent)) {
                            $importedcontent = $newcontent;
                            $img_count++;
                        } else {
                            Blogger_Import::_log($newcontent);
                            $imagesskipped++;
                        }
                    }
                }
                $imagesprocessed += $img_count;

                $importedpost->post_content = $importedcontent;
                wp_update_post($importedpost);
                $postsprocessed++;

                //For some reason the intermediate values are not getting written
                $this->images_done = $imagesprocessed;
                $this->images_progress = $postsprocessed;
                $this->images_skipped = $imagesskipped; 
                $saved = $this->save_vars();
            }
            unset($loadedposts);
            return ($postsprocessed >= $this->total_posts);
        }

        function image_urlremap($url,$large)
        {   /* Fix problem urls
             e.g. change https://lh4.googleusercontent.com/-nt66qhxzDyY/TZOD-RhTYMI/AAAAAAAACd4/Elzm1smRFb4/s800-h/Ski%2520Trip.jpg to
                  to     https://lh4.googleusercontent.com/-nt66qhxzDyY/TZOD-RhTYMI/AAAAAAAACd4/Elzm1smRFb4/s800/Ski%2520Trip.jpg
             Could use a apply_filter here to allow users to add their own tweeks
            */
            $pattern = '/(\/)(s\d*)-h(\/)/i';
            $replacement = '$1$2$3';
            $img =  preg_replace($pattern, $replacement, $url);
            
            /* Strip out ? and # on the end of files */
            $pattern = '/(.*)[#\?].*/i';
            $replacement = '$1';
            $img =  preg_replace($pattern, $replacement, $img);            

            if ($large) {
            // For images on blogger we can swap /sXXX/ with for example /s1600/ to get a larger file.
            // Use a standardised large size so we can control quality vs filesize.
                $pattern = '/(\/)(s\d*)(\/)/i';
                $replacement = '$1s'.Blogger_Import::LARGE_IMAGE_SIZE.'$3';
                $img = preg_replace($pattern, $replacement, $img);    
            }
            return $img;
        }

        function image_filter($url)
        {
            // Do we exclude this particular image?
            // Don't include images that are already loaded onto this site
            // Could use a apply_filter here to allow users to add their own tweeks
            return (substr($url, 0, strlen(site_url())) == site_url());
        }

        function import_image($post_id, $lowrez, $highrez, $description, $imgcount, $postcontent, $blogname, $author)
        {
            /* Import a new image unless we specifically filter it out or if it has already been downloaded on another page.
            Based on http://wordpress.stackexchange.com/questions//media-sideload-image-file-name and the tumblr-importer
            Simple filename cleaning as characters such as +, % cause issues ref: http://wordpress.org/extend/plugins/uploadplus/
            
            It's processing links of a form similar to these as provided by the "get_images" function
            <a href="myhighrezimage.jpg"><img src="mylowrezimage.jpg"></a>
            or
            <img src="mylowrezimage.jpg">
            
            If the high resolution (linked) file is not an image then the low resolution version is downloaded.           
            */
            $lowrez_old = $lowrez;
            $highrez_old = $highrez;
            $highrezispage = false;
            
            $lowrez = $this->image_urlremap($lowrez,false);
            if ($lowrez == '')
                return new WP_Error('Not an image',$message = __('Lowrez not an image','blogger-importer'), $data = array($lowrez_old, $highrez_old));

            if ($highrez != '')
            {
                $highrez = $this->image_urlremap($highrez,true);
            } else
            {
                $highrez = $this->image_urlremap($lowrez,true);
            }

            if (!$att_id = $this->image_exists($lowrez))
            {
                //Option to add a timeout to download_url, but don't use the wp_remote_get timeout as that's much shorter than the default here of 300s
                $tmp = download_url($highrez); 

                if (is_wp_error($tmp))
                {
                    @unlink($tmp); // clean up, copied this from other examples but how is this supposed to work if $tmp is an error??
                    //Don't exit as can still try the small image
                }

                // If the highrez was not an image then try the lowrex
                if (!$this->is_image($tmp, $highrez))
                {
                    $highrezispage = true; //That image was not valid
                    $tmp = download_url($lowrez); // Option to add a timeout here

                    if (is_wp_error($tmp))
                    {
                        @unlink($tmp); // clean up
                        return $tmp; // output wp_error
                    }

                    if (!$this->is_image($tmp, $lowrez))
                    {
                        @unlink($tmp); // clean up None of items are actually images, for example might be a single pixel, deliberately filtered out or a 404 error?
                        return new WP_Error('No Images',__('None of the images are valid','blogger-importer'), $data = array($lowrez_old, $highrez_old));
                    }
                }

                $new_name = preg_replace('/[^A-Za-z0-9._ ]/i', '-', basename($lowrez));

                $file_array = array('name' => $new_name, 'tmp_name' => $tmp);

                $att_id = media_handle_sideload($file_array, $post_id, $description, array('post_excerpt' => $description));
                if (is_wp_error($att_id))
                {
                    @unlink($file_array['tmp_name']);
                    return $att_id;
                }

                // Link attachment upto old url, store the author so we can replace it later
                add_post_meta($att_id, 'blogger_permalink', $lowrez);
                add_post_meta($att_id, 'blogger_blog', $blogname, true);
                add_post_meta($att_id, 'blogger_author', $author, true);

                if ($highrezispage) //Not an image so store so we can link later
                    add_post_meta($att_id, 'blogger_largeimgispage', true);
                    
            } else
            {
                //Image already exists, check if the high rez one was valid last time
                $tmp = get_post_meta($att_id, 'blogger_largeimgispage', true);
                if ($tmp == true)
                    $highrezispage = true;
            }

            //Always treat picassa webs as image so they get replaced with the new High rez link
            if (substr($highrez, 0, 27) == 'http://picasaweb.google.com')
                $highrezispage = false;

            //Replace the image strings
            if (!$highrezispage && $highrez_old != '')
            {
                $highrez_new = reset(wp_get_attachment_image_src($att_id, 'full'));
                $postcontent = str_replace($highrez_old, $highrez_new, $postcontent);
            }
            $lowrez_new = reset(wp_get_attachment_image_src($att_id, 'medium'));
            $postcontent = str_replace($lowrez_old, $lowrez_new, $postcontent);

            //Set the first image to be the post thumbnail (zero index)
            if ($imgcount == 0)
            {
                set_post_thumbnail($post_id, $att_id);
            }

            //media handle sideload moves the file so there should be no temp file left but cleanup just incase.
            @unlink($tmp);

            // incase something goes wrong
            if ($postcontent == '')
            {
                return new WP_Error('Empty Content', __("Attempting to write back empty content",'blogger-importer'), $data = array($lowrez_old, $highrez_old));
            }
            return $postcontent;
        }

        function is_image($file, $filename)
        {
            //Is the downloaded file really an image
            //e.g. it looked like an image from the URL but when downloaded it was something else perhaps a html page
            //Also filter out tracking images of 1 pixel square
            //Found that wp_check_filetype_and_ext and wp_match_mime_types was giving false positives
            $imgstats = @getimagesize($file);
            if (!$imgstats)
            {
                return false;
            }

            return (($imgstats[0] > 1) && ($imgstats[1] > 1));
        }

        function image_exists($lowrez)
        {
            global $wpdb;
            return $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts p INNER JOIN $wpdb->postmeta m ON p.ID = m.post_id AND meta_key = 'blogger_permalink' WHERE post_type = 'attachment' AND meta_value = %s LIMIT 0 , 1",
                $lowrez));
        }
        
        function have_time()
        {
            return (time() - $this->importer_started < Blogger_Import::MAX_EXECUTION_TIME);
        }
        
        function save_vars()
        {
            $vars = get_object_vars($this);
            //http://core.trac.wordpress.org/ticket/13480
            //Calling update options multiple times in a page (or ajax call) means that the cache kicks in and does not save to DB??
          
            //Store each blog it it's own setting so that we retrieve and save less data each time it updates the stats
            if (!update_option('blogger_importer_blog_'.$this->ID, $vars)) {
                    Blogger_Import::_log('Error saving blogger status');
                    Blogger_Import::_log(var_export(get_object_vars($this),true));
            };
            
            return !empty($vars);  
        }
    
    
    }

?>
