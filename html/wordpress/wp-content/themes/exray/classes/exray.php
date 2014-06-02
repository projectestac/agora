<?php
require 'html.php';

class Exray extends HTML{
	public $content_width;

	public function __construct(){ }

	/**
	 * Check variable isset or not and givae default value if it's not set.
	 * @param  mixed $var     input variable.
	 * @param  mixed $default default variable.
	 * @return mixed Input / defaul variable.
	 */
	public static function validate_var($var, $default = ''){
		if(isset($var) ){
			return $var;
		}

		return $default;
	}

	/**
	 * Trim and check if variable === ''
	 * @param  mixed  $var input variable.
	 * @return boolean true if it's  empty, false if it's not empty.
	 */
	public static function isEmpty($var){
		if(trim($var) === ''){
			return true;
		}

		return false;
	}

	/**
	 * Set default menu fallback.
	 * @return callback default fallbacl to wp_list_page/
	 */
	public static function default_menu_fallback(){
	    echo '<ul>';
	       wp_list_pages( array('depth' => 3,'title_li' => '') ); 
	    echo '</ul>';
	} 

	/**
	 * Set content maximum width. 
	 * @param int $content_width maximum content width.
	 */
	public function set_max_content_width($content_width){
		$this->content_width = $content_width;     
	}

	/**
	 * Apply maximum content width to all WordPress media.
	 * @return int maximum content width.
	 */
	public function get_max_content_width(){
		global $content_width;
		return (!isset($content_width) ) ? $content_width = $this->content_width : $content_width;
	}

	/**
	 * Give aside post format special symbol on the readmore link.
	 * @param boolean $apply_aside_symbol give aside post format or not.
	 * @param string $symbol aside post format symbol.
	 */
	public function set_aside_symbol($apply_aside_symbol){
		if($apply_aside_symbol === true){			
			add_filter( 'the_content', 'add_aside_symbol', 9 ); 
		}
		
		function add_aside_symbol($content){
			if ( has_post_format( 'aside' ) && !is_singular() )
					$content .= Exray::link( get_permalink(), '&#8734;', get_the_title());

			return $content;
		}

	}

	/**
	 * Get the first image on Post if Post Thumbnail not set 
	 * @return string The first image found on post.
	 * http://www.wprecipes.com/how-to-get-the-first-image-from-the-post-and-display-it
	 */
	public static function catch_that_image(){
		global $post, $posts;

		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		if(count($matches [1]))
			$first_img = $matches [1] [0];
		
		return $first_img;
	}

	/**
	 * Load post thumbnail image, if the_post_thumbnail() empty, grab the first image on post.
	 * @return string displayed image on post thumbnail 
	 */
	public static function load_post_thumbnail(){
		global $post, $posts;
		$thumb_id = get_post_thumbnail_id( $post->ID );
		$post_thumbnail = wp_get_attachment_thumb_url( $thumb_id );
		

		/* Check if the_post_thumbnail() != '' */
		if($post_thumbnail){
			the_post_thumbnail();
		}
		/* Get the first image if post thumbnail fail to retrieve image */
		else{
			echo '<img src="'. Exray::catch_that_image() .'" alt="featured image" />';
		}
	}

	/**
	 * Load yoast breadcrumb if WordPress SEO breadcrumb checked.
	 * @return string Breadcrumb navigation.
	 */
	public static function load_breadcrumb(){
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		}
	}

}

?>