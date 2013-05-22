<?php /* Smarty version 2.6.26, created on 2012-11-30 16:35:11
         compiled from block/displayfeed.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'safetext', 'block/displayfeed.tpl', 8, false),array('modifier', 'safehtml', 'block/displayfeed.tpl', 27, false),)), $this); ?>
<?php if ($this->_tpl_vars['displayimage'] == 1): ?>
    <?php $this->assign('link', $this->_tpl_vars['feed']['feed']->get_image_link()); ?>
    <?php if ($this->_tpl_vars['link'] != ''): ?>
    <div class="feed-image">
        <?php $this->assign('image', $this->_tpl_vars['feed']['feed']->get_image_url()); ?>
        <?php $this->assign('title', $this->_tpl_vars['feed']['feed']->get_image_title()); ?>
        <?php if ($this->_tpl_vars['link'] != ''): ?>
        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
"><img src="<?php echo $this->_tpl_vars['image']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
" /></a>
        <?php else: ?>
        <img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['link'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
" />
        <?php endif; ?>
    </div>
    <?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['alternatelayout'] == 1): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'block/displayfeed_alt.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
    <ul class="feed-list">
    <?php $this->assign('feeditems', $this->_tpl_vars['feed']['feed']->get_items(0,$this->_tpl_vars['numitems'])); ?>
    <?php $_from = $this->_tpl_vars['feeditems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['feeditem']):
?>
        <?php $this->assign('feeditemlink', $this->_tpl_vars['feeditem']->get_link()); ?>
        <?php $this->assign('feeditemtitle', $this->_tpl_vars['feeditem']->get_title()); ?>
            <li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['feeditemlink'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
" <?php if ($this->_tpl_vars['openinnewwindow'] == 1): ?>target="_blank"<?php endif; ?>><?php echo ((is_array($_tmp=$this->_tpl_vars['feeditemtitle'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
</a>
        <?php if ($this->_tpl_vars['displaydescription'] != 0): ?>
            <?php $this->assign('feeditemdesc', $this->_tpl_vars['feeditem']->get_description()); ?>
            <div class="feeditem-desc"><?php echo ((is_array($_tmp=$this->_tpl_vars['feeditemdesc'])) ? $this->_run_mod_handler('safehtml', true, $_tmp) : smarty_modifier_safehtml($_tmp)); ?>
</div>
        <?php endif; ?>
            </li>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
<?php endif; ?>