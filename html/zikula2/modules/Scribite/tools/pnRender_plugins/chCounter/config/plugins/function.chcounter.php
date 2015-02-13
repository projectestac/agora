<?php
/**
 * Zikula Application Framework
 *
 * @copyright  (c) Zikula Development Team
 * @link       http://www.zikula.org
 * @version    $Id$
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     sven schomacker <hilope@gmail.com>
 * @category   Zikula_Extension
 * @package    Utilities
 * @subpackage pnRender
 * 
 * Smarty plugin to include ChCounter into Xanthia templates
 * Example
 *   <!--[chcounter]-->
 *
 * If ChCounter is not installed in /counter from pn-root you have to modify line 24
 */

function smarty_function_chcounter($params, &$smarty) 
{
  extract($params); 
  unset($params);

  if (isset($GLOBALS['info']) && is_array($GLOBALS['info'])) {
    $title = strip_tags($GLOBALS['info']['title']);
  }
  $chCounter_visible = 1;	
  $chCounter_page_title = $title;
  include( 'counter/counter.php' );
}

