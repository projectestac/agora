<?php
	// begin rendering by passing our element id prefix
	infinity_dashboard_cpanel_render_begin( 'infinity-cpanel-' );
?>

<div id="infinity-cpanel" class="wrap nosubsub">

	<!-- header -->
	<div id="infinity-cpanel-header" class="ui-widget-header ui-corner-top">
		<?php
			// use load template to make header template overridable
			infinity_dashboard_load_template( 'cpanel_header.php' );
		?>
	</div>

	<!-- toolbar -->
	<div id="infinity-cpanel-toolbar">

		<!-- menu -->
		<a id="infinity-cpanel-menubutton" title="<?php _e( 'infinity', infinity_text_domain ) ?>"><?php _e( 'infinity', infinity_text_domain ) ?></a>
		<ul id="infinity-cpanel-menu">
			<?php infinity_dashboard_cpanel_render_menu_items(); ?>
		</ul>

		<!-- toolbar buttons -->
		<?php infinity_dashboard_cpanel_render_toolbar_buttons(); ?>
		
		<?php if ( true === INFINITY_DEV_MODE ): ?>
			<!-- refresh button -->
			<a id="infinity-cpanel-refreshbutton" title="<?php _e( 'Refresh current tab', infinity_text_domain ) ?>">
				<?php _e('Refresh', infinity_text_domain ) ?>
			</a>
			<!-- scroll button -->
			<input id="infinity-cpanel-scrollbutton" type="checkbox" />
			<label for="infinity-cpanel-scrollbutton" title="<?php _e( 'Toggle scroll bars on/off', infinity_text_domain ) ?>"><?php _e( 'Scrolling', infinity_text_domain ) ?></label>
		<?php endif; ?>

	</div>

	<!-- tabs -->
	<div id="infinity-cpanel-tabs">
		<ul><!-- tabs are injected here --></ul>
		<!-- panels are injected here -->
	</div>

</div>

<script type="text/javascript">
(function($){

	// its pretty safe to hack this code as its all config/preference.
	// all of the logic code is safely tucked away in cpanel.js

	var menuButton =
			$( 'a#infinity-cpanel-menubutton' ).button({
				icons: { secondary: 'ui-icon-triangle-1-s' }
			});
	var refreshButton =
			$( 'a#infinity-cpanel-refreshbutton' ).button({
				icons: { primary: 'ui-icon-refresh' }
			});
	var scrollButton =
			$( 'input#infinity-cpanel-scrollbutton' ).button({
				icons: { primary: 'ui-icon-arrow-2-n-s' }
			});	
	var menu =
			$( 'ul#infinity-cpanel-menu' ).buttonmenu({
				button: menuButton
			});
	var toolbar =
			$( 'div#infinity-cpanel-toolbar' ).toolbar();

	$('div#infinity-cpanel-tabs').cpaneltabs({
		availableTabs: <?php infinity_dashboard_cpanel_render_available_tabs() ?>,
		defaultAnchor: 'a#infinity-cpanel-toolbarbutton-start',
		idPrefix: 'infinity-cpanel-tab-',
		refreshButton: refreshButton,
		scrollButton: scrollButton,
		toolbar: toolbar
	});

})(jQuery);
</script>

<?php
	// renders dynamic scripts and performs cleanup
	infinity_dashboard_cpanel_render_end();
?>