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
 * Strings for component 'enrol_imsenterprise', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = 'Unha vez gardadas as súas configuracións, poderá desexar';
$string['allowunenrol'] = 'Permitir datos IMS para <strong>dar de baixa</strong> estudantes/profesores';
$string['allowunenrol_desc'] = 'De estar activado, as matriculacións retiraranse cando se especifique nos datos de empresa.';
$string['basicsettings'] = 'Configuracións básicas';
$string['coursesettings'] = 'Opcións dos datos do curso';
$string['createnewcategories'] = 'Crear novas (ocultas) categorías de curso se non as encontra en Moodle';
$string['createnewcategories_desc'] = 'Se o elemento <org><orgunit> está presente en datos de entrada dun curso, o seu contido utilizarase para especificar unha categoría se o curso se está creando a partir de cero. O plugin NON reclasificará os cursos existentes.

Se non existe ningunha categoría co nome desexado, daquela crearase unha categoría agochada.';
$string['createnewcourses'] = 'Crear novos cursos (ocultos) se non os encontra en Moodle';
$string['createnewcourses_desc'] = 'Se está activado, o complemento de IMS Enterprise pode crear novos cursos de calquera que atope nos datos do IMS pero non na base de datos de Moodle. Todos os cursos creados de novas están en principio agochados.';
$string['createnewusers'] = 'Crear contas para usuarios aínda non rexistrados en Moodle';
$string['createnewusers_desc'] = 'Os datos de matriculación de IMS Enterprise normalmente describen un conxunto de usuarios. Se está activado, as contas poden crearse para calquera dos usuarios que non se atopan na base de datos de Moodle.

Búscase os usuarios primeiro polo seu "idnumber", e secundariamente polo seu nome de usuario de Moodle. Os contrasinais non os importa o complemento IMS Enterprise. O uso dun complemento de autenticación recoméndase para a identificación de usuarios.';
$string['cronfrequency'] = 'Frecuencia do procesamento';
$string['deleteusers'] = 'Eliminar contas de usuario cando son especificadas en datos IMS';
$string['deleteusers_desc'] = 'Se está activado, os datos de matriculación de IMS Enterprise poden especificar a eliminación das contas de usuario (se a marca "recstatus" se define como 3, que representa a eliminación dunha conta). Como é estándar no Moodle, o rexistro do usuario non se elimina realmente da base de datos de Moodle, pero estabelécese un marca para sinalar a conta como eliminada.';
$string['doitnow'] = 'executar unha importación IMS Enterprise agora mesmo';
$string['filelockedmail'] = 'O ficheiro de texto que está a utilizar para as inscricións baseadas nos ficheiros IMS ({$a}) non pode ser eliminado polo proceso cron.  Normalmente, isto significa que os permisos non son apropiados.  Sinale os permisos para que Moodle poida eliminar o ficheiro, no caso contrario poderá ser procesado repetidamente.';
$string['filelockedmailsubject'] = 'Erro importante: Ficheiro de inscricións';
$string['fixcasepersonalnames'] = 'Modificar os nomes persoais para maiúsculas no Título';
$string['fixcaseusernames'] = 'Modificar nomes de usuario para minúsculas';
$string['ignore'] = 'Ignorar';
$string['importimsfile'] = 'Importar o ficheiro de IMS Enterprise';
$string['imsrolesdescription'] = 'A especificación IMS Enterprise inclúe 8 tipos diferentes de papeis. Escolla como desexa que sexan atribuídos en Moodle, tamén se calquera deles podería ser ignorado.';
$string['location'] = 'Localización do ficheiro';
$string['logtolocation'] = 'Localización da saída do ficheiro de rexistro  (en branco significa sen rexistro)';
$string['mailadmins'] = 'Notificar ao administrador por correo electrónico';
$string['mailusers'] = 'Notificar aos usuarios por correo electrónico';
$string['messageprovider:imsenterprise_enrolment'] = 'Mensaxes de matriculación de IMS Enterprise';
$string['miscsettings'] = 'Varios';
$string['pluginname'] = 'Ficheiro IMS Enterprise';
$string['pluginname_desc'] = 'Este método buscará repetidamente e procesará un ficheiro de texto espcialmente formatado na localización que especifique. O ficheiro debe seguir as especificacións de IMS Enterprise e conter a persoa, grupo e os elementos XML de membro.';
$string['processphoto'] = 'Engadir datos da fotografía do usuario para o perfil';
$string['processphotowarning'] = 'Aviso: Ao procesar unha imaxe é probable que sexa engadida unha carga significativa ao servidor. Non é recomendable que active esta opción se hai un grande número de estudantes para seren procesados.';
$string['restricttarget'] = 'Só procesa datos se o seguinte obxectivo é especificado';
$string['restricttarget_desc'] = 'Un ficheiro de datos de IMS Enterprise podería ser destinado a varios "obxectivos" - distintos ou sistemas diferentes dentro dunha escola/universidade. É posíbel especificar no ficheiro do Enterprise que os datos están preparados para un ou máis sistemas de destino, nomeándoos en etiquetas <target> contidas na etiqueta <properties>.

En xeral, non se preocupe diso. Deixe en branco a opción e Moodle procesará o ficheiro de datos, non importa se o destino está especificado ou non. En caso contrario, cubra o nome exacto que estará na saída da etiqueta <target>.';
$string['roles'] = 'Roles';
$string['sourcedidfallback'] = 'Utilice o sourcedid para o id de usuario da persoa se o userid campo non é encontrado';
$string['sourcedidfallback_desc'] = 'Nos datos do IMS, o campo <sourcedid> campo o código persistente de identificación dunha persoa que utiliza o sistema orixe. O campo <userid> é un campo separado que debe conter o código de identificación utilizado polo usuario cando inicia sesión. En moitos casos, estes dous códigos poden ser os mesmos - pero non sempre.

Algúns sistemas de información dos alumnos fallan ao emitir o <userid> campo. Se este é o caso, ten que activar esta configuración para permitir o uso do <sourcedid> como o ID de usuario Moodle. Se non, deixe esta opción desactivada.';
$string['truncatecoursecodes'] = 'Truncar os códigos do curso para este período';
$string['truncatecoursecodes_desc'] = 'Nalgunhas situacións pode ter códigos de curso que desexa truncar a un tamaño determinado antes do procesamento. De ser o caso, introduza o número de caracteres nesta caixa. Doutra maneira deixe a caixa en branco e non se producirá ningún truncamento.';
$string['usecapitafix'] = 'Marque esta caixa se utiliza Capita (o seu formato XML está algo errado)';
$string['usecapitafix_desc'] = 'No sistema de datos de estudante producidos por Capita atopouse un lixeiro erro na súa saída XML. De estar a usar Capita, debería activar esta opción - doutra maneira déixeo desmarcada.';
$string['usersettings'] = 'Opcións de datos do usuario';
$string['zeroisnotruncation'] = '0 indica que non hai acción de truncar';
