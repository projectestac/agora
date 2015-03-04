{*ajaxheader modname=IWusers filename=IWusers.js*}
{ajaxheader modname=$modinfo.name filename='IWusers.js' ui=true}
{admincategorymenu}
{insert name="getstatusmsg"}
<div class="z-adminbox">
    {icon type="view" size="small"}
    <h1>{gt text="Users"}</h1>
    {*modulelinks modname='IWusers' type='admin'*}
</div>