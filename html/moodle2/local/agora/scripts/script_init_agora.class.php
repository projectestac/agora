<?php

require_once('agora_script_base.class.php');

class script_init_agora extends agora_script_base{

	public $title = 'Inicialitza Àgora';
	public $info = "Fa els passos necessàris per deixar l'Àgora a punt quan es crea una nova instància.";
	public $cron = false;
	protected $test = false;
	public $api = false;

	protected function _execute($params = array(), $execute = true){
		global $CFG, $DB, $OUTPUT;
		$value = 'wrap,formatselect,wrap,bold,italic,wrap,bullist,numlist,wrap,hr,wrap,link,unlink,wrap,anchor,wrap,image

undo,redo,wrap,underline,strikethrough,sub,sup,wrap,justifyleft,justifycenter,justifyright,wrap,outdent,indent,wrap,forecolor,backcolor,wrap,ltr,rtl,wrap,nonbreaking,charmap,table

fontselect,fontsizeselect,code,search,replace,wrap,cleanup,removeformat,pastetext,pasteword,wrap,fullscreen';

		set_config('customtoolbar', $value, 'editor_tinymce');
		mtrace('Canviat barra de l\'editor HMTL', '<br/>');

		filter_set_global_state('filter/tex', TEXTFILTER_ON);
		mtrace('Activat filtre TEX', '<br/>');

		set_config('loginhttps', 1);
		mtrace('Activat login https', '<br/>');

		set_config('maxbytes', 0, 'assignsubmission_file');
		mtrace('Límit de tramesa de tasques pujat al límit de servidor', '<br/>');

		return true;
	}

	function is_visible() {
		if (is_agora()) {
			return true;
        }
        return false;
	}
}