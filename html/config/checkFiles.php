<?php

require_once('env-config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Check Files</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<?php

echo '<h1>Check files</h1>';
echo '<div class="well well-sm">Servidor web: ' . gethostname() . ' (' .php_uname('s') . ')<br/>';
echo 'Hora del servidor: ' . date("d-m-Y H:i:s e (P)") . '</div>';
echo '<h3>Prova de connexó de curl</h3>';

$url = $agora['server']['school_information'] . '08011941';
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, $url);
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);
echo '<strong>URL:</strong> ' . $url . '<br>';
if (empty($buffer)) {
    echo '<div class="alert-danger">';
    echo '<strong>Valor retornat per curl_exec():</strong> Empty buffer';
    echo '</div>';
} else {
    echo '<strong>Valor retornat per curl_exec():</strong> ' . $buffer . '<br>';
}


$files[] = array('filename' => $agora['dbsource']['dir'] . $agora['dbsource']['filename'], 'perms' => '0644', 'link' => false);
$files[] = array('filename' => $agora['dbsource']['syncdir'] . $agora['dbsource']['filename'], 'perms' => '0666', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/.htaccess', 'perms' => '0640', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/config/env-config.php', 'perms' => '0640', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/config/config.php', 'perms' => '0640', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/config/config-restricted.php', 'perms' => '0650', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/config/sync-config.sh', 'perms' => '0750', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/moodle2/config.php', 'perms' => '0640', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/moodle2/filter/tex/mimetex.linux', 'perms' => '0770', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/moodle2/filter/tex/mimetex.sunos', 'perms' => '0660', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/moodle2/local/agora/muc/', 'perms' => '0770', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/moodle2/local/agora/muc/cacheconfig.php', 'perms' => '0660', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/wordpress/wp-config.php', 'perms' => '0750', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'html/wordpress/wp-content/uploads', 'perms' => '0775', 'link' => true);
$files[] = array('filename' => $agora['server']['root'] . $agora['intranet']['datadir'] . 'diskUsageZk.txt', 'perms' => '0644', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . $agora['moodle2']['datadir'] .'diskUsageMdl2.txt', 'perms' => '0644', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . $agora['nodes']['datadir'] .'diskUsageWp.txt', 'perms' => '0644', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'adminInfo/cronIntranet.txt', 'perms' => '0644', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'adminInfo/cronMoodle.txt', 'perms' => '0644', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'adminInfo/cronMoodle2.txt', 'perms' => '0644', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'adminInfo/updateIntranet.txt', 'perms' => '0644', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'adminInfo/updateMoodle.txt', 'perms' => '0644', 'link' => false);
$files[] = array('filename' => $agora['server']['root'] . 'adminInfo/updateMoodle2.txt', 'perms' => '0644', 'link' => false);

echo '<h2>Fitxers</h2>';
foreach ($files as $file) {
    $filename = $file['filename'];
    echo '<h3>Fitxer: ' . $filename . '</h3>';
    if (file_exists($filename)) {
        echo '<div>';
        $linkinfo = is_link($filename) ? readlink($filename) : 'No és enllaç simbòlic';
        $size = filesize($filename);
        if ($size <= 1) {
            echo '<div class="alert-danger">';
            echo '<strong>Mida:</strong> ' . $size;
            echo '</div>';
        } else {
            echo '<strong>Mida:</strong> ' . $size . '<br>';
        }

        echo '<strong>Propietari:</strong> ' . fileowner($filename) . '<br>';
        $perms = substr(sprintf('%o', fileperms($filename)), -4);
        if ($perms != $file['perms']) {
            echo '<div class="alert-warning">';
            echo '<strong>Permisos:</strong> ' . $perms . '. Esperat: ' . $file['perms'];
            echo '</div>';
        } else {
            echo '<strong>Permisos:</strong> ' . $perms . '<br>';
        }

        if (is_link($filename) != $file['link']) {
            echo '<div class="alert-danger">';
            echo '<strong>Enllaç simbòlic:</strong> ' . $linkinfo;
            echo '</div>';
        } else {
            echo '<strong>Enllaç simbòlic:</strong> ' . $linkinfo . '<br>';
        }
        echo '<strong>Creació:</strong> ' . date(DATE_RFC822, filectime($filename)) . '<br>';
        echo '<strong>Darrera modificació:</strong> ' . date(DATE_RFC822, filemtime($filename)) . '<br>';
        echo '<strong>Espai lliure:</strong> ' . fileSizeUnits(disk_free_space(dirname($filename))) . '<br>';
    } else {
        echo '<div class="alert alert-danger">';
        echo 'El fitxer no existeix.<br>';
    }
    echo '</div>';
}


echo '</body></html>';

function fileSizeUnits($FZ) {
    $FS = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

    return number_format($FZ/pow(1024, $I=floor(log($FZ, 1024))), 2) . ' ' . $FS[$I];
}
