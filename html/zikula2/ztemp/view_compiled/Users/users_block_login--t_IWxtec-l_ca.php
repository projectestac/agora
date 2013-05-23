<?php /* Smarty version 2.6.26, created on 2012-11-30 17:50:35
         compiled from users_block_login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajaxheader', 'users_block_login.tpl', 2, false),array('function', 'login_form_fields', 'users_block_login.tpl', 11, false),array('function', 'img', 'users_block_login.tpl', 17, false),array('function', 'modurl', 'users_block_login.tpl', 19, false),array('function', 'gt', 'users_block_login.tpl', 38, false),array('function', 'notifyevent', 'users_block_login.tpl', 42, false),array('function', 'notifydisplayhooks', 'users_block_login.tpl', 47, false),array('function', 'homepage', 'users_block_login.tpl', 70, false),array('function', 'authentication_method_selector', 'users_block_login.tpl', 72, false),array('modifier', 'cat', 'users_block_login.tpl', 5, false),array('modifier', 'default', 'users_block_login.tpl', 24, false),array('modifier', 'lower', 'users_block_login.tpl', 26, false),array('insert', 'csrftoken', 'users_block_login.tpl', 22, false),)), $this); ?>
<?php echo ''; ?><?php echo smarty_function_ajaxheader(array('modname' => 'Users','filename' => 'Zikula.Users.LoginBlock.js'), $this);?><?php echo ''; ?><?php $_from = $this->_tpl_vars['authentication_method_display_order']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authentication_method_display_order'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['authentication_method_display_order']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['authentication_method']):
        $this->_foreach['authentication_method_display_order']['iteration']++;
?><?php echo ''; ?><?php if (( 'Users' != $this->_tpl_vars['authentication_method']['modname'] )): ?><?php echo ''; ?><?php echo smarty_function_ajaxheader(array('modname' => $this->_tpl_vars['authentication_method']['modname'],'filename' => ((is_array($_tmp=$this->_tpl_vars['authentication_method']['modname'])) ? $this->_run_mod_handler('cat', true, $_tmp, '.LoginBlock.js') : smarty_modifier_cat($_tmp, '.LoginBlock.js'))), $this);?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
<div class="users_loginblock_box"><?php echo ''; ?><?php $this->assign('show_login_form', false); ?><?php echo ''; ?><?php if (( isset ( $this->_tpl_vars['selected_authentication_method'] ) && $this->_tpl_vars['selected_authentication_method'] )): ?><?php echo ''; ?><?php echo smarty_function_login_form_fields(array('form_type' => 'loginblock','authentication_method' => $this->_tpl_vars['selected_authentication_method'],'assign' => 'login_form_fields'), $this);?><?php echo ''; ?><?php if (isset ( $this->_tpl_vars['login_form_fields'] ) && $this->_tpl_vars['login_form_fields']): ?><?php echo ''; ?><?php $this->assign('show_login_form', true); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>
<div id="users_loginblock_waiting" class="z-center z-hide">
        <?php echo smarty_function_img(array('modname' => 'core','set' => 'ajax','src' => 'indicator_circle.gif'), $this);?>

    </div>
    <form id="users_loginblock_login_form" class="z-form z-linear<?php if (! $this->_tpl_vars['show_login_form']): ?> z-hide<?php endif; ?>" action="<?php echo smarty_function_modurl(array('modname' => 'Users','type' => 'user','func' => 'login'), $this);?>
" method="post">
        <div>
            <input type="hidden" id="users_loginblock_returnpage" name="returnpage" value="<?php echo $this->_tpl_vars['returnpage']; ?>
" />
            <input type="hidden" id="users_loginblock_csrftoken" name="csrftoken" value="<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'csrftoken')), $this); ?>
" />
            <input id="users_login_event_type" type="hidden" name="event_type" value="login_block" />
            <input type="hidden" id="users_loginblock_selected_authentication_module" name="authentication_method[modname]" value="<?php if (isset ( $this->_tpl_vars['selected_authentication_method'] ) && $this->_tpl_vars['selected_authentication_method']): ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['selected_authentication_method']['modname'])) ? $this->_run_mod_handler('default', true, $_tmp, 'false') : smarty_modifier_default($_tmp, 'false')); ?>
<?php endif; ?>" />
            <input type="hidden" id="users_loginblock_selected_authentication_method" name="authentication_method[method]" value="<?php if (isset ( $this->_tpl_vars['selected_authentication_method'] ) && $this->_tpl_vars['selected_authentication_method']): ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['selected_authentication_method']['method'])) ? $this->_run_mod_handler('default', true, $_tmp, 'false') : smarty_modifier_default($_tmp, 'false')); ?>
<?php endif; ?>" />
            <?php if (( ((is_array($_tmp=$this->_tpl_vars['modvars']['ZConfig']['seclevel'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)) == 'high' )): ?>
            <input id="users_loginblock_rememberme" type="hidden" name="rememberme" value="0" />
            <?php endif; ?>
            <div id="users_loginblock_fields">
            <?php if (! empty ( $this->_tpl_vars['login_form_fields'] )): ?>
                <?php echo $this->_tpl_vars['login_form_fields']; ?>

            <?php endif; ?>
            </div>
            <?php if (((is_array($_tmp=$this->_tpl_vars['modvars']['ZConfig']['seclevel'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)) != 'high'): ?>
            <div class="z-formrow z-clearer">
                <div>
                    <input id="users_loginblock_rememberme" type="checkbox" name="rememberme" value="1" />
                    <label for="users_loginblock_rememberme"><?php echo smarty_function_gt(array('text' => 'Keep me logged in on this computer'), $this);?>
</label>
                </div>
            </div>

            <?php echo smarty_function_notifyevent(array('eventname' => 'module.users.ui.form_edit.login_block','assign' => 'eventData'), $this);?>

            <?php $_from = $this->_tpl_vars['eventData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['eventDisplay']):
?>
                <?php echo $this->_tpl_vars['eventDisplay']; ?>

            <?php endforeach; endif; unset($_from); ?>
            
            <?php echo smarty_function_notifydisplayhooks(array('eventname' => 'users.ui_hooks.login_block.form_edit','id' => null), $this);?>


            <?php endif; ?>
            <div class="z-buttons z-right">
                <input class="z-bt-ok z-bt-small" id="users_loginblock_submit" name="users_loginblock_submit" type="submit" value="<?php echo smarty_function_gt(array('text' => 'Log in'), $this);?>
" />
            </div>
        </div>
    </form>
    <div id="users_loginblock_no_loginformfields"<?php if (( ! isset ( $this->_tpl_vars['selected_authentication_method'] ) || ! $this->_tpl_vars['selected_authentication_method'] ) || ( isset ( $this->_tpl_vars['selected_authentication_method'] ) && $this->_tpl_vars['selected_authentication_method'] && isset ( $this->_tpl_vars['login_form_fields'] ) && $this->_tpl_vars['login_form_fields'] )): ?> class="z-hide"<?php endif; ?>>
        <h5><?php if (isset ( $this->_tpl_vars['selected_authentication_method'] ) && $this->_tpl_vars['selected_authentication_method']): ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['selected_authentication_method']['modname'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
<?php endif; ?></h5>
        <p class="z-errormsg">
            <?php echo smarty_function_gt(array('text' => 'The log-in option you chose is not available at the moment.'), $this);?>

            <?php if (count ( $this->_tpl_vars['authentication_method_display_order'] ) > 1): ?>
            <?php echo smarty_function_gt(array('text' => 'Please choose another or contact the site administrator for assistance.'), $this);?>

            <?php else: ?>
            <?php echo smarty_function_gt(array('text' => 'Please contact the site administrator for assistance.'), $this);?>

            <?php endif; ?>
        </p>
    </div>
    <div id="users_loginblock_authentication_method_selectors">
    <?php if (( count ( $this->_tpl_vars['authentication_method_display_order'] ) > 1 )): ?>
        <h5 id="users_loginblock_h5_authentication_method"<?php if (( ! isset ( $this->_tpl_vars['selected_authentication_method'] ) || ! $this->_tpl_vars['selected_authentication_method'] )): ?> class="z-hide"<?php endif; ?>><?php echo smarty_function_gt(array('text' => "Or instead, login with your..."), $this);?>
</h5>
        <h5 id="users_loginblock_h5_no_authentication_method"<?php if (( isset ( $this->_tpl_vars['selected_authentication_method'] ) && $this->_tpl_vars['selected_authentication_method'] )): ?> class="z-hide"<?php endif; ?>><?php echo smarty_function_gt(array('text' => "Login with your..."), $this);?>
</h5>
        <?php echo smarty_function_homepage(array('assign' => 'form_action'), $this);?>

        <?php $_from = $this->_tpl_vars['authentication_method_display_order']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authentication_method_display_order'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['authentication_method_display_order']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['authentication_method']):
        $this->_foreach['authentication_method_display_order']['iteration']++;
?>
            <?php echo smarty_function_authentication_method_selector(array('form_type' => 'loginblock','form_action' => $this->_tpl_vars['form_action'],'authentication_method' => $this->_tpl_vars['authentication_method'],'selected_authentication_method' => $this->_tpl_vars['selected_authentication_method']), $this);?>

        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
    </div>

    <h5><?php echo smarty_function_gt(array('text' => "Do you need to..."), $this);?>
</h5>
    <?php if ($this->_tpl_vars['modvars']['Users']['reg_allowreg']): ?>
    <a class="user-icon-adduser" style="display:block;" href="<?php echo smarty_function_modurl(array('modname' => 'Users','type' => 'user','func' => 'register'), $this);?>
"><?php echo smarty_function_gt(array('text' => "Create an account?"), $this);?>
</a>
    <?php endif; ?>
    <a class="user-icon-lostusername" style="display:block;" href="<?php echo smarty_function_modurl(array('modname' => 'Users','type' => 'user','func' => 'lostpwduname'), $this);?>
"><?php echo smarty_function_gt(array('text' => "Recover your account information?"), $this);?>
</a>
</div>