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
 * Strings for component 'certificate', language 'it', branch 'MOODLE_24_STABLE'
 *
 * @package   certificate
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addlinklabel'] = 'Aggiungi un\'altra attività collegata';
$string['addlinktitle'] = 'Clicl per aggiungere un\'altra attività collegata';
$string['areaintro'] = 'Introduzione del certifcato';
$string['awarded'] = 'Conseguito';
$string['awardedto'] = 'Conseguito da';
$string['back'] = 'Indietro';
$string['border'] = 'Bordo';
$string['borderblack'] = 'Nero';
$string['borderblue'] = 'Blu';
$string['borderbrown'] = 'Marrone';
$string['bordercolor'] = 'Bordo con linee';
$string['bordercolor_help'] = 'Poiché le immagini possono aumentare in modo significativo le dimensioni del file pdf, è possibile scegliere di stampare un bordo con linee al posto delle immagini (accertarsi che l\'opzione Immagine per il bordo sia impostata a no). L\'opzione Bordo con linee stamperà un gradevole bordo composto da tre linee di diverso spessore e del colore scelto.';
$string['bordergreen'] = 'Verde';
$string['borderlines'] = 'Linee';
$string['borderstyle'] = 'Immagine per il bordo';
$string['borderstyle_help'] = 'E\' possibile scegliere una immagine, presa dalla cartella certificate/pix/borders, da stampare sul bordo del certificato. Scegliendo No non verrà stampato nessun bordo.';
$string['certificate'] = 'Verifica del codice del certificato:';
$string['certificate:manage'] = 'Gestire certificati';
$string['certificatename'] = 'Nome del certificato';
$string['certificate:printteacher'] = 'Stampa i docenti';
$string['certificatereport'] = 'Report dei certificati';
$string['certificatesfor'] = 'Certificato di';
$string['certificate:student'] = 'Consegui il certificato';
$string['certificatetype'] = 'Tipo di certificato';
$string['certificatetype_help'] = 'E\' possibile scegliere l\'impaginazione del certificato. Il foder type del modulo certificato contiene quattro certificati di default:
A4 Embedded stamperà un certificato formato A4 con font embedded
A4 Non-Embedded stamperà un certificato formato A4 con font non-embedded
Letter Embedded stamperà un certificato formato A4 con font embedded
Letter Non-Embedded stamperà un certificato formato A4 con font non-embedded

I tipi di certificati non embedded usano i font Helvetica e Times. Se i tuoi utenti non hanno questi font sul loro computer, o se la tua lingua usa caratteri e simboli non presenti nei font Helvetica e Times, scegli i tipi embedded. I tipi embedded usano i font Dejavusans e Dejavuserif. I tipi embedded producono certificati più grandi quindi se ne sconsiglia l\'uso se non strettamente necessario.

E\' possibile aggiungere font nella cartella certificate/type. Il nome della cartella ed eventuali nuove stringhe della lingua per il nuovo tipo di certificato devono essere aggiunti ai file della lingua.';
$string['certificate:view'] = 'Visualizzare certificati';
$string['certify'] = 'Si certifica che';
$string['code'] = 'Codice';
$string['completiondate'] = 'Completamento del corso';
$string['course'] = 'Per';
$string['coursegrade'] = 'Valutazione del corso';
$string['coursename'] = 'Corso';
$string['credithours'] = 'Ore di formazione';
$string['customtext'] = 'Testo personalizzato';
$string['customtext_help'] = 'Se si desidera stampare nomi di docenti diversi da coloro che hanno il ruolo di docente nel corso, non selezionare Stampa i nome dei docenti né la firma.
Inserire invece i nomi dei docenti nel Testo personalizzato nel modo in cui si desidera farli apparire. Per default il Testo personalizzato viene stampato in basso a sinistra. E\' possibile utilizzare i seguenti tag HTML: <br>, <p>, <b>, <i>, <u>, <img> (src e width (oppure height) sono obbligatori), <a> (href è obbligatorio), <font> (attributi consentiti: color, (codice colore hex), face, (arial, times, courier, helvetica, symbol)).';
$string['date'] = 'Il';
$string['datefmt'] = 'Formato data';
$string['datefmt_help'] = 'E\' possibile scegliere il formato della data da stampare sul certificato. E\' anche possibile stampare la data nel formato corrispondente a quello previsto nella lingua dell\'utente.';
$string['datehelp'] = 'Data';
$string['deletissuedcertificates'] = 'Elimina certificati emessi';
$string['delivery'] = 'Modalità di consegna';
$string['delivery_help'] = 'Gli studenti possono ricevere i certificati nelle seguenti modalità:
In una nuova finestra: il certificato verrà aperto in una nuova finestra browser.
Forza il download: verrà aperta la finestra di download del browser.
Via email: il certificato verrà emesso e consegnato allo studente come allegato via email. Dopo aver ricevuto il certificato, se lo studente fa click sul link dell\'attività certificato dalla home page del corso, verrà visualizzata la data di ricezione  e potrà rivedere il proprio certificato.';
$string['designoptions'] = 'Opzioni di formattazione';
$string['download'] = 'Forza il download';
$string['emailcertificate'] = 'Via email (è obbligatorio scegliere anche Salva i certificati)';
$string['emailothers'] = 'Avvisa altre persone';
$string['emailothers_help'] = 'E\' possibile inserire un elenco di email, separate da virgola, appartenenti a persone da avvisare dell\'avvenuta emissione di certificati.';
$string['emailstudenttext'] = 'In allegato il tuo certificato del corso {$a->course}.';
$string['emailteachermail'] = '{$a->student} ha conseguito il certificato:
\'{$a->certificate}\'
del corso {$a->course}.

