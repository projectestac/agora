<?php 
require_once("$CFG->libdir/formslib.php");
require_js(array('yui_yahoo', 'yui_event', 'yui_connection'));
 
class themeconfig_form extends moodleform {
 
    function definition() {
        global $CFG;
 
        $mform =& $this->_form; // Don't forget the underscore! 
 	
        // Summary
        $mform->addElement('html', '<div id="themeconfig_summary"><b>'.get_string('summary','theme_config').'</b><ul><li><a href="#colors">'
                            .get_string('colors','theme_config').'</a></li><li><a href="#header">'
                            .get_string('header','theme_config').'</a></li><li><a href="#font_size">'
                            .get_string('font_size','theme_config').'</a></li><li><a href="#font_style">'
                            .get_string('font_style','theme_config').'</a></li><li><a href="#icons">'
                            .get_string('icons','theme_config').'</a></li><li><a href="#pers_style">'
                            .get_string('pers_style','theme_config').'</a></li><li><a href="#top_menu_content">'
                            .get_string('top_menu_content','theme_config').'</a></li></ul></div><br/>');


 		$mform->addElement('html', '<a name="colors"></a><h3>'.get_string('colors','theme_config').'</h3>');
 		
 		$predef_styles = array(
 		0=>get_string('personalized', 'theme_config'),
 		1=>get_string('carmine', 'theme_config').get_string('default', 'theme_config'),
 		2=>get_string('coral_reef', 'theme_config'),
 		3=>get_string('gold_fever', 'theme_config'),
 		4=>get_string('green_lemon', 'theme_config'),
 		5=>get_string('autumn', 'theme_config'),
 		6=>get_string('nostalgia', 'theme_config'));
 		
        $mform->addElement('select', 'colorSelector', get_string('predefined_styles', 'theme_config'), $predef_styles, 'onchange="changeColors()"');
        $mform->setDefault('colorSelector', isset($CFG->colorSelector) ? $CFG->colorSelector: '1');
        $mform->addElement('text', 'theme_color1', get_string('title', 'theme_config'), 'class="color" onchange="changeToPersonalized()"');
        $mform->setDefault('theme_color1', isset($CFG->theme_color1) ? $CFG->theme_color1: '#AC2013');
		$mform->addElement('text', 'theme_color2', get_string('header_buttons_back', 'theme_config'), 'class="color" onchange="changeToPersonalized()"');
		$mform->setDefault('theme_color2', isset($CFG->theme_color2) ? $CFG->theme_color2: '#AC2013');
                $mform->addElement('text', 'theme_color7', get_string('header_buttons_font', 'theme_config'), 'class="color" onchange="changeToPersonalized()"');
		$mform->setDefault('theme_color7', isset($CFG->theme_color7) ? $CFG->theme_color7: '#FFFFFF');
		$mform->addElement('text', 'theme_color3', get_string('subtitles', 'theme_config'), 'class="color" onchange="changeToPersonalized()"');
		$mform->setDefault('theme_color3', isset($CFG->theme_color3) ? $CFG->theme_color3: '#303030');
		$mform->addElement('text', 'theme_color4', get_string('links', 'theme_config'), 'class="color" onchange="changeToPersonalized()"');
		$mform->setDefault('theme_color4', isset($CFG->theme_color4) ? $CFG->theme_color4: '#AC2013');
		$mform->addElement('text', 'theme_color5', get_string('topbar', 'theme_config'), 'class="color" onchange="changeToPersonalized()"');
		$mform->setDefault('theme_color5', isset($CFG->theme_color5) ? $CFG->theme_color5: '#D0D0D0');
		//$mform->addElement('text', 'theme_color6', get_string('leftbar', 'theme_config'), 'class="color" onchange="changeToPersonalized()"');
		//$mform->setDefault('theme_color6', isset($CFG->theme_color6) ? $CFG->theme_color6: '#D0D0D0');
		
		$themedir = $CFG->dataroot."/1/theme/";
		
		$mform->addElement('html', '<br/><br/><a name="header"></a><h3>'.get_string('header','theme_config').'</h3>');
		$imagearray=array();
		if(file_exists($themedir."logo.png")){
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_actual_image','theme_config'), 0);
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_default_image','theme_config'), 1);
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_selected_image','theme_config'), 2);
		
			$separators = array(
			0=> '<br/><img src="'.$CFG->wwwroot."/file.php/1/theme/logo.png".'"  height="70px" border=1><div style="width:800px;height:2px;">&nbsp;</div>',
			1=> '<br/><img src="images/top.jpg" height="70px"  border=1>'.'<div style="width:800px;height:2px;">&nbsp;</div>',
			2=> '');	
		}
		else if(file_exists($themedir."logo.jpg")){
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_actual_image','theme_config'), 0);
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_default_image','theme_config'), 1);
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_selected_image','theme_config'), 2);
		
			$separators = array(
			0=> '<br/><img src="'.$CFG->wwwroot."/file.php/1/theme/logo.jpg".'"  height="70px" border=1><br/>',
			1=> '<br/><img src="images/top.jpg" height="70px"  border=1>'.'<div style="width:800px;height:2px;">&nbsp;</div>',
			2=> '');	
		}
		else{
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_actual_image','theme_config'), 0);
			$imagearray[] = &MoodleQuickForm::createElement('radio', 'image_header', '', get_string('use_selected_image','theme_config'), 2);
			$separators = array(
			0=> '<br/><img src="images/top.jpg" height="70px"  border=1>'.'<div style="width:800px;height:2px;">&nbsp;</div>',
			2=> '');
		}
		
		$mform->addGroup($imagearray, 'image_header', '', $separators, false);		
			
		$this->set_upload_manager(new upload_manager('header_image', true, false, 1, false, 0, true, false, false));	
		$mform->addElement('file', 'header_image', get_string('max_height','theme_config').': 112px<br/>');
		$mform->disabledIf('header_image', 'image_header', 'neq', '2');


		$mform->addElement('html', '<br/><br/><a name="font_size"></a><h3>'.get_string('font_size','theme_config').'</h3>');
		$fontsizearray[] = &MoodleQuickForm::createElement('radio', 'font_size', '', '<span style="font-size:90%;">'.get_string('tiny','theme_config').'</span>', 90);
		$fontsizearray[] = &MoodleQuickForm::createElement('radio', 'font_size', '', '<span style="font-size:95%;">'.get_string('small','theme_config').'</span>', 95);
		$fontsizearray[] = &MoodleQuickForm::createElement('radio', 'font_size', '', '<span style="font-size:100%;">'.get_string('medium','theme_config').'</span>', 100);
		$fontsizearray[] = &MoodleQuickForm::createElement('radio', 'font_size', '', '<span style="font-size:105%;">'.get_string('big','theme_config').'</span>', 105);
		$fontsizearray[] = &MoodleQuickForm::createElement('radio', 'font_size', '', '<span style="font-size:110%;">'.get_string('huge','theme_config').'</span>', 110);
		$mform->setDefault('font_size', isset($CFG->font_size) ? $CFG->font_size: 100);        
		$mform->addGroup($fontsizearray, 'font_size', '', '<div style="width:800px;height:2px;">&nbsp;</div>', false);

                $mform->addElement('html', '<br/><br/><a name="font_style"></a><h3>'.get_string('font_style','theme_config').'</h3>');
                $font_styles = array(
                                    1=>get_string('normal_style', 'theme_config'),
                                    2=>get_string('handwrite_style', 'theme_config'),
                                    3=>get_string('mayus_style', 'theme_config'));
                $mform->addElement('select', 'font_style', get_string('select_style', 'theme_config'), $font_styles);
                $mform->setDefault('font_style', isset($CFG->font_style) ? $CFG->font_style: '1');

		$mform->addElement('html', '<br/><br/><a name="icons"></a><h3>'.get_string('icons','theme_config').'</h3>');
		$iconsarray[] = &MoodleQuickForm::createElement('radio', 'default_icons', '', get_string('use_moodle_icons','theme_config').'<br/><div style="margin-left:20px;padding:3px;"><img src="../../pix/i/users.gif">&nbsp;<img src="../../pix/t/edit.gif">&nbsp;<img src="../../pix/i/files.gif">&nbsp;<img src="../../pix/i/admin.gif">&nbsp;<img src="../../pix/i/report.gif">&nbsp;<img src="../../pix/i/scales.gif">&nbsp;<img src="../../pix/i/backup.gif">&nbsp;<img src="../../pix/i/all.gif">&nbsp;<img src="../../pix/i/hide.gif">&nbsp;<img src="../../pix/i/guest.gif">&nbsp;</div>', 0);
		$iconsarray[] = &MoodleQuickForm::createElement('radio', 'default_icons', '', get_string('use_theme_icons','theme_config').'<br/><div style="margin-left:20px;padding:3px;"><img src="pix/i/users.gif">&nbsp;<img src="pix/t/edit.gif">&nbsp;<img src="pix/i/files.gif">&nbsp;<img src="pix/i/admin.gif">&nbsp;<img src="pix/i/report.gif">&nbsp;<img src="pix/i/scales.gif">&nbsp;<img src="pix/i/backup.gif">&nbsp;<img src="pix/i/all.gif">&nbsp;<img src="pix/i/hide.gif">&nbsp;<img src="pix/i/guest.gif">&nbsp;</div>', 1);
                $mform->setDefault('default_icons', isset($CFG->custompix) ? $CFG->custompix: 1);

		$mform->addGroup($iconsarray, 'default_icons', '', '<div style="width:800px;height:2px;">&nbsp;</div>', false);	
				
        
		$mform->addElement('html', '<br/><a name="pers_style"></a><h3>'.get_string('pers_style','theme_config').'</h3>');
		$mform->addElement('textarea', 'pers_style', '', 'wrap="virtual" rows="20" cols="75" style="margin-left:-250px" ');
		if(file_exists($CFG->dataroot."/1/theme/styles_personal.css")){
			$output="";
			$file = fopen($CFG->dataroot."/1/theme/styles_personal.css", "r");
			while(!feof($file)) {
			  //read file line by line into variable
			  $output .= fgets($file, 4096);
			}
			fclose ($file);
			$mform->setDefault('pers_style', $output);
		}

                //Javascript functions
                ?>
                    <script type='text/javascript'>
                    window.onload(printStructure());

                    function allowEdit(item){
                        document.forms['mform1'].elements['name_item_'+item].disabled=false;
                        document.forms['mform1'].elements['url_item_'+item].disabled=false;
                        document.getElementById('edit_item_'+item).visibility="hide";
                        document.getElementById('item_div_'+item).innerHTML='<img src=\"<?php echo $CFG->pixpath; ?>/i/tick_green_big.gif\" style=\"cursor:pointer;cursor:hand\" onClick=\"javascript:editItem('+item+')\" /><img src=\"<?php echo $CFG->pixpath; ?>/i/cross_red_big.gif\" style=\"cursor:pointer;cursor:hand\" onClick=\"javascript:printStructure()\" />'
                        
                    }

                    function editItemResponse(o) {
                        document.getElementById('top_menu_alerts').innerHTML="<?php echo get_string('changes_saved','theme_config');?>";
                        cleanAlert();
                        printStructure();
                    }

                    function functionFailure(o) {
                        // Ignore for now
                    }

                    function editItem(item){
                        name = document.forms['mform1'].elements['name_item_'+item].value;
                        url = document.forms['mform1'].elements['url_item_'+item].value;
                        YAHOO.util.Connect.asyncRequest('POST','top_menu/edit_item.php',{success:editItemResponse,failure:functionFailure},'item='+encodeURIComponent(item)+'&name='+encodeURIComponent(name)+'&url='+encodeURIComponent(url));
                    }

                    function printStructure(){
                        YAHOO.util.Connect.asyncRequest('POST','top_menu/print_structure.php',{success:printStructureResponse,failure:functionFailure},'');
                    }

                    function printStructureResponse(o){
                        document.getElementById('top_menu_structure').innerHTML=o.responseText; 
                    }

                    function allowAddSon(item){
                        document.getElementById('item_div_'+item).innerHTML="<img class=\"son\" src=\"images/menu/breakline_icon.png\" /> <?php echo get_string('item_name','theme_config');?>: "+'<input type="text" id="son_name_'+item+'" size="15"/>'+" <?php echo get_string('item_url','theme_config');?>: "+'<input type="text" id="son_url_'+item+'" size="40" value="http://"/><img src=\"<?php echo $CFG->pixpath; ?>/i/tick_green_big.gif\" style=\"cursor:pointer;cursor:hand\" onClick=\"javascript:addSon('+item+')\" /><img src=\"<?php echo $CFG->pixpath; ?>/i/cross_red_big.gif\" style=\"cursor:pointer;cursor:hand\" onClick=\"javascript:printStructure()\" />';
                        document.getElementById('add_son_'+item).innerHTML='';
                    }

                    function addSon(item){
                        name = document.forms['mform1'].elements['son_name_'+item].value;
                        url = document.forms['mform1'].elements['son_url_'+item].value;
                        if(name==''){
                            alert("<?php echo get_string('name_needed','theme_config');?>")

                        }else{
                            YAHOO.util.Connect.asyncRequest('POST','top_menu/add_son.php',{success:addSonResponse,failure:functionFailure},'item='+encodeURIComponent(item)+'&name='+encodeURIComponent(name)+'&url='+encodeURIComponent(url));
                        }
                    }

                    function addSonResponse(o){
                        document.getElementById('top_menu_alerts').innerHTML="<?php echo get_string('item_added','theme_config');?>";
                        cleanAlert();
                        printStructure();
                    }

                    function reallyDelete(item){
                        document.getElementById('item_div_'+item).innerHTML="<?php echo get_string('really_delete_item','theme_config');?> "+'<img src=\"<?php echo $CFG->pixpath; ?>/i/tick_green_big.gif\" style=\"cursor:pointer;cursor:hand\" onClick=\"javascript:deleteItem('+item+')\" /><img src=\"<?php echo $CFG->pixpath; ?>/i/cross_red_big.gif\" style=\"cursor:pointer;cursor:hand\" onClick=\"javascript:printStructure()\" />';
                        document.getElementById('delete_item_'+item).innerHTML='';
                    }

                    function deleteItem(item){
                        YAHOO.util.Connect.asyncRequest('POST','top_menu/delete_item.php',{success:deleteItemResponse,failure:functionFailure},'item='+item);
                    }

                    function deleteItemResponse(o){
                        document.getElementById('top_menu_alerts').innerHTML="<?php echo get_string('item_deleted','theme_config');?>";
                        cleanAlert();
                        printStructure();
                    }

                    function upItem(item){
                        YAHOO.util.Connect.asyncRequest('POST','top_menu/up_item.php',{success:printStructure,failure:functionFailure},'item='+item);
                    }

                    function downItem(item){
                        YAHOO.util.Connect.asyncRequest('POST','top_menu/down_item.php',{success:printStructure,failure:functionFailure},'item='+item);
                    }

                    function cleanAlert(){
                        setTimeout("document.getElementById('top_menu_alerts').innerHTML=''", 10000);
                    }

                    </script>

                <?php

                $mform->addElement('html', '<br><br/><a name="top_menu_content"></a><h3>'.get_string('top_menu_content','theme_config').'</h3>');
                $mform->addElement('checkbox', 'top_menu_active', get_string('active', 'theme_config'));
                $top_menu_active = (isset($CFG->top_menu_active)) ? $CFG->top_menu_active : '1';
                $mform->setDefault('top_menu_active', $top_menu_active);
                $mform->addElement('checkbox', 'top_menu_new_window', get_string('new_window', 'theme_config'));
                $top_menu_new_window = (isset($CFG->top_menu_new_window)) ? $CFG->top_menu_new_window : '0';
                $mform->setDefault('top_menu_new_window', $top_menu_new_window);
                $mform->addElement('html', '<br/>');
                $mform->addElement('html', '<div id="top_menu_alerts" style="margin-bottom:10px;"></div>');
                $mform->addElement('html', '<div id="top_menu_structure"></div>');
                                

		//normally you use add_action_buttons instead of this code
        $buttonarray=array();
        $buttonarray[] = &$mform->createElement('submit', 'submitbutton', get_string('savechanges'));
        $buttonarray[] = &$mform->createElement('reset', 'resetbutton', get_string('revert'));
        $mform->addGroup($buttonarray, 'buttonar', '', array(' '), false);
        $mform->closeHeaderBefore('buttonar');
		
	}
}


?>
