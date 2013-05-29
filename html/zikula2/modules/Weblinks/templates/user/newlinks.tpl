{include file="user/header.tpl"}
<div class="wl-borderbox wl-center">
    <h3>{gt text="New links"}</h3>
    <p>{gt text="Total new links"}: {gt text="Last week"}: {countlinks days=7} | {gt text="Last 30 days"}: {countlinks days=30}
        <br />
        {gt text="Show"}:
        <a href="{modurl modname='Weblinks' type='user' func='newlinks' newlinkshowdays=7}"> {gt text="1 week"}</a> |
        <a href="{modurl modname='Weblinks' type='user' func='newlinks' newlinkshowdays=14}"> {gt text="2 weeks"}</a> |
        <a href="{modurl modname='Weblinks' type='user' func='newlinks' newlinkshowdays=30}"> {gt text="30 days"}</a>
    </p>
    <p><strong>{gt text="Total new links over the last"} {$newlinkshowdays|safetext} {gt text="days"} :</strong></p>
    {newlinksbyday newlinkshowdays=$newlinkshowdays}
</div>
{include file="user/footer.tpl"}