<?php

class IWwebbox_Controller_User extends Zikula_AbstractController {

    /**
     * Load the url received. If not a ref or url is received loads the url stored in the modules vars
     *
     * @author		Albert Pï¿œrez Monfort (intraweb@xtec.cat)

     * @param		ref (optional)			Reference of the page
     * @param		url (optional)			URL to load. Default the value stored in the module vars
     * @param		w (optional)		Width of the iframe. Default the value stored in the module vars
     * @param		h (optional)		Height of the iframe. Default the value stored in the module vars
     * @param		s		0 - No scrolling
      1 - Scrolling is auto
      Default the value stored in the module vars
     * @param		u		% - Percentage of the width screen
      px - Pixels
      Default the value stored in the module vars
     * @return		The page called loaded into a iframe or an error advicement if the ref received is wrong
     */
    public function main($args) {
        // Get module parameters
        $webbox = array('ref' => FormUtil::getPassedValue('ref', isset($args['ref']) ? $args['ref'] : null, 'GET'),
                        'url' => FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : ModUtil::getVar('IWwebbox', 'url'), 'GET'),
                        'width' => FormUtil::getPassedValue('w', isset($args['w']) ? $args['w'] : ModUtil::getVar('IWwebbox', 'width'), 'GET'),
                        'height' => FormUtil::getPassedValue('h', isset($args['h']) ? $args['h'] : ModUtil::getVar('IWwebbox', 'height'), 'GET'),
                        'scrolls' => FormUtil::getPassedValue('s', isset($args['s']) ? $args['s'] : ModUtil::getVar('IWwebbox', 'scrolls'), 'GET'),
                        'widthunit' => FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : ModUtil::getVar('IWwebbox', 'widthunit'), 'GET'));

        // Replace "*" to "&" and "**" to "?" if they are in the URL
        $webbox['url'] = str_replace('*', '&', str_replace('**', '?', $webbox['url']));

        // Security check
        if (!SecurityUtil::checkPermission('IWwebbox::', '::', ACCESS_READ)) {
            return LogUtil::registerPermissionError();
        }

        // Get the values associated to the parameter ref, if it is set
        if ($webbox['ref']) {
            $record = ModUtil::apiFunc('IWwebbox', 'user', 'getref',
                                        array('ref' => $webbox['ref']));

            // if ref parameter is empty returns an advertisement
            if ($record['ref'] == '') {
                return LogUtil::registerError($this->__('URL not found. Please check the reference'));
            }
            $webbox = array('url' => $record['url'],
                            'width' => $record['width'],
                            'height' => $record['height'],
                            'scrolls' => $record['scrolls'],
                            'widthunit' => $record['widthunit']);
        }

        // Adapt the scrolls value to the required format
        $webbox['scrolls'] = ($webbox['scrolls']) ? 'auto' : 'no';

        // Create output object
        $view = Zikula_View::getInstance('IWwebbox', false);

        // Assign values to template
        $view->assign($webbox);

        // Return the output generated
        return $view->fetch('IWwebbox_user_main.htm');
    }
}