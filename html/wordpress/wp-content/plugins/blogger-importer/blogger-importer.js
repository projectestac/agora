/* Javascript for refreshing the blog table. */
/* Localised strings passed to this via wp_localize_script and BL_strings object */
/* Stop on error or stop if Ajax Admin can't find a suitable handler */ 
			function blog(i, title, mode, status){
				this.blog   = i;
				this.mode   = mode;
				this.title  = title;
                eval('this.status='+status);
				this.button = '#submit'+this.blog;
			};
			blog.prototype = {
				start: function() {
					this.cont = true;
					this.kick();
					this.check();
				},
				kick: function() {
					++this.kicks;
                    with ({currentblog: this.blog}) {
					   jQuery.post(BL_strings.ajaxURL,{
					       action: 'BL_import',
                           blogID:this.blog
                           },
                           function(text,result){blogs[currentblog].kickd(text,result)});
                    }
				},
				check: function() {
					++this.checks;
					with ({currentblog: this.blog}) {
					   jQuery.post(BL_strings.ajaxURL,{
					       action: 'BL_status',
                           blogID:this.blog
                           },
                           function(text,result){blogs[currentblog].checkd(text,result)});
                    }
				},
				kickd: function(text, result) {
				    --this.kicks;
					if ( result == 'error' || text  == '0' ) {
						// TODO: exception handling
                        this.stop();
					} else {
						if ( text == 'done' ) {
							this.stop();
                            this.done();
                            this.check();
						} else if ( text == 'nothing' ) {
							this.stop();
							this.nothing();
                            this.done();
						} else if ( text == 'continue' ) {
							this.kick();
						} else if ( this.mode == 'stopped' ) 
							jQuery(this.button).attr('value', BL_strings.cont);
                  
					}
				},
				checkd: function(text, result) {
				    --this.checks;
					if ( result == 'error' || text == '0' ) {
						// TODO: exception handling
                        this.stop();
					} else {
						eval('this.status='+text);
						this.update();
						if ( this.cont || this.kicks > 0 ) {
                              with ({currentblog: this.blog}) {
						      setTimeout(function() { 
						          blogs[currentblog].check();
                                },parseInt(BL_strings.interval));
                              }
						}
					}
				},
				update: function() {
                    try
                      {
                        jQuery('#Posts'+this.blog).progressbar({ value: this.status.p1});
                        jQuery('#PostsLabel'+this.blog).text(this.status.p2);
                        jQuery('#Posts'+this.blog).attr('title', this.status.p3);
                        jQuery('#Comments'+this.blog).progressbar({ value: this.status.c1 });
                        jQuery('#CommentsLabel'+this.blog).text(this.status.c2);
					    jQuery('#Comments'+this.blog).attr('title',this.status.c3);
                        jQuery('#Images'+this.blog).progressbar({ value: this.status.i2});
                        jQuery('#ImagesLabel'+this.blog).text(this.status.i1);
                        jQuery('#Images'+this.blog).attr('title',this.status.i3);
                        jQuery('#Links'+this.blog).progressbar({ value: this.status.l2 });
                        jQuery('#LinksLabel'+this.blog).text(this.status.l1);
                      }
                    catch(err)
                      {
                      txt="Error displaying updates for "+this.title+", importer cannot continue\n\n";
                      txt+="Error description: " + err.message + "\n\n";
                      txt+="Click OK to continue.\n\n";
                      alert(txt);
                      }
				},
				stop: function() {
					this.cont = false;
				},
				done: function() {
					this.mode = 'authors';
					jQuery(this.button).attr('value', BL_strings.authors);
				},
				nothing: function() {
					this.mode = 'nothing';
					jQuery(this.button).remove();
					alert(BL_strings.nothing);
				},
				getauthors: function() {
					if ( jQuery('div.wrap').length > 1 )
						jQuery('div.wrap').gt(0).remove();
					jQuery('div.wrap').empty().append('<h2>'+BL_strings.authhead+'</h2><h3>' + this.title + '</h3>');
					jQuery('div.wrap').append('<p id=\"auth\">'+BL_strings.loadauth+'</p>');
					jQuery('p#auth').load('index.php?import=blogger&noheader=true&authors=1',{blog:this.blog});
				},
				init: function() {
					this.update();
					var i = this.blog;
					jQuery(this.button).bind('click', function(){return blogs[i].click();});
					this.kicks = 0;
					this.checks = 0;
				},
				click: function() {
					if ( this.mode == 'init' || this.mode == 'stopped' || this.mode == 'posts' || this.mode == 'comments' ) {
						this.mode = 'started';
						this.start();
						jQuery(this.button).attr('value', BL_strings.stop);
					} else if ( this.mode == 'started' ) {
						//return false; // let it run...
						this.mode = 'stopped';
						this.stop();
						if ( this.checks > 0 || this.kicks > 0 ) {
							this.mode = 'stopping';
							jQuery(this.button).attr('value', BL_strings.stopping);
						} else {
							jQuery(this.button).attr('value', BL_strings.cont);
						}
					} else if ( this.mode == 'authors' ) {
						document.location = 'index.php?import=blogger&authors=1&blog='+this.blog;
						//this.mode = 'authors2';
						//this.getauthors();
					}
					return false;
				}
			};