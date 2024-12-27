@extends('layout')
@section('content')

    <h1 class="heading-primary">Visibility</h1>

    <p class="content">The visibility of a property, a method or a constant can be defined by prefixing the declaration with the keywords public, protected or private. Class members declared public can be accessed everywhere. Members declared protected can be accessed only within the class itself and by inheriting and parent classes. Members declared as private may only be accessed by the class that defines the member.</p>
    <p class="content">Class methods may be defined as public, private, or protected. Methods declared without any explicit visibility keyword are defined as public.</p>
    <p class="content">The first level is “public.” This level has no restrictions, which means it can be called in any scope. This means that a public property of an object can be both retrieved and modified from anywhere in a program — in the class, a subclass, or from outside of the class, for example.</p>
    <p class="content">The second level is “protected.” Protected properties and methods can be accessed from inside the class they are declared, or in any class that extends them. They can't be accessed from outside the class or subclass.</p>
    <p class="content">A private property or method can't be accessed by a subclass of the class it is defined in. If you have a class with a protected property and a private property and then extend that class in the subclass, you can access the protected property, but not the private property.</p>
    <div class="spacer"></div>

    <p class="code-text">Example of Visibility</p>
    <pre>
        <x-torchlight-code language='php'>
            class User {

                public $firstName;
                public $lastName;
                protected $isActive;
                private $password;

                public function getFullName() {
                    return "{$this->firstName} {$this->lastName}";
                }

                protected function setUserInactive() {
                    $this->isActive = false;
                }

                private function changePassword($password) {
                    $this->password = $password;
                }

            }
        </x-torchlight-code>
    </pre>



@stop
