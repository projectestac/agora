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
 * Strings for component 'condition', language 'el', branch 'MOODLE_24_STABLE'
 *
 * @package   condition
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcompletions'] = 'Προσθήκη {no} συνθηκών δραστηριότητας στη φόρμα';
$string['addgrades'] = 'Προσθήκη {no} συνθηκών βαθμολογίας στη φόρμα';
$string['availabilityconditions'] = 'Περιορισμός διαθεσιμότητας';
$string['availablefrom'] = 'Διαθέσιμο μετά τις';
$string['availableuntil'] = 'Διαθέσιμο εώς';
$string['badavailabledates'] = 'Εσφαλμένες ημερομηνίες (η ημερομηνία "εώς" πρέπει να είναι μεταγενέστερη της "μετά τις")';
$string['completion_complete'] = 'πρέπει να ολοκληρωθεί';
$string['completioncondition'] = 'Συνθήκη ολοκλήρωσης δραστηριότητας';
$string['completioncondition_help'] = '<p>
Μπορείτε να θέσετε μία συνθήκη βασισμένη στο αν ο χρήστης έχει ολοκληρώσει μία άλλη δραστηριότητα.
</p>

<p>
Αυτή η λειτουργία χρησιμοποιεί τις επιλογές ολοκλήρωσης που έχουν καθοριστεί για την άλλη δραστηριότητα. Μπορείτε να επιλέξετε αν η δραστηριότητα θα πρέπει να είναι ολοκληρωμένη, ανολοκλήρωτη, ολοκληρωμένη και επιτυχημένη ή ολοκληρωμένη και αποτυχημένη.Οι δύο τελευταίες επιλογές δουλεύουν μόνο όταν χρησιμοποιείτε ολοκλήρωση με βάση το βαθμό και έχετε θέσει βαθμό βάσης για το βαθμολογημένο αντικείμενο. (Δείτε και το εγχειρίδιο για την ολοκλήρωση δραστηριότητας, αν αυτό δεν είναι σαφές)
</p>

<p>
Μπορείτε να εισάγετε περισσότερες από μία συνθήκες ολοκλήρωσης. Όλες οι συνθήκες πρέπει να ικανοποιούνται για να εμφανιστεί η δραστηριότητα.
</p>';
$string['completion_fail'] = 'πρέπει να ολοκληρωθεί με βαθμό κάτω της βάσης';
$string['completion_incomplete'] = 'πρέπει να μην ολοκληρωθεί';
$string['completion_pass'] = 'πρέπει να ολοκληρωθεί με βαθμό άνω της βάσης';
$string['configenableavailability'] = 'Εαν ενεργοποιηθεί, σας επιτρέπει να θέσετε συνθήκες (με βάση ημερομηνία, βαθμό και ολοκλήρωση) οι οποίες θα καθορίζουν εάν μια δραστηριότητα είναι διαθέσιμη στους μαθητές.';
$string['contains'] = 'περιέχει';
$string['doesnotcontain'] = 'δεν περιέχει';
$string['enableavailability'] = 'Ενεργοποίηση διαθεσιμότητας υπό συνθήκες';
$string['endswith'] = 'τελειώνει με';
$string['grade_atleast'] = 'πρέπει να είναι τουλάχιστον';
$string['gradecondition'] = 'Συνθήκη βαθμολογίας';
$string['gradecondition_help'] = 'Αυτή η ρύθμιση καθορίζει τις προϋποθέσεις που έχουν οριστεί για κάθε βαθμό και πρέπει να πληρούνται προκειμένου να αποκτήσετε πρόσβαση στη δραστηριότητα. Μπορούν να καθοριστούν πολλαπλές προϋποθέσεις για τους βαθμούς, αν το επιθυμείτε. Στην περίπτωση αυτή, η δραστηριότητα θα επιτρέψει την πρόσβαση μόνο όταν πληρούνται ΟΛΕΣ οι προϋποθέσεις βαθμού.';
$string['grade_upto'] = 'και το πολύ μέχρι';
$string['isempty'] = 'είναι άδειο';
$string['isequalto'] = 'είναι ίσο με';
$string['none'] = '(τίποτα)';
$string['notavailableyet'] = 'Δεν είναι ακόμα διαθέσιμο';
$string['requires_completion_0'] = 'Μη διαθέσιμο εκτός και αν η δραστηριότητα <strong>{$a}</strong> δεν έχει ολοκληρωθεί.';
$string['requires_completion_1'] = 'Μη διαθέσιμο μέχρι η δραστηριότητα <strong>{$a}</strong> να ολοκληρωθεί.';
$string['requires_completion_2'] = 'Μη διαθέσιμο μέχρι η δραστηριότητα <strong>{$a}</strong> να ολοκληρωθεί επιτυχώς.';
$string['requires_completion_3'] = 'Μη διαθέσιμο εκτός και αν η δραστηριότητα <strong>{$a}</strong> έχει ολοκληρωθεί ανεπιτυχώς.';
$string['requires_date'] = 'Μη διαθέσιμο πριν από τις {$a}.';
$string['requires_date_before'] = 'Μη διαθέσιμο μετά τις {$a}.';
$string['requires_grade_any'] = 'Μη διαθέσιμο μέχρι να βαθμολογηθείτε στο <strong>{$a}</strong>.';
$string['requires_grade_max'] = 'Μη διαθέσιμο μέχρι να βαθμολογηθείτε κατάλληλα στο <strong>{$a}</strong>.';
$string['requires_grade_min'] = 'Μη διαθέσιμο μέχρι να βαθμολογηθείτε κατάλληλα στο <strong>{$a}</strong>.';
$string['requires_grade_range'] = 'Μη διαθέσιμο μέχρι να βαθμολογηθείτε κατάλληλα στο <strong>{$a}</strong>.';
$string['showavailability'] = 'Πριν η δραστηριότητα γίνει διαθέσιμη';
$string['showavailability_hide'] = 'Πλήρης απόκρυψη δραστηριότητας';
$string['showavailability_show'] = 'Εμφάνιση ως μη διαθέσιμης, με πληροφορίες';
$string['startswith'] = 'ξεκινάει με';
$string['userrestriction_hidden'] = 'Δραστηριότητα περιορισμένη υπό συνθήκες (πλήρης απόκρυψη, χωρίς μήνυμα): &lsquo;{$a}&rsquo;';
$string['userrestriction_visible'] = 'Δραστηριότητα περιορισμένη υπό συνθήκες (εμφανίζεται): &lsquo;{$a}&rsquo;';
