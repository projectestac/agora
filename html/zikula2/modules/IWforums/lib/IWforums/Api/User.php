<?php
class IWforums_Api_User extends Zikula_AbstractApi {
    /**
     * Gets all the forums created
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @return:	And array with the items information
     */
    public function getall($args) {
        $filter = FormUtil::getPassedValue('filter', isset($args['filter']) ? $args['filter'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $requestByCron = false;
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue',
                            array('sv' => $sv))) {
            // Security check
            if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
                return LogUtil::registerPermissionError();
            }
        } else $requestByCron = true;

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_definition_column'];
        $sqlWhere = '';
        $groupsList = '';
        if (SecurityUtil::checkPermission('IWforums::', '::', ACCESS_ADMIN) && $filter != 1) {
            $where = '';
        } else {
            $uid = (!UserUtil::isLoggedIn() && !$requestByCron) ? '-1' : $uid;
            //get all the forums where the user can access because is group member or forum moderator
            if ($uid != '-1') {
                // get all user groups
                $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
                $groups = ModUtil::apiFunc('IWmain', 'user', 'getAllUserGroups', array('sv' => $sv,
                            'uid' => $uid));
                $sqlWhere = "$c[actiu]=1 AND (";
                foreach ($groups as $group) {
                    //create the select restrictive sql command
                    $groupsList .= "$c[grup] like '%$" . $group['gid'] . "|1$%' OR
                                    $c[grup] like '%$" . $group['gid'] . "|2$%' OR
                                    $c[grup] like '%$" . $group['gid'] . "|3$%' OR
                                    $c[grup] like '%$" . $group['gid'] . "|4$%' OR ";
                }
                $sqlWhere .= substr($groupsList, 0, -3);
            } else {
                $sqlWhere = "$c[actiu]=1 AND ($c[grup] like '%$-1|1$%'";
            }
            $or = (trim(substr($groupsList, 0, -3)) === '') ? '' : " OR ";
            $sqlWhere .= ($uid != '-1') ? $or . "$c[mod] like '%$" . $uid . "$%')" : ')';
        }
        $where = $sqlWhere;
        $orderby = "$c[nom_forum]";
        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWforums_definition', $where, $orderby, '-1', '-1', 'fid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    /**
     * Get a forum
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum
     * @return:	And array with the forum information
     */
    public function get($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');

        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue',
                            array('sv' => $sv))) {
            // Security check
            if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
                return LogUtil::registerPermissionError();
            }
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $items = DBUtil::selectObjectByID('IWforums_definition', $fid, 'fid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Get the number of messages into a forum or topic and the number of them that the user haven't seen
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum
     * @return:	And array with the information
     */
    public function compta_msg($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : 0, 'POST');
        $tots = FormUtil::getPassedValue('tots', isset($args['tots']) ? $args['tots'] : 0, 'POST');
        $uid = FormUtil::getPassedValue('uid', isset($args['uid']) ? $args['uid'] : UserUtil::getVar('uid'), 'POST');
        $sv = FormUtil::getPassedValue('sv', isset($args['sv']) ? $args['sv'] : null, 'POST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'REQUEST');
        if (!ModUtil::func('IWmain', 'user', 'checkSecurityValue',
                            array('sv' => $sv))) {
            // Security check
            if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
                return LogUtil::registerPermissionError();
            }
        } else {
            $requestByCron = true;
        }
        $registres = array();
        if ($uid != UserUtil::getVar('uid') && !$requestByCron) {
            return $registres;
        }
        //check if user can access the forum
        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        if (ModUtil::func('IWforums', 'user', 'access',
                           array('fid' => $fid,
                                 'uid' => $uid,
                                 'sv' => $sv)) < 1) {
            return LogUtil::registerPermissionError();
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_msg_column'];
        $c = $pntable['IWforums_msg_column'];
        $userFilter = ($u > 0) ? " AND $c[usuari] = $u" : '';
        $temaFilter = ($tots == 1) ? '' : " AND $c[ftid]=$ftid";
        $where = "$c[fid]=$fid" . $temaFilter . $userFilter;
        $where1 = "$c[llegit] LIKE '%$" . $uid . "$%' AND $c[fid]=$fid" . $temaFilter . $userFilter;
        $where2 = "$c[marcat] LIKE '%$" . $uid . "$%' AND $c[fid]=$fid" . $temaFilter . $userFilter;
        $items = DBUtil::selectObjectArray('IWforums_msg', $where, '', '-1', '-1', 'fmid');
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        $nmsg = count($items);
        if ($u == null || $u == 0) {
            // get the number of topics
            $where = "$c[ftid]=$ftid AND $c[fid]=$fid AND $c[idparent]=0";
            $topics = DBUtil::selectObjectArray('IWforums_msg', $where, '', '-1', '-1', 'fmid');
            // error message and return
            if ($topics === false) {
                return LogUtil::registerError($this->__('Error! Could not load items.'));
            }
            $nparent = count($topics);
        } else $nparent = $nmsg;

        $uread = DBUtil::selectObjectArray('IWforums_msg', $where1, '', '-1', '-1', 'fmid');
        // error message and return
        if ($uread === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        $nmsgno = count($uread);
        $nollegits = $nmsg - $nmsgno;
        $checked = DBUtil::selectObjectArray('IWforums_msg', $where2, '', '-1', '-1', 'fmid');
        // error message and return
        if ($checked === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        $marcats = count($checked);
        $registres = array('nmsg' => $nmsg,
                           'nollegits' => $nollegits,
                           'marcats' => $marcats,
                           'nparent' => $nparent);
        //print_r($registres);
        //Retornem la matriu plena de registres
        return $registres;
    }

    /**
     * Get the number of topics into a forum
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum
     * @return:	The number of topics
     */
    public function compta_temes($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 1) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }

        $pntable = DBUtil::getTables();

        $c = $pntable['IWforums_temes_column'];

        $where = "$c[fid]=$fid";
        $items = DBUtil::selectObjectArray('IWforums_temes', $where, '', '-1', '-1', 'ftid');

        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        return count($items);
    }

    /**
     * Get a topic
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum and the topic
     * @return:	An array with the topic information
     */
    public function get_tema($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if (!isset($fid) || !is_numeric($fid) || !isset($ftid) || !is_numeric($ftid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 1) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }

        $items = DBUtil::selectObjectByID('IWforums_temes', $ftid, 'ftid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Get a message
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum and the message
     * @return:	An array with the message information
     */
    public function get_msg($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'REQUEST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if (!isset($fid) || !is_numeric($fid) || !isset($fmid) || !is_numeric($fmid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 1) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }

        $items = DBUtil::selectObjectByID('IWforums_msg', $fmid, 'fmid');

        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }

        // Return the items
        return $items;
    }

    /**
     * Get all the topics in a forum
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum
     * @return:	An array with all the topics into a forum
     */
    public function get_temes($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : null, 'POST');
        $forumtriat = FormUtil::getPassedValue('forumtriat', isset($args['forumtriat']) ? $args['forumtriat'] : null, 'POST');
        if ($forumtriat != null) {
            $fid = $forumtriat;
        }
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 1) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        //get forum information
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get',
                                   array('fid' => $fid));
        if ($forum == false) {
            $view->assign('msg', $this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return $view->fetch('IWforums_user_noacces.htm');
        }
        $itemsArray = array();
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_temes_column'];
        $where = "$c[fid]=$fid";
        $orderBy = "$c[order] asc, $c[data] desc";
        $items = DBUtil::selectObjectArray('IWforums_temes', $where, $orderBy, '-1', '-1', 'ftid');
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        foreach ($items as $item) {
            if ($item['last_time'] == 0) {
                $last_post_exists = false;
                $lastdate = 0;
                $lasttime = 0;
            } else {
                $last_post_exists = true;
                $lastdate = date('d/m/y', $item['last_time']);
                $lasttime = date('H.i', $item['last_time']);
            }

            $n_msg = ModUtil::apiFunc('IWforums', 'user', 'compta_msg',
                                       array('ftid' => $item['ftid'],
                                             'fid' => $fid,
                                             'u' => $u));
            $n_msg_no_llegits = $n_msg['nollegits'];
            $marcats = $n_msg['marcats'];
            $n_msg = $n_msg['nmsg'];
            $itemsArray[] = array('ftid' => $item['ftid'],
                                  'titol' => $item['titol'],
                                  'descriu' => $item['descriu'],
                                  'usuari' => $item['usuari'],
                                  'data' => date('d/m/y', $item['data']),
                                  'hora' => date('H.i', $item['data']),
                                  'lastdate' => $lastdate,
                                  'lasttime' => $lasttime,
                                  'lastuser' => $item['last_user'],
                                  'last_post_exists' => $last_post_exists,
                                  'n_msg' => $n_msg,
                                  'n_msg_no_llegits' => $n_msg_no_llegits,
                                  'marcats' => $marcats);
        }
        return $itemsArray;
    }

    /**
     * Get the names of the attached files to a forum
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum
     * @return:	And array with the files names
     */
    public function get_adjunts($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 4 && !SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }

        $records = array();

        $pntable = DBUtil::getTables();

        $c = $pntable['IWforums_msg_column'];

        $where = "$c[fid]=$fid";
        $items = DBUtil::selectObjectArray ('IWforums_msg', $where, '');
        //Comprovem que la consulta hagi estat amb éxit
        if ($items === false) {
            return LogUtil::registerError($this->__('An error has occurred while reading records from the data base'));
        }

        foreach ($items as $item) {
            $records[] = array('adjunt' => $item['adjunt']);
        }

        //Retornem la matriu plena de registres
        return $records;
    }

    /**
     * Create a new topic in database
     * @author:	Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Topic information
     * @return:	identity of the topic created if success and false otherwise
     */
    public function crear_tema($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $descriu = FormUtil::getPassedValue('descriu', isset($args['descriu']) ? $args['descriu'] : '', 'POST');
        $titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');

        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Needed argument
        if (!isset($fid) || !is_numeric($fid) || !isset($titol)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 3) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }

        $item = array('fid' => $fid,
                      'titol' => $titol,
                      'usuari' => UserUtil::getVar('uid'),
                      'descriu' => $descriu,
                      'data' => time());

        if (!DBUtil::insertObject($item, 'IWforums_temes', 'ftid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        // Let any hooks know that we have created a new item
        ModUtil::callHooks('item', 'create', $item['ftid'],
                            array('module' => 'IWforums'));

        return $item['ftid'];
    }

    public function getall_msg($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        $tots = FormUtil::getPassedValue('tots', isset($args['tots']) ? $args['tots'] : null, 'POST');
        $usuari = FormUtil::getPassedValue('usuari', isset($args['usuari']) ? $args['usuari'] : null, 'POST');
        $idparent = FormUtil::getPassedValue('idparent', isset($args['idparent']) ? $args['idparent'] : null, 'POST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : null, 'POST');
        $indent = FormUtil::getPassedValue('indent', isset($args['indent']) ? $args['indent'] : null, 'POST');
        $rpp = FormUtil::getPassedValue('rpp', isset($args['rpp']) ? $args['rpp'] : null, 'POST');
        $oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        // Needed argument
        if (!isset($fid) || !is_numeric($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 1) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        $registres = array();

        $pntable = DBUtil::getTables();
        $t = $pntable['IWforums_msg'];
        $c = $pntable['IWforums_msg_column'];
        // Filtering: only show the messages sent by $usuari
        //$filter_user = (isset($usuari) && $usuari != null) ? $usuari : 0;
        $filter_user = ($usuari != null && $usuari > 0) ? " AND $c[usuari]=$usuari" : '';
        // Condition to select the topic
        $tema = (isset($tots) && $tots == 1) ? "" : " $c[ftid] = $ftid AND ";
        $inici = $inici - 1;
        $ordre = ($idparent == 0) ? "$c[lastdate] desc, $c[data] desc limit $inici, $rpp" : "$c[data] asc";
        $parent = (!isset($idparent)) ? '' : " AND $c[idparent]=$idparent";
        if ($filter_user != '') {
            $parent = '';
        }
        $where = $tema . "$c[fid]=$fid" . $parent . $filter_user;
        $ordreby = ($idparent == 0) ? "$c[lastdate] desc, $c[data] desc" : "$c[data] asc";
        $registre = DBUtil::selectObjectArray('IWforums_msg', $where, $ordreby, $inici, $rpp, 'fmid');

        //Recorrem els registres i els posem dins de la matriu
        foreach ($registre as $r) {
            // Set the id of the origen of the thread
            if ($idparent == 0)
                $oid = $r['fmid'];
            // Put the message in the array to be returned
            $indentValue = ($filter_user != '') ? 0 : $indent;
            $registres[] = array('fmid' => $r['fmid'],
                                 'usuari' => $r['usuari'],
                                 'titol' => $r['titol'],
                                 'data' => $r['data'],
                                 'llegit' => $r['llegit'],
                                 'missatge' => $r['missatge'],
                                 'adjunt' => $r['adjunt'],
                                 'icon' => $r['icon'],
                                 'marcat' => $r['marcat'],
                                 'indent' => $indentValue,
                                 'oid' => $oid);
            if ($filter_user == '') {
                // Recursive call to get all the replies to a message
                $listmessages = ModUtil::apiFunc('IWforums', 'user', 'getall_msg',
                                                  array('ftid' => $ftid,
                                                        'fid' => $fid,
                                                        'usuari' => $usuari,
                                                        'indent' => $indent + 30,
                                                        'idparent' => $r['fmid'],
                                                        'oid' => $oid,
                                                        'tots' => $tots));
                // Copy the replies to the all messages array
                foreach ($listmessages as $message) {
                    if ($filter_user != 0) { // Filtering
                        if ($filter_user == $message['usuari']) // Show only when the message is written by the selected used
                            $registres[] = array('fmid' => $message['fmid'],
                                                 'usuari' => $message['usuari'],
                                                 'titol' => $message['titol'],
                                                 'data' => $message['data'],
                                                 'llegit' => $message['llegit'],
                                                 'missatge' => $message['missatge'],
                                                 'adjunt' => $message['adjunt'],
                                                 'icon' => $message['icon'],
                                                 'marcat' => $message['marcat'],
                                                 'indent' => 0,
                                                 'oid' => $message['oid']);
                    }else
                        $registres[] = array('fmid' => $message['fmid'],
                                             'usuari' => $message['usuari'],
                                             'titol' => $message['titol'],
                                             'data' => $message['data'],
                                             'llegit' => $message['llegit'],
                                             'missatge' => $message['missatge'],
                                             'adjunt' => $message['adjunt'],
                                             'icon' => $message['icon'],
                                             'marcat' => $message['marcat'],
                                             'indent' => $message['indent'],
                                             'oid' => $message['oid']);
                }
            }
        }
        //Retornem la matriu plena de registres
        return $registres;
    }

    /*
      Funcié que posa a l'usuari com que ha llegit el missatge
     */

    public function llegit($args) {
        //Avoid that unregistered user to be updated as reader
        if (!UserUtil::isLoggedIn()) {
            return true;
        }
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        $llegit = FormUtil::getPassedValue('llegit', isset($args['llegit']) ? $args['llegit'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        //Comprovem que els valors han arribat
        if (!isset($fmid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_msg_column'];
        $llegit = $llegit . '$' . UserUtil::getVar('uid') . '$';
        $where = "$c[fmid]=$fmid";
        $items = array('llegit' => $llegit);
        if (!DBUTil::updateObject($items, 'IWforums_msg', $where)) {
            return LogUtil::registerError($this->__('The modification of the users who have read the message has failed'));
        }

        //Informem que el procés s'ha acabat amb éxit
        return true;
    }

    /*
      Delete a message in a forum
     */
    public function del_msg($args) {
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        //check needed values
        if (!isset($fmid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //get message
        $item = ModUtil::apiFunc('IWforums', 'user', 'get_msg',
                                  array('fmid' => $fmid));
        if ($item == false) {
            return LogUtil::registerError($this->__('No messages have been found'));
        }
        //get forum information
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get',
                                      array('fid' => $item['fid']));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $item['fid']));
        if ($access < 2) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        $moderator = ($access == 4) ? true : false;
        //Check if user can delete the message
        if (!$moderator && (time() > $item['data'] + 60 * $registre['msgDelTime'] || $item['usuari'] != UserUtil::getVar('uid'))) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        //Delete the note content
        if (!DBUtil::deleteObjectByID('IWforums_msg', $fmid, 'fmid')) {
            return LogUtil::registerError($this->__('Error! Sorry! Deletion attempt failed.'));
        }
        //Update de last time and user in forum topic
        $updated = ModUtil::apiFunc('IWforums', 'user', 'updateLast',
                                     array('ftids' => array($item['ftid'])));
        //success
        return true;
    }

    /*
      Moves a message and all its replies between topics and forums
     */
    public function mou($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        $noutema = FormUtil::getPassedValue('noutema', isset($args['noutema']) ? $args['noutema'] : null, 'POST');
        $nouforum = FormUtil::getPassedValue('nouforum', isset($args['nouforum']) ? $args['nouforum'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        //Comprovem que els valors han arribat
        if (!isset($fmid) || !isset($noutema)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 4) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        //check if user can access the forum where the messages are going to be moved
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $noutema));
        if ($access < 4) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_msg_column'];
        // Update message clicked. Change idparent to 0
        $where = "$c[fmid]=$fmid";
        $items = array('fid' => $nouforum,
                       'ftid' => $noutema,
                       'idparent' => 0);
        if (!DBUTil::updateObject($items, 'IWforums_msg', $where)) {
            return LogUtil::registerError($this->__('The transfer of the message has failed'));
        }

        // Get the rest messages to move (the replies)
        $listmessages = ModUtil::apiFunc('IWforums', 'user', 'getall_msg',
                                          array('ftid' => $ftid,
                                                'fid' => $fid,
                                                'indent' => 0,
                                                'idparent' => $fmid,
                                                'oid' => 0,
                                                'tots' => 1));
        // Update the replies
        foreach ($listmessages as $message) {
            $where = "$c[fmid]=$message[fmid]";
            $items = array('fid' => $nouforum,
                           'ftid' => $noutema);
            if (!DBUTil::updateObject($items, 'IWforums_msg', $where)) {
                return LogUtil::registerError($this->__('The transfer of the message has failed'));
            }
        }

        //Update de last time and user in forum topic
        $updated = ModUtil::apiFunc('IWforums', 'user', 'updateLast',
                                     array('ftids' => array($ftid, $noutema)));
        //success
        return true;
    }

    /*
      Copy the message to another destiny: forum or topic
     */
    public function copy($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        $noutema = FormUtil::getPassedValue('noutema', isset($args['noutema']) ? $args['noutema'] : null, 'POST');
        $nouforum = FormUtil::getPassedValue('nouforum', isset($args['nouforum']) ? $args['nouforum'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        //Comprovem que els valors han arribat
        if (!isset($fmid) || !isset($noutema)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 4) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        //check if user can access the forum where the messages are going to be moved
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $noutema));
        if ($access < 4) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        //get message
        $message = ModUtil::apiFunc('IWforums', 'user', 'get_msg',
                                  array('fmid' => $fmid));
        if ($message == false) {
            return LogUtil::registerError($this->__('No messages have been found'));
        }

        $item = array('fid' => $nouforum,
                      'ftid' => $noutema,
                      'titol' => $message['titol'],
                      'usuari' => $message['usuari'],
                      'missatge' => $message['missatge'],
                      'llegit' => "$$" . UserUtil::getVar('uid') . "$",
                      'data' => time(),
                      'adjunt' => $message['adjunt'],
                      'icon' => $message['icon'],
                      'marcat' => '$',
                      'idparent' => 0,
                      'lastdate' => time());
        if (!DBUtil::insertObject($item, 'IWforums_msg', 'fmid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }

        //Update de last time and user in forum topic
        $updated = ModUtil::apiFunc('IWforums', 'user', 'updateLast',
                                     array('ftids' => array($ftid)));
        //Retorna el id del nou registre que s'acaba d'introduir
        return $item['fmid'];
    }

    /*
      Funcié que esborra un tema d'un férum
     */

    public function deltema($args) {
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        // Arguments check
        if (!isset($ftid) || !isset($fid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Cridem la funcié get que retorna les dades
        $link = ModUtil::apiFunc('IWforums', 'user', 'get_tema',
                                  array('ftid' => $ftid,
                                        'fid' => $fid));
        //Comprovem que el registre efectivament existeix i, per tant, es podré esborrar
        if ($link == false) {
            return LogUtil::registerError($this->__('No messages have been found'));
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 4) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        $pntable = DBUtil::getTables();
        $t = $pntable['IWforums_temes'];
        $c = $pntable['IWforums_temes_column'];
        $t2 = $pntable['IWforums_msg'];
        $c2 = $pntable['IWforums_msg_column'];
        //get messages files
        $files = ModUtil::apiFunc('IWforums', 'user', 'get_adjunts',
                                   array('fid' => $fid));
        //delete messages files
        foreach ($files as $file) {
            $filePath = ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforums', 'urladjunts') . '/' . $file['adjunt'];
            if (file_exists($filePath)) unlink($filePath);
        }
        // Messages deletion
        $where = "$c2[ftid]=$ftid";
        if (!DBUtil::deleteWhere('IWforums_msg', $where)) {
            return LogUtil::registerError($this->__('An error has occurred while deleting the message'));
        }
        // record deletion
        if (!DBUtil::deleteWhere('IWforums_temes', $where)) {
            return LogUtil::registerError($this->__('An error has occurred while deleting the message'));
        }

        //Retornem true ja que el procés ha finalitzat amb éxit
        return true;
    }

    /*
      Create a new msg
     */

    public function crear_msg($args) {
        $msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
        $titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
        $titolmsg = FormUtil::getPassedValue('titolmsg', isset($args['titolmsg']) ? $args['titolmsg'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $ftid0 = FormUtil::getPassedValue('ftid0', isset($args['ftid0']) ? $args['ftid0'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        $adjunt = FormUtil::getPassedValue('adjunt', isset($args['adjunt']) ? $args['adjunt'] : null, 'POST');
        $icon = FormUtil::getPassedValue('icon', isset($args['icon']) ? $args['icon'] : null, 'POST');
        $idparent = FormUtil::getPassedValue('idparent', isset($args['idparent']) ? $args['idparent'] : null, 'POST');
        $oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : null, 'POST');
        if ($ftid0 != null) $ftid = $ftid0;
        if ($titolmsg != null) $titol = $titolmsg;
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 2) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        //Comprova que el tÃ­tol del missatge i el contingut del mateix hagin arribat
        if (!isset($titol) || !isset($msg)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $item = array('fid' => $fid,
                      'ftid' => $ftid,
                      'titol' => $titol,
                      'usuari' => UserUtil::getVar('uid'),
                      'missatge' => $msg,
                      'llegit' => "$$" . UserUtil::getVar('uid') . "$",
                      'data' => time(),
                      'adjunt' => $adjunt,
                      'icon' => $icon,
                      'marcat' => '$',
                      'idparent' => $idparent,
                      'lastdate' => time());
        if (!DBUtil::insertObject($item, 'IWforums_msg', 'fmid')) {
            return LogUtil::registerError($this->__('Error! Creation attempt failed.'));
        }
        if (isset($oid) && $oid != 0) {
            $pntable = DBUtil::getTables();
            $c = $pntable['IWforums_msg_column'];
            $where = "$c[fmid]=$oid";
            $items = array('lastdate' => time());
            if (!DBUTil::updateObject($items, 'IWforums_msg', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
        }
        //Update de last time and user in forum topic
        $updated = ModUtil::apiFunc('IWforums', 'user', 'updateLast',
                                     array('ftids' => array($ftid)));
        //Retorna el id del nou registre que s'acaba d'introduir
        return $item['fmid'];
    }

    /*
     * update the last user and last time in topic table
     *
     */

    public function updateLast($args) {
        $ftids = FormUtil::getPassedValue('ftids', isset($args['ftids']) ? $args['ftids'] : null, 'POST');
        //get last message in topic
        $pntable = DBUtil::getTables();
        foreach ($ftids as $ftid) {
            $c = $pntable['IWforums_msg_column'];
            $where = "$c[ftid] = $ftid";
            $orderby = "$c[data] desc";
            // get the objects from the db
            $items = DBUtil::selectObjectArray('IWforums_msg', $where, $orderby, '0', '1', 'ftid');
            // Check for an error with the database code, and if so set an appropriate
            // error message and return
            if ($items === false) {
                return LogUtil::registerError($this->__('Error! Could not load items.'));
            }
            //update topic last time and user information
            $c = $pntable['IWforums_temes_column'];
            $where = "$c[ftid]=$ftid";
            $items = array('last_time' => $items[$ftid]['data'],
                           'last_user' => $items[$ftid]['usuari']);
            if (!DBUTil::updateObject($items, 'IWforums_temes', $where)) {
                return LogUtil::registerError($this->__('Error! Update attempt failed.'));
            }
        }
        return true;
    }

    /*
      Funció que esborra el fitxer adjunt a un missatge
     */
    public function del_adjunt($args) {
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        //Comprova que el tÃ­tol del missatge i el contingut del mateix hagin arribat
        if (!isset($fmid)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Agafem les dades del missatge
        $missatge = ModUtil::apiFunc('IWforums', 'user', 'get_msg',
                                      array('fmid' => $fmid));
        if ($missatge == false) {
            return LogUtil::registerError($this->__('No messages have been found'));
        }
        //Carreguem la informaciÃ³ del fÃ³rum
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get',
                                      array('fid' => $missatge['fid']));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $missatge['fid']));
        if ($access < 2) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        //Comprovem que l'usuari sigui moderador del férum i pugui editar el missatge
        $moderator = ($access == 4) ? true : false;
        if (!$moderator && (time() > $missatge['data'] + 60 * $registre['msgDelTime'] || $missatge['usuari'] != UserUtil::getVar('uid'))) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        //Esborrem el fitxer adjunt del servidor
        $esborrat = unlink(ModUtil::getVar('IWmain', 'documentRoot') . '/' . ModUtil::getVar('IWforums', 'urladjunts') . '/' . $missatge['adjunt']);
        if ($esborrat) {
            $pntable = DBUtil::getTables();
            $c = $pntable['IWforums_msg_column'];
            $where = "$c[fmid]=$fmid";
            $items = array('adjunt' => '');
            if (!DBUTil::updateObject($items, 'IWforums_msg', $where)) {
                return LogUtil::registerError($this->__('An error has occurred while editing the message'));
            }
        }

        //Retorna el id del nou registre que s'acaba d'introduir
        return $fmid;
    }

    /*
      Funcié que retorna una matriu amb la informacié de tots els usuaris que han participat en el férum
     */

    public function getremitents($args) {
        $tots = FormUtil::getPassedValue('tots', isset($args['tots']) ? $args['tots'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        $pntable = DBUtil::getTables();
        //$t = $pntable['IWforums_msg'];
        $c = $pntable['IWforums_msg_column'];
        $tema = ($tots != null && $tots == 1) ? "" : ' ' . $c['ftid'] . '=' . $ftid . ' AND ';
        $where = $tema . " $c[fid]=$fid";
        $items = DBUtil::selectObjectArray('IWforums_msg', $where, '', -1, -1, 'usuari');

        //Comprovem que la consulta hagi estat amb éxit
        if ($items === false) {
            return LogUtil::registerError($this->__('An error has occurred while reading records from the data base'));
        }

        //Retornem la matriu plena de registres
        return $items;
    }

    /*
      Funcié que marca o treu la marca d'un missatge
     */

    public function marcat($args) {
        $marcat = FormUtil::getPassedValue('marcat', isset($args['marcat']) ? $args['marcat'] : null, 'POST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        //Comprovem que els valors han arribat
        if (!isset($fmid) || !isset($marcat)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }

        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_msg_column'];

        $where = "$c[fmid]=$fmid";
        $items = array('marcat' => $marcat);

        if (!DBUTil::updateObject($items, 'IWforums_msg', $where)) {
            return LogUtil::registerError($this->__('An error has occurred while checking/unchecking a message'));
        }

        return true;
    }

    /*
      Funcié que modifica un missatge
     */

    public function update_msg($args) {
        $msg = FormUtil::getPassedValue('msg', isset($args['msg']) ? $args['msg'] : null, 'POST');
        $titol = FormUtil::getPassedValue('titol', isset($args['titol']) ? $args['titol'] : null, 'POST');
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        $adjunt = FormUtil::getPassedValue('fadjunt', isset($args['fadjunt']) ? $args['fadjunt'] : null, 'POST');
        $icon = FormUtil::getPassedValue('icon', isset($args['icon']) ? $args['icon'] : null, 'POST');
        $idparent = FormUtil::getPassedValue('idparent', isset($args['idparent']) ? $args['idparent'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        //Carreguem la informació del fòrum
        $registre = ModUtil::apiFunc('IWforums', 'user', 'get',
                                      array('fid' => $fid));
        if ($registre == false) {
            LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
            return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 2) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        //Agafem les dades del missatge
        $missatge = ModUtil::apiFunc('IWforums', 'user', 'get_msg',
                                      array('fmid' => $fmid));
        if ($missatge == false) {
            return LogUtil::registerError($this->__('No messages have been found'));
        }
        //Comprovem que l'usuari sigui moderador del férum i pugui editar el missatge
        $moderator = ($access == 4) ? true : false;
        if (!$moderator && (time() > $missatge['data'] + 60 * $registre['msgEditTime'] || $missatge['usuari'] != UserUtil::getVar('uid'))) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        //Comprova que el tétol del missatge i el contingut del mateix hagin arribat
        if (!isset($titol) || !isset($msg)) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_msg_column'];
        $msg = str_replace("'", "&#039;", $msg);
        $titol = str_replace("'", "&#039;", $titol);
        $where = "$c[fmid]=$fmid";
        $items = array('titol' => $titol,
                       'missatge' => $msg,
                       'icon' => $icon,
                       'adjunt' => $adjunt);

        if (!DBUTil::updateObject($items, 'IWforums_msg', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }

        return $fmid;
    }

    /*
      Funció que retorna si un missatge és pare o no ho és
     */
    public function is_parent($args) {
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        //Comprovacié de seguretat. Si falla retorna una matriu buida
        $registres = array();
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_msg_column'];
        $where = "$c[idparent]=$fmid";
        $number = DBUTil::selectObjectCount('IWforums_msg', $where);
        if ($number === false) {
            return LogUtil::registerError($this->__('An error has occurred while reading records from the data base'));
        }
        if ($number > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*
      Gets all the unread messages in a forum topic
      @param $fid:		forum id
      @return:			Array with all the messages ordered
     */

    public function getall_msg_unread($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        $items = array();
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_msg_column'];
        $where = "$c[fid]=$fid AND $c[llegit] NOT LIKE '%$" . UserUtil::getVar('uid') . "$%';";

        $items = DBUtil::selectObjectArray('IWforums_msg', $where, '');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('An error has occurred while reading records from the data base'));
        }

        //Retornem la matriu plena de registres
        return $items;
    }

    /*
      Funció que modifica la posició d'un tema del fòrum
     */

    public function put_order($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        $ordre = FormUtil::getPassedValue('ordre', isset($args['ordre']) ? $args['ordre'] : null, 'POST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        //Comprovem que els valors han arribat
        if ($ftid == null || $ordre == null) {
            return LogUtil::registerError($this->__('Error! Could not do what you wanted. Please check your input.'));
        }
        //Cridem la funcié get de l'API que ens retornaré les dades de l'entrada al mené
        $forum = ModUtil::apiFunc('IWforums', 'user', 'get',
                                   array('fid' => $fid));
        //Comprovem que la consulta anterior ha tornat amb resultats
        if ($forum == false) {
            return LogUtil::registerError($this->__('The forum upon which the ation had to be carried out hasn\'t been found'));
        }
        //check if user can access the forum
        $access = ModUtil::func('IWforums', 'user', 'access',
                                 array('fid' => $fid));
        if ($access < 4) {
            return LogUtil::registerError($this->__('You can\'t access the forum'));
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_temes_column'];

        $where = "$c[ftid]=$ftid";
        $items = array('order' => $ordre);

        if (!DBUTil::updateObject($items, 'IWforums_temes', $where)) {
            return LogUtil::registerError($this->__('Error! Update attempt failed.'));
        }
        return true;
    }

    /**
     * Gets all the notes where that the user has flagged for a forum
     * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
     * @param:	Identity of the forum where to search the messages
     * @return:	And array with the items information
     */
    public function getFlagged($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : null, 'POST');
        // Security check
        if (!SecurityUtil::checkPermission('IWforums::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }
        $pntable = DBUtil::getTables();
        $c = $pntable['IWforums_msg_column'];
        $where = "$c[marcat] like '%$" . UserUtil::getVar('uid') . "$%' AND $c[fid]=$fid";
        $orderby = "$c[data] desc";
        // get the objects from the db
        $items = DBUtil::selectObjectArray('IWforums_msg', $where, $orderby, '-1', '-1', 'fmid');
        // Check for an error with the database code, and if so set an appropriate
        // error message and return
        if ($items === false) {
            return LogUtil::registerError($this->__('Error! Could not load items.'));
        }
        // Return the items
        return $items;
    }

    public function getlinks($args) {
        $fid = FormUtil::getPassedValue('fid', isset($args['fid']) ? $args['fid'] : 0, 'GETPOST');
        $ftid = FormUtil::getPassedValue('ftid', isset($args['ftid']) ? $args['ftid'] : 0, 'GETPOST');
        $fmid = FormUtil::getPassedValue('fmid', isset($args['fmid']) ? $args['fmid'] : 0, 'GETPOST');
        $inici = FormUtil::getPassedValue('inici', isset($args['inici']) ? $args['inici'] : 0, 'GETPOST');
        $oid = FormUtil::getPassedValue('oid', isset($args['oid']) ? $args['oid'] : 0, 'GETPOST');
        $u = FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : 0, 'GETPOST');
        $m1 = FormUtil::getPassedValue('m1', isset($args['m1']) ? $args['m1'] : 0, 'POST');
        $m2 = FormUtil::getPassedValue('m2', isset($args['m2']) ? $args['m2'] : 0, 'POST');
        $m3 = FormUtil::getPassedValue('m3', isset($args['m3']) ? $args['m3'] : 0, 'POST');
        $m4 = FormUtil::getPassedValue('m4', isset($args['m4']) ? $args['m4'] : 0, 'POST');
        $m5 = FormUtil::getPassedValue('m5', isset($args['m5']) ? $args['m5'] : 0, 'POST');
        $m6 = FormUtil::getPassedValue('m6', isset($args['m6']) ? $args['m6'] : 0, 'POST');
        $m7 = FormUtil::getPassedValue('m7', isset($args['m7']) ? $args['m7'] : 0, 'POST');
        $m8 = FormUtil::getPassedValue('m8', isset($args['m8']) ? $args['m8'] : 0, 'POST');
        $m9 = FormUtil::getPassedValue('m9', isset($args['m9']) ? $args['m9'] : 0, 'POST');
        $m12 = FormUtil::getPassedValue('m12', isset($args['m12']) ? $args['m12'] : 0, 'POST');
        $m13 = FormUtil::getPassedValue('m13', isset($args['m13']) ? $args['m13'] : 0, 'POST');
        $access = ($fid > 0) ? ModUtil::func('IWforums', 'user', 'access',
                        array('fid' => $fid)) : false;

        $message = array('marcat' => '');
        if ($fmid > 0) {
            //get message information
            $message = ModUtil::apiFunc('IWforums', 'user', 'get_msg',
                                         array('fmid' => $fmid));
            if ($message == false) {
                LogUtil::registerError($this->__('No messages have been found'));
                return System::redirect(ModUtil::url('IWforums', 'user', 'main'));
            }
        }
        $links = array();
        if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) && $m5 == 1 && $access > 1) {
            $links[] = array('url' => ModUtil::url('IWforums', 'user', 'nou_msg', array('inici' => $inici, 'fid' => $fid, 'ftid' => $ftid, 'u' => $u, 'fmid' => $fmid, 'oid' => $oid)), 'text' => $this->__('Reply to the message'), 'id' => 'iwforums_nou_msg', 'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) && $m6 == 1 && $access > 0 && UserUtil::isLoggedIn()) {
            $links[] = array('url' => ModUtil::url('IWforums', 'user', 'lectors', array('inici' => 0, 'fid' => $fid, 'ftid' => $ftid, 'u' => $u, 'fmid' => $fmid, 'oid' => $oid)), 'text' => $this->__('Who has read the message?'), 'id' => 'iwforums_lectors', 'class' => 'z-icon-es-info');
        }

        if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) && $m1 == 1 && $access > 2 && $ftid == 0) {
            $links[] = array('url' => ModUtil::url('IWforums', 'user', 'nou_tema', array('fid' => $fid, 'u' => $u, 'inici' => $inici)), 'text' => $this->__('Create a new topic'), 'id' => 'iwforums_nou_tema', 'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) && $m2 == 1 && $access > 1) {
            $links[] = array('url' => ModUtil::url('IWforums', 'user', 'nou_msg', array('fid' => $fid, 'u' => $u, 'inici' => $inici, 'ftid' => $ftid)), 'text' => $this->__('Send a new message'), 'id' => 'iwforums_nou_msg', 'class' => 'z-icon-es-new');
        }
        if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) && $m3 == 1) {
            $links[] = array('url' => ModUtil::url('IWforums', 'user', 'main', array('inici' => $inici)), 'text' => $this->__('View the forum list'), 'id' => 'iwforums_main', 'class' => 'z-icon-es-view');
        }
        if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) && ($m4 == 1 && $access > 0) || ($ftid != 0 && $access > 0)) {
            $links[] = array('url' => ModUtil::url('IWforums', 'user', 'forum', array('inici' => $inici, 'u' => $u, 'fid' => $fid)), 'text' => $this->__('Return to the list of topics and messages'), 'id' => 'iwforums_forum', 'class' => 'z-icon-es-view');
        }
        if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) && $m7 == 1 && $access > 0 && $fmid != 0) {
            $links[] = array('url' => ModUtil::url('IWforums', 'user', 'llista_msg', array('inici' => $inici, 'u' => $u, 'fid' => $fid, 'ftid' => $ftid)), 'text' => $this->__('Return to the message list'), 'id' => 'iwforums_llista_msg', 'class' => 'z-icon-es-view');
        }
        if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) && $m8 == 1 && $access > 0) {
            $links[] = array('url' => ModUtil::url('IWforums', 'user', 'msg', array('inici' => $inici, 'u' => $u, 'fid' => $fid, 'ftid' => $ftid, 'fmid' => $fmid, 'oid' => $oid)), 'text' => $this->__('Return to the message'), 'id' => 'iwforums_msg', 'class' => 'z-icon-es-mail');
        }
        if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) && $m9 == 1 && $access > 0 && UserUtil::isLoggedIn()) {
            if ($ftid == 0) {
                $links[] = array('url' => ModUtil::url('IWforums', 'user', 'llegits', array('inici' => $inici, 'fid' => $fid)), 'text' => $this->__('Check all messages as read'), 'id' => 'iwforums_llegits', 'class' => 'z-icon-es-ok');
            } else {
                $links[] = array('url' => ModUtil::url('IWforums', 'user', 'llegits', array('inici' => $inici, 'fid' => $fid, 'ftid' => $ftid, 'u' => $u)), 'text' => $this->__('Check all messages as read'), 'id' => 'iwforums_llegits', 'class' => 'z-icon-es-ok');
            }
        }
        if (SecurityUtil::checkPermission('IWforums::', "::", ACCESS_READ) && ($m12 == 1 || $m13 == 1) && $access > 0 && UserUtil::isLoggedIn()) {
            $links[] = array('url' => "javascript:mark(" . $fid . "," . $fmid . ")", 'text' => $this->__('Check/uncheck the message'), 'id' => 'iwforums_mark', 'class' => 'z-icon-es-view');
            //$forumsusermenulinks .= "<span style=\"cursor: pointer;\" id=\"markText" . $params['fmid'] . "\"><a onclick=\"javascript:mark(" . $params['fid'] . "," . $params['fmid'] . ")\">" . __('Check the message', $dom) . "</a></span> " . $params['seperator'];
        }
        return $links;
    }
}