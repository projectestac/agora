<?php
$error_rep = error_reporting(E_ALL) ;
$displ_err = ini_set("display_errors", 1); 

// TRANSLATION VARIABLES
function setEnglish(&$TRANSLATION) {
    $TRANSLATION['Test page'] = 'Test page';
    $TRANSLATION['Info'] = 'Info';
    $TRANSLATION['Plugin version'] = 'Plugin version';
    $TRANSLATION['Image server version'] = 'Image server version';
    $TRANSLATION['You MUST use UTF-8 charset in Moodle. Go to Moodle settings and set it'] = 'You MUST use UTF-8 charset in Moodle. Go to Moodle settings and set it';
    $TRANSLATION['Database charset (according moodle)'] = 'Database charset (according moodle)';
    $TRANSLATION['We will send alpha character to database... You should see it in both cases!'] = 'We will send alpha character to database... You should see it in both cases!';
    $TRANSLATION['Original'] = 'Original';
    $TRANSLATION['After passing through the database'] = 'After passing through the database';
    $TRANSLATION['Test 0: Trying to connect to services.wiris.com'] = 'Test 0: Trying to connect to services.wiris.com';
    $TRANSLATION["Your server can't connect to"] = "Your server can't connect to";
    $TRANSLATION['Check that'] = 'Check that';
    $TRANSLATION['Your server has correct DNS servers configured'] = 'Your server has correct DNS servers configured';
    $TRANSLATION["Your server isn't behind a firewall or proxy (if is a proxy, you can configure it through WIRIS installer)"] = "Your server isn't behind a firewall or proxy (if is a proxy, you can configure it through WIRIS installer)";
    $TRANSLATION['Your server has allow_url_fopen directive enabled'] = 'Your server has allow_url_fopen directive enabled';
    $TRANSLATION['If you are concerned about security, you can use this configuration to secure your server'] = 'If you are concerned about security, you can use this configuration to secure your server';
    $TRANSLATION["Turn 'On' allow_url_fopen directive"] = "Turn 'On' allow_url_fopen directive";
    $TRANSLATION["Turn 'Off' allow_url_include directive"] = "Turn 'Off' allow_url_include directive";
    $TRANSLATION['Write "eval" on your disabled functions'] = 'Write "eval" on your disabled functions';
    $TRANSLATION['Contact us'] = 'Contact us';
    $TRANSLATION['Test passed'] = 'Test passed';
    $TRANSLATION['Test 1: testing tilde'] = 'Test 1: testing tilde';
    $TRANSLATION['Test 2: testing tilde in forms'] = 'Test 2: testing tilde in forms';
    $TRANSLATION['Test not passed'] = 'Test not passed';
    $TRANSLATION['Test 3: testing a simple image (1+2)'] = 'Test 3: testing a simple image (1+2)';
    $TRANSLATION['Raw text'] = 'Raw text';
    $TRANSLATION['Image'] = 'Image';
    $TRANSLATION['Test 4: testing a hard image (setN symbol)'] = 'Test 4: testing a hard image (setN symbol)';
    $TRANSLATION['Sending without entitites...'] = 'Sending without entitites...';
    $TRANSLATION['If you are seeing'] = 'If you are seening';
    $TRANSLATION['instead of'] = 'instead of';
    $TRANSLATION['please, contact with us at info@wiris.com'] = 'please, contact with us at info@wiris.com';
    $TRANSLATION['Sending with entitites...'] = 'Sending with entitites...';
    $TRANSLATION['Test 5: testing getting wiris cache'] = 'Test 5: testing getting wiris cache';
    $TRANSLATION['Raw text from database (parsed)'] = 'Raw text from database (parsed)';
    $TRANSLATION['Test 6: testing creating image'] = 'Test 6: testing creating image';
    $TRANSLATION['Moodle charset'] = 'Moodle charset';
    $TRANSLATION['Test failed'] = 'Test failed';
    $TRANSLATION['PHP4 test'] = 'PHP4 test';
    $TRANSLATION['PHP4 compatibility mode activated: '] = 'PHP4 compatibility mode activated: ';
    $TRANSLATION['Test fsocketopen()'] = 'Test fsocketopen()';
    $TRANSLATION['Could not connect to:'] = 'Could not connect to:';
    $TRANSLATION['Connecting to:'] = 'Connecting to:';
}

$TRANSLATION = array();
setEnglish($TRANSLATION);

require_once('../../config.php');
require_once('./filter/math_filter.php');
WF_initmathfilter();
?>

