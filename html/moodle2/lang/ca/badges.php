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
 * Strings for component 'badges', language 'ca', branch 'MOODLE_26_STABLE'
 *
 * @package   badges
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Accions';
$string['activate'] = 'Activa l\'accés';
$string['activatesuccess'] = 'S\'ha activat correctament l\'accés a les insígnies.';
$string['addbadgecriteria'] = 'Afegeix un criteri per la insígnia';
$string['addcourse'] = 'Afegeix cursos';
$string['addcourse_help'] = 'Seleccioneu tots els cursos que haurien d\'afegir-se al requeriment d\'aquesta insígnia. Premeu la tecla CTRL per seleccionar diversos elements.';
$string['addcriteria'] = 'Afegeix criteri';
$string['addcriteriatext'] = 'Per començar a afegir criteris cal que seleccioneu una de les opcions del menú desplegable.';
$string['addtobackpack'] = 'Afegeix a la motxilla';
$string['adminonly'] = 'Aquesta pàgina està restringida als administradors del lloc.';
$string['after'] = 'després de la data de lliurament.';
$string['aggregationmethod'] = 'Mètode d\'agregació';
$string['all'] = 'Tot';
$string['allmethod'] = 'Totes les condicions seleccionades coincideixen';
$string['allmethodactivity'] = 'S\'han completat totes les activitats seleccionades';
$string['allmethodcourseset'] = 'S\'han completat tots els cursos seleccionats';
$string['allmethodmanual'] = 'Tots els rols seleccionats han de concedir la insígnia';
$string['allmethodprofile'] = 'S\'han completat tots els camps del perfil seleccionats';
$string['allowcoursebadges'] = 'Activa les insígnies del curs';
$string['allowcoursebadges_desc'] = 'Permet crear i concedir insígnies en el context del curs.';
$string['allowexternalbackpack'] = 'Activa la connexió amb motxilles externes';
$string['allowexternalbackpack_desc'] = 'Permet als usuaris configurar connexions i mostrar les insígnies de les motxilles dels seus proveïdors externs.

Nota: Es recomana no activar aquesta opció si no es pot accedir al lloc web des d\'Internet (p.ex, perquè hi ha un tallafocs activat)';
$string['any'] = 'Qualsevol';
$string['anymethod'] = 'Es compleix qualsevol de les condicions seleccionades';
$string['anymethodactivity'] = 'S\'ha completat qualsevol de les activitats seleccionades';
$string['anymethodcourseset'] = 'S\'ha completat qualsevol dels cursos seleccionats';
$string['anymethodmanual'] = 'Qualsevol dels rols seleccionats pot concedir la insígnia.';
$string['anymethodprofile'] = 'S\'ha completat qualsevol dels camps del perfil seleccionats';
$string['attachment'] = 'Adjunta la insígnia al missatge';
$string['attachment_help'] = 'Si està marcat s\'adjuntarà la insígnia lliurada al missatge de correu perquè el destinatari la pugui descarregar.';
$string['award'] = 'Insígnia guanyada';
$string['awardedtoyou'] = 'Insígnies que m\'han donat';
$string['awardoncron'] = 'S\'ha activat correctament l\'accés a les insígnies. Però hi ha massa usuaris que poden guanyar al mateix temps aquesta insígnia. Per assegurar el bon funcionament del lloc aquesta acció trigarà una mica a completar-se.';
$string['awards'] = 'Destinataris';
$string['backpackavailability'] = 'Verificació d\'una insígnia externa';
$string['backpackavailability_help'] = 'Un servei extern de motxilles ha de poder accedir al vostre lloc i verificar les insígnies emeses perquè els guanyadors de les insígnies puguin demostrar que les hi heu donat. Sembla que ara mateix el vostre lloc no és accessible, i en conseqüència no es podran verificar les insígnies que ja heu donat o que donareu en el futur.

##Per què estic veient aquest missatge?

Pot ser degut a què el vostre tallafocs impedeix l\'accés d\'usuaris de fora de la vostra xarxa, a què el vostre lloc està protegit per una contrasenya, o a què esteu fen funcionar el lloc en un ordinador que no té accés a Internet (p.ex una màquina local de desenvolupament).

