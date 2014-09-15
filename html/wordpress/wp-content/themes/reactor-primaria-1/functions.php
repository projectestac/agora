<?php
/**
 * Reactor Child Theme Functions
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @author Xavi Meler (jmeler@xtec.cat)
 * @version 1.1.0
 * @since 1.0.0
 * @copyright Copyright (c) 2013, TODO
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
	 remove_theme_support('reactor-backgrounds');
	
	/* Remove support for font options in customizer */
	 //remove_theme_support('reactor-fonts');
	
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
	
	/* Remove support for tum icons */
	// remove_theme_support('reactor-tumblog-icons');
	
	/* Remove support for other langauges */
	// remove_theme_support('reactor-translation');

}

//Fil d'ariadna
function add_fil_ariadna(){
	reactor_breadcrumbs(); 
}
add_action ('reactor_content_before','add_fil_ariadna',999);

/**************************************************************

Contingut barra superior (admin bar)

***************************************************************/

include "custom-tac/capcalera/menu-gencat.php";
add_action( 'admin_bar_menu', 'add_gencat',1 ); 

//include "custom-tac/capcalera/menu-dades-centre.php";
//add_action( 'admin_bar_menu', 'add_dades_centre',31 );

include "custom-tac/capcalera/menu-serveis-tac.php";
//add_action( 'admin_bar_menu', 'add_serveis',999 );

include "custom-tac/capcalera/menu-recursos-tac.php";
add_action( 'admin_bar_menu', 'add_recursos',2);

// Eliminem icones de la barra superior
function my_edit_toolbar($wp_toolbar) {
    $wp_toolbar->remove_node('wp-logo');
    $wp_toolbar->remove_node('updates');
    $wp_toolbar->remove_node('comments');
    $wp_toolbar->remove_node('new-content');
    $wp_toolbar->remove_menu('edit');
}
add_action('admin_bar_menu', 'my_edit_toolbar',98);

function disable_bar_search() {  
    global $wp_admin_bar;  
    $wp_admin_bar->remove_menu('search');  
}  
add_action( 'wp_before_admin_bar_render', 'disable_bar_search' ); 


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

//TODO: s'ha de modificar a un hook del reactor un excerpt hardcoded, si no no fa cas d'això
//WARN: trim_excerpt també defineix la longitut
function custom_excerpt_length( $length ) {
	return 45;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//Filtre categoria 
function categoria_portada ( $query ) {
    
    $catId = reactor_option('frontpage_post_category', '1');
    if ( $query->is_home() and $query->query['post_type']=='post') {
        $query->set('cat',$catId);
    }
}
add_action( 'pre_get_posts', 'categoria_portada' );


// Permet algunes etiquetes html al extracte d'un post
function improved_trim_excerpt($text) {
        global $post;
	$allowed_tags='<a>,<ul>,<li>,<ol>';

        if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace('\]\]\>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text,$allowed_tags);
		$excerpt_length = 45;

		$excerpt_more = reactor_option('post_readmore','Llegir més');
		$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_more);

		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
		        array_pop($words);
		        $text = implode(' ', $words);
		}
        }
        return $text . $excerpt_more;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');


// Allow HTML in description category/tag
// remove the html filtering
remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

add_filter('edit_category_form_fields', 'cat_description');
function cat_description($tag)
{
    ?>
        <table class="form-table">
            <tr class="form-field">
                <th scope="row" valign="top"><label for="description"><?php _ex('Description', 'Taxonomy Description'); ?></label></th>
                <td>
                <?php
                    $settings = array('wpautop' => true, 'media_buttons' => true, 'quicktags' => true, 'textarea_rows' => '15', 'textarea_name' => 'description' );
                    wp_editor(wp_kses_post($tag->description , ENT_QUOTES, 'UTF-8'), 'cat_description', $settings);
                ?>
                <br />
                <span class="description"><?php _e('The description is not prominent by default; however, some themes may show it.'); ?></span>
                </td>
            </tr>
        </table>
    <?php
}

function remove_default_category_description()
{
    global $current_screen;
    if ( $current_screen->id == 'edit-category' )
    {
    ?>
        <script type="text/javascript">
        jQuery(function($) {
            $('textarea#description').closest('tr.form-field').remove();
        });
        </script>
    <?php
    }
}
add_action('admin_head', 'remove_default_category_description');

