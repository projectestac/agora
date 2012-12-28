<?php

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
 * Advices block page.
 *
 * @package    block
 * @subpackage advices
 * @copyright  2011 Departament d'Ensenyament de la Generalitat de Catalunya
 * @author     Pau Ferrer <ferrer.pau@gmail.com>, Toni Ginard <aginard@xtec.cat>, Sara Arjona Téllez <sarjona@xtec.cat>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_advices extends block_base {

    public function init() {
        $this->title = get_string('advices', 'block_advices');
    }

    public function get_content() {
        global $DB;
        
        if ($this->content !== NULL) {
            return $this->content;
        }

        //print_r($this->config);

        $today = date("Ymd");

        $this->content = new stdClass;

        $this->content->text = '';

        if (has_capability('moodle/site:config', get_context_instance(CONTEXT_SYSTEM))) {
            if ($admin_field = $DB->get_record('block_advices', array('show_only_admins'=>'1'))) {
                if (!empty($admin_field->msg)) {
                    if (($admin_field->date_start == 0 || $today >= $admin_field->date_start) && ($admin_field->date_stop == 0 || $today <= $admin_field->date_stop)) {
                        $this->content->text .= $admin_field->msg;
                        $this->content->text .= '<div style="font-size:smaller">' . get_string('show_admins', 'block_advices') . '</div>';
                    }
                }
            }
        }

        if ($not_admin_field = $DB->get_record('block_advices', array('show_only_admins'=>'0'))) {
            if (!empty($not_admin_field->msg)) {
                if (($not_admin_field->date_start == 0 || $today >= $not_admin_field->date_start) && ($not_admin_field->date_stop == 0 || $today <= $not_admin_field->date_stop)) {
                    if (!empty($this->content->text)) {
                        $this->content->text .= '<br/>';
                    }
                    $this->content->text .= $not_admin_field->msg;
                }
            }
        }

        $this->content->footer = '';

        return $this->content;
    }

    public function instance_allow_config() {
        // Function defined in agora additional library
        return get_public_agora();
    }

    public function applicable_formats() {
        return array('site-index' => true);
    }

    public function config_save($data) {
        // Default behaviour: save all variables as $CFG properties
        // You don't need to override this if you're satisfied with the above
        set_config('data', $data);
        return TRUE;
    }

    public function instance_config_save($data, $nolongerused = false) {
        $result = true;

        $admin_field->msg = $data->admin_advice;
        $admin_field->show_only_admins = 1;

        if (isset($data->admin_start_enabled))
            $admin_field->date_start = $data->admin_year_start . str_pad($data->admin_month_start, 2, "0", STR_PAD_LEFT) . str_pad($data->admin_day_start, 2, "0", STR_PAD_LEFT);
        else
            $admin_field->date_start = 0;

        if (isset($data->admin_stop_enabled))
            $admin_field->date_stop = $data->admin_year_stop . str_pad($data->admin_month_stop, 2, "0", STR_PAD_LEFT) . str_pad($data->admin_day_stop, 2, "0", STR_PAD_LEFT);
        else
            $admin_field->date_stop = 0;

        if (!$instance = get_record('block_advices', 'show_only_admins', '1')) {
            $result = $result && insert_record('block_advices', $admin_field);
        } else {
            $admin_field->id = $instance->id;
            $result = $result && update_record('block_advices', $admin_field);
        }

        $not_admin_field->msg = $data->not_admin_advice;
        $not_admin_field->show_only_admins = 0;

        if (isset($data->not_admin_start_enabled))
            $not_admin_field->date_start = $data->not_admin_year_start . str_pad($data->not_admin_month_start, 2, "0", STR_PAD_LEFT) . str_pad($data->not_admin_day_start, 2, "0", STR_PAD_LEFT);
        else
            $not_admin_field->date_start = 0;

        if (isset($data->not_admin_stop_enabled))
            $not_admin_field->date_stop = $data->not_admin_year_stop . str_pad($data->not_admin_month_stop, 2, "0", STR_PAD_LEFT) . str_pad($data->not_admin_day_stop, 2, "0", STR_PAD_LEFT);
        else
            $not_admin_field->date_stop = 0;

        print_r($this_field);
        if (!$instance = get_record('block_advices', 'show_only_admins', '0')) {
            $result = $result && insert_record('block_advices', $not_admin_field);
        } else {
            $not_admin_field->id = $instance->id;
            $result = $result && update_record('block_advices', $not_admin_field);
        }
        return $result;
    }

}
