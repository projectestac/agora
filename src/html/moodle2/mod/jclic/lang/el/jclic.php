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
 * Greek strings for jclic
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Yannis Kaskamanidis (kiolalis@gmail.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activitydone'] = 'Οι δραστηριότητες ολοκληρώθηκαν';
$string['activitysolved'] = 'Οι δραστηριότητες ολοκληρώθηκαν με επιτυχία';
$string['attempts'] = 'Προσπάθειες';
$string['avaluation'] = 'Κριτήρια αξιολόγησης';
$string['avaluation_score'] = 'Επίτευξη συνολικής βαθμολογίας';
$string['avaluation_solved'] = 'Επίλυση αυτού του αριθμού διαφορετικών δραστηριοτήτων';
$string['description'] = 'Περιγραφή';
$string['height']='Ύψος';
$string['hideall']='Προβολή μόνο των περιλήψεων';
$string['lastaccess']='Τελευταία επίσκεψη';
$string['maxattempts'] = 'Μέγιστος αριθμός δοκιμών';
$string['maxgrade'] = 'Βαθμολογία/Δραστηριότητες που πρέπει να επιτευχθούν';
$string['modulename'] = 'JClic';
$string['modulenameplural'] = 'JClic';
$string['msg_noattempts']= 'Έχετε επιχειρήσει να ολοκληρώσετε αυτή τη δραστηριότητα με τον μέγιστο αριθμό προσπαθειών';
$string['score']='Βαθμολογία';
$string['sessions']='Συνεδρίες';
$string['showall']='Προβολή λεπτομερειών όλων των συνεδριών';
$string['size']='Μέγεθος';
$string['starttime']= 'Ημερομηνία έναρξης';
$string['skin'] = 'Θέμα';
$string['totals']= 'Σύνολα';
$string['totaltime']= 'Συνολικός χρόνος';
$string['unlimited'] = 'Απεριόριστο';
$string['url'] = 'URL';
$string['width']='Πλάτος';

/* Revision 20070305 */
$string['actions']='Ενέργειες';
$string['activity']='Δραστηριότητα';
$string['msg_nosessions']='Αυτή η δραστηριότητα του JClic δεν διαθέτει ακόμη καμία συνεδρία';
$string['solved']='Σωστό';
$string['time']='Χρόνος';

/* Revision 20071002 */
$string['header_jclic']='Ρυθμίσεις JClic';
$string['header_score']='Ρυθμίσεις Αξιολόγησης';

/* Revision 20091023 */
$string['deleteallsessions'] = 'Διαγραφή όλων των συνεδριών';

/* Revision 20110119  - version 0.1.0.11 */
$string['lang']='Γλώσσα';
$string['exiturl']='Έξοδος από το URL';


/* Revision Moodle 2.X */
$string['availabledate'] = 'Διαθέσιμο από';
$string['closebeforeopen'] = 'Αδυναμία ενημέρωσης του JClic. Έχετε ορίσει ημερομηνία λήξης προγενέστερη της ημερομηνίας διαθεσιμότητας.';
$string['duedate'] = 'Ημερομηνία λήξης';
$string['exiturl_help'] = 'Αυτό είναι το URL που εμφανίζεται όταν οι μαθητές ολοκληρώνουν την τελευταία δραστηριότητα του JClic.
    
To make work this redirection it\'s necessary to associate to the last activity in the Sequences tab the action "Exit JClic" in the Forward arrow section.';
$string['expired'] = 'Συγνώμη, αλλά αυτή η δραστηριότητα έκλεισε στις {$a} και δεν είναι πλέον διαθέσιμη';
$string['filetype'] = 'Είδος';
$string['filetype_help'] = 'Αυτή η ρύθμιση καθορίζει τον τρόπο συμπερίληψης αυτής της δραστηριότητας του JClic στο μάθημα. Υπάρχουν δύο επιλογές:

* Uploaded JClic - Enables a valid ".jclic.zip" package to be chosen by the file picker. 
* External URL - Enables a URL to be specified. Note: The URL must start with http(s) or www and contain a valid "jclic.zip" file.';
$string['filetypeexternal'] = 'Εξωτερικό URL';
$string['filetypelocal'] = 'Φορτωμένο JClic';
$string['invalidjclicfile'] = 'Προσδιορίστηκε ένα μη έγκυρο αρχείο JClic. Θα πρέπει να έχει κατάληξη ".jclic.zip".';
$string['invalidurl'] = 'Προσδιορίστηκε ένα μη έγκυρο URL. Θα πρέπει να αρχίζει με http(s) και να παραπέμπει σε ένα έγκυρο αρχείο ".jclic.zip".';
$string['jclic'] = 'JClic';
$string['jclicjarbase']='Με βάση Jar';
$string['jclicjarbase_help']='Διεύθυνση Ιστού όπου βρίσκονται όλα τα αρχεία jar του JClic';
$string['jclicurl'] = 'URL';
$string['jclicurl_help'] = 'Αυτή η ρύθμιση ενεργοποιεί ένα URL για τον προσδιορισμό ενός αρχείου JClic, καλύτερα απ\' ότι με επιλογή του αρχείου μέσω ενός επιλογέα.';
$string['jclicfile'] = 'Αρχείο JClic';
$string['jclicfile_help'] = 'Το αρχείο ".jclic.zip" που περιέχει τα αρχεία του JClic.';
$string['lap']='Απαιτούμενος χρόνος';
$string['lap_help']='Χρόνος συναλλαγών μεταξύ πελατών και διακομιστή (σε δευτερόλεπτα)';
$string['modulename_help'] = 'Το <a href="http://clic.xtec.cat" target="_blank">JClic</a>  είναι ένα έργο του Υπουργείου Παιδείας της Καταλωνίας. Αποτελείται από εφαρμογές ανοιχτού λογισμού που επιτρέπουν τη δημιουργία αρκετών τύπων πολυμεσικών εκπαιδευτικών δραστηριοτήτων: παζλ, παιχνίδια αντιστοίχισης, δραστηριότητες κειμένου, σταυρόλεξα, αναζήτηση λέξεων και άλλα. Επιπροσθέτως, το <a href="http://clic.xtec.cat/db/listact_ca.jsp" target="_blank">ClicZone</a>  προσφέρει ένα αποθετήριο όπου θα βρείτε περισσότερες από χίλιες έτοιμες δραστηριότητες, οι οποίες δημιουργήθηκαν από εκπαιδευτικούς και άλλους επαγγελματίες της εκπαίδευσης, οι οποίοι επιθυμούν τον διαμοιρασμό της δουλειάς τους.

This module allows teachers to add JClick activities to any course and to track pupils\' results (time spent on each of the activities, number of tries, score...).';
$string['notopenyet'] = 'Συγνώμη, αλλά αυτή η δραστηριότητα δεν είναι διαθέσιμη μέχρι τις {$a}';
$string['pluginadministration'] = 'Διαχείριση JClic';
$string['pluginname'] = 'JClic';
$string['preview_jclic']='Εμφάνιση δραστηριότητας του JClic'; // Preview JClic activity
$string['return_results']='Επιστροφή στα αποτελέσματα';
$string['show_my_results']='Προβολή αποτελεσμάτων';  // Show my results
$string['solveddone'] = 'Ολοκληρωμένες δραστηριότητες';
$string['urledit'] = 'Αρχείο δραστηριότητας JClic';
$string['urledit_help'] = 'Το αρχείο "jclic.zip" όπου θα βρείτε το πακέτο δραστηριοτήτων του JClic.';
