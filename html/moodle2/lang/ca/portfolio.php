<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'portfolio', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   portfolio
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activeexport'] = 'Resoldre les exportacions actives';
$string['activeportfolios'] = 'Portafolis disponibles';
$string['addalltoportfolio'] = 'Exporta tot al portafolis';
$string['addnewportfolio'] = 'Afegeix un nou portafolis';
$string['addtoportfolio'] = 'Exporta al portafolis';
$string['alreadyalt'] = 'S\'està exportant - si us plau, premeu aquí per resoldre aquesta transferència';
$string['alreadyexporting'] = 'Disposeu d\'una exportació de portafolis activa per aquesta sessió. Abans de continuar, heu de completar-la, o cancel·lar-la. Voleu continuar? (No es cancel·larà)';
$string['availableformats'] = 'Formats d\'exportació disponibles';
$string['callbackclassinvalid'] = 'La classe callback especificada no era vàlida o no pertany a la jerarquia del portfolio_caller';
$string['callercouldnotpackage'] = 'No s\'ha pogut generar el paquet de dades per exportar: l\'error original ha estat {$a}';
$string['cannotsetvisible'] = 'No es pot establir això a visible - el connector ha estat desactivat completament a causa d\'una mala configuració';
$string['commonportfoliosettings'] = 'Arranjaments comuns del portafolis';
$string['commonsettingsdesc'] = '<p>Quan una transferència es considera que pot implicar una quantitat \'Moderada\' o \'Alta\' de canvis, l\'usuari pot decidir si espera que es completi o no.</ p><p>El límit proper a \'Moderat\' vol dir que s\'executarà immediatament sense consultar l\'usuari, \'Moderat\' i \'Alt\' significa que s\'oferirà l\'opció informant l\'usuari de que pot trigar algun temps.</p><p>A més, alguns connectors del portfoli poden ignorar aquesta opció i enviar a la cua totes les tranferències.</p>';
$string['configexport'] = 'Configura les dades exportades';
$string['configplugin'] = 'Configura el connector del portafolis';
$string['configure'] = 'Configura';
$string['confirmcancel'] = 'Esteu segur que voleu cancel·lar aquesta exportació?';
$string['confirmexport'] = 'Si us plau, confirmeu aquesta exportació';
$string['confirmsummary'] = 'Resum de la vostra exportació';
$string['continuetoportfolio'] = 'Continueu al vostre poratfolis';
$string['deleteportfolio'] = 'Suprimeix la instància del portafolis';
$string['destination'] = 'Destí';
$string['disabled'] = 'L\'exportació del portafolis no és habilitada en aquest lloc';
$string['disabledinstance'] = 'Inhabilitat';
$string['displayarea'] = 'Àrea d\'exportació';
$string['displayexpiry'] = 'El tems de transferència s\'ha esgotat';
$string['displayinfo'] = 'Informació d\'exportació';
$string['dontwait'] = 'No esperis';
$string['enabled'] = 'Habilita els portafolis';
$string['enableddesc'] = 'Això permet els administradors configurar serveis remots pels usuaris per exportar el contingut';
$string['err_uniquename'] = 'El nom del portafolis ha de ser únic (per connector)';
$string['exportalreadyfinished'] = 'S\'ha completat l\'exportació del portafolis';
$string['exportalreadyfinisheddesc'] = 'S\'ha completat l\'exportació del portafolis';
$string['exportcomplete'] = 'S\'ha completat l\'exportació del portafolis';
$string['exportedpreviously'] = 'Exportacions anteriors';
$string['exportexceptionnoexporter'] = 'S\'ha produït una portfolio_export_exception en una sessió activa però sense cap objecte exporter';
$string['exportexpired'] = 'L\'exportació del portafolis ha vençut';
$string['exportexpireddesc'] = 'Heu intentat de repetir l\'exportació de certa informació, o iniciar una exportació buida. Per fer-ho correctament cal anar de nou a la ubicació original i tornar a començar. De vegades, això passa si s\'utilitza el botó de darrere després de completar una exportació o per una URL invàlida a la llista d\'adreces d\'interès.';
$string['exporting'] = 'Exportant al portafolis';
$string['exportingcontentfrom'] = 'Exportant el contingut de {$a}';
$string['exportingcontentto'] = 'Exportant el contingut a {$a}';
$string['exportqueued'] = 'L\'exportació del portafolis s\'ha enviat a la cua de transferència amb èxit';
$string['exportqueuedforced'] = 'L\'exportació del portafolis s\'ha enviat a la cua de transferència amb èxit (el sistema remot ha enviat a la cua les tranferències)';
$string['failedtopackage'] = 'No he pogut trobar fitxers per empaquetar';
$string['failedtosendpackage'] = 'És impossible enviar les vostres dades al sistema de portafolis seleccionat: l\'error original ha estat {$a}';
$string['filedenied'] = 'Accés denegat per aquest fitxer';
$string['filenotfound'] = 'No s\'ha trobat el fitxer';
$string['fileoutputnotsupported'] = 'La reescriptura del fitxer de sortida no està suportada per aquest format';
$string['format_document'] = 'Document';
$string['format_file'] = 'Fitxer';
$string['format_image'] = 'Imatge';
$string['format_leap2a'] = 'Format de portafolis Leap2A';
$string['format_mbkp'] = 'Format de còpia de seguretat de Moodle';
$string['format_pdf'] = 'PDF';
$string['format_plainhtml'] = 'HTML';
$string['format_presentation'] = 'Presentació';
$string['format_richhtml'] = 'HTML amb adjunts';
$string['format_spreadsheet'] = 'Full de càlcul';
$string['format_text'] = 'Text pla';
$string['format_video'] = 'Vídeo';
$string['hidden'] = 'Ocult';
$string['highdbsizethreshold'] = 'La mida de la base de dades implica una transferència alta';
$string['highdbsizethresholddesc'] = 'Nombre de registres amb els que es calcularà la quantitat de temps de la transferència';
$string['highfilesizethreshold'] = 'La mida del fitxer implica una transferència alta';
$string['highfilesizethresholddesc'] = 'Les mides dels fitxers per sobre d\'aquest límit impliquen un alt temps de transferència';
$string['insanebody'] = 'Esteu rebent aquest missatge com administrador de {$a->sitename}.

