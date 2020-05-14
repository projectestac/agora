<?php


class XtecOauth_Controller_User extends Zikula_AbstractController
{
    public function postInitialize()
    {
        $this->view->setCaching(false);
    }

    /**
     * @return bool|false|string
     */
    public function main()
    {
        if (UserUtil::isLoggedIn() && SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_COMMENT)) {
            return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora'));
        } else {
            return $this->view->fetch('xtecoauth_user_main.tpl');
        }
    }

    public function login()
    {
        // If user is logged in there's nothing to do here
        if (UserUtil::isLoggedIn()) {
            if (SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_COMMENT)) {
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora'));
            } else {
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'main'));
            }
        }

        $config = [
            'callback' => ModUtil::getVar('XtecOauth', 'xtecoauth_apiurlbase'),
            'providers' => [
                'Google' => [
                    'enabled' => true,
                    'keys' => [
                        'id' => ModUtil::getVar('XtecOauth', 'xtecoauth_clientid'),
                        'secret' => ModUtil::getVar('XtecOauth', 'xtecoauth_clientsecret'),
                    ],
                    'scope' => 'https://www.googleapis.com/auth/userinfo.email',
                    'authorize_url_parameters' => [
                        'hd' => ModUtil::getVar('XtecOauth', 'xtecoauth_authorizedomain'),
                    ]
                ],
            ],
            'debug_mode' => false,
            'debug_file' => '',
        ];

        if (is_file('modules/XtecOauth/includes/hybridauth/src/autoload.php')) {
            include_once 'modules/XtecOauth/includes/hybridauth/src/autoload.php';
        } else {
            throw new Exception('Could not load vendor hybridauth');
        }

        $hybridauth = new Hybridauth\Hybridauth($config);

        $adapter = $hybridauth->authenticate('Google');
        $userProfile = $adapter->getUserProfile();

        $emailVerified = $userProfile->emailVerified;
        $domain = ModUtil::getVar('XtecOauth', 'xtecoauth_authorizedomain');

        if (!empty($emailVerified) && $this->endsWith($emailVerified, '@' . $domain)) {

            $username = explode('@', $emailVerified)[0];
            $schoolData = [];

            // Check if this user is a school and check if it has nom propi
            if ($this->isUserSchool($username)) {
                $schoolData = getSchoolFromWS($username);
                if ($schoolData['error'] == 1) {
                    // Debug
                    // $schoolData = 'a8000001$$ieardevol$$Institut Escola Joan Ardèvol$$.$$Cambrils$$43850';
                    LogUtil::registerError($schoolData['message']);
                }
            }

            // Check if the user already exists in the Zikula database. If not, create it.
            $user = ModUtil::APIFunc('Users', 'user', 'get', ['uname' => $username]);

            if (!empty($user) && isset($user['uid'])) {
                $uid = $user['uid'];
            } else {
                // Remove error message caused by Users::get() when user does not exist
                LogUtil::getErrorMessages();

                // User doesn't exist. Create the user in Zikula users table
                $item = [
                    'uname' => $username,
                    'email' => $emailVerified,
                    'user_regdate' => DateUtil::buildDatetime(date("Y"), date("m"), date("d"), date("H"), date("i"), date("s")),
                    'approved_date' => DateUtil::buildDatetime(date("Y"), date("m"), date("d"), date("H"), date("i"), date("s")),
                    'pass' => '',
                    'passreminder' => '',
                    'activated' => 1,
                    'approved_by' => 2,
                ];

                $uid = DBUtil::insertObject($item, 'users', 'uid');

                if (!$uid) {
                    return LogUtil::registerError('No s\'ha pogut crear l\'usuari/ària.');
                }

                // Add user to default group
                $defaultGroupId = ModUtil::getVar('Groups', 'defaultgroup');

                $item = [
                    'uid' => $uid['uid'],
                    'gid' => $defaultGroupId,
                ];

                $groupMember = DBUtil::insertObject($item, 'group_membership');

                if (!$groupMember) {
                    return LogUtil::registerError('No s\'ha pogut afegir l\'usuari/ària al grup per defecte.');
                }

                $uid = $uid['uid'];
            }

            // Ensure that usernames that match a client code are clients
            if (!$this->createClient(['uname' => $username, 'uid' => $uid, 'schoolData' => $schoolData])) {
                return false;
            }

            // Do the actual login
            UserUtil::setUserByUid($uid);

            // Warn the user!
            LogUtil::registerStatus('La vostra sessió a Google ha quedat iniciada. Si la voleu tancar, podeu fer clic aquí: <a href="https://accounts.google.com/Logout?continue=http://google.com" target="_blank">https://accounts.google.com/Logout?continue=http://google.com</a>');

            if (SecurityUtil::checkPermission('Agoraportal::', '::', ACCESS_COMMENT)) {
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'myAgora'));
            } else {
                return System::redirect(ModUtil::url('Agoraportal', 'user', 'main'));
            }

        } else {
            LogUtil::registerError("L'adreça $emailVerified no pertany al domini $domain i no pot entrar al portal");
            LogUtil::registerError('La vostra sessió a Google ha quedat iniciada. Si la voleu tancar, podeu fer clic aquí: <a href="https://accounts.google.com/Logout?continue=http://google.com" target="_blank">https://accounts.google.com/Logout?continue=http://google.com</a>');

            $hybridauth->disconnectAllAdapters();

            return System::redirect(ModUtil::url('xtecoauth', 'user', 'main'));
        }
    }

    /**
     * Add user in clients group and create it in clients table
     *
     * @param $args
     * @return bool true if successful and false otherwise
     * @throws Exception
     * @author Toni Ginard
     */
    private function createClient($args)
    {
        // Extract vars
        $uname = $args['uname'];
        $uid = $args['uid'];
        $schoolData = $args['schoolData'];

        if ($this->isUserSchool($uname)) {
            // Load Agoraportal
            require_once('modules/Agoraportal/lib/Agoraportal/Util.php');
            ModUtil::load('Agoraportal');

            // Check if user belongs to group "Clients"
            $idGroupClients = UserUtil::getGroupIdList('name=\'Clients\'');
            $groups = userUtil::getGroupsForUser($uid);
            $isClient = in_array($idGroupClients, $groups);

            // Check for existence of register in agoraportal_clients
            $client = Client::get_by_code($uname);

            if (!$isClient || !is_object($client)) {
                if (empty($schoolData)) {
                    return false; // Log errors already set
                }

                // Get school data
                $school = explode('$$', $schoolData['message']);
                $clientCode = $school[0];
                $clientDNS = $school[1];
                $clientName = $school[2];
                $clientAddress = $school[3];
                $clientCity = $school[4];
                $clientPC = $school[5];

                if ($clientDNS == '0') {
                    LogUtil::registerError('No podeu entrar perquè el vostre centre no té nom propi. Visiteu <a href="http://xtec.gencat.cat/ca/at_usuari/gestio/nompropi/">aquesta pàgina</a> per saber com aconseguir-lo.');
                    return false;
                }

                if (!$isClient) {
                    // Add user to group (group tables are already loaded)
                    $item = array(
                        'gid' => $idGroupClients,
                        'uid' => $uid);
                    DBUtil::insertObject($item, 'group_membership');
                }

                if (!is_object($client)) {
                    // Add user to agoraportal_clients
                    $row = [
                        'clientCode' => $clientCode,
                        'clientDNS' => $clientDNS,
                        'clientName' => $clientName,
                        'clientAddress' => $clientAddress,
                        'clientCity' => $clientCity,
                        'clientState' => 1,
                        'clientPC' => $clientPC,
                        'locationId' => 0,
                        'dontAddToGroup' => '',
                    ];
                    $created = Client::create($row, $addtogroup = false);

                    if (!$created) {
                        return LogUtil::registerError('La creació de l\'usuari a la taula de centres ha fallat.');
                    }
                }
            }
        }

        return true;
    }

    /**
     * Check if the username matches a school code
     *
     * @param string $uname
     * @return boolean
     * @author Toni Ginard
     */
    private function isUserSchool($uname)
    {
        $pattern = '/^[abce]\d{7}$/'; // Matches a1234567

        if (preg_match($pattern, $uname)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Utility function to check if a string ends with a given text
     *
     * @param string $haystack
     * @param string $needle
     * @return bool
     */
    private function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

}

