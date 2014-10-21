<?php
/**
 * Header Content
 * hook in the content for header.php
 *
 * @package Reactor
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/**
 * Site meta, title, and favicon
 * in header.php
 * 
 * @since 1.0.0
 */
function reactor_do_reactor_head() { ?>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php wp_title('|', true, 'right'); ?></title>

<!-- google chrome frame for ie -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   
<!-- mobile meta -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<?php $favicon_uri = reactor_option('favicon_image') ? reactor_option('favicon_image') : get_template_directory_uri() . '/favicon.ico'; ?>
<link rel="shortcut icon" href="<?php echo $favicon_uri; ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


<!-- TODO: moure aquesta funció a un lloc més adequat -->

<script>

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
}

function checkMenuCookie() {
    var menu = getCookie("mostraMenu");
    if (menu == 1) {
 		document.getElementById("menu-panel").style.display="inline-block";
 		document.getElementById("icon-menu").setAttribute("class", "dashicons dashicons-no-alt");
 		document.getElementById("icon-23").setAttribute("backgroundColor", "yellow");
    } else {
    	document.getElementById("menu-panel").style.display="none";
    	document.getElementById("icon-menu").setAttribute("class", "dashicons dashicons-menu");
    }
}

function menu_toggle(){
	$icon_menu=document.getElementById("icon-menu");
	$menu_panel=document.getElementById("menu-panel");
	
	if ($menu_panel.style.display=="inline-block") {
		$menu_panel.style.display="none";
		$icon_menu.setAttribute("class", "dashicons dashicons-menu");
		setCookie("mostraMenu","0",10);
	} else {
		$menu_panel.style.display="inline-block";
		$icon_menu.setAttribute("class", "dashicons dashicons-no-alt");	
		document.getElementById("icon-23").setAttribute("backgroundColor", "yellow");
		setCookie("mostraMenu","1",10);
	}
}

function cerca_toggle(){
    	$icon_search=document.getElementById("icon-search");
	$search_panel=document.getElementById("search-panel");
	
	if ($search_panel.style.display=="inline-block") {
		$search_panel.style.display="none";
		$icon_search.setAttribute("class", "dashicons dashicons-search");
        } else {
		$search_panel.style.display="inline-block";
		$icon_search.setAttribute("class", "dashicons dashicons-no-alt");	
		document.getElementById("icon-13").setAttribute("backgroundColor", "yellow");
	}
}
</script>


<?php 
}

add_action('wp_head', 'reactor_do_reactor_head', 1);

/**
 * Top bar
 * in header.php
 * 
 * @since 1.0.0
 */
function reactor_do_top_bar() {
	if ( has_nav_menu('top-bar-l') || has_nav_menu('top-bar-r') ) {
		$topbar_args = array(
			'title'     => reactor_option('topbar_title', get_bloginfo('name')),
			'title_url' => reactor_option('topbar_title_url', home_url()),
			'fixed'     => reactor_option('topbar_fixed', 0),
			'contained' => reactor_option('topbar_contain', 1),
		);
		reactor_top_bar( $topbar_args );
	}
}
add_action('reactor_header_before', 'reactor_do_top_bar',1);

/**
 * Site title, tagline, logo, and nav bar
 * in header.php
 * 
 * @since 1.0.0
 */
