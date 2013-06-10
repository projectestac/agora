
<!-- News-article.htm beginning -->
<div class="news_xtec">
	<div class="news_title_xtec">
		<div class="news_title_xtec_inside">
			<p class="entrytitle" style="margin:0px; font-weight:bold;">{$preformat.catandtitle}</p>
			<p class="postedby" style="margin:0px;">
				<span class="pn-sub">{gt text="Posted by"} {$info.informant} {gt text="on"} {$info.longdatetime}</span>
				<span>{articleadminlinks sid=$info.sid}</span>
			</p>
		</div>
	</div>
	<div style="padding:10px;">
		<div style="float:right; width:15%; margin-top:10px; text-align:right;">
			{$preformat.searchtopic}
		</div>
		<div>{$info.hometext}</div>
		<div style="margin-top:10px;">{$info.bodytext}</div>
		<div style="margin-top:20px;">{$preformat.notes}</div>
	</div>
    <div class="news_footer_xtec">
		<div style="float:left; width:100px;">{$info.fulltext|count_words} {gt text="words"}</div>
		<div style="float:left; width:200px; margin-left:30%;">{$info.counter} {gt text="reads"}</div>
		<div style="float:right; width:40px;">
			{$preformat.printicon}
		</div>
	</div>
</div>
<div style="clear:both; margin-top:30px;"></div>
<!-- News-article.htm end -->
