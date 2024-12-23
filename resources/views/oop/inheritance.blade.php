@extends('layout')
@section('content')

    <h1 class="heading-primary">Inheritance</h1>

    <p class="content">Inheritance is a well-established programming principle, and PHP makes use of this principle in its object model. This principle will affect the way many classes and objects relate to one another.</p>
    <p class="content">For example, when extending a class, the subclass inherits all of the public and protected methods, properties and constants from the parent class. Unless a class overrides those methods, they will retain their original functionality.</p>
    <p class="content">This is useful for defining and abstracting functionality, and permits the implementation of additional functionality in similar objects without the need to reimplement all of the shared functionality.</p>
    <p class="content">The visibility of methods, properties and constants can be relaxed, e.g. a protected method can be marked as public, but they cannot be restricted, e.g. marking a public property as private. An exception are constructors, whose visibility can be restricted, e.g. a public constructor can be marked as private in a child class.</p>
    <p class="content">If the child class does not define a constructor, it inherits the parent constructor like any other method. If a child class defines a constructor of its own, the parent constructor will be overridden. To call the parent constructor, a call to <span class="code-sample">parent::__construct()</span> must be done from the child constructor</p>
    <div class="spacer"></div>

    <p class="code-text">Basic example of Inheritance</p>
    <pre>
        <x-torchlight-code language='php'>
            class Book {

                public function __construct(
                    private $title,
                    private $author,
                    private $price
                ) {}

                public function getTitle() {
                    return $this->title;
                }

                public function getAuthor() {
                    return $this->author;
                }

                public function getPrice() {
                    return $this->price;
                }

            }


            class DigitalBook extends Book {

                public function __construct(
                    $title,
                    $author,
                    $price,
                    private $fileSize
                ) {
                    parent::__construct($title, $author, $price);
                }

                public function getFileSize() {
                    return $this->fileSize;
                }
            }

            class PhysicalBook extends Book  {

                public function __construct(
                    $title,
                    $author,
                    $price,
                    private $weight
                ) {
                    parent::__construct($title, $author, $price);
                }

                public function getWeight() {
                    return $this->weight;
                }
            }
        </x-torchlight-code>
    </pre>

    <div class="spacer"></div>
    <p class="heading-secondary">Overidding Methods</p>
    <p class="content">Method overriding allows a child class to provide a specific implementation of a method already provided by its parent class.</p>
    <p class="content">In other words, both parent and child classes should have same function name with and number of arguments. It is used to replace parent method in child class. The purpose of overriding is to change the behavior of parent class method. The two methods with the same name and same parameter is called overriding.</p>
    <p class="code-text">Basic example of method overriding</p>
    <pre>
        <x-torchlight-code language='php'>
            class Animal {
                public function speak() {
                    return 'Animal makes noise';
                }
            }

            class Dog extends Animal {
                public function speak() {
                    return 'Woof';
                }
            }

            class Cat extends Animal {
                public function speak() {
                    return 'Meow';
                }
            }

            $dog = new Dog();
            echo $dog->speak();      // Woof

            $cat = new Cat();
            echo $cat->speak();      // Meow
        </x-torchlight-code>
    </pre>

    <p class="code-text">Nested example of method overriding</p>
    <pre>
        <x-torchlight-code language='php'>
            class Grandpa {
                public function whoAmI() {
                    return 'Grandpa';
                }
            }

            class Papa extends Grandpa {
            //    public function whoAmI() {
            //        return 'Papa';
            //    }
            }

            class Child extends Papa {
            //    public function whoAmI() {
            //        return 'Child';
            //    }
            }

            $child = new Child();
            echo $child->whoAmI();    // Grandpa
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="content">Using the <span class="code-sample">#[Override]</span> attribute</p>
    <pre>
        <x-torchlight-code language='php'>
        abstract class Parent {
            public function methodWithDefaultImplementation(): int {
                return 1;
            }
        }

        final class Child extends Parent {
            #[Override]
            public function methodWithDefaultImplementation(): int {
                return 2; // The overridden method
            }
        }
        </x-torchlight-code>
    </pre>

@stop
