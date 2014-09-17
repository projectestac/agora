<?php
/* Hide default welcome dashboard message and create a custom one
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
function rc_my_welcome_panel() {

?>

<script type="text/javascript">
/* Hide default welcome message */
jQuery(document).ready( function($) 
{
    $('div.welcome-panel-content').hide();
});
</script>
 
    <div class="custom-welcome-panel-content">
    <h3><?php _e( 'Benvinguts a NODES' ); ?></h3>
    <p class="about-description"><?php _e( 'Projecte pilot de la nova web de centre del Departament d\'Ensenyament' ); ?></p>
    <div class="welcome-panel-column-container">
      
    <div class="welcome-panel-column">
        <h4><?php _e( 'Accions' ); ?></h4>
        <ul>
	<li><?php printf( '<a href="%s" class="welcome-icon welcome-view-site">' . __( 'Personalitza la web' ) . '</a>', __( 'customize.php' ) ); ?></li>
        <?php if ( 'page' == get_option( 'show_on_front' ) && ! get_option( 'page_for_posts' ) ) : ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edita pàgina principal' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Icones de capçalera' ) . '</a>', admin_url( 'themes.php?page=my-setting-admin' ) ); ?></li>
        <?php elseif ( 'page' == get_option( 'show_on_front' ) ) : ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-edit-page">' . __( 'Edita pàgina principal' ) . '</a>', get_edit_post_link( get_option( 'page_on_front' ) ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add additional pages' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Add a blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
        <?php else : ?>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-write-blog">' . __( 'Write your first blog post' ) . '</a>', admin_url( 'post-new.php' ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Add an About page' ) . '</a>', admin_url( 'post-new.php?post_type=page' ) ); ?></li>
        <?php endif; ?>
            
        </ul>
    </div>
    <div class="welcome-panel-column">
        <h4><?php _e( 'More Actions' ); ?></h4>
        <ul>
            <li><?php printf( '<div class="welcome-icon welcome-widgets-menus">' . __( 'Manage <a href="%1$s">widgets</a> or <a href="%2$s">menus</a>' ) . '</div>', admin_url( 'widgets.php' ), admin_url( 'nav-menus.php' ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Carrusels' ) . '</a>', admin_url( 'edit.php?post_type=slideshow' ) ); ?></li>
            <li><?php printf( '<a href="%s" class="welcome-icon welcome-add-page">' . __( 'Calendaris' ) . '</a>', __( 'options-general.php?page=google-calendar-events.php' ) ); ?></li>
        </ul>
    </div>
    
    <div style="margin-bottom:1.5em" class="welcome-panel-column welcome-panel-last">
        <h4><?php _e( "Necessites ajuda?" ); ?></h4>
        
        <a class="button button-primary button-hero" target="_blank" href="http://agora.xtec.cat/moodle/moodle/mod/glossary/view.php?id=1302"><?php _e( 'Preguntes més freqüents' ); ?></a> <a class="button button-primary button-hero" target="_blank" href="http://agora.xtec.cat/moodle/moodle/course/view.php?id=201"><?php _e( 'Espai de suport a Àgora' ); ?></a>
    </div>

    
    </div>
    </div>
 
<?php
} ?>