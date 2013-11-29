
<div class="entry">
	<div class="entrytitle_wrap">
		<div class="entrydate" style="background:transparent url({$imagepath}/date.png) repeat scroll 0 0;">
			<div class="dateMonth">{$info.time|date_format:"%b"}</div>
			<div class="dateDay">{$info.time|date_format:"%d"}</div>
		</div>
		<div class="entrytitle">  
			<h1>{$preformat.title}</h1> 
		</div>
	</div>
	<div class="entrybody">
		{$info.hometext}
		<br />
		{$preformat.readmore}
	</div>
	<div class="entrymeta">
		<div class="postinfo">
			{$info.counter} {gt text="reads"}
		</div>
		<div class="postinfo">
			{$preformat.commentlink}
		</div>
		<div class="endate postedby" style="background:url({$imagepath}/user.gif) no-repeat;">
			{gt text="Posted by"}&nbsp;{$info.informant}&nbsp;{gt text="on"}&nbsp;{$info.briefdate}
		</div>
	</div>                
</div>
