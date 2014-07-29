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
 * Strings for component 'lti', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   lti
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accept'] = 'Aceptar';
$string['accept_grades'] = 'Aceptar cualificacións desde a ferramenta';
$string['accept_grades_admin'] = 'Aceptar cualificacións desde a ferramenta';
$string['accept_grades_admin_help'] = 'Especificar cando o fornecedor da ferramenta pode engadir, actualizar, ler e eliminar cualificacións asociadas con instancias deste tipo de ferramenta.

Algúns fornecedores da ferramenta teñen a posibilidade de devolver información de cualificacións a Moodle baseadas en acción tomadas coa ferramenta, creando así unha experiencia máis integrada.';
$string['accept_grades_help'] = 'Especifique cando o fornecedor da ferramenta pode engadir, actualizar, ler e eliminar cualificacións asociadas soamente coa instancia desta ferramenta externa.

Algúns dos fornecedores da ferramenta teñen a posibilidade de devolver a Moodle cualificacións baseadas en acción tomadas coa ferramenta, creando así unha experiencia máis integrada.

Vexa que esta configuración pode sobrescribirse na configuración da ferramenta.';
$string['action'] = 'Acción';
$string['active'] = 'Activa';
$string['activity'] = 'Actividade';
$string['addnewapp'] = 'Activar o aplicativo externo';
$string['addserver'] = 'Engadir un novo servidor de confianza';
$string['addtype'] = 'Engadir unha configuración da ferramenta externa';
$string['allow'] = 'Permitir';
$string['allowinstructorcustom'] = 'Permitirlles aos profesores engadir parámetros personalizados';
$string['allowsetting'] = 'Permitirlle á ferramenta gardar 8K de configuración dentro de Moodle.';
$string['always'] = 'Sempre';
$string['automatic'] = 'Automática, baseada en Launch URL';
$string['baseurl'] = 'URL de base';
$string['basiclti'] = 'LTI';
$string['basicltiactivities'] = 'Actividades LTI';
$string['basiclti_base_string'] = 'Cadea base de LTI OAuth';
$string['basiclti_endpoint'] = 'Punto de remate de LTI Launch';
$string['basicltifieldset'] = 'Campo personalizado de exemplo';
$string['basiclti_in_new_window'] = 'A súa actividade abriuse nunha nova xanela';
$string['basicltiintro'] = 'Descrición da actividade';
$string['basicltiname'] = 'Nome da actividade';
$string['basiclti_parameters'] = 'Parámetros de LTI Launch';
$string['basicltisettings'] = 'Configuración de interoperabilidade da Ferramenta básica de aprendizaxe';
$string['cannot_delete'] = 'Vostede non pode eliminar a configuración desta ferramenta';
$string['cannot_edit'] = 'Vostede non pode editar a configuración desta ferramenta';
$string['comment'] = 'Comentario';
$string['configpassword'] = 'Contrasinal predeterminado da ferramenta remota';
$string['configpreferheight'] = 'Altura predeterminada preferida';
$string['configpreferwidget'] = 'Estabelecer o inicie predeterminado do trebello';
$string['configpreferwidth'] = 'Largura predeterminada preferida';
$string['configresourceurl'] = 'Recurso URL predeterminado';
$string['configtoolurl'] = 'URL da ferramenta remota personalizada';
$string['configtypes'] = 'Activar os aplicativos LTI';
$string['courseid'] = 'Número id do curso';
$string['coursemisconf'] = 'O curso non está configurado';
$string['course_tool_types'] = 'Tipos de ferramentas do curso';
$string['createdon'] = 'Creado o';
$string['curllibrarymissing'] = 'Para usar LTI debe estar instalada a biblioteca Curl de PHP';
$string['custom'] = 'Parámetros personalizados';
$string['custom_config'] = 'Usando unha configuración de ferramenta personalizada';
$string['custom_help'] = 'Os parámetros personalizados son a configuración utilizada polo fornecedor da ferramenta. Por exemplo, un parámetro personalizado pódese usar para presentar un recurso específico do fornecedor.

