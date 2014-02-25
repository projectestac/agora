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
 * Strings for component 'qtype_stack', language 'ja', branch 'MOODLE_24_STABLE'
 *
 * @package   qtype_stack
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addanothernode'] = '新しいノードを追加する';
$string['addanothertestcase'] = '新しいテストケースを追加する...';
$string['answernote'] = '解答記録';
$string['answertest'] = '評価関数';
$string['assumepositive'] = '正の仮定';
$string['assumepositive_help'] = 'このオプションはMaximaのassume_posオプションの値を設定します。';
$string['ATAlgEquiv_SA_not_expression'] = '解答は数式で行ってください。<br />ただし，方程式，不等式，リスト，集合，また行列などは入力しないでください。';
$string['ATAlgEquiv_SA_not_inequality'] = '不等式を入力してください。';
$string['ATAlgEquiv_SA_not_list'] = 'リストを入力してください。<br />リストは[角括弧]で囲まれたカンマ区切りで入力してください。';
$string['ATAlgEquiv_SA_not_matrix'] = '行列を入力してください。';
$string['ATAlgEquiv_SA_not_set'] = '集合を入力してください。<br />集合は波括弧（{...}）で囲まれたカンマ区切りの値で入力してください。';
$string['ATAlgEquiv_TA_not_equation'] = 'あなたの解答は方程式になっていますが，この問題は解答に方程式を要求していません。<br />「y=2*x+1」のような解答の場合は「2*x+1」とだけ入力してください。';
$string['ATCompSquare_not_AlgEquiv'] = 'あなたの解答は正しい書式のようですが，正解ではありません。';
$string['ATDiff_error_list'] = 'この評価関数には不具合が含まれています。システム管理者に問い合わせてください。';
$string['ATDiff_int'] = '間違って積分してませんか？';
$string['ATFacForm_error_degreeSA'] = 'CASはあなたの解答を処理できませんでした。';
$string['ATFacForm_error_list'] = 'この評価関数には不具合が含まれています。システム管理者に問い合わせてください。';
$string['ATFacForm_isfactored'] = '因数分解できています。';
$string['ATFacForm_notalgequiv'] = 'あなたの解答は正答と代数的に等価ではありません。どこか計算間違いをしていませんか？';
$string['ATFacForm_notfactored'] = 'あなたの解答は因数分解されていません。';
$string['ATInequality_backwards'] = '不等式が反対になっていませんか？';
$string['ATInequality_nonstrict'] = 'この問題の不等号は「＜」か「＞」である必要があります。';
$string['ATInequality_strict'] = 'この問題の不等号は「≤」か「≥」である必要があります。';
$string['ATInt_const'] = '積分定数を忘れていませんか？積分定数を追加すれば正解です。';
$string['ATInt_const_int'] = '積分定数がありません。積分定数は数値ではなく任意の定数である必要があります。';
$string['ATInt_diff'] = '間違って微分してませんか？';
$string['ATInt_EqFormalDiff'] = 'あなたの解答を微分すると，問題の非積分関数と確かに一致します。ところが，例えば，積分定数がない，などの意味で正解とことなっています。';
$string['ATInt_error_list'] = 'この評価関数には不具合が含まれています。システム管理者に問い合わせてください。';
$string['ATList_wrongentries'] = '赤字で示された部分が不正解です。{$a->m0}';
$string['ATList_wronglen'] = 'あなたの解のリストは {a->m1} 個の要素が含まれていますが，{a->m0} 個の要素が含まれているべきです。';
$string['ATLowestTerms_entries'] = '以下の項は約分が十分ではありません。{$a->m0} もう一度よく確認してください。';
$string['ATMatrix_wrongentries'] = '赤字で示された部分が不正解です。{$a->m0}';
$string['ATMatrix_wrongsz'] = 'あなたの入力した行列は{a->m0}×{a->m1}ですが，正しくは{a->m2}×{a->m3}です。';
$string['ATNumSigFigs_error_list'] = 'この評価関数には不具合が含まれています。サイト管理者に問い合わせてください。';
$string['ATNumSigFigs_NotDecimal'] = '解答は10進数でなければなりません。';
$string['ATNumSigFigs_WrongDigits'] = 'あなたの解答の桁数が間違っています。';
$string['autosimplify'] = '自動簡略化';
$string['autosimplify_help'] = 'このポテンシャル・レスポンス・ツリーに対して，Maximaのsimpフラグを有効にします。';
$string['boxsize'] = '解答欄のサイズ';
$string['boxsize_help'] = '解答入力欄の大きさを設定します。';
$string['cassuitecolerrors'] = 'CASエラー';
$string['checkanswertype'] = '解答形式の確認';
$string['checkanswertype_help'] = 'このオプションをYesにすると，指定された形式と異なる形式の解答が提示された場合，解答が受け付けられません。';
$string['clearthecache'] = 'キャッシュを削除する';
$string['complexno'] = '虚数単位の表記';
$string['complexno_help'] = '虚数単位sqrt(-1)の表記を指定します。';
$string['debuginfo'] = 'デバッグ情報';
$string['defaultprtcorrectfeedback'] = 'よくできました。正解です!';
$string['defaultprtincorrectfeedback'] = '残念，間違いです。';
$string['defaultprtpartiallycorrectfeedback'] = '惜しい！部分的に正解です。';
$string['deploy'] = 'デプロイ';
$string['errors'] = 'エラー';
$string['exceptionmessage'] = '{$a}';
$string['FacForm_UnPick_intfac'] = '共通因子をくくり出す必要があります。';
$string['FacForm_UnPick_morework'] = '次の項は因数分解が可能です。{$a->m0}';
$string['feedbackvariables'] = 'フィードバック変数';
$string['feedbackvariables_help'] = 'ここで定義されたフィードバック変数と問題変数とを用いて入力された解答を処理することができます。フィードバック変数はポテンシャル・レスポンス・ツリーで共通に使うことができます。';
$string['forbidfloat'] = '浮動小数点数の禁止';
$string['forbidfloat_help'] = 'Yesが指定された場合，浮動小数点数（実数）で入力された解答は禁止されます。';
$string['forbidwords'] = '禁止ワード';
$string['forbidwords_help'] = '学生が解答を入力時に禁止する文字列を，カンマで区切って指定します。';
$string['healthcheck'] = 'STACK動作確認';
$string['healthcheckcache_db'] = 'CASの演算結果がデータベースにキャッシュされています。';
$string['healthcheckcache_none'] = 'CASの演算結果がキャッシされました。';
$string['healthcheckcachestatus'] = 'キャッシュは {$a} を含んでいます。';
$string['healthcheckconfig'] = 'Maxima設定ファイル';
$string['healthcheckconfigintro1'] = '次のディレクトリにMaximaが見つかり，使用されています。';
$string['healthcheckconfigintro2'] = 'Maximaの設定ファイルを自動生成しています。';
$string['healthcheckconnect'] = 'CASへ接続しています。';
$string['healthcheckconnectintro'] = '以下のCASテキストを評価しています。';
$string['healthchecklatex'] = 'LaTeXが正しく変換されているかチェックしています。';
$string['healthcheckmaximabat'] = 'maxima.batファイルが見つかりません。';
$string['Illegal_floats'] = 'あなたの解答には小数が含まれています。整数または分数で解答してください。<br/>例：0.3333ではなく1/3と入力してください。';
$string['inputentered'] = '入力値';
$string['inputexpression'] = '入力テスト';
$string['inputheading'] = '解答欄: {$a}';
$string['inputname'] = '入力された名前';
$string['inputstatus'] = '状態';
$string['inputstatusname'] = '空白';
$string['inputstatusnameinvalid'] = '無効';
$string['inputstatusnamescore'] = '採点';
$string['inputstatusnamevalid'] = '有効';
$string['inputtest'] = '入力テスト';
$string['inputtype'] = '解答形式';
$string['inputtypealgebraic'] = '数式';
$string['inputtypeboolean'] = '○/×';
$string['inputtypedropdown'] = 'ドロップダウンリスト';
$string['inputtype_help'] = '解答の形式を指定します。';
$string['inputtypematrix'] = '行列';
$string['inputtypesinglechar'] = '単一文字';
$string['inputtypetextarea'] = 'テキストエリア';
$string['insertstars'] = '*(積)の自動入力';
$string['insertstars_help'] = '「Yes」が選択されると，システムによって積と判定される部分に自動的に * を挿入します。それ以外はエラーとなります。';
$string['Lowest_Terms'] = 'あなたの解答には約分出来ていない箇所があります。もう一度よく見直して入力してください。';
$string['Maxima_DivisionZero'] = 'あなたの解答には0で割られている箇所があります。もう一度見直して入力してください。';
$string['multcross'] = 'クロス (×)';
$string['multdot'] = 'ドット (・)';
$string['multiplicationsign'] = '積の記号';
$string['multiplicationsign_help'] = '積の演算子の表記を定義します。';
$string['mustverify'] = '解答書式の自己確認';
$string['mustverify_help'] = '学生が入力した解答書式を学生自ら確認するかどうかを指定します。';
$string['next'] = '次のノード';
$string['nodex'] = 'ノード {$a}';
$string['nodexfalsefeedback'] = 'ノード {no}: Falseの場合のフィードバック';
$string['nodextruefeedback'] = 'ノード {no}: Trueの場合のフィードバック';
$string['nodexwhenfalse'] = 'ノード {no}: False';
$string['nodexwhentrue'] = 'ノード {no}: True';
$string['nonempty'] = '空白にできません。';
$string['options'] = 'オプション';
$string['penalty'] = '減点';
$string['penaltyerror'] = '原点は0から1の間の数値としてください。';
$string['penaltyerror2'] = '原点は空欄か，0から1の間の数値としてください。';
$string['penalty_help'] = '部分点を与える場合，ポテンシャル・レスポンス・ツリーの結果に応じてここで指定した点数を減点していきます。';
$string['phpcasstring'] = 'PHP出力';
$string['phpsuitecolerror'] = 'PHPエラー';
$string['pluginname'] = 'STACK';
$string['pluginnameadding'] = 'STACK問題の追加';
$string['pluginnameediting'] = 'STACK問題の編集';
$string['pluginname_help'] = 'STACKは数学オンラインテスト・評価システムです。';
$string['pluginnamesummary'] = 'STACKは数式で解答する形式の問題を可能にします。数式処理システムを用いて，解答の正誤評価や解答に応じた様々なフィードバックの提示を実現します。';
$string['prtcorrectfeedback'] = '正解の場合のフィードバック';
$string['prtheading'] = 'ポテンシャル・レスポンス・ツリー: {$a}';
$string['prtincorrectfeedback'] = '不正解の場合のフィードバック';
$string['prtname'] = 'ポテンシャル・レスポンス・ツリー名';
$string['prtpartiallycorrectfeedback'] = '部分的正解の場合のフィードバック';
$string['prtwillbecomeactivewhen'] = '解答が行われたときに，このポテンシャル・レスポンス・ツリー {$a} は有効になります。';
$string['qm_error'] = 'あなたの解答には ? マークが含まれていますが，それは許可されていません。';
$string['questiondoesnotuserandomisation'] = 'この問題はランダム化されていません。';
$string['questionnote'] = '問題メモ';
$string['questionnote_help'] = '問題メモはCASテキストで記述し，個々のランダムな問題を区別するために用いられます。問題ノートが同じ場合，またその時にのみ，ランダム化された問題は同じものとみなされます。後の解析のために意味のある問題メモを残すことが重要です。';
$string['questionnotempty'] = '問題変数にrand() が用いられている場合，問題メモは空欄にはできません。問題メモは個々のランダムな問題を区別するために用いられます。';
$string['questionpreview'] = '問題のプレビュー';
$string['questionsimplify_help'] = '全ての問題でMaximaのグローバルなsimp変数を設定します。';
$string['questiontests'] = '問題のチェック';
$string['questiontext'] = '問題テキスト';
$string['questiontext_help'] = '問題テキストは学生が実際に目にするテキストでCASテキストで入力します。解答欄と解答確認欄を入力しなければなりません。入力例：[[input:ans1]] [[validation:ans1]]';
$string['questionvariables'] = '問題変数';
$string['questionvariables_help'] = '問題テキストの中で使用する変数を定義します。ここで定義された変数は，他のフィールドでも使用できます。';
$string['requirelowestterms'] = '約分を要求する';
$string['requirelowestterms_help'] = 'このオプションがYesに設定された場合，分数は約文されていなければなりません。もしう約分されていなければ受け付けられません。';
$string['sans'] = '評価対象';
$string['settingcasmaximaversion'] = 'Maximaのバージョン';
$string['settingcasmaximaversion_desc'] = '使用しているのMaximaバーション';
$string['settingcastimeout'] = 'CASへの接続がタイムアウトしました';
$string['settingplatformmaximacommand'] = 'Maximaコマンド';
$string['settingplatformplotcommand'] = 'プロットコマンド';
$string['settingplatformtype'] = 'オペレーティングシステム';
$string['settingplatformtypeserver'] = 'サーバ';
$string['settingplatformtypeunix'] = 'Linux';
$string['settingplatformtypewin'] = 'Windows';
$string['showvalidation'] = '解答書式の確認';
$string['showvalidation_help'] = 'このオプションをYesにすると，入力された解答の書式（文法）が正しいかどうかを表示します。';
$string['sqrtsign'] = '平方根の記号';
$string['sqrtsign_help'] = '平方根の記号を表示します。';
$string['stackCas_apostrophe'] = 'アポストロフィは許可されていません。';
$string['stackCas_CASError'] = 'CASは次のエラーを返しました。';
$string['stackCas_CASErrorCaused'] = 'CASエラーが発生しました。';
$string['stackCas_failedReturn'] = 'CASはデータを返しませんでした。';
$string['stackCas_failedValidation'] = 'CASテキストが正しくありません。';
$string['stackCas_forbiddenChar'] = '禁止文字: {$a->char}';
$string['stackCas_forbiddenWord'] = '禁止ワード: {$a->forbid}';
$string['stackCas_invalidCommand'] = 'CASコマンドが間違っています。';
$string['stackCas_MissingAt'] = '@ が入力されていません。';
$string['stackCas_MissingCloseDisplay'] = '] が入力されていません。';
$string['stackCas_MissingCloseHTML'] = 'HTMLタグを閉じ忘れていませんか？';
$string['stackCas_MissingCloseInline'] = ') が入力されていません。';
$string['stackCas_MissingDollar'] = '$ が入力されていません。';
$string['stackCas_MissingOpenDisplay'] = '[ が入力されていません。';
$string['stackCas_MissingOpenHTML'] = 'HTMLの始まりタグを忘れていませんか？';
$string['stackCas_MissingOpenInline'] = '( が入力されていません。';
$string['stackCas_newline'] = '改行文字は許可されていません。';
$string['stackCas_percent'] = '式の中に%が含まれています: {$a->expr}。';
$string['stackCas_spaces'] = '式の中に空白が含まれています: {$a->expr}。';
$string['stackCas_tooLong'] = 'CASテキストの記述が長過ぎます。';
$string['stackCas_unknownFunction'] = '不明な関数です: {$a->forbid}。';
$string['stackCas_unsupportedKeyword'] = 'サポートされていないキーワードです: {$a->forbid}。';
$string['stackDoc_404'] = 'エラー 404';
$string['stackDoc_404message'] = 'ファイルが見つかりません。';
$string['stackOptions_AnsTest_values_AlgEquiv'] = '代数等価';
$string['stackOptions_AnsTest_values_CasEqual'] = '構文等価';
$string['stackOptions_AnsTest_values_CompSquare'] = '平方完成';
$string['stackOptions_AnsTest_values_Diff'] = '微分';
$string['stackOptions_AnsTest_values_EqualComAss'] = '交換・結合等価';
$string['stackOptions_AnsTest_values_Expanded'] = '展開';
$string['stackOptions_AnsTest_values_FacForm'] = '因数分解';
$string['stackOptions_AnsTest_values_GT'] = '超過';
$string['stackOptions_AnsTest_values_GTE'] = '以上';
$string['stackOptions_AnsTest_values_Int'] = '積分';
$string['stackOptions_AnsTest_values_LowestTerms'] = '既約';
$string['stackOptions_AnsTest_values_NumAbsolute'] = '絶対精度';
$string['stackOptions_AnsTest_values_NumRelative'] = '相対精度';
$string['stackOptions_AnsTest_values_PartFrac'] = '部分分数';
$string['stackOptions_AnsTest_values_RegExp'] = '正規表現';
$string['stackOptions_AnsTest_values_SameType'] = '型等価';
$string['stackOptions_AnsTest_values_SingleFrac'] = '仮分数';
$string['stackOptions_AnsTest_values_String'] = '文字列';
$string['stackOptions_AnsTest_values_StringSloppy'] = 'あいまい文字列';
$string['stackOptions_AnsTest_values_SubstEquiv'] = '変数等価';
$string['stop'] = '終了';
$string['strictsyntax'] = '厳密な文法';
$string['strictsyntax_help'] = '解答の入力は厳密なMaximaの書式である必要がありますか？もしそうでなければ，積の * が省かれている場合，入力された文字列が関数などと幅広く解釈されます。';
$string['studentanswer'] = '評価対象';
$string['studentValidation_yourLastAnswer'] = 'あなたの入力した数式は次のとおりです：';
$string['syntaxhint'] = '書式のヒント';
$string['syntaxhint_help'] = '解答入力の書式の例が表示されます。';
$string['tans'] = '評価基準';
$string['teacheranswer'] = '評価基準';
$string['teachersanswer'] = '正解';
$string['teachersanswer_help'] = '各解答欄に対する正解を指定しなければなりません。この正解は正しいMaximaの書式となっており，問題変数を用いることのできます。';
$string['testoptions'] = '評価オプション';
$string['verifyquestionandupdate'] = '問題テキストのチェックと入力フォームの更新';
