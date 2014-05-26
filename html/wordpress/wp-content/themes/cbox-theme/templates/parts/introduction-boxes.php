<?php
/**
 * Infinity Theme: introduction boxes template
 *
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package Infinity
 * @subpackage templates
 * @since 1.0
 */

	// show the category box when on a category page
	if ( is_category() ):
?>
		<div class="category-box">
			<div id="category-description">
			<header>
			<h1 id= "category-title" class="page-title">
				<?php
					printf( __( 'Category Archives: <span>%s</span>', infinity_text_domain ), single_cat_title( '', false ) );
				?>
			</h1>
			</header>
			<?php
				// get cat desc
				$category_description = category_description();
				// print it?
				if ( !empty( $category_description ) ) {
					print $category_description;
				}
			?>
			</div>
		</div>
<?php
	endif;
?>

<!-- Show The tag box when on a Tags Page -->
<?php
	if ( is_tag() ):
?>
		<div class="tag-box">
			<div id="tag-description">
			<header>
			<h1 id="tag-title" class="page-title">
				<?php
					printf( __( 'Tag Archives: <span>%s</span>', infinity_text_domain ), single_tag_title( '', false ) );
				?>
			</h1>
			</header>
			<?php
					$tag_description = tag_description();
					if ( ! empty( $tag_description ) )
						echo  $tag_description ;
				?>
			</div>
		</div>
<?php
	endif;

	// load author box if on author page
	infinity_base_author_box();
?>

<?php
	// show the archive box when on an archive page
	if ( is_day() || is_month() || is_year() ):
?>
		<div class="category-box">
			<div id="category-description">
			<header>
			<h1 id= "category-title" class="page-title">
				<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', infinity_text_domain ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', infinity_text_domain ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', infinity_text_domain ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
						<?php endif; ?>
			</header>
			</div>
		</div>
<?php
	endif;
?>
