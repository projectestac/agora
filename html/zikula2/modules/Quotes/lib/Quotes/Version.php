<?php
/**
 * Zikula Application Framework
 * @copyright  (c) Zikula Development Team
 * @license    GNU/GPL
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage Quotes
 */
class Quotes_Version extends Zikula_AbstractVersion
{
    public function getMetaData() {
        $meta = array();
        $meta['displayname'] = $this->__('Quotes publisher');
        $meta['description'] = $this->__('Manage and display quotes or reflections, with support for categories.');
        $meta['version'] = '3.0.0';
        $meta['url'] = $this->__('quotes');
        $meta['core_min'] = '1.3.0'; // requires minimum 1.3.0 or later
        $meta['securityschema'] = array('Quotes::' => 'Author name::Quote ID');
        return $meta;
    }
}
