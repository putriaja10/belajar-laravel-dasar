<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $youtube = env("YOUTUBE");

        self::assertEquals("Programmer Zamman Now", $youtube);
    }

    public function testDefaultEnv()
    {
        $author = env("AUTHOR", "Eko");

        self::assertEquals("Eko", $author);
    }
}