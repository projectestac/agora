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
 * Strings for component 'qtype_stack', language 'gl', branch 'MOODLE_26_STABLE'
 *
 * @package   qtype_stack
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addanothernode'] = 'Engadir outro nodo';
$string['addanothertestcase'] = 'Engadir outro caso de proba...';
$string['addatestcase'] = 'Engadir un caso de proba...';
$string['addingatestcase'] = 'Engadido un caso de proba a pregunta {$a}';
$string['alg_indices_fact'] = 'As seguintes leis regulan a manipulación do índice:
[a^ma^n = a^{m+n}]
[frac{a^m}{a^n} = a^{m-n}]
[(a^m)^n = a^{mn}]
[a^0 = 1]
[a^{-m} = frac{1}{a^m}]
[a^{frac{1}{n}} = sqrt[n]{a}]
[a^{frac{m}{n}} = left(sqrt[n]{a}right)^m]';
$string['alg_indices_name'] = 'As leis dos índices';
$string['alg_inequalities_fact'] = '[a>b hbox{ means } a hbox{ é maior que } b]
<br />
[ a < b hbox{ means } a hbox{ é menor que } b]
<br />
[ageq b hbox{ means } a hbox{ é maior que ou igual a } b]
<br />
[aleq b hbox{ means } a hbox{ é menor que ou igual a } b]';
$string['alg_inequalities_name'] = 'Desigualdades';
$string['alg_logarithms_fact'] = 'Para calquera base positiva (b) (con (b neq 1)):
[log_b(a) = c mbox{, means } a = b^c]
[log_b(a) + log_b(b) = log_b(ab)]
[log_b(a) - log_b(b) = log_bleft(frac{a}{b}right)]
[nlog_b(a) = log_bleft(a^nright)]
[log_b(1) = 0]
[log_b(b) = 1]
A formula para o cambio de base é:
[log_a(x) = frac{log_b(x)}{log_b(a)}]
Os logaritmos de base $e$, indican $log_e$ ou ben $ln$ chamados logaritmos naturais.  A letra $e$ representa a constante exponencial que é aproximadamente 2.718.';
$string['alg_logarithms_name'] = 'As leis dos logaritmos';
$string['alg_partial_fractions_fact'] = 'As fraccións propias prodúcense con[{frac{P(x)}{Q(x)}}]
cando $P$ e $Q$ son polinomios co grado de $P$ menor que o grado de $Q$.  Neste caso procedese do seguinte
xeito: escriba $Q(x)$ en forma factorizada,
<ul>
<li>
un <em>factor lineal</em> $ax+b$ no denominador produce unha fracción parcial na forma [{frac{A}{ax+b}}.]
</li>
<li>
unha <em>repetición lineal de factores</em> $(ax+b)^2$ no denominador
produce fraccións parciais na forma [{Aover ax+b}+{Bover (ax+b)^2}.]
</li>
<li>
un <em>factor cuadrático</em> $ax^2+bx+c$
no denominador produce unha fracción parcial na
forma [{Ax+Bover ax^2+bx+c}]
</li>
<li>
As <em>fraccións impropias}</em> requiren un termo adicional
que é un polinomio de grado $n-d$ onde $n$ é
o grao do numerador (p.ex. $P(x)$) e $d$ é o grao do
denominador (p.ex. $Q(x)$).
</li></ul>';
$string['alg_partial_fractions_name'] = 'Fraccións parciais';
$string['alg_quadratic_formula_fact'] = 'Se temos unha ecuación cuadrática na forma:
[ax^2 + bx + c = 0,]
entón a(s) solución(s) da ecuación dada pola fórmula cuadrática é/son:
[x = frac{-b pm sqrt{b^2 - 4ac}}{2a}.]';
$string['alg_quadratic_formula_name'] = 'A formula cuadrática';
$string['all'] = 'Todo';
$string['allnodefeedbackmustusethesameformat'] = 'Todos os intercambios para todos os nodos nunha ARP deben utilizar o mesmo formato de texto.';
$string['allowwords'] = 'Palabras permitidas';
$string['allowwords_help'] = 'De xeito predeterminado, non están permitidas as funcións arbitrarias ou os nomes de variábel de máis de dous caracteres de lonxitude. Esta é unha lista separada por comas de funcións ou nomes de variábel que están permitidos nunha resposta de alumno.';
$string['allowwords_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Allow_Words';
$string['alreadydeployed'] = 'Xa está incluída unha variante correspondente a esta nota de pregunta.';
$string['answernote'] = 'Nota de resposta';
$string['answernotedefaultfalse'] = '{$a->prtname}-{$a->nodename}-F';
$string['answernotedefaulttrue'] = '{$a->prtname}-{$a->nodename}-T';
$string['answernote_err'] = 'As notas de resposta non poden conter o carácter |.  Este carácter é inserido polo STACK e posteriormente utilizase para dividir automaticamente as notas de resposta.';
$string['answernote_help'] = 'Esta etiqueta é fundamental para a xeración de informes.  Está deseñada para rexistrar a ruta de acceso único a través da árbore, e do resultado de cada proba de resposta.  Xerase de forma automática, mais pode cambiarse a algo máis significativo.';
$string['answernote_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Potential_response_trees.md#Answer_note';
$string['answernoterequired'] = 'A nota de resposta non pode estar baleira.';
$string['answertest'] = 'Proba de resposta';
$string['answertest_help'] = 'A proba de resposta utilizase para comparar dúas expresións para estabelecer se cumpren algúns criterios matemáticos.';
$string['answertest_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Answer_tests.md';
$string['assumepositive'] = 'Supoñamos positivo';
$string['assumepositive_help'] = 'Esta opción estabelece o valor da variábel «assume_pos» de Maxima.';
$string['assumepositive_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Options.md#Assume_Positive';
$string['ATAlgEquiv_SA_not_equation'] = 'A súa resposta debe ser unha ecuación, mais non o é.';
$string['ATAlgEquiv_SA_not_expression'] = 'A súa resposta debe ser una expresión, non unha ecuación, desigualdade, lista, conxunto ou matriz.';
$string['ATAlgEquiv_SA_not_function'] = 'A súa resposta debe ser unha función, definida usando o operador  <tt>:=</tt>, mais non o é.';
$string['ATAlgEquiv_SA_not_inequality'] = 'A súa resposta debe ser unha desigualdade, mais non o é.';
$string['ATAlgEquiv_SA_not_list'] = 'A súa resposta debe ser unha lista, mais non o é.  Teña en conta que a sintaxe para introducir unha lista é encerrar os valores separados por comas entre corchetes.';
$string['ATAlgEquiv_SA_not_matrix'] = 'A súa resposta debe ser unha matriz, mais non o é.';
$string['ATAlgEquiv_SA_not_set'] = 'A súa resposta debe ser unha conxunto, mais non o é.  Teña en conta que a sintaxe para introducir unha lista é encerrar os valores separados por comas entre chaves.';
$string['ATAlgEquiv_TA_not_equation'] = 'Introduciu unha ecuación, mais aquí non se agardaba unha ecuación. É probábel que escribira algo como «y=2*x+1» cando só necesita escribir «2*x+1».';
$string['ATCompSquare_false'] = '';
$string['ATCompSquare_false_no_summands'] = 'O cadrado completo ten a forma ( a(cdotscdots)^2 + b), onde (a) e (b) non dependen da variábel.  Semella que na súa resposta máis dun dos sumandos dependen da variábel.';
$string['ATCompSquare_not_AlgEquiv'] = 'Semella que a resposta está na forma correcta, mais non é equivalente a resposta correcta.';
$string['ATCompSquare_SA_not_depend_var'] = 'A resposta debe depender da variábel {$a->m0} mais non é así!';
$string['ATCompSquare_true'] = '';
$string['ATDiff_error_list'] = 'Fallou a proba de resposta.  Póñase en contacto co administrador de sistemas';
$string['ATDiff_int'] = 'Semella que no seu canto foi integrada!';
$string['AT_EmptySA'] = 'Tentou executar unha proba de resposta cunha resposta de alumno baleira, probabelmente por un problema de validación CAS ao crear a pregunta.';
$string['AT_EmptyTA'] = 'Tentou executar unha proba de resposta cunha resposta de profesor baleira, probabelmente por un problema de validación CAS ao crear a pregunta.';
$string['ATFacForm_error_degreeSA'] = 'O CAS non puido estabelecer o grao alxebraico da súa resposta.';
$string['ATFacForm_error_list'] = 'Fallou a proba de resposta.  Póñase en contacto co administrador de sistemas';
$string['ATFacForm_isfactored'] = 'A súa resposta é unha factorización, ben feito.';
$string['ATFacForm_notalgequiv'] = 'Teña en conta que a súa resposta non é alxebraicamente equivalente a resposta correcta. Debe ter feito algo mal.';
$string['ATFacForm_notfactored'] = 'A súa resposta non é unha factorización.';
$string['ATInequality_backwards'] = 'A súa desigualdade semella estar do revés.';
$string['ATInequality_nonstrict'] = 'A súa desigualdade debe ser estrita, mais non o é!';
$string['ATInequality_strict'] = 'A súa desigualdade non debe ser estrita!';
$string['ATInt_const'] = 'É necesario engadir unha constante de integración, polo contrario parece ser correcta.  Ben feito.';
$string['ATInt_const_int'] = 'É necesario engadir unha constante de integración. Isto debe ser unha constante arbitraria, non un número.';
$string['ATInt_diff'] = 'Semella que no seu canto foi diferenciada!';
$string['ATInt_EqFormalDiff'] = 'A derivada formal da súa resposta é igual que a expresión que se lle pediu que integrara.  Porén, a súa resposta difire da resposta correcta dun xeito significativo, é dicir, e non só, p.ex. unha constante de integración.  Pregúntelle ao profesor sobre disto.';
$string['ATInt_error_list'] = 'Fallou a proba de resposta.  Póñase en contacto co administrador de sistemas';
$string['ATInt_generic'] = 'A derivada da resposta debe ser igual a expresión que se lle pediu que integrara, iso era: {$a->m0} De feito, a derivada da súa resposta, con respecto a {$a->m1} é: {$a->m2} por lo que debe ter feito algo mal!';
$string['ATInt_logabs'] = 'A derivada formal da súa resposta é igual á expresión que se lle pediu que integrara. Porén, a súa resposta difire da resposta correcta dun xeito significativo, é dicir, non só, p. ex. unha constante de integración. O seu profesor pode esperar que utilice o resultado ((intfrac{1}{x} dx = log(|x|)+c), no canto de (intfrac{1}{x} dx = log(x)+c). Pregúntelle ao seu profesor sobre isto.';
$string['ATInt_logabs_inconsistent'] = 'Polo que parece, hai inconsistencias entrañas entre o seu uso de (log(...)) e (log(|...|)). Pregúntelle ao seu profesor ao respecto.';
$string['ATInt_weirdconst'] = 'A derivada formal da súa resposta é igual que a expresión que se lle pediu que integrara.  Porén, ten unha estraña constante de integración.  Pregúntelle ao seu profesor sobre disto.';
$string['AT_InvalidOptions'] = 'O campo de opción non é correcto. {$a->errors}';
$string['ATList_wrongentries'] = 'As entradas en vermello a seguir son as que non son correctas. {$a->m0}';
$string['ATList_wronglen'] = 'A súa lista debe ter {$a->m0} elementos, mais realmente ten {$a->m1}.';
$string['ATLowestTerms_entries'] = 'Os seguintes termos nas súas respostas non están na súa mínima expresión.  {$a->m0} Tenteo de novo.';
$string['ATLowestTerms_wrong'] = 'É necesario que cancele as fracción na súa resposta.';
$string['ATMatrix_wrongentries'] = 'As entradas en vermello a seguir son as que non son correctas. {$a->m0}';
$string['ATMatrix_wrongsz'] = 'A súa matriz debe ser {$a->m0} by {$a->m1}, mais realmente é {$a->m2} by {$a->m3}.';
$string['AT_MissingOptions'] = 'Non se atopou a opción ao executar a proba.';
$string['AT_NOTIMPLEMENTED'] = 'Esta proba de resposta non foi aplicada.';
$string['ATNumDecPlaces_NoDP'] = 'A súa resposta debe ser un número decimal, incluíndo o punto decimal.';
$string['ATNumDecPlaces_OptNotInt'] = 'Para ATNumDecPlaces a opción de proba debe ser un número enteiro positivo, de feito, recibiuse «{$a->opt}».';
$string['ATNumDecPlaces_Wrong_DPs'] = 'Deu a súa resposta cun número trabucado de decimais.';
$string['ATNumSigFigs_error_list'] = 'Fallou a proba de resposta.  Póñase en contacto co administrador de sistemas';
$string['ATNumSigFigs_Inaccurate'] = 'A precisión da súa resposta non é correcta.  É probábel que non teña feito o redondeo correctamente ou que teña redondeado unha resposta intermedia, que propagara un erro.';
$string['ATNumSigFigs_NotDecimal'] = 'A súa resposta debe ser un número decimal, mais non o é!';
$string['ATNumSigFigs_WrongDigits'] = 'A súa resposta contén un número incorrecto de díxitos significativos.';
$string['ATPartFrac_denom_ret'] = 'Se a súa resposta escríbese como unha soa fracción, entón o denominador sería {$a->m0}. De feito, debera ser {$a->m1}.';
$string['ATPartFrac_diff_variables'] = 'As variábeis na súa resposta son diferentes ás da pregunta, compróbeo.';
$string['ATPartFrac_error_list'] = 'Fallou a proba de resposta.  Póñase en contacto co administrador de sistemas';
$string['ATPartFrac_ret_expression'] = 'A súa resposta como unha soa fracción é {$a->m0}';
$string['ATPartFrac_single_fraction'] = 'Semella que a súa resposta é unha soa fracción, é necesario que sexa unha forma de fracción parcial.';
$string['ATPartFrac_true'] = '';
$string['ATRegEx_missing_option'] = 'Falta unha expresión regular no campo da opción CAS.';
$string['ATSet_wrongentries'] = 'As seguintes entradas son incorrectas, aínda que é posíbel que aparezan  nunha forma simplificada do que realmente foi introducido. {$a->m0}';
$string['ATSet_wrongsz'] = 'O seu conxunto debe ter {$a->m0} elementos diferentes, mais realmente ten {$a->m1}.';
$string['ATSingleFrac_div'] = 'A súa resposta contén fraccións en fraccións.  É necesario que aclare iso e que escriba a resposta como unha soa fracción.';
$string['ATSingleFrac_error_list'] = 'Fallou a proba de resposta.  Póñase en contacto co administrador de sistemas';
$string['ATSingleFrac_part'] = 'A resposta ten que ser unha soa fracción na forma ( {a}over{b} ).';
$string['ATSingleFrac_ret_exp'] = 'A súa resposta non é alxebraicamente equivalente a resposta correcta. Debe ter feito algo mal.';
$string['ATSingleFrac_true'] = '';
$string['ATSingleFrac_var'] = 'As variábeis na súa resposta son diferentes ás da pregunta, compróbeo.';
$string['ATSysEquiv_SA_extra_variables'] = 'A súa resposta inclúe variábeis de máis!';
$string['ATSysEquiv_SA_missing_variables'] = 'A súa resposta fáltalle unha ou máis variábeis!';
$string['ATSysEquiv_SA_not_eq_list'] = 'A súa resposta debe ser unha lista de ecuacións, mais non o é!';
$string['ATSysEquiv_SA_not_list'] = 'A súa resposta debe ser unha lista, mais non o é!';
$string['ATSysEquiv_SA_not_poly_eq_list'] = 'Unha ou máis das súas ecuacións non é un polinomio!';
$string['ATSysEquiv_SA_system_overdetermined'] = 'As entradas en vermello a seguir son as que non son correctas. {$a->m0}';
$string['ATSysEquiv_SA_system_underdetermined'] = 'As ecuacións no seu sistema semellan seren correctas, mais necesita outras aparte.';
$string['ATSysEquiv_SB_not_eq_list'] = 'A resposta do profesor non é unha lista de ecuacións, mais debería selo.';
$string['ATSysEquiv_SB_not_list'] = 'A resposta do profesor non é unha lista.  Póñase en contacto co profesor.';
$string['ATSysEquiv_SB_not_poly_eq_list'] = 'A resposta do profesor debe ser unha lista de ecuacións polinómicas, mais non o é.  Póñase en contacto co profesor.';
$string['autosimplify'] = 'Simplificar automaticamente';
$string['autosimplify_help'] = 'Estabelece a variábel «simp» no Maxima para esta pregunta.  P.ex. variábeis de preguntas, texto da pregunta, etc.  O valor estabelecese para cada árbore de respostas posíbeis, sobrescribe isto para calquera expresión definida posteriormente na árbore.';
$string['autosimplify_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/CAS/Maxima.md#Simplification';
$string['autosimplifyprt'] = 'Simplificar automaticamente';
$string['autosimplifyprt_help'] = 'Estabelece a variábel «simp» no Maxima para o intercambio de variábeis definidas para cada árbore de respostas posíbeis, avaliando ao mesmo tempo esta ARP.  Sobrescribe isto para calquera valor estabelecido en calquera expresión definida na árbore.';
$string['autosimplifyprt_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/CAS/Maxima.md#Simplification';
$string['booleangotunrecognisedvalue'] = 'Entrada incorrecta.';
$string['boxsize'] = 'Tamaño da caixa de entrada';
$string['boxsize_help'] = 'Largo do campo do formulario html.';
$string['boxsize_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Box_Size';
$string['branchfeedback'] = 'Intercambio da rama do nodo';
$string['branchfeedback_help'] = 'Este é o CASText que pode depender de calquera das variábeis de preguntas, elementos de entrada ou intercambio de variábeis. Isto é avaliado e amosado ao alumno se supera esta rama.';
$string['bulktestindexintro'] = 'Ao premer en calquera das ligazóns, executa todas as probas de preguntas en todas as preguntas do STACK neste contexto';
$string['bulktestindexintro_desc'] = 'A <a href="{$a->link}">execución das probas de preguntas co script «a vulto»</a> permítelle executar facilmente todas as preguntas do STACK nun contexto dado. E non só estas probas de preguntas. E tamén un bo xeito de volver encher a memoria caché do CAS despois de seren limpada.';
$string['bulktestindextitle'] = 'Executar as probas de preguntas a bulto';
$string['bulktestnotests'] = 'Esta pregunta non ten ningunha proba.';
$string['bulktesttitle'] = 'Executando todas as probas de preguntas en {$a}';
$string['calc_chain_rule_fact'] = 'A seguinte regra permítelle atopar a derivada dunha composición de dúas funcións.
Asumimos que temos unha función (f(g(x))), definindo (u=g(x)), a derivada con respecto a (x) ven dada por:
[frac{df(g(x))}{dx} = frac{dg(x)}{dx}cdotfrac{df(u)}{du}.]
Ou ben, podemos escribir:
[frac{df(x)}{dx} = f\'(g(x))cdot g\'(x).]';
$string['calc_chain_rule_name'] = 'A regra da cadea';
$string['calc_diff_linearity_rule_fact'] = '[{{rm d},over {rm d}x}big(af(x)+bg(x)big)=a{{rm d}f(x)over {rm d}x}+b{{rm d}g(x)over {rm d}x}quad a,b {rm  constant}]';
$string['calc_diff_linearity_rule_name'] = 'A regra de linearidade para o diferencial';
$string['calc_diff_standard_derivatives_fact'] = 'A seguinte táboa amosa as derivadas dalgunhas funcións estándar.  É útil para aprender estas derivadas estándar, xa que utilízanse con frecuencia no cálculo.
<center>
<table>
<tr><th>(f(x))               </th><th> (f\'(x))</th></tr>
<tr>
<td>(k), constante                </td> <td> (0) </td> </tr> <tr> <td>
(x^n), calquera constante (n) </td> <td> (nx^{n-1})</td> </tr> <tr> <td>
(e^x)                         </td> <td> (e^x)</td> </tr> <tr> <td>
(ln(x)=log_{rm e}(x))              </td> <td> (frac{1}{x})                </td> </tr> <tr> <td>
(sin(x))                             </td> <td> (cos(x))                    </td> </tr> <tr> <td>
(cos(x))                             </td> <td> (-sin(x))                   </td> </tr> <tr> <td>
(tan(x) = frac{sin(x)}{cos(x)})   </td> <td>   (sec^2(x))                </td> </tr> <tr> <td>
(cosec(x)=frac{1}{sin(x)})         </td> <td>   (-cosec(x)cot(x))        </td> </tr> <tr> <td>
(sec(x)=frac{1}{cos(x)})           </td> <td>   (sec(x)tan(x))           </td> </tr> <tr> <td>
(cot(x)=frac{cos(x)}{sin(x)})     </td> <td>   (-cosec^2(x))             </td> </tr> <tr> <td>
(cosh(x))                            </td> <td>   (sinh(x))                 </td> </tr> <tr> <td>
(sinh(x))                            </td> <td>   (cosh(x))                 </td> </tr> <tr> <td>
(tanh(x))                            </td> <td>   (sech^2(x))               </td> </tr> <tr> <td>
(sech(x))                            </td> <td>   (-sech(x)tanh(x))        </td> </tr> <tr> <td>
(cosech(x))                          </td> <td>   (-cosech(x)coth(x))      </td> </tr> <tr> <td>
(coth(x))                            </td> <td>   (-cosech^2(x))            </td> </tr>
</table>
</center>

 [ frac{d}{dx}left(sin^{-1}(x)right) =  frac{1}{sqrt{1-x^2}}]
 [ frac{d}{dx}left(cos^{-1}(x)right) =  frac{-1}{sqrt{1-x^2}}]
 [ frac{d}{dx}left(tan^{-1}(x)right) =  frac{1}{1+x^2}]
 [ frac{d}{dx}left(cosh^{-1}(x)right) =  frac{1}{sqrt{x^2-1}}]
 [ frac{d}{dx}left(sinh^{-1}(x)right) =  frac{1}{sqrt{x^2+1}}]
 [ frac{d}{dx}left(tanh^{-1}(x)right) =  frac{1}{1-x^2}]';
$string['calc_diff_standard_derivatives_name'] = 'Derivadas estándar';
$string['calc_int_linearity_rule_fact'] = '[int left(af(x)+bg(x)right){rm d}x = aint!!f(x),{rm d}x
,+,bint !!g(x),{rm d}x, quad (a,b , , {rm constant})
]';
$string['calc_int_linearity_rule_name'] = 'A regra de linearidade para a integración';
$string['calc_int_methods_parts_fact'] = '[
int_a^b u{{rm d}vover {rm d}x}{rm d}x=left[uvright]_a^b-
int_a^b{{rm d}uover {rm d}x}v,{rm d}x
]
Ou ben: [int_a^bf(x)g(x),{rm d}x=left[f(x),int
g(x){rm d}xright]_a^b -int_a^b{{rm d}fover {rm
d}x}left{int g(x){rm d}xright}{rm d}x ]';
$string['calc_int_methods_parts_name'] = 'Integración por partes';
$string['calc_int_methods_substitution_fact'] = '[
int f(u){{rm d}uover {rm d}x}{rm d}x=int f(u){rm d}u
quadhbox{and}quad int_a^bf(u){{rm d}uover {rm d}x},{rm
d}x = int_{u(a)}^{u(b)}f(u){rm d}u
]';
$string['calc_int_methods_substitution_name'] = 'Integración por substitución';
$string['calc_int_standard_integrals_fact'] = '[int k dx = kx +c, mbox{ onde k é a constante.}]
[int x^n dx  = frac{x^{n+1}}{n+1}+c, quad (nne -1)]
[int x^{-1} dx = int {frac{1}{x}} dx = ln(|x|)+c = ln(k*|x|) = left{matrix{ln(x)+c & x>0cr
ln(-x)+c & x<0cr}right.]

<center>
<table>
<tr><th>(f(x))</th><th> (int f(x) dx)</th></tr>
<tr><td>(e^x) </td> <td>  (e^x+c)</td> <td> </td> </tr>
<tr><td>(cos(x)) </td> <td>  (sin(x)+c)   </td> <td> </td> </tr>
<tr><td>(sin(x)) </td> <td>  (-cos(x)+c)  </td> <td> </td> </tr>
<tr><td>(tan(x)) </td> <td>  (ln(sec(x))+c) </td> <td>(-frac{pi}{2} < x < frac{pi}{2})</td> </tr>
<tr><td>(sec x)  </td> <td>  (ln (sec(x)+tan(x))+c) </td> <td> ( -{piover 2}< x < {piover 2})</td> </tr>
<tr><td>cosec(, x) </td> <td>  (ln ($cosec$(x)-cot(x))+c) </td> <td>(0 < x < pi)</td> </tr>
<tr><td>cot(,x) </td> <td>  (ln(sin(x))+c) </td> <td>  (0< x< pi) </td> </tr>
<tr><td>(cosh(x)) </td> <td>  (sinh(x)+c)</td> <td></td> </tr>
<tr><td>(sinh(x)) </td> <td>  (cosh(x) + c) </td> <td> </td> </tr>
<tr><td>(tanh(x)) </td> <td>  (ln(cosh(x))+c)</td> <td> </td> </tr>
<tr><td>coth((x)) </td> <td>  (ln(sinh(x))+c )</td> <td>   (x>0)</td> </tr>
<tr><td>({1over x^2+a^2}) </td> <td>  ({1over a}tan^{-1}{xover a}+c)</td> <td> (a>0)</td> </tr>
<tr><td>({1over x^2-a^2}) </td> <td>  ({1over 2a}ln{x-aover x+a}+c) </td> <td>  (|x|>a>0)</td> </tr>
<tr><td>({1over a^2-x^2}) </td> <td>  ({1over 2a}ln{a+xover a-x}+c) </td> <td>   (|x|<a)</td> </tr>
<tr><td>({1over sqrt{x^2+a^2}}) </td> <td>  (sinh^{-1}left(frac{x}{a}right) + c) </td> <td> (a>0) </td> </tr>
<tr><td>({1over sqrt{x^2-a^2}}) </td> <td>  (cosh^{-1}left(frac{x}{a}right) + c) </td> <td>  (xgeq a > 0) </td> </tr>
<tr><td>({1over sqrt{x^2+k}}) </td> <td>  (ln (x+sqrt{x^2+k})+c)</td> <td> </td> </tr>
<tr><td>({1over sqrt{a^2-x^2}}) </td> <td>  (sin^{-1}left(frac{x}{a}right)+c)</td> <td>  (-aleq xleq a)  </td> </tr>
</table></center>';
$string['calc_int_standard_integrals_name'] = 'Integrais estándar';
$string['calc_product_rule_fact'] = 'A seguinte regra permite diferenciar as funcións que se multiplicaran
por xunto.  Asumimos que queremos diferenciar (f(x)g(x)) con respecto de (x).
[ frac{mathrm{d}}{mathrm{d}{x}} big(f(x)g(x)big) = f(x) cdot frac{mathrm{d} g(x)}{mathrm{d}{x}}  + g(x)cdot frac{mathrm{d} f(x)}{mathrm{d}{x}},] ou, usando a notación alternativa, [ (f(x)g(x))\' = f\'(x)g(x)+f(x)g\'(x). ]';
$string['calc_product_rule_name'] = 'A regra do produto';
$string['calc_quotient_rule_fact'] = 'A regra do cociente para a diferenciación dos estados para dúas funcións diferenciábeis (f(x)) e (g(x)),
 [frac{d}{dx}left(frac{f(x)}{g(x)}right)=frac{g(x)cdotfrac{df(x)}{dx}  -   f(x)cdot frac{dg(x)}{dx}}{g(x)^2}. ]';
$string['calc_quotient_rule_name'] = 'A regra do cociente';
$string['calc_rules_fact'] = '<b>A regra do produto</b><br />A seguinte regra permite diferenciar as funcións que se multiplicaran
por xunto.  Asumimos que queremos diferenciar (f(x)g(x)) con respecto de (x).
[ frac{mathrm{d}}{mathrm{d}{x}} big(f(x)g(x)big) = f(x) cdot frac{mathrm{d} g(x)}{mathrm{d}{x}}  + g(x)cdot frac{mathrm{d} f(x)}{mathrm{d}{x}},] ou, usando a notación alternativa, [ (f(x)g(x))\' = f\'(x)g(x)+f(x)g\'(x). ]
<b>A regra do cociente</b><br />A regra do cociente para a diferenciación dos estados para dúas funcións diferenciábeis (f(x)) e (g(x)),
[frac{d}{dx}left(frac{f(x)}{g(x)}right)=frac{g(x)cdotfrac{df(x)}{dx}  -   f(x)cdot frac{dg(x)}{dx}}{g(x)^2}. ]
<b>A regra da cadea</b><br />A seguinte regra permítelle atopar a derivada dunha composición de dúas funcións.
Asumimos que temos unha función (f(g(x))), definindo (u=g(x)), a derivada con respecto a (x) ven dada por:
[frac{df(g(x))}{dx} = frac{dg(x)}{dx}cdotfrac{df(u)}{du}.]
Ou ben, podemos escribir:
[frac{df(x)}{dx} = f\'(g(x))cdot g\'(x).]';
$string['calc_rules_name'] = 'Regras de cálculo';
$string['casdisplay'] = 'Visor do CAS';
$string['cassuitecolerrors'] = 'Erros do CAS';
$string['castext'] = 'Texto do CAS';
$string['casvalid'] = 'V2';
$string['casvalidatemismatch'] = '[validar discrepancia CAS]';
$string['casvalue'] = 'Valor do CAS';
$string['chat'] = 'Enviar ao CAS';
$string['chat_desc'] = 'O <a href="{$a->link}">CAS chat script</a> permítelle probar a conexión co CAS, e probar a sintaxe de Maxima.';
$string['chatintro'] = 'Esta páxina admite texto CAS para seren avaliado directamente. Tratase dun simple script que é un exemplo mínimo utilizábel, e un xeito práctico de comprobar se o CAS está a traballar, e para probar diferentes entradas.  A primeira caixa de texto admite as variábeis a definir, a segunda é para o texto CAS en si.';
$string['chattitle'] = 'Probar a conexión co CAS';
$string['checkanswertype'] = 'Comprobar o tipo de resposta';
$string['checkanswertype_help'] = 'Se é así, as respostas que son dun «tipo» diferente (p.ex. expresión, ecuación, matriz, lista, conxunto) son rexeitados como incorrectos.';
$string['checkanswertype_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Check_Type';
$string['clearthecache'] = 'Limpar a caché';
$string['completetestcase'] = 'Encha o resto da forma para facer que supere o caso de proba';
$string['complexno'] = 'Significado e vista de sqrt(-1)';
$string['complexno_help'] = 'Controla o significado e a vista do símbolo i e sqrt(-1)';
$string['complexno_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Options.md#sqrt_minus_one.';
$string['createtestcase'] = 'Crear casos de proba';
$string['currentlyselectedvariant'] = 'Esta é a variante que se amosa a seguir';
$string['ddl_empty'] = 'Non se ofreceron opcións para este despregábel. Introduza unha serie de valores como a,b,c,d';
$string['debuginfo'] = 'Información de depuración';
$string['defaultmarkzeroifnoprts'] = 'A marca predeterminada debe ser 0 se esta pregunta non ten ARP.';
$string['defaultprtcorrectfeedback'] = 'Resposta correcta, ben feito.';
$string['defaultprtincorrectfeedback'] = 'Resposta incorrecta.';
$string['defaultprtpartiallycorrectfeedback'] = 'A resposta só é parcialmente correcta.';
$string['deletetestcase'] = 'Eliminar o caso de proba {$a->no} para a pregunta {$a->question}';
$string['deletetestcaseareyousure'] = 'Confirma que quere eliminar o caso de proba {$a->no} para a pregunta {$a->question}?';
$string['deletethistestcase'] = 'Eliminar este caso de proba...';
$string['deploy'] = 'Despregar';
$string['deployedvariants'] = 'Variantes despregadas';
$string['deployedvariantsn'] = 'Variantes despregadas ({$a})';
$string['deploymany'] = 'Tentar despregar automaticamente o seguinte número de variantes:';
$string['deploymanyerror'] = 'Produciuse un erro na entrada do usuario: non é posíbel despregar «{$a->err}» variantes.';
$string['deploymanynonew'] = 'Xeráronse demasiadas notas repetidas de pregunta existente.';
$string['deploymanynotes'] = 'Teña en conta que STAC renunciará se hai 3 intentos fallados de xerar unha nova nota de pregunta, ou cando una proba de pregunte falle.';
$string['deploymanysuccess'] = 'Número de novas variantes creadas satisfactoriamente, probadas e despregadas: {$a->no}.';
$string['dropdowngotunrecognisedvalue'] = 'Entrada incorrecta.';
$string['editingtestcase'] = 'Editar o caso de proba {$a->no} para a pregunta {$a->question}';
$string['editthistestcase'] = 'Editar este caso de proba...';
$string['errors'] = 'Erros';
$string['exceptionmessage'] = '{$a}';
$string['expectedanswernote'] = 'Nota de resposta agardada';
$string['expectedoutcomes'] = 'Resultados agardados';
$string['expectedpenalty'] = 'Penalización agardada';
$string['expectedscore'] = 'Puntuación agardada';
$string['FacForm_UnPick_intfac'] = 'Necesita tomar un factor común.';
$string['FacForm_UnPick_morework'] = 'Vostede aínda pode traballar un pouco máis no termo {$a->m0}.';
$string['false'] = 'Falso';
$string['falsebranch'] = 'Rama falsa';
$string['falsebranch_help'] = 'Estes son os campos de control do que acontece cando non se supera a proba de resposta
### Mod e puntuación
Como se axusta a puntuación, = significa estabelecer a puntuación a valores particulares, +/- significa sumar ou restar a puntuación dada do total actual.

### Penalización
No modo adaptativo ou interactivo, acumula moita penalización

### Seguinte
Para ir a outro nodo ou para deterse

### Nota de resposta
Esta é unha etiqueta que é fundamental para a xeración de informes.  Foi deseñada para rexistrar a ruta de acceso único a través da árbore e o resultado de cada proba de resposta.  Xerase automaticamente, mais pode cambiarse por algo máis significativo.';
$string['feedbackfromprtx'] = '[ Intercambio de {$a}. ]';
$string['feedbackvariables'] = 'Intercambio de variábeis';
$string['feedbackvariables_help'] = 'O intercambio de variábeis permítenlle manipular calquera das entradas, así como as variábeis de preguntas, antes de percorrer a árbore.  As variábeis definidas aquí poden seren utilizadas en calquera outro lugar nesta árbore.';
$string['feedbackvariables_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/KeyVals.md#Feedback_variables';
$string['fieldshouldnotcontainplaceholder'] = '{$a->field} non debe conter ningún [[{$a->type}:...]] comodín.';
$string['firstnodemusthavelowestnumber'] = 'O primeiro nodo debe ter o número máis baixo.';
$string['fixdollars'] = 'Corrixir o carácter dólar';
$string['fixdollars_help'] = 'Esta opción é útil se está copiando e pegando (ou escribindo) TeX con delimitadores <code>$...$</code> e <code>$$...$$</code>. Estes delimitadores van seren substituídos polos delimitadores recomendados durante o proceso de gardado.';
$string['fixdollarslabel'] = 'Substituír <code>$...$</code> con <code>(...)</code> e <code>$$...$$</code> con <code>[...]</code> ao gardar.';
$string['forbiddendoubledollars'] = 'Empregue os delimitadores <code>(...)</code> para a liña de formulas e <code>[...]</code> para amosar as formulas. <code>$...$</code> e <code>$$...$$</code> non están permitidos. Na fin do formulario ten unha forma de corrixir automaticamente este problema.';
$string['forbidfloat'] = 'Prohibir punto flotante';
$string['forbidfloat_help'] = 'Se o estabelece a si, entón calquera resposta dun alumno que conteña un número de punto flotante será rexeitada como incorrecta.';
$string['forbidfloat_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Forbid_Floats';
$string['forbidwords'] = 'Palabras prohibidas';
$string['forbidwords_help'] = 'Esta é unha lista de cadeas de texto, separadas por comas, que están prohibidas nas respostas dos alumnos.';
$string['forbidwords_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/CASText.md#Forbidden_Words';
$string['generalfeedback'] = 'Intercambio xeral';
$string['generalfeedback_help'] = 'O intercambio xeral é CASText. O intercambio xeral, coñecido tamén como «solución traballada» amosase ao alumno unha vez que abordou a pregunta. A diferencia do intercambio, que depende da resposta dada polo alumno, o mesmo texto de intercambio xeral amosase a todos os alumnos.  Isto pode depender das variábeis de preguntas usadas na versión da pregunta.';
$string['generalfeedback_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/CASText.md#general_feedback';
$string['greek_alphabet_fact'] = '<center>
<table>
<tr><td>
 Maiúsculas, (quad) </td><td>  minúsculas, (quad) </td><td>  nome </td> </tr>   <tr> <td>
 (A)  </td><td>  (alpha)  </td><td>  alpha  </td> </tr>   <tr> <td>
 (B)  </td><td>  (beta)  </td><td>  beta </td> </tr>   <tr> <td>
 (Gamma)  </td><td>  (gamma)  </td><td>  gamma </td> </tr>   <tr> <td>
 (Delta)  </td><td>  (delta)  </td><td>  delta </td> </tr>   <tr> <td>
 (E)  </td><td>  (epsilon)  </td><td>  epsilon </td> </tr>   <tr> <td>
 (Z)  </td><td>  (zeta)  </td><td>  zeta </td> </tr>   <tr> <td>
 (H)  </td><td>  (eta)  </td><td>  eta </td> </tr>   <tr> <td>
 (Theta)  </td><td>  (theta)  </td><td>  theta </td> </tr>   <tr> <td>
 (K)  </td><td>  (kappa)  </td><td>  kappa </td> </tr>   <tr> <td>
 (M)  </td><td>  (mu)  </td><td>  mu </td> </tr>   <tr> <td>
 (N)  </td><td>  ) u)  </td><td>  nu </td> </tr>   <tr> <td>
 (Xi)  </td><td>  (xi)  </td><td>  xi </td> </tr>   <tr> <td>
 (O)  </td><td>  (o)  </td><td>  omicron </td> </tr>   <tr> <td>
 (Pi)  </td><td>  (pi)  </td><td>  pi </td> </tr>   <tr> <td>
 (I)  </td><td>  (iota)  </td><td>  iota </td> </tr>   <tr> <td>
 (P)  </td><td>  (rho) </td><td>  rho </td> </tr>   <tr> <td>
 (Sigma)  </td><td>  (sigma)  </td><td>  sigma </td> </tr>   <tr> <td>
 (Lambda)  </td><td>  (lambda)  </td><td>  lambda </td> </tr>   <tr> <td>
 (T)  </td><td>  (tau)  </td><td>  tau </td> </tr>   <tr> <td>
 (Upsilon)  </td><td>  (upsilon)  </td><td>  upsilon </td> </tr>   <tr> <td>
 (Phi)  </td><td>  (phi)  </td><td>  phi </td> </tr>   <tr> <td>
 (X)  </td><td>  (chi)  </td><td>  chi </td> </tr>   <tr> <td>
 (Psi)  </td><td>  (psi)  </td><td> psi </td> </tr>   <tr> <td>
 (Omega)  </td><td>  (omega)  </td><td>  omega </td></tr>
</table></center>';
$string['greek_alphabet_name'] = 'O alfabeto grego';
$string['healthcheck'] = 'Proba de integridade do STACK';
$string['healthcheckcache_db'] = 'Os resultados do CAS están a ser almacenados na caché da base de datos.';
$string['healthcheckcache_none'] = 'Os resultados do CAS non están na caché.';
$string['healthcheckcachestatus'] = 'A caché contén actualmente {$ a} entradas.';
$string['healthcheckconfig'] = 'Ficheiro de configuración de Maxima';
$string['healthcheckconfigintro1'] = 'Atopado, e usado, o Maxima no seguinte directorio:';
$string['healthcheckconfigintro2'] = 'Tentando escribir automaticamente o ficheiro de configuración do Maxima.';
$string['healthcheckconnect'] = 'Tentando conectar co CAS';
$string['healthcheckconnectintro'] = 'Tentando avaliar o seguinte texto CAS:';
$string['healthcheck_desc'] = 'O <a href="{$a->link}">script de proba de integridade</a> axúdalle a comprobar que todos os aspectos do STACK están funcionando correctamente.';
$string['healthcheckfilters'] = 'Asegúrese de que {$a->filter} está activado na páxina de <a href="{$a->url}">Administración de filtros</a>.';
$string['healthchecklatex'] = 'Comprobar que LaTeX está a ser convertido correctamente';
$string['healthchecklatexintro'] = 'STACK xera LaTeX ao voo, e permite que os profesores poidan escribir en LaTeX nas preguntas. Asúmese que LaTeX converterase nun filtro do Moodle.  Embaixo hai algún exemplos de expresións en liña e en LaTeX que deben aparecer correctamente no seu navegador.  Os problemas que aparezan aquí indican axustes incorrectos no filtro do Moodle, non fallas co STACK en si mesmo. STACK usa só a notación cun único ou cun dobre dólar, mais algúns autores de preguntas fian nas outras formas.';
$string['healthchecklatexmathjax'] = 'Unha forma de obter o trazado da ecuación para traballar, é copiar o seguinte código no axuste <b>da cabeceira</b> no <a href="{$a}">HTML Adicional</a>.';
$string['healthcheckmathsdisplaymethod'] = 'Método de vista de formulas que se está a usar: {$a}.';
$string['healthcheckmaximabat'] = 'Non se atopa o ficheiro maxima.bat';
$string['healthcheckmaximabatinfo'] = 'Este script tentou copiar automaticamente o script maxima.bat a  partires de «C:Program filesMaxima-1.xx.ybin» en «{$a}stack». Porén, semella que isto non funcionou.Copie manualmente o ficheiro.';
$string['healthcheckplots'] = 'Trazado gráfico';
$string['healthcheckplotsintro'] = 'Non debe haber dous trazados.  De observarse dous trazados idénticos, entón este é un erro no nomeado dos ficheiros de impresión. Se non devolve ningún erro, mais a seguir non se amosa un trazado, pode servirlle de axuda unha das seguintes solucións.  (i) comprobar os permisos de lectura nos dous directorios temporais. (ii) cambiar as opcións utilizadas por GNUPlot para crear a trama. Actualmente non existe unha interface web para estas opcións.';
$string['healthchecksamplecas'] = 'A derivada de @ x^4/(1+x^4) @ is [ frac{d}{dx} frac{x^4}{1+x^4} = @ diff(x^4/(1+x^4),x) @. ]';
$string['healthchecksampledisplaytex'] = '[sum_{n=1}^infty frac{1}{n^2} = frac{pi^2}{6}.]';
$string['healthchecksampleinlinetex'] = '(sum_{n=1}^infty frac{1}{n^2} = frac{pi^2}{6}).';
$string['healthchecksampleplots'] = 'A seguir dous exemplos de trazado.  @plot([x^4/(1+x^4),diff(x^4/(1+x^4),x)],[x,-3,3])@ @plot([sin(x),x,x^2,x^3],[x,-3,3],[y,-3,3])@';
$string['healthchecksstackmaximanotupdated'] = 'Semella que o STACK non foi actualizado correctamente. Vexa a páxina <a href="{$a}">Administración do sistema -> Notificacións</a>.';
$string['healthchecksstackmaximatooold'] = 'A versión antiga é descoñecida!';
$string['healthchecksstackmaximaversion'] = 'Versión do Máxima';
$string['healthchecksstackmaximaversionfixoptimised'] = '<a href="{$a->url}">Reconstruír o executable optimizado do Maxima</a>.';
$string['healthchecksstackmaximaversionfixserver'] = 'Reconstrúa o código do Maxima no servidor MaximaPool.';
$string['healthchecksstackmaximaversionfixunknown'] = 'Non está moi claro que foi o que sucedeu. Terá que depurar este problema pola súa conta.';
$string['healthchecksstackmaximaversionmismatch'] = 'As versións que está a usar das bibliotecas STACK-Maxima ({$a->usedversion}) non coincide coa agardada ({$a->expectedversion}) por esta versión do tipo de pregunta do STACK. {$a->fix}';
$string['healthchecksstackmaximaversionok'] = 'A versión que está a usar da biblioteca STACK-Maxima é a correcta e agardada ({$a->usedversion}).';
$string['healthuncached'] = 'Chamada a CAS non almacenada na caché';
$string['healthuncachedintro'] = 'Esta sección sempre manda unha chamada xenuína ao CAS, sen importar as configuracións actuais da caché. Isto é necesario para asegurar que a conexión ao CAS realmente está traballando.';
$string['healthuncachedstack_CAS_not'] = 'CAS devolveu algúns datos como se agardaba, mais houbo erros.';
$string['healthuncachedstack_CAS_ok'] = 'CAS devolveu algúns datos como se agardaba.  Ten unha conexión viva ao CAS.';
$string['htmlfragment'] = 'Parece que ten algúns elementos HTML na súa expresión.';
$string['hyp_functions_fact'] = 'As funcións hiperbólicas teñen propiedades semellantes ás funcións trigonométricas, mais poden ser representadas en forma exponencial do seguinte xeito:
 [ cosh(x)      = frac{e^x+e^{-x}}{2}, qquad sinh(x)=frac{e^x-e^{-x}}{2} ]
 [ tanh(x)      = frac{sinh(x)}{cosh(x)} = frac{{e^x-e^{-x}}}{e^x+e^{-x}} ]
 [ {rm sech}(x) ={1over cosh(x)}={2over {rm e}^x+{rm e}^{-x}}, qquad  {rm cosech}(x)= {1over sinh(x)}={2over {rm e}^x-{rm e}^{-x}} ]
 [ {rm coth}(x) ={cosh(x)over sinh(x)} = {1over {rm tanh}(x)} ={{rm e}^x+{rm e}^{-x}over {rm e}^x-{rm e}^{-x}}]';
$string['hyp_functions_name'] = 'Funcións hiperbólicas';
$string['hyp_identities_fact'] = 'A similitude entre o comportamento das funcións hiperbólicas e as trigonométricas é evidente cando se observan algunhas identidades hiperbólicas básicas:
  [{rm e}^x=cosh(x)+sinh(x), quad {rm e}^{-x}=cosh(x)-sinh(x)]
  [cosh^2(x) -sinh^2(x) = 1]
  [1-{rm tanh}^2(x)={rm sech}^2(x)]
  [{rm coth}^2(x)-1={rm cosech}^2(x)]
  [sinh(xpm y)=sinh(x) cosh(y) pm cosh(x) sinh(y)]
  [cosh(xpm y)=cosh(x) cosh(y) pm sinh(x) sinh(y)]
  [sinh(2x)=2,sinh(x)cosh(x)]
  [cosh(2x)=cosh^2(x)+sinh^2(x)]
  [cosh^2(x)={cosh(2x)+1over 2}]
  [sinh^2(x)={cosh(2x)-1over 2}]';
$string['hyp_identities_name'] = 'Identidades hiperbólicas';
$string['hyp_inverse_functions_fact'] = '[cosh^{-1}(x)=lnleft(x+sqrt{x^2-1}right) quad mbox{ for } xgeq 1]
 [sinh^{-1}(x)=lnleft(x+sqrt{x^2+1}right)]
 [tanh^{-1}(x) = frac{1}{2}lnleft({1+xover 1-x}right) quad mbox{ for } -1< x < 1]';
$string['hyp_inverse_functions_name'] = 'Funcións hiperbólicas inversas';
$string['illegalcaschars'] = 'Non se admiten os caracteres @ e $ nas entradas CAS.';
$string['Illegal_floats'] = 'A súa resposta contén números de punto flotante, que non están permitidos nesta pregunta.  Ten que escribir os números como fraccións.  Por exemplo, debe escribir 1/3 non 0.3333, que despois de todo só é unha aproximación a un terzo.';
$string['inputdisplayed'] = 'Amosado como';
$string['inputentered'] = 'Valor introducido';
$string['inputexpression'] = 'Probar a entrada';
$string['inputextraoptions'] = 'Opcións adicionais';
$string['inputextraoptions_help'] = 'Algúns tipos de entrada requiren opcións adicionais para traballar. Pode introducilas. Este valor é unha expresión CAS.';
$string['inputextraoptions_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Extra options';
$string['inputheading'] = 'Entrada: {$a}';
$string['inputname'] = 'Nome da entrada';
$string['inputs'] = 'Entradas';
$string['inputstatus'] = 'Estado';
$string['inputstatusname'] = 'En branco';
$string['inputstatusnameinvalid'] = 'Incorrecto';
$string['inputstatusnamescore'] = 'Puntuación';
$string['inputstatusnamevalid'] = 'Correcto';
$string['inputtest'] = 'Proba de entrada';
$string['inputtype'] = 'Tipo de entrada';
$string['inputtypealgebraic'] = 'Entrada alxebraica';
$string['inputtypeboolean'] = 'Verdadeiro/Falso';
$string['inputtypedropdown'] = 'Lista despregábel';
$string['inputtype_help'] = 'Isto determina o tipo do elemento de entrada, p.ex. campo de formulario, verdadeiro/falso, área de texto.';
$string['inputtype_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md';
$string['inputtypematrix'] = 'Matriz';
$string['inputtypesinglechar'] = 'Carácter único';
$string['inputtypetextarea'] = 'Área de texto';
$string['insertstars'] = 'Inserir estrelas';
$string['insertstars_help'] = 'Se o estabelece en si, entón o sistema insire automaticamente «*» nalgúns patróns identificados pola sintaxe estrita.  Pola contra, amosase un erro.';
$string['insertstars_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Insert_Stars';
$string['inversetrig'] = 'Funcións trigonométricas inversas';
$string['inversetrig_help'] = 'Controla como se amosan as funcións trigonométricas na saída do CAS.';
$string['inversetrig_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Options.md#inverse_trig';
$string['irred_Q_commonint'] = 'Necesita tomar un factor común.';
$string['irred_Q_factored'] = 'O termo {$a->m0} debe estar sen factorizar, mais non o está.';
$string['irred_Q_optional_fac'] = 'Vostede podería traballar un pouco máis, xa que {$a->m0} pode ser factorizado un pouco máis.  Porén non é necesario.';
$string['Lowest_Terms'] = 'A súa resposta contén fraccións que non están escritas na súa mínima expresión.  Cancele os factores e tenteo de novo.';
$string['Maxima_DivisionZero'] = 'División por cero.';
$string['multcross'] = 'Cruz';
$string['multdot'] = 'Punto';
$string['multiplicationsign'] = 'Signo de multiplicación';
$string['multiplicationsign_help'] = 'Controla como amosar os signos de multiplicación.';
$string['multiplicationsign_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Options.md#multiplication';
$string['mustverify'] = 'Ten que verificalo o alumno';
$string['mustverify_help'] = 'Especifica se a entrada do alumno debe presentárselle de novo antes de puntuala.';
$string['mustverify_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Student_must_verify';
$string['namealreadyused'] = 'Xa utilizou este nome.';
$string['newnameforx'] = 'Novo nome para «{$a}»';
$string['next'] = 'Seguinte';
$string['nextcannotbeself'] = 'Non pode ligarse un nodo a si mesmo como se fose o seguinte nodo.';
$string['nodehelp'] = 'Nodo de árbore de resposta';
$string['nodehelp_help'] = '### Proba de resposta
A proba de resposta utilizase para comparar dúas expresións para estabelecer se cumpren algúns criterios matemáticos.

### SAns
Este é o primeiro argumento da función de proba de resposta.  Nas probas asimétricas considerase que esta é a «resposta do alumno» (S[tudent\'s] Ans[wer]) aínda que pode ser calquera expresión CAS correcta, e pode depender das variábeis de pregunta ou das variábeis de realimentación.

### TAns
Este é o segundo argumento da función de proba de resposta.  Nas probas asimétricas considerase que esta é a «resposta do profesor» (T[eacher\'s] Ans[wer]) aínda que pode ser calquera expresión CAS correcta, e pode depender das variábeis de pregunta ou das variábeis de realimentación.

### Opcións de proba
Este campo permite que as probas de resposta acepten unha opción, p.ex. unha variábel ou unha precisión numérica.

### Silencioso
Se o estabelece en si, calquera realimentación xerada automaticamente polas probas de resposta é suprimida e non é amosada ao alumno.  Os campos de realimentación nas ramas non se ven afectadas por esta opción.';
$string['nodeloopdetected'] = 'Esta ligazón crea un ciclo nesta ARP.';
$string['nodenotused'] = 'Non hai outros nodos na ligazón ARP a este nodo.';
$string['nodex'] = 'Nodo {$a}';
$string['nodexdelete'] = 'Eliminar o nodo {$a}';
$string['nodexfalsefeedback'] = 'Nodo {$a} intercambio falso';
$string['nodextruefeedback'] = 'Nodo {$a} intercambio verdadeiro';
$string['nodexwhenfalse'] = 'Nodo {$a} cando é falso';
$string['nodexwhentrue'] = 'Nodo {$a} cando é verdadeiro';
$string['nonempty'] = 'Isto non pode estar baleiro.';
$string['noprtsifnoinputs'] = 'Unha pregunta sen entradas non pode ter ningunha ARP.';
$string['notanswered'] = 'Sen resposta';
$string['notavalidname'] = 'O nome non é correcto';
$string['notestcasesyet'] = 'Aínda non foron engadidos casos de proba.';
$string['options'] = 'Opcións';
$string['optionsnotrequired'] = 'Este tipo de entrada non require de ningunha opción.';
$string['overallresult'] = 'Resultado global';
$string['penalty'] = 'Penalización';
$string['penaltyerror'] = 'A penalización debe ser un valor numérico entre 0 e 1.';
$string['penaltyerror2'] = 'A penalización debe estar baleiro, ou ser un valor numérico entre 0 e 1.';
$string['penalty_help'] = 'O sistema de penalizacións deduce este valor a partires del resultado de cada ARP para cada intento diferente e válido que non sexa completamente correcto.';
$string['penalty_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Feedback.md';
$string['phpcasstring'] = 'Saída do PHP';
$string['phpsuitecolerror'] = 'Erros do PHP';
$string['phpvalid'] = 'V1';
$string['phpvalidatemismatch'] = '[validar discrepancia PHP]';
$string['pleaseananswerallparts'] = 'Responda a todas as partes da pregunta.';
$string['pleasecheckyourinputs'] = 'Comprobe que o que introduciu foi interpretado como se agardaba.';
$string['pluginname'] = 'STACK';
$string['pluginnameadding'] = 'Engadindo unha pregunta STACK';
$string['pluginnameediting'] = 'Editando unha pregunta STACK';
$string['pluginname_help'] = 'STACK é un sistema de avaliación para as matemáticas.';
$string['pluginnamesummary'] = 'STACK fornece preguntas matemáticas para as probas do Moodle.  Estas empregan un sistema de álxebra computacional para estabelecer as propiedades matemáticas das respostas dos alumnos.';
$string['prtcorrectfeedback'] = 'Realimentación estándar para a correcta';
$string['prtheading'] = 'Árbore de respostas posíbeis: {$a}';
$string['prtincorrectfeedback'] = 'Realimentación estándar para a incorrecta';
$string['prtmustbesetup'] = 'A ARP debe ser estabelecida antes de que poida seren gardada a pregunta.';
$string['prtname'] = 'Nome da ARP';
$string['prtnodesheading'] = 'Nodos de árbores de respostas posíbeis ({$a})';
$string['prtpartiallycorrectfeedback'] = 'Realimentación estándar para a parcialmente correcta';
$string['prts'] = 'Árbores de respostas posíbeis';
$string['prtwillbecomeactivewhen'] = 'Esta árbore de respostas posíbeis, activarase cando o alumno responda: {$a}';
$string['qm_error'] = 'A súa resposta contén caracteres de signo de interrogación «?», que non están permitidos nas respostas.  Debe substituílos por un valor específico.';
$string['questiondoesnotuserandomisation'] = 'Esta pregunta non utiliza a asignación ao chou.';
$string['questionnotdeployedyet'] = 'Aínda non foron despregadas variantes desta pregunta.';
$string['questionnote'] = 'Nota de pregunta';
$string['questionnote_help'] = 'A nota de pregunta é CASText.  O propósito dunha nota de pregunta é distinguir entre as versións ao chou dunha pregunta. Dúas versións de pregunta son iguais se, e só se, as notas de preguntas son iguais.  Nunha análise posterior é moi útil para deixar unha nota de pregunta significativa.';
$string['questionnote_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Question_note.md';
$string['questionnotempty'] = 'A nota de pregunta non pode estar baleira cando aparece rand() nas variábeis da pregunta.  As notas de pregunta úsanse para distinguir entre diferentes versións ao chou dunha pregunta.';
$string['questionpreview'] = 'Vista previa da pregunta';
$string['questionsimplify'] = 'Simplificar o nivel da pregunta';
$string['questionsimplify_help'] = 'Estabelece a variábel global «simp» dentro de Maxima para toda a pregunta.';
$string['questionsimplify_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/CAS/Maxima.md#Simplification';
$string['questiontests'] = 'Probas da pregunta';
$string['questiontext'] = 'Texto da pregunta';
$string['questiontextfeedbackonlycontain'] = 'O texto da pregunta xunto coa información específica só debe conter o símbolo «{$a}» unha vez.';
$string['questiontext_help'] = 'O texto da pregunta é CASText.  Isto é a «pregunta» que realmente ve o alumno.  Debe poñer os elementos de entrada, e as cadeas de validación, neste campo, e só neste campo.  Por exemplo, usando «[[input:ans1]] [[validation:ans1]]».';
$string['questiontext_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/CASText.md#question_text';
$string['questiontextmustcontain'] = 'O texto da pregunta debe conter o símbolo «{$a}».';
$string['questiontextnonempty'] = 'O texto da pregunta non debe estar baleiro.';
$string['questiontextonlycontain'] = 'O texto da pregunta só debe conter o símbolo «{$a}» unha vez.';
$string['questiontextplaceholderswhitespace'] = 'Os comodíns non poden conter espazos en branco. Este aparenta facelo: «{$a}»';
$string['questionvalue'] = 'Valor da pregunta';
$string['questionvaluepostive'] = 'O valor da pregunta ten que ser positivo';
$string['questionvariables'] = 'Variábeis da pregunta';
$string['questionvariables_help'] = 'Este campo permítelle definir e manipular as variábeis do CAS, p.ex. para crear versións ao chou.  Estas están dispoñíbeis para todas as partes da pregunta.';
$string['questionvariables_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/KeyVals.md';
$string['quiet'] = 'Silencioso';
$string['quiet_help'] = 'Se o estabelece en si, calquera realimentación xerada automaticamente polas probas de resposta é suprimida e non é amosada ao alumno.  Os campos de realimentación nas ramas non se ven afectadas por esta opción.';
$string['renamequestionparts'] = 'Renomear as partes da pregunta';
$string['replacedollarscount'] = 'Esta categoría contén {$a} preguntas STACK.';
$string['replacedollarsin'] = 'Delimitadores matemáticos fixos no campo {$a}';
$string['replacedollarsindex'] = 'Contextos con preguntas STACK';
$string['replacedollarsindexintro'] = 'Premer en calquera ligazón levarao a unha páxina na que pode revisar os delimitadores ao estilo antigo nas preguntas, e corrixilos de forma automática.';
$string['replacedollarsindextitle'] = 'Substituír $s nos textos das preguntas';
$string['replacedollarsnoproblems'] = 'Non se atoparon problemas cos delimitadores.';
$string['replacedollarstitle'] = 'Substituír $s nos textos das preguntas en {$a}';
$string['requiredfield'] = 'Este campo é obrigatorio!';
$string['requirelowestterms'] = 'Esixir a mínima expresión';
$string['requirelowestterms_help'] = 'Cando se estabelece esta opción a si, calquera coeficiente ou outros números racionais nunha expresión, deben ser escritos na súa mínima expresión.  Do contrario rexeitarase a resposta como incorrecta.';
$string['requirelowestterms_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Require_lowest_terms';
$string['runquestiontests'] = 'Probas de preguntas e variantes despregadas';
$string['sans'] = 'SAns';
$string['sans_help'] = 'Este é o primeiro argumento da función de proba de resposta.  Nas probas asimétricas considerase que esta é a «resposta do alumno» (S[tudent\'s] Ans[wer]) aínda que pode ser calquera expresión CAS correcta, e pode depender das variábeis de pregunta ou das variábeis de realimentación.';
$string['sansinvalid'] = 'SAns é incorrecta: {$a}';
$string['sans_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Answer_tests.md';
$string['sansrequired'] = 'SAns non pode estar baleira.';
$string['score'] = 'Puntuación';
$string['scoreerror'] = 'A puntuación debe ser un valor numérico entre 0 e 1.';
$string['scoremode'] = 'Mod';
$string['seedx'] = 'Semente {$a}';
$string['settingajaxvalidation'] = 'Validación instantánea';
$string['settingajaxvalidation_desc'] = 'Con esta opción activada, a entrada actual dos alumnos validarase cando deteña a escritura. Isto fornece unha mellor experiencia de usuario, mais é probábel que aumente a carga do servidor.';
$string['settingcasdebugging'] = 'Depuración do CAS';
$string['settingcasdebugging_desc'] = 'Para almacenar a información de depuración sobre a conexión do CAS.';
$string['settingcasmaximaversion'] = 'Versión do Máxima';
$string['settingcasmaximaversion_desc'] = 'A versión do Maxima que está a empregar.';
$string['settingcasresultscache'] = 'Resultado do almacenado do CAS na caché';
$string['settingcasresultscache_db'] = 'Almacenar na caché da base de datos';
$string['settingcasresultscache_desc'] = 'Este axuste determina se as chamadas ao CAS se almacenan na caché. Este axuste debe activarse a non ser que vostede estea a facer un desenvolvemento que implique cambiar o código do Maxima. O estado actual da memoria caché amosase na páxina da proba de integridade.  Se cambia a configuración, p.ex. a orde do gnuplot, terá que limpar a caché antes de que poida ver os efectos destes cambios.';
$string['settingcasresultscache_none'] = 'Non almacenar na caché';
$string['settingcastimeout'] = 'Excedeuse o tempo de conexión para CAS';
$string['settingcastimeout_desc'] = 'O tempo de espera ao tentar conectar co Maxima.';
$string['settingdefaultinputoptions'] = 'Opcións predeterminadas de entrada';
$string['settingdefaultinputoptions_desc'] = 'Utilizase cando se crea unha nova pregunta, ou se engade unha nova entrada a unha pregunta existente.';
$string['settingdefaultquestionoptions'] = 'Opcións predeterminadas de entrada';
$string['settingdefaultquestionoptions_desc'] = 'Utilizase cando se crea unha nova pregunta.';
$string['settingmathsdisplay'] = 'Filtro de formula';
$string['settingmathsdisplay_desc'] = 'O método utilizado para amosar as formulas. Se selecciona MathJax, entón terá que seguir as instrucións que aparecen na página de proba de integridade para configuralo. Se selecciona un filtro, entón ten que asegurarse de que o filtro está activado na páxina de configuración de Administración dos filtros.';
$string['settingmathsdisplay_mathjax'] = 'MathJax';
$string['settingmathsdisplay_maths'] = 'Filtro de formulas OU';
$string['settingmathsdisplay_tex'] = 'Filtro do TeX do Moodle';
$string['settingplatformmaximacommand'] = 'Orde do Maxima';
$string['settingplatformmaximacommand_desc'] = 'STACK necesita coñecer a orde de terminal para iniciar o Maxima.  Se está en branco, STACK fará una suposición.';
$string['settingplatformplotcommand'] = 'Orde de trazado';
$string['settingplatformplotcommand_desc'] = 'STACK necesita coñecer a orde do gnuplot.  Se está en branco, STACK fará una suposición.';
$string['settingplatformtype'] = 'Tipo de plataforma';
$string['settingplatformtype_desc'] = 'STACK necesita saber que tipo de sistema operativo está a executarse. As opcións Servidor e MaximaPool dan un mellor rendemento a costa de ter que configurar un servidor adicional. As opcións «Linux (optimizado)» e «MaximaPool (optimizado)» explícanse na páxina Optimización de Maxima na documentación.';
$string['settingplatformtypeserver'] = 'Servidor';
$string['settingplatformtypeunix'] = 'Linux';
$string['settingplatformtypeunixoptimised'] = 'Linux (optimizado)';
$string['settingplatformtypewin'] = 'Windows';
$string['settingreplacedollars'] = 'Substituír <code>$</code> e <code>$$</code>';
$string['settingreplacedollars_desc'] = 'Substituír os delimitadores <code>$...$</code> e <code>$$...$$</code> no texto da pregunta, por <code>[...]</code> e <code>(...)</code>. A mellor opción é que empregue o script «Fixar os delimitadores de formulas» ao que se fai referencia máis adiante.';
$string['settingsmathsdisplayheading'] = 'Opcións de vista para as formulas';
$string['settingsmaximasettings'] = 'Conectando co Maxima';
$string['settingusefullinks'] = 'Ligazóns útiles';
$string['showingundeployedvariant'] = 'Amosar as variantes sen despregar: {$a}';
$string['showvalidation'] = 'Amosar a validación';
$string['showvalidation_help'] = 'Estabelecendo esta opción, amosase calquera comentario desta entrada de validación, incluíndo a repetición da súa expresión en notación tradicional de dúas dimensións.';
$string['showvalidation_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Show_validation';
$string['singlechargotmorethanone'] = 'Aquí só se pode introducir un carácter único.';
$string['specificfeedback'] = 'Realimentación específica';
$string['specificfeedback_help'] = 'De forma predeterminada, amósanse neste bloque os comentarios para cada árbore de respostas posíbeis.  Pode mover o texto da pregunta, en cuxo caso Moodle terá menos control sobre cando se amosa segundo os diversos comportamentos.  Teña en conta que este bloque non é CASText.';
$string['specificfeedbacktags'] = 'As realimentacións específicas non deben conter o(s) símbolo(s) «{$a}».';
$string['sqrtsign'] = 'Irracional para raíz cadrada';
$string['sqrtsign_help'] = 'Controla como se amosan os números irracionais.';
$string['sqrtsign_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Options.md#surd';
$string['stackCas_allFailed'] = 'CAS non devolveu as expresións avaliadas.  Comprobe a conexión co CAS.';
$string['stackCas_apostrophe'] = 'Non están permitidos os apóstrofos nas respostas.';
$string['stackCas_backward_inequalities'] = 'Desigualdades non estritas, p.ex. ( leq ) ou ( geq ) deben introducirse como <= ou >=.  Ten {$a->cmd} na súa expresión, que está do revés.';
$string['stackCas_bracketsdontmatch'] = 'Os corchetes non están correctamente aniñados na expresión: {$a->cmd}.';
$string['stackCas_CASError'] = 'O CAS devolveu o(s) seguinte(s) erro(s):';
$string['stackCas_CASErrorCaused'] = 'provocou o seguinte erro:';
$string['stackCas_chained_inequalities'] = 'Semella que ten «desigualdades encadeadas» p,ex. (a &lt b &lt c).  É necesario conectar as desigualdades individuais coas operacións lóxicas tales como (and) ou (or).';
$string['stackCas_failedReturn'] = 'CAS non devolveu ningún dato.';
$string['stackCas_failedValidation'] = 'Non foi posíbel validar o CASText';
$string['stackCas_finalChar'] = '«{$a->char}» é un carácter final incorrecto en {$a->cmd}';
$string['stackCas_forbiddenChar'] = 'As ordes do CAS non poden conter os seguintes caracteres: {$a->char}.';
$string['stackCas_forbiddenWord'] = 'A expresión {$a->forbid} está prohibida.';
$string['stackCas_invalidCommand'] = 'Ordes CAS incorrectas.';
$string['stackCas_MissingAt'] = 'Botase a faltar o signo <code>@</code>.';
$string['stackCas_MissingCloseDisplay'] = 'Falta <code>]</code>.';
$string['stackCas_MissingCloseHTML'] = 'Falta o peche da etiqueta html.';
$string['stackCas_MissingCloseInline'] = 'Falta <code>)</code>.';
$string['stackCas_MissingClosingHint'] = 'Falta o /indicio de peche';
$string['stackCas_MissingDollar'] = 'Botase a faltar o signo <code>$</code>.';
$string['stackCas_missingLeftBracket'] = 'Falta o corchete esquerdo <span class="stacksyntaxexample">{$a->bracket}</span> na expresión: {$a->cmd}.';
$string['stackCas_MissingOpenDisplay'] = 'Falta <code>[</code>.';
$string['stackCas_MissingOpenHint'] = 'Falta o indicio de apertura.';
$string['stackCas_MissingOpenHTML'] = 'Falta a apertura da etiqueta html.';
$string['stackCas_MissingOpenInline'] = 'Falta <code>(</code>.';
$string['stackCas_missingRightBracket'] = 'Falta o corchete dereito <span class="stacksyntaxexample">{$a->bracket}</span> na expresión: {$a->cmd}.';
$string['stackCas_MissingStars'] = 'Semella que faltan caracteres *. É probábel que quixera escribir {$a->cmd}.';
$string['stackCas_MissingString'] = 'Falta o signo de cotado <code>"</code>.';
$string['stackCas_newline'] = 'Non están permitidos os caracteres de liña nova nas respostas.';
$string['stackCas_percent'] = 'Atopouse &#037; na expresión {$a->expr}.';
$string['stackCas_spaces'] = 'Atopáronse espazos na expresión {$a->expr}.';
$string['stackCas_spuriousop'] = 'Operador descoñecido: {$a->cmd}.';
$string['stackCas_tooLong'] = 'A declaración CASText é longa de máis.';
$string['stackCas_unknownFunction'] = 'Función descoñecida: {$a->forbid}.';
$string['stackCas_unsupportedKeyword'] = 'Palabra clave non admitida: {$a->forbid}.';
$string['stackDoc_404'] = 'Erro 404';
$string['stackDoc_404message'] = 'Non se atopou o ficheiro.';
$string['stackDoc_directoryStructure'] = 'Estrutura do directorio';
$string['stackDoc_docs'] = 'Documentación do STAK';
$string['stackDoc_docs_desc'] = '<a href="{$a->link}">Documentación do STACK</a>: un wiki local estático.';
$string['stackDoc_home'] = 'Inicio da documentación';
$string['stackDoc_index'] = 'Índice de categorías';
$string['stackDoc_parent'] = 'Primaria';
$string['stackDoc_siteMap'] = 'Mapa do sitio';
$string['stackInstall_input_intro'] = 'Esta páxina permite comprobar como interpreta STACK as diversas entradas dun alumno.  Actualmente só é comprobado cos valores máis liberais, tentando adoptar una sintaxe informal e a inserción de estrelas.  <br />Colunnas de rexistro de validez «V» segundo PHP e CAS.  V1 = PHP correcto, V2 = CAS correcto.';
$string['stackInstall_input_title'] = 'Un conxunto de probas de validación da entrada do alumno';
$string['stackInstall_input_title_desc'] = 'O <a href="{$a->link}">script de probas de entrada</a> ofrece casos de proba de como STACK interpreta as expresións matemáticas.  Tamén son útiles para aprender co exemplo.';
$string['stackInstall_replace_dollars_desc'] = 'O <a href="{$a->link}">script para fixar os delimitadores de formulas</a> pode empregarse para substituír os delimitadores ao estilo antigo como <code>$...$</code> e <code>$$...$$</code> nas súas preguntas polos novos recomendados <code>(...)</code> e <code>[...]</code>.';
$string['stackInstall_testsuite_choose'] = 'Escolla unha proba de resposta.';
$string['stackInstall_testsuite_fail'] = 'Non foron superadas todas as probas!';
$string['stackInstall_testsuite_intro'] = 'Esta páxina permítelle comprobar que as probas de resposta do STACK funcionan correctamente.  Teña en conta que, a través de la interface web, só se pode comprobar as probas de resposta.  Outras ordes do Maxima necesitan ser revisadas desde a liña de ordes: vexa «unittests.mac».';
$string['stackInstall_testsuite_pass'] = 'Superáronse todas as probas!';
$string['stackInstall_testsuite_title'] = 'Un banco de probas para as probas de resposta STACK';
$string['stackInstall_testsuite_title_desc'] = 'O <a href="{$a->link}">script de probas de resposta</a> verifica que as probas de resposta están funcionando correctamente. Tamén son útiles para aprender, por exemplo, como se pode utilizar cada proba de resposta.';
$string['stackOptions_AnsTest_values_AlgEquiv'] = 'AlgEquiv';
$string['stackOptions_AnsTest_values_CasEqual'] = 'CasEqual';
$string['stackOptions_AnsTest_values_CompSquare'] = 'CompletedSquare';
$string['stackOptions_AnsTest_values_Diff'] = 'Diff';
$string['stackOptions_AnsTest_values_EqualComAss'] = 'EqualComAss';
$string['stackOptions_AnsTest_values_Expanded'] = 'Expanded';
$string['stackOptions_AnsTest_values_FacForm'] = 'FacForm';
$string['stackOptions_AnsTest_values_GT'] = 'Num-GT';
$string['stackOptions_AnsTest_values_GTE'] = 'Num-GTE';
$string['stackOptions_AnsTest_values_Int'] = 'Int';
$string['stackOptions_AnsTest_values_LowestTerms'] = 'LowestTerms';
$string['stackOptions_AnsTest_values_NumAbsolute'] = 'NumAbsolute';
$string['stackOptions_AnsTest_values_NumDecPlaces'] = 'NumDecPlaces';
$string['stackOptions_AnsTest_values_NumRelative'] = 'NumRelative';
$string['stackOptions_AnsTest_values_NumSigFigs'] = 'NumSigFigs';
$string['stackOptions_AnsTest_values_PartFrac'] = 'PartFrac';
$string['stackOptions_AnsTest_values_RegExp'] = 'RegExp';
$string['stackOptions_AnsTest_values_SameType'] = 'SameType';
$string['stackOptions_AnsTest_values_SingleFrac'] = 'SingleFrac';
$string['stackOptions_AnsTest_values_String'] = 'String';
$string['stackOptions_AnsTest_values_StringSloppy'] = 'StringSloppy';
$string['stackOptions_AnsTest_values_SubstEquiv'] = 'SubstEquiv';
$string['stackOptions_AnsTest_values_SysEquiv'] = 'SysEquiv';
$string['stackQuestion_noQuestionParts'] = 'Este elemento non ten partes de preguntas para responder.';
$string['stop'] = '[deter]';
$string['strictsyntax'] = 'Sintaxe estricta';
$string['strictsyntax_help'] = 'A entrada ten que ser feita usando a sintaxe estrita do Maxima?  Se é que non, isto aumenta a gama de patróns que indican a falta de  * na entrada, incluíndo calquera aplicación de función ou notación científica.';
$string['strictsyntax_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Strict_Syntax';
$string['strlengtherror'] = 'Esta cadea non pode superar os 255 caracteres de lonxitude.';
$string['studentanswer'] = 'Resposta do alumno';
$string['studentValidation_invalidAnswer'] = 'Esta resposta non é correcta.';
$string['studentValidation_yourLastAnswer'] = 'A súa última resposta interpretase como seque: {$a}';
$string['Subst'] = 'A súa resposta sería correcta se utilizara a seguinte substitución de variábeis. {$a->m0}';
$string['switchtovariant'] = 'Cambiar á variante arbitraria';
$string['syntaxhint'] = 'Consello de sintaxe';
$string['syntaxhint_help'] = 'O consello de sintaxe aparecerá na caixa da resposta cada vez que o alumno o deixa en branco.';
$string['syntaxhint_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#Syntax_Hint';
$string['tans'] = 'TAns';
$string['tans_help'] = 'Este é o segundo argumento da función de proba de resposta.  Nas probas asimétricas considerase que esta é a «resposta do profesor» (T[eacher\'s] Ans[wer]) aínda que pode ser calquera expresión CAS correcta, e pode depender das variábeis de pregunta ou das variábeis de realimentación.';
$string['tansinvalid'] = 'TAns é incorrecta: {$a}';
$string['tans_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Answer_tests.md';
$string['tansrequired'] = 'SAns non pode estar baleira.';
$string['teacheranswer'] = 'Resposta do profesor';
$string['teachersanswer'] = 'Modelo de resposta';
$string['teachersanswer_help'] = 'O profesor debe especificar un modelo de resposta para cada entrada.  Esta debe ser unha cadea do Maxima correcta, e pode ser formada a partires das variábeis da pregunta.';
$string['teachersanswer_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Inputs.md#model_answer';
$string['testcasexresult'] = 'Caso de proba {$a->no} {$a->result}';
$string['TEST_FAILED'] = 'A proba de resposta non se executou correctamente: avise ao seu profesor. {$a->errors}';
$string['testingquestion'] = 'Probando a pregunta {$a}';
$string['testinputs'] = 'Probar as entradas';
$string['testinputsimpwarning'] = 'Teña en conta que as entradas de proba son sempre <em>sen simplificar</em>, independentemente da pregunta ou do axuste da opción da ARP.  Utilice <tt>ev(...,simp)</tt> para simplificar parte ou a totalidade das expresións da entrada de proba.';
$string['testoptions'] = 'Opcións de proba';
$string['testoptions_help'] = 'Este campo permite que as probas de resposta acepten unha opción, p.ex. unha variábel ou unha precisión numérica.';
$string['testoptionsinvalid'] = 'As opcións de proba son incorrectas: {$a}';
$string['testoptions_link'] = '%%WWWROOT%%/question/type/stack/doc/doc.php/Authoring/Answer_tests.md';
$string['testoptionsrequired'] = 'Requírense as opcións de proba para esta proba.';
$string['testpassesandfails'] = '{$a->passes} superadas e {$a->fails} falladas.';
$string['testsuitecolerror'] = 'Erros do CAS';
$string['testsuitecolexpectedscore'] = 'Marca agardada';
$string['testsuitecolpassed'] = 'Superada?';
$string['testsuitecolrawmark'] = 'Marca en bruto';
$string['testsuitefail'] = 'Fallo';
$string['testsuitefeedback'] = 'Intercambio';
$string['testsuiteknownfail'] = 'Fallo agardado';
$string['testsuiteknownfailmaths'] = 'Fallo agardado (matemáticas)';
$string['testsuitenotests'] = 'Número de probas: {$a->no}.';
$string['testsuitepass'] = 'Superar';
$string['testsuiteteststook'] = 'AS probas levaron: {$a->time} segundos.';
$string['testsuiteteststookeach'] = 'Tempo medio por proba: {$a->time} segundos.';
$string['testthisvariant'] = 'Cambiar para probar esta variante';
$string['texdisplaystyle'] = 'Ecuación estilo presentación';
$string['texinlinestyle'] = 'Ecuación estilo en liña';
$string['tidyquestion'] = 'Pregunta ordeada';
$string['tidyquestionx'] = 'Renomear as partes da pregunta {$a}';
$string['trig_degrees_radians_fact'] = '[
360^circ= 2pi hbox{ radians},quad
1^circ={2piover 360}={piover 180}hbox{ radians}
]
[
1 hbox{ radian} = {180over pi} hbox{ degrees}
approx 57.3^circ
]';
$string['trig_degrees_radians_name'] = 'Graos e radiáns';
$string['trig_standard_identities_fact'] = '[sin(apm b) =   sin(a)cos(b) pm  cos(a)sin(b)]
 [cos(a pm b) =   cos(a)cos(b) mp sin(a)sin(b)]
 [tan (a pm b) =   {tan (a) pm tan (b)over1 mp tan (a)tan (b)}]
 [ 2sin(a)cos(b) =   sin(a+b) + sin(a-b)]
 [ 2cos(a)cos(b) =   cos(a-b) + cos(a+b)]
 [ 2sin(a)sin(b)  =   cos(a-b) - cos(a+b)]
 [ sin^2(a)+cos^2(a) =   1]
 [ 1+{rm cot}^2(a) =   {rm cosec}^2(a),quad tan^2(a) +1  =   sec^2(a)]
 [ cos(2a) =   cos^2(a)-sin^2(a) =   2cos^2(a)-1 =   1-2sin^2(a)]
 [ sin(2a) =   2sin(a)cos(a)]
 [ sin^2(a)  =   {1-cos (2a)over 2}, qquad cos^2(a) =   {1+cos(2a)over 2}]';
$string['trig_standard_identities_name'] = 'Identidades trigonométricas estándar';
$string['trig_standard_values_fact'] = '[sin(45^circ)={1over sqrt{2}}, qquad cos(45^circ) = {1over sqrt{2}},qquad
tan( 45^circ)=1
]
[
sin (30^circ)={1over 2}, qquad cos (30^circ)={sqrt{3}over 2},qquad
tan (30^circ)={1over sqrt{3}}
]
[
sin (60^circ)={sqrt{3}over 2}, qquad cos (60^circ)={1over 2},qquad
tan (60^circ)={ sqrt{3}}
]';
$string['trig_standard_values_name'] = 'Valores trigonométricos estándar';
$string['true'] = 'Verdadeiro';
$string['truebranch'] = 'Rama verdadeira';
$string['truebranch_help'] = 'Estes son os campos de control do que acontece cando se supera a proba de resposta
### Mod e puntuación
Como se axusta a puntuación, = significa estabelecer a puntuación a valores particulares, +/- significa sumar ou restar a puntuación dada do total actual.

### Penalización
No modo adaptativo ou interactivo, acumula moita penalización

### Seguinte
Para ir a outro nodo ou para deterse

### Nota de resposta
Esta é unha etiqueta que é fundamental para a xeración de informes.  Foi deseñada para rexistrar a ruta de acceso único a través da árbore e o resultado de cada proba de resposta.  Xerase automaticamente, mais pode cambiarse por algo máis significativo.';
$string['undeploy'] = 'Sen despregar';
$string['variant'] = 'Variante';
$string['variantsselectionseed'] = 'Grupo aleatorio';
$string['variantsselectionseed_help'] = 'Normalmente pode deixar esta caixa en branco. Porén, se quere facer dúas preguntas diferentes nunha mesma proba, para utilizar a mesma semente ao chou, escriba a seguir a mesma cadea na caixa para as dúas preguntas (e despregar o mesmo conxunto de sementes ao chou, se está a usar versións despregadas) e así sincronizaranse as sementes ao ao chou das dúas preguntas.';
$string['verifyquestionandupdate'] = 'Verifique o texto da pregunta e actualice o formulario';
