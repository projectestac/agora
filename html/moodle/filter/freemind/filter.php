<?php

/**
 * This filter scans text for links to files created with the FreeMind
 * desktop application (such files have an .mm suffix).  It replaces 
 * the links with an applet that displays the .mm file.
 *
 * The filter recognizes optional 'height' and 'width' specification 
 * appended to the filename.  These are interpreted as the the applet's
 * absolute size in pixels.  For example, the following link will 
 * create a mindmap 300 pixels wide by 450 pixels high.
 *
 *     <a href="http://mysite/file.php/2/my_novel.mm width=300 height=450">xxx</a>
 *
 * The parameters can be given in any order, but must follow the URL 
 * and must be separated by spaces.
 *
 */
function freemind_filter($courseid, $text) {
	global $CFG;
	//           1               2           4      4
	//          pre           basename     inner   post
	$pattern = '(.+)<a .*href=\"(.+)\.mm.*>(.*)</a>(.*)';

	$match = ereg($pattern,$text,$regs);

	if($match){
		$pre = $regs[1];
		$basename = $regs[2];
		$discarded = $regs[3];
		$post = $regs[4];
		// print "<br/>in freemind_filter, matching text = <![CDATA[" . $text . "]]>";
		// print "<br/>in freemind_filter, pre = " . $pre;
		// print "<br/>in freemind_filter, basename = " . $basename;
		// print "<br/>in freemind_filter, discarded = " . $discarded;
		// print "<br/>in freemind_filter, post = " . $post;
		//
		$width  = '100%';
		$height = '100%';
		//
		//  See if a width parameter has been specified
		//
		$pattern = 'width=([0-9]+)';
		$match = ereg($pattern,$text,$regs);

		if($match){
			$width=$regs[1];
			// print "<br/>width = " . $width;
		}
		//
		//  See if a height parameter has been specified
		//
		$pattern = 'height=([0-9]+)';
		$match = ereg($pattern,$text,$regs);

		if($match){
			$height=$regs[1];
			// print "<br/>height = " . $height;
		}
		$text       = $pre . "<br/>";
		$text      .= ' <applet';
		$text      .= ' codebase="./"';
		$text      .= ' archive="' . $CFG->wwwroot . '/filter/freemind/freemindbrowser.jar"';
		$text      .= ' code="freemind.main.FreeMindApplet.class"';
		$text      .= ' width="XXXXXX"';
		$text      .= ' height="YYYYYY"'; 
		$text  .= '>';
		$text  .= ' <param name="type" value="application/x-java-applet;version=1.4">';
		$text  .= ' <param name="scriptable" value="false">';
		$text  .= ' <param name="modes" value="freemind.modes.browsemode.BrowseMode">';
		$text  .= ' <param name="initial_mode" value="Browse">';
		$text  .= ' <param name="selection_method" value="selection_method_direct">';
		$text  .= ' <param name="browsemode_initial_map" value=' . '"ZZZZZZ.mm">';

		$text  .= '</applet> ';
		$text  .= "<br/>" . $post;
		//
		//  Finally, make all replacements
		//
		$search = array();
		$search[0] = "/XXXXXX/";
		$search[1] = "/YYYYYY/";
		$search[2] = "/ZZZZZZ/";

		$replace = array();
		$replace[0] = $width; 
		$replace[1] = $height; 
		$replace[2] = $basename; 

		$text = preg_replace($search, $replace, $text);
	}
	return $text;
}

?>
