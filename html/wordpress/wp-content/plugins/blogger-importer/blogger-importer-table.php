<?php

/**
 * @author Andy Clark
 * @copyright 2013
 * Ref:http://wpengineer.com/2426/wp_list_table-a-step-by-step-guide/
 * Class to render the blog table
 */
 
 if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

    class Blogger_Import_List_Table extends WP_List_Table {
    
    //Use unique names here so that WP does not style our comments as pers some other tables.
    function get_columns(){
    $columns = array(
        'BL_name' => __('Blog Name','blogger-importer'),
        'BL_url' =>  __('Blog URL','blogger-importer'),
        'BL_posts' =>  __('Posts','blogger-importer'),
        'BL_comments' => __('Comments','blogger-importer'),
        'BL_images' => __('Images','blogger-importer'),
        'BL_links' => __('Links','blogger-importer'),
        'BL_action' => __('Action Button','blogger-importer')
    );
    
    return $columns;
    }
    
    function prepare_items($blogs,$JSInit) {
        
    $columns = $this->get_columns();
    $hidden = array();
    $sortable = array();
    $this->_column_headers = array($columns, $hidden, $sortable);
    $this->JSInit = $JSInit;
    
    foreach ($blogs as $i => $blog) {
                $row = array();
                $row['ID'] = $i;
                $row['BL_name'] = esc_js($blog->title);
                $row['BL_url'] = $blog->host;
                $row['BL_posts'] = array('posts_done'=> ($blog->posts_done) ? (int)$blog->posts_done : 0,'total_posts' => $blog->total_posts);
                $row['BL_comments'] = array('comments_done'=> ($blog->comments_done) ? (int)$blog->comments_done : 0,'total_comments' => $blog->total_comments);
                $row['BL_images'] = $blog->images_done ? (int)$blog->images_done : 0;
                $row['BL_links'] = $blog->links_done ? (int)$blog->links_done : 0;
                $row['BL_action'] = $blog->mode;
                $this->items[] = $row;
        }
    }

    //Column Rendering    
    function column_BL_posts( $item ) {
        return sprintf('<div ID="Posts%s"><div ID="PostsLabel%s" class="ui-progressbar-caption">'.__('%d of %d', 'blogger-importer').'</div></div>',$item['ID'],$item['ID'],$item['BL_posts']['posts_done'],$item['BL_posts']['total_posts']);
    }
    
    function column_BL_comments( $item ) {
        return sprintf('<div ID="Comments%s"><div ID="CommentsLabel%s" class="ui-progressbar-caption">'.__('%d of %d', 'blogger-importer').'</div></div>',$item['ID'],$item['ID'],$item['BL_comments']['comments_done'],$item['BL_comments']['total_comments']);
    }    

    function column_BL_images( $item ) {
        return sprintf('<div ID="Images%s"><div ID="ImagesLabel%s" class="ui-progressbar-caption">%d</div></div>',$item['ID'],$item['ID'],$item['BL_images']);
    }
    
    function column_BL_links( $item ) {
        return sprintf('<div ID="Links%s"><div ID="LinksLabel%s" class="ui-progressbar-caption">%d</div></div>',$item['ID'],$item['ID'],$item['BL_links']);
    }    

    function column_BL_action( $item ) {
        $start = esc_js(__('Import', 'blogger-importer'));
        $continue = esc_js(__('Continue', 'blogger-importer'));
        $stop = esc_js(__('Importing...', 'blogger-importer'));
        $authors = esc_js(__('Set Authors', 'blogger-importer'));    
        
        if ($item['BL_action'] == 'init')
            $value = $start;
        elseif ($item['BL_action'] == 'posts' || $item['BL_action'] == 'comments')
            $value = $continue;
        else
            $value = $authors;
        $value = esc_attr($value);
        
        return sprintf("<input type='submit' class='button' id='submit%s' value='%s' /><input type='hidden' name='blog' value='%s' />",$item['ID'],$value,$item['ID']);
    }        
    
    function column_default( $item, $column_name ) {
        switch( $column_name ) {
        case 'BL_name':
        case 'BL_url':
        case 'BL_comments':
        case 'BL_images':
        case 'BL_links':
        case 'BL_action':
        return $item[ $column_name ];
        default:
        return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
        }
    }
    
    //Run Javascript at the bottom of the page to pass table data through to JQuery
    function _js_vars() {
        printf( "<!--blogger-importer-table _js_vars -->
        <script type='text/javascript'>
		/* <![CDATA[ */
        var blogs = {};
                jQuery(function() {
        			%s
        			jQuery.each(blogs, function(i, me){me.init();});
                    jQuery('#Refresh').bind('click', function(){return jQuery.each(blogs, function(i, me){me.stop();})});
                 });   
		/* ]]> */
		</script>\n",$this->JSInit );
    }
    

}
?>