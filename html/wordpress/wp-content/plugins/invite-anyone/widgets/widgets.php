<?php
/* Invite Anyone widgets */

function invite_anyone_add_widget_css() {
	global $bp;
	
	$style_url = WP_PLUGIN_URL . '/invite-anyone/widgets/widgets-css.css';
	$style_file = WP_PLUGIN_DIR . '/invite-anyone/widgets/widgets-css.css';
	if (file_exists($style_file)) {
		wp_register_style('invite-anyone-widget-style', $style_url);
		wp_enqueue_style('invite-anyone-widget-style');
	}
    
}

class InviteAnyoneWidget extends WP_Widget {
    /** constructor */
    function InviteAnyoneWidget() {
    	$widget_ops = array( 'classname' => 'invite-anyone', 'description' => 'Invite Anyone widget' );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'invite-anyone-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'invite-anyone-widget', 'Invite Anyone', $widget_ops, $control_ops );
		
		if ( is_active_widget( false, false, $this->id_base ) )
			wp_enqueue_style( 'invite-anyone-widget-style', WP_PLUGIN_URL . '/invite-anyone/widgets/widgets-css.css' );
		
	}

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
    	global $bp;
        extract( $args );
                
        if ( !$title = apply_filters('widget_title', $instance['title'] ) )
        	$title = __( 'Invite Anyone', 'bp-invite-anyone' );
         
        if ( !$instruction_text = esc_attr( $instance['instruction_text'] ) )
        	$instruction_text = __( 'Enter one email address per line to invite friends to join this site.', 'bp-invite-anyone' );
        ?>
        
        <?php /* Non-logged-in and unauthorized users should not see the widget */ ?>
        <?php if ( invite_anyone_access_test() && $bp->current_component != $bp->invite_anyone->slug ) : ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
					
				<p><?php echo $instruction_text ?></p>
				
				<form class="standard-form" action="<?php echo bp_loggedin_user_domain() . $bp->invite_anyone->slug ?>" method="post">
				
				<?php invite_anyone_email_fields() ?>
				
				<?php /* If we're on a group page, send the group_id as well */ ?>
				<?php if ( bp_is_group() ) : ?>
					<?php global $bp;  ?>
					<input type="hidden" name="invite_anyone_widget_group" id="invite_anyone_widget_group" value="<?php echo $bp->groups->current_group->id ?>" />
				<?php endif; ?>
				
				<input type="hidden" name="invite_anyone_widget" id="invite_anyone_widget" value="1" />
				
				<?php do_action( 'invite_anyone_after_addresses' ) ?>
				
				<?php wp_nonce_field( 'invite-anyone-widget_' . $bp->loggedin_user->id ) ?> 
				<p id="invite-anyone-widget-submit" >
					<input class="button" type="submit" value="<?php _e( 'Continue', 'bp-invite-anyone' ) ?>" />
				</p>
				</form>
					
              <?php echo $after_widget; ?>
        <?php endif; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
    	
        if ( !$title = esc_attr($instance['title']) )
        	$title = __( 'Invite Anyone', 'bp-invite-anyone' );
        
        if ( !$email_fields = (int)$instance['email_fields'] )
        	$email_fields = 3;
        	
        if ( !$instruction_text = esc_attr( $instance['instruction_text'] ) )
        	$instruction_text = __( 'Invite friends to join the site by entering their email addresses below.', 'bp-invite-anyone' );
        	
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
           
            <p><label for="<?php echo $this->get_field_id('instruction_text'); ?>"><?php _e( 'Text to display in widget:', 'bp-invite-anyone' ); ?> 
            <textarea class="widefat" id="<?php echo $this->get_field_id('instruction_text'); ?>" name="<?php echo $this->get_field_name('instruction_text'); ?>"><?php echo $instruction_text; ?></textarea>
            </label></p>
           
            <p><label for="<?php echo $this->get_field_id('email_fields'); ?>"><?php _e( 'Number of email fields to display in widget:', 'bp-invite-anyone' ); ?> <input class="widefat" id="<?php echo $this->get_field_id('email_fields'); ?>" name="<?php echo $this->get_field_name('email_fields'); ?>" type="text" value="<?php echo $email_fields; ?>" /></label></p>
            
        <?php 
    }

} // class FooWidget

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("InviteAnyoneWidget");'));

?>