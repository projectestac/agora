<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{lang}" dir="{langdirection}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset={charset}" />
        <meta name="description" content="{$metatags.description}" />
        <meta name="keywords" content="{$metatags.keywords}" />
        <meta name="robots" content="index, follow" />
        <meta name="author" content="{$modvars.ZConfig.sitename}" />
        <meta name="copyright" content="Copyright (c) 2008 by {$modvars.ZConfig.sitename}" />
        <meta name="generator" content="Zikula - http://zikula.org" />
        <meta http-equiv="X-UA-Compatible" content="chrome=1" />
        <title>{pagegetvar name='title'}</title>
        <link rel="stylesheet" type="text/css" href="{$stylepath}/style.css" media="projection,screen" />
        <link rel="stylesheet" type="text/css" href="{$stylepath}/print.css" media="print" />
        <link rel="stylesheet" type="text/css" href="{$stylepath}/color-{$color_theme}.css" />
        <link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
    </head>
    <body>
        <div id="theme_page_container">
            <div id="theme_header_top">
                <a href="http://www.gencat.cat/ensenyament" target="_blank"><span class="logodepart"></span></a>
                <a href="http://www.xtec.cat" target="_blank"><span class="logoxtec"></span></a>
            </div>

            <div id="theme_header">
                <h1><a href="{homepage}">{$modvars.ZConfig.sitename}</a></h1>
                <h2>{$modvars.ZConfig.slogan}</h2>
            </div>

            <div id="menu" style="clear:both;">
                {blockposition name=menu}
            </div>


            <div id="theme_content">
                <div id="z-maincontent">
                    {$maincontent}
                </div>
            </div>

            <div id="theme_footer">
                <a href="http://www.zikula.org" target="_blank">
                    <img src="{$imagepath}/logo_zikula.gif" alt="Zikula" />
                </a>
            </div>
        </div>
    </body>
</html>

