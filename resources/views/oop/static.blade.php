@extends('layout')
@section('content')

    <h1 class="heading-primary">Static</h1>

    <p class="content">In PHP, the static keyword is used to declare properties and methods within a class that belong to the class itself rather than any particular instance of the class.</p>
    <p class="content">Because static methods are callable without an instance of the object created, the pseudo-variable <span class='tick'>$this</span> is not available inside methods declared as static.</p>
    <p class="content">You can use <span class='tick'>self::</span> to access static methods or properties within the same class.</p>
    <div class="spacer"></div>

    <p class="heading-secondary">Properties</p>
    <ul class="list-disc list-outside space-y-2">
        <li>A static property is shared among all instances of a class.</li>
        <li>It belongs to the class itself rather than any specific object.</li>
        <li>Static properties are accessed using the scope resolution operator <span class='tick'>::</span></li>
    </ul>
    <div class="spacer"></div>
    <div class="spacer"></div>

    <p class="heading-secondary">Methods</p>
    <ul class="list-disc list-outside space-y-2">
        <li>A static method can be called without creating an instance of the class.</li>
        <li>These methods cannot access non-static properties or methods directly, as they are not tied to any specific instance of the class.</li>
        <li>Like static properties, they are accessed using the scope resolution operator <span class='tick'>::</span></li>
    </ul>
    <div class="spacer"></div>

    <p class="code-text">Example of static</p>
    <pre>
        <x-torchlight-code language='php'>
            class Example {
                public static $counter = 0;

                public static function incrementCounter() {
                    self::$counter++;
                }
            }

            // Accessing and modifying static property
            Example::$counter = 5; //  [tl! highlight:1]
            echo Example::$counter;       // 5

            Example::incrementCounter(); //  [tl! highlight:1]
            echo Example::$counter;       // 6



            // static methods and properties can
            // be called or accessed from object
            $example = new Example();
            echo $example::incrementCounter(); //  [tl! highlight:1]
            echo $example::$counter;       // 7
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Complex example</p>
    <pre>
        <x-torchlight-code language='php'>
            class Base {
                public static function who() {
                    echo "Base class";
                }

                public static function test() {
                    self::who();  // [tl! focus]
                }
            }

            class Child extends Base {
                public static function who() {
                    echo "Child class";
                }
            }

            Child::test();      // "Base class" (due to self::who())  [tl! focus]
            Child::who();       // "Child class" [tl! focus]


            // Late stage binding  [tl! focus]
            class Base {
                public static function who() {
                    echo "Base class";
                }

                public static function test() {
                    static::who();  // [tl! focus]
                }
            }

            class Child extends Base {
                public static function who() {
                    echo "Child class";
                }
            }

            Child::test();      // "Child class" (due to static::who())  [tl! focus]
            Child::who();       // "Child class"  [tl! focus]
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Real world examples</p>
    <pre>
        <x-torchlight-code language='php'>
            // Logger class
            class Logger {
                private static $logFile = "app.log";

                public static function log($message) {
                    $date = date('Y-m-d H:i:s');
                    $data = "[$date] $message\n";
                    file_put_contents(self::$logFile, $data, FILE_APPEND);
                }
            }

            // Usage
            Logger::log("Application started");
            Logger::log("User logged in");
        </x-torchlight-code>
    </pre>
    <pre>
        <x-torchlight-code language='php'>
            // Config class
            class Config {
                private static $settings = [];

                public static function set($key, $value) {
                    self::$settings[$key] = $value;
                }

                public static function get($key) {
                    return self::$settings[$key] ?? null;
                }
            }

            // Usage
            Config::set('db_host', 'localhost');
            Config::set('db_user', 'root');

            echo Config::get('db_host');     // localhost
            echo Config::get('db_user');     // root
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <h2 class="heading-secondary">Self vs Static</h2>
    <p class="content"><span class="tick">self</span> refers to the class where the method is defined while
        <span class="tick">static</span> refers to the class that was called, even if the method is inherited.
        </p>
@stop
