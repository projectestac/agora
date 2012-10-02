<?php
/**
 * Radio button plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnformcheckbox.php 22138 2007-06-01 10:19:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Radiobutton plugin
 *
 * Plugin to generate a radiobutton for selecting one-of-X.
 * Usage with fixed number of radiobuttons:
 *
 * <code>
 * <!--[pnformradiobutton id=yesButton dataField=ok]--> <!--[pnformlabel text=Yes for=yesButton]--> <br/>
 * <!--[pnformradiobutton id=noButton dataField=ok]--> <!--[pnformlabel text=No for=noButton]-->
 * </code>
 *
 * The above case sets 'ok' to either 'yesButton' or 'noButton' in the hashtable returned 
 * by {@link pnFormRender::pnFormGetValues()}. As you can see the radiobutton defaults to using the ID for the returned value
 * in the hashtable. You can override this by setting 'value' to something different. 
 *
 * You can also enforce a selection:
 *
 * <code>
 * <!--[pnformradiobutton id=yesButton dataField=ok mandatory=1]--> <!--[pnformlabel text=Yes for=yesButton]--> <br/>
 * <!--[pnformradiobutton id=noButton dataField=ok mandatory=1]--> <!--[pnformlabel text=No for=noButton]-->
 * </code>
 *
 * If you have a list of radiobuttons inside a for/each loop then you can set the ID to something from the data loop
 * like here:
 * <code>
 * <!--[foreach from=$items item=item]-->
 *   <!--[pnformradiobutton id=$item.name dataField=item mandatory=true]--> <!--[pnformlabel text=$item.title for=$item.name]-->
 * <!--[/foreach]-->
 * </code>
 *
 * @package pnForm
 * @subpackage Plugins
 */
class pnFormRadioButton extends pnFormStyledPlugin
{
    /**
     * Value
     *
     * The value returned in pnFormGetValues() when this radio button is checked.
     * @var string
     */
    var $value;

    /**
     * Checked
     *
     * The current state of the radio button
     * @var bool
     */
    var $checked;

    /**
     * Enable or disable read only mode
     */
    var $readOnly;

    /**
     * CSS class to use
     * @var string
     */
    var $cssClass;

    /**
     * Data field name for looking up initial data
     *
     * The name stored here is used to lookup initial data for the plugin in the render's variables.
     * Defaults to the ID of the plugin. See also tutorials on the Zikula site.
     * @var string
     */
    var $dataField;

    /**
     * Enable or disable use of $dataField
     * @var bool
     */
    var $dataBased;

    /**
     * Group name for this input
     *
     * The group name is used to locate data in the render (when databased) and to restrict which
     * plugins to do validation on (to be implemented).
     * @see pnFormRender::pnFormGetValues()
     * @see pnFormRender::pnFormIsValid()
     * @var string
     */
    var $group;

    /**
    * Radiobutton selection group name
    * @var string
    */
    var $groupName;

    /**
     * Validation indicator used by the framework.
     *
     * The true/false value of this variable indicates whether or not radiobutton selection is valid
     * (a valid (set of) radiobuttons satisfies the mandatory requirement).
     * Use {@link pnFormRadioButton::setError()} and {@link pnFormRadioButton::clearValidation()}
     * to change the value.
     * @var bool
     */
    var $isValid = true;

    /**
     * Enable or disable mandatory check
     *
     * By enabling mandatory checking you force the user to check one of the radio buttons on the page
     * that shares the same groupName.
     * @var bool
     */
    var $mandatory;

    /**
     * Enable or disable mandatory asterisk
     * @var bool
     */
    var $mandatorysym;

    /**
     * Enable or disable auto postback
     *
     * Auto postback means "generate a server side event when selection changes".
     * If enabled then the event handler named in $onSelectedIndexChanged will be fired
     * in the main form event handler.
     * @var bool
     */
    var $autoPostBack;

    /**
     * Name of checked changed method
     *
     * @var string Default is "handleCheckedChanged"
     */
    var $onCheckedChanged = 'handleCheckedChanged';

    /**
     * Error message to display when input does not validate
     *
     * Use {@link pnFormRadioButton::setError()} and {@link pnFormRadioButton::clearValidation()}
     * to change the value.
     * @var string
     */
    var $errorMessage;

    /**
     * Text label for this plugin
     *
     * This variable contains the label text for the radiobutton. The {@link pnFormLabel} plugin will set
     * this text automatically when it is a label for this input.
     * @var string
     */
    var $myLabel;


    var $validationChecked = false;


    function getFilename()
    {
        return __FILE__; // FIXME: should be found in smarty's data???
    }


