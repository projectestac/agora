<?php
/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */

class Downloads_Util
{

    public static function getModuleDefaults()
    {
        return array(
            'perpage' => 10,
            'newdownloads' => 5,
            'topdownloads' => 5,
            'ratexdlsamount' => 5,
            'topxdlsamount' => 5,
            'lastxdlsamount' => 5,
            'ratexdlsactive' => false,
            'topxdlsactive' => false,
            'lastxdlsactive' => false,
            'allowupload' => true,
            'securedownload' => true,
            'sizelimit' => true,
            'limitsize' => '5-Mb',
            'showscreenshot' => true,
            'thumbnailwidth' => 100,
            'thumbnailheight' => 100,
            'screenshotmaxsize' => '2-Mb',
            'thumbnailmaxsize' => '1-Mb',
            'limit_extension' => true,
            'allowscreenshotupload' => true,
            'importfrommod' => false,
            'sessionlimit' => false,
            'sessiondownloadlimit' => 8,
            'captchacharacters' => 5,
            'notifymail' => ' ',
            'inform_user' => true,
            'gd' => extension_loaded('gd'),
            'securedownload' => extension_loaded('gd') ? null : 'no',
            'fulltext' => false,
            'sortby' => 'title',
            'cclause' => 'ASC',
            'popular' => 10,
            'torrent' => false,
            'upload_folder' => FileUtil::getDataDirectory() . '/Downloads',
            'screenshot_folder' => '',
            'cache_folder' => '',
            'treeview' => false,
        );
    }

    /**
     * Returns content type for the file type
     * @param string extension 
     * @returns string mimetype
     */
    public static function getContentType($args)
    {
        if (!isset($args['extension']) || is_numeric($args['extension'])) {
            return false;
        }

        $mime_extension_map = self::extensionMap();

        // check for no extension
        if (empty($args['extension'])) {
            return 'application/octet-stream';
        }

        $ext = '.' . $args['extension']; // add dot
        
        if (array_key_exists($ext, $mime_extension_map)) {
            $MIME_type = $mime_extension_map[$ext];
        } else {
            $MIME_type = 'application/octet-stream';
        }
        return $MIME_type;
    }

