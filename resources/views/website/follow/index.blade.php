@extends('website.layouts.master')
@section('content')
@section('title')
Follow Manga - ComicBuddy
@endsection
<main class="main">
    <div class="container">
        <div id="ctl00_Breadcrumbs_pnlWrapper">
            <ul class="breadcrumb">
                <li itemprop="itemListElement"><a href="/" class="itemcrumb" itemprop="item" itemtype="http://schema.org/Thing"><span itemprop="name">Home</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('follow')}}" class="itemcrumb active" itemprop="item" itemtype="http://schema.org/Thing"><span itemprop="name">Follow</span></a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
        <div class="row">
            <div id="ctl00_divCenter" class="center-side col-md-8">
                @if(count($all_follows_of_comic) == 0)
                <div class="Module Module-178">
                    <p>
                        You haven't follow any manga. To follow the story, click <u>Follow</u> as shown below:<br>
                        @if (!auth()->guard('web')->check())
                        You need to <a href="{{route('login')}}">Login</a> to follow manga
                        @endif
                    </p>
                    <p class="text-center"><img src="{{asset('uploads/logo/huong-dan-theo-doi-truyen.jpg')}}" alt="Hướng dẫn theo dõi truyện"></p>
                </div>
                @else
                <div class="Module Module-230">
                    <div class="ModuleContent">
                        <h1 class="page-title">The comic is following <em class="fa fa-angle-right"></em></h1>
                    </div>
                </div>
                <div class="comics-followed-page Module Module-178">
                    <div class="mrt15">
                    </div>
                    <div id="_token">
                        @csrf
                    </div>
                    <div class="items">
                        <div class="row">
                            @foreach($comics as $comic)
                            @if (in_array($comic->id, $all_follows_of_comic))
                            <div class="item item-follow unread">
                                <figure class="clearfix">
                                    <div class="image">
                                        <a title="{{$comic->title}}" href="{{route('comic', $comic->slug)}}">
                                            <img src="{{ $comic->image != '' ? asset('uploads/comics/' . $comic->image) : $no_product_image }}" onerror="this.onerror=null; this.src='{{$no_product_image}}'" class="lazy center" alt="{{$comic->title}}">
                                        </a>
                                        <div class="view clearfix">
                                            <span class="pull-left">
                                                <i class="fa fa-eye">
                                                </i> {{$comic->ranks_count}}
                                            </span>
                                            <span class="pull-right">
                                                <i class="fa fa-heart"></i> {{$comic->follows_count}}
                                            </span>
                                        </div>
                                    </div>
                                    <figcaption>
                                        <div class="follow-action clearfix">
                                            <a href="javascript:void(0)" class="unfollow follow-link" data-id="{{$comic->id}}">
                                                <i class="fa fa-times" aria-hidden="true">
                                                </i> Unfollow</a>
                                        </div>
                                        <h3>
                                            <a class="jtip" data-jtip="#truyen-tranh-{{$comic->id}}" href="{{route('comic', $comic->slug)}}">{{$comic->name}}</a>
                                        </h3>
                                    </figcaption>
                                </figure>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

            </div>
            <!-- Top managa has many views -->
            @include('website.blocks.top_view')
        </div>
    </div>
    </div>
</main>
@endsection