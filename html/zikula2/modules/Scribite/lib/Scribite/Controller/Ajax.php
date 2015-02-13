<?php

/**
 * Copyright Scribite Team 2011
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package cribite
 * @link https://github.com/zikula-modules/Scribite
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */
class Scribite_Controller_Ajax extends Zikula_Controller_AbstractAjax
{

    /**
     * handle new module/template override submission
     * 
     * @return \Zikula_Response_Ajax
     */
    public function submitoverride()
    {
        // chck security token
        $this->checkAjaxToken();

        // get POST data
        $action = $this->request->request->get('action', null);
        $rowid = $this->request->request->get('rowid', null);
        $modname = $this->request->request->get('modname', null);
        $editor = $this->request->request->get('editor', null);
        $area = $this->request->request->get('area', null);
        $disabled = $this->request->request->get('disabled', null);
        $params = $this->request->request->get('params', null);

        $deleting = (substr($action, 0, 6) == 'delete');

        // persist the values in the modvar table
        $overrides = ModUtil::getVar('Scribite', 'overrides');
        $paramsArray = array();
        $paramsString = '';
        if (empty($editor)) {
            // validate
            if (empty($area) || strpos($area, ",")) {
                return new Zikula_Response_Ajax_BadData($this->__("The textarea must have a value and cannot contain a comma."));
            }
            // convert the name/value pair string to an array
            if (!empty($params) && !$deleting) {
                $params = explode(',', $params);
                foreach ($params as $param) {
                    if (strpos($param, ":")) {
                        list($k, $v) = explode(':', trim($param));
                        $paramsArray[trim($k)] = trim($v);
                        $paramsString .= trim($k) . ":" . trim($v) . ",";
                    } else {
                        $paramsArray = array();
                        $paramsString = '';
                        break;
                    }
                }
            }
            if ($area == 'all') {
                $editor = (isset($overrides[$modname]['editor'])) ? $overrides[$modname]['editor'] : null;
                unset($overrides[$modname]);
                if (!$deleting) {
                    $overrides[$modname]['all']['params'] = $paramsArray;
                }
                if (isset($editor)) {
                    $overrides[$modname]['editor'] = $editor;
                }
            } else {
                unset($overrides[$modname][$area]);
                if (!$deleting) {
                    $overrides[$modname][$area]['disabled'] = $disabled;
                    $overrides[$modname][$area]['params'] = $paramsArray;
                }
            }
        } else {
            if ($deleting) {
                unset($overrides[$modname]['editor']);
            } else {
                $overrides[$modname]['editor'] = $editor;
            }
        }
        ModUtil::setVar('Scribite', 'overrides', $overrides);

        // return successful result
        $vars = array(
            'action' => $action,
            'rowid' => $rowid,
            'modname' => $modname,
            'editor' => $editor,
            'area' => $area,
            'disabled' => $disabled,
            'params' => rtrim($paramsString, ","));
        return new Zikula_Response_Ajax($vars);
    }

}