    function create(&$render, $params)
    {
        // Load all special and non-string parameters
        // - the rest are fetched automatically

        $this->checked = (array_key_exists('checked', $params) ? $params['checked'] : false);

        $this->readOnly = (array_key_exists('readOnly', $params) ? $params['readOnly'] : false);

        $this->dataBased = (array_key_exists('dataBased', $params) ? $params['dataBased'] : true);
        $this->value = (string)(array_key_exists('value', $params) ? $params['value'] : $this->id);
        $this->groupName = (array_key_exists('groupName', $params) ? $params['groupName'] : $this->dataField);
    }


    function load(&$render, &$params)
    {
        $this->loadValue($render, $render->get_template_vars());
    }


    function loadValue(&$render, &$values)
    {
        if ($this->dataBased)
        {
            $value = null;

            if ($this->group == null)
            {
                if (array_key_exists($this->dataField, $values))
                    $value = (string)$values[$this->dataField];
            }
            else
            {
                if (array_key_exists($this->group, $values) && array_key_exists($this->dataField, $values[$this->group]))
                {
                    $value = (string)$values[$this->group][$this->dataField];
                }
            }

            if ($value !== null)
                $this->checked = ($this->value === $value);
            else
                $this->checked = false;
        }
    }


    function initialize(&$render)
    {
        $render->pnFormAddValidator($this);
    }


    function render(&$render)
    {
        $idHtml = $this->getIdHtml();

        $nameHtml = " name=\"{$this->groupName}\"";
        $readOnlyHtml = ($this->readOnly ? " disabled=\"disabled\"" : '');
        $checkedHtml = ($this->checked ? " checked=\"checked\"" : '');

        $postbackHtml = '';
        if ($this->autoPostBack)
        {
            $postbackHtml = " onclick=\"" . $render->pnFormGetPostBackEventReference($this, '') . "\"";
        }

        $class = 'radio';
        if ($this->mandatory &&  $this->mandatorysym) {
            $class .= ' z-mandatoryinput';
        }
        if ($this->readOnly) {
            $class .= ' readonly';
        }
        if ($this->cssClass != null) {
            $class .= ' ' .$this->cssClass;
        }

        $attributes = $this->renderAttributes($render);

        $result = "<input type=\"radio\" value=\"{$this->value}\" {$idHtml}{$nameHtml}{$readOnlyHtml}{$checkedHtml}{$postbackHtml}{$attributes} class=\"$class\" />";
        if ($this->mandatory &&  $this->mandatorysym)
          $result .= '<span class="z-mandatorysym">*</span>';

        return $result;
    }


    function raisePostBackEvent(&$render, $eventArgument)
    {
        $args = array('commandName' => null, 'commandArgument' => null);
        if (!empty($this->onCheckedChanged))
            $render->pnFormRaiseEvent($this->onCheckedChanged, $args);
    }


    function decode(&$render)
    {
        // Do not read new value if readonly (evil submiter might have forged it)
        if (!$this->readOnly)
            $this->checked = (FormUtil::getPassedValue($this->groupName, null, 'POST') === $this->value ? true : false);
    }


    function validate(&$render)
    {
        $this->clearValidation($render);

        if ($this->mandatory && !$this->validationChecked)
        {
            $firstRadioButton = null;
            if (!$this->findCheckedRadioButton($render, $firstRadioButton))
            {
                $this->setError(__('Error! You must make a selection.'));
            }
        }
    }


    function findCheckedRadioButton(&$render, &$firstRadioButton)
    {
        $lim = count($render->pnFormPlugins);
        for ($i=0; $i<$lim; ++$i)
        {
            if ($this->findCheckedRadioButton_rec($firstRadioButton, $render->pnFormPlugins[$i]))
                return true;
        }
        return false;
    }


    function findCheckedRadioButton_rec(&$firstRadioButton, &$plugin)
    {
        if (is_a($plugin, 'pnFormRadioButton') && $plugin->groupName == $this->groupName)
        {
            $plugin->validationChecked = true;
            if ($firstRadioButton == null)
                $firstRadioButton = $plugin;
            if ($plugin->checked)
                return true;
        }

        $lim = count($plugin->plugins);
        for ($i=0; $i<$lim; ++$i)
        {
            if ($this->findCheckedRadioButton_rec($firstRadioButton, $plugin->plugins[$i]))
                return true;
        }
        return false;
    }


    function setError($msg)
    {
        $this->isValid = false;
        $this->errorMessage = $msg;
    }


    function clearValidation(&$render)
    {
        $this->isValid = true;
        $this->errorMessage = null;
    }


    function saveValue(&$render, &$data)
    {
        if ($this->dataBased)
        {
            if ($this->group == null)
            {
                if ($this->checked)
                    $data[$this->dataField] = $this->value;
            }
            else
            {
                if ($this->checked)
                {
                    if (!array_key_exists($this->group, $data))
                        $data[$this->group] = array();
                    $data[$this->group][$this->dataField] = $this->value;
                }
            }
        }
    }
}


function smarty_function_pnformradiobutton($params, &$render)
{
    return $render->pnFormRegisterPlugin('pnFormRadioButton', $params);
}
