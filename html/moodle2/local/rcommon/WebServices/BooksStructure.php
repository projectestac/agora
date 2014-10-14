<?php
require_once($CFG->dirroot."/config.php");
require_once($CFG->dirroot.'/local/rcommon/wslib.php');
require_once($CFG->dirroot.'/local/rcommon/locallib.php');

function get_all_books_structure($publisherid = false, $isbn = false) {
    global $DB;

    set_time_limit(0);

    $ret = true;

    $params = array();
    if ($publisherid) {
        $params['id'] = $publisherid;
    }

    $publishers = $DB->get_records('rcommon_publisher', $params);
    if ($publishers) {
        echo '<ul>';
        foreach ($publishers as $pub) {
            echo '<li>'.$pub->name;

            if (!empty($pub->urlwsbookstructure)) {
                $ret = $ret && get_books_structure_publisher($pub, $isbn);
            }
            echo '</li>';
        }
        echo '</ul>';
    } else {
        $ret = false;
    }

    return $ret;
}


function get_books_structure_publisher($publisher, $isbn = false) {
    global $OUTPUT;

    set_time_limit(0);

    $books = get_books($publisher);

    try {
        if (!empty($books)) {
			//  Fix bug, when there is just one received book
			if (!is_array($books) || !isset($books[0])) {
				$books = array($books);
			}
            echo '<ol>';
            foreach ($books as $book) {
                // Disable scorm import
                if (textlib::strtolower($book['formato']) == 'scorm') {
                    continue;
                }

                $cod_isbn = $book['isbn'];

                // Si se ha especificado un isbn guarda el libro
                if (!$isbn || $cod_isbn == $isbn) {
                    echo '<li>ISBN: '.$cod_isbn.' -- ';

                    //obtiene los datos del indice del libro
                    try {
                        $instance = new StdClass();
                        $instance->isbn = $cod_isbn;
                        $instance->name = $book['titulo'];
                        $instance->summary = $book['titulo'];
                        $instance->format = $book['formato'];
                        $instance->levelid = isset($book['nivel']) ? $book['nivel'] : false;
                        $instance->publisherid = $publisher->id;
                        rcommon_book::add_update($instance);

                        get_book_structure($publisher, $cod_isbn);
                        echo 'OK';
                    } catch( Exception $e){
                        echo "KO! -- <span style='color: red;'>".$e->getMessage()."</span>";
                    }
                    echo '</li>';
                }
            }
            echo '</ol>';
            return true;
        } else {
        	echo get_string('nobooks', 'local_rcommon');
        	return true;
        }
    } catch(Exception $fault) {
        $message = rcommon_ws_error('get_books_structure_publisher', $fault->getMessage());
        throw new Exception($message);
    }
    return false;
}



/**
 * Web Service to access digital content SM
 * @param none
 * @return obj -> web service response
 */
