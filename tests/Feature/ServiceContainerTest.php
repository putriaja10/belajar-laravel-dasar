<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{

    public function testDependencyInjection()
    {
      $foo1 = $this->app->make(Foo::class); // new Foo()
      $foo2 = $this->app->make(Foo::class); // new Foo()
    
      self::assertEquals('Foo ', $foo1->foo());
      self::assertEquals('Foo ', $foo2->foo());
      self::assertNotSame($foo1, $foo2);
    }
    public function testBind()
    {
        //$person = $this->app->make(person::class);
        //self::assertNotNull($person);

        $this->app->bind(Person::class, function ($app){
            return new Person ('Eko','Khannedy');
        });
        $person1 = $this->app->make(Person::class);//closure()// new person('eko','Khannedy');
        $person2 = $this->app->make(Person::class);//closure()// new person('eko','Khannedy');

        self::assertEquals('Eko', $person1->firstName);
        self::assertEquals('Eko', $person2->firstName);
        self::assertNotSame($person1, $person2);
    }
    public function testSingleton()
    {
        //$person = $this->app->make(person::class);
        //self::assertNotNull($person);

        $this->app->singleton(Person::class, function ($app){
            return new Person ('Eko','Khannedy');
        });
        $person1 = $this->app->make(Person::class);//new person('eko','khannedy'); if not exists
        $person2 = $this->app->make(Person::class);//return existing

        self::assertEquals('Eko', $person1->firstName);
        self::assertEquals('Eko', $person2->firstName);
        self::assertSame($person1, $person2);
    }
    public function testInstance()
    {
        //$person = $this->app->make(person::class);
        //self::assertNotNull($person);

        $person = new Person ('Eko', 'Khannedy');
        $this->app->instance(Person::class, $person);


        $person1 = $this->app->make(Person::class);//person
        $person2 = $this->app->make(Person::class);//person
        $person3 = $this->app->make(Person::class);//person
        $person4 = $this->app->make(Person::class);//person

        self::assertEquals('Eko', $person1->firstName);
        self::assertEquals('Eko', $person2->firstName);
        self::assertSame($person1, $person2);
    }



  /*  public function testInterfaceToClass()
        {
            $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);
            // bisa menggunakan dua cara 
            /* $this->app->singleton(HelloService::class, function($foo){
                return new HelloServiceIndonesia();
            }); 
            
            $helloService = $this->app->make(HelloService::class);

            self::assertEquals('Halo Eko', $helloService->hello('Eko'));
        }
 */   
}
