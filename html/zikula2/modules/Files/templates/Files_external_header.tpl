<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{lang}" dir="{langdirection}">
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset={charset}" />
        <title>{title}</title>
        <meta name="description" content="{slogan}" />
        <meta name="keywords" content="{keywords}" />
        <link rel="stylesheet" type="text/css" href="styles/core.css" media="print,projection,screen" />
        {browserhack condition="if IE"}<link rel="stylesheet" type="text/css" href="styles/core_iehacks.css" media="print,projection,screen" />{/browserhack}
        <link rel="stylesheet" type="text/css" href="{$stylepath}/style.css" media="print,projection,screen" />
        <link rel="stylesheet" type="text/css" href="{$stylepath}/print.css" media="print" />
        <link rel="stylesheet" href="modules/Scribite/style/style.css" type="text/css" />
        <link rel="stylesheet" href="modules/Files/style/style.css" type="text/css" />
		<meta http-equiv="X-UA-Compatible" content="chrome=1" />
        <script type="text/javascript">
        	document.location.entrypoint="{{homepage}}";
			document.location.pnbaseURL="{{$baseurl}}";
			document.location.ajaxtimeout=5000;
			if (typeof(Zikula) == 'undefined') {Zikula = {};}
            Zikula.Config = {"entrypoint":"index.php","baseURL":"{{$baseurl}}","baseURI":"{{getbaseuri}}","ajaxtimeout":"5000","lang":"en"}
        </script>
        <script type="text/javascript" src="javascript/ajax/proto_scriptaculous.combined.min.js"></script>
		<script type="text/javascript" src="javascript/helpers/Zikula.js"></script>
		<script type="text/javascript" src="modules/Files/javascript/files.js"></script>
	</head>
    <body>