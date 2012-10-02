<?php
// $Id: bbcode_admin_confighandler.class.php 217 2009-11-12 17:06:36Z herr.vorragend $
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

class bbcode_admin_confighandler
{

    function initialize(&$pnRender)
    {
        $dom = ZLanguage::getModuleDomain('bbcode');

        $pnRender->caching = false;
        $pnRender->add_core_data();
        $pnRender->assign('mimetex_url', pnModGetVar('bbcode','mimetex_url'));
        $pnRender->assign('quote_preview', nl2br(pnModAPIFunc('bbcode', 'user', 'transform',
                                                              array('objectid' => 1,
                                                                    'extrainfo' => "[quote=username]test\ntest test\n[/quote]"))));
        $hiliteoptions = array(array('text' => __('No highlighting', $dom), 'value' => 0),
                               array('text' => __('GeSHi with line numbers', $dom), 'value' => 1),
                               array('text' => __('GeSHi without line numbers', $dom), 'value' => 2),
                               array('text' => __('Google Code Prettifier', $dom), 'value' => 3));
        $pnRender->assign('hiliteoptions', $hiliteoptions);
        $pnRender->assign('code_preview', pnModAPIFunc('bbcode', 'user', 'transform',
                                                        array('objectid' => 1,
                                                              'extrainfo' => "[code=php, start=100]<?php\necho 'test';\n?>[/code]")));

        $pnRender->assign('spoiler_preview', pnModAPIFunc('bbcode', 'user', 'transform',
                                                          array('objectid' => 1,
                                                                'extrainfo' => "[spoiler]Zikula + bbcode[/spoiler]")));


        PageUtil::addVar('javascript', 'javascript/ajax/prototype.js');
        $modvars = pnModGetVar('bbcode');
        $script = '<script type="text/javascript">';
        $script .= ($modvars['code_enabled'] == true) ? 'var codeenabled = true;' : 'var codeenabled = false;';
        $script .= ($modvars['color_enabled'] == true) ? 'var colorenabled = true;' : 'var colorenabled = false;';
        $script .= ($modvars['quote_enabled'] == true) ? 'var quoteenabled = true;' : 'var quoteenabled = false;';
        $script .= ($modvars['size_enabled'] == true) ? 'var sizeenabled = true;' : 'var sizeenabled = false;';
        $script .= ($modvars['lightbox_enabled'] == true) ? 'var lightboxenabled = true;' : 'var lightboxenabled = false;';
        $script .= ($modvars['spoiler_enabled'] == true) ? 'var spoilerenabled = true;' : 'var spoilerenabled = false;';
        $script .= ($modvars['mimetex_enabled'] == true) ? 'var mimetexenabled = true;' : 'var mimetexenabled = false;';
        $script .= '</script>';
        PageUtil::addVar('rawtext', $script);
        PageUtil::addVar('javascript', 'modules/bbcode/pnjavascript/bbcode_admin.js');

        return true;
    }


