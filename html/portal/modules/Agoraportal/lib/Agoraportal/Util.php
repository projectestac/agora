<?php

require_once('modules/Agoraportal/lib/Agoraportal/Managers.php');
require_once('modules/Agoraportal/lib/Agoraportal/Requests.php');
require_once('modules/Agoraportal/lib/Agoraportal/Locations.php');
require_once('modules/Agoraportal/lib/Agoraportal/ClientTypes.php');
require_once('modules/Agoraportal/lib/Agoraportal/Clients.php');
require_once('modules/Agoraportal/lib/Agoraportal/Services.php');
require_once('modules/Agoraportal/lib/Agoraportal/ServiceTypes.php');
require_once('modules/Agoraportal/lib/Agoraportal/ServiceTemplates.php');
require_once('modules/Agoraportal/lib/Agoraportal/Queues.php');
require_once('modules/Agoraportal/lib/Agoraportal/ClientLogs.php');
require_once('modules/Agoraportal/lib/Agoraportal/Stats.php');
require_once('modules/Agoraportal/lib/Agoraportal/SQLCommands.php');

/**
 * Some Util functions from AgoraPortal
 *
 * @author Pau Ferrer Ocaña
 */
class AgoraPortal_Util {

    /**
     * Returns the email for a given username
     * @param $username
     * @return bool
     */
    public static function get_user_mail($username) {
        $uid = UserUtil::getIdFromName($username);
        if ($uid) {
            $uservars = UserUtil::getVars($uid);
            return $uservars['email'];
        }
        return false;
    }

    /**
     * Add user to a group
     * @param $groupname where to add
     * @param bool|false $username if not provided, use current user
     * @return bool|false
     */
    public static function add_user_to_group($groupname, $username = false, $uid = false) {
        $gid = UserUtil::getGroupIdList("name='$groupname'");
        if (!$gid) {
            return LogUtil::registerError("El grup $groupname no existeix");
        }

        if ($username && !$uid) {
            $uid = UserUtil::getIdFromName($username);
            if (!$uid) {
                return LogUtil::registerError("L'usuari $username no existeix");
            }
        } else {
            // Own user
            if (false === $uid) {
                $uid = UserUtil::getVar('uid');
            }
        }

        // Verify if the user is already a member of this group
        $is_member = ModUtil::apiFunc('Groups', 'user', 'isgroupmember', array('gid' => $gid, 'uid' => $uid));

        // Add the user to the group if it is not a member
        if (!$is_member) {
            $obj = array(
                'gid' => $gid,
                'uid' => $uid
            );
            $result = DBUtil::insertObject($obj, 'group_membership');
            if (!$result) {
                return LogUtil::registerError("No s'ha pogut afegir l'usuari al grup $groupname");
            }
        }

        return true;
    }

    /**
     * Removes a user from a group
     * @param string $groupname where to remove
     * @param bool|false $username if not provided, use current user
     * @return bool|false
     */
    public static function remove_user_from_group($groupname, $username = false) {
        $gid = UserUtil::getGroupIdList("name='$groupname'");
        if (!$gid) {
            return true;
        }

        if ($username) {
            $uid = UserUtil::getIdFromName($username);
            if (!$uid) {
                return true;
            }
        } else {
            // Own user
            $uid = UserUtil::getVar('uid');
        }

        // Get database info
        $dbtable = DBUtil::getTables();
        $groupmembershipcolumn = $dbtable['group_membership_column'];

        // Set condition
        $where = "WHERE $groupmembershipcolumn[gid] = '" . (int)DataUtil::formatForStore($gid) . "'
              AND $groupmembershipcolumn[uid] = '" . (int)DataUtil::formatForStore($uid) . "'";

        // Remove silently. If operation is unsuccessful, don't say anything
        DBUtil::deleteWhere('group_membership', $where);

        return true;
    }