##Això representa un problema?

Si teniu planejat lliurar insígnies haureu de solucionar aquest problema si esteu en un lloc en producció, altrament els guanyadors no podran demostrar que han rebut les seves insígnies del vostre lloc. Si el lloc encara no és actiu podeu crear i lliurar insígnies de prova fins que el lloc s\'activi del tot.

##Què passa si no puc fer públicament  accessible el lloc sencer?

L\'únic URL necessari per la verificació és [URL-del-lloc]/badges/assertion.php així que si podeu modificar el tallafocs per tal de permetre l\'accés extern a aquest fitxer la verificació podrà funcionar.';
$string['backpackbadges'] = 'Es mostren {$a->totalbadges} insígnia(es) de {$a->totalcollections} col·lecció(ons). <a href="mybackpack.php">Canvia la configuració de la motxilla</a>.';
$string['backpackconnection'] = 'Connexió a la motxilla';
$string['backpackconnection_help'] = 'Aquesta pàgina us permet configurar la connexió a un proveïdor extern de motxilles. Si us hi connecteu podreu mostrar insígnies externes en aquest lloc i pujar a la motxilla les insígnies que guanyeu aquí.

Actualment només hi ha suport per la motxilla de Mozilla, la <a href="http://backpack.openbadges.org">Mozilla OpenBadges Backpack</a>. Cal que us  registreu en aquest servei de motxilles abans de provar d\'establir la connexió des d\'aquesta pàgina.';
$string['backpackdetails'] = 'Configuració de la motxilla';
$string['backpackemail'] = 'Adreça de correu';
$string['backpackemail_help'] = 'Adreça de correu associada a la vostra motxilla.
Mentre esteu connectat, qualsevol insígnia guanyada en aquest lloc quedarà associada amb aquesta adreça de correu-e.';
$string['backpackimport'] = 'Configuració de la importació d\'insígnies';
$string['backpackimport_help'] = 'Un cop s\'hagi establert correctament la connexió amb la motxilla les insígnies de la vostra motxilla es podran veure a la pàgina "Les meves insígnies" i a la del perfil.

En aquesta àrea podeu seleccionar les col·leccions d\'insígnies de la vostra motxilla que voleu mostrar al perfil.';
$string['badgedetails'] = 'Detalls de la insígnia';
$string['badgeimage'] = 'Imatge';
$string['badgeimage_help'] = 'Aquesta és una imatge que s\'utilitzarà quan s\'emeta aquesta insígnia.
Per afegir una nova imatge, navegueu i trieu una imatge (en format JPG o PNG), després feu clic a "Desa els canvis". La imatge es retallarà en forma de quadrat i s\'escalarà per ajustar-se als requisits d\'imatge de la insígnia.';
$string['badgeprivacysetting'] = 'Configuració de privacitat de la insígnia';
$string['badgeprivacysetting_help'] = 'Les insígnies que guanyeu es poden mostrar a la vostra pàgina de perfil del compte. Aquests paràmetres us permeten definir automàticament la visibilitat de les noves insígnies guanyades.
Encara podeu controlar la configuració de privacitat d\'una insígnia individual a la vostra pàgina "Les meues insígnies".';
$string['badgeprivacysetting_str'] = 'Mostra automàticament les insígnies que guanye a la meva pàgina de perfil';
$string['badgesalt'] = 'Sal per a la funció resum aplicada a l\'adreça de correu electrònic del destinatari';
$string['badgesalt_desc'] = 'Utilitzar una funció resum (hash) permet als serveis motxilla confirmar qui ha guanyat la insígnia sense haver de revelar la seva adreça de correu electrònic. Aquest paràmetre només hauria d\'utilitzar números i lletres.

