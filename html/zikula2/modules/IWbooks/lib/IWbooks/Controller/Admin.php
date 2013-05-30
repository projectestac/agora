<?php

class IWbooks_Controller_Admin extends Zikula_AbstractController {

    public function postInitialize() {
        $this->view->setCaching(false);
    }

    public function main() {
        if (!SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden();
        }

        return $this->view->fetch('IWbooks_admin_main.htm');
    }

    public function newItem() {
        // Security check
        if (!SecurityUtil::checkPermission('IWbooks::', "::", ACCESS_READ)) {
            throw new Zikula_Exception_Forbidden();
        }
        $aplans = ModUtil::apiFunc('IWbooks', 'user', 'plans', array('tots' => false));
        $anivells = ModUtil::apiFunc('IWbooks', 'user', 'nivells', array('blanc' => true));
        $materies = ModUtil::apiFunc('IWbooks', 'user', 'materies', array('nou' => 1));
        $amateries = array('' => '---------');
        foreach ($materies as $materia) {
            $amateries[$materia['codi_mat']] = $materia['materia'];
        }
        $avaluacions = array('' => '---',
            '1' => '1a',
            '2' => '2a',
            '3' => '3a');
        return $this->view->assign('anyini', ModUtil::getVar('IWbooks', 'any'))
                        ->assign('aplans', $aplans)
                        ->assign('anivells', $anivells)
                        ->assign('amateries', $amateries)
                        ->assign('avaluacions', $avaluacions)
                        ->assign('autor', '')
                        ->assign('titol', '')
                        ->assign('editorial', '')
                        ->assign('any_publi', '')
                        ->assign('isbn', '')
                        ->assign('anyini', '')
                        ->assign('plaselec', '')
                        ->assign('nivellselec', '')
                        ->assign('optativa', '')
                        ->assign('lectura', '')
                        ->assign('avaluacioselec', '')
                        ->assign('observacions', '')
                        ->assign('materials', '')
                        ->fetch('IWbooks_admin_new.htm');
    }

    public function create($args) {
        list($name,
                $number) = FormUtil::getPassedValue('name', 'number');
        extract($args);
        // Confirm authorisation code
        $this->checkCsrfToken();
        $tid = ModUtil::apiFunc('IWbooks', 'admin', 'create', array('name' => $name, 'number' => $number));
        if ($tid != false) {
            // Success
            LogUtil::registerStatus($this->__('The new book has been created') . $codi_mat);
        }
        return System::redirect(ModUtil::url('IWbooks', 'admin', 'view'));
    }

    public function modify($args) {
        $tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'GETPOST');
        $objectid = (int) FormUtil::getPassedValue('objectid');

        if (!empty($objectid))
            $tid = $objectid;

