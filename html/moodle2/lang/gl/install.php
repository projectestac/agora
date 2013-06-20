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
 * Strings for component 'install', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   install
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['admindirerror'] = 'O directorio especificado para admin é incorrecto';
$string['admindirname'] = 'Directorio Admin';
$string['admindirsetting'] = 'Moi poucos enderezos web empregan /admin como URL especial para
    permitirlle acceder a un panel de control ou semellante.
    Desafortunadamente, isto entra en conflito coa localización estándar
    das páxinas de administración de Moodle. Vostede pode corrixir isto
    renomeando o directorio admin na súa instalación, e poñendo aquí ese
    novo nome.  Por exemplo: <br /> <br /><b>moodleadmin</b><br /> <br />
    Iso corrixirá as ligazóns admin en Moodle.';
$string['admindirsettinghead'] = 'Axustar o directorio admin...';
$string['admindirsettingsub'] = 'Moi poucos enderezos web empregan /admin como URL especial para
    permitirlle acceder a un panel de control ou semellante.
    Desafortunadamente, isto entra en conflito coa localización estándar
    das páxinas de administración de Moodle. Vostede pode corrixir isto
    renomeando o directorio admin na súa instalación, e poñendo aquí ese
    novo nome.  Por exemplo: <br /> <br /><b>moodleadmin</b><br /> <br />
    Iso corrixirá as ligazóns admin en Moodle.';
$string['availablelangs'] = 'Lista de idiomas dispoñíbeis';
$string['caution'] = 'Precaución';
$string['chooselanguage'] = 'Escolla un idioma';
$string['chooselanguagehead'] = 'Escolla un idioma';
$string['chooselanguagesub'] = 'Escolla un idioma para o proceso de instalación. Este idioma empregarase tamén como idioma predeterminado do sitio, se ben pode cambiarse máis adiante.';
$string['cliadminpassword'] = 'Novo contrasinal de usuario administrador';
$string['cliadminusername'] = 'Nome de usuario da conta do administrador';
$string['clialreadyconfigured'] = 'Xa existe o ficheiro config.php. Empregue admin/cli/install_database.php se quere actualizar o seu sitio web.';
$string['clialreadyinstalled'] = 'Xa existe o ficheiro config.php. Empregue admin/cli/upgrade.php se quere actualizar o seu sitio web.';
$string['cliinstallfinished'] = 'A instalación concluíu correctamente.';
$string['cliinstallheader'] = 'Programa de instalación de Moodle en liña de ordes {$a}';
$string['climustagreelicense'] = 'En modo non interactivo debe aceptar a licenza especificando a opción --agree-license';
$string['clitablesexist'] = 'Xa existen táboas de base de datos, a instalación CLI non pode continuar.';
$string['compatibilitysettings'] = 'Comprobando a súa configuración PHP ...';
$string['compatibilitysettingshead'] = 'Comprobando a súa configuración PHP ...';
$string['compatibilitysettingssub'] = 'O seu servidor debería pasar todos estas probas para que Moodle poida funcionar correctamente.';
$string['configfilenotwritten'] = 'O script de instalación non foi quen de crear automaticamente un ficheiro config.php coas especificacións escollidas. Copie o seguinte código nun ficheiro chamado config.php e sitúe ese ficheiro no directorio raíz de Moodle.';
$string['configfilewritten'] = 'config.php foi creado satisfactoriamente';
$string['configurationcomplete'] = 'Configuración terminada';
$string['configurationcompletehead'] = 'Configuración terminada';
$string['configurationcompletesub'] = 'Moodle fixo un intento de gardar a configuración nun ficheiro no directorio raíz da instalación de Moodle.';
$string['database'] = 'Base de datos';
$string['databasecreationsettings'] = 'Agora necesita configurar os axustes da base de datos onde se almacenarán
    a maioría dos datos de Moodle. O instalador creará a base de datos cos
    axustes especificados embaixo.<br />
    <br /> <br />
       <b>Tipo:</b> fixado a «mysql» polo instalador<br />
       <b>Máquina:</b> fixado a «localhost» polo instalador<br />
       <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
       <b>Usuario:</b> o valor predeterminado é «root»<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo opcional empregado por todos os nomes das táboas';
