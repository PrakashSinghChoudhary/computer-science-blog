@extends('layout')
@section('content')

    <h1 class="heading-primary">Traits</h1>

    <p class="content">A Trait in PHP is a mechanism for code reuse that allows you to include reusable methods in multiple classes without using inheritance. Traits solve the problem of single inheritance in PHP by enabling horizontal code sharing between unrelated classes.</p>
    <p class="content">They're regularly reached for to group together somewhat related methods and properties, adding that functionality to classes they're used in.</p>
    <p class="content">Traits are good for organization and reducing repetition.</p>
    <div class="spacer"></div>
    <h2 class="heading-secondary">Key features</h2>
    <ul class="list-disc list-outside space-y-2">
        <li>Traits contain methods and properties that can be reused across multiple classes.</li>
        <li>Traits cannot be instantiated on their own.</li>
        <li>Classes can use traits along with inheritance, but a trait is not a replacement for inheritance.</li>
        <li>If multiple traits define methods with the same name, you must explicitly resolve the conflict in the using class.</li>
    </ul>
    <div class="spacer"></div>

    <p class="code-text">Example of a Trait</p>
    <pre>
        <x-torchlight-code language='php'>
            trait Logger {
                public function log($message) {
                    echo "[LOG]: $message\n";
                }
            }

            class User {
                use Logger;

                public function createUser($name) {
                    $this->log("Creating user: $name");
                }
            }

            class Product {
                use Logger;

                public function createProduct($name) {
                    $this->log("Creating product: $name");
                }
            }

            $user = new User();
            $user->createUser("John Doe");      // [LOG]: Creating user: John Doe

            $product = new Product();
            $product->createProduct("Laptop");  // [LOG]: Creating product: Laptop
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Trait with properties</p>
    <pre>
        <x-torchlight-code language='php'>
            trait Counter {
                private $count = 0;

                public function increment() {
                    $this->count++;
                }

                public function getCount() {
                    return $this->count;
                }
            }

            class ClickTracker {
                use Counter;
            }

            $tracker = new ClickTracker();
            $tracker->increment();
            $tracker->increment();
            echo $tracker->getCount();   // 2
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="content">When two traits used in a class have methods with the same name, PHP requires explicit resolution.</p>
    <p class="code-text">Conflict Resolution</p>
    <pre>
        <x-torchlight-code language='php'>
            trait TraitA {
                public function sayHello() {
                    echo "Hello from TraitA\n";
                }
            }

            trait TraitB {
                public function sayHello() {
                    echo "Hello from TraitB\n";
                }
            }

            class MyClass {
                use TraitA, TraitB {
                    TraitA::sayHello insteadof TraitB;         // use TraitA
                    TraitB::sayHello as sayHelloFromTraitB;    // use TraitB
                }
            }

            $obj = new MyClass();
            $obj->sayHello();                // Hello from TraitA
            $obj->sayHelloFromTraitB();      // Hello from TraitB
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="content">Traits can declare abstract methods, forcing the using class to define them.</p>
    <p class="code-text">Using Abstract Methods in Traits</p>
    <pre>
        <x-torchlight-code language='php'>
            trait Authenticator {
                abstract public function authenticate($credentials);

                public function login($credentials) {
                    if ($this->authenticate($credentials)) {
                        echo "Login successful!\n";
                    } else {
                        echo "Login failed.\n";
                    }
                }
            }

            class UserAuth {
                use Authenticator;

                public function authenticate($credentials) {
                    return $credentials === "valid_password";
                }
            }

            $user = new UserAuth();
            $user->login("valid_password");      // Login successful!
            $user->login("invalid_password");    // Login failed.
        </x-torchlight-code>
    </pre>


@stop