    /**
     * provide extension map
     *
     * @returns array 
     */
    public static function extensionMap()
    {
        // This list taken from http://reference.sitepoint.com/html/mime-types-full
        // duplicates attempted to be removed
        $mime_extension_map = array(
            '.3dm' => 'x-world/x-3dmf',
            '.3dmf' => 'x-world/x-3dmf',
            '.a' => 'application/octet-stream',
            '.aab' => 'application/x-authorware-bin',
            '.aam' => 'application/x-authorware-map',
            '.aas' => 'application/x-authorware-seg',
            '.abc' => 'text/vnd.abc',
            '.acgi' => 'text/html',
            '.afl' => 'video/animaflex',
            '.ai' => 'application/postscript',
            '.aif' => 'audio/aiff',
            '.aifc' => 'audio/aiff',
            '.aiff' => 'audio/aiff',
            '.aim' => 'application/x-aim',
            '.aip' => 'text/x-audiosoft-intra',
            '.ani' => 'application/x-navi-animation',
            '.aos' => 'application/x-nokia-9000-communicator-add-on-software',
            '.aps' => 'application/mime',
            '.arc' => 'application/octet-stream',
            '.arj' => 'application/octet-stream',
            '.art' => 'image/x-jg',
            '.asf' => 'video/x-ms-asf',
            '.asm' => 'text/x-asm',
            '.asp' => 'text/asp',
            '.asx' => 'application/x-mplayer2',
            '.au' => 'audio/basic',
            '.avi' => 'video/avi',
            '.avs' => 'video/avs-video',
            '.bcpio' => 'application/x-bcpio',
            '.bin' => 'application/octet-stream',
            '.bm' => 'image/bmp',
            '.bmp' => 'image/bmp',
            '.boo' => 'application/book',
            '.book' => 'application/book',
            '.boz' => 'application/x-bzip2',
            '.bsh' => 'application/x-bsh',
            '.bz' => 'application/x-bzip',
            '.bz2' => 'application/x-bzip2',
            '.c' => 'text/plain',
            '.c++' => 'text/plain',
            '.cat' => 'application/vnd.ms-pki.seccat',
            '.cc' => 'text/plain',
            '.ccad' => 'application/clariscad',
            '.cco' => 'application/x-cocoa',
            '.cdf' => 'application/cdf',
            '.cer' => 'application/pkix-cert',
            '.cha' => 'application/x-chat',
            '.chat' => 'application/x-chat',
            '.class' => 'application/java',
            '.com' => 'application/octet-stream',
            '.conf' => 'text/plain',
            '.cpio' => 'application/x-cpio',
            '.cpp' => 'text/x-c',
            '.cpt' => 'application/x-cpt',
            '.crl' => 'application/pkix-crl',
            '.crt' => 'application/pkix-cert',
            '.csh' => 'application/x-csh',
            '.css' => 'text/css',
            '.cxx' => 'text/plain',
            '.dcr' => 'application/x-director',
            '.deepv' => 'application/x-deepv',
            '.def' => 'text/plain',
            '.der' => 'application/x-x509-ca-cert',
            '.dif' => 'video/x-dv',
            '.dir' => 'application/x-director',
            '.dl' => 'video/dl',
            '.doc' => 'application/msword',
            '.docx' => 'application/msword',
            '.dot' => 'application/msword',
            '.dp' => 'application/commonground',
            '.drw' => 'application/drafting',
            '.dump' => 'application/octet-stream',
            '.dv' => 'video/x-dv',
            '.dvi' => 'application/x-dvi',
            '.dwf' => 'model/vnd.dwf',
            '.dwg' => 'application/acad',
            '.dxf' => 'application/dxf',
            '.dxr' => 'application/x-director',
            '.el' => 'text/x-script.elisp',
            '.elc' => 'application/x-elc',
            '.env' => 'application/x-envoy',
            '.eps' => 'application/postscript',
            '.es' => 'application/x-esrehber',
            '.etx' => 'text/x-setext',
            '.evy' => 'application/envoy',
            '.exe' => 'application/octet-stream',
            '.f' => 'text/plain',
            '.f77' => 'text/x-fortran',
            '.f90' => 'text/plain',
            '.fdf' => 'application/vnd.fdf',
            '.fif' => 'application/fractals',
            '.fli' => 'video/fli',
            '.flo' => 'image/florian',
            '.flx' => 'text/vnd.fmi.flexstor',
            '.fmf' => 'video/x-atomic3d-feature',
            '.for' => 'text/plain',
            '.fpx' => 'image/vnd.fpx',
            '.frl' => 'application/freeloader',
            '.funk' => 'audio/make',
            '.g' => 'text/plain',
            '.g3' => 'image/g3fax',
            '.gif' => 'image/gif',
            '.gl' => 'video/gl',
            '.gsd' => 'audio/x-gsm',
            '.gsm' => 'audio/x-gsm',
            '.gsp' => 'application/x-gsp',
            '.gss' => 'application/x-gss',
            '.gtar' => 'application/x-gtar',
            '.gz' => 'application/x-gzip',
            '.gzip' => 'application/x-gzip',
            '.h' => 'text/plain',
            '.hdf' => 'application/x-hdf',
            '.help' => 'application/x-helpfile',
            '.hgl' => 'application/vnd.hp-hpgl',
            '.hh' => 'text/plain',
            '.hlb' => 'text/x-script',
            '.hlp' => 'application/hlp',
            '.hpg' => 'application/vnd.hp-hpgl',
            '.hpgl' => 'application/vnd.hp-hpgl',
            '.hqx' => 'application/binhex',
            '.hta' => 'application/hta',
            '.htc' => 'text/x-component',
            '.htm' => 'text/html',
            '.html' => 'text/html',
            '.htmls' => 'text/html',
            '.htt' => 'text/webviewhtml',
            '.htx' => 'text/html',
            '.ice' => 'x-conference/x-cooltalk',
            '.ico' => 'image/x-icon',
            '.idc' => 'text/plain',
            '.ief' => 'image/ief',
            '.iefs' => 'image/ief',
            '.iges' => 'application/iges',
            '.igs' => 'application/iges',
            '.ima' => 'application/x-ima',
            '.imap' => 'application/x-httpd-imap',
            '.inf' => 'application/inf',
            '.ins' => 'application/x-internett-signup',
            '.ip' => 'application/x-ip2',
            '.isu' => 'video/x-isvideo',
            '.it' => 'audio/it',
            '.iv' => 'application/x-inventor',
            '.ivr' => 'i-world/i-vrml',
            '.ivy' => 'application/x-livescreen',
            '.jam' => 'audio/x-jam',
            '.jav' => 'text/plain',
            '.java' => 'text/plain',
            '.jcm' => 'application/x-java-commerce',
            '.jfif' => 'image/jpeg',
            '.jfif-tbnl' => 'image/jpeg',
            '.jpe' => 'image/jpeg',
            '.jpeg' => 'image/jpeg',
            '.jpg' => 'image/jpeg',
            '.jps' => 'image/x-jps',
            '.js' => 'text/javascript',
            '.jut' => 'image/jutvision',
            '.kar' => 'audio/midi',
            '.ksh' => 'application/x-ksh',
            '.la' => 'audio/nspaudio',
            '.lam' => 'audio/x-liveaudio',
            '.latex' => 'application/x-latex',
            '.lha' => 'application/octet-stream',
            '.lhx' => 'application/octet-stream',
            '.list' => 'text/plain',
            '.lma' => 'audio/nspaudio',
            '.log' => 'text/plain',
            '.lsp' => 'application/x-lisp',
            '.lst' => 'text/plain',
            '.lsx' => 'text/x-la-asf',
            '.ltx' => 'application/x-latex',
            '.lzh' => 'application/octet-stream',
            '.lzx' => 'application/octet-stream',
            '.m' => 'text/plain',
            '.m1v' => 'video/mpeg',
            '.m2a' => 'audio/mpeg',
            '.m2v' => 'video/mpeg',
            '.m3u' => 'audio/x-mpequrl',
            '.man' => 'application/x-troff-man',
            '.map' => 'application/x-navimap',
            '.mar' => 'text/plain',
            '.mbd' => 'application/mbedlet',
            '.mc$' => 'application/x-magic-cap-package-1.0',
            '.mcd' => 'application/mcad',
            '.mcf' => 'text/mcf',
            '.mcp' => 'application/netmc',
            '.me' => 'application/x-troff-me',
            '.mht' => 'message/rfc822',
            '.mhtml' => 'message/rfc822',
            '.mid' => 'audio/midi',
            '.midi' => 'audio/midi',
            '.mif' => 'application/x-mif',
            '.mime' => 'message/rfc822',
            '.mjf' => 'audio/x-vnd.audioexplosion.mjuicemediafile',
            '.mjpg' => 'video/x-motion-jpeg',
            '.mm' => 'application/base64',
            '.mme' => 'application/base64',
            '.mod' => 'audio/mod',
            '.moov' => 'video/quicktime',
            '.mov' => 'video/quicktime',
            '.movie' => 'video/x-sgi-movie',
            '.mp2' => 'audio/mpeg',
            '.mp3' => 'audio/mpeg3',
            '.mpa' => 'audio/mpeg',
            '.mpc' => 'application/x-project',
            '.mpe' => 'video/mpeg',
            '.mpeg' => 'video/mpeg',
            '.mpg' => 'audio/mpeg',
            '.mpga' => 'audio/mpeg',
            '.mpp' => 'application/vnd.ms-project',
            '.mpt' => 'application/x-project',
            '.mpv' => 'application/x-project',
            '.mpx' => 'application/x-project',
            '.mrc' => 'application/marc',
            '.ms' => 'application/x-troff-ms',
            '.mv' => 'video/x-sgi-movie',
            '.my' => 'audio/make',
            '.mzz' => 'application/x-vnd.audioexplosion.mzz',
            '.nap' => 'image/naplps',
            '.naplps' => 'image/naplps',
            '.nc' => 'application/x-netcdf',
            '.ncm' => 'application/vnd.nokia.configuration-message',
            '.nif' => 'image/x-niff',
            '.niff' => 'image/x-niff',
            '.nix' => 'application/x-mix-transfer',
            '.nsc' => 'application/x-conference',
            '.nvd' => 'application/x-navidoc',
            '.o' => 'application/octet-stream',
            '.oda' => 'application/oda',
            '.omc' => 'application/x-omc',
            '.omcd' => 'application/x-omcdatamaker',
            '.omcr' => 'application/x-omcregerator',
            '.p' => 'text/x-pascal',
            '.p10' => 'application/pkcs10',
            '.p12' => 'application/pkcs-12',
            '.p7a' => 'application/x-pkcs7-signature',
            '.p7c' => 'application/pkcs7-mime',
            '.p7m' => 'application/pkcs7-mime',
            '.p7r' => 'application/x-pkcs7-certreqresp',
            '.p7s' => 'application/pkcs7-signature',
            '.part' => 'application/pro_eng',
            '.pas' => 'text/pascal',
            '.pbm' => 'image/x-portable-bitmap',
            '.pcl' => 'application/vnd.hp-pcl',
            '.pct' => 'image/x-pict',
            '.pcx' => 'image/x-pcx',
            '.pdb' => 'chemical/x-pdb',
            '.pdf' => 'application/pdf',
            '.pfunk' => 'audio/make',
            '.pgm' => 'image/x-portable-graymap',
            '.pic' => 'image/pict',
            '.pict' => 'image/pict',
            '.pkg' => 'application/x-newton-compatible-pkg',
            '.pko' => 'application/vnd.ms-pki.pko',
            '.pl' => 'text/plain',
            '.plx' => 'application/x-pixclscript',
            '.pm' => 'image/x-xpixmap',
            '.pm4' => 'application/x-pagemaker',
            '.pm5' => 'application/x-pagemaker',
            '.png' => 'image/png',
            '.pnm' => 'application/x-portable-anymap',
            '.pot' => 'application/mspowerpoint',
            '.pov' => 'model/x-pov',
            '.ppa' => 'application/vnd.ms-powerpoint',
            '.ppm' => 'image/x-portable-pixmap',
            '.pps' => 'application/mspowerpoint',
            '.ppt' => 'application/powerpoint',
            '.ppz' => 'application/mspowerpoint',
            '.pre' => 'application/x-freelance',
            '.prt' => 'application/pro_eng',
            '.ps' => 'application/postscript',
            '.psd' => 'application/octet-stream',
            '.pvu' => 'paleovu/x-pv',
            '.pwz' => 'application/vnd.ms-powerpoint',
            '.py' => 'text/x-script.phyton',
            '.pyc' => 'applicaiton/x-bytecode.python',
            '.qcp' => 'audio/vnd.qcelp',
            '.qd3' => 'x-world/x-3dmf',
            '.qd3d' => 'x-world/x-3dmf',
            '.qif' => 'image/x-quicktime',
            '.qt' => 'video/quicktime',
            '.qtc' => 'video/x-qtc',
            '.qti' => 'image/x-quicktime',
            '.qtif' => 'image/x-quicktime',
            '.ra' => 'audio/x-pn-realaudio',
            '.ra' => 'audio/x-realaudio',
            '.ram' => 'audio/x-pn-realaudio',
            '.ras' => 'image/cmu-raster',
            '.rast' => 'image/cmu-raster',
            '.rexx' => 'text/x-script.rexx',
            '.rf' => 'image/vnd.rn-realflash',
            '.rgb' => 'image/x-rgb',
            '.rm' => 'audio/x-pn-realaudio',
            '.rmi' => 'audio/mid',
            '.rmm' => 'audio/x-pn-realaudio',
            '.rmp' => 'audio/x-pn-realaudio',
            '.rng' => 'application/ringing-tones',
            '.rnx' => 'application/vnd.rn-realplayer',
            '.roff' => 'application/x-troff',
            '.rp' => 'image/vnd.rn-realpix',
            '.rpm' => 'audio/x-pn-realaudio-plugin',
            '.rt' => 'text/richtext',
            '.rtf' => 'application/rtf',
            '.rtx' => 'text/richtext',
            '.rv' => 'video/vnd.rn-realvideo',
            '.s' => 'text/x-asm',
            '.s3m' => 'audio/s3m',
            '.saveme' => 'application/octet-stream',
            '.sbk' => 'application/x-tbook',
            '.scm' => 'application/x-lotusscreencam',
            '.sdml' => 'text/plain',
            '.sdp' => 'application/sdp',
            '.sdr' => 'application/sounder',
            '.sea' => 'application/sea',
            '.set' => 'application/set',
            '.sgm' => 'text/sgml',
            '.sgml' => 'text/sgml',
            '.sh' => 'text/x-script.sh',
            '.shar' => 'application/x-bsh',
            '.shtml' => 'text/html',
            '.sid' => 'audio/x-psid',
            '.sit' => 'application/x-stuffit',
            '.skd' => 'application/x-koan',
            '.skm' => 'application/x-koan',
            '.skp' => 'application/x-koan',
            '.skt' => 'application/x-koan',
            '.sl' => 'application/x-seelogo',
            '.smi' => 'application/smil',
            '.smil' => 'application/smil',
            '.snd' => 'audio/basic',
            '.sol' => 'application/solids',
            '.spc' => 'text/x-speech',
            '.spl' => 'application/futuresplash',
            '.spr' => 'application/x-sprite',
            '.sprite' => 'application/x-sprite',
            '.src' => 'application/x-wais-source',
            '.ssi' => 'text/x-server-parsed-html',
            '.ssm' => 'application/streamingmedia',
            '.sst' => 'application/vnd.ms-pki.certstore',
            '.step' => 'application/step',
            '.stl' => 'application/sla',
            '.stp' => 'application/step',
            '.sv4cpio' => 'application/x-sv4cpio',
            '.sv4crc' => 'application/x-sv4crc',
            '.svf' => 'image/vnd.dwg',
            '.svr' => 'application/x-world',
            '.swf' => 'application/x-shockwave-flash',
            '.t' => 'application/x-troff',
            '.talk' => 'text/x-speech',
            '.tar' => 'application/x-tar',
            '.tbk' => 'application/toolbook',
            '.tcl' => 'application/x-tcl',
            '.tcsh' => 'text/x-script.tcsh',
            '.tex' => 'application/x-tex',
            '.texi' => 'application/x-texinfo',
            '.texinfo' => 'application/x-texinfo',
            '.text' => 'text/plain',
            '.tgz' => 'application/x-compressed',
            '.tif' => 'image/tiff',
            '.tiff' => 'image/tiff',
            '.tr' => 'application/x-troff',
            '.tsi' => 'audio/tsp-audio',
            '.tsp' => 'audio/tsplayer',
            '.tsv' => 'text/tab-separated-values',
            '.turbot' => 'image/florian',
            '.txt' => 'text/plain',
            '.uil' => 'text/x-uil',
            '.uni' => 'text/uri-list',
            '.unis' => 'text/uri-list',
            '.unv' => 'application/i-deas',
            '.uri' => 'text/uri-list',
            '.uris' => 'text/uri-list',
            '.ustar' => 'application/x-ustar',
            '.uu' => 'application/octet-stream',
            '.uue' => 'text/x-uuencode',
            '.vcd' => 'application/x-cdlink',
            '.vcs' => 'text/x-vcalendar',
            '.vda' => 'application/vda',
            '.vdo' => 'video/vdo',
            '.vew' => 'application/groupwise',
            '.viv' => 'video/vivo',
            '.vivo' => 'video/vivo',
            '.vmd' => 'application/vocaltec-media-desc',
            '.vmf' => 'application/vocaltec-media-file',
            '.voc' => 'audio/voc',
            '.vos' => 'video/vosaic',
            '.vox' => 'audio/voxware',
            '.vqe' => 'audio/x-twinvq-plugin',
            '.vqf' => 'audio/x-twinvq',
            '.vql' => 'audio/x-twinvq-plugin',
            '.vrml' => 'model/vrml',
            '.vrt' => 'x-world/x-vrt',
            '.vsd' => 'application/x-visio',
            '.vst' => 'application/x-visio',
            '.vsw' => 'application/x-visio',
            '.w60' => 'application/wordperfect6.0',
            '.w61' => 'application/wordperfect6.1',
            '.w6w' => 'application/msword',
            '.wav' => 'audio/wav',
            '.wb1' => 'application/x-qpro',
            '.wbmp' => 'image/vnd.wap.wbmp',
            '.web' => 'application/vnd.xara',
            '.wiz' => 'application/msword',
            '.wk1' => 'application/x-123',
            '.wmf' => 'windows/metafile',
            '.wml' => 'text/vnd.wap.wml',
            '.wmlc' => 'application/vnd.wap.wmlc',
            '.wmls' => 'text/vnd.wap.wmlscript',
            '.wmlsc' => 'application/vnd.wap.wmlscriptc',
            '.word' => 'application/msword',
            '.wp' => 'application/wordperfect',
            '.wp5' => 'application/wordperfect',
            '.wp6' => 'application/wordperfect',
            '.wpd' => 'application/wordperfect',
            '.wq1' => 'application/x-lotus',
            '.wri' => 'application/mswrite',
            '.wrl' => 'model/vrml',
            '.wrz' => 'model/vrml',
            '.wsc' => 'text/scriplet',
            '.wsrc' => 'application/x-wais-source',
            '.wtk' => 'application/x-wintalk',
            '.xbm' => 'image/x-xbitmap',
            '.xbm' => 'image/xbm',
            '.xdr' => 'video/x-amt-demorun',
            '.xgz' => 'xgl/drawing',
            '.xif' => 'image/vnd.xiff',
            '.xl' => 'application/excel',
            '.xla' => 'application/excel',
            '.xlb' => 'application/excel',
            '.xlc' => 'application/excel',
            '.xld' => 'application/excel',
            '.xlk' => 'application/excel',
            '.xll' => 'application/excel',
            '.xlm' => 'application/excel',
            '.xls' => 'application/excel',
            '.xlsx' => 'application/excel',
            '.xlt' => 'application/excel',
            '.xlv' => 'application/excel',
            '.xlw' => 'application/excel',
            '.xm' => 'audio/xm',
            '.xml' => 'text/xml',
            '.xmz' => 'xgl/movie',
            '.xpix' => 'application/x-vnd.ls-xpix',
            '.xpm' => 'image/xpm',
            '.x-png' => 'image/png',
            '.xsr' => 'video/x-amt-showrun',
            '.xwd' => 'image/x-xwd',
            '.xyz' => 'chemical/x-pdb',
            '.z' => 'application/x-compressed',
            '.zip' => 'multipart/x-zip',
            '.zoo' => 'application/octet-stream',
            '.zsh' => 'text/x-script.zsh',
        );

        return $mime_extension_map;
    }

