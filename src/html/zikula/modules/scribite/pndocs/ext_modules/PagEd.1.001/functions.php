<?php

function PagEd_generate_helphtml($pagedmodvars, $pf_req, $helpvars, $pf_urls){
	$p_html=array();
	$pf_count=count($helpvars);
	if($pagedmodvars["show_help"]){
		if(isset($pagedmodvars["showhelplang"]))$pf_ulang=$pagedmodvars["showhelplang"];
		else $pf_ulang="eng";
		$p_iconbit1="<img src=\"".$pagedmodvars["IconsPath"]."icons/help/";
		$p_iconbit2=" border=\"0\" />";
		// START STRING GENERATION LOOP
		for($pf_counter=0; $pf_counter<$pf_count; $pf_counter++){
			$helpvar=$helpvars[$pf_counter][1];
			$pf_string="";
			$u_langrow=$engrow=0;
			if($helpvar!="_createpagecontentheader" and $helpvar!="_editpagecontentheader"){
				// CHECK FOR EXISTING CONSTANT
				$engresult=PagEd_select_query($pagedmodvars, "paged_helptexts", array("constant"), "constant=\"".$helpvar."\" and language=\"eng\"", "", 1);
				$engrow=PagEd_get_dbnumrows($pagedmodvars, $engresult);
				if($pf_ulang!="eng"){
					$ulangresult=PagEd_select_query($pagedmodvars, "paged_helptexts", array("constant"), "constant=\"".$helpvar."\" and language=\"".$pf_ulang."\"", "", 1);
					$u_langrow=PagEd_get_dbnumrows($pagedmodvars, $ulangresult);
				}
				switch($pagedmodvars["show_help"]){
					case 1:
						if($u_langrow or $engrow){
							if(!$u_langrow)$p_helplang="eng";
							$pf_string.="<a href=\"#\" onclick=\"imagewin=window.open('"
							.$pf_urls["adminop"]."module_show_helptext&amp;p_helpvar=".$helpvar
							."&amp;p_helplang=".$p_helplang
							."', 'pagedwindow', 'width=450, height=450, scrollbars=yes')\">"
							.$p_iconbit1."view.gif\" alt=\"view.gif\"".$p_iconbit2."</a>\n";
						}
						break;
					case 2:
						if(($pf_ulang=="eng" and !$engrow) and !$u_langrow)
						$p_action="create";
						else $p_action="edit";
						$pf_string.="<a href=\"".$pf_urls["adminop"]
						."module_".$p_action."_helptext&amp;p_helpvar=".$helpvar
						."&amp;p_reqhelp=".$pf_req."\">".$p_iconbit1
						.$p_action.".gif\" alt=\"".$p_action.".gif\"".$p_iconbit2."</a>\n";
						break;
				}
			}
			$p_html[$helpvar]=$pf_string;
		}
	}else{
		for($pf_counter=0; $pf_counter<$pf_count; $pf_counter++){
			$helpvar=$helpvars[$pf_counter][1];
			$p_html[$helpvar]="";
		}
	}
	return $p_html;
}

function PagEd_preparefor_rte($p_rtedata){
	$p_areaname=$p_rtedata["rteareaname"];
	$pf_acc="<script language=\"JavaScript\" type=\"text/javascript\">\n"
	."function PagEd_submit_rteform() {\n";
	if($p_rtedata["rteareacount"]==1){
		if($p_rtedata["rteaddcounter"])$p_areaname=$p_areaname."0";
		$pf_acc.="updateRTE('".$p_areaname."');\n"
		."alert(\"".$p_areaname."=\" + "."document.pagedrte.".$p_areaname.".value);\n";
	}else{
		$pf_acc.="updateRTEs();\n";
		for($p_counter=0; $p_counter<$p_rtedata["rteareacount"]; $p_counter++)
		$pf_acc.="alert(\"".$p_areaname.$p_counter."=\"+" ."document.pagedrte.".$p_areaname.$p_counter.".value);\n";
	}
	return $pf_acc."return true;\n}initRTE(\"".$p_rtedata["imagespath"]
	."\", \"".$p_rtedata["includepath"]."\", \"\");\n</script>\n";
}

function PagEd_prompt_singlecell($pagedmodvars, $prompt, $align="left"){
	return PagEd_start_onecell($align)
	.PagEd_modstringdisplay($pagedmodvars, $prompt."&nbsp;")."</td>";
}

function PagEd_prompt_leftcells($pagedmodvars, $helphtml, $prompt, $helpicon="", $secondwidth=125, $nowrap="", $align="left"){
	$pf_acc="<td width=\"15\" valign=\"top\" align=\"center\">";
	if($helpicon)$pf_acc.=$helphtml;
	return $pf_acc."</td>".PagEd_start_onecell($align, $secondwidth, "", $nowrap)
	.PagEd_modstringdisplay($pagedmodvars, "&nbsp;".$prompt, "normal", "italic")."</td>";
}

function PagEd_get_headerjs($pagedmodvars, $pf_rtedata, $pf_extrajs, $pf_showhidejs=1){
	$pf_adminjs="";
	if(isset($pagedmodvars["photosharejs"]))$pf_adminjs.=$pagedmodvars["photosharejs"]."\n";
	if($pf_showhidejs)$pf_adminjs.=PagEd_showhide_area($pagedmodvars);
	if($pf_extrajs=="setcolor")include_once(_PAGEDROOT."javascript/colorpicker.php");
	elseif($pf_extrajs=="checkuncheckall")$pf_adminjs.=PagEd_checkuncheckall_js();
	else $pf_adminjs.=$pf_extrajs;
	if($pf_rtedata){
		if($pf_rtedata["mainswitch"] and $pf_rtedata["fileswitch"])
		$pf_adminjs.="\n<script language=\"JavaScript\" "."type=\"text/javascript\" "
		."src=\""._PAGEDROOT."pagedrte/richtext.js\"></script>\n"
		.PagEd_preparefor_rte($pf_rtedata);
	}
	return $pf_adminjs;
}

function PagEd_get_pnadminurl($pagedmodvars, $p_mainurls){
	if(!pnSecAuthAction(0, '::', '::', ACCESS_ADMIN))$p_mainurls["pnadmin"]="";
	else{
		if($pagedmodvars["sysversion"]<751)$p_mainurls["pnadmin"]="admin.php";
		else{
			if($pagedmodvars["sysversion"]<800)$pf_module="Administration";
			else $pf_module="Admin%20Panel";
			$p_admincatid=pnSessionGetVar("lastcid");
			if(empty($p_admincatid))$p_admincatid=1;
			$p_mainurls["pnadmin"]="index.php?module=".$pf_module."&amp;type=admin"
			."&amp;func=adminpanel&amp;cid=".$p_admincatid;
		}
	}
	return $p_mainurls;
}

