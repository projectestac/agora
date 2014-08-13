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
 * Strings for component 'forum', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   forum
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activityoverview'] = 'Hai comentarios novos no foro';
$string['addanewdiscussion'] = 'Engadir un novo tema de discusión';
$string['addanewquestion'] = 'Engadir unha nova pregunta';
$string['addanewtopic'] = 'Engadir un novo tema';
$string['advancedsearch'] = 'Busca avanzada';
$string['allforums'] = 'Todos os foros';
$string['allowdiscussions'] = 'Pode un {$a} comentar neste foro?';
$string['allowsallsubscribe'] = 'Este foro permítelle a calquera escoller se subscribirse ou non';
$string['allowsdiscussions'] = 'Este foro permítelle a calquera un comezar un tema discusión.';
$string['allsubscribe'] = 'Subscribirse a todos os foros';
$string['allunsubscribe'] = 'Cancelar a subscrición a todos os foros';
$string['alreadyfirstpost'] = 'Este é xa o primeiro comentario na discusión';
$string['anyfile'] = 'Calquera ficheiro';
$string['areaattachment'] = 'Anexos';
$string['areapost'] = 'Mensaxes';
$string['attachment'] = 'Anexo';
$string['attachment_help'] = 'Pode engadir opcionalmente un ou máis ficheiro a un comentario de foro. Se engade unha imaxe, amosarase despois da mensaxe.';
$string['attachmentnopost'] = 'Non se poden exportar anexos sen un id de comentario';
$string['attachments'] = 'Anexos';
$string['blockafter'] = 'Limiar de comentarios para bloqueo';
$string['blockafter_help'] = 'Esta opción especifica o número máximo de comentarios que un usuario pode enviar nun período dado. Os usuarios con capacidade de mod/forum:postwithoutthrottling están exentos de comentar.';
$string['blockperiod'] = 'Período de tempo para bloqueo';
$string['blockperioddisabled'] = 'Non bloquear';
$string['blockperiod_help'] = 'Pode bloqueárselles aos usuarios que comenten máis dun determinado número de comentarios nun período dado. Os usuarios coa capacidade de mod/forum:postwithoutthrottling están exentos de límites de comentarios.';
$string['blogforum'] = 'Foro estándar presentado nun formato semellante ao dun blog';
$string['bynameondate'] = 'por {$a->name} - {$a->date}';
$string['cannotadd'] = 'Pode ser que non se engada a discusión a este foro';
$string['cannotadddiscussion'] = 'Engadir discusións a este foro require a pertenza ao grupo.';
$string['cannotadddiscussionall'] = 'Non ten permiso para engadir un novo tema de discusión para todos os participantes.';
$string['cannotaddsubscriber'] = 'Non poderá engadir un subscritor co id {$a} neste foro!';
$string['cannotaddteacherforumto'] = 'Non poderá engadir unha instancia convertida de foro de profesores á sección 0 do curso';
$string['cannotcreatediscussion'] = 'Non poderá crear unha nova discusión';
$string['cannotcreateinstanceforteacher'] = 'Non poderá crear unha instancia de módulo de novo curso no foro de profesores';
$string['cannotdeletepost'] = 'Non pode eliminar este comentario!';
$string['cannoteditposts'] = 'Non pode editar os comentarios doutras persoas!';
$string['cannotfinddiscussion'] = 'Non poderá atopar a discusión neste foro';
$string['cannotfindfirstpost'] = 'Non poderá atopar o primeiro comentario neste foro';
$string['cannotfindorcreateforum'] = 'Non poderá atopar nin crear un foro principal de novas para este sitio';
$string['cannotfindparentpost'] = 'Non poderá atopar o comentario pai superior de {$a}';
$string['cannotmovefromsingleforum'] = 'Non pode mover a discusión dun foro cunha única discusión simple';
$string['cannotmovenotvisible'] = 'Foro non visíbel';
$string['cannotmovetonotexist'] = 'Non se pode mover a ese foro - non existe!';
$string['cannotmovetonotfound'] = 'O foro de destino non se atopou neste curso.';
$string['cannotmovetosingleforum'] = 'Non pode mover a discusión a un foro cunha única discusión simple';
$string['cannotpurgecachedrss'] = 'Non poderá purgar as fontes RSS memorizadas da orixe e/ou foro de destino - comprobe os seus permisos sobre o ficheiro';
$string['cannotremovesubscriber'] = 'Non pode retirar o subscritor co id {$a} deste foro!';
$string['cannotreply'] = 'Non pode responder a este comentario';
$string['cannotsplit'] = 'Non se poden dividir as discusións deste foro';
$string['cannotsubscribe'] = 'Desculpe, debe ser membro do grupo para se subscribir.';
$string['cannottrack'] = 'Non poderá deter o seguimento dese foro';
$string['cannotunsubscribe'] = 'Non poderá cancelar a súa subscrición dese foro';
$string['cannotupdatepost'] = 'Non pode actualizar este comentario';
$string['cannotviewpostyet'] = 'Non pode ler aínda as preguntas doutros alumnos nesta discusión porque non comentou';
$string['cannotviewusersposts'] = 'Non hai comentarios feitos por este usuario que poida ver.';
$string['cleanreadtime'] = 'Marcar os comentarios antigos como lidos na hora';
$string['completiondiscussions'] = 'Os alumnos deben crear discusión:';
$string['completiondiscussionsgroup'] = 'Requírese discusións';
$string['completiondiscussionshelp'] = 'solicitando discusións para completar';
$string['completionposts'] = 'O alumno debe comentar discusións ou respostas:';
$string['completionpostsgroup'] = 'Require comentarios';
$string['completionpostshelp'] = 'solicitando discusións ou respostas para completar';
$string['completionreplies'] = 'O alumno debe comentar respostas:';
$string['completionrepliesgroup'] = 'Require respostas';
$string['completionreplieshelp'] = 'solicitando respostas para completar';
$string['configcleanreadtime'] = 'A hora do día para limpar comentarios antigos da táboa \'lidos';
$string['configdigestmailtime'] = 'Para a xente que escolle ter os correos recibidos en forma resumo, enviaráselle o resumo diario. Esta opción controla en que momento do día o resumo diario se lle enviará (o vindeiro cron que se execute despois desta hora, o enviará).';
$string['configdisplaymode'] = 'O modo predeterminado de presentación de discusión se non hai ningún estabelecido.';
$string['configenablerssfeeds'] = 'Esta alternativa activará a posibilidade de fontes RSS para todos os foros. Con todo, necesitará acender as fontes manualmente na configuración de cada foro.';
$string['configenabletimedposts'] = 'Estabelecer como \'si\' se quere permitir a opción de presentar períodos ao comentar un novo foro de discusión (Experimental e aínda non totalmente probado)';
$string['configlongpost'] = 'Calquera comentario desde tamaño (en caracteres sen incluír HTML) considérase longo. Os comentarios presentados na páxina principal do sitio, páxinas de presentación social do curso ou perfís de usuario, recúrtanse cunha quebra natural entre os valores que indican un comentario curto e un comentario longo.';
$string['configmanydiscussions'] = 'Máximo número de discusións que se amosarán por páxina de foro';
$string['configmaxattachments'] = 'Número máximo predeterminado de anexos permitidos por comentario.';
$string['configmaxbytes'] = 'Tamaño máximo predeterminado en todo anexo ao foro do sitio (suxeito aos límites do curso e outras opcións locais)';
$string['configoldpostdays'] = 'Número de días de antigüidade cos que un comentario se considera lido.';
$string['configreplytouser'] = 'Cando se envía un correo cun comentario do foro, debería conter o enderezo de correo do usuario de modo que os receptores poidan responder persoalmente antes que por vía do foro? Incluso de se estabelecer \'Si\' os usuarios poden escoller no seu perfil manter secreto o seu enderezo de correo.';
$string['configshortpost'] = 'Calquera comentario menor (en caracteres sen incluír HTML) considérase curto (vexa a seguir).';
$string['configtrackreadposts'] = 'Estabelecer como \'si\' de querer facer un seguimento sobre o lido/pendente de cada usuario.';
$string['configusermarksread'] = 'No caso de \'si\', o usuario debe de marcar manualmente un comentario como lido. No caso de \'non\', cando se visualice o comentario, marcarase como lido.';
$string['confirmsubscribe'] = 'Confirma que quere subscribirse ao foro \'{$a}\'?';
$string['confirmunsubscribe'] = 'Confirma que quere cancelar a subscrición ao foro \'{$a}\'?';
$string['couldnotadd'] = 'Poida que non se engada o seu comentario debido a erro descoñecido';
$string['couldnotdeletereplies'] = 'Non se pode eliminar porque xa hai xente que respondeu nel';
$string['couldnotupdate'] = 'Poida que non se actualice o seu comentario debido a erro descoñecido';
$string['delete'] = 'Eliminar';
$string['deleteddiscussion'] = 'O tema de discusión eliminouse';
$string['deletedpost'] = 'Eliminouse o comentario';
$string['deletedposts'] = 'Eses comentarios elimináronse';
$string['deletesure'] = 'Confirma que quere eliminar este comentario?';
$string['deletesureplural'] = 'Confirma que quere eliminar este comentario e todas as súas respostas? ({$a} comentarios)';
$string['digestmailheader'] = 'Este é o resumo diario de novos comentarios nos foros de {$a->sitename}. Se quere cambiar as preferencias de correo, vaia a {$a->userprefs}.';
$string['digestmailprefs'] = 'o seu perfil de usuario';
$string['digestmailsubject'] = '{$a}: resumo de foro';
$string['digestmailtime'] = 'Hora para enviar resumos por correo';
$string['digestsentusers'] = 'Enviáronse correctamente os resumos por correo a {$a} usuarios.';
$string['disallowsubscribe'] = 'Non están permitidas as subscricións';
$string['disallowsubscribeteacher'] = 'Non están permitidas as subscricións (agás para profesores)';
$string['discussion'] = 'Discusión';
$string['discussionmoved'] = 'Esta discusión moveuse a \'{$a}\'.';
$string['discussionmovedpost'] = 'Esta discusión moveuse <a href="{$a->discusshref}">aquí</a> no foro <a href="{$a->forumhref}">{$a->forumname}</a>';
$string['discussionname'] = 'Nome da discusión';
$string['discussions'] = 'Discusións';
$string['discussionsstartedby'] = 'Discusións comezadas por {$a}';
$string['discussionsstartedbyrecent'] = 'Discusións comezadas recentemente por {$a}';
$string['discussionsstartedbyuserincourse'] = 'Discusións comezadas por {$a->fullname} en {$a->coursename}';
$string['discussthistopic'] = 'Discutir este asunto';
$string['displayend'] = 'Amosar remate';
$string['displayend_help'] = 'Esta opción especifica se un comentario do foro debería agocharse despois dunha certa data. Note que os administradores poden sempre ver os comentarios do foro.';
$string['displaymode'] = 'Modo de presentación';
$string['displayperiod'] = 'Período de presentación';
$string['displaystart'] = 'Comezar a presentación';
$string['displaystart_help'] = 'Esta opción especifica se un comentario do foro debería presentarse desde unha certa data. Note que os administradores poden sempre ver os comentarios do foro.';
$string['eachuserforum'] = 'Cada persoa comenta unha discusión';
$string['edit'] = 'Editar';
$string['editedby'] = 'Editado por {$a->name} - envío orixinal {$a->date}';
$string['editedpostupdated'] = 'actualizáronse os comentarios de {$a}';
$string['editing'] = 'Edición';
$string['emptymessage'] = 'Algo vai mal no seu comentario. Se cadra deixouno en branco, ou o anexo era demasiado grande. Os seus cambios NON se gardaron.';
$string['erroremptymessage'] = 'A mensaxe do comentario non debe quedar baleira.';
$string['erroremptysubject'] = 'O asunto do comentario non debe quedar baleiro.';
$string['errorenrolmentrequired'] = 'Debe estar matriculado neste curso para acceder a este contido';
$string['errorwhiledelete'] = 'Produciuse un erro ao eliminar o rexistro.';
$string['everyonecanchoose'] = 'Todo o mundo pode escoller subscribirse';
$string['everyonecannowchoose'] = 'Todo o mundo pode agora escoller subscribirse';
$string['everyoneisnowsubscribed'] = 'Todo o mundo está agora subscrito a este foro';
$string['everyoneissubscribed'] = 'Todo o mundo está subscrito a este foro';
$string['existingsubscribers'] = 'Subscritores existentes';
$string['exportdiscussion'] = 'Exportar a discusión enteira';
$string['forcessubscribe'] = 'Este foro obriga a todos a estaren subscritos';
$string['forum'] = 'Foro';
$string['forum:addinstance'] = 'Engadir un novo foro';
$string['forum:addnews'] = 'Engadir novas';
$string['forum:addquestion'] = 'Engadir pregunta';
$string['forumauthorhidden'] = 'Autor (agochado)';
$string['forumblockingalmosttoomanyposts'] = 'Está chegando ao limiar de comentarios. Comentou {$a->numposts} veces en {$a->blockperiod} e o límite é de {$a->blockafter} comentarios.';
$string['forumbodyhidden'] = 'Non pode ver esta mensaxe, probablemente porque aínda non enviou mensaxes sobre o tema.';
$string['forum:createattachment'] = 'Crear anexos';
$string['forum:deleteanypost'] = 'Eliminar calquera comentario (de calquera momento)';
$string['forum:deleteownpost'] = 'Eliminar os comentarios propios (dentro do límite temporal)';
$string['forum:editanypost'] = 'Editar calquera comentario';
$string['forum:exportdiscussion'] = 'Exportar a discusión enteira';
$string['forum:exportownpost'] = 'Exportar o propio comentario';
$string['forum:exportpost'] = 'Exportar o comentario';
$string['forumintro'] = 'Descrición';
$string['forum:managesubscriptions'] = 'Xestionar subscricións';
$string['forum:movediscussions'] = 'Mover discusións';
$string['forumname'] = 'Nome do foro';
$string['forumposts'] = 'Comentarios do foro';
$string['forum:postwithoutthrottling'] = 'Eximir do limiar de comentarios';
$string['forum:rate'] = 'Ponderar comentarios';
$string['forum:replynews'] = 'Responder as novas';
$string['forum:replypost'] = 'Responder os comentarios';
$string['forums'] = 'Foros';
$string['forum:splitdiscussions'] = 'Dividir discusións';
$string['forum:startdiscussion'] = 'Comezar novas discusións';
$string['forumsubjecthidden'] = 'Asunto (agochado)';
$string['forumtracked'] = 'Seguimento de comentarios non lidos';
$string['forumtrackednot'] = 'Os comentarios non lidos non están sendo seguidos';
$string['forumtype'] = 'Tipo de foro';
$string['forumtype_help'] = '<P ALIGN=CENTER><B>Tipos de Foros</B></P>

