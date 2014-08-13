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
 * @author     Pau Ferrer <pau.ferrer-ocana@upcnet.es>, Toni Ginard <aginard@xtec.cat>, Sara Arjona Téllez <sarjona@xtec.cat>
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

        $this->content = new stdClass();
        $this->content->text = '';

        if (has_capability('moodle/site:config', context_system::instance())) {
            if ($admin_msg = self::get_message(true)) {
                $this->content->text .= $admin_msg;
                $this->content->text .= '<div style="font-size:smaller">' . get_string('show_admins', 'block_advices') . '</div>';
            }
        }

        if ($not_admin_msg = self::get_message(false)) {
            if (!empty($this->content->text)) {
                $this->content->text .= '<br/>';
            }
            $this->content->text .= $not_admin_msg;
        }

        $this->content->footer = '';

        return $this->content;
    }

    public function applicable_formats() {
        return array('site-index' => true);
    }

    public static function get_message($admin = false){
        if($record = self::get_message_record($admin)){
            if (!empty($record->msg)) {
                $time = date("Ymd", time());
                if (($record->date_start == 0 || $time >= $record->date_start) && ($record->date_stop == 0 || $time <= $record->date_stop)) {
                    return $record->msg;
                }
            }
        }
        return false;
    }

    function instance_allow_config() {
        return is_xtecadmin();
    }


    public static function get_message_record($admin = false){
        global $DB;
        $show_only_admins = $admin ? 1 : 0;
        return $DB->get_record('block_advices', array('show_only_admins'=>$show_only_admins));
    }

    public function instance_config_save($data, $nolongerused = false) {
        global $DB;

        $result = true;

        $record = new StdClass();
        $record->msg = $data->admin_advice['text'];
        $record->show_only_admins = 1;
        $record->date_start = isset($data->admin_start) && !empty($data->admin_start) ? date("Ymd", $data->admin_start) : 0;
        $record->date_stop = isset($data->admin_stop) && !empty($data->admin_stop) ? date("Ymd", $data->admin_stop) : 0;

        if (!$instance = self::get_message_record(true)) {
            $result = $result && $DB->insert_record('block_advices', $record);
        } else {
            $record->id = $instance->id;
            $result = $result && $DB->update_record('block_advices', $record);
        }

        $record = new StdClass();
        $record->msg = $data->not_admin_advice['text'];
        $record->show_only_admins = 0;
        $record->date_start = isset($data->not_admin_start) && !empty($data->not_admin_start) ? date("Ymd", $data->not_admin_start) : 0;
        $record->date_stop = isset($data->not_admin_stop) && !empty($data->not_admin_stop) ? date("Ymd", $data->not_admin_stop) : 0;

        if (!$instance = self::get_message_record(false)) {
            $result = $result && $DB->insert_record('block_advices', $record);
        } else {
            $record->id = $instance->id;
            $result = $result && $DB->update_record('block_advices', $record);
        }

        return $result;
    }

}
