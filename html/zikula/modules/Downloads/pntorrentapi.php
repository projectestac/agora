<?php
// -----------------------------------------------------------------------------------
/**
 * Downloads
 *
 * Purpose of file: torrent support
 *
 * @package      Downloads
 * @version      2.4
 * @author       Sascha Jost
 * @link         http://www.cmods-dev.de
 * @copyright    Copyright (C) 2005 by Sascha Jost
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 // -----------------------------------------------------------------------------------


require_Once('modules/Downloads/common.php');

if (version_compare(phpversion(), '5.0.0', '>='))
{
	require_Once('modules/Downloads/pnincludes/File_Bittorrent2/Exception.php');
	require_Once('modules/Downloads/pnincludes/File_Bittorrent2/Encode.php');
	require_Once('modules/Downloads/pnincludes/File_Bittorrent2/MakeTorrent.php');
}

require_Once('modules/Downloads/pnincludes/File_Bittorrent/Encode.php');
require_Once('modules/Downloads/pnincludes/File_Bittorrent/MakeTorrent.php');

/**
 *
 * create the torrent stream
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        $lid
 * @return       torrent file
 */
function Downloads_torrentapi_stream($args)
{
    $dom = ZLanguage::getModuleDomain('Downloads');
    // Security check
    if (!pnSecAuthAction(0, 'Downloads::', '::', ACCESS_READ))
	{
        return errorpage(__FILE__,__LINE__,__('No authorization!', $dom));
    }
        
    $file = pnModAPIFunc('Downloads','user','get_download_info',
									  array('lid' => $args['lid'],
									  		'cid' => 0,
									  		'sort_active' => false, 
									  		'sortby' => 0,  
									  		'cclause' => 0,  
									  		'get_by_cid' => false, 
									  		'get_by_lid' => true,
											'get_by_date' => false,
											'limit' => 1,
											'sort_date' => 0,
											'start'=> 0));
   
    
    $upload_folder = pnModGetVar('downloads','upload_folder');
    
    $filename = $upload_folder . $file['0']['url'];

    $cachedir = pnModGetVar('downloads', 'captcha_cache');

    $torrentFile = $cachedir  . md5($filename) . '.torrent';

    if (!file_exists($torrentFile)) 
	{
	  	// PHP Version check
		if (version_compare(phpversion(), '5.0.0', '>='))
	    {
	      	// for PHP5 
		   	$MakeTorrent = new File_Bittorrent2_MakeTorrent($filename);
		}
		else
		{
			$MakeTorrent = new File_Bittorrent_MakeTorrent($filename);
		}
        

        // Set the announce URL
        $MakeTorrent->setAnnounce(pnGetBaseURL());
        // Set the comment
        $MakeTorrent->setComment($file['0']['title'] . ': ' . $file['0']['description']);
        // Set the piece length (in KB)
        $MakeTorrent->setPieceLength(256);
        // Build the torrent
        $metainfo = $MakeTorrent->buildTorrent();
		
		// write file
        pnModAPIFunc('Downloads', 'torrent', 'write_file', array('torrentFile'=> $torrentFile, 'metainfo'=> $metainfo ));
        
    }
	
	// send header
    header("Content-type: application/x-bittorrent");
    header("Content-Disposition: attachment; filename=" . $torrentFile . ";");
    header("Content-Transfer-Encoding: binary");
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public", false);
    header("Content-Description: File Transfer");

	// read file
    $data = pnModAPIFunc('Downloads', 'torrent', 'read_file', array('torrentFile'=> $torrentFile));
    print $data;
    exit();
}

/**
 *
 * write torrent file
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        $torrentFile
 */
function Downloads_torrentapi_write_file($args)
{
  	// PHP Version check
	if (version_compare(phpversion(), '5.0.0', '>='))
    {
      	// for PHP5 
	   	file_put_contents (pnVarPrepForOS($args['torrentFile']), $args['metainfo']);
	}
	else
	{
	  	// for PHP4 
       	$fd = fopen (pnVarPrepForOS($args['torrentFile']), 'w');
       	
       	if ($fd === false) 
		{
           return false;
       	}
       	fwrite ($fd, $args['metainfo']);
       	fclose ($fd);
	}
}

/**
 *
 * read torrent file
 *
 * @author       Lindbergh
 * @version      1.0
 * @param        $torrentFile
 * @return       file data
 */
function Downloads_torrentapi_read_file($args)
{
	$file = realpath($args['torrentFile']);

    $data = file_get_contents($file);
    
    return $data;	
}