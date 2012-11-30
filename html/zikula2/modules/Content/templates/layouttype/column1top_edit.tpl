<table class="content-layout-edit">
    <tr>
        <td id="widget_col_1" class="content-area">
            {contentareatitle page=$page contentArea=1}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=1}
        </td>
    </tr>
    <tr>
        <td id="widget_col_0" class="content-area">
            {contentareatitle page=$page contentArea=0}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=0}
        </td>
    </tr>
    <tr>
        <td id="widget_col_2" class="content-area">
            {contentareatitle page=$page contentArea=2}
            {include file=content_include_contentedit.tpl content=$page.content pageId=$page.id contentAreaIndex=2}
        </td>
    </tr>
</table>
