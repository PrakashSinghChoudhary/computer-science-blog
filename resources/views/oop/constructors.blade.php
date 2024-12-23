@extends('layout')
@section('content')

    <h1 class="heading-primary">Constructors</h1>

    <p class="content">You'll use constructors to do whatever should always be done and done first - when an object for a given class is created.</p>
    <div class="spacer"></div>
    <p class="code-text">Basic constructor example</p>
    <pre>
        <x-torchlight-code language='php'>
            class Product {
                public $name;
                public $price;

                public function __construct($name, $price) {
                    $this->name = $name;
                    $this->price = $price;
                }
            }

            $product = new Product('Soap', 5.99);
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Constructor ( promoted properties )</p>
    <pre>
        <x-torchlight-code language='php'>
            // Without promoted properties
            class CustomerDTO {
                public string $name;
                public string $email;
                public DateTimeImmutable $birth_date;

                public function __construct(
                    string $name,
                    string $email,
                    DateTimeImmutable $birth_date
                ) {
                    $this->name = $name;
                    $this->email = $email;
                    $this->birth_date = $birth_date;
                }
            }


            // With promoted properties
            class CustomerDTO {
                public function __construct( //  [tl! highlight:4]
                    public string $name,
                    public string $email,
                    public DateTimeImmutable $birth_date
                ) {}
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Mix and match is possible with promoted properties</p>
    <pre>
        <x-torchlight-code language='php'>
            class MyClass {
                public string $b;

                public function __construct(
                    public string $a,
                    string $b,
                ) {
                    $this->b = $b;
                }
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Default properties can be passed</p>
    <pre>
        <x-torchlight-code language='php'>
            public function __construct(
                public string $name = 'Brent',
                public DateTimeImmutable $date = new DateTimeImmutable(),
                ) {}
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">You're allowed to read the promoted properties in the constructor body</p>
    <pre>
        <x-torchlight-code language='php'>
            public function __construct(
                public int $a,
                public int $b,
                ) {
                    // Both $this->a and $a is available for use
                    assert($this->a = 100);
                    if ($b = 0) {
                        throw new InvalidArgumentException('…');
                    }
                }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Inheritance is allowed</p>
    <pre>
        <x-torchlight-code language='php'>
            class A {
                public function __construct(
                    public $a,
                ) {}
            }

            class B extends A {
                public function __construct(
                    $a,
                    public $b,
                ) {
                    parent::__construct($a);
                }
            }
        </x-torchlight-code>
    </pre>


@stop
