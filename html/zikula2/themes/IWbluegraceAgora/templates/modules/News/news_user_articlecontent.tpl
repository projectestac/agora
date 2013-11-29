
<div class="entry">
	<div class="entrytitle_wrap">
		<div class="entrydate" style="background:transparent url({$imagepath}/date.png) repeat scroll 0 0;">
			<div class="dateMonth">{$info.time|date_format:"%b"}</div>
			<div class="dateDay">{$info.time|date_format:"%d"}</div>
		</div>
		<div class="entrytitle">  
			<h1>{$preformat.title}</h1> 
		</div>
		<div class="endate">
			{gt text="Posted by"} {$info.informant} {gt text="on"} {$info.longdatetime}
			<span>{articleadminlinks sid=$info.sid}</span>
		</div>
	</div>
	<div class="entrybody">
		{$info.fulltext}
	</div>
	<div class="entrymeta">
		<div class="postinfo"> 
			<div style="float:left; width:200px; margin-left:30px;">{$info.counter} {gt text="reads"}</div>
		</div>
	</div>                
</div>


