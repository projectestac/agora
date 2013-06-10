<?php

class Content_Migration_Util
{
    public static function migrate($module) {
        $classname = "Content_Migration_$module";
        if (class_exists($classname)) {
            $migrationObj = new $classname();
            $migrationObj->execute();
            return true;
        }
        return false;
    }
}