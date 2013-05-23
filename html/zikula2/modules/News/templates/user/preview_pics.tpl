<hr>
<ul class='news_preview_pictures'>
{foreach from=$preview.temp_pictures item='file'}
    <li><img src='{$file.tmp_name}' width='150' title='{gt text='Temp images resized to 150 width until publishing.'}'></li>
{/foreach}
</ul>