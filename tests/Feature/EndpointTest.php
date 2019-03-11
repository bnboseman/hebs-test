<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EndpointTest extends TestCase
{
    use WithFaker;

    /**
     * Index test for PersonController
     * @test
     */
    public function testPersonControllerIndex()
    {
        $response = $this->get('/api/person');

        $response->assertStatus(200);
    }

    /**
     * Test for PersonController show method
     * @test
     */
    public function testPersonControllerShow()
    {
        $response = $this->get('/api/person/1');

        $response->assertStatus(200);
    }

    /**
     * Test for failure if limit is out of bounds
     * @test
     */
    public function testPersonControllerIndexBadLimit()
    {
        $response = $this->get('/api/person?limit=101');

        $response->assertStatus(400);
    }

    /**
     * Test that we get correct number of people
     * @test
     */
    public function testPersonControllerIndexLimit()
    {
        $limit = $this->faker->numberBetween(1, 100);
        $response = $this->get("/api/person?limit=$limit");

        $response->assertJsonCount($limit);
    }

    /**
     * Index test for PersonController
     * @test
     */
    public function testQuoteControllerIndex()
    {
        $response = $this->get('/api/quote');

        $response->assertStatus(200);
    }
}
