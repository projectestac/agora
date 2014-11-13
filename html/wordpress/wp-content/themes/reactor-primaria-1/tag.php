<?php
/**
 * The template for displaying posts by tag
 *
 * @package Reactor
 * @subpackge Templates
 * @since 1.0.0
 */
?>

<?php
    global $etiqueta;
    $etiqueta=  get_query_var('tag');
?>

    <?php get_header(); ?>

	<div id="primary" class="site-content">
    
    	<?php reactor_content_before(); ?>
    
        <div id="content" role="main">
        	<div class="row">
 		<?php get_sidebar(); ?>
                <div class="articles <?php reactor_columns(); ?>">
                
                <?php reactor_inner_content_before(); ?>
                
				<?php if ( have_posts() ) : ?>
                    <header class="archive-header">
                        
                    <?php // show an optional tag description
                        if ( tag_description() ) : ?>
                            <div class="archive-meta">
                            <?php echo tag_description(); ?>
                            </div>
                    <?php endif; ?>
                    </header><!-- .archive-header -->
                <?php endif; // end have_posts() check ?> 
                
                <?php
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                       
                $temp=$wp_query;
                $wp_query=null;

                $args = array( 
                    'post_type'      => 'post',
                    'posts_per_page' => 10,
                    'paged' => $paged
                );

                $wp_query = new WP_Query( $args );  
                
               
                //TODO: get values from tag settings
                $posts_per_fila1 = $posts_per_fila2 = $posts_per_filan = 2;

                reactor_loop_before();
                get_template_part('loops/loop', 'taxonomy'); 
                reactor_loop_after();

                wp_reset_postdata();
                $wp_query=$temp;
                ?>
                
                <?php reactor_inner_content_after(); ?>
                
                </div><!-- .columns -->
                
               
                
            </div><!-- .row -->
        </div><!-- #content -->
        
        <?php reactor_content_after(); ?>
        
	</div><!-- #primary -->

<?php get_footer(); ?>