$string['databasecreationsettingshead'] = 'Agora necesita configurar os axustes da base de datos onde se almacenarán
    a maioría dos datos de Moodle. O instalador creará a base de datos cos
    axustes especificados embaixo.';
$string['databasecreationsettingssub'] = '<b>Tipo:</b> fixado a «mysql» polo instalador<br />
       <b>Máquina:</b> fixado a «localhost» polo instalador<br />
       <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
       <b>Usuario:</b> o valor predeterminado é «root»<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo opcional empregado por todos os nomes das táboas';
$string['databasecreationsettingssub2'] = '<b>Tipo:</b> fixado a «mysqli» polo instalador<br />
       <b>Máquina:</b> fixado a «localhost» polo instalador<br />
       <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
       <b>Usuario:</b> o valor predeterminado é «root»<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo opcional empregado por todos os nomes das táboas';
$string['databasehead'] = 'Axustes da base de datos';
$string['databasehost'] = 'Enderezo/máquina da base de datos';
$string['databasename'] = 'Nome de base de datos';
$string['databasepass'] = 'Contrasinal da base de datos';
$string['databasesettings'] = 'Agora necesita configurar a base de datos na que se almacenará a
    maioría dos datos de Moodle. Esta base de datos debe ter sido
    creada, e dispor dun nome de usuario e dun contrasinal de acceso.<br />
    <br /> <br />
    <b>Tipo:</b> mysql ou postgres7<br />
    <b>Máquina:</b> p.ex. localhost ou db.seu-dominio.com<br />
    <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
    <b>Usuario:</b> nome de usuario da base de datos<br />
    <b>Contrasinal:</b> contrasinal da base de datos<br />
    <b>Prefixo das táboas:</b> prefixo opcional que empregaran todos os nomes das táboas';
$string['databasesettingshead'] = 'Agora necesita configurar a base de datos na que se almacenará a
    maioría dos datos de Moodle. Esta base de datos debe ter sido
    creada, e dispor dun nome de usuario e dun contrasinal de acceso.';
$string['databasesettingssub'] = '<b>Tipo:</b> mysql ou postgres7<br />
       <b>Máquina:</b> p.ex. localhost ou db.seu-dominio.com<br />
       <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
       <b>Usuario:</b> nome de usuario da base de datos<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo opcional que empregaran todos os nomes das táboas';
$string['databasesettingssub_mssql'] = '<b>Tipo:</b> SQL*Server (non UTF-8) <b><strong class="errormsg">Experimental! (non empregar para producción)</strong></b><br />
       <b>Máquina:</b> p.ex. localhost ou db.seu-dominio.com<br />
       <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
       <b>Usuario:</b> nome de usuario da base de datos<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo que empregaran todos os nomes das táboas (obrigatorio)';
$string['databasesettingssub_mssql_n'] = '<b>Tipo:</b> SQL*Server (UTF-8 activado)7<br />
       <b>Máquina:</b> p.ex. localhost ou db.seu-dominio.com<br />
       <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
       <b>Usuario:</b> nome de usuario da base de datos<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo que empregaran todos os nomes das táboas';
$string['databasesettingssub_mysql'] = '<b>Tipo:</b> MySQL<br />
       <b>Máquina:</b> p.ex. localhost ou db.seu-dominio.com<br />
       <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
       <b>Usuario:</b> nome de usuario da base de datos<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo que empregaran todos os nomes das táboas (opcional)';
$string['databasesettingssub_mysqli'] = '<b>Máquina:</b> p.ex. localhost ou db.seu-dominio.com<br />
       <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
       <b>Usuario:</b> nome de usuario da base de datos<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo que empregaran todos os nomes das táboas (opcional)';
$string['databasesettingssub_oci8po'] = '<b>Tipo:</b> Oracle<br />
       <b>Máquina:</b> non se usa, pode deixarse en branco<br />
       <b>Nome:</b> nome da conexión tnsnames.ora<br />
       <b>Usuario:</b> usuario da base de datos<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo que empregaran todos os nomes das táboas (obrigatorio, máx. 2cc.)';
$string['databasesettingssub_odbc_mssql'] = '<b>Tipo:</b> SQL*Server (sobre ODBC) <b><strong class="errormsg">Experimental! (no usar para producción)</strong></b><br />
       <b>máquina:</b> nome do DSN no panel de control ODBC<br />
       <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
       <b>Usuario:</b> usuario da base de datos<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo que empregaran todos os nomes das táboas (obrigatorio)';
