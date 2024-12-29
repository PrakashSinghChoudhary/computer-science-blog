@extends('layout')
@section('content')

    <h1 class="heading-primary">Key component of go</h1>
    <p class="content">Below code is an example of a basic golang program</p>
    <div class="spacer"></div>
    <p class="code-text">Example of a Golang's Hello world program</p>
    <pre>
        <x-torchlight-code language='go'>
            package main

            import "fmt"

            func main() {
                fmt.Println("Hello, World!")
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="content">Explanation</p>
    <ul class="list-disc list-outside space-y-2">
        <li>Every Go program starts with a package declaration. The main package is special because it defines a standalone executable program, not a library.</li>
        <li>This imports the format package (abbreviated as 'fmt'), which contains functions for formatted I/O operations. It's part of Go's standard library.</li>
        <li>This declares the main function, which is the entry point of the program. When you run the program, it starts executing from here.</li>
    </ul>

@stop
