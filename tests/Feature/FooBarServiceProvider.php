<?php

namespace Tests\Feature;
use App\Data\Foo;
use App\Data\Bar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FooBarServiceProvider extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testServiceProvider()
    {
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertSame($foo1, $foo2);
        
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($bar1, $bar2);

        self::assertSame($foo1, $bar1->foo);
        self::assertSame($foo2, $bar2->foo);
    }
}
