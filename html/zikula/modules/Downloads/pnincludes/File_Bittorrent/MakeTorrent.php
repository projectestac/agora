<?php

// +----------------------------------------------------------------------+
// | Decode and Encode data in Bittorrent format                          |
// +----------------------------------------------------------------------+
// | Copyright (C) 2004-2005                                              |
// |   Justin Jones <j.nagash@gmail.com>                                  |
// |   Markus Tacker <m@tacker.org>                                       |
// +----------------------------------------------------------------------+
// | This library is free software; you can redistribute it and/or        |
// | modify it under the terms of the GNU Lesser General Public           |
// | License as published by the Free Software Foundation; either         |
// | version 2.1 of the License, or (at your option) any later version.   |
// |                                                                      |
// | This library is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU    |
// | Lesser General Public License for more details.                      |
// |                                                                      |
// | You should have received a copy of the GNU Lesser General Public     |
// | License along with this library; if not, write to the                |
// | Free Software Foundation, Inc.                                       |
// | 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA               |
// +----------------------------------------------------------------------+

/**
 * Provides a class for making .torrent files
 * from a file or directory. Produces virtually
 * identical torrent files as btmaketorrent.py
 * from Bram Cohen's original BT client.
 *
 * @author Justin Jones <j.nagash@gmail.com>
 * @author Markus Tacker <m@tacker.org>
 * @version $Id: MakeTorrent.php 56 2006-07-02 17:14:17Z m $
 * @package File_Bittorrent
 * @category File
 */

/**
 * Include required classes
 */
require_once 'PEAR.php';

/**
 * Provides a class for making .torrent files
 * from a file or directory. Produces virtually
 * identical torrent files as btmaketorrent.py
 * from Bram Cohen's original BT client.
 *
 * @author Justin Jones <j.nagash@gmail.com>
 * @author Markus Tacker <m@tacker.org>
 * @package File_Bittorrent
 * @category File
 */
class File_Bittorrent_MakeTorrent
{
    /**
     * @var string Path to the file or directory to create the torrent from.
     * @access private
     */
    var $_path = '';

    /**
     * @var bool Whether or not $path is a file
     * @access private
     */
    var $_is_file = false;

    /**
     * @var bool Where or not $path is a directory
     */
    var $_is_dir = false;

    /**
     * @var string The .torrent announce URL
     * @access private
     */
    var $_announce = '';

    /**
     * @var array The .torrent announce_list extension
     * @access private
     */
    var $_announce_list = array();

    /**
     * @var string The .torrent comment
     * @access private
     */
    var $_comment = '';

    /**
     * @var string The .torrent created by string
     * @access private
     */
    var $_created_by = 'File_Bittorrent_MakeTorrent $Rev: 56 $. http://pear.php.net/package/File_Bittorrent';

    /**
     * @var string The .torrent suggested name (file/dir)
     * @access private
     */
    var $_name = '';

    /**
     * @var string The .torrent packed piece data
     * @access private
     */
    var $_pieces = '';

    /**
     * @var int The size of each piece in bytes.
     * @access private
     */
    var $_piece_length = 524288;

    /**
     * @var array The list of files (if this is a multi-file torrent)
     * @access private
     */
    var $_files = array();

    /**
     * @var string|false The data gap used to join two files into the same piece. string if it contains data or false
     * @access private
     */
    var $_data_gap = false;

    /**
    * @var resource file pointer
    * @access private
    */
    var $_fp;

    /**
    * @var mixed    The last error object or null if no error has occurred.
    */
    var $last_error;

    /**
     * Constructor
     *
     * Sets up the path to the file/dir to create
     * a torrent from
     *
     * @param string Path to use
     */
    function File_Bittorrent_MakeTorrent($path)
    {
        $this->setPath($path);
    }

    /**
     * Function to set the announce URL for
     * the .torrent file
     *
     * @param string announce url
     * @return bool
     */
    function setAnnounce($announce)
    {
        $this->_announce = strval($announce);
        return true;
    }

    /**
     * Function to set the announce list for
     * the .torrent file
     *
     * @param array announce list
     * @return bool
     */
    function setAnnounceList($announce_list)
    {
        if (!is_array($announce_list)) {
            $this->last_error = PEAR::raiseError(__CLASS__ . '::'. __FUNCTION__ . '() - No array given.');
            return false;
        }
        $this->_announce_list = $announce_list;
        return true;
    }

