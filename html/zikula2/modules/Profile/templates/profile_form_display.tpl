{foreach from=$duditems item='item'}
<tr class="{cycle values='z-odd,z-even'}">
    <td>{gt text=$item.prop_label}</td>
    <td>{duditemdisplay item=$item userinfo=$userinfo}</td>
</tr>
{/foreach}
