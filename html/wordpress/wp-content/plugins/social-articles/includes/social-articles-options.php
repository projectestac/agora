<?php
function social_articles_page() {?>
    <div class="wrap options-social-articles"><?php
        global $socialArticles;
        $options = get_option('social_articles_options');

        if (isset($_POST['form_submit'])) {
            $options['post_per_page']      = isset($_POST['post_per_page']) ? $_POST['post_per_page'] : '';
            $options['excerpt_length']     = isset($_POST['excerpt_length']) ? $_POST['excerpt_length'] : '';
            $options['category_type']     = isset($_POST['category_type']) ? $_POST['category_type'] : '';
            $options['workflow']         = isset($_POST['workflow']) ? $_POST['workflow'] : '';
            $options['bp_notifications']   = isset($_POST['bp_notifications']) ? $_POST['bp_notifications'] : '';
            $options['allow_author_adition']   = isset($_POST['allow_author_adition']) ? $_POST['allow_author_adition'] : '';
            $options['allow_author_deletion']   = isset($_POST['allow_author_deletion']) ? $_POST['allow_author_deletion'] : '';

            echo '<div class="updated fade"><p>' . __('Settings Saved', 'social-articles') . '</p></div>';

            update_option('social_articles_options', $options);
        }?>


        <div id="icon-options-general" class="icon32"></div>
        <h2><?php _e( "Social Articles Settings", 'social-articles' ) ?></h2>

        <div id="poststuff">
            <div id="post-body" class="metabox-holder columns-2">
                <div class="postbox-container" id="postbox-container-1">
                    <div id="side-sortables" class="meta-box-sortables ui-sortable">
                        <?php ob_start();?>
                        <strong class="blue"><?php _e( 'Help Spread the Word!', 'social-articles' ) ?></strong>
                        <p><strong><?php _e( 'Want to help make this plugin even better? All donations are used to improve this plugin, so donate $20, $50 or $100 now!', 'social-articles' )?></strong></p>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="H2CYX6BVN3T3L">
                            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>
                        <p><?php _e( 'Or you could:', 'social-articles' )?></p>
                        <ul>
                            <li><a target="_blank" href="http://wordpress.org/extend/plugins/social-articles/"><?php _e( 'Rate the plugin 5★ on WordPress.org', 'social-articles' )?></a></li>
                            <li><a target="_blank" href="http://wordpress.org/tags/social-articles"><?php _e( 'Help out other users in the forums', 'social-articles' )?></a></li>
                            <li><?php printf( __( 'Blog about it & link to the %1$splugin page%2$s', 'social-articles' ), '<a target="_blank" href="http://www.broobe.com/plugins/social-articles/#utm_source=wpadmin&utm_medium=sidebanner&utm_term=link&utm_campaign=social-articles-plugin">', '</a>')?></li>
                        </ul>
                        <?php $donate = ob_get_contents();?>
                        <?php ob_end_clean();?>
                        <?php $socialArticles->postbox( 'social-articles-donation', '<strong class="blue">' . __( 'Help Spread the Word!', 'social-articles' ) . '</strong>', $donate);?>
                    </div>
                    <br/>
                </div>

                <div class="postbox-container" id="postbox-container-2">
                    <div class="meta-box-sortables ui-sortable">
                        <form id="form_data" name="form" method="post">
                        <?php
                            $rows = array();

                            $rows[]       = array(
                                'id'      => 'post_per_page',
                                'label'   => __('Post per page#','social-articles'),
                                'content' => $socialArticles->textinput( 'post_per_page' ),
                            );

                            $rows[]       = array(
                                'id'      => 'excerpt_length',
                                'label'   => __('Excerpt length#','social-articles'),
                                'content' => $socialArticles->textinput( 'excerpt_length' ),
                            );

                            $rows[] = array(
                                'id'      => 'category_type',
                                'label'   => __('Select category type','social-articles'),
                                'content' => $socialArticles->select( 'category_type', array(
                                        'single' => __('Single', 'social-articles'),
                                        'multiple'  => __('Multiple', 'social-articles'),
                                    ), false, "", __('Number of categories people can select', 'social-articles')
                                ),
                            );

                            $rows[] = array(
                                'id'      => 'workflow',
                                'label'   => __('Select workflow type','social-articles'),
                                'content' => $socialArticles->select( 'workflow', array(
                                        'direct' => __('Direct Publish', 'social-articles'),
                                        'approval'  => __('With Approval ', 'social-articles'),
                                    ), false, "", ""
                                ),
                            );

                            $status = "";
                            $msg = "";
                            if(!function_exists("friends_get_friend_user_ids")){
                                $status="disabled";
                                $msg=__("To use this feature, you need to activate bb Friend Connections module.", "social-articles");
                            }

                            $rows[] = array(
                                'id'      => 'bp_notifications',
                                'label'   => __('Send buddyPress notifications?','social-articles'),
                                'content' => $socialArticles->select( 'bp_notifications', array(
                                        'false' => __('False', 'social-articles'),
                                        'true'  => __('True', 'social-articles'),
                                    ), false, $status, $msg
                                ),
                            );

                            $rows[] = array(
                                'id'      => 'allow_author_adition',
                                'label'   => __('Can users edit their articles?','social-articles'),
                                'content' => $socialArticles->select( 'allow_author_adition', array(
                                        'false' => __('False', 'social-articles'),
                                        'true'  => __('True', 'social-articles'),
                                    ), false
                                ),
                            );

                            $rows[] = array(
                                'id'      => 'allow_author_deletion',
                                'label'   => __('Can users delete their articles?','social-articles'),
                                'content' => $socialArticles->select( 'allow_author_deletion', array(
                                        'false' => __('False', 'social-articles'),
                                        'true'  => __('True', 'social-articles'),
                                    ), false
                                ),
                            );

                            $save_button = '<div class="submitbutton"><input type="submit" class="button-primary" name="submit" value="'.__('Update Social Articles Settings','social-articles'). '" /></div><br class="clear"/>';
                            $socialArticles->postbox( 'social_articles_general_options', __( 'General', 'social-articles' ), $socialArticles->form_table( $rows ) . $save_button);
                            ?>
                            <input type="hidden" name="form_submit" value="true" />
                        </form>
                    </div>
                    <div class="meta-box-sortables ui-sortable">
                        <?php ob_start();?>
                        <div class="premium-feature">
                            <div class="premium-title">
                                <img src="<?php echo SA_BASE_URL;?>/assets/images/bp-logo.png"/>
                                <h1><?php _e("Coming Soon!!!", 'social-articles')?></h1>
                            </div>
                            <ul>
                                <li><span><?php _e("Mail Notifications", 'social-articles')?></span>
                                    <small><?php _e("Mail Notification sends mail to your mailboxes. When new notification arrives, Mail Notification sends a new email.", 'social-articles')?></small>
                                </li>
                                <li><span><?php _e("Html Template Customization", 'social-articles')?></span>
                                    <small><?php _e("Customize your email with HTML Template Customizations!", 'social-articles');?></small>
                                </li>
                                <li><span><?php _e("Category Black List", 'social-articles')?></span></li>
                                <li><span><?php _e("Tags Black List", 'social-articles')?></span></li>
                                <li><span><?php _e("Post type", 'social-articles')?></span></li>
                                <li><span><?php _e("Selection of areas to display", 'social-articles')?></span></li>
                                <li><span><?php _e("Required Fields Definition", 'social-articles')?></span></li>
                                <li><span><?php _e("More Editor Functions", 'social-articles')?></span></li>
                                <li><span><?php _e("Galleries", 'social-articles')?></span></li>
                            </ul>
                        </div>
                        <?php $features = ob_get_contents();?>
                        <?php ob_end_clean();?>
                        <?php $socialArticles->postbox( 'social_articles_premium_options', __('Premium Features', 'social-articles'), $features);?>
                    </div>                    
                </div>
            </div>

        </div>
    </div><?php
} 
?>