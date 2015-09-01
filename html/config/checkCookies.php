<?php

// L'array següent serveix per tenir disponibles els valors sense haver-los de recordar
// Per omplir l'array següent cal tenir en compte que té dos índexos:
// 1r índex: Nom de la galeta: BIGipServer...
// 2n índex: Nom del frontal:
// Valor: valor de la galeta per aquell frontal
$agoracookies = array();
// XTECBlocs
// CMO PRO
$agoracookies['BIGipServerphp-blocs-pool'] = array(
    'vmblocspro01' => '514693898.20480.0000',
    'vmblocspro02' => '548248330.20480.0000',
    'vmblocspro03' => '565025546.20480.0000');
// FMO PRE
$agoracookies['BIGipServerPOOL_ENS_1068_INTRANETBE_PREHPM_80'] = array(
    'lxtcsut0' => 'rd4025o00000000000000000000ffff0a311815o80',
    'lxtcsut1' => 'rd4025o00000000000000000000ffff0a311848o80');
// FMO PRO
$agoracookies['BIGipServerPOOL_ENS_1068_INTRANETBE_PROHPM_80'] = array(
    'lxtcsut0' => 'rd4026o00000000000000000000ffff0a301813o80',
    'lxtcsut1' => 'rd4025o00000000000000000000ffff0a311848o80');

// Odissea
// CMO PRO
$agoracookies['BIGipServerphp-odissea-pool'] = array(
    'vmphodisseapro01' => '917347082.20480.0000',
    'vmphodisseapro02' => '934124298.20480.0000',
    'vmphodisseapro03' => '950901514.20480.0000',
    'phodisseab1' => '531471114.20480.0000');
// FMO PRO
$agoracookies['BIGipServerPOOL_ENS_1061_INTRANETBE_PROHPM'] = array(
    'lodisut0' => 'rd4026o00000000000000000000ffff0a301814o80',
    'lodisut1' => 'rd4026o00000000000000000000ffff0a301850o80');

// Àgora
// CMO ACC
$agoracookies['ROUTEID'] = array('1' => '.1', '2' => '.2');
$agoracookies['ROUTEID2'] = array('1' => '.1', '2' => '.2');

// CMO PRO
$agoracookies['BIGipServerphp-agora-pool'] = array(
    'phagora1' => '195926794.20480.0000',
    'phagora2' => '212704010.20480.0000',
    'phagora3' => '229481226.20480.0000',
    'phagorab1' => '397253386.20480.0000',
    'phagorab2' => '414030602.20480.0000',
    'phagorab3' => '430807818.20480.0000',
    'phagorac1' => '598579978.20480.0000',
    'phagorac2' => '615357194.20480.0000',
    'phagorac3' => '632134410.20480.0000',
    'phagorac4' => '665688842.20480.0000',
    'phagoraf1' => '732797706.20480.0000',
    'phagoraf2' => '749574922.20480.0000',
    'phagorav1' => '799906570.20480.0000');
// FMO PRE
$agoracookies['BIGipServerPOOL_ENS_1051_INTRANETBE_PREHPM'] = array(
    'lagosut0' => 'rd4025o00000000000000000000ffff0a311828o80',
    'lagosut1' => 'rd4026o00000000000000000000ffff0a301824o80');
// FMO PRO
$agoracookies['BIGipServerPOOL_ENS_1051_INTRANETBE_PROHPM_80'] = array(
    'lagosux0' => 'rd4026o00000000000000000000ffff0a301848o80',
    'lagosux1' => 'rd4026o00000000000000000000ffff0a301849o80',
    'lagosux2' => 'rd4026o00000000000000000000ffff0a30184ao80',
    'lagosux3' => 'rd4026o00000000000000000000ffff0a30184bo80',
    'lagosux4' => 'rd4026o00000000000000000000ffff0a30184co80',
    'lagosux5' => 'rd4026o00000000000000000000ffff0a30184do80',
    'lagosux6' => 'rd4026o00000000000000000000ffff0a30184eo80',
    'lagosux7' => 'rd4026o00000000000000000000ffff0a301823o80');

// EOI
// CMO PRO
$agoracookies['BIGipServerphp-agora-eoi-pool'] = array(
    'vmpheoipro01' => '900569866.20480.0000',
    'vmpheoipro02' => '967678730.20480.0000');
// FMO PRO
$agoracookies['BIGipServerPOOL_ENS_1143_INTRANETBE_PROHPM_80'] = array(
    'lagosux8' => 'rd4025o00000000000000000000ffff0a311828o80',
    'lagosux9' => 'rd4026o00000000000000000000ffff0a301851o80');

// Prestatgeria
// CMO PRO
$agoracookies['BIGipServerphora-pool'] = array(
    'vmphppro01' => '984455946.20480.0000',
    'vmphppro02' => '1001233162.20480.0000');

$cookies = "";
if (count($_COOKIE) > 0) {
    foreach ($_COOKIE as $key => $value) {
        if (isset($agoracookies[$key])) {
            if (isset($_POST[$key]) && !empty($_POST[$key])) {
                $cookieparams = session_get_cookie_params();
                $value = $_POST[$key];
                setcookie($key, $value, 0, $cookieparams['path'], $cookieparams['domain']);
            }
            $cookies .= '<div class="form-group">';
            $cookies .= '<label for="'.$key.'">'.$key.'</label>';
            $cookies .= '<select class="form-control" id="'.$key.'_sel" onchange="changeText(\''.$key.'\')">';
            $cookies .= '<option value="">Escriu el valor</option>';
            foreach ($agoracookies[$key] as $frontend => $cookieval) {
                if ($value == $cookieval) {
                    $cookies .= '<option selected value="'.$cookieval.'">'.$frontend.'</option>';
                } else {
                    $cookies .= '<option value="'.$cookieval.'">'.$frontend.'</option>';
                }
            }
            $cookies .= '</select>';
            $cookies .= '<input class="form-control" name="'.$key.'" id="'.$key.'" value="'.$value.'">';
            $cookies .= '</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="utf-8">
<title>Check cookies</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<script>
function changeText(key) {
    var k = key+"_sel";
    var selector = document.getElementById(k);
    var val = selector.options[selector.selectedIndex].value;
    if(val != "") {
        document.getElementById(key).value = val;
    }
}
</script>
</head>
<body>
<div class="container">
<?php
$hostname = getenv('HOSTNAME');
if (empty($hostname)) {
    $hostname = gethostname();
}
echo "<h1>Check cookies on $hostname</h1>";
if (count($_COOKIE) > 0) {
    echo '<div class="well well-sm">Cookies are enabled</div>';
    if (!empty($cookies)) {
        echo '<form method="POST">'.$cookies;
        echo '<button type="submit" class="btn btn-primary">Submit</button>';
        echo '</form>';
    } else {
        echo 'No hi ha cookies de balanceig';
    }
} else {
    echo '<div class="alert-danger alert">Cookies are disabled</div>';
}

?>
</div></body></html>