    function handleCommand(&$pnRender, &$args)
    {
         $dom = ZLanguage::getModuleDomain('bbcode');

        // Security check
        if (!SecurityUtil::checkPermission('bbcode::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError('index.php');
        }  
        if ($args['commandName'] == 'submit') {
            $ok = $pnRender->pnFormIsValid(); 
            $data = $pnRender->pnFormGetValues();

            if(!_validate_size_input($data['size_tiny'])) {
                $ifield = & $pnRender->pnFormGetPluginById('size_tiny');
                $ifield->setError(DataUtil::formatForDisplay(__('Illegal value, allowed format: up to four decimal places + dot + two decimal places followed by unit, one out of cm,em,ex,in,mm,pc,pt,px or %. Example: 1.05em or 95%.', $dom)));
                $ok = false;
            }
            if(!_validate_size_input($data['size_small'])) {
                $ifield = & $pnRender->pnFormGetPluginById('size_small');
                $ifield->setError(DataUtil::formatForDisplay(__('Illegal value, allowed format: up to four decimal places + dot + two decimal places followed by unit, one out of cm,em,ex,in,mm,pc,pt,px or %. Example: 1.05em or 95%.', $dom)));
                $ok = false;
            }
            if(!_validate_size_input($data['size_normal'])) {
                $ifield = & $pnRender->pnFormGetPluginById('size_normal');
                $ifield->setError(DataUtil::formatForDisplay(__('Illegal value, allowed format: up to four decimal places + dot + two decimal places followed by unit, one out of cm,em,ex,in,mm,pc,pt,px or %. Example: 1.05em or 95%.', $dom)));
                $ok = false;
            }
            if(!_validate_size_input($data['size_large'])) {
                $ifield = & $pnRender->pnFormGetPluginById('size_large');
                $ifield->setError(DataUtil::formatForDisplay(__('Illegal value, allowed format: up to four decimal places + dot + two decimal places followed by unit, one out of cm,em,ex,in,mm,pc,pt,px or %. Example: 1.05em or 95%.', $dom)));
                $ok = false;
            }
            if(!_validate_size_input($data['size_huge'])) {
                $ifield = & $pnRender->pnFormGetPluginById('size_huge');
                $ifield->setError(DataUtil::formatForDisplay(__('Illegal value, allowed format: up to four decimal places + dot + two decimal places followed by unit, one out of cm,em,ex,in,mm,pc,pt,px or %. Example: 1.05em or 95%.', $dom)));
                $ok = false;
            }
            if(!$ok) {
                return false;
            }

            // code 
            pnModSetVar('bbcode', 'code_enabled',  $data['code_enabled']);
            pnModSetVar('bbcode', 'code',  $data['code']);
            pnModSetVar('bbcode', 'syntaxhilite',  $data['syntaxhilite']);

            // color
            pnModSetVar('bbcode', 'color_enabled',  $data['color_enabled']);
            pnModSetVar('bbcode', 'allow_usercolor',  $data['allow_usercolor']);

            // quote
            pnModSetVar('bbcode', 'quote_enabled',  $data['quote_enabled']);
            pnModSetVar('bbcode', 'quote',  $data['quote']);

            // size
            pnModSetVar('bbcode', 'size_tiny',  $data['size_tiny']);
            pnModSetVar('bbcode', 'size_small',  $data['size_small']);
            pnModSetVar('bbcode', 'size_normal',  $data['size_normal']);
            pnModSetVar('bbcode', 'size_large',  $data['size_large']);
            pnModSetVar('bbcode', 'size_huge',  $data['size_huge']);
            pnModSetVar('bbcode', 'size_enabled',  $data['size_enabled']);
            pnModSetVar('bbcode', 'allow_usersize',  $data['allow_usersize']);

            // mimetex
            pnModSetVar('bbcode', 'mimetex_enabled',	$data['mimetex_enabled']);
            pnModSetVar('bbcode', 'mimetex_url',	$data['mimetex_url']);
            
            // misc
            pnModSetVar('bbcode', 'lightbox_enabled',  $data['lightbox_enabled']);
            pnModSetVar('bbcode', 'lightbox_previewwidth',  $data['lightbox_previewwidth']);
            pnModSetVar('bbcode', 'link_shrinksize',  $data['link_shrinksize']);
            pnModSetVar('bbcode', 'spoiler_enabled',  $data['spoiler_enabled']);
            pnModSetVar('bbcode', 'spoiler',  $data['spoiler']);

            LogUtil::registerStatus(__('Done! Configuration has been updated', $dom));
        }
        return pnRedirect(pnModURL('bbcode', 'admin', 'config'));
    }

}

function _validate_size_input(&$input)
{
    $input = strtolower(trim($input));
    return (bool)preg_match('/(^\d{1,4}|(^\d{1,4}\.{0,1}\d{1,2}))(cm|em|ex|in|mm|pc|pt|px|\%)$/', $input);
}
