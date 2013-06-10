<?php
/**
 * Intraweb
 *
 * @copyright  (c) 2011, Intraweb Development Team
 * @link       http://code.zikula.org/intraweb/
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package    Intraweb_Modules
 * @subpackage IWAgendas
 */

class IWagendas_Block_Calendar extends Zikula_Controller_AbstractBlock
{
    public function init()
    {
        SecurityUtil::registerPermissionSchema("IWagendas:calendarblock:", "Block title::");
    }

    public function info()
    {
        return array('text_type'      => 'Calendar',
                     'module'         => 'IWagendas',
                     'text_type_long' => __('Calendar'),
                     'allow_multiple' => true,
                     'form_content'   => false,
                     'form_refresh'   => false,
                     'show_preview'   => true);
    }

    /**
     * Show the month calendar into a bloc
     *
     * @param array $blockinfo The month and the year to show
     *
     * @return The calendar content
     */
    public function display($blockinfo)
    {
        $mes = FormUtil::getPassedValue('mes', isset($args['mes']) ? $args['mes'] : 0, 'REQUEST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : 0, 'REQUEST');
        // Security check
        if (!SecurityUtil::checkPermission("IWagendas:calendarblock:", $blockinfo['title'] . "::", ACCESS_READ)) return;
        // Check if the module is available
        if (!ModUtil::available('IWagendas')) return;
        $user = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : '-1';
        //get the calendar saved in the user vars.
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists',
                                    array('name' => 'Calendar',
                                          'module' => 'IWagendas',
                                          'uid' => $user,
                                          'sv' => $sv));
        /*
        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $s = ModUtil::func('IWmain', 'user', 'userGetVar',
                                array('uid' => $user,
                                      'name' => 'calendar',
                                      'module' => 'IWagendas',
                                      'sv' => $sv,
                                      'nult' => true));
            $blockinfo['content'] = $s;
            return BlockUtil::themesideblock($blockinfo);
        }
         * 
         */
        $s = ModUtil::func('IWagendas', 'user', 'getCalendarContent',
                            array('mes' => $mes,
                                  'any' => $any));
        //Copy the block information into user vars
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar',
                       array('uid' => $user,
                             'name' => 'calendar',
                             'module' => 'IWagendas',
                             'sv' => $sv,
                             'value' => $s,
                             'lifetime' => '700'));
        //Copy the block information into user vars
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar',
                       array('uid' => $user,
                             'name' => 'month',
                             'module' => 'IWagendas',
                             'sv' => $sv,
                             'value' => $mes));
        // Populate block info and pass to theme
        $blockinfo['content'] = $s;
        return BlockUtil::themesideblock($blockinfo);
    }
}
