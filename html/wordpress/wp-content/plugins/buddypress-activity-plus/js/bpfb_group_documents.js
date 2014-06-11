(function ($) {
$(function () {
	
var BpfbDocumentHandler = function () {
	$container = $(".bpfb_controls_container");
	
	var createMarkup = function () {
		var html = '<div id="bpfb_tmp_document"></div>' +
			'<ul id="bpfb_tmp_document_list"></ul>'
		;
		$container.append(html);

		var uploader = new qq.FileUploader({
			"element": $('#bpfb_tmp_document').get(0),
			"listElement": $('#bpfb_tmp_document_list')[0],
			"allowedExtensions": _bpfbDocumentsAllowedExtensions,
			"action": ajaxurl,
			"params": {
				"action": "bpfb_preview_document"
			},
			"onComplete": createDocumentPreview
		});
		
	};
	
	var createDocumentPreview = function (id, fileName, resp) {
		if ("error" in resp) return false;
		var html = '<img class="bpfb_preview_document_item" src="' + resp.icon + '" /> ' + resp.file + '<br />' +
			'<input type="hidden" class="bpfb_documents_to_add" name="bpfb_documents[]" value="' + resp.file + '" />';
		$('.bpfb_preview_container').append(html);
		$('.bpfb_action_container').html(
			'<p><input type="button" class="button-primary bpfb_primary_button" id="bpfb_submit" value="' + l10nBpfbDocs.add_documents + '" /> ' +
			'<input type="button" class="button" id="bpfb_cancel" value="' + l10nBpfb.cancel + '" /></p>'
		);
		$("#bpfb_cancel_action").hide();
	};
	
	var removeTempDocuments = function (rti_callback) {
		var $docs = $('input.bpfb_documents_to_add');
		if (!$docs.length) return rti_callback();
		$.post(ajaxurl, {"action":"bpfb_remove_temp_documents", "data": $docs.serialize().replace(/%5B%5D/g, '[]')}, function (data) {
			rti_callback();
		});
	};
	
	var processForSave = function () {
		var $docs = $('input.bpfb_documents_to_add');
		var docArr = [];
		$docs.each(function () {
			docArr[docArr.length] = $(this).val();
		});
		return {
			"bpfb_documents": docArr//$imgs.serialize().replace(/%5B%5D/g, '[]')
		};
	};
	
	var init = function () {
		$container.empty();
		$('.bpfb_preview_container').empty();
		$('.bpfb_action_container').empty();
		$('#aw-whats-new-submit').hide();
		createMarkup();
	};
	
	var destroy = function () {
		removeTempDocuments(function() {
			$container.empty(); 
			$('.bpfb_preview_container').empty(); 	
			$('.bpfb_action_container').empty();
			$('#aw-whats-new-submit').show();
		});
	};
	
	removeTempDocuments(init);
	
	return {"destroy": destroy, "get": processForSave};
};

$(".bpfb_toolbar_container").append(
	'&nbsp;' +
	'<a href="#documents" title="' + l10nBpfbDocs.add_documents + '" class="bpfb_toolbarItem" id="bpfb_addDocuments"><span>' + l10nBpfbDocs.add_documents + '</span></a>'
);

$('#bpfb_addDocuments').click(function () {
	if (_bpfbActiveHandler) _bpfbActiveHandler.destroy();
	var group_id = $('#whats-new-post-in').length ? $('#whats-new-post-in').val() : 0;
	if (parseInt(group_id)) {
		_bpfbActiveHandler = new BpfbDocumentHandler();
		$("#bpfb_cancel_action").show();
	} else {
		alert(l10nBpfbDocs.no_group_selected);
	}
	return false;
});

});
})(jQuery);