<?php

/**
 * @authors Albert Pérez Monfort  <aperez16@xtec.cat>
 * @authors Josep Ferràndiz Farré <jferran6@xtec.cat>
 * @authors Joan Guillén Pelegay  <jguille2@xtec.cat> 
 * 
 * @par Llicència: 
 * GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Cataleg
 * @version 3.0.1
 * @copyright Departament d'Ensenyament. Generalitat de Catalunya 2014-2015
 */

class IWmessages_Api_Admin extends Zikula_AbstractApi {
	public function getlinks($args)
    {
       if (SecurityUtil::checkPermission('IWmessages::', '::', ACCESS_ADMIN)) {
			$links[] = array('url' => ModUtil::url($this->name, 'admin', 'main'), 'text' => $this->__('Module configuration'),'class' => 'z-icon-es-config');
       }
        return $links;
    }
}

