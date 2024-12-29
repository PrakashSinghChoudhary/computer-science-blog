@extends('layout')
@section('content')

    <h1 class="heading-primary">Create Element</h1>
    <p class="content"><span class="tick">createElement</span>  is a fundamental function in React that creates a React element. While we typically write JSX, it's important to understand that JSX is ultimately converted to createElement calls.</p>
    <div class="spacer"></div>
    <p class="code-text">Example of createElement</p>
    <pre>
        <x-torchlight-code language='js'>
            // Syntax
            React.createElement(type, props, ...children);

            const heading = <h1 className="heading">Hello</h1>;
            React.createElement('h1', { className: 'heading' }, 'Hello');
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Render the element on the DOM</p>
    <pre>
        <x-torchlight-code language='js'>
            const root = ReactDOM.createRoot(document.querySelector('#root'));
            root.render(heading);


            // Result:
            // ...
            // <body id="root">
            //     <h1 className="heading">Hello</h1>
            // </body>
            // ...
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>
    <p class="code-text">Example of nested element</p>
    <pre>
        <x-torchlight-code language='js'>
            const element = (
                <div>
                  <h1>Title</h1>
                  <p>Paragraph</p>
                </div>
              );

              const element = React.createElement(
                'div',
                null,
                React.createElement('h1', null, 'Title'),
                React.createElement('p', null, 'Paragraph')
            );
        </x-torchlight-code>
    </pre>





@stop
