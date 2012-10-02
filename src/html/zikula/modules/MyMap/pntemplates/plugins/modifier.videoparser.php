<?php
/**
 * @package      MyMap
 * @version      $Id: function.divpager.php 91 2008-08-24 09:05:40Z quan $
 * @author       Florian Schießl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
function smarty_modifier_videoparser($text=null)
{
  	$text = (string)$text;
	if (eregi('youtube\.com\/watch\?v=',$text)) {
	  	$a = explode('?v=',$text);
	  	$code = $a[1];
		$content = '<object width=425 height=344><param name=movie value=http://www.youtube.com/v/'.$code.'&hl=de&fs=1></param><param name=allowFullScreen value=true></param><param name=allowscriptaccess value=always></param><embed src=http://www.youtube.com/v/'.$code.'&hl=de&fs=1 type=application/x-shockwave-flash allowscriptaccess=always allowfullscreen=true width=425 height=344></embed></object>';
	}
	else if (eregi('myvideo\.de\/watch\/',$text)) {
	  	$a = explode('watch/',$text);
	  	$aa = $a[1];
	  	$aaa = explode('/',$aa);
	  	$code = $aaa[0];
	  	$content ="<object style='width:470px;height:406px;' width='470' height='406' type='application/x-shockwave-flash' data='http://www.myvideo.de/movie/".$code."'><param name='movie' value='http://www.myvideo.de/movie/".$code."'></param><param name='AllowFullscreen' value='true'></param><embed src='http://www.myvideo.de/movie/".$code."' width='470' height='406'></embed></object>";
	}
	// now return code for content
	if (isset($content) && (strlen($content) > 0)) return $content."<br />";
	else return pnVarPrepForDisplay($text).":";
}