// INPUT FORM HEADER
function PagEd_panel_header($pagedmodvars, $helphtml, $pagedmainurls, $panelreq, $u_accessto, $iconname, $headertext, $guilinkvars, $paddingvalue, $linefeedswitch, $pagedrtedata, $extrajs="", $noreturn="", $pf_legendvars=""){
	if($panelreq=="index")$formreq="index";
	else $formreq="admin";
	// JAVASCRIPT
	if(!$pagedmainurls["screenstatus"]){
		$pagedadminjs=PagEd_get_headerjs($pagedmodvars, $pagedrtedata, $extrajs);
		PagEd_addto_htmlheader($pagedmodvars["owncss"].$pagedadminjs);
		$tablewidth="100%";
	}else $tablewidth="95%";
	if($pagedmodvars["background_color"])$tablebgcolor=$pagedmodvars["background_color"];
	else $tablebgcolor="";
	$pf_acc="<div align=\"center\">\n".PagEd_anchor("topofpage")
	.PagEd_formstart("formedit", $formreq, $pagedrtedata)
	.PagEd_table_start($pagedmodvars, 0, $paddingvalue, 0, $tablebgcolor, $tablewidth);
	if($u_accessto["panellinks"]=="fullaccess" and
	($pagedmodvars["smallpanel_switch"]==1 or $pagedmodvars["smallpanel_switch"]==3))
	$pf_acc.=PagEd_smallpanel($pagedmodvars, $pagedmainurls, $panelreq, $u_accessto)
	.PagEd_horizontal_rule(6, 1, $pagedmodvars["font_color"]);
	if($pagedmodvars["guicons_switch"])
	$pf_acc.=PagEd_rowcell_start(6, $pagedmodvars["background_color"], "left", "middle")
	.PagEd_simpleimage($pagedmodvars, "icons/".$iconname.".gif", $iconname, "right", 5, 5)."<br />\n";
	// NO ICONS
	else $pf_acc.=PagEd_horizontal_rule(6, 20, $pagedmodvars["background_color"])
	.PagEd_rowcell_start(6, $pagedmodvars["background_color"], "left", "middle").$helphtml;
	// if($pf_legendvars)$pf_acc.=PagEd_legendline($pagedmodvars, $pf_legendvars);
	if($pagedmodvars["errormsgs"] and $u_accessto["all"]=="fullaccess")
	$pf_acc.=PagEd_modstringdisplay($pagedmodvars, $pagedmodvars["errormsgs"]."<br />", "error");
	if(is_array($headertext)){
		if(isset($headertext[2])){
			$p_actionreport=$headertext[1];
			$headertext=$headertext[0];
		}else{
			$pf_acc.=PagEd_modstringdisplay($pagedmodvars, "&nbsp;&nbsp;".$headertext[0], "", "italic")
			.PagEd_modstringdisplay($pagedmodvars, "&nbsp;&nbsp;".$headertext[1], "bold");
			$p_headerdone=1;
		}
	}
	if(!isset($p_headerdone))$pf_acc.=PagEd_stringdisplay("&nbsp;&nbsp;".$headertext, -14, $pagedmodvars["font_color"], $pagedmodvars["adminface"]);
	if($guilinkvars)$pf_acc.="<br />".PagEd_spacedisplay().PagEd_guilinks($pagedmodvars, $pagedmainurls, $u_accessto, $guilinkvars);
	// if($pf_legendvars)$pf_acc.="<br />".PagEd_legendline($pagedmodvars, $pf_legendvars);
	if(isset($p_actionreport))$pf_acc.="<br />".PagEd_modstringdisplay($pagedmodvars, "&nbsp;&nbsp;".$p_actionreport, "normal", "italic");
	if($linefeedswitch)$pf_acc.="<br /><br /><br />";
	if($noreturn)return $pf_acc."</td>";
	else return $pf_acc.PagEd_cellend_tablereturn();
}

function PagEd_smallpanel($pagedmodvars, $pf_urls, $pf_req, $u_accessto){
	$pf_height=intval($pagedmodvars["adminsize1"]);
	$pf_acc=PagEd_rowcell_start(6, $pagedmodvars["background_color"], "center", "middle", $pf_height, "", "nowrap")
	.PagEd_togglescreen_icon($pagedmodvars, $pf_urls, $pf_req);
	if($pf_urls["pnadmin"])
	$pf_acc.=PagEd_linkdisplay($pagedmodvars, $pf_urls["pnadmin"], "&laquo;CMS|")."&nbsp;&nbsp;";
	$pf_items=array(
	array("pages", "page_manager", _pageaccessprompt),
	array("news", "news_manager", _newsaccessprompt),
	array("menus", "menu_manager", _menuaccessprompt),
	array("topics", "topic_manager", _topicaccessprompt),
	array("templates", "template_manager", _templateaccessprompt),
	array("mediafiles", "module_media_manager&amp;rescandb=1", _pagedmedia),
	array("module", "module_manager", "PagEd"));
	if($pf_req=="module_media_manager")$pf_req="medi";
	else $pf_req=substr($pf_req, 0, 4);
	switch($pf_req){
		case "topi": $pf_req="topic"; break;
		case "temp": $pf_req="template"; break;
		case "medi": $pf_req="module_media"; break;
		case "modu": $pf_req="module"; break;
	}
	$pf_req.="_manager";
	if($pf_req=="module_media_manager")$pf_req.="&amp;rescandb=1";
	$pf_acc.=PagEd_smallcontrols($pagedmodvars, $pf_urls, "main_manager", _ACCESS_ADMIN, $pf_req);
	$pf_count=count($pf_items);
	for($pf_counter=0; $pf_counter<$pf_count; $pf_counter++){
		$pf_item=$pf_items[$pf_counter];
		if($u_accessto[$pf_item[0]]!="noaccess" or $u_accessto["all"]=="fullaccess")
		$pf_acc.=PagEd_smallcontrols($pagedmodvars, $pf_urls, $pf_item[1], $pf_item[2], $pf_req);
	}
	return $pf_acc.PagEd_cellrowend();
}

function PagEd_smallcontrols($pagedmodvars, $pf_urls, $controlop, $controltext, $pf_req){
	if($pf_req==$controlop){
		$controltext="|".$controltext."|";
		$pagedmodvars["adminsize1"]=-$pagedmodvars["adminsize1"];
	}
	return "&nbsp;&nbsp;".PagEd_linkdisplay($pagedmodvars, $pf_urls["adminop"].$controlop, $controltext);
}

// INPUT FORM DIVIDER
function PagEd_panel_divider($pagedmodvars, $panelcounter, $helphtml, $paneltext, $extratags="", $extratags2=""){
	$pf_acc="";
	$panelcounter++;
	if($extratags2=="cellend")$pf_acc.="</td>";
	if($extratags=="pretr" or $extratags=="both")$pf_acc.="</tr>";
	$pf_acc.=PagEd_horizontal_rule(6, 15, $pagedmodvars["background_color"])
	.PagEd_horizontal_rule(6, 1, $pagedmodvars["font_color"])
	.PagEd_rowcell_start(1, $pagedmodvars["background_color"])
	.PagEd_cellendspanstart_top(5, $pagedmodvars["background_color"])
	."<a href=\"#topofpage\">"
	.PagEd_simpleimage($pagedmodvars, "up3.gif", "up", "right")."</a>"
	."<a name=\"subpanel".$panelcounter."\"></a>";
	if($helphtml)$pf_acc.=$helphtml;
	else $pf_acc.=PagEd_blankpx_area($pagedmodvars, 13, 14);
	$pf_acc.=PagEd_stringdisplay($panelcounter.":&nbsp;".$paneltext, -12, $pagedmodvars["font_color"], $pagedmodvars["adminface"]).PagEd_cellend_tablereturn().PagEd_emptycell()
	.PagEd_horizontal_rule(1, 1, $pagedmodvars["font_color"], "cells").PagEd_emptycell(4)."</tr>"
	.PagEd_horizontal_rule(6, 8, $pagedmodvars["background_color"]);
	if($extratags=="posttr" or $extratags=="both")$pf_acc.="<tr>";
	return $pf_acc;
};

function PagEd_submitbuttons($pagedmodvars, $pf_buttons){
	$pf_count=count($pf_buttons);
	switch($pf_count){
		case 1: $tablewidth=160; break;
		case 2: case 3: case 4: $tablewidth=320; break;
		case 5: case 6: $tablewidth=480; break;
	}
	$cellwidth=160;
	$pf_acc=PagEd_table_start($pagedmodvars, 2, 0, 0, "", $tablewidth);
	for($pf_counter=0; $pf_counter<$pf_count; $pf_counter++){
		$pf_button=$pf_buttons[$pf_counter];
		$submitname=$pf_button[0];
		$submitvalue=$pf_button[1];
		if(!isset($pf_button[2]))$pf_button[2]=0;
		if($pf_button[2])$pf_style="invert";
		else $pf_style="normal";
		$cellstartbit=PagEd_start_onecell("center", $cellwidth);
		$cellendbit="</td>\n";
		if($pf_count<5){
			switch($pf_counter){
				case 0: case 2:
					$lastcell=1; $cellstartbit=PagEd_rowcell_top("center", $cellwidth); break;
				case 1: case 3: $lastcell=3; $cellendbit=PagEd_cellrowend(); break;
			}
		}else{
			switch($pf_counter){
				case 0: case 3: case 6:
					$lastcell=2; $cellstartbit=PagEd_rowcell_top("center", $cellwidth); break;
				case 1: case 4: case 7: $lastcell=1; break;
				case 2: case 5: case 8: $lastcell=3; $cellendbit=PagEd_cellrowend(); break;
			}
		}
		$pf_acc.=$cellstartbit.PagEd_input_button($pagedmodvars, 0, $submitname, $submitvalue, $pf_style, "", "modcolor").$cellendbit;
	}
	switch($lastcell){
		case 2: $pf_acc.=PagEd_emptycell();
		case 1: $pf_acc.=PagEd_emptycell()."</tr>"; break;
	}
	return $pf_acc.PagEd_tableend();
}