$string['databasesettingssub_postgres7'] = '<b>Tipo:</b> PostgreSQL<br />
       <b>Máquina:</b> p.ex. localhost ou db.seu-dominio.com<br />
       <b>Nome:</b> nome da base de datos, p.ex. moodle<br />
       <b>Usuario:</b> nome de usuario da base de datos<br />
       <b>Contrasinal:</b> contrasinal da base de datos<br />
       <b>Prefixo das táboas:</b> prefixo que empregaran todos os nomes das táboas (obrigatorio)';
$string['databasesettingswillbecreated'] = '<b>Nota:</> o instalador tentará crear automaticamente a base de datos no caso de que non exista.';
$string['databasesocket'] = 'Socket Unix';
$string['databasetypehead'] = 'Escolla o controlador da base de datos';
$string['databasetypesub'] = 'Moodle admite varios tipos de servidores de base de datos. Póñase en contacto co administrador do servidor se non sabe que tipo empregar.';
$string['databaseuser'] = 'Usuario da base de datos';
$string['dataroot'] = 'Directorio de datos';
$string['datarooterror'] = 'Non foi posíbel atopar ou crear o «Directorio de datos» no especificado. Corrixa a ruta ou cree o directorio manualmente.';
$string['datarootpermission'] = 'Permisos dos directorios de datos';
$string['datarootpublicerror'] = 'O «Directorio de datos» que especificou é accesíbel directamente a través do web; debe empregar un directorio diferente.';
$string['dbconnectionerror'] = 'Non foi posíbel conectar coa base de datos que especificou. Comprobe a configuración da base de datos.';
$string['dbcreationerror'] = 'Produciuse un erro ao crear a base de datos. Non foi posíbel crear o nome da base de datos coa configuración fornecida';
$string['dbhost'] = 'Máquina servidor';
$string['dbpass'] = 'Contrasinal';
$string['dbport'] = 'Porto';
$string['dbprefix'] = 'Prefixo das táboas';
$string['dbtype'] = 'Tipo';
$string['dbwrongencoding'] = 'A base de datos seleccionada está executándose baixo unha codificación non recomendada ({$a}). Conviría empregar no seu canto unha base de datos con codificación Unicode (UTF-8). En calquera caso, pode omitir esta proba seleccionando «Omitir a proba de codificación da BD», aínda que é probábel que teña problemas no futuro.';
$string['dbwronghostserver'] = 'Debe seguir as regras «Enderezo/máquina» como se explicou anteriormente.';
$string['dbwrongnlslang'] = 'A variábel de entorno NLS_LANG do seu servidor web debe usar o conxunto de caracteres AL32UTF8. Vexa a documentación PHP sobre como configurar axeitadamente OCI8.';
$string['dbwrongprefix'] = 'Debe seguir as regras «Prefixo das táboas» como se explicou anteriormente.';
$string['directorysettings'] = '<p>Confirme os enderezos da instalación de Moodle.</p>

<p><b>Enderezo web:</b>
Especifique o enderezo web completo no que se accederá a Moodle.
Se o seu sitio web é accesíbel a través de varios URL, seleccione o
que resulte de acceso máis natural para os seus alumnos. Non inclúa
a barra final.</p>
<p><b>Directorio de Moodle:</b>
Especifique a ruta completa desta instalación.
Asegúrese de que as maiúsculas/minúsculas son correctas.</p>