    /**
     * format category list for selectbox
     * @param       $cid
     * @return      string		list of categories
     */
    public static function getCatSelectList($args)
    {
        $dom    = ZLanguage::getModuleDomain('Downloads');
        $cid = (!isset($args['cid']) || !is_numeric($args['cid'])) ? 0 : $args['cid'];
        $sel = (!isset($args['sel']) || !is_numeric($args['sel'])) ? 0 : $args['sel'];
        $includeAll = isset($args['includeall']) ? true : false;
        $em = ServiceUtil::getService('doctrine.entitymanager');
        $categories = $em->getRepository('Downloads_Entity_Categories')->findBy(array('pid' => $cid));
        $categories_list = "";
        foreach ($categories as $catinfo) {
            $selected = ($sel == $catinfo->getCid()) ? ' selected="selected"' : '';
            if (SecurityUtil::checkPermission('Downloads::Category', $catinfo->getCid() . '::', ACCESS_READ)) {
                $categories_list .= "<option value='{$catinfo->getCid()}'$selected>" . self::getCatNavPath(array('cid' => $catinfo->getCid(), 'start' => 0, 'links' => 0, 'linkmyself' => 0)) . "</option>\n";
                $categories_list .= self::getCatSelectList(array('cid' => $catinfo->getCid(), 'sel' => $sel));
            }
        }
        if ($includeAll) {
            $selected = ($sel == 0) ? ' selected="selected"' : '';
            $categories_list = "<option value='0'$selected>" . __('All Categories', $dom) . "</option>\n" . $categories_list;
        }
        return $categories_list;
    }

