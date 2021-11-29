@extends('website.layouts.chapter')
@section('content')
@section('title')
	{{$chapter->comic->name}} - Chap {{$chapter->number}} - CommicBuddy
@endsection
<main class="main">
    <div class="container">
        <div class="row">
            <div id="ctl00_divCenter" class="full-width col-sm-12">
                <div class="reading">
                    <div class="container">
                        <div class="top">
                            <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                        href="/" class="itemcrumb" itemprop="item"
                                        itemtype="http://schema.org/Thing"><span itemprop="name">Home
                                            </span></a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                        href="{{route('genre')}}" class="itemcrumb" itemprop="item"
                                        itemtype="http://schema.org/Thing"><span itemprop="name">Genres
                                            </span></a>
                                    <meta itemprop="position" content="2">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                        href="{{route('comic', $chapter->comic->slug)}}"
                                        class="itemcrumb" itemprop="item" itemtype="http://schema.org/Thing"><span
                                            itemprop="name">{{$chapter->comic->name}}</span></a>
                                    <meta itemprop="position" content="3">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                        href="{{route('chapter', [$chapter->comic->slug, $chapter->number])}}"
                                        class="itemcrumb active" itemprop="item"
                                        itemtype="http://schema.org/Thing"><span itemprop="name">Chapter
                                            {{$chapter->number}}</span></a>
                                    <meta itemprop="position" content="4">
                                </li>
                            </ul>
                            <h1 class="txt-primary"><a
                                    href="{{route('comic', $chapter->comic->slug)}}">{{$chapter->comic->name}}</a> <span>- Chapter {{$chapter->number}}</span></h1><i>[Cập nhật lúc: {{$chapter->created_at->format('H:m:s d/m/Y')}}]</i>
                        </div>
                        <div class="reading-control">
                            <div class="alert alert-info mrb10 hidden-xs hidden-sm">
                                <i class="fa fa-info-circle"></i> <em>Use > to foward chapter, use < for previous chapter</em>
                            </div>
                            <div class="chapter-nav">
                                <a class="home" href="/" title="Trang chủ"><i class="fa fa-home"></i></a>
                                <a class="home backward"
                                    href="{{route('comic', $chapter->comic->slug)}}#nt_listchapter"
                                    title="Chiến Hồn Tuyệt Thế"><i class="fa fa-list"></i></a>
                                <a class="home changeserver" href="#" title="Đổi server"><i
                                        class="fa fa-undo error"></i><span>1</span></a>
                                <a href="<?php 
                                    if ($prev->count() != 0) {
                                        echo route('chapter', [$chapter->comic->slug, $prev[0]->number]);
                                    }  
                                    ?>" class="prev a_prev <?php 
                                    if ($prev->count() == 0) {
                                        echo 'disabled';
                                    }
                                    ?>">
                                    <i class="fa fa-angle-left"></i>
                                </a>   
                                <select name="ctl00$mainContent$ddlSelectChapter" onchange="myFunction()"
                                    id="ctl00_mainContent_ddlSelectChapter" class="select-chapter">
                                    @foreach ($chapter->comic->chapters as $comic)
                                        <option {{ ($comic->number == $chapter->number) ? 'selected' : '' }} 
                                        value="{{route('chapter', [$comic->comic->slug, $comic->number])}}">Chapter {{$comic->number}}</option>
                                    @endforeach
                                </select>
                                <script>
                                   function myFunction() {
                                        var change_chapter = document.getElementById("ctl00_mainContent_ddlSelectChapter").value;
                                        window.location = change_chapter
                                    }
                                </script>
                                <a href="<?php 
                                    if ($next->count() != 0) {
                                        echo route('chapter', [$chapter->comic->slug, $next[0]->number]);
                                    }  
                                    ?>" class="next a_next <?php 
                                    if ($next->count() == 0) {
                                        echo 'disabled';
                                    }
                                    ?>">
                                    <i class="fa fa-angle-right"></i>
                                </a>
         
                            </div>
                        </div>
                    </div>
                    <script>var journalOptions = {}; var commentOpts = {};</script>
                    <div class="reading-detail box_doc">
                        @foreach ($chapter->chapter_images as $chapter_image)
                            <div id="page_1" class="page-chapter">
                                <img alt="truyen-tranh/chien-hon-tuyet-the/chap-0" data-index="1" src="{{asset('/uploads/comics/'.$chapter_image->image)}}">
                            </div>
                        @endforeach
                    </div>
                    <div class="container">
                        
                        <div class="top bottom">
                            <div class="chapter-nav-bottom text-center mrt5 mrb5">
                                <a href="<?php 
                                    if ($prev->count() != 0) {
                                        echo route('chapter', [$chapter->comic->slug, $prev[0]->number]);
                                    }  
                                    ?>" class="btn btn-danger prev <?php 
                                    if ($prev->count() == 0) {
                                        echo 'hidden';
                                    }
                                    ?>">
                                    <em class="fa fa-chevron-left"></em>
                                    Chap trước
                                </a>
                                <a href="<?php 
                                    if ($next->count() != 0) {
                                        echo route('chapter', [$chapter->comic->slug, $next[0]->number]);
                                    }  
                                    ?>"
                                    class="btn btn-danger next <?php 
                                    if ($next->count() == 0) {
                                        echo 'hidden';
                                    }
                                    ?>">Chap sau <em class="fa fa-chevron-right"></em></a>
                            </div>
                            <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                        href="/" class="itemcrumb" itemprop="item"
                                        itemtype="http://schema.org/Thing"><span itemprop="name">Trang
                                            chủ</span></a>
                                    <meta itemprop="position" content="1">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                        href="{{route('genre')}}" class="itemcrumb" itemprop="item"
                                        itemtype="http://schema.org/Thing"><span itemprop="name">Thể
                                            loại</span></a>
                                    <meta itemprop="position" content="2">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                        href="{{route('comic', $chapter->comic->slug)}}"
                                        class="itemcrumb" itemprop="item" itemtype="http://schema.org/Thing"><span
                                            itemprop="name">{{$chapter->comic->name}}</span></a>
                                    <meta itemprop="position" content="3">
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                        href="{{route('chapter', [$chapter->comic->slug, $chapter->number])}}"
                                        class="itemcrumb active" itemprop="item"
                                        itemtype="http://schema.org/Thing"><span itemprop="name">Chapter {{$chapter->number}}</span></a>
                                    <meta itemprop="position" content="4">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection