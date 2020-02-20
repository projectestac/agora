<?php
require_once('env-config.php');
?>

<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="utf-8">
<title>Check Files</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<?php

$fixcacheconfig = (isset($_GET['fixcacheconfig'])) ? true : false;

$hostname = getenv('HOSTNAME');
if (empty($hostname)) {
    $hostname = gethostname();
}

echo '<h1>Check files</h1>';
echo '<div class="well well-sm">Servidor web: ' . $hostname . ' (' .php_uname('s') . ')<br/>';
echo 'Hora del servidor: ' . date("d-m-Y H:i:s e (P)") . '</div>';
echo '<h3>Prova de connexió de curl</h3>';

$url = $agora['server']['school_information'] . '08000013';
$curlhandle = curl_init();
curl_setopt($curlhandle, CURLOPT_URL, $url);
curl_setopt($curlhandle, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($curlhandle, CURLOPT_RETURNTRANSFER, true);
$buffer = curl_exec($curlhandle);
$curlinfo = curl_getinfo($curlhandle);
curl_close($curlhandle);
if (empty($buffer)) {
    echo '<div class="alert-danger alert">';
    $buffer = 'Empty buffer';
} else {
    echo '<div class="alert-success alert">';
    $buffer = utf8_encode($buffer);
}

echo '<strong>Contingut:</strong> ' . $buffer;
foreach ($curlinfo as $key => $value) {
    if (!is_array($value) && !empty($value)) {
        echo '<br><strong>'.$key.'</strong>: '.$value;
    }
}
echo '</div>';

$files[] = array('filename' => $agora['dbsource']['dir'] . 'allSchools.php', 'perms' => 0660, 'link' => false,
    'message' => 'Error greu en informació d\'escoles', 'old' => 86400);
$files[] = array('filename' => $agora['server']['root'] . 'html/.htaccess', 'perms' => 0640, 'link' => false,
    'message' => 'Error de configuració general');
$files[] = array('filename' => $agora['server']['root'] . 'html/config/env-config.php', 'perms' => 0640, 'link' => false,
    'message' => 'Error de configuració general');
$files[] = array('filename' => $agora['server']['root'] . 'html/config/config.php', 'perms' => 0640, 'link' => false,
    'message' => 'Error de configuració general');
$files[] = array('filename' => $agora['server']['root'] . 'html/config/config-restricted.php', 'perms' => 0640, 'link' => false,
    'message' => 'Error de configuració general');
$files[] = array('filename' => $agora['server']['root'] . 'html/config/sync-config.sh', 'perms' => 0750, 'link' => false,
    'message' => 'Error al cron de l\'allschools');
$files[] = array('filename' => $agora['server']['root'] . 'html/config/sync.sh', 'perms' => 0750, 'link' => false,
    'message' => 'Error al cron de l\'allschools');
$files[] = array('filename' => $agora['server']['root'] . 'html/moodle2/config.php', 'perms' => 0640, 'link' => false,
    'message' => 'Error en la configuració dels Moodle');
$files[] = array('filename' => $agora['server']['root'] . 'html/moodle2/filter/tex/mimetex.linux', 'perms' => 0750, 'link' => false,
    'message' => 'El filtre Latex a Moodle no funcionarà');
$files[] = array('filename' => $agora['server']['root'] . 'html/moodle2/local/agora/muc/', 'perms' => 0770, 'link' => false,
    'message' => 'Error en la caché de Moodle');
$files[] = array('filename' => $agora['server']['root'] . 'html/moodle2/local/agora/muc/cacheconfig.php', 'perms' => 0660, 'link' => false,
    'message' => 'Error en la caché de Moodle');
$files[] = array('filename' => $agora['server']['root'] . 'html/wordpress/.htaccess', 'perms' => 0640, 'link' => false,
    'message' => 'Error en la configuració dels nodes');
$files[] = array('filename' => $agora['server']['root'] . 'html/wordpress/wp-config.php', 'perms' => 0640, 'link' => false,
    'message' => 'Error en la configuració dels nodes');
$files[] = array('filename' => $agora['server']['root'] . 'html/wordpress/wp-content/uploads', 'perms' => 0770, 'link' => true,
    'message' => 'Error als fitxers de dades de nodes');
$files[] = array('filename' => $agora['server']['root'] . $agora['moodle2']['datadir'] . $agora['moodle2']['diskusagefile'], 'perms' => 0640, 'link' => false,
    'message' => 'Error a la informació de disc de Moodle o el cron no funciona', 'old' => 86400);
$files[] = array('filename' => $agora['server']['root'] . $agora['nodes']['datadir'] . $agora['nodes']['diskusagefile'], 'perms' => 0640, 'link' => false,
    'message' => 'Error a la informació de disc de Nodes o el cron no funciona', 'old' => 86400);
$files[] = array('filename' => $agora['server']['root'] . $agora['server']['datadir'] . 'adminInfo/cronIntranet.txt', 'perms' => 0664, 'link' => false,
    'message' => 'Error als crons de la intranet', 'old' => 86400);
$files[] = array('filename' => $agora['server']['root'] . $agora['server']['datadir'] . 'adminInfo/cronMoodle2.txt', 'perms' => 0664, 'link' => false,
    'message' => 'Error als crons de Moodle', 'old' => 86400);
$files[] = array('filename' => $agora['server']['root'] . $agora['server']['datadir'] . 'adminInfo/cronNodes.txt', 'perms' => 0664, 'link' => false,
    'message' => 'Error als crons de Nodes', 'old' => 86400);

$time = time();

echo '<h2>Fitxers</h2>';
foreach ($files as $file) {
    $error = false;
    $filename = $file['filename'];
    echo '<h3>Fitxer: ' . $filename . '</h3>';
    if (file_exists($filename)) {
        echo '<div class="well">';
        $linkinfo = is_link($filename) ? readlink($filename) : 'No és enllaç simbòlic';
        $size = filesize($filename);
        if ($size <= 1) {
            echo '<div class="alert-danger">';
            echo '<strong>Mida:</strong> ' . fileSizeUnits($size);
            echo '</div>';
            $error = true;
        } else {
            echo '<strong>Mida:</strong> ' . fileSizeUnits($size) . '<br>';
        }

        echo '<strong>Propietari:</strong> ' . fileowner($filename) . '<br>';
        $perms = fileperms($filename);
        if ($fixcacheconfig && strpos($filename, '/muc/')) {
            if (!comparePermissions($perms, $file['perms'])) {
                $perms += 0220;
                chmod($filename, $perms);
                echo '<div class="alert-danger alert">';
                echo '<strong>Assignats permissos a la MUC</strong>';
                echo '</div>';
            }
        }
        if (!comparePermissions($perms, $file['perms'])) {
            echo '<div class="alert-danger alert">';
            echo '<strong>Permisos:</strong> ' . getPermissionsString($perms) . '. Mínim esperat: ' . getPermissionsString($file['perms']);
            echo '</div>';
            $error = true;
        } else {
            echo '<strong>Permisos:</strong> ' . getPermissionsString($perms) . '<br>';
        }

        $output = shell_exec("getfacl $filename");
        if (!empty($output)) {
            echo "<pre>$output</pre>";
        }

        if (is_link($filename) != $file['link']) {
            echo '<div class="alert-danger alert">';
            echo '<strong>Enllaç simbòlic:</strong> ' . $linkinfo;
            echo '</div>';
            $error = true;
        } else {
            echo '<strong>Enllaç simbòlic:</strong> ' . $linkinfo . '<br>';
        }
        $filetime = max(filectime($filename),  filemtime($filename));
        echo '<strong>Darrera modificació:</strong> ' . date(DATE_RFC822, $filetime) . '<br>';
        if (isset($file['old']) && !empty($file['old'])) {
            if ($time - $filetime > $file['old']) {
                echo '<div class="alert-danger alert">';
                echo '<strong>El fitxer és massa antic</strong>';
                echo '</div>';
                $error = true;
            }
        }
        echo '<strong>Espai lliure:</strong> ' . fileSizeUnits(disk_free_space(dirname($filename))) . '<br>';
        if ($error && isset($file['message']) && !empty($file['message'])) {
            echo '<div class="alert alert-danger">'.$file['message'].'</div>';
        }
    } else {
        echo '<div class="alert alert-danger">';
        echo 'El fitxer no existeix.<br>';
        if (isset($file['message']) && !empty($file['message'])) {
            echo $file['message'].'<br>';
        }
    }
    echo '</div>';
}


echo '</div></body></html>';

function fileSizeUnits($FZ) {
    $FS = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

    return ($FZ == 0) ? 'B' : number_format($FZ/pow(1024, $I=floor(log($FZ, 1024))), 2) . ' ' . $FS[$I];
}


function comparePermissions($perms, $expectedperms) {
    // Permissions in octal
    $fileperms = array();
    $fileperms['ur'] = (($perms & 0x0100) ? true : false);
    $fileperms['uw'] = (($perms & 0x0080) ? true : false);
    $fileperms['ux'] = (($perms & 0x0040) ? true : false);
    $fileperms['gr'] = (($perms & 0x0020) ? true : false);
    $fileperms['gw'] = (($perms & 0x0010) ? true : false);
    $fileperms['gx'] = (($perms & 0x0008) ? true : false);
    $fileperms['or'] = (($perms & 0x0004) ? true : false);
    $fileperms['ow'] = (($perms & 0x0002) ? true : false);
    $fileperms['ox'] = (($perms & 0x0001) ? true : false);

    $expected = array();
    $expected['ur'] = (($expectedperms & 0x0100) ? true : false);
    $expected['uw'] = (($expectedperms & 0x0080) ? true : false);
    $expected['ux'] = (($expectedperms & 0x0040) ? true : false);
    $expected['gr'] = (($expectedperms & 0x0020) ? true : false);
    $expected['gw'] = (($expectedperms & 0x0010) ? true : false);
    $expected['gx'] = (($expectedperms & 0x0008) ? true : false);
    $expected['or'] = (($expectedperms & 0x0004) ? true : false);
    $expected['ow'] = (($expectedperms & 0x0002) ? true : false);
    $expected['ox'] = (($expectedperms & 0x0001) ? true : false);

    $hasperm = true;
    foreach ($expected as $p => $val) {
        if ($val) {
            if ($fileperms[$p]) {
                $hasperm = true;
            } else {
                return false;
            }
        }
    }

    return $hasperm;
}

function getPermissionsString($perms) {

    if (($perms & 0xC000) == 0xC000) {
        // Socket
        $info = 's';
    } else if (($perms & 0xA000) == 0xA000) {
        // Symbolic Link
        $info = 'l';
    } else if (($perms & 0x8000) == 0x8000) {
        // Regular
        $info = '-';
    } else if (($perms & 0x6000) == 0x6000) {
        // Block special
        $info = 'b';
    } else if (($perms & 0x4000) == 0x4000) {
        // Directory
        $info = 'd';
    } else if (($perms & 0x2000) == 0x2000) {
        // Character special
        $info = 'c';
    } else if (($perms & 0x1000) == 0x1000) {
        // FIFO pipe
        $info = 'p';
    } else {
        // Unknown
        $info = 'u';
    }

    // Owner
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ?
                (($perms & 0x0800) ? 's' : 'x' ) :
                (($perms & 0x0800) ? 'S' : '-'));

    // Group
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ?
                (($perms & 0x0400) ? 's' : 'x' ) :
                (($perms & 0x0400) ? 'S' : '-'));

    // World
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ?
                (($perms & 0x0200) ? 't' : 'x' ) :
                (($perms & 0x0200) ? 'T' : '-'));

    $info .= ' ('.substr(sprintf('%o', $perms), -4).')';
    return $info;
}