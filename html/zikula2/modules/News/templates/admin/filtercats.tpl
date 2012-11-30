{ajaxheader module="News" ui=true}
{gt text="All These Categories" assign="allText"}
{nocache}
{foreach from=$catregistry key=property item=category}
    {array_field assign="selectedValue" array=$selectedcategories field=$property}
    {selector_category
        editLink=0
        category=$category
        name="news[__CATEGORIES__][$property]"
        field="id"
        selectedValue=$selectedValue
        defaultValue="0"
        all=1
        allText=$allText
        allValue=0}
    <a href='#' id='news___CATEGORIES____{$property}__open' title='{gt text='Select multiple categories'}'>
        {img modname="core" src="edit_add.png" set="icons/extrasmall" __alt="Select Multiple" __title="Select Multiple"}
    </a>
    <script type="text/javascript">
        var news___CATEGORIES____{{$property}}_ = new Zikula.UI.SelectMultiple(
            'news___CATEGORIES____{{$property}}_',
            {opener: 'news___CATEGORIES____{{$property}}__open',
            okLabel: Zikula.__('Done!','module_News'),
            value: '{{news_implode value=$selectedValue}}',
            excludeValues: ['0']}
        );
    </script>
{/foreach}
{/nocache}