<p><b>Directorio de datos:</b>
Necesitase un lugar no que Moodle poida gardar os ficheiros enviados.
Este directorio debe ser lexíbel E ESCRIBÍBEL polo usuario do servidor
web (normalmente «nobody», «apache», «www-data»), mais non debería ser
accesíble directamente desde o web. Se non existe o instalador tentará crealo.</p>';
$string['directorysettingshead'] = 'Confirme os seguintes enderezoa da instalación de Moodle';
$string['directorysettingssub'] = 'Especifique o enderezo web completo no que se accederá a Moodle.
Se o seu sitio web é accesíbel a través de varios URL, seleccione o
que resulte de acceso máis natural para os seus alumnos. Non inclúa
a barra final.
<br />
<br />
<b>Directorio de Moodle:</b>
Especifique a ruta completa desta instalación.
Asegúrese de que as maiúsculas/minúsculas son correctas.
<br />
<br />
<b>Directorio de datos:</b>
Necesitase un lugar no que Moodle poida gardar os ficheiros enviados.
Este directorio debe ser lexíbel E ESCRIBÍBEL polo usuario do servidor
web (normalmente «nobody», «apache», «www-data»), mais non debería ser
accesíbel directamente desde o web. Se non existe o instalador tentará crealo.';
$string['dirroot'] = 'Directorio de Moodle';
$string['dirrooterror'] = 'O axuste do «Directorio de Moodle» semella ser incorrecto; non é posíbel atopar unha instalación de Moodle nel. O valor foi restabelecido.';
$string['download'] = 'Descargar';
$string['downloadlanguagebutton'] = 'Descargar o paquete de idioma «{$a}»';
$string['downloadlanguagehead'] = 'Descargar o paquete de idioma';
$string['downloadlanguagenotneeded'] = 'Pode continuar o proceso de instalación co idioma predeterminado «{$a}».';
$string['downloadlanguagesub'] = 'Agora ten a opción de descargar o paquete do seu idioma e continuar co proceso de instalación nese idioma.<br /><br />De non ser posíbel a descarga o proceso de instalación continuará en inglés (una vez que remate a instalación terá a oportunidade de descargar e instalar outros idiomas adicionais).';
$string['doyouagree'] = 'Está de acordo? (si/non):';
$string['environmenthead'] = 'Comprobando o seu entorno ...';
$string['environmentsub'] = 'Estase a comprobar se os diferentes compoñentes do seu servidor cumpren cos requirimentos mínimos de sistema';
$string['environmentsub2'] = 'Cada versión de Moodle ten algún requisito mínimo da versión de PHP e un número obrigatorio de extensións de PHP.
Antes de cada instalación ou actualización faise unha comprobación completa do entorno . Póñase en contacto co administrador do servidor se non sabe como instalar a nova versión ou activar as extensións PHP.';
$string['errorsinenvironment'] = 'A comprobación do entorno no foi satisfactoria!';
$string['fail'] = 'Non superada';
$string['fileuploads'] = 'Envío de ficheiros';
$string['fileuploadserror'] = 'Debe estar activado';
$string['fileuploadshelp'] = '<p>O envío de ficheiros semella estar desactivado no seu servidor.</p>

<p>Moodle pode ser instalado, mais, sen esta funcionalidade, vostede non poderá enviar
   ficheiros para os cursos nin imaxes de perfil dos novos usuario.</p>

<p>Para activar o envío de ficheiros, vostede (ou o administrador do sistema)
   necesita editar o ficheiro php.ini principal e cambiar o axuste de
   <b>file_uploads</b> a «1».</p>';
$string['gdversion'] = 'Versión GD';
$string['gdversionerror'] = 'A biblioteca GD debe estar presente para procesar e crear imaxes';
$string['gdversionhelp'] = '<p>Parece que o seu servidor non ten instalada a GD.</p>

<p>GD é unha biblioteca requirida por PHP para permitir que o Moodle procese imaxes (como poden ser as iconas de perfil de usuario) e cree imaxes (como as gráficas de log).  Moodle continuará a funcionar sen a biblioteca GD. Estas funcionalidades non están dispoñibles actualmente.</p>

<p>Para engadir GD a PHP en Unix, compile PHP utilizando o parámetro --with-gd .</p>

<p>Normalmente en Windows é posible editar php.ini e deixar sen comentar a liña referida a php_gd2.dll.</p>';
$string['globalsquotes'] = 'Manexo inseguro de axustes globai';
$string['globalsquoteserror'] = 'Arranxe a configuración PHP: desactive register_globals e/ou active magic_quotes_gpc';
$string['globalsquoteshelp'] = '<p>Non é recomendábel empregar de vez a combinación de «magic quotes GPC» desactivado e «register globals» activado.</p>

<p>O axuste recomendado é <b>magic_quotes_gpc = On</b> e <b>register_globals = Off</b> no seu  php.ini</p>

