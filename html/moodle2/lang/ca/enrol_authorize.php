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
 * Strings for component 'enrol_authorize', language 'ca', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_authorize
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adminacceptccs'] = 'Quins tipus de targetes de crèdit s\'accepten?';
$string['adminaccepts'] = 'Seleccioneu les formes de pagament permeses i els seus tipus.';
$string['adminauthorizeccapture'] = 'Ordre de revisió i la configuració programada de captura';
$string['adminauthorizeemail'] = 'Configuració d\'enviament de correu electrònic';
$string['adminauthorizesettings'] = 'Paràmetres Authorize.net';
$string['adminauthorizewide'] = 'Paràmetres Generals';
$string['adminconfighttps'] = 'Si us plau comproveu que heu "<a href="{$a->url}">posat loginhttps en ON </a>" per utilitzar aquest connector<br />en  Admin >> Variables >> Seguretat >>Seguretat HTTP.';
$string['adminconfighttpsgo'] = 'Aneu a la <a href="{$a->url}">pàgina segura</a> per configurar aquest connector.';
$string['admincronsetup'] = 'El manteniment de l scrip de cron.php no s\'ha executat en al menys 24 hores .<br />Cron que estigui habilitat si voleu utilitzar la característica captura programada. <br /><b>Habilita</b> \'el connector Authorize.Net \' i <b>configura cron</b>correctament; o <b>des habilita an_review </b> de nou.<br />Si deshabiliteu la captura-programada, les transaccions seran cancel·lades malgrat les reviseu dins de 30 dies. <br />Comprova <b>an_review</b> i entra <b>\'0\' per al camp an_capture_day</b><br />si voleu acceptar/denegar pagaments  <b>manualment</b> dins de 30 dies.';
$string['adminemailexpiredsortsum'] = 'Quantitat total';
$string['allpendingorders'] = 'Totes les ordres pendents';
$string['amount'] = 'Quantitat';
$string['anlogin'] = 'Authorize.net: nom d\'usuari';
$string['anpassword'] = 'Authorize.net: contrasenya';
$string['anreferer'] = 'Definiu l\'URL referent si l\'heu configurat en el vostre compte authorize.net. Això enviarà una línia "Referer: URL" incrustada a la sol·licitud web.';
$string['antestmode'] = 'Executa les transaccions només en mode de prova (no es cobraran diners)';
$string['antrankey'] = 'Authorize.net: clau de transacció';
$string['approvedreview'] = 'Revisió aprovada';
$string['authcaptured'] = 'Autoritzat/Registrat';
$string['authcode'] = 'Codi d\'autorització';
$string['authorize:config'] = 'Configura les instàncies d\'inscripció de Authorize.Net';
$string['authorizedpendingcapture'] = 'Autoritzat /Registre pendent';
$string['authorize:manage'] = 'Gestiona els usuaris inscrits';
$string['authorize:managepayments'] = 'Gestiona pagaments';
$string['authorize:unenrol'] = 'Suprimeix usuaris inscrits del curs';
$string['authorize:unenrolself'] = 'Cancel·la la meva inscripció en aquest curs';
$string['authorize:uploadcsv'] = 'Carrega fitxer CSV';
$string['avsresult'] = 'Resultat AVS: {$a}';
$string['canbecredit'] = 'És pot reemborsar a {$a->upto}';
$string['cancelled'] = 'Cancel·lat';
$string['capture'] = 'Registra';
$string['capturedpendingsettle'] = 'Registrat / Assentament pendent';
$string['captureyes'] = 'La targeta de crèdit serà registrada i l\'estudiant s\'inscriurà al curs. Esteu d\'acord ?';
$string['cccity'] = 'Ciutat';
$string['ccexpire'] = 'Data de venciment';
$string['ccexpired'] = 'La targeta de crèdit ha caducat';
$string['ccinvalid'] = 'El número de targeta no és vàlid';
$string['cclastfour'] = 'Últimes quatre dígits al CC';
$string['ccno'] = 'Nombre de la targeta de crèdit';
$string['ccstate'] = 'Estat';
$string['cctype'] = 'Tipus de targeta de crèdit';
$string['ccvv'] = 'Verificació de la targeta';
$string['ccvvhelp'] = 'Mireu al revers de la targeta (els tres darrers dígits)';
$string['choosemethod'] = 'Si coneixeu la clau d\'inscripció del curs, escriviu-la; en cas contrari haureu de pagar per entrar en aquest curs.';
$string['chooseone'] = 'Empleneu un o ambdós dels camps següents';
$string['cost'] = 'Cost';
$string['currency'] = 'Moneda';
$string['cutofftime'] = 'Temps desconnectat de la xarxa';
$string['delete'] = 'Destrueix';
$string['description'] = 'El mòdul Authorize.net permet configurar cursos de pagament.  Existeixen dos formes de configurar el cost del curs, (1) un cost general per al lloc sencer o (2) una opció que permet fixar el cost de cada curs. El cost del curs substitueix  el cost del lloc sencer.';
$string['echeckabacode'] = 'Codi bancari de encaminament de transit';
$string['echeckaccnum'] = 'Nombre de compte bancari';
$string['echeckacctype'] = 'Tipus de compte bancari';
$string['echeckbankname'] = 'Nom del banc';
$string['echeckfirslasttname'] = 'Titular del compte bancari';
$string['enrolenddate'] = 'Data de venciment de la inscripció';
$string['enrolenddaterror'] = 'La data de venciment de la inscripció no pot ser anterior a la data de començament de la inscripció.';
$string['enrolname'] = 'Passarel·la de pagament Authorize.net';
$string['enrolperiod'] = 'Duració de la inscripció';
$string['enrolstartdate'] = 'Data de començament';
$string['expired'] = 'Caducat';
$string['expiremonth'] = 'Mes de caducitat';
$string['expireyear'] = 'Any de caducitat';
$string['firstnameoncard'] = 'Nom a la targeta';
$string['haveauthcode'] = 'Tinc un codi d\'autorització';
$string['howmuch'] = 'Quant ?';
$string['httpsrequired'] = 'Lamento informar-lo que la seva petició no pot ser processada ara. La configuració del lloc no ha pogut fer-se de forma correcta. <br /><br /> Si us plau no entreu el vostre nombre de targeta de crèdit llevat que veieu un cadenat groc a la part inferior del navegador. Si el símbol apareix, això significa que la pàgina xifra totes les dades que s\'enviïn entre el client i el servidor. Per això la informació durant la transacció està  protegida, i per això la vostra targeta de crèdit no pot ser piratejada en Internet.';
$string['invalidaba'] = 'Codi bancari de encaminament de transit invàlid';
$string['invalidaccnum'] = 'Nombre de compte invàlid';
$string['invalidacctype'] = 'Tipus de compte invàlid';
$string['isbusinesschecking'] = 'És un txec de negocis ?';
$string['lastnameoncard'] = 'Cognom a la targeta';
$string['logindesc'] = 'Aquesta opció ha d\'estar ACTIVADA. Assegureu-vos que heu activat <a href="{$a->url}">loginhttps</a> en Administració >> Variables >> Seguretat.<br /><br />Això fa que Moodle utilitzi una connexió https segura únicament per les pàgines d\'entrada i de pagament.';
$string['logininfo'] = 'Quan es configura el compte Authorize.Net, cal posar el nom d\'usuari i cal que poseu <strong>qualsevol</strong> clau de transacció o la contrasenya al quadre apropiat. Us recomanem que entreu la clau de transacció per raons de seguretat.';
$string['messageprovider:authorize_enrolment'] = 'Missatges d\'inscripció Authorize.Net';
$string['methodcc'] = 'Targeta de crèdit';
$string['methodecheck'] = 'Txec electrònic (ACH)';
$string['missingaba'] = 'S\'ha perdut el codi bancari d\'encaminament de transit';
$string['missingaddress'] = 'S\'ha perdut l\'adreça';
$string['missingbankname'] = 'S\'ha perdut el nom del banc';
$string['missingcc'] = 'S\'ha perdut el nombre de la tageta';
$string['missingccauthcode'] = 'S\'ha perdut el codi d\'autorització';
$string['missingccexpiremonth'] = 'S\'ha perdut el mes de caducitat';
$string['missingccexpireyear'] = 'S\'ha perdut l\'any de caducitat';
$string['missingcctype'] = 'S\'ha perdut el tipus de targeta';
$string['missingcvv'] = 'S\'ha perdut el nombre de verificació';
$string['missingzip'] = 'S\'ha perdut el codi postal';
$string['mypaymentsonly'] = 'Mostra sols els meus pagaments';
$string['nameoncard'] = 'Nom que figura a la targeta';
$string['new'] = 'Nou';
$string['nocost'] = 'No hi ha  cap cost per inscriure-vos en aquest curs amb Authorize.Net!';
$string['noreturns'] = 'No retornable !';
$string['notsettled'] = 'No s\'ha assentat el registre';
$string['orderdetails'] = 'Detalls de la ordre';
$string['orderid'] = 'Identificació de la ordre';
$string['paymentmanagement'] = 'Gestió del pagament';
$string['paymentmethod'] = 'Mètode de pagament';
$string['paymentpending'] = 'El vostre pagament per a aquest curs està pendent amb aquesta ordre amb número {$a->orderid}. Mireu <a href=\'{$a->url}\'>Detalls de l\'ordre</a>.';
$string['pluginname'] = 'Authorize.Net';
$string['refund'] = 'Reemborsa';
$string['refunded'] = 'Reemborsats';
$string['returns'] = 'Retorna';
$string['reviewfailed'] = 'Ha fallat la revisió';
$string['sendpaymentbutton'] = 'Envia pagament';
$string['settled'] = 'Assentat el registre';
$string['settlementdate'] = 'Data d\'assentament del registre';
$string['shopper'] = 'Comprador';
$string['status'] = 'Habilita les inscripcions mitjançant Autorize.Net';
$string['subvoidyes'] = 'La transacció reemborsada ({$a->transid}) està essent cancel·lada i retornarà la quantitat {$a->amount} al vostre compte. Esteu d\'acord ?';
$string['tested'] = 'Comprovat';
$string['testwarning'] = 'Registra/Invalida/Reemborsa sembla que estan treballant en el mode de prova, però no s\'ha actualitzat cap dada en la base de dades.';
$string['transid'] = 'Identificació de la transacció';
$string['underreview'] = 'Sota revisió';
$string['unenrolselfconfirm'] = 'Realment voleu cancel·lar la vostra inscripció en el curs "{$a}"?';
$string['unenrolstudent'] = 'Cancel·la la inscripció de l\'estudiant ?';
$string['uploadcsv'] = 'Carrega un fitxer CSV';
$string['usingccmethod'] = 'Inscriu mitjançant la  <a href="{$a->url}"><strong>Targeta de crèdit</strong></a>';
$string['usingecheckmethod'] = 'Inscriu mitjançant el  <a href="{$a->url}"><strong>Txec electrònic</strong></a>';
$string['verifyaccountresult'] = '<b>Resultat de la verificació:</b> {$a}';
$string['void'] = 'Invalida';
$string['voidyes'] = 'La transacció es cancel·larà. N\'esteu segurs ?';
$string['welcometocoursesemail'] = 'Apreciat/da {$a->name},

Moltes gràcies pel vostres pagaments. Heu estat inscrit/a en aquests cursos:

{$a->courses}

Podeu veure el detalls dels vostres pagaments o editar el vostre perfil:
{$a->paymenturl}
{$a->profileurl}';
$string['zipcode'] = 'Codi postal';
