{if $fieldType eq 1 || $fieldType eq 2 || $fieldType eq 3}
    if(f.field{$fndid}.value=='' && !error){ldelim}
        alert('{gt text="There are one or more form fields that are required and you have not filled"}');
        error = true;
    {rdelim}
{/if}
{if $fieldType eq 4 && !$calendar}
    if((f.field{$fndid}.value=='' || f.fieldbis{$fndid}.value=='' || f.fieldbisbis{$fndid}.value=='') && !error){ldelim}
        alert('{gt text="There are one or more form fields that are required and you have not filled"}');
        error = true;
    {rdelim}
{/if}

{if $fieldType eq 4 && $calendar}
    if(f.field{$fndid}.value=='' && !error){ldelim}
        alert('{gt text="There are one or more form fields that are required and you have not filled"}');
        error = true;
    {rdelim}
{/if}

{if $fieldType eq 5}
    if((f.field{$fndid}.value=='' || f.fieldbis{$fndid}.value=='') && !error){ldelim}
        alert('{gt text="There are one or more form fields that are required and you have not filled"}');
        error = true;
    {rdelim}
{/if}

{if $fieldType eq 6}
    if(f.field{$fndid}.value=='' && !error){ldelim}
        alert('{gt text="There are one or more form fields that are required and you have not filled"}');
        error = true;
    {rdelim}
{/if}

{if $fieldType eq 7}
    if(f.field{$fndid}.value=='' && !error){ldelim}
        alert('{gt text="There are one or more form fields that are required and you have not filled"}');
        error = true;
    {rdelim}
{/if}