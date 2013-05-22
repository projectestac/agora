<?php /* Smarty version 2.6.26, created on 2012-11-30 16:33:10
         compiled from admin_admin_securityanalyzer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'modurl', 'admin_admin_securityanalyzer.tpl', 1, false),array('function', 'gt', 'admin_admin_securityanalyzer.tpl', 5, false),array('block', 'checkpermissionblock', 'admin_admin_securityanalyzer.tpl', 2, false),array('modifier', 'safetext', 'admin_admin_securityanalyzer.tpl', 9, false),)), $this); ?>
<?php echo smarty_function_modurl(array('modname' => 'Admin','type' => 'admin','func' => 'help','assign' => 'adminhelpurl'), $this);?>

<?php $this->_tag_stack[] = array('checkpermissionblock', array('component' => '::','instance' => '::','level' => 'ACCESS_ADMIN')); $_block_repeat=true;smarty_block_checkpermissionblock($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php if ($this->_tpl_vars['notices']['security']['magic_quotes_gpc'] || $this->_tpl_vars['notices']['security']['register_globals'] || $this->_tpl_vars['notices']['security']['config_php'] || ! $this->_tpl_vars['notices']['security']['temp_htaccess'] || ! $this->_tpl_vars['notices']['security']['scactive']): ?>
<div id="z-securityanalyzer">
    <strong><?php echo smarty_function_gt(array('text' => 'Security analyser warnings','domain' => 'zikula'), $this);?>
</strong>
    <ul>
        <?php if ($this->_tpl_vars['notices']['security']['config_php']): ?>
        <li>
            <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminhelpurl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
#admin_configphpwarning"><?php echo smarty_function_gt(array('text' => "Configuration file 'config/config.php' is writeable, but should be read-only (please set to chmod 400, or 440 or last resort 444).",'domain' => 'zikula'), $this);?>
</a>
        </li>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['notices']['security']['magic_quotes_gpc']): ?>
        <li>
            <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminhelpurl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
#admin_magic_quotes_warning"><?php echo smarty_function_gt(array('text' => "PHP 'magic_quotes_gpc' setting is ON, but should be OFF.",'domain' => 'zikula'), $this);?>
</a>
        </li>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['notices']['security']['register_globals']): ?>
        <li>
            <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminhelpurl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
#admin_register_globals_warning"><?php echo smarty_function_gt(array('text' => "PHP 'register_globals' setting is ON, but should be OFF.",'domain' => 'zikula'), $this);?>
</a>
        </li>
        <?php endif; ?>
        <?php if (! $this->_tpl_vars['notices']['security']['temp_htaccess']): ?>
        <li>
            <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminhelpurl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
#admin_ztemp_htaccess_warning"><?php echo smarty_function_gt(array('text' => "There is no '.htaccess' file in the temporary directory ('/ztemp' or other location), but one should be present.",'domain' => 'zikula'), $this);?>
</a>
        </li>
        <?php endif; ?>
        <?php if (! $this->_tpl_vars['notices']['security']['scactive']): ?>
        <li>
            <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminhelpurl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
#admin_security_center_warning2"><?php echo smarty_function_gt(array('text' => "Security center module is not installed, but preferably should be.",'domain' => 'zikula'), $this);?>
</a>
        </li>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['notices']['security']['useids'] && $this->_tpl_vars['notices']['security']['idssoftblock']): ?>
        <li>
            <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['adminhelpurl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
#admin_idssoftblock_warning"><?php echo smarty_function_gt(array('text' => "PHPIDS is activated, but requests are NOT blocked.",'domain' => 'zikula'), $this);?>
</a>
        </li>
        <?php endif; ?>
    </ul>
</div>
<?php endif; ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_checkpermissionblock($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>