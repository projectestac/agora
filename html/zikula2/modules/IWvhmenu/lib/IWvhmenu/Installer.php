<?php

/**
 * Initialise the IWvhmenu module creating module tables and module vars
 * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
 * @return bool true if successful, false otherwise
 */
class IWvhmenu_Installer extends Zikula_AbstractInstaller {

    public function Install() {
        // Checks if module IWmain is installed. If not returns error
        $modid = ModUtil::getIdFromName('IWmain');
        $modinfo = ModUtil::getInfo($modid);

        if ($modinfo['state'] != 3) {
            return LogUtil::registerError($this->__('Module IWmain is needed. You have to install the IWmain module previously to install it.'));
        }

        // Check if the version needed is correct
        $versionNeeded = '2.0';
        if (!ModUtil::func('IWmain', 'admin', 'checkVersion', array('version' => $versionNeeded)))
            return false;

        // Create module table
        if (!DBUtil::createTable('IWvhmenu'))
            return false;

        //Create indexes
        $table = DBUtil::getTables();
        $c = $table['IWvhmenu_column'];
        if (!DBUtil::createIndex($c['id_parent'], 'IWvhmenu', 'id_parent'))
            return false;

        //Create module vars
        $this->setVar('LowBgColor', '#D6DEE7') // Background color when mouse is not over
                ->setVar('LowSubBgColor', '#D6DEE7') // Background color when mouse is not over on subs
                ->setVar('HighBgColor', '#EFEDDE') // Background color when mouse is over
                ->setVar('HighSubBgColor', '#EFEDDE') // Background color when mouse is over on subs
                ->setVar('FontLowColor', '#000000') // Font color when mouse is not over
                ->setVar('FontSubLowColor', '#000000') // Font color subs when mouse is not over
                ->setVar('FontHighColor', '#000000') // Font color when mouse is over
                ->setVar('FontSubHighColor', '#000000') // Font color subs when mouse is over
                ->setVar('BorderColor', '#AA3701') // Border color
                ->setVar('BorderSubColor', '#000000') // Border color for subs
                ->setVar('BorderWidth', 1) // Border width
                ->setVar('BorderBtwnElmnts', 1) // Border between elements 1 or 0
                ->setVar('FontFamily', 'Tahoma, Verdana, Arial, Helvetica, sans-serif') // Font family menu items
                ->setVar('FontSize', 9) // Font size menu items
                ->setVar('FontBold', 0) // Bold menu items 1 or 0
                ->setVar('FontItalic', 0) // Italic menu items 1 or 0
                ->setVar('MenuTextCentered', 'center') // Item text position 'left', 'center' or 'right'
                ->setVar('MenuCentered', 'left') // Menu horizontal position 'left', 'center' or 'right'
                ->setVar('MenuVerticalCentered', 'top') // Menu vertical position 'top', 'middle','bottom' or static
                ->setVar('ChildOverlap', '0.1') // horizontal overlap child/ parent
                ->setVar('ChildVerticalOverlap', '0.1') // vertical overlap child/ parent
                ->setVar('StartTop', 71) // Menu offset x coordinate
                ->setVar('StartLeft', 20) // Menu offset y coordinate
                ->setVar('VerCorrect', 0) // Multiple frames y correction
                ->setVar('HorCorrect', 0) // Multiple frames x correction
                ->setVar('LeftPaddng', 3) // Left padding
                ->setVar('TopPaddng', 2) // Top padding
                ->setVar('FirstLineHorizontal', 1) // SET TO 1 FOR HORIZONTAL MENU, 0 FOR VERTICAL
                ->setVar('MenuFramesVertical', 1) // Frames in cols or rows 1 or 0
                ->setVar('DissapearDelay', 1000) // delay before menu folds in
                ->setVar('TakeOverBgColor', 1) // Menu frame takes over background color subitem frame
                ->setVar('FirstLineFrame', 'navig') // Frame where first level appears
                ->setVar('SecLineFrame', 'space') // Frame where sub levels appear
                ->setVar('DocTargetFrame', 'space') // Frame where target documents appear
                ->setVar('TargetLoc', '') // span id for relative positioning
                ->setVar('HideTop', 0) // Hide first level when loading new document 1 or 0
                ->setVar('MenuWrap', 1) // enables/ disables menu wrap 1 or 0
                ->setVar('RightToLeft', 0) // enables/ disables right to left unfold 1 or 0
                ->setVar('UnfoldsOnClick', 0) // Level 1 unfolds onclick/ onmouseover
                ->setVar('WebMasterCheck', 0) // menu tree checking on or off 1 or 0
                ->setVar('ShowArrow', 1) // Uses arrow gifs when 1
                ->setVar('KeepHilite', 1) // Keep selected path highligthed
                ->setVar('height', 24) // Default height
                ->setVar('width', 120) // Default width
                ->setVar('imagedir', "iwvhmenu"); // Default directori of menu images

        return true;
    }

    /**
     * Delete the IWvhmenu module
     * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function uninstall() {
        // Delete module table
        DBUtil::dropTable('IWvhmenu');

        //Delete module vars
        $this->delVar('LowBgColor')
                ->delVar('LowSubBgColor')
                ->delVar('HighBgColor')
                ->delVar('HighSubBgColor')
                ->delVar('FontLowColor')
                ->delVar('FontSubLowColor')
                ->delVar('FontHighColor')
                ->delVar('FontSubHighColor')
                ->delVar('BorderColor')
                ->delVar('BorderSubColor')
                ->delVar('BorderWidth')
                ->delVar('BorderBtwnElmnts')
                ->delVar('FontFamily')
                ->delVar('FontSize')
                ->delVar('FontBold')
                ->delVar('FontItalic')
                ->delVar('MenuTextCentered')
                ->delVar('MenuCentered')
                ->delVar('MenuVerticalCentered')
                ->delVar('ChildOverlap')
                ->delVar('ChildVerticalOverlap')
                ->delVar('StartTop')
                ->delVar('StartLeft')
                ->delVar('VerCorrect')
                ->delVar('HorCorrect')
                ->delVar('LeftPaddng')
                ->delVar('TopPaddng')
                ->delVar('FirstLineHorizontal')
                ->delVar('MenuFramesVertical')
                ->delVar('DissapearDelay')
                ->delVar('TakeOverBgColor')
                ->delVar('FirstLineFrame')
                ->delVar('SecLineFrame')
                ->delVar('DocTargetFrame')
                ->delVar('TargetLoc')
                ->delVar('HideTop')
                ->delVar('MenuWrap')
                ->delVar('RightToLeft')
                ->delVar('UnfoldsOnClick')
                ->delVar('WebMasterCheck')
                ->delVar('ShowArrow')
                ->delVar('KeepHilite')
                ->delVar('height')
                ->delVar('width')
                ->delVar('imagedir');

        //Deletion successfull
        return true;
    }

    /**
     * Update the IWvhmenu module
     * @author Albert Pï¿œrez Monfort (aperezm@xtec.cat)
     * @return bool true if successful, false otherwise
     */
    public function upgrade($oldversion) {
        if ($oldversion < 1.1) {
            if (!DBUtil::changeTable('IWvhmenu'))
                return false;
            //Create indexes
            $table = DBUtil::getTables();
            $c = $table['IWvhmenu_column'];
            if (!DBUtil::createIndex($c['id_parent'], 'IWvhmenu', 'id_parent'))
                return false;
        }
        return true;
    }

}