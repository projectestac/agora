<?php /* Smarty version 2.6.26, created on 2012-11-30 16:33:11
         compiled from IWmain_block_news.htm */ ?>
<?php $_from = $this->_tpl_vars['newsArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new']):
?>
<?php if ($this->_tpl_vars['new']['code'] == ''): ?>
<li>
    <a href="<?php echo $this->_tpl_vars['new']['url']; ?>
">
        <?php echo $this->_tpl_vars['new']['element']; ?>
 <?php if ($this->_tpl_vars['new']['title'] != ''): ?>-<?php endif; ?> <?php echo $this->_tpl_vars['new']['title']; ?>

    </a>
    <div style="float: right;"><?php echo $this->_tpl_vars['new']['nNotes']; ?>
</div>
</li>
<?php else: ?>
<?php echo $this->_tpl_vars['new']['code']; ?>

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>