    /**
     * Function to set the comment for the
     * .torrent file
     *
     * @param string comment
     * @return bool
     */
    function setComment($comment)
    {
        $this->_comment = strval($comment);
        return true;
    }

    /**
     * Function to set the path for the
     * file/dir to make the .torrent for
     * Can also be set through the constructor.
     *
     * @param string path to file/dir
     * @return bool
     */
    function setPath($path)
    {
        $this->_path = $path;
        if (is_dir($path)) {
            $this->_is_dir = true;
            $this->_name = basename($path);
        } else if (is_file($path)) {
            $this->_is_file = true;
            $this->_name = basename($path);
        } else {
            $this->_path = '';
        }
        return true;
    }

    /**
     * Function to set the piece length for
     * the .torrent file.
     * min: 32 (32KB), max: 4096 (4MB)
     *
     * @param int piece length in kilobytes
     * @return bool
     */
    function setPieceLength($piece_length)
    {
        if ($piece_length < 32 or $piece_length > 4096) {
            $this->last_error = PEAR::raiseError(__CLASS__ . '::'. __FUNCTION__ . '() - Invalid piece lenth: "' . $piece_length . '"');
            return false;
        }
        $this->_piece_length = $piece_length * 1024;
        return true;
    }

    /**
     * Function to build the .torrent file
     * based on the parameters you have set
     * with the set* functions.
     *
     * @return mixed false on failure or a string containing the metainfo
     */
    function buildTorrent()
    {
        if ($this->_is_file) {
            if (!$info = $this->_addFile($this->_path)) {
                return false;
            }
            if (!$metainfo = $this->_encodeTorrent($info)) {
                return false;
            }
        } else if ($this->_is_dir) {
            if (!$diradd_ok = $this->_addDir($this->_path)) {
                return false;
            }
            $metainfo = $this->_encodeTorrent();
        } else {
            $this->last_error = PEAR::raiseError(__CLASS__ . '::'. __FUNCTION__ . '() - You must provide a file or directory.');
            return false;
        }
        return $metainfo;
    }

    /**
     * Internal function which bencodes the data
     * into a valid torrent metainfo string
     *
     * @param array file data
     * @return mixed false on failure or the bencoded metainfo string
     * @access private
     */
    function _encodeTorrent($info = array())
    {
        $bencdata = array();
        $bencdata['info'] = array();
        if ($this->_is_file) {
            $bencdata['info']['length'] = $info['length'];
            $bencdata['info']['md5sum'] = $info['md5sum'];
        } else if ($this->_is_dir) {
            if ($this->_data_gap !== false) {
                $this->_pieces .= pack('H*', sha1($this->_data_gap));
                $this->_data_gap = false;
            }
            $bencdata['info']['files'] = $this->_files;
        } else {
            $this->last_error = PEAR::raiseError(__CLASS__ . '::'. __FUNCTION__ . '() - Use ' .  __CLASS__ . '::setPath() to define a file or directory.');
            return false;
        }
        $bencdata['info']['name']         = $this->_name;
        $bencdata['info']['piece length'] = $this->_piece_length;
        $bencdata['info']['pieces']       = $this->_pieces;
        $bencdata['announce']             = $this->_announce;
        $bencdata['creation date']        = time();
        $bencdata['comment']              = $this->_comment;
        $bencdata['created by']           = $this->_created_by;
        // $bencdata['announce-list'] = array($this->_announce)
        // Encode it
        $Encoder = new File_Bittorrent_Encode;
        return $Encoder->encode_array($bencdata);
    }

