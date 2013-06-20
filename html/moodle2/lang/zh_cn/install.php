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
 * Strings for component 'install', language 'zh_cn', branch 'MOODLE_24_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = '指定的管理目录不正确';
$string['admindirname'] = '管理目录';
$string['admindirsetting'] = '个别网站主机的/admin用在了如控制面板之类的特殊功能上。这与标准的Moodle管理页面冲突了。修改管理目录的名称并将新名称填写在这里就可以避免冲突。例如: <br /> <br /><b>moodleadmin</b><br /> <br />
这将修正Moodle中的管理链接。';
$string['admindirsettinghead'] = '设定管理目录...';
$string['admindirsettingsub'] = '个别网站主机的/admin用在了如控制面板之类的特殊功能上。这与标准的Moodle管理页面冲突了。修改管理目录的名称并将新名称填写在这里就可以避免冲突。例如: <br /> <br /><b>moodleadmin</b><br /> <br />
这将修正Moodle中的管理链接。';
$string['availablelangs'] = '可用的语言包';
$string['caution'] = '原因';
$string['chooselanguage'] = '选择一种语言';
$string['chooselanguagehead'] = '选择一种语言';
$string['chooselanguagesub'] = '请选择在安装过程中使用的语言。这个语言也会成为网站的缺省语言，不过以后可以随时更改。';
$string['cliadminpassword'] = '新管理用户密码';
$string['cliadminusername'] = '管理帐号用户名';
$string['clialreadyconfigured'] = 'config.php 文件已存在。如果您想安装此网站，请使用 admin/cli/install_database.php。';
$string['clialreadyinstalled'] = '文件config.php已存在。如果您想升级此网站，请使用admin/cli/upgrade.php。';
$string['cliinstallfinished'] = '安装圆满成功。';
$string['cliinstallheader'] = 'Moodle {$a}命令行安装程序';
$string['climustagreelicense'] = '在非交互模式，您必须使用--agree-license参数表示接受授权协议';
$string['clitablesexist'] = '数据库表已经存在，命令行安装不能继续。';
$string['compatibilitysettings'] = '检查您的PHP设置...';
$string['compatibilitysettingshead'] = '检查您的PHP设置...';
$string['compatibilitysettingssub'] = '要正确地安装Moodle，您的服务器需要通过以下测试';
$string['configfilenotwritten'] = '安装脚本无法自动创建一个包含您设置的config.php文件，极可能是由于Moodle目录是不能写的。您可以复制如下的代码到Moodle根目录下的config.php文件中。';
$string['configfilewritten'] = '已经成功创建了config.php文件';
$string['configurationcomplete'] = '配置完毕';
$string['configurationcompletehead'] = '配置完毕';
$string['configurationcompletesub'] = 'Moodle会尝试将配置存储在您的Moodle根目录中。';
$string['database'] = '数据库';
$string['databasecreationsettings'] = '现在您需要配置数据库选项，Moodle的大部分数据都是存储在数据库中的。Moodle4Windows安装程序会根据下面的选项自动为您创建这个数据库。<br />
<br /> <br />
<b>类型：</b>安装程序只允许“mysql”<br />
<b>主机：</b>安装程序只允许“localhost”<br />
<b>名称：</b>数据库名称，如moodle<br />
<b>用户名：</b>安装程序只允许“root”<br />
<b>密码：</b>您的数据库密码<br />
<b>表格前缀：</b>用于所有表格名的前缀(可选)';
$string['databasecreationsettingshead'] = '现在您需要配置数据库选项，Moodle的大部分数据都是存储在数据库中的。Moodle的安装程序会根据下面的选项自动为您创建数据库。';
$string['databasecreationsettingssub'] = '<b>类型：</b>安装程序只允许“mysql”<br />
<b>主机：</b>安装程序只允许“localhost”<br />
<b>名称：</b>数据库名称，如moodle<br />
<b>用户名：</b>安装程序只允许“root”<br />
<b>密码：</b>您的数据库密码<br />
<b>表格前缀：</b>用于所有表格名的前缀(可选)';
$string['databasecreationsettingssub2'] = '<b>类型:</b>被安装程序设定为“mysqli”<br />
<b>主机:</b> 被安装程序设定为“localhost”<br />
<b>名字:</b> 数据库名, 比如 moodle<br />
<b>用户:</b> 被安装程序设定为“root”<br />
<b>密码:</b> 您的数据库密码<br />
<b>表前缀:</b> 所有表名使用的可选前缀';
$string['databasehead'] = '数据库设置';
$string['databasehost'] = '数据库主机';
$string['databasename'] = '数据库名';
$string['databasepass'] = '数据库密码';
$string['databasesettings'] = '现在您需要配置数据库了，多数的Moodle数据都将存储在其中。这个数据库必须已经存在了，并且必须有一个用户名和密码来访问它。<br /> <br /> <br />
<b>类型：</b>mysql或postgres7<br />
<b>主机：</b>如localhost或db.isp.com<br />
<b>名称：</b>数据库名称，如moodle<br />
<b>用户：</b>访问数据库的用户名<br />
<b>密码：</b>访问数据库的密码<br />
<b>表格前缀：</b>在所有的表格名称前加上可选的前缀';
$string['databasesettingshead'] = '现在您需要配置数据库，Moodle的大部分数据都会存储在其中。您应当事先创建好这个数据库并设定好用于访问该数据库的用户名和密码。';
$string['databasesettingssub'] = '<b>类型：</b>mysql或postgres7<br />
<b>主机：</b>如localhost或db.isp.com<br />
<b>名称：</b>数据库名称，如moodle<br />
<b>用户：</b>访问数据库的用户名<br />
<b>密码：</b>访问数据库的密码<br />
<b>表格前缀：</b>在所有的表格名称前加上可选的前缀';
$string['databasesettingssub_mssql'] = '<b>类型:</b> SQL*Server (非UTF-8) <b><strong  class="errormsg">试验性的! (不能用在产品中)</strong></b><br />
<b>主机:</b> 例如，localhost 或者 db.isp.com<br />
<b>名字:</b> 数据库名, 比如 moodle<br />
<b>用户:</b> 您的数据库用户名<br />
<b>密码:</b> 您的数据库密码<br />
<b>表前缀:</b> 在所有的表名称前加上前缀 (强制的)';
$string['databasesettingssub_mssql_n'] = '<b>类型:</b> SQL*Server (UTF-8 可以)<br />
<b>主机:</b> 例如，localhost或者db.isp.com<br />
<b>名字:</b> 数据库名, 比如moodle<br />
<b>用户:</b> 您的数据库用户名<br />
<b>密码:</b> 您的数据库密码<br />
<b>表格前缀:</b> 在所有的表格名称前加上前缀 (强制的)';
$string['databasesettingssub_mysql'] = '<b>类型:</b> MySQL<br />
<b>主机:</b> 例如，localhost或者db.isp.com<br />
<b>名字:</b> 数据库名, 比如moodle<br />
<b>用户:</b> 您的数据库用户名<br />
<b>密码:</b> 您的数据库密码<br />
<b>表格前缀:</b> 在所有的表格名称前加上前缀（可选的）';
$string['databasesettingssub_mysqli'] = '<b>类型:</b> MySQL<br />
<b>主机:</b> 例如，localhost或者db.isp.com<br />
<b>名字:</b> 数据库名, 比如moodle<br />
<b>用户:</b> 您的数据库用户名<br />
<b>密码:</b> 您的数据库密码<br />
<b>表格前缀:</b> 在所有的表格名称前加上前缀（可选的）';
$string['databasesettingssub_oci8po'] = '<b>类型:</b> Oracle<br />
<b>主机:</b> 不需要，必须留空<br />
<b>名字:</b> 给出tnsnames.ora连接的名字<br />
<b>用户:</b> 您的数据库用户名<br />
<b>密码:</b> 您的数据库密码<br />
<b>表格前缀:</b> 在所有的表格名称前加上前缀(强制的, 最大2cc.)';
$string['databasesettingssub_odbc_mssql'] = '<b>类型:</b> SQL*Server (通过ODBC) <b><strong  class="errormsg">试验性的! (不可用在产品中)</strong></b><br />
<b>主机:</b> ODBC控制面板中DSN的名字<br />
<b>名字:</b> 数据库名, 比如moodle<br />
<b>用户:</b> 您的数据库用户名<br />
<b>密码:</b> 您的数据库密码<br />
<b>表前缀:</b> 在所有的表名称前加上前缀(强制的)';
$string['databasesettingssub_postgres7'] = '<b>类型:</b> PostgreSQL<br />
<b>主机:</b> 例如，localhost或者db.isp.com<br />
<b>名字:</b> 数据库名, 比如moodle<br />
<b>用户:</b> 您的数据库用户名<br />
<b>密码:</b> 您的数据库密码<br />
<b>表格前缀:</b> 在所有的表格名称前加上前缀(强制的)';
$string['databasesettingswillbecreated'] = '<b>注释:</b> 如果数据库不存在将自动创建';
$string['databasesocket'] = 'Unix套接字';
$string['databasetypehead'] = '选择数据库驱动';
$string['databasetypesub'] = 'Moodle支持若干种数据库服务器。如果您不知道该使用哪一种，请联系服务器管理员。';
$string['databaseuser'] = '数据用户名';
$string['dataroot'] = '数据目录';
$string['datarooterror'] = '找不到也无法创建您指定的“数据目录”，请更正路径或手工创建它。';
$string['datarootpermission'] = '数据目录权限';
$string['datarootpublicerror'] = '因指定的“数据目录”可以通过 Web 直接访问，您必须使用另一个目录。';
$string['dbconnectionerror'] = '无法连接到您指定的数据库，请检查您的数据库设置。';
$string['dbcreationerror'] = '数据库创建错误。无法用设定中的名称创建数据库。';
$string['dbhost'] = '服务器主机';
$string['dbpass'] = '密码';
$string['dbport'] = '端口';
$string['dbprefix'] = '表格名称前缀';
$string['dbtype'] = '类型';
$string['dbwrongencoding'] = '您选择的数据库使用了字符集{$a}，我们推荐您使用一个Unicode (UTF-8)字符集的数据库。当然，您可以选择“跳过数据库字符集检查”来跳过这个环节，但您将来可能会遇到问题。';
$string['dbwronghostserver'] = '您必须遵循上面所阐述的“主机”规则。';
$string['dbwrongnlslang'] = '在您的web服务器中的NLS_LANG环境变量必须用 AL32UTF8 字符集。请查阅有关如何正确配置OCI8的PHP文档。';
$string['dbwrongprefix'] = '您必须遵循上面所阐述的“表格前缀”规则。';
$string['directorysettings'] = '<p>请确认安装Moodle的位置。</p>

