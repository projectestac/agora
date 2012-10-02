<?PHP // $Id: report_security.php,v 1.9 2010/08/12 06:47:39 koenr Exp $ 
      // report_security.php - created with Moodle 1.9.4+ (Build: 20090218) (2007101541)


$string['check_configrw_name'] = 'config.php idatz daiteke';
$string['check_configrw_ok'] = 'PHP script-ek ezin dute config.php fitxategia aldatu.';
$string['check_configrw_warning'] = 'PHP script-ek config.php fitxategia alda dezakete.';
$string['check_cookiesecure_error'] = 'Mesedez, gaitu cooki seguruak';
$string['check_cookiesecure_name'] = 'Cooki seguruak';
$string['check_cookiesecure_ok'] = 'Cooki seguruak gaituta.';
$string['check_courserole_error'] = 'Gaizki definitutako berezko ikastaro-rolak atzeman dira!';
$string['check_courserole_name'] = 'Berezko rolak (ikastaroak)';
$string['check_courserole_notyet'] = 'Berezko ikastaro-rola baino ez da erabili.';
$string['check_courserole_ok'] = 'Berezko ikastaro-rolen definizioak ONDO daude.';
$string['check_courserole_risky'] = 'Gaitasun arriskutsuak atzemab dira hemen: <a href=\"$a\">context</a>.';
$string['check_defaultcourserole_error'] = 'Gaizki definitutako berezko ikastaro-rola (\"$a\") atzeman da!';
$string['check_defaultcourserole_name'] = 'Berezko ikastaro-rola (globala)';
$string['check_defaultcourserole_notset'] = 'Berezko rola ez da ezarri.';
$string['check_defaultcourserole_ok'] = 'Gunerako berezko rolaren definizioa ONDO dago.';
$string['check_defaultcourserole_risky'] = 'Gaitasun arriskutsuak atzeman dira <a href=\"$a\">context</a> testuinguruan.';
$string['check_defaultuserrole_name'] = 'Berezko rola erabiltzaile guztientzat';
$string['check_defaultuserrole_notset'] = 'Berezko rola ez da ezarri.';
$string['check_defaultuserrole_ok'] = 'Autentifikatutako erabiltzaile-rolaren definizioa ONDO dago.';
$string['check_displayerrors_name'] = 'PHP erroreak erakustea';
$string['check_displayerrors_ok'] = 'PHP erroreak erakustea desgaituta.';
$string['check_emailchangeconfirmation_name'] = 'E-posta aldaketaren baieztatzea';
$string['check_emailchangeconfirmation_ok'] = 'E-postaren aldaketaren baieztatzea erabiltzaile-profilean';
$string['check_embed_error'] = 'Nahi beste objektu enbotatu ahal izatea gaituta - hau oso arriskutsua izan daiteke zerbitzari gehienentzat';
$string['check_embed_name'] = 'Baimendu EMBED eta OBJECT';
$string['check_embed_ok'] = 'Nahi beste objektu enbotatzea ez dago baimenduta.';
$string['check_frontpagerole_name'] = 'Hasiera-orriaren rola';
$string['check_frontpagerole_notset'] = 'Hasiera-orriaren rola ez da ezarri.';
$string['check_frontpagerole_ok'] = 'Hasiera-orriaren rolaren definizioa ONDO dago.';
$string['check_globals_name'] = 'Erregistro orokorrak';
$string['check_globals_ok'] = 'Erregistro orokorrak desgaituta daude';
$string['check_google_details'] = '<p>Zabaldu Google-ri ezarpenak bilaketa-motorei ikastaroetan sartzen uzten die bisitari gisa. Honek ez du zentzurik bisitariek sarbidea baimenduta ez badute.</p>';
$string['check_google_error'] = 'Bilaketa-motoreen sarbidea baimenduta dago baina bisitarien sarbidea desgaituta dago.';
$string['check_google_info'] = 'Bilaketa-motoreak bisitari gisa sar daitezke';
$string['check_google_name'] = 'Zabaldu Google-ri';
$string['check_google_ok'] = 'Bilaketa-motoreen sarbidea ez dago gaituta.';
$string['check_guestrole_error'] = '\"$a\" bisitari-rola ez dago zuzen definituta!';
$string['check_guestrole_name'] = 'Bisitari-rola';
$string['check_guestrole_notset'] = 'Bisitari-rola ez da ezarri.';
$string['check_guestrole_ok'] = 'Bisitari-rolaren definizioa ONDO dago.';
$string['check_mediafilterswf_error'] = 'Flash media iragazkia gaituta dago - hau oso arrikutsua izaten da zerbitzari gehienentzat';
$string['check_mediafilterswf_name'] = '.swf media iragazkia gaituta';
$string['check_mediafilterswf_ok'] = 'Flash media iragazkia ez dago gaituta.';
$string['check_noauth_name'] = 'Autentifikatu gabe';
$string['check_noauth_ok'] = '\"Autentifikatu gabe\" plugina desgaituta dago.';
$string['check_openprofiles_name'] = 'Zabaldu erabiltzaileen profilak';
$string['check_openprofiles_ok'] = 'Erabiltzaileen profilak ikusi ahal izateko, beharrezkoa da saioa hastea.';
$string['check_passwordpolicy_error'] = 'Pasahitzen politika ez da ezarri.';
$string['check_passwordpolicy_name'] = 'Pasahitzen politika';
$string['check_passwordpolicy_ok'] = 'Pasahitzen politika gaituta.';
$string['check_riskadmin_detailsok'] = '<p>Mesedez, egiazta ezazu sistemako kudeatzaileen ondoko zerrenda hau: </p>$a';
$string['check_riskadmin_detailswarning'] = '<p>Mesedez, egiazta ezazu sistemako kudeatzaileen zerrenda hau:</p>$a->admins
<p>Gomendagarria da kudeatzaile-rola sistemaren testuinguruan baino ez esleitzea. Ondoko erabiltzaileek izan dute kudeatzaile-rola esleituta:</p>$a->unsupported';
$string['check_riskadmin_name'] = 'Kudeatzaileak';
$string['check_riskadmin_ok'] = 'Zerbitzariko $a kudeatzaile aurkituta.';
$string['check_unsecuredataroot_name'] = 'dataroot ez da segurua';
$string['check_unsecuredataroot_warning'] = 'Zure dataroot direktorioa <code>$a</code> okerreko kokapenean dago eta web bidez ailega liteke bertara.';
$string['configuration'] = 'Ezarpenak';
$string['description'] = 'Deskribapena';
$string['details'] = 'Xehetasunak';
$string['issue'] = 'Jaulkitzailea';
$string['reportsecurity'] = 'Segurtasunaren ikuspegi orokorra';
$string['security:view'] = 'Ikusi segurtasun-txostena';
$string['status'] = 'Egoera';
$string['statuscritical'] = 'Larria';
$string['statusinfo'] = 'Informazioa';
$string['statusok'] = 'ONDO';
$string['statusserious'] = 'Larria';
$string['statuswarning'] = 'Kontuz';

?>
