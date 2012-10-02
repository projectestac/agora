<?PHP 

require_once('../../config.php');
require_once($CFG->libdir . '/filelib.php');
require_once($CFG->dirroot . '/wiris-quizzes/wrsqz_config.php');

$relativepath = get_file_argument('wrs_showimage.php');
$args = explode('/', trim($relativepath, '/'));

if (!isset($args[0])) {
	echo '<h1>Error</h1>No valid arguments supplied.';
	exit;
}

$image    = $args[0];
$pathname = $CFG->dataroot . '/' . $CFG->wirisquizzes_imagedir . '/' . $image;


if (file_exists($pathname)) {
	send_file($pathname, $image);
} else {  
	echo '<h1>Error</h1>Image not found.</h1>';  
}

?>