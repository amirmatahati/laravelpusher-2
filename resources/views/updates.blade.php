<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Updytes | Home</title>
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--<link href="{{ asset('css/updates.css') }}" rel="stylesheet">-->
    <style>
        .updates .avatar {
            border-radius: 50%;
            text-indent: 1000px;
            border-radius: 50%;
            height: 34px;
            line-height: 34px;
            width: 34px;
            border: 2px solid #fff;
        }
        .stat{
            clear: box;
            height: auto;
            margin-bottom: 20px;
            margin-top: 25px;
        }
        .stat .head_box{
            height: 84px;
        }
        .stat .head_box img{
            float: left;
            width: 53px;
            height: 53px;
            margin-right: 11px;
        }
        .stat .head_box .u_date{
            clear: both;
            position: relative;
            top: -31px;
            float: left;
            left: 61px;
        }
        .comment{
            clear: both;
            margin-top: 10px;
            margin-bottom: 20px;
            height: auto;
        }
        .comment img{
            float: left;
            width: 53px;
            height: 53px;
            margin-right: 11px;
        }
    </style>
</head>

<body class="bg-light updates">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mr-auto mr-lg-0" href="#">UPDAYTES</a>
        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div id="app">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="nav-scroller bg-white shadow-sm clearfix">
            <OnlineList :me='@json(auth()->user()->toArray())'></OnlineList>
        </div>
        <main role="main" class="container">
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
                <img class="mr-3" src="{{ asset('img/bootstrap-outline.svg') }}" alt="" width="48" height="48">
                <div class="lh-100">
                    <h6 class="mb-0 text-white lh-100">Bootstrap Forum</h6>
                    <small>Updates on the development of the community</small>
                </div>
            </div>
            <Updates></Updates>
            <Suggestions></Suggestions>
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>