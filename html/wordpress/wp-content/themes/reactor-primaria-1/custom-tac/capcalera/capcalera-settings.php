<?php

/*************************************************************
Capçalera settings form
**************************************************************/


class graellaIcones
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_theme_page(
            'Settings Admin', 
            'Capçalera', 
            'manage_options', 
            'my-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
    	
	 	
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap row">
            <div style="float:left;margin-right:30px;">
	         <?php screen_icon(); ?>
            <h2>Capçalera</h2> 
            
            <div style="width:500px">
            <li>Per definir el <strong>nom del centre</strong> i <strong>la descripció</strong> vés a <code>Aparença -> Personalitza -> Identificació del centre</code>.
            <li>Per definir les fotos de capçalera crea una presentació de diapositives, copia l'identificador i enganxa'l al camp <code>Diapositives capçalera (id)</code> del apartat <code>Aparença -> Personalitza -> Identificació del centre </code> 
            </div>
	                      
	            <form method="post" action="options.php">
	            
	            <?php
	                // This prints out all hidden setting fields
	                settings_fields( 'my_option_group' );   
	                do_settings_sections( 'my-setting-admin' );
	                submit_button(); 
	            ?>
	            </form>
   			</div>
   			   			
	   		<div style="float:right;padding:10px;border-left:1px solid silver;">	
	   			<h3>Icones disponibles</h3>
	   			<p>Copia el nom de la icona i enganxa'l a la posició desitjada.</p>
	   			<div style="float:left;margin-right:10px">
	   			
	   			<?php 
	   			// $dashicons1 =array (icones...), dashicons2, dashicons3
				include "dashicons.php";  
				?>
	   			
	   			<?php
	            foreach ($dashicons1 as $icon){
	            	echo "<div> <span class=\"dashicons $icon\"></span> ".str_replace("dashicons-","",$icon)." </div>";
	            }
				?>
	   			</div>
	   			
	   			<div style="float:left;margin-right:10px">
	   			<?php 
	            foreach ($dashicons2 as $icon){
	            	echo "<div> <span class=\"dashicons $icon\"></span> ".str_replace("dashicons-","",$icon)." </div>";
	            }
				?>
	   			</div>
	   			
	   			<div style="float:left;margin-right:10px">
	   			<?php 
	            foreach ($dashicons3 as $icon){
	            	echo "<div> <span class=\"dashicons $icon\"></span> ".str_replace("dashicons-","",$icon)." </div>";
	            }
				?>
	   			</div>
   			
   			</div>
   			
        </div>
      <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );
        
	// Fila1
	
        add_settings_section(
            'setting_icons_fila1', // ID
            'Icones a la fila 1', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  
        
        // Icon 11
		add_settings_field(
            'title_icon11', // ID
            'Element 1:', // Title 
            array( $this, 'title_icon11_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila1' // Section           
        ); 

        add_settings_field(
            'icon11', // ID
            'Icona:', // Title 
            array( $this, 'icon11_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila1' // Section           
        ); 
        add_settings_field(
            'link_icon11', // ID
            'Enllaç:', // Title 
            array( $this, 'link_icon11_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila1' // Section           
        ); 
         add_settings_field(
            'separador11', // ID
            '<hr>', // Title 
            array( $this, 'sep_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila1' // Section           
        );
 	
        // Icon 12  
		add_settings_field(
            'title_icon12', // ID
            'Element 2:', // Title 
            array( $this, 'title_icon12_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila1' // Section           
        );    
		add_settings_field(
            'icon12', // ID
            'Icona:', // Title 
            array( $this, 'icon12_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila1' // Section           
        );    
        add_settings_field(
            'link_icon12', // ID
            'Enllaç:', // Title 
            array( $this, 'link_icon12_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila1' // Section           
        ); 
        
        add_settings_field(
            'separador12', // ID
            '<hr>', // Title 
            array( $this, 'sep_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila1' // Section           
        );
	
       // Icon 13  
	/*
		add_settings_field(
	            'title_icon13', // ID
	            'Element 3:', // Title 
	            array( $this, 'title_icon13_callback' ), // Callback
	            'my-setting-admin', // Page
	            'setting_icons_fila1' // Section           
	        );  
		add_settings_field(
	            'icon13', // ID
	            'Icona:', // Title 
	            array( $this, 'icon13_callback' ), // Callback
	            'my-setting-admin', // Page
	            'setting_icons_fila1' // Section           
	        ); 

        add_settings_field(
            'link_icon13', // ID
            'Enllaç:', // Title 
            array( $this, 'link_icon13_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila1' // Section           
        ); 
       */
        
       	// Fila2 
       	add_settings_section(
            'setting_icons_fila2', // ID
            'Icones a la fila 2', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );
   	
   	
		// Icon 21	
		add_settings_field(
            'title_icon21', // ID
            'Element 1:', // Title 
            array( $this, 'title_icon21_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila2' // Section           
        );      

        add_settings_field(
            'icon21', // ID
            'Icona:', // Title 
            array( $this, 'icon21_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila2' // Section           
        ); 
        
        add_settings_field(
            'link_icon21', // ID
            'Enllaç:', // Title 
            array( $this, 'link_icon21_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila2' // Section           
        ); 
  		add_settings_field(
            'separador21', // ID
            '<hr>', // Title 
            array( $this, 'sep_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila2' // Section           
        );
        
	// Icon 22
	add_settings_field(
            'title_icon22', // ID
            'Element 2:', // Title 
            array( $this, 'title_icon22_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila2' // Section           
        ); 

	add_settings_field(
            'icon22', // ID
            'Icona:', // Title 
            array( $this, 'icon22_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila2' // Section           
        );    
        
        add_settings_field(
            'link_icon22', // ID
            'Enllaç:', // Title 
            array( $this, 'link_icon22_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila2' // Section           
        ); 
        
        add_settings_field(
          'separador22', // ID
          '<hr>', // Title 
          array( $this, 'sep_callback' ), // Callback
          'my-setting-admin', // Page
          'setting_icons_fila2' // Section           
        );
	
	// Icon 23
	/*
	add_settings_field(
            'title_icon23', // ID
            'Element 3:', // Title 
            array( $this, 'title_icon23_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila2' // Section           
        ); 
	add_settings_field(
            'icon23', // ID
            'Icona:', // Title 
            array( $this, 'icon23_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila2' // Section           
        );      
        add_settings_field(
            'link_icon23', // ID
            'Enllaç:', // Title 
            array( $this, 'link_icon23_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_icons_fila2' // Section           
        ); 
	*/
	
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();

        if( isset( $input['icon11'] ) )
            $new_input['icon11'] = sanitize_text_field( $input['icon11'] );
        if( isset( $input['link_icon11'] ) )
            $new_input['link_icon11'] = sanitize_text_field( $input['link_icon11'] );
 	if( isset( $input['title_icon11'] ) )
            $new_input['title_icon11'] = sanitize_text_field( $input['title_icon11'] );
	
        if( isset( $input['icon12'] ) )
            $new_input['icon12'] = sanitize_text_field( $input['icon12'] );
	if( isset( $input['link_icon12'] ) )
            $new_input['link_icon12'] = sanitize_text_field( $input['link_icon12'] );
 	if( isset( $input['title_icon12'] ) )
            $new_input['title_icon12'] = sanitize_text_field( $input['title_icon12'] );

	if( isset( $input['icon13'] ) )
    		$new_input['icon13'] = sanitize_text_field( $input['icon13'] );
	if( isset( $input['link_icon13'] ) )
            $new_input['link_icon13'] = sanitize_text_field( $input['link_icon13'] );
 	if( isset( $input['title_icon13'] ) )
            $new_input['title_icon13'] = sanitize_text_field( $input['title_icon13'] );

	if( isset( $input['icon21'] ) )
    		$new_input['icon21'] = sanitize_text_field( $input['icon21'] );
	if( isset( $input['link_icon21'] ) )
            $new_input['link_icon21'] = sanitize_text_field( $input['link_icon21'] );
 	if( isset( $input['title_icon21'] ) )
            $new_input['title_icon21'] = sanitize_text_field( $input['title_icon21'] );

	if( isset( $input['icon22'] ) )
    		$new_input['icon22'] = sanitize_text_field( $input['icon22'] );
	if( isset( $input['link_icon22'] ) )
            $new_input['link_icon22'] = sanitize_text_field( $input['link_icon22'] );
 	if( isset( $input['title_icon22'] ) )
            $new_input['title_icon22'] = sanitize_text_field( $input['title_icon22'] );

	if( isset( $input['icon23'] ) )
    		$new_input['icon23'] = sanitize_text_field( $input['icon23'] );
	if( isset( $input['link_icon23'] ) )
            $new_input['link_icon23'] = sanitize_text_field( $input['link_icon23'] );
 	if( isset( $input['title_icon23'] ) )
            $new_input['title_icon23'] = sanitize_text_field( $input['title_icon23'] );


        /*if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );*/

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_separador()
    {
        print '<hr>';
    }
 
     
    public function print_section_info()
    {
        print '<hr>';
    }

    /** 
     * Get the settings option array and print one of its values
     */
     public function sep_callback()
    {
       //Nothing    
    }

    public function icon11_callback()
    {
        printf(
            '<input type="text" id="icon11" name="my_option_name[icon11]" value="%s" /><div class="dashicons dashicons-%s"></div>',
            isset( $this->options['icon11'] ) ? esc_attr( $this->options['icon11']) : '',isset( $this->options['icon11'] ) ? esc_attr( $this->options['icon11']) : ''
        );
    }
    
    public function link_icon11_callback()
    {
        printf(
            '<input type="text" id="link_icon11" name="my_option_name[link_icon11]" value="%s" />',
            isset( $this->options['link_icon11'] ) ? esc_attr( $this->options['link_icon11']) : ''        
        );
    }

    public function title_icon11_callback()
    {
        printf(
            '<input type="text" id="title_icon11" name="my_option_name[title_icon11]" value="%s" />',
            isset( $this->options['title_icon11'] ) ? esc_attr( $this->options['title_icon11']) : ''        
        );
    }	

    
    public function icon12_callback()
    {
        printf(
            '<input type="text" id="icon12" name="my_option_name[icon12]" value="%s" /><div class="dashicons dashicons-%s"></div>',
            isset( $this->options['icon12'] ) ? esc_attr( $this->options['icon12']) : '',isset( $this->options['icon12'] ) ? esc_attr( $this->options['icon12']) : ''
        );
    }
    
    public function link_icon12_callback()
    {
        printf(
            '<input type="text" id="link_icon12" name="my_option_name[link_icon12]" value="%s" />',
            isset( $this->options['link_icon12'] ) ? esc_attr( $this->options['link_icon12']) : ''        
        );
    }

    public function title_icon12_callback()
    {
        printf(
            '<input type="text" id="title_icon12" name="my_option_name[title_icon12]" value="%s" />',
            isset( $this->options['title_icon12'] ) ? esc_attr( $this->options['title_icon12']) : ''        
        );
    }	


	public function icon13_callback()
    {
        printf(
            '<input type="text" id="icon13" name="my_option_name[icon13]" value="%s" /><div class="dashicons dashicons-%s"></div>',
            isset( $this->options['icon13'] ) ? esc_attr( $this->options['icon13']) : '',isset( $this->options['icon13'] ) ? esc_attr( $this->options['icon13']) : ''
        );
    }

	public function link_icon13_callback()
    {
        printf(
            '<input type="text" id="link_icon13" name="my_option_name[link_icon13]" value="%s" />',
            isset( $this->options['link_icon13'] ) ? esc_attr( $this->options['link_icon13']) : ''        
        );
    }

    public function title_icon13_callback()
    {
        printf(
            '<input type="text" id="title_icon13" name="my_option_name[title_icon13]" value="%s" />',
            isset( $this->options['title_icon13'] ) ? esc_attr( $this->options['title_icon13']) : ''        
        );
    }		

    
    public function icon21_callback()
    {
        printf(
            '<input type="text" id="icon21" name="my_option_name[icon21]" value="%s" /><div class="dashicons dashicons-%s"></div>',
            isset( $this->options['icon21'] ) ? esc_attr( $this->options['icon21']) : '',isset( $this->options['icon21'] ) ? esc_attr( $this->options['icon21']) : ''
        );
    }
    
    public function link_icon21_callback()
    {
        printf(
            '<input type="text" id="link_icon21" name="my_option_name[link_icon21]" value="%s" />',
            isset( $this->options['link_icon21'] ) ? esc_attr( $this->options['link_icon21']) : ''        
        );
    }

    public function title_icon21_callback()
    {
        printf(
            '<input type="text" id="title_icon21" name="my_option_name[title_icon21]" value="%s" />',
            isset( $this->options['title_icon21'] ) ? esc_attr( $this->options['title_icon21']) : ''        
        );
    }	

    
    public function icon22_callback()
    {
        printf(
            '<input type="text" id="icon22" name="my_option_name[icon22]" value="%s" /><div class="dashicons dashicons-%s"></div>',
            isset( $this->options['icon22'] ) ? esc_attr( $this->options['icon22']) : '',isset( $this->options['icon22'] ) ? esc_attr( $this->options['icon22']) : ''
        );
    }
    
    public function link_icon22_callback()
    {
        printf(
            '<input type="text" id="link_icon22" name="my_option_name[link_icon22]" value="%s" />',
            isset( $this->options['link_icon22'] ) ? esc_attr( $this->options['link_icon22']) : ''        
        );
    }

    public function title_icon22_callback()
    {
        printf(
            '<input type="text" id="title_icon22" name="my_option_name[title_icon22]" value="%s" />',
            isset( $this->options['title_icon22'] ) ? esc_attr( $this->options['title_icon22']) : ''        
        );
    }	

	public function icon23_callback()
    {
        printf(
            '<input type="text" id="icon23" name="my_option_name[icon23]" value="%s" /><div class="dashicons dashicons-%s"></div>',
            isset( $this->options['icon23'] ) ? esc_attr( $this->options['icon23']) : '',isset( $this->options['icon23'] ) ? esc_attr( $this->options['icon23']) : ''
        );
    }

	public function link_icon23_callback()
    {
        printf(
            '<input type="text" id="link_icon23" name="my_option_name[link_icon23]" value="%s" />',
            isset( $this->options['link_icon23'] ) ? esc_attr( $this->options['link_icon23']) : ''        
        );
    }
	public function title_icon23_callback()
    {
        printf(
            '<input type="text" id="title_icon23" name="my_option_name[title_icon23]" value="%s" />',
            isset( $this->options['title_icon23'] ) ? esc_attr( $this->options['title_icon23']) : ''        
        );
    }	
    
   }

if( is_admin() )
    $my_settings_page = new graellaIcones();

?>
