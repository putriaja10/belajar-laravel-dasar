<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDependencyInjection()
    {
      $foo1 = $this->app->make(Foo::class); // new Foo()
      $foo2 = $this->app->make(Foo::class); // new Foo()
    
      self::assertEquals('Foo', $foo1->foo());
      self::assertEquals('Foo', $foo2->foo());
      self::assertNotSome($foo1,$foo2);
    }

    public function testInterfaceToClass()
        {
            $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);
            // bisa menggunakan dua cara 
            /* $this->app->singleton(HelloService::class, function($foo){
                return new HelloServiceIndonesia();
            }); */
            
            $helloService = $this->app->make(HelloService::class);

            self::assertEquals('Halo Eko', $helloService->hello('Eko'));
        }
    
}