Nota: Per tal de poder verificar els receptors, eviteu de canviar aquest paràmetre una vegada hàgiu començat a repartir insígnies.';
$string['badgesdisabled'] = 'Les insígnies no estan habilitades en aquest lloc.';
$string['badgesearned'] = 'Nombre d\'insígnies guanyades: {$a}';
$string['badgesettings'] = 'Configuració de les insígnies';
$string['badgestatus_0'] = 'No disponible per als usuaris';
$string['badgestatus_1'] = 'Disponible per als usuaris';
$string['badgestatus_2'] = 'No disponible per als usuaris';
$string['badgestatus_3'] = 'Disponible per als usuaris';
$string['badgestatus_4'] = 'Arxivat';
$string['badgestoearn'] = 'Nombre d\'insígnies disponibles: {$a}';
$string['badgesview'] = 'Insígnies del curs';
$string['badgeurl'] = 'Enllaç d\'insígnia emès';
$string['bawards'] = 'Destinataris ({$a})';
$string['bcriteria'] = 'Criteris';
$string['bdetails'] = 'Edita els detalls';
$string['bmessage'] = 'Missatge';
$string['boverview'] = 'Resum';
$string['bydate'] = 'completat per';
$string['clearsettings'] = 'Suprimeix l\'arranjament';
$string['completioninfo'] = 'Aquesta insígnia es va emetre per completar:';
$string['completionnotenabled'] = 'La compleció del curs no està habilitada per a aquest curs, per la qual cosa no es pot incloure en els criteris de les insígnies. La compleció del curs es pot activar des de la configuració del curs.';
$string['configenablebadges'] = 'Quan està activada, aquesta característica us permet crear insígnies i concedir-les als usuaris del lloc.';
$string['configuremessage'] = 'Missatge de la insígnia';
$string['connect'] = 'Connecta';
$string['connected'] = 'Connectat';
$string['connecting'] = 'S\'està connectant...';
$string['contact'] = 'Contacte';
$string['contact_help'] = 'Una adreça de correu electrònic associada a l\'entitat emissora de la insígnia.';
$string['copyof'] = 'Còpia de {$a}';
$string['coursebadges'] = 'Insígnies';
$string['coursebadgesdisabled'] = 'Les insígnies de curs no estan habilitades en aquest lloc.';
$string['coursecompletion'] = 'Els usuaris han de completar aquest curs.';
$string['create'] = 'Nova insígnia';
$string['createbutton'] = 'Crea una insígnia';
$string['creatorbody'] = '<p> {$a->user} ha completat tots els requisits per a la insígnia i se li ha concedit. Vegeu la insígnia emesa en {$a->link} </p>';
$string['creatorsubject'] = '«{$a}» ha estat guardonat!';
$string['criteria_0'] = 'Aquesta insígnia es concedeix quan...';
$string['criteria_1'] = 'Compleció d\'activitat';
$string['criteria_1_help'] = 'Permet concedir una insígnia als usuaris basada en la compleció d\'un conjunt d\'activitats dins d\'un curs.';
$string['criteria_2'] = 'Atorgament manual pel rol';
$string['criteria_2_help'] = 'Permet que els usuaris amb un rol determinat dins del lloc o del curs puguin concedir manualment una insígnia.';
$string['criteria_3'] = 'Participació social';
$string['criteria_3_help'] = 'Social';
$string['criteria_4'] = 'Compleció de curs';
$string['criteria_4_help'] = 'Permet concedir una insígnia als usuaris que hagin completat el curs. Aquest criteri pot tenir paràmetres addicionals, com ara, qualificació mínima i data de compleció del curs.';
$string['criteria_5'] = 'Compleció d\'un conjunt de cursos';
$string['criteria_5_help'] = 'Permet concedir una insígnia als usuaris que hagin completat un conjunt de cursos. Cada curs pot tenir paràmetres addicionals, com ara, qualificació mínima i data de compleció del curs.';
$string['criteria_6'] = 'Compleció del perfil';
$string['criteria_6_help'] = 'Permet concedir una insígnia als usuaris que hagin completat determinats camps en el seu perfil. Podeu triar entre els camps de perfil personalitzats que estan disponibles per als usuaris per defecte.';
$string['criteriacreated'] = 'Els criteris de la insígnia s\'han creat amb èxit.';
$string['criteriadeleted'] = 'Els criteris de la insígnia s\'han esborrat amb èxit.';
$string['criteria_descr'] = 'Els usuaris guanyaran aquesta insígnia quan completin el següent requisit:';
$string['criteria_descr_0'] = 'Els usuaris guanyaran aquesta insígnia quan completin <strong>{$a}</strong>  de la llista de requisits.';
$string['criteria_descr_1'] = 'S\'han completat <strong>{$a}</strong> de les següents activitats:';
$string['criteria_descr_2'] = 'Aquesta insígnia la concediran els usuaris amb <strong>{$a}</strong> dels rols següents:';
$string['criteria_descr_4'] = 'Els usuaris han de completar el curs.';
$string['criteria_descr_5'] = 'S\'han de completar <strong>{$a}</strong> dels següents cursos:';
$string['criteria_descr_6'] = 'S\'han de completar <strong>{$a}</strong> dels següents camps del perfil d\'usuari:';
$string['criteria_descr_bydate'] = 'per <em>{$a}</em>';
$string['criteria_descr_grade'] = 'amb la qualificació mínima de <em>{$a}</em>';
$string['criteria_descr_short0'] = 'Completeu <strong>{$a}</strong> de:';
$string['criteria_descr_short1'] = 'Completeu <strong>{$a}</strong> de:';
$string['criteria_descr_short2'] = 'Concedida per <strong>{$a}</strong> de:';
$string['criteria_descr_short4'] = 'Completeu el curs';
$string['criteria_descr_short5'] = 'Completeu <strong>{$a}</strong> de:';
$string['criteria_descr_short6'] = 'Completeu <strong>{$a}</strong> de:';
$string['criteria_descr_single_1'] = 'S\'ha de completar la següent activitat';
$string['criteria_descr_single_2'] = 'Aquesta insígnia la concediran els usuaris amb el rol següent:';
$string['criteria_descr_single_4'] = 'Els usuaris han de completar el curs';
$string['criteria_descr_single_5'] = 'S\'ha de completar el següent curs:';
$string['criteria_descr_single_6'] = 'S\'ha de completar el següent camp del perfil d\'usuari:';
$string['criteria_descr_single_short1'] = 'Completeu:';
$string['criteria_descr_single_short2'] = 'Guardonat per:';
$string['criteria_descr_single_short4'] = 'Completeu el curs';
$string['criteria_descr_single_short5'] = 'Completeu:';
$string['criteria_descr_single_short6'] = 'Completeu:';
$string['criteriasummary'] = 'Resum de criteris';
$string['criteriaupdated'] = 'Els criteris de la insígnia s\'han actualitzat amb èxit.';
$string['criterror'] = 'Paràmetres de les característiques actuals';
$string['criterror_help'] = 'Aquest conjunt de camps mostren tots els paràmetres que inicialment es van afegir a aquest requisit d\'insígnia, però que ja no estan disponibles. Es recomana que desmarqueu aquests paràmetres per assegurar-vos que els usuaris puguin guanyar aquesta insígnia en el futur.';
$string['currentimage'] = 'Imatge actual';
$string['currentstatus'] = 'Estat actual:';
$string['dateawarded'] = 'Data publicada';
$string['dateearned'] = 'Data: {$a}';
$string['day'] = 'Dia (dies)';
$string['deactivate'] = 'Deshabilita l\'accés';
$string['deactivatesuccess'] = 'L\'accés a les insígnies s\'ha desactivat amb èxit.';
$string['defaultissuercontact'] = 'Dades de contacte de l\'emissor de la insígnia per defecte';
$string['defaultissuercontact_desc'] = 'Una adreça de correu electrònic associada a l\'entitat emissora de la insígnia.';
$string['defaultissuername'] = 'Nom de l\'emissor de la insígnia per defecte';
$string['defaultissuername_desc'] = 'Nom de l\'autoritat que expedeix.';
$string['delbadge'] = 'Suprimeix la insígnia';
$string['delconfirm'] = 'Esteu segurs que voleu suprimir la insígnia \'{$a}\'?';
$string['delcritconfirm'] = 'Esteu segur que voleu suprimir aquest criteri?';
$string['delparamconfirm'] = 'Esteu segur que voleu suprimir aquest paràmetre?';
$string['description'] = 'Descripció';
$string['disconnect'] = 'Desconnecta';
$string['donotaward'] = 'Actualment, aquesta insígnia no està activa, per la qual cosa no es pot concedir als usuaris. Si voleu atorgar aquesta insígnia, configureu el seu estat a actiu.';
$string['editsettings'] = 'Edita els paràmetres';
$string['enablebadges'] = 'Habilita les insígnies';
$string['error:backpackdatainvalid'] = 'Les dades retornades pel servei de motxilla no són vàlides.';
$string['error:backpackemailnotfound'] = 'El correu-e «{$a}» no està associat a cap motxilla. Us cal <a href="http://backpack.openbadges.org">crear una motxilla</a> per aquest compte o bé autenticar-vos amb una altra adreça de correu-e.';
$string['error:backpackloginfailed'] = 'No heu pogut connectar a una motxilla externa pel següent motiu: {$a}';
$string['error:backpacknotavailable'] = 'El vostre lloc no és accessible a través d\'Internet, per la qual cosa les insígnies emeses per aquest lloc no podran verificar-se pels serveis de motxilla externs.';
$string['error:backpackproblem'] = 'Hi ha hagut un problema en connectar amb el vostre proveïdor de serveis de motxilla. Intenteu-ho més tard.';
$string['error:badjson'] = 'L\'intent de connexió ha retornat dades invàlides.';
$string['error:cannotact'] = 'No es pot activar la insígnia.';
$string['error:cannotawardbadge'] = 'No es pot concedir la insígnia a un usuari.';
$string['error:clone'] = 'No es pot duplicar la insígnia.';
$string['error:connectionunknownreason'] = 'La connexió no ha prosperat, però no s\'ha donat cap raó.';
$string['error:duplicatename'] = 'Ja existeix al sistema una insígnia amb el mateix nom.';
$string['error:externalbadgedoesntexist'] = 'No s\'ha trobat la insígnia';
$string['error:guestuseraccess'] = 'Esteu utilitzant l\'accés de visitants. Per veure les insígnies cal que entreu amb el vostre compte d\'usuari/ària.';
$string['error:invalidbadgeurl'] = 'El format d\'URL de l\'emissor de la insígnia no és vàlid.';
$string['error:invalidcriteriatype'] = 'Tipus de criteri invàlid.';
$string['error:invalidexpiredate'] = 'La data de caducitat ha d\'estar en el futur.';
$string['error:invalidexpireperiod'] = 'El període de caducitat no pot ser negatiu o igual a zero.';
$string['error:noactivities'] = 'No hi ha activitats amb els criteris de compleció habilitats en aquest curs.';
$string['error:noassertion'] = 'Persona no ha retornat confirmació. Potser heu tancat el diàleg abans de completar el procés d\'autenticació.';
$string['error:nocourses'] = 'La compleció del  curs no està habilitada per a cap dels cursos en aquest lloc, així que no es poden mostrar. La compleció del curs es pot activar en els paràmetres del curs.';
$string['error:nogroups'] = '<p>No hi ha col·leccions públiques d\'insígnies disponibles a la vostra motxilla. </p>
<p> Només es mostren les col·leccions públiques, <a href="http://backpack.openbadges.org">visiteu la vostra motxilla</a> per crear alguna col·lecció pública. </p>';
$string['error:nopermissiontoview'] = 'No teniu permisos per veure els destinataris de la insígnia';
$string['error:nosuchbadge'] = 'La insígnia amb l\'identificador {$a} no existeix.';
$string['error:nosuchcourse'] = 'Avís: Aquest curs no està ja disponible.';
$string['error:nosuchfield'] = 'Avís: Aquest camp de perfil d\'usuari no està ja disponible.';
$string['error:nosuchmod'] = 'Avís: Aquesta activitat ja no està disponible.';
$string['error:nosuchrole'] = 'Avís: Aquest rol ja no està disponible.';
$string['error:nosuchuser'] = 'L\'usuari amb aquesta adreça de correu-e no té cap compte obert amb el proveïdor de motxilles actual.';
$string['error:notifycoursedate'] = 'Avís: les insígnies associades amb la compleció de curs i d\'activitat no s\'emetran fins a la data d\'inici del curs.';
$string['error:parameter'] = 'Avís: S\'hauria de triar almenys un paràmetre per assegurar el correcte flux de treball de l\'emissió de la insígnia.';
$string['error:personaneedsjs'] = 'Actualment es requereis Javascript per connectar a la vostra motxilla. Si podeu, habiliteu el Javascript i recarregueu la pàgina.';
$string['error:requesterror'] = 'La petició de connexió ha fallat (codi d\'error {$a}).';
$string['error:requesttimeout'] = 'La petició de connexió ha superat el temps permès abans de poder-se completar.';
$string['error:save'] = 'No es pot desar la insígnia.';
$string['error:userdeleted'] = '{$a->user} (Aquest usuari ja no existeix al lloc {$a->site})';
$string['evidence'] = 'Evidència';
$string['existingrecipients'] = 'Destinataris de la insígnia existents';
$string['expired'] = 'Expirada';
$string['expiredate'] = 'Aquesta insígnia expira el {$a}.';
$string['expireddate'] = 'Aquesta insígnia va expirar el {$a}.';
$string['expireperiod'] = 'Aquesta insígnia expira {$a} dies després d\'haver-se emès.';
$string['expireperiodh'] = 'Aquesta insígnia expira {$a} hores després d\'haver-se emès.';
$string['expireperiodm'] = 'Aquesta insígnia expira {$a} minuts després d\'haver-se emès.';
$string['expireperiods'] = 'Aquesta insígnia expira {$a} segons després d\'haver-se emès.';
$string['expirydate'] = 'Data d\'expiració';
$string['expirydate_help'] = 'Opcionalment, les insígnies poden expirar en una data determinada, o es pot calcular la data basant-se en la data en què es va emetre la insígnia a un usuari.';
$string['externalbadges'] = 'Els meus insígnies d\'altres llocs web';
$string['externalbadges_help'] = 'Aquesta àrea mostra insígnies de la vostra motxilla externa.';
$string['externalbadgesp'] = 'Insígnies d\'altres llocs web:';
$string['externalconnectto'] = 'Per mostrar les insígnies externes necessiteu <a href="{$a}">connectar-vos a una motxilla</a>.';
$string['fixed'] = 'Data fixa';
$string['hidden'] = 'Oculta';
$string['hiddenbadge'] = 'Malauradament, el propietari de la insígnia no ha fet disponible aquesta informació.';
$string['issuancedetails'] = 'Expiració de la insígnia';
$string['issuedbadge'] = 'Informació de la insígnia emesa';
$string['issuerdetails'] = 'Detalls de l\'atorgador';
$string['issuername'] = 'Nom de l\'atorgador';
$string['issuername_help'] = 'Nom de l\'agent o autoritat atorgadora.';
$string['issuerurl'] = 'URL de l\'atorgador';
$string['localbadges'] = 'Les meves insígnies del lloc web {$a}';
$string['localbadgesh'] = 'Les meves insígnies d\'aquest lloc web.';
$string['localbadgesh_help'] = 'Totes les insígnies guanyades en aquest lloc web per completar els cursos, activitats de curs i altres requisits.
Podeu gestionar les vostres insígnies aquí fent-les públiques o privades per a la vostra pàgina de perfil.
Podeu descarregar-les totes o cada insígnia separadament i desar-les en el vostre ordinador. Les insígnies descarregades poden afegir-se al vostre servei de motxilla externa.';
$string['localbadgesp'] = 'Insígnies de {$a}:';
$string['localconnectto'] = 'Per compartir aquestes insígnies fora d\'aquest lloc web cal <a href="{$a}">connectar-se a una motxilla</a> .';
$string['makeprivate'] = 'Fes privada';
$string['makepublic'] = 'Fes pública';
$string['managebadges'] = 'Gestiona insígnies';
$string['message'] = 'Cos del missatge';
$string['messagebody'] = '<p> Heu guanyat una insígnia "%badgename%"! </p><p> Podeu trobar més informació sobre aquesta insígnia en %badgelink%. </p><p> Si no hi ha una insígnia adjunta a aquest correu electrònic, podeu gestionar-la i descarregar-la des de la pàgina {$a}. </p>';
$string['messagesubject'] = 'Enhorabona! Heu guanyat una insígnia!';
$string['method'] = 'Aquest criteri es completa quan...';
$string['mingrade'] = 'Qualificació mínima requerida';
$string['month'] = 'Mes(os)';
$string['mybackpack'] = 'L\'arranjament de la meva motxilla';
$string['mybadges'] = 'Les meves insígnies';
$string['never'] = 'Mai';
$string['newbadge'] = 'Afegeix una nova insígnia';
$string['newimage'] = 'Nova imatge';
$string['noawards'] = 'Aquesta insígnia encara no s\'ha guanyat.';
$string['nobackpack'] = 'No hi ha cap servei de motxilla connectat amb aquest compte.<br />';
$string['nobackpackbadges'] = 'No hi ha insígnies en les col·leccions que heu seleccionat. <a href="mybackpack.php">Afegiu més col·leccions</a>.';
$string['nobackpackcollections'] = 'No hi ha col·leccions d\'insígnia seleccionades. <a href="mybackpack.php">Afegiu col·leccions</a>.';
$string['nobadges'] = 'No hi ha insígnies disponibles.';
$string['nocriteria'] = 'Els criteris per a aquesta insígnia no s\'han creat encara.';
$string['noexpiry'] = 'Aquesta insígnia no té una data d\'expiració.';
$string['noparamstoadd'] = 'No hi ha paràmetres addicionals disponibles per afegir a aquest requisit d\'insígnia.';
$string['notacceptedrole'] = 'La vostra assignació de rol actual no està entre els rols que poden emetre manualment aquesta insígnia. <br/> Si voleu veure als usuaris que ja han guanyat aquesta insígnia, podeu visitar la pàgina {$a}.';
$string['notconnected'] = 'No connectat';
$string['nothingtoadd'] = 'No hi ha cap criteri disponible per afegir.';
$string['notification'] = 'Notifica qui ha creat la insígnia';
$string['notification_help'] = 'Aquest paràmetre gestiona les notificacions enviades a qui va crear la insígnia per fer-los saber que s\'ha emès.
Estan disponibles les següents opcions:
* ** MAI ** – No s\'envien notificacions.
* ** CADA VEGADA ** – S\'envia una notificació cada vegada que es concedeix aquesta insígnia.
* **DIARI ** – S\'envien notificacions una vegada al dia.
* ** SETMANAL ** – S\'envien notificacions una vegada a la setmana.
* ** MENSUAL ** – S\'envien notificacions una vegada al mes.';
$string['notifydaily'] = 'Diàriament';
$string['notifyevery'] = 'Sempre';
$string['notifymonthly'] = 'Mensualment';
$string['notifyweekly'] = 'Setmanalment';
$string['numawards'] = 'Aquesta insígnia s\'ha emès a <a href="{$a->link}">{$a->count}</a> usuaris.';
$string['numawardstat'] = 'Aquesta insígnia s\'ha emès a {$a} usuaris.';
$string['overallcrit'] = 'dels criteris seleccionats estan complets.';
$string['personaconnection'] = 'Entreu amb el vostre correu-e';
$string['personaconnection_help'] = 'Persona és un sistema per identificar-vos en el web, utilitzant una adreça de correu-e pròpia. La motxilla d\'Open Badges utilitza Persona com a sistema d\'autenticació, per la qual cosa per poder connectar a una motxilla us cal un compte al Persona.

