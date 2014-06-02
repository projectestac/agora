<?php
add_action('admin_menu', 'exray_theme_options');

/* Register and create Theme option page under Appearance */

function exray_theme_options() {
    add_theme_page('Exray Theme Options', 'Theme Options', 'edit_theme_options', 'exray_theme_options', 'exray_theme_page');
}

/* Render Theme Option page */

function exray_theme_page($active_tab = '') {
    ?>
    <div class="wrap">
        <div id="icon-themes" class="icon32"></div>

        <?php settings_errors(); ?>

        <?php
        
        if (isset($_GET['tab'])) {
            $active_tab = $_GET['tab'];
        } else if ($active_tab == 'custom_css') {
            $active_tab = 'custom_css';
        } else {
            $active_tab = 'general_options';
        }
        ?>

        <h2 class="nav-tab-wrapper">

            <a href="?page=exray_theme_options&tab=general_options" class="nav-tab  <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>"><?php _e('General Options', 'exray-framework'); ?></a>

            <a href="?page=exray_theme_options&tab=custom_css" class="nav-tab  <?php echo $active_tab == 'custom_css' ? 'nav-tab-active' : ''; ?>"><?php _e('Custom CSS', 'exray-framework'); ?></a>

        </h2>

        <form id="template" style="margin-top: 15px;" action="options.php" method="post" >

            <?php
            if ($active_tab == 'general_options') {
                get_exray_first_tab_content();
            } else if ($active_tab == 'custom_css') {
                get_exray_second_tab_content();
            } else {
                $active_tab = 'general_options';
            }

            submit_button();
            ?>

        </form>

    </div>

    <?php
}

/*
 * First Tab
 */

add_action('admin_init', 'exray_theme_general_options_init');

function get_exray_first_tab_content() {
    settings_fields('exray_theme_general_options_group'); 
    do_settings_sections('exray_theme_general_options_page'); 
}

// Initialize general option page setting section, field and settings
function exray_theme_general_options_init() {
    global $exray_general_options;

    if (false == $exray_general_options) {    
        add_option(
            'exray_theme_general_options', 
            apply_filters('exray_theme_default_general_options',  exray_theme_default_general_options() ));
    }

    add_settings_section(
            'exray_theme_general_options_section', 
            'General Options', 
            'exray_theme_general_options_section_callback', 
            'exray_theme_general_options_page'
    );
    
    add_settings_field(
            'toggle_menu',
            __('Toggle menu', 'exray-framework'), 
            'toggle_menu_callback', 
            'exray_theme_general_options_page', 
            'exray_theme_general_options_section'
    );
    
    add_settings_field(
            'go_to_top_navigation', 
            __('Go to top link', 'exray-framework'), 
            'go_to_top_navigation_callback', 
            'exray_theme_general_options_page', 
            'exray_theme_general_options_section'
    );

    add_settings_field(
            'content_options', 
            __('Show content with', 'exray-framework'), 
            'content_options_callback', 
            'exray_theme_general_options_page', 
            'exray_theme_general_options_section'
    );
    

    add_settings_field(
            'layout_options', 
            __('Layout options', 'exray-framework'), 
            'layout_options_callback', 
            'exray_theme_general_options_page', 
            'exray_theme_general_options_section'
    );
    
    register_setting(
            'exray_theme_general_options_group', 
            'exray_theme_general_options',
            'exray_theme_validate_general_options'
    );
}

/* * ************************************************************ */
/* Theme general option callback 							   */
/* * ************************************************************ */

function exray_theme_general_options_section_callback() {
    _e('You can modify Theme backend feature here. Looking to modify Theme Frontend / Visual style? Please check', 'exray-framework');
    ?>
    <a href="<?php echo admin_url('customize.php'); ?>" title="Theme Customizer">Theme Customizer</a>.
    <?php
}


function exray_menu() {
    $menus= array(
        'top-menu' => array(
            'name' => 'top_menu',
            'label' => __('Hide top menu', 'exray-framework')
        ),
        'main-menu' => array(
            'name' => 'main_menu',
            'label' => __('Hide main menu', 'exray-framework')
        ),
    );

    return  $menus;
}

function toggle_menu_callback() {
    global $exray_general_options;
    
    if(!isset($exray_general_options['toggle_menu'])){
         $exray_general_options['toggle_menu'] = '';
    }
    
    $menu_options = $exray_general_options['toggle_menu'];
  
    foreach (exray_menu() as $menu) :
        $exray_menu = isset( $menu_options[$menu['name']]) ?  $menu_options[$menu['name'] ] : '';
?>
  
   <input type="checkbox" name="exray_theme_general_options[toggle_menu][<?php echo $menu['name']; ?>]" 
          id="toggle_menu[<?php echo $menu['name']; ?>]"  <?php checked('on', $exray_menu) ?> > 
   
   <label for="exray_theme_general_options[toggle_menu][<?php echo $menu['name']; ?>]">
       <?php echo $menu['label']; ?>
   </label> &nbsp; 
   
<?php endforeach; 
}

function go_to_top_navigation_callback(){
    global $exray_general_options;

    if(!isset($exray_general_options['go_to_top_navigation'])){
         $exray_general_options['go_to_top_navigation'] = '';
    }
    
    $go_to_top_navigation_options = $exray_general_options['go_to_top_navigation'];

?>
    <input type="checkbox" name="exray_theme_general_options[go_to_top_navigation]" id="go_to_top_navigation" value="on" <?php checked('on', $go_to_top_navigation_options); ?> >
    &nbsp;
    <label for="exray_theme_general_options[go_to_top_navigation]" class="description"><?php _e('Hide go to top link on footer', 'exray-framework'); ?></label>

<?php    
}

