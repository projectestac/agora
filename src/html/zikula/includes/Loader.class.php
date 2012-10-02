<?php
/**
 * Zikula Application Framework
 *
 * @copyright Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: Loader.class.php 27268 2009-10-30 10:02:50Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Robert Gasch rgasch@gmail.com
 * @uses class utililty class (class loader)
 * @package Zikula_Core
 */

/**
 * Loader
 *
 * @package Zikula_Core
 * @subpackage Loader
 */
class Loader
{
    /**
     * Load a file from the specified location in the pn file tree
     *
     * @param fileName    The name of the file to load
     * @param path        The path prefix to use (optional) (default=null)
     * @param exitOnError whether or not exit upon error (optional) (default=true)
     * @param returnVar   The variable to return from the sourced file (optional) (default=null)
     *
     * @return string The file which was loaded
     */
    function loadFile($fileName, $path = null, $exitOnError = true, $returnVar = null)
    {
        if (!$fileName) {
            return pn_exit(__f("Error! Invalid file specification '%s'.", $fileName));
        }

        $file = null;
        if ($path) {
            $file = "$path/$fileName";
        } else {
            $file = $fileName;
        }

        $file = DataUtil::formatForOS($file);
        if (Loader::_is_included($file)) {
            return $file;
        }

        if (is_file($file) && is_readable($file)) {
            if (Loader::includeOnce($file)) {
                if ($returnVar) {
                    return $$returnVar;
                } else {
                    return $file;
                }
            }
        }

        if ($exitOnError) {
            return pn_exit(__f("Error! Could not load the file '%s'.", $fileName));
        }

        return false;
    }

    /**
     * Load all files from the specified location in the pn file tree
     *
     * @param files        An array of filenames to load
     * @param path         The path prefix to use (optional) (default='null')
     * @param exitOnError  whether or not exit upon error (optional) (default=true)
     *
     * @return boolean true
     */
    function loadAllFiles($files, $path = null, $exitOnError = false)
    {
        return Loader::loadFiles($files, $path, true, $exitOnError);
    }

    /**
     * Return after the first successful file load. This corresponds to the
     * default behaviour of loadFiles().
     *
     * @param files        An array of filenames to load
     * @param path         The path prefix to use (optional) (default='null')
     * @param exitOnError  whether or not exit upon error (optional) (default=true)
     *
     * @return boolean true
     */
    function loadOneFile($files, $path = null, $exitOnError = false)
    {
        return Loader::loadFiles($files, $path, false, $exitOnError);
    }

    /**
     * Load multiple files from the specified location in the pn file tree
     * Note that in it's default invokation, this method exits after the
     * first successful file load.
     *
     * @param files       Array of filenames to load
     * @param path        The path prefix to use (optional) (default='null')
     * @param all         whether or not to load all files or exit upon 1st successful load (optional) (default=false)
     * @param exitOnError whether or not exit upon error (optional) (default=true)
     * @param returnVar   The variable to return if $all==false (optional) (default=null)
     *
     * @return boolean true
     */
    function loadFiles($files, $path = null, $all = false, $exitOnError = false, $returnVar = '')
    {
        if (!is_array($files) || !$files) {
            return pn_exit(__('Error! Invalid file array specification.'));
        }

        $files = array_unique($files);

        $loaded = false;
        foreach ($files as $file) {
            $rc = Loader::loadFile($file, $path, $exitOnError, $returnVar);

            if ($rc) {
                $loaded = true;
            }

            if ($loaded && !$all) {
                break;
            }
        }

        if ($returnVar && !$all) {
            return $rc;
        }

        return $loaded;
    }

    /**
     * Load a class file from the specified location in the file tree
     *
     * @param className    The class-basename to load
     * @param classPath    The path prefix to use (optional) (default='includes')
     * @param exitOnError  whether or not exit upon error (optional) (default=true)
     *
     * @return string The file name which was loaded
     */
    function loadClass($className, $classPath = 'includes', $exitOnError = true)
    {
        if (!$className) {
            return pn_exit(__f("Error! Invalid class specification '%s'.", $className));
        }

        if (class_exists($className)) {
            return $className;
        }

        $classFile = $className . '.class.php';
        $rc = Loader::loadFile($classFile, "config/classes/$classPath", false);
        if (!$rc) {
            $rc = Loader::loadFile($classFile, $classPath, $exitOnError);
        }

        return $rc;
    }