// FOOTER
function PagEd_panel_footer($pagedmodvars, $pagedmainurls, $panelreq, $u_accessto, $footerguilinkvars, $returnopvalue, $hiddenvars, $hiddenobjections, $pf_buttons="", $nobuttonindent="", $pf_statusmsgs=""){
	$pf_acc="</tr>\n";
	// SUBMIT BUTTONS
	if($pf_buttons){
		$pf_acc.=PagEd_horizontal_rule(6, 20, $pagedmodvars["background_color"]);
		if($nobuttonindent)$pf_acc.=PagEd_rowcell_start(6, "", "center");
		else $pf_acc.="<tr>".PagEd_emptycell(2).PagEd_start_colspancells(4, "center");

		$pf_acc.=PagEd_submitbuttons($pagedmodvars, $pf_buttons).PagEd_cellrowend();
	}
	$pf_acc.=PagEd_horizontal_rule(6, 10, $pagedmodvars["background_color"]);
	if(($footerguilinkvars or $pf_statusmsgs) and $u_accessto["all"]=="fullaccess"){
		$pf_acc.=PagEd_rowcell_start(6, $pagedmodvars["background_color"], "left", "top");
		if($pf_statusmsgs){
			$pf_acc.=PagEd_spacedisplay()
			.PagEd_simpleimage($pagedmodvars,"guicons/".$pf_statusmsgs[0][1].".gif", $pf_statusmsgs[0][1])
			.PagEd_modstringdisplay($pagedmodvars, "&nbsp;".$pf_statusmsgs[0][0], "", "italic");
			if(isset($pf_statusmsgs[1]))$pf_acc.=PagEd_spacedisplay()
			.PagEd_simpleimage($pagedmodvars, "guicons/".$pf_statusmsgs[1][1].".gif", $pf_statusmsgs[1][1])
			.PagEd_modstringdisplay($pagedmodvars, "&nbsp;".$pf_statusmsgs[1][0], "", "italic");
		}
		if($footerguilinkvars)$pf_acc.=PagEd_spacedisplay()
		.PagEd_guilinks($pagedmodvars, $pagedmainurls, "", $footerguilinkvars);

		$pf_acc.=PagEd_cellrowend().PagEd_horizontal_rule(6, 3);
	}
	$pf_acc.=PagEd_horizontal_rule(6, 1, $pagedmodvars["font_color"]);
	if($u_accessto["panellinks"]=="fullaccess" and
	$pagedmodvars["smallpanel_switch"]>1 and $panelreq!="index")
	$pf_acc.=PagEd_smallpanel($pagedmodvars, $pagedmainurls, $panelreq, $u_accessto);

	$pf_acc.=PagEd_rowcell_start(6, $pagedmodvars["background_color"], "center", "middle");
	if($panelreq=="index")$hiddenvars[]=array("name", $pagedmodvars["ModName"]);
	elseif(strpos($pagedmainurls["adminop"], "module"))
	$hiddenvars[]=array("module", $pagedmodvars["ModName"]);
	if($pagedmainurls["screenstatus"]=="full")$hiddenvars[]=array("pagedscreen", "full");
	if($returnopvalue)$hiddenvars[]=array("op", $returnopvalue);
	if($hiddenobjections){
		if($hiddenvars)$hiddenvars=array_merge($hiddenvars, $hiddenobjections);
		else $hiddenvars=$hiddenobjections;
	}
	if($hiddenvars)$pf_acc.="\n".PagEd_input_hiddenarray($pagedmodvars, $hiddenvars);

	$pf_sig="PagEd";
	if($panelreq!="index")
	$pf_sig.=" ".$pagedmodvars["paged_version"]." ".$pagedmodvars["builddate"];
	$pf_acc.=PagEd_cellrowend();
	if($u_accessto["all"]=="fullaccess"){
		if($pagedmodvars["shortdebugmode"])
		$pf_acc.=PagEd_rowcell_start(3, $pagedmodvars["background_color"])
		.PagEd_input_checkbox($pagedmodvars, "shortdebugmode", $pagedmodvars["shortdebugmode"], 7)
		.PagEd_stringdisplay(_pageddebugmode, 10, $pagedmodvars["font_color"], $pagedmodvars["adminface"]).PagEd_cellendspanstart_top(3, "", "", "right");
		else $pf_acc.=PagEd_rowcell_start(6, $pagedmodvars["background_color"], "right", "middle");
		$pf_acc.=PagEd_linkdisplay($pagedmodvars, "http://canvas.anubix.net", "PagEd", 9, $pagedmodvars["font_color"], "", $pagedmodvars["adminface"], $pf_sig)."&nbsp;".PagEd_cellrowend();
	}
	if($pagedmodvars["smallpanel_switch"]<0 and $panelreq!="index")
	$pf_acc.=PagEd_horizontal_rule(6, 3, $pagedmodvars["font_color"]);
	return $pf_acc.PagEd_tableend()."</form></div>\n";
}

// TEXT INPUT FUNCTIONS
function PagEd_inputtextfield($pagedmodvars, $fieldname, $fieldmaxlength, $fieldsize, $currentvalue="", $pf_id="", $pf_strip=1){
	if($pf_strip)$currentvalue=stripslashes($currentvalue);
	else $currentvalue=str_replace("\\\\", "\\", $currentvalue);
	$currentvalue=htmlspecialchars($currentvalue, ENT_QUOTES);
	if($currentvalue or $currentvalue==0)$currentvalue=" value='".$currentvalue."'";
	if($pf_id)$pf_id=" id=\"".$pf_id."\"";
	return "<input type=\"text\" name=\"".$fieldname."\" maxlength=\"".$fieldmaxlength."\""
	." size=\"".$fieldsize."\"".$pf_id." style=\"padding:2px;".PagEd_formstyle($pagedmodvars)
	.PagEd_formelement_style($pagedmodvars)."\"".$currentvalue." />";
}

function PagEd_inputtextarea($pagedmodvars, $pagedrtedata, $editstatus, $fieldcounter, $areatext, $rtefieldwidth, $rtefieldheight, $plaincols, $plainrows){
	if($editstatus!="new" and $areatext){
		$areatext=rtrim($areatext);
		if(strpos($areatext, "\r\n")==0 and !$pagedrtedata["mainswitch"])
		$areatext=stripslashes("\r\n".$areatext);
	}else $areatext="";
	if($pagedrtedata["areacount"]<2 and !$pagedrtedata["addcounter"])
	$areaname=$pagedrtedata["areaname"];
	else $areaname=$pagedrtedata["areaname"].$fieldcounter;
	if($pagedrtedata["mainswitch"] and $pagedrtedata["areaswitch"]){
		if($areatext){
			$areatext=str_replace("\r\n", "<br />", $areatext);
			// IE FIX
			$areatext=str_replace("><br />", ">", $areatext);
			if(substr($areatext, 0, 6)=="<br />")$areatext=substr($areatext, 6);
			$areatext=addslashes($areatext);
			// ESCAPE END TAG SLASHES
			$areatext=str_replace("/", "\\/", $areatext);
		}
		return "<script language=\"JavaScript\" type=\"text/javascript\">\n"
		."writeRichText('".$areaname."', '".$areatext."', "
		.$rtefieldwidth.", ".$rtefieldheight.", true, false);</script>\n";
	}else return "<textarea class=\"".$areaname."\" name=\"".$areaname."\" id=\"".$areaname
	."\" cols=\"".$plaincols."\" rows=\"".$plainrows."\""
	." style=\"padding:2px;".PagEd_formstyle($pagedmodvars)
	.PagEd_formelement_style($pagedmodvars)
	."\">".$areatext."</textarea>\n";
}

// TOGGLE LAYOUT OVERRIDE (GLOBAL PAGE, LOCAL PAGES)
function PagEd_checkbox_layouttoggle($pagedmodvars, $helpvar, $toggleitem, $togglevalue, $prompt, $overrideinfo, $halfdivider=1){
	$pf_acc=PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt).PagEd_start_onecell("left")
	.PagEd_input_checkbox($pagedmodvars, $toggleitem, $togglevalue, 10)
	.PagEd_cellendspanstart_top()."</td>".PagEd_modstringcells($pagedmodvars, 2, $overrideinfo);
	if($halfdivider==1)$pf_acc.=PagEd_halfinputrow_divider($pagedmodvars, "right", 4, 2);
	return $pf_acc;
}

function PagEd_input_checkbox($pagedmodvars, $name, $checked=0, $hspace=0, $value=1, $pf_onclick=""){
	$pf_acc="<input type=\"checkbox\" style=\"background-color:".$pagedmodvars["background_color"]
	."; margin-right: ".$hspace."px; margin-left: ".$hspace."px; "
	.PagEd_formelement_style($pagedmodvars)
	."\" name=\"".$name."\" value=".$value." ";
	if($checked)$pf_acc.="checked=\"checked\" ";
	if($pf_onclick)$pf_acc.="onclick=\"".$pf_onclick."\" ";
	return $pf_acc."/>";
}

// SELECT COLOR (BACKGROUND, TITLES/POINTERS, SUBTITLES, TEXT)
function PagEd_select_color($pagedmodvars, $helpvar, $coloritem, $colorvalue, $prompt, $popupdirection, $promptcells=1, $cellwidth="", $longtextfield=""){
	if(!$colorvalue or ($colorvalue{0}!="#" and !strpos($colorvalue, ".")))$colorvalue="#cccccc";
	if($pagedmodvars["hexcode_switch"]){
		$inputtype="text";
		if($longtextfield)$fieldsize=20;
		else $fieldsize=7;
		$fieldsize=" size=\"".$fieldsize."\"";
	}else{
		$inputtype="hidden";
		$fieldsize="";
	}
	if($promptcells){
		$pf_htmlstart=PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt)
		.PagEd_start_onecell("left", $cellwidth, "", "yes");
		$pf_htmlend="</td>\n";
	}else $pf_htmlstart=$pf_htmlend="";
	return $pf_htmlstart
	."<a href=\"javascript:pickColor('".$coloritem."','".$popupdirection."');\""
	." id=\"".$coloritem."\" style=\"border: 1px solid #000000; font-family:Verdana;"
	." font-size:10px; text-decoration: none\">".PagEd_spacedisplay()."&nbsp;&nbsp;</a>"
	."&nbsp;<input type=\"".$inputtype."\" style=\"padding:2px;".PagEd_formstyle($pagedmodvars)
	.PagEd_formelement_style($pagedmodvars)."\" name=\"".$coloritem
	."\" id=\"".$coloritem."field\"".$fieldsize." value=\"".$colorvalue."\""
	." onchange=\"relateColor('".$coloritem."', this.value);\" />\n"
	."<script language=\"JavaScript\" type=\"text/javascript\">"
	."relateColor('".$coloritem."','".$colorvalue."');</script>".$pf_htmlend;
}

// SELECT IMAGE (CONTENT, TOPICS)
function PagEd_select_media($pagedmodvars, $pagedmainurls, $u_accessto, $pf_type, $helpvar, $browseitem, $spanname, $imagevalue, $prompt, $cell2colspan){
	$pf_acc="";
	$onclickstart="imagewin=window.open('".$pagedmainurls["adminop"]
	."module_".$pf_type."_manager&amp;pagedinput=".$browseitem."&amp;pagedform="
	.$pf_type."popup&amp;pagedselector=".$spanname."&amp;p_thumbs=0&amp;imagehost=";
	$onclickend="', 'pagedwindow', 'width=600, height=560, scrollbars=yes, resizable')";
	if($browseitem=="newbrowsedmediafile")$pf_acc.="<br />\n"
	.PagEd_onclick_button($pagedmodvars, "normal", 100, _pagedmedia, $onclickstart."media".$onclickend);
	else{
		if($u_accessto["pagedimgs"]!="noaccess" or $u_accessto["all"]=="fullaccess")
		$pf_accpaged=1;
		else $pf_accpaged=0;
		if($u_accessto["photoshareimgs"]!="noaccess" or $u_accessto["all"]=="fullaccess")
		$pf_acc3partyimgs=1;
		else $pf_acc3partyimgs=0;
		$p_environment=strtolower($pagedmodvars["environment"]);
		if($browseitem=="newbrowsedhelpimage")$pf_acc.=PagEd_start_onecell("right")
		.PagEd_modstringdisplay($pagedmodvars, $prompt)."</td>";
		else{
			$helpicon="yes";
			$pf_acc.=PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt, $helpicon);
		}
		$pf_acc.=PagEd_start_colspancells($cell2colspan, "left", "", "yes");
		// IMAGE INPUT FIELD
		if($pf_accpaged or $pf_acc3partyimgs)$pf_acc.=PagEd_inputtextfield($pagedmodvars, $browseitem, 150, 50, $imagevalue, $spanname, 0)."<br />";
		if($pf_accpaged)$pf_acc.=PagEd_onclick_button($pagedmodvars, "normal", 55, "PagEd", $onclickstart."paged".$onclickend);
		if($pf_acc3partyimgs){
			if(strpos($p_environment, "pncpg"))$pf_acc.=PagEd_onclick_button($pagedmodvars, "normal", 80, "Coppermine", $onclickstart."coppermine".$onclickend);
			if(strpos($p_environment, "gallery") and $pagedmodvars["gallery_albumpath"])
			$pf_acc.=PagEd_onclick_button($pagedmodvars, "normal", 55, "Gallery", $onclickstart."gallery".$onclickend);
			if(strpos($p_environment, "photoshare"))$pf_acc.=PagEd_onclick_button($pagedmodvars, "normal", 80, "Photoshare", "imagewin=window.open('".$pagedmodvars["photoshareFindImageURL"]
			."&targetID=".$spanname.$onclickend);
		}
	}
	return $pf_acc;
}

// SELECT LAYOUT (PAGES, NEWS)
function PagEd_select_layout($pagedmodvars, $pagedmainurls, $helpvar, $setitem, $layoutitem, $layoutvalue, $prompt, $layoutspopup=""){
	$p_descriptions=array(_layout1, _layout2,_layout3, _layout4, _layout5, _layout6, _layout7, _pagedlayout8, _pagedlayout9, _pagedlayout10);
	if($setitem=="news" or $setitem=="newoverviewtemplate" or $setitem=="oldoverviewtemplate"){
		$p_lastlay=10;
		$popupheight=400;
	}else{
		$p_lastlay=6;
		$popupheight=230;
	}
	if($layoutspopup){
		for($p_counter=0; $p_counter<$p_lastlay; $p_counter++){
			switch($p_counter){
				case 0:case 6: $rowstart="<tr>"; $rowend=""; break;
				case 9: $rowstart=""; $rowend=PagEd_emptycell(2)."</tr>"; break;
				default: $rowstart=$rowend=""; break;
			}
			$imgnumber=$p_counter+1;
			$pf_acc.=$rowstart.PagEd_start_onecell("left", 100, 140)
			.PagEd_simpleimage($pagedmodvars, "layouts/layout".$imgnumber.".gif", $p_descriptions[$p_counter], "", 10, 5)."<br />"
			.PagEd_stringdisplay($p_descriptions[$p_counter], 11, $pagedmodvars["font_color"], $pagedmodvars["adminface"])."</td>".$rowend;
		}
		return $pf_acc;
	}else{
		$pf_acc=PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt)
		.PagEd_start_colspancells(4).PagEd_selectorstart($pagedmodvars, $layoutitem);
		for($p_counter=0; $p_counter<$p_lastlay; $p_counter++){
			$crutch=$p_counter+1;
			$pf_acc.=PagEd_singleoption($pagedmodvars, $layoutvalue, $crutch, $p_descriptions[$p_counter]);
		}
		return $pf_acc."</select><a href=\"#\" onclick=\"imagewin=window.open('".$pagedmainurls["adminop"]."module_show_helptext&amp;setlayoutitem=".$setitem."', 'pagedwindow', 'width=750, height=".$popupheight.", scrollbars=yes')\">".PagEd_simpleimage($pagedmodvars, "icons/help/view.gif", _pagedshowimage, "", 5)."</a></td>\n";
	}
}

function PagEd_select_theme($pagedmodvars, $helpvar, $themeitem, $themevalue, $prompt, $themeinfo, $nothemetext){
	$pf_acc=PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt)
	.PagEd_start_onecell().PagEd_selectorstart($pagedmodvars, $themeitem)."<option ";
	if(!$themevalue)$pf_acc.="selected=\"selected\" ";
	$pf_acc.="value=\"none\">".$nothemetext."";
	$themelist="";
	$handle=opendir("themes");
	while(false!==($file=readdir($handle))){
		if((!ereg("[.]",$file))){if($file != "CVS")$themelist .= "".$file." ";}
	}
	closedir($handle);
	// MODIF SEBASTIEN MULTI SITES
	$cWhereIsPerso=WHERE_IS_PERSO;
	if(!empty($cWhereIsPerso))include("modules/NS-Multisites/chgtheme.inc.php");
	$themelist=explode(" ", $themelist);
	sort($themelist);
	for($i=0; $i<sizeof($themelist); $i++){
		if($themelist[$i]){
			$thistheme=pnVarPrepForDisplay($themelist[$i]);
			$pf_acc.=PagEd_singleoption($pagedmodvars, $themevalue, $thistheme, $thistheme);
		}
	}
	return $pf_acc."</select><br />\n".PagEd_cellendspanstart_top()."</td>\n"
	.PagEd_modstringcells($pagedmodvars, 2, "&nbsp;&nbsp;".$themeinfo);
}

// SELECT NUMBER OF SECTIONS
function PagEd_select_numsections($pagedmodvars, $helpvar, $numsectionsitem, $numsectionsvalue, $lowestoption, $highestoption, $prompt, $numsectionsinfo){
	$pf_acc=PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt).PagEd_start_onecell()
	.PagEd_intselector($pagedmodvars, $numsectionsitem, $lowestoption, $highestoption, $numsectionsvalue);
	if(!$numsectionsinfo)
	$pf_acc.=PagEd_input_button($pagedmodvars, 0, "addnewsections", _numsectionstoadd);
	return $pf_acc.PagEd_cellendspanstart_top()."</td>\n"
	.PagEd_modstringcells($pagedmodvars, 3, "&nbsp;&nbsp;".$numsectionsinfo);
}

// SELECT FONT (TITLES, SUBTITLES, TEXT)
function PagEd_select_fontvars($pagedmodvars, $helpvar, $fontitem, $fontsize, $prompt, $coloritem, $fontdata, $familyitem, $popupdirection){
	$oldfontvalue=abs($fontsize);
	if($oldfontvalue!=$fontsize)$oldfontvalue=$oldfontvalue+0.1;
	$colorvalue=substr($fontdata, 0, 7);
	$familyvalue=substr($fontdata, 8);
	$p_sizes=array(8, 9, 10, 11, 12, 13, 14, 16, 18, 20, 22, 24, 26, 28, 36, 48, 72);
	$p_families=array("Arial", "Comic Sans MS", "Courier New", "Georgia", "Impact", "Times New Roman", "Tahoma", "Trebuchet MS", "Verdana");
	$p_count=count($p_sizes);
	$p_listsizes=$p_listvalues=$p_weights=array();
	$p_listcounter=0;
	for($p_counter=0; $p_counter<$p_count; $p_counter++){
		$p_listsizes[$p_listcounter]=$p_sizes[$p_counter];
		$p_listvalues[$p_listcounter]=$p_sizes[$p_counter]." px "._pagedfontweightnormal;
		$p_weights[$p_listcounter]="normal";
		$p_listcounter++;
		$p_listsizes[$p_listcounter]=$p_sizes[$p_counter]+0.1;
		$p_listvalues[$p_listcounter]=$p_sizes[$p_counter]." px "._pagedfontweightbold;
		$p_weights[$p_listcounter]="bold";
		$p_listcounter++;
	}
	if($pagedmodvars["uclassaccess"]=="noaccess"){
		$p_span=4;
		$p_classinput="";
	}else{
		$p_span=3;
		if(strpos($fontdata, " class ")){
			$pf_temparray=explode(" class ", $fontdata);
			$p_classvalue=$pf_temparray[1];
		}else $p_classvalue="";
		$p_classinput=PagEd_cellendstart_top()
		.PagEd_inputtextfield($pagedmodvars, $familyitem."class", 50, 20, $p_classvalue);
	}
	return PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt)
	.PagEd_start_colspancells($p_span, "left", "", "yes")
	.PagEd_select_color($pagedmodvars, $helpvar, $coloritem, $colorvalue, $prompt, $popupdirection, 0)
	.PagEd_arrayselector($pagedmodvars, $fontitem, 0, $oldfontvalue, $p_listsizes, $p_listvalues, $p_weights)
	.PagEd_arrayselector($pagedmodvars, $familyitem, 0, $familyvalue, $p_families, $p_families)
	.$p_classinput."</td>\n";
}

// SELECT PIXELSIZE (IMAGES, THUMBNAILS, BORDERS)
function PagEd_set_pixels($pagedmodvars, $helpvar, $pixelitem, $pixelvalue, $prompt, $align="left"){
	return PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt, "", 150, "", $align)
	.PagEd_start_onecell().PagEd_inputtextfield($pagedmodvars, $pixelitem, 4, 3, $pixelvalue)
	.PagEd_modstringdisplay($pagedmodvars, "&nbsp;px")."</td>\n";
}

// TOGGLE (MEDIUM IMAGES, THUMBNAILS, DATESTAMP, PRINT ICONS, JAVASCRIPT MENUS)
function PagEd_checkbox_toggle($pagedmodvars, $helpvar, $toggleitem, $togglevalue, $prompt, $width="", $modcells=0, $modprompt="", $halfdivider=0){
	$pf_acc=PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt)
	.PagEd_start_onecell("left", $width)
	.PagEd_input_checkbox($pagedmodvars, $toggleitem, $togglevalue, 0)."</td>\n";
	if($modcells)$pf_acc.=PagEd_modstringcells($pagedmodvars, $modcells, $modprompt);
	if($halfdivider)$pf_acc.=PagEd_halfinputrow_divider($pagedmodvars, "right", 3, 3, "", "both");
	return $pf_acc;
}

function PagEd_intselector($pagedmodvars, $name, $countfrom, $countto, $valuetoequal, $criteriumtexts="", $width=""){
	$pf_acc="";
	if($name!="noselect")$pf_acc.=PagEd_selectorstart($pagedmodvars, $name, 1, $width);
	for($p_counter=$countfrom; $p_counter<$countto; $p_counter++){
		if($criteriumtexts)$p_string=$criteriumtexts[$p_counter];
		else $p_string=$p_counter;
		$pf_acc.=PagEd_singleoption($pagedmodvars, $valuetoequal, $p_counter, $p_string);
	}
	return $pf_acc."</select>\n";
}

function PagEd_arrayselector($pagedmodvars, $name, $countfrom, $valuetoequal, $criterias, $pf_texts, $p_weights="", $width="", $pf_multiple="", $pf_onchange=""){
	$countto=$countfrom+count($criterias);
	$pf_acc="";
	if($name!="noselect")$pf_acc.=PagEd_selectorstart($pagedmodvars, $name, 1, $width, $pf_multiple, $pf_onchange);
	for($p_counter=$countfrom; $p_counter<$countto; $p_counter++){
		if(!$p_weights)$pf_acc.=PagEd_singleoption($pagedmodvars, $valuetoequal, $criterias[$p_counter], $pf_texts[$p_counter]);
		else $pf_acc.=PagEd_singleoption($pagedmodvars, $valuetoequal, $criterias[$p_counter], $pf_texts[$p_counter], $p_weights[$p_counter]);
	}
	return $pf_acc."</select>\n";
}

