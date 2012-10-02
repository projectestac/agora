<?php
function WF_filter_fix($text) {
	global $TAGS;
	$text = WF_filter_fix_content($text, $TAGS->in_mathopen, $TAGS->in_mathclose);
	return WF_filter_fix_content($text, $TAGS->in_appletopen, $TAGS->in_appletclose);
}

function WF_filter_fix_content($text, $openTag, $closeTag) {
	$output = '';
	$start = 0;
	$end = 0;
	$openTagLength = strlen($openTag);
	$closeTagLength = strlen($closeTag);
	
	while (($start = strpos($text, $openTag, $end)) !== false) {
		$output .= substr($text, $end, $start - $end);			// Adding the text at left.
		$end = strpos($text, $closeTag, $start + $openTagLength);
		
		if ($end === false) {
			$end = strlen($text);
		}
		else {
			$end += $closeTagLength;
		}
		
		$mathml = substr($text, $start, $end - $start);
		$output .= WF_filter_fix_links($mathml);
	}
	
	$output .= substr($text, $end, strlen($text) - $end);	// Adding the text at right.
	return $output;
}

function WF_filter_fix_links($text) {
	$pattern = '/<a href="[^"]*" target="_blank">([^<]*)<\/a>/';
	$replacement = '\1';
	return preg_replace($pattern, $replacement, $text);
}
?>