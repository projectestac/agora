<?php /* Smarty version 2.6.26, created on 2012-11-30 16:35:09
         compiled from home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'home.tpl', 2, false),array('function', 'charset', 'home.tpl', 5, false),array('function', 'pagegetvar', 'home.tpl', 12, false),array('function', 'blockposition', 'home.tpl', 31, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo smarty_function_lang(array(), $this);?>
" lang="<?php echo smarty_function_lang(array(), $this);?>
">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo smarty_function_charset(array(), $this);?>
" />
        <meta name="description" content="<?php echo $this->_tpl_vars['metatags']['description']; ?>
" />
        <meta name="keywords" content="<?php echo $this->_tpl_vars['metatags']['keywords']; ?>
" />
        <meta name="robots" content="index, follow" />
        <meta name="author" content="<?php echo $this->_tpl_vars['modvars']['ZConfig']['sitename']; ?>
" />
        <meta name="copyright" content="Copyright (c) 2008 by <?php echo $this->_tpl_vars['modvars']['ZConfig']['sitename']; ?>
" />
        <meta name="generator" content="Zikula - http://zikula.org" />
        <title><?php echo smarty_function_pagegetvar(array('name' => 'title'), $this);?>
</title>
        <link rel="stylesheet" href="<?php echo $this->_tpl_vars['themepath']; ?>
/style/style.css" type="text/css" />
        <!-- link rel="stylesheet" href="" type="text/css" /-->
        <link rel="alternate"  href="index.php?theme=rss" type="application/rss+xml" />
    </head>

    <body>
        <div id="wrapper">
            <div id="logotop">
                <a href="http://www.gencat.cat/educacio" target="_blank">
                    <img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/edu_blanc.png" width="195" height="28" alt="Departament d'Ensenyament" title="Departament d'Ensenyament" />
                </a>
            </div>
            <div id="themelogo" style="background: url() no-repeat top right;">
                <a href="index.php">
                    <div id="sitename"><?php echo $this->_tpl_vars['modvars']['ZConfig']['sitename']; ?>
</div>
                </a>
            </div>
            <div id="theme_top">
                <?php echo smarty_function_blockposition(array('name' => 'top'), $this);?>

            </div>

            <div id="menu">
                &nbsp;
            </div>
            <div id="z-maincontent">
                <table id="contenttable">
                    <tr>
                        <td id="lcol">
                            <?php echo smarty_function_blockposition(array('name' => 'left'), $this);?>

                        </td>
                        <td id="ccol3col">
                            <?php echo smarty_function_blockposition(array('name' => 'center'), $this);?>

                            <?php echo $this->_tpl_vars['maincontent']; ?>

                        </td>
                        <td id="rcol">
                            <?php echo smarty_function_blockposition(array('name' => 'right'), $this);?>

                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="themefooter">
            <div id="themefootertext">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </div>
            <div id="themefooterimageleft">
                <a href="http://agora.xtec.cat">
                    <img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/agora.gif" width="96" height="37" alt="Logo &Agrava;gora" title="Logo &Agrave;gora" />
                </a>
            </div>
            <div id="themefooterimageright">
                <a href="http://intraweb.xtec.cat">
                    <img src="<?php echo $this->_tpl_vars['imagepath']; ?>
/intraweb.gif" width="88" height="37" alt="Logo Intraweb" title="Logo Intraweb" />
                </a>
            </div>		 
        </div>
            </body>
</html>