<P>Hai varios tipos diferentes de foros, entre eles:<P><B>Un debate sinxelo.</B>
É simplemente un intercambio de ideas sobre un só tema, todo nunha páxina. Útil para debates curtos e moi concretos.<P><B>O foro Normal, para uso
xeral.</B>  É un foro aberto no que calquera pode comezar un novo tema de debate
cando queira. Este é o foro máis axeitado
para uso xeral.<P><B>Cada persoa inicia un debate.</B> Cada persoa pode formular un
novo tema
de debate (e todos/as poden responder). Esta modalidade é útil cando vostede
quere
que cada alumno comece, por exemplo, unha discusión sobre as súas reflexións sobre
o tema da semana, e que todos os demais lle respondan.';
$string['forum:viewallratings'] = 'Ver todas as puntuacións en bruto dadas por individuos';
$string['forum:viewanyrating'] = 'Ver as puntuacións totais que reciba calquera';
$string['forum:viewdiscussion'] = 'Ver discusións';
$string['forum:viewhiddentimedposts'] = 'Ver os comentarios con hora agochada';
$string['forum:viewqandawithoutposting'] = 'Ver sempre os comentarios Q e A';
$string['forum:viewrating'] = 'Ver a ponderación total que vostede reciba';
$string['forum:viewsubscribers'] = 'Ver subscritores';
$string['generalforum'] = 'Foro estándar para uso xeral';
$string['generalforums'] = 'Foros xerais';
$string['inforum'] = 'en {$a}';
$string['introblog'] = 'Os comentarios neste foro copiáronse aquí automaticamente de blogs de usuarios neste curso porque eses artigos de blog xa non están dispoñíbeis';
$string['intronews'] = 'Novas xerais e anuncios';
$string['introsocial'] = 'Un foro aberto para conversar sobre todo o que queira';
$string['introteacher'] = 'Un foro para notas e discusión só de profesores';
$string['invalidaccess'] = 'Non se accedeu correctamente a esta páxina';
$string['invaliddiscussionid'] = 'O ID de discusión era incorrecto ou xa non existe';
$string['invalidforcesubscribe'] = 'Modo de subscrición forzada incorrecto';
$string['invalidforumid'] = 'O ID do foro era incorrecto';
$string['invalidparentpostid'] = 'O ID do comentario pai era incorrecto';
$string['invalidpostid'] = 'ID do comentario incorrecto - {$a}';
$string['lastpost'] = 'Último comentario';
$string['learningforums'] = 'Aprendendo cos foros';
$string['longpost'] = 'Comentario longo';
$string['mailnow'] = 'Enviar correo agora';
$string['manydiscussions'] = 'Discusións por páxina';
$string['markalldread'] = 'Marcar todos os comentarios desta discusión como lidos.';
$string['markallread'] = 'Marcar todos os correos neste foro como lidos.';
$string['markread'] = 'Marcar como lido';
$string['markreadbutton'] = 'Marcar<br />lido';
$string['markunread'] = 'Marcar como non lido';
$string['markunreadbutton'] = 'Marcar<br />non lido';
$string['maxattachments'] = 'Número máximo de anexos:';
$string['maxattachments_help'] = 'Esta configuración especifica o número máximo de ficheiros que poden ser anexados a un comentario de foro.';
$string['maxattachmentsize'] = 'Tamaño máximo do anexo';
$string['maxattachmentsize_help'] = 'Esta configuración especifica o tamaño máis grande de ficheiro que pode ser anexado a un comentario de foro.';
$string['maxtimehaspassed'] = 'O tempo máximo para editar este comentario ({$a}) xa expirou!';
$string['message'] = 'Mensaxe';
$string['messageprovider:digests'] = 'Resumos de foros subscritos';
$string['messageprovider:posts'] = 'Comentarios de foros subscritos';
$string['missingsearchterms'] = 'Os seguintes termos de busca danse soamente no marcado HTML desta mensaxe:';
$string['modeflatnewestfirst'] = 'Presentar respostas simples, coas novas primeiro';
$string['modeflatoldestfirst'] = 'Presentar respostas simples, coas antigas primeiro';
$string['modenested'] = 'Presentar respostas de forma aniñada';
$string['modethreaded'] = 'Presentar respostas de forma arbórea';
$string['modulename'] = 'Foro';
$string['modulename_help'] = 'O módulo de actividade do foro actívalles aos participantes a posibilidade de teren discusións asíncronas p. ex. discusións que teñen lugar nun un período estendido de tempo.

