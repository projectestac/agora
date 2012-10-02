<?php
// Load configuration constants
if(!isset($CFG)) {
    require_once('../../../config.php');
}
require_once($CFG->dirroot . '/filter/wiris/wrs_config.php');
require_once($CFG->dirroot . '/filter/wiris/lib/wrs_lang_inc.php');

// get the character encoding
$charset = get_string("thischarset");
$lang = current_language();
$lang = substr($lang,0, 2);  //ignoring specific country code

// language list

$s = trim($CFG->wiriscaslang);
if($s) {
    $list = explode(",", $s);
    $langlist = array();
    foreach($list as $i=>$value) {
        $v = trim($value);
        if($v) {
            $langlist[$i] = $v;
        }
    }
} else {
    $langlist = array();
}

require_js($CFG->wwwroot . '/filter/wiris/editor/wrs_cas.js.php');

$CFG->stylesheets[] = $CFG->wwwroot . '/filter/wiris/editor/wrs_dialog.css';
$CFG->stylesheets[] = $CFG->wwwroot . '/filter/wiris/editor/wrs_casdialog.css';

// Start the output.
print_header('Wiris CAS', '', '', '', '', true, '&nbsp;', '', false, 'onload="wrs_initDocument()"', false);

echo '
<div id="appletcontainer" class="wirisdialog_applet"></div>

<table id="controls" class="wirisdialog_outer">
    <tbody>
        <!-- Options -->
        <tr>
            <td id="wirisdialog_options">
                <form name="optionForm">
                <table>
                    <tbody>
                        <tr>
                            <!-- Dimension -->
                            <td id="dimensionpane">
                                <table>
                                <tbody>
                                    <tr>
                                        <td id="width_label">';
                                            echo wrs_get_string($lang, 'width');
                                        echo '</td>
                                        <td id="width_value"><input type="text" name="width"></td>
                                    </tr>
                                    <tr>
                                        <td id="height_label">';
                                            echo wrs_get_string($lang, 'height');
                                        echo'</td>
                                        <td id="height_value"><input type="text" name="height"></td>
                                    </tr>
                                </tbody>
                                </table>
                            </td>';
                        if($langlist && count($langlist) > 1) {
                            echo '<!-- Language -->
                            <td id="langpane">
                                <table cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td id="lang_label">';
                                            echo wrs_get_string($lang, 'language');
                                        echo '</td>
                                    </tr>
                                    <tr>
                                        <td id="lang_value">
                                            <select name="language">';
                                            foreach($langlist as $i) {
                                                echo('<option value="' . $i . '">' . $i . '</option>');
                                            }
                                            echo '</select>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                            </td>';
                        } else {
                            echo'<td id="langpane">&nbsp;</td>';
                        }
                            echo '<!-- params -->
                            <td id="paramspane">
                                <table>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="executeonload">';
                                            echo wrs_get_string($lang, 'executeonload');
                                        echo '</td>
                                        <td><input type="checkbox" name="toolbar">';
                                            echo wrs_get_string($lang, 'showtoolbar');
                                        echo '</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="focusonload">';
                                            echo wrs_get_string($lang, 'focusonload');
                                        echo '</td>
                                        <td><input type="checkbox" name="level">';
                                            echo wrs_get_string($lang, 'elementarymode');
                                        echo'</td>
                                    </tr>
                                </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
            </td>
        </tr>
        <!-- Controls -->
        <tr>
            <td id="wirisdialog_controls">
                <table>
                <tbody>
                    <tr>
                        <td class="wirisdialog_controls1">
                            <button id="button_Apply">';
                                echo wrs_get_string($lang, 'apply');
                            echo '</button>
                            <!-- <button id="button_Remove">';
                                echo wrs_get_string($lang, 'remove');
                            echo '</button> -->
                        </td>
                        <td class="wirisdialog_controls2">
                            <button id="button_Ok">';
                                echo wrs_get_string($lang, 'ok');
                            echo'</button>
                            <button id="button_Cancel">';
                                echo wrs_get_string($lang, 'cancel');
                            echo '</button>
                        </td>
                    </tr>
                </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>

</div>
</div>
</body>
</html>';