    /**
     * Returns the ClientCode from the user logged in
     * @param bool|false $clientCode, if Admin, it checks if is not empty
     * @return bool|false|mixed
     * @throws Zikula_Exception_Forbidden
     */
    public static function getClientCodeFromUser($clientCode = false) {
        if (AgoraPortal_Util::isAdmin()) {
            if (!empty($clientCode)) {
                return $clientCode;
            }
            return LogUtil::registerError('No s\'ha trobat el client');
        }

        // Who is connected is a Manager so, get the code from the database
        if (AgoraPortal_Util::isManager()) {
            $manager = Manager::get_by_username(UserUtil::getVar('uname'));
            if (!$manager) {
                throw new Zikula_Exception_Forbidden();
            }
            return $manager->clientCode;
        }

        // Perhaps who is connected is a school, so client code is the username
        if (AgoraPortal_Util::isClient()) {
            return UserUtil::getVar('uname');
        }


        throw new Zikula_Exception_Forbidden();
    }

    /**
     * Print an object for debugging
     * @param $object
     */
    public static function print_object($object) {
        $print = print_r($object, true);
        LogUtil::registerError('<pre>'.$print.'</pre>');
    }

    /**
     * Check correct format value of school code
     *
     * @param string $code
     * @return string $code or bool false
     */
    public static function checkCode($code) {
        $code = trim($code);
        $pattern = '/^[abce]\d{7}$/'; // Matches a1234567
        if (preg_match($pattern, $code)) {
            return $code;
        }
        return false;
    }

    /**
     * Returns if the Mailer is Available to sent mails
     * @return bool
     */
    public static function isMailerAvalaible() {
        $modid = ModUtil::getIdFromName('Mailer');
        $modinfo = ModUtil::getInfo($modid);
        return $modinfo['state'] == 3;
    }

    /**
     * Returns a pager HTML
     * @param $total
     * @param $urltemplate
     * @param int $init
     * @param int $rpp
     * @param bool|false $javascript
     * @return array|bool
     */
    public static function pager($total, $urltemplate, $init = -1, $rpp = 15, $javascript = false) {
        if ($total <= $rpp) {
            return false;
        }

        if ($javascript) {
            $prelink = '<button type="button" class="btn btn-default" onclick=';
            $postlink = '</button>';
        } else {
            $prelink = '<a class="btn btn-default" href=';
            $postlink = '</a>';
        }

        $items = array();
        // Show startnum link
        if ($init > 0) {
            $url = preg_replace('/%%/', -1, $urltemplate);
            $items[-1] = $prelink.'"'.$url.'"><span class="glyphicon glyphicon-fast-backward" title="Primera pàgina">'.$postlink;
        }

        // Show following items
        $pagenum = 1;
        for ($curnum = 0; $curnum < $total; $curnum += $rpp) {
            if ($init == $curnum || ($init < 0 && $pagenum == 1)) {
                // On this page - show text
                $items[$curnum] = $pagenum;
            } else {
                //mod by marsu - use sliding window for pagelinks
                if ((($pagenum % 10) == 0) // link if page is multiple of 10
                    || ($pagenum == 1) // link first page
                    || (($curnum > ($init - 4 * $rpp)) //link -3 and +3 pages
                        && ($curnum < ($init + 4 * $rpp)))
                ) {
                    $url = preg_replace('/%%/', $curnum, $urltemplate);
                    $items[$curnum] = $prelink . '"' . $url . '">' . $pagenum . $postlink;
                }
                //end mod by marsu
            }
            $pagenum++;
        }

        if (($curnum >= $rpp + 1) && ($init < $curnum - $rpp)) {
            $url = preg_replace('/%%/', $curnum - $rpp, $urltemplate);
            $items[-2] = $prelink.'"'.$url.'"><span class="glyphicon glyphicon-fast-forward" title="Última pàgina">'.$postlink;
        }

        return $items;
    }

