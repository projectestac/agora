<?php

/**
 * This template, which powers the group Send Invites tab when IA is enabled, can be overridden
 * with a template file at groups/single/invite-anyone.php
 *
 * @package Invite Anyone
 * @since 0.8.5
 */


if ( function_exists( 'bp_post_get_permalink' ) ) { // ugly ugly ugly hack to check for pre-1.2 versions of BP

	add_action( 'wp_footer', 'invite_anyone_add_old_css' );
	?>

	<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

		<?php do_action( 'bp_before_group_send_invites_content' ) ?>

			<?php if ( $event != 'create' ) : ?>
				<form action="<?php bp_group_send_invite_form_action() ?>" method="post" id="send-invite-form">
			<?php endif; ?>

				<div class="left-menu">

					<p><?php _e("Search for members to invite:", 'bp-invite-anyone') ?></span></p>

					<ul class="first acfb-holder">
						<li>
							<input type="text" name="send-to-input" class="send-to-input" id="send-to-input" />
						</li>
					</ul>

					<p><?php _e( 'Select members from the directory:', 'bp-invite-anyone' ) ?> </p>

					<div id="invite-anyone-member-list">
						<ul>
							<?php bp_new_group_invite_member_list() ?>
						</ul>

						<?php wp_nonce_field( 'groups_invite_uninvite_user', '_wpnonce_invite_uninvite_user' ) ?>
					</div>

				</div>

				<div class="main-column">

					<div id="message" class="info">
						<p><?php _e('Select people to invite.', 'bp-invite-anyone'); ?></p>
					</div>

					<?php do_action( 'bp_before_group_send_invites_list' ) ?>

					<?php /* The ID 'friend-list' is important for AJAX support. */ ?>
					<ul id="invite-anyone-invite-list" class="item-list">
					<?php if ( bp_group_has_invites() ) : ?>

						<?php while ( bp_group_invites() ) : bp_group_the_invite(); ?>

							<li id="<?php bp_group_invite_item_id() ?>">
								<?php bp_group_invite_user_avatar() ?>

								<h4><?php bp_group_invite_user_link() ?></h4>
								<span class="activity"><?php bp_group_invite_user_last_active() ?></span>

								<?php do_action( 'bp_group_send_invites_item' ) ?>

								<div class="action">
									<a class="remove" href="<?php bp_group_invite_user_remove_invite_url() ?>" id="<?php bp_group_invite_item_id() ?>"><?php _e( 'Remove Invite', 'buddypress' ) ?></a>

									<?php do_action( 'bp_group_send_invites_item_action' ) ?>
								</div>
							</li>

						<?php endwhile; ?>
					<?php endif; ?>
					</ul>

					<?php do_action( 'bp_after_group_send_invites_list' ) ?>

				</div>

				<div class="clear"></div>

			<?php if ( $event != 'create' ) : ?>
				<p class="clear"><input type="submit" name="submit" id="submit" value="<?php _e( 'Send Invites', 'buddypress' ) ?>" /></p>
				<?php wp_nonce_field( 'groups_send_invites', '_wpnonce_send_invites') ?>
			<?php endif; ?>

			<input type="hidden" name="group_id" id="group_id" value="<?php bp_group_id() ?>" />

			<?php if ( $event != 'create' ) : ?>
				</form>
			<?php endif; ?>

		<?php do_action( 'bp_before_group_send_invites_content' ); ?>
	<?php endwhile; endif;

} else { // Begin BP 1.2 code

	?>

	<?php do_action( 'bp_before_group_send_invites_content' ) ?>

	<?php if ( invite_anyone_access_test() && !bp_is_group_create() ) : ?>
		<p><?php _e( 'Want to invite someone to the group who is not yet a member of the site?', 'bp-invite-anyone' ) ?> <a href="<?php echo bp_loggedin_user_domain() . BP_INVITE_ANYONE_SLUG . '/invite-new-members/group-invites/' . bp_get_group_id() ?>"><?php _e( 'Send invitations by email.', 'bp-invite-anyone' ) ?></a></p>
	<?php endif; ?>

	<?php if ( !bp_get_new_group_id() ) : ?>
		<form action="<?php invite_anyone_group_invite_form_action() ?>" method="post" id="send-invite-form">
	<?php endif; ?>

	<div class="left-menu">
		<p><?php _e("Search for members to invite:", 'bp-invite-anyone') ?></p>

		<ul class="first acfb-holder">
			<li>
				<input type="text" name="send-to-input" class="send-to-input" id="send-to-input" />
			</li>
		</ul>

		<?php wp_nonce_field( 'groups_invite_uninvite_user', '_wpnonce_invite_uninvite_user' ) ?>

		<?php if ( ! invite_anyone_is_large_network( 'users' ) ) : ?>
			<p><?php _e( 'Select members from the directory:', 'bp-invite-anyone' ) ?></p>

			<div id="invite-anyone-member-list">
				<ul>
					<?php bp_new_group_invite_member_list() ?>
				</ul>
			</div>
		<?php endif ?>
	</div>

	<div class="main-column">

		<div id="message" class="info">
			<p><?php _e('Select people to invite from your friends list.', 'buddypress'); ?></p>
		</div>

		<?php do_action( 'bp_before_group_send_invites_list' ) ?>

		<?php /* The ID 'friend-list' is important for AJAX support. */ ?>
		<ul id="invite-anyone-invite-list" class="item-list">
		<?php if ( bp_group_has_invites() ) : ?>

			<?php while ( bp_group_invites() ) : bp_group_the_invite(); ?>

				<li id="<?php bp_group_invite_item_id() ?>">
					<?php bp_group_invite_user_avatar() ?>

					<h4><?php bp_group_invite_user_link() ?></h4>
					<span class="activity"><?php bp_group_invite_user_last_active() ?></span>

					<?php do_action( 'bp_group_send_invites_item' ) ?>

					<div class="action">
						<a class="remove" href="<?php bp_group_invite_user_remove_invite_url() ?>" id="<?php bp_group_invite_item_id() ?>"><?php _e( 'Remove Invite', 'buddypress' ) ?></a>

						<?php do_action( 'bp_group_send_invites_item_action' ) ?>
					</div>
				</li>

			<?php endwhile; ?>

		<?php endif; ?>
		</ul>

		<?php do_action( 'bp_after_group_send_invites_list' ) ?>

	</div>

	<div class="clear"></div>

	<?php if ( !bp_get_new_group_id() ) : ?>
	<div class="submit">
		<input type="submit" name="submit" id="submit" value="<?php _e( 'Send Invites', 'buddypress' ) ?>" />
	</div>
	<?php endif; ?>

	<?php wp_nonce_field( 'groups_send_invites', '_wpnonce_send_invites') ?>

		<!-- Don't leave out this sweet field -->
	<?php
	if ( !bp_get_new_group_id() ) {
		?><input type="hidden" name="group_id" id="group_id" value="<?php bp_group_id() ?>" /><?php
	} else {
		?><input type="hidden" name="group_id" id="group_id" value="<?php bp_new_group_id() ?>" /><?php
	}
	?>

	<?php if ( !bp_get_new_group_id() ) : ?>
		</form>
	<?php endif; ?>

	<?php do_action( 'bp_after_group_send_invites_content' ) ?>



<?php
}
?>
