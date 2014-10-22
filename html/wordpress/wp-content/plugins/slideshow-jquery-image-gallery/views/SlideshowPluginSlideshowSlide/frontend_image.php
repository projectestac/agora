<?php

$title = $description = $url = $urlTarget = $alternativeText = $noFollow = $postId = '';

$titleElementTag = $descriptionElementTag = SlideshowPluginSlideInserter::getElementTag();

if (isset($properties['title']))
{
	$title = trim(SlideshowPluginSecurity::htmlspecialchars_allow_exceptions($properties['title']));
}

if (isset($properties['url']))
{
	$url = htmlspecialchars($properties['url']);
	$urlTarget = $url;
}

if (isset($properties['alternativeText']))
{
	$alternativeText = htmlspecialchars($properties['title']);
}

if (isset($properties['noFollow']))
{
	$noFollow = ' rel="nofollow" ';
}


$imageSrc       = $properties['url'];
$imageWidth     = 0;
$imageHeight    = 0;
$imageAvailable = true;

?>
			
<div class="slideshow_slide slideshow_slide_image">
        <?php echo $anchorTag; ?>
                <img src="<?php echo htmlspecialchars($imageSrc); ?>" alt="<?php echo $alternativeText; ?>" <?php echo ($imageWidth > 0) ? 'width="' . $imageWidth . '"' : ''; ?> <?php echo ($imageHeight > 0) ? 'height="' . $imageHeight . '"' : ''; ?> />
        <?php echo $endAnchorTag; ?>
        <div class="slideshow_description_box slideshow_transparent">
                <?php echo !empty($title) ? '<' . $titleElementTag . ' class="slideshow_title">' . $anchorTag . $title . $endAnchorTag . '</' . $titleElementTag . '>' : ''; ?>
                <?php echo !empty($description) ? '<' . $descriptionElementTag . ' class="slideshow_description">' . $anchorTag . $description . $endAnchorTag . '</' . $descriptionElementTag . '>' : ''; ?>
        </div>
</div>