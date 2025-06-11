<!DOCTYPE html>
<html lang="ca">
    <head>
        <title>Servei &Agrave;gora</title>
        <meta charset="utf-8">
        <style>
            body {
                line-height: normal;
                background: #739cce;
                color: black;
                padding: 0;
                font-family: Arial, Helvetica, Univers, Sans-serif, serif;
                font-size: 10pt;
                margin: 0;
            }
            a {
                color: #739cce;
            }
            .wrapper {
                width:610px;
                margin: 0 auto;
                background: white;
            }
            h1 {
                text-align: center;
                margin: 30px 10px;
                font-size: 1.6em;
            }
            .content {
                padding: 20px;
            }
            .center {
                text-align:center;
            }
            .right{
                padding: 15px;
                margin-bottom:10px;
                color:#000;
                text-align: right;
            }
            .xtec_int{background: url("portal/images/importat/xtec_int.gif") #113b83;}
            .bottom{background:  url("portal/images/importat/au_titol.gif") repeat-x ; padding:9px; }
        </style>
    </head>

<?php
    include 'config/env-config.php';
    include 'config/dblib-mysql.php';
    global $agora;
?>
    <body>
        <div class="wrapper">
            <div class="header imp">
                <p class="xtec_int">&nbsp; </p>
                <p class="bottom">&nbsp; </p>
            </div>
            <div class="content">
            <?php if (isset($_GET['error'])) { ?>
                <h1>SERVEI &Agrave;GORA NO DISPONIBLE</h1>
                <p>El servei &Agrave;gora no està disponible en aquests moments. Estem treballant per solucionar els problemes 
                    t&egrave;cnics com més aviat millor.</p>
                <p>Disculpeu les mol&egrave;sties que aquesta aturada us pugui ocasionar.</p>
            <?php } elseif (isset($_GET['newaddress'])) { ?>
                <h1>CANVI D'ADREÇA D'AQUEST ESPAI</h1>
                <p>L'espai al que esteu intentant accedir ha canviat d'adreça.</p>
                <p>L'adreça nova &eacute;s:</p>
                <p class="center"><a href="<?php echo $_GET['newaddress'] ?>"><?php echo $_GET['newaddress'] ?></a></p>
                <br/>
                <p>Per aquest motiu, és recomanable que, tan aviat com pugueu, actualitzeu l'enllaç i, en cas que sigueu 
                    l'administrador us assegureu que no hi ha cap enllaç trencat.</p>
            <?php } elseif (isset($_GET['migrating'])) { ?>
                <h1>SERVEI D'ÀGORA EN PROCÉS DE MIGRACIÓ</h1>
                <p>Aquest espai web es troba temporalment fora de servei. En aquests moments s'estan duent a terme tasques de 
                    traspàs de dades per transferir-lo a un nou servidor amb més capacitat.</p>
                <p>Prova de nou l'accés: <a href="<?php echo $agora['server']['server'] . $agora['server']['base'] . $_GET['migrating'] . '/' . $_GET['s'] ?>"><?php echo $agora['server']['server'] . $agora['server']['base'] . $_GET['migrating'] . '/' . $_GET['s'] ?></a></p>
                <br />
                <p>Preguem disculpeu les molèsties</p>
                <br />
            <?php } elseif (isset($_GET['migrated'])) { ?>
                <h1>SERVEI D'ÀGORA MIGRAT A EIX</h1>
                <p>Aquest espai web ha canviat d'ubicació. L'URL nou és el següent:</p>
                <p><a href="<?php echo 'https://educaciodigital.cat' . $agora['server']['base'] . $_GET['migrated'] . '/' . $_GET['s'] ?>"><?php echo 'https://educaciodigital.cat' . $agora['server']['base'] . $_GET['migrated'] . '/' . $_GET['s'] ?></a></p>
                <br />
                <p>Preguem disculpeu les molèsties</p>
                <br />
            <?php } elseif (isset($_GET['saturated'])) { ?>
                <h1>SATURACIÓ A ÀGORA</h1>
                <p>En aquests moments els servidors estan rebent moltes visites. Per evitar la saturació de la plataforma s'hi 
                    està limitant l'accés. Si us plau, torneu a provar d'entrar passats 15 minuts:</p>
                <p><a href="<?php echo $agora['server']['server'] . $agora['server']['base'] . $_GET['saturated'] . '/' . $_GET['s'] ?>"><?php echo $agora['server']['server'] . $agora['server']['base'] . $_GET['saturated'] . '/' . $_GET['s'] ?></a></p>
                <br />
                <p>Preguem disculpeu les molèsties</p>
                <br />
            <?php } else {
                $dns = $_GET['dns'];
                if (!isValidDNS($dns)) {
                    // El nom propi no és vàlid. No es pot mostrar per evitar problemes de XSS.
                ?>
                    <h1>URL D'ÀGORA NO VÀLID</h1>
                    <p>L'URL que heu indicat no es correspon amb cap URL vàlid del servei Àgora de la XTEC. Si us plau, 
                        reviseu-lo i torneu-ho a provar.</p>
                <?php } else { ?>
                    <h1>ACC&Eacute;S ERRONI A UN SERVEI D'&Agrave;GORA</h1>
                    <p>No s'ha trobat l'espai al qual heu intentat accedir. Les causes m&eacute;s probables s&oacute;n que hàgiu 
                        escrit l'adreça incorrecta a la finestra del navegador o que l'espai sol·licitat no estigui operatiu.</p>
                    <p>L'adreça que heu escrit ha estat <strong><?php echo $agora['server']['server'] . $agora['server']['base'] . $dns . '/' . $_GET['s'] ?></strong></p>
                    <p>Si no ho heu fet encara, podeu sol·licitar l'alta als serveis d'&Agrave;gora des d'<a href="<?php echo $agora['server']['server'] . $agora['server']['base'] ?>portal/">aquí</a>.</p>
                    <div class="right">
                        <a href="<?php echo $agora['server']['server'] . $agora['server']['base'] ?>moodle/moodle/mod/resource/view.php?id=661">Condicions d'&uacute;s</a>
                    </div>
            <?php } } ?>

        </div>
    </body>
</html>