    /**
     * Load a PNObject extended class from the given module. The given class name is
     * prefixed with 'PN' and underscores are removed to produce a proper class name.
     *
     * @param module        The module to load from
     * @param base_obj_type The base object type for which to load the class
     * @param array         If true, load the array class instead of the single-object class.
     * @param exitOnError   whether or not exit upon error (optional) (default=true)
     * @param prefix        Override parameter for the default PN prefix (default=PN)
     *
     * @return string The ClassName which was loaded from the file
     */
    function loadClassFromModule($module, $base_obj_type, $array = false, $exitOnError = false, $prefix = 'PN')
    {
        if (!$module) {
            return pn_exit(__f("Error! Invalid module specification '%s'.", $module));
        }

        if (!$base_obj_type) {
            return pn_exit(__f("Error! Invalid 'base_obj_type' specification '%s'.", $base_obj_type));
        }

        $prefix = (string) $prefix;

        if (strpos($base_obj_type, '_') !== false) {
            $c = $base_obj_type;
            $class = '';
            while (($p = strpos($c, '_')) !== false) {
                $class .= ucwords(substr($c, 0, $p));
                $c = substr($c, $p + 1);
            }
            $class .= ucwords($c);
        } else {
            $class = ucwords($base_obj_type);
        }

        $class = $prefix . $class;
        if ($array) {
            $class .= 'Array';
        }

        // prevent unncessary reloading
        if (class_exists($class)) {
            return $class;
        }

        $classFiles = array();
        $classFiles[] = "config/classes/$module/{$class}.class.php";
        $classFiles[] = "system/$module/classes/{$class}.class.php";
        $classFiles[] = "modules/$module/classes/{$class}.class.php";

        foreach ($classFiles as $classFile) {
            $classFile = DataUtil::formatForOS($classFile);
            if (file_exists($classFile) && is_readable($classFile)) {
                if (Loader::includeOnce($classFile)) {
                    return $class;
                }

                if ($exitOnError) {
                    return pn_exit(__f('Error! Unable to load class [%s]', $classFile));
                }

                return false;
            }
        }

        return false;
    }

    /**
     * Load a PNObjectArray extended class from the given module. The given class name is
     * prefixed with 'PN' and underscores are removed to produce a proper class name.
     *
     * @param module        The module to load from
     * @param base_obj_type The base object type for which to load the class
     * @param exitOnError   whether or not exit upon error (optional) (default=true)
     * @param prefix        Override parameter for the default PN prefix (default=PN)
     *
     * @return string The ClassName which was loaded from the file
     */
    function loadArrayClassFromModule($module, $base_obj_type, $exitOnError = false, $prefix = 'PN')
    {
        return Loader::loadClassFromModule($module, $base_obj_type, true, $exitOnError, $prefix);
    }

    /**
     * cache for results of includes
     * done this was because min version is not PHP5
     *
     * @param string $file
     * @param bool $write
     * @param bool $state With $write, set state of $file to true/false
     * @return bool
     */
    function _is_included($file, $write = false, $state = true)
    {
        static $cache = array();

        // read mode
        if (!$write) {
            if (isset($cache[$file])) {
                return true;
            }
        } else {
            // write mode
            $cache[$file] = (bool) $state;
        }
        return false;
    }

    /**
     * Internal include_once, considerably faster
     *
     * @author Drak
     * @param string $file
     * @return bool True if file was included - false if not found or included before.
     */
    function includeOnce($file)
    {
        if (defined('_PNINSTALLVER')) {
            return include_once ($file);
        }
        // check if file has been included already
        if (!Loader::_is_included($file)) {
            // before include, expect that it will success. see #827
            Loader::_is_included($file, true);
            if (!include ($file)) {
                // if include was not successful, reset cache
                Loader::_is_included($file, true, false);
                return false;
            } else {
                return true;
            }
        }

        return false;
    }

    /**
     * Internal require_once, considerably faster
     *
     * @author Drak
     * @param string $file
     * @return bool
     */
    function requireOnce($file)
    {
        if (defined('_PNINSTALLVER')) {
            return require_once ($file);
        }
        // check if file has been included already
        if (!Loader::_is_included($file)) {
            if (require ($file)) {
                // if we manaed to include it, cache the result
                Loader::_is_included($file, true);
                return true;
            }
        }

        return false;
    }
}
