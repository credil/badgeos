<?php

class BadgeOS_Triggers_Test extends WP_UnitTestCase {

	protected $user_id = 0;
	public function setUp() {
		parent::setUp();

		$this->user_id = $this->factory->user->create();
	}

	public function tearDown() {
		parent::tearDown();
	}

	/**
	 * @cover badgeos_get_activity_triggers()
	 */
	public function test_badgeos_get_activity_triggers() {

		/*
		 * Check for all of our array keys needed for core use.
		 */
		$triggers = badgeos_get_activity_triggers();

		$this->assertTrue( is_array( $triggers ) );

		// WordPress-specific
		$this->assertArrayHasKey( 'wp_login', $triggers );
		$this->assertArrayHasKey( 'badgeos_new_comment', $triggers );
		$this->assertArrayHasKey( 'badgeos_specific_new_comment', $triggers );
		$this->assertArrayHasKey( 'badgeos_new_post', $triggers );
		$this->assertArrayHasKey( 'badgeos_new_page', $triggers );
		// BadgeOS-specific
		$this->assertArrayHasKey( 'specific-achievement', $triggers );
		$this->assertArrayHasKey( 'any-achievement', $triggers );
		$this->assertArrayHasKey( 'all-achievements', $triggers );

	}

	/**
	 * @cover badgeos_load_activity_triggers()
	 */
	public function test_badgeos_load_activity_triggers() {}

	/**
	 * @cover badgeos_trigger_event()
	 */
	public function test_badgeos_trigger_event() {}

	/**
	 * @covers badgeos_trigger_get_user_id()
	 */
	public function test_badgeos_trigger_get_user_id() {}

	/**
	 * @cover badgeos_get_user_triggers()
	 */
	public function test_badgeos_get_user_triggers() {
		$triggers = get_user_meta( $this->user_id, '_badgeos_triggered_triggers', true );
	}

	/**
	 * @cover badgeos_get_user_trigger_count()
	 */
	public function test_badgeos_get_user_trigger_count() {}

	/**
	 * @cover badgeos_update_user_trigger_count()
	 */
	public function test_badgeos_update_user_trigger_count() {}

	/**
	 * @cover badgeos_reset_user_trigger_count()
	 */
	public function test_badgeos_reset_user_trigger_count() {}

	/**
	 * @cover badgeos_publish_listener()
	 */
	public function test_badgeos_publish_listener() {}

	/** @covers badgeos_approved_comment_listener */
	public function test_badgeos_approved_comment_listener() {}
}
