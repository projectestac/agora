<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{lang}" dir="{langdirection}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset={charset}" />
        <meta name="description" content="{$modvars.ZConfig.slogan}" />
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
        <link rel="stylesheet" href="{IWthemepath file=$stylesheet type=css theme=IWxtec2}" type="text/css" />
    </head>

    <body>
        <div id="theme_page_container">
            <div id="theme_header_top">
                <a href="http://www.gencat.cat/ensenyament" target="_blank">
                    <span class="logodepart">
                        <img src="{$imagepath}/departament.png" alt="Departament d'Ensenyament" title="Departament d'Ensenyament" />
                    </span>
                </a>
                <a href="http://www.xtec.cat" target="_blank">
                    <span class="logoxtec">
                        <img src="{$imagepath}/xtec.png" alt="XTEC" title="XTEC" />
                    </span>
                </a>
            </div>

            <div id="theme_header" style="background:url({IWthemepath file=$logotip type=logo theme=IWxtec2}) no-repeat top right;">
                <h1><a href="{homepage}">{$modvars.ZConfig.sitename}</a></h1>
                <h2>{$modvars.ZConfig.slogan}</h2>
            </div>

            <div id="theme_top">
                {blockposition name=top}
            </div>
            <div id="z-maincontent">
                <div id="theme_content">
                    <table id="theme_table_content">
                        <tr>
                            <td id="theme_content_left">
                                {blockposition name=left}
                            </td>
                            <td id="theme_content_center">
                                {$maincontent}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="theme_footer">
                <a href="http://agora.xtec.cat/"><img src="{$imagepath}/logo_agora.gif" alt="&Agrave;gora" /></a>
                <a href="http://www.zikula.org"><img src="{$imagepath}/logo_zikula.gif" alt="Zikula" /></a>&nbsp;&nbsp;&nbsp;
                <a href="http://projectestac.github.io/intraweb/"><img src="{$imagepath}/logo_intraweb.gif" alt="Intraweb" /></a>
            </div>

        </div>

        {iwvhmenu}

    </body>
</html>

