<?php
/**
 * ICE Error Dump
 */

/**
 * Special string printer
 *
 * Defined here because other functions may be unavailable
 * 
 * @ignore
 */
function _print_string_safely( $string, $htmlentities = true ) {
	if ( $htmlentities && !is_object( $string ) ) {
		print htmlentities( $string );
	} else {
		print $string;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		PHP <?php _print_string_safely( ICE_Error_Handler::$type ); ?> -
		<?php _print_string_safely( ICE_Error_Handler::$message ); ?>
	</title>
	<style>
		body {
			font-family: 'Arial', 'Helvetica', 'sans-serif';
			font-size: 11px;
		}
		a:link,
		a:visited {
			text-decoration: none;
		}
		a:hover {
			text-decoration: underline;
		}
		pre {
			font-family: 'Lucida Console', 'Courier New', 'Courier', 'monospaced';
			font-size: 11px;
			line-height: 13px;
		}
		div.page {
			padding: 10px;
		}
		table.heading {
			background-color: #444444;
		}
		table.heading td {
			padding: 10px 10px 10px 10px;
			font-family: 'Verdana', 'Arial', 'Helvetica', 'sans-serif';
			font-size: 10px;
			font-weight: bold;
			color: #fefefe;
			vertical-align: middle;
		}
		table.heading td.heading-left {
			font-size: 18px;
			width: 70%;
		}
		table.heading td span.heading-left-small {
			font-size: 10px;
		}
		table.heading td.heading-right {
			width: 30%;
			text-align: right;
		}
		h3.title {
			font-family: 'Verdana', 'Arial', 'Helvetica', 'sans-serif';
			font-size: 19px;
			font-style: italic;
			color: #330055;
		}
		h4 span {
			font-weight: normal;
			margin: 8px;
		}
		div.code {
			background-color: #eeeeee;
			padding: 1px 10px 1px 10px;
		}
		div#how-to-disable {
			padding: 10px;
		}
		ul#globals-dump a.var-show {
			display: block;
		}
		ul#globals-dump div.var-dump {
			padding: 10px;
			margin: 10px;
			border: 1px dashed #bbbbbb;
			white-space: nowrap;
		}
	</style>
	<script type="text/javascript">
		function renderPage(html)
		{
			document.rendered.html.value = html;
			document.rendered.submit();
		}
		function toggleHidden(div)
		{
			var obj = document.getElementById(div);
			var stlSection = obj.style;
			var isCollapsed = obj.style.display.length;

			if (isCollapsed) {
				stlSection.display = '';
			} else {
				stlSection.display = 'none';
			}
		}
	</script>
