<?php
class XTEC_Widget extends WP_Widget {
    
        
	public $recursos = array( 
	'xtec'=>	array('nom'=>"XTEC",'url'=>'http://xtec.cat','img'=>'xtec-icon.png',desc=>'Recursos educatius'),  
	'edu365'=>array('nom'=>"Edu365",'url'=>'http://edu365.cat','img'=>'edu365-icon.png', desc=>'Recursos educatius'),
	'edu3'=>array('nom'=>"Edu3",'url'=>'http://edu3.cat','img'=>'edu3-icon.png',desc=>'Videos educatius'),
	'xarxa-docent'=>array('nom'=>"Xarxa Docent",'url'=>'http://educat.xtec.cat','img'=>'',desc=>'Xarxa de support amb ms de 10.000 docents inscrits'), 
	'alexandria'=>array('nom'=>"Alexandria",'url'=>'http://alexandria.xtec.cat','img'=>'alexandria-icon.png',desc=>'Cursos moodle i activitats PDI per descarregar'), 
	'linkat'=>array('nom'=>"Linkat",'url'=>'http://linkat.xtec.cat/','img'=>'linkat-icon.png',desc=>'Linux pels centres educatius'),
	'jclic'=>	array('nom'=>"JClic",'url'=>'http://clic.xtec.cat/ca/jclic/','img'=>'jclic-icon.png',desc=>'Activitats jClic'), 
	'merli'=>	array('nom'=>"Merlí",'url'=>'http://aplitic.xtec.cat/merli','img'=>'',desc=>'Catàleg de recursos XTEC'),
	'arc'=>	array('nom'=>"ARC",'url'=>'http://apliense.xtec.cat/arc/','img'=>'',desc=>'Aplicació de recursos al Currículum'), 
	'odissea'=>array('nom'=>"Odissea",'url'=>'http://odissea.xtec.cat','img'=>'',desc=>'Moodle de formació pel docents'),
	'ampa'=>array('nom'=>"AMPA",'url'=>'','img'=>'ampa-icon',desc=>'La nostra associació de Pares d\'alumnes'),
	'escola-verda'=>array('nom'=>"Escola verda",'url'=>'','img'=>'escola-verda-icon.png',desc=>'Escola verda'),
	'som-escola'=>array('nom'=>"Som Escola",'url'=>'','img'=>'som-escola-icon.png',desc=>'Escola en català'),
	'internet-segura'=>array('nom'=>"Internet Segura",'url'=>'http://www.xtec.cat/web/recursos/tecinformacio/internet_segura','img'=>'internet-segura-icon.png',desc=>'Recursos per utilitzar Internet de manera segura')

	);

	public $recursosXtec = array('xtec','edu365','edu3','xarxa-docent','alexandria','linkat','jclic','merli','arc','odissea','internet-segura');

 
    // Create widget
    public function __construct() {
        parent::__construct(
            'xtec_widget', // Base ID
            'Enllaços Educatius', // Name
            array( 'description' => 'Enllaços a portals, recursos i serveis de la Xarxa Telemàtica Educativa de Catalunya (XTEC)') 
      		  );
    }
 
    // Front-End Display of the Widget
    public function widget( $args, $instance ) {
    	
        // Saved widget options
        $title   = $instance['title'];
        
        // Display information
        echo '<div class="my-widget block" >';
            if ( !empty( $title ) ) {
            	echo '<h4 class="widget-title">' . $title . '</h4>';
            }         
             foreach ( $this->recursos as $idRecurs=>$nomRecurs ) { 
             	$idRecurs= $instance[$idRecurs];	
             	if ( !empty( $idRecurs ) ) {
             		echo "<a target='_blank' title=\"".$nomRecurs['nom']."\" href=\"".$nomRecurs['url']."\"><img class=\"iconedu\" src=\"".get_bloginfo('template_directory')."-primaria-1/custom-tac/imatges/".$nomRecurs['img']."\"></a>";
             }       
            }  
            echo '</div>';
    	}
 
    // Back-end form of the Widget
    public function form( $instance ) {
        // Check for values
        if ( isset( $instance[ 'title' ] ) ) {
            	$title = $instance[ 'title' ]; 
        } else {
		$title = "Enllaços educatius";
		}
	    
    	?>
    
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Títol:</label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
 
            <label>Tria enllaços:</label><br> 
                       
            <?php
                      
            foreach ( $this->recursos as $idRecurs=>$nomRecurs ) { ?>
               <p>
    			<input class="checkbox" type="checkbox" <?php checked( $instance[$idRecurs], 'on' ); ?> id="<?php echo $this->get_field_id( $idRecurs ); ?>" name="<?php echo $this->get_field_name( $idRecurs ); ?>" /> 
    <label for="<?php echo $this->get_field_id( $idRecurs ); ?>"><?php echo "<strong>".$nomRecurs['nom']."</strong> (".$nomRecurs['desc'].") <a target='_blank' href=\"".$nomRecurs['url']."\">>></a>";?><br>
			<?php if (!in_array($idRecurs,$this->recursosXtec)){ ?>
				Adreça web:
				<?php
				echo "<input class=widefat id='".$idRecurs."_url' name='".$idRecurs."_url' type='text' value='".esc_attr($nomRecurs['url'])."'>"; ?>  
			<?php } ?>
	</label>
	</p>
            <?php }?>
  <?php 
    }
 
    // Sanitize and return the safe form values
    public function update( $new_instance, $old_instance ) {
    	
    	$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    	
    	foreach ( $this->recursos as $idRecurs=>$nomRecurs ) {         	
    		$instance[$idRecurs] = ( !empty( $new_instance[$idRecurs] ) ) ? strip_tags( $new_instance[$idRecurs] ) : '';
       	}
       	
       	/*$instance['ampa_url'] = ( !empty( $new_instance['ampa_url'] ) ) ? strip_tags( $new_instance['ampa_url'] ) : '';
       	$instance['escola-verda_url'] = ( !empty( $new_instance['escola-verda_url'] ) ) ? strip_tags( $new_instance['escola-verda_url'] ) : '';
       	$instance['som-escola_url'] = ( !empty( $new_instance['som-escola_url'] ) ) ? strip_tags( $new_instance['som-escola_url'] ) : '';
       	*/
       	
    	return $instance;
    }
}
 
// Register widget
add_action( 'widgets_init', function(){
     register_widget( 'xtec_widget' );
});

 
?>