<p><b>Web地址：</b>
指定访问Moodle的完整Web地址。如果您的网站可以通过多个URL访问，那么请选择学生最惯常使用的一个。地址的末尾不要有斜线。</p>

<p><b>Moodle目录：</b>
指定安装的完整路径，要确保大小写正确。</p>

<p><b>数据目录：</b>
Moodle需要一个位置存放上传的文件。这个目录对于Web服务器用户(通常是“nobody”或“apache”)应当是可读可写的，但不能直接通过Web访问它。如果它不存在，安装程序会尝试建立。</p>';
$string['directorysettingshead'] = '请确认安装Moodle的位置';
$string['directorysettingssub'] = '<b>Web地址：</b>
指定访问Moodle的完整Web地址。如果您的网站可以通过多个URL访问，那么请选择学生最惯常使用的一个。地址的末尾不要有斜线。
<br />
<br />
<b>Moodle目录：</b>
指定安装的完整路径，要确保大小写正确。<br />
<br />
<b>数据目录：</b>
Moodle需要一个位置存放上传的文件。这个目录对于Web服务器用户(通常是“nobody”或“apache”)应当是可读可写的，但不能直接通过Web访问它。如果它不存在，安装程序会尝试建立。';
$string['dirroot'] = 'Moodle目录';
$string['dirrooterror'] = '“Moodle目录”的设置看上去不对——在那里找不到安装好的Moodle。下面的值已经重置了。';
$string['download'] = '下载';
$string['downloadlanguagebutton'] = '下载“{$a}”语言包';
$string['downloadlanguagehead'] = '下载语言包';
$string['downloadlanguagenotneeded'] = '您可以使用缺省的语言包“{$a}”继续安装过程。';
$string['downloadlanguagesub'] = '您现在可以下载一个语言包并以该种语言继续安装过程。<br /><br />如果您无法下载语言包，安装过程将会以英文继续。(当安装过程结束后，您就有机会下载并安装更多的语言包了。)';
$string['doyouagree'] = '您同意吗？(yes/no):';
$string['environmenthead'] = '检测您的运行环境...';
$string['environmentsub'] = '我们正在检查您系统中的某些组件是否符合需求';
$string['environmentsub2'] = '每个Moodle的发行版都有一些对PHP版本的最低要求和几个必须安装的PHP扩展。在每次安装和升级前会做完整的环境检查。如果您不知道如何安装新版或启用PHP扩展，请与服务器管理员联系。';
$string['errorsinenvironment'] = '环境检查失败！';
$string['fail'] = '失败';
$string['fileuploads'] = '上传文件';
$string['fileuploadserror'] = '这应当是开启的';
$string['fileuploadshelp'] = '<p>您的服务器好像关闭了文件上传功能。</p>

