<?php
// ----------------------------------------------------------------------
// Copyright (C) 2006 per Jordi Fons
// ----------------------------------------------------------------------
// Aquest programa fa �s de les funcions de l'API de PostNuke
// PostNuke Content Management System
// Copyright (C) 2002 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// --------------------------------------------------------------------------
// Llic�ncia
//
// Aquest programa �s de software lliure. Pot redistribuir-lo i/o modificar-lo
// sota els termes de la Llic�ncia P�blica General de GNU segons est� publicada
// per la Free Software Foundation, b� de la versi� 2 de l'esmentada Llic�ncia
// o b� (segons la seva elecci�) de qualsevol versi� posterior.
//
// Aquest programa es distribueix amb l'esperan�a que sigui �til, per� sense
// cap garantia, fins i tot sense la garantia MERCANTIL impl�cita o sense
// garantir la conveni�ncia per a un prop�sit particular. Consulti la Llic�ncia
// General de GNU per a m�s detalls.
//
// Pots trobar la Llic�ncia a http://www.gnu.org/copyleft/gpl.html
// --------------------------------------------------------------------------
// Autor del fitxer original: Jordi Fons (jfons@iespfq.org)
// --------------------------------------------------------------------------
// Prop�sit del fitxer:
//     Funcions de generaci� de pdf del m�dul llibres
// --------------------------------------------------------------------------

require_once(ModUtil::getVar('IWbooks', 'fpdf').'fpdf.php');


class PDF extends FPDF
{

	var $angle=0;

	function Rotate($angle,$x=-1,$y=-1)
	{
		if($x==-1)
		$x=$this->x;
		if($y==-1)
		$y=$this->y;
		if($this->angle!=0)
		$this->_out('Q');
		$this->angle=$angle;
		if($angle!=0)
		{
			$angle*=M_PI/180;
			$c=cos($angle);
			$s=sin($angle);
			$cx=$x*$this->k;
			$cy=($this->h-$y)*$this->k;
			$this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
		}
	}

	function _endpage()
	{
		if($this->angle!=0)
		{
			$this->angle=0;
			$this->_out('Q');
		}
		parent::_endpage();
	}


	//Capçal de pàgina
	function Header()
	{
	    $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);
	
	    // Si variable 'encap' no té contingut o el mòdul IWmain no està actiu no apareixerà encapçalament
        if(($modinfo['state'] != 3) ||(!is_null(ModUtil::getVar('IWbooks', 'encap')))){
			$imatge = ModUtil::getVar('IWmain', 'documentRoot').'/'.ModUtil::getVar('IWbooks', 'encap');
			if (file_exists($imatge) && (ModUtil::getVar('IWbooks', 'encap') != '')){
			    $this->Image($imatge,8,6,180);
			}		    
	    }		
		
		//$this->Image(ModUtil::getVar('IWbooks', 'encap'),8,6,180);
		//$dir = ModUtil::getVar('IWmain', 'documentRoot')."/public/encap.jpg";
		//$dir = ModUtil::getVar('IWmain', 'documentRoot').$imatge;
		
		
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//Ens movem a la dreta
		$this->Cell(80);
		//Títol
		//Salt de línia
		$this->Ln(30);

		if (ModUtil::getVar('IWbooks', 'marca_aigua') == 1)
		{
			// Fer marca d'aigua
			$this->SetFont('Arial','B',50);
			$this->SetTextColor(140,140,140);
			$this->RotatedText(50,190,'P r o v i s i o n a l',45);
		}
	}


	function RotatedText($x,$y,$txt,$angle)
	{
		//Rotació del text
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		$this->Rotate(0);
	}

	//Peu de pàgina
	function Footer()
	{
	    $dom = ZLanguage::getModuleDomain('IWbooks');
		$llegenda = ModUtil::apiFunc('IWbooks', 'user', 'llistaplans');
		$ample = $this->GetStringWidth($llegenda);

		$this->SetY(-20);
		$this->SetFont('Arial','',6);
		//$this->Cell(0,10,$llegenda);

		//Posici�: a 1,5 cm del final
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//N�mero de p�gina
		$this->Cell(0,10,utf8_decode(__('Page', $dom)).$this->PageNo().'/{nb}'.' - '.utf8_decode(__('Information generated on', $dom)).' '.date("d/m/Y"),0,0,'C');
	}

}

