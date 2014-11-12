<?php
require_once($CFG->dirroot.'/theme/bootstrapbase/renderers/core_renderer.php');

class theme_xtec2_core_renderer extends theme_bootstrapbase_core_renderer {

    public function user_picture(stdClass $user, array $options = null) {
        $class = 'img-circle userpic';

        if (!is_array($options)) {
            $options = array();
        }

        if (isset($options['class'])) $class .= ' '.$options['class'];

        $options['class'] = $class;
        return parent::user_picture($user, $options);
    }

	/**
     * Return the standard string that says whether you are logged in (and switched
     * roles/logged in as another user).
     * @return string HTML fragment.
     */
    public function login_info($withlinks = null) {
        global $USER, $CFG, $DB, $SESSION;

        if (during_initial_install()) {
            return '';
        }

        if (is_null($withlinks)) {
            $withlinks = empty($this->page->layout_options['nologinlinks']);
        }

        $loginpage = ((string)$this->page->url === get_login_url());
        $course = $this->page->course;
        if (\core\session\manager::is_loggedinas()) {
            $realuser = \core\session\manager::get_realuser();
            $fullname = fullname($realuser, true);
            if ($withlinks) {
                $loginastitle = get_string('loginas');
                $realuserinfo = " [<a href=\"$CFG->wwwroot/course/loginas.php?id=$course->id&amp;sesskey=".sesskey()."\"";
                $realuserinfo .= "title =\"".$loginastitle."\">$fullname</a>] ";
            } else {
                $realuserinfo = " [$fullname] ";
            }
        } else {
            $realuserinfo = '';
        }

        $loginurl = get_login_url();

        if (empty($course->id)) {
            // $course->id is not defined during installation
            return '';
        } else if (isloggedin()) {
            $context = context_course::instance($course->id);

            $fullname = fullname($USER, true);
            $picture = $this->user_picture($USER, array('alttext' => false, 'size' => 27, 'link' => false));

            $username = $picture.$fullname;
            if (is_mnet_remote_user($USER) and $idprovider = $DB->get_record('mnet_host', array('id' => $USER->mnethostid))) {
                if ($withlinks) {
                    $username .= " from <a href=\"{$idprovider->wwwroot}\">{$idprovider->name}</a>";
                } else {
                    $username .= " from {$idprovider->name}";
                }
            }

            // Navigation to the User menu
            $options = $this->get_user_menu();

            $loggedinas = '<div class="dropdown pull-right">';
            if (isguestuser()) {
                $loggedinas .= $realuserinfo.get_string('loggedinasguest');
                if (!$loginpage && $withlinks) {
                    $loggedinas .= " (<a href=\"$loginurl\">".get_string('login').'</a>)';
                }
            } else if (is_role_switched($course->id)) { // Has switched roles
                $rolename = '';
                if ($role = $DB->get_record('role', array('id' => $USER->access['rsw'][$context->path]))) {
                    $rolename = ': '.role_get_name($role, $context);
                }
                $loggedinas .= '<a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$username.$rolename.'<b class="caret"></b></a>';
                if ($withlinks) {
                    $url = new moodle_url('/course/switchrole.php', array('id' => $course->id,'sesskey' => sesskey(), 'switchrole' => 0, 'returnurl' => $this->page->url->out_as_local_url(false)));
                    $options [] = '<li>'.html_writer::tag('a', get_string('switchrolereturn'), array('href' => $url)).'</li>';
                }
            } else {
                $loggedinas .= $realuserinfo.'<a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$username.'<b class="caret"></b></a>';
                if ($withlinks) {
					$options [] = "<li><a href=\"$CFG->wwwroot/login/logout.php?sesskey=".sesskey()."\">".get_string('logout').'</a></li>';
                }
            }
            if (!empty($options)) {
				$loggedinas .= '<ul class="dropdown-menu">';
				foreach ($options as $option) {
					$loggedinas .= $option;
				}
				$loggedinas .= '</ul>';
			}
			$loggedinas .= '</div>';
        } else {
            $loggedinas = get_string('loggedinnot', 'moodle');
            if (!$loginpage && $withlinks) {
                $loggedinas .= " (<a href=\"$loginurl\">".get_string('login').'</a>)';
            }
        }

        $loggedinas = '<div class="logininfo pull-right">'.$loggedinas.'</div>';

        if (isset($SESSION->justloggedin)) {
            unset($SESSION->justloggedin);
            if (!empty($CFG->displayloginfailures)) {
                if (!isguestuser()) {
                    if ($count = count_login_failures($CFG->displayloginfailures, $USER->username, $USER->lastlogin)) {
                        $loggedinas .= '&nbsp;<div class="loginfailures">';
                        if (empty($count->accounts)) {
                            $loggedinas .= get_string('failedloginattempts', '', $count);
                        } else {
                            $loggedinas .= get_string('failedloginattemptsall', '', $count);
                        }
                        if (file_exists("$CFG->dirroot/report/log/index.php") and has_capability('report/log:view', context_system::instance())) {
                            $loggedinas .= ' (<a href="'.$CFG->wwwroot.'/report/log/index.php'.
                                                 '?chooselog=1&amp;id=1&amp;modid=site_errors">'.get_string('logs').'</a>)';
                        }
                        $loggedinas .= '</div>';
                    }
                }
            }
        }

        if (isloggedin() && !isguestuser()) {
            if (file_exists($CFG->dirroot.'/local/agora/message_notifier/global.lib.php')) {
                require_once($CFG->dirroot.'/local/agora/message_notifier/global.lib.php');
                if (function_exists('message_notifier_get_badge')) {
                    $messages = message_notifier_get_badge();
                    $loggedinas .= $messages;
                }
            }
		}
        return $loggedinas;
    }

