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
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/" class="itemcrumb" itemprop="item" itemtype="http://schema.org/Thing"><span itemprop="name">Home</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('genre')}}" class="itemcrumb" itemprop="item" itemtype="http://schema.org/Thing"><span itemprop="name">Genres</span></a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="{{route('comic', $comic->slug)}}" class="itemcrumb active" itemprop="item" itemtype="http://schema.org/Thing"><span itemprop="name">{{$comic->name}}</span></a>
                        <meta itemprop="position" content="3">
                    </li>
                </ul>
                <article id="item-detail">
                    <h1 class="title-detail">{{$comic->name}}</h1>
                    <time class="small">
                        [Updated at: {{$comic->created_at->format('H:m d/m/Y')}}]
                    </time>
                    <div class="detail-info">
                        <div class="row">
                            <div class="col-xs-4 col-image">
                                <img src="{{asset('/uploads/comics/'.$comic->image)}}" alt="{{$comic->name}}">
                            </div>
                            <div class="col-xs-8 col-info">
                                <ul class="list-info">
                                    <li class="othername row">
                                        <p class="name col-xs-4">
                                            <i class="fa fa-plus">
                                            </i> Title
                                        </p>
                                        <h2 class="other-name col-xs-8">{{$comic->name}}</h2>
                                    </li>
                                    <li class="author row">
                                        <p class="name col-xs-4">
                                            <i class="fa fa-user">
                                            </i> Author
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
                                            </i> Status
                                        </p>
                                        <p class="col-xs-8">{{$comic->status}}</p>
                                    </li>
                                    <li class="kind row">
                                        <p class="name col-xs-4">
                                            <i class="fa fa-tags">
                                            </i> Genres
                                        </p>
                                        <p class="col-xs-8">
                                            @foreach($comic->genres as $genre)
                                            <a style="display: block" href="#">{{$genre->name}}</a>
                                            @endforeach
                                        </p>
                                    </li>
                                </ul>
                                @csrf
                                <div class="mrt5 mrb10" itemscope="" itemtype="http://schema.org/Book">
                                    <a href="{{route('comic', $comic->slug)}}">
                                        <span itemprop="name">{{$comic->name}}</span>
                                    </a>
                                </div>
                                <div class="follow"><a class="btn btn-success" href="javascript:void(0)" data-id="{{$comic->id}}"><i class="fa fa-heart"></i> <span>Follow</span></a>
                                </div>
                                <div class="read-action mrt10">
                                    <a class="btn btn-warning mrb5 visited-comics" data-comic-id="{{$comic->id}}" data-chapter-id="{{ $comic->chapters->count() != 0 ? $comic->first_chapter->id : ''}}" data-chapter-link="{{ $comic->chapters->count() != 0 ? route('chapter', [$comic->slug, $comic->first_chapter->number, $comic->first_chapter->id]) : ''}}" href="{{ $comic->chapters->count() != 0 ? route('chapter', [$comic->slug, $comic->first_chapter->number, $comic->first_chapter->id]) : ''}}">
                                        Start reading
                                    </a>
                                    <a class="btn btn-warning mrb5 visited-comics" data-comic-id="{{$comic->id}}" data-chapter-id="{{ $comic->chapters->count() != 0 ? $comic->last_chapter->id : ''}}" data-chapter-link="{{ $comic->chapters->count() != 0 ? route('chapter', [$comic->slug, $comic->last_chapter->number, $comic->last_chapter->id]) : ''}}" href="{{ $comic->chapters->count() != 0 ? route('chapter', [$comic->slug, $comic->last_chapter->number, $comic->last_chapter->id]) : ''}}">
                                        Read latest
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="detail-content">
                        <h3 class="list-title">
                            <i class="fa fa-file-text-o">
                            </i> Content
                        </h3>
                        <p>{{$comic->content}}</p>
                    </div>
                    <div class="list-chapter" id="nt_listchapter">
                        <h2 class="list-title clearfix">
                            <i class="fa fa-list">
                            </i> Chapter List
                        </h2>
                        <nav>
                            <ul>
                                <li class="row heading">
                                    <div class="col-xs-6 no-wrap">Chapter Number</div>
                                    <div class="col-xs-6 no-wrap text-center">Updated at</div>
                                </li>
                                @php
                                $chapter_ids = [];
                                @endphp
                                @if(session()->has('history') && session()->get('history') != null)
                                    @foreach(session()->get('history') as $id => $history)
                                        @if (in_array($comic->id, $history))
                                            @if (in_array($comic->id, $history['chapter_ids']))
                                                @php
                                                $chapter_ids = $history['chapter_ids'];
                                                @endphp
                                            @endif
                                        @endif
                                        @break
                                    @endforeach
                                @endif
                                @if($comic->chapters->count() != 0)
                                @foreach ($comic->chapters as $chapter)
                                <li class="row">
                                    <div class="col-xs-6 chapter">
                                        <a class="visited-comics" href="{{route('chapter', [$comic->slug, $chapter->number, $chapter->id])}}" data-comic-id="{{ $comic->id }}" data-chapter-id="{{ $chapter->id }}" data-chapter-link="{{route('chapter', [$comic->slug, $chapter->number, $chapter->id])}}" data-id="{{$chapter->id}}" <?= in_array($chapter->id, $chapter_ids) ? '' :  'style="color: #000"' ?>>
                                            Chapter {{$chapter->number}}
                                        </a>
                                    </div>
                                    <div class="col-xs-6 text-center small" style="color: #000">{{$chapter->created_at->format('H:m:s d/m/Y')}}</div>
                                </li>
                                @endforeach
                                @else
                                <li class="row">
                                    <div class="col-xs-12 chapter text-center">
                                        <a>Comic {{$comic->name}} doesn't have any chapter yet</a>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </article>
            </div>
            <!-- Top managa has many views -->
			@include('website.blocks.top_view')
        </div>
    </div>
</main>

@endsection