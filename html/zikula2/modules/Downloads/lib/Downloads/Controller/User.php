<?php

/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */

/**
 * Class to control User interface
 */
class Downloads_Controller_User extends Zikula_AbstractController
{

    /**
     * main (default) method
     */
    public function main()
    {
        $this->redirect(ModUtil::url('Downloads', 'user', 'view'));
    }

    /**
     * This method provides a generic item list overview.
     *
     * @return string|boolean Output.
     */
    public function view()
    {
        // check module permissions
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_READ), LogUtil::getErrorMsgPermission());


        // initialize sort array - used to display sort classes and urls
        $sort = array();
        $fields = array('title', 'submitter', 'hits'); // possible sort fields
        foreach ($fields as $field) {
            $sort['class'][$field] = 'z-order-unsorted'; // default values
        }

        // Get parameters from whatever input we need.
        $startnum = (int)$this->request->query->get('startnum', isset($args['startnum']) ? $args['startnum'] : null);
        $orderby = $this->request->query->get('orderby', isset($args['orderby']) ? $args['orderby'] : 'title');
        $original_sdir = $this->request->query->get('sdir', isset($args['sdir']) ? $args['sdir'] : 0);
        $category = $this->request->query->get('category', isset($args['category']) ? $args['category'] : 0);

        // check  category permissions
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::Category', "$category::", ACCESS_READ), LogUtil::getErrorMsgPermission());

        $this->view->setCacheId('view|cid_' . $category . '|ord_' . $orderby . '_' . $original_sdir . '_stnum_' . $startnum);

        $this->view
                ->assign('startnum', $startnum)
                ->assign('orderby', $orderby)
                ->assign('sdir', $original_sdir)
                ->assign('cid', $category);

        $sdir = $original_sdir ? 0 : 1; //if true change to false, if false change to true
        // change class for selected 'orderby' field to asc/desc
        if ($sdir == 0) {
            $sort['class'][$orderby] = 'z-order-desc';
            $orderdir = 'DESC';
        }
        if ($sdir == 1) {
            $sort['class'][$orderby] = 'z-order-asc';
            $orderdir = 'ASC';
        }
        // complete initialization of sort array, adding urls
        foreach ($fields as $field) {
            $sort['url'][$field] = ModUtil::url('Downloads', 'user', 'view', array(
                        'orderby' => $field,
                        'sdir' => $sdir,
                        'category' => $category));
        }
        $this->view->assign('sort', $sort);

        if (!empty($category)) {
            $downloads = ModUtil::apiFunc('Downloads', 'user', 'getall', array(
                        'startnum' => $startnum,
                        'orderby' => $orderby,
                        'orderdir' => $orderdir,
                        'category' => $category,
                    ));
            $rowcount = ModUtil::apiFunc('Downloads', 'user', 'countQuery', array('category' => $category));
        } else {
            $downloads = array();
            $rowcount = 0;
        }

        return $this->view
                        ->assign('categoryinfo', $this->entityManager->getRepository('Downloads_Entity_Categories')->find($category))
                        ->assign('subcategories', ModUtil::apiFunc('Downloads', 'user', 'getSubCategories', array('category' => $category)))
                        ->assign('downloads', $downloads)
                        ->assign('rowcount', $rowcount)
                        ->fetch('user/view.tpl');
    }

    /**
     * Display one item
     * @param type $args
     * @return string|boolean
     */
    public function display($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_READ), LogUtil::getErrorMsgPermission());
        $lid = isset($args['lid']) ? $args['lid'] : (int)$this->request->query->get('lid', null);
        if (!isset($lid)) {
            throw new Zikula_Exception_Fatal($this->__f('Error! Could not find download for ID #%s.', $lid));
        }
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::Item', $lid . '::', ACCESS_READ), LogUtil::getErrorMsgPermission());
        $item = $this->entityManager->getRepository('Downloads_Entity_Download')->find($lid);
        $item->setFilesize(round((int)$item->getFilesize() / 1024, 2));
        //$item['filetype'] = FileUtil::getExtension($item['filename']);
        $filename = $item->getFilename();
        $filetype = (!empty($filename)) ? FileUtil::getExtension($filename) : $this->__('unknown');

        $this->view->setCacheId('display|lid_' . $lid);

        return $this->view
                        ->assign('item', $item)
                        ->assign('filetype', $filetype)
                        ->fetch('user/display.tpl');
    }

    /**
     * prepare to handout the file
     * @param type $args
     * @return mixed 
     */
    public function prepHandOut($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_READ), LogUtil::getErrorMsgPermission());

        $lid = (int)$this->request->query->get('lid', null);

        // if admin limits session downloads, enforce
        if ($this->getVar('sessionlimit')) {
            $dlcount = SessionUtil::getVar('dlcount', 0);
            if (empty($dlcount)) {
                $dlcount = 1;
                SessionUtil::setVar('dlcount', $dlcount);
            } else {
                $dlcount = ++$dlcount;
                SessionUtil::setVar('dlcount', $dlcount);
            }

            // if limit not reached, download, else redirect
            if ($dlcount < $this->getVar('sessiondownloadlimit')) {
                $this->handoutFile(array('lid' => $lid));
            } else {
                $this->redirect(ModUtil::url('Downloads', 'user', 'main'));
            }
        } else {
            $this->handoutFile(array('lid' => $lid));
        }

        return true;
    }

    /**
     * Output file to browser
     * most of method taken from original Downloads module (with refactoring)
     * @param type $args
     * @return type 
     */
    public function handoutFile($args)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_READ), LogUtil::getErrorMsgPermission());

        if (!isset($args['lid']) || !is_numeric($args['lid'])) {
            return LogUtil::registerArgsError(ModUtil::url('Downloads', 'user', 'main'));
        }

        $myfile = $this->entityManager->getRepository('Downloads_Entity_Download')->find($args['lid']);

        if (stristr($myfile->getUrl(), 'http:') || stristr($myfile->getUrl(), 'ftp:') || stristr($myfile->getUrl(), 'https:')) {
            // increment hit count
            $this->entityManager->getRepository('Downloads_Entity_Download')->addHit($myfile);

            // redirect to external link 
            $this->redirect($myfile->getUrl());
        } else {
            // file is local
            $fileinfo = pathinfo($myfile->getUrl());
            $filename = $fileinfo['basename'];

            // check for existance						
            $filepointer = is_file($myfile->getUrl());

            // last file type check
            if ($filepointer && !preg_match('#\.php\s+$#', $filename)) {

                // increment hit count
                $this->entityManager->getRepository('Downloads_Entity_Download')->addHit($myfile);

                // get file size
                $fsize = filesize($myfile->getUrl());

                if ($fsize == false) {
                    throw new Zikula_Exception_Fatal($this->__f('Error! Could not determine filesize for %s.', $filename));
                }

                // get the right content type
                $contenttype = Downloads_Util::getContentType(array('extension' => $fileinfo['extension']));

                // remove bad characters from title in a cross-platform manner by replacing 
                // the union of characters not allowed by *nix, Mac and Windows (which is the most restrictive)
                // with an underscore.
                $filename = preg_replace('#[!@&$\x00-\x1f\x7f+:\\\\/<>|"?]#', '_', $filename);

                $UseCompression = System::getVar('UseCompression');

                if ($UseCompression == 1) {
                    ob_end_clean();
                }

                // write header
                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Cache-Control: private", false);
                header('Content-Description: File Transfer');
                header("Content-Type:$contenttype");
                // Properly quote the filename parameter per RFC2616 section 19.5.1, which allows spaces and other international characters
                header("Content-Disposition: attachment; filename=$filename");
                header('Content-Transfer-Encoding: binary');
                header("Content-Length:$fsize");

                // wonder if readfile wouldn't be a better solution here
                // http://de.php.net/manual/en/function.readfile.php
                // 
                // prepare file and send it
                @set_time_limit(0);
                $fp = @fopen($myfile->getUrl(), "rb");
                ini_set('magic_quotes_runtime', 0);
                $chunksize = 15 * (512 * 1024);
                while ($fp && !feof($fp)) {
                    $buffer = fread($fp, $chunksize);
                    print $buffer;
                    flush();
                    sleep(5); // is this necessary?
                }
                ini_set('magic_quotes_runtime', get_magic_quotes_gpc());
                fclose($fp);

                exit();
            } else {
                throw new Zikula_Exception_Fatal($this->__f('Error! Could not read file %s.', $filename));
            }
        }
    }

}