    public function get_user_menu() {

    	$options = array();

    	$mymoodle = $this->page->navigation->get('home');
    	if ($mymoodle) {
			$options[] = theme_xtec2_render_user_settings($mymoodle, array(), null, array(), 2);
		}
    	$myprofile = $this->page->navigation->get('myprofile');
		if ($myprofile && $myprofile->has_children()) {
			foreach ($myprofile->children as $child) {
				$options[] = theme_xtec2_render_user_settings($child, array(), null, array(), 2);
			}
		}
        if ($this->page->navigation->get('myprofile')) {
            $this->page->navigation->get('myprofile')->hide();
        }

    	$usernav = $this->page->settingsnav->get('usercurrentsettings');
		if ($usernav && $usernav->has_children()) {
			$options[] = theme_xtec2_render_user_settings($usernav, array(), null, array(), 2);
		}
        if ($this->page->settingsnav->get('usercurrentsettings')) {
            $this->page->settingsnav->get('usercurrentsettings')->hide();
        }

		return $options;
    }

    /*
     * Overriding the custom_menu function ensures the custom menu is
     * always shown, even if no menu items are configured in the global
     * theme settings page.
     */
    public function custom_menu($custommenuitems = '') {
        global $CFG;

        if (!empty($CFG->custommenuitems)) {
            $custommenuitems .= $CFG->custommenuitems;
        }
        $custommenu = new custom_menu($custommenuitems, current_language());
        return $this->render_custom_menu($custommenu);
    }

    /*
     * This renders the bootstrap top menu.
     *
     * This renderer is needed to enable the Bootstrap style navigation.
     */
    protected function render_custom_menu(custom_menu $menu) {
        $content = '';
        foreach ($menu->get_children() as $item) {
            $content .= $this->render_custom_menu_item($item, 1);
        }

        return (!empty($content)) ? '<ul class="nav">'.$content.'</ul>' : "";
    }

