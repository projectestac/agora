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
 * Strings for component 'chat', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   chat
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Ten unha conversa en marcha';
$string['ajax'] = 'Versión que usa Ajax';
$string['autoscroll'] = 'Autodesprazamento';
$string['beep'] = 'Beep';
$string['bubble'] = 'Burbulla';
$string['cantlogin'] = 'Non foi posíbel acceder a sala de conversa!!';
$string['chat:addinstance'] = 'Engadir unha nova conversa';
$string['chat:chat'] = 'Acceder a unha sala de conversa';
$string['chat:deletelog'] = 'Eliminar os rexistros da conversa';
$string['chat:exportparticipatedsession'] = 'Exportar a sesión de conversa na que vostede participou';
$string['chat:exportsession'] = 'Exportar calquera sesión de conversa';
$string['chatintro'] = 'Descrición';
$string['chatname'] = 'Nome desta sala de conversa';
$string['chat:readlog'] = 'Ler os rexistros da conversa';
$string['chatreport'] = 'Sesións de conversa';
$string['chat:talk'] = 'Falar nunha conversa';
$string['chattime'] = 'Próxima cita';
$string['compact'] = 'Compacto';
$string['composemessage'] = 'Redactar unha mensaxe';
$string['configmethod'] = 'O método de conversa ajax fornece unha interface baseada en ajax, contacta regularmente co servidor para actualización. O método normal de conversa implica que os clientes contactan regularmente para as actualizacións. Non require configuración e funciona en calquera sitio pero pode producir unha longa carga no servidor con moitos participantes.  Usar un servizo de servidor require acceso ao shell en Unix, mais resulta ser un entorno de conversa rapidamente escalábel.';
$string['confignormalupdatemode'] = 'As actualizacións das salas de conversa funcionan eficientemente usando a funcionalidade <em>Manter vivo</em> de HTTP 1.1 mais isto resulta pesado no lado do servidor. Un método máis avanzado é usar a estratexia de <em>Fluxo</em> para que aflúan as actualizacións aos usuarios. O uso de <em>Fluxo</em> escala moito mellor (semellante ao método chatd) mais pode ser que o seu servidor non sexa compatíbel.';
$string['configoldping'] = 'Cal é o tempo máximo que pode pasar antes de detectarmos que un usuario se desconectou (en segundos)? Isto só é un límite máximo, xa que as desconexións adoitan detectarse moi rapidamente. Os valores baixos supoñerán unha maior demanda do seu servidor. Se está a usar o método normal, <strong>nunca</strong> estabeleza isto cun valor inferior a 2 * chat_refresh_room.';
$string['configrefreshroom'] = 'Con que frecuencia a sala de conversa debería recargarse a si mesma? (en segundos).  Un valor baixo fará que a sala de conversa pareza máis rápida pero pode supoñer unha carga maior no seu servidor web cando moitas persoas estean a conversar. De estar usando actualizacións con <em>Fluxo</em> poder seleccionar frecuencias de recarga máis altas -- probe con 2.';
$string['configrefreshuserlist'] = 'Con que frecuencia debería recargarse a lista de usuarios? (en segundos)';
$string['configserverhost'] = 'O nome de máquina do computador onde está o servizo de servidor';
$string['configserverip'] = 'O enderezo numérico IP que coincide co nome de máquina anterior';
$string['configservermax'] = 'Número máximo de clientes permitido';
$string['configserverport'] = 'Porto que usar no servidor para o servizo';
$string['coursetheme'] = 'Tema do curso';
$string['currentchats'] = 'Sesións activas de conversa';
$string['currentusers'] = 'Usuarios actuais';
$string['deletesession'] = 'Eliminar esta sesión';
$string['deletesessionsure'] = 'Confirma que quere eliminar esta sesión?';
$string['donotusechattime'] = 'Non publicar ningunha hora da conversa';
$string['enterchat'] = 'Prema aquí para acceder á conversa agora';
$string['entermessage'] = 'Escriba a súa mensaxe';
$string['errornousers'] = 'Non foi posíbel atopar a ningún usuario!';
$string['event_message_sent'] = 'Mensaxe enviada';
$string['event_sessions_viewed'] = 'Sesións vistas';
$string['explaingeneralconfig'] = 'Esta configuración <strong>sempre</strong> se usa';
$string['explainmethoddaemon'] = 'Esta configuración é efectiva <strong>só</strong> de se seleccionar «Servizo de conversa de servidor» para chat_method';
$string['explainmethodnormal'] = 'Esta configuración é efectiva <strong>só</strong> de se seleccionar «Método normal» para chat_method';
$string['generalconfig'] = 'Configuración xeral';
$string['idle'] = 'Inactivo';
$string['inputarea'] = 'Área de entrada';
$string['invalidid'] = 'Non foi posíbel atopar esa sala de conversa!';
$string['list_all_sessions'] = 'Lista de todas as sesións.';
$string['list_complete_sessions'] = 'Lista de sesións completadas unicamente.';
$string['listing_all_sessions'] = 'Lista de todas as sesións.';
$string['messagebeepseveryone'] = '{$a} bips para todos!';
$string['messagebeepsyou'] = '{$a} bip só para vostede!';
$string['messageenter'] = '{$a} acaba de entrar nesta conversa';
$string['messageexit'] = '{$a} acaba de deixar esta conversa';
$string['messages'] = 'Mensaxes';
$string['messageyoubeep'] = 'Enviou un bip a {$a}';
$string['method'] = 'Método de conversa';
$string['methodajax'] = 'Método ajax';
$string['methoddaemon'] = 'Servizo de servidor para conversa';
$string['methodnormal'] = 'Método normal';
$string['modulename'] = 'Conversa';
$string['modulename_help'] = 'O módulo de actividade de conversa permítelles aos participantes ter discusións baseadas en texto, en tempo real, síncronas.

