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
 * Strings for component 'role', language 'el', branch 'MOODLE_24_STABLE'
 *
 * @package   role
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addinganewrole'] = 'Προσθήκη νέου ρόλου';
$string['addingrolebycopying'] = 'Προσθήκη νέου ρόλου βασισμένου στον {$a}';
$string['addrole'] = 'Προσθήκη ρόλου';
$string['advancedoverride'] = 'Ανώτερος υπερισχύον ρόλος';
$string['allow'] = 'Άδεια';
$string['allowassign'] = 'Να επιτρέπεται η ανάθεση ρόλων';
$string['allowed'] = 'Επιτρέπεται';
$string['allowoverride'] = 'Δυνατότητα αλλαγής ρόλου';
$string['allowroletoassign'] = 'Να επιτρέπεται στους χρήστες με ρόλο {$a->fromrole} να αναθέτουν το ρόλο {$a->targetrole}';
$string['allowroletooverride'] = 'Να επιτρέπεται στους χρήστες με ρόλο {$a->fromrole} να κάνουν υπέρβαση του ρόλου {$a->targetrole}';
$string['allowroletoswitch'] = 'Να επιτρέπεται στους χρήστες με ρόλο {$a->fromrole} να αλλάζουν ρόλο σε {$a->targetrole}';
$string['allowswitch'] = 'Να επιτρέπονται αλλαγές ρόλων';
$string['allsiteusers'] = 'Όλοι οι χρήστες';
$string['archetype'] = 'Ρόλος αρχέτυπο';
$string['archetypecoursecreator'] = 'ΑΡΧΕΤΥΠΟ: Δημιουργός μαθημάτων';
$string['archetypeeditingteacher'] = 'ΑΡΧΕΤΥΠΟ: Καθηγητής (επιτρέπεται να κάνει αλλαγές)';
$string['archetypefrontpage'] = 'ΑΡΧΕΤΥΠΟ: Αυθεντικοποίηση χρήστη στην πρώτη σελίδα';
$string['archetype_help'] = 'Ο ρόλος αρχέτυπο καθορίζει τα δικαιώματα όταν ένας ρόλος επαναφέρεται στις προεπιλεγμένες ρυθμίσεις. Καθορίζει επίσης οποιαδήποτε νέα διακιώματα για το ρόλο, όταν αναβαθμίζεται ο ιστότοπος.';
$string['archetypemanager'] = 'ΑΡΧΕΤΥΠΟ: Διαχειριστής';
$string['archetypeteacher'] = 'ΑΡΧΕΤΥΠΟ: Καθηγητής (δεν του επιτρέπεται να κάνει αλλαγές)';
$string['assignanotherrole'] = 'Ανάθεση άλλου ρόλου';
$string['assignerror'] = 'Σφάλμα κατά την ανάθεση του ρόλου {$a->role} στο χρήστη {$a->user}.';
$string['assignglobalroles'] = 'Ανάθεση γενικών ρόλων';
$string['assignmentcontext'] = 'Πλαίσιο απόδοσης';
$string['assignmentoptions'] = 'Επιλογές απόδοσης';
$string['assignrolenameincontext'] = 'Ανάθεση του ρόλου {$a->role} στο πλαίσιο {$a->context}';
$string['assignroles'] = 'Ανάθεση ρόλων';
$string['assignroles_help'] = '<p align="center"><b>Ανάθεση ρόλων</b></p>

<p>
Με την ανάθεση ενός ρόλου σε ένα πλαίσιο(context), δίνεται πρόσβαση σε αυτό και στα κατώτερα περιβάλλοντα.
</p>

<p>
Πλαίσια(Contexts):
<ol>
<li>Ιστοχώρος/Σύστημα</li>
<li>Κατηγορίες Μαθημάτων</li>
<li>Μαθήματα</li>
<li>Μπλοκ και Δραστηριότητες</li>
</ol>
</p>

