<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{

    public function testDependencyIjnection()
    {
       $foo = new Foo();
       $bar = new Bar($foo);

       self::assertEquals('Foo and Bar',$bar->bar());
    }
}
