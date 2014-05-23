var jq = jQuery;

var bpmod_current_requests = new Array()

jq(document).ready(function() {

  /** Flag/Unflag ***************************************************************/
  jq('a.bpm-report-link').click(function() {
    var link = jq(this);
    var inner = link.children('.bpm-inner-text');

    inner.addClass('ajax-loader');

    var href = link.attr('href');
    var data = href.replace(/[^?]*\?(.*)/, '$1&action=bpmodfrontend');

    if (bpmod_current_requests[data])
      return false;
    else
      bpmod_current_requests[data] = true;

    jq.post(ajaxurl, data,
      function(response) {

        link.fadeOut(100, function() {
          switch (response.type) {
            case 'success':
            case 'fade warning':
              link.toggleClass('bpm-unflagged');
              link.toggleClass('bpm-flagged');

              if (link.hasClass('bpm-unflagged'))
                href = href.replace(/(.*)bpmod-action=[^&]*(.*)/, '$1bpmod-action=flag$2');
              else if (link.hasClass('bpm-flagged'))
                href = href.replace(/(.*)bpmod-action=[^&]*(.*)/, '$1bpmod-action=unflag$2');

              href = href.replace(/(.*)_wpnonce=[^&]*(.*)/, '$1_wpnonce=' + response.new_nonce + '$2');

              link.attr('href', href);

              if (!link.hasClass('bpm-no-text'))
                inner.html(response.msg);

              if ('fade warning' == response.type) {
                $was_no_text = link.hasClass('bpm-no-text');
                window.setTimeout(function() {
                  link.fadeOut(100, function() {
                    if ($was_no_text) {
                      inner.html('');
                      link.addClass('bpm-no-text');
                    } else
                      inner.html(response.msg);
                    link.fadeIn(100);
                  });
                }, 2500);
                inner.html(response.fade_msg);
              }
              break;

            case 'error':
            default:
              inner.html(response.msg);
              link.removeClass('bpm-no-text');

          }

          inner.removeClass('ajax-loader');
          jq(this).fadeIn(100);

          bpmod_current_requests[data] = false;
        });

      }, 'json');

    return false;
  });

});