Hai varios tipos de foro para escoller, como un foro estándar onde calquera pode comezar unha discusión nova en calquera momento; un foro onde cada alumno pode comentar exactamente unha discusión; ou un foro de pregunta e resposta onde os alumnos teñen primeiro que facer un comentario antes de seren quen de veren os correos doutros alumnos. Un profesor pode permitir anexar ficheiros a comentarios do foro. As imaxes anexas preséntanse no comentario do foro.

Os participantes poden subscribirse a un foro para recibir notificacións de novos comentarios no foro. Un profesor pode estabelecer o modo de subscrición como opcional, forzado ou automático ou prohibir a subscrición completamente. Se for requirido, aos alumnos pode bloqueárselles comentar máis dun determinado número de comentarios nun período de tempo dado; isto pode evitar que determinados individuos dominen as discusións.

Os comentarios de foro poden ser ponderados por profesores ou alumnos (avaliación por pares). Os índices poden ser engadidos acadar un grao final que se recolle no libro de cualificacións ou «gradebook».

Os foros teñen moitos usos, como

* Un espazo social para alumnos para saber os uns dos outros
* Para anuncios de curso (utilizando un foro de novas con subscrición forzada)
* Para discutir contido de curso ou materiais de lectura
* Para continuar en liña un asunto xurdido anteriormente nunha sesión presencial
* Para discusión de só profesores (utilizando un foro agochado)
* Un centro de axuda onde titores e alumnos poden dar consello
* Un área de apoio directo personalizada para comunicacións privadas entre profesores e alumnos (utilizando un foro con grupos separados e cun alumno por grupo)
* Para actividades de extensión, por exemplo «xogos mentais» para ponderación de estudantes e suxestión de solucións';
$string['modulename_link'] = 'mod/forum/view';
$string['modulenameplural'] = 'Foros';
$string['more'] = 'máis';
$string['movedmarker'] = '(Movido)';
$string['movethisdiscussionto'] = 'Mover esta discusión a ...';
$string['mustprovidediscussionorpost'] = 'Debe fornecer ben un id de discusión ou un id de comentario para exportar';
$string['namenews'] = 'Foro de novas';
$string['namenews_help'] = 'O foro de novas é un foro especial para anuncios que se crea automaticamente ao tempo que un curso. Un curso pode ter soamente un foro de novas. Soamente os profesores e os administradores poden comentar no foro de novas. O bloque "Últimas novas" presentará as discusións recentes desde o foro de novas.';
$string['namesocial'] = 'Foro social';
$string['nameteacher'] = 'Foro de profesor';
$string['newforumposts'] = 'Novos comentarios do foro';
$string['noattachments'] = 'Non hai anexos a este foro';
$string['nodiscussions'] = 'Non hai temas de discusión aínda neste foro';
$string['nodiscussionsstartedby'] = '{$a} non comezou ningunha discusión';
$string['nodiscussionsstartedbyyou'] = 'Vostede aínda non comezou ningunha discusión';
$string['noguestpost'] = 'Desculpe, aos convidados non se lles permite comentar.';
$string['noguesttracking'] = 'Desculpe, aos convidados non se lles permiten opcións de seguimento.';
$string['nomorepostscontaining'] = 'Non se atoparon máis comentarios con \'{$a}';
$string['nonews'] = 'Ningunha nova foi aínda comentada';
$string['noonecansubscribenow'] = 'As subscricións agora xa non están permitidas';
$string['nopermissiontosubscribe'] = 'Non ten permiso para ver subscritores de foro';
$string['nopermissiontoview'] = 'Non ten permisos para ver este comentario';
$string['nopostforum'] = 'Desculpe, non lle está permitido comentar neste foro';
$string['noposts'] = 'Sen comentarios';
$string['nopostsmadebyuser'] = '{$a} non fixo ningún comentario';
$string['nopostsmadebyyou'] = 'Vostede non fixo ningún comentario';
$string['noquestions'] = 'Non hai temas de discusión aínda neste foro';
$string['nosubscribers'] = 'Non hai subscritores aínda neste foro';
$string['notexists'] = 'A discusión xa non existe';
$string['nothingnew'] = 'Nada novo de {$a}';
$string['notingroup'] = 'Necesita ser parte dun grupo para ver este foro.';
$string['notinstalled'] = 'O módulo de foro non está instalado';
$string['notpartofdiscussion'] = 'Este comentario non forma parte dunha discusión!';
$string['notrackforum'] = 'Non facer seguimento de comentarios non lidos';
$string['noviewdiscussionspermission'] = 'Non ten permiso para ver discusións neste foro';
$string['nowallsubscribed'] = 'Todos os foros en {$a} están subscritos.';
$string['nowallunsubscribed'] = 'Todos os foros en {$a} non están subscritos.';
$string['nownotsubscribed'] = '{$a->name}  NON será notificado de novos comentarios en \'{$a->forum}';
$string['nownottracking'] = '{$a->name} xa non está seguindo \'{$a->forum}\'.';
$string['nowsubscribed'] = '{$a->name} será notificado de novos comentarios en \'{$a->forum}';
$string['nowtracking'] = '{$a->name} está agora seguindo \'{$a->forum}\'.';
$string['numposts'] = '{$a} comentarios';
$string['olderdiscussions'] = 'Discusións antigas';
$string['oldertopics'] = 'Temas máis antigos';
$string['oldpostdays'] = 'Lido despois de días';
$string['openmode0'] = 'Ningunha discusión, ningunha resposta';
$string['openmode1'] = 'Ningunha discusión pero permítense respostas';
$string['openmode2'] = 'Permítense discusións e respostas';
$string['overviewnumpostssince'] = '{$a} comentarios desde o último acceso';
$string['overviewnumunread'] = '{$a} total non lido';
$string['page-mod-forum-discuss'] = 'Páxina arbórea de discusión do módulo foro';
$string['page-mod-forum-view'] = 'Páxina principal do módulo foro';
$string['page-mod-forum-x'] = 'Calquera páxina do módulo foro';
$string['parent'] = 'Amosar pai';
$string['parentofthispost'] = 'Pai deste comentario';
$string['pluginadministration'] = 'Administración do foro';
$string['pluginname'] = 'Foro';
$string['postadded'] = '<p>O seu comentario engadiuse correctamente.</p> <p>Ten {$a} para editalo se quere facer calquera cambio.</p>';
$string['postaddedsuccess'] = 'O seu ficheiro engadiuse correctamente.';
$string['postaddedtimeleft'] = 'Ten {$a} para editalo se quere facer calquera cambio.';
$string['postincontext'] = 'Ver este comentario en contexto';
$string['postmailinfo'] = 'Isto é unha copia dunha mensaxe comentada no sitio web {$a}.