/*
function generapdf($args)
{
	require_once(ModUtil::getVar('IWbooks', 'fpdf').'fpdf.php');

	//    $dir = "modules/IWbooks/tmp/";
	$dir = ModUtil::getVar('IWmain', 'documentRoot')."/".ModUtil::getVar('IWmain', 'tempFolder')."/";
	// Netegem els fitxers temporals amb X segons d'antiguitat
	NetejaFitxers($dir);

	$file = $dir."tmp".date('h'.'m'.'s'.'d').".pdf";

	extract($args);

	$cursacad    = ModUtil::apiFunc('IWbooks', 'user', 'cursacad', array('any' => $any));
	$nivell_abre = ModUtil::apiFunc('IWbooks', 'user', 'reble', array('nivell' => $nivell));

	$items = ModUtil::apiFunc('IWbooks',
                          'user',
                          'getall',
	array('startnum' => $startnum,
                                'any'      => $any,
                                'etapa'    => $etapa,
                                'nivell'   => $nivell,
                                'text'     => $text,
                                'lectura'  => $lectura,
                                'materia'  => $materia,
                                'flag'     => 'user',
                                'numitems' => 1000));

	$pdf=new PDF();
	$pdf->AliasNbPages();
	$pdf->Open();

	// Definir marges: esquerra i superior
	$marge_esq = 16;
	$marge_sup = 20;
	$pdf->SetMargins($marge_esq, $marge_sup);
	//  $pdf->SetMargins(25,20);
	$pdf->AddPage();


	$alt       = ModUtil::getVar('IWbooks', 'mida_font')/2; //5;
	$salt      = ModUtil::getVar('IWbooks', 'mida_font')/2; //5;
	$fita_lect = 0;   // marca de t�tol llibres de lectura
	$fita_opt  = 0;   // marca de t�tol llibres d'optativa
	$fita_mat  = 0;   // marca de t�tol de materisls


	$llis_mat  =  ModUtil::getVar('IWbooks', 'llistar_materials');
	$mida_font =  ModUtil::getVar('IWbooks', 'mida_font');
	$mida_font_tit = $mida_font+1;

	if (count($items) == 0){
		$pdf->Write($alt,__('There aren't books for your selection', $dom));// No hi ha llibres amb l'opció sol·licitada
		$pdf->Output($file);
		System::redirect(ModUtil::func('IWbooks', 'user', 'getFile', array('fileName' => str_replace(ModUtil::getVar('IWmain', 'documentRoot')."/",'',$file))));
		return $file;
	}

	$mostra_pla = ModUtil::apiFunc('IWbooks', 'user', 'descriplans', array('etapa' => $etapa));

	$pdf->SetFont('Arial','B', 14);
	//        "Llistat de llibres"
	$pdf->MultiCell(0,7,utf8_decode(__('List of books · Course', $dom).$cursacad." · ".$nivell_abre." ".$mostra_pla),1,'C',0);

	$pdf->Ln($salt-1);
	$pdf->SetFont('Arial','BU', $mida_font_tit);
	$pdf->Write($alt, __('Textbooks', $dom));
	$pdf->Ln($salt+1);

	foreach ($items as $item) {
		if( $item[lectura] == 1 and $fita_lect != 1){
			$fita_lect = 1;
			$pdf->SetFont('Arial','BU',$mida_font_tit);
			$pdf->Ln($salt-1);
			$pdf->Write($alt, __('Reading Books', $dom));
			$pdf->Ln($salt+1);
		}

		if( $item[optativa] == 1 and $fita_opt != 1){
			$fita_lect = 0;
			$fita_opt  = 1;
			$pdf->SetFont('Arial','BU',12);
			$pdf->Ln($salt+3);
			$pdf->SetFont('Arial','B', $mida_font_tit);
			$pdf->MultiCell(0,$alt+1,__('Optional subjects', $dom),1,'C',0);
			$pdf->Ln(2);
			$pdf->SetFont('Arial','I',$mida_font_tit-1);
			$pdf->Write($alt, utf8_decode("ATENCIÓ: Només per a l'alumnat que triï aquestes matèries"));
			$pdf->SetFont('Arial','BU', $mida_font_tit);
			$pdf->Ln($salt+2);

			if ($item[lectura] == 1){
				$fita_lect = 1;
				$pdf->Write($alt, __('Reading Books', $dom));
				$pdf->Ln($salt+1);
			}else{
				$pdf->Write($alt, __('Textbooks', $dom));
				$pdf->Ln($salt+1);
			}
		}

		if ($item['optativa'] == 1)
		$optativa = _LLIBUSERMARCAOPT ;

		$nommateria = utf8_decode(ModUtil::apiFunc('IWbooks', 'user', 'nommateria', array('codi_mat' => $item['codi_mat'])));

		if ( substr($item['codi_mat'],0, 2) != "AA"){

			$pdf->SetFont('Arial','',$mida_font);

			$pdf->Write($alt, chr(149)." ".$optativa." ".$nommateria." -  ");

			$m_autor = "";
			if ($item[autor] != "")
			$m_autor = utf8_decode($item[autor]).", ";

			$pdf->Write($alt, $m_autor);
			$pdf->SetFont('Arial','I',$mida_font);
			$pdf->Write($alt, utf8_decode($item[titol]));
			$pdf->SetFont('Arial','',$mida_font);
			$m_aval = '';

			if( $item[avaluacio] != "")
			$m_aval = ", (".$item[avaluacio].__('to avaluation', $dom).")";

			$m_publi = "";
			if( $item[any_publi] != "")
			$m_publi = ", ".$item[any_publi];

			$m_isbn = "";
			if($item[isbn] != "")
			$m_isbn = ", (ISBN: ". $item[isbn].")";

			$pdf->Write($alt,", ". utf8_decode($item[editorial]).$m_publi.$m_aval.$m_isbn);


			$m_obs = "";
			if($item[observacions] != "")
			$m_obs = " -- (". utf8_decode($item[observacions]).")";

			$pdf->SetFont('Arial','I',$mida_font);
			$pdf->Write($alt,$m_obs);

			$pdf->Ln($salt);

		}

		// Omplim array amb els materials, per imprimir-los despr�s
		if ( $item[materials] != ""){
			$amaterials[] = array( 'nom_mat'   => $nommateria,
                                    'materials' => $item[materials],
                                    'etapa'     => $item[etapa],
                                    'optativa'  => $optativa);
		}

	}


	// Llistem materials
	foreach($amaterials as $row){
		if ($llis_mat == "1"){
			if( $llis_mat == 1 and $fita_mat != 1){
				$fita_mat = 1;
				$pdf->SetFont('Arial','B',$mida_font_tit);
				$pdf->Ln($salt+2);
				$pdf->MultiCell(0,$alt+1, utf8_decode(__('Materials', $dom)),1,'C',0);
				$pdf->Ln($salt);
			}

			$pdf->SetFont('Arial','B',$mida_font);
			$pdf->Write($alt, chr(149)." ".utf8_decode($row[optativa]." ".$row[nom_mat]));
			$pdf->Ln($salt);
			$pdf->SetFont('Arial','',$mida_font);
			$posicio = $pdf->GetX();
			$pdf->SetX($posicio+8);
			$pdf->Multicell(0,$alt,utf8_decode($row[materials]));
			$pdf->SetX($posicio);
			$pdf->Ln($salt-2);
		}
	}

	$pdf->Output($file);
	$pdf->Output();

	System::redirect(ModUtil::func('IWbooks', 'user', 'getFile', array('fileName' => str_replace(ModUtil::getVar('IWmain', 'documentRoot')."/",'',$file))));

	return $file;
}
*/

