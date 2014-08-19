<?php
/**
 * Reactor Child Theme Functions
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @version 1.1.0
 * @since 1.0.0
 * @copyright Copyright (c) 2013, Anthony Wilhelm
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/* -------------------------------------------------------
 You can add your custom functions below
-------------------------------------------------------- */


/**
 * Child Theme Features
 * The following function will allow you to remove features included with Reactor
 *
 * Remove the comment slashes (//) next to the functions
 * For add_theme_support, remove values from arrays to disable parts of the feature
 * remove_theme_support will disable the feature entirely
 * Reference the functions.php file in Reactor for add_theme_support functions
 */

add_action('after_setup_theme', 'reactor_child_theme_setup', 11);

function reactor_child_theme_setup() {

    /* Support for menus */
	// remove_theme_support('reactor-menus');
	 add_theme_support(
	 	'reactor-menus',
	 	array('top-bar-l', 'top-bar-r', 'main-menu', 'side-menu', 'footer-links')
	 );
	
	/* Support for sidebars
	Note: this doesn't change layout options */
	// remove_theme_support('reactor-sidebars');
	 add_theme_support(
	 	'reactor-sidebars',
	 	array('primary', 'secondary', 'front-primary', 'front-secondary', 'footer')
	 );
	
	/* Support for layouts
	Note: this doesn't remove sidebars */
	// remove_theme_support('reactor-layouts');
	 add_theme_support(
	 	'reactor-layouts',
	 	array('1c', '2c-l', '2c-r', '3c-l', '3c-r', '3c-c')
	 );
	
	/* Support for custom post types */
	// remove_theme_support('reactor-post-types');
	 add_theme_support(
	 	'reactor-post-types',
	 	array('slides', 'portfolio')
	 );
	
	/* Support for page templates */
	//remove_theme_support('reactor-page-templates');
	add_theme_support(
	 	'reactor-page-templates',
	 	array('front-page', 'news-page', 'portfolio', 'contact')
	);
	
	/* Remove support for background options in customizer */
	// remove_theme_support('reactor-backgrounds');
	
	/* Remove support for font options in customizer */
	// remove_theme_support('reactor-fonts');
	
	/* Remove support for custom login options in customizer */
	// remove_theme_support('reactor-custom-login');
	
	/* Remove support for breadcrumbs function */
	// remove_theme_support('reactor-breadcrumbs');
	
	/* Remove support for page links function */
	// remove_theme_support('reactor-page-links');
	
	/* Remove support for page meta function */
	// remove_theme_support('reactor-post-meta');
	
	/* Remove support for taxonomy subnav function */
	// remove_theme_support('reactor-taxonomy-subnav');
	
	/* Remove support for shortcodes */
	// remove_theme_support('reactor-shortcodes');
	
	/* Remove support for tumblog icons */
	// remove_theme_support('reactor-tumblog-icons');
	
	/* Remove support for other langauges */
	// remove_theme_support('reactor-translation');

}


/*
function header_widget() {
register_sidebar( array(
'name' => __( 'Capçalera Dreta', 'reactor-primaria-child' ),
'id' => 'header_widget',
'description' => __( 'Appears in the header', 'reactor-primaria-child' ),
'before_widget' => '<aside id="%1$s">',
'after_widget' => '</aside>',
'before_title' => '<h3>',
'after_title' => '</h3>',
) );
}

add_action( 'widgets_init', 'header_widget' );


function logo_widget() {
register_sidebar( array(
'name' => __( 'Logo', 'reactor-primaria-child' ),
'id' => 'logo_widget',
'description' => __( 'Sidebar Logo', 'reactor-primaria-child' ),
'before_widget' => '<aside id="%1$s">',
'after_widget' => '</aside>',
'before_title' => '<h3>',
'after_title' => '</h3>',
) );
}
add_action( 'widgets_init', 'logo_widget' );

function add_menu_cerca(){
	echo "<div><div style='float:left;width:150px;height:100px;background-color:white'>Cercador</div>";
	echo "<div style='height:100px;background-color:#efefef'>Menu</div></div>";
}

function add_logo_corp(){
	echo "<div id='logo_genedu'></div>";
}
*/


function add_fil_ariadna(){
	reactor_breadcrumbs(); 
}

add_action ('reactor_content_before','add_fil_ariadna');

