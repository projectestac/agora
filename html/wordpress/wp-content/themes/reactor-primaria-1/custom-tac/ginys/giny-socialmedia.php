<?php

/**
 * Giny d'enllaços socials (facebook, twitter, youtube, vimeo, pinterest...) 
 * Facilita la incorporació d'enllaços habituals en les pàgines web dels centres educatius.
 *
 * @author Xavier Meler (jmeler@xtec.cat)
 */

class SocialMedia_Widget extends WP_Widget {
   
    public $socialmedia = array( 
	'twitter'=>array('nom'=>"Twitter",'url'=>'','img'=>'twitter-square'), 
	'facebook'=>array('nom'=>"Facebook",'url'=>'','img'=>'facebook-square'),  
	'google-plus'=>array('nom'=>"Google Plus",'url'=>'','img'=>'google-plus-square'),
        'youtube'=>array('nom'=>"Youtube",'url'=>'','img'=>'youtube-square'),
	'vimeo'=>array('nom'=>"Vimeo",'url'=>'','img'=>'vimeo-square'),
        'picasa'=>array('nom'=>"Picasa",'url'=>'','img'=>'camera'), 
        'flickr'=>array('nom'=>"Flickr",'url'=>'','img'=>'flickr'), 
        'pinterest'=>array('nom'=>"Pinterest",'url'=>'','img'=>'pinterest-square'), 
        'instagram'=>array('nom'=>"Instagram",'url'=>'','img'=>'instagram'),
	'tumblr'=>array('nom'=>"Tumblr",'url'=>'','img'=>'tumblr-square'), 
        'soundcloud'=>array('nom'=>"Soundcloud",'url'=>'','img'=>'soundcloud'), 
        'dropbox'=>array('nom'=>"Dropbox",'url'=>'','img'=>'dropbox'),
        'rss'=>array('nom'=>"rss",'url'=>'','img'=>'rss-square'), 
        'email'=>array('nom'=>"Correu",'url'=>'','img'=>'envelope-square'), 
        'moodle'=>array('nom'=>"Moodle",'url'=>'','img'=>'graduation-cap'),
        'xarxanodes'=>array('nom'=>"Xarxa Nodes",'url'=>'','img'=>'share-alt-square'),
        'docs'=>array('nom'=>"Documents",'url'=>'','img'=>'folder-open'),
        'fotos'=>array('nom'=>"Fotos",'url'=>'','img'=>'photo'),
        'video'=>array('nom'=>"Videos",'url'=>'','img'=>'caret-square-o-right')
        );

    // Create widget
    public function SocialMedia_Widget() {
        parent::__construct(
            'socialmedia_widget', // Base ID
            'Enllaços social media', // Name
            array( 'description' => 'Enllaços a les vostres xarxes socials i canals multimèdia', ) // Args
            );
         $this->socialmedia["xarxanodes"]["url"]=get_home_url()."/activitat";    
    }
 
    // Front-End Display of the Widget
    public function widget($args, $instance) {

        $title = $instance['title'];
        $mida =  $instance['mida'];
 
        echo $args['before_widget'];
        
        foreach ($this->socialmedia as $idSocialMedia => $nomSocialMedia) {
            $this->socialmedia[$idSocialMedia]["url"] = $instance[$idSocialMedia . '_url'];
        }

        // Display information
        //echo '<div class="widget socialmedia-widget block" >';
        if (!empty($title)) {
            echo '<h4 class="widget-title">' . $title . '</h4>';
        }

        foreach ($this->socialmedia as $idSocialMedia => $nomSocialMedia) {
            if ($this->socialmedia[$idSocialMedia]['url']!='')
                echo "<a class=\"fa fa-" . $this->socialmedia[$idSocialMedia]['img'] ." ".$mida."\" href=\"" . $this->socialmedia[$idSocialMedia]['url'] . "\" title=\"" . $this->socialmedia[$idSocialMedia]['nom'] . "\" target=\"_blank\"></a>";
        }
        echo $args['after_widget'];
        //echo '</div>';
    
        
    }

    // Back-end form of the Widget
    public function form($instance) {

        // Check for values
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = "Segueix-nos!";
        }
        if (isset($instance['mida'])) {
            $mida = $instance['mida'];
        } else {
            $mida = "fa-2x";
        }
      
        foreach ($this->socialmedia as $idSocialMedia => $nomSocialMedia) {
            if (isset($instance[$idSocialMedia . '_url']))
                $this->socialmedia[$idSocialMedia]["url"] = $instance[$idSocialMedia . '_url'];
        }
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Títol:</label> 
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('mida'); ?>">Mida de la icona:</label><br> 
                <select id="<?php echo $this->get_field_id('mida'); ?>" name="<?php echo $this->get_field_name('mida'); ?>">
                <option value="fa-2x" <?php echo ($mida=='fa-2x' ? 'selected':''); ?>>petit</option>
                <option value="fa-2-5x" <?php echo ($mida=='fa-2-5x' ? 'selected':''); ?>>normal</option>
                <option value="fa-3x" <?php echo ($mida=='fa-3x' ? 'selected':''); ?>>gran</option>
                </select>       
              </p>

            <label>Defineix les teves xarxes i canals multimèdia: </label><br> 

            <?php foreach ($this->socialmedia as $idSocialMedia => $nomSocialMedia) { ?>
                   <p>
                    <label for="<?php echo $this->get_field_id($idSocialMedia); ?>"><?php echo $nomSocialMedia['nom']; ?><br>
                    <input class="widefat" id="<?php echo $this->get_field_id($idSocialMedia); ?>_url" name="<?php echo $this->get_field_name($idSocialMedia . "_url"); ?>" type="text" value="<?php echo esc_attr($nomSocialMedia['url']); ?>">  
                    </label>
                    </p>
           <?php } 
    }

    // Sanitize and return the safe form values
    public function update( $new_instance, $old_instance ) {
        $instance = array();
      	$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['mida'] = ( !empty( $new_instance['mida'] ) ) ? strip_tags( $new_instance['mida'] ) : '';
    	foreach ( $this->socialmedia as $idSocialMedia=>$nomSocialMedia ) {         	
    		$instance[$idSocialMedia."_url"] = ( !empty( $new_instance[$idSocialMedia."_url"] ) ) ? strip_tags( $new_instance[$idSocialMedia."_url"] ):'';
        }
      	return $instance;
    }
    
}
 
// Register widget
add_action( 'widgets_init', function(){
     register_widget( 'socialmedia_widget' );
});
?>