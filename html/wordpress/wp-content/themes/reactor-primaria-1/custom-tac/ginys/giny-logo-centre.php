<?php

class Logo_Centre_Widget extends WP_Widget {

    // Create widget
    public function __construct() {
        parent::__construct(
            'logo_centre_widget', // Base ID
            'Logotip', // Name
            array( 'description' => 'Mostra el logotip del centre. Per pujar la imatge, aneu a Aparença->Personalitza->General') 
      		  );
    }
 
    // Front-End Display of the Widget
    public function widget( $args, $instance ) {
    	
        // Saved widget options
        $title   = $instance['title'];
        
        // Display information
	
        echo '<div class="logotip-widget block">';
    	if ( !empty( $title ) ) {
		echo '<h4 class="widget-title">' . $title . '</h4>';
    	}       
  
        if ( reactor_option('logo_image') ) { 
	   echo "<img id='img-logo' src='".reactor_option('logo_image')."'>";
	}else{
	   echo "<div style='color:silver;border:1px solid silver;padding:10px;'>No hi cap logotip definit a 'Identificació de centre'.<a href='wp-admin/customize.php'>Definir logotip</div>";
 	}
	echo "<br><br>";
        echo '</div>';
    	
     }
 

    // Back-end form of the Widget
    public function form( $instance ) {

        // Check for values
        if ( isset( $instance[ 'title' ] ) ) {
            	$title = $instance[ 'title' ]; 
	}
        ?>
     	<p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>">Títol:</label> 
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
          
    <?php 
} 
    // Sanitize and return the safe form values
    public function update( $new_instance, $old_instance ) {
    	$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    	return $instance;
    }
}
 
// Register widget
   add_action( 'widgets_init', function(){
   register_widget( 'logo_centre_widget' );
});

 
?>
