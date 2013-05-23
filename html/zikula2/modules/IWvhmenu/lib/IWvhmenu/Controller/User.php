<?php

/**
 * Get a file from a server folder even it is out of the public html directory
 * @author:     Albert Pérez Monfort (aperezm@xtec.cat)
 * @param:	name of the file that have to be gotten
 * @return:	The file information
 */
class IWvhmenu_Controller_User extends Zikula_AbstractController {

    public function getFile($args) {
        // File name with the path
        $fileName = FormUtil::getPassedValue('fileName', isset($args['fileName']) ? $args['fileName'] : 0, 'GET');

        $sv = ModUtil::func('IWmain', 'user', 'genSecurityValue');
        return ModUtil::func('IWmain', 'user', 'getFile', array('fileName' => $fileName,
                    'sv' => $sv));
    }

}