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
 * Strings for component 'enrol_ldap', language 'nl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_ldap
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['assignrole'] = 'Rol \'{$a->role_shortname}\' toewijzen aan gebruiker \'{$a->user_username}\' in cursus \'{$a->course_shortname}\' (id {$a->course_id})';
$string['assignrolefailed'] = 'Rol \'{$a->role_shortname}\' toewijzen aan gebruiker \'{$a->user_username}\' in cursus \'{$a->course_shortname}\' (id {$a->course_id}) mislukt';
$string['autocreate'] = 'Vakken kunnen automatisch aangemaakt worden als er aanmeldingen zijn bij een cursus die in Moodle nog niet bestaat.';
$string['autocreate_key'] = 'Automatisch aanmaken';
$string['autocreation_settings'] = 'Instellingen voor het automatisch aanmaken van cursussen.';
$string['bind_dn'] = 'Als je bind-user wil gebruikern om gebruikers te zoeken, dan moet je dat hier specifiëren. Bijvoorbeeld  \'cn=ldapuser,ou=public,o=org\'';
$string['bind_dn_key'] = 'Bind user distinguished name';
$string['bind_pw'] = 'Wachtwoord voor bind-user';
$string['bind_pw_key'] = 'Wachtwoord';
$string['bind_settings'] = 'Bind instellingen';
$string['cannotcreatecourse'] = 'Kan geen cursus maken: vereiste data ontbreken in het LDAP record!';
$string['category'] = 'De categorie voor automatisch gemaakte cursussen';
$string['category_key'] = 'Categorie';
$string['contexts'] = 'LDAP contexten';
$string['couldnotfinduser'] = 'Kon gebruiker {$a} niet vinden, overgeslagen.';
$string['course_fullname'] = 'Optioneel: LDAP-veld waaruit de volledige naam gehaald moet worden.';
$string['course_fullname_key'] = 'Volledige naam';
$string['course_idnumber'] = 'Pad naar de unique identifier in LDAP, gewoonlijk  <em>cn</em> of <em>uid</em>. Het is aangewezen de waarde vast te zetten als je automatisch aanmaken van cursussenn gebruikt.';
$string['course_idnumber_key'] = 'ID nummer';
$string['coursenotexistskip'] = 'Cursus {$a} bestaat niet en autocreatie is uitgeschakeld, overgeslagen';
$string['course_search_sub'] = 'Zoek groepslidmaatschap in subcontexts';
$string['course_search_sub_key'] = 'Doorzoek subcontexts';
$string['course_settings'] = 'Instellingen voor het aanmelden bij cursussen';
$string['course_shortname'] = 'Optioneel: LDAP-veld om de korte cursusnaam uit te halen';
$string['course_shortname_key'] = 'Korte naam';
$string['course_summary'] = 'Optioneel: LDAP-veld om de beschrijving uit te halen';
$string['course_summary_key'] = 'Samenvatting';
$string['createcourseextid'] = 'CREATE gebruiker aangemeld in een onbestaande cursus \'{$a->courseextid}\'';
$string['createnotcourseextid'] = 'Gebruiker aangemeld in een onbestaande cursus \'{$a->courseextid}\'';
$string['creatingcourse'] = 'Cursus {$a} wordt gemaakt...';
$string['duplicateshortname'] = 'Cursus maken mislukt. Korte naam bestaat al. Cursus met idnummer \'{$a->idnumber}\' wordt overgeslagen...';
$string['editlock'] = 'Lock-waarde';
$string['emptyenrolment'] = 'Lege aanmelding voor rol \'{$a->user_username}\' in curus \'{$a->course_shortname}\' (id {$a->course_id})';
$string['enrolname'] = 'LDAP';
$string['enroluser'] = 'Aanmelding gebruiker \'{$a->user_username}\' in cursus \'{$a->course_shortname}\' (id {$a->course_id})';
$string['enroluserenable'] = 'Aanmelding ingeschakeld voor gebruiker \'{$a->user_username}\' in cursus \'{$a->course_shortname}\' (id {$a->course_id})';
$string['explodegroupusertypenotsupported'] = 'ldpa_explode_group() ondersteunt gekozen gebruikerstype {$a} niet.';
$string['extcourseidinvalid'] = 'De externe cursus ID is niet geldig!';
$string['extremovedsuspend'] = 'Aanmelding uitgeschakeld voor gebruiker \'{$a->user_username}\' in cursus \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedsuspendnoroles'] = 'Aanmelding ingeschakeld en rolllen verwijderd voor gebruiker \'{$a->user_username}\' in cursus \'{$a->course_shortname}\' (id {$a->course_id})';
$string['extremovedunenrol'] = 'Gebruiker \'{$a->user_username}\' afgemeld van cursus \'{$a->course_shortname}\' (id {$a->course_id})';
$string['failed'] = 'Mislukt!';
$string['general_options'] = 'Algemene instellingen';
$string['group_memberofattribute'] = 'Naam van het attribuut dat specificeert tot welke groepen een bepaalde gebruiker behoort (eb memberOf, groupMembership, enz).';
$string['group_memberofattribute_key'] = '\'Lid van\' attribuut';
$string['host_url'] = 'Specifier de LDAP-host als een URL, bijvoorbeeld
\'ldap://ldap.myorg.com/\'
of \'ldaps://ldap.myorg.com/\'';
$string['host_url_key'] = 'Host URL';
$string['idnumber_attribute'] = 'Als het groepslidmaatschap distiguised names bevat, geeg dan hetzelfde attribuut dat je gebruikt hebt voor de mapping van het gebruiker \'ID nummer\' in de LDAP authenticatieinstellingen.';
$string['idnumber_attribute_key'] = 'ID nummer attribuut';
$string['ldap_encoding'] = 'Geef de encoding die de LDAP-server gebruikt. Waarschijnlijk is het utf-8, MS AD v2 gebruikt standaard platform encodering, zoals cp1252, cp 1250 enz.';
$string['ldap_encoding_key'] = 'LDAP-encoding';
$string['ldap:manage'] = 'Beheer LDAP aanmeldingsexemplaren';
$string['memberattribute'] = 'LDAP member attribute';
$string['memberattribute_isdn'] = 'Als het groepslidmaatschap distinguised names bevat, dan moet je dat hier opgeven. Als het dat doet, dan moet je de overgebleven instellingen van deze sectie configureren.';
$string['memberattribute_isdn_key'] = 'Lidmaatschapsattribuut gebruikt dn';
$string['nested_groups'] = 'Wil je geneste groepen gebruiken (groepen van groepen) voor aanmelding?';
$string['nested_groups_key'] = 'Geneste groepen';
$string['nested_groups_settings'] = 'Instellingen geneste groepen';
$string['nosuchrole'] = 'Rol {$a} bestaat niet';
$string['objectclass'] = 'objectClass gebruikt om cursussen te zoeken. Gewoonlijk  \'posixGroup\'.';
$string['objectclass_key'] = 'Object klasse';
$string['ok'] = 'OK!';
$string['opt_deref'] = 'Indien onder de groepsleden prominente namen voorkomen, specifieer dan hoe aliassen behandeld worden tijdens het zoeken. Selecteer een van de volgende waarden: \'Nee\' (LDAP_DEREF_NEVER) of \'Ja\' (LDAP_DEREF_ALWAYS)';
$string['opt_deref_key'] = 'Maak de referentie naar aliassen ongedaan';
$string['phpldap_noextension'] = '<em>De PHP LDAP module lijkt niet aanwezig. Controleer of ze geïnstalleerd en ingeschakeld is indien je deze aanmeldingsplugin wil gebruiken.</em>';
$string['pluginname'] = 'LDAP aanmeldingen';
$string['pluginname_desc'] = '<p>Je kunt een LDAP-server gebruiken om je cursusaanmeldingen te controleren. Er wordt vanuit gegaan dat je LDAP-structuur groepen bevat die verwijzen naar de cursussen en dat elk van die groepen/cursussen naar lidmaatschap van leerlingen verwijzen.</p>
<p>Er wordt vanuit gegaan dat cursussen als groepen gedefinieerd zijn in LDAP waarbij elke groep meerdere lidmaatschapsvelden heeft (<em>member</em> of <em>memberUid</em> die een unieke identificatie van de gebruiker bevat.</p>
<p>Om aanmeldingen met LDAP te kunnen gebruiken <strong>moeten</strong> je gebruikers een geldig idnumber-veld hebben. De LDAP-groepen moeten dat idnummer in het member-veld hebben om een gebruiker in een cursus te kunnen aanmelden. Dit zal gewoonlijk goed werken als je al LDAP=authenticatie gebruikt.</p>
<p>Aanmeldingen worden geüpdatet wanneer de gebruiker inlogd. Je kunt ook een script laten lopen om de aanmeldingen te synchroniseren. Kijk daarvoor in <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Deze plugin kan zo ingesteld worden dat nieuwe cursussen aangemaakt worden als nieuwe groepen in LDAP verschijnen.</p>';
$string['pluginnotenabled'] = 'Plugin niet ingeschakeld!';
$string['role_mapping'] = '<p>Voor elke rol die je wil toewijzen vanuit LDAP, moet je de lijst van contexten specifiëren waar de groepen binnen de cursussen met de rol zich bevinden. Scheid de verschillende contexten af met \';\'.</p><p>Specifieer ook het attribuut dat je LDAP server gebruikt om de groepsleden te bewaren. Gewoonlijk \'member\' of \'memberUid\'</p>';
$string['role_mapping_attribute'] = 'LDAP member attribuut voor {$a}';
$string['role_mapping_context'] = 'LDAP contexten voor {$a}';
$string['role_mapping_key'] = 'Koppel rollen uit LDAP';
$string['roles'] = 'Rolmapping';
$string['server_settings'] = 'LDAP-serverinstellingen';
$string['synccourserole'] = '==Synchroniseren van cursus \'{$a->idnumber}\' voor rol \'{$a->role_shortname}\'';
$string['template'] = 'Optioneel: automatisch gecreëerde cursussen kunnen instellingen kopieren vanaf een voorbeeldcursus.';
$string['template_key'] = 'Sjabloon';
$string['unassignrole'] = 'Rol {$a->role_shortname} wordt weggenomen van gebruiker {$a->user_name} uit cursus {$a->course_shortname} (id {$a->course_id}';
$string['unassignrolefailed'] = 'Rol {$a->role_shortname} wegnemen van gebruiker {$a->user_name} uit cursus {$a->course_shortname} (id {$a->course_id} mislukt';
$string['unassignroleid'] = 'Rol ID {$a->role_id} van gebruiker {$a->user_id} wegnemen';
$string['updatelocal'] = 'Update de lokale gegevens';
$string['user_attribute'] = 'Indien het groepslidmaatschap \'distinguised names\' bevat, specifieer dan het attribuut dat wordt gebruikt om gebruikers te benoemen of te zoeken. Indien je gebruik maakt van LDAP authenticatie, dan moet deze waarde overeenkomen met het attribuut gespecifieerd in de \'ID nummer\' mapping in de LDAP authenticatie plugin.';
$string['user_attribute_key'] = 'ID nummer attribuut';
$string['user_contexts'] = 'Indien het groepslidmaatschap \'distinguised names\' bevat, specifieer dan de lijst van contexten waarin de gebruikers zich bevinden. Scheid de verschillende contexten af met \';\'. Bij voorbeeld: \'ou=gebruikers,o=org; ou=anderen,o=org\'';
$string['user_contexts_key'] = 'Contexten';
$string['user_search_sub'] = 'Indien onder de groepsleden prominente namen voorkomen, specifieer dan of de zoekopdracht naar gebruikers ook in de subcontexten gebeurt';
$string['user_search_sub_key'] = 'Doorzoek subcontexten';
$string['user_settings'] = 'Gebruiker opzoekinstellingen';
$string['user_type'] = 'Indien onder de groepsleden prominente namen voorkomen, specifieer dan hoe gebruikers worden opgeslagen in LDAP';
$string['user_type_key'] = 'Gebruikerstype';
$string['version'] = 'De versie van het LDAP-protocol dat je server gebruikt.';
$string['version_key'] = 'Versie';
