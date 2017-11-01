<?php

namespace Tests\Feature;

use Tests\DatabaseTestCase;

class ReadThreadsTest extends DatabaseTestCase {

	protected $thread;
	protected $reply;

	public function setUp() {
		parent::setUp();

		$this->thread = create( 'App\Thread' );
		$this->reply  = create( 'App\Reply', [ 'thread_id' => $this->thread->id ] );
	}

	/** @test */
	public function a_user_can_view_all_threads() {

		$this->get( '/threads' )
		     ->assertSee( $this->thread->title )
		     ->assertSee( $this->thread->body );
	}

	/** @test */
	public function a_user_can_view_a_single_thread() {

		$this->get( $this->thread->path() )
		     ->assertSee( $this->thread->title )
		     ->assertSee( $this->thread->body );
	}

	/** @test */
	public function a_user_can_read_replies_that_are_associated_with_a_thread() {
		// And that thread includes replies
		$this->get( $this->thread->path() )
		     ->assertSee( $this->reply->body );

		// When we visit a thread page
		// We should see the replies.

	}
}
