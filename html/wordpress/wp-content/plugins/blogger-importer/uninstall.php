<?php

/**
 * @author Andy Clark
 * @copyright 2013
 * 
 * Tidy up things left over by the plugin
 * Keep this as simple as possible so we don't stall the uninstallation process
 */

    delete_option('blogger_importer');
    delete_option('blogger_importer_connector');
    $blogopt = true;                    
    for ($i = 1; $blogopt ; $i++) {
        $blogopt = get_option('blogger_importer_blog_'.$i);
        if (is_array($blogopt)) 
            delete_option('blogger_importer_blog_'.$i);
    }


?>