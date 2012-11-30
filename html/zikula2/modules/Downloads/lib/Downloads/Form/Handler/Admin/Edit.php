<?php

/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */
class Downloads_Form_Handler_Admin_Edit extends Zikula_Form_AbstractHandler
{

    /**
     * download id.
     *
     * When set this handler is in edit mode.
     *
     * @var integer
     */
    private $id;

    /**
     * Setup form.
     *
     * @param Zikula_Form_View $view Current Zikula_Form_View instance.
     *
     * @return boolean
     */
    public function initialize(Zikula_Form_View $view)
    {
        $id = FormUtil::getPassedValue('id', null, 'GET', FILTER_SANITIZE_NUMBER_INT);
        if ($id) {
            // load record with id
            $file = $this->entityManager->getRepository('Downloads_Entity_Download')->find($id);

            if ($file) {
                // switch to edit mode
                $this->id = $id;
                // assign current values to form fields
                $view->assign($file->toArray());
                $view->assign('category', $file->getCategory()->getCid());
            } else {
                return LogUtil::registerError($this->__f('File with id %s not found', $id));
            }
        }

        if (!$view->getStateData('returnurl')) {
            $editurl = ModUtil::url('Downloads', 'user', 'edit');
            $returnurl = System::serverGetVar('HTTP_REFERER');
            if (strpos($returnurl, $editurl) === 0) {
                $returnurl = ModUtil::url('Downloads', 'admin', 'main');
            }
            $view->setStateData('returnurl', $returnurl);
        }
        $view->assign('categories', Downloads_Util::getCatSelectArray(array()));

        return true;
    }

    /**
     * Handle form submission.
     *
     * @param Zikula_Form_View $view  Current Zikula_Form_View instance.
     * @param array     &$args Args.
     *
     * @return boolean
     */
    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        $returnurl = $view->getStateData('returnurl');

        // process the cancel action
        if ($args['commandName'] == 'cancel') {
            return $view->redirect($returnurl);
        }

        $storage = $this->getVar('upload_folder');

        if ($args['commandName'] == 'delete') {
            $file = $this->entityManager->getRepository('Downloads_Entity_Download')->find($this->id);
            $oldname = $file->getFilename();
            $fullpath = DataUtil::formatForOS("$storage/$oldname");
            @unlink($fullpath);
            $this->entityManager->remove($file);
            $this->entityManager->flush();
            ModUtil::apiFunc('Downloads', 'user', 'clearItemCache', $file);
            LogUtil::registerStatus($this->__f('Item [id# %s] deleted!', $this->id));
            return $view->redirect($returnurl);
        }

        // check for valid form
        if (!$view->isValid()) {
            return false;
        }

        // load form values
        $data = $view->getValues();

        // validate that url or file is passed
        if (!$data['url'] && !$data['filename']['size']) {
            $plugin = $view->getPluginById('filename');
            $plugin->setError($this->__('You must upload a filename'));
            $plugin = $view->getPluginById('url');
            $plugin->setError($this->__('OR specify a download url.'));
            return false;
        }

        $data['update'] = new DateTime();
        $data['date'] = new DateTime();
        $data['status'] = (int)$data['status'];
        $data['category'] = $this->entityManager->getRepository('Downloads_Entity_Categories')->find($data['category']);

        if ((is_array($data['filename'])) && ($data['filename']['size'] > 0)) {
            $data['filesize'] = $data['filename']['size'];
            FileUtil::uploadFile('filename', $storage, $data['filename']['name']);
            $name = $data['filename']['name'];
            unset($data['filename']);
            $data['filename'] = $name;
            $data['url'] = "$storage/$name";
        } else if (((is_array($data['filename'])) && (!$data['filename']['size'] > 0)) || (!isset($data['filename']))) {
            $data['filename'] = '';
        }

        // switch between edit and create mode
        if ($this->id) {
            $file = $this->entityManager->getRepository('Downloads_Entity_Download')->find($this->id);
            // if file is new, delete old one
            $oldname = $file->getFilename();
            if ($oldname <> $data['filename']) {
                $fullpath = DataUtil::formatForOS("$storage/$oldname");
                @unlink($fullpath);
            }
        } else {
            $file = new Downloads_Entity_Download();
        }

        try {
            $file->merge($data);
            $this->entityManager->persist($file);
            $this->entityManager->flush();
        } catch (Zikula_Exception $e) {
            echo "<pre>";
            var_dump($e->getDebug());
            echo "</pre>";
            die;
        }

        ModUtil::apiFunc('Downloads', 'user', 'clearItemCache', $file);

        return $view->redirect($returnurl);
    }

}