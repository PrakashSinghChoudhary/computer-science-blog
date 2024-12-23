@extends('layout')
@section('content')

    <h1 class="heading-primary">Type Hinting</h1>
    <p class="content">Type hinting in PHP allows you to specify the expected data type of arguments, return types, or class properties, improving code readability and reducing runtime errors.</p>
    <div class="spacer"></div>
    <h2 class="heading-secondary">Different Types in PHP</h2>
    <ul class="list-disc list-outside space-y-2">
        <li><span class="code-sample">string</span> - Value must be a string.</li>
        <li><span class="code-sample">int</span> - Value must be an integer.</li>
        <li><span class="code-sample">float</span> - Value must be a floating-point number.</li>
        <li><span class="code-sample">bool</span> - Value must be boolean (i.e., either true or false).</li>
        <li><span class="code-sample">array</span> - Value must be an array.</li>
        <li><span class="code-sample">iterable</span> - Value must be an array or object that can be used with the foreach loop.</li>
        <li><span class="code-sample">callable</span> - Value must be a callable function.</li>
        <li><span class="code-sample">parent</span> - Value must be an instance of the parent to the defining class. This can only be used on class and instance methods.</li>
        <li><span class="code-sample">self</span> - Value must be either an instance of the class that defines the method or a child of the class. This can only be used on class and instance methods.</li>
        <li><span class="code-sample">interface name</span> - Value must be an object that implements the given interface.</li>
        <li><span class="code-sample">class name</span> - Value must be an instance of the given class name.</li>
        <li><span class="code-sample">mixed</span> - Value can be any type.</li>
        <li><span class="code-sample">void</span> - Value must be nothing. It can only be used in function returns.</li>
    </ul>
    <div class="spacer"></div>
    <p class="code-text">Type-Hinting Function Parameters</p>
    <pre>
        <x-torchlight-code language='php'>
            function add(int $a, int $b) {
                return $a + $b;
            }

            // This will work
            echo add("2","2"); // returns 4
        </x-torchlight-code>
    </pre>
    <p class="content">This is because PHP attempts to convert wrong scalar values into the correct type, which it did successfully in this case. However, if you gave a string value of <span class="code-sample">echo add("2","three");</span>, you will get an error.</p>
    <p class="code-text">To enfore strict typing use declare statement at the top of the file.</p>
    <pre>
        <x-torchlight-code language='php'>
            declare(strict_types=1);
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Type-Hinting Function Returns</p>
    <pre>
        <x-torchlight-code language='php'>
            function add(int $a, int $b): int {
                return $a + $b;
            }

            // use void when nothing is returned
            function like(): void{
                $post->likes + 1;
                return;
            }

            // use static to return the instance of the object
            // that defines a function that is called
            class Person
            {
                public function returnPerson(): static
                {
                    return new Person();
                }
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Nullable Types</p>
    <pre>
        <x-torchlight-code language='php'>
            function greeting(?string $username)
            {
                echo $username === null ? 'Hello User!' : "Hello $username";
            }

            // nullable return types
            function greeting(?string $username) : ?string
            {
                if ($username) {
                    return "Hello, $username!";
                }
                return null;
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Union Types</p>
    <pre>
        <x-torchlight-code language='php'>
            function formatPrice(float | int $price): string
            {
                return '$' . number_format($price, 2);
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Type-Hinting Class Properties</p>
    <pre>
        <x-torchlight-code language='php'>
            class Person
            {
                public string $name;
                public int $age;
                public float $height;
                public bool $is_married;

                public function __construct($name, $age, $height, $is_married)
                {
                    $this->name = $name;
                    $this->age = $age;
                    $this->height = $height;
                    $this->is_married = $is_married;
                }
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Using the callable Type</p>
    <pre>
        <x-torchlight-code language='php'>
            function sortArray(callable $sort_function, array $array)
            {
                $sort_function($array);
                return $array;
            }

            // Example
            function bubbleSort(array $array): array
            {
                $sorted = false;
                while (!$sorted) {
                    $sorted = true;
                    for ($i = 0; $i < count($array) - 1; $i++) {
                        if ($array[$i] > $array[$i + 1]) {
                            $temp = $array[$i];
                            $array[$i] = $array[$i + 1];
                            $array[$i + 1] = $temp;
                            $sorted = false;
                        }
                    }
                }
                print_r($array);
                return $array;
            }
            sortArray('bubbleSort', [1, 3, 2, 5, 4]);
        </x-torchlight-code>
    </pre>



@stop
