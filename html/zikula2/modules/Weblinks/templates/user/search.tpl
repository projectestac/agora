<form action="{modurl modname="Weblinks" type="user" func="search"}" method="post">
    <div>
        <label for="query">{gt text="Weblinks"}</label>
        <input type="text" size="25" name="query" id="query" tabindex="0" value="{gt text="search keywords"}" onblur="if(this.value=='')this.value='{gt text="search keywords"}';" onfocus="if(this.value=='{gt text="search keywords"}')this.value='';" />
        <input type="submit" value="{gt text="Search"}" />
    </div>
</form>