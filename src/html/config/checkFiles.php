<?php

require_once('env-config.php');

echo '<h4>Prova de connexi&oacute; de curl</h4>';

$url = $agora['server']['school_information'] . '08011941';
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, $url);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);
echo '<strong>URL:</strong> ' . $url . '<br>';
echo '<strong>Valor retornat per curl_exec():</strong> ' . $buffer . '<br>';


$files[] = $agora['dbsource']['dir'] . $agora['dbsource']['filename'];
$files[] = $agora['dbsource']['syncdir'] . $agora['dbsource']['filename'];
$files[] = $agora['server']['root'] . 'html/config/env-config.php';
$files[] = $agora['server']['root'] . 'html/config/config.php';
$files[] = $agora['server']['root'] . 'html/config/config-restricted.php';
$files[] = $agora['server']['root'] . 'html/config/sync-config.sh';
$files[] = $agora['server']['root'] . $agora['intranet']['datadir'] . 'diskUsageZk.txt';
$files[] = $agora['server']['root'] . $agora['moodle']['datadir'] .'diskUsageMdl.txt';
$files[] = $agora['server']['root'] . $agora['moodle2']['datadir'] .'diskUsageMdl2.txt';
$files[] = $agora['server']['root'] . 'adminInfo/cronIntranet.txt';
$files[] = $agora['server']['root'] . 'adminInfo/cronMoodle.txt';
$files[] = $agora['server']['root'] . 'adminInfo/cronMoodle2.txt';
$files[] = $agora['server']['root'] . 'adminInfo/updateIntranet.txt';
$files[] = $agora['server']['root'] . 'adminInfo/updateMoodle.txt';
$files[] = $agora['server']['root'] . 'adminInfo/updateMoodle2.txt';

foreach ($files as $file) {
    if (file_exists($file)) {
        echo '<h4>Fitxer:</strong> '.$file.'</h4>';
        echo '<strong>Mida:</strong> '.filesize($file).'<br>';
        echo '<strong>Propietari:</strong> '.fileowner($file).'<br>';
        echo '<strong>Permisos:</strong> '.substr(sprintf('%o', fileperms($file)), -4).'<br>';
        echo '<strong>Creaci&oacute;:</strong> ' .date(DATE_RFC822, filectime($file)).'<br>';
        echo '<strong>Darrera modificaci&oacute;:</strong> '.date(DATE_RFC822, filemtime($file)).'<br>';
        echo '<strong>Espai lliure:</strong> ' . fileSizeUnits(disk_free_space(dirname($file))).'<br>';
        echo '<br>';
    } else {
        echo 'El fitxer ' . $file .' no existeix.<br>';
    }
}



function fileSizeUnits($FZ)
{
    $FS = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
   
    return number_format($FZ/pow(1024, $I=floor(log($FZ, 1024))), 2) . ' ' . $FS[$I];
}
