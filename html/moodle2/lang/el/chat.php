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
 * Strings for component 'chat', language 'el', branch 'MOODLE_24_STABLE'
 *
 * @package   chat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['ajax'] = 'Χρήση AJAX';
$string['autoscroll'] = 'Αυτόματη κύλιση';
$string['beep'] = 'Ηχητικό σήμα';
$string['cantlogin'] = 'Σφάλμα κατά την είσοδο στη συζήτηση!';
$string['chat:chat'] = 'Συμμετοχή στη συζήτηση';
$string['chat:deletelog'] = 'Διαγραφή των αρχείων καταγραφής της συζήτησης';
$string['chat:exportparticipatedsession'] = 'Εξαγωγή συζήτησης στην οποία συμμετείχε';
$string['chat:exportsession'] = 'Εξαγωγή οποιασδήποτε συζήτησης';
$string['chatintro'] = 'Κείμενο εισαγωγής';
$string['chatname'] = 'Όνομα αυτής της συζήτησης';
$string['chat:readlog'] = 'Ανάγνωση των αρχείων καταγραφής της συζήτησης';
$string['chatreport'] = 'Συνεδρίες συζήτησης';
$string['chat:talk'] = 'Συμμετοχή σε συζήτηση';
$string['chattime'] = 'Επόμενη ώρα συζήτησης';
$string['configmethod'] = 'Η κανονική μέθοδος για συζήτηση περιλαμβάνει τη συχνή επικοινωνία των προγραμμάτων πλοήγησης με το διακομιστή για ενημερώσεις. Δεν απαιτεί ρυθμίσεις και λειτουργεί παντού, αλλά μπορεί να επιφέρει φόρτο στο διακομιστή όταν οι συμμετέχοντες είναι πολλοί. Η χρήση αυτόνομης υπηρεσίας απαιτεί πρόσβαση στη γραμμή εντολών, αλλά έχει ως αποτέλεσμα ένα γρήγορο περιβάλλον συζήτησης ακόμα και με πολλούς χρήστες.';
$string['confignormalupdatemode'] = 'Οι ενημερώσεις των συζητήσεων κανονικά γίνονται χρησιμοποιώντας την ρύθμιση <em>Keep-Alive</em> της HTTP 1.1, αλλά αυτό επιβαρύνει το διακομιστή. Μια πιο εξελιγμένη μέθοδος είναι η χρήση στρατηγικής <em>Stream</em> για την ενημέρωση των χρηστών. Με το <em>Stream</em> η κλιμάκωση είναι καλύτερη (παρόμοια με την μέθοδο αυτόνομης υπηρεσίας) αλλά ίσως να μην υποστηρίζεται από το διακομιστή σας.';
$string['configoldping'] = 'Μετά από πόσο καιρό απραξίας ενός χρήστη (σε δευτερόλεπτα) θα θεωρείται απών; Αυτό είναι ένα άνω όριο, καθώς συνήθως οι αποκοπές ανιχνεύονται πολύ γρήγορα. Οι χαμηλές τιμές έχουν μεγαλύτερες απαιτήσεις από τον διακομιστή. Εάν χρησιμοποιείτε την κανονική μέθοδο,<strong>ποτέ</strong> μην το ρυθμίζετε κάτω από 2 * chat_refresh_room.';
$string['configrefreshroom'] = 'Πόσο συχνά πρέπει συζήτηση να ανανεώνεται (σε δευτερόλεπτα); Ρυθμίζοντάς το σε λίγα δευτερόλεπτα η συζήτηση θα φαίνεται γρηγορότερη, αλλά μπορεί να φορτώσει πολύ το διακομιστή σας όταν συνομιλούν πολλά άτομα. Αν χρησιμοποιείτε ενημερώσεις <em>Stream</em>, μπορείτε να επιλέξετε υψηλότερες συχνότητες ανανέωσης -- δοκιμάστε με 2.';
$string['configrefreshuserlist'] = 'Πόσο συχνά πρέπει η λίστα των χρηστών να ανανεώνεται (σε δευτερόλεπτα);';
$string['configserverhost'] = 'Το hostname του υπολογιστή στον οποίο βρίσκεται η αυτόνομη υπηρεσία είναι';
$string['configserverip'] = 'Η διεύθυνση IP που ταιριάζει στο παραπάνω hostname';
$string['configservermax'] = 'Μέγιστo πλήθος επιτρεπόμενων χρηστών';
$string['configserverport'] = 'Η θύρα του διακομιστή που θα χρησιμοποιηθεί για την αυτόνομη υπηρεσία';
$string['currentchats'] = 'Ενεργές συνεδρίες';
$string['currentusers'] = 'Τρέχοντες χρήστες';
$string['deletesession'] = 'Διαγραφή αυτή της συνεδρίας';
$string['deletesessionsure'] = 'Σίγουρα θέλετε να διαγράψετε αυτήν τη συνεδρία;';
$string['donotusechattime'] = 'Μη δημοσιοποίηση ωρών συζήτησης';
$string['enterchat'] = 'Κάντε κλικ εδώ για να μπείτε στη συζήτηση τώρα';
$string['errornousers'] = 'Δεν βρέθηκαν χρήστες!';
$string['explaingeneralconfig'] = 'Αυτές οι ρυθμίσεις ισχύουν <strong>πάντα</strong>';
$string['explainmethoddaemon'] = 'Αυτές οι ρυθμίσεις έχουν σημασία <strong>μόνο</strong> εάν έχετε επιλέξει "Αυτόνομη υπηρεσία" για μέθοδο συζήτησης';
$string['explainmethodnormal'] = 'Αυτές οι ρυθμίσεις έχουν σημασία <strong>μόνο</strong> εάν έχετε επιλέξει "Κανονική μέθοδο" για μέθοδο συζήτησης';
$string['generalconfig'] = 'Γενικές ρυθμίσεις';
$string['idle'] = 'Αδρανής';
$string['inputarea'] = 'Εισαγωγή κειμένου';
$string['invalidid'] = 'Σφάλμα κατά την εύρεση συζήτησης!';
$string['messagebeepseveryone'] = '{$a} ειδοποιεί όλους!';
$string['messagebeepsyou'] = '{$a} μόλις σας ειδοποίησε!';
$string['messageenter'] = '{$a} έχει μπει σ\' αυτή το συζήτηση';
$string['messageexit'] = '{$a} έχει φύγει από αυτή το συζήτηση';
$string['messages'] = 'Μηνύματα';
$string['method'] = 'Μέδοθος συζήτησης';
$string['methodajax'] = 'Ajax μέθοδος';
$string['methoddaemon'] = 'Αυτόνομη υπηρεσία';
$string['methodnormal'] = 'Κανονική μέθοδος';
$string['modulename'] = 'Συζήτηση';
$string['modulenameplural'] = 'Συζητήσεις';
$string['neverdeletemessages'] = 'Να μη γίνεται ποτέ διαγραφή μηνυμάτων';
$string['nextsession'] = 'Επόμενη προγραμματισμένη συζήτηση';
$string['nochat'] = 'Η συζήτηση δε βρέθηκε';
$string['noguests'] = 'Η συζήτηση δεν είναι ανοιχτή σε επισκέπτες';
$string['nomessages'] = 'Δεν υπάρχουν ακόμα μηνύματα';
$string['normalkeepalive'] = 'KeepAlive';
$string['normalstream'] = 'Stream';
$string['noscheduledsession'] = 'Δεν υπάρχει προγραμματισμένη συζήτηση';
$string['notallowenter'] = 'Η είσοδος στη συζήτηση αυτή δε σας επιτρέπεται.';
$string['notlogged'] = 'Δεν έχετε συνδεθεί!';
$string['oldping'] = 'Χρόνος διάγνωσης αποσύνδεσης';
$string['pastchats'] = 'Προηγούμενες συζητήσεις';
$string['pluginname'] = 'Συζήτηση';
$string['refreshroom'] = 'Ανανέωση';
$string['refreshuserlist'] = 'Ανανέωση χρηστών';
$string['removemessages'] = 'Διαγραφή όλων των μηνυμάτων';
$string['repeatdaily'] = 'Την ίδια ώρα κάθε μέρα';
$string['repeatnone'] = 'Χωρίς επαναλήψεις';
$string['repeattimes'] = 'Επαναλαμβανόμενη συζήτηση';
$string['repeatweekly'] = 'Την ίδια ώρα κάθε εβδομάδα';
$string['saidto'] = '<b>είπε στον/στην</b>';
$string['savemessages'] = 'Αποθήκευση προηγούμενων συζητήσεων';
$string['seesession'] = 'Προβολή συζήτησης';
$string['send'] = 'Αποστολή';
$string['sending'] = 'Αποστέλλεται';
$string['serverhost'] = 'Όνομα διακομιστή';
$string['serverip'] = 'Διεύθυνση IP διακομιστή';
$string['servermax'] = 'Μέγιστος αριθμός χρηστών';
$string['serverport'] = 'Port διακομιστή';
$string['sessions'] = 'Συνεδρίες';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = 'Όλοι μπορούν να δουν τις προηγούμενες συνεδρίες';
$string['studentseereports_help'] = 'Αν έχετε επιλέξει Όχι, μόνο χρήστες που έχουν δυνατότητα mod/chat:readlog μπορούν να δουν τα αρχεία καταγραφής συνομιλίας';
$string['updatemethod'] = 'Μέθοδος ενημέρωσης';
$string['updaterate'] = 'Ρυθμός ενημέρωσης:';
$string['userlist'] = 'Λίστα χρηστών';
$string['usingchat_help'] = '<p align="center"><b>Χρήση της Συζήτησης</b></p><p>Η δραστηριότητα Συζήτηση περιέχει διάφορα χαρακτηριστικά για να κάνει τη συζήτηση πιο ευχάριστη.</p><dl>  <dt><b>Χαμόγελα</b></dt>  <dd>Τα χαμογελαστά πρόσωπα (emoticons) που μπορείτε να πληκτρολογήσετε στο Moodle μπορούν να πληκτρολογηθούν κι εδώ. Για παράδειγμα,  :-) = <img alt="" src="pix/s/smiley.gif" /> </dd> <dt><b>Σύνδεσμοι</b></dt>  <dd>Αν πληκτρολογήσετε μια διαδικτυακή διεύθυνση (URL), αυτή θα μετατραπεί αυτόματα σε σύνδεσμο.</dd> <dt><b>Emoting</b></dt>  <dd>Μπορείτε να ξεκινήσετε μια γραμμή γράφοντας &quot;/me&quot; ή &quot;:&quot;. Για παράδειγμα, αν το όνομά σας είναι Κώστας και πληκτρολογήσετε &quot;:γελάει!&quot;     ή &quot;/me γελάει!&quot; τότε όλοι θα δουν &quot;Ο Κώστας γελάει!&quot;.</dd>  <dt><b>Ήχοι</b></dt>  <dd>Μπορείτε να στείλετε έναν ήχο σε κάποιον κάνοντας κλικ στο σύνδεσμο &quot;ειδοποίηση&quot; δίπλα στο όνομά του. Μια χρήσιμη συντόμευση για να στείλετε έναν ήχο σε όλα τα άτομα της συζήτησης μαζί είναι να πληκτρολογήσετε &quot;beep all&quot;.</dd><dt><b>HTML</b></dt>  <dd>Αν ξέρετε λίγο τον κώδικα HTML, μπορείτε να τον χρησιμοποιήσετε στο κείμενό σας για να κάνετε διάφορα πράγματα όπως εισαγωγή εικόνων, μουσική ή δημιουργία διαφορετικού, σε χρώμα και μέγεθος, κειμένου.</dd></dl>';
$string['viewreport'] = 'Δείτε προηγούμενες συνεδρίες';
