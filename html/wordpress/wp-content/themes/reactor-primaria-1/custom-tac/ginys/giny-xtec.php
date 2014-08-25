<?php
class XTEC_Widget extends WP_Widget {
	
	public $recursos = array( 
	'xtec'=>	array('nom'=>"XTEC",'url'=>'http://xtec.cat','img'=>'http://xerloc.skills.cat/images/xtec.png',desc=>'Recursos educatius'),  
	'edu365'=>array('nom'=>"Edu365",'url'=>'http://edu365.cat','img'=>'http://xerloc.skills.cat/images/edu365.png', desc=>'Recursos educatius'),
	'edu3'=>array('nom'=>"Edu3",'url'=>'http://edu3.cat','img'=>'http://xerloc.skills.cat/images/edu3.png',desc=>'Videos educatius'),
	'xarxa-docent'=>array('nom'=>"Xarxa Docent",'url'=>'http://educat.xtec.cat','img'=>'',desc=>'Xarxa de support amb més de 10.000 docents inscrits'), 
	'alexandria'=>array('nom'=>"Alexandria",'url'=>'http://alexandria.xtec.cat','img'=>'http://xerloc.skills.cat/images/alexandria.png',desc=>'Cursos moodle i activitats PDI per descarregar'), 
	'linkat'=>array('nom'=>"Linkat",'url'=>'http://linkat.xtec.cat/','img'=>'',desc=>'Linux pels centres educatius'),
	'jclic'=>	array('nom'=>"JClic",'url'=>'http://clic.xtec.cat/ca/jclic/','img'=>'http://xerloc.skills.cat/images/jclic.png',desc=>'Activitats jClic'), 
	'merli'=>	array('nom'=>"Merlí",'url'=>'http://aplitic.xtec.cat/merli','img'=>'http://xerloc.skills.cat/images/merli.png',desc=>'Catàleg de recursos XTEC'),
	'arc'=>	array('nom'=>"ARC",'url'=>'http://apliense.xtec.cat/arc/','img'=>'http://xerloc.skills.cat/images/arc.png',desc=>'Aplicació de recursos al Currículum'), 
	'odissea'=>array('nom'=>"Odissea",'url'=>'http://odissea.xtec.cat','img'=>'',desc=>'Moodle de formació pel docents'),
	'ampa'=>array('nom'=>"AMPA",'url'=>'','img'=>'',desc=>'La nostra associació de Pares d\'alumnes'),
	'escola-verda'=>array('nom'=>"Escola verda",'url'=>'','img'=>'',desc=>'Escola verda'),
	'sos-educacio'=>array('nom'=>"SOS Educacio",'url'=>'','img'=>'',desc=>'Prou retallades, per l\'ensenyament públic')
	);

	public $recursosXtec = array('xtec','edu365','edu3','xarxa-docent','alexandria','linkat','jclic','merli','arc','odissea');

 
    // Create widget
    public function __construct() {
        parent::__construct(
            'xtec_widget', // Base ID
            'Enllaços XTEC', // Name
            array( 'description' => 'Enllaços a portals, recursos i serveis de la Xarxa Telemàtica Educativa de Catalunya (XTEC)') 
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
             		echo "<a target='_blank' title=\"".$nomRecurs['nom']."\" href=\"".$nomRecurs['url']."\"><img style='width:150px' src=\"".$nomRecurs['img']."\"></a><br>";
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
		$title = "XTEC";
		}
	    
    	?>
    
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Títol:</label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
 
            <label>Tria enllaços:</label><br> 
                       
            <?php
                      
            foreach ( $this->recursos as $idRecurs=>$nomRecurs ) { ?>
               <p>
    			<input class="checkbox" type="checkbox" <?php checked( $instance[$idRecurs], 'on' ); ?> id="<?php echo $this->get_field_id( $idRecurs ); ?>" name="<?php echo $this->get_field_name( $idRecurs ); ?>" /> 
    <label for="<?php echo $this->get_field_id( $idRecurs ); ?>"><?php echo "<strong>".$nomRecurs['nom']."</strong> (".$nomRecurs['desc'].") <a target='_blank' href=\"".$nomRecurs['url']."\">>></a>";?><br>
			<?php if (!in_array($idRecurs,$this->recursosXtec)){ ?>
				Adreça web:<input type="text">
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
    	return $instance;
    }
}
 
// Register widget
add_action( 'widgets_init', function(){
     register_widget( 'xtec_widget' );
});

 
?>
