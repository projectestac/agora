<?php

/*  This format is based on "topics" format from Moodle 1.9.7
 *  
 *  This software have been modified by "UPCNET, SERVEIS D'ACCÉS A
 *  INTERNET DE LA UNIVERSITAT POLITÈCNICA DE CATALUNYA, S.L." from now
 *  on UPCnet for "Govern d'Andorra" on 2010
 *  
 * 	This file is an extension of Moodle 1.9.7.
 *
 *  Moodle 1.9.7 is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  Moodle 1.9.7 is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.

 *  You should have received a copy of the GNU General Public License
 *  along with Moodle 1.9.7.  If not, see <http://www.gnu.org/licenses/>.
 */
/*
 * @author: Pau Ferrer Ocaña pau.ferrer-ocana@upcnet.es
 * @author: Jaume Fernàndez Valiente jfern343@xtec.cat
 */

//XTEC-UPCnet: canviar nom de format retornat
function senzill_get_formatname() {
    return 'senzill';
    //return 'maternal';
}

function get_data_course_pics_dir($id) {
    global $CFG;
    $formatname = senzill_get_formatname();
    return "$CFG->dataroot/$id/" . $formatname . "_pics/";
}

function get_www_course_pics_dir($id) {
    global $CFG;
    $formatname = senzill_get_formatname();
    return "$CFG->wwwroot/file.php/$id/" . $formatname . "_pics";
}

function create_course_pics_dir($id) {
    $formatname = senzill_get_formatname();
    return make_upload_directory("$id/" . $formatname . "_pics");
}

