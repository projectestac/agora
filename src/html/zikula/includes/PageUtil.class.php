<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2001, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: AjaxUtil.class.php 20909 2006-12-26 12:23:12Z landseer $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 * @package Zikula_Core
 */

/**
 * Zikula page variables functions
 *
 * A <em>page variable</em> is an entity identified by a name that stores a value for the currently
 * rendered page. They are used to set for example the title of the page, the stylesheets used etc.
 * from the module.
 *
 * Page variables can be <em>single valued</em> or <em>multi valued</em>. In the first case, only
 * one single value can be set; each new setting will overwrite the old one. The title is an example
 * for a single values page variable (each page can have exactly one title). Multi valued variables
 * can contain more than one value, and new values can be added to the variable. An example of a multi
 * valued variable is stylesheet (a page can use more than one style sheet).
 *
 * Zikula offers a set of API functions to manipulate page variables.
 *
 * A module can register a new page variable by providing its metadata using the pnPageRegisterVar
 * function.
 *
 * Zikula doesn't impose any restriction on the page variabl's name except for duplicate
 * and reserved names. As of this writing, the list of reserved names consists of
 * <ul>
 * <li>title</li>
 * <li>description</li>
 * <li>keywords</li>
 * <li>stylesheet</li>
 * <li>javascript</li>
 * <li>body</li>
 * <li>rawtext</li>
 * <li>footer</li>
 * </ul>
 *
 * @author      J�rg Napp, Frank Schummertz
 * @link        http://support.zikula.de   Zikula home page
 * @package     Zikula_Core
 * @subpackage  PageUtil
 */
class PageUtil
{
    /**
     * registerVar()
     *
     * Registers a new page variable.
     * Zikula doesn't impose any restriction on the page variabl's name except for duplicate
     * and reserved names. As of this writing, the list of reserved names consists of
     * <ul>
     * <li>title</li>
     * <li>keywords</li>
     * <li>stylesheet</li>
     * <li>javascript</li>
     * <li>body</li>
     * </ul>
     *
     * @param string $varname the name of the new page variable
     * @param boolean $multivalue to define a single or a multi valued variable
     * @param string $default to set the default value. This value is assigned to the variable at registration time.
     * @return boolean success or not
     * @author J�rg Napp
     * @since Feb 04
     * @see resetVar
     **/
    function registerVar($varname, $multivalue = false, $default = null)
    {
        global $_pnPageVars;

        // check for $_pnPageVars sanity
        if (!isset($_pnPageVars)) {
            $_pnPageVars = array();
        } elseif (!is_array($_pnPageVars)) {
            return false;
        }

        // if already registered, stop
        if (isset($_pnPageVars[$varname])) {
            return false;
        }

        // define the page variable and it's default value
        $_pnPageVars[$varname] = compact('multivalue', 'default');

        // always make the default value the contents (even if it's null - that will be filtered away)
        PageUtil::resetVar($varname);

        return true;
    }

    /**
     * resetVar()
     *
     * Resets the pge variable back to its default value.
     * All values assigned by addVar() or setVar()
     * will get lost.
     *
     * @param string $varname the name of the page variable
     * @return boolean true on success, false of the page variable is not registered.
     * @author J�rg Napp
     * @since Feb 04
     * @see registerVar
     **/
    function resetVar($varname)
    {
        global $_pnPageVars;

        // check for $_pnPageVars sanity
        if (!isset($_pnPageVars)) {
            $_pnPageVars = array();
        } elseif (!is_array($_pnPageVars)) {
            return false;
        }

        if (!isset($_pnPageVars[$varname])) {
            return false;
        }

        if ($_pnPageVars[$varname]['multivalue']) {
            if (empty($_pnPageVars[$varname]['default'])) {
                $_pnPageVars[$varname]['contents'] = array();
            } else {
                $_pnPageVars[$varname]['contents'] = array($_pnPageVars[$varname]['default']);
            }
        } else {
            if (empty($_pnPageVars[$varname]['default'])) {
                $_pnPageVars[$varname]['contents'] = null;
            } else {
                $_pnPageVars[$varname]['contents'] = $_pnPageVars[$varname]['default'];
            }
        }
        return true;
    }

    /**
     * getVar()
     *
     * returns the value(s) of a page variable. In the case of
     * a mulit valued variable, this is an array containing all assigned
     * values
     *
     * @param string $varname the name of the page variable
     * @return mixed the contents of the variable
     * @author J�rg Napp
     * @since Feb 04
     * @see setVar
     * @see addVar
     **/
    function getVar($varname, $default = null)
    {
        global $_pnPageVars;

        // check for $_pnPageVars sanity
        if (!isset($_pnPageVars)) {
            $_pnPageVars = array();
        } elseif (!is_array($_pnPageVars)) {
            return false;
        }

        if (isset($_pnPageVars[$varname]) && isset($_pnPageVars[$varname]['contents'])) {
            return $_pnPageVars[$varname]['contents'];
        } elseif (isset($_pnPageVars[$varname]['default'])) {
            return $_pnPageVars[$varname]['default'];
        }

        return $default;
    }

    /**
     * setVar()
     *
     * Sets the page variable to a new value. In the case of
     * a multi valued page variable, all previously added values
     * will get lost. If you want to add a value to a multi valued
     * page variable, use PageUtil::addVar.
     *
     * @param string $varname the name of the page variable
     * @param mixed $value the new value
     * @return boolean true on success, false of the page variable is not registered.
     * @author J�rg Napp
     * @since Feb 04
     * @see addVar
     **/
    function setVar($varname, $value)
    {
        global $_pnPageVars;

        // check for $_pnPageVars sanity
        if (!isset($_pnPageVars)) {
            $_pnPageVars = array();
        } elseif (!is_array($_pnPageVars)) {
            return false;
        }

        if (!isset($_pnPageVars[$varname])) {
            return false;
        }

        if ($_pnPageVars[$varname]['multivalue']) {
            $_pnPageVars[$varname]['contents'] = array($value);
        } else {
            $_pnPageVars[$varname]['contents'] = $value;
        }
        return true;
    }

    /**
     * addVar()
     *
     * Adds a new vaule to a page variable. In the case of a single
     * page variable, this functions acts exactly like PageUtil::setVar.
     *
     * @param string $varname the name of the page variable
     * @param mixed $value the new value
     * @return boolean true on success, false of the page variable is not registered.
     * @author J�rg Napp
     * @since Feb 04
     * @see setVar
     **/
    function addVar($varname, $value)
    {
        global $_pnPageVars;
        // check for $_pnPageVars sanity
        if (!isset($_pnPageVars)) {
            $_pnPageVars = array();
        } elseif (!is_array($_pnPageVars)) {
            return false;
        }

        if (!isset($_pnPageVars[$varname])) {
            return false;
        }

        if ($_pnPageVars[$varname]['multivalue']) {
            if (is_array($value)) {
                $_pnPageVars[$varname]['contents'] = array_merge($_pnPageVars[$varname]['contents'], $value);
            } else {
                $_pnPageVars[$varname]['contents'][] = $value;
            }
            // make values unique
            $_pnPageVars[$varname]['contents'] = array_unique($_pnPageVars[$varname]['contents']);
        } else {
            $_pnPageVars[$varname]['contents'] = $value;
        }

        return true;
    }

}