<p>您仍然可以继续安装Moodle，但没有这个功能，将不能上传课程文件或用户头像。</p>

<p>要激活文件上传，您（或您的系统管理员）需要修改系统的php.ini文件，将其中<b>file_uploads</b>的值改为\'1\'。</p>';
$string['gdversion'] = 'GD版本';
$string['gdversionerror'] = '为了能够处理和创建图片，服务器上必须有GD库。';
$string['gdversionhelp'] = '<p>您的服务器看上去并没有安装GD。</p>

<p>PHP要有GD库才能让Moodle处理图像(如用户图标)。没有GD，Moodle还是可以工作的——只是那些需要GD的功能就不能使用了。</p>

<p>在Unix上为PHP增加GD功能，可以用--with-gd选项来编译PHP。</p>

<p>在Windows上，修改php.ini并去掉php_gd2.dll行前的注释符号就可以了。</p>';
$string['globalsquotes'] = '处理全局变量的方式不安全';
$string['globalsquoteserror'] = '修正您的PHP设置：禁用register_globals和/或启动magic_quotes_gpc。';
$string['globalsquoteshelp'] = '<p>我们不建议您在禁用Magic Quotes GPC的同时开启Register Globals。</p>

<p>一种比较好的做法是在php.ini中设定<b>magic_quotes_gpc = On</b>和<b>register_globals = Off</b>。</p>

