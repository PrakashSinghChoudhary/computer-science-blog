@extends('layout')
@section('content')

    <h1 class="heading-primary">Encapsulation</h1>

    <p class="content">Encapsulation is the process of combining data and functions into a single unit called class. In Encapsulation, the data is not accessed directly; it is accessed through the functions present inside the class. In simpler words, attributes of the class are kept private and public getter and setter methods are provided to manipulate these attributes. Thus, encapsulation makes the concept of data hiding possible.</p>
    <div class="spacer"></div>

    <p class="code-text">Example of Encapsulation</p>
    <pre>
        <x-torchlight-code language='php'>
            class User
            {

                private $name;

                public function getName()
                {
                    return $this->name;
                }

                public function setName($name)
                {
                    if ($name === '') {
                        throw new \Exception('Name cannot be empty');
                    }

                    $this->name = $name;
                }

            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Another example of Encapsulation</p>
    <pre>
        <x-torchlight-code language='php'>
            class Movie
            {

                public $name;
                public $releaseYear;
                private $rating;

                public function getRating()
                {
                    return $this->rating;
                }

                public function setRating($rating)
                {
                    if ($rating < 0 || $rating > 5) {
                        throw new \Exception('Invalid rating. Please provide a value between 0 and 5.');
                    }

                    $this->rating = $rating;
                }

            }
        </x-torchlight-code>
    </pre>



@stop
