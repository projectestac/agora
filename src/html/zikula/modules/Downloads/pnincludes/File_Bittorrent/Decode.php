<?php

// +----------------------------------------------------------------------+
// | Decode and Encode data in Bittorrent format                          |
// +----------------------------------------------------------------------+
// | Copyright (C) 2004-2006 Markus Tacker <m@tacker.org>                 |
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
* Encode data in Bittorrent format
*
* Based on
*   Original Python implementation by Petru Paler <petru@paler.net>
*   PHP translation by Gerard Krijgsman <webmaster@animesuki.com>
*   Gerard's regular expressions removed by Carl Ritson <critson@perlfu.co.uk>
* Info on the .torrent file format
* BEncoding is a simple, easy to implement method of associating
* data types with information in a file. The values in a torrent
* file are bEncoded.
* There are 4 different data types that can be bEncoded:
* Integers, Strings, Lists and Dictionaries.
* [http://www.monduna.com/bt/faq.html]
*
* @package File_Bittorrent
* @category File
* @author Markus Tacker <m@tacker.org>
* @author Robin H. Johnson <robbat2@gentoo.org>
* @version $Id: Decode.php 65 2006-10-23 10:46:20Z m $
*/

/**
* Include required classes
*/
require_once 'PEAR.php';
require_once 'PHP/Compat.php';

/**
* Load replacement functions
*/
PHP_Compat::loadFunction('file_get_contents');

/**
* Encode data in Bittorrent format
*
* Based on
*   Original Python implementation by Petru Paler <petru@paler.net>
*   PHP translation by Gerard Krijgsman <webmaster@animesuki.com>
*   Gerard's regular expressions removed by Carl Ritson <critson@perlfu.co.uk>
* Info on the .torrent file format
* BEncoding is a simple, easy to implement method of associating
* data types with information in a file. The values in a torrent
* file are bEncoded.
* There are 4 different data types that can be bEncoded:
* Integers, Strings, Lists and Dictionaries.
* [http://www.monduna.com/bt/faq.html]
*
* @package File_Bittorrent
* @category File
* @author Markus Tacker <m@tacker.org>
* @author Robin H. Johnson <robbat2@gentoo.org>
*/
class File_Bittorrent_Decode
{
    /**
    * @var string   Name of the torrent
    */
    var $name = '';

    /**
    * @var string   Filename of the torrent
    */
    var $filename = '';

    /**
    * @var string   Comment
    */
    var $comment = '';

    /**
    * @var int   Creation date as unix timestamp
    */
    var $date = 0;

    /**
    * @var array    Files in the torrent
    */
    var $files = array();

    /**
    * @var int      Size of of the full torrent (after download)
    */
    var $size = 0;

    /**
    * @var string   Signature of the software which created the torrent
    */
    var $created_by = '';

    /**
    * @var string    tracker (the tracker the torrent has been received from)
    */
    var $announce = '';

    /**
    * @var array     List of known trackers for the torrent
    */
    var $announce_list = array();

    /**
    * @var string   Source string
    * @access private
    */
    var $_source = '';

    /**
    * @var int      Source length
    * @access private
    */
    var $_source_length = 0;

    /**
    * @var int      Current position of the string
    * @access private
    */
    var $_position = 0;

    /**
    * @var string   Info hash
    */
    var $info_hash;

    /**
    * @var mixed    The last error object or null if no error has occurred.
    */
    var $last_error;

    /**
    * @var array    Decoded data from File_Bittorrent_Decode::decodeFile()
    */
    var $decoded = array();

    /**
    * Decode a Bencoded string
    *
    * @param string
    * @return mixed
    */
    function decode($str)
    {
        $this->_source = $str;
        $this->_position  = 0;
        $this->_source_length = strlen($this->_source);
        $result = $this->_bdecode();
        if ($this->_position < $this->_source_length) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::decode() - Trailing garbage in file.');
            return false;
        }
        return $result;
    }

    /**
    * Decode .torrent file and accumulate information
    *
    * @param string    Filename
    * @return mixed    Returns an arrayon success or false on error
    */
    function decodeFile($file)
    {
        // Check file
        if (!is_file($file)) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::decode() - Not a file.', null, null, "Given filename '$file' is not a valid file.");
            return false;
        }

        // Reset public attributes
        $this->name          = '';
        $this->filename      = '';
        $this->comment       = '';
        $this->date          = 0;
        $this->files         = array();
        $this->size          = 0;
        $this->created_by    = '';
        $this->announce      = '';
        $this->announce_list = array();
        $this->_position     = 0;
        $this->info_hash     = '';

        // Decode .torrent
        $this->_source = file_get_contents($file);
        $this->_source_length = strlen($this->_source);
        $this->decoded = $this->_bdecode();
        if (!is_array($this->decoded)) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::decode() - Corrupted bencoded data.', null, null, "Failed to decode data from file '$file'.");
            return false;
        }

        // Compute info_hash
        $Encoder = new File_Bittorrent_Encode;
        $this->info_hash = sha1($Encoder->encode($this->decoded['info']));

        // Pull information form decoded data
        $this->filename = basename($file);
        // Name of the torrent - statet by the torrent's author
        $this->name     = $this->decoded['info']['name'];
        // Authors may add comments to a torrent
        if (isset($this->decoded['comment'])) {
            $this->comment = $this->decoded['comment'];
        }
        // Creation date of the torrent as unix timestamp
        if (isset($this->decoded['creation date'])) {
            $this->date = $this->decoded['creation date'];
        }
        // This contains the signature of the application used to create the torrent
        if (isset($this->decoded['created by'])) {
            $this->created_by = $this->decoded['created by'];
        }
        // Get the directory separator
        $sep = (PHP_OS == 'Linux') ? '/' : '\\';
        // There is sometimes an array listing all files
        // in the torrent with their individual filesize
        if (isset($this->decoded['info']['files']) and is_array($this->decoded['info']['files'])) {
            foreach ($this->decoded['info']['files'] as $file) {
                $path = join($sep, $file['path']);
                // We are computing the total size of the download heres
                $this->size += $file['length'];
                $this->files[] = array(
                    'filename' => $path,
                    'size'     => $file['length'],
                );
            }
        // In case the torrent contains only on file
        } elseif (isset($this->decoded['info']['name']))  {
                $this->files[] = array(
                   'filename' => $this->decoded['info']['name'],
                   'size'     => $this->decoded['info']['length'],
                );
        }
        // If the the info->length field is present we are dealing with
        // a single file torrent.
        if (isset($this->decoded['info']['length']) and $this->size == 0) {
            $this->size = $this->decoded['info']['length'];
        }

        // This contains the tracker the torrent has been received from
        if (isset($this->decoded['announce'])) {
            $this->announce = $this->decoded['announce'];
        }

        // This contains a list of all known trackers for this torrent
        if (isset($this->decoded['announce-list']) and is_array($this->decoded['announce-list'])) {
            $this->announce_list = $this->decoded['announce-list'];
        }

        // Currently, I'm not sure how to determine an error
        // Just try to fetch the info from the decoded data
        // and return it
        return array(
            'name'          => $this->name,
            'filename'      => $this->filename,
            'comment'       => $this->comment,
            'date'          => $this->date,
            'created_by'    => $this->created_by,
            'files'         => $this->files,
            'size'          => $this->size,
            'announce'      => $this->announce,
            'announce_list' => $this->announce_list,
        );
    }

    /**
    * Decode a BEncoded String
    *
    * @access private
    * @return mixed    Returns the representation of the data in the BEncoded string or false on error
    */
    function _bdecode()
    {
        switch ($this->_getChar()) {
        case 'i':
            $this->_position++;
            return $this->_decode_int();
            break;
        case 'l':
            $this->_position++;
            return $this->_decode_list();
            break;
        case 'd':
            $this->_position++;
            return $this->_decode_dict();
            break;
        default:
            return $this->_decode_string();
        }
    }

    /**
    * Decode a BEncoded dictionary
    *
    * Dictionaries are prefixed with a d and terminated by an e. They
    * are similar to list, except that items are in key value pairs. The
    * dictionary {"key":"value", "Monduna":"com", "bit":"Torrents", "number":7}
    * would bEncode to d3:key5:value7:Monduna3:com3:bit:8:Torrents6:numberi7ee
    *
    * @access private
    * @return array
    */
    function _decode_dict()
    {
        $return = array();
        $ended = false;
        $lastkey = NULL;
        while ($char = $this->_getChar()) {
            if ($char == 'e') {
                $ended = true;
                break;
            }
            if (!ctype_digit($char)) {
                $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_dict() - Invalid dictionary key.');
                $return = false;
                break;
            }
            $key = $this->_decode_string();
            if (isset($return[$key])) {
                $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_dict() - Duplicate dictionary key.');
                $return = false;
                break;
            }
            if ($key < $lastkey) {
                $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_dict() - Missorted dictionary key.');
                $return = false;
                break;
            }
            $val = $this->_bdecode();
            if ($val === false) {
                $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_dict() - Invalid value.');
                $return = false;
                break;
            }
            $return[$key] = $val;
            $lastkey = $key;
        }
        if (!$ended) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_dict() - Unterminated dictionary.');
            $return = false;
        }
        $this->_position++;
        return $return;
    }

    /**
    * Decode a BEncoded string
    *
    * Strings are prefixed with their length followed by a colon.
    * For example, "Monduna" would bEncode to 7:Monduna and "BitTorrents"
    * would bEncode to 11:BitTorrents.
    *
    * @access private
    * @return string|false
    */
    function _decode_string()
    {
        // Check for bad leading zero
        if (substr($this->_source, $this->_position, 1) == '0' and
        substr($this->_source, $this->_position + 1, 1) != ':') {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_string() - Leading zero in string length.');
            return false;
        }
        // Find position of colon
        // Supress error message if colon is not found which may be caused by a corrupted or wrong encoded string
        if (!$pos_colon = @strpos($this->_source, ':', $this->_position)) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_string() - Colon not found.');
            return false;
        }
        // Get length of string
        $str_length = intval(substr($this->_source, $this->_position, $pos_colon));
        if ($str_length + $pos_colon + 1 > $this->_source_length) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_string() - Input too short for string length.');
            return false;
        }
        // Get string
        if ($str_length === 0) {
            $return = '';
        } else {
            $return = substr($this->_source, $pos_colon + 1, $str_length);
        }
        // Move Pointer after string
        $this->_position = $pos_colon + $str_length + 1;
        return $return;
    }

    /**
    * Decode a BEncoded integer
    *
    * Integers are prefixed with an i and terminated by an e. For
    * example, 123 would bEcode to i123e, -3272002 would bEncode to
    * i-3272002e.
    *
    * @access private
    * @return int
    */
    function _decode_int()
    {
        $pos_e  = strpos($this->_source, 'e', $this->_position);
        $p = $this->_position;
        if ($p === $pos_e) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_int() - Empty integer.');
            return false;
        }
        if (substr($this->_source, $this->_position, 1) == '-') $p++;
        if (substr($this->_source, $p, 1) == '0' and
        ($p != $this->_position or $pos_e > $p+1)) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_int() - Leading zero in integer.');
            return false;
        }
        for ($i = $p; $i < $pos_e-1; $i++) {
            if (!ctype_digit(substr($this->_source, $i, 1))) {
                $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_int() - Non-digit characters in integer.');
                return false;
            }
        }
        // The return value showld be automatically casted to float if the intval would
        // overflow. The "+ 0" accomplishes exactly that, using the internal casting
        // logic of PHP
        $return = substr($this->_source, $this->_position, $pos_e - $this->_position) + 0;
        $this->_position = $pos_e + 1;
        return $return;
    }

    /**
    * Decode a BEncoded list
    *
    * Lists are prefixed with a l and terminated by an e. The list
    * should contain a series of bEncoded elements. For example, the
    * list of strings ["Monduna", "Bit", "Torrents"] would bEncode to
    * l7:Monduna3:Bit8:Torrentse. The list [1, "Monduna", 3, ["Sub", "List"]]
    * would bEncode to li1e7:Mondunai3el3:Sub4:Listee
    *
    * @access private
    * @return array
    */
    function _decode_list()
    {
        $return = array();
        $char = $this->_getChar();
        $p1 = $p2 = 0;
        if ($char === false) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_list() - Unterminated list.');
            return false;
        }
        while ($char !== false && substr($this->_source, $this->_position, 1) != 'e') {
            $p1 = $this->_position;
            $val = $this->_bdecode();
            $p2 = $this->_position;
            // Empty does not work here
            if($p1 == $p2)  {
                $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::_decode_list() - Unterminated list.');
                return false;
            }
            $return[] = $val;
        }
        $this->_position++;
        return $return;
    }

    /**
    * Get the char at the current position
    *
    * @access private
    * @return string|false
    */
    function _getChar()
    {
        if (empty($this->_source)) return false;
        if ($this->_position >= $this->_source_length) return false;
        return substr($this->_source, $this->_position, 1);
    }

    /**
    * Returns the online stats for the torrent
    *
    * @return array|false
    */
    function getStats()
    {
        // Check if we can access remote data
        if (!ini_get('allow_url_fopen')) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::getStats() - "allow_url_fopen" must be enabled.');
            return false;
        }
        // Query the scrape page
        $packed_hash = pack('H*', $this->info_hash);
        $scrape_url = preg_replace('/\/announce$/', '/scrape', $this->announce) . '?info_hash=' . urlencode($packed_hash);
        $scrape_data = file_get_contents($scrape_url);
        $stats = $this->decode($scrape_data);
        if (!isset($stats['files'][$packed_hash])) {
            $this->last_error = PEAR::raiseError('File_Bittorrent_Decode::getStats() - Invalid scrape data: "' . $scrape_data . '"');
            return false;
        }
        return $stats['files'][$packed_hash];
    }
}

?>