<p>如果您无权访问您的php.ini，您可以在Moodle目录内的.htaccess文件中增加如下内容：</p>
<blockquote><div>php_value magic_quotes_gpc On</div></blockquote>
<blockquote><div>php_value register_globals Off</div></blockquote>';
$string['inputdatadirectory'] = '数据目录：';
$string['inputwebadress'] = 'Web地址：';
$string['inputwebdirectory'] = 'Moodle目录：';
$string['installation'] = '安装';
$string['langdownloaderror'] = '很不幸，无法下载“{$a}”语言包。安装过程将以英文继续。';
$string['langdownloadok'] = '语言“{$a}”已经成功安装了。安装过程将会以此语言继续。';
$string['magicquotesruntime'] = '运行时的 Magic Quotes';
$string['magicquotesruntimeerror'] = '这应该是关闭的';
$string['magicquotesruntimehelp'] = '<p>运行时的Magic Quotes应当关闭，这样Moodle才能正常工作。</p>

<p>通常缺省时它是关闭的...参考php.ini文件中的<b>magic_quotes_runtime</b>设置。</p>

<p>如果您不能访问php.ini文件，也许您可以把下面的内容添加到Moodle目录中名为.htaccess的文件中:</p>
<blockquote><div>php_value magic_quotes_runtime Off</div></blockquote>';
$string['memorylimit'] = '内存限制';
$string['memorylimiterror'] = 'PHP内存限制设置的太低了...以后您会遇到问题的。';
$string['memorylimithelp'] = '<p>您服务器的PHP内存限制是{$a}。</p>

<p>这会使Moodle在将来运行是碰到内存问题，特别是您安装了很多模块并且/或者有很多用户。</p>