</head>
<body bgcolor="white" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

	<table class="heading" border="0" cellspacing="0" width="100%">
		<tr>
			<td nowrap="nowrap" class="heading-left">
				<span class="heading-left-small">
					<?php _print_string_safely( ICE_Error_Handler::$type ); ?> in PHP Script<br />
				</span>
				<?php _print_string_safely( $_SERVER["PHP_SELF"] ); ?>
			</td>
			<td nowrap="nowrap" class="heading-right">
				<div>
					<b>PHP Version:</b> <?php _print_string_safely( PHP_VERSION ); ?>
					<b>Zend Engine Version:</b> <?php _print_string_safely( zend_version() ); ?>
				</div>
				<div>
					<b>ICE Version:</b> <?php _print_string_safely( ICE_VERSION ); ?>
				</div>
				<?php
				if ( array_key_exists( 'OS', $_SERVER ) ):
					printf( '<b>Operating System:</b> %s;&nbsp;&nbsp;', $_SERVER['OS'] );
				endif;
				?>
				<div>
					<b>Application:</b> <?php _print_string_safely( $_SERVER['SERVER_SOFTWARE'] ); ?>
					<b>Server Name:</b> <?php _print_string_safely( $_SERVER['SERVER_NAME'] ); ?>
				</div>
				<div>
					<b>HTTP User Agent:</b> <?php _print_string_safely( $_SERVER['HTTP_USER_AGENT'] ); ?>
				</div>
			</td>
		</tr>
	</table>

	<div class="page">

		<h3 class="title">
			<?php _print_string_safely( ICE_Error_Handler::$message_body, false ); ?>
		</h3>

		<form method="post" action="<?php print ICE_ERRORS_URL; ?>/partial-page.php" target="blank" name="rendered">
			<input type="hidden" name="html" value="">
		</form>

		<h4>
			<?php _print_string_safely( ICE_Error_Handler::$type ); ?> Type:
			<span><?php _print_string_safely( ICE_Error_Handler::$object_type ); ?></span>
		</h4>

		<?php if ( isset( ICE_Error_Handler::$rendered_page ) ): ?>
			<script type="text/javascript">
				RenderedPage = "<?php _print_string_safely( ICE_Error_Handler::prep_data_for_script( ICE_Error_Handler::$rendered_page ), false ); ?>";
			</script>
			<h4>
				Rendered Page:
				<span><a href="javascript:renderPage(RenderedPage)">Click here</a> to view contents able to be rendered</span>
			</h4>
		<?php endif; ?>

		<h4>
			Source File:
			<span><?php _print_string_safely( ICE_Error_Handler::$filename ); ?></span>
			Line:
			<span><?php _print_string_safely( ICE_Error_Handler::$line_number ); ?></span>
		</h4>

		<div class="code">
		<?php
			_print_string_safely( '<pre>', false );

			for ( $line_number = max( 1, ICE_Error_Handler::$line_number - 5 ); $line_number <= min( count( ICE_Error_Handler::$file_lines_array ), ICE_Error_Handler::$line_number + 5 ); $line_number++ ) {
				if ( ICE_Error_Handler::$line_number == $line_number ) {
					printf( '<span style="color: #f00;">Line %s:    %s</span>', $line_number, htmlentities( ICE_Error_Handler::$file_lines_array[$line_number - 1] ) );
				} else {
					printf( "Line %s:    %s", $line_number, htmlentities( ICE_Error_Handler::$file_lines_array[$line_number - 1] ) );
				}
			}

			_print_string_safely( '</pre>', false );
			
			unset( $line_number );
		?>
		</div>

		<?php
			if ( isset( ICE_Error_Handler::$error_attribute_array ) ) {
				foreach ( ICE_Error_Handler::$error_attribute_array as $error_attribute ) {
					printf( "<b>%s:</b>&nbsp;&nbsp;", $error_attribute->label );
					$javascript_label = str_replace( " ", "", $error_attribute->label );
					if ( $error_attribute->MultiLine ) {
						printf( "\n<a href=\"javascript:toggleHidden('%s')\">Show/Hide</a>", $javascript_label );
						printf( '<br /><br /><div id="%s" class="code" style="Display: none;"><pre>%s</pre></div><br />', $javascript_label, htmlentities( $error_attribute->contents ) );
					} else {
						printf( "%s\n<br /><br />\n", htmlentities( $error_attribute->contents ) );
					}
				}
				unset( $javascript_label );
				unset( $error_attribute );
			}
		?>

		<h4>Call Stack:</h4>

		<div class="code">
			<pre><?php _print_string_safely( ICE_Error_Handler::$stack_trace ); ?></pre>
		</div>

		<h4>
			Global Variables Dump:
			<span><a href="javascript:toggleHidden('globals-dump')">Show/Hide</a></span>
		</h4>

		<ul id="globals-dump" class="code" style="display: none;">
		<?php

			// sort GLOBALS by key
			ksort( $GLOBALS );

			// loop all and print export
			foreach ( $GLOBALS as $var_key => $var_value ):

				// skip globals self ref
				if ( $var_key == 'GLOBALS' ) {
					continue;
				}

				// render link and output (hidden) ?>
				<li>
					<a class="var-show" href="javascript:toggleHidden('<?php _print_string_safely( $var_key ) ?>')" title="<?php _print_string_safely( $var_key ) ?>">
						<?php _print_string_safely( $var_key ) ?>
					</a>
					<div id="<?php _print_string_safely( $var_key ) ?>" class="var-dump" style="display: none;">
						<?php print ICE_Error_Handler::dump( $var_value, 10, true ); ?>
					</div>
				</li><?php

			endforeach;
		?>
		</ul>

		<h4>
			How to get rid of this error:
		</h4>

		<div id="how-to-disable" class="code">
			To disable error reporting,
			REMOVE the following from wp-config.php or your functions.php::
			<pre class="code">define('ICE_ERROR_REPORTING', true);</pre>
			To completely disable ICE error handling (not recommended),
			add the following to wp-config.php or your functions.php::
			<pre class="code">define('ICE_ERROR_HANDLING', false);</pre>
		</div>

		<hr width="100%" size="1" color="#dddddd" />

		<center>
			<em>
				<?php _print_string_safely( ICE_Error_Handler::$type ); ?>
				Report Generated:
				<?php _print_string_safely( ICE_Error_Handler::$date_time_of_error ); ?>
			</em>
		</center>

	</div>

</body>
</html>