{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="display" size="small"}
    <h3>{gt text="View submitted form data"}</h3>
</div>

<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text='Date'}</th>
            <th>{gt text='Name'}</th>
            <th>{gt text='IP address'}</th>
            <th>{gt text='Hostname'}</th>
            <th>{gt text='Contact ID'}</th>
        </tr>
    </thead>
    <tbody>
        <tr class="z-odd">
            <td>{$submit.cr_date|dateformat:'datetimebrief'}</td>
            <td><a href="#" class="tooltips" title="{gt text='Email: %1$s - UID: %2$s' tag1=$submit.email|safetext tag2=$submit.cr_uid|safetext}">{$submit.name|safetext}</a></td>
            <td>{$submit.ip|safetext}</td>
            <td>{$submit.host|safetext}</td>
            <td>{$submit.cid|safetext}</td>
        </tr>
    </tbody>
</table>

<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text='Homepage'}</th>
            <th>{gt text='Company'}</th>
            <th>{gt text='Phone Number'}</th>
            <th>{gt text='Location'}</th>
        </tr>
    </thead>
    <tbody>
        <tr class="z-odd">
            <td><a href="{$submit.url|safetext}">{$submit.url|safetext}</a></td>
            <td>{$submit.company|safetext}</td>
            <td>{$submit.phone|safetext}</td>
            <td>{$submit.location|safetext}</td>
        </tr>
    </tbody>
</table>

{if $submit.customdata}
<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text='Custom fields'}</th>
        </tr>
    </thead>
    <tbody>
        {foreach item=field key=k from=$submit.customdata}
        <tr class="{cycle values="z-odd,z-even" name=submits}">
            <td>{$k} : {$field|safetext}</td>
        </tr>
        {/foreach}
    </tbody>
</table>
{/if}

<table class="z-admintable">
    <thead>
        <tr>
            <th>{gt text='Comment'}</th>
        </tr>
    </thead>
    <tbody>
        <tr class="z-odd">
            <td>{$submit.comment|safehtml|nl2br}</td>
        </tr>
    </tbody>
</table>



{adminfooter}
<script type="text/javascript">
    // <![CDATA[
    Zikula.UI.Tooltips($$('.tooltips'));
    // ]]>
</script>
