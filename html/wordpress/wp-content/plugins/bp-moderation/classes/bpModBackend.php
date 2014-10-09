<?php

/**
 * Controls and display the backend part of bp-moderation
 *
 * TODO: reformat with a more mvc like pattern
 */
class bpModBackend extends bpModeration
{

	/**
	 * bpModBackend constructor
	 *
	 * hooks in wordpress backend
	 */
	function  __construct()
	{
		if (version_compare(get_site_option('bp_moderation_db_version'), $this->db_ver, '<')) {
			bpModLoader::load_class('bpModInstaller');
			$installer = new bpModInstaller();
			$installer->install();
		}

		parent::__construct();

		add_action(is_multisite() ? 'network_admin_menu' : 'admin_menu', array(&$this, 'add_admin_menu'));
		add_action('admin_head', array(&$this, 'print_page_icon_style'));
		add_action('rightnow_end', array(&$this, 'rightnow_widget_section'));
		add_action('admin_init', array(&$this, 'register_settings'));

		if (isset($this->options['generate_test_data'])) {
			unset($this->options['generate_test_data']);
			update_site_option('bp_moderation_options', $this->options);
			add_action('admin_init', array(bpModLoader, 'test_data'));
		}
	}

	/**
	 * Add aubmenu page and hooks css and js functions
	 */
	function add_admin_menu()
	{
		$hook = add_menu_page(__('BuddyPress Moderation', 'bp-moderation'), __('BP Moderation', 'bp-moderation'),
			'manage_options', 'bp-moderation', array(&$this, 'admin_page'), 'div');

		add_action("admin_print_styles-$hook", array(&$this, 'admin_css'));
		add_action("admin_print_scripts-$hook", array(&$this, 'admin_js'));
        
        // XTEC ************ AFEGIT - Remove creation of option in main admin menu
        // 2014.07.21 @aginard
        remove_menu_page('bp-moderation');
        //************ FI

    }