Para responder, faga clic nesta ligazón:';
$string['postmailnow'] = '<p>Este comentario enviarase por correo inmediatamente a todos os subscritores do foro.</p>';
$string['postrating1'] = 'Maioritariamente sabendo separado';
$string['postrating2'] = 'Separado e conectado';
$string['postrating3'] = 'Maioritariamente sabendo conectado';
$string['posts'] = 'Comentarios';
$string['postsmadebyuser'] = 'Comentarios feitos por {$a}';
$string['postsmadebyuserincourse'] = 'Comentarios feitos por {$a->fullname} en {$a->coursename}';
$string['posttoforum'] = 'Comentar no foro';
$string['postupdated'] = 'Actualizouse o seu comentario';
$string['potentialsubscribers'] = 'Subscritores potenciais';
$string['processingdigest'] = 'Procesando o resumo de correo para o usuario {$a}';
$string['processingpost'] = 'Procesando o comentario {$a}';
$string['prune'] = 'Dividir';
$string['prunedpost'] = 'Creouse unha nova discusión dese comentario';
$string['pruneheading'] = 'Dividir a discusión e mover este comentario a unha nova discusión';
$string['qandaforum'] = 'Foro Q e A';
$string['qandanotify'] = 'Este é un foro de pregunta e resposta. Para ver outras respostas a estas cuestións, primeiro debe enviar a súa resposta';
$string['re'] = 'Re:';
$string['readtherest'] = 'Ler o resto deste tema';
$string['replies'] = 'Respostas';
$string['repliesmany'] = '{$a} respostas ata agora';
$string['repliesone'] = '{$a} resposta ata agora';
$string['reply'] = 'Responder';
$string['replyforum'] = 'Responder no foro';
$string['replytouser'] = 'Use o enderezo de correo na resposta';
$string['resetforums'] = 'Eliminar comentarios de';
$string['resetforumsall'] = 'Eliminar todos os comentarios';
$string['resetsubscriptions'] = 'Eliminar todas as subscrición ao foro';
$string['resettrackprefs'] = 'Eliminar todas as preferencias de seguimento';
$string['rssarticles'] = 'Número de artigos recentes en RSS';
$string['rssarticles_help'] = 'Esta configuración especifica o número de artigos (sexan discusións ou comentarios) que se van incluír na fonte RSS. Entre 5 e 20 é aceptábel.';
$string['rsssubscriberssdiscussions'] = 'Fonte RSS de discusións';
$string['rsssubscriberssposts'] = 'Fonte RSS de comentarios';
$string['rsstype'] = 'Fonte RSS desta actividade';
$string['rsstype_help'] = 'Para activar a fonte RSS desta actividade, seleccione tanto discusións como comentarios que se van incluír na fonte.';
$string['search'] = 'Buscar';
$string['searchdatefrom'] = 'Os comentarios deben ser máis novos que este';
$string['searchdateto'] = 'Os comentarios deben ser máis antigos que este';
$string['searchforumintro'] = 'Introduza termos nun ou máis dos seguintes campos:';
$string['searchforums'] = 'Buscar nos foros';
$string['searchfullwords'] = 'Estas palabras deberían aparecer como palabras completas';
$string['searchnotwords'] = 'Estas palabras NON se deberían incluír';
$string['searcholderposts'] = 'Buscar comentarios antigos...';
$string['searchphrase'] = 'Esta frase exacta debe aparecer no comentario';
$string['searchresults'] = 'Buscar resultados';
$string['searchsubject'] = 'Estas palabras deberían estar no asunto';
$string['searchuser'] = 'Este nome debería coincidir co autor';
$string['searchuserid'] = 'O ID para Moodle do autor';
$string['searchwhichforums'] = 'Escoller foros nos que buscar';
$string['searchwords'] = 'Estas palabras poden aparecer en nalgures dentro do comentario';
$string['seeallposts'] = 'Ver todos os comentarios feitos por este usuario';
$string['shortpost'] = 'Comentario curto';
$string['showsubscribers'] = 'Amosar/editar os subscritores actuais';
$string['singleforum'] = 'Unha discusión simple única';
$string['smallmessage'] = '{$a->user} comentado en {$a->forumname}';
$string['startedby'] = 'Comezado por';
$string['subject'] = 'Tema';
$string['subscribe'] = 'Subscribirse a este foro';
$string['subscribeall'] = 'Subscribir a todo o mundo a este foro';
$string['subscribed'] = 'Subscrito';
$string['subscribeenrolledonly'] = 'Soamente os usuarios matriculados poden subscribirse ás notificacións de comentarios no foro';
$string['subscribenone'] = 'Cancelar a subscrición de todo o mundo a este foro';
$string['subscribers'] = 'Subscritores';
$string['subscribersto'] = 'Subscritores de \'{$a}';
$string['subscribestart'] = 'Enviarme copias por correo dos comentarios neste foro';
$string['subscribestop'] = 'Non quero enviar copias por correo dos comentarios neste foro';
$string['subscription'] = 'Subscrición';
$string['subscriptionauto'] = 'Autosubscrición';
$string['subscriptiondisabled'] = 'Subscrición desactivada';
$string['subscriptionforced'] = 'Subscrición forzada';
$string['subscription_help'] = 'De ser subscrito a un foro significa que recibirá copias por correo electrónico dos comentarios do foro. Normalmente pode escoller se desexa ser subscrito, aínda así ás veces a subscrición é forzada de modo que todo o mundo recibe copias por correo electrónico dos correos do foro.';
$string['subscriptionmode'] = 'Modo de subscrición';
$string['subscriptionmode_help'] = 'Cando un participante está subscrito a un foro significa que recibirán copias por correo electrónico dos correos do foro.