// Llistats des d'administració
function generapdfadmin($args)
{
    $dom = ZLanguage::getModuleDomain('IWbooks');
	require_once(ModUtil::getVar('IWbooks', 'fpdf').'fpdf.php');
	
//	print_r($args);
	
	// directori amb fitxers temporals (ha de tenir perm�s d'escriptura))
	       // $dir = "modules/IWbooks/tmp/";
	$dir = ModUtil::getVar('IWmain', 'documentRoot')."/".ModUtil::getVar('IWmain', 'tempFolder')."/";
	$dir = ModUtil::getVar('IWmain', 'documentRoot')."/".ModUtil::getVar('IWmain', 'tempFolder')."/";
	// mida de la lletra llibres
	$mida = 9;

	// Netegem els fitxers temporals amb X segons d'antiguitat
	NetejaFitxers($dir);

	$file = $dir."tmp".date('h'.'m'.'s'.'d').".pdf";

	extract($args);
	$cursacad    = ModUtil::apiFunc('IWbooks', 'user', 'cursacad', array('any' => $any));
	
	if ($materia == 'TOT'){
	    $nommateria = __('All subjects', $dom);
	}else{
	    $nommateria  = ModUtil::apiFunc('IWbooks', 'user', 'nommateria', array('codi_mat' => $materia));    
	}
	
	if ($nivell == ''){
	    $nivell_abre = __('All courses', $dom);
	}else{
	    $nivell_abre = ModUtil::apiFunc('IWbooks', 'user', 'reble', array('nivell' => $nivell));    
	}
	
	if ($etapa == 'TOT'){
	    $mostra_pla = __('All stages', $dom);    
	}else{
	     $mostra_pla = ModUtil::apiFunc('IWbooks', 'user', 'descriplans', array('etapa' => $etapa));   
	}

	if ($materia == "TOT")
	$mostra_codis = 1;

	$items = ModUtil::apiFunc('IWbooks',
                          'user',
                          'getall',
	array('startnum' => $startnum,
                                'any'      => $any,
                                'etapa'    => $etapa,
                                'nivell'   => $nivell,
                                'text'     => $text,
                                'lectura'  => $lectura,
                                'materia'  => $materia,
                                'materials'=> $materials,
                                'observacions' => $observacions,
                                'flag'     => 'admin',
                                'numitems' => 1000));

	$pdf=new PDF();
	$pdf->AliasNbPages();
	$pdf->Open();
	$pdf->SetMargins(25,20);
	$pdf->AddPage();

	//$marge_esq = 40;
	//$marge_sup = 36;
	$alt       = 5;
	$fita      = 0;

	if (count($items) == 0){
		$pdf->Write($alt, utf8_decode(__('There aren\'t books for your selection', $dom)));
		$pdf->Output($file);
		System::redirect(ModUtil::func('IWbooks', 'user', 'getFile', array('fileName' => str_replace(ModUtil::getVar('IWmain', 'documentRoot')."/",'',$file))));
		return $file;
	}
	$pdf->SetFillColor(230,230,230);
	$pdf->SetFont('Arial','B', 14);
	$pdf->MultiCell(0,7,utf8_decode(__('List of books · Course', $dom).$cursacad." · ".$nommateria.', '.$nivell_abre.' - '.$mostra_pla),1,'C',1);

	$pdf->Ln(10);
	$pdf->SetFont('Arial','BU', 12);
	$pdf->Write($alt, utf8_decode(__('Textbooks', $dom)));
	$pdf->Ln(7);

	// $amaterials = array();

	foreach ($items as $item) {
		if( $item[lectura] == 1 and $fita_lect != 1){
			$fita_lect = 1;
			$pdf->SetFont('Arial','BU',12);
			$pdf->Ln(7);
			$pdf->Write($alt, utf8_decode(__('Reading Books', $dom)));
			$pdf->Ln(7);
		}

		if( $item[optativa] == 1 and $fita_opt != 1){
			$fita_lect = 0;
			$fita_opt  = 1;
			$pdf->SetFont('Arial','BU',12);
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B', 14);
			$pdf->MultiCell(0,7,utf8_decode("Matèries optatives"),1,'C',1);
			$pdf->SetFont('Arial','BU',12);
			$pdf->Ln(7);

			if ($item[lectura] == 1){
				$fita_lect = 1;
				$pdf->Write($alt, __('Reading Books', $dom));
				$pdf->Ln(7);
			}else{
				$pdf->Write($alt, __('Textbooks', $dom));
				$pdf->Ln(7);
			}
		}
		if ($item['optativa'] == 1)
		$optativa =  utf8_decode(__('**', $dom)) ;

		$nommateria = utf8_decode(ModUtil::apiFunc('IWbooks', 'user', 'nommateria', array('codi_mat' => $item['codi_mat'])));
		$nivell_abre = ModUtil::apiFunc('IWbooks', 'user', 'reble', array('nivell' => $item['nivell']));
		$pdf->SetFont('Arial','B',$mida);


		//       if ( $item['codi_mat'] != "AAA"){
		if ( substr($item['codi_mat'],0, 2) != "AA"){

			$codis = "";

			if ($mostra_codis == 1)
			$codis = " (".$item['codi_mat'].") ";

			$pdf->Write($alt, utf8_decode(chr(149)." ".$optativa." ".$nivell_abre." ".$item[etapa].$codis." -  "));
			$pdf->SetFont('Arial','',$mida);
			$m_autor = "";
			if ($item[autor] != "")
			$m_autor = utf8_decode($item[autor]).", ";
			$pdf->Write($alt, $m_autor);
			$pdf->SetFont('Arial','I',$mida);
			$pdf->Write($alt, utf8_decode($item[titol]));
			$pdf->SetFont('Arial','',$mida);
			$m_aval = '';
			if( $item[avaluacio] != "")
			$m_aval = ", (".$item[avaluacio]. utf8_decode(__('to avaluation', $dom)).")";
			$m_publi = "";
			if( $item[any_publi] != "")
			$m_publi = ", ".$item[any_publi];
			$m_isbn = "";
			if($item[isbn] != "")
			$m_isbn = ", (ISBN: ". $item[isbn].")";
			$pdf->Write($alt,", ".utf8_decode($item[editorial]).$m_publi.$m_aval.$m_isbn);

			$m_obs = "";

			if($item[observacions] != "")
			$m_obs = " -- (". utf8_decode($item[observacions]).")";

			$pdf->SetFont('Arial','I',$mida_font);
			$pdf->Write($alt,$m_obs);

			$pdf->Ln(6);
		}
			
		if ( $item[materials] != ""){
			$amaterials[] = array( 'nom_mat'   => $nommateria,
                                       'materials' => $item[materials],
                                       'etapa'     => $item[etapa],
                                       'optativa'  => $optativa,
									   'nivell'	   => $item[nivell]);
		}
	}

	$fita_mat = 0;
	$llis_mat = ModUtil::getVar('IWbooks', 'llistar_materials');

	foreach($amaterials as $row){
		if ($llis_mat == "1"){
			if( $llis_mat == 1 and $fita_mat != 1){
				$fita_mat = 1;
				$pdf->SetFont('Arial','B',14);
				$pdf->Ln(7);
				$pdf->MultiCell(0,7, utf8_decode(__('Materials', $dom)),1,'C',1);
				//                    $pdf->Write($alt, __('Materials', $dom));
				$pdf->Ln(7);
			}

			$pdf->SetFont('Arial','B',$mida);
			$nivell_abre = ModUtil::apiFunc('IWbooks', 'user', 'reble', array('nivell' => $row[nivell]));
			$pdf->Write($alt,chr(149)." ".$row[optativa]." ".$nivell_abre." ".$row[etapa]." - ".$row[nom_mat]);
			$pdf->Ln(6);
			$pdf->SetFont('Arial','',$mida);
			$posicio = $pdf->GetX();
			$pdf->SetX($posicio+8);
			$pdf->Multicell(0,$alt,utf8_decode($row[materials]));
			$pdf->SetX($posicio);
			$pdf->Ln(5);
		}
	}


	$pdf->Output($file);

	System::redirect(ModUtil::func('IWbooks', 'user', 'getFile', array('fileName' => str_replace(ModUtil::getVar('IWmain', 'documentRoot')."/",'',$file))));

//    System::redirect($file);
    
	return $file;
}


function NetejaFitxers($dir)
{
	//Esborrar els fitxers temporals
	$t=time();
	$h=opendir($dir);

	while($file=readdir($h))
	{
		if(substr($file,0,3)=='tmp' and substr($file,-4)=='.pdf')
		{
			$path=$dir.'/'.$file;
			if($t-filemtime($path)>120)
			@unlink($path);
		}
	}
	closedir($h);
}


function aSortBySecondIndex($multiArray, $secondIndex) {
	while (list($firstIndex, ) = each($multiArray))
	$indexMap[$firstIndex] = $multiArray[$firstIndex][$secondIndex];
	asort($indexMap);
	while (list($firstIndex, ) = each($indexMap))
	if (is_numeric($firstIndex))
	$sortedArray[] = $multiArray[$firstIndex];
	else $sortedArray[$firstIndex] = $multiArray[$firstIndex];
	return $sortedArray;

}
?>
