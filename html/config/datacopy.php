<?php

global $agora;

require ('env-config.php');

$dades = array();

// Pas 1: Connectar a la base de dades
$dbc = mysqli_connect($agora['admin']['host'], $agora['admin']['username'], $agora['admin']['userpwd'], $agora['admin']['database'], $agora['admin']['port']);
$dbc->set_charset('utf8');


// Pas 2: Obtenir l'id dels serveis moodle i moodle2
$sql = "SELECT serviceId FROM agoraportal_services WHERE serviceName='moodle'";
$res = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$serviceIdMdl = $row['serviceId'];

$sql = "SELECT serviceId FROM agoraportal_services WHERE serviceName='moodle2'";
$res = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$serviceIdMdl2 = $row['serviceId'];


// Pas 3: Obtenir les dades del Moodle 2
$sql = "SELECT activedId, contactName, contactMail, contactProfile FROM agoraportal_client_services 
        WHERE serviceId = $serviceIdMdl2 AND activedId > 0 ORDER BY activedId";
$res = mysqli_query($dbc, $sql);
while ($row = mysqli_fetch_array($res)) {
    $dades[$row['activedId']] = array (
        'contactName' => $row['contactName'],
        'contactMail' => $row['contactMail'],
        'contactProfile' => $row['contactProfile']);
}


// Pas 4: Obtenir les dades del Moodle 1.9 i actualitzar les del Moodle 2 si és necessari
$sql = "SELECT activedId, contactName, contactMail, contactProfile FROM agoraportal_client_services 
        WHERE serviceId = $serviceIdMdl";
$res = mysqli_query($dbc, $sql);
while ($row = mysqli_fetch_array($res)) {
    if (isset($dades[$row['activedId']])) {
        if (empty($dades[$row['activedId']]['contactName'])) {
            $dades[$row['activedId']] = array(
                'contactName' => $row['contactName'],
                'contactMail' => $row['contactMail'],
                'contactProfile' => preg_replace("/(')\\1+/", "$1", $row['contactProfile'])); // Esborra apòstrofs repetits
        }
    }
}


// Pas 5: Actualitzar les dades
foreach ($dades as $activedId => $centre) {
    if (!empty($centre['contactName'])) {
        $sql = "UPDATE agoraportal_client_services
                SET contactName = '" . mysqli_real_escape_string($dbc, $centre['contactName']) . "',
                    contactMail = '" . mysqli_real_escape_string($dbc, $centre['contactMail']) . "',
                    contactProfile = '" . mysqli_real_escape_string($dbc, $centre['contactProfile']) . "'
                WHERE activedId = $activedId
                AND serviceId = $serviceIdMdl2;";
        if (mysqli_query($dbc, $sql) !== true) {
            echo "S'ha produït un error en actualitzar el Moodle amb ID $activedId<br />";
            echo "$sql<br />";
        } else {
            echo "S'ha actualitzat el Moodle amb ID $activedId<br />";
        }
    }
}


echo "Proc&acute;s finalitzat";
