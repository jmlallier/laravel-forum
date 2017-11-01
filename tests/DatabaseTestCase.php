<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase as BaseTestCase;

abstract class DatabaseTestCase extends BaseTestCase {
	use DatabaseMigrations;

}
