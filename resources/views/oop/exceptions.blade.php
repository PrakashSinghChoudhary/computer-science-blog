@extends('layout')
@section('content')

    <h1 class="heading-primary">Exceptions</h1>

    <p class="content">Exception handling is the process of making accommodations for errors and responding to them programmatically, which results in the execution of an alternate, but previously planned, sequence of code. It can be found in a variety of places, including software, hardware, and electrical systems, such as the motherboard of your computer.</p>

    <div class="spacer"></div>
    <h2 class="heading-secondary">Key features</h2>
    <ul class="list-disc list-outside space-y-2">
        <li><span class="tick">try</span> - Contains the code that might throw an exception.</li>
        <li><span class="tick">catch</span> - Catches and handles the exception if one is thrown. You can catch specific exception types using their class name.</li>
        <li><span class="tick">finally</span> - Executes regardless of whether an exception was thrown or caught, typically used for cleanup tasks.</li>
    </ul>
    <div class="spacer"></div>

    <p class="code-text">Basics of try catch block</p>
    <pre>
        <x-torchlight-code language='php'>
            try {
                riskyFunction();
            } catch (Exception $e) {
                echo "Exception caught: " . $e->getMessage();
            } finally {
                echo "Finally block executed.";
            }


            // Catch multiple Exceptions
            try {
                riskyOperation();
            } catch (TypeError $e) {
                echo "Type Error: " . $e->getMessage();
            } catch (Exception $e) {
                echo "General Error: " . $e->getMessage();
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Custom Exceptions</p>
    <pre>
        <x-torchlight-code language='php'>
            class CustomException extends Exception {}

            try {
                throw new CustomException("This is a custom exception.");
            } catch (CustomException $e) {
                echo "Caught custom exception: " . $e->getMessage();
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>


@stop
