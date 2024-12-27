@extends('layout')
@section('content')

    <h1 class="heading-primary">Namespaces</h1>

    <p class="content">Namespaces in PHP are designated areas that allow you to group related code elements like classes, interfaces, functions, constants, enums, traits etc.
        It's a way to encapsulate elements to ensure that names are unique in a given context.</p>
    <div class="spacer"></div>

    <p class="code-text">Basic example: Problem</p>
    <pre>
        <x-torchlight-code language='php'>
            // mysql-connection.php
            class Connection
            {
                private string $dsn = 'mysql:dsn';

                public function connect(): string
                {
                    return 'Connecting to ' . $this->dsn;
                }
            }


            // postgres-connection.php
            class Connection
            {
                private string $dsn = 'postgres:dsn';

                public function connect(): string
                {
                    return 'Connecting to ' . $this->dsn;
                }
            }


            // index.php
            require_once 'mysql-connection.php';
            require_once 'postgres-connection.php';

            $connection = new Connection();   // Error
            echo $connection->connect();
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Basic example: Solution</p>
    <pre>
        <x-torchlight-code language='php'>
            // mysql-connection.php
            namespace MySql;

            class Connection
            {
                private string $dsn = 'mysql:dsn';

                public function connect(): string
                {
                    return 'Connecting to ' . $this->dsn;
                }
            }


            // postgres-connection.php
            namespace Postgres;

            class Connection
            {
                private string $dsn = 'postgres:dsn';

                public function connect(): string
                {
                    return 'Connecting to ' . $this->dsn;
                }
            }


            // index.php
            require_once 'mysql-connection.php';
            require_once 'postgres-connection.php';

            $connection_1 = new \MySql\Connection();
            echo $connection_1->connect();     // Connecting to mysql:dsn

            $connection_2 = new \Postgres\Connection();
            echo $connection_2->connect();     // Connecting to postgres:dsn
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">use keyword</p>
    <pre>
        <x-torchlight-code language='php'>

            // index.php
            require_once 'mysql-connection.php';
            require_once 'postgres-connection.php';

            use MySql\Connection;  // [tl! focus]

            $connection = new Connection();
            echo $connection->connect();     // Connecting to mysql:dsn
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Two classes with same name</p>
    <pre>
        <x-torchlight-code language='php'>
            // index.php
            require_once 'mysql-connection.php';
            require_once 'postgres-connection.php';

            use MySql\Connection;
            use Postgres\Connection as PostgresConnection;

            $connection_1 = new Connection();
            echo $connection_1->connect();     // Connecting to mysql:dsn

            $connection_2 = new PostgresConnection();
            echo $connection_2->connect();     // Connecting to postgres:dsn
        </x-torchlight-code>
    </pre>
    <div class="spacer"></div>

    <p class="code-text">Best practices for autoloading</p>
    <pre>
        <x-torchlight-code language='php'>
            // Folder structure
            // MySql/Connection.php
            // Postgres/Connection.php


            // index.php
            require_once 'MySql/Connection.php';
            require_once 'Postgres/Connection.php';

            use MySql\Connection;
            use Postgres\Connection as PostgresConnection;

            $connection_1 = new Connection();
            echo $connection_1->connect();     // Connecting to mysql:dsn

            $connection_2 = new PostgresConnection();
            echo $connection_2->connect();     // Connecting to postgres:dsn
        </x-torchlight-code>
    </pre>


@stop
