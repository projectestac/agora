{ajaxheader ui=true imageviewer="true"}
{ajaxheader modname=IWforms filename=IWforms.js}
{insert name="getstatusmsg"}
<h2>Frases fetes del món tèxtil</h2>
<p>En aquest apartat s'hi recullen refranys i frases fetes del món tèxtil, ja sigui relacionades amb el procés de producció, els productes pròpis del tèxtil i el fet de vestir-se.</p>
<p>Tothom qui vulgui pot enviar les frases fetes que conegui.</p>
<p style="text-align: right;"><a href="index.php?module=IWforms&type=user&func=newitem&fid=3">Envia la teva frase feta</a></p>
<div class="z-right" style="margin-top: 15px; margin-bottom: 15px;">{$pager}</div>
<table class="z-datatable">
    <thead>
        <tr>
            <th>Frase feta</th>
            <th>Significat</th>
            <th>Enviada per...</th>
        </tr>
    </thead>
    <tbody>
        {foreach item="note" from=$notes}
	{cycle values='#ddd,#fff' assign=CellCSS}
        <tr>
            <td style="vertical-align: top; background-color: {$CellCSS};" width="300">
                {$note.content[21].content}
                {if $note.validate eq 0}
                    <div style="color: #AA0000;">
                        Pendent de validació
                    </div>
                {/if}
            </td>
            <td style="vertical-align: top; background-color: {$CellCSS};">
                {$note.content[22].content}
                {if $note.content[28].content neq ""}
                    <div style="margin-top: 15px;">
                        <strong>Observació</strong>: {$note.content[28].content}
                    </div>
                {/if}
            </td>
            <td style="vertical-align: top; background-color: {$CellCSS};">
                {if $users[$note.user] neq ''}
                    {$users[$note.user]}
                {else}
                    {if isset($note.content[39].content) and $note.content[39].content neq ''}
                    {else}
                        Anònim/a
                    {/if}
                {/if}
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>
<div class="z-right">{$pager}</div>