<p>
Βλέπετε
<a href="help.php?file=roles.html">Ρόλοι</a>,
<a href="help.php?file=contexts.html">Περιβάλλοντα</a>,
<a href="help.php?file=permissions.html">Προσβάσεις</a> and
<a href="help.php?file=overrides.html">Παρακάμψεις</a>.
</p>';
$string['assignrolesin'] = 'Ανάθεση ρόλων στο {$a}';
$string['assignrolesrelativetothisuser'] = 'Ανάθεση ρόλων συγκριτικά με αυτό το χρήστη';
$string['backtoallroles'] = 'Επιστροφή στη λίστα ρόλων';
$string['backup:anonymise'] = 'Ανώνυμα δεδομένα χρήστη στα αντίγραφα ασφαλείας';
$string['backup:backupactivity'] = 'Δημιουργία αντιγράφου ασφαλείας στις δραστηριότητες';
$string['backup:backupcourse'] = 'Αντίγραφα ασφαλείας μαθημάτων';
$string['backup:backupsection'] = 'Αντίγραφα ασφαλείας τμημάτων';
$string['backup:backuptargethub'] = 'Αντίγραφα ασφαλείας για την κοινότητα (hub)';
$string['backup:backuptargetimport'] = 'Αντίγραφα ασφαλείας για εισαγωγή';
$string['backup:configure'] = 'Διαμόρφωση επιλογών αντιγράφων ασφαλείας';
$string['backup:downloadfile'] = 'Λήψη αρχείων από περιοχές αντιγράφων ασφαλείας';
$string['backup:userinfo'] = 'Αντίγραφα ασφαλείας δεδομένων χρήστη';
$string['block:edit'] = 'Επεξεργασία ρυθμίσεων μπλοκ';
$string['block:view'] = 'Προβολή μπλοκ';
$string['blog:associatecourse'] = 'Σύνδεση καταχωρήσεων ιστολογίου με τα μαθήματα';
$string['blog:associatemodule'] = 'Σύνδεση καταχωρήσεων ιστολογίου με τις ενότητες δραστηριοτήτων';
$string['blog:create'] = 'Δημιουργία καταχωρήσεων σε ιστολόγιο';
$string['blog:manageentries'] = 'Επεξεργασία καταχωρήσεων';
$string['blog:manageexternal'] = 'Επεξεργασία και διαχείριση εξωτερικών ιστολογίων';
$string['blog:manageofficialtags'] = 'Διαχείριση των επίσημων ετικετών';
$string['blog:managepersonaltags'] = 'Διαχείριση προσωπικών ετικετών';
$string['blog:view'] = 'Προβολή καταχωρήσεων ιστολογίου';
$string['blog:viewdrafts'] = 'Προβολή προσχεδίου καταχωρήσεων ιστολογίου';
$string['calendar:manageentries'] = 'Διαχείριση των καταχωρήσεων οποιουδήποτε ημερολογίου';
$string['calendar:managegroupentries'] = 'Διαχείριση ομαδικών γεγονότων';
$string['calendar:manageownentries'] = 'Διαχείριση προσωπικών γεγονότων';
$string['capabilities'] = 'Δυνατότητες';
$string['capability'] = 'Δυνατότητα';
$string['category:create'] = 'Δημιουργία κατηγοριών';
$string['category:delete'] = 'Διαγραφή κατηγοριών';
$string['category:manage'] = 'Διαχείριση κατηγοριών';
$string['category:update'] = 'Τροποποίηση κατηγοριών';
$string['category:viewhiddencategories'] = 'Προβολή κρυφών κατηγοριών';
$string['category:visibility'] = 'Προβολή κρυφών κατηγοριών';
$string['checkglobalpermissions'] = 'Έλεγχος δυνατοτήτων συστήματος';
$string['checkpermissions'] = 'Έλεγχος δυνατοτήτων';
$string['checkpermissionsin'] = 'Έλεγχος δυνατοτήτων στο {$a}';
$string['checksystempermissionsfor'] = 'Έλεγχος δυνατοτήτων συστήματος για το χρήστη {$a->fullname}';
$string['checkuserspermissionshere'] = 'Έλεγχος δυνατοτήτων για το χρήστη {$a->fullname} σε {$a->contextlevel}';
$string['chooseroletoassign'] = 'Παρακαλώ επιλέξτε ρόλο προς ανάθεση';
$string['cohort:assign'] = 'Προσθήκη και διαγραφή μελών στις ομάδες χρηστών';
$string['cohort:manage'] = 'Δημιουργία, διαγραφή και μετακίνηση ομάδων χρηστών';
$string['cohort:view'] = 'Εμφάνιση όλων των ομάδων χρηστών (cohort) της πλατφόρμας';
$string['comment:delete'] = 'Διαγραφή σχολίων';
$string['comment:post'] = 'Αποστολή σχολίων';
$string['comment:view'] = 'Ανάγνωση  σχολίων';
$string['community:add'] = 'Χρήση του μπλοκ της κοινότητας για αναζήτηση κόμβων και εύρεση μαθημάτων';
$string['community:download'] = 'Κατέβασμα μαθήματος από το μπλοκ της κοινότητας';
$string['context'] = 'Πλαίσιο';
$string['course:activityvisibility'] = 'Προβολή/απόκρυψη δραστηριοτήτων';
$string['course:bulkmessaging'] = 'Αποστολή ενός μηνύματος σε πολλούς παραλήπτες';
$string['course:changecategory'] = 'Τροποποίηση κατηγορίας μαθήματος';
$string['course:changefullname'] = 'Τροποποίηση ονόματος μαθήματος';
$string['course:changeidnumber'] = 'Τροποποίηση κωδικού αριθμού μαθήματος';
$string['course:changeshortname'] = 'Τροποποίηση σύντομου ονόματος μαθήματος';
$string['course:changesummary'] = 'Τροποποίηση σύνοψης μαθήματος';
$string['course:create'] = 'Δημιουργία μαθημάτων';
$string['course:delete'] = 'Διαγραφή μαθημάτων';
$string['course:enrolconfig'] = 'Διαμόρφωση instances εγγραφής στα μαθήματα';
$string['course:enrolreview'] = 'Ανασκόπηση εγγραφών μαθήματος';
$string['course:manageactivities'] = 'Διαχείριση δραστηριοτήτων';
$string['course:managefiles'] = 'Διαχείριση αρχείων';
$string['course:managegrades'] = 'Διαχείριση βαθμών';
$string['course:managegroups'] = 'Διαχείριση ομάδων';
$string['course:managescales'] = 'Διαχείριση κλιμάκων';
$string['course:publish'] = 'Δημοσίευση ενός μαθήματος στον κόμβο';
$string['course:request'] = 'Αίτηση για δημιουργία μαθημάτων';
$string['course:reset'] = 'Επαναφορά αρχικών ρυθμίσεων μαθήματος';
$string['course:sectionvisibility'] = 'Προβολή/απόκρυψη ενοτήτων';
$string['course:setcurrentsection'] = 'Χαρακτηρισμός μιας ενότητας ως τρέχουσα';
$string['course:update'] = 'Επεξεργασία ρυθμίσεων μαθήματος';
$string['course:useremail'] = 'Ενεργοποίηση/απενεργοποίηση διεύθυνσης email';
$string['course:view'] = 'Προβολή μαθημάτων';
$string['course:viewcoursegrades'] = 'Προβολή βαθμών';
$string['course:viewhiddenactivities'] = 'Προβολή κρυφών δραστηριοτήτων';
$string['course:viewhiddencourses'] = 'Προβολή κρυφών μαθημάτων';
$string['course:viewhiddensections'] = 'Προβολή κρυφών ενοτήτων';
$string['course:viewhiddenuserfields'] = 'Προβολή κρυφών πεδίων χρηστών';
$string['course:viewparticipants'] = 'Προβολή συμμετεχόντων';
$string['course:viewscales'] = 'Προβολή κλιμάκων';
$string['course:visibility'] = 'Προβολή/απόκρυψη μαθημάτων';
$string['createrolebycopying'] = 'Δημιουργία νέου ρόλου βασισμένου στον {$a}';
$string['createthisrole'] = 'Δημιουργία αυτού του ρόλου';
$string['currentcontext'] = 'Τρέχον πλαίσιο';
$string['currentrole'] = 'Τρέχον ρόλος';
$string['defaultrole'] = 'Αρχική κατηγορία χρηστών';
$string['defaultx'] = 'Προκαθορισμένο: {$a}';
$string['defineroles'] = 'Διαχείριση ρόλων';
$string['deletecourseoverrides'] = 'Διαγραφή όλων των υπερβάσεων στο μάθημα';
$string['deletelocalroles'] = 'Διαγραφή όλων των τοπικών αναθέσεων ρόλων';
$string['deleterolesure'] = '<p>Είστε απόλυτα βέβαιος ότι θέλετε να διαγράψετε το ρόλο {$a->name} ({$a->shortname})?</p><p>Αυτή τη στιγμή {$a->count} χρήστες έχουν αυτόν το ρόλο.';
$string['deletexrole'] = 'Διαγραφή του ρόλου {$a}';
$string['duplicaterole'] = 'Αντιγραφή ρόλου';
$string['duplicaterolesure'] = 'Είστε απόλυτα βέβαιος ότι θέλετε να αντιγράψετε το ρόλο {$a->name} ({$a->shortname})?</p>';
$string['editingrolex'] = 'Τροποποίηση του ρόλου {$a}';
$string['editrole'] = 'Επεξεργασία ρόλου';
$string['editxrole'] = 'Τροποποίηση του ρόλου {$a}';
$string['errorbadrolename'] = 'Εσφαλμένο όνομα ρόλου';
$string['errorbadroleshortname'] = 'Εσφαλμένο όνομα ρόλου';
$string['errorexistsrolename'] = 'Υπάρχει ήδη ένας ρόλος με το ίδιο όνομα';
$string['errorexistsroleshortname'] = 'Υπάρχει ήδη ένας ρόλος με το ίδιο όνομα';
$string['existingadmins'] = 'Υπάρχοντες διαχειριστές ιστοσελίδας';
$string['existingusers'] = '{$a} υπάρχοντες χρήστες';
$string['explanation'] = 'Επεξήγηση';
$string['extusers'] = 'Υπάρχοντες χρήστες';
$string['extusersmatching'] = 'Υπάρχοντες χρήστες που ταιριάζουν στο \'{$a}\'';
$string['frontpageuser'] = 'Αυθεντικοποίηση χρήστη στην πρώτη σελίδα';
$string['globalrole'] = 'Ρόλος συστήματος';
$string['globalroleswarning'] = 'ΠΡΟΣΟΧΗ! Οι ρόλοι που αποδίδετε στους χρήστες από αυτήν την σελίδα, εφαρμόζονται σε ολόκληρο το δικτυακό τόπο, συμπεριλαμβανόμενης της αρχικής σελίδας και όλων των μαθημάτων.';
$string['gotoassignroles'] = 'Ανάθεση ρόλων σ\' αυτό το {$a->contextlevel}';
$string['gotoassignsystemroles'] = 'Ανάθεση ρόλων συστήματος';
$string['grade:edit'] = 'Τροποποίηση βαθμών';
$string['grade:export'] = 'Εξαγωγή βαθμών';
$string['grade:hide'] = 'Απόκρυψη/εμφάνιση βαθμών';
$string['grade:import'] = 'Εισαγωγή βαθμών';
$string['grade:lock'] = 'Κλείδωμα βαθμών';
$string['grade:manage'] = 'Διαχερίριση βαθμών';
$string['grade:manageletters'] = 'Διαχείριση βαθμών (γραμμάτων)';
$string['grade:manageoutcomes'] = 'Διαχείριση βαθμών (καταλήξεις)';
$string['grade:override'] = 'Υπερίσχυση βαθμών';
$string['grade:unlock'] = 'Ξεκλείδωμα βαθμών';
$string['grade:view'] = 'Προβολή των βαθμών του';
$string['grade:viewall'] = 'Προβολή των βαθμών άλλων χρηστών';
$string['grade:viewhidden'] = 'Προβολή των κρυφών βαθμών του';
$string['hidden'] = 'Κρυφά';
$string['highlightedcellsshowdefault'] = 'Τα φωτισμένα κελιά στον παρακάτω πίνακα δείχνουν την εξορισμού δυνατότητα για το ρόλο αυτό, βασισμένα στον \'Ιστορικό τύπο ρόλου\'.';
$string['highlightedcellsshowinherit'] = 'Τα φωτισμένα κελιά στον παρακάτω πίνακα δείχνουν την δυνατότητα (αν υπάρχει) που πρόκειται να κληρονομηθεί. Αφήστε όλες τις δυνατότητες ρυθμισμένες στην Κληρονομιά εκτός από αυτές τις οποίες θέλετε να αλλάξετε.';
$string['inactiveformorethan'] = 'ανενεργό για παραπάνω από {$a->timeperiod}';
$string['ingroup'] = 'στην ομάδα "{$a->group}"';
$string['inherit'] = 'Κληρονομικότητα';
$string['legacy:admin'] = 'ΙΣΤΟΡΙΚΟΣ ΡΟΛΟΣ: Διαχειριστής';
$string['legacy:coursecreator'] = 'ΙΣΤΟΡΙΚΟΣ ΡΟΛΟΣ: Δημιουργός Μαθημάτων';
$string['legacy:editingteacher'] = 'ΙΣΤΟΡΙΚΟΣ ΡΟΛΟΣ: Καθηγητής (επιτρέπονται αλλαγές)';
$string['legacy:guest'] = 'ΙΣΤΟΡΙΚΟΣ ΡΟΛΟΣ: Επισκέπτης';
$string['legacy:student'] = 'ΙΣΤΟΡΙΚΟΣ ΡΟΛΟΣ: Μαθητής';
$string['legacy:teacher'] = 'ΙΣΤΟΡΙΚΟΣ ΡΟΛΟΣ: Καθηγητής (δεν επιτρέπονται αλλαγές)';
$string['legacytype'] = 'Είδος ιστορικού ρόλου';
$string['legacy:user'] = 'ΙΣΤΟΡΙΚΟΣ ΡΟΛΟΣ: Χρήστης';
$string['listallroles'] = 'Εμφάνιση όλων των ρόλων';
$string['localroles'] = 'Τοπικά αναθεμένοι ρόλοι';
$string['manageadmins'] = 'Εξεπεργασία διαχειριστών ιστοσελίδας';
$string['manager'] = 'Διαχειριστής';
$string['managerdescription'] = 'Οι διαχειριστές μπορούν να έχουν πρόσβαση στο μάθημα και να το τροποποιούν, συνήθως όμως δεν συμμετέχουν στα μαθήματα.';
$string['manageroles'] = 'Διαχείριση ρόλων';
$string['maybeassignedin'] = 'Τύποι πλαισίου στους οποίους μπορεί να ανατεθεί ο ρόλος αυτός';
$string['morethan'] = 'Περισσότερο από {$a}';
$string['multipleroles'] = 'Πολλαπλοί ρόλου';
$string['my:manageblocks'] = 'Διαχείριση μπλοκ της σελίδας myMoodle';
$string['neededroles'] = 'Αδειοδοτημένοι ρόλοι';
$string['nocapabilitiesincontext'] = 'Δεν υπάρχουν διαθέσιμες δυνατότες σε αυτό το πλαίσιο';
$string['noneinthisx'] = 'Κανένας σ\' αυτό το {$a}';
$string['noneinthisxmatching'] = 'Δεν υπάρχουν χρήστες παρόμοιοι με \'{$a->search}\' σ\' αυτό το {$a->contexttype}';
$string['noroleassignments'] = 'Ο χρήστης αυτός δεν έχει αναθέσεις ρόλων πουθενά στο Moodle.';
$string['notabletoassignroleshere'] = 'Δεν μπορείτε να αναθέσετε ρόλους εδώ';
$string['notabletooverrideroleshere'] = 'Δεν μπορείτε να υπερβείτε τις δυνατότητες ρόλων εδώ';
$string['notes:manage'] = 'Διαχείριση σημειώσεων';
$string['notes:view'] = 'Προβολή σημειώσεων';
$string['notset'] = 'Μη καταχωρημένο';
$string['overrideanotherrole'] = 'Υπέρβαση άλλου ρόλου';
$string['overridecontext'] = 'Υπέρβαση πλαισίου';
$string['overridepermissions'] = 'Υπέρβαση δυνατοτήτων';
$string['overridepermissionsforrole'] = 'Υπέρβαση δυνατοτήτων για το ρόλο \'{$a->role}\' στο {$a->context}';
$string['overridepermissions_help'] = '<p align="center"><b>Υπερβάσεις</b></p>

