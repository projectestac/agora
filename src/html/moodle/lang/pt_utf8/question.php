<?PHP // $Id: question.php,v 1.5 2008/01/29 20:43:50 villate Exp $ 
      // question.php - created with Moodle 1.9 Beta 4 (2007101506)


$string['adminreport'] = 'Diagnosticar possíveis problemas na sua base de dados.';
$string['broken'] = 'Este é um apontador para um ficheiro que não existe.';
$string['byandon'] = 'por <em>$a->user</em> em <em>$a->time</em>';
$string['categorycurrent'] = 'Categoria actual';
$string['categorycurrentuse'] = 'Usar esta categoria';
$string['categorydoesnotexist'] = 'Esta categoria não existe';
$string['categorymoveto'] = 'Gravar na categoria';
$string['changepublishstatuscat'] = '<a href=\"$a->caturl\">A categoria \"$a->name\"</a> na disciplina \"$a->coursename\" mudará o seu estado de partilha de <strong>$a->changefrom para $a->changeto</strong>.';
$string['copy'] = 'Copiar de $a e alterar apontadores.';
$string['created'] = 'Criado';
$string['createdmodifiedheader'] = 'Criação / Última actualização';
$string['cwrqpfs'] = 'Perguntas aleatórias, seleccionando perguntas de subcategorias.';
$string['cwrqpfsinfo'] = '<p>Durante a actualização para o Moodle 1.9, vamos separar as categorias de perguntas em diferentes contextos. O estado de partilha de algumas categorias de perguntas e perguntas no seu sítio terá que ser alterado. Isso será necessário no caso, pouco usual, em que uma ou mais perguntas \'aleatórias\' num teste tenha sido configurada para seleccionar perguntas de categorias partilhadas e não partilhadas (que é o caso neste sítio). Isso acontece quando uma pergunta aleatória é configurada para seleccionar perguntas de subcategorias e algumas das subcategorias têm estado de partilha diferente do estado da categoria ascendente onde a pergunta aleatória foi criada.</p>
<p>Durante a actualização para o Moodle 1.9, o estado de partilha das seguintes categorias, donde são seleccionadas perguntas aleatórias de categorias ascendentes, será alterado para o mesmo estado da categoria em que se encontra a pergunta que selecciona perguntas aleatórias. As perguntas afectadas continuarão a funcionar em todos os testes existentes, enquanto não sejam retiradas.</p>';
$string['cwrqpfsnoprob'] = 'Nenhuma categoria no seu sítio é afectada pelo assunto das perguntas aleatórias que seleccionam perguntas de subcategorias com diferentes estados.';
$string['defaultfor'] = 'Valor por omissão para $a';
$string['defaultinfofor'] = 'A categoria, por omissão, para perguntas partilhadas no contexto \'$a\'';
$string['donothing'] = 'Não copiar ou deslocar ficheiros nem alterar apontadores';
$string['editingcategory'] = 'A editar categoria';
$string['editingquestion'] = 'A editar pergunta';
$string['erroraccessingcontext'] = 'Contexto inacessível';
$string['errorfilecannotbecopied'] = 'Erro: não é possível copiar o ficheiro $a.';
$string['errorfilecannotbemoved'] = 'Erro: não é possível deslocar o ficheiro $a.';
$string['errorfileschanged'] = 'Erro: os ficheiros para os que a pergunta aponta foram alterados desde que o formulário foi apresentado.';
$string['exportcategory'] = 'Exportar categorias';
$string['filesareacourse'] = 'a área de ficheiros da disciplina';
$string['filesareasite'] = 'a área de ficheiros do sítio';
$string['filestomove'] = 'Deslocar / copiar ficheiros para $a?';
$string['fractionsnomax'] = 'Uma das respostas deveria ter uma pontuação de 100%% para que seja possível obter a nota máxima para esta  pergunta.';
$string['getcategoryfromfile'] = 'Obter categoria no ficheiro';
$string['getcontextfromfile'] = 'Obter o contexto no ficheiro';
$string['ignorebroken'] = 'Ignorar apontadores errados';
$string['linkedfiledoesntexist'] = 'O ficheiro $a referido não existe';
$string['makechildof'] = 'Tornar descendente de \'$a\'';
$string['maketoplevelitem'] = 'Deslocar para o nível superior';
$string['missingimportantcode'] = 'Falta código importante neste tipo de pergunta: $a';
$string['modified'] = 'Última actualização';
$string['move'] = 'Deslocar de $a e alterar apontadores.';
$string['movecategory'] = 'Deslocar categoria';
$string['movelinksonly'] = 'Modificar apenas os apontadores, sem deslocar nem copiar ficheiros.';
$string['moveq'] = 'Deslocar pergunta(s)';
$string['moveqtoanothercontext'] = 'Deslocar pergunta para outro contexto.';
$string['movingcategory'] = 'A deslocar categoria';
$string['movingcategoryandfiles'] = 'Tem a certeza que quer deslocar a categoria {$a->name} e todas as categorias descendentes para o contexto de \"{$a->contextto}\"?<br />
Foram detectados {$a->urlcount} ficheiros referidos nas perguntas em {$a->fromareaname}; quer copiar ou deslocar esses ficheiros para {$a->toareaname}?';
$string['movingcategorynofiles'] = 'Tem a certeza que quer desclocar a categoria \"{$a->name}\" e todas a s categorias descendentes para o contexto de \"{$a->contextto}\"?';
$string['movingquestions'] = 'A deslocar perguntas  e ficheiros';
$string['movingquestionsandfiles'] = 'Tem a certeza que quer deslocar a(s) pergunta(s) $a->questions} para o contexto de <strong>\"{$a->tocontext}\"</strong>?<br />
Foram detectados {$a->urlcount} ficheiros referidos nas perguntas em {$a->fromareaname}; quer copiar ou deslocar esses ficheiros para {$a->toareaname}?';
$string['movingquestionsnofiles'] = 'Tem a certeza que quer deslocar a(s) pergunta(s) $a->questions} para o contexto de <strong>\"{$a->tocontext}\"</strong>?<br />
<strong>Não há</strong> ficheiros referidos nessa(s) pergunta(s) em {$a->fromareaname}.';
$string['needtochoosecat'] = 'Tem que escolher uma categoria para deslocar esta pergunta ou carregar em \'cancelar\'.';
$string['nopermissionadd'] = 'Não tem autorização para adicionar perguntas aqui.';
$string['noprobs'] = 'Não foram encontrados problemas na sua base de dados de perguntas.';
$string['notenoughdatatoeditaquestion'] = 'Não foi especificado nem o código da pergunta nem o código da categoria e tipo de pergunta.';
$string['notenoughdatatomovequestions'] = 'Tem que dizer os códigos das perguntas que quer deslocar.';
$string['permissionedit'] = 'Editar esta pergunta';
$string['permissionmove'] = 'Deslocar esta pergunta';
$string['permissionsaveasnew'] = 'Gravar numa pergunta nova';
$string['permissionto'] = 'Tem autorização para:';
$string['published'] = 'partilhada';
$string['questionaffected'] = 'A <a href=\"$a->qurl\">pergunta \"$a->name\" ($a->qtype)</a> encontra-se nesta categoria, mas também está a ser usada no <a href=\"$a->qurl\">teste \"$a->quizname\"</a> na outra disciplina, \"$a->coursename\".';
$string['questionbank'] = 'Base de dados de perguntas';
$string['questioncatsfor'] = 'Categorias de perguntas para \'$a\'';
$string['questiondoesnotexist'] = 'Esta pergunta não existe';
$string['questionuse'] = 'Usar pergunta nesta actividade';
$string['shareincontext'] = 'Partilhar no contexto de $a';
$string['tofilecategory'] = 'Gravar categoria em ficheiro';
$string['tofilecontext'] = 'Gravar contexto em ficheiro';
$string['unknown'] = 'Desconhecido(a)';
$string['unknownquestiontype'] = 'Tipo de pergunta desconhecida: $a.';
$string['unpublished'] = 'não-partilhada';

?>
