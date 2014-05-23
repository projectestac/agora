jQuery(document).ready(function($) {

  //collapse the custom query form
  $('.bpmod-form-query fieldset').addClass('collapsed');
  $('.bpmod-form-query fieldset').children(':not(legend)').hide();
  $('.bpmod-form-query legend').addClass('foldable');

  //hide all not currently active filters details
  $('.bpmod-form-query dt>input[type=checkbox]:not(:checked)').parent().next('dd').hide();

  $('h4.order-by').append(' <a class="add">+</a>/<a class="remove">-</a>');

  /** show/hide fieldset ********************************************************/
  $('.bpmod-form-query legend').click(function() {
    var fieldset = $(this).parent();

    if (fieldset.hasClass('collapsed')) {
      fieldset.removeClass('collapsed');
      fieldset.children(':not(legend)').slideDown('fast');
    } else {
      fieldset.children(':not(legend)').slideUp('fast', function() {
        fieldset.addClass('collapsed');
      });
    }
  });

  /** show/hide filters details *************************************************/
  $('.bpmod-form-query dt>input[type=checkbox]').click(function() {
    $(this).parent().next('dd').toggle();
  });

  /** order by add/remove *******************************************************/
  var order_options = $('ol.order-by li:first-child select:first option').length - 1;
  $('h4.order-by a.add').click(function() {
    var length = $('ol.order-by li').length;

    //don't permit adding more lines then the selectable order options
    if (length >= order_options)
      return false;

    var new_li = $('ol.order-by li:first-child').clone()
    new_li.children('select').attr('name', function(i, name) {
      if (0 == i) return 'order[' + length + '][by]';
      if (1 == i) return 'order[' + length + '][dir]';
    });
    new_li.appendTo('ol.order-by');

    return false;
  });
  $('h4.order-by a.remove').click(function() {
    if ($('ol.order-by li').length > 1)
      $('ol.order-by li:last-child').remove();
    return false;
  });


  /** HOTKEYS *******************************************************************/
  if (typeof $.table_hotkeys != 'undefined') { // START: hotkeys

    /** hotkeys commons ***********************************************************/
    var make_hotkeys_redirect = function(which) {
      return function() {
        var first_last, l;

        first_last = 'next' == which ? 'first' : 'last';
        l = $('.' + which + '.page-numbers');
        if (l.length)
          window.location = l[0].href.replace(/\&hotkeys_highlight_(first|last)=1/g, '') + '&hotkeys_highlight_' + first_last + '=1';
      }
    };

    var toggle_all = function() {
      $('tbody th.check-column input:checkbox').attr('checked', function() {
        return (this.checked ? '' : 'checked');
      });
    };

    var make_link_hotkey = function(key) {
      return [
        key,
        function(event, current_row) {
          window.location = $('.vim-' + key, current_row).attr('href');
        }
      ];
    }

    var make_bulk = function(value) {
      return function() {
        var scope = $('select[name="bulk-action"]');
        $('option[value=' + value + ']', scope).attr('selected', 'selected');
        $('form.bpmod-bulk-form').submit();
      }
    };

    var hotkey_opt = {
      highlight_first: adminBPModL10n.hotkeys_highlight_first,
      highlight_last: adminBPModL10n.hotkeys_highlight_last,
      prev_page_link_cb: make_hotkeys_redirect('prev'),
      next_page_link_cb: make_hotkeys_redirect('next')
    };

    var insert_hotkey_hints = function(scope) {
      $('a', scope).each(function(i) {
        var key = ($(this).attr('class') || '').match(/vim-(\w)/);
        if (key && key[1])
          $(this).append(' <span class="vim-hint">(' + key[1] + ')</span>');
      });
    }

    /** contents hotkeys **********************************************************/
    var contents_table = $('table#bpmod-contents-table');
    if (contents_table.length) {
      insert_hotkey_hints(contents_table);

      $.table_hotkeys(
        contents_table,
        [
          make_link_hotkey('c') // .vim-c = contact author
          ,make_link_hotkey('s') // .vim-s = mark author as spammer
          ,make_link_hotkey('u') // .vim-u = unmark author as spammer
          ,make_link_hotkey('v') // .vim-v = view
          ,make_link_hotkey('a') // .vim-a = approve (ignore)
          ,make_link_hotkey('e') // .vim-e = edit
          ,make_link_hotkey('m') // .vim-m = mark as moderate
          ,make_link_hotkey('d') // .vim-d = delete
          ,['shift+x', toggle_all]
          ,['shift+s', make_bulk('mark_spammer')]
          ,['shift+u', make_bulk('unmark_spammer')]
          ,['shift+a', make_bulk('ignore')]
          ,['shift+m', make_bulk('mark_moderated')]
          ,['shift+d', make_bulk('delete')]
        ],
        hotkey_opt
      );
    }

    /** users hotkeys *************************************************************/
    var users_table = $('table#bpmod-users-table');
    if (users_table.length) {
      insert_hotkey_hints(users_table);

      $.table_hotkeys(
        users_table,
        [
          make_link_hotkey('c') // .vim-c = contact author
          ,make_link_hotkey('s') // .vim-s = mark user as spammer
          ,make_link_hotkey('u') // .vim-u = unmark user as spammer
          ,make_link_hotkey('b') // .vim-b = contents bad view (Own contents reported by others)
          ,make_link_hotkey('g') // .vim-g = contents good view (Contents reported by user)
          ,['shift+x', toggle_all]
          ,['shift+s', make_bulk('mark_spammer')]
          ,['shift+u', make_bulk('unmark_spammer')]
        ],
        hotkey_opt
      );
    }

  } // END: hotkeys

});
