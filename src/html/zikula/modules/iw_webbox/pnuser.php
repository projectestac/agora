<?php
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

function iw_webbox_user_main($args)
{
	$dom=ZLanguage::getModuleDomain('iw_webbox');
	// Get module parameters
	$webbox = array('ref' => FormUtil::getPassedValue('ref', isset($args['ref']) ? $args['ref'] : null, 'GET'),
					'url' => FormUtil::getPassedValue('url', isset($args['url']) ? $args['url'] : pnModGetVar('iw_webbox', 'url'), 'GET'),
					'width' => FormUtil::getPassedValue('w', isset($args['w']) ? $args['w'] : pnModGetVar('iw_webbox', 'width'), 'GET'),
					'height' => FormUtil::getPassedValue('h', isset($args['h']) ? $args['h'] : pnModGetVar('iw_webbox', 'height'), 'GET'),
					'scrolls' =>  FormUtil::getPassedValue('s', isset($args['s']) ? $args['s'] : pnModGetVar('iw_webbox', 'scrolls'), 'GET'),
					'widthunit' =>  FormUtil::getPassedValue('u', isset($args['u']) ? $args['u'] : pnModGetVar('iw_webbox', 'widthunit'), 'GET'));

	// Replace "*" to "&" and "**" to "?" if they are in the URL
	$webbox['url']=str_replace('*','&',str_replace('**','?',$webbox['url']));
	
	// Security check
	if (!SecurityUtil::checkPermission( 'iw_webbox::', '::', ACCESS_READ)) {
		return LogUtil::registerPermissionError();
	}
	
	// Get the values associated to the parameter ref, if it is set
	if($webbox['ref']){
		$record = pnModAPIFunc('iw_webbox','user','getref',array('ref'=>$webbox['ref']));

		// if ref parameter is empty returns an advertisement
		if ($record['ref']=='') {
	        return LogUtil::registerError (__('URL not found. Please check the reference', $dom));
		}
		$webbox = array ('url' => $record['url'],
							'width' => $record['width'],
							'height' => $record['height'],
							'scrolls' => $record['scrolls'],
							'widthunit' => $record['widthunit']);
	}

	// Adapt the scrolls value to the required format
	$webbox['scrolls'] = ($webbox['scrolls'])? 'auto' : 'no';

	// Create output object
	$pnRender = pnRender::getInstance('iw_webbox',false);
	
	// Assign values to template
	$pnRender->assign($webbox);

	// Return the output generated
	return $pnRender->fetch('iw_webbox_user_main.htm');	
}
