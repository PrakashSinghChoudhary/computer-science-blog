@extends('layout')
@section('content')

    <h1 class="heading-primary">Final</h1>

    <p class="content">The final keyword in PHP is used to prevent a class from being extended or to prevent a method from being overridden by subclasses.</p>
    <div class="spacer"></div>
    <h2 class="heading-secondary">Final Classes</h2>
    <p class="code-text">When a class is declared as final, it cannot be extended by any other class.</p>
    <pre>
        <x-torchlight-code language='php'>
            final class BaseClass
            {
                public function sayHello()
                {
                    echo "Hello from BaseClass";
                }
            }

            class DerivedClass extends BaseClass
            {
                // Error: Cannot inherit from final class
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <h2 class="heading-secondary">Final Methods</h2>
    <p class="code-text">When a method is declared as final, it cannot be overridden by child classes, but the class itself can still be extended.</p>
    <pre>
        <x-torchlight-code language='php'>
            class BaseClass
            {
                final public function sayHello()
                {
                    echo "Hello from BaseClass";
                }
            }

            class DerivedClass extends BaseClass
            {
                // Error: Cannot override final method BaseClass::sayHello()
                public function sayHello()
                {
                    echo "Hello from DerivedClass";
                }
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <h2 class="heading-secondary">Note </h2>
    <ul class="list-disc list-outside space-y-2">
        <li><span class="tick">final</span> ensures that the behavior of a class or method remains unchanged and cannot be modified by inheritance.</li>
        <li>It is often used for security or when a specific implementation must not be altered.</li>
        <li>If you apply final to a class, all its methods are implicitly final as well.</li>
    </ul>

@stop