// Metabox paràmetres: Amaga títol, amaga metadades, mostra contingut sencer. 
include "custom-tac/metabox-post-parametres.php";

//Formulari per definir la capçalera 
include "custom-tac/capcalera/capcalera-settings.php";

//Giny Recursos XTEC
include "custom-tac/ginys/giny-xtec.php";

//Giny Logo centre
include "custom-tac/ginys/giny-logo-centre.php";

//Menu principal
include "custom-tac/menu-principal.php";
add_action("reactor_content_before","menu_principal");




function getRowFrontPage($posts_per_fila,$numFila){
	
	global $frontpage_query;  
  	global $card_colors;
        $card_colors=array("card_bgcolor1","card_bgcolor2","card_bgcolor3");
        global $card_bgcolor;
	global $layout;
     
	$aLayout=array();
	
	switch ($posts_per_fila) {
        case 1: array_push($aLayout,1);
         break;
        case 2: array_push($aLayout,2,2);
         break;
        case 3: array_push($aLayout,3,3,3);
         break;
        case 4: array_push($aLayout,4,4,4,4);
         break;
        case 33: array_push($aLayout,66,3);
         break;
        case 66: array_push($aLayout,3,66);
         break;
	}
	
	echo '<div class="row fila'.$numFila.'">';

	if ( $frontpage_query->have_posts() and count($aLayout>0)) : 
            reactor_loop_before(); 
            $col=1;    
            while ( $frontpage_query->have_posts() ) : 
            
                    $pos_color=((($numFila+1)%3)+$col)%3;
            
                    $card_bgcolor=$card_colors[$pos_color];
                   // echo "f:".$numFila."-c:".$col."-poscolor:".$pos_color;
                    $col++;
                    $layout=array_pop($aLayout);	  
                    if (!$layout): 
                        break;
                    else: 		
                    $frontpage_query->the_post(); 
                    reactor_post_before();
                    get_template_part('post-formats/format', "tac");
                    reactor_post_after();
            endif;
    	
	endwhile; 
	
	reactor_loop_after();
	 
	else : 
		reactor_loop_else(); 
	endif; 

	echo '</div>';

}


function getRow_N_FrontPage($posts_per_fila,$num_posts_n){
	
	global $frontpage_query;  
        global $card_colors;
        $card_colors=array("card_bgcolor1","card_bgcolor2","card_bgcolor3");
        global $card_bgcolor;
	global $layout;
        global $aLayout;
        
        $aLayout=array();
        
        //Omplim el layout de la resta de files
        $aLayout=array_fill(0, $num_posts_n, $posts_per_fila);
        
	if ( $num_posts_n>0 and $frontpage_query->have_posts() ) : 
            
            $num_fila=3; // Fila inicial 
            $loop_posts=0; 
            $nova_fila=true;      
            reactor_loop_before();  
            $col=0;
            
            while ( $frontpage_query->have_posts() ) : 	
                $col++;
                $pos_color=((($num_fila+1)%3)+$col)%3;
                //echo "f:".$num_fila."-col:".$col;
                $card_bgcolor=$card_colors[$pos_color];
                
                if ($nova_fila){
                        echo "<div class='row fila".$num_fila."'>";
                        $nova_fila=false;
                }
                $frontpage_query->the_post(); 
                
                $layout=array_pop($aLayout); 
                reactor_post_before();
                get_template_part('post-formats/format', "tac"); 
                reactor_post_after(); 
                $loop_posts++;

                $nova_fila=($loop_posts>=$posts_per_fila)?true:false;

                if ($nova_fila) {
                        echo "</div>";
                        $loop_posts=0;
                        $num_fila++;
                        $col=0;
                }	
                
               
            endwhile; 
            //Si no hem acabat la fila, tanquem la graella
            if ($col!=0 and $col<$posts_per_fila)
                echo "</div>";

            reactor_loop_after(); 
	
        else : 
                reactor_loop_else(); 
        endif; 

}

