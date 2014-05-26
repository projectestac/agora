<?php
/**
 * BP Docs Wiki - Sidebar template
 */

do_action( 'before_sidebar' );
?>

<aside id="sidebar" role="complementary" class="<?php do_action( 'sidebar_class' ); ?>">
	<?php
		do_action( 'open_sidebar' );
		dynamic_sidebar( 'wiki-sidebar' );
		do_action( 'close_sidebar' );
		do_action( 'after_sidebar' );
	?>
</aside>