Hai 4 opcións de modo de subscrición:

* Subscrición opcional - Os participantes poden escoller cando se subscriben
* Subscrición forzada - Todo o mundo está subscrito e non pode cancelar a subscrición
* Subscrición automática - Todo o mundo está subscrito inicialmente mais pode escoller cancelar a subscrición en calquera momento
* Subscrición desactivada - Non se permiten as subscricións';
$string['subscriptionoptional'] = 'Subscrición opcional';
$string['subscriptions'] = 'Subscricións';
$string['thisforumisthrottled'] = 'Este foro ten un límite respecto do número de comentarios que pode facer nun período de tempo dado - isto estabelécese actualmente en {$a->blockafter} comentario(s) en {$a->blockperiod}';
$string['timedposts'] = 'Comentarios con tempo límite';
$string['timestartenderror'] = 'Presentar que a data de remate non pode ser anterior que a data de comezo';
$string['trackforum'] = 'Seguir comentarios non lidos';
$string['tracking'] = 'Seguir';
$string['trackingoff'] = 'Apagado';
$string['trackingon'] = 'Acendido';
$string['trackingoptional'] = 'Opcional';
$string['trackingtype'] = 'Ler o seguimento deste foro?';
$string['trackingtype_help'] = 'Se habilitado, os participantes poden seguir as mensaxes lidas e as non lidas no foro e nas discusións.

