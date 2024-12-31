@extends('layout')
@section('content')

    <h1 class="heading-primary">Variables and data types</h1>
    <p class="content">In Go, values have a data type. The data type determines what type of information is being stored and how much space is needed to store it.</p>
    <div class="spacer"></div>
    <p class="code-text">Variables</p>
    <pre>
        <x-torchlight-code language='go'>
            // Using var keyword with explicit type
            var name string = "John Doe"
            var age int = 25

            // Using var without type (type inference)
            var score = 95.5  // float64

            // Short declaration operator :=
            message := "Hello"  // Preferred inside functions
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Multiple variable declaration</p>
    <pre>
        <x-torchlight-code language='go'>
            // Multiple variables of the same type
            var x, y int = 10, 20

            // Multiple variables of different types
            var (
                name   string = "John Doe"
                age    int    = 25
                active bool   = true
            )
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Zero values</p>
    <pre>
        <x-torchlight-code language='go'>
            var a int     // 0
            var b string  // "" (empty string)
            var c bool    // false
            var d float64 // 0.0
            var e *int    // nil (for pointers)
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Constants</p>
    <pre>
        <x-torchlight-code language='go'>
            const Pi = 3.14159
            const (
                StatusOK    = 200
                StatusError = 500
            )
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="content">Key points</p>
    <ul class="list-disc list-outside space-y-2">
        <li>Variables must be used if declared within a function (compiler error otherwise).</li>
        <li>Go is statically typed but offers type inference.</li>
        <li>The <span class="tick">:=</span> operator can only be used inside functions.</li>
        <li>Variables declared outside functions must use the <span class="tick">var</span> keyword.</li>
        <li>Variable names must start with a letter and can contain letters, numbers, and underscores.</li>
    </ul>
    <div class="spacer"></div>
    <div class="spacer"></div>
    <h2 class="heading-secondary">Data types</h2>
    <div class="spacer"></div>
    <p class="code-text">Basic types</p>
    <pre>
        <x-torchlight-code language='go'>
            // Numeric Types
            var i int     = 42        // Platform dependent (32 or 64 bit)
            var i8 int8   = 127       // -128 to 127
            var i16 int16 = 32767     // -32768 to 32767
            var i32 int32 = 2147483647
            var i64 int64 = 9223372036854775807

            var ui uint   = 42        // Platform dependent unsigned
            var ui8 uint8 = 255       // 0 to 255
            var ui16 uint16 = 65535   // 0 to 65535

            // Float Types
            var f32 float32 = 3.14    // Single precision
            var f64 float64 = 3.14159 // Double precision

            // Complex Types
            var c64 complex64   = 5 + 3i
            var c128 complex128 = 5 + 3i

            // Boolean
            var b bool = true    // true or false

            // String
            var s string = "Hello" // UTF-8 encoded
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Composite Types</p>
    <pre>
        <x-torchlight-code language='go'>
            // Array (fixed length)
            var arr [5]int = [5]int{1, 2, 3, 4, 5}

            // Slice (dynamic length)
            var slice []int = []int{1, 2, 3}
            slice = append(slice, 4)

            // Map
            var m map[string]int = map[string]int{
                "one": 1,
                "two": 2,
            }

            // Struct
            type Person struct {
                Name string
                Age  int
            }
            p := Person{Name: "Claude", Age: 25}

            // Pointer
            var ptr *int
            num := 42
            ptr = &num
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Interface Type</p>
    <pre>
        <x-torchlight-code language='go'>
            // Interface
            type Reader interface {
                Read(p []byte) (n int, err error)
            }
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Channel Type</p>
    <pre>
        <x-torchlight-code language='go'>
            // Channel
            ch := make(chan int)    // Unbuffered channel
            bch := make(chan int, 5) // Buffered channel with capacity 5
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Special Type</p>
    <pre>
        <x-torchlight-code language='go'>
            // Byte (alias for uint8)
            var b byte = 255

            // Rune (alias for int32, represents Unicode code point)
            var r rune = 'A'
        </x-torchlight-code>
    </pre>

@stop