//Adds the required form elements to change the image
function senzill_coursemodule_elements(&$formclass) {

    global $CFG, $COURSE;

    //Javascript code by jfern343@xtec.cat for senzill format
    echo '<script src="http://yui.yahooapis.com/3.3.0/build/yui/yui-min.js"charset="utf-8"></script>
	<script type="text/javascript">

    YUI().use("node", function(Y) {
        Y.on("change", chooseImage, "#id_default_image");
        });
    function chooseImage(e){
        var wwwroot = "' . $CFG->wwwroot . '";
        var node = e.currentTarget;
        
        node.get("options").each(function(){
            var selected = this.get("selected");
            var value = this.get("value");
            if( selected ){
                if (value == "default") {
                    setIcon(document.getElementById("id_reference_value").value);
                    alert(ext);
        }
                else if(value == "current")
                	document.getElementById("def_img").src = current_icon;
                else if(value.indexOf("subject/") === 0)
                    document.getElementById("def_img").src = wwwroot + "/course/format/senzill/pix/" + value;
                else
                	document.getElementById("def_img").src = wwwroot + "/file.php/' . SITEID . '/" +value;
            }
        });
    }
	</script>';
    ?>

    <script type="text/javascript">
        
       //Set the icon according the file extension
       window.onload = function() {
            if (checkDefault()) { //Only if default icon selected
                setIcon(document.getElementById("id_reference_value").value);
            }   
        }
        
        //Change the icon when file extension changed
        YUI().use("node", function(Y) {
            Y.on("change", iconController, "#id_reference_value");
        });
        
        function iconController(e) {
            if (checkDefault()) {
                var node = e.currentTarget;
                var value = node.get("value");
                setIcon(value);
            }
        }
            
        function setIcon(value) {
            var ext = value.split('.').pop(); //get the extension
            var icon = get_icon_from_ext(ext);  //get icon name
            if (icon != null) { //extension exists
                document.getElementById("def_img").src = wwwroot + "/" + senzill_icon_folder + "/f/" + icon;
            } else { 
                document.getElementById("def_img").src = def_icon;
            }
        }

        function get_icon_from_ext(ext) {
            var list = get_mimetypes_array();
            for (i=0; i<list.length;i++) {
                if (ext == list[i][0]){
                    return list[i][2];
                }
            }
            return null;
        }
                
        function checkDefault() {
            return (document.getElementById("id_default_image").value == "default" ? true : false);
        }
        
        /**
         *Function based on get_mimetypes_array() on lib/filelib.php
         *list[i][0] -> extension
         *list[i][1] -> mime type
         *list[i][2] -> icon
         */
        function get_mimetypes_array() {
            var list = [["xxx",   "document/unknown", "unknown.png"],
                ["3gp",   "video/quicktime", "video.png"],
                ["ai",    "application/postscript", "image.png"],
                ["aif",   "audio/x-aiff", "audio.png"],
                ["aiff",  "audio/x-aiff", "audio.png"],
                ["aifc",  "audio/x-aiff", "audio.png"],
                ["applescript",   "text/plain", "text.png"],
                ["asc",   "text/plain", "text.png"],
                ["asm",   "text/plain", "text.png"],
                ["au",    "audio/au", "audio.png"],
                ["avi",   "video/x-ms-wm", "avi.png"],
                ["bmp",   "image/bmp", "image.png"],
                ["c",     "text/plain", "text.png"],
                ["cct",   "shockwave/director", "flash.png"],
                ["cpp",   "text/plain", "text.png"],
                ["cs",    "application/x-csh", "text.png"],
                ["css",   "text/css", "text.png"],
                ["csv",   "text/csv", "excel.png"],
                ["dv",    "video/x-dv", "video.png"],
                ["dmg",   "application/octet-stream", "dmg.png"], //NO

                ["doc",   "application/msword", "word.png"],
                ["docx",  "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "docx.png"],
                ["docm",  "application/vnd.ms-word.document.macroEnabled.12", "docm.png"],
                ["dotx",  "application/vnd.openxmlformats-officedocument.wordprocessingml.template", "dotx.png"],
                ["dotm",  "application/vnd.ms-word.template.macroEnabled.12", "dotm.png"],

                ["dcr",   "application/x-director", "flash.png"],
                ["dif",   "video/x-dv", "video.png"],
                ["dir",   "application/x-director", "flash.png"],
                ["dxr",   "application/x-director", "flash.png"],
                ["eps",   "application/postscript", "pdf.png"],
                ["fdf",   "application/pdf", "pdf.png"],
                ["flv",   "video/x-flv", "video.png"],
                ["png",   "image/png", "image.png"],
                ["gtar",  "application/x-gtar", "zip.png"],
                ["tgz",   "application/g-zip", "zip.png"],
                ["gz",    "application/g-zip", "zip.png"],
                ["gzip",  "application/g-zip", "zip.png"],
                ["h",     "text/plain", "text.png"],
                ["hpp",   "text/plain", "text.png"],
                ["hqx",   "application/mac-binhex40", "zip.png"],
                ["htc",   "text/x-component", "text.png"],
                ["html",  "text/html", "html.png"],
                ["xhtml", "application/xhtml+xml", "html.png"],
                ["htm",   "text/html", "html.png"],
                ["ico",   "image/vnd.microsoft.icon", "image.png"],
                ["ics",   "text/calendar", "text.png"],
                ["isf",   "application/inspiration", "isf.png"], //¿?
                ["ist",   "application/inspiration.template", "isf.png"], //¿?
                ["java",  "text/plain", "text.png"],
                ["jcb",   "text/xml", "jcb.png"], //HotPot
                ["jcl",   "text/xml", "jcl.png"], //HotPot
                ["jcw",   "text/xml", "jcw.png"], //HotPot
                ["jmt",   "text/xml", "jmt.png"], //HotPot
                ["jmx",   "text/xml", "jmx.png"], //HotPot
                ["jpe",   "image/jpeg", "image.png"],
                ["jpeg",  "image/jpeg", "image.png"],
                ["jpg",   "image/jpeg", "image.png"],
                ["jqz",   "text/xml", "jqz.png"], //HotPot
                ["js",    "application/x-javascript", "text.png"],
                ["latex", "application/x-latex", "text.png"],
                ["m",     "text/plain", "text.png"],
                ["mov",   "video/quicktime", "video.png"],
                ["movie", "video/x-sgi-movie", "video.png"],
                ["m3u",   "audio/x-mpegurl", "audio.png"],
                ["mp3",   "audio/mp3", "audio.png"],
                ["mp4",   "video/mp4", "video.png"],
                ["m4v",   "video/mp4", "video.png"],
                ["m4a",   "audio/mp4", "audio.png"],
                ["mpeg",  "video/mpeg", "video.png"],
                ["mpe",   "video/mpeg", "video.png"],
                ["mpg",   "video/mpeg", "video.png"],

                ["odt",   "application/vnd.oasis.opendocument.text", "odt.png"],
                ["ott",   "application/vnd.oasis.opendocument.text-template", "odt.png"],
                ["oth",   "application/vnd.oasis.opendocument.text-web", "odt.png"],
                ["odm",   "application/vnd.oasis.opendocument.text-master", "odm.png"], //odt.png
                ["odg",   "application/vnd.oasis.opendocument.graphics", "odg.png"],
                ["otg",   "application/vnd.oasis.opendocument.graphics-template", "odg.png"],
                ["odp",   "application/vnd.oasis.opendocument.presentation", "odp.png"],
                ["otp",   "application/vnd.oasis.opendocument.presentation-template", "odp.png"],
                ["ods",   "application/vnd.oasis.opendocument.spreadsheet", "ods.png"],
                ["ots",   "application/vnd.oasis.opendocument.spreadsheet-template", "ods.png"],
                ["odc",   "application/vnd.oasis.opendocument.chart", "odc.png"],
                ["odf",   "application/vnd.oasis.opendocument.formula", "odf.png"],
                ["odb",   "application/vnd.oasis.opendocument.database", "odb.png"],
                ["odi",   "application/vnd.oasis.opendocument.image", "odi.png"],

                ["pct",   "image/pict", "image.png"],
                ["pdf",   "application/pdf", "pdf.png"],
                ["php",   "text/plain", "text.png"],
                ["pic",   "image/pict", "image.png"],
                ["pict",  "image/pict", "image.png"],
                ["png",   "image/png", "image.png"],

                ["pps",   "application/vnd.ms-powerpoint", "powerpoint.png"],
                ["ppt",   "application/vnd.ms-powerpoint", "powerpoint.png"],
                ["pptx",  "application/vnd.openxmlformats-officedocument.presentationml.presentation", "pptx.png"],
                ["pptm",  "application/vnd.ms-powerpoint.presentation.macroEnabled.12", "pptm.png"],
                ["potx",  "application/vnd.openxmlformats-officedocument.presentationml.template", "potx.png"],
                ["potm",  "application/vnd.ms-powerpoint.template.macroEnabled.12", "potm.png"],
                ["ppam",  "application/vnd.ms-powerpoint.addin.macroEnabled.12", "ppam.png"],
                ["ppsx",  "application/vnd.openxmlformats-officedocument.presentationml.slideshow", "ppsx.png"],
                ["ppsm",  "application/vnd.ms-powerpoint.slideshow.macroEnabled.12", "ppsm.png"],

                ["ps",    "application/postscript", "pdf.png"],
                ["qt",    "video/quicktime", "video.png"],
                ["ra",    "audio/x-realaudio-plugin", "audio.png"],
                ["ram",   "audio/x-pn-realaudio-plugin", "audio.png"],
                ["rhb",   "text/xml", "xml.png"],
                ["rm",    "audio/x-pn-realaudio-plugin", "audio.png"],
                ["rtf",   "text/rtf", "text.png"],
                ["rtx",   "text/richtext", "text.png"],
                ["sh",    "application/x-sh", "text.png"],
                ["sit",   "application/x-stuffit", "zip.png"],
                ["smi",   "application/smil", "text.png"],
                ["smil",  "application/smil", "text.png"],
                ["sqt",   "text/xml", "xml.png"],
                ["svg",   "image/svg+xml", "image.png"],
                ["svgz",  "image/svg+xml", "image.png"],
                ["swa",   "application/x-director", "flash.png"],
                ["swf",   "application/x-shockwave-flash", "flash.png"],
                ["swfl",  "application/x-shockwave-flash", "flash.png"],

                ["sxw",   "application/vnd.sun.xml.writer", "odt.png"],
                ["stw",   "application/vnd.sun.xml.writer.template", "odt.png"],
                ["sxc",   "application/vnd.sun.xml.calc", "odt.png"],
                ["stc",   "application/vnd.sun.xml.calc.template", "odt.png"],
                ["sxd",   "application/vnd.sun.xml.draw", "odt.png"],
                ["std",   "application/vnd.sun.xml.draw.template", "odt.png"],
                ["sxi",   "application/vnd.sun.xml.impress", "odt.png"],
                ["sti",   "application/vnd.sun.xml.impress.template", "odt.png"],
                ["sxg",   "application/vnd.sun.xml.writer.global", "odt.png"],
                ["sxm",   "application/vnd.sun.xml.math", "odt.png"],

                ["tar",   "application/x-tar", "zip.png"],
                ["tif",   "image/tiff", "image.png"],
                ["tiff",  "image/tiff", "image.png"],
                ["tex",   "application/x-tex", "text.png"],
                ["texi",  "application/x-texinfo", "text.png"],
                ["texinfo",   "application/x-texinfo", "text.png"],
                ["tsv",   "text/tab-separated-values", "text.png"],
                ["txt",   "text/plain", "text.png"],
                ["wav",   "audio/wav", "audio.png"],
                ["wmv",   "video/x-ms-wmv", "avi.png"],
                ["asf",   "video/x-ms-asf", "avi.png"],
                ["xdp",   "application/pdf", "pdf.png"],
                ["xfd",   "application/pdf", "pdf.png"],
                ["xfdf",  "application/pdf", "pdf.png"],

                ["xls",   "application/vnd.ms-excel", "excel.png"],
                ["xlsx",  "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "xlsx.png"],
                ["xlsm",  "application/vnd.ms-excel.sheet.macroEnabled.12", "xlsm.png"],
                ["xltx",  "application/vnd.openxmlformats-officedocument.spreadsheetml.template", "xltx.png"],
                ["xltm",  "application/vnd.ms-excel.template.macroEnabled.12", "xltm.png"],
                ["xlsb",  "application/vnd.ms-excel.sheet.binary.macroEnabled.12", "xlsb.png"],
                ["xlam",  "application/vnd.ms-excel.addin.macroEnabled.12", "xlam.png"],

                ["xml",   "application/xml", "xml.png"],
                ["xsl",   "text/xml", "xml.png"],
                ["zip",   "application/zip", "zip.png"]];
            return list;
        }
                   

                                                                    
    </script>
    <?php

    $modname = explode('/', $CFG->pagepath);
    $modname = $modname[1];

    if ($modname != 'label') {

        $mform = & $formclass->_form;
        $mform->addElement('header', 'senzill_iconhdr', get_string('senzill_icon', 'format_senzill'));

        //Contextual help about icons in Senzill course format by jfern343@xtec.cat //Work in progress
        $mform->setHelpButton('senzill_iconhdr', array('senzill_iconhdr', get_string('senzill_icon', 'format_senzill')));
        $imagearray = array();

        $id = isset($_GET["update"]) ? $_GET["update"] : 0;


        //Use of big icons in Senzill by jfern343@xtec.cat

        if ($modname == 'resource') {
            if (!empty($formclass->_instance)) {
                if ($res = get_record('resource', 'id', (int) $formclass->_instance)) {
                    $type = $res->type;
                } else {
                    error('incorrect assignment');
                }
            } else if (isset($_GET["type"])) {
                $type = $_GET["type"];
            } else {
                $type = '';
            }

            if ($type == 'directory') {
                $icon = 'f/folder.png';
            } else if ($type == 'file') {
                $icon = 'f/web.png';
            } else {
                $icon = "mod/$modname/icon.png";
            }
        } else {
            $icon = "mod/$modname/icon.png";
        }

        $senzill_icon_folder = 'course/format/senzill/pix';
        
        //vars needed in javascript code
        echo '  <script>
                    var senzill_icon_folder = "' . $senzill_icon_folder . '";
                    wwwroot = "' . $CFG->wwwroot . '";
                </script>';

        //No existeix, fem servir per defecte...
        if (!file_exists("$CFG->dirroot/$senzill_icon_folder/$icon")) {
            $icon = $CFG->modpixpath . '/' . $modname . '/icon.gif';
        } else {
            $icon = "$CFG->wwwroot/$senzill_icon_folder/$icon";
        }

        $directory = get_data_course_pics_dir($COURSE->id);
        $act_icon_folder_www = get_www_course_pics_dir($COURSE->id);
        if (file_exists($directory . "$id.png")) {
            $curr_icon = "$act_icon_folder_www/$id.png";
        } else if (file_exists($directory . "$id.jpg")) {
            $curr_icon = "$act_icon_folder_www/$id.jpg";
        } else if (file_exists($directory . "$id.gif")) {
            $curr_icon = "$act_icon_folder_www/$id.gif";
        }



        //Opcions de les icones a triar
        $icon_options = array();

        if (isset($curr_icon)) {
            echo '
                <script>
			var def_icon = "' . $icon . '";
			var current_icon = "' . $curr_icon . '";
		</script>';
            $curr_image = '<img id="def_img" style="width:128px;height:128px;"  class="icon" src="' . $curr_icon . '"  height="128px" border="1px" alt=""/>';
            $icon_options['current'] = get_string('use_current_image', 'format_senzill');
        } else {
            echo '
                <script>
			var def_icon = "' . $icon . '";
			var current_icon = "";
		</script>';
            $curr_image = '<img id="def_img" style="width:128px;height:128px;" class="icon" src="' . $icon . '" height="128px" border="1px" alt=""/>';
        }

        $icon_options['default'] = get_string('default', 'format_senzill');

        //Imatges predefinides per jfern343@xtec.cat
        $subjects = array();
        $act_icon_folder_data = "$CFG->dirroot/course/format/senzill/pix/subject/";
        if (file_exists($act_icon_folder_data) && $handle = opendir($act_icon_folder_data)) {
            while (false !== ($file = readdir($handle))) {
                $matches = array();
                if (preg_match('/(\w+)\.(png|jpg|gif)/i', $file, $matches)) {
                    $subjects['subject/' . $matches[0]] = get_string($matches[1], 'format_senzill');
                }
            }
            closedir($handle);
        }


        $uploaded = array();
        $act_icon_folder_data = get_data_course_pics_dir(SITEID);
        if (file_exists($act_icon_folder_data) && $handle = opendir($act_icon_folder_data)) {
            $formatname = senzill_get_formatname();
            while (false !== ($file = readdir($handle))) {
                $matches = array();
                if (preg_match('/(\w+)\.(png|jpg|gif)/i', $file, $matches)) {
                    $uploaded[$formatname . '_pics/' . $matches[0]] = $matches[1];
                }
            }
            closedir($handle);
        }

        $icon_options = array_merge($icon_options, $subjects, $uploaded);



        $imagearray[] = &MoodleQuickForm::createElement('radio', 'senzill_image', '', get_string('use_existing_image', 'format_senzill'), 0);
        $imagearray[] = &MoodleQuickForm::createElement('select', 'default_image', '', $icon_options);
        $imagearray[] = &MoodleQuickForm::createElement('radio', 'senzill_image', '', get_string('upload_image', 'format_senzill'), 1);

        $separators = array(
            0 => '<br/>',
            1 => $curr_image . '<br/>');

        $mform->addGroup($imagearray, 'senzill_image', '', $separators, false);
        $mform->setDefault('senzill_image', 0);
        $mform->disabledIf('default_image', 'senzill_image', 'neq', '0');

        $formclass->set_upload_manager(new upload_manager('senzill_icon', true, false, 1, false, 0, true, false, false));
        $mform->addElement('file', 'senzill_icon', get_string('select_file', 'format_senzill'));
        $mform->disabledIf('senzill_icon', 'senzill_image', 'neq', '1');
    }
}

//Updates the selected imatge to the course module from the form
function senzill_update_module_image($mform, $fromform) {

    global $CFG, $course;
    $directory = get_data_course_pics_dir($course->id);
    if (!file_exists($directory))
        create_course_pics_dir($course->id);

    if ($fromform->senzill_image == 0 && isset($fromform->default_image) && $fromform->default_image != 'current') {
        //Erase image
        if (file_exists($directory . "$fromform->coursemodule.jpg"))
            unlink($directory . "$fromform->coursemodule.jpg");
        if (file_exists($directory . "$fromform->coursemodule.png"))
            unlink($directory . "$fromform->coursemodule.png");
        //Allow gif icons by jfern343@xtec.cat
        if (file_exists($directory . "$fromform->coursemodule.gif"))
            unlink($directory . "$fromform->coursemodule.gif");
        //Predefined icons by jfern343@xtec.cat //Work in progress
        if ($fromform->default_image != 'default') {
            if (strpos($fromform->default_image, 'subject/') === 0)
                $newfilename = $CFG->dirroot . '/course/format/senzill/pix/' . $fromform->default_image;
            else
                $newfilename = $CFG->dataroot . '/' . SITEID . '/' . $fromform->default_image;

            if ($imageattr = getimagesize($newfilename)) {
                //Test the mime
                $mime = $imageattr['mime'];
                if ($mime == "image/png")
                    copy($newfilename, $directory . "$fromform->coursemodule.png");
                else if ($mime == "image/jpeg")
                    copy($newfilename, $directory . "$fromform->coursemodule.jpg");
                else if ($mime == "image/gif")
                    copy($newfilename, $directory . "$fromform->coursemodule.gif");
            }
        }
    }
    else if ($fromform->senzill_image == 1) {
        //Save new image
        $tempdir = $directory . "temp-senzill/";

        $mform->save_files($tempdir);
        $newfilename = $tempdir . $mform->get_new_filename();

        if ($imageattr = getimagesize($newfilename)) {
            //Test the mime
            $mime = $imageattr['mime'];
            if ($mime == "image/png" || $mime == "image/jpeg" || $mime == "image/gif") {
                if (file_exists($directory . "$fromform->coursemodule.jpg"))
                    unlink($directory . "$fromform->coursemodule.jpg");
                if (file_exists($directory . "$fromform->coursemodule.png"))
                    unlink($directory . "$fromform->coursemodule.png");
                //Allow gif icons by jfern343@xtec.cat
                if (file_exists($directory . "$fromform->coursemodule.gif"))
                    unlink($directory . "$fromform->coursemodule.gif");

                if ($mime == "image/png")
                    rename($newfilename, $directory . "$fromform->coursemodule.png");
                else if ($mime == "image/jpeg")
                    rename($newfilename, $directory . "$fromform->coursemodule.jpg");
                else if ($mime == "image/gif") //Allow gif icons by jfern343@xtec.cat
                    rename($newfilename, $directory . "$fromform->coursemodule.gif");
            }
            else {
                unlink($newfilename);
                error("The " . senzill_get_formatname() . " icon must be a png, jpg or gif");
            }
        } else {
            unlink($newfilename);
            error("The file selected must be an image");
        }
        rmdir($tempdir);
    }
}

//Adds the selected imatge to the course module from the form
function senzill_add_module_image($mform, $fromform) {

    global $CFG, $course;

    $directory = get_data_course_pics_dir($course->id);
    if (!file_exists($directory))
        create_course_pics_dir($course->id);

    if ($fromform->senzill_image == 1) {
        //Save new image

        $tempdir = $directory . "temp-senzill/";

        $mform->save_files($tempdir);
        $newfilename = $tempdir . $mform->get_new_filename();

        if ($imageattr = getimagesize($newfilename)) {
            //Test the mime
            $mime = $imageattr['mime'];
            if ($mime == "image/png")
                rename($newfilename, $directory . "$fromform->coursemodule.png");
            else if ($mime == "image/jpeg")
                rename($newfilename, $directory . "$fromform->coursemodule.jpg");
            //Allow gif icons by jfern343@xtec.cat
            else if ($mime == "image/gif")
                rename($newfilename, $directory . "$fromform->coursemodule.gif");
            else {
                unlink($newfilename);
                error("The " . senzill_get_formatname() . " icon must be a png, jpg or gif");
            }
        } else {
            unlink($newfilename);
            error("The file selected must be an image");
        }
        rmdir($tempdir);
    }
    //Predefined icons by jfern343@xtec.cat
    else if ($fromform->senzill_image == 0 && isset($fromform->default_image) && $fromform->default_image != 'default') {

        if (strpos($fromform->default_image, 'subject/') === 0)
            $newfilename = $CFG->dirroot . '/course/format/senzill/pix/' . $fromform->default_image;
        else
            $newfilename = $CFG->dataroot . '/' . SITEID . '/' . $fromform->default_image;

        if ($imageattr = getimagesize($newfilename)) {
            //Test the mime
            $mime = $imageattr['mime'];
            if ($mime == "image/png")
                copy($newfilename, $directory . "$fromform->coursemodule.png");
            else if ($mime == "image/jpeg")
                copy($newfilename, $directory . "$fromform->coursemodule.jpg");
            else if ($mime == "image/gif")
                copy($newfilename, $directory . "$fromform->coursemodule.gif");
        }
    }
    //************ FI
}

//Deletes the selected imatge to the course module from the form
function senzill_delete_module_image($courseid, $moduleid) {
    global $CFG;

    $directory = get_data_course_pics_dir($courseid);
    //Erase image
    if (file_exists($directory . "$moduleid.jpg"))
        unlink($directory . "$moduleid.jpg");
    if (file_exists($directory . "$moduleid.png"))
        unlink($directory . "$moduleid.png");
    //Allow gif icons by jfern343@xtec.cat
    if (file_exists($directory . "$moduleid.gif"))
        unlink($directory . "$moduleid.gif");
}

//Funció que imprimeix una secció en format senzill
//Codi copiat i modificat de print_section per defecte
function senzill_print_section($course, $section, $mods, $modnamesused, $absolute=false, $width="100%") {
/// Prints a section full of activity modules

    global $CFG, $USER;

    static $initialised;

    static $strunreadpostsone;
    static $usetracking;
    static $groupings;


    if (!isset($initialised)) {

        include_once($CFG->dirroot . '/mod/forum/lib.php');
        if ($usetracking = forum_tp_can_track_forums()) {
            $strunreadpostsone = get_string('unreadpostsone', 'forum');
        }
        $initialised = true;
    }

    $labelformatoptions = new object();
    $labelformatoptions->noclean = true;

/// Casting $course->modinfo to string prevents one notice when the field is null
    $modinfo = get_fast_modinfo($course);

    //Acccessibility: replace table with list <ul>, but don't output empty list.
    if (!empty($section->sequence)) {



        //Show summary to students by jfern343@xtec.cat
        echo '<div class="summary">';
        //$summaryformatoptions->noclean = true;
        echo format_text($section->summary, FORMAT_HTML);
        echo '</div>';

        // Fix bug #5027, don't want style=\"width:$width\".
        echo "<ul class=\"section img-text\" style=\"text-align:center; margin:10px auto; max-width:860px;\">\n";
        $sectionmods = explode(",", $section->sequence);

        foreach ($sectionmods as $modnumber) {
            if (empty($mods[$modnumber])) {
                continue;
            }

            $mod = $mods[$modnumber];


            if (isset($modinfo->cms[$modnumber])) {
                if (!$modinfo->cms[$modnumber]->uservisible) {
                    // visibility shortcut
                    continue;
                }
            } else {
                if (!file_exists("$CFG->dirroot/mod/$mod->modname/lib.php")) {
                    // module not installed
                    continue;
                }
                if (!coursemodule_visible_for_user($mod)) {
                    // full visibility check
                    continue;
                }
            }

            $extra = '';
            if (!empty($modinfo->cms[$modnumber]->extra)) {
                $extra = $modinfo->cms[$modnumber]->extra;
            }

            if ($mod->modname != 'label') {
                // Normal activity
                echo '<li style="float:left; min-height: 210px; margin: 20px 20px 0 20px; width:175px;" class="activity ' . $mod->modname . '" id="module-' . $modnumber . '">';  // Unique ID

                $instancename = format_string($modinfo->cms[$modnumber]->name, true, $course->id);

                //Use of Big icons for Senzill format by jfern343@xtec.cat
                $senzill_icon_folder = 'course/format/senzill/pix';

                if (!empty($modinfo->cms[$modnumber]->icon)) {
                    $matches = array();
                    if (preg_match('/f\/(\w+)\.gif/', $modinfo->cms[$modnumber]->icon, $matches)
                            && file_exists("$CFG->dirroot/$senzill_icon_folder/f/" . $matches[1] . ".png")) {
                        $icon = 'f/' . $matches[1] . '.png';
                    } else {
                        $icon = "mod/$mod->modname/icon.png";
                    }
                } else {
                    $icon = "mod/$mod->modname/icon.png";
                }

                //No existeix, fem servir per defecte...
                if (!file_exists("$CFG->dirroot/$senzill_icon_folder/$icon")) {
                    $icon = $CFG->modpixpath . '/' . $mod->modname . '/icon.gif';
                } else {
                    $icon = "$CFG->wwwroot/$senzill_icon_folder/$icon";
                }
                $activity_folder_data = get_data_course_pics_dir($course->id);
                $activity_folder_www = get_www_course_pics_dir($course->id);

                if (file_exists("$activity_folder_data/$mod->id.png")) {
                    $icon = "$activity_folder_www/$mod->id.png";
                } else if (file_exists("$activity_folder_data/$mod->id.jpg")) {
                    $icon = "$activity_folder_www/$mod->id.jpg";
                }
                //Allow gif icons by jfern343@xtec.cat
                else if (file_exists("$activity_folder_data/$mod->id.gif")) {
                    $icon = "$activity_folder_www/$mod->id.gif";
                }

                //Accessibility: for files get description via icon.
                $altname = '';
                if ('resource' == $mod->modname) {
                    if (!empty($modinfo->cms[$modnumber]->icon)) {
                        $possaltname = $modinfo->cms[$modnumber]->icon;

                        $mimetype = mimeinfo_from_icon('type', $possaltname);
                        $altname = get_mimetype_description($mimetype);
                    } else {
                        $altname = $mod->modfullname;
                    }
                } else {
                    $altname = $mod->modfullname;
                }
                // Avoid unnecessary duplication.
                if (false !== stripos($instancename, $altname)) {
                    $altname = '';
                }
                // File type after name, for alphabetic lists (screen reader).
                if ($altname) {
                    $altname = get_accesshide(' ' . $altname);
                }

                $linkcss = $mod->visible ? "" : " class=\"dimmed\" ";
                echo '<a style="font-size: 1.2em;" ' . $linkcss . ' ' . $extra .
                ' href="' . $CFG->wwwroot . '/mod/' . $mod->modname . '/view.php?id=' . $mod->id . '" title="' . $instancename . '">' .
                '<img style="width:128px; height:128px; display:block; margin:3px 23.5px 12px;" src="' . $icon . '" class="activityicon" alt=""
                       width="128px" height="128px"/>' . $instancename . '</a>';
                echo "</li>\n";
            } else {
                echo '</ul>';
                $linkcss = $mod->visible ? ' class="label" ' : ' class="dimmed" ';
                echo '<div style="clear:both; text-align:center; margin: 0 auto;" ' . $linkcss . '>';
                echo format_text($extra, FORMAT_HTML, $labelformatoptions);
                echo '</div>';
                echo "<ul class=\"section img-text\" style=\"text-align:center; margin:10px auto; max-width:860px;\">\n";
            }
        }
    }

    if (!empty($section->sequence)) {
        echo "</ul><!--class='section'-->\n\n";
    }
}
?>
