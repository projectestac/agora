<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{lang}" lang="{lang}">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset={charset}" />
        <meta name="description" content="{$metatags.description}" />
        <meta name="keywords" content="{$metatags.keywords}" />
        <meta name="robots" content="index, follow" />
        <meta name="author" content="{$modvars.ZConfig.sitename}" />
        <meta name="copyright" content="Copyright (c) 2008 by {$modvars.ZConfig.sitename}" />
        <meta name="generator" content="Zikula - http://zikula.org" />
        <title>{pagegetvar name='title'}</title>
        <link rel="stylesheet" href="{$themepath}/style/style.css" type="text/css" />
        <link rel="stylesheet" href="{IWthemepath file=$stylesheet type=css}" type="text/css" />
        <link rel="alternate"  href="index.php?theme=rss" type="application/rss+xml" />
    </head>

    <body>
        <div id="wrapper">
            <div id="logotop">
                <a href="http://www.gencat.cat/ensenyament" target="_blank">
                    <img src="{$imagepath}/edu_blanc.png" width="195" height="28" alt="Departament d'Ensenyament" title="Departament d'Ensenyament" />
                </a>
            </div>
            <div id="themelogo" style="background: url({IWthemepath file=$logotip type=logo}) no-repeat top right;">
                <a href="index.php">
                    <div id="sitename">{$modvars.ZConfig.sitename}</div>
                </a>
            </div>
            <div id="theme_top">
                {blockposition name=top}
            </div>

            <div id="menu">
                &nbsp;
            </div>
            <div id="z-maincontent">
                <table id="contenttable">
                    <tr>
                        <td id="lcol">
                            {blockposition name=left}
                        </td>
                        <td id="ccol3col">
                            {blockposition name=center}
                            {$maincontent}
                        </td>
                        <td id="rcol">
                            {blockposition name=right}
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="themefooter">
            <div id="themefootertext">
                {include file="footer.tpl"}
            </div>
            <div id="themefooterimageleft">
                <a href="http://agora.xtec.cat">
                    <img src="{$imagepath}/agora.gif" width="96" height="37" alt="Logo &Agrava;gora" title="Logo &Agrave;gora" />
                </a>
            </div>
            <div id="themefooterimageright">
                <a href="http://projectestac.github.io/intraweb/">
                    <img src="{$imagepath}/intraweb.gif" width="88" height="37" alt="Logo Intraweb" title="Logo Intraweb" />
                </a>
            </div>		 
        </div>
        {iwvhmenu}
    </body>
</html>