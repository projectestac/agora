<?php /* Smarty version 2.6.26, created on 2012-11-30 16:33:10
         compiled from admin_admin_developernotices.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'checkpermissionblock', 'admin_admin_developernotices.tpl', 1, false),array('function', 'modurl', 'admin_admin_developernotices.tpl', 2, false),array('function', 'gt', 'admin_admin_developernotices.tpl', 5, false),array('modifier', 'safetext', 'admin_admin_developernotices.tpl', 9, false),)), $this); ?>
<?php $this->_tag_stack[] = array('checkpermissionblock', array('component' => '::','instance' => '::','level' => 'ACCESS_ADMIN')); $_block_repeat=true;smarty_block_checkpermissionblock($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php echo smarty_function_modurl(array('modname' => 'Theme','type' => 'admin','func' => 'modifyconfig','assign' => 'themeurl'), $this);?>

<?php if ($this->_tpl_vars['notices']['developer']['devmode']): ?>
<div id="z-developernotices">
    <strong><?php echo smarty_function_gt(array('text' => "Developer notices (development mode on)",'domain' => 'zikula'), $this);?>
</strong>
    <ul class="z-hide">
        <?php if (isset ( $this->_tpl_vars['notices']['developer']['render'] )): ?>
        <li>
            <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['themeurl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
"><?php echo smarty_function_gt(array('text' => 'Enabled Template settings','domain' => 'zikula'), $this);?>
:</a>
            <?php $_from = $this->_tpl_vars['notices']['developer']['render']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
            <?php echo $this->_tpl_vars['item']['title']; ?>
<?php if (! ($this->_foreach['item']['iteration'] == $this->_foreach['item']['total'])): ?>, <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </li>
        <?php endif; ?>
        <?php if (isset ( $this->_tpl_vars['notices']['developer']['theme'] )): ?>
        <li>
            <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['themeurl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
"><?php echo smarty_function_gt(array('text' => 'Enabled Theme settings','domain' => 'zikula'), $this);?>
:</a>
            <?php $_from = $this->_tpl_vars['notices']['developer']['theme']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['item']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['item']['iteration']++;
?>
            <?php echo $this->_tpl_vars['item']['title']; ?>
<?php if (! ($this->_foreach['item']['iteration'] == $this->_foreach['item']['total'])): ?>, <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </li>
        <?php endif; ?>
        <?php if (isset ( $this->_tpl_vars['notices']['developer']['cssjscombine'] ) && $this->_tpl_vars['notices']['developer']['cssjscombine']): ?>
        <li><?php echo smarty_function_gt(array('text' => "CSS/JS combination is enabled",'domain' => 'zikula'), $this);?>
</li>
        <?php endif; ?>
        <li>
            <a href="<?php echo smarty_function_modurl(array('modname' => 'Theme','type' => 'admin','func' => 'clearallcompiledcaches'), $this);?>
"><?php echo smarty_function_gt(array('text' => 'Clear all cache and compile directories'), $this);?>
</a>
        </li>
    </ul>
</div>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_checkpermissionblock($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>