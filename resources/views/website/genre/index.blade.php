@extends('website.layouts.master')
@section('content')
@section('title')
  CommicBuddy
@endsection
<main class="main">
    <div class="container">
        <div id="ctl00_Breadcrumbs_pnlWrapper">
            <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/"
                        class="itemcrumb" itemprop="item" itemtype="http://schema.org/Thing"><span itemprop="name">
                            Home</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                        href="{{route('genre')}}" class="itemcrumb active" itemprop="item"
                        itemtype="http://schema.org/Thing"><span itemprop="name">Genres</span></a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
        <div class="row">
            <div id="ctl00_divCenter" class="center-side col-md-8">
                <div class="Module Module-169">
                    <div class="ModuleContent">
                        <div id="ctl00_mainContent_ctl00_divBasicFilter" class="comic-filter">
                            <h1 class="text-center">
                                All Genres
                            </h1>
                            @include('website.genre.blocks.sidebar-xs')
                            <div id="ctl00_mainContent_ctl00_divDescription" class="description">
                                <div class="info">All genres</div>
                            </div>
                            <div id="ctl00_mainContent_ctl00_divSort" class="sort-by row">
                                <div class="col-sm-3 mrt5 mrb5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Module Module-170">
                    <div class="ModuleContent">
                        <div class="items">
                            <div class="row">
                                @foreach($comics as $comic)
                                    <div class="item">
                                        <figure class="clearfix">
                                            <div class="image">
                                                <a title="{{$comic->name}}" href="{{route('comic', $comic->slug)}}">
                                                    <img src="{{asset('/uploads/comics/'.$comic->image)}}" class="lazy"
                                                        data-original="{{asset('/uploads/comics/'.$comic->image)}}"
                                                        alt="{{$comic->name}}">
                                                </a>
                                               
                                                </span>
                                                <div class="view clearfix">
                                                </div>
                                            </div>
                                            <figcaption>
                                                <h3>
                                                    <a class="jtip" data-jtip="#truyen-tranh-{{$comic->id}}"
                                                        href="{{route('comic', $comic->slug)}}">{{$comic->name}}</a>
                                                </h3>
                                                <ul>
                                                    @php
                                                        $count = 0;
                                                    @endphp
                                                    @foreach ($comic->chapters as $chapter)
                                                        @if($count++ < 3)
                                                            <li class="chapter clearfix">
                                                                <a style="color: #000"
                                                                    href="{{route('chapter', [$comic->slug, $chapter->number, $chapter->id])}}"
                                                                    title="Chapter {{$chapter->number}}">
                                                                    Chapter {{$chapter->number}}
                                                                </a>
                                                            </li>
                                                        @endif  
                                                    @endforeach
                                                </ul>
                                            </figcaption>
                                        </figure>
                                        <div class="box_tootip" style="display:none;" id="truyen-tranh-{{$comic->id}}">
                                            <div class="box_li">
                                                <div class="title">{{$comic->name}}</div>
                                                <div class="clearfix">
                                                    <div class="box_img">
                                                        <a title="{{$comic->name}}"
                                                            href="{{asset('/uploads/comics/'.$comic->image)}}">
                                                            <img class="img_a"
                                                                src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                                                data-original="{{asset('/uploads/comics/'.$comic->image)}}"
                                                                alt="{{$comic->name}}">
                                                        </a>
                                                    </div>
                                                    <div class="message_main">
                                                        @php
                                                        $genres = array();
                                                        $authors = array();
                                                        @endphp
                                                        <p>
                                                            <label>Title:</label>{{$comic->name}}
                                                        </p>
                                                        <p>
                                                            <label>Genres:</label>
                                                            @foreach($comic->genres as $genre)
                                                            @php
                                                            array_push($genres, $genre->name);
                                                            @endphp
                                                            @endforeach
                                                            {{implode(", ", $genres)}}
                                                        </p>
                                                        <p>
                                                            <label>Author:</label>
                                                            @foreach($comic->authors as $author)
                                                            @php
                                                            array_push($authors, $author->name);
                                                            @endphp
                                                            @endforeach
                                                            {{implode(", ", $authors)}}
                                                        </p>
                                                        <p>
                                                            <label>Status:</label>{{$comic->status}}
                                                        </p>
                                                        <p>
                                                            <label>Updated at:</label>{{$comic->created_at->format('d-m-Y')}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="box_text">{{$comic->content}}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="ctl00_mainContent_ctl01_divPager" class="pagination-outter">
							{{ $comics->links('vendor.pagination.name') }}
                        </div>
                    </div>
                </div>
            </div>
            @include('website.genre.blocks.sidebar')
        </div>
    </div>
</main>
@endsection