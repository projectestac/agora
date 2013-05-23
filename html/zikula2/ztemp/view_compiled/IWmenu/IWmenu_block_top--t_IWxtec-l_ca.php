<?php /* Smarty version 2.6.26, created on 2012-11-30 16:33:10
         compiled from IWmenu_block_top.htm */ ?>
<div id="IWmenu">
    <ul class="IWmenu_0">
        <?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['item']):
?>
        <?php if ($this->_tpl_vars['item']['is_parent']): ?>
        <li class="branch">
            <?php else: ?>
        <li class="leaf">
            <?php endif; ?>
            <?php if (isset ( $this->_tpl_vars['item']['icon'] ) && $this->_tpl_vars['item']['icon'] != ''): ?>
            <a href="<?php echo $this->_tpl_vars['item']['url']; ?>
" <?php echo $this->_tpl_vars['item']['target']; ?>
 class="hasicon" style="background-image: url('<?php echo $this->_tpl_vars['item']['icon']; ?>
');">
               <?php echo $this->_tpl_vars['item']['text']; ?>

        </a>
        <?php else: ?>
        <a href="<?php echo $this->_tpl_vars['item']['url']; ?>
" <?php echo $this->_tpl_vars['item']['target']; ?>
>
           <?php echo $this->_tpl_vars['item']['text']; ?>

    </a>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['item']['is_parent']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "IWmenu_block_top_submenu.htm", 'smarty_include_vars' => array('submenu' => $this->_tpl_vars['item']['children'],'level' => $this->_tpl_vars['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>