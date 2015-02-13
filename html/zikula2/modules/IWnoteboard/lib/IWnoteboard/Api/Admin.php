<?php

class IWnoteboard_Api_Admin extends Zikula_AbstractApi {

    /**
     * Create a new topic
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args	array with the topic information
     * @return:	identity of the new record created or false if error
     */
    public function crear($args) {
        $nomtema = FormUtil::getPassedValue('nomtema', isset($args['nomtema']) ? $args['nomtema'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if (!isset($nomtema)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // Optional argument
        if (!isset($descriu)) {
            $descriu = '';
        }

        $item = array('nomtema' => $nomtema,
            'descriu' => $descriu,
            'grup' => $grup);

        if (!DBUtil::insertObject($item, 'IWnoteboard_topics', 'tid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Return the id of the newly created item to the calling process
        return $item['tid'];
    }

    /**
     * Delete a topic from the database
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args	The id of the topic
     * @return:	true if success and false if fails
     */
    public function esborra($args) {
        $tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Argument check
        if (!isset($tid) || !is_numeric($tid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // Get the item
        $item = ModUtil::apiFunc('IWnoteboard', 'user', 'gettema', array('tid' => $tid));
        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        if (!DBUtil::deleteObjectByID('IWnoteboard_topics', $tid, 'tid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }

        // The item has been deleted, so we clear all cached pages of this item.
        $view = Zikula_View::getInstance('IWnoteboard');
        $view->clear_cache(null, $tid);

        return true;
    }

    /**
     * Update a topic from the database
     * @author:     Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @param:	args	The id of the topic and the information of the topic
     * @return:	true if success and false if fails
     */
    public function modificar($args) {
        $tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'POST');
        $nomtema = FormUtil::getPassedValue('nomtema', isset($args['nomtema']) ? $args['nomtema'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : null, 'POST');
        $grup = FormUtil::getPassedValue('grup', isset($args['grup']) ? $args['grup'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWnoteboard::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if (!isset($tid) || !isset($nomtema)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        // Get the item
        $item = ModUtil::apiFunc('IWnoteboard', 'user', 'gettema', array('tid' => $tid));
        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        $items = array('nomtema' => $nomtema,
            'descriu' => $descriu,
            'grup' => $grup);

        $pntable = DBUtil::getTables();
        $c = $pntable['IWnoteboard_topics_column'];
        $where = "$c[tid]=$tid";

        if (!DBUTil::updateObject($items, 'IWnoteboard_topics', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return true;
    }
	public function getlinks($args)
    {
       if (SecurityUtil::checkPermission('IWnoteboard::', '::', ACCESS_ADMIN)) {
			$links[] = array('url' => ModUtil::url($this->name, 'admin', 'main'), 'text' => $this->__('Module configuration'),'class' => 'z-icon-es-config');
       }
        return $links;
    }

}
