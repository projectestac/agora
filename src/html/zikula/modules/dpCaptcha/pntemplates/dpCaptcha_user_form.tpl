<!--[*  $Id: dpCaptcha_user_form.tpl,v 0.1 2006/09/18 10:47:35 dev.postnuke Exp $  *]-->
<script type="text/javascript" src="modules/dpCaptcha/pnjavascript/prototype.js"></script>
<script type="text/javascript" src="modules/dpCaptcha/pnjavascript/captcha.js"></script>
<script type="text/javascript">
var ERROR1='<!--[gt text="The introduced characters, they do not correspond with those of the image. Please, try again"]-->';
</script>
<fieldset><legend><!--[gt text="Writes the characters that you see in the image"]--></legend>
<!--[if $ncap eq 1]-->
<style>
.error{
	background-color:#FFC;
	border: 1px solid #f60;
	margin: 4px;
}
</style>
<script>
alert(ERROR1);
</script>
<table border="0" cellpadding="1" cellspacing="1" width="100%">
	<tr>
		<td align="center" class="error"><!--[gt text="The introduced characters, they do not correspond with those of the image. Please, try again"]--></td>
	</tr>
</table>
<!--[/if]-->
<table border="0" cellpadding="1" cellspacing="1">
	<tr>
		<td align="right" valign="middle" width="70"><!--[gt text="Image:"]--></td>
		<td>
			<table border="0" cellpadding="1" cellspacing="2" width="100%" align="center">
				<tr>
					<td align="center"><img id="imgcaptcha" src="index.php?module=dpCaptcha&type=ajax&func=captcha" ></td>
					<td align="center" valign="middle" rowspan="2">
						<a href="javascript:reload();"><img src="modules/dpCaptcha/pnimages/reload.gif" border="0"/></a>
					</td>
				</tr>
				<tr>
					<td width="250" align="center"><!--[gt text="The image contain"]--> <!--[$n]--> <!--[gt text=" characters"]--></td>
				</tr>
			</table>
		</td>
		<td rowspan="2"><!--[gt text="The fact to write the characters of a image helps to verify that is a person, not an automated program, the one that create the account."]--></td>
	</tr>
	<tr>
		<td align="right" valign="middle" width="70"><!--[gt text="Characters:"]--></td>
		<td align="center"><input onchange="verificar(this.value);" type="text" name="num" id="captcha"><input type="hidden" name="urlback" value="<!--[$urlback]-->"><input type="hidden" name="ncap" value="1"></td>
	</tr>
</table>
</fieldset>
