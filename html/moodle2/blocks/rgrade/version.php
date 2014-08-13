<?php
 /**
 * Version details
 *
 * @package    block
 * @subpackage marsupial
 * @copyright  2013 lagaleratext.cat
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
 
$plugin->version   = 2013080500;
$plugin->requires  = 2011033009;
$plugin->cron      = 0;
$plugin->component = 'block_rgrade';
$plugin->maturity  = MATURITY_RC;
$plugin->release   = 'v2.0';
 
$plugin->dependencies = array(
    'mod_rcontent' => ANY_VERSION
);
