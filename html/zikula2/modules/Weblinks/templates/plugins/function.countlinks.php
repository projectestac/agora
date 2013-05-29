<?php

/**
 * Zikula Application Framework
 *
 * Weblinks
 *
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 */
function smarty_function_countlinks($params, Zikula_View $view)
{
    $em = ServiceUtil::getService('doctrine.entitymanager');
    $beginning = new DateTime();
    $beginning->modify("-$params[days] days");
    $beginning->setTime(0, 0, 0);
    
    return $em->getRepository('Weblinks_Entity_Link')->countByDatePeriod($beginning);
}