<p>Se non ten acceso a php.ini, debería poder escribir as seguintes liñas nun ficheiro chamado
   .htaccess dentro do seu directorio Moodle:</p>
   <blockquote><div>php_value magic_quotes_gpc On</div></blockquote>
   <blockquote><div>php_value register_globals Off</div></blockquote>';
$string['inputdatadirectory'] = 'Directorio de datos:';
$string['inputwebadress'] = 'Enderezo web:';
$string['inputwebdirectory'] = 'Directorio de Moodle:';
$string['installation'] = 'Instalación';
$string['langdownloaderror'] = 'Non foi posíbel descargar o idioma «{$a}». O proceso de instalación continuará en inglés.';
$string['langdownloadok'] = 'O idioma «{$a}» foi instalado correctamente. O proceso de instalación continuará neste idioma.';
$string['magicquotesruntime'] = 'Magic quotes en tempo de execución';
$string['magicquotesruntimeerror'] = 'Debe estar desactivado';
$string['magicquotesruntimehelp'] = '<p>Magic quotes runtime debe estar desactivado para que Moodle funcione adecuadamente.</p>

<p>Normalmente e de xeito predeterminado está desactivado ... Vexa o axuste <b>magic_quotes_runtime</b> no ficheiro php.ini.</p>

<p>Se non ten acceso a php.ini, debería poder escribir a seguinte liña nun ficheiro chamado
   .htaccess dentro do directorio Moodle:</p>
   <blockquote><div>php_value magic_quotes_runtime Off</div></blockquote>';
$string['memorylimit'] = 'Límite de memoria';
$string['memorylimiterror'] = 'O límite de memoria PHP esta estabelecido a un valor moi baixo ... pode ter problemas máis adiante.';
$string['memorylimithelp'] = '<p>O límite de memoria PHP no seu servidor está estabelecido en {$a}.</p>

<p>Isto pode facer que Moodle teña problemas de memoria máis adiante, especialmente
    se vostede ten activados un feixe de módulos e/ou unha gran cantidade de usuarios.</p>

<p>Recomendámoslle que configure PHP co límite máis alto posíbel, p.ex. 40M.
    Hai varias maneiras de facer isto que vostede pode probar:</p>
<ol>
<li>Se vostede e quen de facelo, volva compilar PHP con <i>--enable-memory-limit</i>.
    Isto fai que sexa Moodle quen estabeleza o límite de memoria.</li>
<li>Se vostede ten acceso ao ficheiro php.ini, pode cambiar o <b>memory_limit</b>
    estabelecéndoo en, digamos, 40M. Se vostede non ten acceso, podería
    solicitarlle ao administrador que o faga por vostede.</li>
<li>Nalgúns servidores PHP, pode crear un ficheiro .htaccess no directorio Moodle
    que conteña a seguinte liña:
    <blockquote><div>php_value memory_limit 40M</div></blockquote>
    <p>Porén, nalgúns servidores isto impide que traballen <b>todas</b> as páxinas PHP
    (poderá ver os erros cando se miran as páxinas) de modo que terá que eliminar o ficheiro .htaccess.</p></li>
