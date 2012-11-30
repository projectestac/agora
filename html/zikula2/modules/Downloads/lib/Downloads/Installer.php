<?php

/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */

/**
 * Class to control Installer interface
 */
class Downloads_Installer extends Zikula_AbstractInstaller
{

    /**
     * Initializes a new install
     *
     * This function will initialize a new installation.
     * It is accessed via the Zikula Admin interface and should
     * not be called directly.
     *
     * @return  boolean    true/false
     */
    public function install()
    {
        // create the table
        try {
            DoctrineHelper::createSchema($this->entityManager, array('Downloads_Entity_Download',
                'Downloads_Entity_Categories'));
        } catch (Exception $e) {
            return false;
        }

        // Set up config variables
        $this->setVars(Downloads_Util::getModuleDefaults());
        $this->createUploadDir();
        $category = $this->createSampleCategory();
        $this->createSampleDownload($category);

        HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());

        return true;
    }

    /**
     * Upgrades an old install
     *
     * This function is used to upgrade an old version
     * of the module.  It is accessed via the Zikula
     * Admin interface and should not be called directly.
     *
     * @param   string    $oldversion Version we're upgrading
     * @return  boolean   true/false
     */
    public function upgrade($oldversion)
    {
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Downloads::', '::', ACCESS_ADMIN), LogUtil::getErrorMsgPermission());

        switch ($oldversion) {
            case '2.4':
            case '2.4.0':
                // upgrade from old module
                // convert modvars from yes|no to true|false && be sure all defaults are set
                $oldVars = ModUtil::getVar('downloads'); // must use lowercase name here for old mod
                $checkedVars = $this->getCheckedVars();
                $defaultVars = Downloads_Util::getModuleDefaults();
                $newVars = array();
                $this->delVars(); // delete any with current modname
                ModUtil::delVar('downloads'); // again use lowercase for old mod
                foreach ($defaultVars as $var => $val) {
                    if (isset($oldVars[$var])) {
                        if (in_array($var, $checkedVars)) {
                            // update value to boolean
                            $newVars[$var] = ($oldVars[$var] == 'yes') ? true : false;
                        } else {
                            // use old value
                            $newVars[$var] = $oldVars[$var];
                        }
                    } else {
                        // not set
                        $newVars[$var] = $val;
                    }
                }
                if (substr($newVars['upload_folder'], -1) == '/') {
                    // remove trailing slash
                    $newVars['upload_folder'] = substr($newVars['upload_folder'], 0, -1);
                }
                $this->setVars($newVars);

                $connection = $this->entityManager->getConnection();
                $sqlStatements = array();
                // N.B. statements generated with PHPMyAdmin
                // note: because 'update' and 'date' are reserved SQL words, the fields are renamd to uupdate and ddate, respectively
                $sqlStatements[] = "ALTER TABLE `downloads_downloads`
CHANGE `pn_lid` `lid` INT(11) NOT NULL AUTO_INCREMENT,
CHANGE `pn_cid` `cid` INT(11) NOT NULL DEFAULT '0',
CHANGE `pn_status` `status` SMALLINT(6) NOT NULL DEFAULT '0',
CHANGE `pn_update` `uupdate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `pn_title` `title` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
CHANGE `pn_url` `url` VARCHAR(254) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
CHANGE `pn_filename` `filename` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
CHANGE `pn_description` `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
CHANGE `pn_date` `ddate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `pn_email` `email` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
CHANGE `pn_hits` `hits` INT(11) NOT NULL DEFAULT '0',
CHANGE `pn_submitter` `submitter` VARCHAR(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
CHANGE `pn_filesize` `filesize` double NOT NULL DEFAULT '0',
CHANGE `pn_version` `version` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
CHANGE `pn_homepage` `homepage` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
CHANGE `pn_modid` `modid` INT(11) NOT NULL DEFAULT '0',
CHANGE `pn_objectid` `objectid` VARCHAR(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0'";
                $sqlStatements[] = "ALTER TABLE `downloads_downloads`
DROP INDEX `pn_title`,
ADD FULLTEXT `title` (`title`, `description`)";
                $sqlStatements[] = "ALTER TABLE `downloads_categories`
CHANGE `pn_cid` `cid` INT( 11 ) NOT NULL AUTO_INCREMENT ,
CHANGE `pn_pid` `pid` INT( 11 ) NOT NULL DEFAULT '0',
CHANGE `pn_title` `title` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
CHANGE `pn_description` `description` VARCHAR( 254 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''";
                foreach ($sqlStatements as $sql) {
                    $stmt = $connection->prepare($sql);
                    try {
                        $stmt->execute();
                    } catch (Exception $e) {
                        
                    }
                }
                // update url field for each row to include upload dir
                // and rename from ID to name
                $this->updateRows();

                // drop old modrequest table
                $sql = "DROP TABLE `downloads_modrequest`";
                $stmt = $connection->prepare($sql);
                $stmt->execute();

                HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());

            case '3.0.0':
                // no changes
            case '3.1.0':
                // no changes
            case '3.1.1':
                // no changes
            case '3.1.2':
            //future development
        }

        return true;
    }

    /**
     * removes an install
     *
     * This function removes the module from your
     * Zikula install and should be accessed via
     * the Zikula Admin interface
     *
     * @return  boolean    true/false
     */
    public function uninstall()
    {
        // drop tables
        DoctrineHelper::dropSchema($this->entityManager, array('Downloads_Entity_Download',
            'Downloads_Entity_Categories'));

        //remove files from data folder
        $uploaddir = DataUtil::formatForOS($this->getVar('upload_folder'));
        FileUtil::deldir($uploaddir, true);

        // remove all module vars
        $this->delVars();

        HookUtil::unregisterSubscriberBundles($this->version->getHookSubscriberBundles());

        return true;
    }

    /**
     * Upload directory creation
     */
    private function createUploadDir()
    {
        // upload dir creation
        $uploaddir = $this->getVar('upload_folder');

        if (mkdir($uploaddir, System::getVar('system.chmod_dir', 0777), true)) {
            LogUtil::registerStatus($this->__f('Created the file storage directory successfully at [%s]. Be sure that this directory is accessible via web and writable by the webserver.', $uploaddir));
        }

        return $uploaddir;
    }

    /**
     * List of ModVars that previously (<= v2.4) were stored as strings: Yes/No
     * @return array
     */
    private function getCheckedVars()
    {
        return array(
            'ratexdlsactive',
            'topxdlsactive',
            'lastxdlsactive',
            'allowupload',
            'securedownload',
            'sizelimit',
            'showscreenshot',
            'limit_extension',
            'allowscreenshotupload',
            'frontpagesubcats',
            'sessionlimit',
            'inform_user',
            'torrent',
        );
    }

    /**
     * Create a sample category
     * @return int created category id
     */
    private function createSampleCategory()
    {
        $cat = new Downloads_Entity_Categories();
        $cat->setTitle($this->__("SampleCategory"));
        $cat->setDescription($this->__("This category is provided as a sample and can be safely deleted."));
        $cat->setPid(0);
        $this->entityManager->persist($cat);
        $this->entityManager->flush();
        return $cat;
    }

    /**
     * Create a sample download
     * @param type $cid 
     */
    private function createSampleDownload($category)
    {
        $file = new Downloads_Entity_Download();
        $file->setTitle($this->__("Sample download"));
        $file->setFilename("");
        $file->setStatus(1);
        $file->setUrl("modules/Downloads/docs/en/sampledownload.txt");
        $file->setDescription($this->__("This file is provided as a sample and this entry can be safely deleted."));
        $file->setSubmitter("admin");
        $file->setVersion("1");
        $file->setCategory($category);
        $this->entityManager->persist($file);
        $this->entityManager->flush();
    }

    /**
     * Update all rows so url is properly formatted
     */
    private function updateRows()
    {
        $path = $this->getVar('upload_folder');
        $rows = $this->entityManager->getRepository('Downloads_Entity_Download')->findAll();
        $count = 0;
        foreach ($rows as $row) {
            $parts = explode('.', $row->getUrl());
            if (is_numeric($parts[0]) && ((int)$parts[0] == (int)$row->getLid())) {
                // this section renames numeric filenames to strings and attempts to
                // rename the actual file it also corrects the url for local files
                $filenameParts = explode('.', $row->getFilename());
                $newname = DataUtil::formatForURL($filenameParts[0]) . '.' . array_pop($filenameParts);
                $newurl = "$path/$newname";
                $oldurl = $path . '/' . $row->getUrl();
                if (@rename(DataUtil::formatForOS($oldurl), DataUtil::formatForOS($newurl))) {
                    // update DB
                    $row->setUrl($newurl);
                    $row->setFilename($newname);
                } else {
                    // update DB
                    $row->setUrl($oldurl);
                    $row->setFilename($newname);
                }
            } else {
                // this section simply renames filenames to only have one extension
                // old versions of the module somehow added double extensions
                $filenameParts = explode('.', $row->getFilename());
                if (count($filenameParts) > 2) {
                    $newname = DataUtil::formatForURL($filenameParts[0]) . '.' . array_pop($filenameParts);
                    // update DB
                    $row->setFilename($newname);
                }
            }
            $this->entityManager->persist($row);
            if ($count > 20) {
                $this->entityManager->flush();
                $count = 0;
            } else {
                $count++;
            }
        }
    }

}