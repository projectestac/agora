{adminheader}
<div class="z-admin-content-pagetitle">
    {icon type="help" size="small"}
    <h3>{gt text='Help'}</h3>
</div>

<div class="z-form">
    <fieldset>
        <legend>{gt text="Permissions"}</legend>
        <div class="z-informationmsg">
            <strong>{gt text="You have some possibilities to set permissions"}</strong><br /><br />
            <strong>{gt text="Users"}</strong><br /><br />
            {gt text="Group | Weblinks:: | .* | read"}<br />
            {gt text="// the group can see all links"}<br /><br />
            {gt text="Group | Weblinks:: | .* | comment"}<br />
            {gt text="// the group can add a link and comment a link, announce a broken link, submit a modification"}<br /><br />
            {gt text="Group | Weblinks::Category | ::CatID | none"}<br />
            {gt text="// the group cant see the category with the ID"}<br /><br /><br />
            <strong>{gt text="Moduleadmins"}</strong><br /><br />
            {gt text="Group | Weblinks:: | .* | edit"}<br />
            {gt text="// the group can modify links and categories"}<br /><br />
            {gt text="Group | Weblinks:: | .* | add"}<br />
            {gt text="// the group can modify and add links and categories"}<br /><br />
            {gt text="Group | Weblinks:: | .* | delete"}<br />
            {gt text="// the group can delete, modify and add links and categories"}<br /><br />
            {gt text="Group | Weblinks::Category | .* | edit / add / delete"}<br />
            {gt text="// the group can only modify / add / delete categories"}<br /><br />
            {gt text="Group | Weblinks::Link | .* | edit / add / delete"}<br />
            {gt text="// the group can only modify / add / delete links"}<br /><br />
            {gt text="Group | Weblinks:: | .* | admin"}<br />
            {gt text="// the group can administrate the Weblinks module with all functions"}<br /><br /><br />
            <strong>{gt text="scribite"}</strong><br />
            {gt text="Group | scribite:: | Weblinks:: | comment"}<br />
            {gt text="// the group can use scribite in Weblinks textareas if they have no comment permissions (ungeristered Users)"}<br /><br />
            {gt text="// if a group has add permissions and higher, they can see an icon in their user profil to add links"}
        </div>
    </fieldset>
</div>
