<?php
/*************************************************************************************
 *
 * htmlmail.php
 *
 *************************************************************************************/
$language_data = array (
	'LANG_NAME' => 'HTMLMail',
	'COMMENT_SINGLE' => array(),
	'COMMENT_MULTI' => array('<!--' => '-->'),
	'CASE_KEYWORDS' => GESHI_CAPS_NO_CHANGE,
	'QUOTEMARKS' => array("'", '"'),
	'ESCAPE_CHAR' => '\\',
	'KEYWORDS' => array(
		1 => array(
			),
		2 => array(
			'&lt;a&gt;', '&lt;abbr&gt;', '&lt;acronym&gt;', '&lt;address&gt;', '&lt;applet&gt;',
			'&lt;a', '&lt;abbr', '&lt;acronym', '&lt;address', '&lt;applet',
			'&lt;/a&gt;', '&lt;/abbr&gt;', '&lt;/acronym&gt;', '&lt;/address&gt;', '&lt;/applet&gt;',
			'&lt;/a', '&lt;/abbr', '&lt;/acronym', '&lt;/address', '&lt;/applet',

			'&lt;base&gt;', '&lt;basefont&gt;', '&lt;bdo&gt;', '&lt;big&gt;', '&lt;blockquote&gt;', '&lt;body&gt;', '&lt;br&gt;', '&lt;button&gt;', '&lt;b&gt;',
			'&lt;base', '&lt;basefont', '&lt;bdo', '&lt;big', '&lt;blockquote', '&lt;body', '&lt;br', '&lt;button', '&lt;b',
			'&lt;/base&gt;', '&lt;/basefont&gt;', '&lt;/bdo&gt;', '&lt;/big&gt;', '&lt;/blockquote&gt;', '&lt;/body&gt;', '&lt;/br&gt;', '&lt;/button&gt;', '&lt;/b&gt;',
			'&lt;/base', '&lt;/basefont', '&lt;/bdo', '&lt;/big', '&lt;/blockquote', '&lt;/body', '&lt;/br', '&lt;/button', '&lt;/b',

			'&lt;caption&gt;', '&lt;center&gt;', '&lt;cite&gt;', '&lt;code&gt;', '&lt;colgroup&gt;', '&lt;col&gt;',
			'&lt;caption', '&lt;center', '&lt;cite', '&lt;code', '&lt;colgroup', '&lt;col',
			'&lt;/caption&gt;', '&lt;/center&gt;', '&lt;/cite&gt;', '&lt;/code&gt;', '&lt;/colgroup&gt;', '&lt;/col&gt;',
			'&lt;/caption', '&lt;/center', '&lt;/cite', '&lt;/code', '&lt;/colgroup', '&lt;/col',

			'&lt;dd&gt;', '&lt;del&gt;', '&lt;dfn&gt;', '&lt;dir&gt;', '&lt;div&gt;', '&lt;dl&gt;', '&lt;dt&gt;',
			'&lt;dd', '&lt;del', '&lt;dfn', '&lt;dir', '&lt;div', '&lt;dl', '&lt;dt',
			'&lt;/dd&gt;', '&lt;/del&gt;', '&lt;/dfn&gt;', '&lt;/dir&gt;', '&lt;/div&gt;', '&lt;/dl&gt;', '&lt;/dt&gt;',
			'&lt;/dd', '&lt;/del', '&lt;/dfn', '&lt;/dir', '&lt;/div', '&lt;/dl', '&lt;/dt',

			'&lt;em&gt;',
			'&lt;em',
			'&lt;/em&gt;',
			'&lt;/em',

			'&lt;fieldset&gt;', '&lt;font&gt;', '&lt;form&gt;', '&lt;frame&gt;', '&lt;frameset&gt;',
			'&lt;fieldset', '&lt;font', '&lt;form', '&lt;frame', '&lt;frameset',
			'&lt;/fieldset&gt;', '&lt;/font&gt;', '&lt;/form&gt;', '&lt;/frame&gt;', '&lt;/frameset&gt;',
			'&lt;/fieldset', '&lt;/font', '&lt;/form', '&lt;/frame', '&lt;/frameset',

			'&lt;h1&gt;', '&lt;h2&gt;', '&lt;h3&gt;', '&lt;h4&gt;', '&lt;h5&gt;', '&lt;h6&gt;', '&lt;head&gt;', '&lt;hr&gt;', '&lt;html&gt;',
			'&lt;h1', '&lt;h2', '&lt;h3', '&lt;h4', '&lt;h5', '&lt;h6', '&lt;head', '&lt;hr', '&lt;html',
			'&lt;/h1&gt;', '&lt;/h2&gt;', '&lt;/h3&gt;', '&lt;/h4&gt;', '&lt;/h5&gt;', '&lt;/h6&gt;', '&lt;/head&gt;', '&lt;/hr&gt;', '&lt;/html&gt;',
			'&lt;/h1', '&lt;/h2', '&lt;/h3', '&lt;/h4', '&lt;/h5', '&lt;/h6', '&lt;/head', '&lt;/hr', '&lt;/html',

			'&lt;iframe&gt;', '&lt;ilayer&gt;', '&lt;img&gt;', '&lt;input&gt;', '&lt;ins&gt;', '&lt;isindex&gt;', '&lt;i&gt;',
			'&lt;iframe', '&lt;ilayer', '&lt;img', '&lt;input', '&lt;ins', '&lt;isindex', '&lt;i',
			'&lt;/iframe&gt;', '&lt;/ilayer&gt;', '&lt;/img&gt;', '&lt;/input&gt;', '&lt;/ins&gt;', '&lt;/isindex&gt;', '&lt;/i&gt;',
			'&lt;/iframe', '&lt;/ilayer', '&lt;/img', '&lt;/input', '&lt;/ins', '&lt;/isindex', '&lt;/i',

			'&lt;kbd&gt;',
			'&lt;kbd',
			'&t;/kbd&gt;',
			'&lt;/kbd',

			'&lt;label&gt;', '&lt;legend&gt;', '&lt;link&gt;', '&lt;li&gt;',
			'&lt;label', '&lt;legend', '&lt;link', '&lt;li',
			'&lt;/label&gt;', '&lt;/legend&gt;', '&lt;/link&gt;', '&lt;/li&gt;',
			'&lt;/label', '&lt;/legend', '&lt;/link', '&lt;/li',

			'&lt;map&gt;', '&lt;meta&gt;',
			'&lt;map', '&lt;meta',
			'&lt;/map&gt;', '&lt;/meta&gt;',
			'&lt;/map', '&lt;/meta',

			'&lt;noframes&gt;', '&lt;noscript&gt;',
			'&lt;noframes', '&lt;noscript',
			'&lt;/noframes&gt;', '&lt;/noscript&gt;',
			'&lt;/noframes', '&lt;/noscript',

			'&lt;object&gt;', '&lt;ol&gt;', '&lt;optgroup&gt;', '&lt;option&gt;',
			'&lt;object', '&lt;ol', '&lt;optgroup', '&lt;option',
			'&lt;/object&gt;', '&lt;/ol&gt;', '&lt;/optgroup&gt;', '&lt;/option&gt;',
			'&lt;/object', '&lt;/ol', '&lt;/optgroup', '&lt;/option',

			'&lt;param&gt;', '&lt;pre&gt;', '&lt;p&gt;',
			'&lt;param', '&lt;pre', '&lt;p',
			'&lt;/param&gt;', '&lt;/pre&gt;', '&lt;/p&gt;',
			'&lt;/param', '&lt;/pre', '&lt;/p',

			'&lt;q&gt;',
			'&lt;q',
			'&lt;/q&gt;',
			'&lt;/q',

			'&lt;samp&gt;', '&lt;script&gt;', '&lt;select&gt;', '&lt;small&gt;', '&lt;span&gt;', '&lt;strike&gt;', '&lt;strong&gt;', '&lt;style&gt;', '&lt;sub&gt;', '&lt;sup&gt;', '&lt;s&gt;',
			'&lt;samp', '&lt;script', '&lt;select', '&lt;small', '&lt;span', '&lt;strike', '&lt;strong', '&lt;style', '&lt;sub', '&lt;sup', '&lt;s',
			'&lt;/samp&gt;', '&lt;/script&gt;', '&lt;/select&gt;', '&lt;/small&gt;', '&lt;/span&gt;', '&lt;/strike&gt;', '&lt;/strong&gt;', '&lt;/style&gt;', '&lt;/sub&gt;', '&lt;/sup&gt;', '&lt;/s&gt;',
			'&lt;/samp', '&lt;/script', '&lt;/select', '&lt;/small', '&lt;/span', '&lt;/strike', '&lt;/strong', '&lt;/style', '&lt;/sub', '&lt;/sup', '&lt;/s',

			'&lt;table&gt;', '&lt;tbody&gt;', '&lt;td&gt;', '&lt;textarea&gt;', '&lt;text&gt;', '&lt;tfoot&gt;', '&lt;thead&gt;', '&lt;th&gt;', '&lt;title&gt;', '&lt;tr&gt;', '&lt;tt&gt;',
			'&lt;table', '&lt;tbody', '&lt;td', '&lt;textarea', '&lt;text', '&lt;tfoot', '&lt;tfoot', '&lt;thead', '&lt;th', '&lt;title', '&lt;tr', '&lt;tt',
			'&lt;/table&gt;', '&lt;/tbody&gt;', '&lt;/td&gt;', '&lt;/textarea&gt;', '&lt;/text&gt;', '&lt;/tfoot&gt;', '&lt;/thead', '&lt;/tfoot', '&lt;/th&gt;', '&lt;/title&gt;', '&lt;/tr&gt;', '&lt;/tt&gt;',
			'&lt;/table', '&lt;/tbody', '&lt;/td', '&lt;/textarea', '&lt;/text', '&lt;/tfoot', '&lt;/tfoot', '&lt;/thead', '&lt;/th', '&lt;/title', '&lt;/tr', '&lt;/tt',

			'&lt;ul&gt;', '&lt;u&gt;',
			'&lt;ul', '&lt;u',
			'&lt;/ul&gt;', '&lt;/ul&gt;',
			'&lt;/ul', '&lt;/u',

			'&lt;var&gt;',
			'&lt;var',
			'&lt;/var&gt;',
			'&lt;/var',

			'&gt;', '&lt;'
			),
		3 => array(
			'abbr', 'accept-charset', 'accept', 'accesskey', 'action', 'align', 'alink', 'alt', 'archive', 'axis',
			'background', 'bgcolor', 'border',
			'cellpadding', 'cellspacing', 'char', 'char', 'charoff', 'charset', 'checked', 'cite', 'class', 'classid', 'clear', 'code', 'codebase', 'codetype', 'color', 'cols', 'colspan', 'compact', 'content', 'coords',
			'data', 'datetime', 'declare', 'defer', 'dir', 'disabled',
			'enctype',
			'face', 'for', 'frame', 'frameborder',
			'headers', 'height', 'href', 'hreflang', 'hspace', 'http-equiv',
			'id', 'ismap',
			'label', 'lang', 'language', 'link', 'longdesc',
			'marginheight', 'marginwidth', 'maxlength', 'media', 'method', 'multiple',
			'name', 'nohref', 'noresize', 'noshade', 'nowrap',
			'object', 'onblur', 'onchange', 'onclick', 'ondblclick', 'onfocus', 'onkeydown', 'onkeypress', 'onkeyup', 'onload', 'onmousedown', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onreset', 'onselect', 'onsubmit', 'onunload',
			'profile', 'prompt',
			'readonly', 'rel', 'rev', 'rowspan', 'rows', 'rules',
			'scheme', 'scope', 'scrolling', 'selected', 'shape', 'size', 'span', 'src', 'standby', 'start', 'style', 'summary',
			'tabindex', 'target', 'text', 'title', 'type',
			'usemap',
			'valign', 'value', 'valuetype', 'version', 'vlink', 'vspace',
			'width'
			)
		),
	'SYMBOLS' => array(
		'/', '='
		),
	'CASE_SENSITIVE' => array(
		GESHI_COMMENTS => false,
		1 => false,
		2 => false,
		3 => false,
		),
	'STYLES' => array(
		'KEYWORDS' => array(),
		'COMMENTS' => array(),
		'ESCAPE_CHAR' => array(),
		'BRACKETS' => array(),
		'STRINGS' => array(),
		'NUMBERS' => array(),
		'METHODS' => array(
			),
		'SYMBOLS' => array(),
		'SCRIPT' => array(),
		'REGEXPS' => array(
			)
		),
	'URLS' => array(),
	'OOLANG' => false,
	'OBJECT_SPLITTERS' => array(
		),
	'REGEXPS' => array(
		),
	'STRICT_MODE_APPLIES' => GESHI_ALWAYS,
	'SCRIPT_DELIMITERS' => array(
		0 => array(
			'<!DOCTYPE' => '>'
			),
		1 => array(
			'&' => ';'
			),
		2 => array(
			'<' => '>'
			)
	),
	'HIGHLIGHT_STRICT_BLOCK' => array(
		0 => false,
		1 => false,
		2 => true
		)
);

?>