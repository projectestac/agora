{ajaxheader ui=true imageviewer="true"}
{ajaxheader modname=IWforms filename=IWforms.js}
{insert name="getstatusmsg"}
<h2>El dia a dia del Cicle Formatiu</h2>
<p>Aquest apartat recull algunes activitats que l'alumnat ha portat a terme en el Cicle Formatiu i que són més o menys destacades. L'ordre de les activitats no té res a veure amb la importància de les mateixes, sinó que simplement respon a l'ordre en que han estat entrades.</p>
<div class="z-right" style="margin-top: 15px; margin-bottom: 15px;">{$pager}</div>

<div style="margin-bottom: 20px;">
    <ul>
        {foreach item="note" from=$notes}
            <li><a href="#{$note.fmid}">{$note.content[13].content}</a> per {$users[$note.user]}</li>
        {/foreach}
    </ul>
</div>

{foreach item="note" from=$notes}
<a name="{$note.fmid}"></a>
<div style="width: 100%; border: 1px dotted #555; margin-bottom: 10px;">
    <div style="margin: 25px 0 30px 20px; font-size: 30px; font-weight: bold;">
        {$note.content[13].content}
    </div>
    <div style="margin: 30px 0 7px 20px; width: 97%;">
        <div style="float: left; width: 370px;">
            {if $note.photo neq ''}
                <div style="height:10px; text-align:center;"></div>
                <img src="{$baseurl}index.php?module=IWforms&amp;func=getFile&amp;fileName={$note.photo}" />
            {/if}
            <div>
                <strong>Autor/a</strong>: {$users[$note.user]}
            </div>
            <div>
                <strong>Matèria</strong>: {$note.content[15].content}
            </div>
            <div>
                <strong>Curs</strong>: {$note.content[38].content}
            </div>
            <div>
                <strong>Lloc on s'ha portat a terme</strong>: {$note.content[19].content}
            </div>
        </div>
        <div style="width: auto; overflow: hidden; background-color: #ddd; padding: 7px; font-weight: bold;">
            {$note.content[30].content}
        </div>
	<div class="z-clearer"></div>
        <div style="margin-top: 30px;">
            {if $note.content[16].content}
                <div style="float: right; margin-left: 15px;">
		    <a href="userdata/forms/diaadia/{$note.content[16].content}" rel="imageviewer[{$note.fmid}-1]">
                        <img src="userdata/forms/diaadia/{$note.content[16].content}" width="370" />
                    </a>
                    <div style="background-color: #ccc;" align="center">
                        {$note.content[31].content}
                    </div>
                </div>
            {/if}
            {$note.content[14].content|nl2br}
        </div>
        <div class="z-clearer"></div>
        {if $note.content[17].content}
            <div style="float: left; margin-right: 30px; margin-top: 25px;">
                <a href="userdata/forms/diaadia/{$note.content[17].content}" rel="imageviewer[{$note.fmid}-2]">
	            <img src="userdata/forms/diaadia/{$note.content[17].content}" width="370" />
                </a>
                <div style="background-color: #ccc;" align="center">
                    {$note.content[32].content}
                </div>
            </div>
        {/if}
        {if $note.content[18].content}
            <div style="float: left; margin-right: 30px; margin-top: 25px;">
                <a href="userdata/forms/diaadia/{$note.content[18].content}" rel="imageviewer[{$note.fmid}-3]">
	            <img src="userdata/forms/diaadia/{$note.content[18].content}" width="370" />
                </a>
                <div style="background-color: #ccc;" align="center">
                    {$note.content[33].content}
                </div>
            </div>
        {/if}
        {if $note.content[34].content}
            <div style="float: left; margin-top: 25px;">
                <a href="userdata/forms/diaadia/{$note.content[34].content}" rel="imageviewer[{$note.fmid}-4]">
	            <img src="userdata/forms/diaadia/{$note.content[34].content}" width="370" />
                </a>
                <div style="background-color: #ccc;" align="center">
                    {$note.content[35].content}
                </div>
            </div>
        {/if}
        <div class="z-clearer"></div>
        <div style="margin-top: 25px;">
            {$note.content[20].content}
        </div>
        {if $note.content[36].content and $note.content[37].content}
            <div style="text-align: right;">
                <a href="userdata/forms/diaadia/{$note.content[36].content}">{$note.content[37].content}</a>
            </div>
        {/if}
        <div style="text-align: right;">
            <a href="#">Torna a dalt</a>
        </div>
    </div>
</div>
{foreachelse}
<div>No s'han trobat resultats</div>
{/foreach}

<div class="z-right">{$pager}</div>
