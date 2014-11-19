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
 * Strings for component 'tool_installaddon', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   tool_installaddon
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acknowledgement'] = 'Acceptació';
$string['acknowledgementmust'] = 'Cal que accepteu això';
$string['acknowledgementtext'] = 'Entenc que és responsabilitat meua fer còpies de seguretat completes d\'aquest lloc abans d\'instal·lar complements. Accepte i entenc que els complements (especialment els no oficials però no sols els de fonts no oficials ) poden contindre forats de seguretat, poden fer que el lloc estigui no disponible, o provocar fuites o pèrdua de dades privades.';
$string['featuredisabled'] = 'L\'instal·lador d\'aquest complement està deshabilitat en aquest lloc.';
$string['installaddon'] = 'Instal·la un complement!';
$string['installaddons'] = 'Instal·la complements!';
$string['installexception'] = 'Vaja vaja, ha succeït un error quan es provava d\'instal·lar el complement. Activeu el mode depuració per veure els detalls de l\'error.';
$string['installfromrepo'] = 'Instal·la complements des del directori de connectors de Moodle';
$string['installfromrepo_help'] = 'Sereu redirigits al directori de connectors de Moodle per cercar i instal·lar un complement. Fixeu-vos que s\'enviarà el nom complet del vostre lloc, la URL i la versió de Moodle per facilitar-vos la instal·lació.';
$string['installfromzip'] = 'Instal·la un complement des d\'un fitxer ZIP';
$string['installfromzipfile'] = 'Paquet ZIP';
$string['installfromzipfile_help'] = 'El paquet ZIP del connector ha de contindre un directori anomenat amb el nom del connector. El fitxer ZIP s\'extraurà en la localització adequada per al tipus de connector. Si el paquet ha sigut baixat des del directori de connectors de Moodle tindrà aquesta estructura.';
$string['installfromzip_help'] = 'Una alternativa per instal·lar complements directament des del directori de complements de Moodle és carregar un paquet ZIP del complement. L\'estructura ZIP ha de tindre la mateixa estructura que el paquet baixat des del directori de connectors de Moodle.';
$string['installfromziprootdir'] = 'Canvia el nom del directori arrel';
$string['installfromziprootdir_help'] = 'Alguns paquets ZIP, com els generats per GitHub poden contindre un nom incorrecte per al directori arrel. Si passa això podreu entrar el nom correcte aquí.';
$string['installfromzipsubmit'] = 'Instal·la un complement des d\'un fitxer ZIP';
$string['installfromziptype'] = 'Tipus de connector';
$string['installfromziptype_help'] = 'Escolliu el tipus correcte de connector que aneu a instal·lar. Avís: El procediment d\'instal·lació pot anar molt malament si especifiqueu un tipus incorrecte de connector.';
$string['permcheck'] = 'Comproveu que el directori arrel del tipus de connector té permisos d\'escriptura per al procés del servidor web.';
$string['permcheckerror'] = 'Error mentre s\'estaven comprovant els permisos d\'escriptura';
$string['permcheckprogress'] = 'S\'està comprovant el permís d\'escriptura...';
$string['permcheckresultno'] = 'No es pot escriure en la ubicació del connector <em>{$a->path}</em>';
$string['permcheckresultyes'] = 'Sí es pot escriure en la ubicació del connector <em>{$a->path}</em>';
$string['pluginname'] = 'Instal·lador del complement';
$string['remoterequestalreadyinstalled'] = 'Hi ha una petició per instal·lar el complement {$a->name} ({$a->component}) amb versió {$a->version} des del directori de connectors de Moodle en aquest lloc. Tanmateix el connector <strong>ja està instal·lat</strong> en aquest lloc.';
$string['remoterequestconfirm'] = 'Hi ha una petició per instal·lar el complement {$a->name} ({$a->component}) amb versió {$a->version} des del directori de connectors de Moodle en aquest lloc. Si continueu el ZIP amb el complement es baixarà per ser validat. No s\'instal·larà res encara.';
$string['remoterequestinvalid'] = 'Hi ha una petició per instal·lar un complement des del directori de connectors de Moodle en aquest lloc. Desafortunadament la petició no és vàlida i per això no es pot instal·lar el complement.';
$string['remoterequestpermcheck'] = 'Hi ha una petició per instal·lar el complement {$a->name} ({$a->component}) amb versió {$a->version} des del directori de connectors de Moodle en aquest lloc. Tanmateix, la ubicació del connector <strong>{$a->typepath}</strong> no té <strong>permís d\'escriptura</strong>. Us cal donar permís d\'escriptura a l\'usuari del servidor web per a la ubicació del connector, després premeu el botó continua per reprendre la comprovació.';
$string['remoterequestpluginfoexception'] = 'Vaja vaja, ha succeït un error quan es provava d\'obtindre informació sobre el complement {$a->name} ({$a->component})  amb versió  {$a->version}. El complement no es pot instal·lar. Activeu el mode depuració per mirar els detalls de l\'error.';
$string['validation'] = 'Validació del paquet del complement.';
$string['validationmsg_componentmatch'] = 'Nom complet del component';
$string['validationmsg_componentmismatchname'] = 'Error en el nom del complement';
$string['validationmsg_componentmismatchname_help'] = 'Alguns paquets ZIP, com els generats per Github, poden contindre un nom del directori arrel incorrecte. Us caldrà esmenar el nom del directori arrel per tal que concordi amb el nom declarat del complement.';
$string['validationmsg_componentmismatchname_info'] = 'El complement declara que el seu nom és  «{$a}» però això no concorda amb el nom del directori arrel.';
$string['validationmsg_componentmismatchtype'] = 'El tipus del complement no concorda';
$string['validationmsg_componentmismatchtype_info'] = 'Heu seleccionat el tipus «{$a->expected}» però el complement declare que el tipus és «{$a->found}».';
$string['validationmsg_filenotexists'] = 'No s\'ha trobat el fitxer extret';
$string['validationmsg_filesnumber'] = 'No s\'han trobat suficients fitxers en el paquet';
$string['validationmsg_filestatus'] = 'No es poden extraure tots els fitxers';
$string['validationmsg_filestatus_info'] = 'S\'estava intentant extraure el fitxer {$a->file} i ha succeït un error «{$a->status}».';
$string['validationmsglevel_debug'] = 'Depuració';
$string['validationmsglevel_error'] = 'Error';
$string['validationmsglevel_info'] = 'D\'acord';
$string['validationmsglevel_warning'] = 'Avís';
$string['validationmsg_maturity'] = 'Nivell de maduresa declarat';
$string['validationmsg_maturity_help'] = 'El complement pot declarar el seu nivell de maduresa. Si el mantenidor considera el complement estable, la nivell de maduresa serà MATURITY_STABLE. Tots els altres nivells de maduresa (alfa o beta) s\'haurien de considerar inestables i generen un avís.';
$string['validationmsg_missingexpectedlangenfile'] = 'El nom anglès del fitxer no concorda';
$string['validationmsg_missingexpectedlangenfile_info'] = 'El tipus de complement no conté el fitxer de llengua anglesa esperat {$a}.';
$string['validationmsg_missinglangenfile'] = 'No s\'ha trobat el fitxer de llengua anglesa';
$string['validationmsg_missinglangenfolder'] = 'No s\'ha trobat la carpeta d\'idioma anglès';
$string['validationmsg_missingversion'] = 'El complement no declara la seva versió';
$string['validationmsg_missingversionphp'] = 'No s\'ha trobat el fitxer version.php';
$string['validationmsg_multiplelangenfiles'] = 'S\'ha trobat múltiples fitxers d\'idioma anglès';
$string['validationmsg_onedir'] = 'Estructura invàlida al paquet ZIP';
$string['validationmsg_onedir_help'] = 'El paquet ZIP ha de contindre un directori arrel que conté el codi del complement. El nom del directori arrel ha de tindre el mateix nom que el connector.';
$string['validationmsg_pathwritable'] = 'Comprovació del permís d\'escriptura.';
$string['validationmsg_pluginversion'] = 'Versió del complement.';
$string['validationmsg_requiresmoodle'] = 'Versió de Moodle requerida';
$string['validationmsg_unknowntype'] = 'Tipus de plugin desconegut';
$string['validationresult0'] = 'La validació ha fallat!';
$string['validationresultinfo'] = 'Informació';
$string['validationresultmsg'] = 'Missatge';
$string['validationresultstatus'] = 'Estat';
