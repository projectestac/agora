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
 * Strings for component 'backup', language 'ca', branch 'MOODLE_23_STABLE'
 *
 * @package   backup
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autoactivedescription'] = 'Escolliu si voleu fer o no còpies de seguretat automàtiques. Si escolliu \'manual\' aleshores les còpies de seguretat automàtiques només podran fer-se a través de l\'script CLI de còpies de seguretat automàtiques. aquest es pot executar bé manualment al terminal o bé a través del cron.';
$string['autoactivedisabled'] = 'Deshabilitat';
$string['autoactiveenabled'] = 'Habilitat';
$string['autoactivemanual'] = 'Manual';
$string['automatedbackupschedule'] = 'Planificació';
$string['automatedbackupschedulehelp'] = 'Trieu els dies de la setmana en què cal realitzar les còpies de seguretat automàtiques.';
$string['automatedbackupsinactive'] = 'Els administradors del lloc no han habilitat les còpies de seguretat programades';
$string['automatedbackupstatus'] = 'Estat de la còpia de seguretat programada';
$string['automatedsettings'] = 'Paràmetres de la còpia de seguretat programada';
$string['automatedsetup'] = 'Arranjament de la còpia de seguretat programada';
$string['automatedstorage'] = 'Emmagatematge de la còpia de seguretat programada';
$string['automatedstoragehelp'] = 'Escolliu la ubicació on voleu que es desin les còpies de seguretat quan es creïn automàticament.';
$string['backupactivity'] = 'Activitat a copiar: {$a}';
$string['backupcourse'] = 'Curs a copiar: {$a}';
$string['backupcoursedetails'] = 'Detalls del curs';
$string['backupcoursesection'] = 'Secció: {$a}';
$string['backupcoursesections'] = 'Seccions del curs';
$string['backupdate'] = 'Data de realització';
$string['backupdetails'] = 'Detalls de la còpia';
$string['backupdetailsnonstandardinfo'] = 'El fitxer seleccionat no és un fitxer de còpia de seguretat estàndard de Moodle. El procés de restauració mirarà de convertir el vostre fitxer de còpia de seguretat al format estàndard i després restaurar-lo.';
$string['backupformat'] = 'Format';
$string['backupformatimscc1'] = 'IMS Common Cartridge 1.0';
$string['backupformatimscc11'] = 'IMS Common Cartridge 1.1';
$string['backupformatmoodle1'] = 'Moodle 1';
$string['backupformatmoodle2'] = 'Moodle 2';
$string['backupformatunknown'] = 'Format desconegut';
$string['backupmode'] = 'Mode';
$string['backupmode10'] = 'General';
$string['backupmode20'] = 'Importeu';
$string['backupmode30'] = 'Concentrador';
$string['backupmode40'] = 'Mateix lloc';
$string['backupmode50'] = 'Automatitzat';
$string['backupmode60'] = 'Convertit';
$string['backupsection'] = 'Secció de curs a copiar: {$a}';
$string['backupsettings'] = 'Paràmetres de la còpia de seguretat';
$string['backupsitedetails'] = 'Detalls del lloc';
$string['backupstage16action'] = 'Continua';
$string['backupstage1action'] = 'Següent';
$string['backupstage2action'] = 'Següent';
$string['backupstage4action'] = 'Fes la còpia';
$string['backupstage8action'] = 'Continua';
$string['backuptype'] = 'Tipus';
$string['backuptypeactivity'] = 'Activitat';
$string['backuptypecourse'] = 'Curs';
$string['backuptypesection'] = 'Secció';
$string['backupversion'] = 'Versió de la còpia de seguretat';
$string['cannotfindassignablerole'] = 'El rol {$a} del fitxer de còpia no es pot fer correspondre amb cap dels rols que us és permès d\'assignar.';
$string['choosefilefromactivitybackup'] = 'Àrea de còpies de seguretat d\'activitats';
$string['choosefilefromactivitybackup_help'] = 'Quan es fan còpies de seguretat d\'activitats utilitzant els paràmetres per omissió, els fitxers de còpia es desaran aquí';
$string['choosefilefromautomatedbackup'] = 'Còpies de seguretat automàtiques.';
$string['choosefilefromautomatedbackup_help'] = 'Conté còpies de seguretat generades automàticament.';
$string['choosefilefromcoursebackup'] = 'Àrea de còpies de seguretat de cursos';
$string['choosefilefromcoursebackup_help'] = 'Quan es fan còpies de seguretat de cursos utilitzant els paràmetres per omissió, els fitxers de còpia es desaran aquí';
$string['choosefilefromuserbackup'] = 'Àrea privada de còpies de seguretat de l\'usuari';
$string['choosefilefromuserbackup_help'] = 'Quan es facin còpies de seguretat de cursos amb l\'opció "Anonimitza la informació de l\'usuari" marcada, els fitxers de còpia de seguretat es desaran aquí';
$string['configgeneralactivities'] = 'Estableix l\'omissió per incloure activitats en una còpia de seguretat.';
$string['configgeneralanonymize'] = 'Si està habilitat, tota la informació pertanyent als usuaris serà anonimitzada per omissió.';
$string['configgeneralblocks'] = 'Estableix l\'omissió per incloure blocs en una còpia de seguretat.';
$string['configgeneralcomments'] = 'Estableix l\'omissió per incloure comentaris en una còpia de seguretat.';
$string['configgeneralfilters'] = 'Estableix l\'omissió per incloure filtres en una còpia de seguretat.';
$string['configgeneralhistories'] = 'Estableix l\'omissió per incloure la història de l\'usuari en una còpia de seguretat.';
$string['configgenerallogs'] = 'Si està habilitat, s\'inclouran per omissió els registres dins de la còpia de seguretat.';
$string['configgeneralroleassignments'] = 'Si està habilitat, s\'inclouran per omissió les assignacions de rols dins de la còpia de seguretat.';
$string['configgeneralusers'] = 'Estableix l\'omissió per incloure els usuaris en una còpia de seguretat.';
$string['configgeneraluserscompletion'] = 'Si està habilitat, s\'inclourà per omissió la informació de progrés de l\'usuari dins de la còpia de seguretat.';
$string['configloglifetime'] = 'Especifica el temps que es conservarà una còpia de seguretat de la informació del registre. La informació més antiga s\'esborrarà automàticament. Es recomana que aquest valor sigui petit perquè la còpia de seguretat pot ser molt gran.';
$string['confirmcancel'] = 'Cancel·la la còpia';
$string['confirmcancelno'] = 'Roman';
$string['confirmcancelquestion'] = 'Segur que voleu cancel·lar?
Qualsevol informació que hàgiu introduït es perdrà.';
$string['confirmcancelyes'] = 'Cancel·la';
$string['confirmnewcoursecontinue'] = 'Nou advertiment de curs';
$string['confirmnewcoursecontinuequestion'] = 'Durant el procés de restauració del curs, es crearà un curs temporal (amagat). Per cancel·lar el procés de restauració, feu clic a \'Cancel·la\'. No tanqueu el navegador mentre es fa la restauració.';
$string['coursecategory'] = 'Categoria en què es restaurarà el curs';
$string['courseid'] = 'ID original';
$string['coursesettings'] = 'Paràmetres del curs';
$string['coursetitle'] = 'Títol';
$string['currentstage1'] = 'Paràmetres inicials';
$string['currentstage16'] = 'Completat';
$string['currentstage2'] = 'Paràmetres de l\'esquema';
$string['currentstage4'] = 'Confirmació i revisió';
$string['currentstage8'] = 'Fes la còpia';
$string['dependenciesenforced'] = 'El vostre arranjament s\'ha hagut d\'alterar a causa de dependències insatisfetes';
$string['enterasearch'] = 'Introduïu una cerca';
$string['error_block_for_module_not_found'] = 'S\'ha trobat una instància de bloc òrfena (id: {$a->bid}) per al curs (id: {$a->mid}). Aquest bloc no és copiarà a la copia de seguretat.';
$string['error_course_module_not_found'] = 'S\'ha trobat un mòdul de curs orfe (id: {$a}). Aquest mòdul no es copiarà a la còpia de seguretat.';
$string['errorfilenamemustbezip'] = 'El nom de fitxer que introduïu ha d\'ésser un fitxer ZIP i tenir l\'extensió .mbz';
$string['errorfilenamerequired'] = 'Cal que introduïu un nom de fitxer vàlid per aquesta còpia de seguretat';
$string['errorinvalidformat'] = 'Format de còpia de seguretat desconegut';
$string['errorinvalidformatinfo'] = 'El fitxer seleccionat no és un fitxer de còpia de seguretat vàlid per a Moodle i no pot ser restaurat.';
$string['errorminbackup20version'] = 'Aquest fitxer de còpia de seguretat s\'ha creat amb una versió de desenvolupament de Moodle ({$a->backup}). Com a mínim cal la {$a->min}. No es pot restaurar.';
$string['errorrestorefrontpage'] = 'No es permet restaurar res sobre la pàgina principal.';
$string['executionsuccess'] = 'El fitxer de còpia de seguretat s\'ha creat amb èxit.';
$string['filealiasesrestorefailures'] = 'La restauració dels àlies ha fallat';
$string['filealiasesrestorefailures_help'] = 'Els àlies són enllaços simbòlics a altres fitxers, inclosos els emmagatzemats en dipòsits externs. En alguns casos, Moodle no els pot restaurar - per exemple, en restaurar la còpia de seguretat en un altre lloc web o quan el fitxer a què es fa referència no existeix.

