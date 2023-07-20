<!DOCTYPE html>
<html lang="{lang}">
    <head>
        <meta charset="{charset}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{$metatags.description}" />
        <meta name="keywords" content="{$metatags.keywords}" />
        <meta name="robots" content="index, follow" />
        <meta name="author" content="{$modvars.ZConfig.sitename}" />
        <meta name="copyright" content="Copyright (c) 2008 by {$modvars.ZConfig.sitename}" />
        <meta name="generator" content="Zikula - http://zikula.org" />
        <title>{pagegetvar name='title'}</title>
        <link rel="stylesheet" type="text/css" href="{$stylepath}/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="{$stylepath}/style.css" media="projection,screen" />
        <link rel="stylesheet" type="text/css" href="{$stylepath}/print.css" media="print" />
        <link rel="shortcut icon" href="{$imagepath}/favicon.ico" type="image/ico" />
    </head>
    <body>
        <nav class="navbar navbar-fixed-top container-fluid" id="navbar_top">
            <div class="container-fluid">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="http://www.gencat.cat/ensenyament" target="_blank" class="brand departament hidden-phone">
                    <img src="{$imagepath}/departament.png" alt="Departament d'Ensenyament" title="">
                </a>
                <a href="http://www.xtec.cat" target="_blank" class="brand xtec hidden-phone">
                  <img src="{$imagepath}/xtec.png" alt="Xarxa Telemàtica Educativa de Catalunya" title="">
                </a>
                <a class="brand mainbrand" href="{homepage}">{$modvars.ZConfig.sitename}</a>
                <div class="pull-right">
                    {blockposition name=menu}
                </div>
            </div>

        </nav>
        <header>
            <h1><a href="{homepage}">{$modvars.ZConfig.sitename}</a></h1>
        </header>
        <div id="z-maincontent" class="container-fluid">
            {$maincontent}
        </div>
        <footer>
            <a href="http://www.zikula.org" target="_blank">
                <img src="{$imagepath}/logo_zikula.gif" alt="Zikula" />
            </a>
        </footer>
    </body>
</html>