</ol>';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssqlextensionisnotpresentinphp'] = 'PHP non foi configurado adecuadamente coa extensión MSSQL de modo que poida comunicarse co SQL*Server. Comprobe o ficheiro php.ini ou volva a compilar PHP.';
$string['mssql_n'] = 'SQL*Server con compatibilidade UTF-8 (mssql_n)';
$string['mysql'] = 'MySQL (mysql)';
$string['mysqlextensionisnotpresentinphp'] = 'PHP non foi configurado adecuadamente coa extensión MySQL de modo que poida comunicarse co MySQL*Server. Comprobe o ficheiro php.ini ou volva a compilar PHP.';
$string['mysqli'] = 'MySQL mellorado (mysqli)';
$string['mysqliextensionisnotpresentinphp'] = 'PHP non foi configurado adecuadamente coa extensión MySQLi de modo que poida comunicarse co MySQL. Comprobe o ficheiro php.ini ou volva a compilar PHP. A extensión MySQLi non está dispoñíbel para PHP 4';
$string['nativemssql'] = 'SQL*Server FreeTDS (nativo/mssql)';
$string['nativemssqlhelp'] = 'Agora necesita configurar a base de datos na que se almacenará a maioría dos datos de Moodle.
Esta base de datos debe ter sido creada, e dispor dun nome de usuario e dun contrasinal de acceso. O prefixo da táboa é obrigatorio.';
$string['nativemysqli'] = 'MySQL mellorado (nativo/mysqli)';
$string['nativemysqlihelp'] = 'Agora necesita configurar a base de datos na que se almacenará a maioría dos datos de Moodle.
A base de datos debe só poderá ser creada se o usuario da base de datos ten os permisos necesarios. Xa debe existir o nome de usuario e o contrasinal. O prefixo da táboa é opcional.';
$string['nativeoci'] = 'Oracle (nativo/oci)';
$string['nativeocihelp'] = 'Agora necesita configurar a base de datos na que se almacenará a maioría dos datos de Moodle.
Esta base de datos debe ter sido creada, e dispor dun nome de usuario e dun contrasinal de acceso. O prefixo da táboa é obrigatorio.';
$string['nativepgsql'] = 'PostgreSQL (nativo/pgsql)';
$string['nativepgsqlhelp'] = 'Agora necesita configurar a base de datos na que se almacenará a maioría dos datos de Moodle.
Esta base de datos debe ter sido creada, e dispor dun nome de usuario e dun contrasinal de acceso. O prefixo da táboa é obrigatorio.';
$string['nativesqlsrv'] = 'SQL*Server Microsoft (nativo/sqlsrv)';
$string['nativesqlsrvhelp'] = 'Agora necesita configurar a base de datos na que se almacenará a maioría dos datos de Moodle.
Esta base de datos debe ter sido creada, e dispor dun nome de usuario e dun contrasinal de acceso. O prefixo da táboa é obrigatorio.';
$string['nativesqlsrvnodriver'] = 'Os controladores de Microsoft SQL Server para PHP non están instalados ou non estan configurado correctamente.';
$string['nativesqlsrvnonwindows'] = 'Os controladores de Microsoft SQL Server para PHP só están dispoñíbeis para o S.O. Windows';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'PHP non foi configurado adecuadamente coa extensión OCI8 de modo que poida comunicarse con Oracle. Comprobe o ficheiro php.ini ou volva a compilar PHP.';
$string['odbcextensionisnotpresentinphp'] = 'PHP non foi configurado adecuadamente coa extensión ODBC de modo que poida comunicarse co SQL*Server. Comprobe o ficheiro php.ini ou volva a compilar PHP.';
$string['odbc_mssql'] = 'SQL*Server sobre ODBC (odbc_mssql)';
$string['pass'] = 'Pasar';
$string['paths'] = 'Rutas';
$string['pathserrcreatedataroot'] = 'O directorio de datos ({$a->dataroot}) non puido ser creado polo instalador.';
$string['pathshead'] = 'Confirme as rutas';
$string['pathsrodataroot'] = 'O directorio dataroot non ten permisos de escritura.';
$string['pathsroparentdataroot'] = 'O directorio principal ({$a->parent}) non ten permisos de escritura. O instalador non pode crear o directorio de datos ({$a->dataroot}).';
$string['pathssubadmindir'] = 'Moi poucos enderezos web empregan /admin como URL especial para
permitirlle acceder a un panel de control ou semellante. Desafortunadamente, isto entra en conflito coa localización estándar das páxinas de administración de Moodle. Vostede pode corrixir isto
renomeando o directorio admin na súa instalación, e poñendo aquí ese novo nome.  Por exemplo: <em>moodleadmin</em>. Iso corrixirá as ligazóns admin en Moodle.';
$string['pathssubdataroot'] = 'Necesitase un lugar no que Moodle poida gardar os ficheiros enviados. Este directorio debe ser lexíbel E ESCRIBÍBEL polo usuario do servidor web
(normalmente «nobody», «apache», «www-data»), mais non debería ser accesíbel directamente desde o web. Se non existe o instalador tentará crealo.';
$string['pathssubdirroot'] = 'Ruta completa do directorio de instalación de Moodle.';
$string['pathssubwwwroot'] = 'Enderezo web completo para acceder a Moodle.
Non é posíbel acceder a Moodle empregando enderezos múltiplos.
Se o seu sitio ten varios enderezos públicos debe configurar encamiñamentos permanentes en todos eles, agás neste.
Se o seu sitio web é accesíbel tanto desde unha Intranet como desde Internet, escriba aquí o enderezo público e configure o DNS para que os usuarios da Intranet poidan empregar tamén o enderezo público.
Se o enderezo non é correcto, cambie o URL no seu navegador para reiniciar a instalación cun valor diferente.';
$string['pathsunsecuredataroot'] = 'A localización de dataroot non é segura';
$string['pathswrongadmindir'] = 'Non existe o directorio Admin';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP non foi configurado adecuadamente coa extensión PGSQL de modo que poida comunicarse co PostgreSQL. Comprobe o ficheiro php.ini ou volva a compilar PHP.';
$string['phpextension'] = 'Extensión PHP {$a}';
$string['phpversion'] = 'Versión PHP';
$string['phpversionhelp'] = '<p>Moodle require polo menos unha das versións de PHP 4.3.0 ou 5.1.0 ( as versións 5.0.x teñen unha serie de problemas coñecidos).</p>
<p>Neste momento está executandose a versión {$a}</p>
<p>Debe actualizar PHP ou trasladarse a outro servidor cunha versión máis recente de PHP!<br />
(NO caso de 5.0.x podería tamén reverter cara a versión 4.4.x)</p>';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['releasenoteslink'] = 'Para obter información sobre de esta versión de Moodle, consulte as notas da versión en {$a}';
$string['safemode'] = 'Modo seguro';
$string['safemodeerror'] = 'Moodle pode ter problemas co modo seguro activado';
$string['safemodehelp'] = '<p>Moodle pode ter varios problemas co modo seguro activado, non sendo o menos
   importante que non se lle permita crear novos ficheiros.</p>

