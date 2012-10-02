<?php

//XTEC ************ ELIMINAT - Moved configuration to new admin menu
//2011.09.14 @sarjona 
/*
//get publishers
$publisher_option='<option>'.get_string('selectpublisher','blocks/rcommon').'</value>';
if($publishers=get_records_select('rcommon_publisher', "urlwsbookstructure<>'".sql_empty()."'")){
    foreach($publishers as $publisher){
        $publisher_option.='<option value="'.$publisher->id.'">'.$publisher->name.'</value>';
    }
}
// MARSUPIAL *********** AFEGIT -> Publishers manager
// 2011.09.07 @mmartinez
// set title for publishers manager
$output = '<br>'.get_string('publishersmanager', 'block_rcommon').' <input type="button" value="'.get_string('manage', 'block_rcommon').'" onclick="javascript:location.href=\''.$CFG->wwwroot.'/blocks/rcommon/publishersManager.php\'"> <br>';
// ********** FI

//set title for book structure
$output .= '<br>'.get_string('downloadbookstructures','block_rcommon').' ';
//set select
$output .= "<select onChange='javascript:if(this.value!=\"\"&&this.value!=null) test(this);'>".$publisher_option."</select>";
//set javascript
echo '<script>function test(that){
    document.body.className += " yui-skin-sam";
    
	// Initialize the temporary Panel to display while waiting for external content to load
	panel = new YAHOO.widget.Panel("wait",  
	    { width: "240px", 
		fixedcenter: true, 
		close: false, 
		draggable: false, 
		zindex:99,
		modal: true,
		visible: false});
		   
	panel.setHeader("'.get_string('loading','blocks/rcommon').'");
    panel.setBody("<br><img src=\"'.$CFG->wwwroot.'/blocks/rcommon/rel_interstitial_loading.gif\"/ width=\"220\" height=\"19\"><br>");
	panel.render(document.body);
		
	// Show the Panel
	panel.show();
    
    location.href="'.$CFG->wwwroot.'/blocks/rcommon/WebServices/consume.php?id="+that.value;
}</script>';
//set setting
$settings->add(new admin_setting_heading('block_rcommon_publisher', '', $output));
*/
//************ FI

$checkedyesno = array(''=>get_string('no'), 'checked'=>get_string('yes')); // not nice at all
$settings->add(new admin_setting_configselect('rcommon_tracer', get_string('tracer', 'rcontent'),
            get_string('tracerdesc', 'rcontent'), '', $checkedyesno));


//MARSUPIAL ********** AFEGIT -> Select roles to take like teacher for the authentication method
//2011.05.16 @mmartinez
//set roles for authenticate students
$allroles = array();
if ($roles = get_all_roles()) {
    foreach ($roles as $role) {
        $rolename = strip_tags(format_string($role->name, true));
        $allroles[$role->id] = $rolename;
        if (!isset($guestroles[$role->id])) {
            $nonguestroles[$role->id] = $rolename;
        }
    }
}
$settings->add(new admin_setting_configmultiselect('rcommon_teacherroles', get_string('teacherroles', 'blocks/rcommon'),
                      get_string('teacherrolesinfo', 'blocks/rcommon'), array(3,4), $allroles));
//*********** FI
?>