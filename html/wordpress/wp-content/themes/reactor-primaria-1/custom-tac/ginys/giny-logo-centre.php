<?php

class Logo_Centre_Widget extends WP_Widget {

    // Create widget
    public function __construct() {
        parent::__construct(
            'logo_centre_widget', // Base ID
            'Fitxa del centre', // Name
            array( 'description' => 'Mostra les dades i, opcionalment, el logotip del centre. La informació es defineix a Aparença -> Personalitza -> Identificació del centre') 
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
        
        if ( reactor_option('nomCanonicCentre') ) { 
		$contacte=(strstr(reactor_option('emailCentre'),'@'))?"mailto:".reactor_option('emailCentre'):reactor_option('emailCentre');
	?>

	<div class="targeta_id_centre row">

		<?php if ( reactor_option('logo_image')) {
                        if ( reactor_option('logo_inline')){
                            $class="logo_inline";
                            $amplada="6";
                        } else{
                            $class="logo_clear";
                            $amplada="12";
                        }
		?>
			<div class="<?php reactor_columns(array( $amplada, 12 )); echo " ".$class;?>"> 
				<img src="<?php echo reactor_option('logo_image'); ?>">					
			</div> 
            
		<?php }else { 
                            $amplada="12"; 
                            $class="no_logo";
                        } ?>
            
                <?php $addr=explode(" ",reactor_option("cpCentre"),1);?>
            
		<div class="<?php reactor_columns( $amplada ); echo " ".$class; ?> ">
			<div class="vcard  hide-for-small">
		  		<span id="tar-nomCentre"><?php echo reactor_option('nomCanonicCentre'); ?></span>
		  		<div class="adr">
					<span class="street-address"><?php echo reactor_option('direccioCentre'); ?></span><br>
					<span class="postal-code"><?php echo trim($addr[0]);?></span> 
					<span class="locality"><?php echo trim($addr[1]);?></span>  
					<span  class="region" title="Catalunya">Catalunya</span>
				    	<span  class="country-name">Espanya</span>
 					<div class="tel">
						<span><?php echo reactor_option('telCentre'); ?></span>
					</div>
					<a id="tar-mapa" href="<?php echo reactor_option('googleMaps'); ?>">mapa</a> 
					<span style="color:#bbb;font-size:0.8em;margin:0 5px" >|</span> 
					<a id="tar-contacte" href="<?php echo $contacte;?>">contacte</a>
		  		</div>		 
			</div>	
		 </div>		 
	</div>	
	
  	</div>	
    	
<?php }  //end if nomCanonicCentre

} //end  function widget

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
