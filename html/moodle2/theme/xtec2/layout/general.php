<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle's XTEC2 theme
 *
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_xtec2
 * @copyright 2014 Departament d'Ensenyament
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Get the HTML for the settings bits.
$html = theme_xtec2_get_html_for_settings($OUTPUT, $PAGE);

if(empty($PAGE->layout_options['nocustommenu'])){
    $custommenu = $OUTPUT->custom_menu();
    $hascustommenu = !empty($custommenu);
} else {
    $hascustommenu = false;
}

$hasmainmenu = get_config('theme_xtec2','top_menus');
if($hasmainmenu){
    $mainmenu = $OUTPUT->main_menu();
    $hasmainmenu = !empty($mainmenu);
} else {
    $hasmainmenu = false;
}

$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));

//For the "Show Blocks" options to work you have to add this code to your theme course layout:
if($COURSE->format == 'simple'){
    $context = context_course::instance($COURSE->id);
    if(!has_capability('moodle/grade:viewall',$context)) { //Is student
        $format_options = course_get_format($COURSE)->get_format_options();
        //Those variables define if the side-pre and side-post blocks should be visible or not
        if(empty($format_options['showblocks'])){
            $hassidepre = false;
            $hassidepost = false;
        }
    }
}

$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

if($showsidepre && $showsidepost){
    $spanpre = 4;
    $spanmainpre = 8;
    $spanmainpost = 9;
    $spanpost = 3;
} else if($showsidepre){
    $spanpre = 3;
    $spanmainpre = 9;
    $spanmainpost = 12;
    $spanpost = 0;
} else if($showsidepost){
    $spanpre = 0;
    $spanmainpre = 12;
    $spanmainpost = 9;
    $spanpost = 3;
} else {
    $spanpre = 0;
    $spanmainpre = 12;
    $spanmainpost = 12;
    $spanpost = 0;
}

if (right_to_left()) {
    $regionbsid = 'region-bs-main-and-post';
} else {
    $regionbsid = 'region-bs-main-and-pre';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes(isset($body_classes)?$body_classes:""); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top moodle-has-zindex">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
			<a href="http://www20.gencat.cat/portal/site/ensenyament" class="brand ensenyament hidden-phone"><img src="<?php echo $OUTPUT->pix_url('departament', 'theme'); ?>" alt="" title="" /></a>
			<a href="http://www.xtec.cat" class="brand xtec hidden-phone"><img src="<?php echo $OUTPUT->pix_url('xtec', 'theme'); ?>" alt="" title="" /></a>
			<a class="brand mainbrand" href="<?php echo $CFG->wwwroot;?>"><?php echo $SITE->fullname; ?></a>
            <div class="navbar">
                <ul class="nav pull-right">
                    <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                    <li class="navbar-text"><?php echo $OUTPUT->login_info() ?></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<header id="title-header" class="clearfix hidden-phone">
    <div id="logo-top"></div>
    <div class="container-fluid">
        <?php echo $OUTPUT->page_heading(); ?>
    </div>
</header>

<div id="main_navigation" class="clearfix hidden-phone">
    <div class="container-fluid">
        <?php if($hascustommenu) { ?>
            <div id="custom_menu" class="pull-left">
                <div class="nav-collapse collapse" id="custom-collapse">
                    <?php echo $custommenu; ?>
                </div>
            </div>
        <?php } ?>
        <?php if($hasmainmenu) { ?>
            <div id="main_menu" class="pull-right">
                <div class="nav-collapse collapse">
                    <?php echo $mainmenu; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div id="page" class="container-fluid clearfix">
	<header id="page-header" class="clearfix">
		<div id="page-navbar" class="clearfix">
			<nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
			<div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
		</div>
	</header>


    <div id="page-content" class="row-fluid">
        <div id="<?php echo $regionbsid ?>" class="span<?php echo $spanmainpost;?>">
            <div class="row-fluid">
                <section id="region-main" class="span<?php echo $spanmainpre;?> pull-right">
                    <?php
                    echo $OUTPUT->course_content_header();
                    echo $OUTPUT->main_content();
                    echo $OUTPUT->course_content_footer();
                    ?>
                </section>
                <?php echo $OUTPUT->blocks('side-pre', 'span'.$spanpre.' desktop-first-column'); ?>
            </div>
        </div>
        <?php echo $OUTPUT->blocks('side-post', 'span'.$spanpost); ?>
    </div>

</div>

<footer id="page-footer">
    <div id="page-footer-top">
        <div class="row-fluid">
            <div class="span10">
                <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
                <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
                <?php
                echo $html->footnote;
                echo $OUTPUT->standard_footer_html();
                ?>
            </div>
            <div class="span2 pull-right">
                <?php echo $OUTPUT->lang_menu(); ?>
            </div>
        </div>
    </div>
    <div class="footerlogos clearfix container-fluid">
        <a href="http://agora.xtec.cat" target="_blank"><img src="<?php echo $OUTPUT->pix_url('logo_main', 'theme'); ?>" alt="" title="" /></a>
        <a href="http://moodle.org" target="_blank"><img src="<?php echo $OUTPUT->pix_url('logo_moodle', 'theme'); ?>" alt="Moodle" title="Moodle" /></a>
    </div>
</footer>

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
