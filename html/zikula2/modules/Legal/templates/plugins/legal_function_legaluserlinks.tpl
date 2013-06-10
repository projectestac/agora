<span class="{$class|default:'z-menuitem-title'}">{if count($policies) gt 0}{$start|default:'['}{/if}
{foreach name='policyLoop' key='policyName' item='policy' from=$policies}
    <a href="{$policy.url}">{$policy.title}</a>
    {if !$smarty.foreach.policyLoop.last}{$seperator|default:'|'}{/if}
{/foreach}
{if count($policies) gt 0}{$end|default:']'}{/if}
</span>