Per més informació sobre Persona visiteu <a href="https://login.persona.org/about">https://login.persona.org/about</a>.';
$string['potentialrecipients'] = 'Receptors potencials de la insígnia';
$string['recipientdetails'] = 'Detalls del receptor';
$string['recipientidentificationproblem'] = 'No s\'ha trobat cap receptor d\'aquesta insígnia entre els usuaris existents.';
$string['recipients'] = 'Receptors de la insígnia';
$string['recipientvalidationproblem'] = 'L\'usuari actual no pot ser verificat com a receptor d\'aquesta insígnia.';
$string['relative'] = 'Data relativa';
$string['requiredcourse'] = 'Heu d\'afegir almenys un curs al criteri de configuració del curs';
$string['reviewbadge'] = 'Canvis en l\'accés a la insígnia';
$string['reviewconfirm'] = '<p> Aquesta acció realitzarà una comprovació de si qualsevol dels usuaris ja ha completat tots els requisits per a la \'{$a}\' insígnia? </p><p> Voleu continuar? </p>';
$string['save'] = 'Desa';
$string['searchname'] = 'Cerca per nom';
$string['selectaward'] = 'Seleccioneu el rol que voleu utilitzar per concedir aquesta insígnia:';
$string['selectgroup_end'] = 'Només es mostren les col·leccions públiques, <a href="http://backpack.openbadges.org">visiteu la vostra motxilla</a> per crear més col·leccions píbliques.';
$string['selectgroup_start'] = 'Seleccioneu col·leccions de la vostra motxilla per mostrar en aquest lloc:';
$string['selecting'] = 'Amb les insígnies seleccionades ...';
$string['setup'] = 'Configura la connexió';
$string['signinwithyouremail'] = 'Entreu amb el vostre correu-e';
$string['sitebadges'] = 'Insígnies del lloc';
$string['sitebadges_help'] = 'Les insígnies del lloc només es poden concedir als usuaris per les activitats relacionades amb el lloc. Aquestes inclouen completar una sèrie de cursos o parts dels perfils d\'usuari. Les insígnies del lloc també poden emetre\'s manualment d\'un usuari a un altre.
Les insígnies per a les activitats relacionades amb els cursos s\'han de crear a nivell de curs. Les insígnies de curs es poden trobar en l\'Administració del curs > Insígnies.';
$string['status'] = 'Estat de la insígnia';
$string['status_help'] = 'L\'estat d\'una insígnia determina el seu comportament en el sistema:

