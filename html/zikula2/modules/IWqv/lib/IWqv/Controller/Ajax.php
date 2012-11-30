<?php

class IWqv_Controller_Ajax extends Zikula_Controller_AbstractAjax {

    /**
     * Delete specified qv 
     * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
     * @param:	args Array with:
     * 			- qvid qv identifier
     * @return:	Show an error or status message
     */
    public function deleteqv($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }

        // Get the parameters
        $qvid = FormUtil::getPassedValue('qvid', null, 'POST');
        if (ModUtil::apiFunc('IWqv', 'user', 'deleteqv', array('qvid' => $qvid))) {
            $output = DataUtil::formatForDisplayHTML($this->__f('Done! %1$s deleted.', $this->__('QV assignment')));
        } else {
            $output = AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Error! Sorry! Deletion attempt failed.')));
        }

        AjaxUtil::output(array('qvid' => $qvid,
            'result' => $output));
    }

    /**
     * Delete specified user assignment
     * @author: Sara Arjona TÃ©llez (sarjona@xtec.cat)
     * @param:	args Array with:
     * 			- qvaid user assignment identifier
     * @return:	Show an error or status message
     */
    public function deleteuserassignment($args) {
        // Security check
        if (!SecurityUtil::checkPermission('IWqv::', '::', ACCESS_ADD)) {
            AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Sorry! No authorization to access this module.')));
        }

        // Get the parameters
        $qvaid = FormUtil::getPassedValue('qvaid', null, 'POST');
        if (ModUtil::apiFunc('IWqv', 'user', 'deleteuserassignment', array('qvaid' => $qvaid))) {
            $output = DataUtil::formatForDisplayHTML($this->__f('Done! %1$s deleted.', $this->__('QV assignment')));
        } else {
            $output = AjaxUtil::error(DataUtil::formatForDisplayHTML($this->__('Error! Sorry! Deletion attempt failed.')));
        }

        AjaxUtil::output(array('qvaid' => $qvaid,
            'result' => $output));
    }

}