<p>
Οι υπερβάσεις είναι ειδικές ρυθμίσεις που στοχεύουν στο να υπερβούν ένα ρόλο σε συγκεκριμένες περιπτώσεις,
παρέχοντας έτσι τη δυνατότητα προσαρμογής ρυθμίσεων ανάλογα με τις συνθήκες.</p>

<p>
Για παράδειγμα, αν ορισμένοι χρήστες με την ιδιότητα του διδασκόμενου στο μάθημά σας συνηθίζουν να ανοίγουν
νέες συζητήσεις σε διάφορα φόρουμ, αλλά υπάρχει ένα φόρουμ όπου θα προτιμούσατε να μη δίνεται αυτή η δυνατότητα,
τότε μπορείτε να θέσετε έναν περιορισμό που ΕΜΠΟΔΙΖΕΙ τη δυνατότητα σε διδασκόμενους να ξεκινούν μια συζήτηση.</p>

<p>
Οι υπερβάσεις μπορούν επίσης να χρησιμοποιηθούν για να διαθέσουν περιοχές στα μαθήματά σας όπου οι χρήστες να έχουν
περισσότερες δυνατότητες, π.χ. ίσως επιθυμήσετε δοκιμαστικά να επιτρέψετε σε διδασκόμενους να βαθμολογήσουν ορισμένες
εργασίες.
</p>

