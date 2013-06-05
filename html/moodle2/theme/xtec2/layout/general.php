<?php
$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);
$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

// Check the theme settings to show the user profile picture
$logourl = $PAGE->theme->settings->logourl;

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}
if ($hasnavbar) {
    $bodyclasses[] = 'hasnavbar';
}

echo $OUTPUT->doctype()
?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
    <head>
        <title><?php echo $PAGE->title ?></title>
        <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme') ?>" />
        <?php echo $OUTPUT->standard_head_html() ?>
    </head>
    <body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses . ' ' . join(' ', $bodyclasses)) ?>">
        <?php echo $OUTPUT->standard_top_of_body_html() ?>

        <div id="page">
            <?php if ($hasheading || $hasnavbar) { ?>
                <div id="page-header">
                    <div class="rounded-corner top-left"></div>
                    <div class="rounded-corner top-right"></div>
                    <?php if ($hasheading) { ?>
                        <div class="headermenu">
                            <div class="toplogo">
                                <a href="http://www20.gencat.cat/portal/site/ensenyament"><img src="<?php echo $OUTPUT->pix_url('theme/departament', 'theme'); ?>" alt="" title="" /></a>
                            </div>
                            <div class="toplogo">
                                 <a href="http://www.xtec.cat"><img src="<?php echo $OUTPUT->pix_url('theme/xtec', 'theme'); ?>" alt="" title="" /></a>
                            </div>
                            <?php
                            echo $PAGE->headingmenu;
                            if (!empty($PAGE->layout_options['langmenu'])) {
                                echo $OUTPUT->lang_menu();
                            }
                            echo $OUTPUT->login_info();
                            ?>
                        </div>
                        <h1 class="headermain"><?php echo $PAGE->heading ?></h1>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if ($hascustommenu) { ?>
                <div id="custommenu"><?php echo $custommenu; ?></div>
            <?php } ?>

            <?php if ($hasnavbar) { ?>
                <div class="navbar clearfix">
                    <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
                    <div class="navbutton"><?php echo $PAGE->button; ?></div>
                </div>
            <?php } ?>
            <!-- END OF HEADER -->

            <div id="page-content">
                <div id="region-main-box">
                    <div id="region-post-box">
                        <div id="region-main-wrap">
                            <div id="region-main">
                                <div class="region-content">
                                    <?php echo $OUTPUT->main_content() ?>
                                </div>
                            </div>
                        </div>

                        <?php if ($hassidepre) { ?>
                            <div id="region-pre" class="block-region">
                                <div class="region-content">
                                    <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($hassidepost) { ?>
                            <div id="region-post" class="block-region">
                                <div class="region-content">
                                    <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
</div>
            <!-- START OF FOOTER -->
            <?php if ($hasfooter) { ?>
            <div class="foot">
                <div id="page-footer" class="clearfix">
                    <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
                    <?php 
                    echo $OUTPUT->login_info();
                    echo $OUTPUT->standard_footer_html();
                    ?>
                    <div class="rounded-corner bottom-left"></div>
                    <div class="rounded-corner bottom-right"></div>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
            <div class="footerlogos">
                <?php if (is_agora()) { ?> <a href="http://agora.xtec.cat" target="_blank"><?php } ?><img src="<?php echo $OUTPUT->pix_url('theme/logo_main', 'theme'); ?>" alt="" title="" /><?php if (is_agora()) { ?></a> <?php } ?>
                <a href="http://moodle.org" target="_blank"><img src="<?php echo $OUTPUT->pix_url('theme/logo_moodle', 'theme'); ?>" alt="Moodle" title="Moodle" /></a>
            </div>           
        </div>
        <?php echo $OUTPUT->standard_end_of_body_html() ?>
    </body>
</html>