function reactor_do_title_logo() { ?>

	<div id="inner-header" class="inner-header">
		<div class="row">
		<div class="column">	
			<div id="idcentre-box" class="<?php reactor_columns(array( 3, 12 ));?>">   
				<!-- Primer bloc: text o logo -->
                                <a href=<?php echo home_url(); ?> >
                                        <div  id="logo-box" class="site-logo <?php reactor_columns(array(6, 8)); ?>">                     		
                                            <div class="site-logo-inner" style="font-size:<?php echo reactor_option('tamany_font_nom'); ?>"> 
                                                <?php echo esc_attr(get_bloginfo('name', 'display')); ?>					
                                            </div><!-- .site-logo-inner -->						
                                        </div> <!-- #logo-box .site-logo -->
                                </a>
                                
                                <!-- Segon bloc: Descripció -->
                                <!-- small devices -->
                                <div id="quick-call-box" class="show-for-small site-quick-box <?php reactor_columns(array(4, 4)); ?> ">
                                    <div class="site-quick-box-inner">  
                                        <a title="Trucar" href="tel:<?php echo reactor_option('telCentre'); ?>"><?php echo reactor_option('telCentre'); ?></a>	
                                    </div>
                                </div>	
                                <div id="quick-map-box" class="show-for-small site-quick-box <?php reactor_columns(array(4, 4)); ?> ">
                                    <a title="Mapa" href="<?php echo reactor_option('googleMaps'); ?>">			
                                        <div class="site-quick-map-box-inner">&nbsp;</div>
                                    </a>	
                                </div>	
				  
				  <!-- medium & large devices -->
				  <div id="description-box" class="hide-for-small site-description-box <?php reactor_columns( 6 ); ?> ">
				
                                    <?php
                                    switch (true){
                                        case is_category():
                                            $description = single_cat_title( '', false ); 
                                            break;
                                        case is_tag():
                                             $description = single_tag_title( '', false ); 
                                            break;
                                        default:
                                             $description = esc_attr( get_bloginfo( 'description', 'display' ) );
                                    }
                                    
                                    $descriptionFontSize=getDescriptionFontSize($description);
                                    
                                    ?>
                                    <div style="font-size:<?php echo $descriptionFontSize;?>" id="description-box-inner" class="site-description-box-inner">
                                        <span>
                                            <?php echo $description; ?>
                                        </span>
                                    </div>
                                </div>	
			</div><!-- #idcentre-box -->
				
				<!-- # imatge de capçalera o slider -->
				<div id="slider-box" class="hide-for-small site-slider <?php reactor_columns(7); ?> ">
				
				<?php
 				
				if (reactor_option('imatge_capcalera')) { ?>
					<style>
						#slider-box{
							background-image:url(<?php echo reactor_option('imatge_capcalera'); ?>); 
							background-size: cover;
							background-repeat: no-repeat; 
						}
					</style>
				<?php }else{	
					do_action('slideshow_deploy', reactor_option('carrusel'));
				}?>

				</div>
				
				
				<!--Graella d'icones -->
				<div style="padding:0px" class="<?php reactor_columns( 2 ); ?>">  
				
					<div class="site-icones <?php reactor_columns( 12 ); ?>">
					
						<?php $options=get_option( 'my_option_name' );?>
		
						<!-- Fila 1 -->
						<a title="<?php echo $options['title_icon11'];?>" href="<?php echo $options['link_icon11'];?>" target="_blank">
							<div id="icon-11" class="icon-graella">
								<div class="dashicons dashicons-<?php echo $options['icon11'];?>"></div>
							</div>
						</a>
                                                
						<a title="<?php echo $options['title_icon12'];?>" href="<?php echo $options['link_icon12'];?>" target="_blank">
							<div id="icon-12" class="icon-graella">
								<div class="dashicons dashicons-<?php echo $options['icon12'];?>"></div>
							</div>
						</a>
                                                
						<a title="CERCA" href="javascript:void(0);" onclick='cerca_toggle();'>
                                                    <div id="icon-13" class="icon-graella">
                                                        <div id="icon-search" class="dashicons dashicons-search"></div>
                                                    </div>
						</a>
						
                                                <div id="search-panel" class="search-box-wrapper icon-graella">
                                                    <div class="search-box">
                                                        <form role="search" method="get" class="search-form" action=<?php get_home_url();?>>
                                                            <input type="search" class="search-field" placeholder="Cerca i pulsa enter…" value="" name="s" title="Cerca:">
                                                            <input type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;">
                                                        </form>			
                                                    </div>
                                                </div>
                                                
						<!-- Fila 2 -->
                                                <a title="<?php echo $options['title_icon21'];?>" href="<?php echo $options['link_icon21'];?>" target="_blank">
							<div id="icon-21" class="icon-graella">
								<div class="dashicons dashicons-<?php echo $options['icon21'];?>"></div>
							</div>
						</a>
						
						<a title="<?php echo $options['title_icon22'];?>" href="<?php echo $options['link_icon22'];?>" target="_blank">
							<div id="icon-22" class="icon-graella">
								<div class="dashicons dashicons-<?php echo $options['icon22'];?>"></div>
							</div>
						</a>			
						<a title="MENU" href="javascript:void(0);" onclick='menu_toggle();'>
							<div id="icon-23" class="icon-graella">
							<div id="icon-menu" class="dashicons dashicons-menu"></div>				
							</div>
						</a>	
					
					</div> <!-- .site-icones -->
					
				</div> <!-- columns (2) container -->
				
				</div><!-- .column -->
		</div><!-- .row -->
	</div><!-- .inner-header -->  
<?php 
}
add_action('reactor_header_inside', 'reactor_do_title_logo', 1	);

/**
 * Nav bar and mobile nav button
 * in header.php
 * 
 * @since 1.0.0
 */
function reactor_do_nav_bar() {

	if ( has_nav_menu('main-menu') ) {
		$nav_class = ( reactor_option('mobile_menu', 1) ) ? 'class="hide-for-small" ' : ''; ?>
		<div class="main-nav">
			<nav id="menu" <?php echo $nav_class; ?>role="navigation">
				<div class="section-container horizontal-nav" data-section="horizontal-nav" data-options="one_up:false;">
					<?php reactor_main_menu(); ?>
				</div>
			</nav>
		</div><!-- .main-nav -->
	<?php
	if ( reactor_option('mobile_menu', 1) ) { ?>       
		<div id="mobile-menu-button" class="show-for-small" >
			<button class="secondary button" id="mobileMenuButton" href="#mobile-menu">
				<span class="mobile-menu-icon"></span>
				<span class="mobile-menu-icon"></span>
				<span class="mobile-menu-icon"></span>
			</button>
		</div><!-- #mobile-menu-button -->             
	<?php }
	}
}

/**
 * Mobile nav
 * in header.php
 * 
 * @since 1.0.0
 */
function reactor_do_mobile_nav() {
	if ( reactor_option('mobile_menu', 1) && has_nav_menu('main-menu') ) { ?> 
		<nav id="mobile-menu" role="navigation">
			<div class="section-container accordion" data-section="accordion" data-options="one_up:false">
				<?php reactor_main_menu(); ?>
			</div>
		</nav>
<?php }
}
add_action('reactor_header_before', 'reactor_do_mobile_nav', 1);