function getRow_Posts($posts_per_fila,$num_posts_n){

        global $card_colors;
        $card_colors=array("card_bgcolor1","card_bgcolor2","card_bgcolor3");
        global $card_bgcolor;
	global $layout;
        global $aLayout;
        
        $aLayout=array();
        
        //Omplim el layout de la resta de files
        $aLayout=array_fill(0, $num_posts_n, $posts_per_fila);
        
	if ( $num_posts_n>0 and have_posts() ) : 
            
            $num_fila=3; // Fila inicial 
            $loop_posts=0; 
            $nova_fila=true;      
            reactor_loop_before();  
            $col=0;
            
            while ( have_posts() ) :
                $col++;
                $pos_color=((($num_fila+1)%3)+$col)%3;
                //echo "f:".$num_fila."-col:".$col;
                $card_bgcolor=$card_colors[$pos_color];
                
                if ($nova_fila){
                        echo "<div class='row fila".$num_fila."'>";
                        $nova_fila=false;
                }
                the_post(); 
                
                $layout=array_pop($aLayout); 
                reactor_post_before();
                get_template_part('post-formats/format', "tac"); 
                reactor_post_after(); 
                $loop_posts++;

                $nova_fila=($loop_posts>=$posts_per_fila)?true:false;

                if ($nova_fila) {
                        echo "</div>";
                        $loop_posts=0;
                        $num_fila++;
                        $col=0;
                }	
                
               
            endwhile; 

            reactor_loop_after(); 
	
        else : 
            reactor_loop_else(); 
        endif; 

}

/**
 * Remove option in admin bar added by the extension 'WordPress Social Login'.
 * It is removed for all users
 * 
 * @global Array $wp_admin_bar
 * @author Toni Ginard
 */
function tweak_admin_bar() {
    
    global $wp_admin_bar;

    $wp_admin_bar->remove_menu('wp-admin-wordpress-social-login');

}
add_action('wp_before_admin_bar_render', 'tweak_admin_bar');


/**
 * Build HTML page to centralize all BuddyPress-related stuff
 * 
 * @author Toni Ginard
 * 
 */
function bp_options_page() {
    ?>
    <div class="wrap">

        <div style="width:150px; padding:20px; float:left;">
            <h3 style="height:40px;"><?php _e('BuddyPress', 'buddypress'); ?></h3>
            <p><a href="admin.php?page=bp-components"><?php _e('Components', 'buddypress'); ?></a></p>
            <p><a href="admin.php?page=bp-activity"><?php _e('Activity', 'buddypress'); ?></a></p>
            <p><a href="admin.php?page=bpfb-settings"><?php _e('Activity Plus', 'bpfb'); ?></a></p>
            <p><a href="admin.php?page=bp-groups"><?php _e('Groups', 'buddypress'); ?></a></p>
            <p><a href="admin.php?page=ass_admin_options"><?php _e("Group Email Options", 'bp-ass'); ?></a></p>
        </div>

        <div style="width:150px; padding:20px; float:left;">
            <h3 style="height:40px;"><?php _e('BuddyPress Docs', 'bp-docs'); ?></h3>
            <p><a href="edit.php?post_type=bp_doc"><?php _e('BuddyPress Docs', 'bp-docs'); ?></a></p>
            <p><a href="post-new.php?post_type=bp_doc"><?php _e('Add New', 'bp-docs'); ?></a></p>
            <p><a href="edit-tags.php?taxonomy=bp_docs_associated_item&post_type=bp_doc"><?php _e('Associated Items', 'bp-docs'); ?></a></p>
            <p><a href="edit-tags.php?taxonomy=bp_docs_tag&post_type=bp_doc"><?php _e('Docs Tags', 'bp-docs' ); ?></a></p>
            <p><a href="edit.php?post_type=bp_doc&page=bp-docs-settings"><?php _e('Settings', 'bp-docs'); ?></a></p>
        </div>

        <div style="width:150px; padding:20px; float:left;">
            <h3 style="height:40px;"><?php _e('BuddyPress Invitations', 'bp-invite-anyone'); ?></h3>
            <p><a href="edit.php?post_type=ia_invites"><?php _e('BuddyPress Invitations', 'bp-invite-anyone'); ?></a></p>
            <p><a href="post-new.php?post_type=ia_invites"><?php _e('Add New', 'bp-invite-anyone'); ?></a></p>
            <p><a href="edit-tags.php?taxonomy=ia_invitees&post_type=ia_invites"><?php _e('Invitee', 'bp-invite-anyone'); ?></a></p>
            <p><a href="edit-tags.php?taxonomy=ia_invited_groups&post_type=ia_invites"><?php _e('Invited Group', 'bp-invite-anyone'); ?></a></p>
        </div>

        <div style="width:150px; padding:20px; float:left;">
            <h3 style="height:40px;"><?php _e('BP Moderation', 'bp-moderation'); ?></h3>
            <p><a href="admin.php?page=bp-moderation&view=contents"><?php _e('Contents', 'bp-moderation'); ?></a></p>
            <p><a href="admin.php?page=bp-moderation&view=users"><?php _e('Users', 'bp-moderation'); ?></a></p>
            <p><a href="admin.php?page=bp-moderation&view=settings"><?php _e('Settings', 'bp-moderation'); ?></a></p>
        </div>

    </div>
    <?php
}

