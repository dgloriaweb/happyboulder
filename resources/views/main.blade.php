<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Boulder</title>
    <style>
        body {
            max-width: 400px;
            margin: auto;
            font-family: sans-serif;
            padding: 1em;
            box-sizing: border-box;
        }

        .container {
            margin-top: 82px;
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 1em;
            margin-bottom: 1.5em;
            flex-wrap: wrap;
        }

        nav a {
            background: #38bdf8;
            color: white;
            text-decoration: none;
            padding: 0.6em 1.2em;
            border-radius: 0.3em;
            font-weight: bold;
            transition: background 0.2s;
        }

        nav a.active,
        nav a:hover {
            background: #0ea5e9;
        }

        @media (max-width: 500px) {
            body {
                max-width: 100vw;
                padding: 0.5em;
            }

            nav a {
                font-size: 0.95em;
                padding: 0.5em 0.8em;
            }
        }
    </style>
</head>

<body>
    @include('menu')
    <div>
        @yield('content')
    </div>
</body>

</html>