Algunes instàncies dels connectors de portafolis han estat automàticament deshabilitades degut a males configuracions. Això significa que els usuaris no poden actualment exportar el contingut d\'aquests portafolis.

La llista dels connectors de portafolis que han estat deshabilitats és:

{$a->textlist}

Això s\'hauria de corregir el més aviat possible, visiteu {$a->fixurl}.';
$string['insanebodyhtml'] = '<p>Esteu rebent aquest missatge com administrador de {$a->sitename}.</p><p>Algunes instàncies dels connectors de portafolis han estat automàticament deshabilitades degut a males configuracions. Això significa que els usuaris no poden actualment exportar el contingut d\'aquests portafolis.</p><p>La llista dels connectors de portafolis que han estat deshabilitats és:</p>
{$a->htmllist}
<p>Això s\'hauria de corregir el més aviat possible, visiteu <a href="{$a->fixurl}"> les pàgines de configuració del portfoli</a></p>';
$string['insanebodysmall'] = 'Esteu rebent aquest missatge com administrador de {$a->sitename}. Algunes instàncies dels connectors de portafolis han estat automàticament deshabilitades degut a males configuracions. Això significa que els usuaris no poden actualment exportar el contingut d\'aquests portafolis. Això s\'hauria de corregir el més aviat possible, visiteu {$a->fixurl}.';
$string['insanesubject'] = 'S\'han deshabilitat automàticament algunes instàncies de portafolis';
$string['instancedeleted'] = 'S\'ha suprimit el portafolis amb èxit';
$string['instanceismisconfigured'] = 'La instància del portafolis està mal configurada, ometent. L\'error ha estat: {$a}';
$string['instancenotdelete'] = 'No s\'ha pogut suprimir el portafolis';
$string['instancenotsaved'] = 'No s\'ha pogut desar el portafolis';
$string['instancesaved'] = 'Portafolis desat amb èxit';
$string['invalidaddformat'] = 'No és vàlid el format per afegir passat al portfolio_add_button. ({$a}) Ha de ser PORTFOLIO_ADD_XXX';
$string['invalidbuttonproperty'] = 'No s\'ha pogut trobar la propietat ({$a}) de portfolio_button';
$string['invalidconfigproperty'] = 'No s\'ha pogut trobar la propietat de configuració ({$a->property}) de {$a->class})';
$string['invalidexportproperty'] = 'No s\'ha pogut trobar la propietat d\'exportació ({$a->property}) de {$a->class})';
$string['invalidfileareaargs'] = 'No són vàlids els arguments de l\'àrea de fitxers passat a set_file_and_format_data - ha de contenir el número ID del context, el component, l\'àrea de fitxers i el número ID de l\'element';
$string['invalidformat'] = 'Alguna cosa s\'està exportant en un format no vàlid, {$a}';
$string['invalidinstance'] = 'No s\'ha pogut tronat la instància del portafolis';
$string['invalidpreparepackagefile'] = 'No és vàlida la crida a prepare_package_file - s\'ha d\'establir un o múltiples fitxers';
$string['invalidproperty'] = 'No s\'ha pogut trobar la propietat ({$a->property}) de {$a->class})';
$string['invalidsha1file'] = 'No és vàlida la crida a get_sha1_file - s\'ha d\'establir un o múltiples fitxers';
$string['invalidtempid'] = 'No és vàlid el número ID de l\'exportació. Potser ha vençut';
$string['invaliduserproperty'] = 'No s\'ha pogut trobar la propietat de configuració d\'usuari ({$a->property}) de {$a->class})';
$string['leap2a_emptyselection'] = 'No s\'ha seleccionar un valor necessari';
$string['leap2a_entryalreadyexists'] = 'Heu provat d\'afegir una entrada Leap2A amb un número ID ({$a}) que ja existeix';
$string['leap2a_feedtitle'] = 'Exportació Leap2A de Moodle per {$a}';
$string['leap2a_filecontent'] = 'S\'ha tractat d\'establir el contingut d\'una entrada de Leap2A a un fitxer, enlloc d\'utilitzar la subclasse fitxer';
$string['leap2a_invalidentryfield'] = 'Heu tractat d\'establir un camp d\'entrada que no existia ({$a}) o que vós no podeu establir directament';
$string['leap2a_invalidentryid'] = 'Heu tractat d\'accedir a una entrada amb un número ID que no existia ({$a})';
$string['leap2a_missingfield'] = 'Camp d\'entrada Leap2A necessari {$a} desconegut';
$string['leap2a_nonexistantlink'] = 'Una entrada Leap2A ({$a->from}) ha provat d\'enllaçar una entrada inexistent ({$a->to}) amb rel {$a->rel}';
$string['leap2a_overwritingselection'] = 'Sobreescrivint el tious d\'entrada original ({$a}) a la selecció en make_selection';
$string['leap2a_selflink'] = 'Una entrada Leap2A ({$a->id}) ha provat d\'enllaçar-se si mateixa amb rel {$a->rel}';
$string['logs'] = 'Registres de transferències';
$string['logsummary'] = 'Transferències anteriors amb èxit';
$string['manageportfolios'] = 'Gestiona portafolis';
$string['manageyourportfolios'] = 'Gestioneu els vostres portafolis';
$string['mimecheckfail'] = 'El connector de portafolis {$a->plugin} no suporta aquest mimetype {$a->mimetype}';
$string['missingcallbackarg'] = 'S\'ha perdut l\'argument de la crida de retorn {$a->arg} per la classe {$a->class}';
$string['moderatedbsizethreshold'] = 'Mida de base de dades de transferència moderada';
$string['moderatedbsizethresholddesc'] = 'Nombre de registres de la base de dades a partir dels quals es considera que prenen un temps moderat de transferència';
$string['moderatefilesizethreshold'] = 'Mida de fitxer de transferència moderada';
$string['moderatefilesizethresholddesc'] = 'Mida del fitxer per damunt d\'aquest llindar es considera que prenen un temps moderat de transferència';
$string['multipleinstancesdisallowed'] = 'S\'està intentant crear una altra instància del connector que ha rebutjat múltiples instàncies ({$a})';
$string['mustsetcallbackoptions'] = 'Cal que configureu les retrocridades ja sigui al constructor portfolio_add_button o utilitzant el mètode set_callback_options';
$string['noavailableplugins'] = 'Perdoneu però no hi ha disponibles portafolis per exportar';
$string['nocallbackclass'] = 'No es troba la classe de la crida de retorn a utilitzar ({$a})';
$string['nocallbackfile'] = 'Alguna cosa en el mòdul que esteu tractant d\'exportar està trencada - no s\'ha trobat el fitxer que cal ({$a})';
$string['noclassbeforeformats'] = 'Us cal configurar la classe de la crida de retorn abans de cridar set_formats al portfolio_button';
$string['nocommonformats'] = 'No hi ha formats comuns entre el connector de portafolis disponible i la crida lloc {$a->location} (formats compatibles {$a->formats})';
$string['noinstanceyet'] = 'No han estat seleccionats';
$string['nologs'] = 'No hi ha registres per mostrar!';
$string['nomultipleexports'] = 'Perdoneu però el portafolis de destinació ({$a->plugin}) no funciona amb exportacions múltiples simultànies. Si us plau <a href="{$a->link}">acabeu primer l\'actual</a> i torneu-ho a intentar.';
$string['nonprimative'] = 'Un valor no simple ha sigut passat com argument d\'una crida de retorn al portfolio_add_button. S\'esta rebutjant continuar. La clau ha estat {$a->key} i el valor ha estat {$a->value}';
$string['nopermissions'] = 'Perdoneu però no teniu permisos per exportar fitxers des d\'aquesta zona.';
$string['notexportable'] = 'Perdoneu però el tipus de document que voleu exportar no és exportable.';
$string['notimplemented'] = 'Perdoneu però esteu intentant exportar contingut en un format que no està implementat ({$a})';
$string['notyours'] = 'Esteu tractant de reprendre una exportació de portafolis que no us pertany!';
$string['off'] = 'Habilitat i ocult';
$string['on'] = 'Habilitat i visible';
$string['plugin'] = 'Connector de portafolis';
$string['plugincouldnotpackage'] = 'Ha hagut un error a l\'empaquetar les vostres dades per exportar-les: L\'error original ha estat {$a}';
$string['pluginismisconfigured'] = 'El connector de portafolis està mal configurat, s\'està ometent. L\'error ha estat: {$a}';
$string['portfolio'] = 'Portafolis';
$string['portfolios'] = 'Portafolis';
$string['queuesummary'] = 'Transferències actuals a la cua';
$string['returntowhereyouwere'] = 'Retorneu on hi era';
$string['save'] = 'Desa';
$string['selectedformat'] = 'Trieu el format d\'exportació';
$string['selectedwait'] = 'Triat per esperar?';
$string['selectplugin'] = 'Trieu una destinació';
$string['singleinstancenomultiallowed'] = 'Sols una instància del connector de portafolis està disponible, no es suporten múltiples exportacions per a cada sessió, i ja hi ha una exportació activa en la sessió d\'ús d\'aquest connector!';
$string['somepluginsdisabled'] = 'Alguns connectors de portafolis han sigut deshabilitats completament per estar mal configurats o per aquest altre motiu:';
$string['sure'] = 'Esteu completament segurs de voler suprimir \'{$a}\'? Aquesta acció no es podrà desfer.';
$string['thirdpartyexception'] = 'Una excepció d\'una tercera part ha sigut llançada durant l\'exportació de portafolis ({$a}). Capturada i tornada a generar, però aquesta hauria de d\'estar fixada.';
$string['transfertime'] = 'Temps de transferència';
$string['unknownplugin'] = 'Desconegut (pot haver estar suprimit per l\'administrador)';
$string['wait'] = 'Espereu';
$string['wanttowait_high'] = 'No es recomana que espereu fins que aquesta transferència es completi, però podeu fer-ho si esteu segur i sabeu el que esteu fent';
$string['wanttowait_moderate'] = 'Voleu esperar per a aquesta transferència? Pot trigar uns minuts';
