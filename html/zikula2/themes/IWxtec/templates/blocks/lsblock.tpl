
<!-- Left block beginning -->
<div class="left_inside">
    {if ! empty($title)}{* Only show title if exists *}
	<h3 class="left_block_title">
		{$title}&nbsp;{$minbox}
	</h3>
    {/if}
	<div class="left_block_content">
		{$content}
	</div>
</div>
<!-- Left block end -->

