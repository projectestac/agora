<?php
/**
 * ICE API: feature extensions, BuddyPress tour list items template file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @author Bowe Frankema <bowe@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2012 Marshall Sorenson & Bowe Frankema
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage features
 * @since 1.0
 */

/* @var $this ICE_Feature_Renderer */
?>
	<li data-id="whats-new-avatar" data-text="&rarr;">
		<?php $this->component()->render_content( 'start' ); ?>
	</li>

	<li data-id="activity-all" data-text="&rarr;">
		<?php $this->component()->render_content( 'all' ); ?>
	</li>

	<?php if ( bp_is_active( 'friends' ) ): ?>
		<?php if ( bp_get_total_friend_count( bp_loggedin_user_id() ) ) : ?>
			<li data-id="activity-friends" data-text="&rarr;">
				<?php $this->component()->render_content( 'friends' ); ?>
			</li>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( bp_is_active( 'groups' ) ) : ?>
		<?php if ( bp_get_total_group_count_for_user( bp_loggedin_user_id() ) ) : ?>
			<li data-id="activity-groups" data-text="&rarr;">
				<?php $this->component()->render_content( 'groups' ); ?>
			</li>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( bp_get_total_favorite_count_for_user( bp_loggedin_user_id() ) ) : ?>
		<li data-id="activity-tour-favorites" data-text="&rarr;">
			<?php $this->component()->render_content( 'favorites' ); ?>
		</li>
	<?php endif; ?>

	<li data-id="activity-mentions" data-text="&rarr;">
		<?php $this->component()->render_content( 'mentions' ); ?>
	</li>

	<li data-id="activity-filter-by" data-text="&rarr;">
		<?php $this->component()->render_content( 'filter' ); ?>
	</li>

	<li data-id="whats-new-textarea" data-text="&#8730;">
		<?php $this->component()->render_content( 'update' ); ?>
	</li>