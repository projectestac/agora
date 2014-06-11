<div class="bpfb_images">
<?php $rel = md5(microtime() . rand());?>
<?php foreach ($images as $img) { ?>
	<?php if (!$img) continue; ?>
	<?php if (preg_match('!^https?:\/\/!i', $img)) { // Remote image ?>
		<img src="<?php echo $img; ?>" />
	<?php } else { ?>
		<?php $info = pathinfo(trim($img));?>
		<?php $thumbnail = file_exists(bpfb_get_image_dir($activity_blog_id) . $info['filename'] . '-bpfbt.' . strtolower($info['extension'])) ?
			bpfb_get_image_url($activity_blog_id) . $info['filename'] . '-bpfbt.' . strtolower($info['extension'])
			:
			bpfb_get_image_url($activity_blog_id) . trim($img)
		;
		$target = 'all' == BPFB_LINKS_TARGET ? 'target="_blank"' : '';
		?>
		<a href="<?php echo bpfb_get_image_url($activity_blog_id) . trim($img); ?>" class="<?php echo $use_thickbox; ?>" rel="<?php echo $rel;?>" <?php echo $target; ?> >
			<img src="<?php echo $thumbnail;?>" />
		</a>
	<?php } ?>
<?php } ?>
</div>