function add_recursos( $wp_admin_bar ) {

	$args = array(
		'id'     => 'recursosXTEC',     
		'title'  => '<img src=http://ies-sabadell.cat/nodes/wp-content/uploads/2014/03/xtec4.png>', 
		'parent' => false,          
		'meta'=>array('class' =>'ab-top-secondary ab-top-menu')
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'xtec',     
		'title'  => '<img src=http://educacio.gencat.cat/documents/img/meva_xtec.jpg>&nbsp;Xtec',
		'href'=>'http://www.xtec.cat/', 
		'parent' => 'recursosXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'edu365',     
		'href' => 'http://www.edu365.cat/',
		'title'  => '<img src=http://educacio.gencat.cat/documents/img/edu365.jpg>&nbsp;Edu365', 
		'parent' => 'recursosXTEC',         
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'edu3',     
		'href'=> 'http://www.edu3.cat/',
		'title'  => '<img src=http://educacio.gencat.cat/documents/img/edu3.jpg>&nbsp;Edu3', 
		'parent' => 'recursosXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'alexandria',     
		'title'  => 'Alexandria',
		'href' => 'http://alexandria.xtec.cat/', 
		'parent' => 'recursosXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'xarxadocent',     
		'title'  => 'Xarxa Docent', 
		'href'=>'http://educat.xtec.cat/',
		'parent' => 'recursosXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'arc',     
		'title'  => 'ARC', 
		'href' => 'http://apliense.xtec.cat/arc/',
		'parent' => 'recursosXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'merli',     
		'title'  => 'Merlí', 
		'href'=>'http://aplitic.xtec.cat/merli/',
		'parent' => 'recursosXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'jclic',     
		'title'  => 'jClic', 
		'href'	=> 'http://clic.xtec.cat/ca/index.htm',
		'parent' => 'recursosXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'linkat',     
		'title'  => 'Linkat', 
		'href' => 'http://linkat.xtec.cat/portal/index.php',
		'parent' => 'recursosXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'odissea',     
		'title'  => 'Odissea', 
		'href' => 'http://odissea.xtec.cat/',
		'parent' => 'recursosXTEC',          
	);

	$wp_admin_bar->add_node( $args );

}



function add_serveis( $wp_admin_bar ) {

	$args = array(
		'id'     => 'serveisXTEC',     
		'title'  => '<img src=http://ies-sabadell.cat/webdecentre/wp-content/uploads/2014/07/agora2.png>', 
		'parent' => false,         
		'meta'=>array('class' =>'ab-top-secondary ab-top-menu')
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'Moodle',     
		'title'  => 'Moodle', 
		'href' => 'http://agora.xtec.cat/',
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'nodes',     
		'title'  => 'Nodes', 
		'href'	=> 'http://agora.xtec.cat/',
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'xtecblocs',     
		'title'  => 'XtecBlocs', 
		'href' => 'http://blocs.xtec.cat/',
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'intraweb',     
		'title'  => 'Intraweb', 
		'href'	=> 'http://agora.xtec.cat/',
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );
	
	/*
	$args = array(
		'id'     => 'sep',     
		'title'  => '<hr>', 
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'aboutAgora',     
		'title'  => 'Què és Àgora', 
		'parent' => 'serveisXTEC',          
	);

	$wp_admin_bar->add_node( $args );
	*/
}

function add_direccio( $wp_admin_bar ) {

	if ( ! current_user_can( 'manage_options' ) ) {
    		$args = array(
			'id'     => 'nomCentre',     
			'title'  => get_option("blogname"),
			'href'=>'http://ies-sabadell.cat/webdecentre',
			'parent' => false,          
		);

		$wp_admin_bar->add_node( $args );
	}	
	/*
	$args = array(
		'id'     => 'iconMapsCentre',     
		'title' => '<a href="https://www.google.com/maps/dir//41.554484,2.085249/@41.5544914,2.0831204,17z/data=!4m4!4m3!1m0!1m0!3e0?hl=ca">&nbsp;</a>',
		'parent' => false,          
	);

	$wp_admin_bar->add_node( $args );*/
	
	$args = array(
		'id'     => 'direccioCentre',     
		'title' => reactor_option('direcciocentre', 'C/Direcció del centre,1'), 
		'parent' => false,          
	);

		
	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'telCentre',     
		/*'title'  => '<a href="tel:'.reactor_option('telefoncentre', '111111').'">'.reactor_option('telefoncentre', '111111').'</a>',*/ 
		'title'  => reactor_option('telefoncentre', '111111'), 
		'parent' => false,          
	);

	$wp_admin_bar->add_node( $args );
	
	$args = array(
		'id'     => 'titularitat',     
		'title'  => 'Centre públic',
		'href' => 'http://www20.gencat.cat/portal/site/ensenyament/menuitem.a735c8413184c341c65d3082b0c0e1a0/?vgnextoid=fd48f9cd4d7e9310VgnVCM1000008d0c1e0aRCRD&vgnextchannel=fd48f9cd4d7e9310VgnVCM1000008d0c1e0aRCRD&vgnextfmt=default',
		'parent' => false,          
	);

	$wp_admin_bar->add_node( $args );
		

	/*
	$wp_admin_bar->add_node( $args );
	$args = array(
		'id'     => 'emailCentre',     // id of the existing child node (New > Post)
		'title'  => 'bustia@ies-sabadell.cat ', // alter the title of existing node
		'parent' => false,          // set parent to false to make it a top level (parent) node
	);

	$wp_admin_bar->add_node( $args );
	*/
}