<html>
<head>
<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
<title><?php echo $TRANSLATION['Test page']; ?></title>
<style type="text/css">
body {
    background-color: #E0E0E0;
}
</style>
</head>
<body>
    <h3><?php echo $TRANSLATION['Info']; ?></h3>
    
    <?php echo $TRANSLATION['Plugin version'] . ': ' . $CFG->wirisversion; ?>
    <br/>
    <?php echo $TRANSLATION['Image server version'] . ': ' . $CFG->wirisserviceversion; ?>
    <br/>
    <?php 
    echo $TRANSLATION['Moodle charset'] . ': ';
    $moodleCharset = get_string('thischarset');
    print $moodleCharset;

    if ($moodleCharset != 'UTF-8') {
        echo ' <b>(' . $TRANSLATION['You MUST use UTF-8 charset in Moodle. Go to Moodle settings and set it'] . ')</b>';
    }
    ?>
    
    <br/>
    
    <?php
    echo $TRANSLATION['Database charset (according moodle)'] . ': ' . get_string('thischarset') . ' <br/> ' . $TRANSLATION['We will send alpha character to database... You should see it in both cases!'] . '<br/>';

    $testchar="%CE%B1";
    $testchar=urldecode($testchar);

    print $TRANSLATION['Original'] . ' (' . strlen($testchar) . " bytes), hex: " . bin2hex($testchar) . ", char: " . $testchar . "<br/>";

    $md5 = "test.php";
    $wrscache = new object;
    $wrscache->rawtext = $testchar;
    $wrscache->timemodified = time();
    $wrscache->filter = 'wiris';
    $wrscache->version = 1;
    $wrscache->md5key = $md5;
    insert_record("cache_filters", $wrscache, false);

    $wrscache = get_record("cache_filters","filter","wiris", "md5key", $md5 );
    $testchar = $wrscache->rawtext;

    delete_records("cache_filters","filter","wiris", "md5key", $md5);

    print $TRANSLATION['After passing through the database'] . ' (' . strlen($testchar) .  " bytes) hex: " . bin2hex($testchar) . ", char: " . $testchar;
    ?>
    
    <h3><?php echo $TRANSLATION['Test 0: Trying to connect to services.wiris.com']; ?></h3>

    <?php
    $result = file_get_contents('http://services.wiris.com');
        
    if ($result === false) {
        echo $TRANSLATION["Your server can't connect to"] . ' http://services.wiris.com: <br />' . $TRANSLATION['Check that'] . ':';

        echo '<ul>';
        echo '<li>' . $TRANSLATION['Your server has correct DNS servers configured'] . '.</li>';
        echo '<li>' . $TRANSLATION["Your server isn't behind a firewall or proxy (if is a proxy, you can configure it through WIRIS installer)"] . '.</li>';
        echo '<li>' . $TRANSLATION['Your server has allow_url_fopen directive enabled'] . '.<br />';
        echo $TRANSLATION['If you are concerned about security, you can use this configuration to secure your server'] . ':';
        echo '<ul>';
        echo '<li>' . $TRANSLATION["Turn 'On' allow_url_fopen directive"] . '.</li>';
        echo '<li>' . $TRANSLATION["Turn 'Off' allow_url_include directive"] . '.</li>';
        echo '<li>' . $TRANSLATION['Write "eval" on your disabled functions'] . ':<br />';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;<i>disabled_functions = eval</i>';
        echo '</ul>';
        echo '</li>';
        echo '</ul>';
        echo '<a href="mailto:info@wiris.com">' . $TRANSLATION['Contact us'] . '</a>';          
    } else {
        echo $TRANSLATION['Test passed'] . '.' . '<br/>';
    }
        
    $path = 'http://' . $CFG->wirisservicehost . ':' . $CFG->wirisserviceport . $CFG->wirisservicepath . '/render?mml=<math/>';
    echo $TRANSLATION['Connecting to:'] . ' ' . $path . '<br/>';
    $result = file_get_contents($path);
    if($result) {
        echo $TRANSLATION['Test passed'] . '<br/>';
    } else {
        echo $TRANSLATION['Test failed'] . '<br/>';
    }
    ?>
    
    <h3><?php echo $TRANSLATION['PHP4 test'] ?></h3>

    <?php echo $TRANSLATION['PHP4 compatibility mode activated: '] . print_r($CFG->wirisPHP4compatibility,true) . '<br/>'; ?>
    <?php
    echo $TRANSLATION['Test fsocketopen()'] . ' :';
    $result = fsockopen($CFG->wirisservicehost, $CFG->wirisserviceport);
    if($result === false) {
        echo $TRANSLATION['Test failed'] . '.';
    } else {
        fclose($result);
        echo $TRANSLATION['Test passed'] . '.';
    }
    ?>

    <h3><?php echo $TRANSLATION['Test 1: testing tilde']; ?></h3>
    
    <?php print "áéíóúñ have " . strlen("áéíóúñ") . " bytes"; ?>

    <h3><?php echo $TRANSLATION['Test 2: testing tilde in forms']; ?></h3>
    
    <form method=GET action=test.php>
        <input type=hidden name=test2 value="<?php print "áéíóúñ"; ?>">
        <?php
            if (isset($_REQUEST["test2"])) {
                if (strlen($_REQUEST["test2"]) <= 12) print $_REQUEST["test2"] . "<br/>";
                else print $TRANSLATION['Test not passed'] . '<br/>';
            }
        ?>
        <input type=submit value="Send">
    </form>

    <h3><?php echo $TRANSLATION['Test 3: testing a simple image (1+2)']; ?></h3>
    
    <?php
    $mathml="«math xmlns=¨http://www.w3.org/1998/Math/MathML¨»«mrow»«mn»" . rand(0,9999) . "«/mn»«mo»+«/mo»«mn»" . rand(0,9999) . "«/mn»«/mrow»«/math»";	// when you are writing a post in moodle forum, you are writing this text
    print $TRANSLATION['Raw text'] . ': ' . $mathml . "<br/>\n";
    $imageCode = WF_filter_math($mathml,TRUE);
    print $TRANSLATION['Image'] . ': ' . $imageCode . "\n";	// WF_filter_math parses your text to right format. Then, checks its md5sum and creates the image. The md5sum is about mathml PARSED text.
    ?>
    
    <h3><?php echo $TRANSLATION['Test 4: testing a hard image (setN symbol)']; ?></h3>
    
    <?php	
    print $TRANSLATION['Sending without entitites...'] . '<br/>';
    $mathml="«math xmlns=¨http://www.w3.org/1998/Math/MathML¨»«mrow»«mn»" . rand(0,9999) . "«/mn»«mo»+«/mo»«csymbol»«mo»ℕ«/mo»«/csymbol»«/mrow»«/math»";	// when you are writing a post in moodle forum, you are writing this text
    print $TRANSLATION['Raw text'] . ': ' . $mathml . "<br/>\n";
    $imageCode = WF_filter_math($mathml,TRUE);
    print $TRANSLATION['Image'] . ': ' . $imageCode . "\n";	// WF_filter_math parses your text to right format. Then, checks its md5sum and creates the image. The md5sum is about mathml PARSED text.
    print "<br/><b>(" . $TRANSLATION['If you are seeing'] . " '?' " . $TRANSLATION['instead of'] . ' ℕ, ' . $TRANSLATION['please, contact with us at info@wiris.com'] . ')</b>';

    print "<br/>" . $TRANSLATION['Sending with entitites...'] . '<br/>';
    $mathml="«math xmlns=¨http://www.w3.org/1998/Math/MathML¨»«mrow»«mn»" . rand(0,9999) . "«/mn»«mo»+«/mo»«csymbol»«mo»§#8469;«/mo»«/csymbol»«/mrow»«/math»";	// when you are writing a post in moodle forum, you are writing this text
    print $TRANSLATION['Raw text'] . ': ' . $mathml . "<br>\n";
    $imageCode = WF_filter_math($mathml,TRUE);
    print $TRANSLATION['Image'] . ': ' . $imageCode . "\n";	// WF_filter_math parses your text to right format. Then, checks its md5sum and creates the image. The md5sum is about mathml PARSED text.
    print "<br><b>(" . $TRANSLATION['If you are seeing'] . " '?' " . $TRANSLATION['instead of'] . ' ℕ, ' . $TRANSLATION['please, contact with us at info@wiris.com'] . ')</b>';
    ?>
    
    <h3><?php echo $TRANSLATION['Test 5: testing getting wiris cache']; ?></h3>
    
    <?php
    preg_match("/(\S{32}).png\"/", $imageCode, $md5);	// Gets md5 code from <img> posted
    $wrscache = get_record("cache_filters","filter","wiris", "md5key", $md5[1]);	// Finally, php search in database the same md5. If exists in database, it doesn't create the image, only it reloads the saved image.
    print $TRANSLATION['Raw text from database (parsed)'] . ': ' . $wrscache->rawtext . "<br>\n";
    print "md5: " . $wrscache->md5key . "<br>\n";
    print $TRANSLATION['Image'] . ": <img align='middle' src='./filter/wrs_showimage.php/" . $wrscache->md5key . ".png'>\n";
    ?>

    <h3><?php echo $TRANSLATION['Test 6: testing creating image']; ?></h3>
    <?php
    $mathml = "«math xmlns=¨http://www.w3.org/1998/Math/MathML¨»«mrow»«mn»" . rand(0,9999) . "«/mn»«/mrow»«/math»";	// At first, we create random image (is very improbable that exists in wiris cache)
    print $TRANSLATION['Raw text'] . $mathml . "<br>\n";
    $imageCode = WF_filter_math($mathml,TRUE);
    print $TRANSLATION['Image'] . $imageCode . "\n";	// WF_filter_math parses your text to right format. Then, checks its md5sum and creates the image. The md5sum is about mathml PARSED text.
    ?>
</body>
</html>

<?php 
error_reporting($error_rep) ;
ini_set("display_errors", $displ_err);