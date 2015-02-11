<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{lang}" dir="{langdirection}">
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset={charset}" />
        <title>{title}</title>
        <meta name="description" content="{slogan}" />
        <meta name="keywords" content="{keywords}" />
        <link rel="stylesheet" type="text/css" href="style/core.css" media="print,projection,screen" />
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
        <script src="modules/Files/javascript/getFiles.js" type="text/javascript"></script>
        {if $editor eq 'Xinha'}
			{if $scribite_v4}<script src="modules/{$scribite_v4_name}/includes/xinha/popups/popup.js" type="text/javascript"></script>{/if}
			{if $scribite_v5}<script src="modules/{$scribite_v5_name}/plugins/Xinha/vendor/xinha/popups/popup.js" type="text/javascript"></script>{/if}
			<script>
				window.resizeTo(600,600);
			    __dlg_init(null,{width:600,height:600});
			</script>
		{/if}
        {if $editor eq 'TinyMCE'}
			{if $scribite_v4}<script type="text/javascript" src="modules/{$scribite_v4_name}/includes/tinymce/tiny_mce_popup.js"></script>{/if}
			{if $scribite_v5}<script type="text/javascript" src="modules/Files/javascript/tiny_mce_popup_scv4.js"></script>{/if}
		{/if}
        {if $jquery}
            <script type="text/javascript" src="{$jquery}"></script>
            <script type="text/javascript" src="javascript/jquery/noconflict.js"></script>
        {/if}
	</head>
    <body>
