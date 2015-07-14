<?php

require_once('modules/Agoraportal/lib/Agoraportal/Util.php');

/**
 * Get the active services of a client. If clientId is present, uses this param
 *  to get the service info. If clientId is not present but clientCode is
 *  present, uses client code to get the info.
 *
 * @author Toni Ginard
 * @param int clientId
 * @param int clientCode
 *
 * @return array The services of the client
 */
class Agoraportal_Api_User extends Zikula_AbstractApi {

    /**
     * Confirm a Manager adding it to the managers group
     * @author     Pau Ferrer Ocaña (pferre22@xtec.cat)
     * @return     True if the confirmation succeed and redirect
     */
    public function managerConfirm($args) {

        // Already a manager
        if (AgoraPortal_Util::isManager()) {
            return true;
        }

        // Security check
        if (!AgoraPortal_Util::isUser()) {
            return false;
        }

        $username = UserUtil::getVar('uname');
        $manager = Manager::get_by_username($username);
        // Not added as manager of any Client
        if (!$manager) {
            return false;
        }

        if (!AgoraPortal_Util::add_user_to_group('Managers', $username)) {
            // TODO: This message is not showing!
            return LogUtil::registerError($this->__('No s \'ha pogut habilitar el gestor'));
        }

        // TODO: This message is not showing!
        LogUtil::registerStatus($this->__('Has estat assignat com a gestor del centre '. $manager->clientCode));
        return true;
    }

}
