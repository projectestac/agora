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
//      Funcions d'inicialitzaci� de taules del mòdul llibres
// --------------------------------------------------------------------------

/**
 * initialise the llibres module
 * This function is only ever called once during the lifetime of a particular
 * module instance
 */
function iw_books_init()
{

	if (!DBUtil :: createTable('iw_books')) {
		return false;
	}

	if (!DBUtil :: createTable('iw_books_materies')) {
		return false;
	}

	pnModSetVar('iw_books', 'itemsperpage', 10);
	pnModSetVar('iw_books', 'fpdf', 'modules/iw_books/fpdf153/');

	if (date('m') > '5') {
		$cursacademic=date('Y');
	}else{
		$cursacademic=date('Y')-1;
	}
	pnModSetVar('iw_books', 'any', $cursacademic);
	pnModSetVar('iw_books', 'encap', '');
	pnModSetVar('iw_books', 'plans', '
PRI#Educació Primària|
ESO#Educació Secundària Obligatòria|
BTE#Batxillerat Tecnològic|
BSO#Batxillerat Social|
BHU#Batxillerat Humanístic|
BCI#Batxillerat Científic|
BAR#Batxillerat Artístic');
	pnModSetVar('iw_books', 'darrer_nivell', '4');
	pnModSetVar('iw_books', 'nivells', '
1#1r|
2#2n|
3#3r|
4#4t|
5#5è|
6#6è|
A#P3|
B#P4|
C#P5');
	pnModSetVar('iw_books', 'llistar_materials', '1');
	pnModSetVar('iw_books', 'mida_font', '11');
	pnModSetVar('iw_books', 'marca_aigua', '0');
	// Inicialitzat amb �xit
	return true;
}

function iw_books_upgrade($oldversion)
{
    $dom = ZLanguage::getModuleDomain('iw_books');
	switch($oldversion) {
		case 0.8:
			$dbconn =& pnDBGetConn(true);
			$pntable =& pnDBGetTables();

			$llibrestable  = $pntable['llibres'];
			$llibrescolumn = &$pntable['llibres_column'];

			$sql = "ALTER TABLE $llibrestable
                    CHANGE $llibrescolumn[etapa] $llibrescolumn[etapa] varchar(32) NOT NULL default ''";
			$dbconn->Execute($sql);

			$sql = "ALTER TABLE $llibrestable
                    DROP pn_tipus";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', __('Failed to update the tables', $dom));
				return false;
			}
			pnModSetVar('iw_books', 'plans', '
PRI#Educació Primària|
ESO#Educació Secundària Obligatòria|
BTE#Batxillerat Tecnològic|
BSO#Batxillerat Social|
BHU#Batxillerat Humanístic|
BCI#Batxillerat Científic|
BAR#Batxillerat Artístic');

			pnModSetVar('iw_books', 'darrer_nivell', '4');
			return iw_books_upgrade(0.9);

		case 0.9:
			// Codi per a versió 1.0
			$dbconn =& pnDBGetConn(true);
			$pntable =& pnDBGetTables();

			$llibrestable  = $pntable['llibres'];
			$llibrescolumn = &$pntable['llibres_column'];

			$sql = "ALTER TABLE $llibrestable
                    ADD pn_observacions varchar(100) NOT NULL,
                    ADD pn_materials text NOT NULL";
			$dbconn->Execute($sql);

			if ($dbconn->ErrorNo() != 0) {
				pnSessionSetVar('errormsg', $llibrestable.$oldversion.__('Failed to update the tables', $dom));
				return false;
			}

			pnModSetVar('iw_books', 'llistar_materials', '1');
			pnModSetVar('iw_books', 'mida_font', '11');
			pnModSetVar('iw_books', 'marca_aigua', '0');

			return iw_books_upgrade(1.0);

		case 1.0:
			// Codi per a versió 2.0
			pnModDelVar('iw_books', 'darrer_nivell');
			pnModSetVar('iw_books', 'nivells', '
1#1r|
2#2n|
3#3r|
4#4t|
5#5è|
6#6è|
A#P3|
B#P4|
C#P5');
			$dbconn =& pnDBGetConn(true);
			$pntable =& pnDBGetTables();
			$prefix = $GLOBALS[PNConfig][System][prefix];
			$sql = 'ALTER TABLE '.$prefix.'_iw_books_llibres
					RENAME TO '.$pntable['iw_books'];
			$dbconn->Execute($sql);
			
			if (!DBUtil::changeTable('iw_books')) { return false; }
			if (!DBUtil::changeTable('iw_books_materies')) { return false; }
			
			return iw_books_upgrade(2.0);
				
			break;
	}

	// Actualització amb èxit
	return true;
}


/**
 * Esborrar el mòdul iw_books
 */
function iw_books_delete()
{
    // Delete tables
    DBUtil::dropTable('iw_books');
	DBUtil::dropTable('iw_books_materies');

	// Esborrar les variables del mòdul
	pnModDelVar('iw_books', 'itemsperpage');
	pnModDelVar('iw_books', 'fpdf');
	pnModDelVar('iw_books', 'any');
	pnModDelVar('iw_books', 'encap');
	pnModDelVar('iw_books', 'plans');
	pnModDelVar('iw_books', 'darrer_nivell');
	pnModDelVar('iw_books', 'nivells');
	pnModDelVar('iw_books', 'llistar_materials');
	pnModDelVar('iw_books', 'mida_font');
	pnModDelVar('iw_books', 'marca_aigua');
	// Acció d'esborrar acabada amb èxit
	return true;
}

?>
