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

        try {
            // Conexión a la base de datos en modo procedural
            $db = mysqli_connect(
                $agora['admin']['host'],
                $agora['admin']['username'],
                $agora['admin']['userpwd'],
                $agora['admin']['database'],
                $agora['admin']['port']
            );

            if (!$db) {
                // Error de conexión
                error_log("La conexión a la base de datos ha fallado: " . mysqli_connect_error());
            } else {
                // Escapar el parámetro DNS para evitar inyecciones SQL
                $escaped_dns = mysqli_real_escape_string($db, $dns_param);

                // Consulta SQL para obtener el estado de la instancia
                $sql = "SELECT status FROM instances WHERE db_host = '$escaped_dns';";
                $result = mysqli_query($db, $sql);

                if ($result && $row = mysqli_fetch_assoc($result)) {
                    $status = $row['status'];
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

                // Liberar el resultado de la consulta si existe
                if ($result) {
                    mysqli_free_result($result);
                }

                // Cerrar la conexión a la base de datos
                mysqli_close($db);
            }
        } catch (Exception $e) {
            // Error inesperado durante la conexión o la consulta
            error_log("Error durante la conexión o la consulta: " . $e->getMessage());
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            color: #333;
        }
        .container {
            margin-top: 150px;
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
        header, footer {
            text-align: center;
        }
        header img,footer img {
            margin: 8px 16px;
        }
        header {
            border-bottom: 2px solid #FF494E;
        }
        footer {
            border-top: 1px solid #FF494E;
            position: fixed;
            bottom: 0;
            width: 100%;
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