<p>
Η τρόπος δημιουργίας υπερβάσεων είναι ίδιος με αυτό του ορισμού ρόλων, με τη διαφορά ότι μερικές φορές μόνο οι σχετικές
δυνατότητες παρουσιάζονται. Θα δείτε επίσης ότι ορισμένες δυνατότητες είναι με κάποιο τρόπο τονισμένες, για να
δηλωθεί ότι η άδεια για αυτό το ρόλο θα ίσχυε και ΧΩΡΙΣ κάποια υπέρβαση δηλ. όταν η υπέρβασή σας έχει οριστεί στο ΚΛΗΡΟΝΟΜΩ)
</p>


<p>
Δείτε επίσης
<a href="help.php?file=roles.html">Ρόλοι</a>,
<a href="help.php?file=contexts.html">Πλαίσια</a>,
<a href="help.php?file=assignroles.html">Θέτοντας ρόλους</a> and
<a href="help.php?file=permissions.html">Άδειες</a>.
</p>';
$string['overridepermissionsin'] = 'Υπέρβαση δυνατοτήτων σε {$a}';
$string['overrideroles'] = 'Υπέρβαση ρόλων';
$string['overriderolesin'] = 'Υπέρβαση ρόλων σε {$a}';
$string['overrides'] = 'Υπερβάσεις';
$string['overridesbycontext'] = 'Υπερβάσεις (ανά πλαίσιο)';
$string['permission'] = 'Δυνατότητα';
$string['permission_help'] = '<p align="center">&nbsp;</p>
<p align="center"><strong> Άδειες </strong></p>
<p>Οι άδειες είναι οι ρυθμίσεις που χορηγείτε για συγκεκριμένες δυνατότητες. </p>
<p>Παραδείγματος χάριν, μια δυνατότητα είναι η &quot;Έναρξη νέας συζήτησης&quot; (στα φόρουμ). </p>
<p>Σε κάθε ρόλο, μπορείτε να επιλέξετε να θέσετε μια άδεια για μια τέτοια δυνατότητα σε μια από τις επόμενες τέσσερις τιμές: </p>
<p>&nbsp;</p>
<p>ΚΛΗΡΟΝΟΜΙΑ </p>
<p>Πρόκειται για την προεπιλεγμένη άδεια. Είναι μια ουδέτερη ρύθμιση που σημαίνει &quot;χρησιμοποίησε την όποια ρύθμιση είχε ήδη ο χρήστης&quot;. Εάν ένας ρόλος δοθεί κάπου (π.χ. σε μια σειρά μαθημάτων) όπου υπάρχει αυτήν η άδεια για μια δυνατότητα, τότε η πραγματική άδεια που θα έχουν θα είναι ακριβώς η ίδια όπως είχαν ήδη στα υψηλότερου επιπέδου πλαίσια (π.χ. κατηγορίες ή επίπεδο περιοχών). Τελικά, εάν η άδεια δεν επιτρέπεται ποτέ σε οποιοδήποτε επίπεδο, τότε ο χρήστης δεν θα έχει καμία άδεια για εκείνη τη δυνατότητα. </p>
<p>&nbsp; </p>
<p> ΕΠΙΤΡΕΨΤΕ </p>
<p>Με την επιλογή αυτού χορηγείτε την άδεια για αυτήν τη δυνατότητα σε όσους έχουν το σχετικό ρόλο. Αυτή η άδεια ισχύει για το πλαίσιο που λαμβάμει αυτός ο ρόλος συν όλα τα &quot;χαμηλότερα&quot; πλαίσια. Παραδείγματος χάριν, εάν αυτός ο ρόλος είναι ένας ρόλος διδασκόμενου που ορίζεται σε μια σειρά μαθημάτων, κατόπιν οι σπουδαστές θα είναι σε θέση &quot;να αρχίσουν νέες συζητήσεις&quot; σε όλα τα φόρουμ σε εκείνη την σειρά μαθημάτων, ΕΚΤΟΣ ΑΝ κάποιο φόρουμ περιέχει μια συμπληρωματική προμήθεια ή μια νέα ανάθεση με άδεια Αποτροπής ή Απαγόρευσης. </p>
<p>&nbsp; </p>
<p> ΑΠΟΤΡΟΠΗ </p>
<p>Με την επιλογή αυτού αφαιρείτε την άδεια για αυτήν τη δυνατότητα, ακόμα κι αν οι χρήστες με αυτόν τον ρόλο είχαν τέτοια άδεια σε ένα υψηλότερο πλαίσιο. </p>
<p>&nbsp; </p>
<p> ΑΠΑΓΟΡΕΥΣΗ </p>
<p>Αυτό απαιτείται σπάνια, αλλά περιστασιακά να θελήσετε να αρνηθείτε εντελώς τις άδειες σε έναν ρόλο με έναν τρόπο που δεν μπορεί να αγνοηθεί σε οποιοδήποτε χαμηλότερο πλαίσιο. Ένα καλό παράδειγμα είναι η περίπτωση που ένας διαχειριστής θέλει να απαγορεύσει σε ένα άτομο να αρχίζει νέες συζητήσεις σε οποιοδήποτε φόρουμ. Σε αυτήν την περίπτωση μπορεί να δημιουργήσει έναν ρόλο με Απαγόρευση και να τον ορίσει έπειτα σε εκείνο τον χρήστη. </p>
<p>&nbsp; </p>
<p align="center"><strong>Συγκρούσεις αδειών </strong></p>
<p>Οι άδειες σε ένα &quot;χαμηλότερο&quot; πλαίσιο θα αγνοήσουν γενικά ένα &quot;υψηλότερο&quot; πλαίσιο. Η εξαίρεση είναι η ΑΠΑΓΟΡΕΥΣΗ που δεν μπορεί να αγνοηθεί σε χαμηλότερα επίπεδα. </p>
<p>Εάν δύο ρόλοι ορίζονται σε ένα πρόσωπο στο ίδιο πλαίσιο, ένας με ΕΠΙΤΡΕΨΤΕ και ένα με ΑΠΟΤΡΟΠΗ, τότε το Moodle θα ανατρέξει στο δέντρο πλαισίου για μια απόφαση. </p>
<p>Παραδείγματος χάριν, ένας διδασκόμενος έχει δύο ρόλους σε μια σειρά μαθημάτων, έναν που του επιτρέπει να αρχίσει νέες συζητήσεις, και έναν που τον αποτρέπει. Σε αυτήν την περίπτωση, ελέγχουμε τις κατηγορίες και τα πλαίσια περιοχών, ψάχνοντας μια άλλη καθορισμένη άδεια να μας βοηθήσουμε να αποφασίσουμε. Εάν δεν βρίσκουμε, τότε η άδεια είναι ΑΠΟΤΡΕΠΗ εξ ορισμού (επειδή οι δύο τοποθετήσεις ακύρωσαν η μια την άλλη, και έτσι δεν έχετε καμία άδεια). </p>
<p align="center"><strong>Ειδικές εξαιρέσεις </strong></p>
<p>Σημειώστε ότι οι φιλοξενούμενοι χρήστες θα αποτραπούν γενικά από την ταχυδρόμηση μηνυμάτων (π.χ. σε φόρουμ, ημερολογιακές καταχωρήσεις, σε blogs ) ακόμα κι αν δίνεται η σχετική δυνατότητα. </p>
<p>Βλ. επίσης <a href="help.php?file=roles.html">Ρόλοι</a>, <a href="help.php?file=contexts.html">Πλαίσια</a>, <a href="help.php?file=assignroles.html">Ορισμός ρόλων</a> and <a href="help.php?file=overrides.html">Αγνοήσεις</a>.  </p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><b>Permissions</b></p>
<p>
Τα "δικαιώματα" είναι οι ρυθμίσεις που εφαρμόζετε για συγκεκριμένες δυνατότητες
</p>