/**
 * Remove menus for administrators who are not xtecadmin
 * 
 * @author Toni Ginard
 * 
 */
function remove_admin_menus() {

    // Forum
    remove_submenu_page('options-general.php', 'bbpress');

    // BuddyPress
    remove_submenu_page('options-general.php', 'bp-page-settings'); // Tab in BuddyPress
    remove_submenu_page('options-general.php', 'bp-settings'); // Tab in BuddyPress
    
    // Private BP Pages
    remove_submenu_page('options-general.php', 'bphelp-pbp-settings'); // In this case, it doesn't block access

}

/**
 * Move options from Settings to custom BuddyPress page, step 1. This movement 
 * is broken in two steps because some actions need to be done early and some 
 * need to be done later, depending on the implementation of every plugin.
 * 
 * @author Toni Ginard
 * 
 */
function rebuild_bp_menus_step_1() {

    remove_submenu_page('options-general.php', 'bpfb-settings'); // Activity Plus

    add_menu_page(__('BuddyPress', 'buddypress'), __('BuddyPress', 'buddypress'), 'manage_options', 'xtec-bp-options', 'bp_options_page', '', 40);

    add_submenu_page('xtec-bp-options', __('Components', 'buddypress'), __('Components', 'buddypress'), 'manage_options', 'bp-components', 'bp_core_admin_components_settings');
    add_submenu_page('xtec-bp-options', __('Activity', 'buddypress'), __('Activity', 'buddypress'), 'manage_options', 'bp-activity');
    add_submenu_page('xtec-bp-options', __('Activity Plus', 'bpfb'), __('Activity Plus', 'bpfb'), 'manage_options', 'bpfb-settings', 'settings_page');
    add_submenu_page('xtec-bp-options', __('Groups', 'buddypress'), __('Groups', 'buddypress'), 'manage_options', 'bp-groups');
	add_submenu_page('xtec-bp-options', __('Group Email Options', 'bp-ass'), __('Group Email Options', 'bp-ass'), 'manage_options', 'ass_admin_options', 'ass_admin_options' );

}

/**
 * Move options from Settings to custom BuddyPress page, step 2. This movement 
 * is broken in two steps because some actions need to be done early and some 
 * need to be done later, depending on the implementation of every plugin.
 * 
 * @author Toni Ginard
 * 
 */
function rebuild_bp_menus_step_2() {

    remove_menu_page('bp-activity');
    remove_menu_page('bp-groups');

    remove_submenu_page('options-general.php', 'bp-components'); // Tab in BuddyPress
    remove_submenu_page('bp-general-settings', 'ass_admin_options'); // Group Email 

}

global $isAgora;

// Remove admin menus for all users but xtecadmin
if ($isAgora && !is_xtecadmin()) {
    add_action('admin_menu', 'remove_admin_menus');
}

// Rebuild menus for all users
add_action('admin_menu', 'rebuild_bp_menus_step_1', 1); // Priority 1 is important!
add_action('admin_menu', 'rebuild_bp_menus_step_2'); // Default priority (10) is important!
