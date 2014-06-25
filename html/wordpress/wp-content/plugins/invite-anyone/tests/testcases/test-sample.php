<?php

class Invite_Anyone_Tests extends BP_UnitTestCase {

	/**
	 * @group invite_anyone_group_invite_access_test
	 */
	public function test_group_access_test_no_group() {
		$this->assertSame( 'noone', invite_anyone_group_invite_access_test() );
	}

	/**
	 * @group invite_anyone_group_invite_access_test
	 */
	public function test_group_access_test_no_group_during_group_creation() {
		$cc = bp_current_component();
		$ca = bp_current_action();
		buddypress()->current_component = buddypress()->groups->id;
		buddypress()->current_action = 'create';

		$u = $this->create_user();
		$this->assertSame( 'anyone', invite_anyone_group_invite_access_test( 0, $u ) );

		buddypress()->current_component = $cc;
		buddypress()->current_action = $ca;
	}

	/**
	 * @group invite_anyone_group_invite_access_test
	 */
	public function test_group_access_test_logged_out() {
		$old_current_user = get_current_user_id();
		$this->set_current_user( 0 );

		$g = $this->factory->group->create();

		$this->assertSame( 'noone', invite_anyone_group_invite_access_test( $g ) );

		$this->set_current_user( $old_current_user );
	}

	/**
	 * @group invite_anyone_group_invite_access_test
	 */
	public function test_group_access_test_not_a_member_of_group() {
		$u = $this->create_user();
		$g = $this->factory->group->create();

		$this->assertSame( 'noone', invite_anyone_group_invite_access_test( $g, $u ) );
	}

	/**
	 * @group invite_anyone_group_invite_access_test
	 *
	 * Using this as a proxy for testing every possible combination
	 */
	public function test_group_access_test_friends() {
		$settings = bp_get_option( 'invite_anyone' );
		bp_update_option( 'invite_anyone', array(
			'group_invites_can_admin' => 'friends',
			'group_invites_can_group_admin' => 'friends',
			'group_invites_can_group_mod' => 'friends',
			'group_invites_can_group_member' => 'friends',
		) );
		unset( $GLOBALS['iaoptions'] );

		$g = $this->factory->group->create();

		$u1 = $this->create_user( array(
			'role' => 'administrator',
		) );
		$this->add_user_to_group( $u1, $g );

		$u2 = $this->create_user();
		$this->add_user_to_group( $u2, $g );

		$u3 = $this->create_user();
		$this->add_user_to_group( $u3, $g );
		$m3 = new BP_Groups_Member( $u3, $g );
		$m3->promote( 'mod' );

		$u4 = $this->create_user();
		$this->add_user_to_group( $u4, $g );
		$m4 = new BP_Groups_Member( $u4, $g );
		$m4->promote( 'admin' );

		$user = new WP_User( $u1 );

		$this->assertSame( 'friends', invite_anyone_group_invite_access_test( $g, $u1 ) );
		$this->assertSame( 'friends', invite_anyone_group_invite_access_test( $g, $u2 ) );
		$this->assertSame( 'friends', invite_anyone_group_invite_access_test( $g, $u3 ) );
		$this->assertSame( 'friends', invite_anyone_group_invite_access_test( $g, $u4 ) );

		bp_update_option( 'invite_anyone', $settings );
	}
}