    /**
     * @param       $cid
     * @return      string		
     */
    public static function getCatNavPath($args)
    {
        $dom    = ZLanguage::getModuleDomain('Downloads');
        $em = ServiceUtil::getService('doctrine.entitymanager');
        if (!isset($args['cid']) || !is_numeric($args['cid'])) {
            throw new Zikula_Exception_Fatal(__f('Error! Missing required argument [%s].', 'cid', $dom));
        }
        $cid = $args['cid'];
        $start = isset($args['start']) ? $args['start'] : 1;
        $links = isset($args['links']) ? $args['links'] : 1;
        $linkmyself = isset($args['linkmyself']) ? $args['linkmyself'] : 1;
        $seperator = ' / ';
        $admin = SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN);

        $result = $em->getRepository('Downloads_Entity_Categories')->find($cid);

        if ($linkmyself) {
            $cpath = "<a href='" . DataUtil::formatForDisplay(ModUtil::url('Downloads', 'user', 'view', array('cid' => $cid))) . "'>" . DataUtil::formatForDisplay($result->getTitle()) . "</a>";
        } else {
            $cpath = DataUtil::formatForDisplay($result->getTitle());
            $cpath .= $admin ? " (ID = " . DataUtil::formatForDisplay($cid) . ")" : '';
        }

