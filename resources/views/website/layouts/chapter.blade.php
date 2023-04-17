<!DOCTYPE html>
<html id="ctl00_Html1" lang="en">

<head id="ctl00_Head1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="font" href="{{asset('fonts/website/icomanga.ttf')}}" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/website/font-manga.min.css')}}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="{{asset('uploads/logo/favicon.png')}}">
    <title>@yield('title')</title>
</head>

<body id="ctl00_Body" class="chapter-detail vi-vn site1">
    <?php

    use App\Models\Genres;

    $genres = Genres::latest()->get();
    ?>
    <header class="header" id="header">
        <div class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand"><a class="logo" title="Truyện tranh online" href="/"><img alt="Logo NetTruyen" src="//st.nettruyenvt.com/data/logos/logo-nettruyen.png" width="150" style="aspect-ratio:5"></a></div>
                    <div class="navbar-form navbar-left hidden-xs search-box comicsearchbox">
                        <form action="{{route('genre')}}" method="Get">
                            <div class="input-group">
                                <input type="text" name="keyword" class="searchinput form-control" placeholder="Search manga..." autocomplete="off">
                                <div class="input-group-btn">
                                    <input type="submit" value="" class="searchbutton btn btn-default">
                                </div>
                            </div>
                        </form>
                    </div>
                    <i class="fa fa-lightbulb-o toggle-dark"></i>
                    <div class="notifications"><a href="#" title="Thông báo"><i class="fa fa-comment"></i></a></div><button type="button" class="search-button-icon visible-xs" aria-label="Search">
                        <i class="fa fa-search"></i>
                    </button>
                    <button type="button" class="navbar-toggle" aria-label="Menu">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <script>
                    var gOpts = {};
                    gOpts.host = "nettruyenvt.com";
                    var _0xcca4 = [".toggle-dark", "querySelector", "undefined", "body", "class", "fa fa-lightbulb-o on toggle-dark", "setAttribute", "dark", "indexOf", "getAttribute", " dark", "fa fa-lightbulb-o toggle-dark", "", "replace", "dark-theme", "click", "removeItem", "addEventListener", "parentNode", "removeChild"],
                        toggleDarkObj = document[_0xcca4[1]](_0xcca4[0]);
                    if (_0xcca4[2] != typeof Storage) {
                        function setDarkTheme(c, a) {
                            var e = document[_0xcca4[3]];
                            1 == a ? (c[_0xcca4[6]](_0xcca4[4], _0xcca4[5]), e[_0xcca4[9]](_0xcca4[4])[_0xcca4[8]](_0xcca4[7]) < 0 && e[_0xcca4[6]](_0xcca4[4], e[_0xcca4[9]](_0xcca4[4]) + _0xcca4[10])) : (c[_0xcca4[6]](_0xcca4[4], _0xcca4[11]), e[_0xcca4[9]](_0xcca4[4])[_0xcca4[8]](_0xcca4[10]) >= 0 && e[_0xcca4[6]](_0xcca4[4], e[_0xcca4[9]](_0xcca4[4])[_0xcca4[13]](_0xcca4[10], _0xcca4[12])))
                        }
                        void 0 !== localStorage[_0xcca4[14]] && setDarkTheme(toggleDarkObj, !0), toggleDarkObj[_0xcca4[17]](_0xcca4[15], (function(c) {
                            _0xcca4[11] == this[_0xcca4[9]](_0xcca4[4]) ? (setDarkTheme(this, !0), localStorage[_0xcca4[14]] = 1) : (setDarkTheme(this, !1), void 0 !== localStorage[_0xcca4[14]] && localStorage[_0xcca4[16]](_0xcca4[14]))
                        }))
                    } else toggleDarkObj[_0xcca4[18]] && toggleDarkObj[_0xcca4[18]][_0xcca4[19]](toggleDarkObj);
                </script>
                <ul class="nav-account list-inline hidden-xs pull-right">
                    <li class="login-link"><a rel="nofollow" href="{{route('login')}}">Đăng nhập</a></li>
                    <li class="register-link"><a rel="nofollow" href="{{route('register')}}">Đăng ký</a></li>
                </ul>
            </div>
        </div>
    </header>
    <nav class="main-nav hidden-xs">
        <div class="inner">
            <div class="container">
                <div class="Module Module-144">
                    <div class="ModuleContent">
                        <ul class="nav navbar-nav main-menu">
                            <li class="">
                                <a target="_self" href="/">
                                    <i class="fa fa-home hidden-xs">
                                    </i>
                                    <span class="visible-xs">Home</span>
                                </a>
                            </li>
                            <li class="">
                                <a target="_self" href="{{route('follow')}}">Follow</a>
                            </li>
                            <li class="{{ Request::path() == 'lich-su' ? 'active' : '' }}">
                                <a target="_self" href="{{route('history')}}">History</a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" target="_self" href="{{route('genre')}}">Genres <i class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu megamenu">
                                    <li>
                                        <div class="clearfix">
                                            @foreach($genres as $genre)
                                            <div class="col-sm-4">
                                                <ul class="nav">
                                                    <li>
                                                        <a data-title="{{$genre->description}}" href="{{route('genre')}}" target="_self">
                                                            <strong>{{$genre->name}}</strong>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                            @endforeach
                                            <div class="col-sm-12 hidden-xs">
                                                <p class="tip">
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/do.quanghuy.5205/">Group</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    @include("website.blocks.footer")
    <div class="navbar-collapse">
        <div class="search-box comicsearchbox">
            <div class="input-group">
                <input type="text" class="searchinput form-control" placeholder="Tìm truyện..." autocomplete="off">
                <div class="input-group-btn">
                    <input type="submit" value="" class="searchbutton btn btn-default">
                </div>
            </div>
        </div>
        <div class="Module Module-144">
            <div class="ModuleContent">
                <ul class="nav navbar-nav main-menu">
                    <li>
                        <a target="_self" href="/">
                            <i class="fa fa-home hidden-xs">
                            </i>
                            <span class="visible-xs">Home</span>
                        </a>
                    </li>
                    <li>
                        <a target="_self" href="{{route('follow')}}">Follow</a>
                    </li>
                    <li>
                        <a target="_self" href="{{route('history')}}">History</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" target="_self" href="{{route('genre')}}">Genres<i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu megamenu">
                            <li>
                                <div class="clearfix">
                                    <div class="col-sm-3">
                                        <ul class="nav">
                                            @foreach($genres as $genre)
                                            <li>
                                                <a data-title="{{$genre->description}}" href="{{route('genre')}}" target="_self">
                                                    <strong>{{$genre->name}}</strong>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 hidden-xs">
                                        <p class="tip">
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/groups/nettruyenonline/">Group</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="nav-account list-inline">
            <li class="login-link">
                <a rel="nofollow" href="{{route('login')}}">
                    Login
                </a>
            </li>
            <li class="register-link">
                <a rel="nofollow" href="{{route('register')}}">
                    Register
                </a>
            </li>
        </ul>
    </div>
    <a id="back-to-top" style="display: none;">
        <i class="fa fa-angle-up"></i>
    </a>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>

    <script src="{{asset('js/website/scripts.min.js?v=1.1.3.7')}}" type="text/javascript"></script>

    <!--googleoff: all-->

    <img src="https://whos.amung.us/swidget/6scusyophh/" width="0" height="0" border="0">
    <!--googleon: all-->

</body>

</html>