 	/*
     * This code renders the custom menu items for the
     * bootstrap dropdown menu.
     */
    protected function render_custom_menu_item(custom_menu_item $menunode, $level = 0 ) {
        static $submenucount = 0;

        if ($menunode->has_children()) {

            if ($level == 1) {
                $class = 'dropdown pull-left';
            } else {
                $class = 'dropdown-submenu';
            }

            if ($menunode === $this->language) {
                $class .= ' langmenu';
            }
            $content = html_writer::start_tag('li', array('class' => $class));
            // If the child has menus render it as a sub menu.
            $submenucount++;
            if ($menunode->get_url() !== null) {
                $url = $menunode->get_url();
            } else {
                $url = '#cm_submenu_'.$submenucount;
            }
            $content .= html_writer::start_tag('a', array('href' => $url, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'title' => $menunode->get_title()));
            $content .= $menunode->get_text();
            if ($level == 1) {
                $content .= '<b class="caret"></b>';
            }
            $content .= '</a>';
            $content .= '<ul class="dropdown-menu">';
            foreach ($menunode->get_children() as $menunode) {
                $content .= $this->render_custom_menu_item($menunode, 0);
            }
            $content .= '</ul>';
        } else {
            $content = '<li>';
            // The node doesn't have children so produce a final menuitem.
            if ($menunode->get_url() !== null) {
                $url = $menunode->get_url();
            } else {
                $url = '#';
            }
            $content .= html_writer::link($url, $menunode->get_text(), array('title' => $menunode->get_title()));
        }
        return $content;
    }

    public function main_menu() {
        global $CFG;

        if (!isloggedin()) {
            return "";
        }

        $content = '<ul class="nav">';

        $currentcourse = $this->page->navigation->get('currentcourse');
        if ($currentcourse  && $currentcourse->has_children()) {
            $content .= '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" title="'.$currentcourse->get_content().'">';
            $content .= $currentcourse->get_content().'<b class="caret"></b></a><ul class="dropdown-menu pull-right">';
            foreach ($currentcourse->children as $child) {
                foreach ($child->children as $child2) {
                    $content .= theme_xtec2_render_user_settings($child2, array(), null, array(), 2);
                }
            }
            $content .= '</ul>';
        }

        $navigation = $this->page->navigation;
        if ($navigation  && $navigation->has_children()) {
            $content .= '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" title="'.get_string('pluginname', 'block_navigation').'">';
            $content .= get_string('pluginname', 'block_navigation').'<b class="caret"></b></a><ul class="dropdown-menu pull-right">';
            foreach ($navigation->children as $child) {
                if ($child->key != 'currentcourse' && $child->key != 'home') {
                    $content .= theme_xtec2_render_user_settings($child, array(), null, array(), 2);
                }

            }
            $content .= '</ul>';
        }

        $settings = $this->page->settingsnav;
        if ($settings  && $settings->has_children()) {
            $content .= '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" title="'.get_string('pluginname', 'block_settings').'">';
            $content .= get_string('pluginname', 'block_settings').'<b class="caret"></b></a><ul class="dropdown-menu pull-right">';
            foreach ($settings->children as $child) {
                $content .= theme_xtec2_render_user_settings($child, array(), null, array(), 2);
            }
            if (has_capability('moodle/site:config', context_system::instance())) {
                $content .= '<li><form class="navbar-search" method="get" action="'.$CFG->wwwroot.'/'.$CFG->admin.'/search.php"><input type="text" class="search-query" name="query" placeholder="'.get_string('search').'"></form></li>';
            }
            $content .= '</ul>';
        }

        return $content.'</ul>';
    }

	public function lang_menu() {
		global $CFG;

		$menu = new custom_menu('', current_language());
    	// TODO: eliminate this duplicated logic, it belongs in core, not
        // here. See MDL-39565.
        $langs = get_string_manager()->get_list_of_translations();
        if (count($langs) < 2
            or empty($CFG->langmenu)
            or ($this->page->course != SITEID and !empty($this->page->course->lang))) {
        }

        $strlang = get_string('language');
        $currentlang = current_language();
        if (isset($langs[$currentlang])) {
            $currentlang = $langs[$currentlang];
        } else {
            $currentlang = $strlang;
        }
        foreach ($langs as $langtype => $langname) {
            $menu->add($langname, new moodle_url($this->page->url, array('lang' => $langtype)), $langname);
        }

		$content = '<div class="btn-group dropup langmenu">';
		$content .= '<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">'.$currentlang;
		$content .= '<span class="caret"></span>';
		$content .= '</a>';
		$content .= '<ul class="dropdown-menu pull-right">';
        foreach ($menu->get_children() as $item) {
            $content .= $this->render_custom_menu_item($item, 1);
        }

        return $content.'</ul></div>';
    }

