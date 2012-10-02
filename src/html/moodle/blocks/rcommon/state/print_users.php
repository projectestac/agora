<?php
	
    require_once('../../../config.php');
    require_once($CFG->libdir.'/adminlib.php');

    admin_externalpage_setup('marsupialstate');
    admin_externalpage_print_header();
    
    //Get contents
    //$without_credentials = get_records_sql ('SELECT id, firstname, lastname FROM (SELECT id, firstname, lastname FROM '.$CFG->prefix.'user WHERE confirmed=1 AND deleted=0 AND username<>\'guest\' MINUS SELECT cr.euserid, u.firstname, u.lastname FROM '.$CFG->prefix.'rcommon_user_credentials cr, '.$CFG->prefix.'user u WHERE u.id = cr.euserid ) ORDER BY firstname');
    $without_credentials = get_records_sql ('SELECT id, firstname, lastname, username FROM '.$CFG->prefix.'user 
                                            WHERE confirmed=1 AND deleted=0 AND username <> \'guest\' AND id NOT IN
                                            (SELECT u.id    FROM '.$CFG->prefix.'rcommon_user_credentials cr, '.$CFG->prefix.'user u WHERE u.id = cr.euserid)
                                            ORDER BY firstname');
    $without_credentials_content = '';
    $without_credentials_count = 0;
    if ($without_credentials) {
        $without_credentials_count = count($without_credentials);
        $without_credentials_content = ($without_credentials) ? '<ul>' : '';
        foreach ($without_credentials as $user){
                $without_credentials_content .= '<li><a href="../keyManager.php?action=manage&username='.$user->username.'" >'.$user->firstname.' '.$user->lastname.'</a></li>';
        }
    $without_credentials_content .= '</ul>';
    }

    $with_credentials = get_records_sql ('SELECT u.id AS userid, COUNT(DISTINCT cr.id) AS books, u.firstname, u.lastname, u.username FROM '.$CFG->prefix.'user u, '.$CFG->prefix.'rcommon_user_credentials cr WHERE u.id=cr.euserid GROUP BY u.id, u.firstname, u.lastname, u.username ORDER BY u.firstname');
    $with_credentials_content = '';
    $with_credentials_count = 0;
    if ($with_credentials){
        $with_credentials_count = count($with_credentials);
            $with_credentials_content .= '<ul>';
            foreach ($with_credentials as $user){
                    $with_credentials_content .= '<li><a href="../keyManager.php?action=manage&username='.$user->username.'" >'.$user->firstname.' '.$user->lastname.'</a> ('.$user->books.' '.get_string('books', 'blocks/rcommon').') </li>';				
            }
            $with_credentials_content .= '</ul>';
    }
	
    echo '<h2 class="headingblock header ">'.get_string('marsupialstats','blocks/rcommon').' - '.get_string('user_credentials', 'blocks/rcommon').'</h2>';

    echo '<div style="text-align:right; margin:10px 0px"><a href="index.php">'.get_string('back_to_stats', 'blocks/rcommon').'</a></div>';
    //Data in tabs
    require_js(array('yui_yahoo', 'yui_event', 'yui_element', 'yui_tabview', 'yui_dom-event'));
    $yui_code = '
                    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/tabview/assets/skins/sam/tabview.css" />

                    <div id="demo" class="yui-navset">
                            <ul class="yui-nav">
                                    <li class="selected"><a href="#tab1"><em>'.get_string('without_credentials', 'blocks/rcommon').' ('.$without_credentials_count.')</em></a></li>
                                    <li><a href="#tab2"><em>'.get_string('with_credentials', 'blocks/rcommon').' ('.$with_credentials_count.')</em></a></li>
                            </ul>            
                            <div class="yui-content">
                                    <div id="tab1">'.$without_credentials_content.'</div>
                                    <div id="tab2">'.$with_credentials_content.'</div>
                            </div>
                    </div>
                    <script type="text/javascript">
                            document.body.className += " yui-skin-sam";
                            var tabView = new YAHOO.widget.TabView("demo");
                    </script>
                    ';

    echo $yui_code;
