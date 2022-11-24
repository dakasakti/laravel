<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    public function test_get_env()
    {
        // default value is Laravel
        $test = env("APP_NAME", "Laravel");

        self::assertEquals("Laravel", $test, "must be the same");
    }
}
