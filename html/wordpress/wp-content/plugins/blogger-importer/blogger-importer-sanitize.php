<?php

/**
 * New class to sanitize trusted content from blogger import
 * Based on the SimplePie_Sanitize class by Ryan Parman and Geoffrey Sneddon
 *
 */

class Blogger_Importer_Sanitize extends SimplePie_Sanitize
{
    // Private vars
    var $base;

    // Options
    var $image_handler = '';
    var $strip_htmltags = array('base', 'blink', 'body', 'doctype', 'font', 'form', 'frame', 'frameset', 'html', 'input', 'marquee', 'meta', 'script', 'style');
    //Allow iframe (new style) and embed, param and object(old style) so that we get youtube videos transferred
    //Allow object and noscript for Amazon widgets
    var $encode_instead_of_strip = false;
    var $strip_attributes = array('bgsound', 'class', 'expr', 'id', 'imageanchor', 'onclick', 'onerror', 'onfinish', 'onmouseover', 'onmouseout', 'onfocus', 'onblur', 'lowsrc', 'dynsrc', 'trbidi');
    //Allow styles so we don't have to redo in WordPress
    //Brett Morgan from Google has confirmed that imageanchor is a made up attribute that is just used in the blogger editor so we can remove that
    //trbidi another blogger proprietory attribute
    var $output_encoding = 'UTF-8';
    var $enable_cache = true;
    var $cache_location = './cache';
    var $cache_name_function = 'md5';
    var $cache_class = 'SimplePie_Cache';
    var $file_class = 'SimplePie_File';
    var $timeout = 10;
    var $useragent = '';
    var $force_fsockopen = false;

    var $replace_url_attributes = array('a' => 'href', 'area' => 'href', 'blockquote' => 'cite', 'del' => 'cite', 'form' => 'action', 'img' => array('longdesc', 'src'), 'input' => 'src', 'ins' => 'cite',
        'q' => 'cite');

    public function __construct()
        {
            parent::__construct();
        }

    function _normalize_tag($matches)
    {
        return '<' . strtolower($matches[1]);
    }

    function sanitize($data, $type, $base = '')
    {
        //Simplified function
        $data = trim($data);
        
        // Normalise tags (string replacement is case sensitive)
        $data = preg_replace_callback('|<(/?[A-Z]+)|', array(&$this, '_normalize_tag'), $data);

        // Remappings
        $data = str_replace('<br>', '<br />', $data);
        $data = str_replace('<hr>', '<hr />', $data);
        //<span style="font-weight:bold;">Workshopshed:</span> > <b>Workshopshed:</b>
        $data = preg_replace('|(<span style="font-weight:bold;">)(?<!<span style="font-weight:bold;">).*(.*)(</span>)|', '<strong>$2</strong>', $data);

        //N.B. Don't strip comments as blogger uses <!--more--> which is the same as WordPress
        //     Comments might also contain section targetting e.g. <!-- google_ad_section_start -->

        //Now clean up
        foreach ($this->strip_htmltags as $tag)
        {
            $pcre = "/<($tag)" . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . "(>(.*)<\/$tag" . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . '>|(\/)?>)/siU';
            while (preg_match($pcre, $data))
            {
                $data = preg_replace_callback($pcre, array(&$this, 'do_strip_htmltags'), $data);
            }
        }

        foreach ($this->strip_attributes as $attrib)
        {
            $data = preg_replace('/(<[A-Za-z][^\x09\x0A\x0B\x0C\x0D\x20\x2F\x3E]*)' . SIMPLEPIE_PCRE_HTML_ATTRIBUTE . trim($attrib) . '(?:\s*=\s*(?:"(?:[^"]*)"|\'(?:[^\']*)\'|(?:[^\x09\x0A\x0B\x0C\x0D\x20\x22\x27\x3E][^\x09\x0A\x0B\x0C\x0D\x20\x3E]*)?))?' .
                SIMPLEPIE_PCRE_HTML_ATTRIBUTE . '>/', '\1\2\3>', $data);
        }

        // Replace relative URLs
        $this->base = $base;
        
        foreach ($this->replace_url_attributes as $element => $attributes)
        {
            $data = $this->replace_urls($data, $element, $attributes);
        }

        // Images are handled as a separate step as we need to download them

        // Having (possibly) taken stuff out, there may now be whitespace at the beginning/end of the data
        $data = trim($data);

        return $data;
    }

    function replace_urls($data, $tag, $attributes)
    {
        //This seems to do nothing at all!?
        if (!is_array($this->strip_htmltags) || !in_array($tag, $this->strip_htmltags))
        {
            $elements = SimplePie_Misc::get_element($tag, $data);
            foreach ($elements as $element)
            {
                if (is_array($attributes))
                {
                    foreach ($attributes as $attribute)
                    {
                        if (isset($element['attribs'][$attribute]['data']))
                        {
                            $element['attribs'][$attribute]['data'] = SimplePie_Misc::absolutize_url($element['attribs'][$attribute]['data'], $this->base);
                            $new_element = SimplePie_Misc::element_implode($element);
                            $data = str_replace($element['full'], $new_element, $data);
                            $element['full'] = $new_element;
                        }
                    }
                } elseif (isset($element['attribs'][$attributes]['data']))
                {
                    $element['attribs'][$attributes]['data'] = SimplePie_Misc::absolutize_url($element['attribs'][$attributes]['data'], $this->base);
                    $data = str_replace($element['full'], SimplePie_Misc::element_implode($element), $data);
                }
            }
        }
        return $data;
    }

    //Latest SimplePie checks for this function
    public function set_registry(SimplePie_Registry $registry)
	{
		parent::set_registry($registry);
	}

}

?>