    function print_page_icon_style()
    {
        echo <<<HTML
<style>
ul#adminmenu li.toplevel_page_bp-moderation .wp-menu-image {
background-image: url('{$this->plugin_url}/css/sprite.png');
background-position: 6px 5px;
}
ul#adminmenu li.toplevel_page_bp-moderation:hover .wp-menu-image,
ul#adminmenu li.toplevel_page_bp-moderation.current .wp-menu-image {
background-position: 6px -61px;
}
</style>
HTML;
    }

    /**
	 * Add info on moderation queue in the rightnow widget
	 */
	function rightnow_widget_section()
	{
		if (!is_super_admin()) {
			return;
		}

		global $wpdb;

		$text = __('BP Moderation: ', 'bp-moderation');

		$sql = "SELECT COUNT(*) FROM {$this->contents_table}";

		if ($awating = (int)$wpdb->get_var("$sql WHERE status IN ('new','warned')")) {
			$link = 'admin.php?page=bp-moderation&view=contents&filters[active_filters][status]=on&filters[status][new]=on&filters[status][warned]=on&order[0][by]=last_flag&order[0][dir]=DESC&per_page=20&submit=1';

			$text .= sprintf(_n(
					'<a href="%1$s">%2$d content</a> is awaiting your moderation',
					'<a href="%1$s">%2$d contents</a> are awaiting your moderation',
					$awating, 'bp-moderation'), $link, $awating
			);

			if ($warned = (int)$wpdb->get_var("$sql WHERE status = 'warned'")) {
				$link = 'admin.php?page=bp-moderation&view=contents&filters[active_filters][status]=on&filters[status][warned]=on&order[0][by]=last_flag&order[0][dir]=DESC&per_page=20&submit=1';

				$text .= sprintf(_n(
						' and the owner of <a href="%1$s">%2$d of them</a> has already been warned',
						' and the owners of <a href="%1$s">%2$d of them</a> have already been warned',
						$warned, 'bp-moderation'), $link, $warned
				);
			}

			$text .= '.';
		} elseif ($total = (int)$wpdb->get_var($sql)) {
			$link = 'admin.php?page=bp-moderation&view=contents';

			$text .= sprintf(_n(
					'there are no contents awaiting your moderation, <a href="%1$s">%2$d reported content</a> has already been viewed.',
					'there are no contents awaiting your moderation, <a href="%1$s">%2$d reported contents</a> have already been viewed.',
					$total, 'bp-moderation'), $link, $total
			);
		} else {
			$text .= __('no content has ever been reported.', 'bp-moderation');
		}

		echo "<p class='bp-mod-right-now'>$text</p>\n";
	}

	/**
	 * enqueues style
	 */
	function admin_css()
	{
		wp_enqueue_style('bpmod-admin', $this->plugin_url . '/css/bpmod-admin.css', false, $this->plugin_ver, 'screen');
	}

	/**
	 * enqueues styles
	 */
	function admin_js()
	{
		wp_enqueue_script('bpmod-admin', $this->plugin_url . '/js/bpmod-admin.js', array('jquery'), $this->plugin_ver, !'in footer');

		//hotkeys script
		if ((empty($_GET['view']) || 'contents' == $_GET['view'] || 'users' == $_GET['view'])
			&& get_user_option('bp_moderation_hotkeys')
		) {
			wp_enqueue_script('jquery-table-hotkeys');
			wp_localize_script('bpmod-admin', 'adminBPModL10n', array(
				'hotkeys_highlight_first' => isset($_GET['hotkeys_highlight_first']),
				'hotkeys_highlight_last' => isset($_GET['hotkeys_highlight_last'])
			));
		}
	}

	/**
	 * print admin pages
	 *
	 * print common parts of admin pages and call the function for printing current view
	 * (specified by $_GET['view'], default is 'contents' view)
	 */
	function admin_page()
	{

		if (!is_super_admin()) {
			wp_die(__('Cheatin&#8217; uh?'));
		}

		echo "<div class='wrap'>\n";

		$views = array(
			'contents' => __('Contents', 'bp-moderation'),
			'users' => __('Users', 'bp-moderation'),
			'settings' => __('Settings', 'bp-moderation')
		);
		$defview = 'contents';

		$view = (!empty($_GET['view']) && in_array($_GET['view'], array_keys($views)))
			? $_GET['view'] : $defview;

		$h2 = '<h2 class="nav-tab-wrapper"><span style="margin-right:.5em;">' . __('BP Moderation', 'bp-moderation') . '</span>';
		foreach ($views as $_view => $title) {
			$current = ($_view == $view) ? ' nav-tab-active' : '';
			$h2 .= "<a href='admin.php?page=bp-moderation&amp;view=$_view' class='nav-tab$current'>$title</a>";
		}
		$h2 .= "</h2>\n";
		echo $h2;

		$messagges_strings = array(
			'marked_spammer' => _n_noop('%s has been marked as spammer.', '%d members have been marked as spammers.'),
			'unmarked_spammer' => _n_noop('%s has been marked as not spammer.', '%d members have been marked as not spammers.'),
			'content_ignored' => _n_noop('%d item has been ignored.', '%d items have been ignored.'),
			'content_moderated' => _n_noop('%d item has been marked as moderated.', '%d items have been marked as moderated.'),
			'content_deleted' => _n_noop('%d item has been deleted.', '%d items have been deleted.'),
		);

		foreach ($messagges_strings as $arg_key => $tr) {
			if (isset($_GET[$arg_key])) {
				$message = is_numeric($_GET[$arg_key])
					? _n($tr[0], $tr[1], $_GET[$arg_key], 'bp-moderation')
					: $tr[0];
				$message = sprintf($message, $_GET[$arg_key]);
				if (isset($_GET['err_ids'])) {
					$message .= '<br/>' . sprintf(__('Operation failed on these items: %s'), $_GET['err_ids']);
				}
				if (isset($_GET['err_msg'])) {
					$message .= '<br/>' . $_GET['err_msg'];
				}
				break;
			}
		}
		if (!empty($message)) {
			echo '<div id="moderated" class="updated"><p>' . $message . '</p></div>';
		}

		call_user_func(array(&$this, "view_$view"));

		echo "</div> <!-- .wrap -->\n";

	}

	/**
	 * print contents view (custom query + contents table)
	 */
	function view_contents()
	{
		global $bp;

		$chk = ' checked="checked"';
		$sel = ' selected="selected"';
		?>
		<form id="bpmod-contents-query" class="bpmod-form-query" action="admin.php"
			  method="get">
			<input type="hidden" name="page" value="bp-moderation"/>
			<input type="hidden" name="view" value="contents"/>
			<fieldset>
				<legend><?php _e('Custom Query', 'bp-moderation') ?></legend>
				<div class="column">
					<h4><?php _e('Filters', 'bp-moderation') ?></h4>
					<dt>
						<input
							id='filter-item_type' <?php echo isset($_GET['filters']['active_filters']['item_type'])
							? $chk : ''
						?> name='filters[active_filters][item_type]'
							type='checkbox'/>
						<label
							for='filter-item_type'><?php _e('Content types', 'bp-moderation') ?></label>
					</dt>
					<dd>
						<ul>
							<?php foreach ($this->content_types as $slug => $ct) : ?>
								<li><input
										id='type_<?php echo $slug ?>'<?php echo isset($_GET['filters']['item_type'][$slug])
										? $chk : ''
									?> name='filters[item_type][<?php echo $slug ?>]'
										type='checkbox'/>
									<label
										for='type_<?php echo $slug ?>'><?php echo $ct->label ?></label>
								</li>
							<?php endforeach ?>
						</ul>
					</dd>
					<dt>
						<input
							id='filter-status' <?php echo isset($_GET['filters']['active_filters']['status'])
							? $chk : ''
						?> name='filters[active_filters][status]'
							type='checkbox'/>
						<label
							for='filter-status'><?php _e('Status', 'bp-moderation') ?></label>
					</dt>
					<dd>
						<ul>
							<?php foreach ($this->content_stati as $slug => $label) : ?>
								<li><input
										id="<?php echo $slug ?>"<?php echo isset($_GET['filters']['status'][$slug])
										? $chk : ''
									?> name="filters[status][<?php echo $slug ?>]"
										type="checkbox">
									<label
										for="<?php echo $slug ?>"><?php echo $label ?></label>
								</li>
							<?php endforeach ?>
						</ul>
					</dd>
					<dt>
						<input
							id='filter-flags' <?php echo isset($_GET['filters']['active_filters']['flags'])
							? $chk : ''
						?> name='filters[active_filters][flags]'
							type='checkbox'/>
						<label
							for='filter-flags'><?php _e('Times reported', 'bp-moderation') ?></label>
					</dt>
					<dd>
						<label for='flags'><?php
							$input = "<input id='flags' size='4' type='text' name='filters[flags]' value='" . (empty($_GET['filters']['flags'])
									? '0' : $_GET['filters']['flags']) . "' />";
							echo sprintf(__('Reported at least %s times', 'bp-moderation'), $input); ?></label>
					</dd>
					<dt>
						<input
							id='filter-item_author' <?php echo isset($_GET['filters']['active_filters']['item_author'])
							? $chk : ''
						?> name='filters[active_filters][item_author]'
							type='checkbox'/>
						<label
							for='filter-item_author'><?php _e('Content posted by', 'bp-moderation') ?></label>
					</dt>
					<dd>
						<input id='item_author' class='line' size='40' type='text'
							   name='filters[item_author]' value='<?php
						echo empty($_GET['filters']['item_author']) ? ''
							: $_GET['filters']['item_author'] ?>'/>
						<label
							for='item_author'><?php _e('User ids (comma separeted)', 'bp-moderation') ?></label>
					</dd>
					<dt>
						<input
							id='filter-reporters' <?php echo isset($_GET['filters']['active_filters']['reporters'])
							? $chk : ''
						?> name='filters[active_filters][reporters]'
							type='checkbox'/>
						<label
							for='filter-reporters'><?php _e('Content reported by', 'bp-moderation') ?></label>
					</dt>
					<dd>
						<input id='reporters' class='line' size='40' type='text'
							   name='filters[reporters]' value='<?php
						echo empty($_GET['filters']['reporters']) ? ''
							: $_GET['filters']['reporters'] ?>'/>
						<label
							for='reporters'><?php _e('User ids (comma separeted)', 'bp-moderation') ?></label>
					</dd>
				</div>
				<div class="column">
					<h4 class="order-by"><?php _e('Order', 'bp-moderation') ?></h4>
					<ol class="order-by">
						<?php            $i = 0;
						while (0 == $i || !empty($_GET['order'][$i])) :
							?>
							<li><?php _e('Order by', 'bp-moderation');
								$orby = empty($_GET['order'][$i]['by']) ? 'none'
									: $_GET['order'][$i]['by'];
								$asc = 'DESC' == @$_GET['order'][$i]['dir'] ? 'DESC'
										: 'ASC'; ?>

								<select name="order[<?php echo $i ?>][by]">
									<option<?php selected('none', $orby) ?>
										value="none"><?php _e('none', 'bp-moderation') ?></option>
									<option<?php selected('flags', $orby) ?>
										value="flags"><?php _e('times reported', 'bp-moderation') ?></option>
									<option<?php selected('first_flag', $orby) ?>
										value="first_flag"><?php _e('first time reported', 'bp-moderation') ?></option>
									<option<?php selected('last_flag', $orby) ?>
										value="last_flag"><?php _e('last time reported', 'bp-moderation') ?></option>
									<option<?php selected('item_id', $orby) ?>
										value="item_id"><?php _e('item id', 'bp-moderation') ?></option>
									<option<?php selected('item_id2', $orby) ?>
										value="item_id2"><?php _e('secondary id', 'bp-moderation') ?></option>
								</select>
								<select name="order[<?php echo $i ?>][dir]">
									<option<?php selected('ASC', $asc) ?>
										value="ASC">ASC
									</option>
									<option<?php selected('DESC', $asc) ?>
										value="DESC">DESC
									</option>
								</select>
							</li>
							<?php            $i++;
						endwhile;
						?>
					</ol>
					<h4><?php _e('Limit', 'bp-moderation') ?></h4>

					<p><label for='limit'><?php
							$input = "<input id='limit' size='4' type='text' name='per_page' value='" . (empty($_GET['per_page'])
									? '20' : $_GET['per_page']) . "' />";
							echo sprintf(__('Display at most %s contents', 'bp-moderation'), $input); ?></label>
					</p>
					<input name="submit" type="submit" class="button-primary"
						   value="<?php _e('Query Contents', 'bp-moderation'); ?>"/>
				</div>
			</fieldset>
		</form>
		<div class="clear"></div>
		<?php
		extract($this->query_contents());

		if ($total) {
			$page_links = paginate_links(array(
				'base' => add_query_arg('cpage', '%#%'),
				'format' => '',
				'prev_text' => __('&laquo;'),
				'next_text' => __('&raquo;'),
				'total' => ceil($total / $per_page),
				'current' => $page_index + 1
			));

			?>
			<form id="bpmod-contents-form" class="bpmod-bulk-form"
				  action="admin.php" method="post">
				<div class="tablenav">
					<div class="alignleft actions">
						<select name="bulk-action">
							<option value="-1"
									selected="selected"><?php _e('Bulk Actions', 'bp-moderation') ?></option>
							<option
								value="ignore"><?php _e('Ignore', 'bp-moderation'); ?></option>
							<option
								value="mark_moderated"><?php _e('Mark as moderated', 'bp-moderation'); ?></option>
							<option
								value="delete"><?php _e('Delete', 'bp-moderation'); ?></option>
							<option
								value="mark_spammer"><?php _e('Mark authors as spammers', 'bp-moderation'); ?></option>
							<option
								value="unmark_spammer"><?php _e('Mark authors as not spammers', 'bp-moderation'); ?></option>
							<!--<option value="authors_in_user_view"><?php _e('View authors in users view', 'bp-moderation'); ?></option>-->
						</select>
						<input type="hidden" name="bpmod-action"
							   value="bulk_contents"/>
						<?php wp_nonce_field('bulk_contents'); ?>
						<input type="submit" name="doaction" id="doaction"
							   value="<?php esc_attr_e('Apply', 'bp-moderation'); ?>"
							   class="button-secondary apply"/>
					</div>
					<div class="tablenav-pages"><?php
						if ($page_links) {
							echo '<span class="displaying-num">' .
								sprintf(__('Displaying %s&#8211;%s of %s', 'bp-moderation'),
									number_format_i18n($page_index * $per_page + 1),
									number_format_i18n(min(($page_index + 1) * $per_page, $total)),
									'<span class="total-type-count">' . number_format_i18n($total) . '</span>')
								. "</span>$page_links";
						}
						?></div>
				</div>
				<div class="clear"></div>
				<table id="bpmod-contents-table" class="widefat bpmod-table fixed"
					   cellspacing="0">
					<thead>
					<tr>
						<th class="manage-column column-cb check-column"
							scope="col"><input type="checkbox"></th>
						<th class="manage-column column-author"
							scope="col"><?php _e('Author', 'bp-moderation') ?></th>
						<th class="manage-column column-content"
							scope="col"><?php _e('Content', 'bp-moderation') ?></th>
						<th class="manage-column column-flags"
							scope="col"><?php _e('Flags', 'bp-moderation') ?></th>
					</tr>
					</thead>
					<tfoot>
					<tr>
						<th class="manage-column column-cb check-column"
							scope="col"><input type="checkbox"></th>
						<th class="manage-column column-author"
							scope="col"><?php _e('Author', 'bp-moderation') ?></th>
						<th class="manage-column column-content"
							scope="col"><?php _e('Content', 'bp-moderation') ?></th>
						<th class="manage-column column-flags"
							scope="col"><?php _e('Flags', 'bp-moderation') ?></th>
					</tr>
					</tfoot>

					<tbody>
					<?php
					foreach ($results as $content) :
						$ctype = isset($this->content_types[$content->item_type])
							? $this->content_types[$content->item_type] : false;

						$content = apply_filters("bp_moderation_filter_content_backend_for_$content->item_type", $content);
						$author = $this->author_details($content->item_author, $content);
						$reporters = join(', ', array_map(array(&$this, 'show_in_users_table_link'), explode(',', $content->reporters)));
						?>
						<tr class="status-<?php echo $content->status ?>">
							<th class="check-column"
								scope="row"><input
									type="checkbox"
									value="<?php echo $content->content_id ?>"
									name="bulk_items[]"></th>
							<td class="column-author">
								<strong><?php echo $author['avatar_img'] . $author['user_link'] ?></strong>
								<br><?php echo $author['contact_link'] ?>
								<div class="row-actions">
									<?php        if ($content->item_author && get_userdata($content->item_author)):
										if (bp_is_user_spammer($content->item_author)): ?>
											<a class="unmark-spammer vim-u"
											   href="<?php echo wp_nonce_url("admin.php?bpmod-action=mark_unmark_spammer&user_id=$content->item_author&set_spam=0", 'mark_unmark_spammer') ?>"
											   title="<?php _e('Mark the author of this content as not spammer', 'bp-moderation') ?>"><?php _e('Mark as not spammer', 'bp-moderation') ?></a>
										<?php else : ?>
											<a class="mark-spammer vim-s"
											   href="<?php echo wp_nonce_url("admin.php?bpmod-action=mark_unmark_spammer&user_id=$content->item_author&set_spam=1", 'mark_unmark_spammer') ?>"
											   title="<?php _e('Mark the author of this content as spammer', 'bp-moderation') ?>"><?php _e('Mark as spammer', 'bp-moderation') ?></a>
										<?php            endif; elseif ($content->item_author): ?>
										<span
											class="not-a-member"><?php _e('Unregistered', 'bp-moderation') ?></span>
									<?php else: ?>
										<span
											class="not-a-member"><?php _e('Not a member', 'bp-moderation') ?></span>
									<?php        endif; ?>
								</div>
							</td>
							<td class="column-content">
								<strong><?php _e('Status:', 'bp-moderation') ?></strong> <?php echo $this->content_stati[$content->status]
								?>
								<strong><?php _e('Type:', 'bp-moderation') ?></strong> <?php echo $ctype
									? $ctype->label
									: $content->item_type . ' (' . __('not found', 'bp-moderation') . ')';
								?>
								<strong><?php _e('Item ID:', 'bp-moderation') ?></strong> <?php echo $content->item_id . ($content->item_id2
										? ' - ' . $content->item_id2
										: '')
								?>
								<strong><?php _e('Date:', 'bp-moderation') ?></strong> <?php echo $this->date_abbr($content->item_date) ?>

								<div class="row-actions">
									<a class="view-content vim-v"
									   href="<?php echo $content->item_url ?>"
									   title="<?php _e('View this content', 'bp-moderation') ?>"><?php _e('View', 'bp-moderation') ?></a>
									<?php if ('ignored' != $content->status): ?>
										| <a
											class="ignore-content vim-a"
											href="<?php echo wp_nonce_url("admin.php?bpmod-action=ignore&cont_id=$content->content_id", 'ignore') ?>"
											title="<?php _e('Mark this content as clean', 'bp-moderation') ?>"><?php _e('Ignore', 'bp-moderation') ?></a>
									<?php            endif;
									if ($ctype && $ctype->callbacks['edit'] && 'deleted' != $content->status): ?>
										| <a
											class="edit-content vim-e"
											href="<?php echo wp_nonce_url("admin.php?bpmod-action=edit&cont_id=$content->content_id", 'edit') ?>"
											title="<?php _e('Link to the edit page for this content', 'bp-moderation') ?>"><?php _e('Edit', 'bp-moderation') ?></a>
									<?php            endif;
									if ('deleted' != $content->status && 'moderated' != $content->status): ?>
										| <a
											class="mark-moderated vim-m"
											href="<?php echo wp_nonce_url("admin.php?bpmod-action=mark_moderated&cont_id=$content->content_id", 'mark_moderated') ?>"
											title="<?php _e('Manually mark this content as moderated if it has already been edited/deleted without this plugin', 'bp-moderation') ?>"><?php _e('Mark as moderated', 'bp-moderation') ?></a>
									<?php            endif;
									if ($ctype && $ctype->callbacks['delete'] && 'deleted' != $content->status): ?>
										| <a
											class="delete-content vim-d"
											href="<?php echo wp_nonce_url("admin.php?bpmod-action=delete&cont_id=$content->content_id", 'delete') ?>"
											title="<?php _e('Delete this content', 'bp-moderation') ?>"><?php _e('Delete', 'bp-moderation') ?></a>
									<?php endif; ?>
								</div>
							</td>
							<td class="column-flags">
								<strong><?php _e('Flags:', 'bp-moderation') ?></strong>  <?php echo $content->flags
								?>
								<strong><?php _e('First:', 'bp-moderation') ?></strong>  <?php echo $this->date_abbr($content->first_flag)
								?>
								<strong><?php _e('Last:', 'bp-moderation') ?></strong>  <?php echo $this->date_abbr($content->last_flag) ?>

								<br/><strong><?php _e('Reporters:', 'bp-moderation') ?></strong> <?php echo $reporters ?>

							</td>
						</tr>
					<?php
					endforeach;
					?>
					</tbody>
				</table>
			</form>

			<?php $this->print_hotkeys_toggle(); ?>

		<?php

		} else {
			_e('No content to display, try a different search', 'bp-moderation');
		}
	}

	/**
	 * build html tags of contents author details (avatar, webpage, contact)
	 *
	 * @param int $uid user id if known or 0
	 * @param stdClass $content if in content view the current content is passed
	 * @return array avatar_img, user_link, contact_link: <img>avatar, <a>webpage, <a>contact
	 */
	function author_details($uid, $content = false)
	{
		if ($uid && $user = get_userdata($uid)) { //id refers to an existing user
			$details = array(
				'avatar_img' => '<a href="' . bp_core_get_user_domain($uid) . '" >' . bp_core_fetch_avatar(array('item_id' => $uid, 'width' => 32, 'height' => 32)) . '</a>',
				'user_link' => $content ? $this->show_in_users_table_link($uid)
					: bp_core_get_userlink($uid),
				'contact_link' => bp_is_active('messages') ?
					'<a class="vim-c" href="' . bp_loggedin_user_domain() . $GLOBALS['bp']->messages->slug . '/compose/?r=' . bp_core_get_username($uid) . '" title="' . __('Send a private message to the author of this content', 'bp-moderation') . '">' . __('Send PM', 'bp-moderation') . '</a>'
					: "<a class='vim-c' href='mailto:$user->user_email' title='" . __('Send an email to the author of this content', 'bp-moderation') . "' >" . __('Send email', 'bp-moderation') . "</a>"
			);
		} elseif ($uid) { // the user has probably already been deleted
			$details = array(
				'avatar_img' => get_avatar('', 32, 'mystery'),
				'user_link' => $content ? $this->show_in_users_table_link($uid)
					: sprintf(__('User #%d', 'bp-moderation'), $uid),
				'contact_link' => ''
			);
		} else {
			$details = array(
				'avatar_img' => '',
				'user_link' => '',
				'contact_link' => ''
			);
			// if some content types have non members authors they can add missing details hooking to this filter (e.g. blog comments)
			$details = apply_filters("bp_moderation_author_details_for_$content->item_type", $details, $content);
		}

		return $details;
	}

	/**
	 * generate the links to see info about an user in the user view
	 *
	 * @param int $uid user id
	 * @return string <a> tag with webpage
	 */
	function show_in_users_table_link($uid)
	{
		$username = bp_core_get_user_displayname($uid);
		$title = $username
			? __('See more details on this user in the users table', 'bp-moderation')
			: __('This user is not registered anymore, but you can still see some details on it in the users table', 'bp-moderation');
		if (!$username) {
			$username = sprintf(__('User #%d', 'bp-moderation'), $uid);
		}
		return "<a href='admin.php?page=bp-moderation&amp;view=users&amp;filters[active_filters][user]=on&amp;filters[user]=$uid' title='$title'>$username</a>";

	}

	/**
	 * format a mysql date in an <abbr> tag
	 *
	 * follow blog option for date format but has complete date and time in tooltip
	 *
	 * @param string $date mysql date
	 * @return string <abbr> tag with the date
	 */
	function date_abbr($date)
	{
		return '<abbr title="' . mysql2date('Y-m-d\TH:i:sO', $date) . '">' . mysql2date(get_option('date_format'), $date) . '</abbr>';
	}

	/**
	 * print the hotkeys enable/disable link
	 */
	function print_hotkeys_toggle()
	{
		if (get_user_option('bp_moderation_hotkeys')) {
			$text = sprintf(__('Hotkeys are enabled. <a href="%s">Disable</a>'), wp_nonce_url('admin.php?bpmod-action=hotkeys&set_hotkeys=0', 'hotkeys'));
		} else {
			$text = sprintf(__('Hotkeys are disabled. <a href="%s">Enable</a>'), wp_nonce_url('admin.php?bpmod-action=hotkeys&set_hotkeys=1', 'hotkeys'));
		}
		echo "<p id='hotkeys-toggle'>$text</p>";
	}

	/**
	 * Query the contents for the contents page based on get vars
	 *
	 * TODO: reformat in more functions (parse get vars, do the query)
	 *
	 * @return array total,results
	 */
	function query_contents()
	{
		global $wpdb;

		$where = 'WHERE 1';
		$having = '';

		//filters
		$can_filter = array('item_type', 'status', 'item_author', 'reporters', 'flags');
		if (isset($_GET['filters']['active_filters']) && is_array($_GET['filters']['active_filters'])) {
			$filters = array_intersect(array_keys($_GET['filters']['active_filters']), $can_filter);
			foreach ($filters as $f) {
				if (empty($_GET['filters'][$f])) {
					continue;
				} else {
					$val = $_GET['filters'][$f];
				}

				switch ($f) {
					case 'item_type':
					case 'status':
						if (!is_array($val)) {
							continue;
						}
						$values = array_keys($val);
						array_walk($values, array(&$wpdb, 'escape_by_ref'));
						$where .= " AND $f IN ('" . join("','", $values) . "')";
						break;
					case 'item_author':
						$authors = join(',', array_filter(array_map('intval', explode(',', $val))));
						if ($authors) {
							$where .= " AND item_author IN (" . $authors . ")";
						}
						break;
					case 'reporters':
						// TODO: check efficienty of this
						$reporters = join(',', array_filter(array_map('intval', explode(',', $val))));
						if ($reporters) {
							$where .= " AND content_id IN (SELECT content_id FROM {$this->flags_table} WHERE reporter_id IN (" . $reporters . ") )";
						}
						break;
					case 'flags':
						$having .= " AND COUNT(*) >= " . (int)$val;
						break;
					default:
						continue;
				}
			}
		}

		//order
		$can_order = array('item_id', 'item_id2', 'flags', 'first_flag', 'last_flag');
		$orders = array();
		if (isset($_GET['order']) && is_array($_GET['order'])) {
			foreach ($_GET['order'] as $o) {
				if (!isset($o['by']) || !in_array($o['by'], $can_order)
					|| !isset($o['dir'])
					|| ('ASC' != $o['dir'] && 'DESC' != $o['dir'])
				) {
					continue;
				}
				$orders[] = $o['by'] . ' ' . $o['dir'];
			}
		}
		if (count($orders)) {
			$order = 'ORDER BY ' . join(', ', $orders);
		} else {
			$order = 'ORDER BY last_flag DESC';
		}

		//limits
		$per_page = (isset($_GET['per_page']) && intval($_GET['per_page']))
			? intval($_GET['per_page']) : 20;
		$page_index = (isset($_GET['cpage']) && intval($_GET['cpage']))
			? intval($_GET['cpage']) - 1 : 0;
		$limits = 'LIMIT ' . ($page_index * $per_page) . ', ' . $per_page;

		$from = "FROM {$this->contents_table} c NATURAL JOIN {$this->flags_table} f";
		$groupby = 'GROUP BY content_id';

		if ($having) {
			$having = 'HAVING 1' . $having;
			$sql = "SELECT content_id $from $where $groupby $having";
			$total = count($wpdb->get_results($sql));
		} else {
			$sql = "SELECT COUNT(*) FROM {$this->contents_table} c $where";
			$total = (int)$wpdb->get_var($sql);
		}

		if ($total) {
			$sql = "SELECT content_id, c.*, COUNT(*) as flags, GROUP_CONCAT(CAST( f.reporter_id AS CHAR )) as reporters, MIN(f.date) as first_flag, MAX(f.date) as last_flag $from $where $groupby $having $order $limits";
			$results = $wpdb->get_results($sql);
		} else {
			$results = array();
		}

		return array('results' => $results, 'total' => $total, 'per_page' => $per_page, 'page_index' => $page_index);
	}

	/**
	 * print users view (custom query + contents table)
	 */
	function view_users()
	{
		global $bp;

		$chk = ' checked="checked"';
		$sel = ' selected="selected"';
		?>
		<form id="bpmod-users-query" class="bpmod-form-query" action="admin.php"
			  method="get">
			<input type="hidden" name="page" value="bp-moderation"/>
			<input type="hidden" name="view" value="users"/>
			<fieldset>
				<legend><?php _e('Custom Query', 'bp-moderation') ?></legend>
				<div class="column">
					<h4><?php _e('Filters', 'bp-moderation') ?></h4>
					<dt>
						<input
							id='filter-user' <?php echo isset($_GET['active_filters']['user'])
							? $chk : ''
						?> name='active_filters[user]' type='checkbox'/>
						<label
							for='filter-user'><?php _e('Specific users', 'bp-moderation') ?></label>
					</dt>
					<dd>
						<input id='user' class='line' size='40' type='text'
							   name='filters[user]' value='<?php
						echo empty($_GET['filters']['user']) ? ''
							: $_GET['filters']['user'] ?>'/>
						<label
							for='user'><?php _e('User ids (comma separeted)', 'bp-moderation') ?></label>
					</dd>
					<?php
					$filters = array(
						array(
							'own_flags',
							__('Total flags on own contents', 'bp-moderation'),
							__('Own contents have been flagged for a total of at least %s flags', 'bp-moderation')
						),
						array(
							'own_contents',
							__('Total own contents reported', 'bp-moderation'),
							__('Own contents have been reported at least %s times', 'bp-moderation')
						),
						array(
							'own_ignored',
							__('Ignored own contents', 'bp-moderation'),
							__('Own contents have been ignored at least %s times', 'bp-moderation')
						),
						array(
							'own_moderated',
							__('Moderated own contents', 'bp-moderation'),
							__('Own contents have been moderated at least %s times', 'bp-moderation')
						),
						array(
							'others_contents',
							__('Total contents reported by user', 'bp-moderation'),
							__('User has been reported at least %s contents', 'bp-moderation')
						),
						array(
							'others_ignored',
							__('Ignored contents reported by user', 'bp-moderation'),
							__('Contents reported by user have been ignored at least %s times', 'bp-moderation')
						),
						array(
							'others_moderated',
							__('Moderated contents reported by user', 'bp-moderation'),
							__('Contents reported by user have been moderated at least %s times', 'bp-moderation')
						)
					);
					foreach ($filters as $filter):
						list($slug, $title, $desc) = $filter;
						?>
						<dt>
							<input
								id='filter-<?php echo $slug ?>' <?php echo checked('on', @$_GET['active_filters'][$slug])
							?> name='active_filters[<?php echo $slug ?>]'
								type='checkbox'/>
							<label
								for='filter-<?php echo $slug ?>'><?php echo $title ?></label>
						</dt>
						<dd>
							<label
								for='<?php echo $slug ?>'><?php echo sprintf($desc,
									"<input id='$slug' size='4' type='text' name='filters[$slug]' value='" . ((int)@$_GET['filters'][$slug]) . "' />"
								); ?></label>
						</dd>

					<?php endforeach; ?>
				</div>
				<div class="column">
					<h4 class="order-by"><?php _e('Order', 'bp-moderation') ?></h4>
					<ol class="order-by">
						<?php            $i = 0;
						while (0 == $i || !empty($_GET['order'][$i])) :
							?>
							<li><?php _e('Order by', 'bp-moderation');
								$orby = empty($_GET['order'][$i]['by']) ? 'none'
									: $_GET['order'][$i]['by'];
								$asc = 'DESC' == @$_GET['order'][$i]['dir'] ? 'DESC'
										: 'ASC'; ?>

								<select name="order[<?php echo $i ?>][by]">
									<option<?php selected('none', $orby) ?>
										value="none"><?php _e('none', 'bp-moderation') ?></option>
									<option<?php selected('own_contents', $orby) ?>
										value="own_contents"><?php _e('total own contents reported', 'bp-moderation') ?></option>
									<option<?php selected('own_new', $orby) ?>
										value="own_new"><?php _e('pending own contents') ?></option>
									<option<?php selected('own_ignored', $orby) ?>
										value="own_ignored"><?php _e('ignored own contents') ?></option>
									<option<?php selected('own_moderated', $orby) ?>
										value="own_moderated"><?php _e('moderated own contents') ?></option>
									<option<?php selected('own_flags', $orby) ?>
										value="own_flags"><?php _e('total flags on own contents') ?></option>
									<option<?php selected('others_contents', $orby) ?>
										value="others_contents"><?php _e('total contents reported by user', 'bp-moderation') ?></option>
									<option<?php selected('others_new', $orby) ?>
										value="others_new"><?php _e('pending contents reported by user', 'bp-moderation') ?></option>
									<option<?php selected('others_ignored', $orby) ?>
										value="others_ignored"><?php _e('ignored contents reported by user', 'bp-moderation') ?></option>
									<option<?php selected('others_moderated', $orby) ?>
										value="others_moderated"><?php _e('moderated contents reported by user', 'bp-moderation') ?></option>
								</select>
								<select name="order[<?php echo $i ?>][dir]">
									<option<?php selected('ASC', $asc) ?>
										value="ASC">ASC
									</option>
									<option<?php selected('DESC', $asc) ?>
										value="DESC">DESC
									</option>
								</select>
							</li>
							<?php            $i++;
						endwhile;
						?>
					</ol>
					<h4><?php _e('Limit', 'bp-moderation') ?></h4>

					<p><label for='limit'><?php
							$input = "<input id='limit' size='4' type='text' name='per_page' value='" . (empty($_GET['per_page'])
									? '20' : $_GET['per_page']) . "' />";
							echo sprintf(__('Display at most %s users', 'bp-moderation'), $input); ?></label>
					</p>
					<input name="submit" type="submit" class="button-primary"
						   value="<?php _e('Query Users', 'bp-moderation'); ?>"/>
				</div>
			</fieldset>
		</form>
		<div class="clear"></div>
		<?php
		extract($this->query_users());

		if ($total) {
			$page_links = paginate_links(array(
				'base' => add_query_arg('page', '%#%'),
				'format' => '',
				'prev_text' => __('&laquo;'),
				'next_text' => __('&raquo;'),
				'total' => ceil($total / $per_page),
				'current' => $page_index + 1
			));

			?>
			<form id="bpmod-users-form" class="bpmod-bulk-form" action="admin.php"
				  method="post">
				<div class="tablenav">
					<div class="alignleft actions">
						<select name="bulk-action">
							<option value="-1"
									selected="selected"><?php _e('Bulk Actions', 'bp-moderation') ?></option>
							<option
								value="mark_spammer"><?php _e('Mark users as spammers', 'bp-moderation'); ?></option>
							<option
								value="unmark_spammer"><?php _e('Mark users as not spammers', 'bp-moderation'); ?></option>
						</select>
						<input type="hidden" name="bpmod-action"
							   value="bulk_users"/>
						<?php wp_nonce_field('bulk_users'); ?>
						<input type="submit" name="doaction" id="doaction"
							   value="<?php esc_attr_e('Apply', 'bp-moderation'); ?>"
							   class="button-secondary apply"/>
					</div>
					<div class="tablenav-pages"><?php
						if ($page_links) {
							echo '<span class="displaying-num">' .
								sprintf(__('Displaying %s&#8211;%s of %s', 'bp-moderation'),
									number_format_i18n($page_index * $per_page + 1),
									number_format_i18n(min(($page_index + 1) * $per_page, $total)),
									'<span class="total-type-count">' . number_format_i18n($total) . '</span>')
								. "</span>$page_links";
						}
						?></div>
				</div>
				<div class="clear"></div>
				<table id="bpmod-users-table" class="widefat bpmod-table fixed"
					   cellspacing="0">
					<thead>
					<tr>
						<th class="manage-column column-cb check-column"
							scope="col"><input type="checkbox"></th>
						<th class="manage-column column-author"
							scope="col"><?php _e('User', 'bp-moderation') ?></th>
						<th class="manage-column column-own-contents"
							scope="col"><?php _e('Own contents reported by others', 'bp-moderation') ?></th>
						<th class="manage-column column-other-contents"
							scope="col"><?php _e('Contents reported by user', 'bp-moderation') ?></th>
					</tr>
					</thead>
					<tfoot>
					<tr>
						<th class="manage-column column-cb check-column"
							scope="col"><input type="checkbox"></th>
						<th class="manage-column column-author"
							scope="col"><?php _e('User', 'bp-moderation') ?></th>
						<th class="manage-column column-own-contents"
							scope="col"><?php _e('Own contents reported by others', 'bp-moderation') ?></th>
						<th class="manage-column column-other-contents"
							scope="col"><?php _e('Contents reported by user', 'bp-moderation') ?></th>
					</tr>
					</tfoot>

					<tbody>
					<?php
					foreach ($results as $user) :
						$author = $this->author_details($user->user_id);
						?>
						<tr class="">
							<th class="check-column"
								scope="row"><input
									type="checkbox"
									value="<?php echo $user->user_id ?>"
									name="bulk_items[]"></th>
							<td class="column-author">
								<strong><?php echo $author['avatar_img'] . $author['user_link'] ?></strong>
								<br><?php echo $author['contact_link'] ?>
								<div class="row-actions">
									<?php if (!get_userdata($user->user_id)): ?>
										<span
											class="not-a-member"><?php _e('Unregistered', 'bp-moderation') ?></span>
									<?php elseif (bp_is_user_spammer($user->user_id)): ?>
										<a class="unmark-spammer vim-u"
										   href="<?php echo wp_nonce_url("admin.php?bpmod-action=mark_unmark_spammer&user_id=$user->user_id&set_spam=0", 'mark_unmark_spammer') ?>"
										   title="<?php _e('Mark the author of this content as not spammer', 'bp-moderation') ?>"><?php _e('Mark as not spammer', 'bp-moderation') ?></a>
									<?php else : ?>
										<a class="mark-spammer vim-s"
										   href="<?php echo wp_nonce_url("admin.php?bpmod-action=mark_unmark_spammer&user_id=$user->user_id&set_spam=1", 'mark_unmark_spammer') ?>"
										   title="<?php _e('Mark the author of this content as spammer', 'bp-moderation') ?>"><?php _e('Mark as spammer', 'bp-moderation') ?></a>
									<?php        endif; ?>
								</div>
							</td>
							<td class="column-own-contents">
								<?php echo sprintf(_n('%d content from this user has been reported', '%d contents from this user have been reported', $user->own_contents, 'bp-moderation'), $user->own_contents);
								if ($user->own_contents):?>

									<br/>
									<strong><?php _e('New:', 'bp-moderation') ?></strong> <?php echo $user->own_new;
									?>
									<strong><?php _e('Ignored:', 'bp-moderation') ?></strong> <?php echo $user->own_ignored
									?>
									<strong><?php _e('Moderated:', 'bp-moderation') ?></strong> <?php echo $user->own_moderated
									?>
									<strong><?php _e('Total flags:', 'bp-moderation') ?></strong> <?php echo $user->own_flags;
								endif; ?>
								<div class="row-actions">
									<a class="vim-b"
									   href="admin.php?page=bp-moderation&amp;view=contents&amp;filters[active_filters][item_author]=on&amp;filters[item_author]=<?php echo $user->user_id ?>"
									   title="<?php _e('Show the contents from this user that have been reported in the contents view', 'bp-moderation') ?>"><?php _e('Show in contents view', 'bp-moderation') ?></a>
								</div>

							</td>
							<td class="column-other-contents">
								<?php echo sprintf(_n('this user reported %d content', 'this user reported %d contents', $user->others_contents, 'bp-moderation'), $user->others_contents);
								if ($user->others_contents):?>

									<br/>
									<strong><?php _e('New:', 'bp-moderation') ?></strong> <?php echo $user->others_new;
									?>
									<strong><?php _e('Ignored:', 'bp-moderation') ?></strong> <?php echo $user->others_ignored
									?>
									<strong><?php _e('Moderated:', 'bp-moderation') ?></strong> <?php echo $user->others_moderated;
								endif; ?>
								<div class="row-actions">
									<a class="vim-g"
									   href="admin.php?page=bp-moderation&amp;view=contents&amp;filters[active_filters][reporters]=on&amp;filters[reporters]=<?php echo $user->user_id ?>"
									   title="<?php _e('Show the contents from this user that have been reported in the contents view', 'bp-moderation') ?>"><?php _e('Show in contents view', 'bp-moderation') ?></a>
								</div>

							</td>
						</tr>
					<?php
					endforeach;
					?>
					</tbody>
				</table>
			</form>

			<?php $this->print_hotkeys_toggle(); ?>

		<?php

		} else {
			_e('No users to display, try a different search', 'bp-moderation');
		}
	}

	/**
	 * Query the users for the users table based on get vars
	 *
	 * TODO: reformat in more functions (parse get vars, do the query)
	 *
	 * @return array total,results
	 */
	function query_users()
	{
		global $wpdb;

		$own_where = '';
		$others_where = '';
		$own_having = '';
		$others_having = '';

		//filters
		$can_filter = array('user', 'own_contents', 'own_ignored', 'own_moderated', 'own_flags', 'others_contents', 'others_ignored', 'others_moderated');
		if (isset($_GET['active_filters']) && is_array($_GET['active_filters'])) {
			$filters = array_intersect(array_keys($_GET['active_filters']), $can_filter);
			foreach ($filters as $f) {
				if (empty($_GET['filters'][$f])) {
					continue;
				} else {
					$val = $_GET['filters'][$f];
				}

				switch ($f) {
					case 'user':
						$users = join(',', array_filter(array_map('intval', explode(',', $val))));
						if ($users) {
							$own_where = " AND item_author IN ($users)";
							$others_where = " AND reporter_id IN ($users)";
						}
						break;
					case 'own_flags':
						if ($val = (int)$val) {
							$own_having = " AND COUNT(*) >= $val";
						}
						break;
					case 'own_contents':
						if ($val = (int)$val) {
							$own_having = " AND COUNT(DISTINCT content_id) >= $val";
						}
						break;
					case 'own_ignored':
						if ($val = (int)$val) {
							$own_having = " AND COUNT(DISTINCT content_id, IF(c.status='ignored',1,NULL)) >= $val";
						}
						break;
					case 'own_moderated':
						if ($val = (int)$val) {
							$own_having = " AND COUNT(DISTINCT content_id, IF(c.status IN('edited','deleted','moderated'),1,NULL)) >= $val";
						}
						break;
					case 'others_contents':
						if ($val = (int)$val) {
							$others_having = " AND COUNT(DISTINCT content_id) >= $val";
						}
						break;
					case 'others_ignored':
						if ($val = (int)$val) {
							$others_having = " AND COUNT(DISTINCT content_id, IF(c.status='ignored',1,NULL)) >= $val";
						}
						break;
					case 'others_moderated':
						if ($val = (int)$val) {
							$others_having = " AND COUNT(DISTINCT content_id, IF(c.status IN('edited','deleted','moderated'),1,NULL)) >= $val";
						}
						break;
					default:
						continue;
				}
			}
		}

		//order
		$can_order = array('own_contents', 'own_new', 'own_ignored', 'own_moderated', 'own_flags', 'others_contents', 'others_new', 'others_ignored', 'others_moderated');
		$orders = array();
		if (isset($_GET['order']) && is_array($_GET['order'])) {
			foreach ($_GET['order'] as $o) {
				if (!isset($o['by']) || !in_array($o['by'], $can_order)
					|| !isset($o['dir'])
					|| ('ASC' != $o['dir'] && 'DESC' != $o['dir'])
				) {
					continue;
				}
				$orders[] = $o['by'] . ' ' . $o['dir'];
			}
		}
		if (count($orders)) {
			$order = 'ORDER BY ' . join(', ', $orders);
		} else {
			$order = '';
		}

		//limits
		$per_page = (isset($_GET['per_page']) && intval($_GET['per_page']))
			? intval($_GET['per_page']) : 20;
		$page_index = (isset($_GET['page']) && intval($_GET['page']))
			? intval($_GET['page']) - 1 : 0;
		$limits = 'LIMIT ' . ($page_index * $per_page) . ', ' . $per_page;

		$from = "FROM {$this->contents_table} c NATURAL JOIN {$this->flags_table} f";

		$own_sql = "SELECT item_author as user_id $from WHERE item_author >0 $own_where GROUP BY item_author";
		$others_sql = "SELECT reporter_id as user_id $from WHERE reporter_id >0 $others_where GROUP BY reporter_id";

		if ($own_having && $others_having) {
			//there are conditions on both sides, so no outer join is needed
			$sql = <<< SQL
SELECT * FROM (
	$own_sql HAVING 1 $own_having
) own NATURAL JOIN (
	$others_sql HAVING 1 $others_having
) others
SQL;
		} elseif ($own_having) {
			//there are conditions on own contents side, so outer join is needed on that table
			$sql = <<< SQL
SELECT * FROM (
	$own_sql HAVING 1 $own_having
) own NATURAL LEFT JOIN (
	$others_sql
) others
SQL;
		} elseif ($others_having) {
			//there are conditions on others contents side, so outer join is needed on that table
			$sql = <<< SQL
SELECT * FROM (
	$others_sql HAVING 1 $others_having
) others NATURAL LEFT JOIN (
	$own_sql
) own
SQL;
		} else {
			//there no conditions on any side, so a full outer join is needed but sadly not supported by mysql, using UNION workaround
			$sql = <<< SQL
(
	SELECT * FROM (
		$own_sql
	) own NATURAL LEFT JOIN (
		$others_sql
	) others
) UNION ALL (
	SELECT * FROM (
		$others_sql
	) others NATURAL LEFT JOIN (
		$own_sql
	) own WHERE own.user_id IS NULL
)
SQL;
		}
		$total = count($wpdb->get_results($sql));

		if (!$total) {
			return array('results' => array(), 'total' => 0, 'per_page' => $per_page, 'page_index' => $page_index);
		}


		$own_sql = <<< SQL
SELECT
	item_author as user_id,
	COUNT(DISTINCT content_id) as own_contents,
	COUNT(DISTINCT content_id, IF(c.status='new',1,NULL)) as own_new,
	COUNT(DISTINCT content_id, IF(c.status='ignored',1,NULL)) as own_ignored,
	COUNT(DISTINCT content_id, IF(c.status IN('edited','deleted','moderated'),1,NULL)) as own_moderated,
	COUNT(*) as own_flags
$from
WHERE
	item_author >0
	$own_where
GROUP BY
	item_author
SQL;
		$others_sql = <<< SQL
SELECT
	reporter_id as user_id,
	COUNT(DISTINCT content_id) as others_contents,
	COUNT(DISTINCT content_id, IF(c.status='new',1,NULL)) as others_new,
	COUNT(DISTINCT content_id, IF(c.status='ignored',1,NULL)) as others_ignored,
	COUNT(DISTINCT content_id, IF(c.status IN('edited','deleted','moderated'),1,NULL)) as others_moderated
$from
WHERE
	reporter_id >0
	$others_where
GROUP BY
	reporter_id
SQL;

		if ($own_having && $others_having) {
			//there are conditions on both sides, so no outer join is needed
			$sql = <<< SQL
SELECT * FROM (
	$own_sql HAVING 1 $own_having
) own NATURAL JOIN (
	$others_sql HAVING 1 $others_having
) others $order $limits
SQL;
		} elseif ($own_having) {
			//there are conditions on own contents side, so outer join is needed on that table
			$sql = <<< SQL
SELECT * FROM (
	$own_sql HAVING 1 $own_having
) own NATURAL LEFT JOIN (
	$others_sql
) others $order $limits
SQL;
		} elseif ($others_having) {
			//there are conditions on others contents side, so outer join is needed on that table
			$sql = <<< SQL
SELECT * FROM (
	$others_sql HAVING 1 $others_having
) others NATURAL LEFT JOIN (
	$own_sql
) own $order $limits
SQL;
		} else {
			//there no conditions on any side, so a full outer join is needed but sadly not supported by mysql, using UNION workaround

			// all_fields is needed so both united select give same columns in same order
			$all_fields = 'user_id,own_contents,own_new,own_ignored,own_moderated,own_flags,others_contents,others_new,others_ignored,others_moderated';
			$sql = <<< SQL
(
	SELECT $all_fields FROM (
		$own_sql
	) own NATURAL LEFT JOIN (
		$others_sql
	) others
) UNION ALL (
	SELECT $all_fields FROM (
		$others_sql
	) others NATURAL LEFT JOIN (
		$own_sql
	) own WHERE own.user_id IS NULL
) $order $limits
SQL;
		}
		$results = $wpdb->get_results($sql);

		return array('results' => $results, 'total' => $total, 'per_page' => $per_page, 'page_index' => $page_index);
	}

	/**
	 * register plugin settings option with WP settings API
	 */
	function register_settings()
	{
		register_setting('bpmod_options', 'bp_moderation_options');

	}

	/**
	 * register settings and display them
	 */
	function view_settings()
	{

		if (!empty($_POST['bp_moderation_options']) && is_array($_POST['bp_moderation_options'])) {
			check_admin_referer('bpmod_options');

			$options = stripslashes_deep($_POST['bp_moderation_options']);

			$options['unflagged_text'] = wp_kses($options['unflagged_text'], array());
			$options['flagged_text'] = wp_kses($options['flagged_text'], array());

			$options['warning_threshold'] = (int)$options['warning_threshold'];
			$options['warning_forward'] = join(',', array_filter(explode(',', $options['warning_forward']), 'is_email'));
			$options['warning_message'] = wp_kses($options['warning_message'], array());

			if ($options != $this->options) {
				update_site_option('bp_moderation_options', $options);
				$this->options = $options;

				echo '<div class="updated settings-error"><p><strong>' . __('Settings saved.', 'bp-moderation') . '</strong></p></div>';
			}
		}

		//debugging secret, add 'dump' in get vars for dumping settings
		if (isset($_GET['dump'])) {
			echo '<pre>';
			var_dump($this->options);
			echo '</pre>';
		}

		$this->add_settings_section('general', __('General Settings', 'bp-moderation'));
		$this->add_settings_field('unflagged_text', __('Link text when unflagged', 'bp-moderation'), 'general', 'text');
		$this->add_settings_field('flagged_text', __('Link text when flagged', 'bp-moderation'), 'general', 'text');
		//$this->add_settings_field('permit_unflag', __( 'Permit Unflagging', 'bp-moderation' ),'general', 'checkbox');
		//$this->add_settings_field('permit_anonym', __( 'Permit Flagging by Anonymous', 'bp-moderation' ),'general', 'checkbox');
		if ('localhost' == $_SERVER['HTTP_HOST']) {
			$this->add_settings_field('generate_test_data', __('Generate test data', 'bp-moderation'), 'general', 'checkbox',
				array('description' => ' <strong>' . __('NOTE: will destroy all users except #1 — USE ONLY ON WORTHLESS TEST INSTALLS', 'bp-moderation') . '</strong>'));
		}

		$this->add_settings_section('content_types', __('Content Types', 'bp-moderation'),
			__('Choose which content types can be flagged by site members.', 'bp-moderation') . '<br/>' .
			__('Note: if you deactivate one that was previously active you will still see previously flagged contents of that type in the backend tables.', 'bp-moderation')
		);
		foreach ($this->content_types as $slug => $ct) {
			$this->add_settings_field($slug, $ct->label, 'content_types', 'checkbox_content_type');
		}

		$this->add_settings_section('automation', __('Automatic Moderation', 'bp-moderation'), __('Automatic warnings and deletion.', 'bp-moderation'));
		$this->add_settings_field('warning_threshold', __('Automatic warning', 'bp-moderation'), 'automation', 'text',
			array('size' => 3, 'sprintf' => __('When a content is flagged %s times send a warning message to the author (0 = disabled).', 'bp-moderation')));
		$this->add_settings_field('warning_forward', __('Forward warning', 'bp-moderation'), 'automation', 'text',
			array('size' => 60, 'sprintf' => __('Forward the warning also to these addresses (comma separated) <br/>%s', 'bp-moderation')));
		$this->add_settings_field('warning_message', __('Warning message', 'bp-moderation'), 'automation', 'textarea', array('description' => __('
				<br/>placeholders:
				<br/>%AUTHORNAME% : content author username
				<br/>%CONTENTURL% : reported content url
				<br/>%SITENAME% : wordpress site name
				<br/>%SITEURL% : wordpress site url
			', 'bp-moderation')));

		$this->add_settings_section('uninstall', __('Uninstall', 'bp-moderation'), __('If you check the field below all plugin data will be erased on plugin deactivation.', 'bp-moderation'));
		$this->add_settings_field('clean_up', __('Clean Up on Deactivation', 'bp-moderation'), 'uninstall', 'checkbox');

		?>
		<form action="#" method="post">
			<?php wp_nonce_field('bpmod_options'); ?>
			<?php do_settings_sections(__FILE__); ?>
			<p class="submit">
				<input name="Submit" type="submit" class="button-primary"
					   value="<?php esc_attr_e('Save Changes'); ?>"/>
			</p>
		</form>
	<?php
	}

	var $settings_section_texts = array();

	/**
	 * custom wrap of wp setting api 'add_settings_section'
	 *
	 * @param string $slug
	 * @param string $title
	 * @param string $description
	 */
	function add_settings_section($slug, $title, $description = '')
	{
		$this->settings_section_texts[$slug] = $description
			? "<p>$description</p>" : $description;
		add_settings_section($slug, $title, array(&$this, 'print_settings_section_text'), __FILE__);
	}

	/**
	 * print a settings section description
	 *
	 * @param array $section
	 */
	function print_settings_section_text($section)
	{
		echo $this->settings_section_texts[$section['id']];
	}

	/**
	 * custom wrap of wp setting api 'add_settings_field'
	 *
	 * @param string $slug
	 * @param string $title
	 * @param string $parent
	 * @param string $type
	 * @param array $args
	 */
	function add_settings_field($slug, $title, $parent, $type, $args = array())
	{
		$args['id'] = $args['label_for'] = $slug;
		$args['input_type'] = $type;

		if (empty($args['name'])) {
			$args['name'] = $slug;
		}

		add_settings_field($slug, $title, array(&$this, 'print_settings_field'), __FILE__, $parent, $args);
	}

	/**
	 * print a settings section field
	 *
	 * @param array $args
	 */
	function print_settings_field($args)
	{
		extract($args);

		switch ($input_type) {
			case 'text':
				$size = isset($size) && (int)$size ? (int)$size : 40;
				$input = "<input id='$id' name='bp_moderation_options[$name]' size='$size' type='text' value='{$this->options[$name]}' />";
				break;

			case 'checkbox':
				$checked = checked('on', @$this->options[$name], false);
				$input = "<input id='$id' $checked name='bp_moderation_options[$name]' type='checkbox' />";
				break;

			case 'checkbox_content_type':
				$checked = checked('on', @$this->options['active_types'][$name], false);
				$input = "<input id='$id' $checked name='bp_moderation_options[active_types][$name]' type='checkbox' />";
				break;

			case 'textarea':
				$input = "<textarea id='$id' name='bp_moderation_options[$name]' rows='5' cols='60'>{$this->options[$name]}</textarea>";
				break;

			default:
				return;
		}


		if (!empty($sprintf)) {
			$input = sprintf($sprintf, $input);
		}

		if (!empty($description)) {
			$input .= "$description";
		}

		echo $input;
	}
}

/**
 * SQL notes
 * the users query is pretty complex, after trying different approaches I leaved the one that performed better
 * as I'll do other tests and tweaks on that part in the future I leave here other two approaches that give the same results
 *
SELECT user_id,
COUNT(DISTINCT c1.content_id) as own_contents,
COUNT(DISTINCT c1.content_id, IF(c1.status='new',1,NULL)) as own_new,
COUNT(DISTINCT c1.content_id, IF(c1.status='ignored',1,NULL)) as own_ignored,
COUNT(DISTINCT c1.content_id, IF(c1.status IN('edited','deleted','moderated'),1,NULL)) as own_moderated,
COUNT(DISTINCT f1.flag_id) as own_flags,
COUNT(DISTINCT c2.content_id) as others_contents,
COUNT(DISTINCT c2.content_id, IF(c2.status='new',1,NULL)) as others_new,
COUNT(DISTINCT c2.content_id, IF(c2.status='ignored',1,NULL)) as others_ignored,
COUNT(DISTINCT c2.content_id, IF(c2.status IN('edited','deleted','moderated'),1,NULL)) as others_moderated
FROM (
( SELECT DISTINCT item_author AS user_id FROM wp_bp_mod_contents WHERE item_author>0 )
UNION
( SELECT DISTINCT reporter_id AS user_id FROM wp_bp_mod_flags WHERE reporter_id>0 )
)user_ids
LEFT JOIN ( wp_bp_mod_contents c1 NATURAL JOIN wp_bp_mod_flags f1) ON(user_ids.user_id = c1.item_author)
LEFT JOIN ( wp_bp_mod_contents c2 NATURAL JOIN wp_bp_mod_flags f2) ON(user_ids.user_id = f2.reporter_id)
group by user_id
[ HAVING, ORDER, LIMIT ]

SELECT  user_id,
COUNT(DISTINCT c1.content_id) as own_contents,
COUNT(DISTINCT c1.content_id, IF(c1.status='new',1,NULL)) as own_new,
COUNT(DISTINCT c1.content_id, IF(c1.status='ignored',1,NULL)) as own_ignored,
COUNT(DISTINCT c1.content_id, IF(c1.status IN('edited','deleted','moderated'),1,NULL)) as own_moderated,
COUNT(DISTINCT f1.flag_id) as own_flags,
COUNT(DISTINCT c2.content_id) as others_contents,
COUNT(DISTINCT c2.content_id, IF(c2.status='new',1,NULL)) as others_new,
COUNT(DISTINCT c2.content_id, IF(c2.status='ignored',1,NULL)) as others_ignored,
COUNT(DISTINCT c2.content_id, IF(c2.status IN('edited','deleted','moderated'),1,NULL)) as others_moderated
FROM (
( SELECT DISTINCT item_author AS user_id FROM wp_bp_mod_contents WHERE item_author>0 )
UNION
( SELECT DISTINCT reporter_id AS user_id FROM wp_bp_mod_flags WHERE reporter_id>0 )
)user_ids
LEFT JOIN wp_bp_mod_contents c1 ON ( user_ids.user_id = c1.item_author )
LEFT JOIN wp_bp_mod_flags f1 ON ( c1.content_id = f1.content_id )
LEFT JOIN wp_bp_mod_flags f2 ON ( user_ids.user_id = f2.reporter_id )
LEFT JOIN wp_bp_mod_contents c2 ON ( f2.content_id = c2.content_id )
GROUP BY user_id
[ HAVING, ORDER, LIMIT ]
 *
 */

?>