É seguro deixar estes campo sen cambios a non ser que diga outra cousa o fornecedor da ferramenta.';
$string['custominstr'] = 'Parámetros personalizados';
$string['debuglaunch'] = 'Opción de depuración';
$string['debuglaunchoff'] = 'Inicio normal';
$string['debuglaunchon'] = 'Depurar o inicio';
$string['default'] = 'Predeterminado';
$string['default_launch_container'] = 'Contedor predeterminado de inicio.';
$string['default_launch_container_help'] = 'O contedor de inicio afecta á visualización da ferramenta cando se inicia desde o curso.
Algúns contedores de inicio proporcionan máis información en pantalla do estado real da ferramenta, e outros ofrecen unha sensación máis integrada co entorno Moodle.

***Predeterminado** - Utilice o contedor de inicio especificado pola ferramenta de configuración.
***Incorporar** - A ferramenta aparece dentro da xanela existente de Moodle, dun modo semellante aos demais tipos de actividades.
***Incorporar, sen bloques** - A ferramenta aparece dentro da xanela existente de Moodle, só cos controis de navegación na parte superior da páxina. *** Nova xanela** - A ferramenta ábrese nunha nova xanela, ocupando todo o espazo dispoñíbel. Dependendo do seu navegador, abrirase nunha nova lapela ou nunha xanela emerxente. É posible que algún dos navegadores impida a apertura da nova xanela.';
$string['delegate'] = 'Delegar no profesor';
$string['delete'] = 'Eliminar';
$string['delete_confirmation'] = 'Confirma que quere eliminar esta ferramenta de configuración externa?';
$string['deletetype'] = 'Eliminar a configuración da ferramenta externa';
$string['display_description'] = 'Presentar a descrición da actividade cando se inicie';
$string['display_description_help'] = 'De seleccionarse, a descrición da actividade (especificada antes) presentarase por riba do contido da ferramenta dos fornecedores.

A descrición pode usarse para proporcionar instrucións adicionais para os que inician a ferramenta pero non é requirida.';
$string['display_name'] = 'Presentar o nome da actividade ao iniciarse';
$string['display_name_help'] = 'De seleccionarse, o nome da actividade (especificado antes) presentarase por riba do contido da ferramenta dos fornecedores.

É posíbel que a ferramenta dos fornecedores tamén poida presentar o título. Esta opción pode evitar que o título da actividade apareza dúas veces.

O título nunca se presenta cando o contedor de inicio está nunha nova xanela.';
$string['domain_mismatch'] = 'O inicio das URL do dominio non coincide coa configuración da ferramenta.';
$string['donot'] = 'Non enviar';
$string['donotaccept'] = 'Non aceptar';
$string['donotallow'] = 'Non permitir';
$string['edittype'] = 'Editar a configuración da ferramenta externa';
$string['embed'] = 'Incorporado';
$string['embed_no_blocks'] = 'Incorporado, sen bloques';
$string['enableemailnotification'] = 'Enviar correos de notificación';
$string['enableemailnotification_help'] = 'De estar activado, os alumnos recibirán unha notificación por correo cando a súa ferramenta de envíos reciba cualificación.';
$string['errormisconfig'] = 'Ferramenta desconfigurada. Pregúntelle ao seu administrador para arranxar a configuración da ferramenta.';
$string['extensions'] = 'Servizos de extensión LTI';
$string['external_tool_type'] = 'Tipo de ferramenta externa';
$string['lti_launch_error_tool_request'] = '<p> Para enviar unha solicitude a de que un administrador complete a configuración da ferramenta, prema <a href="{$a->admin_request_url}" target="_top">aquí</a>. </p>';
$string['lti:requesttooladd'] = 'Enviar unha ferramenta aos administradores para a súa configuración';
$string['lti_tool_request_added'] = 'A solicitude de configuración da ferramenta enviouse correctamente. Poida que necesite contactar cun administrador para completar a configuración da ferramenta.';
$string['lti_tool_request_existing'] = 'Xa se entregou unha configuración para a ferramenta no dominio.';
$string['submissions'] = 'Entregas';