<p>
Για παράδειγμα, μια δυνατότητα είναι η "Εκκίνηση νέων συζητήσεων" (σε forum).
</p>

<p>
Σε κάθε ρόλο, μπορείτε να επιλέξετε να ορίσετε το δικαίωμα για κάθε δυνατότητα
σε μια από τέσσερις τιμές:
<dl>
<dt>ΚΛΗΡΟΝΟΜΕΙΤΑΙ</dt>
<dd>Αυτή είναι γενικά η προεπιλεγμένη ρύθμιση. Πρόκειται για μια ουδέτερη ρύθμιση που
    σημαίνει "να χρησιμοποιηθεί όποια ρύθμιση είχε ήδη ο χρήστης". Εάν ένας ρόλος
    ανατεθεί σε κάποιον (π.χ. σε ένα μάθημα) που έχει ήδη το δικαίωμα αυτό για μια
    δυνατότητα, τότε το δικαίωμα που θα έχει ο χρήστης θα είναι απλώς
    το ίδιο που ήδη είχε σε πλαίσια υψηλότερων επιπέδων (π.χ. κατηγορίες
    ή σε επίπεδο ιστοχώρου). Τελικά, εάν το δικαίωμα δεν έχει δοθεί ποτέ σε κανένα
    επίπεδο, τότε ο χρήστης δε θα έχει κανένα δικαίωμα γι\'αυτή τη δυνατότητα.
  </dd>

<dt>ΕΠΙΤΡΕΠΕΤΑΙ</dt>
<dd>Με αυτήν την επιλογή δίνετε δικαίωμα γι\'αυτήν τη δυνατότητα
    σε άτομα που έχουν το συγκεκριμένο ρόλο. Το δικαίωμα αυτό εφαρμόζεται
    στο πλαίσιο που αυτός ο ρόλος ανατίθεται καθώς και σε όλα τα "κατώτερα"
    πλαίσια. Για παράδειγμα, εάν αυτός ο ρόλος είναι ένας ρόλος σπουδαστή που έχει ανατεθεί
    σε ένα μάθημα, τότε οι σπουδαστές θα έχουν τη δυνατότητα να "ξεκινήσουν νέες συζητήσεις"
    σε όλα τα forum σε εκείνο το μάθημα, ΕΚΤΟΣ εάν κάποιο forum περιέχει
    μια παράκαμψη ή μια νέα ανάθεση μιας τιμής "Επιτρέπεται" ή "Απαγορεύεται" γι\'αυτή
    τη δυνατότητα.</dd>

