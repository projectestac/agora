<?php

    require_once('dblib-mysql.php');
    // For command line invocation
    if (isset($argv) && sizeof($argv)>1) {
        $param = explode("=", $argv[1]);
        if ($param[0]=='debug') { $_GET['debug']=$param[1]; }
        $cmd = true;
    }
    else {
        $cmd = false;
    }

    $debug_enabled = isset($_GET['debug']) ? $_GET['debug']: 'off';
    define('DEBUG_ENABLED', $debug_enabled);
    xtec_debug("DEBUG ENABLED: $debug_enabled");

    // Retrieve info
    $allSchools = getAllSchoolsDBInfo();

    if ($allSchools === false) { exit(0); }

    // Match info per schools
    $schools = Array();
    foreach ($allSchools as $school) {
        $dns     = $school['dns'];
        $service = $school['service'];

        if ($service == 'marsupial') {
            $schools[$dns]['is_'.$service] = 1;
        } else {
            $schools[$dns]['id_'.$service]          = $school['id'];
            $schools[$dns]['dbhost_'.$service]      = $school['dbhost'];
            $schools[$dns]['database_'.$service]    = $school['database'];
            $schools[$dns]['diskPercent_'.$service] = $school['diskPercent'];            
            $schools[$dns]['version_'.$service]     = $school['version'];            
        }

        $schools[$dns]['clientCode'] = $school['code'];
        
        // Add an element: key = previous DNS, value = current DNS. This will be
        //   used to show an info page explaining that the DNS has changed
        if (isset($school['old_dns'])) {
            $schools[$school['old_dns']]['new_dns'] = $dns;
        }
    }

    // Generate strings to write
    $files = Array();

    // Create one file with information of all schools
    $filename   = $agora['dbsource']['filename'];
    $school_str = '$schools = Array('."\n";
    foreach ($schools as $dns => $school){
        $school_str .= "'$dns' => Array(\n";
        foreach ($school as $key => $value) {
            $school_str .= "'$key' => '$value',\n";
        }
        $school_str .= "),\n";
    }
    $school_str .= ');';
    $files[$filename] = $school_str;


    // Write files to disk
    $path = $agora['dbsource']['syncdir'];
    if (is_dir($path)) {
        $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::CHILD_FIRST);
        for ($dir->rewind(); $dir->valid(); $dir->next()) {
            unlink($dir->getPathname());
        }
        if (rmdir($path)) {
            xtec_debug("$path directory erased<br/>\n");
        }
    }

    // Create syndir if it doesn't exist
    $old = umask(0);
    if (mkdir($agora['dbsource']['syncdir'], 0777)) {
        xtec_debug("$path directory created<br/>\n");
    }
    umask($old);

    // Create the file. A loop is used as a legacy of a previous way with several possible files.
    $i = 0;
    foreach($files as $filename => $school_str){
        $oldumask = umask(0);
        $fp = fopen($agora['dbsource']['syncdir'].$filename, 'w');
        umask($oldumask);
        fwrite($fp, "<?php\n$school_str\n");
        fclose($fp);
        $i++;
        //xtec_debug("<h2>File: ".$filename."</h2>");
        //xtec_debug("<pre>".$school_str."</pre>");
    }


    // Show file in browser
    if (isset($_GET["print"])) {
        $i = 0;
        foreach($files as $filename => $school_str){
            xtec_debug('<h2>File: '.$filename.'</h2>');
            xtec_debug('<pre>'.$school_str.'</pre>');
        }
    }


    // If accessed from a browser and exists an special param, force synchronization
    if (!$cmd && isset($_GET['force']) && ($_GET['force'] == true)) {
        foreach ($files as $fname => $fdata) {
            $orig = $agora['dbsource']['syncdir'] . $fname;
            $dest = $agora['dbsource']['dir']     . $fname;
            xtec_debug($orig);
            xtec_debug($dest);
            $oldumask = umask(0);
            if (!copy($orig, $dest)) {
                echo "Failed to copy $orig to $dest\n";
            }
            umask($oldumask);
        }
    }