<p>我们建议可能的话把限制设定的高一些，譬如40M。有几种方法可以做到这一点：</p>
<ol>
<li>如果可以，重新编译PHP并使用<i>--enable-memory-limit</i>选项。这允许Moodle自己设定内存限制。</li>
<li>如果可以访问php.ini文件，您可以修改<b>memory_limit</b>的设置为其它值，如40M。如果您无法访问，可以让您的管理员帮您修改一下。</li>
<li>在一些PHP服务器上，您可以在Moodle目录中创建一个.htaccess文件并包含如下内容:
<blockquote>php_value memory_limit 40M</blockquote>
<p>然而，在一些服务器上这会让<b>所有</b>PHP页面无法正常工作(在访问页面时会有错误)，因此您可能不得不删除.htaccess文件。</p></li>
</ol>';
$string['mssql'] = 'SQL*Server(mssql)';
$string['mssqlextensionisnotpresentinphp'] = 'PHP的MSSQL 扩展并未安装正确，因此无法与SQL*Server通信。请检查您的php.ini文件或重新编译PHP。';
$string['mssql_n'] = '支持UTF-8的SQL*Server(mssql_n)';
$string['mysql'] = 'MySQL (mysql)';
$string['mysqlextensionisnotpresentinphp'] = 'PHP的MySQL扩展并未安装正确，因此无法与MySQL通信。请检查您的php.ini文件或重新编译PHP。';
$string['mysqli'] = '改进的Mysql(mysqli)';
$string['mysqliextensionisnotpresentinphp'] = 'PHP的MySQLi扩展并未安装正确，因此无法与MySQL通信。请检查您的php.ini文件或重新编译PHP。对PHP4，MySQLi扩展不可用。';
$string['nativemssql'] = 'SQL*服务器 FreeTDS (native/mssql)';
$string['nativemssqlhelp'] = '现在，您需要配置数据库，Moodle的大部分数据都将保存于此。
这个数据库必须已经创建，并且有用户名和密码可以访问它。必须设置表前缀。';
$string['nativemysqli'] = '改进的MySQL (native/mysqli)';
$string['nativemysqlihelp'] = '现在，您需要配置数据库，Moodle的大部分数据都将保存于此。
用户名和密码必须已经存在。如果该用户有相应权限，数据库会被自动创建。表前缀可选。';
$string['nativeoci'] = 'Oracle (native/oci)';
$string['nativeocihelp'] = '现在，您需要配置数据库，Moodle的大部分数据都将保存于此。
这个数据库必须已经创建，并且有用户名和密码可以访问它。必须设置表前缀。';
$string['nativepgsql'] = 'PostgreSQL (native/pgsql)';
$string['nativepgsqlhelp'] = '现在，您需要配置数据库，Moodle的大部分数据都将保存于此。
这个数据库必须已经创建，并且有用户名和密码可以访问它。必须设置表前缀。';
$string['nativesqlsrv'] = 'SQL*服务器Microsoft (native/sqlsrv)';
$string['nativesqlsrvhelp'] = '现在，您需要配置数据库，Moodle的大部分数据都将保存于此。
这个数据库必须已经创建，并且有用户名和密码可以访问它。必须设置表前缀。';
$string['nativesqlsrvnodriver'] = 'Microsoft 为 PHP 提供的 SQL Server 驱动程序未安装或者未正确配置。';
$string['nativesqlsrvnonwindows'] = 'Microsoft 为 PHP 提供的 SQL Server 驱动程序只能在Windows 系统上使用。';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'PHP的OCI8扩展并未安装正确，因此无法与Oracle通信。请检查您的php.ini文件或重新编译PHP。';
$string['odbcextensionisnotpresentinphp'] = 'PHP的ODBC扩展并未安装正确，因此无法与SQL*Server通信。请检查您的php.ini文件或重新编译PHP。';
$string['odbc_mssql'] = '基于ODBC的SQL*Server (odbc_mssql)';
$string['pass'] = '通过';
$string['paths'] = '路径';
$string['pathserrcreatedataroot'] = '安装程序无法建立数据目录({$a->dataroot})。';
$string['pathshead'] = '确认路径';
$string['pathsrodataroot'] = '数据目录不可写';
$string['pathsroparentdataroot'] = '父目录({$a->parent})不可写。安装程序无法建立数据目录({$a->dataroot})。';
$string['pathssubadmindir'] = '有些网络主机使用/admin这个URL来访问控制面板或其它功能。很不幸，这个设置和Moodle管理页面的标准路径冲突。这个问题可以解决，只需在您的安装目录中把admin目录换名，然后把新名字输入到这里。例如<em>moodleadmin</em>。这么做会改变Moodle中的管理链接。';
$string['pathssubdataroot'] = 'Moodle需要一个位置存放上传的文件。这个目录对于Web服务器用户(通常是“nobody”或“apache”)应当是可读可写的，但应当不能直接通过Web访问它。如果它不存在，安装程序会尝试建立。';
$string['pathssubdirroot'] = 'Moodle安装的完整路径。';
$string['pathssubwwwroot'] = '可以访问到Moodle的完整网址。
Moodle不支持通过多个地址访问。如果您的网站有多个公开地址，您必须把这个地址以外的所有地址都设为永久重定向。如果您的网站既可以通过内部地址访问，也可以通过这个公开地址访问，那么请配置DNS使内部网用户也能使用公开地址。如果此地址不正确，请在浏览器中修改URL来重新安装，并设定另一个地址。';
$string['pathsunsecuredataroot'] = '数据目录所在位置不安全';
$string['pathswrongadmindir'] = '管理目录不存在';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP的PGSQL扩展并未安装正确，因此无法与PostgreSQL通信。请检查您的php.ini文件或重新编译PHP。';
$string['phpextension'] = '{$a} PHP扩展';
$string['phpversion'] = 'PHP版本';
$string['phpversionhelp'] = '<p>Moodle需要PHP 4.3.0或5.1.0（5.0.x有若干已知的问题）以上的版本。</p>
<p>您当前使用的是{$a}</p>
<p>您必须升级PHP或者转移到一个有新版PHP的服务器上！<br />
（如果正使用5.0.x，您也可以降级到4.4.x版）</p>
';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['releasenoteslink'] = '想了解本版本Moodle的信息，请访问发行说明：{$a}';
$string['safemode'] = '安全模式';
$string['safemodeerror'] = '在安全模式下运行Moodle可能会有麻烦';
$string['safemodehelp'] = '<p>在安全模式下运行Moodle可能会遇到一系列的问题，至少在会无法创建新文件。</p>

