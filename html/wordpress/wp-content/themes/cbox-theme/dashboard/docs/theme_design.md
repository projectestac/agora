## CSS and HTML

If you look at the basic HTML structure of all the Base Templates you'll see that
all the elements are neatly tucked inside wrapper divs. We've done this so you can
easily position them anywhere you want without having to jump through hoops.

The illustration below gives you a quick overview of the main divs present in the templates. 

<a href="infinity://admin:image/docs/HTML-overview.jpg" target="_blank">
	<img src="infinity://admin:image/docs/HTML-overview-small.png" style="max-width: 90%;">
</a>

> The easiest way to get familiar with the template structure is to simply experiment
inside a Child Theme and custom styling to the style.css of your Child Theme. This will
overwrite the base.css styling and will allow you to quickly make a unique layout. 

### The Grid

The Infinity base theme comes with a basic CSS Grid system to let you quickly create layouts.
If you've never worked with a Grid before we strongly advise you to read this article covering
the basics:

[The 960 Grid System Made Easy](http://sixrevisions.com/web_design/the-960-grid-system-made-easy/)

**Important: The Infinity 960 Grid contains 24 columns.**
 
> The Most important thing to remember is that when you create columns you have to make sure
the class names add up to 24 to fill the entire width of the page.
 
`div#content` has class grid\_16 and `div#sidebar` has class grid\_8.
Combined (16+8) they add up to 24.

If you'd like to have a three columns on the page you could create 3 divs with a class
of grid\_8 (3 x 8 = 24).
 
Check out the working example included with the Infinity Child Theme example
(grid-example.php). If you want to see it in action just assign the "Grid Example"
template to a WordPress page on your install.

### Changing the default grid classes

By default the `#content` div has a grid\_16 class applied to it, and the `div#sidebar` a grid\_8
class. This is the most commonly used layout with a content area which is twice as wide
as the sidebar. The classes are added with jQuery and are not hardcoded into the theme
templates. We used this approach because adding the classes with javascript ensures
compatibility with 3rd party plugins like BuddyPress, BBPress and others. 

If you'd like to change the default Grid classes you simply needed to enqueue a javascript
file and remove the default classes and replace them by your custom ones.

Here's a quick guide:

#### Step 1:

Create a new file in your assets/js/ folder in your Child Theme called grid.js

Put the following code into the file and save:

	/**
	 * Custom Grid Classes
	 */
	(function($){
		$(document).ready(function() {
	
			// remove the default Grid classes
			jQuery('#content').removeClass('grid_16');
			jQuery('#content').removeClass('grid_8');
			
			//add a new grid class
			jQuery('#content').addClass('grid_14');
			jQuery('#sidebar').addClass('grid_10');
			
		});
	})(jQuery);

####Step 2:

Open up infinity.ini located in the /config folder of your Child Theme.

Add the following lines to the file:

	[script]
	grid = "assets/js/grid.js"

That's it! You've now changed the layout of your Child Theme.

> If you combine this newfound knowledge with the Hooks included with Infinity you
  can do some pretty amazing stuff without modifying ANY templates.

### Advanced Example: Adding a Alternate Sidebar to your Theme.

In this example we'll add a widgetized sidebar to your Child Theme using the grid.js
file we created in the previous example and some code in functions.php of your Child Theme. 

####Step 1:

First we'll register the new sidebar by adding the following code to functions.php

	/**
	 * Register sidebars
	 */
	function infinity_base_alt_sidebar()
	{
		register_sidebar(array(
			'name' => 'Alternative Sidebar',
			'id' => 'alt-sidebar',
			'description' => "The Alternative widget area",
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>'
		));
	}
	add_action( 'init', 'infinity_base_alt_sidebar' );

Now that we've added the sidebar we can use hooks to insert the actual HTML before the content. 

####Step 2:

We'll use the `open_main_wrap` hook to add the html and php code the templates.
This hooks allows you to insert content just before the content div, just at the
right place to insert a 2nd sidebar. 

Add this code to functions.php of your Child Theme:

	// Alt Sidebar
	function example_alt_sidebar() { { ?>
	<!-- html -->
	<div id="sidebar-alt">	
		<?php
			if ( is_active_sidebar( 'alt-sidebar' ) ) {
			dynamic_sidebar( 'alt-sidebar');
		} else { ?>
			<div class="widget"><h4>Blog Sidebar.</h4>
			<a href="<?php echo home_url( '/'  ); ?>wp-admin/widgets.php" title="Add Widgets">Add Widgets</a></div><?php
		}
		?>
	</div>	
	<!-- end -->
	<?php }} 
	// Hook into action
	add_action('open_main_wrap','example_alt_sidebar');

###Step 3:

Now that we have everything in place, all we need to do is add the proper CSS grid
classes with our Grid.js file to get the layout we want.

Add the following code to your Grid.js file 

	/**
	 * Copyright © 2011 Bowe Frankema
	 */
	(function($){
		$(document).ready(function() {
	
			// remove the default Grid classes
			jQuery('#content').removeClass('grid_16');
			jQuery('#sidebar').removeClass('grid_8');
			
			//add a new grid class
			jQuery('#content').addClass('grid_14');
			jQuery('#sidebar').addClass('grid_5');
			jQuery('#sidebar-alt').addClass('grid_5 alpha');
			
		});
	})(jQuery);

We've now created and added a new sidebar to Infinity with only a few lines of code
and no templates modifications. Because we use jQuery to add the CSS grid classes to
the templates this layout can me modified quick and easy and is fully compatible with
BuddyPress and other plugins. 