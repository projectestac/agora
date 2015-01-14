<?php

/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Listeners class.
 */
class AuthLDAP_Listeners {

    /**
     * Checks if the user is member of clients group and if it should be member of it
     * @author Albert Pérez Monfort
     * @return bool true authetication succesful
     */
    public static function loginSuccessListener(Zikula_Event $event) {
        $uname = UserUtil::getVar('uname');
        $uid = UserUtil::getVar('uid');
        // checks if user is a schools, member of clients group. If not create it as client
        self::createClient(array('uname' => $uname,
            'uid' => $uid));
        return true;
    }

    /**
     * Validate user via LDAP because the Zikula authentication has failed and create it if necessary
     * @author Albert Pérez Monfort
     * @return bool true authetication succesful
     */
    public static function tryAuthLDAPListener(Zikula_Event $event) {
        $authentication_info = FormUtil::getPassedValue('authentication_info', isset($args['authentication_info']) ? $args['authentication_info'] : null, 'POST');

        // Argument check
        if ($authentication_info['login_id'] == '' || $authentication_info['pass'] == '') {
            return false;
        }

        $uname = $authentication_info['login_id'];
        $pass = $authentication_info['pass'];

        global $agora;
        $info = array();

        if ($agora['server']['enviroment'] != 'LOCAL') {
            // define the attributes we want to get in our search
            $justthese = array('cn', 'uid', 'givenname', 'sn', 'mail');

            // connect to ldap server
            if (!$ldap_ds = ldap_connect(modUtil::getVar('AuthLDAP', 'authldap_serveradr'))) {
                LogUtil::registerError('En aquests moments no es pot entrar al portal perquè el servei LDAP no està disponible. Proveu-ho més tard.');
                return false;
            }

            // XTEC LDAP server uses non-standar bind
            $ldaprdn = pnModGetVar('AuthLDAP', 'authldap_searchattr') . '=' . $uname . ',' . modUtil::getVar('AuthLDAP', 'authldap_basedn'); // ldap rdn or dn

            // Hide the E_WARNING messages from ldap_bind and ldap_search when there are any errors
            set_error_handler(function() { ; }, E_WARNING);
            
            ldap_bind($ldap_ds, $ldaprdn, $pass);

            // Search the directory for the user
            if (!$ldap_sr = ldap_search($ldap_ds, modUtil::getVar('AuthLDAP', 'authldap_searchdn'), modUtil::getVar('AuthLDAP', 'authldap_searchattr') . '=' . DataUtil::formatForStore($uname), $justthese)) {
                LogUtil::registerError('No s\'ha trobat l\'usuari/ària en el servei LDAP i no podeu entrar a la gestió dels serveis d\'Àgora. Poseu-vos en contacte amb el SAU.');
                return false;
            }
            
            // Restore standard error management after the calls to ldap_bind and ldap_search
            restore_error_handler();

            $info = ldap_get_entries($ldap_ds, $ldap_sr);

            // get the users from our search
            if (!$info || $info['count'] == 0) {
                LogUtil::registerError('No s\'han pogut obtenir les dades del servei LDAP. No podeu entrar. Poseu-vos en contacte amb el SAU.');
                return false;
            } else {
                if (!isset($info[0]['dn'])) {
                    LogUtil::registerError('Les dades al servei LDAP no són correctes. No podeu entrar. Poseu-vos en contacte amb el SAU.');
                    return false;
                }
            }

            // Close the LDAP connection
            set_error_handler(function() { ; }, E_WARNING);
            ldap_unbind($ldap_ds);
            restore_error_handler();

        } else {
            $info[0]['uid'][0] = $uname;
            $info[0]['cn'][0] = $uname;
            $info[0]['mail'][0] = $uname . '@xtec.cat';
        }

        // Check if the user already exists in the Zikula database. If not, create it.
        $user = ModUtil::APIFunc('Users', 'user', 'get', array('uname' => $info[0]['uid'][0]));

        if (!empty($user) && isset($user['uid'])) {
            $uid = $user['uid'];
            /*
              // rewrite user password with the correct one
              $item = array('pass' => '1$$' . md5($pass));
              $where = "uid=$uid";
              DBUtil::updateObject($item, 'users', $where);
             * 
             */
        } else {
            // User doesn't exist. Create the user in Zikula users table
            $item = array('uname' => $info[0]['uid'][0],
                'email' => $info[0]['mail'][0],
                'user_regdate' => DateUtil::buildDatetime(date("Y"), date("m"), date("d"), date("H"), date("i"), date("s")),
                'approved_date' => DateUtil::buildDatetime(date("Y"), date("m"), date("d"), date("H"), date("i"), date("s")),
                'pass' => '1$$' . md5($pass),
                'activated' => 1,
                'approved_by' => 2,
            );

            $uid = DBUtil::insertObject($item, 'users', 'uid');

            if (!$uid) {
                return LogUtil::registerError('No s\'ha pogut crear l\'usuari/ària.');
            }

            // insert user in default group
            $defaultGroupId = ModUtil::getVar('Groups', 'defaultgroup');

            // User doesn't exist. Create the user in Zikula users table
            $item = array('uid' => $uid['uid'],
                'gid' => $defaultGroupId,
            );

            $groupMember = DBUtil::insertObject($item, 'group_membership');

            if (!$groupMember) {
                return LogUtil::registerError('No s\'ha pogut afegir l\'usuari/ària al grup per defecte.');
            }
            $uid = $uid['uid'];

            // Adds client registry to clients table
            self::createClient(array('uname' => $uname, 'uid' => $uid));
        }

        LogUtil::getErrorMessages();

        UserUtil::setUserByUid($uid);
        return System::redirect('index.php');
    }