        $pid = $result->getPid();
        while ($pid != 0) {
            $resultB = $em->getRepository('Downloads_Entity_Categories')->find($pid);
            $pid = $resultB->getPid();

            if ($links) {
                $cpath = "<a href='" . DataUtil::formatForDisplay(ModUtil::url('Downloads', 'user', 'view', array('cid' => $resultB->getCid()))) . "'>" . DataUtil::formatForDisplay($resultB->getTitle()) . "</a>{$seperator}{$cpath}";
            } else {
                if ($admin) {
                    $cpath = DataUtil::formatForDisplay($resultB->getTitle()) . " (ID = " . DataUtil::formatForDisplay($resultB->getCid()) . ")" . "{$seperator}{$cpath}";
                } else {
                    $cpath = DataUtil::formatForDisplay($resultB->getTitle()) . "{$seperator}{$cpath}";
                }
            }
        }

        if ($start) {
            $cpath = "<a href='" . ModUtil::url('Downloads', 'user', 'main') . "'>" . __('Main', $dom) . "</a>{$seperator}{$cpath}";
        }

        return $cpath;
    }

    /**
     * return array of categories for select box
     * @param array $args
     * @return array 
     */
    public static function getCatSelectArray($args)
    {
        $dom    = ZLanguage::getModuleDomain('Downloads');
        $em = ServiceUtil::getService('doctrine.entitymanager');
        $cid = (!isset($args['cid']) || !is_numeric($args['cid'])) ? 0 : $args['cid'];
        if ($cid) {
            $categories = $em->getRepository('Downloads_Entity_Categories')->findBy(array('pid' => $cid));
        } else {
            $categories = $em->getRepository('Downloads_Entity_Categories')->findAll();
        }
        $includeRoot = isset($args['includeroot']) ? true : false;
        $result = array();
        $text = array();
        foreach ($categories as $catinfo) {
            if (SecurityUtil::checkPermission('Downloads::Category', $catinfo->getCid() . '::', ACCESS_READ)) {
                $result[] = array(
                    'value' => $catinfo->getCid(),
                    'text' => self::getCatNavPathArray(array('cid' => $catinfo->getCid()))
                );
            }
        }
        if ($includeRoot) {
            $result[] = array('value' => 0, 'text' => '**' . __('Root', $dom) . '**');
        }
        // sort the array by displayed text
        foreach ($result as $key => $row) {
            $text[$key] = $row['text'];
        }
        array_multisort($text, SORT_ASC, $result);

        return $result;
    }

    /**
     * format title string to show category array structure
     * @param array
     * @return string		
     */
    public static function getCatNavPathArray($args)
    {
        $dom    = ZLanguage::getModuleDomain('Downloads');
        $em = ServiceUtil::getService('doctrine.entitymanager');

        if (!isset($args['cid']) || !is_numeric($args['cid'])) {
            throw new Zikula_Exception_Fatal(__f('Error! Missing required argument [%s].', 'cid', $dom));
        }
        $cid = $args['cid'];
        $seperator = ' / ';
        $admin = SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN);

        $result = $em->getRepository('Downloads_Entity_Categories')->find($cid);

        $cpath = $result->getTitle();
        $cpath .= $admin ? " (ID = $cid)" : '';

        $pid = $result->getPid();
        while ($pid != 0) {
            $resultB = $em->getRepository('Downloads_Entity_Categories')->find($pid);
            $pid = $resultB->getPid();

            if ($admin) {
                $cpath = $resultB->getTitle() . " (ID = {$resultB->getCid()})" . "{$seperator}{$cpath}";
            } else {
                $cpath = $resultB->getTitle() . "{$seperator}{$cpath}";
            }
        }

        return $cpath;
    }

}