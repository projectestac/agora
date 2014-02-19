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
 * Strings for component 'enrol_self', language 'gl', branch 'MOODLE_24_STABLE'
 *
 * @package   enrol_self
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['cohortnonmemberinfo'] = 'Soamente os membros do círculo «{$a}» poden automatricularse.';
$string['cohortonly'] = 'Soamente os membros do círculo';
$string['cohortonly_help'] = 'A matriculación por si mesmos pode restrinxirse aos membros dun único círculo especifico. Vexa que o cambio desta configuración non ten efecto sobre as matriculacións existentes.';
$string['customwelcomemessage'] = 'Mensaxe de benvida personalizada';
$string['customwelcomemessage_help'] = 'Pódese engadir unha mensaxe de benvida personalizada como texto simple ou en autoformato de Moodle, que inclúe etiquetas HTML e etiquetas multilingües.

Os seguintes marcadores poden incluirse na mensaxe:

* Nome do curso {$a->coursename}
* Ligazón á páxina de perfil do usuario {$a->profileurl}';
$string['defaultrole'] = 'Asignación de rol predeterminado';
$string['defaultrole_desc'] = 'Seleccionar o rol que se lle debería de asignar aos usuarios durante a matriculación por si mesmos';
$string['enrolenddate'] = 'Data final';
$string['enrolenddate_help'] = 'De estar activado, os usuarios poden matricularse por si mesmos soamente ata esta data.';
$string['enrolenddaterror'] = 'A data de fin do período de inscrición non pode ser anterior á data de inicio.';
$string['enrolme'] = 'Matricúlame';
$string['enrolperiod'] = 'Duración da matrícula';
$string['enrolperiod_desc'] = 'Tempo durante o que a matrícula é válida. De definirse como cero, a duración da matricula será ilimitado de modo predeterminado.';
$string['enrolperiod_help'] = 'Tempo durante o que a matrícula é válida, comezando desde o momento en que o usuario se matricula por si mesmo. De estar desactivado, a duración da matrícula é ilimitado.';
$string['enrolstartdate'] = 'Data de inicio';
$string['enrolstartdate_help'] = 'De estar activado, os usuarios poden matricularse a si mesmos soamente a partir desta data en diante.';
$string['expiredaction'] = 'Acción na expiración da matrícula';
$string['expiredaction_help'] = 'Seleccione a acción que realizar cando a matrícula do usuario expire. Note que algúns datos do usuario e configuración se purgan do curso durante a desmatriculación.';
$string['expirymessageenrolledbody'] = 'Prezado/a {$a->user},

Esta é a notificación de que a súa matriculación no curso «{$a->course}» vai expirar en {$a->timeend}.

De necesitar axuda, contacte por favor co {$a->enroller}.';
$string['expirymessageenrolledsubject'] = 'Notificación de expiración da automatrícula';
$string['expirymessageenrollerbody'] = 'A matrícula no curso «{$a->course}» expirará no vindeiro {$a->threshold} para os seguintes usuarios:

{$a->users}

Para prorrogar a matrícula, vaia a {$a->extendurl}';
$string['expirymessageenrollersubject'] = 'Notificación de expiración da automatrícula';
$string['groupkey'] = 'Utilice chaves de matriculación de grupo';
$string['groupkey_desc'] = 'Use chaves de matriculación de grupo de modo predeterminado.';
$string['groupkey_help'] = 'Ademais de restrinxir o acceso ao curso soamente para aqueles que coñezan a chave, utilizar unha chave de matriculación de grupo significa que os usuarios se engadirán automaticamente ao grupo cando se matriculen no curso.

Para utilizar unha chave de matriculación de grupo, debe especificar unha chave de matriculación na configuración do curso así como a chave de matriculación de grupo no configuración do grupo.';
$string['longtimenosee'] = 'Desmatricular os inactivos tras';
$string['longtimenosee_help'] = 'Se os usuarios non accederon a un curso durante un longo período, entón son desmatriculados automaticamente. Este parámetro especifica ese tempo límite.';
$string['maxenrolled'] = 'Máximo de usuarios matriculados';
$string['maxenrolled_help'] = 'Especifica o número máximo de usuarios que se poden matricular por si mesmos. 0 significa sen límite.';
$string['maxenrolledreached'] = 'Xa se acadou o número máximo de usuarios aos que se lles permite matricularse por si mesmos.';
$string['messageprovider:expiry_notification'] = 'Notificacións de expiración de automatriculación';
$string['nopassword'] = 'Non se require chave para a matriculación.';
$string['password'] = 'Chave para matriculación';
$string['password_help'] = 'Unha chave para matriculación permite que o acceso ao curso se restrinxa só para aqueles que coñecen a chave.

Se o campo está en branco, calquera usuario pode matricularse no curso.

De se especificar unha chave, a calquera usuario que tente matricularse no curso pediráselle que forneza a chave. Vexa que un usuario soamente necesita fornecer a chave UNHA vez, ao matricularse no curso.';
$string['passwordinvalid'] = 'Chave para matriculación incorrecta, ténteo outra vez';
$string['passwordinvalidhint'] = 'A chave utilizada é incorrecta, ténteo de novo<br />
(Pista: Comeza por {$a})';
$string['pluginname'] = 'Matriculación por si mesmo';
$string['pluginname_desc'] = 'O engadido de matriculación por si mesmo permítelles aos usuarios escoller en que cursos queren participar. Os cursos poden estar protexidos por unha chave de matriculación. Internamente a matriculación faise por medio do engadido de matriculación manual que ten que estar activado en tal curso.';
$string['requirepassword'] = 'Require chave para matriculación';
$string['requirepassword_desc'] = 'Require chave para matriculación nos novos cursos e evita a retirada da chave para matriculación dos cursos existentes.';
$string['role'] = 'Rol asignado predeterminado';
$string['self:config'] = 'Configurar instancias de automatrícula';
$string['self:manage'] = 'Xestionar usuarios matriculados';
$string['self:unenrol'] = 'Desmatricular usuarios do curso';
$string['self:unenrolself'] = 'Desmatricularse do curso';
$string['sendcoursewelcomemessage'] = 'Enviar mensaxe de benvida ao curso';
$string['sendcoursewelcomemessage_help'] = 'De estar activado, os usuarios reciben unha mensaxe de benvida vía correo cando tentan matricularse por si mesmos nun curso.';
$string['showhint'] = 'Amosar aviso';
$string['showhint_desc'] = 'Amosar a primeira letras da chave de acceso como convidado.';
$string['unenrol'] = 'Desmatricular usuario';
$string['unenrolselfconfirm'] = 'Confirma que quere desmatricularse a si mesmo do curso «{$a}»?';
$string['unenroluser'] = 'Confirma que quere desmatricular a «{$a->user}» do curso «{$a->course}»?';
$string['usepasswordpolicy'] = 'Utilice a norma de contrasinais';
$string['usepasswordpolicy_desc'] = 'Utilice a norma estándar de contrasinais para as chaves de matriculación.';
$string['welcometocourse'] = 'Benvido/a a {$a}';
$string['welcometocoursetext'] = 'Benvido/a ao curso {$a->coursename}!

Se aínda non o fixo, pode editar a súa páxina de perfil no curso para sabermos máis sobre vostede:

  Url do perfil {$a->profileurl}';
