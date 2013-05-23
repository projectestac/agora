<?php
/**
 * Formicula - the contact mailer for Zikula
 * -----------------------------------------
 *
 * @copyright  (c) Formicula Development Team
 * @link       https://github.com/landseer/Formicula
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Frank Schummertz <frank@zikula.org>
 * @package    Third_Party_Components
 * @subpackage Formicula
 */

/**
 * Content plugin class for displaying forms
 */
class Formicula_ContentType_Form extends Content_AbstractContentType
{
    protected $form;

    public function getTitle()
    {
        return DataUtil::formatForDisplay($this->__('Formicula form'));
    }
    public function getDescription()
    {
        return DataUtil::formatForDisplay($this->__('Display a specific Formicula form'));
    }
    public function loadData(&$data)
    {
        $this->form = $data['form'];
    }
    public function display()
    {
        if (isset($this->form)) {
            PageUtil::addVar('stylesheet', ThemeUtil::getModuleStylesheet('Formicula'));
            $form = ModUtil::func('Formicula', 'user', 'main', array('form' => (int)$this->form));
            return $form;
        }
        return DataUtil::formatForDisplay($this->__('No form selected'));
    }
    public function displayEditing()
    {
        if (isset($this->form)) {
            $output = '<p>' . $this->__f('The Formicula form #%s is shown here.', $this->form) . '</p>';
            return $output;
        }
        return DataUtil::formatForDisplay($this->__('No form selected'));
    }
    public function getDefaultData()
    {
        return array('form' => 0);
    }
}