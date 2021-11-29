<!DOCTYPE html>
<html id="ctl00_Html1" lang="vi">

<head id="ctl00_Head1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <script
        type="application/ld+json">{"@context": "http://schema.org","@type": "ItemList","itemListElement":[{"@type":"ListItem","position":1,"url":"http://www.nettruyenpro.com/truyen-tranh/chien-hon-tuyet-the-30951"},{"@type":"ListItem","position":2,"url":"http://www.nettruyenpro.com/truyen-tranh/trong-sinh-tro-lai-sung-nich-doc-nhat-vo-nhi-33624"},{"@type":"ListItem","position":3,"url":"http://www.nettruyenpro.com/truyen-tranh/nguyen-ton-17554"},{"@type":"ListItem","position":4,"url":"http://www.nettruyenpro.com/truyen-tranh/thang-cap-vo-han-trong-murim-39104"},{"@type":"ListItem","position":5,"url":"http://www.nettruyenpro.com/truyen-tranh/toan-cau-cao-vo-28636"},{"@type":"ListItem","position":6,"url":"http://www.nettruyenpro.com/truyen-tranh/tu-hom-nay-bat-dau-lam-thanh-chu-22461"},{"@type":"ListItem","position":7,"url":"http://www.nettruyenpro.com/truyen-tranh/duong-dich-vi-hoan-30047"},{"@type":"ListItem","position":8,"url":"http://www.nettruyenpro.com/truyen-tranh/ong-xa-ket-hon-thu-manh-them-chut-nua-di-28887"},{"@type":"ListItem","position":9,"url":"http://www.nettruyenpro.com/truyen-tranh/het-nhu-han-quang-gap-nang-gat-28247"},{"@type":"ListItem","position":10,"url":"http://www.nettruyenpro.com/truyen-tranh/toi-cuong-phan-sao-lo-he-thong-18237"},{"@type":"ListItem","position":11,"url":"http://www.nettruyenpro.com/truyen-tranh/ngay-nao-thieu-soai-cung-ghen-23284"}]}</script>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
     <script
        type="application/ld+json">{"@context": "http://schema.org","@type": "WebSite","url": "https://www.nettruyenpro.com","potentialAction": {"@type": "SearchAction","target": "https://www.nettruyenpro.com/tim-truyen?keyword={search_term_string}","query-input": "required name=search_term_string"}}</script>
    <script
        type="application/ld+json">{"@context": "http://schema.org","@type": "Person","name": "NetTruyen","url": "https://www.nettruyenpro.com","sameAs": ["https://www.facebook.com/nettruyen"]}</script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-57670566-6"></script>
    <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'UA-57670566-6');</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body id="ctl00_Body" class="dark homepage vi-vn site1">
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
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                            target="_self" href="{{route('genre')}}">Genres <i
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
                            href="https://www.facebook.com/do.quanghuy.5205/">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="nav-account list-inline">
            <li class="login-link">
                <a href="{{route('login')}}">Đăng nhập</a>
            </li>
            <li class="register-link">
                <a href="{{route('register')}}">Đăng ký</a>
            </li>
        </ul>
    </div>
    <a id="back-to-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script src="//s.nettruyenpro.com/Data/Sites/1/skins/comic/js/redirector.min.js?v=1.0.0.5"
        type="text/javascript"></script>
    <script type="text/javascript" src="//s.nettruyenpro.com/Data/Sites/1/skins/comic/js/owl.carousel.min.js"></script>
    <script src="//s.nettruyenpro.com/Data/Sites/1/skins/comic/js/scripts.min.js?v=1.1.3.7"
        type="text/javascript"></script>
    <!--googleoff: all-->
    <script type="text/javascript"
        src="//m6pz5h8qi18jq1s7hjkytxn7sjc0zpxw5gks3vyk8dcxs2cstjgdxkp7t1eb.me/e1z2ixn6k0xmj5fhqjx82ckatj2xkad4k5tls8wt1kd3stjk1lz0xjqcls6fk2fi3j5fu1xo6irjzwti8srb.js"></script>
    <script
        type="text/javascript">document.write(ghz.yz6vqp2w0xg7qivt6qxhwm("PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiIHNyYz0iLy9tNnB6NWg4cWkxOGpxMXM3aGpreXR4bjdzamMwenB4dzVna3MzdnlrOGRjeHMyY3N0amdkeGtwN3QxZWIubWUvYjVncDJ0aWdhMmdqOXNha3F5aTJvM2MwenF3dDF5cWgvazkydmgxY3l0OGZjdTJqZmEzd3RrNWF3OHJrMmZja3pxb3hraXM4ZDlvZC9xeHU1czJnajZvMXAyYzdqN3g1Yi5qcyI+PC9zY3JpcHQ+"));</script>
    <!--googleon: all-->
</body>

</html>