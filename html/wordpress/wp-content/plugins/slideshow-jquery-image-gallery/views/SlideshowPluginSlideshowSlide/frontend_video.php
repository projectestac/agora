<?php

$videoId           = '';
$showRelatedVideos = 0;

if (isset($properties['videoId']))
{
	$videoId = htmlspecialchars($properties['videoId']);
}

if (isset($properties['showRelatedVideos']) && $properties['showRelatedVideos'] === 'true')
{
	$showRelatedVideos = 1;
}

// If the video ID contains 'v=', it means a URL has been passed. Retrieve the video ID.
$idPosition = null;

if (($idPosition = stripos($videoId, 'v=')) !== false)
{
	// The video ID, which perhaps still has some arguments behind it.
	$videoId = substr($videoId, $idPosition + 2);

	// Explode on extra arguments (&).
	$videoId = explode('&', $videoId);

	// The first element is the video ID
	if (is_array($videoId) && isset($videoId[0]))
	{
		$videoId = $videoId[0];
	}
}

?>

<div class="slideshow_slide slideshow_slide_video">
	<div class="slideshow_slide_video_id" style="display: none;" data-show-related-videos="<?php echo $showRelatedVideos; ?>"><?php echo $videoId; ?></div>
</div>