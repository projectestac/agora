=== BuddyPress Like ===
Contributors: darrenmeehan,hempsworth
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZAJLLEJDBHAWL
Tags: buddypress, like, rate, thumbs, Post, button, vote
Requires at least: 3.8
Tested up to: 3.9
Stable tag: 0.1.7

Gives users the ability to 'like' content across your BuddyPress enabled site. Note BuddyPress Like is currently in Beta.

== Description ==

Gives users the ability to 'like' content across your BuddyPress enabled site. Note BuddyPress Like is currently in Beta.
While development will be based on Github, for now many updates will be uploaded to WordPress.org for ease of access for the people who want the most up to date version.

Requires <a href="http://wordpress.org/plugins/buddypress/">BuddyPress</a>

== Installation ==

= Automatic Installation =

1. From inside your WordPress administration panel, visit 'Plugins -> Add New'
2. Search for `BuddyPress Like` and find this plugin in the results
3. Click 'Install'
4. Once installed, activate via the 'Plugins -> Installed' page

= Manual Installation =

1. Upload `buddypress-like` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 0.1.7 =
* No longer posts to activity feed when user likes post in a group.

= 0.1.6 =
* Fixed bug when displaying number of people who liked.
* Fixed bug with jQuery not working after loading more statuses.

= 0.1.5 =
* Removed favorite/unfavorite button on activity items using jQuery. 
* Added function: view_who_likes().
* Added hook: view_who_likes, will be adding more.
* Added function bp_like_get_num_likes() to return number of likes of an item.
* Tidied up jQuery, now properly using no conflict mode, functions split up.
* Fixed activity filter bug where custom text for 'Blog Post Likes' was not called.
* Moved Settings Page to under "Settings" tab in Admin, previously was under legacy BuddyPress tab.
* New donate link.
* Organised functions into different files, no more having one massive file!
* Function added: bp_like_post_to_stream() with some code clean up inside
* Tidied up bp_like_list_scripts() function, properly registering and enqueuing the scripts.
* Removed like visibility, more changes on this to come.

= 0.1.1 =
* Fixed errors in readme.txt
* Started formating code to meet WordPress code Standards
* Add in View Likes, until some bugs are fixed.
* View Likes should now be working in comments.
* Minified JavaScript.
* Several other small fixes.

= 0.1.0 =
* Tidied up Admin Panel.
* Removed bp_like_insert_head() as it's not needed anymore thanks to BuddyPress' theme compatibility.
* Added bp_like_users_who_like() function to output the users who liked an item.
* Removed "View Likes" button, instead showing who liked each post.

= 0.0.9 =
* Bug fixed: updates deprecated WordPress functions.

= 0.0.8 =
* New feature: blog posts can now be liked.
* New feature: you can no show an excerpt of the liked content.
* Option added: disable posting likes to the activity stream.
* Option added: show avatars of likers instead of names.
* Bug fixed: activity updates of likes are now deleted when the item is unliked.
* Bug fixed: plugin would break if the Friends component was disabled.

= 0.0.7 =
* Fixes a couple of major bugs
* Bug fixed: Posts, drafts etc would not be saved, giving error "You do not have permission to do that."
* Bug fixed: Could not save 'Likers Visibility' options from the BuddyPress Like settings screen.

= 0.0.6 =
* Fully localised.
* Adds options to customise the messages displayed to users.

= 0.0.5 =
* Fixes a bug when a user tries to view likes when they have no friends.
* Inserts the 'View likes' button if the user is the first to like an item.

= 0.0.4 =
* Adds options for the visibility of 'likers' via the admin panel.

= 0.0.3 =
* Fixed a bug affecting installs where WP isn’t in the root of the site.

= 0.0.1 =
* Initial release.

== Upgrade Notice ==

= 0.1.7 =
No longer posts statuses when something is liked in a group. Also includes some JQuery fixes.

= 0.1.5 =
Many fixes, but still only suitable for testing. Settings moved to Setting->BuddyPress Like. Can now like comments properly and remove the favourite button.

= 0.1.1 =
A few awesome fixes! Comments should now work properly.

= 0.0.8 =
The biggest update yet! Lots of new features, including the ability to like blog posts. Recommended for all users.

= 0.0.7 =
Important upgrade! Fixes a couple of major bugs affecting saving posts, drafts etc (giving error "You do not have permission to do that.") and the saving of 'Likers Visibility' options

= 0.0.6 =
Now with translation support, as well as options to customise the messages displayed to users.

= 0.0.5 =
Important upgrade for 0.0.4 users! Fixes a bug when a user tries to view likes when they have no friends.

= 0.0.4 =
Upgrading allows you to choose what information about the 'likers' of an item is shown.

= 0.0.3 =
Upgrade if you're installation is not in the root of the domain.
