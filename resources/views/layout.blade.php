<!DOCTYPE html>
<html>
<head>
   @include('partials.head')
</head>
<body class="flex flex-col h-screen text-slate-700 scroll-smooth">
   <header class="fixed w-screen z-100 bg-white">@include('partials.header')</header>
   <main class="w-[700px] mx-auto flex-grow mt-[300px]">@yield('content')</main>
   @include('partials.footer')
</body>
</html>


<html lang="en">
<head>

</head>
<body>

</body>
</html>
