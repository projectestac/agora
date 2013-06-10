<?php

class IWbooks_Installer extends Zikula_AbstractInstaller {

    /**
     * initialise the llibres module
     * This function is only ever called once during the lifetime of a particular
     * module instance
     */
    public function install() {

        if (!DBUtil :: createTable('IWbooks')) {
            return false;
        }

        if (!DBUtil :: createTable('IWbooks_materies')) {
            return false;
        }

        ModUtil::setVar('IWbooks', 'itemsperpage', 10);
        ModUtil::setVar('IWbooks', 'fpdf', 'modules/IWbooks/fpdf153/');

        if (date('m') > '5') {
            $cursacademic = date('Y');
        } else {
            $cursacademic = date('Y') - 1;
        }
        ModUtil::setVar('IWbooks', 'any', $cursacademic);
        ModUtil::setVar('IWbooks', 'encap', '');
        ModUtil::setVar('IWbooks', 'plans', '
PRI#Educació Primària|
ESO#Educació Secundària Obligatòria|
BTE#Batxillerat Tecnològic|
BSO#Batxillerat Social|
BHU#Batxillerat Humanístic|
BCI#Batxillerat Científic|
BAR#Batxillerat Artístic');
        ModUtil::setVar('IWbooks', 'darrer_nivell', '4');
        ModUtil::setVar('IWbooks', 'nivells', '
1#1r|
2#2n|
3#3r|
4#4t|
5#5è|
6#6è|
A#P3|
B#P4|
C#P5');
        ModUtil::setVar('IWbooks', 'llistar_materials', '1');
        ModUtil::setVar('IWbooks', 'mida_font', '11');
        ModUtil::setVar('IWbooks', 'marca_aigua', '0');
        // Inicialitzat amb �xit
        return true;
    }

    public function upgrade($oldversion) {
        $dom = ZLanguage::getModuleDomain('IWbooks');
        switch ($oldversion) {
            case 0.8:
                $dbconn = & DBConnectionStack::getConnection(true);
                $pntable = & DBUtil::getTables();

                $llibrestable = $pntable['llibres'];
                $llibrescolumn = &$pntable['llibres_column'];

                $sql = "ALTER TABLE $llibrestable
                    CHANGE $llibrescolumn[etapa] $llibrescolumn[etapa] varchar(32) NOT NULL default ''";
                $dbconn->Execute($sql);

                $sql = "ALTER TABLE $llibrestable
                    DROP pn_tipus";
                $dbconn->Execute($sql);

                if ($dbconn->ErrorNo() != 0) {
                    SessionUtil::setVar('errormsg', __('Failed to update the tables', $dom));
                    return false;
                }
                ModUtil::setVar('IWbooks', 'plans', '
PRI#Educació Primària|
ESO#Educació Secundària Obligatòria|
BTE#Batxillerat Tecnològic|
BSO#Batxillerat Social|
BHU#Batxillerat Humanístic|
BCI#Batxillerat Científic|
BAR#Batxillerat Artístic');

                ModUtil::setVar('IWbooks', 'darrer_nivell', '4');
                return IWbooks_upgrade(0.9);

            case 0.9:
                // Codi per a versió 1.0
                $dbconn = & DBConnectionStack::getConnection(true);
                $pntable = & DBUtil::getTables();

                $llibrestable = $pntable['llibres'];
                $llibrescolumn = &$pntable['llibres_column'];

                $sql = "ALTER TABLE $llibrestable
                    ADD pn_observacions varchar(100) NOT NULL,
                    ADD pn_materials text NOT NULL";
                $dbconn->Execute($sql);

                if ($dbconn->ErrorNo() != 0) {
                    SessionUtil::setVar('errormsg', $llibrestable . $oldversion . __('Failed to update the tables', $dom));
                    return false;
                }

                ModUtil::setVar('IWbooks', 'llistar_materials', '1');
                ModUtil::setVar('IWbooks', 'mida_font', '11');
                ModUtil::setVar('IWbooks', 'marca_aigua', '0');

                return IWbooks_upgrade(1.0);

            case 1.0:
                // Codi per a versió 2.0
                ModUtil::delVar('IWbooks', 'darrer_nivell');
                ModUtil::setVar('IWbooks', 'nivells', '
1#1r|
2#2n|
3#3r|
4#4t|
5#5è|
6#6è|
A#P3|
B#P4|
C#P5');


                if (!DBUtil::changeTable('IWbooks')) {
                    return false;
                }
                if (!DBUtil::changeTable('IWbooks_materies')) {
                    return false;
                }

                return IWbooks_upgrade(2.0);

                break;
        }

        // Actualització amb èxit
        return true;
    }

    /**
     * Esborrar el mòdul IWbooks
     */
    public function uninstall() {
        // Delete tables
        DBUtil::dropTable('IWbooks');
        DBUtil::dropTable('IWbooks_materies');

        // Esborrar les variables del mòdul
        ModUtil::delVar('IWbooks', 'itemsperpage');
        ModUtil::delVar('IWbooks', 'fpdf');
        ModUtil::delVar('IWbooks', 'any');
        ModUtil::delVar('IWbooks', 'encap');
        ModUtil::delVar('IWbooks', 'plans');
        ModUtil::delVar('IWbooks', 'darrer_nivell');
        ModUtil::delVar('IWbooks', 'nivells');
        ModUtil::delVar('IWbooks', 'llistar_materials');
        ModUtil::delVar('IWbooks', 'mida_font');
        ModUtil::delVar('IWbooks', 'marca_aigua');
        // Acció d'esborrar acabada amb èxit
        return true;
    }

}