// SELECT DROPDOWN
function PagEd_select_dropdown($pagedmodvars, $helpvar, $dropdownitem, $dropdownvalue, $prompt, $choicetexts, $cellspan=1, $width="", $promptalign="left"){
	$choicecount=count($choicetexts);
	return PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt, "", 150, "", $promptalign)
	.PagEd_start_colspancells($cellspan)
	.PagEd_intselector($pagedmodvars, $dropdownitem, 0, $choicecount, $dropdownvalue, $choicetexts, $width)."</td>\n";
}

// SELECT DROPDOWN
function PagEd_select_numberdropdown($pagedmodvars, $helpvar, $dropdownitem, $dropdownvalue, $prompt, $choicenumbers){
	return PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt).PagEd_start_onecell()
	.PagEd_arrayselector($pagedmodvars, $dropdownitem, 0, $dropdownvalue, $choicenumbers, $choicenumbers)."</td>\n";
}

// 210305 RADIO INPUT
function PagEd_input_checkedradio($radioname, $radiovalue, $valuetocompare){
	$pf_acc="<INPUT TYPE=\"RADIO\" NAME=\"".$radioname."\" VALUE=".$radiovalue." style=\"background : transparent; color: #000000\"";
	if($radiovalue==$valuetocompare)$pf_acc.=" checked=\"checked\"";
	return $pf_acc." />";
}

// 210305 RADIO INPUT
function PagEd_input_file($pagedmodvars, $inputname, $inputmaxlength, $inputsize){
	return "<input type=\"file\" name=\"".$inputname."\" style=\""
	.PagEd_formelement_style($pagedmodvars)
	."\" maxlength=\"".$inputmaxlength."\" size=\"".$inputsize."\" />";
}

function PagEd_count_bullets($pagedmodvars){
	$pf_count=0;
	define('_PAGEDBULLETDIR', $pagedmodvars["IconsPath"]."bullets/");
	$handle=opendir(_PAGEDBULLETDIR);
	while(false!==($file=readdir($handle))){
		if(strtolower(substr($file, -4))==".gif")$pf_count++;
	}
	closedir($handle);
	return $pf_count;
}

// RADIO SELECT BULLET (PAGES POINTER ICONS, MENU LINK ICONS)
function PagEd_select_bullet($pagedmodvars, $helpvar, $pf_count, $bulletitem, $bulletvalue, $prompt){
	$bulletdir="bullets/";
	$pf_acc=PagEd_prompt_leftcells($pagedmodvars, $helpvar, $prompt)
	.PagEd_start_colspancells(4).PagEd_table_start($pagedmodvars)."<tr>\n";
	for($bulletnum=0; $bulletnum<=$pf_count; $bulletnum++){
		$pf_acc.="<td valign=\"bottom\" align=\"center\" width=\"1\">";
		if($bulletnum==0)$pf_acc.="&middot;";
		else $pf_acc.=PagEd_simpleimage($pagedmodvars, $bulletdir."bullet".$bulletnum.".gif", "bullet".$bulletnum);
		$pf_acc.="<br />\n"
		.PagEd_input_checkedradio($bulletitem, $bulletnum, $bulletvalue)."</td>\n";
	}
	return $pf_acc."<td valign=\"bottom\" align=\"center\">\n"
	.PagEd_input_checkedradio($bulletitem, -1, $bulletvalue)
	.PagEd_modstringdisplay($pagedmodvars, _nobullet).PagEd_cellrowtableend()."</td>\n";
}

function PagEd_select_lang($pagedmodvars, $selectlangitem, $currentlang, $allangtext, $p_selectorwidth=""){
	$langlist=languagelist();
	$pf_acc=PagEd_selectorstart($pagedmodvars, $selectlangitem, 1, $p_selectorwidth)
	.PagEd_singleoption($pagedmodvars, $currentlang, "all", $allangtext);
	$handle=opendir("language");
	while(false!==($thisfolder=readdir($handle))){
		if(@is_dir("language/$thisfolder") && !empty($langlist[$thisfolder]))
		$pf_acc.=PagEd_singleoption($pagedmodvars, $currentlang, $thisfolder, $langlist[$thisfolder]);
	}
	return $pf_acc."</select>\n";
}

function PagEd_selectdate_cells($pagedmodvars, $cellspan, $selprefix, $seldate, $pf_req, $pf_prompt=""){
	if($pf_prompt)$pf_prompt=PagEd_modstringdisplay($pagedmodvars, $pf_prompt);
	if(!$seldate)$splitted=array("day"=>date("j"), "month"=>date("n"), "year"=>date("y")+2000);
	else $splitted=array("day"=>date("j", $seldate), "month"=>date("n", $seldate), "year"=>date("y", $seldate)+2000);
	if($pf_req=="timeprogramming")$firstyear=2004;
	else $firstyear=2000;
	return PagEd_start_colspancells($cellspan, "left", "", "nowrap").$pf_prompt
	.PagEd_intselector($pagedmodvars, $selprefix."day", 1, 32, $splitted["day"])
	.PagEd_intselector($pagedmodvars, $selprefix."month", 1, 13, $splitted["month"])
	.PagEd_intselector($pagedmodvars, $selprefix."year", $firstyear, 2008, $splitted["year"])."</td>";
}

function PagEd_setuseraccess_dropdown($pagedmodvars, $helpvar, $dropdowndata, $dropdownvalues, $dropdowntexts, $tablereturn=1){
	if($tablereturn)$tablereturn=PagEd_table_return();
	else $tablereturn="";
	return PagEd_prompt_leftcells($pagedmodvars, $helpvar, $dropdowndata["prompt"], "", 175)
	.PagEd_start_colspancells(4)
	.PagEd_arrayselector($pagedmodvars, $dropdowndata["name"], 0, $dropdowndata["currentvalue"], $dropdownvalues, $dropdowntexts, "", 250)."</td>".$tablereturn;
}

function PagEd_gdlibsniffer(){
	if(!extension_loaded('gd'))return "";
	$match=array();
	if(function_exists('gd_info')) {
		$version_info=gd_info();
		preg_match('/\d/', $version_info['GD Version'], $match);
		$gdversion=$match[0];
	}else if(!preg_match('/phpinfo/', ini_get('disable_functions'))) {
		ob_start(); phpinfo(8); $phpinfo=ob_get_contents(); ob_end_clean();
		$gdinfo=stristr($phpinfo, 'gd version');
		preg_match('/\d/', $gdinfo, $match);
		$gdversion=$match[0];
	}else return "";
	if($gdversion=="2" and !function_exists("imagecreatefromgif"))$gdversion="2_nogif";
	return "GD".$gdversion;
}

function PagEd_parse_fontdata($fontdata){
	$fontsize=intval($fontdata);
	if(strpos($fontdata, ",1") or strpos($fontdata, ".1"))return -$fontsize;
	else return $fontsize;
}

function PagEd_store_array($pagedmodvars, $type, $pf_table, $storearray, $wherevar="", $returnvar=""){
	$pf_count=count($storearray);
	$pf_table=$pagedmodvars["prefix"]."_".$pf_table;
	$pf_query1=$pf_query2="";
	if($wherevar)$wherevar=" where ".$wherevar;
	if($type=="insert")$pf_fullquery="insert into ".$pf_table;
	else $pf_fullquery="update ".$pf_table." set ";
	for($pf_ctr=0; $pf_ctr<$pf_count; $pf_ctr++){
		$pf_array=$storearray[$pf_ctr];
		if($pf_ctr>0)$pf_query1.=", ";
		$pf_query1.=$pf_array[0];
		if($type=="insert"){
			if($pf_ctr>0)$pf_query2.=", ";
			if($pf_array[2]=="int")$pf_query2.=$pf_array[1];
			else $pf_query2.="'".$pf_array[1]."'";
		}else{
			if($pf_array[2]=="int")$pf_query1.="=".$pf_array[1];
			else $pf_query1.="='".$pf_array[1]."'";
		}
	}
	if($type=="insert")$pf_fullquery.=" (".$pf_query1.") values (".$pf_query2.")";
	else $pf_fullquery.=$pf_query1.$wherevar;
	PagEd_db_query($pagedmodvars, $pf_fullquery, "store");
	if($returnvar){
		$pf_highestquery="select max(".$returnvar.") from ".$pf_table;
		$pf_highest=PagEd_db_query($pagedmodvars, $pf_highestquery, "select", 1);
		list($returnvar)=mysql_fetch_row($pf_highest);
	}
	return $returnvar;
}

