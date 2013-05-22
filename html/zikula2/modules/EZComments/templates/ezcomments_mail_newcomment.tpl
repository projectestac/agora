{gt text='A new comment was entered'}
{gt text='Username:'} {$comment.userline|htmlentities|safetext}
{gt text='Date:'} {$comment.date|dateformat|safetext}
{gt text='Subject:'} {$comment.subject|safetext}
{$comment.comment|safetext}

{gt text='Show:'} {$comment.url}#comment{$comment.id}
{gt text='Moderate:'} {$modifyurl}