<dt>ΑΠΟΤΡΕΠΕΤΑΙ</dt>
<dd>Με αυτήν την επιλογή αφαιρείται δικαιώματα γι\'αυτήν τη δυνατότητα,
    ακόμη κι αν οι χρήστες με αυτόν το ρόλο είχαν το συγκεκριμένο δικαίωμα σε ένα
    υψηλότερο πλαίσιο.</dd>

<dt>ΑΠΑΓΟΡΕΥΕΤΑΙ</dt>
<dd>Αυτό σπάνια χρειάζεται αλλά κάποιες φορές μπορεί να θέλετε
    να αρνηθείτε τελείως δικαιώματα σε κάποιο ρόλο εννοώντας πως η ρύθμιση αυτή δεν μπορεί να παρακαμφθεί
    σε οποιοδήποτε κατώτερο πλαίσιο. Ένα καλό παράδειγμα είναι όταν
    ένας διαχειριστής θέλει να αποτρέψει ένα άτομο από το να αρχίσει νέες
    συζητήσεις σε οποιοδήποτε forum σε ολόκληρο τον ιστοχώρο. Στην περίπτωση αυτή
    μπορεί να δημιουργηθεί ένας ρόλος με τη δυνατότητα ορισμένη σε "Απαγορεύεται" κι έπειτα
    να ανατεθεί ο ρόλος αυτός στο χρήστη σε πλαίσιο ιστοχώρου.
  </dd>

</dl>
</p>

<p align="center"><b>Επίλυση συγκρούσεων δικαιωμάτων</b></p>

<p> Τα δικαιώματα σε ένα "χαμηλότερο" επίπεδο γενικά θα παρακάμπτουν
    οτιδήποτε σε ένα "υψηλότερο" πλαίσιο (αυτό εφαρμόζεται σε παρακάμψεις
    και ρόλους που έχουν ανατεθεί). Η εξαίρεση είναι η επιλογή "Απαγορεύεται" η οποία δεν μπορεί
    να παρακαμφθεί σε χαμηλότερα επίπεδα.
</p>

<p> Εάν δύο ρόλοι έχουν ανατεθεί στο ίδιο άτομο μέσα στο ίδιο πλαίσιο, ο ένας ρόλς με
    ΕΠΙΤΡΕΠΕΤΑΙ κι ο άλλος με ΑΠΟΤΡΕΠΕΤΑΙ, ποιος κερδίζει; Στην περίπτωση αυτή, το Moodle θα
    ψάξει στο δέντρο πλαισίου για να πάρει μια "απόφαση".   </p>

<p> Για παράδειγμα, ένας μαθητής έχει δύο ρόλους σε ένα μάθημα, έναν που του επιτρέπει να
    ξεκινάει νέες συζητήσεις κι έναν που του το απαγορεύει. Στην περίπτωση αυτή,
    ελέγχουμε τις κατηγορίες στα πλαίσια του ιστοχώρου, ψάχνοντας για κάποια άλλη
    ορισμένη δυνατότητα που θα μας βοηθήσει να αποφασίσουμε. Εάν δε βρούμε κάτι, τότε
    η εξορισμού δυνατότητα είναι η ΑΠΟΤΡΕΠΕΤΑΙ (επειδή οι δύο ρυθμίσεις ακύρωσαν
    η μία την άλλη, οπότε δεν έχουμε κανένα δικαίωμα).
</p>

<p align="center"><b>Special exceptions</b></p>

<p> Σημειώστε ότι ο λογαριασμός επισκέπτη γενικά αποτρέπεται από το να
    ανεβάζει υλικό (π.χ. σε forum, καταχωρήσεις ημερολογίου, blog) ακόμη κι αν
    του δίνεται η δυνατότητα να το κάνει.
</p>


