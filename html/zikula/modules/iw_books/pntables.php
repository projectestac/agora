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
// Llicència
//
// Aquest programa és de software lliure. Pot redistribuir-lo i/o modificar-lo
// sota els termes de la Llicència Pública General de GNU segons està publicada
// per la Free Software Foundation, bé de la versió 2 de l'esmentada Llicència
// o bé (segons la seva elecció) de qualsevol versió posterior.
//
// Aquest programa es distribueix amb l'esperança que sigui útil, però sense
// cap garantia, fins i tot sense la garantia MERCANTIL implícita o sense
// garantir la conveniència per a un prop�sit particular. Consulti la Llicència
// General de GNU per a més detalls.
//
// Pots trobar la Llicència a http://www.gnu.org/copyleft/gpl.html
// --------------------------------------------------------------------------
// Autor del fitxer original: Jordi Fons (jfons@iespfq.cat)
// --------------------------------------------------------------------------
// Propòsit del fitxer:
//     Definició de les taules en el mòdul llibres
// --------------------------------------------------------------------------


function iw_books_pntables()
{
	// Initialise table array
	$pntable = array();

	$pntable['iw_books'] = DBUtil::getLimitedTablename('iw_books');

	$pntable['iw_books_column'] = array(
   					'tid'          => 'pn_tid',
                    'autor'        => 'pn_autor',
                    'titol'        => 'pn_titol',
                    'editorial'    => 'pn_editorial',
                    'any_publi'    => 'pn_any_publi',
                    'isbn'         => 'pn_isbn',
                    'codi_mat'     => 'pn_codi_mat',
                    'lectura'      => 'pn_lectura',
                    'any'          => 'pn_any',
                    'etapa'        => 'pn_etapa',
                    'nivell'       => 'pn_nivell',
                    'avaluacio'    => 'pn_avaluacio',
                    'optativa'     => 'pn_optativa',
					'observacions' => 'pn_observacions',
                    'materials'    => 'pn_materials'
    );

    $pntable['iw_books_column_def'] = array (
    		'tid'           => "INT(9) NOTNULL AUTOINCREMENT KEY",
            'autor'			=> "VARCHAR(50) NOT NULL DEFAULT ''",
            'titol'	 		=> "VARCHAR(50) NOT NULL DEFAULT ''",
            'editorial' 	=> "VARCHAR(50) NOT NULL DEFAULT ''",
            'any_publi'		=> "VARCHAR(4)  NOT NULL DEFAULT ''",
            'isbn' 			=> "VARCHAR(20) NOT NULL DEFAULT ''",           
            'codi_mat'		=> "VARCHAR(3)  NOT NULL DEFAULT ''",
            'lectura' 		=> "TINYINT(1)  NOT NULL DEFAULT 0",
            'any' 			=> "VARCHAR(4)  NOT NULL DEFAULT ''",
            'etapa' 		=> "VARCHAR(32) NOT NULL DEFAULT ''",           
            'nivell' 		=> "CHAR(15) NOT NULL DEFAULT ''",
            'avaluacio' 	=> "CHAR(1) NOT NULL DEFAULT ''",
            'optativa'		=> "TINYINT(1)  NOT NULL DEFAULT 0",
            'observacions' 	=> "VARCHAR(100) NOT NULL DEFAULT ''",
            'materials' 	=> "TEXT NOT NULL"
            );
             
    $pntable['iw_books_column_idx'] = array('tid' => 'tid');

    ObjectUtil::addStandardFieldsToTableDefinition($pntable['iw_books_column'], 'pn_');
    ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_books_column_def'], 'pn_');


	$pntable['iw_books_materies'] = DBUtil::getLimitedTablename('iw_books_materies');
    $pntable['iw_books_materies_column'] = array(
    			'tid'      => 'pn_tid',
                'codi_mat' => 'pn_codi_mat',
                'materia'  => 'pn_materia'
                );

	$pntable['iw_books_materies_column_def'] = array (
            'tid'	   => "INT(9) NOT NULL AUTOINCREMENT KEY",
            'codi_mat' => "VARCHAR(3) NOT NULL default ''",
            'materia'  => "VARCHAR(50) NOT NULL default ''"
            );

	ObjectUtil::addStandardFieldsToTableDefinition($pntable['iw_books_materies_column'], 'pn_');
	ObjectUtil::addStandardFieldsToTableDataDefinition($pntable['iw_books_materies_column_def'], 'pn_');


    return $pntable;

}

?>