* **DISPONIBLE** - Vol dir que els usuaris poden guanyar aquesta insígnia. Mentre que una insígnia està disponible per als usuaris, els seus criteris no es poden modificar.

* **NO DISPONIBLE** - Vol dir que aquesta insígnia no està disponible per als usuaris i no es pot guanyar o emetre manualment. Si la insígnia no s\'ha emès abans, els criteris es poden canviar.

Una vegada una insígnia s\'ha emès almenys per a un usuari, es **BLOCA** automàticament. Els usuaris encara poden guanyar les insígnies blocades, però ja no es poden canviar els seus criteris. Si necessiteu modificar els detalls o els criteris d\'una insígnia blocada, podeu duplicar-la i fer tots els canvis requerits.

*Per què bloquem les insígnies?*

Volem assegurar-nos que tots els usuaris completen els mateixos requisits per a guanyar una insígnia. Actualment, no és possible revocar insígnies. Si permetem que els requisits d\'insígnies es puguen modificar en qualsevol moment, probablement acabaríem amb usuaris amb la mateixa insígnia per satisfer completament diferents requisits.';
$string['statusmessage_0'] = 'Actualment aquesta insígnia no està disponible per als usuaris. Habiliteu l\'accés si voleu que els usuaris la puguin guanyar.';
$string['statusmessage_1'] = 'Actualment aquesta insígnia està disponible per als usuaris. Deshabiliteu l\'accés per fer qualsevol canvi.';
$string['statusmessage_2'] = 'Actualment aquesta insígnia no està disponible per als usuaris i els criteris estan blocats. Habiliteu l\'accés si voleu que els usuaris la puguin guanyar.';
$string['statusmessage_3'] = 'Actualment aquesta insígnia està disponible per als usuaris i els criteris estan blocats.';
$string['statusmessage_4'] = 'Actualment aquesta insígnia està arxivada.';
$string['subject'] = 'Assumpte del missatge';
$string['variablesubstitution'] = 'Substitució de variables en els missatges.';
$string['variablesubstitution_help'] = 'En un missatge d\'insígnia, determinades variables es poden inserir en l\'assumpte o en el cos d\'un missatge de manera que es reemplaçaran per valors reals quan s\'envii el missatge. Les variables s\'han d\'inserir en el el text exactament tal i com es mostren a continuació. Es poden utilitzar les següents variables:

%badgename%
: Això serà reemplaçat pel nom complet de la insígnia.

%username%
: Això serà reemplaçat pel nom complet del receptor.

%badgelink%
: Això serà reemplaçat per l\'URL públic amb informació sobre la insígnia emesa.';
$string['viewbadge'] = 'Visualitza la insígnia emesa';
$string['visible'] = 'Visible';
$string['warnexpired'] = '(Aquesta insígnia ha expirat!)';
$string['year'] = 'Any(s)';
