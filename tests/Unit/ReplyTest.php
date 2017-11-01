<?php

namespace Tests\Unit;

use Tests\DatabaseTestCase;

class ReplyTest extends DatabaseTestCase {

	/** @test */
	function a_reply_has_an_owner() {
		$reply = factory( 'App\Reply' )->create();
		$this->assertInstanceOf( 'App\User', $reply->owner );
	}
}
