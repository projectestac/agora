<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
//
//  Copyright (c) 2011, Maths for More S.L. http://www.wiris.com
//  This file is part of Moodle WIRIS plugin.
//
//  Moodle WIRIS plugin is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
//
//  Moodle WIRIS plugin is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with Moodle WIRIS plugin. If not, see <http://www.gnu.org/licenses/>.
//

include_once '../../../config.php';
require_once($CFG->dirroot . '/question/type/wq/config.php');
global $DB;

function wrs_assert_simple($condition) {
    if ($condition) {
        return '<span class="ok">OK</span>';
    }
    else {
        return '<span class="error">ERROR</span>';
    }
}

function wrs_assert($condition, $report_text, $solution_link) {
    if ($condition){
        return $report_text;
    } else{
        if ($solution_link != ''){
            return '<span class="error">' . $report_text . '</span>' . '<a target="_blank" href="' . $solution_link . '"><img alt="" src="img/help.gif" /></a>';
        }else{
            return '<span class="error">' . $report_text . '</span>';
        }
    }
}

function wrs_getStatus($condition){
    if($condition){
            return '<span class="ok">OK</span>';
    }else{
            return '<span class="error">ERROR</span>';
    }
}

function wrs_createTableRow($test_name, $report_text, $solution_link, $condition){
    $output = '<td>' . $test_name . '</td>';
    $output .= '<td>' . wrs_assert($condition, $report_text, $solution_link) . '</td>';
    $output .= '<td>' . wrs_getStatus($condition) . '</td>';
    return $output;
}
?>