        $item = ModUtil::apiFunc('IWbooks', 'user', 'get', array('tid' => $tid));
        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'), 404);
        }
        if (!SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        $aplans = ModUtil::apiFunc('IWbooks', 'user', 'plans', array('tots' => false));
        $anivells = ModUtil::apiFunc('IWbooks', 'user', 'nivells', array('blanc' => true));
        $amateries = ModUtil::apiFunc('IWbooks', 'user', 'materies', array('nou' => 1));

        $materies = ModUtil::apiFunc('IWbooks', 'user', 'materies', array('tots' => true));

        $amateries = array('' => $this->__('---------'));
        foreach ($materies as $materia1) {
            $amateries[$materia1['codi_mat']] = $materia1['materia'];
        }

        $separa = explode("|", $item['etapa']);
        $aavaluacions = array('' => '---',
            '1' => '1a',
            '2' => '2a',
            '3' => '3a');

        return $this->view->assign('aplans', $aplans)
                        ->assign('plaselec', $separa)
                        ->assign('anivells', $anivells)
                        ->assign('nivellselec', $item['nivell'])
                        ->assign('amateries', $amateries)
                        ->assign('materiaselec', $item['codi_mat'])
                        ->assign('aavaluacions', $aavaluacions)
                        ->assign('avaluacioselec', $item['avaluacio'])
                        ->assign('item', $item)
                        ->assign('copia', 0)
                        ->fetch('IWbooks_admin_modify.htm');
    }

    public function update($args) {
        $item = FormUtil::getPassedValue('item', isset($args['item']) ? $args['item'] : null, 'POST');
        if (isset($args['objectid']) && !empty($args['objectid'])) {
            $item['tid'] = $args['objectid'];
        }
        // Confirm authorisation code
        $this->checkCsrfToken();
        if (ModUtil::apiFunc('IWbooks', 'admin', 'update', array('item' => $item))) {
            // Success
            LogUtil::registerStatus($this->__('Done! Item updated.'));
        }
        return System::redirect(ModUtil::url('IWbooks', 'admin', 'view'));
    }

    // Esborrar un element
    public function delete($args) {
        $tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'GETPOST');
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');

        // The user API function is called.  This takes the item ID which we
        $item = ModUtil::apiFunc('IWbooks', 'user', 'get', array('tid' => $tid));

        if ($item == false) {
            LogUtil::registerError($this->__('Error! Book not found.'));
            return System::redirect(ModUtil::url('IWbooks', 'admin', 'view'));
        }

        // Security check - important to do this as early as possible to avoid
        if (!SecurityUtil::checkPermission('IWbooks::Item', "$item[titol]::$tid", ACCESS_DELETE)) {
throw new Zikula_Exception_Forbidden();
        }

        // Check for confirmation.
        if (empty($confirmation)) {

            return $this->view->assign('item', $item)
                            ->fetch('IWbooks_admin_delete.htm');
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        // The API function is called.  Note that the name of the API function and
        if (ModUtil::apiFunc('IWbooks', 'admin', 'delete', array('tid' => $tid))) {
            // Success
            LogUtil::registerStatus($this->__('The book has been deleted'));
        }
        return System::redirect(ModUtil::url('IWbooks', 'admin', 'view'));
    }

    /**
     * Veure llibres
     */
    public function view() {
        include_once('modules/IWbooks/pnfpdf.php');
        if (FormUtil::getPassedValue('pdf') != '') {
            $any = FormUtil::getPassedValue('curs');
            $etapa = FormUtil::getPassedValue('etapa');
            $materia = FormUtil::getPassedValue('materia');
            $nivell = FormUtil::getPassedValue('nivell');
            $file = generapdfadmin(array('any' => $any,
                'materia' => $materia,
                'etapa' => $etapa,
                'nivell' => $nivell));
        }

        $view = Zikula_View::getInstance('IWbooks');

        if (FormUtil::getPassedValue('curs') != "") {
            $any = FormUtil::getPassedValue('curs');
            $etapa = FormUtil::getPassedValue('etapa');
            $nivell = FormUtil::getPassedValue('nivell');
            $materia = FormUtil::getPassedValue('materia');

            $view->assign('cursselec', $any);
            $view->assign('plaselec', $etapa);
            $view->assign('nivellselec', $nivell);
            $view->assign('materiaselec', $materia);

            $view->assign('cursacad', ModUtil::apiFunc('IWbooks', 'user', 'cursacad', array('any' => $any)));
            $view->assign('nivell_abre', ModUtil::apiFunc('IWbooks', 'user', 'reble', array('nivell' => $nivell)));
            if ($etapa == "TOT") {
                $view->assign('mostra_pla', "| Tots els plans");
            } else {
                $view->assign('mostra_pla', " | " . ModUtil::apiFunc('IWbooks', 'user', 'descriplans', array('etapa' => $etapa)));
            }
            if ($materia == "TOT") {
                $view->assign('mostra_mat', " | Totes les matèries ");
            } else {
                $view->assign('mostra_mat', " | " . ModUtil::apiFunc('IWbooks', 'user', 'nommateria', array('codi_mat' => $materia)));
            }
        } else {
            $any = ModUtil::getVar('IWbooks', 'any');
            $etapa = 'TOT';
            $nivell = '';
            $materia = 'TOT';
            $view->assign('cursselec', $any);
            $view->assign('plaselec', $etapa);
            $view->assign('nivellselec', $nivell);
            $view->assign('materiaselec', $materia);
            $view->assign('cursacad', ModUtil::apiFunc('IWbooks', 'user', 'cursacad', array('any' => $any)));
            $view->assign('nivell_abre', ModUtil::apiFunc('IWbooks', 'user', 'reble', array('nivell' => $nivell)));
            $view->assign('mostra_pla', " | Tots els plans");
            $view->assign('mostra_mat', " | Totes les matèries ");
        }

        $startnum = (int) FormUtil::getPassedValue('startnum', 0) - 1;

        if (!SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden();
        }

        $aanys = ModUtil::apiFunc('IWbooks', 'user', 'anys');
        asort($aanys);

        $view->assign('aanys', $aanys);

        $aplans = ModUtil::apiFunc('IWbooks', 'user', 'plans', array('tots' => true));
        // array_unshift($aplans['TOT'], 'Tots'));
        $view->assign('aplans', $aplans);

        $anivells = ModUtil::apiFunc('IWbooks', 'user', 'nivells', array('blanc' => true));
        $view->assign('anivells', $anivells);

        $materies = ModUtil::apiFunc('IWbooks', 'user', 'materies', array('tots' => true));

        $amateries = array('TOT' => $this->__('All'));
        foreach ($materies as $materia1) {
            $amateries[$materia1['codi_mat']] = $materia1['materia'];
        }

        $view->assign('amateries', $amateries);

        $items = ModUtil::apiFunc('IWbooks', 'user', 'getall', array('startnum' => $startnum,
                    'numitems' => ModUtil::getVar('IWbooks', 'itemsperpage'),
                    'flag' => 'admin',
                    'any' => $any,
                    'etapa' => $etapa,
                    'nivell' => $nivell,
                    'materia' => $materia,
                    'lectura' => '1'));

        //        print_r($items);        die();

        foreach ($items as $key => $item) {
            $items[$key]['lectura'] = ($items[$key]['lectura'] == 1) ? "Sí" : "No";
            $items[$key]['optativa'] = ($items[$key]['optativa'] == 1) ? "Sí" : "No";
            $items[$key]['materials'] = ($items[$key]['materials'] != "") ? "x" : "-";

            if (SecurityUtil::checkPermission('IWbooks::', "$item[titol]::$item[tid]", ACCESS_READ)) {
                $options = array();
                if (SecurityUtil::checkPermission('IWbooks::', "$item[titol]::$item[tid]", ACCESS_EDIT)) {
                    $options[] = array('url' => ModUtil::url('IWbooks', 'admin', 'modify', array('tid' => $item['tid'])),
                        'image' => 'xedit.png',
                        'title' => $this->__('Edit'));
                    if (SecurityUtil::checkPermission('IWbooks::', "$item[titol]::$item[tid]", ACCESS_DELETE)) {
                        $options[] = array('url' => ModUtil::url('IWbooks', 'admin', 'delete', array('tid' => $item['tid'])),
                            'image' => '14_layer_deletelayer.png',
                            'title' => $this->__('Delete'));
                    }
                    if (SecurityUtil::checkPermission('IWbooks::', "$item[titol]::$item[tid]", ACCESS_DELETE)) {
                        $options[] = array('url' => ModUtil::url('IWbooks', 'admin', 'copia', array('tid' => $item['tid'])),
                            'image' => 'editcopy.png',
                            'title' => $this->__('Copy the following year'));
                    }
                }
                $items[$key]['options'] = $options;
            }
        }

        $view->assign('IWbooksitems', $items);

        $numitems = ModUtil::apiFunc('IWbooks', 'user', 'countitemsselect', array('any' => $any,
                    'etapa' => $etapa,
                    'nivell' => $nivell,
                    'materia' => $materia,
                    'lectura' => 1));

        $view->assign('pager', array('numitems' => $numitems,
            'itemsperpage' => ModUtil::getVar('IWbooks', 'itemsperpage')));

        $view->assign('llegenda', ModUtil::apiFunc('IWbooks', 'user', 'llistaplans'));

        return $view->fetch('IWbooks_admin_view.htm');
    }

    /**
     * This is a standard function to modify the configuration parameters of the
     * module
     */
    public function modifyconfig() {

        if (!SecurityUtil::checkPermission('activitats::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden();
        }
        $view = Zikula_View::getInstance('IWbooks', false);
        $view->caching = false;
        $view->assign(ModUtil::getVar('IWbooks'));
        // Check if IWmain module is available and root_dir exists
        $root_dir = '';
        $dir_exists = '1';
        $file_exists = '1';
        $modid = ModUtil::getIdFromName('IWmain');
        $info = ModUtil::getInfo($modid);
        if ($info['state'] == 3) {
            $root_dir = ModUtil::getVar('IWmain', 'documentRoot');
        }
        if (!file_exists($root_dir))
            $dir_exists = '0';

        //Check if declared header image exists
        $image = ModUtil::getVar('IWbooks', 'encap');
        if ($image != '') {
            if (!file_exists($root_dir . '/' . $image))
                $file_exists = '0';
        }

        $multizk = (isset($GLOBALS['ZConfig']['Multisites']['multi']) && $GLOBALS['ZConfig']['Multisites']['multi'] == 1) ? 1 : 0;

        $view->assign('multizk', $multizk);
        $view->assign('file_exists', $file_exists);
        $view->assign('dir_exists', $dir_exists);
        $view->assign('root_dir', $root_dir);
        return $view->fetch('IWbooks_admin_modifyconfig.htm');
    }

    /**
     * This is a standard function to update the configuration parameters of the
     * module given the information passed back by the modification form
     */
    public function updateconfig() {
        $itemsperpage = FormUtil::getPassedValue('itemsperpage', isset($args['itemsperpage']) ? $args['itemsperpage'] : null, 'POST');
        $fpdf = FormUtil::getPassedValue('fpdf', isset($args['fpdf']) ? $args['fpdf'] : null, 'POST');
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
        $encap = FormUtil::getPassedValue('encap', isset($args['encap']) ? $args['encap'] : null, 'POST');
        $darrer_nivell = FormUtil::getPassedValue('darrer_nivell', isset($args['darrer_nivell']) ? $args['darrer_nivell'] : null, 'POST');
        $nivells = FormUtil::getPassedValue('nivells', isset($args['nivells']) ? $args['nivells'] : null, 'POST');
        $plans = FormUtil::getPassedValue('plans', isset($args['plans']) ? $args['plans'] : null, 'POST');
        $mida_font = FormUtil::getPassedValue('mida_font', isset($args['mida_font']) ? $args['mida_font'] : null, 'POST');
        $llistar_materials = FormUtil::getPassedValue('llistar_materials', isset($args['llistar_materials']) ? $args['llistar_materials'] : null, 'POST');
        $marca_aigua = FormUtil::getPassedValue('marca_aigua', isset($args['marca_aigua']) ? $args['marca_aigua'] : null, 'POST');

        // Confirm authorisation code
        $this->checkCsrfToken();

        if (!(file_exists($fpdf . 'fpdf.php'))) {
            LogUtil::registerError($this->__("The way to the 'fpdf' library is not correct: '" . $fpdf . "'"));
            return System::redirect(ModUtil::url('IWbooks', 'admin', 'modifyconfig'));
        }

        if ($llistar_materials == "")
            $llistar_materials = 0;

        if ($marca_aigua == "")
            $marca_aigua = 0;

        if (!isset($itemsperpage))
            $itemsperpage = 10;

        $this->setVar('any', $any)
                ->setVar('itemsperpage', $itemsperpage)
                ->setVar('fpdf', $fpdf)
                ->setVar('encap', $encap)
                ->setVar('darrer_nivell', $darrer_nivell)
                ->setVar('nivells', $nivells)
                ->setVar('plans', $plans)
                ->setVar('mida_font', $mida_font)
                ->setVar('llistar_materials', $llistar_materials)
                ->setVar('marca_aigua', $marca_aigua);

        LogUtil::registerStatus($this->__("Configuration correctly updated"));
        return System::redirect(ModUtil::url('IWbooks', 'admin', 'modifyconfig'));
    }

    public function copia($args) {
        $tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : 0, 'GETPOST');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : 0, 'GETPOST');

        if (!empty($objectid))
            $tid = $objectid;

        $item = ModUtil::apiFunc('IWbooks', 'user', 'get', array('tid' => $tid));

        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        if (!SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }

        $view = Zikula_View::getInstance('IWbooks', false);
        $view->caching = false;

        $aplans = ModUtil::apiFunc('IWbooks', 'user', 'plans', array('tots' => false));
        $view->assign('aplans', $aplans);
        $separa = explode("|", $item['etapa']);
        $view->assign('plaselec', $separa);

        $anivells = ModUtil::apiFunc('IWbooks', 'user', 'nivells', array('blanc' => true));
        $view->assign('anivells', $anivells);
        $view->assign('nivellselec', $item['nivell']);

        $amateries = ModUtil::apiFunc('IWbooks', 'user', 'materies', array('nou' => 1));
        $view->assign('amateries', $amateries);
        $view->assign('materiaselec', $item['codi_mat']);

        $aavaluacions = array('' => '---',
            '1' => '1a',
            '2' => '2a',
            '3' => '3a');
        $view->assign('aavaluacions', $aavaluacions);
        $view->assign('avaluacioselec', $item['avaluacio']);

        $view->assign('copia', 1);

        $view->assign('item', $item);

        return $view->fetch('IWbooks_admin_modify.htm');
    }

    public function new_mat() {
        if (!SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }
        return $this->view->fetch('IWbooks_admin_new_mat.htm');
    }

    public function create_mat($args) {
        $item = FormUtil::getPassedValue('item', isset($args['item']) ? $args['item'] : null, 'POST');

        if (!SecurityUtil::checkPermission('IWbooks::', "$item[materia]::", ACCESS_ADD)) {
            throw new Zikula_Exception_Forbidden();
        }
        // Confirm authorisation code
        $this->checkCsrfToken();

        $tid = ModUtil::apiFunc('IWbooks', 'admin', 'create_mat', array('item' => $item));
        // Success
        if ($tid)
            LogUtil::registerStatus($this->__('Done! Item created.'));

        return System::redirect(ModUtil::url('IWbooks', 'admin', 'view_mat'));
    }

    public function view_mat($args) {
        $startnum = FormUtil::getPassedValue('startnum', isset($args['startnum']) ? $args['startnum'] : 0, 'GETPOST');

        if (!SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_EDIT)) {
            throw new Zikula_Exception_Forbidden();
        }

        $view = Zikula_View::getInstance('IWbooks');

        $items = ModUtil::apiFunc('IWbooks', 'user', 'getall_mat', array('startnum' => $startnum,
                    'numitems' => ModUtil::getVar('IWbooks', 'itemsperpage')));

        foreach ($items as $key => $item) {

            if (SecurityUtil::checkPermission('IWbooks::', "$item[materia]::$item[tid]", ACCESS_READ)) {
                $options = array();
                if (SecurityUtil::checkPermission('IWbooks::', "$item[materia]::$item[tid]", ACCESS_EDIT)) {
                    $options[] = array('url' => ModUtil::url('IWbooks', 'admin', 'modify_mat', array('tid' => $item['tid'])),
                        'image' => 'xedit.png',
                        'title' => $this->__('Edit'));
                    if (SecurityUtil::checkPermission('IWbooks::', "$item[materia]::$item[tid]", ACCESS_DELETE)) {
                        $options[] = array('url' => ModUtil::url('IWbooks', 'admin', 'delete_mat', array('tid' => $item['tid'])),
                            'image' => '14_layer_deletelayer.png',
                            'title' => $this->__('Delete'));
                    }
                }

                $items[$key]['options'] = $options;
            }
        }

        $view->assign('IWbooksitems', $items);
        $view->assign('pager', array('numitems' => ModUtil::apiFunc('IWbooks', 'user', 'countitemsmat'),
            'itemsperpage' => $this->getVar('itemsperpage')));

        return $view->fetch('IWbooks_admin_view_mat.htm');
    }

    public function delete_mat($args) {
        $tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'GETPOST');
        $confirmation = FormUtil::getPassedValue('confirmation', isset($args['confirmation']) ? $args['confirmation'] : null, 'POST');

        $item = ModUtil::apiFunc('IWbooks', 'user', 'get_mat', array('tid' => $tid));

        if ($item == false) {
            LogUtil::registerError($this->__('Error! Book not found.'));
            return System::redirect(ModUtil::url('IWbooks', 'admin', 'view_mat'));
        }

        if (!SecurityUtil::checkPermission('IWbooks::Item', "$item[materia]::$tid", ACCESS_DELETE)) {
throw new Zikula_Exception_Forbidden();
        }

        if (empty($confirmation)) {
            return $this->view->assign('item', $item)
                            ->fetch('IWbooks_admin_delete_mat.htm');
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        if (!ModUtil::apiFunc('IWbooks', 'admin', 'delete_mat', array('tid' => $tid))) {
            LogUtil::registerError($this->__('Error! Deleting the subject.'));
            return System::redirect(ModUtil::url('IWbooks', 'admin', 'view_mat'));
        }

        // Success
        LogUtil::registerStatus($this->__('The subject has been cleared.'));

        return System::redirect(ModUtil::url('IWbooks', 'admin', 'view_mat'));
    }

    public function modify_mat($args) {
        $tid = FormUtil::getPassedValue('tid', isset($args['tid']) ? $args['tid'] : null, 'GET');
        $objectid = FormUtil::getPassedValue('objectid', isset($args['objectid']) ? $args['objectid'] : null, 'POST');

        if (!empty($objectid))
            $tid = $objectid;

        $item = ModUtil::apiFunc('IWbooks', 'user', 'get_mat', array('tid' => $tid));

        if (!$item) {
            return LogUtil::registerError($this->__('No such item found.'));
        }

        if (!SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_ADD)) {
throw new Zikula_Exception_Forbidden();
        }

        return $this->view->assign($item)
                        ->fetch('IWbooks_admin_modify_mat.htm');
    }

    public function update_mat($args) {
        $item = FormUtil::getPassedValue('item', isset($args['item']) ? $args['item'] : null, 'POST');
        if (isset($args['objectid']) && !empty($args['objectid'])) {
            $item['tid'] = $args['objectid'];
        }

        // Confirm authorisation code
        $this->checkCsrfToken();

        if (ModUtil::apiFunc('IWbooks', 'admin', 'update_mat', array('item' => $item))) {
            // Success
            LogUtil::registerStatus($this->__('Done! Item updated.'));
        }

        return System::redirect(ModUtil::url('IWbooks', 'admin', 'view_mat'));
    }

    public function exporta_csv() {
        $any = $this->getVar('any');

        $where = " WHERE pn_any = '$any' ";
        $orderBy = ' pn_etapa, pn_nivell, pn_codi_mat ';

        $items = DBUtil::selectObjectArray('IWbooks', $where, $orderBy);

        $export .= '"ID","' . $this->__('Autor') . '","' . $this->__('Title') . '","' . $this->__('Editorial') . '","' . $this->__('Release Year')
                . '","' . $this->__('ISBN') . '","' . $this->__('Mat') . '","' . $this->__('Pla') . '","' . $this->__('Level') . '","' . $this->__('Opt?')
                . '","' . $this->__('Lect?') . '","' . $this->__('Aval') . '","' . $this->__('Any') . '","' . $this->__('Comment') . '","' . $this->__('Materials')
                . '"' . chr(13) . chr(10);

        foreach ($items as $item) {
            $export .= '"' . $item['tid'] . '","' .
                    $item['autor'] . '","' .
                    $item['titol'] . '","' .
                    $item['editorial'] . '","' .
                    $item['any_publi'] . '","' .
                    $item['isbn'] . '","' .
                    $item['codi_mat'] . '","' .
                    $item['etapa'] . '","' .
                    $item['nivell'] . '","' .
                    $item['optativa'] . '","' .
                    $item['lectura'] . '","' .
                    $item['avaluacio'] . '","' .
                    $item['any'] . '","' .
                    $item['observacions'] . '","' .
                    $item['materials'] . '"' .
                    chr(13) . chr(10);
        }

        header("Content-Description: File Transfer");
        header("Content-Type: application/force-download");
        header("Content-Disposition: attachment; filename=llibres$any.csv");
        echo $export;

        return LogUtil::registerStatus("S'ha realitzat l'exportació del llibres de l'any $any al fitxer 'llibres$any.csv'");
    }

    public function copia_prev() {
        if (!SecurityUtil::checkPermission('IWbooks::', '::', ACCESS_ADD)) {
throw new Zikula_Exception_Forbidden();
        }

        return $this->view->assign('any', ModUtil::getVar('IWbooks', 'any'))
                        ->assign('noucurs', ModUtil::getVar('IWbooks', 'any') + 1)
                        ->fetch('IWbooks_admin_copi_prev.htm');
    }

    public function copia_tot($args) {
        $any = FormUtil::getPassedValue('any', isset($args['any']) ? $args['any'] : null, 'POST');
        $noucurs = FormUtil::getPassedValue('noucurs', isset($args['noucurs']) ? $args['noucurs'] : null, 'POST');

        $where = " WHERE pn_any = '$any' ";
        $orderBy = "";

        $items = DBUtil::selectObjectArray('IWbooks', $where, $orderBy);

        $total = 0;
        foreach ($items as $item) {
            $total++;
            $item['any'] = $noucurs;
            $result = DBUtil::insertObject($item, 'IWbooks', 'tid');
        }

        LogUtil::registerStatus("S'ha copiat la totalitat dels llibres ($total) de l'any " . $any . " a l'any " . $noucurs);

        return System::redirect(ModUtil::url('IWbooks', 'admin', 'view'));
    }

}