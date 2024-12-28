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

                public function __unset($property)
                {
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

    <p class="code-text">__destruct() is automatically invoked before an object is deleted.</p>
    <pre>
        <x-torchlight-code language='php'>
            class BankAccount
            {

                public function __construct(
                    private $accountNumber,
                    private $balance
                ) {}

                public function __destruct()
                {
                    echo 'Destructor called';
                }
            }


            $account = new BankAccount('123456789', 100);
            unset($account);     // Destructor called
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">__call() is triggered when invoking an inaccessible instance method.</p>
    <pre>
        <x-torchlight-code language='php'>
            class BankAccount
            {

                public function __construct(
                    private $accountNumber,
                    private $balance
                ) {}

                private function setBalance($balance)
                {
                    $this->balance = $balance;
                }

                public function __call($name, $array)
                {
                    echo($name);              // setBalance
                    print_r($array);          // [0 => 500]
                    echo 'Cannot call this method';
                }
            }


            $account = new BankAccount('123456789', 100);
            $account->setBalance(500);     // Cannot call this method
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">__clone() is called once the cloning is complete.</p>
    <pre>
        <x-torchlight-code language='php'>
            class Manager
            {
                public function __construct(public $name)
                {}

                public function __clone()
                {
                    echo 'Cloning is complete.';
                }
            }

            $manager_1 = new Manager('Manager 1');


            // Wrong way
            $manager_2 = $manager_1;
            $manager_2->name = 'Manager 2';

            var_dump($manager_1);    // Manager 2
            var_dump($manager_2);    // Manager 2


            // Correct way
            $manager_2 = clone $manager_1;      // Cloning is complete.
            $manager_2->name = 'Manager 2';

            var_dump($manager_1);    // Manager 1
            var_dump($manager_2);    // Manager 2




            class Manager
            {
                public function __construct(public string $name)
                {}
            }

            class Department
            {
                public function __construct(public string $name, public Manager $manager)
                {}

                public function __clone()
                {
                    $this->manager = clone $this->manager;
                }
            }

            $manager_1 = new Manager('Manager 1');
            $dept_1 = new Department('Department 1', $manager_1);
            $dept_2 = clone $dept_1;
            $dept_2->name = 'Department 2';
            $dept_2->manager->name = 'Manager 2';
            var_dump($dept_1);  // [ name => Department 1, Manager => [ name => Manager 1 ] ]
            var_dump($dept_2);  // [ name => Department 2, Manager => [ name => Manager 2 ] ]
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">__invoke() is invoked when an object is called as a function.</p>
    <pre>
        <x-torchlight-code language='php'>
            class Multiplication
            {
                public function __invoke(float | int $multiplier, float | int $multiplicand): float | int
                {
                    return $multiplier * $multiplicand;
                }
            }

            $multiplication = new Multiplication();
            echo $multiplication(5, 6);    // 30
        </x-torchlight-code>
    </pre>

@stop
