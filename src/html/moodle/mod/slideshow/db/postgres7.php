<?PHP

function slideshow_upgrade($oldversion) {
/// This function does anything necessary to upgrade 
/// older versions to match current functionality 

    global $CFG;
    if ($oldversion < 2006112100) {
        table_column('slideshow', '', 'layout', 'int', '2', 'unsigned', '0', 'not null', '');
    }
    if ($oldversion < 2006092600) {
        table_column('slideshow', '', 'location', 'int', '2', 'unsigned', '0', 'not null', '');
    }
    if ($oldversion < 2006012600) {
       table_column('slideshow', '', 'filename', 'int', '2', 'unsigned', '0', 'not null', '');
    }
    if ($oldversion < 2006112700) {
         modify_database('',"CREATE TABLE ".$CFG->prefix."slideshow_captions (
              id SERIAL PRIMARY KEY,
              slideshow integer NOT NULL default '0',
              image text NOT NULL,
              title text NOT NULL,
              caption text NOT NULL
            )
        ");
    }
    if ($oldversion < 2007070702) {
       table_column('slideshow', '', 'delaytime', 'int', '2', 'unsigned', '7', 'not null', '');
    }
    if ($oldversion < 2007070703) {
       table_column('slideshow', '', 'centred', 'int', '2', 'unsigned', '0', 'not null', '');
       table_column('slideshow', '', 'autobgcolor', 'int', '2', 'unsigned', '0', 'not null', '');
    }
    if ($oldversion < 2008030300) {
       table_column('slideshow', '', 'htmlcaptions', 'int', '2', 'unsigned', '1', 'not null', '');
    }
    if ($oldversion < 2008042400) {
        // update moodle captions 
        if ($captions = get_records('slideshow_captions')) {
            echo 'Updating caption table ';
            foreach ($captions as $caption_object ){                
                execute_sql("UPDATE ".$CFG->prefix."slideshow_captions
                             SET caption = '".utf8_encode(html_entity_decode(utf8_decode($caption_object->caption)))."'
                             WHERE id = ".$caption_object->id);              
                execute_sql("UPDATE ".$CFG->prefix."slideshow_captions
                             SET title = '".utf8_encode(html_entity_decode(utf8_decode($caption_object->title)))."'
                             WHERE id = ".$caption_object->id);
                echo '.';
            }
            
        } else {
            echo '<p>unable to process captions!';
        }
        
    }
    
    //optional routine
    if ($oldversion < 2008051500) {
        // update moodle captions again?
         if ($captions = get_records('slideshow_captions')) {
            echo 'Updating caption table again :-I ';
            foreach ($captions as $caption_object ){                
                execute_sql("UPDATE ".$CFG->prefix."slideshow_captions
                             SET caption = '".utf8_decode($caption_object->caption)."'
                             WHERE id = ".$caption_object->id);              
                execute_sql("UPDATE ".$CFG->prefix."slideshow_captions
                             SET title = '".utf8_decode($caption_object->title)."'
                             WHERE id = ".$caption_object->id);
                echo '.';
            }
            
        } else {
            echo '<p>unable to process captions again!';
        }   
    }
    
    return true;
}

?>