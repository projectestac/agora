<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="{lang}">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset={charset}" />
	<meta name="description" content="{$modvars.ZConfig.slogan}" />
	<meta name="robots" content="index, follow" />
	<meta name="author" content="{$modvars.ZConfig.sitename}" />
	<meta name="copyright" content="Copyright (c) 2013 by {$modvars.ZConfig.sitename}" />
	<meta name="generator" content="Zikula - http://zikula.org" />
	<title>{pagegetvar name='title'}</title>
	<link rel="stylesheet" href="{$themepath}/style/{$fullestil}" type="text/css" />
	<script defer type="text/javascript" src="{$themepath}/javascript/pngfix.js"></script>
</head>

<body>
	<div id="header" style="margin-top:4px; height:105px; background:{$bgcolor} url({$themepath}/images/header.gif) no-repeat;">
		<div style="float:right;">
			<img src="{$themepath}/images/header_right.gif" border="0" alt="header_right">
		</div>
	</div>

	<div style="position:absolute; z-index:25; top:35px; left:25px;">
		<a href="http://www.gencat.cat" target="_blank">
			<img src="{$themepath}/images/logo_gene.png" alt="" title="">
		</a>
	</div>
	
	<div style="position:absolute; z-index:25; top:20px; right:25px;">
		<a href="index.php">
			<img src="{$themepath}/images/logo_petit.png" alt="" title="">
		</a>
	</div>
	
	<div style="position:absolute; z-index:20; top:109px; left:10px; width:100%; height:22px; font-weight:bold; text-align:right; padding-top:2px; margin-bottom:10px; font-size:{$fontsize};">
		<div id="menu" style="padding-right:20px; color:{$bgcolor};">
			{iwvhmenu}
			{blockposition name=top}
		</div>
	</div>
	
	<div id="main_content" style="margin-top:35px; left:0px; background:{$bgcolor}; font-size:{$fontsize};">
		<table cellspacing="0" cellpadding="0" width="100%">
			<tr>
				<td style="width:199px; padding:0px 10px 0px 8px;">
					<div style="background:url({$themepath}/images/block_col_top.gif) no-repeat {$color2}; height:10px;"></div>
					{blockposition name=left}
					<div style="background:url({$themepath}/images/block_col_bottom.gif) no-repeat bottom {$color2}; height:8px;"></div>
				</td>
				<td style="padding:0px 8px 0px 5px;">
					{$maincontent}
				</td>
			</tr>
		</table>
		<div style="text-align:center; padding:2px; margin-top:10px; background:{$color4}; font-size:{$fontsize};">
                    <a href="http://www.xtec.cat/at_usuari/avis_legal.html" style="color: #000;">Avís legal</a>
                </div>
		<div style="height:30px; margin-top:10px; background:url({$themepath}/images/header.gif);">
			<div style="float:right; margin:0px;">
				<img src="{$themepath}/images/footer_right.gif" border="0" alt="footer_right">
			</div>
		</div>
	</div>	

	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("UA-11296370-1");
		pageTracker._setDomainName("none");
		pageTracker._setAllowLinker(true);
		pageTracker._trackPageview();
	} catch(err) {}
	</script>

</body>

</html>