A conversa pode ser unha actividade única ou poder repetirse á mesma hora cada día ou cada semana. As sesións de conversa gárdanse e poden ser dispoñibilizadas para seren vistas por calquera ou seren restrinxidas a usuarios coa capacidade de ver os rexistros das sesións de conversa.

As conversas son especialmente útiles cando o grupo que conversa non pode realizar encontros cara a cara, tales como

* Reunións regulares dos alumnos que participan en cursos en liña para permitirlles compartir experiencias con outros no mesmo curso mais nunha localización diferente
* Un alumno non pode temporalmente asistir en persoa á soster unha conversa co seu profesor para lograr o seu progreso
* Os alumnos nunha práctica de traballo externa reúnense para discutir as súas experiencias entre eles e co seu profesor
* Os nenos máis novos que utilizan a conversa na súa casa polas tardes como unha introdución controlada (monitorizada) ao mundo das redes sociais
* Unha sesión de preguntas e respostas cun relator convidado nun lugar diferente
* Sesións para para axudar os alumnos a se prepararen para probas nas que o profesor ou outros alumnos lle presentan algunhas preguntas de exemplo';
$string['modulename_link'] = 'mod/chat/vista';
$string['modulenameplural'] = 'Conversas';
$string['neverdeletemessages'] = 'Nunca eliminar mensaxes';
$string['nextsession'] = 'Seguinte sesión planificada';
$string['nochat'] = 'Non se atopou a conversa';
$string['no_complete_sessions_found'] = 'Non se atoparon sesións completas.';
$string['noguests'] = 'A conversa non está aberta a convidados';
$string['nomessages'] = 'Aínda non hai mensaxes';
$string['nopermissiontoseethechatlog'] = 'Non ten permiso para ver os rexistros de conversas.';
$string['normalkeepalive'] = 'Manter vivo';
$string['normalstream'] = 'Fluxo';
$string['noscheduledsession'] = 'Non hai ningunha sesión planificada';
$string['notallowenter'] = 'Non se lle permite acceder á sala de conversa.';
$string['notlogged'] = 'Non iniciou a súa sesión!';
$string['oldping'] = 'Tempo de expiración';
$string['page-mod-chat-x'] = 'Calquera páxina do módulo de conversa';
$string['pastchats'] = 'Sesións pasadas de conversa';
$string['pluginadministration'] = 'Administración da conversa';
$string['pluginname'] = 'Conversa';
$string['refreshroom'] = 'Recarga de sala';
$string['refreshuserlist'] = 'Recarga da lista de usuarios';
$string['removemessages'] = 'Retirar todas as mensaxes';
$string['repeatdaily'] = 'Á mesma hora cada día';
$string['repeatnone'] = 'Sen repeticións - publicar a hora especificada unicamente';
$string['repeattimes'] = 'Repetir sesións';
$string['repeatweekly'] = 'Á mesma hora cada semana';
$string['saidto'] = 'dito a';
$string['savemessages'] = 'Gardar as sesións pasadas';
$string['seesession'] = 'Ver esta sesión';
$string['send'] = 'Enviar';
$string['sending'] = 'Enviando';
$string['serverhost'] = 'Nome do servidor';
$string['serverip'] = 'IP do servidor';
$string['servermax'] = 'Usuarios máximos';
$string['serverport'] = 'Porto do servidor';
$string['sessions'] = 'Sesións de conversa';
$string['sessionstart'] = 'A seguinte sesión de conversa comezará en: {$a';
$string['strftimemessage'] = '%H:%M';
$string['studentseereports'] = 'Todo o mundo pode ver as sesións pasadas';
$string['studentseereports_help'] = 'De estabelecer como Non, soamente os usuarios que teñan a posibilidade de mod/chat:readlog poderán ver os rexistros de conversas';
$string['talk'] = 'Falar';
$string['updatemethod'] = 'Método de actualización';
$string['updaterate'] = 'Taxa de actualización:';
$string['userlist'] = 'Lista de usuario';
$string['usingchat'] = 'Utilizando a conversa';
$string['usingchat_help'] = 'O módulo de conversa contén algunhas funcionalidades para conversar de xeito un pouco máis agradábel.

* Risoños - Calquera risoño (emoticonas) que poida escribir noutro lugar tamén en Moodle a poderá escribir, por exemplo :-)
* Ligazóns - Os enderezos de sitios web converteranse en ligazóns automaticamente
* Ánimo (emoting) - pode comezar unha liña con "/me" ou ":" para denotar o ánimo, por exemplo se o seu nome fose Kim e escribe ":laughs!" Ou "/me laughs!" Entón todo o mundo verá "Kim risas!"
* Bips - Pode enviar un son a outros participantes ao premer a ligazón "bip" próxima ao seu nome. Un atallo útil para facer bip a todas as persoas da conversa á vez é escribir "beep all".
* HTML - Se sabe algún código de HTML, pode utilizalo no seu texto para facer cousas como inserir imaxes, sons de xogos ou crear texto con cores diferentes';
$string['viewreport'] = 'Ver sesións pasadas de conversa';
