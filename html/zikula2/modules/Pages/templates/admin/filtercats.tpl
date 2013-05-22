{ajaxheader module="Pages" ui=true}
{gt text="All These Categories" assign="allText"}
{nocache}
{foreach from=$catregistry key='property' item='category'}
    {array_field assign="selectedValue" array=$selectedcategories field=$property}
    {selector_category
        editLink=0
        category=$category
        name="pages[__CATEGORIES__][$property]"
        field="id"
        selectedValue=$selectedValue
        defaultValue="0"
        all=1
        allText=$allText
        allValue=0}
    <a href='' id='pages___CATEGORIES____{$property}__open'>
        {img modname="core" src="xedit.png" set="icons/extrasmall" __alt="Select Multiple" __title="Select Multiple"}
    </a>
    <script type="text/javascript">
        var pages___CATEGORIES____{{$property}}_ = new Zikula.UI.SelectMultiple(
            'pages___CATEGORIES____{{$property}}_',
            {opener: 'pages___CATEGORIES____{{$property}}__open',
            title: Zikula.__('Select multiple categories','module_Pages'),
            value: '{{pages_implode value=$selectedValue}}',
            excludeValues: ['0']}
        );
    </script>
{/foreach}
{/nocache}