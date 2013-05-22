<?php /* Smarty version 2.6.26, created on 2012-11-30 16:33:15
         compiled from IWstats_block_usersonline.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'IWstats_block_usersonline.htm', 3, false),)), $this); ?>
<?php if ($this->_tpl_vars['seeunames']): ?>
<div>
    <?php echo smarty_function_gt(array('text' => "Users on line:"), $this);?>

</div>
<div style="margin-top: 15px;">
    <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
    <div>
        <?php echo $this->_tpl_vars['user']; ?>

    </div>
    <?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>
<div style="margin-top: 15px;">
    <?php echo smarty_function_gt(array('text' => "There are %s unregistered and 1 registerd user online.",'plural' => "There are %s unregistered and %s registered users online.",'tag1' => $this->_tpl_vars['online'],'tag2' => $this->_tpl_vars['validated'],'count' => $this->_tpl_vars['validated']), $this);?>

</div>