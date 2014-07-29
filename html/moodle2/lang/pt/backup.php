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
 * Strings for component 'backup', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   backup
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['autoactivedescription'] = 'Indique se pretende realizar cópias de segurança automáticas. Se escolher "Manual", apenas será possível realizar cópias de segurança automáticas através de script CLI. Isto pode ser feito manualmente na linha de comandos ou via cron.';
$string['autoactivedisabled'] = 'Desativado';
$string['autoactiveenabled'] = 'Ativado';
$string['autoactivemanual'] = 'Manual';
$string['automatedbackupschedule'] = 'Agendamento';
$string['automatedbackupschedulehelp'] = 'Escolha os dias da semana em que serão feitas as cópias de segurança automáticas.';
$string['automatedbackupsinactive'] = 'As cópias de segurança automáticas não foram ativadas pelo administrador do site';
$string['automatedbackupstatus'] = 'Estado das cópias de segurança automáticas';
$string['automatedsettings'] = 'Configurações das cópias de segurança automáticas';
$string['automatedsetup'] = 'Configuração das cópias de segurança automáticas';
$string['automatedstorage'] = 'Armazenamento das cópias de segurança automáticas';
$string['automatedstoragehelp'] = 'Escolha a localização dos ficheiros das cópias de segurança automáticas';
$string['backupactivity'] = 'Cópia de segurança da atividade: {$a}';
$string['backupcourse'] = 'Cópia de segurança da disciplina: {$a}';
$string['backupcoursedetails'] = 'Detalhes da disciplina';
$string['backupcoursesection'] = 'Secção: {$a}';
$string['backupcoursesections'] = 'Secções da disciplina';
$string['backupdate'] = 'Data da realização';
$string['backupdetails'] = 'Detalhes da cópia de segurança';
$string['backupdetailsnonstandardinfo'] = 'O ficheiro selecionado não é um ficheiro de cópia de segurança standard Moodle. O processo de restauração vai tentar converter o ficheiro no formato padrão e, em seguida, restaurá-lo.';
$string['backupformat'] = 'Formato';
$string['backupformatimscc1'] = 'IMS Common Cartridge 1.0';
$string['backupformatimscc11'] = 'IMS Common Cartridge 1.1';
$string['backupformatmoodle1'] = 'Moodle 1';
$string['backupformatmoodle2'] = 'Moodle 2';
$string['backupformatunknown'] = 'Formato desconhecido';
$string['backuplog'] = 'Informação técnica e avisos';
$string['backupmode'] = 'Modo';
$string['backupmode10'] = 'Geral';
$string['backupmode20'] = 'Importar';
$string['backupmode30'] = 'Hub';
$string['backupmode40'] = 'Mesmo site';
$string['backupmode50'] = 'Automatizado';
$string['backupmode60'] = 'Convertido';
$string['backupsection'] = 'Secção da disciplina da cópia de segurança: {$a}';
$string['backupsettings'] = 'Configurações da cópia de segurança';
$string['backupsitedetails'] = 'Detalhes do site';
$string['backupstage16action'] = 'Continuar';
$string['backupstage1action'] = 'Seguinte';
$string['backupstage2action'] = 'Seguinte';
$string['backupstage4action'] = 'Processar';
$string['backupstage8action'] = 'Continuar';
$string['backuptype'] = 'Tipo';
$string['backuptypeactivity'] = 'Atividade';
$string['backuptypecourse'] = 'Disciplina';
$string['backuptypesection'] = 'Tópico';
$string['backupversion'] = 'Versão da cópia de segurança';
$string['cannotfindassignablerole'] = 'O papel {$a} no ficheiro da cópia de segurança não pode ser mapeado para nenhum dos papéis para os quais tem permissões para atribuir.';
$string['choosefilefromactivitybackup'] = 'Atividade da área das cópias de segurança';
$string['choosefilefromactivitybackup_help'] = 'Quando a cópia de segurança das atividades utilizar valores predefinidos os ficheiros serão guardados neste local';
$string['choosefilefromautomatedbackup'] = 'Cópias de segurança automáticas';
$string['choosefilefromautomatedbackup_help'] = 'Contém cópias de segurança realizadas automaticamente';
$string['choosefilefromcoursebackup'] = 'Área das cópias de segurança';
$string['choosefilefromcoursebackup_help'] = 'Quando a cópia de segurança das disciplinas utilizar valores pré-definidos os ficheiros serão guardados neste local';
$string['choosefilefromuserbackup'] = 'Área privada de cópias de segurança do utilizador';
$string['choosefilefromuserbackup_help'] = 'Quando a cópia de segurança das disciplinas for feita com a opção "Tornar informação dos utilizadores anónima" selecionada os ficheiros serão guardados neste local';
$string['configgeneralactivities'] = 'Se ativar esta opção as atividades serão incluídas nas cópias de segurança.';
$string['configgeneralanonymize'] = 'Se ativar esta opção toda a informação dos utilizadores será tornada anónima.';
$string['configgeneralbadges'] = 'Define a configuração predefinida para a inclusão de Medalhas numa cópia de segurança.';
$string['configgeneralblocks'] = 'Se ativar esta opção os blocos serão incluídos nas cópias de segurança.';
$string['configgeneralcomments'] = 'Se ativar esta opção os comentários serão incluídos nas cópias de segurança.';
$string['configgeneralfilters'] = 'Se ativar esta opção os filtros serão incluídos nas cópias de segurança';
$string['configgeneralhistories'] = 'Se ativar esta opção o histórico dos utilizadores será incluído nas cópias de segurança.';
$string['configgenerallogs'] = 'Se ativar esta opção os registos de atividade (logs) serão incluídos nas cópias de segurança.';
$string['configgeneralquestionbank'] = 'Se ativar esta opção, a base de dados de perguntas será incluída nas cópias de segurança por predefinição. ATENÇÃO: desativar esta configuração irá desativar a cópia de segurança das atividades que usam a base de dados de perguntas, como p. ex. o Teste.';
$string['configgeneralroleassignments'] = 'Se ativar esta opção as atribuições de papéis serão incluídas nas cópias de segurança.';
$string['configgeneralusers'] = 'Se ativar esta opção a informação dos utilizadores será incluída nas cópias de segurança.';
$string['configgeneraluserscompletion'] = 'Se ativar esta opção a informação sobre a conclusão da disciplina pelos utilizadores será incluída nas cópias de segurança.';
$string['configloglifetime'] = 'Período de tempo em que quer manter as informações sobre as cópias de segurança. Os registos mais antigos do que o definido são automaticamente apagados. Recomenda-se manter este valor baixo, pois as informações registadas relativas às cópias podem ser enormes.';
$string['confirmcancel'] = 'Cancelar cópia de segurança';
$string['confirmcancelno'] = 'Ficar';
$string['confirmcancelquestion'] = 'Tem a certeza de que quer cancelar?
Toda a informação que tiver inserido será perdida.';
$string['confirmcancelyes'] = 'Cancelar';
$string['confirmnewcoursecontinue'] = 'Novo aviso da disciplina';
$string['confirmnewcoursecontinuequestion'] = 'Uma disciplina temporária (oculta) será criada no processo de restauração. Para cancelar a restauração clique em Cancelar. Não feche o navegador durante a restauração.';
$string['coursecategory'] = 'Categoria para a qual a disciplina será restaurada';
$string['courseid'] = 'ID original';
$string['coursesettings'] = 'Configurações da disciplina';
$string['coursetitle'] = 'Título';
$string['currentstage1'] = 'Configuração inicial';
$string['currentstage16'] = 'Conclusão';
$string['currentstage2'] = 'Configuração da estrutura';
$string['currentstage4'] = 'Revisão';
$string['currentstage8'] = 'Processamento';
$string['enterasearch'] = 'Insira uma pesquisa';
$string['error_block_for_module_not_found'] = 'Foi encontrada uma instância para bloco (id: {$a->bid}) para a disciplina (id: {$a->mid}). Este bloco não pode ser incluído.';
$string['error_course_module_not_found'] = 'Foi encontrada a disciplina órfã (id: {$a}). Esta não pode ser guardada na cópia de segurança.';
$string['errorfilenamemustbezip'] = 'O ficheiro inserido tem que ser do tipo ZIP com a extensão .mbz';
$string['errorfilenamerequired'] = 'Tem que inserir um nome de ficheiro válido para esta cópia de segurança';
$string['errorinvalidformat'] = 'O formato da cópia de segurança é desconhecido.';
$string['errorinvalidformatinfo'] = 'O ficheiro selecionado não é um ficheiro de cópia de segurança Moodle válido e não pode ser restaurado.';
$string['errorminbackup20version'] = 'Esta cópia de segurança foi criada com uma versão de desenvolvimento do Moodle ({$a->backup}). A versão mínima necessária é {$a->min}. O restauro não pode continuar.';
$string['errorrestorefrontpage'] = 'O restauro sobre a página inicial não é permitido.';
$string['errortgznozlib'] = 'O ficheiro selecionado está no novo formato de cópia de segurança e não pode ser restaurado porque a extensão zlib PHP não está disponível neste sistema.';
$string['executionsuccess'] = 'O ficheiro da cópia de segurança foi criado com sucesso.';
$string['filealiasesrestorefailures'] = 'Não conseguiu restaurar os atalhos';
$string['filealiasesrestorefailures_help'] = 'Atalhos são ligações a outros ficheiros, incluindo os que se encontram em repositórios externos. Em alguns casos, o Moodle não consegue restaurá-los, por exemplo quando faz o restauro a partir de outro site ou quando os ficheiros ligados não existem.';
$string['filealiasesrestorefailuresinfo'] = 'Alguns atalhos incluídos no ficheiro da cópia de segurança não podem ser restaurados. A lista seguinte contem a sua localização prevista e o ficheiro de origem que é referido no site original.';
$string['filealiasesrestorefailures_link'] = 'restore/filealiases';
$string['filename'] = 'Nome do ficheiro';
$string['filereferencesincluded'] = 'As referências nos ficheiros para conteúdos externos incluídos no pacote da cópia de segurança, podem não funcionar em outros sites.';
$string['filereferencesnotsamesite'] = 'A cópia é de outro site, as referências a ficheiros não podem ser restauradas';
$string['filereferencessamesite'] = 'A cópia é do mesmo site, as referências a ficheiros podem ser restauradas';
$string['generalactivities'] = 'Incluir atividades';
$string['generalanonymize'] = 'Tornar a informação anónima';
$string['generalbackdefaults'] = 'Configuração das cópias de segurança';
$string['generalbadges'] = 'Incluir Medalhas';
$string['generalblocks'] = 'Incluir blocos';
$string['generalcomments'] = 'Incluir comentários';
$string['generalfilters'] = 'Incluir filtros';
$string['generalgradehistories'] = 'Incluir históricos';
$string['generalhistories'] = 'Incluir históricos';
$string['generallogs'] = 'Incluir registos de atividade';
$string['generalquestionbank'] = 'Incluir base de dados de perguntas';
$string['generalroleassignments'] = 'Incluir atribuições de papéis';
$string['generalsettings'] = 'Configurações gerais da cópia de segurança';
$string['generalusers'] = 'Incluir utilizadores';
$string['generaluserscompletion'] = 'Incluir informação de conclusão dos utilizadores';
$string['hidetypes'] = 'Ocultar opções de tipo';
$string['importbackupstage16action'] = 'Continuar';
$string['importbackupstage1action'] = 'Seguinte';
$string['importbackupstage2action'] = 'Seguinte';
$string['importbackupstage4action'] = 'Realizar importação';
$string['importbackupstage8action'] = 'Continuar';
$string['importcurrentstage0'] = 'Escolha de disciplinas';
$string['importcurrentstage1'] = 'Configuração inicial';
$string['importcurrentstage16'] = 'Conclusão';
$string['importcurrentstage2'] = 'Configuração da estrutura';
$string['importcurrentstage4'] = 'Revisão';
$string['importcurrentstage8'] = 'Realizar importação';
$string['importfile'] = 'Importar um ficheiro de cópia de segurança';
$string['importgeneralmaxresults'] = 'Número máximo de disciplinas listadas para importação';
$string['importgeneralmaxresults_desc'] = 'Isto controla o número de disciplinas que são listadas durante o primeiro passo do processo de importação';
$string['importgeneralsettings'] = 'Configurações de importação predefinidas';
$string['importsuccess'] = 'A importação foi concluída. Clique para prosseguir para a disciplina.';
$string['includeactivities'] = 'Incluir:';
$string['includeditems'] = 'Itens incluídos:';
$string['includefilereferences'] = 'Referências a conteúdos externos';
$string['includesection'] = 'Secção {$a}';
$string['includeuserinfo'] = 'Informação do utilizador';
$string['locked'] = 'Bloqueado(a)';
$string['lockedbyconfig'] = 'Este parâmetro foi bloqueado por predefinição na configuração da cópia de segurança';
$string['lockedbyhierarchy'] = 'Bloqueado pelas dependências';
$string['lockedbypermission'] = 'Não tem permissões para mudar este parâmetro';
$string['loglifetime'] = 'Manter registos de atividade (logs) durante';
$string['managefiles'] = 'Gerir ficheiros de cópias de segurança';
$string['missingfilesinpool'] = 'Não foi possível guardar alguns ficheiros durantre a cópia de segurança. Não será possível restaurá-los.';
$string['module'] = 'Módulo';
$string['moodleversion'] = 'Versão do Moodle';
$string['morecoursesearchresults'] = 'Foram encontradas mais do que {$a} disciplinas, a exibir os primeiros {$a} resultados';
$string['moreresults'] = 'Existem demasiados resultados, proceda a uma pesquisa mais específica';
$string['nomatchingcourses'] = 'Não existem disciplina para mostrar';
$string['norestoreoptions'] = 'Não existem categorias ou disciplinas onde possa restaurar.';
$string['originalwwwroot'] = 'URL da cópia de segurança';
$string['preparingdata'] = 'A preparar dados';
$string['preparingui'] = 'A preparar a exibição da página';
$string['previousstage'] = 'Anterior';
$string['qcategory2coursefallback'] = 'A categoria de perguntas "{$a->name}", originalmente no contexto da categoria sistema/disciplina no ficheiro da cópia de segurança, vai ser criado no contexto da disciplina aquando do restauro';
$string['qcategorycannotberestored'] = 'A categoria de perguntas "{$a->name}" não pode ser criada através do restauro';
$string['question2coursefallback'] = 'A categoria de perguntas "{$a->name}", originalmente no contexto da categoria sistema/disciplina no ficheiro da cópia de segurança, vai ser criado no contexto da disciplina aquando do restauro';
$string['questionegorycannotberestored'] = 'As perguntas "{$a->name}" não podem ser criadas por restauro';
$string['restoreactivity'] = 'Restaurar atividade';
$string['restorecourse'] = 'Restaurar disciplina';
$string['restorecoursesettings'] = 'Configurações da disciplina';
$string['restoreexecutionsuccess'] = 'A disciplina foi restaurada com sucesso. Ao clicar no botão \'Continuar\' seguirá para a página da disciplina restaurada.';
$string['restorefileweremissing'] = 'Não foi possível restaurar alguns ficheiros pois estavam em falta no ficheiro de cópia de segurança.';
$string['restorenewcoursefullname'] = 'Nome da nova disciplina';
$string['restorenewcourseshortname'] = 'Nome curto da nova disciplina';
$string['restorenewcoursestartdate'] = 'Nova data de início';
$string['restorerolemappings'] = 'Restaurar mapeamento dos papéis';
$string['restorerootsettings'] = 'Restaurar configurações';
$string['restoresection'] = 'Restaurar secção';
$string['restorestage1'] = 'Confirmar';
$string['restorestage16'] = 'Rever';
$string['restorestage16action'] = 'Realizar restauro';
$string['restorestage1action'] = 'Seguinte';
$string['restorestage2'] = 'Destino';
$string['restorestage2action'] = 'Seguinte';
$string['restorestage32'] = 'Processar';
$string['restorestage32action'] = 'Continuar';
$string['restorestage4'] = 'Configurações';
$string['restorestage4action'] = 'Seguinte';
$string['restorestage64'] = 'Conclusão';
$string['restorestage64action'] = 'Continuar';
$string['restorestage8'] = 'Estrutura';
$string['restorestage8action'] = 'Seguinte';
$string['restoretarget'] = 'Destino do restauro';
$string['restoretocourse'] = 'Restaurar na disciplina:';
$string['restoretocurrentcourse'] = 'Restaurar nesta disciplina';
$string['restoretocurrentcourseadding'] = 'Inserir o conteúdo desta cópia de segurança nesta disciplina';
$string['restoretocurrentcoursedeleting'] = 'Apagar o conteúdo desta disciplina e depois restaurar';
$string['restoretoexistingcourse'] = 'Restaurar numa disciplina já existente';
$string['restoretoexistingcourseadding'] = 'Inserir o conteúdo desta cópia de segurança numa disciplina já existente';
$string['restoretoexistingcoursedeleting'] = 'Apagar o conteúdo de uma disciplina já existente e depois restaurar';
$string['restoretonewcourse'] = 'Restaurar como uma nova disciplina';
$string['restoringcourse'] = 'Restauro de disciplina a decorrer';
$string['restoringcourseshortname'] = 'a restaurar';
$string['rootenrolmanual'] = 'Restaurar como inscrições manuais.';
$string['rootsettingactivities'] = 'Incluir atividades';
$string['rootsettinganonymize'] = 'Tornar informação dos utilizadores anónima';
$string['rootsettingbadges'] = 'Incluir Medalhas';
$string['rootsettingblocks'] = 'Incluir blocos';
$string['rootsettingcalendarevents'] = 'Incluir calendário de eventos';
$string['rootsettingcomments'] = 'Incluir comentários';
$string['rootsettingfilters'] = 'Incluir filtros';
$string['rootsettinggradehistories'] = 'Incluir histórico de notas';
$string['rootsettingimscc1'] = 'Converter para IMS Common Cartridge 1.0';
$string['rootsettingimscc11'] = 'Converter para Common Cartridge 1.1';
$string['rootsettinglogs'] = 'Incluir relatórios de atividade da disciplina';
$string['rootsettingquestionbank'] = 'Incluir base de dados de perguntas';
$string['rootsettingroleassignments'] = 'Incluir atribuições de papéis';
$string['rootsettings'] = 'Configuração inicial';
$string['rootsettingusers'] = 'Incluir utilizadores inscritos';
$string['rootsettinguserscompletion'] = 'Incluir detalhes sobre conclusão dos utilizadores';
$string['sectionactivities'] = 'Atividades';
$string['sectioninc'] = 'Incluído na cópia de segurança (sem informação de utilizadores)';
$string['sectionincanduser'] = 'Incluído na cópia de segurança juntamente com a informação dos utilizadores';
$string['selectacategory'] = 'Selecionar uma categoria';
$string['selectacourse'] = 'Selecionar uma disciplina';
$string['setting_course_fullname'] = 'Nome da disciplina';
$string['setting_course_shortname'] = 'Nome curto da disciplina';
$string['setting_course_startdate'] = 'Data de início da disciplina';
$string['setting_keep_groups_and_groupings'] = 'Manter os grupos e agrupamentos atuais';
$string['setting_keep_roles_and_enrolments'] = 'Manter inscrições atuais';
$string['setting_overwriteconf'] = 'Substituir configuração da disciplina';
$string['showtypes'] = 'Mostrar opções de tipo';
$string['skiphidden'] = 'Ignorar disciplinas ocultas';
$string['skiphiddenhelp'] = 'Determina se as disciplinas ocultas devem ou não ser ignoradas';
$string['skipmodifdays'] = 'Ignorar disciplinas que não foram modificadas há';
$string['skipmodifdayshelp'] = 'Determina se as disciplinas que não foram modificadas há um determinado número de dias são ignoradas';
$string['skipmodifprev'] = 'Ignorar disciplinas que não foram modificadas desde a cópia de segurança anterior';
$string['skipmodifprevhelp'] = 'Selecione se as disciplinas que não foram modificadas desde a cópia de segurança anterior devem ser ignoradas ou não';
$string['storagecourseandexternal'] = 'Área de ficheiros das cópias de segurança da disciplina e pasta escolhida';
$string['storagecourseonly'] = 'Área de ficheiros das cópias de segurança da disciplina';
$string['storageexternalonly'] = 'Pasta escolhida para a cópias de segurança automáticas';
$string['title'] = 'Título';
$string['totalcategorysearchresults'] = 'Total de categorias: {$a}';
$string['totalcoursesearchresults'] = 'Total de disciplinas: {$a}';
$string['unnamedsection'] = 'Secção sem nome';
$string['userinfo'] = 'Informação do utilizador';
