<?php

class IWbooks_Api_User extends Zikula_AbstractApi {

    public function getall($args) {
        $table = DBUtil::getTables();
        $c = $table['IWbooks_column'];

        extract($args);

        // Optional arguments.
        if (!isset($args['startnum'])) {
            $args['startnum'] = 0;
        }
        if (!isset($args['numitems'])) {
            $args['numitems'] = -1;
        }

        if ((!isset($args['startnum'])) ||
                (!isset($args['numitems']))) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $items = array();

        // Security check
        if (!SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        // We now generate a where-clause
        $sql = ($any) ? " WHERE " . $c['any'] . " = '$any' " : " WHERE " . $c['any'] . " = '1'";
        if ($materia != "TOT")
            $sql .= " AND " . $c['codi_mat'] . " = '$materia' ";
        if ($lectura != '1')
            $sql .= " AND " . $c['lectura'] . " != 1 ";
        if ($etapa != "TOT")
            $sql .= " AND " . $c['etapa'] . " LIKE '%$etapa%'";
        if ($nivell != "")
            $sql .= " AND (" . $c['nivell'] . " = '$nivell' OR " . $c['nivell'] . " = '')";

        $where = $sql;

        $orderBy = ' ' . $c['any'] . ', ' . $c['optativa'] . ', ' . $c['lectura'] . ', ' . $c['codi_mat'] . ', ' . $c['etapa'] . ' DESC, ' . $c['nivell'] . ', ' . $c['avaluacio'] . ' ';

        $items = DBUtil::selectObjectArray('IWbooks', $where, $orderBy, $args['startnum'], $args['numitems']);

        // Return the items
        return $items;
    }

    public function get($args) {
        extract($args);

        if (!isset($args['tid']) || !is_numeric($args['tid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $permFilter = array();
        $permFilter[] = array('realm' => 0,
            'component_left' => 'IWbooks',
            'component_middle' => '',
            'component_right' => '',
            'instance_left' => 'name',
            'instance_middle' => '',
            'instance_right' => 'tid',
            'level' => ACCESS_EDIT);

        $item = DBUtil::selectObjectByID('IWbooks', $args['tid'], 'tid', null);

        //print_r($item);
        // Return the item array
        return $item;
    }

    public function countitems() {
        return DBUtil::selectObjectCount('IWbooks');
    }

    public function countitemsmat() {
        return DBUtil::selectObjectCount('IWbooks_materies');
    }

    public function countitemsselect($args) {

        $table = DBUtil::getTables();
        $c = $table['IWbooks_column'];

        extract($args);

        $sql_eta = "";
        if ($etapa != "TOT")
            $sql_eta = " and " . $c['etapa'] . "  LIKE '%$etapa%' ";

        $sql_mat = "";
        if ($materia != "TOT")
            $sql_mat = " and " . $c['codi_mat'] . " = '$materia' ";


        $sql_lect = "";
        if ($lectura == 1) {
            $sql_lect = "";
        } else {
            $sql_lect = " and " . $c['lectura'] . " != 1 ";
        }

        if (isset($flag) && $flag == 'admin')
            $sql_lect = "";

        $sql_niv = "";
        if ($nivell != "")
            $sql_niv = " and " . $c['nivell'] . " = '$nivell'";

        $sql = " " . $c['any'] . " = '$any' "
                . $sql_eta . $sql_niv . $sql_mat . $sql_lect;

        $where = $sql;

        //echo $sql;
        return DBUtil::selectObjectCount('IWbooks', $where);
    }

    public function cursacad($args) {
        extract($args);
        $any2 = $any + 1;
        $curs = $any . "-" . substr($any2, 2, 2);

        return $curs;
    }

    public function reble($args) {
        extract($args);

        $output = '';
        $all = ModUtil::getVar('IWbooks', 'nivells');
        $all = explode('|', $all);
        foreach ($all as $item) {
            $level = explode('#', $item);
            if (trim($level['0']) == $nivell) {
                $output = trim($level['1']);
                break;
            }
        }
        return $output;
    }

// Torna un array amb 'codi_mat' i 'materia'
// L'utilitzem per crear el selector múltiple de tria de matèria
    public function materies($args) {
        extract($args);

        $table = DBUtil::getTables();

        $materiestable = $table['IWbooks_materies'];
        $materiescolumn = &$table['IWbooks_materies_column'];

        $items = array();
        $where = "";
        if (isset($nou) and $nou == 1) {
            $items[''] = '---------';
            $where = "$materiescolumn[codi_mat] != 'TOT'";
        }

        if (isset($tots) and $tots == true) {
            $items['TOT'] = 'Totes';
        }

        $orderby = "$materiescolumn[materia]";

        $items = DBUtil::selectObjectArray('IWbooks_materies', $where, $orderby, '-1', '-1');

        return $items;
    }

    /*
      Torna nom de la matèria a partir del codi passat
     */

    public function nommateria($args) {
        extract($args);

        $table = DBUtil::getTables();

        $c = &$table['IWbooks_materies_column'];

        $where = "$c[codi_mat] = '$codi_mat'";

        $item = DBUtil::selectObject('IWbooks_materies', $where);

        return $item['codi_mat'];
    }

    public function getall_mat($args) {
        extract($args);
        // Optional arguments.
        if (!isset($startnum)) {
            $startnum = 1;
        }
        if (!isset($numitems)) {
            $numitems = -1;
        }
        if (!isset($startnum) || !isset($numitems)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $items = array();

        if (!SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }

        $table = DBUtil::getTables();

        $materiestable = $table['IWbooks_materies'];
        $c = &$table['IWbooks_materies_column'];

        $where = '';
        $orderby = "$c[codi_mat]";

        $items = DBUtil::selectObjectArray('IWbooks_materies', $where, $orderby, $numitems, $startnum - 1);

        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        return $items;
    }

    public function get_mat($args) {
        extract($args);

        if (!isset($args['tid']) || !is_numeric($args['tid'])) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $permFilter = array();
        $permFilter[] = array('realm' => 0,
            'component_left' => 'IWbooks',
            'component_middle' => '',
            'component_right' => '',
            'instance_left' => 'name',
            'instance_middle' => '',
            'instance_right' => 'tid',
            'level' => ACCESS_EDIT);

        $item = DBUtil::selectObjectByID('IWbooks_materies', $args['tid'], 'tid', null);

        if ($item === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the item array
        return $item;
    }

    public function plans($args) {
        extract($args);

        $plans = explode("|", ModUtil::getVar('IWbooks', 'plans'));

        if (isset($tots) and $tots == true) {
            $data['TOT'] = 'Tots';
        }

        for ($i = 0; $i < count($plans); $i++) {
            $descrip = explode("#", $plans[$i]);
            $data[trim($descrip[0])] = trim($descrip[1]);
        }

        return $data;
    }

    public function plansselec($args) {
        extract($args);

        $plans = explode("|", ModUtil::getVar('IWbooks', 'plans'));
        $selec = explode("|", $etapa);

        for ($i = 0; $i < count($plans); $i++) {
            $descrip = explode("#", $plans[$i]);
            $valor = 0;
            if (array_search(trim($descrip[0]), $selec) > -1)
                $valor = 1;

            $data[] = array('id' => trim($descrip[0]), 'name' => trim($descrip[1]), 'selected' => $valor);
        }
        return $data;
    }

    public function descriplans($args) {

        extract($args);
        $torna = "";
        $plans = explode("|", ModUtil::getVar('IWbooks', 'plans'));
        for ($i = 0; $i < count($plans); $i++) {
            $descrip = explode("#", $plans[$i]);
            if (trim($descrip[0]) == trim($etapa)) {
                $torna = $descrip[1];
                break;
                //}else{
                //    $torna = "Codi inexistent";
            }
        }
        return $torna;
    }

    public function llistaplans($args) {
        extract($args);
        $torna = "";
        $plans = explode("|", ModUtil::getVar('IWbooks', 'plans'));
        for ($i = 0; $i < count($plans); $i++) {
            $descrip = explode("#", $plans[$i]);
            $torna .= $descrip[0] . "=" . $descrip[1] . " | ";
        }
        return $torna;
    }

    public function nivellsselec($args) {
        extract($args);

        $nivells = explode("|", ModUtil::getVar('IWbooks', 'nivells'));
        $selec = explode("|", $nivell);

        for ($i = 0; $i < count($nivells); $i++) {
            $descrip = explode("#", $nivells[$i]);
            $valor = 0;
            if (array_search(trim($descrip[0]), $selec) > -1)
                $valor = 1;

            $data[] = array('id' => trim($descrip[0]), 'name' => trim($descrip[1]), 'selected' => $valor);
        }
        return $data;
    }

    public function nivells($args) {
        extract($args);

        $nivells = explode("|", ModUtil::getVar('IWbooks', 'nivells'));

        if (isset($blanc) and $blanc == true) {
            $data[''] = 'Tots';
        }
        for ($i = 0; $i < count($nivells); $i++) {
            $descrip = explode("#", $nivells[$i]);
            $data[trim($descrip[0])] = trim($descrip[1]);
        }

        return $data;
    }

    public function descrinivells($args) {

        extract($args);
        $torna = "";
        $nivells = explode("|", ModUtil::getVar('IWbooks', 'nivells'));
        for ($i = 0; $i < count($nivells); $i++) {
            $descrip = explode("#", $nivells[$i]);
            if (trim($descrip[0]) == trim($nivell)) {
                $torna = $descrip[1];
                break;
                //}else{
                //    $torna = "Codi inexistent";
            }
        }
        return $torna;
    }

    public function llistanivells($args) {
        extract($args);
        $torna = "";
        $nivells = explode("|", ModUtil::getVar('IWbooks', 'nivells'));
        for ($i = 0; $i < count($nivells); $i++) {
            $descrip = explode("#", $nivells[$i]);
            $torna .= $descrip[0] . "=" . $descrip[1] . " | ";
        }
        return $torna;
    }

    /*
      Torna  un array amb tots els anys existents a la tala llibres
     */

    public function anys($args) {
        extract($args);
        $data = array();
        $table = DBUtil::getTables();

        $items = DBUtil::selectObjectArray('IWbooks', '', '', '-1', '-1');

        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        foreach ($items as $item) {
            $cursacad = ModUtil::apiFunc('IWbooks', 'user', 'cursacad', array('any' => $item['any']));
            $data[trim($item['any'])] = $cursacad;
        }

        return $data;
    }

    public function getlinks($args) {

        $id = FormUtil::getPassedValue('id', isset($args['id']) ? $args['id'] : null, 'POST');
        $links = array();

        if (SecurityUtil::checkPermission('IWbooks::', "::", ACCESS_READ)) {
            $links[] = array('url' => ModUtil::url('IWbooks', 'admin', 'view', array('itemsperpage' => '10')), 'text' => $this->__('See all the books entered'), 'class' => 'z-icon-es-view');
            $links[] = array('url' => ModUtil::url('IWbooks', 'admin', 'newItem', array('itemsperpage' => '10')), 'text' => $this->__('Add a new book'), 'class' => 'z-icon-es-new');
            $links[] = array('url' => ModUtil::url('IWbooks', 'admin', 'view_mat', array('itemsperpage' => '10')), 'text' => $this->__('Show subjects'), 'class' => 'z-icon-es-view');
        }
        if (SecurityUtil::checkPermission('IWbooks::', "::", ACCESS_ADD)) {
            $links[] = array('url' => ModUtil::url('IWbooks', 'admin', 'new_mat'), 'text' => $this->__('Enter new subject'), 'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('IWbooks::', "::", ACCESS_ADMIN)) {
            $links[] = array('url' => ModUtil::url('IWbooks', 'admin', 'modifyconfig'), 'text' => $this->__('Modification of the configuration module'), 'class' => 'z-icon-es-config');
            $links[] = array('url' => ModUtil::url('IWbooks', 'admin', 'copia_prev', array('tid' => $id)), 'text' => $this->__('Copy the following year'), 'class' => 'z-icon-es-copy');
            $links[] = array('url' => ModUtil::url('IWbooks', 'admin', 'exporta_csv', array('tid' => $id)), 'text' => $this->__('Export books (CSV)'), 'class' => 'z-icon-es-export');
        }
        return $links;
    }

}