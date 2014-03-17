<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{lang}" lang="{lang}">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset={charset}"/>
        <meta name="description" content="{$modvars.ZConfig.slogan}"/>
        <meta name="keywords" content="{$metatags.keywords}"/>
        <meta name="robots" content="index,follow"/>
        <meta name="author" content="{$modvars.ZConfig.sitename}"/>
        <meta name="copyright" content="Copyright (c) 2008 by {$modvars.ZConfig.sitename}"/>
        <meta name="generator" content="zikula - http://zikula.org"/>
        <title>{pagegetvar name='title'}</title>
        <link rel="stylesheet" href="{$themepath}/style/style.css" type="text/css" />
        <link rel="stylesheet" href="{IWthemepath file="$stylesheet" type="css" theme="IWbluegraceAgora"}" type="text/css" />
              <link rel="alternate" title="{pagegetvar name='title'}" href="index.php?theme=rss" type="application/rss+xml" />
    </head>

    <body style="background:#fff url({$imagepath}/bg_top.png) repeat-x top left;">
        {pnuserloggedin assign="logged"}
        <div id="wrap">
            <div id="logotop">
                <img src="{$imagepath}/logo_de.png" width="165" height="29" alt="" title="" />
            </div>

            {pnmodavailable modname="IWmenu" assign="IWmenu"}
            {if $IWmenu ne ""}
            <div id="theme_top">
                {blockposition name=top}
            </div>
            {else}
            <div id="menutop">
                <ul>
                    <li class="page_item"><a href="index.php" title="{gt text="Home"}">{gt text="Home"}</a></li>
                    <li class="page_item"><a href="index.php?module=Search" title="{gt text='Search'}">{gt text="Search"}</a></li>
                    {if $logged}
                    <li class="page_item"><a href="index.php?module=Profile" title="{gt text="Account Panel"}">{gt text="Account Panel"}</a></li>
                    <li class="page_item"><a href="index.php?module=Users&func=logout" title="{gt text='Log out'}">{gt text="Log out"}</a></li>
                    {/if}
                </ul>
            </div>
            {/if}	

            <div id="header" style="background:url({IWthemepath file="$logotip" type="logo" theme="IWbluegraceAgora"}) no-repeat top right;">
                <div id="btitle">
                    <a href="index.php">{$modvars.ZConfig.sitename}</a>
                </div>
            </div>
            <div id="z-maincontent">
                <div id="content">
                    {blockposition name=center}      
                    {$maincontent}	       
                </div>
            </div>
            <div id="sidebar">
                <div id="sidebar-left">
                    {blockposition name=left}      
                </div>
                <div id="sidebar-right">	
                    {blockposition name=right}   
                </div>
            </div>

            <div style="clear:both;">&nbsp;</div>
        </div> 

        <div id="footer" style="background:url({$imagepath}/bg_bottom.png) repeat-x top left;">
            <div id="footerlogoleft">
                <a href="http://agora.xtec.cat" target="_blank"><img src="{$imagepath}/agora.gif" width="96" height="37" alt="" title="" /></a>
            </div>
            <div id="footerlogoright">
                <a href="http://projectestac.github.io/intraweb/" target="_blank"><img src="{$imagepath}/logoiw.png" width="138" height="35" alt="" title="" /></a>
            </div>
            <div id="footermenu">
                <a href="http://www.zikula.org"><img src="{$imagepath}/logo_zikula.gif" alt="Zikula" /></a>
            </div>
        </div>

        {iwvhmenu}

    </body>
</html>
