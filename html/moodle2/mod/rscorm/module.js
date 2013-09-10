// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Javascript helper function for IMS Content Package module.
 *
 * @package   mod-rscorm
 * @copyright 2009 Petr Skoda (http://skodak.org)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

mod_rscorm_next = null;
mod_rscorm_prev = null;
mod_rscorm_activate_item = null;

M.mod_rscorm = {};

M.mod_rscorm.init = function(Y, hide_nav, hide_toc, toc_title, window_name, launch_sco) {
    
    var rscorm_disable_toc = false;
    var rscorm_hide_nav = true;
    var rscorm_hide_toc = true;
    if (hide_toc == 0) {
        if (hide_nav != 1) {
            rscorm_hide_nav = false;
        }
        rscorm_hide_toc = false;
    } else if (hide_toc == 3) {
        rscorm_disable_toc = true;
    }

    var rscorm_layout_widget;
    var rscorm_current_node;
    var rscorm_buttons = [];
    var rscorm_bloody_labelclick = false;
    var rscorm_nav_panel;

    Y.use('yui2-resize', 'yui2-dragdrop', 'yui2-container', 'yui2-button', 'yui2-layout', 'yui2-treeview', 'yui2-json', 'yui2-event', function(Y) {
        if(typeof YAHOO == 'undefined') {
            YAHOO = Y.YUI2;
        }

        YAHOO.widget.TextNode.prototype.getContentHtml = function() {
            var sb = [];
            sb[sb.length] = this.href ? '<a' : '<span';
            sb[sb.length] = ' id="' + YAHOO.lang.escapeHTML(this.labelElId) + '"';
            sb[sb.length] = ' class="' + YAHOO.lang.escapeHTML(this.labelStyle) + '"';
            if (this.href) {
                sb[sb.length] = ' href="' + YAHOO.lang.escapeHTML(this.href) + '"';
                sb[sb.length] = ' target="' + YAHOO.lang.escapeHTML(this.target) + '"';
            }
            if (this.title) {
                sb[sb.length] = ' title="' + YAHOO.lang.escapeHTML(this.title) + '"';
            }
            sb[sb.length] = ' >';
            sb[sb.length] = this.label;
            sb[sb.length] = this.href?'</a>':'</span>';
            return sb.join("");
        };

        var rscorm_activate_item = function(node) {
            if (!node) {
                return;
            }
            rscorm_current_node = node;
            rscorm_current_node.highlight();

            // remove any reference to the old API
            if (window.API) {
                window.API = null;
            }
            if (window.API_1484_11) {
                window.API_1484_11 = null;
            }
            var url_prefix = M.cfg.wwwroot + '/mod/rscorm/loadSCO.php?';
            var el_old_api = document.getElementById('rscormapi123');
            if (el_old_api) {
                el_old_api.parentNode.removeChild(el_old_api);
            }

            if (node.title) {
            	var el_rscorm_api = document.getElementById("external-rscormapi");
            	el_rscorm_api.parentNode.removeChild(el_rscorm_api);
                el_rscorm_api = document.createElement('script');
                el_rscorm_api.setAttribute('id','external-rscormapi');
                el_rscorm_api.setAttribute('type','text/javascript');
                var pel_rscorm_api = document.getElementById('rscormapi-parent');
                pel_rscorm_api.appendChild(el_rscorm_api);
                var api_url = M.cfg.wwwroot + '/mod/rscorm/loaddatamodel.php?' + node.title;
                document.getElementById('external-rscormapi').src = api_url;
            }
            
            var content = new YAHOO.util.Element('rscorm_content');
            try {
                // first try IE way - it can not set name attribute later
                // and also it has some restrictions on DOM access from object tag
                if (window_name || node.title == null) {
                    var obj = document.createElement('<iframe id="rscorm_object" src="">');
                    if (window_name) {
                        var mine = window.open('','','width=1,height=1,left=0,top=0,scrollbars=no');
                        if(! mine) {
                             alert(M.str.rscorm.popupsblocked);
                        }
                        mine.close()
                    }
                }
                else {
                    var obj = document.createElement('<iframe id="rscorm_object" src="'+url_prefix + node.title+'">');
                }
                // fudge IE7 to redraw the screen
                if (YAHOO.env.ua.ie > 5 && YAHOO.env.ua.ie < 8) {
                    obj.attachEvent("onload", rscorm_resize_parent);
                }
            } catch (e) {
                var obj = document.createElement('object');
                obj.setAttribute('id', 'rscorm_object');
                obj.setAttribute('type', 'text/html');
                if (!window_name && node.title != null) {
                    obj.setAttribute('data', url_prefix + node.title);
                }
                if (window_name) {
                    var mine = window.open('','','width=1,height=1,left=0,top=0,scrollbars=no');
                    if(! mine) {
                         alert(M.str.rscorm.popupsblocked);
                    }
                    mine.close()
                }
            }
            var old = YAHOO.util.Dom.get('rscorm_object');
            if (old) {
                if(window_name) {
                    var cwidth = rscormplayerdata.cwidth;
                    var cheight = rscormplayerdata.cheight;
                    var poptions = rscormplayerdata.popupoptions;
                    rscorm_openpopup(M.cfg.wwwroot + "/mod/rscorm/loadSCO.php?" + node.title, window_name, poptions, cwidth, cheight);
                } else {
                    content.replaceChild(obj, old);
                }
            } else {
                content.appendChild(obj);
            }

            rscorm_resize_frame();

            var left = rscorm_layout_widget.getUnitByPosition('left');
            if (left.expanded) {
                rscorm_current_node.focus();
            }
            if (rscorm_hide_nav == false) {
                rscorm_fixnav();
            }
        };

        mod_rscorm_activate_item = rscorm_activate_item;

        /**
         * Enables/disables navigation buttons as needed.
         * @return void
         */
        var rscorm_fixnav = function() {
            rscorm_buttons[0].set('disabled', (rscorm_skipprev(rscorm_current_node) == null || rscorm_skipprev(rscorm_current_node).title == null));
            rscorm_buttons[1].set('disabled', (rscorm_prev(rscorm_current_node) == null || rscorm_prev(rscorm_current_node).title == null));
            rscorm_buttons[2].set('disabled', (rscorm_up(rscorm_current_node) == null) || rscorm_up(rscorm_current_node).title == null);
            rscorm_buttons[3].set('disabled', (rscorm_next(rscorm_current_node) == null) || rscorm_next(rscorm_current_node).title == null);
            rscorm_buttons[4].set('disabled', (rscorm_skipnext(rscorm_current_node) == null || rscorm_skipnext(rscorm_current_node).title == null));
        };

        var rscorm_resize_parent = function() {
            // fudge  IE7 to redraw the screen
            parent.resizeBy(-10, -10);
            parent.resizeBy(10, 10);
            var ifr = YAHOO.util.Dom.get('rscorm_object');
            if (ifr) {
                ifr.detachEvent("onload", rscorm_resize_parent);
            }
        };

        var rscorm_resize_layout = function(alsowidth) {
            if (window_name) {
                return;
            }

            if (alsowidth) {
                rscorm_layout_widget.setStyle('width', '');
                var newwidth = rscorm_get_htmlelement_size('content', 'width');
            }
            // make sure that the max width of the TOC doesn't go to far

            var left = rscorm_layout_widget.getUnitByPosition('left');
            var maxwidth = parseInt(YAHOO.util.Dom.getStyle('rscorm_layout', 'width'));
            left.set('maxWidth', (maxwidth - 50));
            var cwidth = left.get('width');
            if (cwidth > (maxwidth - 1)) {
                left.set('width', (maxwidth - 50));
            }

            rscorm_layout_widget.setStyle('height', '100%');
            var center = rscorm_layout_widget.getUnitByPosition('center');
            center.setStyle('height', '100%');

            // calculate the rough new height
            newheight = YAHOO.util.Dom.getViewportHeight() -5;
            if (newheight < 600) {
                newheight = 600;
            }
            rscorm_layout_widget.set('height', newheight);

            rscorm_layout_widget.render();
            rscorm_resize_frame();

            if (rscorm_nav_panel) {
                rscorm_nav_panel.align('bl', 'bl');
            }
        };

        var rscorm_get_htmlelement_size = function(el, prop) {
            var val = YAHOO.util.Dom.getStyle(el, prop);
            if (val == 'auto') {
                if (el.get) {
                    el = el.get('element'); // get real HTMLElement from YUI element
                }
                val = YAHOO.util.Dom.getComputedStyle(YAHOO.util.Dom.get(el), prop);
            }
            return parseInt(val);
        };

        var rscorm_resize_frame = function() {
            var obj = YAHOO.util.Dom.get('rscorm_object');
            if (obj) {
                var content = rscorm_layout_widget.getUnitByPosition('center').get('wrap');
                // basically trap IE6 and 7
                if (YAHOO.env.ua.ie > 5 && YAHOO.env.ua.ie < 8) {
                    if( obj.style.setAttribute ) {
                        obj.style.setAttribute("cssText", 'width: ' +(content.offsetWidth - 6)+'px; height: ' + (content.offsetHeight - 10)+'px;');
                    }
                    else {
                        obj.style.setAttribute('width', (content.offsetWidth - 6)+'px', 0);
                        obj.style.setAttribute('height', (content.offsetHeight - 10)+'px', 0);
                    }
                }
                else {
                    obj.style.width = (content.offsetWidth)+'px';
                    obj.style.height = (content.offsetHeight - 10)+'px';
                }
            }
        };

        var rscorm_up = function(node) {
            var node = rscorm_tree_node.getHighlightedNode();
            if (node.depth > 0) {
                return node.parent;
            }
            return null;
        };

        var rscorm_lastchild = function(node) {
            if (node.children.length) {
                return rscorm_lastchild(node.children[node.children.length-1]);
            } else {
                return node;
            }
        };

        var rscorm_prev = function(node) {
            if (node.previousSibling && node.previousSibling.children.length) {
                return rscorm_lastchild(node.previousSibling);
            }
            return rscorm_skipprev(node);
        };

        var rscorm_skipprev = function(node) {
            if (node.previousSibling) {
                return node.previousSibling;
            } else if (node.depth > 0) {
                return node.parent;
            }
            return null;
        };

        var rscorm_next = function(node) {
            if (node === false) {
                return rscorm_tree_node.getRoot().children[0];
            }
            if (node.children.length) {
                return node.children[0];
            }
            return rscorm_skipnext(node);
        };

        var rscorm_skipnext = function(node) {
            if (node.nextSibling) {
                return node.nextSibling;
            } else if (node.depth > 0) {
                return rscorm_skipnext(node.parent);
            }
            return null;
        };

        mod_rscorm_next = rscorm_next;
        mod_rscorm_prev = rscorm_prev;

        // layout
        YAHOO.widget.LayoutUnit.prototype.STR_COLLAPSE = M.str.moodle.hide;
        YAHOO.widget.LayoutUnit.prototype.STR_EXPAND = M.str.moodle.show;

        if (rscorm_disable_toc) {
            rscorm_layout_widget = new YAHOO.widget.Layout('rscorm_layout', {
                minWidth: 255,
                minHeight: 600,
                units: [
                    { position: 'left', body: 'rscorm_toc', header: toc_title, width: 0, resize: true, gutter: '0px 0px 0px 0px', collapse: false},
                    { position: 'center', body: '<div id="rscorm_content"></div>', gutter: '0px 0px 0px 0px', scroll: true}
                ]
            });
        } else {
            rscorm_layout_widget = new YAHOO.widget.Layout('rscorm_layout', {
                minWidth: 255,
                minHeight: 600,
                units: [
                    { position: 'left', body: 'rscorm_toc', header: toc_title, width: 250, resize: true, gutter: '2px 5px 5px 2px', collapse: true, minWidth:250, maxWidth: 590},
                    { position: 'center', body: '<div id="rscorm_content"></div>', gutter: '2px 5px 5px 2px', scroll: true}
                ]
            });
        }

        rscorm_layout_widget.render();
        var left = rscorm_layout_widget.getUnitByPosition('left');
        if (!rscorm_disable_toc) {
            left.on('collapse', function() {
                rscorm_resize_frame();
            });
            left.on('expand', function() {
                rscorm_resize_frame();
            });
        }
        // ugly resizing hack that works around problems with resizing of iframes and objects
        left._resize.on('startResize', function() {
            var obj = YAHOO.util.Dom.get('rscorm_object');
            obj.style.display = 'none';
        });
        left._resize.on('endResize', function() {
            var obj = YAHOO.util.Dom.get('rscorm_object');
            obj.style.display = 'block';
            rscorm_resize_frame();
        });

        // hide the TOC if that is the default
        if (!rscorm_disable_toc) {
            if (rscorm_hide_toc == true) {
               left.collapse();
            }
        }
        // TOC tree
        var tree = new YAHOO.widget.TreeView('rscorm_tree');
        rscorm_tree_node = tree;
        tree.singleNodeHighlight = true;
        tree.subscribe('labelClick', function(node) {
            if (node.title == '' || node.title == null) {
                return; //this item has no navigation
            }
            rscorm_activate_item(node);
            if (node.children.length) {
                rscorm_bloody_labelclick = true;
            }
        });
        if (!rscorm_disable_toc) {
            tree.subscribe('collapse', function(node) {
                if (rscorm_bloody_labelclick) {
                    rscorm_bloody_labelclick = false;
                    return false;
                }
            });
            tree.subscribe('expand', function(node) {
                if (rscorm_bloody_labelclick) {
                    rscorm_bloody_labelclick = false;
                    return false;
                }
            });
        }
        tree.expandAll();
        tree.render();

        // navigation
        if (rscorm_hide_nav == false) {
            rscorm_nav_panel = new YAHOO.widget.Panel('rscorm_navpanel', { visible:true, draggable:true, close:false, xy: [250, 450],
                                                                    autofillheight: "body"} );
            rscorm_nav_panel.setHeader(M.str.rscorm.navigation);

            //TODO: make some better&accessible buttons
            rscorm_nav_panel.setBody('<span id="rscorm_nav"><button id="nav_skipprev">&lt;&lt;</button><button id="nav_prev">&lt;</button><button id="nav_up">^</button><button id="nav_next">&gt;</button><button id="nav_skipnext">&gt;&gt;</button></span>');
            rscorm_nav_panel.render();
            rscorm_buttons[0] = new YAHOO.widget.Button('nav_skipprev');
            rscorm_buttons[1] = new YAHOO.widget.Button('nav_prev');
            rscorm_buttons[2] = new YAHOO.widget.Button('nav_up');
            rscorm_buttons[3] = new YAHOO.widget.Button('nav_next');
            rscorm_buttons[4] = new YAHOO.widget.Button('nav_skipnext');
            rscorm_buttons[0].on('click', function(ev) {
                rscorm_activate_item(rscorm_skipprev(rscorm_tree_node.getHighlightedNode()));
            });
            rscorm_buttons[1].on('click', function(ev) {
                rscorm_activate_item(rscorm_prev(rscorm_tree_node.getHighlightedNode()));
            });
            rscorm_buttons[2].on('click', function(ev) {
                rscorm_activate_item(rscorm_up(rscorm_tree_node.getHighlightedNode()));
            });
            rscorm_buttons[3].on('click', function(ev) {
                rscorm_activate_item(rscorm_next(rscorm_tree_node.getHighlightedNode()));
            });
            rscorm_buttons[4].on('click', function(ev) {
                rscorm_activate_item(rscorm_skipnext(rscorm_tree_node.getHighlightedNode()));
            });
            rscorm_nav_panel.render();
        }

        // finally activate the chosen item
        var rscorm_first_url = tree.getRoot().children[0];
        var nxt = false;
        while (nxt = rscorm_next(nxt)) {
            if (nxt.title) {
                expression = new RegExp('^.*?scoid=' + launch_sco + '.*?$');
                matches = nxt.title.match(expression);
                if (matches != null) {
                    rscorm_first_url = nxt;
                    break;
                }
            }
        }
        rscorm_activate_item(rscorm_first_url);

        // resizing
        rscorm_resize_layout(false);

        // fix layout if window resized
        window.onresize = function() {
            rscorm_resize_layout(true);
        };
    });
};


function rscorm_get_prev() {
    if(typeof YAHOO == 'undefined') {
        Y.use('yui2-resize', 'yui2-dragdrop', 'yui2-container', 'yui2-button', 'yui2-layout', 'yui2-treeview', 'yui2-json', 'yui2-event', function(Y) {
            YAHOO = Y.YUI2;
        });
    }
    
    rscorm_tree_node = YAHOO.widget.TreeView.getTree('rscorm_tree');
    if (rscorm_tree_node) {
        var hnode = rscorm_tree_node.getHighlightedNode();
        var prev = mod_rscorm_prev(hnode);
        if (prev) {
            mod_rscorm_activate_item(prev);
        }
    }
}

function rscorm_get_next() {
    if(typeof YAHOO == 'undefined') {
        Y.use('yui2-resize', 'yui2-dragdrop', 'yui2-container', 'yui2-button', 'yui2-layout', 'yui2-treeview', 'yui2-json', 'yui2-event', function(Y) {
            YAHOO = Y.YUI2;
        });
    }
    
    rscorm_tree_node = YAHOO.widget.TreeView.getTree('rscorm_tree');
    if (rscorm_tree_node) {
        var hnode = rscorm_tree_node.getHighlightedNode();
        var next = mod_rscorm_next(hnode);
        if (next) {
            mod_rscorm_activate_item(next);
        }
    }
}
