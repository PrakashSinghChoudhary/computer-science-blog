@extends('layout')
@section('content')

    <h1 class="heading-primary">Interface</h1>

    <p class="content">An interface is a blueprint for classes. It defines a set of methods that any class implementing the interface must provide. Interfaces are used to enforce a certain structure or contract for classes and enable polymorphism, ensuring that multiple classes can be used interchangeably if they adhere to the same interface.</p>
    <p class="content">Interfaces are defined in the same way as a class, but with the interface keyword replacing the class keyword and without any of the methods having their contents defined. All interface methods must be public.</p>
    <p class="content">Multiple interfaces can be implemented by a class. In addition to that, Interfaces cannot have properties. </p>
    <div class="spacer"></div>
    <h2 class="heading-secondary">Key features of Interface</h2>
    <ul class="list-disc list-outside space-y-2">
        <li>An interface is declared using the interface keyword.</li>
        <li>Interfaces cannot contain properties, only constants.</li>
        <li>It contains only method signatures (i.e., method names with parameters but no implementation).</li>
        <li>A class must use the implements keyword to adopt an interface and provide concrete implementations for all its methods.</li>
        <li>A class can implement multiple interfaces, allowing a form of multiple inheritance.</li>
    </ul>
    <div class="spacer"></div>
    <p class="code-text">Example of an Interface</p>
    <pre>
        <x-torchlight-code language='php'>
            interface MyInterface {
                public function methodOne();
                public function methodTwo($param);
            }

            class MyClass implements MyInterface {
                public function methodOne() {
                    echo "Method One implemented.";
                }

                public function methodTwo($param) {
                    echo "Method Two implemented with param: $param";
                }
            }

            $obj = new MyClass();
            $obj->methodOne();
            $obj->methodTwo("example");
        </x-torchlight-code>
    </pre>


    <div class="spacer"></div>
    <p class="code-text">Example with Multiple Interfaces</p>
    <pre>
        <x-torchlight-code language='php'>
            interface A {
                public function foo();
            }

            interface B {
                public function bar();
            }

            class MyClass implements A, B {
                public function foo() {
                    echo "Foo implemented.";
                }

                public function bar() {
                    echo "Bar implemented.";
                }
            }

            $obj = new MyClass();
            $obj->foo();    // Foo implemented.
            $obj->bar();    // Bar implemented.
        </x-torchlight-code>
    </pre>

    <div class="spacer"></div>
    <p class="code-text">Miscellaneous examples of Interface</p>
    <pre>
        <x-torchlight-code language='php'>
            // Constants in Interface
            interface MyInterface {
                const VALUE = "constant value";
            }
            echo MyInterface::VALUE;


            // Interfaces can extend other interfaces
            interface ParentInterface {
                public function parentMethod();
            }

            interface ChildInterface extends ParentInterface {
                public function childMethod();
            }

            class MyClass implements ChildInterface {
                public function parentMethod() {
                    echo "Parent method implemented.";
                }

                public function childMethod() {
                    echo "Child method implemented.";
                }
            }
        </x-torchlight-code>
    </pre>

    <div class="spacer"></div>
    <p class="code-text">Real world example of an Interface</p>
    <pre>
        <x-torchlight-code language='php'>
            interface PaymentGateway {
                public function connect(array $credentials): bool;
                public function charge(float $amount, string $currency): bool;
                public function refund(string $transactionId, float $amount): bool;
            }


            class PayPalGateway implements PaymentGateway {
                public function connect(array $credentials): bool {
                    echo "Connecting to PayPal with API key: " . $credentials['api_key'] . "\n";
                    return true; // Simulate success
                }

                public function charge(float $amount, string $currency): bool {
                    echo "Charging $amount $currency via PayPal.\n";
                    return true; // Simulate success
                }

                public function refund(string $transactionId, float $amount): bool {
                    echo "Refunding $amount for transaction $transactionId via PayPal.\n";
                    return true; // Simulate success
                }
            }


            class StripeGateway implements PaymentGateway {
                public function connect(array $credentials): bool {
                    echo "Connecting to Stripe with API key: " . $credentials['api_key'] . "\n";
                    return true; // Simulate success
                }

                public function charge(float $amount, string $currency): bool {
                    echo "Charging $amount $currency via Stripe.\n";
                    return true; // Simulate success
                }

                public function refund(string $transactionId, float $amount): bool {
                    echo "Refunding $amount for transaction $transactionId via Stripe.\n";
                    return true; // Simulate success
                }
            }


            function processPayment(
                PaymentGateway $gateway,
                array $credentials,
                float $amount,
                string $currency
            ) {
                if ($gateway->connect($credentials)) {
                    $gateway->charge($amount, $currency);
                } else {
                    echo "Failed to connect to the payment gateway.\n";
                }
            }

            $paypal = new PayPalGateway();
            $stripe = new StripeGateway();

            // Credentials for each gateway
            $paypalCredentials = ['api_key' => 'paypal-key'];
            $stripeCredentials = ['api_key' => 'stripe-key'];

            // Process payments using different gateways
            processPayment($paypal, $paypalCredentials, 100.00, 'USD'); // PayPal
            processPayment($stripe, $stripeCredentials, 200.00, 'EUR'); // Stripe
        </x-torchlight-code>
    </pre>

@stop
