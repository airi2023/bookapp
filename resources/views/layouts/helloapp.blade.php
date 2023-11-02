<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <style>
        html {
            background-color: #F2F1EC;
        }

        body {
            font-size: 16px;
            color: #777;
            width: 50%;
            margin: 100px auto;
        }

        /* ナビ */
        .links {
            margin-bottom: 50px;
        }

        .links ul {
            list-style: none;
            padding: 0;
            display: flex;
        }

        .links li {
            padding: 10px 20px 10px 0;
        }

        .links li a {
            color: #777;
            text-decoration: none;
            font-weight: bold;
        }

        .links li a:hover {
            color: #718D81;
            border-bottom: 2px solid #718D81;
            /* transition: 0.3s; */
        }

        h2 {
            color: #718D81;
        }

        .page-title {
            /* width: 61%; */
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        /*ページ名　見出しデザイン*/
        .page-title ul {
            padding: 0.5em 6vw 0.5em 1em;
            color: #777;
            background: #fffdf4;
            border-left: solid 5px #718D81;
            list-style-type: none;
        }

        .page-title img {
            width: 6vw;
            display: none;
            /*いったん非表示*/
        }

        .content {
            display: flex;
            justify-content: center;
            margin: 50px 0;
        }

        th {
            background-color: #718D81;
            color: #fff;
            padding: 5px 10px;
        }

        td {
            background-color: #fff;
            border: solid 1px #aaa;
            color: #888;
            padding: 5px 2.5vw;
        }

        .footer {
            text-align: center;
            padding: 10px 0;
            color: #999;
        }

        /* 検索ページのみ　結果表示後 */
        .search table {
            margin: 50px auto;
        }
    </style>
</head>

<body>

    {{-- @section('links') --}}
    <div class="links">
        <ul>
            <li><a href="http://127.0.0.1:8000/bookapp">Index</a></li>
            <li><a href="http://127.0.0.1:8000/bookapp/find">Search</a></li>
            <li><a href="http://127.0.0.1:8000/bookapp/add">Add NewBook</a></li>
            <li><a href="http://127.0.0.1:8000/bookapp/del">Delete</a></li>
            <li><a href="http://127.0.0.1:8000/bookapp/edit">Edit</a></li>
        </ul>
    </div>
    {{-- @show --}}

    <h2>@yield('title')</h2>
    <div class="page-title">
        @section('menubar')
            <ul>
                <li>
                @show
            </li>
        </ul>

        <img src="{{ asset('images/1.png') }}" alt="">
    </div>

    <hr size="1">

    <div class="content">
        @yield('content')
    </div>

    <hr size="1">

    <div class="footer">
        @yield('footer')
    </div>
</body>

</html>
