<?PHP // $Id: auth_ldap.php,v 1.4 2010/03/26 08:26:39 ueu_ueu Exp $ 
      // auth_ldap.php - created with Moodle 1.9.4+ (Build: 20090218) (2007101541)


$string['auth_ldap_ad_create_req'] = 'Ezin da sortu kontu berria Active Directory-n. Ziurtatu lan honetarako baldintza guztiak betetzen dituzula (LDAPS konexioa, eskubide egokiak dituen erabiltzailea,e.a.).';
$string['auth_ldap_attrcreators'] = 'Talde edo testuinguru zerrenda, zeinetako partaideek atributuak sortzeko baimena duten. Banatu taldeak \',\' erabilita. Orokorrean, honelako zerbait: \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_attrcreators_key'] = 'Atributu-sortzaileak';
$string['auth_ldap_auth_user_create_key'] = 'Erabiltzaileak kanpotik sortu';
$string['auth_ldap_bind_dn'] = 'Erabiltzaileak bilatzeko bind-user erabili nahi baduzu, hemen zehaztu. Honen antzeko zerbait: \'cn=ldapuser,ou=public,o=org\'';
$string['auth_ldap_bind_dn_key'] = 'Izen gorena';
$string['auth_ldap_bind_pw'] = 'bind-user erabiltzailearen pasahitza.';
$string['auth_ldap_bind_pw_key'] = 'Pasahitza';
$string['auth_ldap_bind_settings'] = 'Ezarpenak finkatu';
$string['auth_ldap_changepasswordurl_key'] = 'Pasahitza aldatzeko URLa';
$string['auth_ldap_contexts'] = 'Erabiltzaileak kokatzen diren testuinguru zerrenda. Testuinguruak \';\' erabiliz banatu. Adibidez: \'ou=users,o=org; ou=others,o=org\'';
$string['auth_ldap_contexts_key'] = 'Testuinguruak';
$string['auth_ldap_create_context'] = 'E-postaren bitartez erabiltzailearen sorrera indarrean jartzen baduzu, zehaztu erabiltzaileak sortuko direneko egoera. Egoera horrek beste erabiltzaileenaren desberdina izan behar du arazoak ekiditeko. Egoera hori ez da Idap_context-variable-n itsatsi behar, Moodle-k egoera horretako erabiltzaileak automatikoki bilatuko ditu.';
$string['auth_ldap_create_context_key'] = 'Erabiltzaile berrientzako testuingurua';
$string['auth_ldap_create_error'] = 'Errorea erabiltzailea LDAPn sortzean.';
$string['auth_ldap_creators'] = 'Ikastaro berriak sortzeko baimena duten partaideen taldeak. Taldeak \';\' zeinuaren bidez bana daiteke. Normalki era honetan egingo genuke: \'cn=teachers,ou=staff,o=myorg\'';
$string['auth_ldap_creators_key'] = 'Sortzaileak';
$string['auth_ldap_expiration_desc'] = 'Pasahitza kadukatu ote den indargabetzeko Ez aukeratu, edo LDAP pasahitzaren kaduzitate denbora zuzenean LDAPetik irakurtzeko.';
$string['auth_ldap_expiration_key'] = 'Epe-muga';
$string['auth_ldap_expiration_warning_desc'] = 'Pasahitzaren kaduzitate-oharra agertu aurretiko egun-kopurua.';
$string['auth_ldap_expiration_warning_key'] = 'Epe-mugaren abisua';
$string['auth_ldap_expireattr_desc'] = 'Aukerazkoa: Pasahitzaren kaduzitatea metatzen duen ldap atributua indargabetzen du
PasswordExpirationTime';
$string['auth_ldap_expireattr_key'] = 'Iraungitze-atributua';
$string['auth_ldap_graceattr_desc'] = 'Aukerazkoa: Sarrera librearen atributua indargabetzen du';
$string['auth_ldap_gracelogin_key'] = 'Sarrera librearen atributua';
$string['auth_ldap_gracelogins_desc'] = 'LDAP sarrera askeko euskarria indartu. Pasahitza kadukatutakoan, erabiltzailea sarbide askeko kontua zerora iritsi arte sar daiteke. Aukera hau aktibatuz gero sarbide askeko mezua erakutsiko da, pasahitza kadukatu bada.';
$string['auth_ldap_gracelogins_key'] = 'Sarrera libreak';
$string['auth_ldap_groupecreators'] = 'Taldeak sortzeko baimena duten kideak dauden talde edo testuinguru-zerrenda. Taldeak \',\'-z banatu. Adibidez, honelako zerbait: \'cn=irakasleak,ou=administrazioa,o=nireerakundea\'';
$string['auth_ldap_groupecreators_key'] = 'Talde sortzaileak';
$string['auth_ldap_host_url'] = 'LDAP ostatua URL bidez zehaztu, adibidez \'ldap://ldap.zerbitzaria.com/\' edo \'ldaps://ldap.zerbitzaria.com/\'';
$string['auth_ldap_host_url_key'] = 'Ostalariaren URLa';
$string['auth_ldap_ldap_encoding'] = 'Zehaztu LDAP zerbitzariak erabilitako kodifikazioa. Ziurrenik utf-8, MS AD v2-k berez erabiltzen du plataformako kodifikazioa. Adibidez: cp1252, cp1250, e.a.';
$string['auth_ldap_ldap_encoding_key'] = 'LDAP kodifikazioa';
$string['auth_ldap_login_settings'] = 'Sarrera-ezarpenak';
$string['auth_ldap_memberattribute'] = 'Erabiltzailearen izenerako atributua zehaztu, erabiltzaileak taldean biltzen direnean. Normalean \'partaide\'';
$string['auth_ldap_memberattribute_isdn'] = 'Aukerakoa: kideen atributuen balorea ikutzea ekiditen du, 0 edo 1 izan daiteke.';
$string['auth_ldap_memberattribute_isdn_key'] = 'Partaide-atributuek dn darabilte';
$string['auth_ldap_memberattribute_key'] = 'Partaide-atributua';
$string['auth_ldap_no_mbstring'] = 'mbstring luzapena behar duzu Active Directory-n erabiltzaileak sortzeko.';
$string['auth_ldap_noconnect'] = 'LDAP modulua ezin da ondoko zerbitzariarekin konektatu: $a';
$string['auth_ldap_noconnect_all'] = 'LDAP modulua ezin da zerbitzarietako batekin ere konektatu: $a';
$string['auth_ldap_noextension'] = 'Kontuz: badirudi PHP LDAP modulua ez dagoela. Ziurtatu instalatuta eta gaituta dagoela.';
$string['auth_ldap_objectclass'] = 'Aukerkoa: ldap_user_type-n  erabiltzaileak izenez bilatzeko objectClass ekiditen du. Normalean ez duzu hau aldatu beharko.';
$string['auth_ldap_objectclass_key'] = 'Objektu-mota';
$string['auth_ldap_opt_deref'] = 'Bilaketan zehar aliasak nola maneiatu zehazten du. Balorea hauetako bat aukeratu: \"Ez\" (LDAP_DEREF_NEVER) edo \"Bai\" (LDAP_DEREF_ALWAYS)';
$string['auth_ldap_opt_deref_key'] = 'Erreferentziazko ezizena';
$string['auth_ldap_passtype'] = 'Zehaz ezazu pasahitz berrien formatua edo LDAP zerbitzarian aldatutakoena.';
$string['auth_ldap_passtype_key'] = 'Pasahitzaren formatua';
$string['auth_ldap_passwdexpire_settings'] = 'LDAP pasahitzaren kaduzitate-ezarpenak.';
$string['auth_ldap_preventpassindb'] = '\'Bai\' aukeratu pasahitzak Moodle-ren datu-basean ez gordetzeko.';
$string['auth_ldap_preventpassindb_key'] = 'Pasahitzak ezkutatu';
$string['auth_ldap_search_sub'] = 'Bilatu erabiltzaileak azpitestuinguruetan.';
$string['auth_ldap_search_sub_key'] = 'Bilatu azpitestuinguruetan';
$string['auth_ldap_server_settings'] = 'LDAP zerbitzariaren ezarpenak';
$string['auth_ldap_unsupportedusertype'] = 'auth: ldap user_create()-k ez du onartzen aukeratutako erabiltzaile-mota: $a (..oraingoz)';
$string['auth_ldap_update_userinfo'] = 'Erabiltzaile informazioa (izena, abizena, helbidea..) LDAP-tik Moodle-ra eguneratu. /auth/ldap/attr_mappings.php fitxategian begira ezazu mapa informazioa';
$string['auth_ldap_user_attribute'] = 'Erbiltzaileak izendatzeko edo bilatzeko atributua. \'cn\' izan ohi da.';
$string['auth_ldap_user_attribute_key'] = 'Erabiltzailearen atributuak';
$string['auth_ldap_user_exists'] = 'LDAP erabiltze-izen hau lehendik ere badago';
$string['auth_ldap_user_settings'] = 'Erabiltzailearen bilaketaren ezarpenak';
$string['auth_ldap_user_type'] = 'Erabiltzaileak LDAPen nola gordeko diren aukeratu. Ezarpen honek sarbidearen kaduzitateak, sarbide askeek eta erabiltzaileen sorrerak nola funtzionatuko duten zehazten du.';
$string['auth_ldap_user_type_key'] = 'Erabiltzaile-mota';
$string['auth_ldap_usertypeundefined'] = 'config.user_type ez dago definituta edo ldap_expirationtime2unix funtzioak ez du onartzen aukeratutako mota!';
$string['auth_ldap_usertypeundefined2'] = 'config.user_type ez dago definituta edo ldap_unixi2expirationtime funtzioak ez du onartzen aukeratutako mota!';
$string['auth_ldap_version'] = 'Zure zerbitzariak erabiltzen duen LDAP protokoloaren bertsioa.';
$string['auth_ldap_version_key'] = 'Bertsioa';
$string['auth_ldapdescription'] = 'Metodo honek kanpo LDAP zerbitzari baten aurkako autentifikazioa eskaintzen du.
Emandako erabiltzaile izen eta pasahitza baliozkoak badira, Moodle-k erabiltzaile-sarrera berri bat sortuko du bere datu-basean. Modulu honek erabiltzaile atributuak LDAP zerbitzaritik irakurri ditzake eta eremuak Moodle-n bete.  Hurrengo saio-hasieretan soilik izen eta pasahitza egiaztatuko dira.';
$string['auth_ldapextrafields'] = 'Eremu hauek aukerazkoak dira. Moodle erabiltzaile eremu batzuk hemen zehaztutako <b>LDAP eremu</b>etako informazioz betetzea aukeratu dezakezu. <P>Zurian uzten badituzu, ez da ezer transferituko LDAP-tik eta Moodlek lehenetsitako balioak erabiliko dira ordez.<P>Edozein kasutan, erabiltzaileak eremu guzti hauek editatzeko gaitasuna izango du behin saioa hasita.';
$string['auth_ldapnotinstalled'] = 'Ezin da LDAP autentifikazioa erabili. PHP LDAP modulua ez dago instalatuta.';
$string['auth_ldaptitle'] = 'LDAP zerbitzaria';
$string['auth_ntlmsso'] = 'NTLM SSO';
$string['auth_ntlmsso_enabled'] = 'Bai ezarri Single Sign On NTLM domeinuan saiatzeko. <strong>Oharra:</strong> bestelako ezarpen behar du web zerbitzarian funtzionatzeko, begiratu <a href=\"http://docs.moodle.org/en/NTLM_authentication\">http://docs.moodle.org/en/NTLM_authentication</a>';
$string['auth_ntlmsso_enabled_key'] = 'Gaitu';
$string['auth_ntlmsso_ie_fastpath'] = 'Ezarri bai NTLM SSO sarbide azkarra gaitzeko (hainbat pausu aurreratzen ditu eta MS Internet Explorer nabigatzailearekin bakarrik funtzionatzen du).';
$string['auth_ntlmsso_ie_fastpath_key'] = 'MS IE bide azkarra?';
$string['auth_ntlmsso_subnet'] = 'Ezarrita, SSO saiatuko da azpi-sare honetako bezeroekin bakarrik. Formatua: xxx.xxx.xxx.xxx/bitmask';
$string['auth_ntlmsso_subnet_key'] = 'Azpisarea';
$string['ntlmsso_attempting'] = 'Single Sign On saiatzen NTLM bidez...';
$string['ntlmsso_failed'] = 'Kale egin du saio-hasiera automatikoak, jo normal sartzeko orrira...';
$string['ntlmsso_isdisabled'] = 'NTLM SSO ez dago gaitua.';

?>
