<?php

class Logo_Centre_Widget extends WP_Widget {

    // Create widget
    public function __construct() {
        parent::__construct(
            'logo_centre_widget', // Base ID
            'Logotip', // Name
            array( 'description' => 'Mostra el logotip del centre. Per pujar la imatge, aneu a Aparença->Personalitza->Identificació de centre') 
      		  );
    }
 
    // Front-End Display of the Widget
    public function widget( $args, $instance ) {
    	
        // Saved widget options
        $title   = $instance['title'];
        
        // Display information
	
        echo '<div class="widget logotip-widget block">';
    	if ( !empty( $title ) ) {
		echo '<h4 class="widget-title">' . $title . '</h4>';
    	}       
        
        //TODO: cambiar check logo imagen por check info centre
        if ( reactor_option('logo_image') ) { ?>
            
    	<div class="targeta_id_centre row">
            
               <?php if ( reactor_option('logo_image') ) { ?>
               
                <div class="large-6 small-12 columns">
		<!--<div style="float:left">-->
                   <img id='img-logo' src="<?php echo reactor_option('logo_image'); ?>">
                </div>

                <div class="text-info-centre large-6 small-12 columns">
		  
		<?php $adreca=explode(" ",reactor_option('cpCentre')); ?>

		
		<!--<div class="vcard hide-for-small">-->
		<div class="vcard  hide-for-small">
		  <span id="tar-nomCentre"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) );?></span>
		  <div class="adr">
			<span class="street-address"><?php echo reactor_option('direccioCentre'); ?></span><br>
			<span class="postal-code"><?php echo trim($adreca[0]);?></span> 
			<span class="locality"><?php echo trim($adreca[1]);?></span>  
			<span  class="region" title="Catalunya">Catalunya</span>
		    	<span  class="country-name">Espanya</span>
 <div class="tel">
		   <span><?php echo reactor_option('telCentre'); ?></span>
		  </div>

<a id="tar-mapa" href="<?php echo reactor_option('googleMaps'); ?>">mapa</a> <span style="color:#bbb;font-size:0.8em;margin:0 5px" >|</span> <a id="tar-contacte" href="<?php echo get_site_url(); ?>/contacte">contacte</a>
		  </div>

		 
		  <div> 
		  <a class="fn org url" href="<?php echo get_site_url(); ?>"> <?php echo esc_attr( get_bloginfo( 'name', 'display' ) );?>  </a>
		   <span style="display:none" class="email"><?php reactor_option('direccioCentre');?></span>
		  </div>
	</div>





  
		   
                </div>
            
            
            </div>
               <?php } ?>
           
	<?php }else{
	   echo "<div style='color:silver;border:1px solid silver;padding:10px;'>No hi informaci&oacute; de centre definida a 'Identificaci&ocute; de centre'.<a href='wp-admin/customize.php'>Definir informaci&oacute;</div>";
 	}
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
