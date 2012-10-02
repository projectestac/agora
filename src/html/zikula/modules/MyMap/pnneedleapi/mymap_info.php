<?php
/**
 * @package      MyMap
 * @version      $Id: mymap_info.php 90 2008-08-24 09:05:08Z quan $
 * @author       Florian Schießl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
/**
 * @package      MyMap
 * @version      $Id: mymap_info.php 90 2008-08-24 09:05:08Z quan $
 * @author       Florian Schießl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2008
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * MyMap needle info
 * @param none
 * @return string with short usage description
 */
function MyMap_needleapi_mymap_info()
{
    $info = array('module'  => 'MyMap', 
                  'info'    => 'MYMAP{Map-ID}',
                  'inspect' => false);
    return $info;
}
