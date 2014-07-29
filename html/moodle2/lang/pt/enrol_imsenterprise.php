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
 * Strings for component 'enrol_imsenterprise', language 'pt', branch 'MOODLE_26_STABLE'
 *
 * @package   enrol_imsenterprise
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['aftersaving...'] = 'Depois de gravar as suas configurações poderá querer';
$string['allowunenrol'] = 'Permitir que os dados IMS <strong>removam inscrições</strong> de alunos e professores';
$string['allowunenrol_desc'] = 'Se ativar esta configuração as inscrições nas disciplinas serão removidas quando isso for especificado nos dados Enterprise.';
$string['basicsettings'] = 'Configurações básicas';
$string['coursesettings'] = 'Opções dos dados da disciplina';
$string['createnewcategories'] = 'Criar novas categorias (ocultas) de disciplinas caso ainda não existam no Moodle';
$string['createnewcategories_desc'] = 'Se o elemento <org><orgunit> estiver na informação de uma disciplina, o seu conteúdo será usada para definir uma categoria nos casos em que a disciplina tiver que ser criada. O módulo não mudará a categoria de disciplinas que já existam no Moodle.

Nos casos em que não existir nenhuma categoria com o nome indicado será criada uma nova categoria (oculta).';
$string['createnewcourses'] = 'Criar novas disciplinas (ocultas) caso não existam no Moodle';
$string['createnewcourses_desc'] = 'Se esta configuração estiver ativa, o módulo de inscrição IMS Enterprise pode criar as disciplinas que forem especificadas nos dados IMS e que ainda não existam no Moodle. As disciplinas criadas neste processo estarão ocultas inicialmente.';
$string['createnewusers'] = 'Criar contas de utilizador para utilizadores ainda não registados no Moodle';
$string['createnewusers_desc'] = 'A informação de inscrição IMS Enterprise normalmente descreve um conjunto de utilizadores. Se este módulo estiver ativo, as contas podem ser criadas para os utilizadores que ainda não existam no Moodle.

Os utilizadores são procurados inicialmente pelo campo <strong>idnumber</strong> e depois pelo seu nome de utilizador. As senhas não são importadas pelo módulo. Por isso, deve ser especificado um módulo de autenticação para validar as contas de utilizador.';
$string['cronfrequency'] = 'Frequência de processamento';
$string['deleteusers'] = 'Eliminar as contas de utilizador se isso for especificado nos dados IMS';
$string['deleteusers_desc'] = 'Se esta configuração estiver ativa, o módulo de inscrição IMS Enterprise pode remover contas de utilizador se isso for especificado nos dados IMS (campo "recstatus" = 3). Como é procedimento habitual no Moodle, as contas não serão removidas da base de dados, mas marcadas como "apagadas".';
$string['doitnow'] = 'executar uma importação IMS Enterprise';
$string['emptyattribute'] = 'Deixar vazio';
$string['filelockedmail'] = 'O ficheiro de texto que está a utilizar para inscrições IMS ({$a}) não pôde ser eliminado pelo processo cron. Normalmente, tal significa que as permissões não estão bem definidas. Por favor, ajuste as permissões de forma a que o Moodle possa eliminar o ficheiro; caso contrário, este será repetidamente processado.';
$string['filelockedmailsubject'] = 'Erro importante: Ficheiro de inscrições';
$string['fixcasepersonalnames'] = 'Escrever nomes próprios em maiúsculas';
$string['fixcaseusernames'] = 'Escrever nomes de utilizador em minúsculas';
$string['ignore'] = 'Ignorar';
$string['importimsfile'] = 'Importar ficheiro IMS Enterprise';
$string['imsrolesdescription'] = 'A especificação IMS Enterprise inclui 8 tipos de papéis diferentes.
Defina como quer que estes sejam atribuídos no Moodle, incluindo se pretende que algum deles seja ignorado.';
$string['location'] = 'Caminho para o ficheiro';
$string['logtolocation'] = 'Caminho para o ficheiro de registo (se o campo ficar vazio não será feito o registo)';
$string['mailadmins'] = 'Notificar administradores por e-mail';
$string['mailusers'] = 'Notificar utilizadores por e-mail';
$string['messageprovider:imsenterprise_enrolment'] = 'Mensagens de inscrição da IMS Enterprise';
$string['miscsettings'] = 'Diversos';
$string['pluginname'] = 'Ficheiro IMS Enterprise';
$string['pluginname_desc'] = 'Este módulo de inscrição irá verificar de forma contínua a existência de um ficheiro para processamento na localização que for especificada. O ficheiro deve estar no formato IMS Enterprise e conter os seguintes elementos XML: person, group, and membership.';
$string['processphoto'] = 'Adicionar dados da fotografia do utilizador ao perfil';
$string['processphotowarning'] = 'Aviso: o processamento de imagens tende a aumentar significativamente a carga no servidor. Não é recomendável ativar esta opção se o número de alunos a processar for muito elevado.';
$string['restricttarget'] = 'Os dados apenas devem ser processados se for especificado';
$string['restricttarget_desc'] = 'Um ficheiro IMS Enterprise pode ser criado para diferentes destinos (LMSs distintos ou diferentes departamento de uma instituição). É possível especificar nestes ficheiros um ou mais sistemas de destino. Isto é feito através da inclusão da tag <strong>target</strong> dentro da tag <strong>properties</strong>.

