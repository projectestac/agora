{gt text='A new comment was submitted to your site that requires moderation'}:
{gt text='Username:'} {$comment.userline|htmlentities|safetext}
{gt text='Date:'} {$comment.date|dateformat|safetext}
{gt text='Subject:'} {$comment.subject|safetext}
{$comment.comment|safetext}

{gt text='Show:'} {$comment.url}#comment{$comment.id}
{gt text='Moderate:'} {modurl modname='EZComments' type='user' func='modify' id=$comment.id fqurl=true}
