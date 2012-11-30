<?php /* Smarty version 2.6.26, created on 2012-11-30 16:35:09
         compiled from errors_user_404.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'gt', 'errors_user_404.tpl', 2, false),array('function', 'modavailable', 'errors_user_404.tpl', 13, false),array('function', 'modurl', 'errors_user_404.tpl', 16, false),array('modifier', 'safetext', 'errors_user_404.tpl', 5, false),array('modifier', 'safehtml', 'errors_user_404.tpl', 23, false),)), $this); ?>
<div class="z-fullerror">
    <h2><?php echo smarty_function_gt(array('text' => "Page not found (error 404)"), $this);?>
</h2>
    <hr />
    <p>
        <?php echo smarty_function_gt(array('text' => 'Sorry! Could not find the page you wanted on %2$s: \'%1$s\'.','tag1' => ((is_array($_tmp=$this->_tpl_vars['currenturi'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)),'tag2' => $this->_tpl_vars['sitename']), $this);?>

        <?php if ($this->_tpl_vars['reportlevel'] != 0): ?>
        <?php if ($this->_tpl_vars['reportlevel'] == 2 || $this->_tpl_vars['localreferer']): ?>
        <?php echo smarty_function_gt(array('text' => "Details have been automatically e-mailed to the site administrator."), $this);?>

        <?php endif; ?>
        <?php endif; ?>
    </p>

    <?php echo smarty_function_modavailable(array('modname' => 'Search','assign' => 'search'), $this);?>

    <?php if ($this->_tpl_vars['search']): ?>
    <h2><?php echo smarty_function_gt(array('text' => 'Search'), $this);?>
</h2>
    <?php echo smarty_function_modurl(array('modname' => 'Search','type' => 'user','func' => 'main','assign' => 'url'), $this);?>

    <p><?php echo smarty_function_gt(array('text' => 'You could try a search from the <a href="%s">site search page</a>.','tag1' => ((is_array($_tmp=$this->_tpl_vars['url'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp))), $this);?>
</p>
    <?php endif; ?>

    <h2><?php echo smarty_function_gt(array('text' => 'Additional information'), $this);?>
</h2>
    <ul>
        <?php $_from = $this->_tpl_vars['messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
        <li><?php echo ((is_array($_tmp=$this->_tpl_vars['message'])) ? $this->_run_mod_handler('safehtml', true, $_tmp) : smarty_modifier_safehtml($_tmp)); ?>
</li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>

    <p><a href="javascript:history.back(-1)"><?php echo smarty_function_gt(array('text' => 'Go back to previous page'), $this);?>
</a></p>

</div>