<p>Normalmente, o modo seguro só se activa en servidores web públicos paranoicos,
   polo que é probábel que teña que buscar outro aloxamento para o seu sitio Moodle.</p>

<p>Pode continuar coa instalación, mais experimentará problemas máis adiante.</p>';
$string['sessionautostart'] = 'Inicio automático de sesión';
$string['sessionautostarterror'] = 'Debe estar desactivado';
$string['sessionautostarthelp'] = '<p>Moodle require ter compatibilidade de sesións e non funcionará sen el.</p>

<p>As sesións deben estar activadas no ficheiro php.ini ... busque o parámetro session.auto_start.</p>';
$string['skipdbencodingtest'] = 'Omitir a proba de codificación da BD';
$string['sqliteextensionisnotpresentinphp'] = 'PHP non foi configurado adecuadamente coa extensión SQLite. Comprobe o ficheiro php.ini ou volva a compilar PHP.';
$string['upgradingqtypeplugin'] = 'Actualizando o engadido de pregunta/tipo';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Se esta a ver esta páxina é porque puido instalar satisfactoriamente e
    executar o paquete <strong>{$a->packname} {$a->packversion}</strong> no seu computador. Parabéns!';
$string['welcomep30'] = 'Esta versión de <strong>{$a->installername}</strong> inclúe os aplicativos
    para crear un entorno no que <strong>Moodle</strong> funcione, nomeadamente:';
$string['welcomep40'] = 'O paquete inclúe tamen <strong>Moodle {$a->moodlerelease} ({$a->moodleversion})</strong>.';
$string['welcomep50'] = 'O uso de todos os aplicativos do paquete está rexido polas súas respectivas
    licenzas. O paquete completo <strong>{$a->installername}</strong> é
    <a href="http://www.opensource.org/docs/definition_plain.html">código aberto</a> e distribúese
    baixo a licenza <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a>.';
$string['welcomep60'] = 'As páxinas seguintes guiarano a través de algúns sinxelos pasos para configurar
    e axustar <strong>Moodle</strong> no seu computador. Pode empregar os axustes predeterminados
    ou, opcionalmente, modificalos para que se axusten ás súas necesidades.';
$string['welcomep70'] = 'Prema no botón «Seguinte» para continuar coa configuración de <strong>Moodle</strong>.';
$string['wwwroot'] = 'Enderezo web';
$string['wwwrooterror'] = 'O «Enderezo web» semella ser incorrecto; semella que esta instalación de Moodle non se atopa aí. O valor foi restabelecido.';