    /**
     * Add user in clients grup and create it in clients table
     * @author Albert Pérez Monfort
     * @return bool true if succesful and false otherwise
     */
    private function createClient($args) {
        $uname = $args['uname'];
        $uid = $args['uid'];
        $pattern = '/^[abce]\d{7}$/'; // Matches a1234567
        if (preg_match($pattern, $uname)) {
            $idGroupClients = UserUtil::getGroupIdList('name=\'Clients\'');
            $groups = userUtil::getGroupsForUser($uid);
            $isClient = (in_array($idGroupClients, $groups)) ? true : false;

            if (!$isClient) {
                // Convert uname begining with a letter to uname begining with a number
                $uname = str_replace('a', '0', $uname);
                $uname = str_replace('b', '1', $uname);
                $uname = str_replace('c', '2', $uname);
                $uname = str_replace('e', '4', $uname);

                global $agora;
                // Get school info
                $url = $agora['server']['school_information'] . $uname;

                $curl_handle = curl_init();
                curl_setopt($curl_handle, CURLOPT_URL, $url);
                curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 8);
                curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
                $buffer = curl_exec($curl_handle);
                curl_close($curl_handle);

                // Get school DNS
                $siteDNS = '';
                if (!empty($buffer)) {
                    $siteDNS = utf8_encode($buffer);
                } else {
                    return LogUtil::registerError('No s\'ha pogut obtenir automàticament la informació del centre. Poseu-vos en contacte amb el SAU.');
                }

                // Additional check. This error should never happen.
                if (strpos($siteDNS, 'ERROR') !== false) {
                    return LogUtil::registerError('No se us ha reconegut com a centre docent perquè que figureu a la base de dades de centres de la XTEC. Poseu-vos en contacte amb el SAU.');
                }

                // it is a school and get DNS
                $school = explode('$$', $siteDNS);
                $clientCode = $school[0];
                $clientDNS = $school[1];
                $clientName = $school[2];
                $clientAddress = $school[3];
                $clientCity = $school[4];
                $clientPC = $school[5];

                if ($clientDNS == '0') {
                    return LogUtil::registerError('El centre no disposa de nom propi. Cal tenir-ne per poder sol·licitar els serveis d\'Àgora');
                }

                // Add user to group (group tables are already loaded)
                $item = array('gid' => $idGroupClients,
                    'uid' => $uid);
                DBUtil::insertObject($item, 'group_membership');

                // Add user to client table
                $created = modUtil::apiFunc('Agoraportal', 'admin', 'createClient', array('clientCode' => $clientCode,
                            'clientDNS' => $clientDNS,
                            'clientName' => $clientName,
                            'clientAddress' => $clientAddress,
                            'clientCity' => $clientCity,
                            'clientState' => 1,
                            'clientPC' => $clientPC,
                            'dontAddToGroup' => ''));

                if (!$created) {
                    return LogUtil::registerError('La creació de l\'usuari a la taula de centres ha fallat.');
                }
            }
        }
        return true;
    }

}