function PagEd_delete_array($pagedmodvars, $delarray){
	$pagedmodvars["dblock"]=PagEd_lock_tables($pagedmodvars);
	$pf_count=count($delarray);
	for($pf_counter=0; $pf_counter<$pf_count; $pf_counter++){
		$pagedtable=$pagedmodvars["prefix"]."_".$delarray[$pf_counter][0];
		$pf_query="delete from ".$pagedtable." where ".$delarray[$pf_counter][1];
		PagEd_db_query($pagedmodvars, $pf_query, "delete");
	}
	return $pagedmodvars;
}

function PagEd_delete_media($pagedmodvars, $tri7data, $pf_host){
	$mediadeleted=0;
	if(!defined('_PAGEDTRI7PATH'))define('_PAGEDTRI7PATH', $tri7data["dirpath"]);
	if($pf_host=="media"){
		$folders=array("media");
		$pf_itemname="media_id";
	}else{
		$folders=array("pictures", "browsepics", "editorpics", "medipics", "thumbnails");
		$pf_itemname="image_id";
	}
	$p_folderscount=count($folders);
	$pf_selitems=PagEd_handle_sessionvars(array(array("pf_selitems", "")));
	if($pf_selitems){
		// $pf_selitems=$_SESSION["pf_selitems"];
		// unset($_SESSION["pf_selitems"]);
		$pf_filescount=count($pf_selitems);
	}else{
		$pf_filescount=pnVarCleanFromInput("pf_selcount");
		if($pf_filescount){
			for($pf_maincounter1=0; $pf_maincounter1<$pf_filescount; $pf_maincounter1++)
			$pf_selitems[$pf_maincounter1]=pnVarCleanFromInput("pf_selitems".$pf_maincounter1);
		}else{
			$pf_selitems[0]=pnVarCleanFromInput($pf_itemname);
			$pf_filescount=1;
		}
	}
	for($pf_maincounter=0; $pf_maincounter<$pf_filescount; $pf_maincounter++){
		$pf_item=$pf_selitems[$pf_maincounter];
		if($pf_item){
			if($pf_host=="media")$pf_file=PagEd_select_query($pagedmodvars, "paged_media", array("media_name"), "media_id=".$pf_item);
			else $pf_file=$pf_item;
			for($pf_counter=0; $pf_counter<$p_folderscount; $pf_counter++){
				$pf_path=_PAGEDTRI7PATH.$folders[$pf_counter]."/".$pf_file;
				if(is_file($pf_path))unlink($pf_path);
			}
			if(!is_file(_PAGEDTRI7PATH.$folders[0]."/".$pf_file)){
				$pagedmodvars=PagEd_delete_array($pagedmodvars, array(array("paged_media", "media_name=\"".$pf_file."\"")));
				$mediadeleted=1;
			}
		}
	}
	return array($pagedmodvars, $mediadeleted);
}

function PagEd_get_blockslink($pagedmodvars, $guilinkvars=""){
	if(!defined("_ADDBLOCK")){
		if($pagedmodvars["sysversion"]<800)$p_blocksdir="modules/Blocks";
		else $p_blocksdir="system/Blocks";
		define('_BLOCKCURRENTLANGINCLUDE', $p_blocksdir.'/pnlang/'.$pagedmodvars["userlang"]);
		define('_BLOCKENGLANGINCLUDE', $p_blocksdir.'/pnlang/eng');
		if(file_exists(_BLOCKCURRENTLANGINCLUDE."/admin.php"))
		include(_BLOCKCURRENTLANGINCLUDE."/admin.php");
		else include(_BLOCKENGLANGINCLUDE."/admin.php");
	}
	if(defined('_ADDBLOCK')){
		$headerlinkvar=array("index.php?module=Blocks&amp;type=admin", _ADDBLOCK, "module", "arrow_down_right");
		if(!$guilinkvars)return array($headerlinkvar);
		else $guilinkvars[]=$headerlinkvar;
	}
	return $guilinkvars;
}

function PagEd_handle_workflowstatus($pagedmodvars, $u_accessto, $pfa_req, $item_id, $desiredstatus, $pf_currentvars=""){
	if($pfa_req[1]=="page")$pf_table="paged_titles";
	else $pf_table="paged_".$pfa_req[1]."s";
	switch($pfa_req[0]){
		case "set":
			$pf_wfdata=PagEd_select_query($pagedmodvars, $pf_table, array("workflow_status", "workflow_owner", "workflow_timestamp"), $pfa_req[1]."_id=".$item_id, "", "fetcharray");
			if($pf_wfdata["workflow_owner"]==$u_accessto["requester"] or $pf_wfdata["workflow_status"]!=4){
				$pf_wfdata["editingok"]=1;
				$s_wftimestamp=mktime();
				$s_wfowner=$u_accessto["requester"];
				if(isset($pagedmodvars["noworkflow"]))$desiredstatus=3;
				$pf_updatewf=1;
			}else $pf_wfdata["editingok"]=0;
			break;
		case "save":
			$s_wftimestamp=0;
			$s_wfowner="none";
			if(isset($pagedmodvars["noworkflow"]))$desiredstatus=3;
			elseif($desiredstatus==3 and $u_accessto["module"]!="fullaccess" and $u_accessto["all"]!="fullaccess" and $u_accessto["publish"]!="fullaccess")$desiredstatus=2;
			$pf_updatewf=1;
			break;
		case "check":
			list($s_wfowner, $s_wftimestamp)=$pf_currentvars;
			if(($pagedmodvars["currenttime"]-$s_wftimestamp)>1800){
				$pf_updatewf=1;
				if($u_accessto["module"]!="fullaccess" and $u_accessto["all"]!="fullaccess" and $u_accessto["publish"]!="fullaccess")$desiredstatus=2;
			}break;
	}
	if(isset($pf_updatewf))PagEd_store_array($pagedmodvars, "update", $pf_table, array(
	array("workflow_status", $desiredstatus, "int"),
	array("workflow_owner", $s_wfowner, "char"),
	array("workflow_timestamp", $s_wftimestamp, "int")),
	$pfa_req[1]."_id=".$item_id);
	if($pfa_req[0]=="set")return $pf_wfdata;
	elseif($pfa_req[0]=="check")return $desiredstatus;
	else return "";
}

function PagEd_togglescreen_icon($pagedmodvars, $pagedmainurls, $pf_req){
	if($pf_req=="module_manager" or $pf_req=="module_configure_module"
	or $pf_req=="module_check_health" or substr($pf_req, -7)=="manager"){
		$scr_urlbit="&amp;pagedscreen=full";
		$linkurl=$pagedmainurls["adminop"].$pf_req;
		if($pagedmainurls["screenstatus"]=="full"){
			$linkurl=str_replace($scr_urlbit, "", $linkurl);
			$pf_image="screendown";
		}else{
			$linkurl.=$scr_urlbit;
			$pf_image="screenup";
		}
		return PagEd_imageonlylinkdisplay($linkurl, $pagedmodvars["IconsPath"]."".$pf_image.".gif", _paged_toggle_screenmode, "right", 5, 3);
	}else return "";
}

