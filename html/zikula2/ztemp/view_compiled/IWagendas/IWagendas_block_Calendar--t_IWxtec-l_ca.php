<?php /* Smarty version 2.6.26, created on 2012-11-30 16:35:10
         compiled from IWagendas_block_Calendar.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'pageaddvar', 'IWagendas_block_Calendar.htm', 39, false),array('function', 'ajaxheader', 'IWagendas_block_Calendar.htm', 40, false),)), $this); ?>

<script type="text/javascript"><?php echo '
    <!-- overLIB configuration -->
    ol_fgcolor = "lightyellow";
    ol_bgcolor = "#FFFFFF";
    ol_textcolor = "#000000";
    ol_capcolor = "#e7e7e7";
    ol_closecolor = "#000000";
    ol_textfont = "Verdana,Arial,Helvetica";
    ol_captionfont = "Verdana,Arial,Helvetica";
    ol_captionsize = 2;
    ol_textsize = 2;
    ol_border = 2;
    ol_width = 350;
    ol_offsetx = 10;
    ol_offsety = 10;
    ol_sticky = 0;
    ol_close = "Tanca";
    ol_closeclick = 0;
    ol_autostatus = 2;
    ol_snapx = 0;
    ol_snapy = 0;
    ol_fixx = -1;
    ol_fixy = -1;
    ol_background = "";
    ol_fgbackground = "";
    ol_bgbackground = "";
    ol_padxl = 1;
    ol_padxr = 1;
    ol_padyt = 1;
    ol_padyb = 1;
    ol_capicon = "";
    ol_hauto = 1;
    ol_vauto = 1;
    if (document.getElementById(\'overDiv\')==null) {
        document.writeln(\'<div id="overDiv" style="position:absolute; top:0px; left:0px; visibility:hidden; z-index:1000;"></div>\');
    }
'; ?>
</script>
<?php echo smarty_function_pageaddvar(array('name' => 'javascript','value' => 'modules/IWmain/js/overlib.js'), $this);?>

<?php echo smarty_function_ajaxheader(array('module' => 'IWagendas','filename' => 'IWagendas.js'), $this);?>


<div id="calendarContent">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'IWagendas_block_CalendarContent.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>