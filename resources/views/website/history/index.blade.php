@extends('website.layouts.master')
@section('content')
@section('title')
CommicBuddy
@endsection
<main class="main">

    <div class="container">
        <div id="ctl00_Breadcrumbs_pnlWrapper">
            <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="https://www.nettruyenvt.com" class="itemcrumb" itemprop="item" itemtype="http://schema.org/Thing"><span itemprop="name">Trang chủ</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="https://www.nettruyenvt.com/lich-su" class="itemcrumb active" itemprop="item" itemtype="http://schema.org/Thing"><span itemprop="name">Lịch sử</span></a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>

        <div class="row">
            <div id="ctl00_divCenter" class="center-side col-md-8">
                <div class="mrb10 Module Module-233">
                    <div class="ModuleContent">
                        <h1 class="page-title">Lịch sử đọc truyện <em class="fa fa-angle-right"></em></h1>
                        <p>Lịch sử đọc truyện "Theo tài khoản" chỉ được lưu khi bạn đọc hết chapter</p>
                        <div class="mrt15 visited-tab">
                            <ul class="comment-nav text-center" style="font-size:16px;margin-bottom:15px;">
                                <li class="active">
                                    <a href="/lich-su">Từ thiết bị</a>
                                </li>
                                <li>
                                    <a href="/lich-su?t=3">Theo tài khoản <span class="dot"><span class="ping"></span></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="items visited-comics-page Module Module-273">
                    @if(session()->has('history') && session()->get('history') != null)
                        @csrf
                        <div class="row visited-list">
                            @foreach(session()->get('history') as $id => $history)
                            <div class="item">
                                <figure class="clearfix">
                                    <div class="image"><a title="{{$history['comic_name']}}" href="{{$history['comic_slug']}}"><img class="lazy center" src="{{asset('uploads/comics/'.$history['image'])}}" alt="{{$history['comic_name']}}"></a>
                                        <div class="view"><a class="visited-remove" href="#" data-comic-id="{{$history['comic_id']}}"><i class="fa fa-times"></i> Remove</a></div>
                                    </div>
                                    <figcaption>
                                        <h3><a title="{{$history['comic_name']}}" href="{{$history['comic_slug']}}">{{$history['comic_name']}}</a></h3>
                                        <ul>
                                            <li class="chapter clearfix"><a href="{{$history['chapter_slug']}}">Đọc tiếp Chapter {{$history['chapter_name']}} <i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </figcaption>
                                </figure>
                            </div>
                            @endforeach
                        </div>
                    @else
                        You haven't read any comics yet.
                    @endif
                </div>
            </div>
            <!-- Top managa has many views -->
			@include('website.blocks.top_view')
        </div>
    </div>
</main>
@endsection