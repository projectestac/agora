<?php

/***************************************************************/
/* Display a single Image banner */
/***************************************************************/

class Exray_Banner_Widget extends WP_Widget{
    //Init Widget
    public function __construct(){
        parent::__construct(
            'exray_banner_widget',
            'Custom Widget: Image Banner ',
            array('description' => __(' Display a single Image banner','exray-framework'))
        );
    }

    // Out put Widget Option to the Back-end
    public function  form($instance) {
        $defautls = array(
            'title' => __('Banner', 'exray-framework'),
            'ad_img' => 'http://lorempixel.com/300/250',
            'ad_link' => home_url(),
            'ad_width' => '300px',
            'ad_height' => '250px'
        );

        $instance = wp_parse_args((array) $instance, $defautls);
        ?>
			
			<!-- Ad Title  -->
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'exray-framework'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
			
			<!-- Ad Image -->
            <p>
                <label for="<?php echo $this->get_field_id('ad_img'); ?>"><?php _e('Image URL', 'exray-framework'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('ad_img'); ?>" name="<?php echo $this->get_field_name('ad_img'); ?>" class="widefat" value="<?php echo esc_attr($instance['ad_img']); ?>" />
            </p>

			<!-- Ad Link -->
            <p>
                <label for="<?php echo $this->get_field_id('ad_link'); ?>"><?php _e('Image Link', 'exray-framework'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id('ad_link'); ?>" name="<?php echo $this->get_field_name('ad_link'); ?>" class="widefat" value="<?php echo esc_attr($instance['ad_link']); ?>" />
            </p>

            <!-- Ad Width -->
            <p>
                <label for="<?php echo $this->get_field_id('ad_width'); ?>"><?php _e('Width', 'exray-framework'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id('ad_width'); ?>" name="<?php echo $this->get_field_name('ad_width'); ?>" class="widefat" value="<?php echo esc_attr($instance['ad_width']); ?>" />
            </p>

            <!-- Ad Height -->
            <p>
                <label for="<?php echo $this->get_field_id('ad_height'); ?>"><?php _e('Height', 'exray-framework'); ?></label>
                <input type="text" id="<?php echo $this->get_field_id('ad_height'); ?>" name="<?php echo $this->get_field_name('ad_height'); ?>" class="widefat" value="<?php echo esc_attr($instance['ad_height']); ?>" />
            </p>

        <?php
    }

    //Process widget options for saving
    public function  update($new_instance, $old_instance) {
    	$instance = $old_instance;

        //Title
        $instance['title'] = strip_tags($new_instance['title']);

        //Ad
        $instance['ad_img'] =strip_tags($new_instance['ad_img']);

        //Link
        $instance['ad_link'] =strip_tags($new_instance['ad_link']);

         //width
        $instance['ad_width'] =strip_tags($new_instance['ad_width']);

         //height
        $instance['ad_height'] =strip_tags($new_instance['ad_height']);

        return $instance;
    }

    // Displays widget on the Front-end
    public function  widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget-title', $instance['title']);

        $ad_img = $instance['ad_img'];
        $ad_link = $instance['ad_link'];
        $ad_width = $instance['ad_width'];
        $ad_height = $instance['ad_height'];

        echo $before_widget;

        if($title){
            echo $before_title . $title . $after_title;
        }

       echo ' <ul class="ads-block">';

       if($ad_img): ?>
            <li>
                <figure>
                    <a href="<?php echo $ad_link; ?>">
                    <img src="<?php echo $ad_img; ?>" alt="banner" width="<?php echo $ad_width; ?>" height="<?php echo $ad_height; ?>" style="width: <?php echo $ad_width; ?>; height: <?php echo $ad_height; ?>;" />
                    </a>
                </figure>
           </li>

       <?php endif;
       echo '</ul>';

       echo $after_widget;
    }
}

add_action( 'widgets_init', create_function( '', 'register_widget("Exray_Banner_Widget");' ) );

?>