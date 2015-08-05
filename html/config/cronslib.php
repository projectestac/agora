<?php

/**
 * Returns all the arguments passed from CLI or $_REQUEST and defines CLI_SCRIPT if needed
 * @return array with the arguments
 */
function get_webargs() {
    $arguments = array();
    if (isset($_SERVER['argv'])) {
        define('CLI_SCRIPT', true);
        if (count($_SERVER['argv']) > 1) {
            $rawoptions = $_SERVER['argv'];

            if (($key = array_search('--', $rawoptions)) !== false) {
                $rawoptions = array_slice($rawoptions, 0, $key);
            }

            unset($rawoptions[0]);
            foreach ($rawoptions as $raw) {
                if (substr($raw, 0, 2) === '--') {
                    $value = substr($raw, 2);
                    $parts = explode('=', $value);
                    if (count($parts) == 1) {
                        $key   = reset($parts);
                        $value = true;
                    } else {
                        $key = array_shift($parts);
                        $value = implode('=', $parts);
                    }
                    $arguments[$key] = $value;

                } else if (substr($raw, 0, 1) === '-') {
                    $value = substr($raw, 1);
                    $parts = explode('=', $value);
                    if (count($parts) == 1) {
                        $key   = reset($parts);
                        $value = true;
                    } else {
                        $key = array_shift($parts);
                        $value = implode('=', $parts);
                    }
                    $arguments[$key] = $value;
                }
            }
        }
    } else {
        foreach ($_REQUEST as $name => $value) {
            $arguments[$name] = $value;
        }
    }
    return $arguments;
}

function cli_print_line($line) {
    if (defined('CLI_SCRIPT')) {
        $line = strip_tags($line);
    }
    echo $line."\n";
}