    /**
     * Create random password
     * @author Toni Ginard
     * @return string The password
     */
    public static function createRandomPass() {

        // Chars allowed in password
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz023456789";

        // Sets the seed for rand function
        srand((float) microtime() * 1000000);

        for ($i = 0, $pass = ''; $i < 8; $i++) {
            $num = rand() % strlen($chars);
            $pass = $pass . substr($chars, $num, 1);
        }

        return $pass;
    }

    /**
     * Checks if is a normal user
     * @return bool
     */
    public static function isUser() {
        return SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_READ) ? true: false;
    }

    /**
     * Checks if is a normal user, if not Exception is returned
     * @throws Zikula_Exception_Forbidden
     */
    public static function requireUser() {
        if (!self::isUser()) {
            throw new Zikula_Exception_Forbidden();
        }
    }

    /**
     * Checks if is a client user
     * @return bool
     */
    public static function isClient() {
        return SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_COMMENT) ? true: false;
    }

    /**
     * Checks if is a client user, if not Exception is returned
     * @return bool
     */
    public static function requireClient() {
        if (!self::isClient()) {
            throw new Zikula_Exception_Forbidden();
        }
    }

    /**
     * Checks if is a manager user
     * @return bool
     */
    public static function isManager() {
        return SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADD) ? true: false;
    }

    /**
     * Checks if is a manager user, if not Exception is returned
     * @return bool
     */
    public static function requireManager() {
        if (!self::isManager()) {
            throw new Zikula_Exception_Forbidden();
        }
    }

    /**
     * Checks if is an admin user
     * @return bool
     */
    public static function isAdmin() {
        return SecurityUtil::checkPermission('Agoraportal::', "::", ACCESS_ADMIN) ? true: false;
    }

    /**
     * Checks if is an admin user, if not Exception is returned
     * @return bool
     */
    public static function requireAdmin() {
        if (!self::isAdmin()) {
            throw new Zikula_Exception_Forbidden();
        }
    }

    /**
     * Return the highest role the user has
     * @return bool|string
     */
    public static function getRole() {
        if (self::isAdmin()) {
            return 'admin';
        }

        if (self::isManager()) {
            return 'manager';
        }

        if (self::isClient()) {
            return 'client';
        }

        if (self::isUser()) {
            return 'user';
        }

        return false;
    }

    /**
     * Return global Àgora vars for a given service
     *
     * @author Toni Ginard
     * @return Array
     */
    public static function getGlobalAgoraVars() {
        global $agora;

        return $agora;
    }
}


/**
 * Class AgoraBase
 * Class base to have helping functions
 */
class AgoraBase {

    /**
     * AgoraBase constructor.
     * @param $array where to get data from
     */
    public function __construct($array) {
        $this->set_array($array);
    }

    /**
     * Fills the Object with the provided array
     * @param $array
     */
    protected function set_array($array) {
        if (!is_array($array)) {
            $array = get_object_vars($array);
        }

        foreach($array as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * PHP overloading magic
     * Uses get_NAME method and property value if not present
     *
     * @param string $name property name
     * @return mixed
     * @throws Exception
     */
    public function __get($name) {
        $method = 'get_'.$name;
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new Exception('Unknown property ' . $name . ' of '. get_class($this));
    }

    /**
     * PHP overloading magic
     * Uses set_NAME method and property value if not present
     *
     * @param string $name property name
     * @param $value
     * @return mixed
     * @throws Exception
     */
    public function __set($name, $value) {
        if (!property_exists($this, $name)) {
            throw new Exception('Unknown property ' . $name . ' of ' . get_class($this));
        }

        $method = 'set_'.$name;
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }

        $this->$name = $value;
    }

    /**
     * Converts object to array
     * @return array
     */
    public function get_array() {
        $array = array();
        foreach($this as $key => $value) {
            $array[$key] = $this->$key;
        }
        return $array;
    }

    /**
     * Sets data and updates object into the database
     * @param $data
     * @return mixed
     */
    public function update($data) {
        $this->set_array($data);
        return $this->save();
    }

}