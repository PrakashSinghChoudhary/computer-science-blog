@extends('layout')
@section('content')

    <h1 class="heading-primary">Classes and Object</h1>

    <h1 class="heading-secondary">Class</h1>
    <p class="content">
       A blueprint or template for creating objects. It defines the structure and behavior of objects.
    </p>
    <div class="spacer"></div>
    <h1 class="heading-secondary">Object</h1>
    <p class="content">
        An instance of a class. It represents a specific entity with data and behavior defined by its class.
    </p>
    <div class="spacer"></div>

    <p class="code-text">Creating a class and an object from that class</p>
    <pre>
        <x-torchlight-code language='php'>
            class Product { }

            $product = new Product();
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Add, access and update properties</p>
    <pre>
        <x-torchlight-code language='php'>
            // Add properties to a class
            class Product {
                public $name;                 // null
                public $price = 0.99;         // 0.99
            }


            $product = new Product();

            // Access property
            $product->name; //  [tl! highlight]

            // Update property
            $product->price = 2.5; //  [tl! highlight]
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Add methods to a class and access it from object</p>
    <pre>
        <x-torchlight-code language='php'>
            // Add methods to a class
            class Product {
                public $name;
                public $price;

                public function priceAsCurrency() { //  [tl! highlight]
                    return $this->price; //  [tl! highlight]
                } //  [tl! highlight]
            }


            // Access it from object
            $product = new Product();
            $product->price = 5;
            $product->priceAsCurrency();    // 5 [tl! highlight]


            // Pass arguments to methods
            class Product {
                public $name;
                public $price;

                public function priceAsCurrency($currency) { //  [tl! highlight]
                    return $currency . $this->price; //  [tl! highlight]
                } //  [tl! highlight]
            }

            $product = new Product();
            $product->price = 5;
            $product->priceAsCurrency('$');    // $5  [tl! highlight]
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>



@stop