<p>
See also
<a href="help.php?file=roles.html">Roles</a>,
<a href="help.php?file=contexts.html">Contexts</a>,
<a href="help.php?file=assignroles.html">Assign Roles</a> and
<a href="help.php?file=overrides.html">Overrides</a>.
</p>';
$string['permissions'] = 'Δικαιώματα χρήσης';
$string['permissionsforuser'] = 'Δυνατότητες για το χρήστη {$a}';
$string['permissionsincontext'] = 'Δικαιώματα σε {$a}';
$string['portfolio:export'] = 'Export to portfolios';
$string['potentialusers'] = '{$a} πιθανοί χρήστες';
$string['potusers'] = 'Πιθανοί χρήστες';
$string['potusersmatching'] = 'Πιθανοί χρήστες παρόμοιοι με \'{$a}\'';
$string['prevent'] = 'Παρεμπόδιση';
$string['prohibit'] = 'Απαγόρευση';
$string['prohibitedroles'] = 'Απαγορευμένοι';
$string['question:add'] = 'Προσθήκη νέων ερωτήσεων';
$string['question:config'] = 'Ρύθμιση τύπων ερωτήσεων';
$string['question:editall'] = 'Τροποποίηση όλων των ερωτήσεων';
$string['question:editmine'] = 'Τροποποίηση των δικών του ερωτήσεων';
$string['question:flag'] = 'Σήμανση ερωτήσεων καθώς απαντώνται';
$string['question:managecategory'] = 'Διαχείριση κατηγοριών ερωτήσεων';
$string['question:moveall'] = 'Μετακίνηση όλων των ερωτήσεων';
$string['question:movemine'] = 'Μετακίνηση των δικών του ερωτήσεων';
$string['question:useall'] = 'Χρήση όλων των ερωτήσεων';
$string['question:usemine'] = 'Χρήση των δικών του ερωτήσεων';
$string['question:viewall'] = 'Προβολή όλων των ερωτήσεων';
$string['question:viewmine'] = 'Προβολή των δικών του ερωτήσεων';
$string['rating:rate'] = 'Προσθήκη βαθμολογιών στα αντικείμενα';
$string['rating:view'] = 'Εμφάνιση της συνολικής βαθμολιγίας που έλαβες';
$string['rating:viewall'] = 'Εμφάνιση όλων των πρώτων αξιολογήσεων που δόθηκαν ατομικά';
$string['rating:viewany'] = 'Εμφάνιση όλων των συνολικών αξιολογήσεων που έλαβε κάποιος';
$string['resetrole'] = 'Επαναφορά στην αρχική κατάσταση';
$string['resetrolenolegacy'] = 'Καθάρισμα δυνατοτήτων';
$string['resetrolesure'] = 'Θέλετε σίγουρα να επαναφέρετε το ρόλο "{$a->name} ({$a->shortname})" στην αρχική του κατάσταση;<p></p>Οι δυνατότητές του θα επανακαθοριστούν σε αυτές που παρέχονται από τον ιστορικό ρόλο ({$a->legacytype}).';
$string['resetrolesurenolegacy'] = 'Θέλετε σίγουρα να καθαρίσετε όλες τις δυνατότητες που αποδόθηκαν στο ρόλο "{$a->name} ({$a->shortname})";';
$string['restore:configure'] = 'Διαμόρφωση επιλογών επαναφοράς';
$string['restore:createuser'] = 'Δημιουργία χρηστών στην επαναφορά';
$string['restore:restoreactivity'] = 'Επαναφορά δραστηριοτήτων';
$string['restore:restorecourse'] = 'Επαναφορά μαθημάτων';
$string['restore:restoresection'] = 'Επαναφορά τμημάτων';
$string['restore:restoretargethub'] = 'Επαναφορά από αρχεία που προορίζονται ως κόμβοι';
$string['restore:restoretargetimport'] = 'Επαναφορά από αρχεία που προορίζονται για εισαγωγές';
$string['restore:rolldates'] = 'Επιτρέπεται να μετακυλήθούν οι ημερομηνίες που έχουν χρησιμοποιηθεί στις δραστηριότητες κατά την επαναφορά';
$string['restore:uploadfile'] = 'Μεταφόρτωση αρχείων στις περιοχές των αντιγράφων ασφαλείας';
$string['restore:userinfo'] = 'Επαναφορά δεδομένων χρήστη';
$string['restore:viewautomatedfilearea'] = 'Επαναφορά μαθημάτων από αυτόματα αντίγραφα ασφαλείας';
$string['risks'] = 'Κίνδυνοι';
$string['role:assign'] = 'Ανάθεση ρόλων στους χρήστες';
$string['roleassignments'] = 'Ανάθεση ρόλων';
$string['roledefinitions'] = 'Ορισμοί ρόλων';
$string['rolefullname'] = 'Όνομα';
$string['role:manage'] = 'Δημιουργία και διαχείριση ρόλων';
$string['role:override'] = 'Υπέρβαση δικαιωμάτων από άλλους';
$string['roleprohibitheader'] = 'Απαγόρευση ρόλου';
$string['role:review'] = 'Επανεξέταση δικαιωμάτων για άλλους χρήστες';
$string['roles'] = 'Ρόλοι';
$string['role:safeoverride'] = 'Υπέρβαση δικαιωμάτων από άλλους με ασφάλεια';
$string['roles_help'] = '<p align="center"><b>Ρόλοι</b></p>

<p>
Ένας ρόλος είναι μια συλλογή από δικαιώματα ορισμένα για όλο τον ιστοχώρο, τα οποία μπορείτε να ορίσετε σε συγκεκριμένους χρήστες σε συγκεκριμένα περιβάλλοντα.
</p>

<p>
Για παράδειγμα, μπορεί να έχετε ένα ρόλο "διδάσκοντας" ο οποίος θα έχει ορισθεί για να επιτρέπει στουε διδάσκοντες να κάνουν βασικά πράγματα (και κανένας άλλος). Όταν αυτός ο ρόλος υπάρχει, μπορείτε να τον αναθέσετε σε κάποιον σε ένα μάθημα και να τον κάνετε "διδάσκοντα" σε αυτό το μάθημα. Μπορείτε επίσης να αναθέσετε ένα ρόλο σε ένα χρήστη στην κατηγορία των μαθημάτων και να τον κάνετε "διδάσκοντα" για όλα τα μαθήματα σε αυτή την κατηγορία ή να αναθέσετε ένα ρόλο σε ένα χρήστη απλά σε ένα forum, δίνοντας του τις δυνατότητες μόνο στο περιβάλλον του forum.
<p>

<p>
Ο ρόλος θα πρέπει να έχει <strong>όνομα</strong>.  Εάν χρειάζεστε να ονοματίσετε ένα ρόλο για πολλαπλές γλώσσες τότε μπορείτε να επιλέξετε πολύγλωσση σύνταξη όπως<pre>
  &lt;span lang="en">Διδάσκων&lt;/span>
  &lt;span lang="es_es">Καθηγητής&lt;/span>
  </pre>
</p>

<p>
Το <strong>όνομα</strong> είναι απαραίτητο για άλλες υπομονάδες στο Moodle που μπορεί να χρειαστούν στο κομμάτι των ρόλων (π.χ. όταν μεταφορτώνετες χρήστες από ένα αρχείο ή όταν κάνετε εγγραφή μέσα από υπομονάδα εγγραφής).
<p>

<p>
Η <strong>περιγραφή</strong> είναι απλά για να περιγράφεται ο ρόλος με δικές σας λέξεις, έτσι ώστε να έχει ο καθένας την δυνατότητα να καταλάβει τον κάθε ρόλο.
<p>