Hai tres opcións:

* Opcional - Os participantes poden escoller entre facer seguimento ou non
* Acendido - O seguimento está sempre acendido
* Apagado - O seguimento está sempre apagado';
$string['unread'] = 'Non lidos';
$string['unreadposts'] = 'Comentarios non lidos';
$string['unreadpostsnumber'] = '{$a} comentarios non lidos';
$string['unreadpostsone'] = '1 comentario non lido';
$string['unsubscribe'] = 'Cancelar a subscrición a este foro';
$string['unsubscribeall'] = 'Cancelar a subscrición a todos os foros';
$string['unsubscribeallconfirm'] = 'Agora está subscrito aos foros {$a}. Confirma que quere cancelar a subscrición de todos os foros e desactivar a subscrición automática ao foro?';
$string['unsubscribealldone'] = 'Retiráronse todas as subscricións de foro opcionais. Aínda recibirá notificacións de foros con subscrición forzada. Para xestionar as notificacións de foro vaia a Mensaxaría na Configuración do meu perfil.';
$string['unsubscribeallempty'] = 'Non está subscrito a ningún foro. Para desactivar todas as notificación deste servidor vaia a Mensaxaría na Configuración do meu perfil';
$string['unsubscribed'] = 'Subscrición cancelada';
$string['unsubscribeshort'] = 'Cancelar a subscrición';
$string['usermarksread'] = 'Marcado manual de mensaxe lida';
$string['viewalldiscussions'] = 'Ver todas as discusións';
$string['warnafter'] = 'Limiar de comentarios para aviso';
$string['warnafter_help'] = 'Os alumnos poden ser advertidos cando se aproximen ao número máximo de comentarios permitidos nun período dado. Esta opción especifica tras cantos comentarios serán advertidos. Os usuarios coa capacidade mod/forum:postwithoutthrottling están exentos de límites de comentario.';
$string['warnformorepost'] = 'Atención! Hai máis dunha discusión neste foro - usando a máis recente';
$string['yournewquestion'] = 'A súa nova pregunta';
$string['yournewtopic'] = 'O seu novo tema de discusión';
$string['yourreply'] = 'A súa resposta';