    function social_icons() {
        global $DB;

		$social_icons_cache = cache::make('core', 'htmlpurifier');
		if ($text = $social_icons_cache->get('social_icons')) {
			return $text;
		}
        global $school_info, $CFG, $OUTPUT;
        $content = "";
        if ($url = get_config('theme_xtec2', 'website')) {
            $content .= '<a href="'.$url.'" target="_blank"><i class="fa fa-globe" title="Web"></i></a>';
        }
        if ($url = get_config('theme_xtec2', 'email')) {
            $content .= '<a href="mailto:'.$url.'" target="_blank"><i class="fa fa-envelope" title="'.get_string('email', 'theme_xtec2', $url).'"></i></a>';
        }
        if ($url = get_config('theme_xtec2', 'phone')) {
            $content .= '<a href="tel:'.$url.'" target="_blank"><i class="fa fa-phone" title="'.get_string('phone', 'theme_xtec2', $url).'"></i></a>';
        }
        if (get_config('theme_xtec2', 'nodes') && is_service_enabled('nodes')) {
            $content .= '<a href="'.get_service_url('nodes').'" target="_blank" class="agora-social icon nodes"><img src="'.$OUTPUT->pix_url('nodes-32', 'theme').'" alt="" title="Nodes" /></a>';
        }
        if (get_config('theme_xtec2', 'intranet') && is_service_enabled('intranet')) {
            $content .= '<a href="'.get_service_url('intranet').'" target="_blank" class="agora-social icon intranet"><img src="'.$OUTPUT->pix_url('intranet-32', 'theme').'" alt="" title="Intranet" /></a>';
        }
        if ($url = get_config('theme_xtec2', 'facebook')) {
			$content .= '<a href="'.$url.'" target="_blank"><i class="fa fa-facebook" title="Facebook"></i></a>';
		}
		if ($url = get_config('theme_xtec2', 'twitter')) {
			$content .= '<a href="'.$url.'" target="_blank"><i class="fa fa-twitter" title="Twitter"></i></a>';
		}
		if ($url = get_config('theme_xtec2', 'googleplus')) {
			$content .= '<a href="'.$url.'" target="_blank"><i class="fa fa-google-plus" title="Google Plus"></i></a>';
		}
		if ($url = get_config('theme_xtec2', 'instagram')) {
			$content .= '<a href="'.$url.'" target="_blank"><i class="fa fa-instagram" title="Instagram"></i></a>';
		}
		if ($url = get_config('theme_xtec2', 'flickr')) {
			$content .= '<a href="'.$url.'" target="_blank"><i class="fa fa-flickr" title="Flickr"></i></a>';
		}
		if ($url = get_config('theme_xtec2', 'linkedin')) {
			$content .= '<a href="'.$url.'" target="_blank"><i class="fa fa-linkedin" title="LinkedIn"></i></a>';
		}
		if ($url = get_config('theme_xtec2', 'pinterest')) {
			$content .= '<a href="'.$url.'" target="_blank"><i class="fa fa-pinterest" title="Pinterest"></i></a>';
		}
		if ($url = get_config('theme_xtec2', 'youtube')) {
			$content .= '<a href="'.$url.'" target="_blank"><i class="fa fa-youtube" title="Youtube"></i></a>';
		}
        $social_icons_cache->set('social_icons', $content);
        return $content;
    }

