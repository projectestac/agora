<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 */

class Scribite_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        $meta['displayname'] = $this->__('Scribite');
        $meta['oldnames'] = array('scribite');
        $meta['url'] = $this->__('scribite');
        $meta['version'] = '4.3.0';
        $meta['core_min'] = '1.3.0'; // Fixed to 1.3.x range
        $meta['core_max'] = '1.3.99'; // Fixed to 1.3.x range
        $meta['description'] = $this->__('WYSIWYG for Zikula');
        $meta['securityschema'] = array('Scribite::' => 'Modulename::');
        return $meta;
    }
}