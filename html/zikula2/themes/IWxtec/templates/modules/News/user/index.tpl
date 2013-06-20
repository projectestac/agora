
<!-- News-index.htm beginning -->
<div class="news_xtec">
	<div class="news_title_xtec">
		<div class="news_title_xtec_inside">
			<p class="entrytitle" style="margin:0px; font-weight:bold;">{$preformat.catandtitle}</p>
			<p class="postedby" style="margin:0px;">
				<span class="pn-sub">
					{gt text='Contributed'} {gt text='by %1$s on %2$s' tag1=$info.contributor tag2=$info.from|dateformat:'datetimebrief'}
				</span>
			</p>
		</div>
	</div>
	<div style="padding:10px;">
		<div style="float:left; margin-right:10px;">{$preformat.searchtopic}</div>
		<p>{$info.hometext}</p>
		<p>{$preformat.notes}</p>
	</div>
    <div class="news_footer_xtec">
		<div style="float:left; width:100px;">{$info.counter} {gt text="reads"}</div>
		<div style="float:left; width:100px;">{$preformat.commentlink}</div>
		<div style="float:left; width:200px; margin-left:25%;">
            <a href="{$links.fullarticle}" title="{$info.title}">{gt text="Read more..."}</a>
        </div>
		<div style="float:right; width:40px;">
			{$preformat.printicon}
		</div>
	</div>
</div>
<!-- News-index.htm end -->
