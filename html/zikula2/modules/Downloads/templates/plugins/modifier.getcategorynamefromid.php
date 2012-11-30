<?php

/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */
function smarty_modifier_getcategorynamefromid($id)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    $id = (int)$id;
    if ($id == 0) {
        return __('Root', $dom);
    }
    $em = ServiceUtil::getService('doctrine.entitymanager');
    $category = $em->getRepository('Downloads_Entity_Categories')->find($id);
    return $category->getTitle();
}