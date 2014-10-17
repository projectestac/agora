<?php

define('NO_OUTPUT_BUFFERING', true);

require_once('../../../config.php');
\core\session\manager::write_close();

require_once('scripts.lib.php');

$actions = scripts_api_list_scripts();

echo json_encode($actions);
