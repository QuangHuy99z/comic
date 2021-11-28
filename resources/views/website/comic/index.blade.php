@extends('website.layouts.master')
@section('content')
@section('title')
    {{$comic->name}}
@endsection
<main class="main">
    <div class="container">
        <div class="row">
            <div id="ctl00_divCenter" class="center-side col-md-8">
                <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                            href="/" class="itemcrumb" itemprop="item"
                            itemtype="http://schema.org/Thing"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                            href="{{route('genre')}}" class="itemcrumb" itemprop="item"
                            itemtype="http://schema.org/Thing"><span itemprop="name">Thể loại</span></a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                            href="{{route('comic', $comic->slug)}}"
                            class="itemcrumb active" itemprop="item" itemtype="http://schema.org/Thing"><span
                                itemprop="name">{{$comic->name}}</span></a>
                        <meta itemprop="position" content="3">
                    </li>
                </ul>
                <article id="item-detail">
                    <h1 class="title-detail">{{$comic->name}}</h1>
                    <time class="small">
                        [Cập nhật lúc: {{$comic->created_at->format('H:m d/m/Y')}}]
                    </time>
                    <div class="detail-info">
                        <div class="row">
                            <div class="col-xs-4 col-image">
                                <img src="{{asset('/uploads/comics/'.$comic->image)}}"
                                    alt="{{$comic->name}}">
                            </div>
                            <div class="col-xs-8 col-info">
                                <ul class="list-info">
                                    <li class="othername row">
                                        <p class="name col-xs-4">
                                            <i class="fa fa-plus">
                                            </i> Tên khác
                                        </p>
                                        <h2 class="other-name col-xs-8">{{$comic->name}}</h2>
                                    </li>
                                    <li class="author row">
                                        <p class="name col-xs-4">
                                            <i class="fa fa-user">
                                            </i> Tác giả
                                        </p>
                                        <p class="col-xs-8">
                                            @foreach($comic->authors as $author)
                                                <a href="#" style="display: block">{{$author->name}}</a>
                                            @endforeach
                                        </p>
                                    </li>
                                    <li class="status row">
                                        <p class="name col-xs-4">
                                            <i class="fa fa-rss">
                                            </i> Tình trạng
                                        </p>
                                        <p class="col-xs-8">{{$comic->status}}</p>
                                    </li>
                                    <li class="kind row">
                                        <p class="name col-xs-4">
                                            <i class="fa fa-tags">
                                            </i> Thể loại
                                        </p>
                                        <p class="col-xs-8">
                                            @foreach($comic->genres as $genre)
                                                <a style="display: block" href="#">{{$genre->name}}</a>
                                            @endforeach
                                        </p>
                                    </li>
                                </ul>
                                <div class="mrt5 mrb10" itemscope="" itemtype="http://schema.org/Book">
                                    <a href="{{route('comic', $comic->slug)}}">
                                        <span itemprop="name">{{$comic->name}}</span>
                                    </a>
                                </div>
                                <div class="follow"><a class="btn btn-success" href="javascript:void(0)"
                                        data-id="{{$comic->id}}"><i class="fa fa-heart"></i> <span>Theo dõi</span></a>
                                </div>
                                <div class="read-action mrt10">
                                    <a class="btn btn-warning mrb5"
                                        href="{{ $comic->chapters->count() != 0 ? route('chapter', [$comic->slug, $comic->first_chapter->number]) : ''}}">
                                        Đọc từ đầu</a>
                                    <a class="btn btn-warning mrb5"
                                        href="{{ $comic->chapters->count() != 0 ? route('chapter', [$comic->slug, $comic->last_chapter->number]) : ''}}">
                                        Đọc mới nhất</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-content">
                        <h3 class="list-title">
                            <i class="fa fa-file-text-o">
                            </i> Nội dung
                        </h3>
                        <p>{{$comic->content}}</p>
                    </div>
                    <div class="list-chapter" id="nt_listchapter">
                        <h2 class="list-title clearfix">
                            <i class="fa fa-list">
                            </i> Danh sách chương
                        </h2>
                        <nav>
                            <ul>
                                <li class="row heading">
                                    <div class="col-xs-6 no-wrap">Số chương</div>
                                    <div class="col-xs-6 no-wrap text-center">Cập nhật</div>
                                </li>
                                @if($comic->chapters->count() != 0)
                                    @foreach ($comic->chapters as $chapter)
                                        <li class="row">
                                            <div class="col-xs-6 chapter">
                                                <a href="{{route('chapter', [$comic->slug, $chapter->number])}}" data-id="{{$chapter->id}}" style="color: #000">Chapter {{$chapter->number}}</a>
                                            </div>
                                            <div class="col-xs-6 text-center small" style="color: #000">{{$chapter->created_at->format('H:m:s d/m/Y')}}</div>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="row">
                                        <div class="col-xs-12 chapter text-center">
                                                <a>Truyện {{$comic->name}} không có chương nào</a>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </article>
            </div>
            <div id="ctl00_divRight" class="right-side col-md-4">
                <div class="comic-wrap Module Module-168">
                    <div class="ModuleContent">
                        <div class="box-tab box darkBox">
                            <ul class="tab-nav clearfix">
                                <li>
                                    <a rel="nofollow" title="BXH truyện tranh theo tháng" class="active"
                                        href="/tim-truyen?status=-1&amp;sort=11">Top Tháng</a>
                                </li>
                                <li>
                                    <a rel="nofollow" title="BXH truyện tranh theo tuần"
                                        href="/tim-truyen?status=-1&amp;sort=12">Top Tuần</a>
                                </li>
                                <li>
                                    <a rel="nofollow" title="BXH truyện tranh theo ngày"
                                        href="/tim-truyen?status=-1&amp;sort=13">Top Ngày</a>
                                </li>
                            </ul>
                            <div class="tab-pane">
                                <div id="topMonth">
                                    <ul class="list-unstyled">
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos1">01</span>
                                            <div class="t-item">
                                                <a class="thumb" title="Truyện tranh Võ Luyện Đỉnh Phong"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/vo-luyen-dinh-phong-17696">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/32/vo-luyen-dinh-phong.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/32/vo-luyen-dinh-phong.jpg"
                                                        alt="Võ Luyện Đỉnh Phong" style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/vo-luyen-dinh-phong-17696">Võ
                                                        Luyện Đỉnh Phong</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/vo-luyen-dinh-phong/chap-1709/793419"
                                                        title="Chapter 1709">Chapter 1709</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 21.541.637</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos2">02</span>
                                            <div class="t-item">
                                                <a class="thumb" title="Truyện tranh Chiến Hồn Tuyệt Thế"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/chien-hon-tuyet-the-30951">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/231/chien-hon-tuyet-the.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/231/chien-hon-tuyet-the.jpg"
                                                        alt="Chiến Hồn Tuyệt Thế" style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/chien-hon-tuyet-the-30951">Chiến
                                                        Hồn Tuyệt Thế</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/chien-hon-tuyet-the/chap-287/793377"
                                                        title="Chapter 287">Chapter 287</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 8.345.471</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos3">03</span>
                                            <div class="t-item">
                                                <a class="thumb" title="Truyện tranh Tu Tiên Trở Về Tại Vườn Trường"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/tu-tien-tro-ve-tai-vuon-truong-25383">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/39/tu-tien-tro-ve-tai-vuon-truong.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/39/tu-tien-tro-ve-tai-vuon-truong.jpg"
                                                        alt="Tu Tiên Trở Về Tại Vườn Trường" style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/tu-tien-tro-ve-tai-vuon-truong-25383">Tu
                                                        Tiên Trở Về Tại Vườn Trường</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/tu-tien-tro-ve-tai-vuon-truong/chap-283/792343"
                                                        title="Chapter 283">Chapter 283</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 6.678.859</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos4">04</span>
                                            <div class="t-item">
                                                <a class="thumb" title="Truyện tranh Hệt Như Hàn Quang Gặp Nắng Gắt"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/het-nhu-han-quang-gap-nang-gat-28247">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/87/het-nhu-han-quang-gap-nang-gat.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/87/het-nhu-han-quang-gap-nang-gat.jpg"
                                                        alt="Hệt Như Hàn Quang Gặp Nắng Gắt" style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/het-nhu-han-quang-gap-nang-gat-28247">Hệt
                                                        Như Hàn Quang Gặp Nắng Gắt</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/het-nhu-han-quang-gap-nang-gat/chap-231/792558"
                                                        title="Chapter 231">Chapter 231</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 5.915.330</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos5">05</span>
                                            <div class="t-item">
                                                <a class="thumb" title="Truyện tranh Trọng Sinh Đô Thị Tu Tiên"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/trong-sinh-do-thi-tu-tien-194169">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/213/trong-sinh-do-thi-tu-tien.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/213/trong-sinh-do-thi-tu-tien.jpg"
                                                        alt="Trọng Sinh Đô Thị Tu Tiên" style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/trong-sinh-do-thi-tu-tien-194169">Trọng
                                                        Sinh Đô Thị Tu Tiên</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/trong-sinh-do-thi-tu-tien/chap-676/793420"
                                                        title="Chapter 676">Chapter 676</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 5.875.762</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos6">06</span>
                                            <div class="t-item">
                                                <a class="thumb"
                                                    title="Truyện tranh Ông Xã Kết Hôn Thử, Mạnh Thêm Chút Nữa Đi"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/ong-xa-ket-hon-thu-manh-them-chut-nua-di-28887">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/215/ong-xa-ket-hon-thu-manh-them-chut-nua-di-3384.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/215/ong-xa-ket-hon-thu-manh-them-chut-nua-di-3384.jpg"
                                                        alt="Ông Xã Kết Hôn Thử, Mạnh Thêm Chút Nữa Đi"
                                                        style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/ong-xa-ket-hon-thu-manh-them-chut-nua-di-28887">Ông
                                                        Xã Kết Hôn Thử, Mạnh Thêm Chút Nữa Đi</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/ong-xa-ket-hon-thu-manh-them-chut-nua-di/chap-444/792914"
                                                        title="Chapter 444">Chapter 444</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 5.376.179</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos7">07</span>
                                            <div class="t-item">
                                                <a class="thumb"
                                                    title="Truyện tranh Cô Vợ Nhỏ Nuông Chiều Quá Lại Thành Ác!!"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/co-vo-nho-nuong-chieu-qua-lai-thanh-ac-21447">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/199/co-vo-nho-nuong-chieu-qua-lai-thanh-ac.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/199/co-vo-nho-nuong-chieu-qua-lai-thanh-ac.jpg"
                                                        alt="Cô Vợ Nhỏ Nuông Chiều Quá Lại Thành Ác!!"
                                                        style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/co-vo-nho-nuong-chieu-qua-lai-thanh-ac-21447">Cô
                                                        Vợ Nhỏ Nuông Chiều Quá Lại Thành Ác!!</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/co-vo-nho-nuong-chieu-qua-lai-thanh-ac/chap-224.5/782089"
                                                        title="Chapter 224.5">Chapter 224.5</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 5.361.692</span>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="topWeek">
                                </div>
                                <div id="topDay">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection