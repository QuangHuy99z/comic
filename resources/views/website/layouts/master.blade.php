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

<body id="ctl00_Body" class="homepage vi-vn site1">
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
            <div class="input-group">
                <input type="text" class="searchinput form-control" placeholder="Search manga..." autocomplete="off" />
                <div class="input-group-btn">
                    <input type="submit" value="" class="searchbutton btn btn-default" />
                </div>
            </div>
        </div>
        <div class='Module Module-144'>
            <div class='ModuleContent'>
                <ul class="nav navbar-nav main-menu">
                    <li class="active">
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
            <li class="login-link">
                <a href="{{route('login')}}">Login</a>
            </li>
            <li class="register-link">
                <a href="{{route('register')}}">Register</a>
            </li>
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
        };
        ?>;
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


        $('.visited-comics').click(function() {
            // alert($(this).data('chapter-link'))
            // alert("ss");
            let comic_id = $(this).data('comic-id');
            let chapter_id = $(this).data('chapter-id');
            let chapter_link = $(this).data('chapter-link');
            $(this).removeAttr('style');
            $.ajax({
                url: "{{route('create_history_by_session')}}",
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
        })
    </script>
</body>

</html>