function PagEd_lock_tables($pagedmodvars, $pf_extras=""){
	if(!strpos($pagedmodvars["environment"], "dblockaccess"))return 0;
	if($pagedmodvars["dblock"])return 1;
	else{
		$pf_tables=array("paged_content", "paged_dummycontent", "paged_dummynews", "paged_dummytitle", "paged_helptexts","paged_media", "paged_layoutmenus", "paged_layoutpages", "paged_menunodes", "paged_menus", "paged_modulesettings", "paged_news", "paged_templates", "paged_titles", "paged_topics", "paged_usersettings", "hooks", "module_vars", "modules");
		if($pf_extras)$pf_tables=array_merge($pf_tables, $pf_extras);
	}
	$pf_query="LOCK TABLES ";
	$pf_count=count($pf_tables);
	for($pf_counter=0; $pf_counter<$pf_count; $pf_counter++){
		if($pf_counter>0)$pf_query.=", ";
		$pf_query.=$pagedmodvars["prefix"]."_".$pf_tables[$pf_counter]." WRITE";
	}
	if(strpos(strtolower($pagedmodvars["environment"]), "pncpg")){
		if(!isset($pagedmodvars["cpgprefix"]))
		$pagedmodvars["cpgprefix"]=pnModGetVar('pnCPG', '_prf');
		$pf_query.=", ".$pagedmodvars["cpgprefix"]."_albums WRITE, "
		.$pagedmodvars["cpgprefix"]."_pictures WRITE";
	}
	PagEd_db_query($pagedmodvars, $pf_query, "lock");
	return 1;
}

function PagEd_unlock_tables($pagedmodvars){
	if(!strpos($pagedmodvars["environment"], "dblockaccess"))return 0;
	if($pagedmodvars["dblock"])PagEd_db_query($pagedmodvars, "UNLOCK TABLES", "unlock");
	return 0;
}

function PagEd_showhide_area($pagedmodvars){
	return "<script language=\"JavaScript\" type=\"text/javascript\">\n"
	."function showhide(symbol,EL){obj=document.getElementById(EL);\n"
	."if (obj.style.display=='none'){obj.style.display='block';\n"
	."document.images[symbol].src=\"".$pagedmodvars["IconsPath"]."minus.gif\";\n"
	."}else{obj.style.display='none';\n"
	."document.images[symbol].src=\"".$pagedmodvars["IconsPath"]."plus.gif\";}}\n"
	."function SetshmainCookie (name, value, expires){\n"
	."var exp = new Date();\n"
	."var expiro = (exp.getTime() + (24 * 60 * 60 * 1000 * expires));\n"
	."exp.setTime(expiro); \n"
	."var expstr = \"; expires=\" + exp.toGMTString();\n"
	."document.cookie = name + \"=\" + escape(value) + expstr;\n"
	."}</script>\n";
}

function PagEd_showhide_link($pagedmodvars, $showhide_id, $startopen=0){
	if(isset($_COOKIE["PagEd_maincki".$showhide_id]))
	$pf_cookie=$_COOKIE["PagEd_maincki".$showhide_id];
	else $pf_cookie="";
	if(($startopen and !$pf_cookie) or $pf_cookie){
		$pf_setval="''";
		$pf_icon="minus";
		$pf_time=-3600;
	}else{
		$pf_setval="'".$showhide_id."'";
		$pf_icon="plus";
		$pf_time=3600;
	}
	return "<a onclick=\"showhide('PagEdshimg".$showhide_id."','PagEdsh".$showhide_id."');"
	." SetshmainCookie('PagEd_maincki".$showhide_id."', ".$pf_setval.", ".$pf_time.");\">"
	."<img name=\"PagEdshimg".$showhide_id."\" src=\"".$pagedmodvars["IconsPath"]
	.$pf_icon.".gif\" alt=\"showhide\" border=\"0\"/></a>";
}

function PagEd_showhide_divstart($showhide_id, $startopen=0){
	if(isset($_COOKIE["PagEd_maincki".$showhide_id]))
	$pf_cookie=$_COOKIE["PagEd_maincki".$showhide_id];
	else $pf_cookie="";
	if(($startopen and !$pf_cookie) or $pf_cookie)$pf_val="block";
	else $pf_val="none";
	return "<!-- Start of id=\"PagEdsh".$showhide_id."\" -->"
	."<div id=\"PagEdsh".$showhide_id."\" style=\"display: ".$pf_val.";\">";
}

function PagEd_showhide_divend($showhide_id){
	return "</div><!-- End of id=\"PagEdsh".$showhide_id."\" -->";
}

function PagEd_showhide_divends_all($pf_branch, $pf_branchlen, $pf_this, $pf_clean=""){
	if($pf_clean)$pf_id=$pf_hid=0;
	else list($pf_id, $pf_hid)=array($pf_this["id"], $pf_this["host_id"]);
	$pf_acc="";
	$pf_equal=0;
	while(!$pf_equal and $pf_branchlen>-1){
		$pf_idtocompare=$pf_branch[$pf_branchlen];
		if($pf_hid==$pf_idtocompare)$pf_equal=1;
		else{
			if($pf_idtocompare==-2)$pf_idtocompare=0;
			$pf_acc.=PagEd_showhide_divend($pf_idtocompare);
			$pf_branch[$pf_branchlen]=-1;
		}
		if(!$pf_equal)$pf_branchlen--;
	}
	$pf_branchlen++;
	$pf_branch[$pf_branchlen]=$pf_id;
	return array($pf_branch, $pf_branchlen, $pf_acc);
}

function PagEd_get_manageritem($pagedop, $ismain=0){
	$firstucpos=strpos($pagedop, "_");
	$mgritem=substr($pagedop, 0, $firstucpos);
	if($mgritem=="main")$mgritem="pages";
	elseif($mgritem=="topic" and $ismain)$mgritem="pages";
	elseif($mgritem!="news")$mgritem.="s";
	if(strpos($pagedop, "_group"))$mgritem="groups";
	elseif(strpos($pagedop, "_backup"))$mgritem="backups";
	return $mgritem;
}

function PagEd_backtocpanel_button($u_accessto, $submitbuttons, $pf_invert=0, $justchangetext=1){
	if($u_accessto["all"]=="fullaccess")
	$submitbuttons[]=array("paged_controls", _controls, $pf_invert);
	elseif($justchangetext)
	$submitbuttons[]=array("paged_cancelandend", _pagedbacktomain, $pf_invert);
	return $submitbuttons;
}

function PagEd_check_pagecorruption($pagedmodvars, $u_accessto, $p_author){
	$validuser_result=PagEd_select_query($pagedmodvars, "users", array("pn_name", "pn_uname"), "pn_name=\"".$p_author."\" or pn_uname=\"".$p_author."\"");
	$p_rows=PagEd_get_dbnumrows($pagedmodvars, $validuser_result);
	if(!$p_rows)return array(1, array($p_author, "("._USER.": "._paged_not_found.")", $u_accessto["requester"], $u_accessto["requester2"]));
	else{
		list($p_pn_name, $p_pn_uname)=mysql_fetch_row($validuser_result);
		if($p_pn_uname==$p_author)return array(0, "");
		else return array(1, array($p_pn_name, "("._USER."=".$p_pn_uname.")", $p_pn_uname, $p_pn_name));
	}
}

function PagEd_checkuncheckall_js(){
	return "<script language=\"JavaScript\" type=\"text/javascript\">\n"
	."// Copyright Shawn Olson 2004 http://www.shawnolson.net Thanks Shawn!\n"
	."function checkUncheckAll(theElement){\n"
	."var theForm=theElement.form, z=0;\n"
	."for(z=0; z<theForm.length;z++){\n"
	."if(theForm[z].type=='checkbox' && theForm[z].name!='pagedcheckall'){\n"
	."theForm[z].checked=theElement.checked;}}}</script>\n";
}

function PagEd_checkuncheckall_box($pagedmodvars, $colspan){
	return PagEd_rowcell_start($colspan, $pagedmodvars["bgcolor2"])
	.PagEd_input_checkbox($pagedmodvars, "pagedcheckall", 0, 3, 1, "checkUncheckAll(this);")
	.PagEd_modstringdisplay($pagedmodvars, "&nbsp;"._allanguages).PagEd_cellrowend();
}

function PagEd_legendline($pagedmodvars, $pf_vars){
	$pf_acc="";
	$pf_count=count($pf_vars);
	for($pf_ctr=0; $pf_ctr<$pf_count; $pf_ctr++){
		$pf_acc.=PagEd_spacedisplay()
		.PagEd_simpleimage($pagedmodvars, $pf_vars[$pf_ctr][0], $pf_vars[$pf_ctr][1])
		.PagEd_modstringdisplay($pagedmodvars, "&nbsp;".$pf_vars[$pf_ctr][1]);
	}
	return $pf_acc;
}

?>
