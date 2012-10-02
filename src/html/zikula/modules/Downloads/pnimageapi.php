<?php
//-------------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file:  Add gd image support 
 *
 * @package      Downloads
 * @version      2.4
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------

include_once('modules/Downloads/common.php');
include_once('modules/Downloads/pnclasses/ImageResizeClass.php');

/**
 *
 * check supported images types
 *
 * @author       Lindbergh
 * @version      1.1
 * @param        none
 * @return       boolean array
 */
function Downloads_imageapi_check_gd_support()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

    $is_supported = array();

    if (ImageTypes() & IMG_PNG)
    {
        $is_supported['PNG'] = true;
    }

    if (ImageTypes() & IMG_GIF)
    {
        $is_supported['GIF'] = true;
    }
    
    if (ImageTypes() & IMG_JPG)
    {
        $is_supported['JPG'] = true;
    }
    
  return $is_supported;
}

/**
 *
 * wrapper for thumbnail creation
 *
 * @author       Lindbergh
 * @version      2.0
 * @param        $filename
 * @param        $thumbnailpathandname
 * @param        $mimetyp
 * @return       
 */
function Downloads_imageapi_gd_create_thumbnail($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::Add', '::', ACCESS_ADD))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

    extract($args);
	unset($args);

    if	((!isset($filename))||
         (is_numeric($filename)) ||
         (!isset($thumbnailpathandname) )||
         (is_numeric($thumbnailpathandname)) ||
         (!isset($mimetyp))  ||
         (is_numeric($mimetyp)))
	{
       return errorpage(__FILE__,__LINE__, __('Wrong or missing argument passed to the function', $dom) );
    }

    // check the image support from gd
    $imagesupport = pnModAPIFunc('Downloads','image','check_gd_support');

    extract($imagesupport);
	unset($imagesupport);
	
    if(true === $GIF && $mimetyp == "image/gif")
    {
        new ImageResizeGif($filename, $thumbnailpathandname.'.gif', pnModGetVar('downloads', 'thumbnailwidth'),pnModGetVar('downloads', 'thumbnailheight'));
    }
    
    if(true === $JPG && $mimetyp == "image/jpeg")
    {
        new ImageResizeJpeg($filename, $thumbnailpathandname.'.jpg', pnModGetVar('downloads', 'thumbnailwidth'),pnModGetVar('downloads', 'thumbnailheight'));
    }

	if(true === $PNG && $mimetyp == "image/png")
    {
        new ImageResizePng($filename, $thumbnailpathandname.'.png', pnModGetVar('downloads', 'thumbnailwidth'),pnModGetVar('downloads', 'thumbnailheight'));
    }

}

/**
 *
 * resize thumbnails
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        none
 * @return       boolean 
 */
function Downloads_imageapi_resize_thumbnails()
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_ADMIN))
	{
        return errorpage( __FILE__, __LINE__,__('No authorization!', $dom));
    }

    $dbconn =& pnDBGetConn(true);
	$pntable =& pnDBGetTables();

    $dl_downloads_table =   $pntable['downloads_downloads'];
	$dl_downloads_column = &$pntable['downloads_downloads_column'];

	$sql = "SELECT
						$dl_downloads_column[lid]
			FROM 		$dl_downloads_table";

	$result =& $dbconn->Execute($sql);

	if ($dbconn->ErrorNo() != 0)
	{
		return errorpage( __FILE__, __LINE__,__('Database query failed!', $dom).$dbconn->ErrorMsg() );
	}
	
	$screenshotlink = pnModGetVar('downloads', 'screenshotlink');
	
	// delete the files from the server
	for (; !$result->EOF; $result->MoveNext())
	{
	  	list($lid) = $result->fields;
	
	    $screenshot_extensions = array('.gif', '.jpg','.jpeg','.png');
	    
	    //check ext array end delete the old pics
	    foreach($screenshot_extensions as $shotext)
	    {	
	      	if($shotext == '.jpg' || $shotext == '.jpeg')
	        {
		        // resize jpg
		        if(file_exists(pnVarPrepForOS($screenshotlink.$lid.$shotext)))
		        {
		            new ImageResizeJpeg($screenshotlink.$lid.$shotext, $screenshotlink.'tn_'.$lid.$shotext, pnModGetVar('downloads', 'thumbnailwidth'),pnModGetVar('downloads', 'thumbnailheight'));
		        }
	        }
	        
	        if($shotext == '.gif')
	        {
		        // resize gif
		        if(file_exists(pnVarPrepForOS($screenshotlink.$lid.$shotext)))
		        {
		            new ImageResizeGif($screenshotlink.$lid.$shotext, $screenshotlink.'tn_'.$lid.$shotext, pnModGetVar('downloads', 'thumbnailwidth'),pnModGetVar('downloads', 'thumbnailheight'));
		        }
	        }
	        
	        if($shotext == '.png')
	        {
		        // resize png
		        if(file_exists(pnVarPrepForOS($screenshotlink.$lid.$shotext)))
		        {
		            new ImageResizePng($screenshotlink.$lid.$shotext, $screenshotlink.'tn_'.$lid.$shotext, pnModGetVar('downloads', 'thumbnailwidth'),pnModGetVar('downloads', 'thumbnailheight'));
		        }
	        }
	        
	    }

    }
	
	return true;
}

?>