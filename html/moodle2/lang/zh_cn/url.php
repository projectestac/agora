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
 * Strings for component 'url', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   url
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['chooseavariable'] = '选择一个变量...';
$string['clicktoopen'] = '点击{$a}链接打开资源。';
$string['configdisplayoptions'] = '选择所有可以使用的选项。已有的设置不会改变。按住CTRL键选择多个域。';
$string['configframesize'] = '当在框架内显示web页面或上传的文件时，此值为顶层框架（包括导航栏）的高度（单位：像素）。';
$string['configrolesinparams'] = '如果您希望用本地化过的角色名做可选的参数变量，就启用';
$string['configsecretphrase'] = '此秘密短语被用来生成加密的代码。此代码可以当做参数发送给某些服务器。加密的代码是当前用户的IP地址和您的秘密短语的md5值。即，code = md5(IP.秘密短语)。请注意，因为IP地址会变化，且经常在不同计算机之间共享，所以并不可靠。';
$string['contentheader'] = '内容';
$string['createurl'] = '创建一个 URL';
$string['displayoptions'] = '可用的显示选项';
$string['displayselect'] = '显示';
$string['displayselectexplain'] = '选择显示类型，但并不是所有类型都适合所有URL。';
$string['displayselect_help'] = '此设置，URL文件的类型，及浏览器是否允许嵌入，一起决定如何显示文件。选项可能包括：

* 自动 - 对类型可以自动选择的文件，这是最好的选项
* 嵌入 - 在导航栏下的页面中显示文件、文件描述和各种版块
* 强制下载 - 用户会被提示下载此文件
* 打开 - 只在浏览器窗口中显示此文件
* 在弹出窗口中 - 在一个无菜单和地址栏的新窗口中显示文件
* 在框架中 - 在导航栏和文件描述下方的框架里显示文件
* 新窗口 - 在有菜单和地址栏的新窗口中显示文件
';
$string['externalurl'] = '外部URL';
$string['framesize'] = '框架高度';
$string['invalidstoredurl'] = '不能显示此资源，URL 无效。';
$string['invalidurl'] = '输入的 URL 无效';
$string['modulename'] = 'URL';
$string['modulename_help'] = '该 URL 模块可以让老师提供一个 web 链接作为课程资源。任何线上的可自由使用的东西，如文件或图片，可以作为链接；该 URL 不必是某个网站的主页。某个网页的 URL 可以被复制和粘贴，或者老师可以使用文件选择器，从容器中选择一个链接，如 Flickr，YouTube 或者 Wikimedia（视该站点可使用的容器的情况而定）。

该 URL 有一些显示选项，如嵌入显示或者在新的窗口打开该 URL 的选项，以及向该 URL 传递诸如学生姓名信息的高级选项，如果需要的话。';
$string['modulenameplural'] = 'URL';
$string['neverseen'] = '从未查看';
$string['optionsheader'] = '选项';
$string['page-mod-url-x'] = '任意URL模块页面';
$string['parameterinfo'] = '&amp;参数=变量';
$string['parametersheader'] = '参数';
$string['parametersheader_help'] = '可以将一些Moodle内部变量自动附加到URL上。在每个文本框中输入参数名，然后选择配套的变量。';
$string['pluginadministration'] = 'URL模块管理';
$string['pluginname'] = 'URL';
$string['popupheight'] = '弹出窗口高度（单位：像素）';
$string['popupheightexplain'] = '指定弹出窗口的缺省高度。';
$string['popupwidth'] = '弹出窗口宽度（单位：像素）';
$string['popupwidthexplain'] = '指定弹出窗口的缺省宽度。';
$string['printheading'] = '显示URL名';
$string['printheadingexplain'] = '在内容上方显示URL名？某些显示类型就算开启此选项也不会显示URL名。';
$string['printintro'] = '显示URL描述';
$string['printintroexplain'] = '在内容下方显示 URL 描述？某些显示类型就算开启此选项也不会显示描述。';
$string['rolesinparams'] = '在参数中包含角色名';
$string['serverurl'] = '服务器URL';
$string['url:addinstance'] = '添加一个新的 URL 资源';
$string['url:view'] = '查看URL';
