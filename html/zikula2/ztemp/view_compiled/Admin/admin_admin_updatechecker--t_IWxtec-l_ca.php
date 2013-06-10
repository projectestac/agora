<?php /* Smarty version 2.6.26, created on 2012-11-30 16:33:10
         compiled from admin_admin_updatechecker.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'checkpermissionblock', 'admin_admin_updatechecker.tpl', 1, false),array('function', 'gt', 'admin_admin_updatechecker.tpl', 4, false),)), $this); ?>
<?php $this->_tag_stack[] = array('checkpermissionblock', array('component' => '::','instance' => '::','level' => 'ACCESS_ADMIN')); $_block_repeat=true;smarty_block_checkpermissionblock($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <?php if ($this->_tpl_vars['notices']['update']['update_show']): ?>
        <div id="z-updatechecker">
            <strong><?php echo smarty_function_gt(array('text' => "Upgrade found!"), $this);?>
</strong>
            <p>
                <?php echo smarty_function_gt(array('text' => "A new version of the Zikula core is available.",'domain' => 'zikula'), $this);?>
<br />
                <a href="http://zikula.org/"><?php echo smarty_function_gt(array('text' => 'Please download the new Zikula core','domain' => 'zikula'), $this);?>
 <?php echo $this->_tpl_vars['notices']['update']['update_version']; ?>
</a>
            </p>
        </div>
    <?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_checkpermissionblock($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>