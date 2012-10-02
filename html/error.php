<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ca" lang="ca">
    <head>
        <title>Servei &Agrave;gora</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="portal/config/styles/style.css" />
        <link rel="stylesheet" type="text/css" href="portal/config/styles/style-media.css" media="print" />
        <script language="javascript" type="text/javascript" src="portal/javascript/javascript.js"></script>

    </head>

<?php
    include 'config/env-config.php';
    global $agora;
?>

    <body>
        <div class="wrapper" id="#0">
            <div class="header imp">
                <p class="xtec_int">&nbsp; </p>
                <p class="quadres">&nbsp; </p>
                <p class="bottom">&nbsp; </p>
            </div>

            <?php if (isset($_GET['error'])) { ?>
                <h1 class="titol imp">SERVEI &Agrave;GORA NO DISPONIBLE</h1>
                <div class="content">
                    <div>
                        <p>El servei &Agrave;gora no està disponible en aquests moments. Es treballa per solucionar els problemes t&egrave;cnics el més aviat possible.</p>
                        <p>Disculpeu les mol&egrave;sties que aquesta aturada us pugui ocasionar.</p>
                    </div>
                </div>
            <?php } elseif (isset($_GET['newaddress'])) { ?>
                <h1 class="titol imp">CANVI D'ADREÇA D'AQUEST ESPAI</h1>
                <div class="content">
                    <div>
                        <p><br/><br/></p>
                        <p>L'espai al que est&agrave;s intentant accedir ha canviat d'adreça.</p>
                        <p>L'adreça nova &eacute;s:<br/> 
                            <p style="text-align:center;"><a href="<?php echo $_GET['newaddress'] ?>">
                                    <?php echo $_GET['newaddress'] ?></a></p>
                        </p>
                        <p><br/>Per aquest motiu, és recomanable que, tan aviat com puguis, actualitzis l'enllaç i, en cas que siguis l'administrador/a t'asseguris de que no hi ha cap enllaç trencat.</p> 
                    </div>
                </div>	
            <?php } else { ?>
                <h1 class="titol imp">ACC&Eacute;S ERRONI A UN SERVEI D'&Agrave;GORA</h1>
                <div class="content">
                    <div>
                        <p>No s'ha trobat l'espai al qual has intentat accedir. Les causes m&eacute;s probables s&oacute;n que hagis escrit
                            l'adreça incorrecta a la finestra del navegador o que l'espai sol·licitat no estigui operatiu.</p>
                        <p>L'adreça que has escrit ha estat <strong><?php echo $agora['server']['server'] . $agora['server']['base'] . $_GET['dns'] ?>/<?php echo $_GET['s'] ?></strong></p>
                        <p>Si no ho heu fet encara, podeu sol·licitar l'alta als serveis d'&Agrave;gora des d'<a href="<?php echo $agora['server']['server'] . $agora['server']['base'] ?>portal/">aquí</a>.</p>
                    </div>
                    <div id="formulari">
                        <div style="text-align: right;">
                            <a href="<?php echo $agora['server']['server'] . $agora['server']['base'] ?>moodle/moodle/mod/resource/view.php?id=661">Condicions d'&uacute;s</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="footer imp">
                <p>&nbsp;</p>
            </div>
        </div>
    </body>
</html>