<p>
Δείτε επίσης
<a href="help.php?file=contexts.html">Περιβάλλοντα</a>,
<a href="help.php?file=permissions.html">Άδειες</a>,
<a href="help.php?file=assignroles.html">Ορισμός ρόλων</a> και
<a href="help.php?file=overrides.html">Υπερβάσεις</a>.
</p>';
$string['roleshortname'] = 'Σύντομο όνομα';
$string['role:switchroles'] = 'Αλλαγή σε άλλους ρόλους';
$string['roletoassign'] = 'Ρόλος προς καταχώρηση';
$string['roletooverride'] = 'Ρόλος προς υπέρβαση';
$string['safeoverridenotice'] = 'Σημείωση: Οι δυνατότητες με υψηλότερους πιθανούς κινδύνους είναι κλειδωμένες γιατί μπορείτε να υπερβείτε μόνο ασφαλείς δυνατότητες.';
$string['selectanotheruser'] = 'Επιλέξτε έναν άλλο χρήστη';
$string['selectauser'] = 'Επιλέξτε ένα χρήστη';
$string['selectrole'] = 'Επιλογή ρόλου';
$string['showallroles'] = 'Προβολή όλων των ρόλων';
$string['showthisuserspermissions'] = 'Προβολή των δικαιωμάτων του χρήστη';
$string['site:accessallgroups'] = 'Πρόσβαση σε όλες τις ομάδες';
$string['siteadministrators'] = 'Διαχειριστές ιστοσελίδας';
$string['site:approvecourse'] = 'Έγκριση δημιουργίας μαθήματος';
$string['site:backup'] = 'Αντίγραφα ασφαλείας μαθημάτων';
$string['site:config'] = 'Αλλαγή των ρυθμίσεων του Moodle';
$string['site:doanything'] = 'Επιτρέπεται να κάνει τα πάντα';
$string['site:doclinks'] = 'Εμφάνιση συνδέσμων για έγγραφα εκτός σελίδων';
$string['site:import'] = 'Εισαγωγή άλλων μαθημάτων σε ένα μάθημα';
$string['site:manageblocks'] = 'Διαχείριση block';
$string['site:mnetloginfromremote'] = 'Σύνδεση από απομακρυσμένη εγκατάσταση Moodle';
$string['site:mnetlogintoremote'] = 'Σύνδεση σε απομακρυσμένη εγκατάσταση Moodle';
$string['site:readallmessages'] = 'Ανάγνωση όλων των μηνυμάτων';
$string['site:restore'] = 'Επαναφορά μαθημάτων';
$string['site:sendmessage'] = 'Αποστολή μηνυμάτων σε χρήστες';
$string['site:trustcontent'] = 'Εμπιστοσύνη σε υποβαλλόμενο περιεχόμενο';
$string['site:uploadusers'] = 'Δημιουργία χρηστών από αρχείο';
$string['site:viewfullnames'] = 'Προβολή του ονοματεπώνυμου των χρηστών';
$string['site:viewparticipants'] = 'Προβολή συμμετεχόντων';
$string['site:viewreports'] = 'Προβολή αναφορών';
$string['tag:create'] = 'Δημιουργία νέων ετικετών';
$string['tag:edit'] = 'Τροποποίηση υπάρχουσων ετικετών';
$string['tag:editblocks'] = 'Τροποποίηση μπλοκ στις σελίδες ετικετών';
$string['tag:manage'] = 'Διαχείριση όλων των ετικετών';
$string['thisusersroles'] = 'Ρόλοι που έχουν ανατεθεί στο χρήστη';
$string['unassignerror'] = 'Σφάλμα κατά την αναίρεση ανάθεσης του ρόλου {$a->role} στο χρήστη {$a->user}.';
$string['user:changeownpassword'] = 'Αλλαγή κωδικού εισόδου';
$string['user:create'] = 'Δημιουργία λογαριασμών χρηστών';
$string['user:delete'] = 'Διαγραφή λογαριασμών χρηστών';
$string['user:editmessageprofile'] = 'Τροποποίηση προφίλ μηνυμάτων άλλων χρηστών';
$string['user:editownmessageprofile'] = 'Τροποποίηση ιδίου προφίλ μηνυμάτων';
$string['user:editownprofile'] = 'Τροποποίηση ιδίου προφίλ χρήστη';
$string['user:editprofile'] = 'Τροποποίηση προφίλ χρήστη άλλων χρηστών';
$string['user:loginas'] = 'Σύνδεση σαν άλλος χρήστης';
$string['user:manageblocks'] = 'Διαχείριση μπλοκ στο προφίλ χρήστη των άλλων χρηστών';
$string['user:manageownblocks'] = 'Διαχείριση μπλοκ στο δημόσιο προφίλ χρήστη';
$string['user:manageownfiles'] = 'Διαχείριση αρχείων στις ιδιωτικές περιοχές αρχείων';
$string['user:managesyspages'] = 'Διαμόρφωση προεπιλεγμένης διάταξης σελίδας για δημόσια προφίλ χρηστών';
$string['user:readuserblogs'] = 'Προβολή των ιστολογίων όλων των χρηστών';
$string['user:readuserposts'] = 'Προβολή όλων των μηνυμάτων του χρήστη';
$string['usersfrom'] = 'Χρήστες του πλαισίου {$a}';
$string['usersfrommatching'] = 'Χρήστες του πλαισίου {$a->contextname} που ταιριάζουν στο \'{$a->search}\'';
$string['usersinthisx'] = 'Χρήστες σ\' αυτό το {$a}';
$string['usersinthisxmatching'] = 'Χρήστες σ\' αυτό το {$a->contexttype} που ταιριάζουν στο \'{$a->search}\'';
$string['userswithrole'] = 'Χρήστες με οποιοδήποτε ρόλο';
$string['userswiththisrole'] = 'Χρήστες με αυτό το ρόλο';
$string['user:update'] = 'Επεξεργασία των προφίλ των χρηστών';
$string['user:viewalldetails'] = 'Προβολή όλων των πληροφοριών του χρήστη';
$string['user:viewdetails'] = 'Προβολή των προφίλ των χρηστών';
$string['user:viewhiddendetails'] = 'Προβολή των κρυφών πληροφοριών των χρηστών';
$string['user:viewuseractivitiesreport'] = 'Προβολή των αναφορών δραστηριότητας του χρήστη';
$string['user:viewusergrades'] = 'Προβολή των βαθμών του φοιτητή';
$string['useshowadvancedtochange'] = 'Χρησιμοποιείστε το \'Προβολή προχωρημένων\' για να τροποποιήσετε';
$string['viewingdefinitionofrolex'] = 'Προβολή του ορισμού του ρόλου \'{$a}\'';
$string['viewrole'] = 'Προβολή των λεπτομερειών του ρόλου';
$string['webservice:createmobiletoken'] = 'Δημιουργία ενός web service token για την πρόσβαση με κινητές συσκευές';
$string['webservice:createtoken'] = 'Δημιουργία ενός web service token';
$string['whydoesuserhavecap'] = 'Γιατί ο {$a->fullname} έχει τη δυνατότητα {$a->capability} στο πλαίσιο {$a->context};';
$string['whydoesusernothavecap'] = 'Γιατί ο {$a->fullname} δεν έχει τη δυνατότητα {$a->capability} στο πλαίσιο {$a->context};';
$string['xroleassignments'] = 'Αναθέσεις ρόλων του {$a}';
$string['xuserswiththerole'] = 'Χρήστες με τον ρόλο "{$a->role}": {$a->number}';