<p>只有那些有安全妄想证的公共Web站点才会使用安全模式，因此如果遇到这个方面的麻烦，最好的方法就是为您的Moodle站点换一个Web主机提供商。</p>

<p>如果您喜欢可以继续安装过程，但将来会遇到问题的。</p>';
$string['sessionautostart'] = '自动开启会话';
$string['sessionautostarterror'] = '这应当是关闭的';
$string['sessionautostarthelp'] = '<p>Moodle需要会话支持，否则便无法正常工作。</p>

<p>通过修改php.ini文件可以激活会话支持...找找session.auto_start参数</p>';
$string['skipdbencodingtest'] = '跳过数据库编码检测';
$string['sqliteextensionisnotpresentinphp'] = 'PHP的SQLite扩展配置不正确。请检查php.ini文件或者重新编译PHP。';
$string['upgradingqtypeplugin'] = '正在升级题目/类型插件';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = '您看到这个页面表明您已经成功地在您的计算机上安装并启用了<strong>{$a->packname} {$a->packversion}</strong>软件包。恭喜您！';
$string['welcomep30'] = '<strong>{$a->installername}</strong>的此发行版包含了可以创建<strong>Moodle</strong>运行环境的应用程序：';
$string['welcomep40'] = '这个软件包还包含了<strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>。';
$string['welcomep50'] = '使用本软件包中包含的应用程序时应遵循它们各自的授权协议。整个<strong>{$a->installername}</strong>软件包都是<a href="http://www.opensource.org/docs/definition_plain.html">开源</a>的，并且遵循<a href="http://www.gnu.org/copyleft/gpl.html">GPL</a>授权协议发布。';
$string['welcomep60'] = '接下来的页面会引导您通过一系列步骤在您的计算机上安装并配置好<strong>Moodle</strong>。您可以接受缺省的设置，或者根据需要修改它们。';
$string['welcomep70'] = '点击“向后”按钮以继续<strong>Moodle</strong>的安装过程。';
$string['wwwroot'] = '网站地址';
$string['wwwrooterror'] = '这个网站地址似乎是错的——在那里并没有安装好的Moodle。下面的值会被重置。';
