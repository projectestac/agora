M.local_message_notifier = {};

M.local_message_notifier.init_notification = function(Y) {
    Y.one('body').on('click', function (e){
        if(Y.one('#message_notifier').hasClass('open')){
            Y.one('#message_notifier').removeClass('open');
            e.stopPropagation();
        }
    });
    Y.one('#message_notif_click').on('click', function (e){
        if(Y.one('#message_notifier').hasClass('open')){
          Y.one('#message_notifier').removeClass('open');
          e.stopPropagation();
          return false;
        }
        Y.one('#message_notifier').addClass('open');
        var cfg = {
            method: 'GET',
            on: {
                success: function(id, o, args) {
                  xml = o.responseXML;
                  if(xml){
                      var msg = xml.getElementsByTagName('message');

                      if(msg.length > 0){
                          msg = msg[0].firstChild.nodeValue;
                          var count = msg.match(/\<li class\=\"message\"/g);
                          if(count != null){
                            count = count.length;
                          } else {
                            count = 0;
                          }
                          Y.one('#message_count').setContent(count);
                          if(count > 0){
                            Y.one('#message_count').show();
                            Y.one('#message_contents').setContent(msg);
                            Y.all('#message_contents .message').each(function(node) {
                              node.on('click', function(e) {
                                  var cfg = {
                                        method: 'GET',
                                        on: {
                                            success: function(id, o, args) {
                                              xml = o.responseXML;
                                              if(xml){
                                                  var msg = xml.getElementsByTagName('message');
                                                  if(msg.length > 0){
                                                      var content = msg[0].firstChild.nodeValue;
                                                      Y.use('panel', function() {
                                                        var panel = new Y.Panel({
                                                            width   : 400,
                                                            centered: true,
                                                            modal   : true,
                                                            render  : true,
                                                            bodyContent : content,
                                                            zIndex: 2000,
                                                            hideOn: [
                                                              {
                                                                  // When we don't specify a `node`,
                                                                  // it defaults to the `boundingBox` of this Panel instance.
                                                                  eventName: 'clickoutside'
                                                              }
                                                            ],
                                                            buttons: [
                                                                {
                                                                    value  : 'Mark As Read',
                                                                    section: Y.WidgetStdMod.FOOTER,
                                                                    action : function (e) {
                                                                        e.preventDefault();
                                                                        Y.io(M.cfg.wwwroot+'/local/agora/message_notifier/ajax.php?action=mark_as_read&id='+node.getAttribute('data-target'));
                                                                    }
                                                                },
                                                                {
                                                                    value  : 'Close',
                                                                    section: Y.WidgetStdMod.FOOTER,
                                                                    action : function (e) {
                                                                        e.preventDefault();
                                                                        panel.hide();
                                                                    }
                                                                }
                                                            ]
                                                        });
                                                        panel.render();
                                                      });
                                                  }
                                              }
                                            },
                                            failure: function(id, o, args) {

                                            }
                                        },
                                        headers: {
                                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                                        },
                                        context: this,
                                        arguments: this
                                    };
                                    Y.io(M.cfg.wwwroot+'/local/agora/message_notifier/ajax.php?action=show_message&id='+node.getAttribute('data-target'), cfg);
                                });
                            });
                          } else {
                            Y.one('#message_count').hide();
                          }
                      }
                  }
                },
                failure: function(id, o, args) {
                }
            },
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            context: this,
            arguments: this
        };
        Y.io(M.cfg.wwwroot+'/local/agora/message_notifier/ajax.php?action=show_messages', cfg);
        e.stopPropagation();
        return false;
    });
};
