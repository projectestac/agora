<?php 
/**
 * Reactor Theme Customizer
 * Add settings to the WP Theme Customizer
 * and generates custom CSS/JS from those settings
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @author Samuel Wood (Otto) (@Otto42 / ottopress.com)
 * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 * @since 1.0.0
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */
 
/**
 * Add Customizer generated CSS to header
 *
 * @since 1.0.0
 */

//TODO: canviar tots els contextes de idioma de "reactor" a "custom-tac"

/**
 * JavaScript handlers to make Theme Customizer preview reload changes asynchronously.
 * Credit: Twenty Twelve 1.0
 *
 * @since 1.0.0
 */
function reactor_customize_preview_js() {
	wp_enqueue_script('reactor-customizer', get_template_directory_uri() . '/library/inc/customizer/js/theme-customizer.js', array('customize-preview'), '', true );
}
add_action('customize_preview_init', 'reactor_customize_preview_js');

/**
 * Add CSS to the WP Theme Customizer page
 *
 * @since 1.0.0
 */
function reactor_customize_preview_css() {
	echo '
	<style type="text/css">
		.customize-control { margin-bottom:5px; }
		.customize-control-radio { padding:0; }
		.customize-control-checkbox label { line-height:20px; }
	</style>';
}
add_action('customize_controls_print_styles', 'reactor_customize_preview_css', 99);

/**
 * Register Customizer
 *
 * @author Samuel Wood (Otto) (@Otto42 / ottopress.com)
 * @link http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 * @since 1.0.0
 */
