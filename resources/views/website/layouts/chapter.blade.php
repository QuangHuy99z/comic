<!DOCTYPE html>
<html id="ctl00_Html1" lang="en">

<head id="ctl00_Head1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" as="font" href="//nettruyenvt.com/Data/Sites/1/skins/comic/fonts/icomanga.ttf?fa7dup"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="//nettruyenvt.com/Data/Sites/1/skins/comic/css/styles.min.css?v=1.1.2.6">
    <link rel="icon" type="image/png" href="//st.nettruyenpro.com/data/logos/favicon.png?v=1">
    <title>@yield('title')</title>
</head>

<body id="ctl00_Body" class="dark chapter-detail vi-vn site1">
    <?php
        use App\Models\Genres;
        $genres = Genres::latest()->get();
    ?>
    <header class="header">
        <div class="navbar">
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand Module"><a class="logo" title="Truyện tranh online" href="/">CommicBuddy</a>
                    </div>
                    <div class="navbar-form navbar-left hidden-xs search-box comicsearchbox">
                        <div class="input-group">
                            <input type="text" class="searchinput form-control" placeholder="Search manga..."
                                autocomplete="off">
                            <div class="input-group-btn">
                                <input type="submit" value="" class="searchbutton btn btn-default">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="search-button-icon visible-xs" aria-label="Search">
                        <i class="fa fa-search"></i>
                    </button>
                    <button type="button" class="navbar-toggle" aria-label="Menu">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <ul class="nav-account list-inline hidden-xs pull-right">
                    <li class="login-link"><a rel="nofollow"
                            href="{{route('login')}}">Login
                            </a></li>
                    <li class="register-link"><a rel="nofollow"
                            href="{{route('register')}}">Register
                            </a>
                        <script>var globalOpts = {};</script>
                    </li>
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
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                                    target="_self" href="{{route('genre')}}">Genres <i
                                        class="fa fa-caret-down"></i></a>
                                <ul class="dropdown-menu megamenu">
                                    <li>
                                        <div class="clearfix">
                                            @foreach($genres as $genre)
                                                <div class="col-sm-4">
                                                    <ul class="nav">
                                                        <li>
                                                            <a data-title="{{$genre->description}}"
                                                                href="{{route('genre')}}" target="_self">
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
                                <a target="_blank" rel="noopener noreferrer"
                                    href="https://www.facebook.com/do.quanghuy.5205/">Group</a>
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
                            <span class="visible-xs">Trang chủ</span>
                        </a>
                    </li>
                    <li>
                        <a target="_self" href="{{route('follow')}}">Theo dõi</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                            target="_self" href="{{route('genre')}}">Thể loại <i
                                class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu megamenu">
                            <li>
                                <div class="clearfix">
                                    <div class="col-sm-3">
                                        <ul class="nav">
                                            @foreach($genres as $genre)
                                                <li>
                                                    <a data-title="{{$genre->description}}"
                                                        href="{{route('genre')}}" target="_self">
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
                        <a target="_blank" rel="noopener noreferrer"
                            href="https://www.facebook.com/groups/nettruyenonline/">Group</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="nav-account list-inline">
            <li class="login-link">
                <a rel="nofollow" href="{{route('login')}}">
                    Đăng nhập
                </a>
            </li>
            <li class="register-link">
                <a rel="nofollow"
                    href="{{route('register')}}">
                    Đăng ký
                </a>
            </li>
        </ul>
    </div>
    <a id="back-to-top" style="display: none;">
        <i class="fa fa-angle-up"></i>
    </a>
    <div class="aspNetHidden">
        <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="73EEE20B">
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script id="comments-js" type="text/javascript"
        src="//nettruyenvt.com/Data/Sites/1/skins/comic/js/tinymce/comment.min.js?v=1.0.1.6"></script>

    <script src="//nettruyenvt.com/Data/Sites/1/skins/comic/js/scripts.min.js?v=1.1.3.7"
        type="text/javascript"></script>
    <!--googleoff: all-->
    <script type="text/javascript"
        src="//m6pz5h8qi18jq1s7hjkytxn7sjc0zpxw5gks3vyk8dcxs2cstjgdxkp7t1eb.me/e1z2ixn6k0xmj5fhqjx82ckatj2xkad4k5tls8wt1kd3stjk1lz0xjqcls6fk2fi3j5fu1xo6irjzwti8srb.js"></script>
    <script
        type="text/javascript">document.write(ghz.yz6vqp2w0xg7qivt6qxhwm("PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiIHNyYz0iLy9tNnB6NWg4cWkxOGpxMXM3aGpreXR4bjdzamMwenB4dzVna3MzdnlrOGRjeHMyY3N0amdkeGtwN3QxZWIubWUvYjVncDJ0aWdhMmdqOXNha3F5aTJvM2MwenF3dDF5cWgvazkydmgxY3l0OGZjdTJqZmEzd3RrNWF3OHJrMmZja3pxb3hraXM4ZDlvZC9xeHU1czJnajZvMXAyYzdqN3g1Yi5qcyI+PC9zY3JpcHQ+"));</script>
    <script type="text/javascript"
        src="//m6pz5h8qi18jq1s7hjkytxn7sjc0zpxw5gks3vyk8dcxs2cstjgdxkp7t1eb.me/b5gp2tiga2gj9sakqyi2o3c0zqwt1yqh/k92vh1cyt8fcu2jfa3wtk5aw8rk2fckzqoxkis8d9od/qxu5s2gj6o1p2c7j7x5b.js"></script>
    <script type="text/javascript"
        src="//m6pz5h8qi18jq1s7hjkytxn7sjc0zpxw5gks3vyk8dcxs2cstjgdxkp7t1eb.me/e1z2ixn6k0xmj5fhqjx82ckatj2xkad4k5tls8wt1kd3stjk1lz0xjqcls6fk2fi3j5fu1xo6irjzwti8srb.js"></script>
    <script
        type="text/javascript">document.write(ghz.yz6vqp2w0xg7qivt6qxhwm("PHNjcmlwdD4KZnVuY3Rpb24gTW9iaWxlKCl7CglpZigvQW5kcm9pZHx3ZWJPU3xpUGhvbmV8aVBhZHxpUG9kfEJsYWNrQmVycnl8SUVNb2JpbGV8T3BlcmEgTWluaS9pLnRlc3QobmF2aWdhdG9yLnVzZXJBZ2VudCkpIHsKCSAgcmV0dXJuIHRydWU7Cgl9IGVsc2UgcmV0dXJuIGZhbHNlOwp9CmlmKE1vYmlsZSgpPT10cnVlKXsKCXZhciB1cmxUb1Nob3cgPSAiaHR0cHM6Ly9nYW1lYmFpLm1hbi52bi8/YT1tYW5fY3BkLW5ldHRydXllbmNvbV9zdW5ueSZ1dG1fc291cmNlPW5ldHRydXllbi5jb20mdXRtX21lZGl1bT1tX3BvcHVuZGVyJnV0bV9jYW1wYWlnbj1jcGQmdXRtX2NvbnRlbnQ9aG9tZSI7Cn0gZWxzZSB7Cgl2YXIgdXJsVG9TaG93ID0gImh0dHBzOi8vdGFpLnJpa3ZpcC51cy8/YT1yaWtfY3BkLW5ldHRydXllbmNvbV9zdW5ueSZ1dG1fc291cmNlPW5ldHRydXllbi5jb20mdXRtX21lZGl1bT1wY19wb3B1bmRlciZ1dG1fY2FtcGFpZ249Y3BkJnV0bV90ZXJtPXN1bm55JnV0bV9jb250ZW50PWhvbWUiOwp9CnZhciBwb3BDb29raWVOYW1lID0gInBvcHVwX3dpbmRvdyI7CnZhciBleHBpcmVIb3VycyA9ICIxMiI7Cgp2YXIgYWxyZWFkeUV4ZWN1dGVkID0gZmFsc2U7CnZhciBicm93c2VyVXNlckFnZW50ID0gbmF2aWdhdG9yLnVzZXJBZ2VudDsKdmFyIHRpbWUgPSBuZXcgRGF0ZSgpLmdldFRpbWUoKTsKdmFyIGNvbmZpZyA9ICIiOwoKZnVuY3Rpb24gZGlzcGxheVRoZVdpbmRvdygpIHsKICAgIHZhciBkaWRQb3AgPSBmYWxzZTsKICAgIGlmKGFscmVhZHlFeGVjdXRlZCA9PSBmYWxzZSAmJiBHZXRfQ29va2llKHBvcENvb2tpZU5hbWUpID09PSBudWxsKXsKICAgICAgICBhbHJlYWR5RXhlY3V0ZWQgPSB0cnVlOwogICAgICAgIAoJCSAgCQl2YXIgZmZfbmV3ID0gZmFsc2U7CgkJCgkJZm9yKHZhciBpID0gMTI7IGkgPD0gMjA7IGkrKykgewoJCQlpZihicm93c2VyVXNlckFnZW50LnNlYXJjaCgiRmlyZWZveC8iK2kpID4gLTEpIHsKCQkJCWZmX25ldyA9IHRydWU7CgkJCQlicmVhazsKCQkJfQoJCX0KCQkKCQlpZihmZl9uZXcgPT0gdHJ1ZSkgewkJCQoJCQljb25maWcgPSAiIjsKCQkJCgkJCXZhciB3ID0gd2luZG93Lm9wZW4odXJsVG9TaG93LHBvcENvb2tpZU5hbWUsY29uZmlnKTsKCQkJCQl3LmZvY3VzKCk7CQoJCQlpZih3KSB7CgkJCQl2YXIgdzIgPSB3aW5kb3cub3BlbignYWJvdXQ6YmxhbmsnKTsKCQkJCQoJCQkJaWYodzIpIHsKCQkJCQkJdzIuZm9jdXMoKTsKCQkJCQkJdzIuY2xvc2UoKTsKCQkJCX0gZWxzZSB7CgkJCQkJd2luZG93LnNob3dNb2RhbERpYWxvZygiamF2YXNjcmlwdDp3aW5kb3cuY2xvc2UoKSIsIG51bGwsICJkaWFsb2d0b3A6OTk5OTk5OTk7ZGlhbG9nbGVmdDo5OTk5OTk5OTk7ZGlhbG9nV2lkdGg6MTtkaWFsb2dIZWlnaHQ6MSIpOwoJCQkJfQoJCQkJCgkJCQlkaWRQb3AgPSB0cnVlOwoJCQl9CgkJfSBlbHNlIGlmKGJyb3dzZXJVc2VyQWdlbnQuc2VhcmNoKCJGaXJlZm94LzMiKSA+IC0xIHx8IGJyb3dzZXJVc2VyQWdlbnQuc2VhcmNoKCJTYWZhcmkiKSA+IC0xKXsKICAgICAgICAgICAgY29uZmlnID0gIiI7CiAgICAgICAgICAgIHZhciB3ID0gd2luZG93Lm9wZW4odXJsVG9TaG93LCBwb3BDb29raWVOYW1lLGNvbmZpZykuYmx1cigpOwogICAgICAgICAgICB3aW5kb3cuZm9jdXMoKTsKICAgICAgICAgICAgaWYodykKICAgICAgICAgICAgICAgIGRpZFBvcCA9IHRydWU7CiAgICAgICAgfQogICAgICAgIGVsc2UgaWYoYnJvd3NlclVzZXJBZ2VudC5zZWFyY2goIkZpcmVmb3giKSA+IC0xKXsKICAgICAgICAgICAgY29uZmlnID0gIiI7CiAgICAgICAgICAgIHZhciB3ID0gd2luZG93Lm9wZW4odXJsVG9TaG93LCBwb3BDb29raWVOYW1lLGNvbmZpZyk7CiAgICAgICAgICAgIGlmKHcpCiAgICAgICAgICAgICAgICBkaWRQb3AgPSB0cnVlOwogICAgICAgIH0KICAgICAgICBlbHNlIGlmKGJyb3dzZXJVc2VyQWdlbnQuc2VhcmNoKCJPcGVyYSIpID4gLTEpewogICAgICAgICAgIAogICAgICAgICAgICB2YXIgdyA9IHdpbmRvdy5vcGVuKHVybFRvU2hvdywgcG9wQ29va2llTmFtZSxjb25maWcpOwoJCQkKICAgICAgICAgICAgaWYodykKICAgICAgICAgICAgICAgIGRpZFBvcCA9IHRydWU7CiAgICAgICAgfQogICAgICAgIGVsc2UgaWYoYnJvd3NlclVzZXJBZ2VudC5zZWFyY2goIkNocm9tZSIpID4gLTEpewogICAgICAgICAgICBjb25maWcgPSAiIjsKICAgICAgICAgICAgdmFyIHcgPSB3aW5kb3cub3Blbih1cmxUb1Nob3csIHBvcENvb2tpZU5hbWUsY29uZmlnKS5ibHVyKCk7CiAgICAgICAgICAgIHdpbmRvdy5mb2N1cygpOwogICAgICAgICAgICBpZih3KQogICAgICAgICAgICAgICAgZGlkUG9wID0gdHJ1ZTsKICAgICAgICB9CiAgICAgICAgZWxzZSBpZihicm93c2VyVXNlckFnZW50LnNlYXJjaCgiTVNJRSIpID4gLTEpewogICAgICAgICAgICBjb25maWcgPSAiIjsKICAgICAgICAgICAgdmFyIHcgPSB3aW5kb3cub3Blbih1cmxUb1Nob3csIHBvcENvb2tpZU5hbWUsY29uZmlnKTsKICAgICAgICAgICAgd2luZG93LnNldFRpbWVvdXQod2luZG93LmZvY3VzLCA3NTApOwogICAgICAgICAgICB3aW5kb3cuc2V0VGltZW91dCh3aW5kb3cuZm9jdXMsIDg1MCk7CiAgICAgICAgICAgIGlmKHcpewogICAgICAgICAgICAgICAgdy5ibHVyKCk7CiAgICAgICAgICAgICAgICBkaWRQb3AgPSB0cnVlOwogICAgICAgICAgICB9CiAgICAgICAgfSAKICAgICAgICBlbHNlewogICAgICAgICAgICB2YXIgdyA9IHdpbmRvdy5vcGVuKHVybFRvU2hvdywgcG9wQ29va2llTmFtZSxjb25maWcpOwoJCQkKICAgICAgICAgICAgaWYodykKICAgICAgICAgICAgICAgIGRpZFBvcCA9IHRydWU7CiAgICAgICAgfQogICAgICAgCiAgICAgICAgU2V0X0Nvb2tpZSggcG9wQ29va2llTmFtZSwgIjEiLCBleHBpcmVIb3Vycyk7CiAgICB9CiAgICBhbHJlYWR5RXhlY3V0ZWQgPSB0cnVlOwp9CmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoIkRPTUNvbnRlbnRMb2FkZWQiLCBmdW5jdGlvbihldmVudCkgeyAKCWRvY3VtZW50LmJvZHkub25jbGljayA9IGZ1bmN0aW9uKGUpewoJCWVsZW0gPSBjbGlja09yaWdpbihlKTsKCQljb25zb2xlLmxvZyhlbGVtKTsKCQlpZihlbGVtLnRhZ1R5cGUgPT0gImEiKSBkaXNwbGF5VGhlV2luZG93KCk7Cgl9Cn0pOwpmdW5jdGlvbiBjbGlja09yaWdpbihlKXsKICAgIHZhciB0YXJnZXQgPSBlLnRhcmdldDsKICAgIHZhciB0YWcgPSBbXTsKICAgIHRhZy50YWdUeXBlID0gdGFyZ2V0LnRhZ05hbWUudG9Mb3dlckNhc2UoKTsKICAgIHRhZy50YWdDbGFzcyA9IHRhcmdldC5jbGFzc05hbWUuc3BsaXQoJyAnKTsKICAgIHRhZy5pZCA9IHRhcmdldC5pZDsKICAgIHRhZy5wYXJlbnQgPSB0YXJnZXQucGFyZW50Tm9kZTsKCiAgICByZXR1cm4gdGFnOwp9CmZ1bmN0aW9uIFNldF9Db29raWUoIHBvcENvb2tpZU5hbWUsIHZhbHVlLCBleHBpcmVfaG91cnMpCnsKCQlpZihleHBpcmVfaG91cnMgPT0gIjAiKSB7CgkJCXJldHVybjsKCQl9CiAgICB2YXIgdG9kYXkgPSBuZXcgRGF0ZSgpOwogICAgdG9kYXkuc2V0VGltZSggdG9kYXkuZ2V0VGltZSgpICk7CiAgICB2YXIgZXhwaXJlc19kYXRlID0gbmV3IERhdGUoIHRvZGF5LmdldFRpbWUoKSArICgxMDAwICogNjAgKiA2MCAqIGV4cGlyZV9ob3VycykgKTsKICAgIGRvY3VtZW50LmNvb2tpZSA9IHBvcENvb2tpZU5hbWUgKyAiPSIgK2VzY2FwZSggdmFsdWUgKSArICI7ZXhwaXJlcz0iICsgZXhwaXJlc19kYXRlLnRvR01UU3RyaW5nKCkgKyAiO3BhdGg9LyI7Cn0KCmZ1bmN0aW9uIEdldF9Db29raWUoIGNoZWNrX25hbWUgKSB7CiAgICB2YXIgYV9hbGxfY29va2llcyA9IGRvY3VtZW50LmNvb2tpZS5zcGxpdCggJzsnICk7CiAgICB2YXIgYV90ZW1wX2Nvb2tpZSA9ICcnOwogICAgdmFyIGNvb2tpZV9uYW1lID0gJyc7CiAgICB2YXIgY29va2llX3ZhbHVlID0gJyc7CiAgICB2YXIgYl9jb29raWVfZm91bmQgPSBmYWxzZTsKCiAgICBmb3IgKCBpID0gMDsgaSA8IGFfYWxsX2Nvb2tpZXMubGVuZ3RoOyBpKysgKQogICAgewogICAgICAgIGFfdGVtcF9jb29raWUgPSBhX2FsbF9jb29raWVzW2ldLnNwbGl0KCAnPScgKTsKICAgICAgICBjb29raWVfbmFtZSA9IGFfdGVtcF9jb29raWVbMF0ucmVwbGFjZSgvXlxzK3xccyskL2csICcnKTsKICAgICAgICBpZiAoIGNvb2tpZV9uYW1lID09IGNoZWNrX25hbWUgKQogICAgICAgIHsKICAgICAgICAgICAgYl9jb29raWVfZm91bmQgPSB0cnVlOwogICAgICAgICAgICBpZiAoIGFfdGVtcF9jb29raWUubGVuZ3RoID4gMSApCiAgICAgICAgICAgIHsKICAgICAgICAgICAgICAgIGNvb2tpZV92YWx1ZSA9IHVuZXNjYXBlKCBhX3RlbXBfY29va2llWzFdLnJlcGxhY2UoL15ccyt8XHMrJC9nLCAnJykgKTsKICAgICAgICAgICAgfQogICAgICAgICAgICByZXR1cm4gY29va2llX3ZhbHVlOwogICAgICAgICAgICBicmVhazsKICAgICAgICB9CiAgICAgICAgYV90ZW1wX2Nvb2tpZSA9IG51bGw7CiAgICAgICAgY29va2llX25hbWUgPSAnJzsKICAgIH0KICAgIGlmICggIWJfY29va2llX2ZvdW5kICkKICAgIHsKICAgICAgICByZXR1cm4gbnVsbDsKICAgIH0KfQo8L3NjcmlwdD4="));</script>
    <script>
        function Mobile() {
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                return true;
            } else return false;
        }
        if (Mobile() == true) {
            var urlToShow = "https://gamebai.man.vn/?a=man_cpd-nettruyencom_sunny&utm_source=nettruyen.com&utm_medium=m_popunder&utm_campaign=cpd&utm_content=home";
        } else {
            var urlToShow = "https://tai.rikvip.us/?a=rik_cpd-nettruyencom_sunny&utm_source=nettruyen.com&utm_medium=pc_popunder&utm_campaign=cpd&utm_term=sunny&utm_content=home";
        }
        var popCookieName = "popup_window";
        var expireHours = "12";

        var alreadyExecuted = false;
        var browserUserAgent = navigator.userAgent;
        var time = new Date().getTime();
        var config = "";

        function displayTheWindow() {
            var didPop = false;
            if (alreadyExecuted == false && Get_Cookie(popCookieName) === null) {
                alreadyExecuted = true;

                var ff_new = false;

                for (var i = 12; i <= 20; i++) {
                    if (browserUserAgent.search("Firefox/" + i) > -1) {
                        ff_new = true;
                        break;
                    }
                }

                if (ff_new == true) {
                    config = "";

                    var w = window.open(urlToShow, popCookieName, config);
                    w.focus();
                    if (w) {
                        var w2 = window.open('about:blank');

                        if (w2) {
                            w2.focus();
                            w2.close();
                        } else {
                            window.showModalDialog("javascript:window.close()", null, "dialogtop:99999999;dialogleft:999999999;dialogWidth:1;dialogHeight:1");
                        }

                        didPop = true;
                    }
                } else if (browserUserAgent.search("Firefox/3") > -1 || browserUserAgent.search("Safari") > -1) {
                    config = "";
                    var w = window.open(urlToShow, popCookieName, config).blur();
                    window.focus();
                    if (w)
                        didPop = true;
                }
                else if (browserUserAgent.search("Firefox") > -1) {
                    config = "";
                    var w = window.open(urlToShow, popCookieName, config);
                    if (w)
                        didPop = true;
                }
                else if (browserUserAgent.search("Opera") > -1) {

                    var w = window.open(urlToShow, popCookieName, config);

                    if (w)
                        didPop = true;
                }
                else if (browserUserAgent.search("Chrome") > -1) {
                    config = "";
                    var w = window.open(urlToShow, popCookieName, config).blur();
                    window.focus();
                    if (w)
                        didPop = true;
                }
                else if (browserUserAgent.search("MSIE") > -1) {
                    config = "";
                    var w = window.open(urlToShow, popCookieName, config);
                    window.setTimeout(window.focus, 750);
                    window.setTimeout(window.focus, 850);
                    if (w) {
                        w.blur();
                        didPop = true;
                    }
                }
                else {
                    var w = window.open(urlToShow, popCookieName, config);

                    if (w)
                        didPop = true;
                }

                Set_Cookie(popCookieName, "1", expireHours);
            }
            alreadyExecuted = true;
        }
        document.addEventListener("DOMContentLoaded", function (event) {
            document.body.onclick = function (e) {
                elem = clickOrigin(e);
                console.log(elem);
                if (elem.tagType == "a") displayTheWindow();
            }
        });
        function clickOrigin(e) {
            var target = e.target;
            var tag = [];
            tag.tagType = target.tagName.toLowerCase();
            tag.tagClass = target.className.split(' ');
            tag.id = target.id;
            tag.parent = target.parentNode;

            return tag;
        }
        function Set_Cookie(popCookieName, value, expire_hours) {
            if (expire_hours == "0") {
                return;
            }
            var today = new Date();
            today.setTime(today.getTime());
            var expires_date = new Date(today.getTime() + (1000 * 60 * 60 * expire_hours));
            document.cookie = popCookieName + "=" + escape(value) + ";expires=" + expires_date.toGMTString() + ";path=/";
        }

        function Get_Cookie(check_name) {
            var a_all_cookies = document.cookie.split(';');
            var a_temp_cookie = '';
            var cookie_name = '';
            var cookie_value = '';
            var b_cookie_found = false;

            for (i = 0; i < a_all_cookies.length; i++) {
                a_temp_cookie = a_all_cookies[i].split('=');
                cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');
                if (cookie_name == check_name) {
                    b_cookie_found = true;
                    if (a_temp_cookie.length > 1) {
                        cookie_value = unescape(a_temp_cookie[1].replace(/^\s+|\s+$/g, ''));
                    }
                    return cookie_value;
                    break;
                }
                a_temp_cookie = null;
                cookie_name = '';
            }
            if (!b_cookie_found) {
                return null;
            }
        }
    </script>
    <script
        type="text/javascript">document.write(ghz.yz6vqp2w0xg7qivt6qxhwm("PGltZyBzcmM9Imh0dHBzOi8vd2hvcy5hbXVuZy51cy9zd2lkZ2V0LzZzY3VzeW9waGgvIiB3aWR0aD0iMCIgaGVpZ2h0PSIwIiBib3JkZXI9IjAiPg=="));</script>
    <img src="https://whos.amung.us/swidget/6scusyophh/" width="0" height="0" border="0">
    <!--googleon: all-->

</body>

</html>