<?php

include_once 'config/env-config.php';
include_once 'config/dblib-mysql.php';

global $agora;

// Default message.
$instance_status_message = 'No s\'ha trobat el lloc web';

// Get required parameter.
$dns = filter_input(INPUT_GET, 'dns', FILTER_SANITIZE_SPECIAL_CHARS);
$service = filter_input(INPUT_GET, 's', FILTER_SANITIZE_SPECIAL_CHARS);

if (is_string($dns) && is_string($service) && isValidDNS($dns) && in_array($service, ['Nodes', 'Moodle'], true)) {

    $status = getInstanceStatus($dns, $service);

    if ($status !== null) {
        $instance_status_message = match ($status) {
            'pending' => 'Aquest espai està pendent d\'activació',
            'inactive' => 'Aquest espai es troba temporalment fora de servei',
            'withdrawn' => 'Aquest espai ha estat donat de baixa',
            default => 'Aquest espai es troba fora de servei',
        };
    }

}

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error d'accés a Àgora</title>
    <style>
        /* Minimalistic CSS styles for the structure without final aesthetics */
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
            height: 31px;
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
            color: #d9534f;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <header>
        <p>
            <img src="portal/images/logo_defp.png" alt="">
            <img src="portal/images/top_eix_color.png" alt="">
        </p>
    </header>

    <div class="container">
        <h1>No s'ha pogut accedir a la pàgina sol·licitada</h1>
        <p><?php echo htmlspecialchars($instance_status_message); ?></p>
    </div>

    <footer>
        <p>
            <img src="portal/images/logo_defp.png" alt="">
            <img src="portal/images/xtec.png" alt="">
            <img src="portal/images/top_eix_color.png" alt="">
        </p>
    </footer>
</body>
</html>
