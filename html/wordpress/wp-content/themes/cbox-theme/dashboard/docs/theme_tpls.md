## The Templates

The Base Theme contains all the essential WordPress templates, and a
whole bunch of optional templates to offer maximum flexibility and functionality
for your projects.

### Template Parts Make Life Easier!

The templates make heavy use of the Template Parts functionality
added to WordPress since 3.0 (just like TwentyTen en TwentyEleven) which makes it very
easy to quickly modify (parts of) the templates.

### Use Actions instead of Hacktions!

We've decided to keep the templates very clean and free of bloat. Instead you can
extend the Theme using 40+ do\_action hooks, a custom functions.php file or Infinity Extensions.
There's a reason we used "More freedom to create" to describe Infinity.

> Before you copy a template and start hacking away at it, take the time to
  find a way to **extend** the template. **Spend your time developing themes, not
  maintaining templates.**

### Base Template Example

Here's the entire index.php template:

	<?php
		infinity_get_header();
	?>
		<div id="content" role="main">
			<?php
				do_action( 'open_content' );
				do_action( 'open_home' );
			?>
			<div id="home-page" role="main" <?php post_class(); ?>>
				<?php
					// load intro box
					infinity_get_template_part(
						'templates/parts/introduction-boxes', 'index' );
					// load main loop
					infinity_get_template_part(
						'templates/loops/loop', 'index' );
				?>
			</div>
			<?php
				do_action( 'close_home' );
				do_action( 'close_content' );
			?>
		</div>
	<?php
		infinity_get_sidebar();
		infinity_get_footer();
	?>


### Using Loops

By separating the WordPress loops from the templates and putting them in a
separate file, it's much easier to re-use these loops anywhere in your child
templates.

The Base theme contains the following loops you can use:

* Loop-Attachment (Loop used to display media attachments)
* Loop-page (A loop to display a basic WordPress page)
* Loop-Single (Displays a single post including post meta and author box)
* Loop (the standard loop for displaying posts)

#### Custom Loop Template

Here's an example of a custom template that adds a query just before the loop
template, to display the latest post:

	<?php infinity_get_header(); ?>
	
	<div class="blog-intro">
		<h2>Welcome to the Infinity Base Theme. We hope you enjoy the show! <h2>
	</div>
	
	<div id="content" role="main">
	
		<div class="page" id="blog-latest" role="main">	
			<!-- #use a custom query to display the latest blogpost -->	
			<?php query_posts( 'posts_per_page=1' );?>
			<!-- #get the standard loop template from the Base theme -->	
			<?php get_template_part( 'templates/loops/loop' ); ?>	
		</div>
	
	</div><!-- #content -->
	
	<?php infinity_get_footer(); ?>


In this example the standard loop template has been loaded from:

	infinity/templates/loops/loop

If you want to customize the loop, all you would need to do is copy over
this template into your Child Theme folder and customize it as needed.

![Loop Example](infinity://admin:image/docs/loop-example.png)

### Using Hooks

The templates in the Base Theme contain multiple hooks. This makes it easy to add
custom content anywhere in your Child Theme. The easiest way to do this is to add a
small snippet of code to the functions.php of your Child Theme.

#### Custom Hook Template

The example below shows you how to add some custom content before a single post.

	// Single Intro Text
	function example_single_intro() { ?>
	<!-- html -->
		<div class="widget">
			This is a hook example text displayed before a Single Post
		</div>
	<!-- end -->
	<?php }
	// Hook into the right section of the Theme.
	add_action('open_single','example_single_intro');

The result:

![Hook Example](infinity://admin:image/docs/hook-example.png)

> We strongly advise you to always look at the available hooks first before you modify
  any of the templates. By doing this you  'll ensure yourself of the most upgrade-safe
  Child Theme possible.


### Template Parts

Template parts are used throughout the templates and these files contain specific parts
of functionality that is common in most professional WordPress themes.

The Infinity Base theme has the following template parts:

> These can be found in infinity/templates/parts/

* **author-box** - Displays author info below single posts and on author archive pages
* **header-content** - All of the content in the header
* **header-head** - HTML HEAD and TITLE elements
* **introduction-boxes** - Category/Tag/Author descriptions
* **main-menu** - The main menu navigation
* **page-navigation** - Pagination functionality used on archives
* **post-meta-bottom** - Post meta displayed below a post
* **post-meta-top** - Post meta like comments, post category and author displayed before a post
* **sub-menu** - Navigation menu below the header
* **top-menu** - Navigation menu above the header

#### Custom Template Parts (overriding)

Just like all the other templates in the base theme, these templates can be easily
customized by copying them to your Child Theme folder. The only thing you need to keep
in mind is that you need to keep the same folder structure.

So if you wanted to customize the Author Box, you'd copy the author-box.php file to:

	my-child-theme/templates/parts/author-box.php

then customize it as you wish.