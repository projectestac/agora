<?php /* Smarty version 2.6.26, created on 2012-11-30 16:33:12
         compiled from IWforms_block_formsList.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'img', 'IWforms_block_formsList.htm', 7, false),array('function', 'gt', 'IWforms_block_formsList.htm', 18, false),array('function', 'modurl', 'IWforms_block_formsList.htm', 24, false),array('function', 'userloggedin', 'IWforms_block_formsList.htm', 65, false),array('modifier', 'gt', 'IWforms_block_formsList.htm', 7, false),)), $this); ?>
<?php if (! $this->_tpl_vars['listBox']): ?>
<?php $_from = $this->_tpl_vars['forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['form']):
?>
<div style="float: left; width:70%">
    <?php if ($this->_tpl_vars['form']['accessLevel'] == 7): ?>
    <?php if ($this->_tpl_vars['form']['isFlagged'] == 1): ?>
    <span>
        <?php echo smarty_function_img(array('modname' => 'core','src' => 'flag.png','set' => 'icons/extrasmall','alt' => ((is_array($_tmp='Open the entry of annotations and editing')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'title' => ((is_array($_tmp='Open the entry of annotations and editing')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view']))), $this);?>

    </span>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['form']['needValidation'] == 1): ?>
    <span>
        <?php echo smarty_function_img(array('modname' => 'core','src' => '14_layer_visible.png','set' => 'icons/extrasmall','alt' => ((is_array($_tmp='Open the entry of annotations and editing')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'title' => ((is_array($_tmp='Open the entry of annotations and editing')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view']))), $this);?>

    </span>
    <?php endif; ?>
    <?php endif; ?>
    <?php echo $this->_tpl_vars['form']['formName']; ?>

    <?php if ($this->_tpl_vars['form']['newLabel']): ?>
    <span style="color: red; background-color: #ffffaf;"><?php echo smarty_function_gt(array('text' => 'New'), $this);?>
</span>
    <?php endif; ?>
</div>
<div style="float: right;">
    <?php if (( $this->_tpl_vars['form']['accessLevel'] == 1 || $this->_tpl_vars['form']['accessLevel'] >= 3 ) && $this->_tpl_vars['form']['closeInsert'] == 0): ?>
    <span>
        <a href="<?php echo smarty_function_modurl(array('modname' => 'IWforms','type' => 'user','func' => 'newItem','fid' => $this->_tpl_vars['form']['fid']), $this);?>
">
            <?php echo smarty_function_img(array('modname' => 'core','src' => 'lists.png','set' => 'icons/extrasmall','alt' => ((is_array($_tmp='Send an annotation')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'title' => ((is_array($_tmp='Send an annotation')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view']))), $this);?>

        </a>
    </span>
    <?php endif; ?>
    <?php if (( $this->_tpl_vars['form']['accessLevel'] == 2 || $this->_tpl_vars['form']['accessLevel'] >= 3 ) && $this->_tpl_vars['form']['accessLevel'] != 7): ?>
    <span>
        <a href="<?php echo smarty_function_modurl(array('modname' => 'IWforms','type' => 'user','func' => 'read','fid' => $this->_tpl_vars['form']['fid']), $this);?>
">
            <?php echo smarty_function_img(array('modname' => 'core','src' => 'reminders.png','set' => 'icons/extrasmall','alt' => ((is_array($_tmp='Show annotations')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'title' => ((is_array($_tmp='Show annotations')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view']))), $this);?>

        </a>
    </span>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['form']['accessLevel'] == 7): ?>
    <span>
        <a href="<?php echo smarty_function_modurl(array('modname' => 'IWforms','type' => 'user','func' => 'manage','fid' => $this->_tpl_vars['form']['fid']), $this);?>
">
            <?php echo smarty_function_img(array('modname' => 'core','src' => 'configure.png','set' => 'icons/extrasmall','alt' => ((is_array($_tmp='Managing annotations')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'title' => ((is_array($_tmp='Managing annotations')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view']))), $this);?>

        </a>
    </span>
    <?php endif; ?>
</div>
<div style="clear: both;"></div>
<?php endforeach; else: ?>
<?php echo smarty_function_gt(array('text' => 'You do not have access to any form'), $this);?>

<?php endif; unset($_from); ?>
<?php else: ?>
<form name="loadForm" id="loadForm" action="<?php echo smarty_function_modurl(array('modname' => 'IWforms','type' => 'user','func' => 'load'), $this);?>
" method="post">
    <select name="fid" onchange="if(this.value > 0) submit();">
        <option><?php echo smarty_function_gt(array('text' => "Choose a form..."), $this);?>
</option>
        <?php $_from = $this->_tpl_vars['forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['form']):
?>
        <?php if (isset ( $this->_tpl_vars['fid'] ) && $this->_tpl_vars['form']['fid'] == $this->_tpl_vars['fid']): ?>
        <?php $this->assign('selected', 'selected="selected"'); ?>
        <?php else: ?>
        <?php $this->assign('selected', ''); ?>
        <?php endif; ?>
        <option <?php echo $this->_tpl_vars['selected']; ?>
 value="<?php echo $this->_tpl_vars['form']['fid']; ?>
"><?php echo $this->_tpl_vars['form']['formName']; ?>
</option>
        <?php endforeach; else: ?>
        <?php echo smarty_function_gt(array('text' => 'You do not have access to any form'), $this);?>

        <?php endif; unset($_from); ?>
    </select>
</form>
<?php endif; ?>
<?php echo smarty_function_userloggedin(array('assign' => 'userid'), $this);?>

<?php if ($this->_tpl_vars['userid'] != ''): ?>
<div class="sendedLink">
    <a href="<?php echo smarty_function_modurl(array('modname' => 'IWforms','type' => 'user','func' => 'sended'), $this);?>
">
        <?php echo smarty_function_gt(array('text' => 'Notes sent'), $this);?>

    </a>
</div>
<?php endif; ?>