function exray_content(){
    $contents = array(
        'default' => array(
            'name' => 'default',
            'label' => 'Excerpt'
        ),
        'full_post' => array(
            'name' => 'full_post',
            'label' => 'Full post with readmore'
        ),
    );

    return $contents;
}

function content_options_callback(){
    global $exray_general_options;
    $content_options = $exray_general_options['content_options'];
   
    echo '<ul class="option">';
    foreach (exray_content() as $content):
 ?>

        <li style="display:inline-table;">
            <input type="radio" id="content_options[<?php echo $content['name']; ?>]" 
                    name="exray_theme_general_options[content_options]" 
                    value="<?php echo $content['name']; ?>" <?php echo checked($content['name'], $content_options, false ); ?> />       
        </li>
        <li style="display:inline-table;">
            <?php echo $content['label']; ?> &nbsp;
        </li>
  
<?php
endforeach; 
echo '</ul>';
}

function exray_layout(){
    $layouts =  array(
        'default' => array(
            'name' => 'default',
            'label' => 'default.png'
        ),
        'content-sidebar' => array(
            'name' => 'content_sidebar',
            'label' => 'content-sidebar.png'
        ),
        'sidebar-content' => array(
            'name' => 'sidebar_content',
            'label' => 'sidebar-content.png'
        ),
        'full-content' => array(
            'name' => 'full_content',
            'label' => 'content.png'
        )
    );
    
    return $layouts;
}

function layout_options_callback(){
    global $exray_general_options;

    $layout_options = $exray_general_options['layout_options'];
    
    echo '<ul class="option">';
    foreach (exray_layout() as $layout):
 ?>

        <li style="display:inline-table;">
            <input type="radio" id="layout_options[<?php echo $layout['name']; ?>]" 
                       name="exray_theme_general_options[layout_options]" 
                       value="<?php echo $layout['name']; ?>" <?php echo checked($layout['name'], $layout_options, false ); ?> />       
        </li>
        <li style="display:inline-table;">
                <img src="<?php echo THEME_IMAGES.'/'. $layout['label']; ?>" alt="<?php echo $layout['name']; ?>">  
        </li>
  
<?php
endforeach; 
echo '</ul>';
}

/* * ************************************************************ */
/* Set default values for General Options.						   */
/* * ************************************************************ */

function exray_theme_default_general_options() {

    $defaults = array(
        'toggle_menu' => array(
            'top_menu' => '',
            'main_menu' => ''
         ),
        'go_to_top_navigation' => '',
        'content_options' => 'default',
        'layout_options' => 'default'
    );

    return apply_filters('exray_theme_default_general_options', $defaults);
}

/* * ************************************************************ */
/* Validate all fields on general options page.					 */
/* * ************************************************************ */

function exray_theme_validate_general_options($input) {
    $valid = array();
    $valid['toggle_menu']  = !empty($input['toggle_menu']) ? 
            $input['toggle_menu'] : array( 'top_menu' => 'off', 'main_menu' => 'off');    
    $valid['content_options'] =  !empty($input['content_options']) ? $input['content_options'] : 'default';
    $valid['layout_options'] =  !empty($input['layout_options']) ? $input['layout_options'] : 'default';
    $valid['go_to_top_navigation'] =  !empty($input['go_to_top_navigation']) ? $input['go_to_top_navigation'] : 'off';

    if ($valid['contact_form_email_receiver'] != $input['contact_form_email_receiver']) {
        add_settings_error(
            'contact_form_email_receiver', 
            'contact_form_email_receiver_error', 
            __('Invalid email, please fix', 'exray-framework'), 
            'error'
        );
    }   
   
    if(!empty($input['toggle_menu'])){
        foreach(exray_menu() as $menu){
             $valid['toggle_menu'][$menu['name']] = !empty($input['toggle_menu'][$menu['name']]) ? 'on' : 'off';
        }
    }
    
    return $valid;
}

/*
 * Second Tab
 */

add_action('admin_init', 'exray_theme_custom_css_init');

function get_exray_second_tab_content() {
    // The default message that will appear if Custom CSS form empty
    $custom_css_default = __('/*

Welcome to the Custom CSS editor!
	 
Please add all your custom CSS here and avoid modifying the core theme files, since that\'ll make upgrading the theme problematic Your custom CSS will be loaded after the theme\'s stylesheets, which means that your rules will take precedence. Just add your CSS here for what you want to change, you don\'t need to copy all the theme\'s style.css content.
	
*/', 'exray-framework');

    $exray_custom_css_options = get_option('exray_custom_css', $custom_css_default);
    settings_fields('exray_custom_css_options_group');
    ?>
    <h3><?php _e('Custom CSS', 'exray-framework'); ?></h3>
    <p><?php _e('Add your custom CSS below. For your information, Custom css below will override colors from', 'exray-framework'); ?> <a href="<?php echo admin_url('customize.php'); ?>" title="Theme Customizer">Theme Customizer</a></p>
    <textarea id="custom_css_textarea" name="exray_custom_css" style="height:300px;" placeholder="<?php echo _e('/*** Add your custom CSS here. Do not edit style.css directly. ***/', 'exray-framework'); ?>"><?php echo esc_textarea($exray_custom_css_options); ?></textarea>
    <?php
}

// Initialize Custom css settings
function exray_theme_custom_css_init() {

    register_setting(
            'exray_custom_css_options_group', 'exray_custom_css', 'exray_theme_display_validation'
    );
}

/* Validate Custom CSS Page */

function exray_theme_display_validation($input) {
    if (!empty($input['exray_custom_css'])) {
        $input['exray_custom_css'] = trim($input['exray_custom_css']);
    }

    return $input;
}