    /*
    * This code replaces icons in with
    * FontAwesome variants where available.
    */
    public function render_pix_icon(pix_icon $icon) {
        static $icons = array(
            'add' => 'plus',
            'book' => 'book',
            'chapter' => 'file',
            'docs' => 'info-circle',
            'help' => 'question-circle',
            'generate' => 'gift',
            'users' => 'users',
            'withoutpassword' => 'unlock',
            'withpassword' => 'lock',
            'withoutkey' => 'magic',
            'a/download_all' => 'cloud-download',
            'i/badge' => 'trophy',
            'i/course' => 'graduation-cap',
            'i/marker' => 'lightbulb-o',
            'i/dragdrop' => 'arrows',
            'i/loading_small' => 'spinner fa-spin ',
            'i/backup' => 'cloud-download',
            'i/checkpermissions' => 'user',
            'i/dragdrop' => 'arrows',
            'i/edit' => 'pencil',
            'i/filter' => 'filter',
            'i/folder' => 'folder',
            'i/grades' => 'table',
            'i/group' => 'group',
            'i/groupn' => 'user',
            'i/hide' => 'eye-slash',
            'i/import' => 'upload',
            'i/info' => 'info-circle',
            'i/move_2d' => 'arrows',
            'i/navigationitem' => 'circle',
            'i/outcomes' => 'pie-chart',
            'i/publish' => 'globe',
            'i/reload' => 'refresh',
            'i/report' => 'list-alt',
            'i/restore' => 'cloud-upload',
            'i/return' => 'repeat',
            'i/roles' => 'user',
            'i/cohort' => 'users',
			'i/scales' => 'signal',
            'i/settings' => 'cogs',
            'i/show' => 'eye',
            'i/switchrole' => 'random',
            'i/user' => 'user',
            'i/users' => 'user',
			'i/twoway' => 'arrows-h',
			'i/withsubcat' => 'indent',
			'i/permissions' => 'key',
			't/add' => 'plus',
            'i/assignroles' => 'lock',
			't/assignroles' => 'lock',
			't/cohort' => 'users',
			't/delete' => 'times-circle',
			't/edit' => 'cog',
			't/right' => 'arrow-right',
            't/left' => 'arrow-left',
			't/edit_menu' => 'cogs',
			// 't/hide' => 'eye-slash', Disabled to solve errors hidding activities
			// 't/show' => 'eye',
			't/up' => 'arrow-up',
			't/down' => 'arrow-down',
            't/copy' => 'copy',
            't/lock' => 'unlock',
            't/unlock' => 'lock',
            't/locked' => 'lock',
            't/unlocked' => 'unlock',
            't/move' => 'arrows-alt',
            't/switch_minus' => 'minus-square',
            't/switch_plus' => 'plus-square',
            't/block_to_dock' => 'caret-square-o-left',
            't/sort' => 'sort',
            't/sort_asc' => 'sort-asc',
            't/sort_desc' => 'sort-desc',
            't/grades' => 'th-list',
            't/preview' => 'search',
            't/message' => 'comment',
            't/editstring' => 'pencil-square-o',
            't/check' => 'check',
            't/calc_off' => 'calculator',
        );

        $name = $icon->pix;
        if (isset($icons[$name])) {
			$icon->attributes['class'] = isset($icon->attributes['class'])? $icon->attributes['class'] : '';
			$icon->attributes['class'] .= " fa fa-$icons[$name]";
			if (isset($icon->attributes['alt'])) {
				$icon->attributes['title'] = $icon->attributes['alt'];
			}
			$style = "";
			if (isset($icon->attributes['width'])) {
				$style .= 'width:'.$icon->attributes['width'].';';
				unset($icon->attributes['width']);
			}
			if (isset($icon->attributes['height'])) {
				$style .= 'height:'.$icon->attributes['height'].';line-height:'.$icon->attributes['height'].';';
				unset($icon->attributes['height']);
			}
			if (!empty($style)) {
				$icon->attributes['style'] = isset($icon->attributes['style'])? $icon->attributes['style'].$style : $style;
			}

			// unset($icon->attributes['alt']);
            return html_writer::tag('i', '', $icon->attributes);
        } else {
            return parent::render_pix_icon($icon);
        }
    }


}
