<?php /* Smarty version 2.6.26, created on 2012-11-30 16:33:12
         compiled from blocks_block_extmenu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'menu', 'blocks_block_extmenu.tpl', 2, false),array('modifier', 'replace', 'blocks_block_extmenu.tpl', 4, false),array('modifier', 'urldecode', 'blocks_block_extmenu.tpl', 4, false),array('modifier', 'safetext', 'blocks_block_extmenu.tpl', 5, false),array('function', 'modurl', 'blocks_block_extmenu.tpl', 18, false),array('function', 'gt', 'blocks_block_extmenu.tpl', 18, false),)), $this); ?>
<div id="navcontainer_<?php echo $this->_tpl_vars['blockinfo']['bid']; ?>
" class="navcontainer">
    <?php $this->_tag_stack[] = array('menu', array('from' => $this->_tpl_vars['menuitems'],'item' => 'item','name' => 'extmenu','class' => 'navlist')); $_block_repeat=true;smarty_block_menu($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <?php if ($this->_tpl_vars['item']['name'] != '' && $this->_tpl_vars['item']['url'] != ''): ?>
    <li<?php if (((is_array($_tmp=$this->_tpl_vars['item']['url'])) ? $this->_run_mod_handler('replace', true, $_tmp, $this->_tpl_vars['baseurl'], '') : smarty_modifier_replace($_tmp, $this->_tpl_vars['baseurl'], '')) == ((is_array($_tmp=$this->_tpl_vars['currenturi'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp))): ?> class="selected"<?php endif; ?>>
        <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['url'])) ? $this->_run_mod_handler('safetext', true, $_tmp) : smarty_modifier_safetext($_tmp)); ?>
" title="<?php echo $this->_tpl_vars['item']['title']; ?>
">
            <?php if ($this->_tpl_vars['item']['image'] != ''): ?>
            <img src="<?php echo $this->_tpl_vars['item']['image']; ?>
" alt="<?php echo $this->_tpl_vars['item']['title']; ?>
" />
            <?php endif; ?>
            <?php echo $this->_tpl_vars['item']['name']; ?>

        </a>
    </li>
    <?php else: ?>
    <li style="list-style: none; background: none;">&nbsp;</li>
    <?php endif; ?>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_menu($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    <?php if ($this->_tpl_vars['access_edit']): ?>
    <p class="extmenuadmin">
        <a href="<?php echo smarty_function_modurl(array('modname' => 'Blocks','type' => 'admin','func' => 'modify','bid' => $this->_tpl_vars['blockinfo']['bid'],'addurl' => 1), $this);?>
#editmenu" title="<?php echo smarty_function_gt(array('text' => 'Add the current URL as a new link in this block','domain' => 'zikula'), $this);?>
"><?php echo smarty_function_gt(array('text' => 'Add current URL','domain' => 'zikula'), $this);?>
</a>
        <br />
        <a href="<?php echo smarty_function_modurl(array('modname' => 'Blocks','type' => 'admin','func' => 'modify','bid' => $this->_tpl_vars['blockinfo']['bid'],'fromblock' => 1), $this);?>
" title="<?php echo smarty_function_gt(array('text' => 'Edit this block','domain' => 'zikula'), $this);?>
"><?php echo smarty_function_gt(array('text' => 'Edit this block','domain' => 'zikula'), $this);?>
</a>
    </p>
    <?php endif; ?>
</div>