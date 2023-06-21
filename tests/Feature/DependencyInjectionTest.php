<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{

    public function testDependency()
    {
       $foo = new Foo();
       $bar = new Bar($foo);

       self::assertEquals('Foo and Bar',$bar->bar());
    }
/*
   public function testBind()
    {
        //$person = $this->app->make(person::class);
        //self::assertNotNull($person);

        $this->app->bind(Person::class, function ($app){
            return new Person ('Eko','Khannedy');
        });
        $person1 = $this->app->make(Person::class);//closure()// new person('eko','Khannedy');
        $person2 = $this->app->make(Person::class);//closure()// new person('eko','Khannedy');

        self::assertEquals('Eko', $person1->firtName);
        self::assertEquals('Eko', $person2->firtName);
        self::assertNotSome($person1, $person2);
    }

   /* public function testSingleton()
    {
        //$person = $this->app->make(person::class);
        //self::assertNotNull($person);

        $this->app->singleton(Person::class, function ($app){
            return new Person ('Eko','Khannedy');
        });
        $person1 = $this->app->make(Person::class);//new person('eko','khannedy'); if not exists
        $person2 = $this->app->make(Person::class);//return existing

        self::assertEquals('Eko', $person1->firtName);
        self::assertEquals('Eko', $person2->firtName);
        self::assertSome($person1, $person2);
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

        self::assertEquals('Eko', $person1->firtName);
        self::assertEquals('Eko', $person2->firtName);
        self::assertSome($person1, $person2);
    }

    public function testDependencyInjection()
        {
            $foo = $this->app->make(Foo::class);
            $bar = $this->app->make(Bar::class);

            self::assertNotSome($foo, $bar->foo);
        }
*/    
}
