/*
help: http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html
*/

CKEDITOR.editorConfig = function( config )
{
    // config.toolbar_Full is not required to be defined here
    // config.toolbar_Special1 and config.toolbar_Special2 could be defined here by advanced users
    // and then selected in the plugin settings
	config.disableNativeSpellChecker = false;
	config.toolbar_Basic =
	[
		{ name: 'document',    items : [ 'Cut','Copy','PasteText','Link' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
		{ name: 'paragraph',   items : [ 'JustifyLeft','JustifyCenter','JustifyRight' ] }
	];
	config.toolbar_Simple =
	[
		{ name: 'document',    items : [ 'Maximize','Source','Cut','Copy','PasteText','PasteFromWord','RemoveFormat','Link', 'Image', 'Smiley' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight' ] }
	];
	config.toolbar_Standard =
	[
		{ name: 'document',    items : [ 'Maximize','Source','Preview' ] },
		{ name: 'editing',    items : [ 'Cut','Copy','PasteText','PasteFromWord','RemoveFormat','Undo','Redo' ] },
		{ name: 'tools',     items : [ 'Find','Replace','SpellChecker', 'Scayt' ] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','oembed','MediaEmbed','Table','HorizontalRule','Smiley','SpecialChar' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','Outdent','Indent','Blockquote','CreateDiv','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
		{ name: 'styles',      items : [ 'Font','FontSize' ] },
		{ name: 'colors',      items : [ 'TextColor','BGColor' ] }
	];
	config.toolbar_Extended =
	[
		{ name: 'document',    items : [ 'Maximize','Source','ShowBlocks','DocProps','Preview' ] },
		{ name: 'clipboard',   items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','RemoveFormat','Undo','Redo' ] },
		{ name: 'editing',     items : [ 'Find','Replace','SelectAll','SpellChecker', 'Scayt' ] },
		{ name: 'links',       items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'insert',      items : [ 'Image','Flash','oembed','MediaEmbed','Table','HorizontalRule','Smiley','SpecialChar','PageBreak' ] },
		'/',
		{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','Outdent','Indent','Blockquote','CreateDiv','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
		{ name: 'styles',      items : [ 'Styles','Format','Font','FontSize' ] },
		{ name: 'colors',      items : [ 'TextColor','BGColor' ] }
	];
};
