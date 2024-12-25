@extends('layout')
@section('content')

    <h1 class="heading-primary">Magic Methods</h1>

    <p class="content">PHP magic methods are special methods in a class. The magic methods override the default actions when the object performs the actions.</p>
    <div class="spacer"></div>

    <p class="code-text">__get() is invoked when reading the value from a non-existing or inaccessible property</p>
    <pre>
        <x-torchlight-code language='php'>
            // Part 1
            class Organization
            {
                public function __construct(
                    public string $name,
                    public int $establishedYear
                ) {}

                public function __get($property)
                {
                    return $property . ' property doesnt exist on ' . self::class;
                }
            }

            $org = new Organization('Acme', 2005);
            echo $org->name;                 // Acme
            echo $org->establishedYear;      // 2005
            echo $org->ceo;                  // ceo property doesnt exist on Organization



            // Part 2
            class Organization
            {
                public function __construct(
                    protected string $name,
                    public int $establishedYear
                ) {}

                public function __get($property)
                {
                    if (property_exists($this, $property)) {
                        return $this->{$property};
                    }
                    throw new Error('Property doesnt exist on the class');
                }
            }


            $org = new Organization('Acme', 2005);
            echo $org->name;       // Acme
            echo $org->email;      // Error
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">__set() is invoked when writing a value to a non-existing or inaccessible property</p>
    <pre>
        <x-torchlight-code language='php'>
            class Organization
            {
                public function __construct(
                    protected string $name,
                    public int $establishedYear
                ) {}

                public function __get($property)
                {
                    if (property_exists($this, $property)) {
                        return $this->{$property};
                    }
                    throw new Error('Property doesnt exist on the class');
                }

                public function __set($property, $value)
                {
                    return $this->{$property} = $value;
                }
            }


            $org = new Organization('Acme', 2005);

            // Example 1
            echo $org->name;       // Acme
            echo $org->email;      // Error


            // Example 2
            echo $org->name;       // Acme
            $org->email = "example@gmail.com";
            echo $org->email;      // example@gmail.com ( Works but shows Deprecation warning )
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">__unset() is invoked when unset() is used on a non-existing or inaccessible property.</p>
    <pre>
        <x-torchlight-code language='php'>
            class Organization
            {
                public function __construct(
                    protected string $name,
                    public int $establishedYear
                ) {}

                public function __get($property)
                {
                    if (property_exists($this, $property)) {
                        return $this->{$property};
                    }
                    throw new Error('Property doesnt exist on the class');
                }

                public function __set($property, $value)
                {
                    return $this->{$property} = $value;
                }

                public function __unset($property) {
                    throw new Error($property . ' doesnt exist.');
                }
            }


            $org = new Organization('Acme', 2005);
            echo $org->name;          // Acme
            unset($org->email);       // Error
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">__toString() is invoked when an object of a class is treated as a string.</p>
    <pre>
        <x-torchlight-code language='php'>
            class BankAccount
            {

                public function __construct(
                    private $accountNumber,
                    private $balance
                ) {}
            }


            $account = new BankAccount('123456789', 100);
            echo $account;    // Error


            class BankAccount
            {

                public function __construct(
                    private $accountNumber,
                    private $balance
                ) {}

                public function __toString()    //  [tl! highlight:3]
                {
                    return "Bank Account: $this->accountNumber. Balance: $$this->balance";
                }
            }


            $account = new BankAccount('123456789', 100);
            echo $account;    // Bank Account: 123456789. Balance: $100
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

@stop
