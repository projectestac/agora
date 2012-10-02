<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Jorn Wildt
 * @link http://www.elfisk.dk
 * @version $Id: block.contentbuttons.php 356 2010-01-04 14:43:31Z herr.vorragend $
 * @license See license.txt
 */

function smarty_block_contentbuttons($params, $content, &$render) 
{
  if ($content)
  {
    echo "<div class=\"content_buttons\">\n";
    echo $content;
    echo "</div>\n";
  }
}