function add_corporatiu( $wp_admin_bar ) {

	$args = array(
		'id'     => 'gencat',     // id of the existing child node (New > Post)
		'title'  => '<img src=http://ies-sabadell.cat/webdecentre/wp-content/uploads/2014/07/ensenyament_bn_30.png>', // alter the title of existing node
		'parent' => false,          // set parent to false to make it a top level (parent) node
	);

	$wp_admin_bar->add_menu( $args );

	$args = array(
		'id'     => 'gencat-web',     // id of the existing child node (New > Post)
		'title'  => 'Generalitat de Catalunya', // alter the title of existing node
		'href' =>'http://www20.gencat.cat',
		'parent' => 'gencat',          // set parent to false to make it a top level (parent) node
	);

	$wp_admin_bar->add_node( $args );
	
	$args = array(
		'id'     => 'dep-ensenyament',     
		'title'  => 'Departament d\'ensenyament', // alter the title of existing node
		'href' =>'http://www20.gencat.cat/portal/site/ensenyament',
		'parent' => 'gencat',          // set parent to false to make it a top level (parent) node
	);

	$wp_admin_bar->add_node( $args );

	$args = array(
			'id'     => 'atri',     
			'title'  => 'ATRI', 
			'href' => 'https://atri.gencat.cat/',
			'parent' => 'gencat',          
		);
	
	$wp_admin_bar->add_node( $args );
	
	$wp_admin_bar->add_node( $args );

	$args = array(
			'id'     => 'saga',     
			'title'  => 'SAGA', 
			'href' => 'https://saga.xtec.cat/entrada',
			'parent' => 'gencat',          
		);
	
	$wp_admin_bar->add_node( $args );

	$args = array(
		'id'     => 'familia-escola',     
		'title'  => 'Familia i Escola', 
		'href'=>'http://www20.gencat.cat/portal/site/familiaescola/',
		'parent' => 'gencat',          
	);
	
	$wp_admin_bar->add_node( $args );

	$args = array(
			'id'     => 'portal',     
			'title'  => 'Intranet · Portal de centre', 
			'href' => 'http://educacio.gencat.cat/portal/page/portal/EducacioIntranet/Benvinguda',
			'parent' => 'gencat',          
		);
	
	$wp_admin_bar->add_node( $args );



}

add_action( 'admin_bar_menu', 'add_corporatiu',0 );
add_action( 'admin_bar_menu', 'add_direccio',12 );
//add_action( 'admin_bar_menu', 'add_serveis',13 );
//add_action( 'admin_bar_menu', 'add_recursos',14);

function disable_bar_search() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('search');  
}  
add_action( 'wp_before_admin_bar_render', 'disable_bar_search' ); 

show_admin_bar( 'true' );

function my_edit_toolbar($wp_toolbar) {
    $wp_toolbar->remove_node('wp-logo');
    $wp_toolbar->remove_node('updates');
    $wp_toolbar->remove_node('comments');
    $wp_toolbar->remove_node('new-content');
    $wp_toolbar->remove_menu('edit');
}
 
add_action('admin_bar_menu', 'my_edit_toolbar', 999);

/* Camps extra per definir disposició de noticies a cada categoria*/

add_action ( 'edit_category_form_fields', 'extra_category_fields');
//add extra fields to category edit form callback function
function extra_category_fields( $tag ) {    //check for existing featured ID
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");
?>

<tr class="form-field">
<th scope="row" valign="top"><label for="articles_fila"><?php _e('Articles per fila'); ?></label></th>
<td>
<input type="text" name="Cat_meta[articles_fila]" id="Cat_meta[articles_fila]" size="25" style="width:60%;" value="<?php echo $cat_meta['articles_fila'] ? $cat_meta['articles_fila'] : ''; ?>"><br />
            <span class="description"><?php _e('Articles per fila que es mostraran a la pàgina de la categoria (entre 1 i 4)'); ?></span>
        </td>
</tr>

<?php } 


// save extra category extra fields hook
add_action ( 'edited_category', 'save_extra_category_fields');

   // save extra category extra fields callback function
function save_extra_category_fields( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}


function custom_excerpt_length( $length ) {
	
	return 45;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function my_home_category( $query ) {
    $catId = reactor_option('frontpage_post_category', '1');

    if ( $query->is_home() ) {
        $query->set('cat',$catId);
    }
}
add_action( 'pre_get_posts', 'my_home_category' );



/*
function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '<a>');
                $excerpt_length = 45;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        $text = implode(' ', $words);
                }
        }
        return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');*/
