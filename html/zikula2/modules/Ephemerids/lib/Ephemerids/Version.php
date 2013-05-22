<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: pnversion.php 355 2009-11-11 13:10:50Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Ephemerids
 */
class Ephemerids_Version extends Zikula_AbstractVersion
{
    public function getMetaData ()
    {
        $meta = array();
        $meta['displayname'] = $this->__('Ephemerids ');
        $meta['description'] = $this->__('Provides a block displaying an information byte (historical event, thought for the day, etc.) linked to the day\'s date, with daily roll-over, and incorporates an interface for adding, editing and maintaining ephemerids.');
        $meta['url'] = $this->__('Ephemerids');
        $meta['version'] = '1.8.0';
        $meta['securityschema'] = array('Ephemerids::' => '::Ephemerid ID');
        return $meta;
    }
}