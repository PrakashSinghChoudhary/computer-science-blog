@extends('layout')
@section('content')

    <h1 class="heading-primary">Autoloading</h1>

    <p class="content">Autoloading in PHP automatically loads class files when they're needed, rather than requiring manual inclusion of every class file using require/include statements. This makes code more maintainable and efficient.</p>
    <div class="spacer"></div>
    <p class="code-text">Example of autoloading using spl_autoload_register function</p>
    <pre>
        <x-torchlight-code language='php'>
            $autoload = function(string $classname) {
                $classname = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
                if (file_exists("{$classname}.php")) {
                    require_once "{$classname}.php";
                }
            };

            spl_autoload_register($autoload);
        </x-torchlight-code>
    </pre>


@stop