Puoi rivedere il certificato a questo link:

{$a->url}';
$string['emailteachermailhtml'] = '{$a->student} ha conseguito il certificato:
\'{$a->certificate}\'
del corso {$a->course}.

Puoi rivedere il certificato a questo link:

<a href="{$a->url}">Certificate Report</a>.';
$string['emailteachers'] = 'Avvisa i docenti via email';
$string['emailteachers_help'] = 'E\' possibile avvisare i docenti via email quando gli studenti conseguono il certificato.';
$string['entercode'] = 'Inserisci il codice da verificare:';
$string['getcertificate'] = 'Consegui il tuo certificato';
$string['grade'] = 'Valutazione';
$string['gradedate'] = 'Data della valutazione';
$string['gradefmt'] = 'Formato della valutazione';
$string['gradefmt_help'] = 'Sono disponibili tre formati di stampa della valutazione:

Percentuale: la valutazione viene stampata in percentuale.
Punteggio:  la valutazione viene stampata in punti.
Valutazione letterale: la valutazione percentuale viene stampata in lettere.';
$string['gradeletter'] = 'Valutazione letterale';
$string['gradepercent'] = 'Percentuale';
$string['gradepoints'] = 'Punteggio';
$string['incompletemessage'] = 'Per scaricare il tuo certificato, devi prima completare tutte le attività richieste.';
$string['intro'] = 'Introduzione';
$string['issued'] = 'Emesso';
$string['issueddate'] = 'Data di emisisone';
$string['issueoptions'] = 'Opzioni di emissione';
$string['landscape'] = 'Orizzontale';
$string['lastviewed'] = 'Hai ricevuto questo certificato il:';
$string['letter'] = 'Letter';
$string['lockingoptions'] = 'Opzioni di blocco';
$string['modulename'] = 'Certificato';
$string['modulenameplural'] = 'Certificati';
$string['mycertificates'] = 'I miei certificati';
$string['nocertificates'] = 'Non ci sono certificati';
$string['nocertificatesissued'] = 'Non sono stati emessi certificati';
$string['nocertificatesreceived'] = 'non ha ottenuto nessun certificato';
$string['nogrades'] = 'Non ci sono valutazioni disponibili';
$string['notapplicable'] = 'N/A';
$string['notfound'] = 'Non è stato possibile validare il numero del certificato';
$string['notissued'] = 'Non emesso';
$string['notissuedyet'] = 'Non ancora emesso';
$string['notreceived'] = 'Non hai ricevuto questo certificato';
$string['openbrowser'] = 'In una nuova finestra';
$string['opendownload'] = 'Fai click sul pulsante sottostante per scaricare il certificato sul tuo computer.';
$string['openemail'] = 'Fai click sul pulsante sottostante per ricevere il certificato via email come allegato.';
$string['openwindow'] = 'Fai click sul pulsante sottostante per aprire il tuo certificato in una nuova finestra.';
$string['or'] = 'O';
$string['orientation'] = 'Orientamento';
$string['orientation_help'] = 'Il certificato può avere un orientamento orizzontale o verticale.';
$string['pluginadministration'] = 'Gestione certificato';
$string['pluginname'] = 'Certificato';
$string['portrait'] = 'Verticale';
$string['printdate'] = 'Stampa la data';
$string['printdate_help'] = 'E\' possibile scegliere la data da stampare nel certificato. Selezionando "data di completamento del corso", se lo studente non  ha completato il corso, verrà stampata la data in cui il certificato è stato emesso.E\' anche possibile scegliere di stampare la data in funzione della data di ottenimento della valutazione per una data attività. In questo caso se il certificato viene emesso prima della valutazione dell\'attività, verrà stampata la data in cui il certificato è stato emesso';
$string['printerfriendly'] = 'Versione per la stampa';
$string['printgrade'] = 'Stampa la valutazione';
$string['printgrade_help'] = 'E\' possibile scegliere qualsiasi elemento di valutazione presente nel registro valutatore per stamparlo nel certificato. Gli elementi di valutazione sono elencati nello stesso ordine con cui appaiono nel registro valutatore. E\' anche possibile scegliere sotto il formato di stampa della valutazione.';
$string['printhours'] = 'Stampa ore di formazione';
$string['printhours_help'] = 'E\' possibile inserire le ore di formazione per stamparle nel certificato';
$string['printnumber'] = 'Stampa il codice';
$string['printnumber_help'] = 'Un codice univoco di 10 caratteri casuali alfabetici e numerici da stampare nel certificato. Il codice permette di verificare il codice stampato sul certificato.';
$string['printoutcome'] = 'Stampa obiettivi';
$string['printoutcome_help'] = 'E\' possibile stampare sul certificato il nome di un qualsiasi obiettivo del corso assieme al raggiungimento dell\'utente. Ad esempio: Obiettivo del compito: competente';
$string['printseal'] = 'Immagine per il logo o il timbro';
$string['printseal_help'] = 'E\' possibile scegliere una immagine, presente nella cartella certificate/pix/seals folder, da stampare nel certificato come logo o come timbro. Per default l\'immagine viene stampata in basso a destra del certificato';
$string['printsignature'] = 'Immagine per la firma';
$string['printsignature_help'] = 'E\' possibile scegliere una immagine, presente nella cartella certificate/pix/signatures, da stampare nel certificato come firma. E\' possibile stampare una immagine grafica di una fiorma oppure una linea per firme autografe. Per default l\'immagine viene stampata in basso a sinistra del certificato';
$string['printteacher'] = 'Stampa i nomi dei docenti';
$string['printteacher_help'] = 'Per stampare sul certificato il nome del docente si deve assegnare il ruolo di docente a livello di modulo. In questo modo, se nel corso sono presenti più di un docente o più di un certificato, è possibile stampare docenti diversi su certificati diversi. Fai click per modificare il certificato, poi fai click su Ruoli assegnati localmente ed assegna il ruolo di Docente al certificato (non è necessario che questi utenti abbiamo il ruolo di docente a livello di corso). I nomi di questi utenti  saranno stampati sul certificato.';
$string['printwmark'] = 'Immagine di sfondo';
$string['printwmark_help'] = 'E\' possibile inserire un\'immagine sullo sfondo del certificato. Lo sfondo è un\'immagine sfumata, come un logo, un timbro, un crest o qualsiasi altra cosa che si desidera stampare sullo sfondo.';
$string['receivedcerts'] = 'Certificati conseguiti';
$string['receiveddate'] = 'Data di conseguimento';
$string['removecert'] = 'I certificati emessi sono stati eliminati';
$string['report'] = 'Report';
$string['reportcert'] = 'Report dei certificati';
$string['reportcert_help'] = 'Selezionando si, la data di emissione di questo certificato, il codice ed il nome del corso saranno disponibili nel report dei certificati dell\'utente. Se hai scelto di stampare la valutazione, nel report sarà presente anche essa.';
$string['reviewcertificate'] = 'Rivedi i tuoi certificati';
$string['savecert'] = 'Salva i certificati';
$string['savecert_help'] = 'Permette di salvare i certificati emessi in formato pdf nel folder moddata del corso. Nel report dei certificati sarà disponibili un link per visualizzare i certificati salvati.';
$string['sigline'] = 'linea';
$string['statement'] = 'ha completato il corso';
$string['summaryofattempts'] = 'Panoramica dei certificati conseguiti in precedenza';
$string['textoptions'] = 'Opzioni testo';
$string['title'] = 'CERTIFICATO';
$string['to'] = 'Conferito a';
$string['typeA4_embedded'] = 'A4 embedded';
$string['typeA4_non_embedded'] = 'A4 non-embedded';
$string['typeletter_embedded'] = 'Letter embedded';
$string['typeletter_non_embedded'] = 'Letter non-embedded';
$string['userdateformat'] = 'Formato data secondo la lingua dell\'utente';
$string['validate'] = 'Verifica';
$string['verifycertificate'] = 'Verifica certificato';
$string['viewcertificateviews'] = 'Visualizza i {$a} certificati emessi';
$string['viewed'] = 'Hai conseguito un certificato di:';
$string['viewtranscript'] = 'Visualizza certificati';