<html>
<head>
<title>Moodle 2.x WIRIS quizzes test page</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<style type="text/css">
        body{font-family: Arial;}
        span{font-weight: bold;}
        span.ok {color: #009900;}
        span.error {color: #dd0000;}
        table, th, td, tr {
                border: solid 1px #000000;
                border-collapse:collapse;
                padding: 5px;
        }
        th{background-color: #eeeeee;}
        img{border:none;}
</style>
</head>
<body>
	<h1>Moodle 2.x WIRIS quizzes test page</h1>
	<table>
            <tr>
                <th>Test</th>
                <th>Report</th>
                <th>Status</th>
            </tr>
            <tr>
                <?php
                    @include_once 'version.php';
                    $test_name = 'WIRIS quizzes version';
                    if (isset($plugin->wirisversion)){
                        $version = $plugin->wirisversion;
                        $report_text = 'WIRIS quizzes version is ' . $version;
                        $condition = true;
                    }else{
                        $report_text = 'Impossible to find WIRIS quizzes version.';
                        $condition = false;
                    }
                    $solution_link = 'http://www.wiris.com/quizzes/download';
                    echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
                ?>
            </tr>
            <tr>
                <?php
                    @include_once '../../../filter/wiris/version.php';
                    $test_name = 'WIRIS plugin version';
                    $link2plugininfo = '../../../filter/wiris/info.php';
                    $plugininfo = 'Check WIRIS plugin <a href="' . $link2plugininfo . '" target="_blank">info page</a>';
                    if (isset($plugin->release)){
                            $version = $plugin->release;
                            if ($version >= '3.17.20'){
                                $report_text = 'WIRIS plugin is properly installed. ' . $plugininfo;
                                $condition = true;
                            }else{
                                $report_text = 'WIRIS quizzes requires WIRIS plugin 3.17.20 or greater. Your version is '. $version . ' ' . $plugininfo;
                                $condition = false;
                            }
                    }else{
                            $report_text = 'Impossible to find WIRIS plugin version file. ' . $plugininfo;
                            $condition = false;
                    }
                    $solution_link = 'http://www.wiris.com/plugins/moodle/download';
                    echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
                ?>
            </tr>
            <!--tr>
                <?php
                    $test_name = 'MB';
                    $mbstring = extension_loaded('mbstring');
                    if ($mbstring){
                            $report_text = 'OK';
                            $condition = true;
                    }else{
                            $report_text = 'KO';
                            $condition = false;
                    }
                    $solution_link = '';
                    echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
                ?>
            </tr-->
            <tr>
                <?php
                    @include_once '../../../version.php';
                    $test_name = 'Moodle version';
                    if (isset($version)){
                        if ($version >= '2011060313'){
                            $report_text = 'Your moodle version is sufficiently new.';
                            $condition = true;
                        }else{
                            $report_text = 'Your Moodle version is ' . $version . '. WIRIS quizzes could not work correctly with Moodle version prior to 2011060313';
                            $condition = false;
                        }
                    }else{
                        $report_text = 'Impossible to find Moodle version file.';
                        $condition = false;
                    }
                    $solution_link = '';
                    echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
                ?>
            </tr>
            <tr>
                <?php
                    $test_name = 'Files';
                    global $CFG;
                    $questiontypefolders = array(
                            $CFG->dirroot . '/question/type/essaywiris',
                            $CFG->dirroot . '/question/type/matchwiris',
                            $CFG->dirroot . '/question/type/truefalsewiris',
                            $CFG->dirroot . '/question/type/multianswerwiris',
                            $CFG->dirroot . '/question/type/multichoicewiris',
                            $CFG->dirroot . '/question/type/shortanswerwiris',
                            $CFG->dirroot . '/question/type/wq'
                    );
                    $ok=true;
                    foreach($questiontypefolders as $folder){
                            if ($ok){
                                    if(!is_dir($folder)){
                                            $ok=false;
                                    }
                            }
                    }
                    if ($ok){
                            $condition = true;
                            $report_text = 'All WIRIS question type folders are present.';
                    }else{
                            $condition = false;
                            $report_text = 'One or more of WIRIS question type folders are missing.';
                    }
                    $solution_link = 'http://www.wiris.com/quizzes/download';
                    echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
                ?>
            </tr>
            <tr>
                <?php
                    global $DB;
                    $dbman = $DB->get_manager();
                    $test_name = 'Database';
                    $tables = array(
                            'qtype_wq'
                    );
                    $ok=true;
                    foreach($tables as $table){
                            if ($ok){
                                    if(!$dbman->table_exists($table)){
                                            $ok = false;
                                    }
                            }
                    }
                    if ($ok){
                            $condition = true;
                            $report_text = 'All WIRIS tables are present.';
                    }else{
                            $condition = false;
                            $report_text = 'One or more of WIRIS tables are missing.';
                    }
                    $solution_link = 'http://www.wiris.com/quizzes/download';
                    echo wrs_createTableRow($test_name, $report_text, $solution_link, $condition);
                ?>
            </tr>
            <tr>
                <?php
                    $test_name = 'WIRIS quizzes';
                    $solution_link = '';
                    $quizzes_disabled = get_config('question', 'wq_disabled');
                    if ($quizzes_disabled){
                        $report_text = 'DISABLED';
                    }else{
                        $report_text = 'ENABLED';
                    }
                    echo wrs_createTableRow($test_name, $report_text, $solution_link, !$quizzes_disabled);
                ?>
            </tr>
            <tr>
                <?php
                    $wrap = com_wiris_system_CallWrapper::getInstance();
                    $test_name = 'Checking WIRIS configuration';
                    $solution_link = '';
                    $wrap->start();
                    $configuration = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration();
                    $report_text = 'PROXY_URL: ' . $configuration->get(com_wiris_quizzes_api_ConfigurationKeys::$PROXY_URL) . '<br>';
                    $report_text .= 'CACHE_DIR: ' . $configuration->get(com_wiris_quizzes_api_ConfigurationKeys::$CACHE_DIR) . '<br>';
                    $report_text .= 'SERVICE_URL: ' . $configuration->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL) . '<br>';
                    $wrap->stop();
                    echo wrs_createTableRow($test_name, $report_text, $solution_link, true);
                ?>
            </tr>
            <tr>
                <?php
                    $wrap = com_wiris_system_CallWrapper::getInstance();
                    $test_name = 'Checking if WIRIS server is reachable';
                    $solution_link = '';
                    $wrap->start();
                    $configuration = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration();
                    $parsed_url = parse_url($configuration->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL));
                    $wrap->stop();
                    if (!isset($parsed_url['port'])){
                        $parsed_url['port'] = 80;
                    }
                    $report_text = 'Connecting to ' . $parsed_url['host'] . ' at port ' . $parsed_url['port'];
                    echo wrs_createTableRow($test_name, $report_text, $solution_link, fsockopen($parsed_url['host'], $parsed_url['port']));
                ?>
            </tr>
            <tr>
                <?php
                    $wrap = com_wiris_system_CallWrapper::getInstance();
                    $test_name = 'WIRIS quizzes service';
                    $solution_link = '';
                    $wrap->start();
                    $configuration = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()->getConfiguration();
                    $report_text = $configuration->get(com_wiris_quizzes_api_ConfigurationKeys::$SERVICE_URL);
                    $wrap->stop();
                    echo wrs_createTableRow($test_name, $report_text, $solution_link, true);
                ?>
            </tr>
            <tr>
                <?php
                    $test_name = 'Max server connections';
                    $wrap = com_wiris_system_CallWrapper::getInstance();
                    $wrap->start();
                    try {
                        $p = new com_wiris_quizzes_impl_FilePersistentVariables();
                        $p->lockVariable('wiris_maxconnections');
                        $data = $p->getVariable('wiris_maxconnections');
                        $connections = haxe_Unserializer::run($data);
                        $stamp = Math::floor(haxe_Timer::stamp());
                        $maxconnections = $connections->length;
                        $configmaxconnections = com_wiris_quizzes_impl_QuizzesBuilderImpl::getInstance()
                          ->getConfiguration()->get(com_wiris_quizzes_api_ConfigurationKeys::$MAXCONNECTIONS);
                        $count = 0;
                        $it = $connections->iterator();
                        while ($it->hasNext()) {
                            $time = $it->next();
                            if (($stamp - $time <= com_wiris_quizzes_impl_MaxConnectionsHttpImpl::$CONNECTION_TIMEOUT)
                                    && ($stamp - $time >= 0)) {
                                $count++;
                            }
                        }
                        $p->unlockVariable('wiris_maxconnections');
                        echo wrs_createTableRow($test_name, 'There are currently '
                          . $count . ' active concurrent connections out of a maximum of '
                          . $configmaxconnections . '. Greatest number of concurrent connections is ' . $maxconnections . '.', '', true);
                    }
                    catch (Exception $e) {
                        echo wrs_createTableRow($test_name, 'Error with the maximum connections security system. See details: <br/><pre>'
                          . $e->getTraceAsString() . '</pre>', '', false);
                    }
                    $wrap->stop();
                ?>
            </tr>
            <tr>
                <?php
                    include_once $CFG->dirroot . '/lib/editor/tinymce/lib.php';
                    $tinyEditor = new tinymce_texteditor();

                    $wiris_api = $CFG->dirroot . '/lib/editor/tinymce/tiny_mce/' . $tinyEditor->version . '/plugins/tiny_mce_wiris/integration/api.php';

                    if (!file_exists($wiris_api)){
                        $wiris_api = $CFG->dirroot . '/lib/editor/tinymce/plugins/tiny_mce_wiris/integration/api.php';
                    }

                    @include_once $wiris_api;

                    $rb = com_wiris_quizzes_api_QuizzesBuilder::getInstance();

                    $question_xml = '<question><wirisCasSession>&lt;session lang=&quot;en&quot; version=&quot;2.0&quot;&gt;&lt;library closed=&quot;false&quot;&gt;&lt;mtext style=&quot;color:#ffc800&quot; xml:lang=&quot;es&quot;&gt;variables&lt;/mtext&gt;&lt;group&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;apply&gt;&lt;csymbol definitionURL=&quot;http://www.wiris.com/XML/csymbol&quot;&gt;repeat&lt;/csymbol&gt;&lt;mtable&gt;&lt;mtr&gt;&lt;mtd&gt;&lt;mi&gt;a&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mi&gt;random&lt;/mi&gt;&lt;mfenced&gt;&lt;mrow&gt;&lt;mo&gt;-&lt;/mo&gt;&lt;mn&gt;7&lt;/mn&gt;&lt;mo&gt;,&lt;/mo&gt;&lt;mn&gt;7&lt;/mn&gt;&lt;/mrow&gt;&lt;/mfenced&gt;&lt;/mtd&gt;&lt;/mtr&gt;&lt;mtr&gt;&lt;mtd&gt;&lt;mi&gt;b&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mi&gt;random&lt;/mi&gt;&lt;mfenced&gt;&lt;mrow&gt;&lt;mo&gt;-&lt;/mo&gt;&lt;mn&gt;7&lt;/mn&gt;&lt;mo&gt;,&lt;/mo&gt;&lt;mn&gt;7&lt;/mn&gt;&lt;/mrow&gt;&lt;/mfenced&gt;&lt;/mtd&gt;&lt;/mtr&gt;&lt;/mtable&gt;&lt;mrow&gt;&lt;mi&gt;a&lt;/mi&gt;&lt;mo&gt;&amp;ne;&lt;/mo&gt;&lt;mn&gt;0&lt;/mn&gt;&lt;mo&gt;&amp;nbsp;&lt;/mo&gt;&lt;mo&gt;&amp;and;&lt;/mo&gt;&lt;mo&gt;&amp;nbsp;&lt;/mo&gt;&lt;mi&gt;b&lt;/mi&gt;&lt;mo&gt;&amp;ne;&lt;/mo&gt;&lt;mn&gt;0&lt;/mn&gt;&lt;/mrow&gt;&lt;/apply&gt;&lt;/math&gt;&lt;/input&gt;&lt;/command&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mi&gt;c&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mi&gt;random&lt;/mi&gt;&lt;mfenced&gt;&lt;mrow&gt;&lt;mo&gt;-&lt;/mo&gt;&lt;mn&gt;7&lt;/mn&gt;&lt;mo&gt;,&lt;/mo&gt;&lt;mn&gt;7&lt;/mn&gt;&lt;/mrow&gt;&lt;/mfenced&gt;&lt;/math&gt;&lt;/input&gt;&lt;/command&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mi&gt;r&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mi&gt;line&lt;/mi&gt;&lt;mfenced&gt;&lt;mrow&gt;&lt;mi&gt;a&lt;/mi&gt;&lt;mo&gt;*&lt;/mo&gt;&lt;mi&gt;x&lt;/mi&gt;&lt;mo&gt;+&lt;/mo&gt;&lt;mi&gt;b&lt;/mi&gt;&lt;mo&gt;*&lt;/mo&gt;&lt;mi&gt;y&lt;/mi&gt;&lt;mo&gt;+&lt;/mo&gt;&lt;mi&gt;c&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mn&gt;0&lt;/mn&gt;&lt;/mrow&gt;&lt;/mfenced&gt;&lt;/math&gt;&lt;/input&gt;&lt;/command&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;apply&gt;&lt;csymbol definitionURL=&quot;http://www.wiris.com/XML/csymbol&quot;&gt;repeat&lt;/csymbol&gt;&lt;mrow&gt;&lt;mi&gt;p&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mi&gt;point&lt;/mi&gt;&lt;mfenced&gt;&lt;mrow&gt;&lt;mi&gt;random&lt;/mi&gt;&lt;mfenced&gt;&lt;mrow&gt;&lt;mo&gt;-&lt;/mo&gt;&lt;mn&gt;7&lt;/mn&gt;&lt;mo&gt;,&lt;/mo&gt;&lt;mn&gt;7&lt;/mn&gt;&lt;/mrow&gt;&lt;/mfenced&gt;&lt;mo&gt;,&lt;/mo&gt;&lt;mi&gt;random&lt;/mi&gt;&lt;mfenced&gt;&lt;mrow&gt;&lt;mo&gt;-&lt;/mo&gt;&lt;mn&gt;7&lt;/mn&gt;&lt;mo&gt;,&lt;/mo&gt;&lt;mn&gt;7&lt;/mn&gt;&lt;/mrow&gt;&lt;/mfenced&gt;&lt;/mrow&gt;&lt;/mfenced&gt;&lt;/mrow&gt;&lt;mrow&gt;&lt;mi&gt;p&lt;/mi&gt;&lt;mo&gt;&amp;cap;&lt;/mo&gt;&lt;mi&gt;r&lt;/mi&gt;&lt;mo&gt;==&lt;/mo&gt;&lt;mfenced close=&quot;}&quot; open=&quot;{&quot;&gt;&lt;mtable align=&quot;center&quot;&gt;&lt;mtr&gt;&lt;mtd/&gt;&lt;/mtr&gt;&lt;/mtable&gt;&lt;/mfenced&gt;&lt;/mrow&gt;&lt;/apply&gt;&lt;/math&gt;&lt;/input&gt;&lt;/command&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mi&gt;s&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mi&gt;perpendicular&lt;/mi&gt;&lt;mfenced&gt;&lt;mrow&gt;&lt;mi&gt;r&lt;/mi&gt;&lt;mo&gt;,&lt;/mo&gt;&lt;mi&gt;p&lt;/mi&gt;&lt;/mrow&gt;&lt;/mfenced&gt;&lt;/math&gt;&lt;/input&gt;&lt;/command&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mi&gt;q&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mi&gt;plot&lt;/mi&gt;&lt;mo&gt;(&lt;/mo&gt;&lt;mi&gt;r&lt;/mi&gt;&lt;mo&gt;)&lt;/mo&gt;&lt;/math&gt;&lt;/input&gt;&lt;/command&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mi&gt;q&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mi&gt;plot&lt;/mi&gt;&lt;mo&gt;(&lt;/mo&gt;&lt;mi&gt;p&lt;/mi&gt;&lt;mo&gt;,&lt;/mo&gt;&lt;mo&gt;{&lt;/mo&gt;&lt;mi&gt;label&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mi&gt;p&lt;/mi&gt;&lt;mo&gt;,&lt;/mo&gt;&lt;mo&gt;&amp;nbsp;&lt;/mo&gt;&lt;mi&gt;show_label&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mi&gt;true&lt;/mi&gt;&lt;mo&gt;}&lt;/mo&gt;&lt;mo&gt;)&lt;/mo&gt;&lt;/math&gt;&lt;/input&gt;&lt;/command&gt;&lt;/group&gt;&lt;/library&gt;&lt;group&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mi&gt;p&lt;/mi&gt;&lt;/math&gt;&lt;/input&gt;&lt;output&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mfenced&gt;&lt;mrow&gt;&lt;mn&gt;2&lt;/mn&gt;&lt;mo&gt;,&lt;/mo&gt;&lt;mo&gt;-&lt;/mo&gt;&lt;mn&gt;5&lt;/mn&gt;&lt;/mrow&gt;&lt;/mfenced&gt;&lt;/math&gt;&lt;/output&gt;&lt;/command&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mi&gt;r&lt;/mi&gt;&lt;/math&gt;&lt;/input&gt;&lt;output&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mi&gt;y&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mn&gt;3&lt;/mn&gt;&lt;mo&gt;*&lt;/mo&gt;&lt;mi&gt;x&lt;/mi&gt;&lt;mo&gt;+&lt;/mo&gt;&lt;mfrac&gt;&lt;mn&gt;1&lt;/mn&gt;&lt;mn&gt;2&lt;/mn&gt;&lt;/mfrac&gt;&lt;/math&gt;&lt;/output&gt;&lt;/command&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mi&gt;s&lt;/mi&gt;&lt;/math&gt;&lt;/input&gt;&lt;output&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;&gt;&lt;mi&gt;y&lt;/mi&gt;&lt;mo&gt;=&lt;/mo&gt;&lt;mo&gt;-&lt;/mo&gt;&lt;mfrac&gt;&lt;mn&gt;1&lt;/mn&gt;&lt;mn&gt;3&lt;/mn&gt;&lt;/mfrac&gt;&lt;mo&gt;*&lt;/mo&gt;&lt;mi&gt;x&lt;/mi&gt;&lt;mo&gt;-&lt;/mo&gt;&lt;mfrac&gt;&lt;mn&gt;13&lt;/mn&gt;&lt;mn&gt;3&lt;/mn&gt;&lt;/mfrac&gt;&lt;/math&gt;&lt;/output&gt;&lt;/command&gt;&lt;/group&gt;&lt;group&gt;&lt;command&gt;&lt;input&gt;&lt;math xmlns=&quot;http://www.w3.org/1998/Math/MathML&quot;/&gt;&lt;/input&gt;&lt;/command&gt;&lt;/group&gt;&lt;/session&gt;</wirisCasSession><correctAnswers><correctAnswer>#s</correctAnswer></correctAnswers></question>';

                    $q = $rb->readQuestion($question_xml);
                    $qi = $rb->newQuestionInstance();

                    $variables = '#q #r';
                    $function = '#r';

                    $vqr = $rb->newVariablesRequest($variables, $q, $qi);
                    $quizzes = $rb->getQuizzesService();
                    $vqs = $quizzes->execute($vqr);
                    $qi->update($vqs);

                    $function = $qi->expandVariables($function);

                    global $PAGE;
                    $context = context_course::instance(SITEID);
                    $PAGE->set_context($context);
                    $function = format_text($function, FORMAT_HTML, array('noclean' => true));
                    $test_name = 'Checking WIRIS quizzes functionality (variable)';
                    $solution_link = '';
                    echo wrs_createTableRow($test_name, $function, $solution_link, true);

                ?>
            </tr>
                    <tr>
                        <?php
                            $test_name = 'Checking WIRIS quizzes functionality (plot)';
                            $plot = '#q';
                            $plot = $qi->expandVariables($plot);
                            echo wrs_createTableRow($test_name, $plot, $solution_link, true);
                        ?>
                    </tr>
        </table>

        <br/>

        <h1>Extra tests</h1>
        <table>
                <tr>
                        <th>Test</th>
                        <th>Status</th>
                </tr>
                <tr>
                        <td>mod_security1</td>
                        <td>
                            <?php
                                set_error_handler('_hx_error_handler', E_ERROR);
                                $disabled = true;
                                @$result = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . '/?test=<>');
                                if ($result == ''){
                                        $disabled = false;
                                }
                                echo wrs_assert_simple($disabled);
                            ?>
                        </td>
                </tr>
                <tr>
                        <td>mod_security2</td>
                        <td>
                            <?php
                                $disabled = true;
                                @$result = file_get_contents('http://' . $_SERVER['SERVER_NAME'] . '/?test=><');
                                if ($result == ''){
                                        $disabled = false;
                                }
                                echo wrs_assert_simple($disabled);
                            ?>
                        </td>
                </tr>
        </table>


	<p>
        <br/>
        <span style="font-size:14px; font-weight:normal;">For more information or if you have any doubt contact WIRIS Support: (<a href="mailto:support@wiris.com">support@wiris.com</a>)</span>
        </p>
</body>
</html>