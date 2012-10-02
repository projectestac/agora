<?php

/**
 * Checks if a school identified by its code has a moodle in Àgora 
 * and, if so, returns info about it.
 *
 * @author  Toni Ginard
 * @param  string 'schoolcode' code of the school, i.e., a8012345
 * return  array with error code and description if fail and school data if success
 **/


// Check for required parameter
if (!isset($_REQUEST['schoolcode'])) {
    // Send error code and end here
    echo serialize (array ( 'errorcode'     => '-3',
                              'description'   => 'Falta el codi de centre'));
    exit(0);
} 
else {
    $schoolcode = $_REQUEST['schoolcode'];
}

// Load library
include_once("eines/xtecAPI.php");

// Open DB connection
$connection = opendb();

// Get school data
$schooldata = getSchoolInformation($schoolcode, '', 'moodle', true);

// Process school data
if (isset ($schooldata['msg'])) {
    // Not found
    echo serialize ( array ( 'errorcode'     => '-1',
                                'description'   => 'El centre no est&agrave; donat d\'alta a &Agrave;gora-moodle'));
}
elseif ($schooldata['educat'] != '1') {
    // Condition not met
    echo serialize ( array ( 'errorcode'     => '-2',
                               'description'   => 'El centre no est&agrave; adscrit a l\'eduCAT 1x1'));
}
else {
    // Get data
    echo serialize ( array (  'schoolid'         => $schooldata['school_id'],
                                'schoolcode'       => $schoolcode,
                                'database'         => $schooldata['database'],
                                'schooldns'        => $schooldata['school_dns'],
                                'schoolname'       => $schooldata['school_name'],
                                'schooladdress'    => $schooldata['school_address'],
                                'schoolcity'       => $schooldata['school_city'],
                                'schoolpostalcode' => $schooldata['school_postal_code'],
                                'schoolemail'      => $schoolcode . '@xtec.cat',
                                'state'            => $schooldata['state']));
}

// Close DB connection
oci_close($connection);

exit(0);

