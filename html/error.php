<?php
// Carga los archivos de configuración y la biblioteca de la base de datos

include 'config/env-config.php';
include 'config/dblib-mysql.php';
global $agora;

$instance_status_message = "Aquest espai es troba fora de servei"; // Mensaje por defecto

// Verificación del parámetro 'dns'
if (isset($_GET['dns']) && is_string($_GET['dns'])) {
    $dns_param = $_GET['dns'];

    if (isValidFQDN($dns_param)) {
        // El DNS es válido, procede con la consulta a la base de datos
        // Asegúrate de que $DB sea una instancia de conexión a la base de datos inicializada por dblib-mysql.php

        $status = getInstanceStatus($dns_param);

        if ($status !== null) {
            switch ($status) {
                case 'pending':
                    $instance_status_message = "Aquest espai està pendent d'activació";
                    break;
                case 'inactive':
                    $instance_status_message = "Aquest espai es troba, temporalment, fora de servei";
                    break;
                case 'withdrawn':
                    $instance_status_message = "Aquest espai ha estat donat de baixa";
                    break;
                default:
                    $instance_status_message = "Aquest espai es troba fora de servei";
                    break;
            }
        }

    }
}

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error d'accés</title>
    <style>
        /* Estilos CSS minimalistas para la estructura sin la estética final */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            flex-direction: column;
        }

        header, footer {
            text-align: center;
        }

        header img, footer img {
            margin: 8px 16px;
        }

        header {
            border-bottom: 2px solid #FF494E;
        }

        footer {
            border-top: 1px solid #FF494E;
        }

        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #d9534f; /* Color rojo para el error */
            margin-bottom: 20px;
        }

        p {
            font-size: 1.1em;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <header>
        <p><img src="portal/images/departament.png"><img src="portal/images/top_eix_color.png"></p>
    </header>

    <div class="container">
        <h1>No s'ha pogut accedir a la pàgina sol·licitada</h1>
        <p><?php echo htmlspecialchars($instance_status_message); ?></p>
    </div>

    <footer>
        <p><img src="portal/images/departament.png"><img src="portal/images/xtec.png"><img src="portal/images/top_eix_color.png"></p>
    </footer>
</body>
</html>
