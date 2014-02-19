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
 * Strings for component 'theme_formal_white', language 'ru', branch 'MOODLE_24_STABLE'
 *
 * @package   theme_formal_white
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['blockcolumnwidth'] = 'Ширина колонки блоков';
$string['blockcolumnwidthdesc'] = 'Этот параметр устанавливает ширину колонки блоков для этой темы оформления. <strong>Блок «Календарь» не поместится в колонку, если указать значение (blockcolumnwidth-2*blockpadding) меньшее, чем 200 пикселей.</strong>';
$string['blockcontentbgc'] = 'Цвет фона содержимого блоков.';
$string['blockcontentbgcdesc'] = 'Этот параметр задает цвет фона содержимого блоков.';
$string['blockpadding'] = 'Поля вокруг блоков';
$string['blockpaddingdesc'] = 'Параметр задает поле между каждым блоком и колонкой, в которой они находятся.';
$string['choosereadme'] = '<div class="clearfix"> <div class="theme_screenshot"> <h2>Тема оформления «Formal White»</h2> <img src="formal_white/pix/screenshot.gif" /> <h3>Форум обсуждения тем оформления:</h3> <p><a href="http://moodle.org/mod/forum/view.php?id=46">http://moodle.org/mod/forum/view.php?id=46</a></p> <h3>Разработчики тем оформления:</h3> <p><a href="http://docs.moodle.org/en/Theme_credits">http://docs.moodle.org/en/Theme_credits</a></p> <h3>Документация по использованию тем оформления:</h3> <p><a href="http://docs.moodle.org/en/Themes">http://docs.moodle.org/en/Themes</a></p> <h3>Сообщить об ошибке:</h3> <p><a href="http://tracker.moodle.org">http://tracker.moodle.org</a></p> </div> <div class="theme_description"> <h2>О теме оформления</h2> <p>Тема «Formal White» с тремя колонками изменяющейся ширины перенесена в Moodle 2 из версии 1.X.</p> <h2>Изменения</h2> <p>Эта тема основана на двух - «Base» и «Canvas», обе родительские темы входят в ядро Moodle. Если Вы хотите изменить эту тему, то рекомендуется скопировать ее в папку с другим названием, и вносить изменения там. Это позволит защитить измененную тему от перезаписи при будущих обновлениях Moodle. К тому же в этом случае у Вас останутся оригинальные файлы на тот случай, если Вы что-то испортите. Более подробную информацию об изменении тем оформления можно найти в <a href="http://docs.moodle.org/en/Theme">Документации Moodle</a>.</p> <h2>Разработчики</h2> <p>Эта тема была разработана и поддерживается MediaTouch 2000. </p> <h2>Лицензия</h2> <p>Эта и все другие темы, включенные в ядро Moodle, распространяются на условиях лицензии <a href="http://www.gnu.org/licenses/gpl.html">GNU General Public License</a>. </div> </div>';
$string['configtitle'] = 'Тема оформления «Formal white»';
$string['creditstomoodleorg'] = 'Отображать ссылку на moodle.org';
$string['creditstomoodleorgdesc'] = 'Отображать ли привычный маленький логотип Moodle внизу страниц';
$string['ctmo_ineverypage'] = 'на каждой странице';
$string['ctmo_no'] = 'никогда';
$string['ctmo_onfrontpageonly'] = 'только на главной странице';
$string['customcss'] = 'Пользовательские CSS';
$string['customcssdesc'] = 'Любые указанные здесь стили CSS будут добавляться на каждую страницу, что позволяет легко изменить эту тему. Например, можно изменить цвет ссылки добавлением одного или нескольких из приведенного:
<pre>a:link, a:visited, a:hover, a:active, a:focus {color:blue;}</pre>. Измените примеры цвета и правила CSS на те, которые соответствуют Вашим желаниям.';
$string['customlogourl'] = 'Пользовательский логотип';
$string['customlogourldesc'] = 'Можно изменить логотип, используемый этой темой, указав URL нового (например: http://www.yoursite.tld/mylogo.png или ../path/to/your/logo.png). Как эталон, по умолчанию используется логотип шириной 200 и высотой 50 пикселей. Лучше использовать PNG-файл c прозрачным фоном.';
$string['displayheading'] = 'Отображать заголовок страницы';
$string['displaylogo'] = 'Показать логотип';
$string['fontsizereference'] = 'Размер шрифта';
$string['fontsizereferencedesc'] = 'Этот параметр позволяет установить размер шрифта по умолчанию для этой темы. Не рекомендуется задавать размер более 13px, поскольку известны случаи, когда это приводило к проблемам отображения некоторых блоков.';
$string['footnote'] = 'Сноска';
$string['footnotedesc'] = 'Этот текст будет отображаться в нижней части каждой страницы.';
$string['framemargin'] = 'Поля фрейма';
$string['framemargindesc'] = 'Пространство между фреймом и краем окна браузера. (Этот параметр будет игнорироваться, если запрашивается «{$a}»).';
$string['frontpagelogourl'] = 'Собственный логотип главной страницы';
$string['frontpagelogourldesc'] = 'Изменить логотип на главной странице Вашего сайта, можно введя полный или относительный URL к изображению, которое хотите использовать. Как эталон используется логотип шириной 300 и высотой 80 пикселей. Лучше использовать PNG-файл c прозрачным фоном.';
$string['headerbgc'] = 'Цвет фона заголовков блоков';
$string['headerbgcdesc'] = 'Параметр задает цвет фона заголовков блоков для этой темы.';
$string['headercontent'] = 'Содержимое заголовка';
$string['headercontentdesc'] = 'Выберите, что отображать в заголовке страницы - логотип Moodle или текст заголовка.';
$string['lblockcolumnbgc'] = 'Цвет фона левой колонки';
$string['lblockcolumnbgcdesc'] = 'Параметр задает цвет фона левой колонки для этой темы.';
$string['noframe'] = 'Внешний вид как в «Formal white 1.9»';
$string['noframedesc'] = 'Выберите эту параметр, чтобы страницы Moodle выглядели как в Moodle 1.*, без рамки.';
$string['pluginname'] = 'Formal white';
$string['rblockcolumnbgc'] = 'Цвет фона правой колонки';
$string['rblockcolumnbgcdesc'] = 'Параметр задает цвет фона правой колонки этой темы оформления. Если оставить поле пустым, то будет использоваться цвет фона левой колонки.';
$string['region-side-post'] = 'Справа';
$string['region-side-pre'] = 'Слева';
