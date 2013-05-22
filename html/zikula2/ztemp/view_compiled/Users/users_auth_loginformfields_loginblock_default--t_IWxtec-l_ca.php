<?php /* Smarty version 2.6.26, created on 2012-11-30 17:50:35
         compiled from users_auth_loginformfields_loginblock_default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'users_auth_loginformfields_loginblock_default.tpl', 4, false),)), $this); ?>
<div class="z-formrow">
    <label for="users_loginblock_login_id">
        <?php if ($this->_tpl_vars['authentication_method'] == 'email'): ?>
        <?php echo smarty_function_gt(array('text' => "E-mail address"), $this);?>

        <?php else: ?>
        <?php echo smarty_function_gt(array('text' => 'User name'), $this);?>

        <?php endif; ?>
    </label>
    <input id="users_loginblock_login_id" type="text" name="authentication_info[login_id]" maxlength="64" value="" />
</div>

<div class="z-formrow">
    <label for="users_loginblock_pass"><?php echo smarty_function_gt(array('text' => 'Password'), $this);?>
</label>
    <input id="users_loginblock_pass" type="password" name="authentication_info[pass]" maxlength="25" />
</div>