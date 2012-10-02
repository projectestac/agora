<?php
$files_ok = array();
$files_ko = array();
if (md5(file_get_contents("./version.txt")) == "84b17206d983a7430710b2a1f8ae52b8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./version.txt</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./version.txt (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./COPYING.txt")) == "6316f2b9af0cab4497de71b53e26a01f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./COPYING.txt</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./COPYING.txt (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/doc-archi1.svg")) == "3c2b6ce5c03537846b6ec11eb8aae96e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/doc-archi1.svg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/doc-archi1.svg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/login.svg")) == "c89ef14d3f40ec6b555f76722ab140c5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/login.svg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/login.svg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/tabs.svg")) == "02dc973dc9cf45246f3cef1963cc84e2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/tabs.svg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/tabs.svg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/clock-off.png")) == "16a6384b230479c258125da0eced5f4c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/clock-off.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/clock-off.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/color-on.png")) == "5a15495292999a129ef760c8ace8b8b7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/color-on.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/color-on.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/clock-on.png")) == "993a86ff21548368bd912da8c381ee9c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/clock-on.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/clock-on.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/png2gif.sh")) == "51c749d6e30da2150572587de04b0f9c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/png2gif.sh</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/png2gif.sh (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/logo_88x31.png")) == "847b945b0951a0f97524815c83f0be8a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/logo_88x31.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/logo_88x31.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/createwebinstaller.php")) == "683488cff52c87df69fae3c342db4483")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/createwebinstaller.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/createwebinstaller.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/logout.png")) == "9e56228db0820eeaee172674d5a28330")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/logout.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/logout.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/color-off.png")) == "e6c7a4168c9b9348417c49d21dc9aa63")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/color-off.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/color-off.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/login.png")) == "9982dea5d71d32f409117c06bc629c96")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/login.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/login.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/tarSource")) == "a208a7e2951eb68394d2209b9c90e09b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/tarSource</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/tarSource (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/generate-doc.inc.php")) == "9a978bba9adfac00b5ed7aa0de5bd395")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/generate-doc.inc.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/generate-doc.inc.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/logo_80x15.gif")) == "a310104e2c7140b178973dba5bbab72f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/logo_80x15.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/logo_80x15.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/checkmd5")) == "8d9338e6c52283a3ef5b44c284fdaef9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/checkmd5</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/checkmd5 (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/bulle.png")) == "1306c813ef5bbad78d1ef6eb95dfd533")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/bulle.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/bulle.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/logo_88x31.gif")) == "e6a73f260f19df15f50224edf9d1430e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/logo_88x31.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/logo_88x31.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/logout.svg")) == "3083e2b038ff7fb87130dde8ccef3c9d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/logout.svg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/logout.svg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/logo.svg")) == "65ec511e2d42b0784dc7aadec1de28ab")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/logo.svg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/logo.svg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/sendSource")) == "5aa8879e92df9a8ac7081f116a6fa9e6")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/sendSource</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/sendSource (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/logo_80x15.png")) == "f3227835145eff30023d1160297eb976")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/logo_80x15.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/logo_80x15.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./misc/i18n_update.php")) == "52c1e06f226c231e38cbeb209c0af8a4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./misc/i18n_update.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./misc/i18n_update.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/cookie.js")) == "1a4f8571119a724915eff57425424f7c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/cookie.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/cookie.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/regex.js")) == "d58fd695b962fb7e55a2337932ed649e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/regex.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/regex.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/myprototype.js")) == "74211953cf62957dd33e638e903b7bb8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/myprototype.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/myprototype.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/pfcprompt.js")) == "494f2df1a9fdafc89a98ef1eab47fb93")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/pfcprompt.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/pfcprompt.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/xajax.js")) == "fd8530b6b462bcf5992f804f71e7c3bb")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/xajax.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/xajax.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/image_preloader.js")) == "17c2707db87834cc753a107674de859b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/image_preloader.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/image_preloader.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/pfcgui.js")) == "eb1ef97ef9b849f80191c7a73b282679")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/pfcgui.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/pfcgui.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/activity.js")) == "5def443d09c43502d559328259e8b20c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/activity.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/activity.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/sprintf2.js")) == "4a69c732882320631af945a58095c220")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/sprintf2.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/sprintf2.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/prototype.js")) == "d3a5b20d5368c1bcabe655b57b52d097")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/prototype.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/prototype.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/compat.js")) == "508ed0c512375a88688846f248a3902f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/compat.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/compat.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/pfcresource.js")) == "7067768a5dc2fa7fa85905a528a487e9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/pfcresource.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/pfcresource.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/utf8.js")) == "231234f094dab73b1136f77e333290ca")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/utf8.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/utf8.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/md5.js")) == "c440f84bf6693e366fa2a56735d6667c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/md5.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/md5.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/mousepos.js")) == "3d71c5acfdefdf84b593411546595d33")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/mousepos.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/mousepos.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/pfcclient.js")) == "742b6122ebe7b07e58fe26832351b18c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/pfcclient.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/pfcclient.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/public/js/createstylerule.js")) == "cf9955cc05c571183c942a740acb7e86")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/public/js/createstylerule.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/public/js/createstylerule.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./data/private/.htaccess")) == "55e3fab406c794358a55ecd986e4c3ef")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./data/private/.htaccess</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./data/private/.htaccess (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/valid-css.png")) == "b5938c9e5e648c723b1497e5d69966a5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/valid-css.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/valid-css.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/header.css")) == "b01f3034ce4f01d0bec9ab9fb0b38477")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/header.css</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/header.css (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/valid-xhtml.png")) == "0b778cd2933aca8d9301836ffb30a515")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/valid-xhtml.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/valid-xhtml.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/generic.css")) == "bde40b3db3ce695768205bad3cbde2c5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/generic.css</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/generic.css (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/menu.css")) == "95c5939e16a0fdf8edf08d83e3e18591")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/menu.css</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/menu.css (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/content.css")) == "c3b6f1cbab0da6a197ff23383c4abbe8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/content.css</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/content.css (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/check_on.png")) == "3565962cde4d541c51409d64db1d2b04")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/check_on.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/check_on.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/check_off.png")) == "3f62eed2a47fdc9457870c7b93300035")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/check_off.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/check_off.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/footer.css")) == "a5e55b1d48ee2ad5c986435be9459b1a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/footer.css</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/footer.css (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/logo_88x31.gif")) == "31849457de6b49f143990b8bf80999bb")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/logo_88x31.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/logo_88x31.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/show.js")) == "68fde759190b3d58950b452f2a2cd85c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/show.js</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/show.js (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./style/logo.gif")) == "7ecaaf133a1f3f7a434936e2bae9e9c2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./style/logo.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./style/logo.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./testcase/parsecommand.php")) == "a977e31e61bc7d612b7aef03023857ca")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./testcase/parsecommand.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./testcase/parsecommand.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./testcase/container_mysql.php")) == "2c49ff1b4a06ad7c7680f8f2415ad423")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./testcase/container_mysql.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./testcase/container_mysql.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./testcase/ctype.php")) == "96d603e437c71a28b779b6c924ad092d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./testcase/ctype.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./testcase/ctype.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./testcase/container_file.php")) == "fe425c872a6ac57180331783757188fe")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./testcase/container_file.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./testcase/container_file.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./testcase/container_generic.php")) == "14ace2ef38bfbf54d5c2db3a084df70f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./testcase/container_generic.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./testcase/container_generic.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./testcase/filemtime.php")) == "376a44ded7611fb575645212a91c621b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./testcase/filemtime.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./testcase/filemtime.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./AUTHORS.txt")) == "9f685cd7629840fe020328307ffa07b2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./AUTHORS.txt</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./AUTHORS.txt (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/json/JSON.php")) == "3ce5a187c2869122f7cbcd14eec99447")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/json/JSON.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/json/JSON.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/json/LICENSE")) == "f572694efc44fa58b7ca7adf100fea7d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/json/LICENSE</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/json/LICENSE (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/pearrc")) == "29c4f3f77a779177c7f6337b1112acf2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/pearrc</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/pearrc (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/RepeatedTest.php")) == "ee280b97a8b06d6292767244a910e56c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/RepeatedTest.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/RepeatedTest.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/GUI/HTML.php")) == "6b48059f47b545903725bda0076cab4a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/GUI/HTML.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/GUI/HTML.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/GUI/Gtk.php")) == "2ca785505f2508f059993d9203edd166")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/GUI/Gtk.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/GUI/Gtk.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/GUI/HTML.tpl")) == "222a8fef6537f8fb1653f68f1b1d6a28")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/GUI/HTML.tpl</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/GUI/HTML.tpl (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/GUI/SetupDecorator.php")) == "39a29415cdb5191f57529b70e1ca65d8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/GUI/SetupDecorator.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/GUI/SetupDecorator.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/TestCase.php")) == "9b1d78d9ad5c9f6aa0fc3ae6bf180b20")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/TestCase.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/TestCase.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/TestSuite.php")) == "13df054bceb10f7604a5796cac4361bc")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/TestSuite.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/TestSuite.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/TestFailure.php")) == "8331637fa097f2d518b4fbd918e3e7b9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/TestFailure.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/TestFailure.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/Skeleton.php")) == "1d9b6092a307cebc59a4633260475c06")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/Skeleton.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/Skeleton.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/TestListener.php")) == "3ed518d5db2870b98198981b0b508e13")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/TestListener.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/TestListener.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/Assert.php")) == "02f09cb0b94b8450edfbd2536e02e39c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/Assert.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/Assert.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/TestResult.php")) == "a0c025e0ca5f1922d781db6ccb29f2b9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/TestResult.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/TestResult.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit/TestDecorator.php")) == "a0be8efea0c4416fe8e2b3099253a0d9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit/TestDecorator.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit/TestDecorator.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/pear.sh")) == "c18d0b61320cc48124806b12e3b61146")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/pear.sh</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/pear.sh (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/pear/PHPUnit.php")) == "333af11bab6eb201a1c941cded5bc9ed")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/pear/PHPUnit.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/pear/PHPUnit.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/lang.inc.php")) == "0ac3405b6b2df58470f1e88ddc2ae376")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/lang.inc.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/lang.inc.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/template1.tpl")) == "a36d1408995bdc517171e06fc8d3d9b5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/template1.tpl</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/template1.tpl (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/css_optimiser.php")) == "3ea08cbc26770eb6014af9955759d1a5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/css_optimiser.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/css_optimiser.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/template2.tpl")) == "59041b0f200dab257f1240f2e8b7d24c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/template2.tpl</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/template2.tpl (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/template3.tpl")) == "d8b57d1eefa45c588389465d9cf08518")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/template3.tpl</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/template3.tpl (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/README")) == "3a3e2ddf61de1689e042291b821262b0")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/README</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/README (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/cssparse.css")) == "23575d87c17f20364a84e481a46d8040")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/cssparse.css</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/cssparse.css (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/class.csstidy_print.php")) == "b8dda68989a41554e4d39402d42b2b10")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/class.csstidy_print.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/class.csstidy_print.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/template.tpl")) == "d6f6aefec8ca602e51f1b13628cdea61")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/template.tpl</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/template.tpl (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/class.csstidy_optimise.php")) == "cacf732709a79a47e86bdc530d551b98")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/class.csstidy_optimise.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/class.csstidy_optimise.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/COPYING")) == "eb723b61539feef013de476e68b5c50a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/COPYING</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/COPYING (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/class.csstidy.php")) == "86d417902179fb54e041a9646e599e63")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/class.csstidy.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/class.csstidy.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/csstidy-1.2/data.inc.php")) == "2982e57b47a025880f4fd8f34289ad5b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/csstidy-1.2/data.inc.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/csstidy-1.2/data.inc.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/utf8/utf8_substr.php")) == "058728815cb337c7b804f1992da3a979")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/utf8/utf8_substr.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/utf8/utf8_substr.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/utf8/utf8_strlen.php")) == "dfd702b035ed705b390ccfec70826a43")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/utf8/utf8_strlen.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/utf8/utf8_strlen.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/utf8/utf8_char2byte_pos.php")) == "5a97e5ee045f76307f7f8e7692906cd9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/utf8/utf8_char2byte_pos.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/utf8/utf8_char2byte_pos.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./lib/ctype/ctype.php")) == "ac37165b979f6f0f4069587943260f93")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./lib/ctype/ctype.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./lib/ctype/ctype.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/question.gif")) == "6d4a76eacdb033da1a03ddf674244e9a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/question.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/question.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/rolleyes.gif")) == "9df2cb8541fef0b3e4e3587de2112e6e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/rolleyes.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/rolleyes.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/mrgreen.gif")) == "c473e4af346804fa9424c8f0828da63a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/mrgreen.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/mrgreen.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/razz.gif")) == "95e00ee6fba980dc067733cd9d01b3dc")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/razz.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/razz.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/dizzy.gif")) == "6a6f73439034d275cd9d0f1ac7a69fe7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/dizzy.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/dizzy.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/normal.gif")) == "2dc7fa75980fe39c6cecf4c5818dbd73")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/normal.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/normal.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/eek.gif")) == "8f0ec25612278ebb8147d55ae5f20e8b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/eek.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/eek.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/laugh.gif")) == "12ed99bbd1f005d032d8ccf72cd6f32f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/laugh.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/laugh.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/cry.gif")) == "36215fb000e42ce42ce0decf787f9c26")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/cry.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/cry.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/theme.txt")) == "9020b706831b00b0e3ea5610036262ec")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/theme.txt</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/theme.txt (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/wink.gif")) == "c4faa92f831c3154ead2381d57c07279")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/wink.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/wink.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/idea.gif")) == "59cb7ca1114595e01f7f86a4dbedbd8e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/idea.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/idea.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/alien.gif")) == "041346982a5ab7caf90ebaaa677cd39a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/alien.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/alien.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/redface.gif")) == "3a7a7500543b11a012caf1db52494ad9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/redface.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/redface.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/author.txt")) == "debe661cf6cde044944b5df151299f37")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/author.txt</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/author.txt (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/exclam.gif")) == "eff97cbebe3ebaa8c7fb170b0e021ecc")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/exclam.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/exclam.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/arrow.gif")) == "29b2a1340d0aa879ee05a2ee1ff87902")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/arrow.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/arrow.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/smile.gif")) == "100c0286316a4d19b42f5ccd565d6064")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/smile.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/smile.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/angry.gif")) == "51e8ddd378707afe08960b445f12ec11")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/angry.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/angry.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/cool.gif")) == "8584627443f4ddadcf42fc1635da9c4a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/cool.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/cool.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/surprised.gif")) == "9dd0bae8ba4f092dcb69fae6d30f3c9d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/surprised.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/surprised.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/lol.gif")) == "ba84335aa5cbd179443e96bae8947f7e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/lol.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/lol.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/confused.gif")) == "b6985c61fea3d04687d15bf411152496")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/confused.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/confused.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/sad.gif")) == "750285e6074e9ea7c1057e23bfa4d24f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/sad.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/sad.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phoenity/smileys/evil.gif")) == "dd431e18a98d8e9d54a345590ae32377")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phoenity/smileys/evil.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phoenity/smileys/evil.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/info.php")) == "74a782006acc5d1f7d5035c8f2a2b4c3")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/info.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/info.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/sad.png")) == "dc7e856a342a6179addfcf079f16112b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/sad.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/sad.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/tongue.png")) == "0d8be3cfef845b5b7c082ff5952adc9d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/tongue.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/tongue.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/smile.png")) == "c80d66c3ad960b512cd1dbd96edebb89")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/smile.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/smile.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/cry.png")) == "e1209e55027107d428eb608be5a45303")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/cry.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/cry.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/wink.png")) == "da1a6609b507a3b63e66f3e3da683157")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/wink.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/wink.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/neutral.png")) == "37b38d73fb55923816cb524328935170")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/neutral.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/neutral.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/theme.txt")) == "cef0e97e06b0e7655e7869754e489055")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/theme.txt</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/theme.txt (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/dizzy.png")) == "6c4fed5689adaedd6a27844316fc9bca")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/dizzy.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/dizzy.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/caca.png")) == "70d7e6aabce7bdd60f201eefe3525737")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/caca.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/caca.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/lol.png")) == "bd5321c4efe6532827371632a331aac9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/lol.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/lol.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/confused.png")) == "0a8cb5ae4cf3ab97b4553874237360a9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/confused.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/confused.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/happy.png")) == "ba79b8655ff133ce8ca92ae60c73c1f9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/happy.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/happy.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/cerutti/smileys/omg.png")) == "7e46b23ed7b42e04409de85b9dbab4b3")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/cerutti/smileys/omg.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/cerutti/smileys/omg.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/online-on.gif")) == "4a03a397c30f93f4236e5e0d68026930")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/online-on.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/online-on.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/sound-off.gif")) == "6bca72a591b2b4a85669fc75d9e98b91")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/sound-off.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/sound-off.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/minimize.gif")) == "04974148218dbe7284983646bf72ac5d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/minimize.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/minimize.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/newmsg.gif")) == "47bdd9133eef9ae200c86b706383d4dd")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/newmsg.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/newmsg.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/online-separator.gif")) == "60d59675ec62bec9f31ef28d27c389c8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/online-separator.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/online-separator.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/bt_em.gif")) == "2364167a9fc1dd1fd376e88451e0ff8d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/bt_em.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/bt_em.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/pv.gif")) == "44631a4b74df80854e3edd8b1da6bea9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/pv.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/pv.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/smiley-off.gif")) == "3881a1b15d1fd06d589e43594f38b6da")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/smiley-off.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/smiley-off.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/maximize.gif")) == "a4148fb4c8e0a4e5d90c2fefb815c051")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/maximize.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/maximize.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/oldmsg.gif")) == "ae0d2ffd77ae2c56e7613a02fe9097c0")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/oldmsg.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/oldmsg.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/bt_strong.gif")) == "e1aaaf2554f0923b06dc71540b79c097")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/bt_strong.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/bt_strong.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/color-on.gif")) == "da3386e8fc6fded6551efcb0491d1533")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/color-on.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/color-on.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/color_transparent.gif")) == "d16660b200a240936a5074e2d3615323")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/color_transparent.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/color_transparent.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/openpv.gif")) == "d2db7f3ba13898e7ea780a9d7ef9c253")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/openpv.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/openpv.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/blank.gif")) == "56398e76be6355ad5999b262208a17c9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/blank.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/blank.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/user-me.gif")) == "edd28039088e757c6da5dc8740dc768b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/user-me.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/user-me.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/tab_remove.gif")) == "e0ff46455a64eebd74d3ddb276931f62")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/tab_remove.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/tab_remove.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/online-off.gif")) == "1522801a97107bf25d3ea83084be4766")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/online-off.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/online-off.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/smiley-on.gif")) == "4633bd4a9624021b11d55b81c6f4f568")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/smiley-on.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/smiley-on.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/user.gif")) == "58e4ec775869cd5dca578f1c71660190")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/user.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/user.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/ch-active.gif")) == "3b967759fddccb24519d3a5d8a16adda")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/ch-active.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/ch-active.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/login.gif")) == "3ddc466237777d88338b096b9ca8b168")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/login.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/login.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/close-whoisbox.gif")) == "26a743e635a56b2f3012705bcf620780")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/close-whoisbox.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/close-whoisbox.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/ch.gif")) == "d63c31b681cbebc794c57f1e5e48f8a4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/ch.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/ch.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/pv-active.gif")) == "c60815ec64ae55b2a0bb906b699f0dd7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/pv-active.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/pv-active.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/user_female-me.gif")) == "68958bf29993ab364faad86c5e8faf28")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/user_female-me.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/user_female-me.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/user-admin.gif")) == "26976f1650f3e09514fd514f5b45321e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/user-admin.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/user-admin.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/bt_mail.gif")) == "2ac51570f2310600dbccde996d8900a4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/bt_mail.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/bt_mail.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/clock-on.gif")) == "cebf0d8c08804c222a97850ff556d6f7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/clock-on.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/clock-on.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/bt_pre.gif")) == "10e65e27c5d7f93133574a8148f20f40")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/bt_pre.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/bt_pre.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/clock-off.gif")) == "c951f92532352210637de1779034efa5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/clock-off.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/clock-off.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/user_female.gif")) == "59018c160126b2344d0111b20e516d0f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/user_female.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/user_female.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/sound-on.gif")) == "3dfde355962e0b26846b5a5712e06a8b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/sound-on.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/sound-on.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/bt_del.gif")) == "0a1925de3cab1c6d50cad8056da0854d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/bt_del.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/bt_del.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/color-off.gif")) == "c300cb4add51a7a51a5ea8255ff1215e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/color-off.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/color-off.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/logout.gif")) == "03eec524ec44c60cb102f93ad28c3e74")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/logout.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/logout.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/background.gif")) == "ed8ef21e3e13d132be4e83b83e9f5713")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/background.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/background.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/bt_color.gif")) == "855a08ec0053e2cd6dc979b4d782a310")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/bt_color.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/bt_color.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/images/bt_ins.gif")) == "05007e708b7f96c284f65d9f2f64136f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/images/bt_ins.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/images/bt_ins.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/customize.js.php")) == "04d48d318d65503d3ee7f7694a7670d9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/customize.js.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/customize.js.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/chat.js.tpl.php")) == "e3e083e587a98f7fb111aac34201cebf")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/chat.js.tpl.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/chat.js.tpl.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/style.css.php")) == "f3f141842eee25ed13be7e888ef254cf")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/style.css.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/style.css.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/chat.html.tpl.php")) == "7f842197b18a205deefca9c1f0c90cc9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/chat.html.tpl.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/chat.html.tpl.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/info.php")) == "c1b928cf2e0a869020e268b9e66ed9f2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/info.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/info.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/weather_clouds.png")) == "ebdaf00099570da61b98413456a28c84")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/weather_clouds.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/weather_clouds.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/emoticon_surprised.png")) == "fc2ea4521b77852675709abc9af1e756")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/emoticon_surprised.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/emoticon_surprised.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/emoticon_tongue.png")) == "88989f31f0a419767dee866c1aed125f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/emoticon_tongue.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/emoticon_tongue.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/weather_sun.png")) == "6455dfc18e75d64d04af04e20dea6064")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/weather_sun.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/weather_sun.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/emoticon_wink.png")) == "82faf3af26d63cda8d06f693a275ed0e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/emoticon_wink.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/emoticon_wink.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/emoticon_evilgrin.png")) == "ab804d23dfab2319fa42d0aabbb0c8d8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/emoticon_evilgrin.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/emoticon_evilgrin.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/weather_cloudy.png")) == "d31dc9c75a8fc9cafbc62792e30e4267")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/weather_cloudy.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/weather_cloudy.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/emoticon_happy.png")) == "8859b6a1cff8d81261933be315fec53a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/emoticon_happy.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/emoticon_happy.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/lightbulb.png")) == "5b11a0aec4a3f0f16e5931255b1a94fe")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/lightbulb.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/lightbulb.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/emoticon_grin.png")) == "cc48443affa11c0325e13da04ca0f4ef")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/emoticon_grin.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/emoticon_grin.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/theme.txt")) == "fe9c0667a0d98e95475e5c9a6def9819")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/theme.txt</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/theme.txt (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/emoticon_unhappy.png")) == "bae7c117bd214ebcc63cfc64d7559977")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/emoticon_unhappy.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/emoticon_unhappy.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/emoticon_smile.png")) == "476ec4e14fe9a402a596dfd1c1675228")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/emoticon_smile.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/emoticon_smile.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/emoticon_waii.png")) == "d47c83e12a92d8d640dd29f508c16ea4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/emoticon_waii.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/emoticon_waii.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/weather_rain.png")) == "8be60d731745d311efcbe3cda15c30d6")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/weather_rain.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/weather_rain.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/exclamation.png")) == "48e1f2aec2d8495c544c3f103ed73b74")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/exclamation.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/exclamation.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/weather_lightning.png")) == "49b6f51a4ac3a44eb3c7de3beeb6de76")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/weather_lightning.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/weather_lightning.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/arrow_right.png")) == "a73e6ecdd4d3cf98ffc43342f3880d79")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/arrow_right.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/arrow_right.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/arrow_left.png")) == "cadca7e476b3355c5bbad957c71741a1")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/arrow_left.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/arrow_left.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/smileys/weather_snow.png")) == "dc0acec7ef2f2c7413dd2c31fea7e543")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/smileys/weather_snow.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/smileys/weather_snow.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/sound.swf")) == "028c63d4ecbf31143a63104337075a93")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/sound.swf</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/sound.swf (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/default/iepngfix.htc")) == "2a44fd1a1147042abb6b980296dd05e6")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/default/iepngfix.htc</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/default/iepngfix.htc (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/newmsg.png")) == "b2be5793be8f7956239c029b5535c48e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/newmsg.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/newmsg.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/tab_off.png")) == "f727dbdfa853f8961507523aa1164530")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/tab_off.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/tab_off.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/user-me.gif")) == "380fee477d72cda55d565dbe60da5eb6")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/user-me.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/user-me.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/tab_remove.gif")) == "b7b94f7f28427d07ab12335d31e8b2c5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/tab_remove.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/tab_remove.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/pfc_send.png")) == "9c362ce36768a95262b37188cc293f23")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/pfc_send.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/pfc_send.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/user.gif")) == "7990ac9304cde47aa2fbb4b756a63948")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/user.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/user.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/pfc_words.png")) == "f20c325919c8696b813a99e63c726622")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/pfc_words.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/pfc_words.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/pfc_message2.png")) == "d273de0b3621b0b15beca65e6dc606b0")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/pfc_message2.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/pfc_message2.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/pfc_online.png")) == "553c5d9a83b91e3183e95007584afa72")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/pfc_online.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/pfc_online.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/oldmsg.png")) == "c49bb4de07f29a5a640d71d48be79eaf")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/oldmsg.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/oldmsg.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/pfc_message1.png")) == "9da3b43623f9b19638e81fb13c700050")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/pfc_message1.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/pfc_message1.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/channels_content_bg.png")) == "cc0a3058c4814df9717b4ff255dc9468")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/channels_content_bg.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/channels_content_bg.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/images/tab_on.png")) == "86a8aabbf294f6f9107fe3454b093283")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/images/tab_on.png</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/images/tab_on.png (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/style.css.php")) == "e04f2206ee560a7f3e0829140dd7c684")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/style.css.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/style.css.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/zilveer/info.php")) == "29daa1a30f32336276cf1ca2818d381d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/zilveer/info.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/zilveer/info.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_cool.gif")) == "25c83ea511f206e88f214719dad9c88c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_cool.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_cool.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_shifty.gif")) == "b485a5374343e8aa45fcd25e919b8aec")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_shifty.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_shifty.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_idea.gif")) == "aaebc9c048367118ba65e1da46bc3e08")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_idea.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_idea.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_naughty.gif")) == "97977aebbdc02eb3bedb03dc302d089a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_naughty.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_naughty.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_twisted.gif")) == "c9c3d12da1e9da699e490b86d24eee85")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_twisted.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_twisted.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_razz.gif")) == "7aec68426aa06f01e2b1ac250e5aee62")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_razz.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_razz.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_question.gif")) == "0518596a4eb94c32a2b2ed898bdc3549")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_question.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_question.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_wink.gif")) == "f058206bb8ff732dbe8e7aa10d74c9cd")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_wink.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_wink.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_confused.gif")) == "4affed1b55e5f73c9f0675ae7d0ad823")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_confused.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_confused.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_cry.gif")) == "7605eca95aaeda46e641745ef6f0e0b0")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_cry.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_cry.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_snooty.gif")) == "e108015689c8fd501c1463ece170b88c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_snooty.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_snooty.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_redface.gif")) == "d7e9d095432cbcf09375ffc782c30c23")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_redface.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_redface.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_smile.gif")) == "9ee646ffab71107d1a11407be52f33a5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_smile.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_smile.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_drool.gif")) == "b206469a2c4afdcba57d56fbd0871439")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_drool.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_drool.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_mrgreen.gif")) == "54e8505227edae1e583cf2f9554abc3a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_mrgreen.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_mrgreen.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_frown.gif")) == "5a50535a06def9d01076772e5e9d235b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_frown.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_frown.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_whistle.gif")) == "8b1565b7109ab4510d2cd7edefebc463")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_whistle.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_whistle.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_mad.gif")) == "e4355c00894da1bd78341a6b54d20b56")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_mad.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_mad.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_sad.gif")) == "5a50535a06def9d01076772e5e9d235b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_sad.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_sad.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_dance.gif")) == "b7e11d832f670c0409d23cafaa8ebd8e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_dance.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_dance.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_sick.gif")) == "d998a746f60e61d1ea67a18df5688c19")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_sick.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_sick.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_exclaim.gif")) == "da86bbf377f97d06047aa781a582c52f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_exclaim.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_exclaim.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/theme.txt")) == "e657ba19b831d1d2c019f95f348e19ec")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/theme.txt</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/theme.txt (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_doh.gif")) == "98c85ed88ddf132d1844764745f623b5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_doh.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_doh.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_clap.gif")) == "2c89896da3b4caf1ef92889ad0672b9e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_clap.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_clap.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_wall.gif")) == "6cbafdf6a297dd1005981d0d3a71633e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_wall.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_wall.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_arrow.gif")) == "394bffa679f650b7d2f22aa263cc06ba")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_arrow.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_arrow.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_hand.gif")) == "fc90b256cb4d643acf1701a5655efb42")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_hand.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_hand.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_lol.gif")) == "b76e7729d43c4a49182d020741285bef")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_lol.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_lol.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_pray.gif")) == "195772090f39a559afde011d948cdfb2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_pray.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_pray.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_silenced.gif")) == "f0d041ecd9aeec95dd41a517f31ce7b1")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_silenced.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_silenced.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_rolleyes.gif")) == "19071b1af987946e96dcef6ce0611c6b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_rolleyes.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_rolleyes.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_neutral.gif")) == "4e8b7a51c7f60a2362a4f67fbbc937e7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_neutral.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_neutral.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_shhh.gif")) == "ee53d3e76c849a14bada50465c45619d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_shhh.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_shhh.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_surprised.gif")) == "ae735b5dd659dc4b3b0f249ce59bef79")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_surprised.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_surprised.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_biggrin.gif")) == "f970a6591668c625e4b9dbd3b7a450d7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_biggrin.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_biggrin.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_boohoo.gif")) == "801e99c1fa246dc76beca2b0edf981bb")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_boohoo.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_boohoo.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_eek.gif")) == "52e43743e38a67d5d28845a104ca8c7d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_eek.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_eek.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/icon_evil.gif")) == "178255bb3fe2c3aa790c1f8ec8738504")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/icon_evil.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/icon_evil.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_angel.gif")) == "ab86302adb7a6e13d0750dd1740e5c81")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_angel.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_angel.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_think.gif")) == "532437bda0de45a9802e46edb9297ecc")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_think.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_think.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_liar.gif")) == "c20ec555384f78001f2a31ae30d08df1")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_liar.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_liar.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/phpbb2/smileys/eusa_eh.gif")) == "ebabf045c8a5175713bd0df70f171337")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/phpbb2/smileys/eusa_eh.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/phpbb2/smileys/eusa_eh.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/blune/images/online-on.gif")) == "b0d3ad5555be67098ad4744fa287587b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/blune/images/online-on.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/blune/images/online-on.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/blune/images/smiley-off.gif")) == "842cbed27d0c58f5266fd78571ec892b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/blune/images/smiley-off.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/blune/images/smiley-off.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/blune/images/online-off.gif")) == "2a674af5e4c079ffddd29636c32d4567")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/blune/images/online-off.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/blune/images/online-off.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/blune/images/shade.gif")) == "f698bb62d97653ffa67194f15ca6dc67")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/blune/images/shade.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/blune/images/shade.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/blune/images/smiley-on.gif")) == "d179fcd72ac088d1581293768995408f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/blune/images/smiley-on.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/blune/images/smiley-on.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/blune/style.css.php")) == "fa5b8509d821eae281339ca6a96642b7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/blune/style.css.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/blune/style.css.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/blune/info.php")) == "7c8ae17657410ec3383415e51cde7346")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/blune/info.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/blune/info.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/green/images/pv.gif")) == "a2aa2c317784441d98fe6fa4fb12b40a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/green/images/pv.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/green/images/pv.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/green/images/shade.gif")) == "ab7a16562a524d5b013897a255e82a14")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/green/images/shade.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/green/images/shade.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/green/images/ch-active.gif")) == "3149768414696468fc05265847317051")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/green/images/ch-active.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/green/images/ch-active.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/green/images/ch.gif")) == "81da3989457825bf584c5d1afdfa3106")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/green/images/ch.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/green/images/ch.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/green/images/pv-active.gif")) == "e16d305795a4b70c200d160abaf2b9e8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/green/images/pv-active.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/green/images/pv-active.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/green/style.css.php")) == "077af8a583bfb0cd33e26a4178aac01f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/green/style.css.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/green/style.css.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/green/info.php")) == "c1b928cf2e0a869020e268b9e66ed9f2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/green/info.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/green/info.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_devil.gif")) == "f0c8e3e78f63bc6efb22cbc5c865a51d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_devil.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_devil.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_thumbdown.gif")) == "0bdd0133c44b68410c8aafd97317d145")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_thumbdown.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_thumbdown.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_think.gif")) == "9b686d115a52031f69c9560d6329e2b2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_think.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_think.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_donttell.gif")) == "9e8b0728342d828f0b44032d95942c03")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_donttell.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_donttell.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_soccer.gif")) == "3c7dda7ffc32c2a9f16017d2fb7998fb")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_soccer.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_soccer.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_embarrassed.gif")) == "1167cab2b4f41b27d93ac38ea3fac5db")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_embarrassed.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_embarrassed.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/gnu.gif")) == "c017971d158684c9c8c90465d463aad2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/gnu.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/gnu.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_beer.gif")) == "3d87073da754666de1ae484520067e68")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_beer.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_beer.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_idea.gif")) == "90c7d0fd141ef81f0691b05af121d012")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_idea.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_idea.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_rainbow.gif")) == "a92a5f2a6255f0de1e2cb92e753e6cc9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_rainbow.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_rainbow.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_plane.gif")) == "cb6454c37f97ebcd104d9f48f9580c77")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_plane.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_plane.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_cry.gif")) == "24a7e85607b77df2ca351b9070455614")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_cry.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_cry.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_smiley.gif")) == "1ee7380f552a1e8aa2dd3d79d42a1fc8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_smiley.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_smiley.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/tux1.gif")) == "7daca5cbc2ed09d38745ae4455ec69fa")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/tux1.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/tux1.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_phone.gif")) == "93683094f4d09077a5f36b70fcc473e4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_phone.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_phone.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_sad.gif")) == "65de771d331642697b10f4078c04fc74")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_sad.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_sad.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_film.gif")) == "3b75f3cb6f6729db7fe4f13c0f850769")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_film.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_film.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_coffee.gif")) == "8e2ede77d072f9557ee09bac03709bf5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_coffee.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_coffee.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_angel.gif")) == "761927ceda5306fb4f555558b2d4e77e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_angel.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_angel.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_secret.gif")) == "71c843a5c1d2fa6f5d3b2eb610733886")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_secret.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_secret.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_cat.gif")) == "debe5495ac32c1ec84249e075e64576c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_cat.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_cat.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/tux2.gif")) == "a243f306eb4b248130e32a016fc8e8bf")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/tux2.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/tux2.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_cigarette.gif")) == "136b67c5f06c2ce2fca562b0ebd14ac0")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_cigarette.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_cigarette.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_clock.gif")) == "8c33386946ac0cdcd6b2d7f7e5c79eb3")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_clock.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_clock.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_thumbup.gif")) == "d78bf1b8d73a4dbfb8f183f392cad6bd")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_thumbup.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_thumbup.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_eyeroll.gif")) == "e34f303e2a6897a9039da2ff9d5deef9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_eyeroll.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_eyeroll.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_neutral.gif")) == "314b193857a72951f6e13757002e4135")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_neutral.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_neutral.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_photo.gif")) == "1a69b2eb42989bd855101a96909663c8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_photo.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_photo.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_sick.gif")) == "6c4b3703caac139fb4e38cb7a6823063")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_sick.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_sick.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_question.gif")) == "7a4f023c40389bbef08113d92384af51")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_question.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_question.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_island.gif")) == "688852a51f9296c19002119ba1502296")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_island.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_island.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_coins.gif")) == "9accfd4cf71ec99ba33d3ed686dfeed4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_coins.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_coins.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_umbrella.gif")) == "583547b8b39ca01ed3eeb213978744f8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_umbrella.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_umbrella.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_star.gif")) == "90eecfdf2c786fc4d9d6a30989f2039b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_star.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_star.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_sunglasses.gif")) == "59933cc704a8ca4ad93db092ad20b02d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_sunglasses.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_sunglasses.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_stormy.gif")) == "5d18d4dd2ce4bd87f10e28c9fb41f873")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_stormy.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_stormy.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_dontknow.gif")) == "79f66d387ef7be6e90d6514e4ad3c1d5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_dontknow.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_dontknow.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_weird.gif")) == "f6a1caf92eec504b6c97faa9ef229040")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_weird.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_weird.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_drink.gif")) == "f592cca6c2c5fa68b5dbdfc55fd9cd92")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_drink.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_drink.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_girl.gif")) == "8404882aadbae0e7c2e32efafd6dcc0f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_girl.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_girl.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_sun.gif")) == "e284ffdf854b6144619d16fb7b88cfd2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_sun.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_sun.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_highfive.gif")) == "b059e1ba589cbdeccf2bbeb27ad19553")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_highfive.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_highfive.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_note.gif")) == "574a48a41eed6f7ba30e9dc1d0e5bcca")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_note.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_note.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_brb.gif")) == "069e799ebe2059e10f9afec6cdc53c90")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_brb.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_brb.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_cellphone.gif")) == "bfeba2b52116654f3b1ebd1d65d5e794")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_cellphone.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_cellphone.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_flower.gif")) == "d4486b8b37e5e04e2af5edd56e87e4b2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_flower.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_flower.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_away.gif")) == "ba0f5bee90980daebc947f1b8f4a05b2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_away.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_away.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_kiss.gif")) == "8155230f268dbc70200f9521bd97e077")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_kiss.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_kiss.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/theme.txt")) == "9416aa435b29822261452ba722280a54")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/theme.txt</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/theme.txt (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_lightning.gif")) == "ff6bd1245c5976c8a5f8d1cd96dfa8c3")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_lightning.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_lightning.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_tongue.gif")) == "aaa70458bf6cd69e70d5d0e36b6f22af")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_tongue.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_tongue.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_sleep.gif")) == "5de060131577d41faa7b9905fd48fdfd")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_sleep.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_sleep.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_online.gif")) == "1db28f6ef55a6abd924d6bd956711ad1")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_online.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_online.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_pizza.gif")) == "3eec29dabde7af45ad119d33dd621eec")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_pizza.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_pizza.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_teeth.gif")) == "62355df280ea829874a3a2d0c2fd3e2c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_teeth.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_teeth.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_turtle.gif")) == "f9fa8300b8d46806e1a91a7205a78fb3")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_turtle.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_turtle.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_laugh.gif")) == "fa4df10bc0f59f9cd7fb3d17d9666809")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_laugh.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_laugh.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_gift.gif")) == "bdc2b2e4a5c5705d397c8814322c6d71")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_gift.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_gift.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_brheart.gif")) == "637327f448a391921608263b7f9690ab")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_brheart.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_brheart.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_car.gif")) == "1be632c228e3f7234f55f19c3357a7e5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_car.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_car.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_xbox.gif")) == "ee1b2f5691108851dca8c8ff44ea1302")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_xbox.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_xbox.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_boy.gif")) == "4d4e94744010373fdd74b2fe88bc21b6")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_boy.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_boy.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_heart.gif")) == "b88cb76e3415cca92a1397d3f0759968")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_heart.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_heart.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_plate.gif")) == "c605dae169de7175febf26c108b4442b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_plate.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_plate.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_ooooh.gif")) == "229770690af97f704f306c37beb1c4ff")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_ooooh.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_ooooh.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_icon.gif")) == "531b3814aeedadb6ea298ab157d9bd74")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_icon.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_icon.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_fingerscrossed.gif")) == "060ecdb116be2852a87396b707e6d93e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_fingerscrossed.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_fingerscrossed.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_wink.gif")) == "bb48a7ad6bc3eb337dd477aa1e199b51")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_wink.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_wink.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_occ.gif")) == "07cbf6ea5cb737eece58ba23a9a4714e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_occ.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_occ.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_sleepy.gif")) == "92fa97a6e8ff890d6870c5fd10088102")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_sleepy.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_sleepy.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_handcuffs.gif")) == "af1b4a62da5932578b43f6c0e62e2d81")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_handcuffs.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_handcuffs.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_computer.gif")) == "681ab1613f1c16260af0551d6748e566")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_computer.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_computer.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_sheep.gif")) == "c067d767a4ce62d653feb5a1b1317ef1")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_sheep.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_sheep.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_email.gif")) == "e797693d1a564930d4ae5eeb832d4c94")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_email.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_email.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_run.gif")) == "082c8ce4c434c47408bdce9b1f4a6a21")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_run.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_run.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_hot.gif")) == "5016c1b9bffa889822ff9a25df0e8f04")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_hot.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_hot.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_cake.gif")) == "f97eb0ab0f6cd85b308c3d450453c184")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_cake.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_cake.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_snail.gif")) == "f3b0a85f1b7025d9e1f763f94018ff19")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_snail.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_snail.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_bowl.gif")) == "0cb273f38ed21dfef3ba6b3edc4edc4a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_bowl.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_bowl.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_angry.gif")) == "de7d8369a1bdc21e90b12ecaceb3be95")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_angry.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_angry.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_deadflower.gif")) == "6c3f5436a58ec2354778d1e3287fc7f4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_deadflower.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_deadflower.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_bat.gif")) == "68ebb31be298bcfaf416b230e8d4cc36")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_bat.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_bat.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_dog.gif")) == "016da97e9b4807ee74ea2243c582f4ae")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_dog.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_dog.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_sarcastic.gif")) == "b7ab1a6f9dcdcc3a0f420aa44aad1d44")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_sarcastic.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_sarcastic.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_nerd.gif")) == "c536cd997d2f943643b6d1285712f4c8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_nerd.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_nerd.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_runback.gif")) == "0a12e8849b43091a7994e7cb444bc8bf")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_runback.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_runback.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./themes/msn/smileys/msn_party.gif")) == "312e8faf0d264ef3520c9873a8c01cdf")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./themes/msn/smileys/msn_party.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./themes/msn/smileys/msn_party.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/pl_PL/main.php")) == "16a1211f7e55157e67775228d20a681a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/pl_PL/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/pl_PL/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/sv_SE/main.php")) == "cabfe1e9bfb71fc9d420650a8c1a0a71")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/sv_SE/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/sv_SE/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/nb_NO/main.php")) == "8e018225d8648f16ba3b733982caf853")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/nb_NO/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/nb_NO/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/uk_RO/main.php")) == "fcd882e3b153b241124816ab9fab17f7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/uk_RO/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/uk_RO/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/nl_BE/main.php")) == "b0f0087c305b44a4a1e57b042ffd42b4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/nl_BE/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/nl_BE/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/fr_FR/main.php")) == "e6750a013022143fab98901ad01a0436")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/fr_FR/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/fr_FR/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/pt_BR/main.php")) == "5a3d6e70791908ac62e8b06183545a15")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/pt_BR/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/pt_BR/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/bg_BG/main.php")) == "de9bb201ba35e8a09d7c97f6d73875c5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/bg_BG/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/bg_BG/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/ru_RU/main.php")) == "3bfc1ff64718bd4adca5a3c6f252ca2c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/ru_RU/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/ru_RU/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/hy_AM/main.php")) == "6faffdbfcd04731b98bdef78c1804f5f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/hy_AM/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/hy_AM/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/ba_BA/main.php")) == "04ef440a32fdf113f7f1db4631922638")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/ba_BA/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/ba_BA/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/zh_TW/main.php")) == "3ff9d3825704578c9477c6108c5343eb")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/zh_TW/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/zh_TW/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/de_DE-informal/main.php")) == "8d71ca20566ad5f13a6646c30a37af49")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/de_DE-informal/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/de_DE-informal/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/de_DE-formal/main.php")) == "c6c11bfdc7bf24a0b17fb1d78064b208")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/de_DE-formal/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/de_DE-formal/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/tr_TR/main.php")) == "7ad1a6cfbca14cdca9e40b79051c7d3f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/tr_TR/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/tr_TR/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/el_GR/main.php")) == "1877b453859585df1b1a1add0c0b97ed")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/el_GR/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/el_GR/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/sk_SK/main.php")) == "3ad251cc3cbbfd732b1bf1b18aef8234")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/sk_SK/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/sk_SK/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/pt_PT/main.php")) == "c60949a9016570f4e5a77139246df3c8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/pt_PT/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/pt_PT/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/ar_LB/main.php")) == "d60399d5f730dab4cfb63b77cde0d331")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/ar_LB/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/ar_LB/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/eo/main.php")) == "21067405706fcf03557e2c019a7a480c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/eo/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/eo/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/ca_CAT/main.php")) == "4b522bfbee5eccbe5715c3c23412fb54")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/ca_CAT/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/ca_CAT/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/ja_JP/main.php")) == "3b23f32a917249f1d36de8d5dbcca3fc")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/ja_JP/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/ja_JP/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/oc_FR/main.php")) == "02e5a2c72f934aef2ad1a24d676f2a2d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/oc_FR/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/oc_FR/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/es_ES/main.php")) == "b9aa34d080a75d95e251de7ae76cba8d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/es_ES/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/es_ES/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/zh_CN/main.php")) == "619031f8d43732e661789f1754a041ba")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/zh_CN/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/zh_CN/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/da_DK/main.php")) == "62629eebfc43a4ea1bdbe20de7e3a9b4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/da_DK/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/da_DK/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/uk_UA/main.php")) == "c4c3df8be94d22b1cbc5a24ddf1517fa")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/uk_UA/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/uk_UA/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/vi_VN/main.php")) == "8098c3bffc699bf1fdf5f866fcebb679")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/vi_VN/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/vi_VN/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/hu_HU/main.php")) == "e4f3028730b229e7a1a047e562095414")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/hu_HU/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/hu_HU/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/bn_BD/main.php")) == "fa68613c5c18b37a815f5e29eb5e13f9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/bn_BD/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/bn_BD/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/id_ID/main.php")) == "0c18907029e973c59ee6b64d0a545cc3")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/id_ID/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/id_ID/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/cs_CZ/main.php")) == "bd74b9c78cab557304db9a1ca53ad05b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/cs_CZ/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/cs_CZ/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/sr_CS/main.php")) == "a8e9bf8b4bfdbe12a171b061a2c9807b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/sr_CS/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/sr_CS/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/nn_NO/main.php")) == "b2e0479d4b6854afeb4a38307bfe4664")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/nn_NO/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/nn_NO/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/it_IT/main.php")) == "26f756e03084d15ca58ce4cd583a9440")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/it_IT/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/it_IT/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/en_US/main.php")) == "4d70311a211061651ed58cafdcd03abb")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/en_US/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/en_US/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/th_TH/main.php")) == "365e794be31b5dfb3eb682d558a64d0b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/th_TH/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/th_TH/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/gl_ES/main.php")) == "b9fea56a94374c5762b37b24b14824f5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/gl_ES/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/gl_ES/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/ko_KR/main.php")) == "d1e94defc466b9d4ef6a9f3199b011bf")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/ko_KR/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/ko_KR/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/mk_MK/main.php")) == "36bb02ca69fd797e5eac17d09157c6d2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/mk_MK/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/mk_MK/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/nl_NL/main.php")) == "596c5038f8b08908b858dfe2cbbf0b02")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/nl_NL/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/nl_NL/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./i18n/hr_HR/main.php")) == "3367529dfafd3f7a3107cc8bf1ec3532")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./i18n/hr_HR/main.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./i18n/hr_HR/main.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo33_in_portuguese_from_portugal.php")) == "111ab2ec143365ce47801ce7e8e3a912")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo33_in_portuguese_from_portugal.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo33_in_portuguese_from_portugal.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo43_change_the_nicknames_colors.php")) == "e772c5027d6b635888f9896ff8b22727")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo43_change_the_nicknames_colors.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo43_change_the_nicknames_colors.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo40_in_turkish.php")) == "1d08d39f0f373c929207402108f760f9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo40_in_turkish.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo40_in_turkish.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo53_in_armenian.php")) == "4a824e6b72a5121931d0d8b7709ba746")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo53_in_armenian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo53_in_armenian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo24_in_spanish.php")) == "05fa6ce774c1c0f83482fc31294aad26")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo24_in_spanish.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo24_in_spanish.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo65_metadata_and_html.php")) == "3a016914110dd3f94f51e1349e21871c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo65_metadata_and_html.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo65_metadata_and_html.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo62_in_belgian_dutch.php")) == "fca924fa4cb8fcdd7d2347283545c554")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo62_in_belgian_dutch.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo62_in_belgian_dutch.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/index.php")) == "8e97a6a2aad0bce5bd4dea95af3ad489")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/index.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/index.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo19_in_japanese.php")) == "96e1af245c9b0ec07eac075f4cd78966")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo19_in_japanese.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo19_in_japanese.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_customized_usermetadata.php")) == "4efb7ea1bdf5abbea19c0008279c1798")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_customized_usermetadata.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_customized_usermetadata.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo4_simulate_slow_server.php")) == "74d20f58ef20fbbf2147b376b19eb84a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo4_simulate_slow_server.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo4_simulate_slow_server.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo16_in_arabic.php")) == "fd0960100b59bcf705900d7bad450442")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo16_in_arabic.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo16_in_arabic.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo42_in_chinese_from_taiwan.php")) == "77bdae5f74fa654ff8741c4efe8b7ccc")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo42_in_chinese_from_taiwan.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo42_in_chinese_from_taiwan.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo44_green_theme.php")) == "3b9670fd07c36c5ed7084564185463a0")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo44_green_theme.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo44_green_theme.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo5_customized_style_data/mytheme/images/newmsg.gif")) == "c1148ffba533cf181ca98b0d779330a1")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo5_customized_style_data/mytheme/images/newmsg.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo5_customized_style_data/mytheme/images/newmsg.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo5_customized_style_data/mytheme/images/oldmsg.gif")) == "33eb60245c48c250ce1fbd3870e5ccd7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo5_customized_style_data/mytheme/images/oldmsg.gif</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo5_customized_style_data/mytheme/images/oldmsg.gif (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo5_customized_style_data/mytheme/images/brick.jpg")) == "113df3c3b797b22ffd682c9fc2357c81")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo5_customized_style_data/mytheme/images/brick.jpg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo5_customized_style_data/mytheme/images/brick.jpg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo5_customized_style_data/mytheme/style.css.php")) == "b456d205618f090481f8763f3512e9da")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo5_customized_style_data/mytheme/style.css.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo5_customized_style_data/mytheme/style.css.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo58_in_danish.php")) == "4a9e22a2f24208e8b24ca8155cb3e069")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo58_in_danish.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo58_in_danish.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo5_customized_style.php")) == "1de480a513097d03b586c3fc62f57bb8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo5_customized_style.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo5_customized_style.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo51_zilveer_theme.php")) == "51fb864e9ec2fcc99e71b54dda1f7bd4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo51_zilveer_theme.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo51_zilveer_theme.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo13_in_german_informal_language.php")) == "1b8f100c417dce97e33f04f7693f64b1")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo13_in_german_informal_language.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo13_in_german_informal_language.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo28_blune_theme.php")) == "b4c7072ea53862d10115f1e25262377d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo28_blune_theme.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo28_blune_theme.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo63_in_thai.php")) == "f92172c631f8cf1e62675f716cb3d17d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo63_in_thai.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo63_in_thai.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo7_in_english.php")) == "9c75e76a8f0cbcee4fbd4d0aab67573f")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo7_in_english.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo7_in_english.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/avatar6.jpg")) == "d2c4152dad072c5901e788d8208793e0")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/avatar6.jpg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/avatar6.jpg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/avatar4.jpg")) == "fb11c521913c09945b62208748b5ea48")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/avatar4.jpg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/avatar4.jpg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/avatar8.jpg")) == "4f1d3dab54e822397ebaa017cdb442d9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/avatar8.jpg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/avatar8.jpg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/avatar3.jpg")) == "84aa2dcd8559c37ca0aa749cb7b84122")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/avatar3.jpg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/avatar3.jpg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/avatar5.jpg")) == "fb9ab84220704278ccef13757b494e9a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/avatar5.jpg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/avatar5.jpg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/avatar2.jpg")) == "2dc0dc886216c1c47ce7623a881df5d6")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/avatar2.jpg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/avatar2.jpg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/avatar1.jpg")) == "496590f29defff6282a34e450d8fbe52")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/avatar1.jpg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/avatar1.jpg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/avatar7.jpg")) == "06d4ebc78ff034e0780cb777f5f37867")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/avatar7.jpg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/avatar7.jpg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/mytheme/customize.js.php")) == "ff193fcdd1d9a17f6e280fd91d9eaef5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/mytheme/customize.js.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/mytheme/customize.js.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/mytheme/style.css.php")) == "16191d93c942322d7c95289426ba2bbd")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/mytheme/style.css.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/mytheme/style.css.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo50_data/avatar9.jpg")) == "2d95a0d6104eb6e0cf13b75c9b547c29")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo50_data/avatar9.jpg</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo50_data/avatar9.jpg (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo31_show_who_is_online-whoisonline.php")) == "385c3c05f345fe5a6780b9b99904d1ae")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo31_show_who_is_online-whoisonline.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo31_show_who_is_online-whoisonline.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo56_in_romanian.php")) == "5a3ad282cfd54a8f4e6ebac780cb91c9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo56_in_romanian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo56_in_romanian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo32_show_last_messages-config.php")) == "347d00d282b0b690f156ece051cbdd0b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo32_show_last_messages-config.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo32_show_last_messages-config.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo23_in_italian.php")) == "2308d6864ef8759528be194da1b58b57")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo23_in_italian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo23_in_italian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo12_phoenity_smiley_theme.php")) == "f27f8eac7bf12caf3de5b1aa41c6382b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo12_phoenity_smiley_theme.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo12_phoenity_smiley_theme.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo1_simple.php")) == "0d0812eddb012c4d7c80f021105e2622")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo1_simple.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo1_simple.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo41_in_greek.php")) == "e6525eaaaf0633e64b4f3a51edd329bb")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo41_in_greek.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo41_in_greek.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo2_simple_with_params.php")) == "dc8ed5868e6531af4befc121495b2d42")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo2_simple_with_params.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo2_simple_with_params.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo9_with_a_utf8_encoded_nickname.php")) == "a786133e52e57301a3791c2fd9e35c8e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo9_with_a_utf8_encoded_nickname.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo9_with_a_utf8_encoded_nickname.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo28_mini_blune_theme.php")) == "fd4379a544921ce3c777fcb4cfce5700")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo28_mini_blune_theme.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo28_mini_blune_theme.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo48_custom_proxy/myproxy.class.php")) == "9e3cce087415c80fa1f6f72c8bb101e8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo48_custom_proxy/myproxy.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo48_custom_proxy/myproxy.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo54_in_esperanto.php")) == "85c1b4ad0a002c6c92778480e7813cb6")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo54_in_esperanto.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo54_in_esperanto.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo3_client.php")) == "071e7f19dbaab0290f44dba1224bf8e1")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo3_client.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo3_client.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo55_mysql_container.php")) == "4c366abab53c31fe812b24334694a6b9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo55_mysql_container.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo55_mysql_container.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo14_in_german_formal_language.php")) == "4af0267b4dde60d8928e63c7fbb8b68c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo14_in_german_formal_language.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo14_in_german_formal_language.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo31_show_who_is_online-chat.php")) == "07225259dc282974d36cb633647b4c4a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo31_show_who_is_online-chat.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo31_show_who_is_online-chat.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo47_in_polish.php")) == "6cb186e1c56095a3bc81bf8b65b232c7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo47_in_polish.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo47_in_polish.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo10_in_chinese.php")) == "e371d7c1b17dbd726d356c7f9d8435a0")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo10_in_chinese.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo10_in_chinese.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo8_with_a_iso-8859-1_encoded_page.php")) == "9dd16df569c9f9be24cd5fd2eaa632b6")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo8_with_a_iso-8859-1_encoded_page.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo8_with_a_iso-8859-1_encoded_page.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo57_in_korean.php")) == "0c2c31e09d644da3373e72c4a09290a1")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo57_in_korean.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo57_in_korean.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo27_dice.class.php")) == "ff2767708426a5cbe02ea7e42da074dd")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo27_dice.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo27_dice.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo34_add_a_link_on_nicknames.php")) == "f4520e6e998efd7820c8381b9e2c41dd")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo34_add_a_link_on_nicknames.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo34_add_a_link_on_nicknames.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo32_show_last_messages-chat.php")) == "49e651b89129264c33335b6765b40286")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo32_show_last_messages-chat.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo32_show_last_messages-chat.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo66_in_occitan.php")) == "2fdb9df74688e852c64b9c84abfdcc77")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo66_in_occitan.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo66_in_occitan.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo37_in_dutch_from_netherlands.php")) == "78a1da944b2656e3ac42baac44068d73")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo37_in_dutch_from_netherlands.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo37_in_dutch_from_netherlands.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo27_customized_command.php")) == "d4b03cfd654bbafa2111f321deb6229a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo27_customized_command.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo27_customized_command.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo65_chat_popup.php")) == "f35cefeda07143b0857e89d44c28a0d7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo65_chat_popup.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo65_chat_popup.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo34_add_a_link_on_nicknames/mytheme/customize.js.php")) == "3889acabffd488200af1c617e4dddf4d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo34_add_a_link_on_nicknames/mytheme/customize.js.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo34_add_a_link_on_nicknames/mytheme/customize.js.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo21_with_hardcoded_urls.php")) == "90dd0d7f70a1552cd5873653a45fb69a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo21_with_hardcoded_urls.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo21_with_hardcoded_urls.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo48_custom_proxy.php")) == "754ab358b0d5aa0a26bef918c39337a4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo48_custom_proxy.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo48_custom_proxy.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo59_in_norwegian_nynorsk.php")) == "afc9aa787ed0eeff20c56e32e6e3e9a4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo59_in_norwegian_nynorsk.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo59_in_norwegian_nynorsk.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo29_in_russian.php")) == "0e9f5e85b4f55b58349fca9b53b49a36")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo29_in_russian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo29_in_russian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo15_multiple_channel.php")) == "c58e73c3bb2f49d4e1cf32ef29d1d0a7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo15_multiple_channel.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo15_multiple_channel.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo46_in_hungarian.php")) == "4e14835a935b5d76a12de3e218c7e778")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo46_in_hungarian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo46_in_hungarian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo32_show_last_messages-showlastmsg.php")) == "01754bddc19bee490d09d2a9c7179004")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo32_show_last_messages-showlastmsg.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo32_show_last_messages-showlastmsg.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo3_server.php")) == "2556330e0b99d525fdfa7ce69e94b9d9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo3_server.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo3_server.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo64_in_galician.php")) == "8c95ea4803f346d176f04cfef758d7cb")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo64_in_galician.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo64_in_galician.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo18_phpbb2_smiley_theme.php")) == "84b8b67d271bb58a905f54ed22abc6ee")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo18_phpbb2_smiley_theme.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo18_phpbb2_smiley_theme.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo3_config.php")) == "2fab383629390a4825a0b393380d9195")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo3_config.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo3_config.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo17_cerutti_smiley_theme.php")) == "be46cc8d9c69d110b2678d356bf3d604")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo17_cerutti_smiley_theme.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo17_cerutti_smiley_theme.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo25_in_indonesian.php")) == "933c8b54f2a29dd397bac1aba24ac58a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo25_in_indonesian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo25_in_indonesian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo61_in_croatian.php")) == "6c48669968198ec10f9b41e1519773cb")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo61_in_croatian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo61_in_croatian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo60_in_vietnamese.php")) == "72750f35d37ad75f0b695bd654784676")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo60_in_vietnamese.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo60_in_vietnamese.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo22_in_serbian_croatian.php")) == "6062456ce7bfccaaecd0a441ff58bc96")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo22_in_serbian_croatian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo22_in_serbian_croatian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo36_in_ukrainian.php")) == "543353b9a7ea2b37837f7f262a36e6a2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo36_in_ukrainian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo36_in_ukrainian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo26_in_swedish.php")) == "c7379cf2d100b6fb59536e26ca268e9b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo26_in_swedish.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo26_in_swedish.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo45_in_bulgarian.php")) == "4ed3e3b2e134b1d6e0ed435a4f583e24")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo45_in_bulgarian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo45_in_bulgarian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo6_in_french.php")) == "b295120ea85ce1d59a3d1c775a496059")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo6_in_french.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo6_in_french.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo49_msn_smiley_theme.php")) == "e9993743a7ced60c18dd2909fb96db7a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo49_msn_smiley_theme.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo49_msn_smiley_theme.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo52_in_bangla.php")) == "76bd8a9fab4165154a53b9da91654669")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo52_in_bangla.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo52_in_bangla.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo38_in_norwegian_bokmal.php")) == "80af65c8fd034c491f1bd110976a6f4a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo38_in_norwegian_bokmal.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo38_in_norwegian_bokmal.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo20_in_brazilian_portuguese.php")) == "754f8d9bed2c4f58523e038af320d760")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo20_in_brazilian_portuguese.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo20_in_brazilian_portuguese.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./demo/demo39_in_bosnian.php")) == "3fd69a43736598bb321f3867479a56b2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./demo/demo39_in_bosnian.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./demo/demo39_in_bosnian.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfccontainerinterface.class.php")) == "af726eb66353397dabb1e4747fd1af5a")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfccontainerinterface.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfccontainerinterface.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfcresponse.class.php")) == "ef6bc29f44e2a04c79aec5d1f9a51298")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfcresponse.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfcresponse.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfcinfo.class.php")) == "62521d559e6e4c040f5bb260b3bc0f71")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfcinfo.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfcinfo.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/proxies/noflood.class.php")) == "ee707277b11b2c6d9309b6443a5df242")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/proxies/noflood.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/proxies/noflood.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/proxies/checknickchange.class.php")) == "35ebe77dd80bcc9e249069da024c405b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/proxies/checknickchange.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/proxies/checknickchange.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/proxies/censor.class.php")) == "4a2eabddc47cdafec3495212539cda41")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/proxies/censor.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/proxies/censor.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/proxies/log.class.php")) == "e7480faf2c5f1f680908966a3daaa416")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/proxies/log.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/proxies/log.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/proxies/lock.class.php")) == "cabf8e57346f217a55793acb4834c699")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/proxies/lock.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/proxies/lock.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/proxies/checktimeout.class.php")) == "1b0c6272e963808351ff001d99968848")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/proxies/checktimeout.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/proxies/checktimeout.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/proxies/auth.class.php")) == "98bb07eb64c80cc9333c90d923648b91")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/proxies/auth.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/proxies/auth.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfci18n.class.php")) == "d35c60628f451c9bb370da8b573241f1")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfci18n.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfci18n.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfcurlprocessing.php")) == "c472ae27b7512d153d348b95dd293854")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfcurlprocessing.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfcurlprocessing.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfctools.php")) == "e28d289f68ab07ed0461352d4a0522dd")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfctools.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfctools.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfcjson.class.php")) == "77ad36b2c83155a3aa70732deb012e28")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfcjson.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfcjson.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfccommand.class.php")) == "97c756e835a03d6dffffd9cb8f000871")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfccommand.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfccommand.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/whois.class.php")) == "065119e27815a9a95d8f835b137d8183")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/whois.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/whois.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/kick.class.php")) == "e045d0bcef8ae9c54a5c80c9397b3fd2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/kick.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/kick.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/invite.class.php")) == "2f0da284de519cdf5495eb1da85e06c4")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/invite.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/invite.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/redirect.class.php")) == "856d3f878923e4e8d0fba11c51fdba32")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/redirect.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/redirect.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/debug.class.php")) == "7b0127fa7c7b0c460067b3d64eb7ed93")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/debug.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/debug.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/quit.class.php")) == "570bd237eb45cda22731c58fb32f5d63")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/quit.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/quit.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/connect.class.php")) == "09aa6c00c547d7bec7920afffe33e8ac")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/connect.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/connect.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/unban.class.php")) == "2f26811a2439916e80b428284bdd48a0")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/unban.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/unban.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/send.class.php")) == "39a3aa897c5dfad28831d948c09b420e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/send.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/send.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/who.class.php")) == "324951677b8b3a67f04c8978706faa59")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/who.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/who.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/ban.class.php")) == "e810df59bfc7763e96732f3cbcd70aa9")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/ban.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/ban.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/asknick.class.php")) == "8222c743d1eae6912a113657ed8efce7")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/asknick.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/asknick.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/version.class.php")) == "0c5e4832ee58d525e6703582be077d28")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/version.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/version.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/whois2.class.php")) == "3d4dd01c3589bd5ac95ee76648768fc5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/whois2.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/whois2.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/me.class.php")) == "f51928e1b3da796cca81ab42bd580077")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/me.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/me.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/init.class.php")) == "f7e037f6a117b8b7442da646fba03675")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/init.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/init.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/nick.class.php")) == "3ef83588e816d6446e1bde6aad780e21")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/nick.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/nick.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/banlist.class.php")) == "72c130c27d181992188fbf31b2292860")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/banlist.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/banlist.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/update.class.php")) == "d4918a5519a286f98346d9672070587b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/update.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/update.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/join.class.php")) == "e42afc6bbd6731c06fcbd7a2b9e48817")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/join.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/join.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/clear.class.php")) == "1f3c17be656d47132992cdf49e9fbd8b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/clear.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/clear.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/notice.class.php")) == "c4639b70411c8047950d4dad0c011373")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/notice.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/notice.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/error.class.php")) == "c47f0cd75c857107c52918e199e0790c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/error.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/error.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/leave.class.php")) == "2365e61980e6a5d28e3d5b522132bea0")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/leave.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/leave.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/who2.class.php")) == "519bb3fd46481198fd9193edecbc8467")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/who2.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/who2.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/privmsg.class.php")) == "dbc4c676a1bc6d950d2d2e8bf6ce8f72")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/privmsg.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/privmsg.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/privmsg2.class.php")) == "0a75dd01c65628768f3d287c2b31eb17")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/privmsg2.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/privmsg2.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/deop.class.php")) == "47aae56ed3e6040d84382398a41e4c7c")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/deop.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/deop.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/help.class.php")) == "c0c49466e980292e8b16beaea299ac57")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/help.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/help.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/identify.class.php")) == "8ece06787a64b179cfe9aca5d1302772")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/identify.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/identify.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/getnewmsg.class.php")) == "8852416adef7f4c2329aaaa12a5c8fb8")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/getnewmsg.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/getnewmsg.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/op.class.php")) == "bcc1edc239ef361242f2821c47bbcae2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/op.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/op.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/updatemynick.class.php")) == "3124d9378be8cc85764bfc30848fba29")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/updatemynick.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/updatemynick.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/join2.class.php")) == "971365bb2c2146c5be0c777f61ac97e2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/join2.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/join2.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/commands/rehash.class.php")) == "c30ece2addfd30d2e0c6937bcf090cf5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/commands/rehash.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/commands/rehash.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfccontainer.class.php")) == "939f7eea39d6f5b5cce1163b6ba7f2bc")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfccontainer.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfccontainer.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfcproxycommand.class.php")) == "495f179ea06acd0f193fde0ed507c096")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfcproxycommand.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfcproxycommand.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/phpfreechat.class.php")) == "9f69f474e2000fedcd6fc4fe09bd523e")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/phpfreechat.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/phpfreechat.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfctemplate.class.php")) == "403fd8bcd8ee81754a418a4186a464b5")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfctemplate.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfctemplate.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfcuserconfig.class.php")) == "ecc11a59dd7b7ad04a4367ab77f8531b")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfcuserconfig.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfcuserconfig.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/containers/file.class.php")) == "cc65a3996b53ba785e30000e6c806b68")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/containers/file.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/containers/file.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/containers/oracle.class.php")) == "808989868dbfc511ccdbd500b3f8a4b2")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/containers/oracle.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/containers/oracle.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/containers/mysql.class.php")) == "34c3f6fe46fddca98b8933876d77ee03")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/containers/mysql.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/containers/mysql.class.php (please replace this file by a correct one)</span>
";
if (md5(file_get_contents("./src/pfcglobalconfig.class.php")) == "319ddd0e1fa20650d5a60266458f0a7d")
  $files_ok[] = "<span style=\"color:#3A3\">ok - ./src/pfcglobalconfig.class.php</span>
";
else
  $files_ko[] = "<span style=\"color:#F33\">corrupted - ./src/pfcglobalconfig.class.php (please replace this file by a correct one)</span>
";
echo "<h2>Checking phpfreechat files validity</h2>";
echo "<pre>
";
$arr = array_merge($files_ko,$files_ok);
foreach($arr as $file)
  echo $file;
echo "</pre>
";
?>
