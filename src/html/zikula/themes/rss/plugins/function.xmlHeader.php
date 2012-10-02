<?php
/**
 * Smarty function sets correct http header for RSS feeds
 *
 * @author   Steffen Voss
 * @since    06. Jan. 2009
 */

function smarty_function_xmlHeader()
{
	header("Content-type: application/rss+xml");
}