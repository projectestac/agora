<?php /* Smarty version 2.6.26, created on 2012-11-30 17:50:31
         compiled from users_userapi_expiredsession.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'users_userapi_expiredsession.tpl', 2, false),array('function', 'modurl', 'users_userapi_expiredsession.tpl', 3, false),array('modifier', 'safetext', 'users_userapi_expiredsession.tpl', 4, false),)), $this); ?>
<div class="z-errormsg">
    <h2><?php echo smarty_function_gt(array('text' => "Sorry! Your session has expired."), $this);?>
</h2>
    <?php echo smarty_function_modurl(array('modname' => 'Users','type' => 'user','func' => 'login','assign' => 'loginurl'), $this);?>

    <p><?php echo smarty_function_gt(array('text' => 'For your security, this session has expired because you have been inactive for too long. Please <a href="%s">log in</a> again to access services.','tag1' => ((is_array($_tmp=$this->_tpl_vars['loginurl'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp))), $this);?>
</p>
</div>