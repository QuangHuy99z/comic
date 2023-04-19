<!DOCTYPE html>
<html id="ctl00_Html1" lang="vi">

<head id="ctl00_Head1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('uploads/logo/favicon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/website/font-manga.min.css')}}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

</head>

<body id="ctl00_Body" class="homepage vi-vn site1" style=" min-height: 100vh; display: flex; flex-direction: column;">
    <!--[if lt IE 10]>
        <p class="alert alert-danger text-center mrb0">Website không hỗ trợ trình duyệt bạn đang dùng vì quá cũ. Vui lòng <a rel="nofollow" href="http://browsehappy.com/">cập nhật trình duyệt mới</a> hoặc <a rel="nofollow" href="https://www.google.com/chrome/browser/desktop/index.html">Download Chrome</a> để trải nghiệm tốt hơn.</p>
    <![endif]-->
    <?php

    use App\Models\Genres;

    $genres = Genres::latest()->get();
    ?>
    @include("website.blocks.header")
    @include("website.blocks.navigation")
    @yield('content')

    @include("website.blocks.footer")
    <div class="navbar-collapse">
        <div class="search-box comicsearchbox">
            <form action="{{route('genre')}}" method="Get">
                <div class="input-group">
                    <input type="text" name="keyword" class="searchinput form-control" placeholder="Search manga..." autocomplete="off" />
                    <div class="input-group-btn">
                        <input type="submit" value="" class="searchbutton btn btn-default" />
                    </div>
                </div>
            </form>
        </div>
        <div class='Module Module-144'>
            <div class='ModuleContent'>
                <ul class="nav navbar-nav main-menu">
                    <li class="active">
                        <a target="_self" href="{{route('home')}}">
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
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" target="_self" href="{{route('genre')}}">Genres <i class="fa fa-caret-down"></i></a>
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
                        <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/do.quanghuy.5205/">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="nav-account list-inline">
            @if(Auth::guard('web')->check())
            <li class="dropdown">
                <a data-toggle="dropdown" class="user-menu fn-userbox dropdown-toggle" href="javascript:void(0);">
                    <img class="fn-thumb" alt="" src="{{Auth::guard('web')->user()->avatar != null ? asset('/uploads/customers/'.Auth::guard('web')->user()->avatar) : asset('uploads/no_image/anonymous.png') }}">
                    <span>Your Account</span> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a rel="nofollow" class="user-profile-link-desktop" href="{{route('general')}}"><i class="fa fa-user"></i>
                            Personal Information
                        </a>
                    </li>
                    <li><a rel="nofollow" id="user_logout_desktop" href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Sign-Out</a></li>
                </ul>
            </li>
            @else
            <li class="login-link">
                <a href="{{route('login')}}">Login</a>
            </li>
            <li class="register-link">
                <a href="{{route('register')}}">Register</a>
            </li>
            @endif
        </ul>
    </div>
    <a id="back-to-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <!-- <script src="//nettruyenvt.com/Data/Sites/1/skins/comic/js/redirector.min.js?v=1.0.0.5" type="text/javascript"></script> -->
    <script type="text/javascript" src="{{asset('js/website/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/website/scripts.min.js?v=1.1.3.7')}}" type="text/javascript"></script>
    <!--googleoff: all-->
    </script>
    <script>
        var history_array = []
        let check_variables = setInterval(() => {
            <?php
            $history = session()->get('history');
            $history = json_encode(session()->get('history'));
            echo "history_array = " . $history . ";\n";
            ?>
        }, 500)

        <?php
        if (isset($comic)) {
            echo "var comic_id = " . $comic->id . ";\n";
        } else {
            echo "var comic_id = " . "undefined" . ";\n";
        };
        ?>;
        if (comic_id !== "undefined") {
            let check = setInterval(() => {
                for (const property in history_array) {
                    // console.log(`${property}: ${history_array[property]}`);
                    if (property == comic_id) {
                        let chapter_ids = history_array[property];
                        if ('chapter_ids' in chapter_ids) {
                            chapter_ids = chapter_ids['chapter_ids'];
                            // console.log(chapter_ids);
                            $(".chapter a.visited-comics").each(function() {
                                if (jQuery.inArray($(this).data('chapter-id'), chapter_ids) != -1) {
                                    $(this).removeAttr('style');
                                }
                            })
                        }
                        break;
                    }
                }
            }, 500);
        }

        $('.visited-comics').click(function() {
            let comic_id = $(this).data('comic-id');
            let chapter_id = $(this).data('chapter-id');
            let chapter_link = $(this).data('chapter-link');
            $(this).removeAttr('style');
            $.ajax({
                url: "{{route('create_comic_history_by_session')}}",
                method: "POST",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    comic_id: comic_id,
                    chapter_id: chapter_id,
                    chapter_link: chapter_link,
                },
                success: function(data) {

                }
            })
        });

        $('.visited-remove').click(function(e) {
            e.preventDefault();
            // alert($(this).data('comic-id'));
            $(this).parent().parent().parent().parent().remove();
            let comic_id = $(this).data('comic-id');
            $.ajax({
                url: "{{route('remove_comic_history_by_session')}}",
                method: "DELETE",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    comic_id: comic_id,
                },
                success: function(data) {

                }
            })
        });

        <?php
        $check_login = 0;
        if (auth()->guard('web')->check()) {
            $check_login = 1;
        }
        echo "check_login = " . $check_login . ";\n";
        ?>
        if (check_login == 0) {
            $('#follow_comic').click(function() {
                alert("You need to Login to follow manga");
            });
        } else {
            $('#follow_comic').click(function(e) {
                e.preventDefault();
                let id_comic = $(this).data('id');
                $.ajax({
                    url: "{{route('create_follow_comic')}}",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        _token: $("input[name=_token]").val(),
                        comic_id: id_comic,
                    },
                    success: function(data) {
                        window.location.href = data.url;
                    }
                })
            });

            $('#unfollow_comic').click(function(e) {
                e.preventDefault();
                let id_comic = $(this).data('id');
                $.ajax({
                    url: "{{route('delete_follow_comic')}}",
                    method: "DELETE",
                    dataType: 'json',
                    data: {
                        _token: $("input[name=_token]").val(),
                        comic_id: id_comic,
                    },
                    success: function(data) {
                        window.location.href = data.url;
                    }
                })
            });
        }

        $('.unfollow').click(function(e) {
            e.preventDefault();
            $(this).parent().parent().parent().parent().remove();
            let id_comic = $(this).data('id');
            $.ajax({
                url: "{{route('delete_follow_comic')}}",
                method: "DELETE",
                dataType: 'json',
                data: {
                    _token: $("input[name=_token]").val(),
                    comic_id: id_comic,
                },
                success: function(data) {}
            })
        });
    </script>
</body>

</html>