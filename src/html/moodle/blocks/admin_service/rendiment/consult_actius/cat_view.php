<?php
/*
 * Created on 30/10/2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 // $Id: index.php,v 1.1 2003/09/30 02:45:19 moodler Exp $

/// This page lists all the instances of NEWMODULE in a particular course
/// Replace NEWMODULE with the name of your module

    include_once "../../lib.php";
    
	require_login();
    if (!isadmin()) {
    	print_error('chooseenv','block_admin_service');
    }
    

	$entorn = optional_param('entorn');
	if($entorn){
		if(!preparar_entorn($entorn)){
    		print_error('noconfenv','block_admin_service');   
    	}
    }else{
    	print_error('chooseenv','block_admin_service');
    }

    //$indform = optional_param('indform');
    //$total = optional_param('total');
    $dial = optional_param('dial');
    $mesl = optional_param('mesl');
    $anyl = optional_param('anyl', 2006);
    $dataini = optional_param('dataini');
    $datafin = optional_param('datafin');
    $count = optional_param('count');
    
    
	print_simple_box_start( 'center', '90%', '', '20');
	echo '<B><CENTER>De: '.date("Y/m/d-G:i", $dataini).' A: '.date("Y/m/d-G:i", $datafin).'</CENTER></B><BR/>';
    echo '<B><CENTER>Total: '.$count.'</CENTER></B>';	
	echo '<br />';
	
	
	if(generic_connect()){
		$prefix = generic_prefix();
		$results = array();
		$query2= "SELECT course, count(*) FROM {$prefix}log WHERE time BETWEEN $dataini AND $datafin GROUP BY course";
		$consulta = generic_query($query2);
		while($usuari = generic_fetch($consulta)){
			$results[]=$usuari;							
		}

		$categorias = array();
		$i =1;
		$i2 =1;
		//print_object($results);
		foreach ($results as $res){
			unset($info);
			
			//aixo també ha de ser genèric
			$query3 = "SELECT * FROM {$prefix}course_upc WHERE id_course={$res->course}";
			$info = generic_query_fetch ($query3);
			
			//$info = get_record('course_upc', 'id_course', $res->course); 
			//Hem de buscar la categoria
			if(!$info){
				continue;
			}
			//print_object($info);
			//echo 'la i:'.$i.'ile curso'.$res->course;
			//echo '<br/>';
			$i++;
			$cat_name = $info->anyacad.'-'.$info->quatrimestre;
			//$q= "SELECT COUNT(*) as times FROM {$CFG->prefix}log WHERE time BETWEEN $dataini AND $datafin AND course = $res->course ";
			$q= "SELECT COUNT(*) FROM (SELECT userid FROM {$prefix}log WHERE time BETWEEN $dataini AND $datafin AND course = $res->course GROUP BY userid) as num ";
			//echo $q;
			//$alum= get_record_sql($q);
			
			$alum = generic_query_fetch($q);
			
			//print_object($alum);
			if (!isset($categorias[$info->centre])){
				//echo '1';
				//$i2++;
				$tupla->cat=array();
				$categorias[$info->centre]= $tupla;
				$categorias[$info->centre]->cat[$cat_name]=$alum->count;
			}else{
				if(!isset($categorias[$info->centre]->cat[$cat_name])){
				//echo '2';
				//$i2++;
					$tupla->cat=array();
					$categorias[$info->centre]->cat[$cat_name]=$alum->count;
				}else{
					//echo '3';
					//$i2++;
					//estan seleccionados todos
					$categorias[$info->centre]->cat[$cat_name]+= $alum->count;
				}
			}
		}
	
	
	
	
	
		//echo 'la i:'.$i.' la i2:'.$i2;	
		//print_object($categorias);
		//unset($categorias['-']);
		ksort($categorias);
		//print_object($categorias);
		foreach ($categorias as $camp_id=>$camp) {
			
			//$link = '<a href="'.$CFG->wwwroot.'_adm/rendiment/consult_activ/view.php?id=1&option=print_cat&dial='.$indform['dia'].'&mesl='.$indform['mes'].'&anyl='.$indform['any'].'&dataini='.$dataini.'&datafin='.$datafin.'&cat='.$cat_id.'">'.$cat_id.'</a>';
			//Principal Total.
			//$row2 = array ('<B>'.$camp_id.'</B>', '<B></B>');
			//$rows2[]=$row2;
			foreach ($camp->cat as $ind2 => $cat) {
				
				if($ind2 == '-'){
					//echo 'pillados';
					$ind2 = 'Sin Categoria';
				}
				$row2 = array ($camp_id,$ind2, $cat);
				$rows2[]=$row2;
			}
		}
	
	}else
		echo 'problemes de connexio';
	
	$table->head = array (get_string('campus','block_admin_service'),get_string('categoria','block_admin_service'), get_string('num_rows','block_admin_service'));
	$table->wrap = array ('nowrap','nowrap','nowrap',);
	$table->align = array ('center','center','center');
	$table->width = '80%';
	$table->data = $rows2;
	print_table($table);
	
	print_simple_box_end();		
	
/// Finish the page

   // print_footer($course);

	 
 
 
?>
