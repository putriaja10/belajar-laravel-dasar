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
        
        self::asserEquals("Programmer Zamman Now", $youtube);
    }
    public function testDefaultEnv()
    {
        $youtube = env("AUTOR","Eko");
        
        self::asserEquals("Eko", $author);
    }
}