if ( !function_exists('reactor_customize_register') ) {
	add_action('customize_register', 'reactor_customize_register');

	function reactor_customize_register( $wp_customize ) {
		
		do_action('reactor_customize_register', $wp_customize);
		
		class WP_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
	 
			public function render_content() { ?>
				<label><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
                </label>
			<?php
			}
		}
		
		/**
		 * modified dropdown-pages 
		 * from wp-includes/class-wp-customize-control.php
		 *
		 * @since 1.0.0
		 */
		class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {
		public $type = 'dropdown-categories';	
		
			public function render_content() {
				$dropdown = wp_dropdown_categories( 
				array( 
					'name'             => '_customize-dropdown-categories-' . $this->id,
					'echo'             => 0,
					'hide_empty'       => false,
					'show_option_none' => '&mdash; ' . __('Select', 'reactor') . ' &mdash;',
					'hide_if_empty'    => false,
					'selected'         => $this->value(),
				 )
			 	);
	
				$dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );
	
				printf( 
					'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
					$this->label,
					$dropdown
				 );
			}
		}
				
		
		/**
		 * Remove default WP Customize sections
		 *
		 * @since 1.0.0
		 */
		$wp_customize->remove_section('title_tagline');
		$wp_customize->remove_section('colors');
		$wp_customize->remove_section('header_image');
		$wp_customize->remove_section('background_image');
		$wp_customize->remove_section('static_front_page');
		$wp_customize->remove_section('nav');
				
		/**
		 * setup customizer settings
		 *
		 * @since 1.0.0
		 */
		 
		// Capçalera
		$wp_customize->add_section('reactor_customizer_capcalera', array( 
			'title'    => __('Capçalera', 'custom_tac'),
			'priority' => 1,
		 ) );
		 
		 
			$wp_customize->add_setting('blogname', array( 
				'default'    => get_option('blogname'),
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );
				$wp_customize->add_control('blogname', array( 
					'label'    => __('Nom del centre', 'custom_tac'),
					'section'  => 'reactor_customizer_capcalera',
					'priority' => 1,
				 ) );
				 
			 $wp_customize->add_setting('reactor_options[tamany_font_nom]', array( 
				'default'        => '2.5em',
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-page-templates'
			 ) );
			 
			$wp_customize->add_control('reactor_options[tamany_font_nom]', array( 
				'label'   => __('Tamany de la lletra', 'custom_tac'),
				'section' => 'reactor_customizer_capcalera',
				'type'    => 'select',
				'choices' => array( 
					'1.6em' => "1",
					'1.7em' => "2",
					'1.8em' => "3",
					'1.9em' => "4",
					'2em' => "5",
					'2.1em' => "6",
					'2.2em' => "7",
					'2.3em' => "8",
					'2.4em' => "9",
					'2.5em' => "10",
				),
				'priority' => 2,
			 ) );
				 

			$wp_customize->add_setting('blogdescription', array( 
				'default'    => get_option('blogdescription'),
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );
				$wp_customize->add_control('blogdescription', array( 
					'label'    => __('Descripció / Lema', 'custom_tac'),
					'section'  => 'reactor_customizer_capcalera',
					'priority' => 3,
				 ) );

			$wp_customize->add_setting('reactor_options[imatge_capcalera]',array( 
				'default'    => "",
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 )  );

			$wp_customize->add_control( 
			    new WP_Customize_Image_Control(
				$wp_customize,'reactor_options[imatge_capcalera]',array(
				    'label' => __('Imatge de capçalera', 'custom_tac'),
				    'section' => 'reactor_customizer_capcalera',
				    'settings' => 'reactor_options[imatge_capcalera]',
				    'description'=> 'Si voleu carrusel, no definiu cap imatge aquí', //Funcionarà a WP4
				    'priority' => 4
				)
			    )
			);

			//Carrusel combo
			$args = array( 'posts_per_page'   => -1, 'post_type' => 'slideshow');
			$carrusels = get_posts($args);
			
			foreach ($carrusels as $carrusel){
				$aCarrusel[$carrusel->ID]=$carrusel->post_title;
			}	
						
			$wp_customize->add_setting('reactor_options[carrusel]', array( 
				'default'        => "",
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-fonts',
			 ) );
				$wp_customize->add_control('reactor_options[carrusel]', array( 
					'label'    => __('Carrusel (no aplica si hi ha una imatge de capçalera definida) ', 'reactor'),
					'description'=> 'No aplica si hi ha una imatge de capçalera definida)', //Funcionarà a WP4
					'section'  => 'reactor_customizer_capcalera',
					'type'     => 'select',
					'choices'  => $aCarrusel,
					'priority' => 5,
				 ) );

					
			// Graella d'icones
			class simpleHTML extends WP_Customize_Control {
			  public $type = 'simpleHTML';
			  public function render_content() {
			  ?>
			  <label>
			   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			   <a target="_blank" href="themes.php?page=my-setting-admin"> Aparença->Icones de capçalera </a>
			  </label>
			  <?php
			  }
			}

			$wp_customize->add_setting('icones_capcalera', array( 
				'default'    => "",
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );
				$wp_customize->add_control( new simpleHTML($wp_customize, 'icones_capcalera', array( 
					'label'    => __('Graella d\'icones', 'custom_tac'),
					'section'  => 'reactor_customizer_capcalera',
					'priority' => 6,
				 ) ));

			//Pestanya Identificació del centre
			$wp_customize->add_section('reactor_customizer_idcentre', array( 
				'title'    => __('Identificació del centre', 'custom_tac'),
				'priority' => 2,
			 ) );

			$wp_customize->add_setting('reactor_options[logo_image]', array( 
				'default'    => '',
				'type'       => 'option',
				'capability' => 'manage_options',
			 ) );
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'reactor_logo_image', array( 
					'label'    => __('Logotip', 'custom-tac'),
					'section'  => 'reactor_customizer_idcentre',
					'settings' => 'reactor_options[logo_image]',
					'priority' => 1,
				 ) ) );


			// Tornem a demanar el nom del centre perquè pot ser diferent (noms llargs)
			
			$wp_customize->add_setting('reactor_options[nomCanonicCentre]', array( 
				'default'    => "Nom del centre", /*agafar de BBDD agora*/
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );

				$wp_customize->add_control('reactor_options[nomCanonicCentre]', array( 
					'label'    => __('Nom del centre', 'reactor'),
					'section'  => 'reactor_customizer_idcentre',
					'priority' => 2,
				 ) );


			$wp_customize->add_setting('reactor_options[direccioCentre]', array( 
				'default'    => "C/Carrer 1", /*agafar de BBDD agora*/
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );

				$wp_customize->add_control('reactor_options[direccioCentre]', array( 
					'label'    => __('Adreça (física)', 'reactor'),
					'section'  => 'reactor_customizer_idcentre',
					'priority' => 2,
				 ) );

			$wp_customize->add_setting('reactor_options[cpCentre]', array( 
				'default'    => "00000 Localitat", /*agafar de BBDD agora*/
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );
				$wp_customize->add_control('reactor_options[cpCentre]', array( 
					'label'    => __('Codi postal i localitat', 'reactor'),
					'section'  => 'reactor_customizer_idcentre',
					'priority' => 3,
				 ) );

			$wp_customize->add_setting('reactor_options[telCentre]', array( 
				'default'    => "00 000 000", /*agafar de BBDD agora*/
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );
				$wp_customize->add_control('reactor_options[telCentre]', array( 
					'label'    => __('Telèfon', 'custom_tac'),
					'section'  => 'reactor_customizer_idcentre',
					'priority' => 4,
				 ) );

			$wp_customize->add_setting('reactor_options[googleMaps]', array( 
				'default'    => "", 
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );
				$wp_customize->add_control('reactor_options[googleMaps]', array( 
					'label'    => __('Mapa (adreça Google Maps)', 'custom_tac'),
					'section'  => 'reactor_customizer_idcentre',
					'priority' => 5,
				 ) );

			$wp_customize->add_setting('reactor_options[emailCentre]', array( 
				'default'    => "", 
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );
				$wp_customize->add_control('reactor_options[emailCentre]', array( 
					'label'    => __('Contacte principal (email) o pàgina de contacte', 'custom_tac'),
					'section'  => 'reactor_customizer_idcentre',
					'priority' => 6,
				 ) );
				 				 							
			$paletes=array(
						"vermell-taronja" => "Vermell i Taronja",
                        "vermell-verd"=>"Vermell i Verd",
                        "blau-vermell"=>"Vermell i Blau",
						"blaus"=>"Blau clar i Blau fosc",
						"groc-verd"=>"Groc i Verd",
                        "groc-lila"=>"Groc i Lila",
                        "taronja-verd"=>"Taronja i Verd",
                        "verd-rosa"=>"Rosa i Verd",
                        "rosa-gris"=>"Rosa i Gris"
                        );

			//TODO: crear secció colors, no reaprofitar fonts q&d :S
			$wp_customize->add_section('reactor_customizer_fonts', array( 
					'title'          => __('Colors', 'reactor'),
					'priority'       => 7,
					'theme_supports' => 'reactor-fonts',
				 ) );
				 
		 	$wp_customize->add_setting('reactor_options[paleta_colors]', array( 
				'default'        => "",
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-fonts',
			 ) );
				$wp_customize->add_control('reactor_options[paleta_colors]', array( 
					'label'    => __('Paleta', 'reactor'),
					'section'  => 'reactor_customizer_fonts',
					'type'     => 'radio',
					'choices'  => $paletes,
				 ) );
		 
			
		$templates = get_theme_support('reactor-page-templates');
		
		if ( !is_array( $templates[0] ) ) {
			$templates[0] = array();
		}
		
		// Front Page

		if ( in_array( 'front-page', $templates[0] ) ) {
		$wp_customize->add_section('frontpage_settings', array( 
			'title'          => __('Pàgina d\'inici', 'reactor'),
			'priority'       =>6,//=> 50,
			'theme_supports' => 'reactor-page-templates'
		 ) );

		$wp_customize->add_setting('reactor_options[frontpage_page]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-page-templates'
			 ) );

			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'reactor_options[frontpage_page]', array(
				'label'   => __( 'Pàgina d\'inici', 'theme-name' ),
				'section' => 'frontpage_settings',
				'type'    => 'dropdown-pages',
				'settings' => 'reactor_options[frontpage_page]',
				'priority' => 1,
			) ) );
			
		 
			$wp_customize->add_setting('reactor_options[frontpage_post_category]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-page-templates'
			 ) );
				$wp_customize->add_control( new WP_Customize_Dropdown_Categories_Control( $wp_customize, 'reactor_frontpage_post_category', array( 
					'label'    => __('Categoria d\'articles', 'reactor'),
					'section'  => 'frontpage_settings',
					'type'     => 'dropdown-categories',
					'settings' => 'reactor_options[frontpage_post_category]',
					'priority' => 2,
				 ) ) );
			

			$wp_customize->add_setting('reactor_options[frontpage_layout]', array( 
				'default'        => '2c-r',
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-page-templates'
			 ) );
			 
			$wp_customize->add_control('reactor_options[frontpage_layout]', array( 
				'label'   => __('Composició', 'custom_tac'),
				'section' => 'frontpage_settings',
				'type'    => 'select',
				'choices' => array( 
					'1c' => __('Sense barres laterals','reactor'),
					'2c-l' => __('Barra esquerra', 'reactor'),
					'2c-r' => __('Barra dreta', 'reactor'),
					'3c-c' => __('Barra esquerra i dreta','reactor'),
				),
				'priority' => 3,
			 ) );
		
			$wp_customize->add_setting('reactor_options[frontpage_posts_per_fila_1]', array( 
				'default'        => '2',
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-page-templates'
			 ) );
			 
				$wp_customize->add_control('reactor_options[frontpage_posts_per_fila_1]', array( 
					'label'   => __('Fila 1', 'reactor'),
					'section' => 'frontpage_settings',
					'type'    => 'select',
					'choices' => array( 
						'0' => __('0 articles','reactor'),
						'1' => __('1 article', 'reactor'),
						'2' => __('2 articles iguals', 'reactor'),
						'33' => __('2 articles (1/3+2/3)', 'reactor'),
						'66' => __('2 articles (2/3+1/3)', 'reactor'),
						'3' => __('3 articles', 'reactor'),
						'4' => __('4 articles', 'reactor'),
					),
					'priority' => 4,
				 ) );


			$wp_customize->add_setting('reactor_options[frontpage_posts_per_fila_2]', array( 
				'default'        => '2',
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-page-templates'
			 ) );
			 
			$wp_customize->add_control('reactor_options[frontpage_posts_per_fila_2]', array( 
				'label'   => __('Fila 2', 'reactor'),
				'section' => 'frontpage_settings',
				'type'    => 'select',
				'choices' => array(
					'0' => __('0 articles','reactor'),
					'1' => __('1 article', 'reactor'),
					'2' => __('2 articles iguals', 'reactor'),
					'33' => __('2 articles (1/3+2/3)', 'reactor'),
					'66' => __('2 articles (2/3+1/3)', 'reactor'),
					'3' => __('3 articles', 'reactor'),
					'4' => __('4 articles', 'reactor'),
				),
				'priority' => 5,
			 ) );


			$wp_customize->add_setting('reactor_options[frontpage_posts_per_fila_n]', array( 
				'default'        => '3',
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-page-templates'
			 ) );
				$wp_customize->add_control('reactor_options[frontpage_posts_per_fila_n]', array( 
					'label'   => __('Resta de files', 'reactor'),
					'section' => 'frontpage_settings',
					'type'    => 'select',
					'choices' => array( 
						'0' => __('0 articles', 'reactor'),
						'1' => __('1 article', 'reactor'),
						'2' => __('2 articles', 'reactor'),
						'3' => __('3 articles', 'reactor'),
						'4' => __('4 articles', 'reactor'),
					),
					'priority' => 6,
				 ) );
 
			$wp_customize->add_setting('reactor_options[frontpage_number_posts]', array( 
				'default'        => 3,
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-page-templates'
			 ) );
				$wp_customize->add_control('reactor_options[frontpage_number_posts]', array( 
					'label'    => __('Nombre d\'articles', 'custom_tac'),
					'section'  => 'frontpage_settings',
					'type'     => 'text',
					'priority' => 7,
				 ) ); 
				 
/*				 
				 	 $wp_customize->add_setting('reactor_options[frontpage_link_titles]', array( 
				'default'        => 0,
				'type'           => 'option',
				'capability'     => 'manage_options',
				'theme_supports' => 'reactor-page-templates'
			 ) );
				$wp_customize->add_control('reactor_options[frontpage_link_titles]', array( 
					'label'    => __('Link Post Titles', 'reactor'),
					'section'  => 'frontpage_settings',
					'type'     => 'checkbox',
					'priority' => 8,
				 ) );
*/	


			
		}
		
	}
}
?>
