@extends('layout')
@section('content')

    <h1 class="heading-primary">Abstract Classes</h1>
    <p class="content">Abstract classes are classes that cannot be instantiated directly and may contain both abstract and concrete methods along with regular properties, static properties and static methods. They serve as blueprints for other classes and can contain a mixture of abstract and non-abstract methods.</p>
    <p class="content">Abstract methods cannot be private, because by definition they must be implemented by a derived class.</p>
    <p class="content">When inheriting from an abstract class, all methods marked abstract in the parent's class declaration must be defined by the child class, and follow the usual inheritance and signature compatibility rules.</p>
    <p class="content">Use case - Abstract classes are used when you want to provide a common base implementation for derived classes while leaving certain methods to be implemented by subclasses. They are well-suited for defining a template for a group of related classes.</p>
    <div class="spacer"></div>

    <p class="code-text">Example of a abstract class</p>
    <pre>
        <x-torchlight-code language='php'>
            abstract class Shape
            {

                public function __construct(protected $color) {}

                abstract public function calculateArea();
                abstract public function calculatePerimeter();

                public function getColor()
                {
                    return $this->color;
                }
            }

            class Circle extends Shape
            {

                public function __construct($color, private $radius)
                {
                    parent::__construct($color);
                }

                public function calculateArea()
                {
                    return pi() * pow($this->radius, 2);
                }

                public function calculatePerimeter()
                {
                    return 2 * pi() * $this->radius;
                }
            }

            class Rectangle extends Shape
            {

                public function __construct(
                    $color,
                    private $length,
                    private $width
                ) {
                    parent::__construct($color);
                }

                public function calculateArea()
                {
                    return $this->length * $this->width;
                }

                public function calculatePerimeter()
                {
                    return 2 * ($this->length + $this->width);
                }
            }

            $circle = new Circle('red', 4);
            $rect = new Rectangle('yellow', 4, 8);

            echo $circle->calculateArea();   // 50.26
            echo $rect->calculateArea();     // 32
        </x-torchlight-code>
    </pre>

    <div class="spacer"></div>
    <p class="code-text">Real world example of abstract class</p>
    <pre>
        <x-torchlight-code language='php'>
            abstract class DatabaseConnection
            {

                public function __construct(
                    protected $host,
                    protected $user,
                    protected $password,
                    protected $database
                ) {}

                // Abstract method to be implemented by subclasses
                abstract public function connect();

                // Method for logging connection details
                public function log($message)
                {
                    echo "[LOG]: $message\n";
                }
            }

            class MySQLConnection extends DatabaseConnection
            {
                public function connect()
                {
                    $this->log("Connecting to MySQL Database: $this->database");
                    // MySQL connection logic here
                }
            }

            class PostgreSQLConnection extends DatabaseConnection
            {
                public function connect()
                {
                    $this->log("Connecting to PostgreSQL Database: $this->database");
                    // PostgreSQL connection logic here
                }
            }

            // Example Usage
            $mysql = new MySQLConnection("localhost", "root", "password", "my_database");
            $mysql->connect();

            $postgres = new PostgreSQLConnection("localhost", "postgres", "password", "my_database");
            $postgres->connect();
        </x-torchlight-code>
    </pre>

@stop
