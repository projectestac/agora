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
class IWagendas_Block_Next extends Zikula_Controller_AbstractBlock {

    public function init() {
        SecurityUtil::registerPermissionSchema('IWagendas:nextblock:', 'Block title::');
    }

    public function info() {
        return array('text_type' => 'Next',
            'module' => 'IWagendas',
            'text_type_long' => $this->__('Notes for the next days'),
            'allow_multiple' => false,
            'form_content' => false,
            'form_refresh' => false,
            'show_preview' => true);
    }

    public function display($blockinfo) {
        // Security check
        if (!SecurityUtil::checkPermission('IWagendas:nextblock:', $blockinfo['title'] . "::", ACCESS_READ))
            return;

        // Check if the module is available
        if (!ModUtil::available('IWagendas'))
            return;
        $user = (UserUtil::isLoggedIn()) ? UserUtil::getVar('uid') : '-1';
        //get the headlines saved in the user vars. It is renovate every 10 minutes
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        $exists = ModUtil::apiFunc('IWmain', 'user', 'userVarExists', array('name' => 'next',
                    'module' => 'IWagendas',
                    'uid' => $user,
                    'sv' => $sv));
        //$exists = false;
        if ($exists) {
            $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
            $s = ModUtil::func('IWmain', 'user', 'userGetVar', array('uid' => $user,
                        'name' => 'next',
                        'module' => 'IWagendas',
                        'sv' => $sv,
                        'nult' => true));
            $blockinfo['content'] = $s;
            return BlockUtil::themesideblock($blockinfo);
        }

        // Get the view object
        $view = Zikula_View::getInstance('IWagendas', false);

        // Get the number of days in which the future events will be shown
        $days = $blockinfo['url'];

        // Get the annotations in the following days
        $texts = ModUtil::apiFunc('IWagendas', 'user', 'getEvents', array('inici' => time(),
                    'final' => time() + $days * 24 * 60 * 60));
        foreach ($texts as $text) {
            $datafield = str_replace("\r", '', str_replace('\'', '&acute;', $text['c1']));
            // replace any newlines that aren't preceded by a > with a <br />
            $datafield = preg_replace('/(?<!>)\n/', "<br />", $datafield);
            $title = ($text['tasca']) ? $this->__('Task') . ' - ' . $text['nivell'] : ($text['totdia'] == 1) ? $this->__('All day') : date('H:i', $text['data']);
            $date = date('d/m', $text['data']);
            $events[] = array('date' => $date,
                'title' => $title,
                'deleted' => $text['deleted'],
                'modified' => $text['modified'],
                'datafield' => $datafield);
        }

        if (count($texts) == 0) {
            $events[] = array('date' => '',
                'title' => '',
                'deleted' => 0,
                'modified' => 0,
                'datafield' => $this->__('There are no events in the agenda for the next ') . ' ' . $days . ' ' . $this->__(' days'),
            );
        }

        $view->assign('events', $events);
        $view->assign('days', $days);

        $s = $view->fetch('IWagendas_block_next.htm');

        //Copy the block information into user vars
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        ModUtil::func('IWmain', 'user', 'userSetVar', array('uid' => $user,
            'name' => 'next',
            'module' => 'IWagendas',
            'sv' => $sv,
            'value' => $s,
            'lifetime' => '700'));

        $blockinfo['content'] = $s;

        return BlockUtil::themesideblock($blockinfo);
    }

    public function update($blockinfo) {
        $dies = (int) FormUtil::getPassedValue('dies', 100, 'POST');
        $blockinfo['url'] = $dies;
        return $blockinfo;
    }

    public function modify($blockinfo) {
        $diesvalor = (!empty($blockinfo['url'])) ? $blockinfo['url'] : '7';
        $sortida = '<tr><td valign="top">' . $this->__('Number of days to show in the block') . '</td><td>' . "<input type=\"text\" name=\"dies\" size=\"5\" maxlength=\"255\" value=\"$diesvalor\" />" . "</td></tr>\n";
        return $sortida;
    }

}