Més detalls i el motiu real de l\'errada es poden trobar al fitxer de registre de restauració.';
$string['filealiasesrestorefailuresinfo'] = 'Alguns àlies inclosos en el fitxer de còpia de seguretat no poden ser restaurats. La següent llista conté la seva ubicació prevista i el fitxer d\'origen on es referien en el lloc web original.';
$string['filename'] = 'Nom del fitxer';
$string['filereferencesincluded'] = 'Les referències de fitxer a continguts externs inclosos en el paquet de còpia de seguretat no funcionaran en altres llocs web.';
$string['filereferencesnotsamesite'] = 'La còpia de seguretat és d\'un altre lloc web, les referències de fitxer no es poden restaurar';
$string['filereferencessamesite'] = 'La còpia de seguretat és del mateix lloc web, les referències de fitxer es poden restaurar';
$string['generalactivities'] = 'Inclou les activitats';
$string['generalanonymize'] = 'Anonimitza la informació';
$string['generalbackdefaults'] = 'Opcions per defecte genèriques de les còpies de seguretat';
$string['generalblocks'] = 'Iclou els blocs';
$string['generalcomments'] = 'Inclou els comentaris';
$string['generalfilters'] = 'Inclou els filtres';
$string['generalgradehistories'] = 'Inclou historial';
$string['generalhistories'] = 'Inclou les històries';
$string['generallogs'] = 'Inclou els registres';
$string['generalroleassignments'] = 'Inclou els assignaments de rols';
$string['generalsettings'] = 'Paràmetres generals de còpia de seguretat';
$string['generalusers'] = 'Inclou els usuaris';
$string['generaluserscompletion'] = 'Inclou la informació de progrés de l\'usuari';
$string['importbackupstage16action'] = 'Continua';
$string['importbackupstage1action'] = 'Següent';
$string['importbackupstage2action'] = 'Següent';
$string['importbackupstage4action'] = 'Fes la importació';
$string['importbackupstage8action'] = 'Continua';
$string['importcurrentstage0'] = 'Selecció de curs';
$string['importcurrentstage1'] = 'Arranjaments inicials';
$string['importcurrentstage16'] = 'Completat';
$string['importcurrentstage2'] = 'Arranjaments de l\'esquema';
$string['importcurrentstage4'] = 'Confirmació i revisió';
$string['importcurrentstage8'] = 'Fes la importació';
$string['importfile'] = 'Importa un fitxer de còpia de seguretat';
$string['importsuccess'] = 'S\'ha completat la importació. Cliqueu a continua per retornar al curs.';
$string['includeactivities'] = 'Inclou:';
$string['includeditems'] = 'Ítems inclosos:';
$string['includefilereferences'] = 'Referències de fitxer a continguts externs';
$string['includesection'] = 'Secció {$a}';
$string['includeuserinfo'] = 'Dades d\'usuari';
$string['locked'] = 'Blocat';
$string['lockedbyconfig'] = 'Aquest paràmetre ha estat blocat en els arranjaments per omissió de les còpies de seguretat';
$string['lockedbyhierarchy'] = 'Blocat per dependències';
$string['lockedbypermission'] = 'No teniu permisos suficients per canviar aquest paràmetre';
$string['loglifetime'] = 'Mantingues els registres de';
$string['managefiles'] = 'Gestiona els fitxers de còpia de seguretat';
$string['moodleversion'] = 'Versió de Moodle';
$string['moreresults'] = 'Hi ha massa resultats. Introduïu una cerca més específica.';
$string['nomatchingcourses'] = 'No hi ha cursos a mostrar';
$string['norestoreoptions'] = 'No hi ha categories o cursos existents on pugueu restaurar';
$string['originalwwwroot'] = 'URL de la còpia de seguretat';
$string['previousstage'] = 'Previ';
$string['qcategory2coursefallback'] = 'La categoria de preguntes "{$a->name}", originàriament al context sistema/categoria de cursos en el fitxer de còpia de seguretat, es crearà en el context de curs per la restauració';
$string['qcategorycannotberestored'] = 'El procés de restauració no pot crear la categoria de preguntes "{$a->name}"';
$string['question2coursefallback'] = 'La categoria de preguntes "{$a->name}", originàriament al context sistema/categoria de cursos en el fitxer de còpia de seguretat, es crearà en el context de curs per la restauració';
$string['questionegorycannotberestored'] = 'Les qüestions "{$a->name}"  no es poden crear per a restaurar';
$string['restoreactivity'] = 'Restaura una activitat';
$string['restorecourse'] = 'Restaura un curs';
$string['restorecoursesettings'] = 'Arranjaments del curs';
$string['restoreexecutionsuccess'] = 'El curs s\'ha restaurat satisfactòriament. Si cliqueu el botó Continua del dessota veureu el curs restaurat.';
$string['restorenewcoursefullname'] = 'Nom del nou curs';
$string['restorenewcourseshortname'] = 'Nom curt del nou curs';
$string['restorenewcoursestartdate'] = 'Nova data inicial';
$string['restorerolemappings'] = 'Restaura unes assignacions de rols';
$string['restorerootsettings'] = 'Paràmetres de la restauració';
$string['restoresection'] = 'Restaura una secció';
$string['restorestage1'] = 'Confirma';
$string['restorestage16'] = 'Revisa';
$string['restorestage16action'] = 'Inicia la restauració';
$string['restorestage1action'] = 'Següent';
$string['restorestage2'] = 'Destí';
$string['restorestage2action'] = 'Següent';
$string['restorestage32'] = 'Processa';
$string['restorestage32action'] = 'Continua';
$string['restorestage4'] = 'Arranjaments';
$string['restorestage4action'] = 'Següent';
$string['restorestage64'] = 'Completat';
$string['restorestage64action'] = 'Continua';
$string['restorestage8'] = 'Esquema';
$string['restorestage8action'] = 'Següent';
$string['restoretarget'] = 'Destí de la restauració';
$string['restoretocourse'] = 'Restaureu el curs:';
$string['restoretocurrentcourse'] = 'Restaura sobre aquest curs';
$string['restoretocurrentcourseadding'] = 'Combina la còpia de seguretat amb aquest curs';
$string['restoretocurrentcoursedeleting'] = 'Esborra els continguts d\'aquest curs i després restaura';
$string['restoretoexistingcourse'] = 'Restaura sobre un curs existent';
$string['restoretoexistingcourseadding'] = 'Combina la còpia de seguretat amb el curs existent';
$string['restoretoexistingcoursedeleting'] = 'Esborra els continguts del curs existent i després restaura';
$string['restoretonewcourse'] = 'Restaura com un nou curs';
$string['restoringcourse'] = 'S\'està restaurant el curs';
$string['restoringcourseshortname'] = 's\'està restaurant';
$string['rootsettingactivities'] = 'Inclou les activitats';
$string['rootsettinganonymize'] = 'Anonimitza la informació de l\'usuari';
$string['rootsettingblocks'] = 'Inclou els blocs';
$string['rootsettingcalendarevents'] = 'Inclou els esdeveniments de calendari';
$string['rootsettingcomments'] = 'Inclou els comentaris';
$string['rootsettingfilters'] = 'Inclou els filtres';
$string['rootsettinggradehistories'] = 'Inclou l\'històric de qualificacions';
$string['rootsettingimscc1'] = 'Converteix a IMS Common Cartridge 1.0';
$string['rootsettingimscc11'] = 'Converteix a IMS Common Cartridge 1.1';
$string['rootsettinglogs'] = 'Inclou els registres del curs';
$string['rootsettingroleassignments'] = 'Inclou les assignacions de rols de l\'usuari';
$string['rootsettings'] = 'Arranjament de les còpies de seguretat';
$string['rootsettingusers'] = 'Inclou els usuaris registrats';
$string['rootsettinguserscompletion'] = 'Inclou els detalls de progrés de l\'usuari';
$string['sectionactivities'] = 'Activitats';
$string['sectioninc'] = 'Inclòs a la còpia de seguretat (sense informació d\'usuari)';
$string['sectionincanduser'] = 'Inclòs a la còpia de seguretat juntament amb la informació d\'usuari';
$string['selectacategory'] = 'Escolliu una categoria';
$string['selectacourse'] = 'Escolliu un curs';
$string['setting_course_fullname'] = 'Nom del curs';
$string['setting_course_shortname'] = 'Nom curt del curs';
$string['setting_course_startdate'] = 'Data d\'inici del curs';
$string['setting_keep_groups_and_groupings'] = 'Desa el grups actuals i els agrupaments.';
$string['setting_keep_roles_and_enrolments'] = 'Desa els rols actuals i les inscripcions.';
$string['setting_overwriteconf'] = 'Sobreescriu la configuració del curs';
$string['storagecourseandexternal'] = 'Àrea de còpies de seguretat del curs i el directori especificat';
$string['storagecourseonly'] = 'Àrea de còpies de seguretat del curs';
$string['storageexternalonly'] = 'Directori de còpies de seguretat automàtiques especificat';
$string['totalcategorysearchresults'] = 'Total de categories: {$a}';
$string['totalcoursesearchresults'] = 'Total de cursos: {$a}';