    /**
     * Internal function which generates
     * metainfo data for a file
     *
     * @param string path to the file
     * @return mixed false on failure or file metainfo data
     * @access private
     */
    function _addFile($file)
    {
        if (!$this->_openFile($file)) {
            $this->last_error = PEAR::raiseError(__CLASS__ . '::'. __FUNCTION__ . "() - Failed to open file '$file'.");
            return false;
        }

        $filelength = 0;
        $md5sum = md5_file($file);

        while (!feof($this->_fp)) {
            $data = '';
            $datalength = 0;

            if ($this->_is_dir && $this->_data_gap !== false) {
                $data = $this->_data_gap;
                $datalength = strlen($data);
                $this->_data_gap = false;
            }

            while (!feof($this->_fp) && ($datalength < $this->_piece_length)) {
                $readlength = 8192;
                if (($datalength + 8192) > $this->_piece_length) {
                    $readlength = $this->_piece_length - $datalength;
                }

                $tmpdata = fread($this->_fp, $readlength);
                $actual_readlength = strlen($tmpdata);
                $datalength += $actual_readlength;
                $filelength += $actual_readlength;

                $data .= $tmpdata;

                flush();
            }

            // We've either reached the end of the file, or
            // we have a whole piece, or both.
            if ($datalength == $this->_piece_length) {
                // We have a piece.
                $this->_pieces .= pack('H*', sha1($data));
            }
            if (($datalength != $this->_piece_length) && feof($this->_fp)) {
                // We've reached the end of the file, and
                // we dont have a whole piece.
                if ($this->_is_dir) {
                    $this->_data_gap = $data;
                } else {
                    $this->_pieces .= pack('H*', sha1($data));
                }
            }
        }

        // Close the file pointer.
        $this->_closeFile();
        $info = array(
            'length' => $filelength,
            'md5sum' => $md5sum
        );
        return $info;
    }

    /**
     * Internal function which iterates through
     * directories and subdirectories, using
     * _addFile for each file it finds.
     *
     * @param string path to the directory
     * @return void
     * @access private
     */
    function _addDir($path)
    {
        $filelist = $this->_dirList($path);
        sort($filelist);

        foreach ($filelist as $file) {
            $filedata = $this->_addFile($file);
            if ($filedata !== false) {
                $filedata['path'] = array();
                $filedata['path'][] = basename($file);
                $dirname = dirname($file);
                while (basename($dirname) != $this->_name) {
                    $filedata['path'][] = basename($dirname);
                    $dirname = dirname($dirname);
                }
                $filedata['path'] = array_reverse($filedata['path'], false);
                $this->_files[] = $filedata;
            }
        }
        return true;
    }

    /**
     * Internal function which recurses through
     * subdirectory and returns an array of file paths
     *
     * @param string path to the directory
     * @return array file list
     * @access private
     */
    function _dirList($dir)
    {
        $dir = realpath($dir);
        $file_list = '';
        $stack[] = $dir;

        while ($stack) {
            $current_dir = array_pop($stack);
            if ($dh = opendir($current_dir)) {
                while ( ($file = readdir($dh)) !== false ) {
                    if ($file{0} =='.') continue;
                    $current_file = $current_dir . '/' . $file;
                    if (is_file($current_file)) {
                        $file_list[] = $current_dir . '/' . $file;
                    } else if (is_dir($current_file)) {
                        $stack[] = $current_file;
                    }
                }
            }
        }
        return $file_list;
    }

    /**
     * Internal function to get the filesize
     * of a file. Workaround for files >2GB.
     *
     * @param string path to the file
     * @return int the filesize
     * @access private
     */
    function _filesize($file)
    {
        $size = @filesize($file);
        if ($size == 0) {
            if (PHP_OS != 'Linux') return false;
            $size = exec('du -b ' . escapeshellarg($file));
        }
        return $size;
    }

    /**
     * Internal function to open a file.
     * Workaround for files >2GB using popen
     *
     * @param string path to the file
     * @return bool
     * @access private
     */
    function _openFile($file)
    {
        $fsize = $this->_filesize($file);
        if ($fsize <= 2*1024*1024*1024) {
            if (!$this->_fp = fopen($file, 'r')) {
                $this->last_error = PEAR::raiseError(__CLASS__ . '::'. __FUNCTION__ . '() - Failed to open "' . $file . '"');
                return false;
            }
            $this->_fopen = true;
        } else {
            if (PHP_OS != 'Linux') {
                $this->last_error = PEAR::raiseError(__CLASS__ . '::'. __FUNCTION__ . '() - File size is greater than 2GB. This is only supported under Linux.');
                return false;
            }
            $this->_fp = popen('cat ' . escapeshellarg($file), 'r');
            $this->_fopen = false;
        }
        return true;
    }

    /**
     * Internal function to close a file pointer
     *
     * @access private
     */
    function _closeFile()
    {
        if ($this->_fopen) {
            fclose($this->_fp);
        } else {
            pclose($this->_fp);
        }
    }
}

?>