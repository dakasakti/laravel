<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_routing_string()
    {
        $response = $this->get('/string');

        $response->assertStatus(200);
        $response->assertSeeText("Hello World");
    }
}
