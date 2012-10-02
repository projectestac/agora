<?PHP // $Id$ 
      // enrol_ldap.php - created with Moodle 1.8.2+ (2007021520)


$string['description'] = '<p>LDAP zerbitzaria erabil dezakezu matrikulazioak kontrolatzeko. Suposatu egiten da zure LDAP arbolak ikastaroetarako taldeak dituztela eta hauetako talde edo ikastaro bakoitzak ikasleei erreferentzia egiten dieten matrikulazio-sarrerak dituztela.</p><p>Suposatu egiten da ikastaroak talde bezala daudela definituta LDAPn, talde bakoitzak erabiltzailearen identifikazio bakarra duten hainbat matrikulazio-eremu dituelarik (<em>member</em> edo <em>memberUid</em>).</p><p>LDAP matrikulazioa erabiltzeko, erabiltzaileek balio duen \'idnumber\'eremua izan <strong>behar</strong>dute. LDAP taldeek \'idnumber\' hori izan behar dute erabiltzaile-eremuetan erabiltzailea ikastaro batean matrikulatu ahal izateko. Ondo funtzionatuko du dagoeneko LDAP Autentifikazioa erabiltzen baduzu.</p><p>Matrikulazioak eguneratu egingo dira erabiltzailea idenfikatzen denean. Kontsulta ezazu <em>enrol/ldap/enrol_ldap_sync.php</em>.</p>
<p>Plugin hau LDAPn talde berriak agertzen direnean ikastaro berriak era automatikoan sortzeko ere zehaztu ahal da.</p>';
$string['enrol_ldap_autocreate'] = 'Era automatikoan sor daitezke ikastaroak oraindik ere Moodlen existitzen ez den ikastaro batean matrikulazioak badaude.';
$string['enrol_ldap_autocreation_settings'] = 'Ikastaroak era automatikoak sortzeko zehaztasunak';
$string['enrol_ldap_bind_dn'] = 'Erabiltzaileak bilatzeko \'bin-user\' erabili nahi baduzu, zehaztu hemen. Horrelako zerbait \'cn=ldapuser,ou=public,o=org\'';
$string['enrol_ldap_bind_pw'] = '\'Bind-user\'rentzako pasahitza';
$string['enrol_ldap_category'] = 'Era automatikoan sortutako ikastaroetarako kategoria';
$string['enrol_ldap_contexts'] = 'LDAP kontestuak';
$string['enrol_ldap_course_fullname'] = 'Aukerakoa: LDAP eremua zeinetatik lortuko den izen osoa.';
$string['enrol_ldap_course_idnumber'] = 'Identikatzaile bakarraren mapa LADPn, ohikoena <em>cn</em> edo <em>uid</em>. Balorea blokeatzea gomendatzen da ikastaroa sortzeko era automatikoa erabiltzen ari bada.';
$string['enrol_ldap_course_settings'] = 'Ikastaroan matrikulatzeko zehaztasunak';
$string['enrol_ldap_course_shortname'] = 'Aukerakoa:  LDAP eremua zeinetatik lortuko den izen laburra.';
$string['enrol_ldap_course_summary'] = 'Aukerakoa:  LDAP eremua zeinetatik lortuko den laburpena.';
$string['enrol_ldap_editlock'] = 'Balorea blokeatu';
$string['enrol_ldap_general_options'] = 'Aukera nagusiak';
$string['enrol_ldap_host_url'] = 'Zehaztu LDAP hosta URL formatuan, adib. \'ldap://ldap.myorg.com/\'
edo \'ldaps://ldap.myorg.com/\'';
$string['enrol_ldap_memberattribute'] = 'LDAP kide-ezaugarria';
$string['enrol_ldap_objectclass'] = 'Ikastaroak bilatzeko erabilitako objectClass. Ohikoena \'posixGroup\'.';
$string['enrol_ldap_roles'] = 'Rolen mapa';
$string['enrol_ldap_search_sub'] = 'Bilatu taldearen barruan dagoen azpikontestuetan.';
$string['enrol_ldap_server_settings'] = 'LDAP Zerbitzariaren zehaztasunak';
$string['enrol_ldap_student_contexts'] = 'Ikasleen matrikulazioak dituzten taldeak kokatuta dauden kontestuen zerrenda. Kontestuak \';\'rekin banatu. Adibidez, \'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_student_memberattribute'] = 'Partaide ezaugarria, erabiltzailea talde bateko partaide bada (hau da, matrikulatuta badago). Ohikoena, \'partaidea\' edo \'memberUid\'.';
$string['enrol_ldap_student_settings'] = 'Ikasleak matrikulatzeko zehaztasunak';
$string['enrol_ldap_teacher_contexts'] = 'Irakasleen matrikulazioak dituzten taldeak kokatuta dauden kontestuen zerrenda. Kontestuak \';\'rekin banatu. Adibidez, \'ou=courses,o=org; ou=others,o=org\'';
$string['enrol_ldap_teacher_memberattribute'] = 'Partaide ezaugarria, erabiltzailea talde bateko partaide bada (hau da, matrikulatuta badago). Ohikoena, \'partaidea\' edo \'memberUid\'.';
$string['enrol_ldap_teacher_settings'] = 'I';
$string['enrol_ldap_template'] = 'Aukerakoa: era automatikoan sortutako ikastaroak ikastaro-txantiloi batetik kopia ditzakete beren zehaztasunak.';
$string['enrol_ldap_updatelocal'] = 'Datu lokalak eguneratu';
$string['enrol_ldap_version'] = 'Zerbitzariak erabiltzen duen LDAP protokoloaren bertsioa';
$string['enrolname'] = 'LDAP';

?>
