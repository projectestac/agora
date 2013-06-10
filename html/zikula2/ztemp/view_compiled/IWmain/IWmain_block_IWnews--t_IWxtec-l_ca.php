<?php /* Smarty version 2.6.26, created on 2012-11-30 16:33:12
         compiled from IWmain_block_IWnews.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajaxheader', 'IWmain_block_IWnews.htm', 1, false),array('function', 'gt', 'IWmain_block_IWnews.htm', 8, false),array('function', 'img', 'IWmain_block_IWnews.htm', 9, false),array('function', 'modurl', 'IWmain_block_IWnews.htm', 17, false),array('modifier', 'gt', 'IWmain_block_IWnews.htm', 18, false),)), $this); ?>
<?php echo smarty_function_ajaxheader(array('modname' => 'IWmain','filename' => "IWmain.js"), $this);?>

<div id="IWmain_block_news">
    <ul>
        <?php echo $this->_tpl_vars['news']; ?>

    </ul>
</div>
<div style="margin-top: 20px;">
    <?php echo smarty_function_gt(array('text' => 'Flagged items'), $this);?>

    <?php echo smarty_function_img(array('modname' => 'core','src' => 'flag.png','set' => 'icons/extrasmall'), $this);?>

</div>
<div id="IWmain_block_flagged">
    <?php if ($this->_tpl_vars['flags'] != ''): ?>
    <?php echo $this->_tpl_vars['flags']; ?>

    <?php endif; ?>
</div>
<div style="float: left">
    <a href="<?php echo smarty_function_modurl(array('modname' => 'IWmain','type' => 'user','func' => 'regenBlockNews'), $this);?>
">
        <?php echo smarty_function_gt(array('text' => 'Regenerate'), $this);?>
 <?php echo smarty_function_img(array('modname' => 'core','src' => 'quick_restart.png','set' => 'icons/extrasmall','alt' => ((is_array($_tmp='Regenerate')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'title' => ((is_array($_tmp='Regenerate')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view']))), $this);?>

    </a>
</div>
<div style="float: right;">
    <a href="<?php echo smarty_function_modurl(array('modname' => 'IWmain','type' => 'user','func' => 'main'), $this);?>
">
        <?php echo smarty_function_gt(array('text' => 'Configure'), $this);?>
 <?php echo smarty_function_img(array('modname' => 'core','src' => 'configure.png','set' => 'icons/extrasmall','alt' => ((is_array($_tmp='Configure')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view'])),'title' => ((is_array($_tmp='Configure')) ? $this->_run_mod_handler('gt', true, $_tmp, $this->_tpl_vars['zikula_view']) : smarty_modifier_gt($_tmp, $this->_tpl_vars['zikula_view']))), $this);?>

    </a>
</div>
<div style="clear: both;"></div>