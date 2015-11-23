<?php

/**
 * Some Util functions from AgoraPortal
 *
 * @author Pau Ferrer Ocaña
 */
class AgoraPortal_Util {

    public static function print_object($object) {
        $print = print_r($object, true);
        LogUtil::registerError('<pre>'.$print.'</pre>');
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

    public static function getFormVar($args, $varname, $default = null, $method = 'GETPOST') {
        $value = isset($args[$varname]) ? $args[$varname] : $default;
        return FormUtil::getPassedValue($varname, $value, $method);
    }

    //PERMISSION FUNCTIONS
    private static function checkPermission($perm) {
        return SecurityUtil::checkPermission('Agoraportal::', "::", $perm) ? true: false;
    }

    public static function isUser() {
        return self::checkPermission(ACCESS_READ);
    }

    public static function requireUser() {
        if (!self::isUser()) {
            throw new Zikula_Exception_Forbidden();
        }
    }

    public static function isClient() {
        return self::checkPermission(ACCESS_COMMENT);
    }

    public static function requireClient() {
        if (!self::isClient()) {
            throw new Zikula_Exception_Forbidden();
        }
    }

    public static function isManager() {
        return self::checkPermission(ACCESS_ADD);
    }

    public static function requireManager() {
        if (!self::isManager()) {
            throw new Zikula_Exception_Forbidden();
        }
    }

    public static function isAdmin() {
        return self::checkPermission(ACCESS_ADMIN);
    }

    public static function requireAdmin() {
        if (!self::isAdmin()) {
            throw new Zikula_Exception_Forbidden();
        }
    }
}