Normalmente não terá que se preocupar com esta informação. Se deixar este campo em branco o Moodle fará sempre o processamento deste ficheiro, independentemente do destino indicado no ficheiro. Em alternativa, indique o nome do destino a processar que se encontra referido no ficheiro.';
$string['roles'] = 'Papéis';
$string['settingfullname'] = 'Descrição da etiqueta IMS para o nome completo da disciplina';
$string['settingfullnamedescription'] = 'O nome completo é um campo obrigatório da disciplina e, por isso, tem de definir a descrição da etiqueta selecionada no seu ficheiro IMS da empresa';
$string['settingshortname'] = 'Descrição da etiqueta IMS para o nome curto da disciplina';
$string['settingshortnamedescription'] = 'O nome curto é um campo obrigatório da disciplina e, por isso, tem de definir a descrição da etiqueta selecionada no seu ficheiro IMS da empresa';
$string['settingsummary'] = 'Tag de descrição IMS para o resumo disciplina';
$string['settingsummarydescription'] = 'É um campo opcional, selecione \'Deixar vazio \' se não pretende especificar um resumo da disciplina';
$string['sourcedidfallback'] = 'Utilizar <strong>sourcedid</strong> para o nome de utilizador caso o campo <strong>userid</strong> não seja encontrado';
$string['sourcedidfallback_desc'] = 'Na informação IMS o campo <strong>sourcedid</strong> representa o identificador persistente de uma pessoa tal como é usado no sistema fonte. O campo <strong>userid</strong> é um campo distinto que deve conter o identificador usado pelo utilizador quando inicia uma sessão. Normalmente estes dois campos têm o mesmo valor, mas isso não é obrigatório.

Alguns sistemas de gestão de alunos não conseguem exportar o campo <strong>userid</strong>. Se for o caso, esta configuração deve ser ativada para permitir a utilização do campo <strong>sourcedid</strong> como identificador de utilizador no Moodle. Caso contrário, desative esta configuração.';
$string['truncatecoursecodes'] = 'Truncar os códigos das disciplinas se o número de carateres exceder';
$string['truncatecoursecodes_desc'] = 'Nalguns casos pode querer truncar os códigos das disciplinas para um comprimento máximo predefinido antes de fazer o seu processamento. Nestas situações, indique neste campo o número de carateres máximo a considerar. Se o campo ficar vazio, os códigos das disciplinas não serão truncados.';
$string['usecapitafix'] = 'Selecione esta opção se utilizar <strong>Capita</strong> (o seu formato XML é ligeiramente incorreto)';
$string['usecapitafix_desc'] = 'A informação dos alunos produzida por <strong>Capita</strong> apresenta um pequeno erro na sua exportação XML. Se estiver a utilizar <strong>Capita</strong> deve ativar esta opção.';
$string['usersettings'] = 'Configurações dos dados de utilizador';
$string['zeroisnotruncation'] = '0 (zero) indica que a informação não é truncada';