function get_books($publisher) {
    global $OUTPUT;
    try {
        $center = get_marsupial_center();

        $client = get_marsupial_ws_client($publisher);

        $params = new stdClass();
        $params->IdCentro = @new SoapVar($center, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");

        $response = $client->__soapCall("ObtenerTodos", array($params));

        log_to_file("get_books Request: ".$client->__getLastRequest());
        log_to_file("get_books Response: ".$client->__getLastResponse());

        //check if there are any response error
        $response = rcommon_object_to_array_lower($response, true);
        $response = isset($response['obtenertodosresult']) ? $response['obtenertodosresult'] : false;
        if (!$response || (isset($response['codigo']) && $response['codigo'] <= 0)) {
            $message  = 'Código: '.$response['codigo'].' - '.$response['descripcion'];
            if (isset($response['url'])) {
                $message .= ', URL: '.test_ws_url($response['url']);
            }
            $message = rcommon_ws_error('get_books', $message);

            echo "<br>".$message."<br>";
        } else {
            if (isset($response['catalogo']['libros']['libro'])) {
                return $response['catalogo']['libros']['libro'];
            }
        }

    } catch(Exception $fault) {
        $message = rcommon_ws_error('get_books', $fault->getMessage());
        throw new Exception($message);
    }
    return false;
}


/**
 * Web Service to access digital content SM
 * @param none
 * @return obj -> web service response
 */
function get_book_structure($publisher, $isbn) {
    global $DB;
    //echo "<br>Indice Libro: ".$wsurl_contenido."<br>";

    $book = $DB->get_record('rcommon_books', array('isbn' => $isbn));
    if (!$book) {
        throw new Exception('Book not found');
    }

    try {
        $client = get_marsupial_ws_client($publisher);

        $params = new stdClass();
        $params->ISBN = @new SoapVar($isbn, XSD_STRING, "string", "http://www.w3.org/2001/XMLSchema");
        $response = $client->__soapCall("ObtenerEstructura", array($params));
        //log_to_file("wsget_books_structure Request: ".$client->__getLastRequest());
        //log_to_file("wsget_books_structure Response: ".$client->__getLastResponse());
    } catch(Exception $fault) {
        log_to_file("wsBookStructure: get_book_structure - Exception = ".$fault->getMessage());
        $message = rcommon_ws_error('get_book_structure', $fault->getMessage());
        throw new Exception($message);
    }

    $response = rcommon_object_to_array_lower($response, true);
    $response = isset($response['obtenerestructuraresult']) ? $response['obtenerestructuraresult'] : false;
    if (!$response || (isset($response['codigo']) && $response['codigo'] <= 0)) {
        $message  = 'Código: '.$response['codigo'].' - '.$response['descripcion'];
        if (isset($response['url'])) {
            $message .= ', URL: '.test_ws_url($response['url']);
        }
        $message = rcommon_ws_error('get_book_structure', $message);
        throw new Exception($message);
    } else {
        save_book_structure($response, $book);
    }
}

function save_book_structure($response, $book) {

    $units = isset($response['libros']['libro']['unidades']['unidad']) ? $response['libros']['libro']['unidades']['unidad'] : false;
    // Guarda los datos del libro
    $book->structureforaccess = (count($units) > 0)? 1 : 0;
    $bookid = rcommon_book::add_update($book);

    $timemodified = time();
    if ($units) {
        // If is not associtive, it will have only one unit
        if (is_associative_array($units)) {
            $units = array($units);
        }

        foreach ($units as $unit) {
            $actividades = isset($unit['actividades']['actividad']) ? $unit['actividades']['actividad'] : false;

            $unit_instance = new stdClass();
            $unit_instance->bookid = $bookid;
            $unit_instance->code = isset($unit['id']) ? $unit['id'] : "";
            $unit_instance->name = isset($unit['titulo']) ? $unit['titulo'] : "";
            $unit_instance->summary = $unit_instance->name;
            $unit_instance->sortorder = isset($unit['orden']) ? $unit['orden'] : "";

            //echo "<li>Unit: {$unit_instance->name}";
            $unitid = rcommon_unit::add_update($unit_instance);

            if ($actividades) {
                // If is not associtive, it will have only one activity
                if (is_associative_array($actividades)) {
                    $actividades = array($actividades);
                }

                foreach ($actividades as $act) {
                    $activity_instance = new stdClass();
                    $activity_instance->bookid = $bookid;
                    $activity_instance->unitid = $unitid;
                    $activity_instance->code = isset($act['id']) ? $act['id'] : "";
                    $activity_instance->name = isset($act['titulo']) ? $act['titulo'] : "";
                    $activity_instance->summary = $activity_instance->name;
                    $activity_instance->sortorder = isset($act['orden']) ? $act['orden'] : "";

                    $activid = rcommon_activity::add_update($activity_instance);
                }
            }
        }
    }
    rcommon_book::clean($bookid, $timemodified);
}
