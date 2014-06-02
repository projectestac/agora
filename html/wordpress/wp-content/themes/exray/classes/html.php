<?php
/**
 * return HTML items
 */
class HTML {

	public static function link($href, $text, $title)
	{
		return "<a href='". $href ."' title='$title'>$text</a>";
	}

	public static function list_items($items)
	{
		return "<ul><li>" . implode('</li><li>', $items) . '</li></ul>';
	}

	public static function image($src, $alt = '')
	{
		return "<img src='$src' alt='$alt' />";
	}

	public static function input($type, $id, $name, $value = '', $aria_required = false){
		return "<input type='$type' id='$id' name='$name' value='$value' aria-required='$aria_required'>";
	}

	public static function textarea($name, $id, $cols='', $rows='', $value=''){
		return "<textarea name='$name' id='$id' cols='$cols' rows='$rows'>$value</textarea>";
	}

	public static function span($class, $value){
		return "<span class='$class'> {$value} </span>";
	}
	
	public static function label($for, $value){
		return "<label for='$for'> {$value} </label>";
	}

	// Implement SCRIPT
}


?>