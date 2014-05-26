   
<div id="profile-sidebar">
	<div id="item-header-avatar">
		<a href="<?php bp_user_link(); ?>"><?php bp_displayed_user_avatar( 'type=full' ); ?></a>
	</div><!-- #item-header-avatar -->
	
	<div id="item-buttons">

		<?php do_action( 'bp_member_header_actions' ); ?>

	</div><!-- #item-buttons -->

		<?php /* Show Quick Menu for own Profile page */ if ( bp_is_my_profile() ) : ?>
    <div id="profile-nav-menu">
        <?php $userLink = bp_get_loggedin_user_link();?>
        <ul>
            <li id="edit-profile">
            	<a class="button edit-profile-button" href="<?php echo $userLink; ?>profile/edit"><?php _e( 'Edit My Profile', 'buddypress' ); ?></a>
            </li>
            <li id="edit-avatar">
            	<a class="button edit-avatar-button" href="<?php echo $userLink; ?>profile/change-avatar"><?php _e( 'Change Avatar', 'buddypress' ); ?></a>
            </li>
            <li id="edit-password">
            	<a class="button edit-password-button" href="<?php echo $userLink; ?>settings"><?php _e( 'Email/Password Settings', 'cbox-theme' ); ?></a>
            </li>
            <li id="edit-notifications">
            	<a class="button edit-notifications-button" href="<?php echo $userLink; ?>settings/notifications/"><?php _e( 'Notification Settings', 'cbox-theme' ); ?></a>
            </li>
        </ul>
    </div>
	<?php endif; ?>
</div>
<!-- Profile Tabs -->
<div class="sidebar-activity-tabs no-ajax" id="object-nav" role="navigation">
	<ul>
		<?php bp_get_displayed_user_nav(); ?>
	</ul>
</div>	
