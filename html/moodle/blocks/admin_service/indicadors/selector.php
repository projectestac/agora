<?php
//aquest arxiu serveix per carregar scripts
require_once ('../../../config.php');
require_once ('../lib.php');
require_once ('lib.php');

isgestor();

$ajaxurl = $CFG->wwwroot.'/blocks/admin_service/indicadors/selector.php';

//mostrar subcategories
$selqad = optional_param('selquad');

$res = '';
//si ens passen un quadrimestre retornem el selector de campus
if ($selqad) {
	if ($selqad<0) exit;
	//agafem el nom del quadri
	$llista_cat = get_records("course_categories","parent",$selqad);
	if (!$llista_cat) $llista_cat = array();
	
	$res.= 'Selecció de campus: <select name="selcampus" onChange="carregaElement (\'selassig\',\''.$ajaxurl.'\',\'selcampus=\'+this.value);">';
	$res.= '<option value="-2">Agrupa</option>';
	$res.= '<option value="-1">Tots</option>';
	foreach ($llista_cat as $cat){
		$res.= '<option value="'.$cat->id.'">'.$cat->name.'</option>';
	}
	$res.= '</select>';
	$res.='<div id="selassig">';
	//selector campus buit a l'inici (a dins hi haura el de assig)
	$res.= '</div>';
	echo $res;
	exit;
		//$cats[$cat->id] = $parent->name;
}

//fixar quatri i campus
$elquad = optional_param('elquad');
$elcamp = optional_param('elcamp');
$elassig = optional_param('elassig');

$selassig= $elassig;
$totsassig= ($elassig==-1)?' selected':'';
$agrassig= ($elassig==-2)?' selected':'';

if ($elcamp && $elquad) {
	if ($elcamp<0 || $elquad<0) exit;
	//agafem la categoria
	$categoria = get_record("course_categories","parent",$elquad,'name',strtoupper($elcamp));
	if (!$categoria) exit;
	$llista_assigs = get_records("course","category",$categoria->id);
	if (!$llista_assigs) $llista_assigs = array();
	
	$res.= 'Selecció d\'assignatura<select name="selassig">';
	$res.= '<option value="-2"'.$agrassig.'>Agrupa les assignatures</option>';
	$res.= '<option value="-1"'.$totsassig.'>Totes les assignatures</option>';
	
	foreach ($llista_assigs as $as){
		$sel = ($selassig==$as->id)?' selected':'';
		$res.= '<option value="'.$as->id.'"'.$sel.'>'.get_assig_shortname ($as->id).' '.$as->fullname.'</option>';
	}
	$res.= '</select>';
	echo $res;
	exit;
}

//mostrar assigs
$selcampus = optional_param('selcampus');
if ($selcampus) {
	if ($selcampus<0) exit;
	//agafem el nom del quadri
	$llista_assigs = get_records("course","category",$selcampus);
	if (!$llista_assigs) $llista_assigs = array();
	
	$res.= 'Selecció d\'assignatura<select name="selassig">';
	$res.= '<option value="-2"'.$agrassig.'>Agrupa les assignatures</option>';
	$res.= '<option value="-1"'.$totsassig.'>Totes les assignatures</option>';
	foreach ($llista_assigs as $as){
		$sel = ($selassig==$as->id)?' selected':'';
		$res.= '<option value="'.$as->id.'"'.$sel.'>'.get_assig_shortname ($as->id).' '.$as->fullname."</option>\n";
	}
	$res.= '</select>';
	echo $res;
	exit;
}


?>