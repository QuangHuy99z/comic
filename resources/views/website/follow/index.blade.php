@extends('website.layouts.master')
@section('content')
@section('title')
	Follow Manga - CommicBuddy
@endsection
<main class="main">
    <div class="container">
        <div id="ctl00_Breadcrumbs_pnlWrapper">
            <ul class="breadcrumb">
                <li itemprop="itemListElement"><a
                        href="/" class="itemcrumb" itemprop="item"
                        itemtype="http://schema.org/Thing"><span itemprop="name">Home</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                        href="{{route('follow')}}" class="itemcrumb active" itemprop="item"
                        itemtype="http://schema.org/Thing"><span itemprop="name">Follow</span></a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
        <div class="row">
            <div id="ctl00_divCenter" class="center-side col-md-8">
                <div class="Module Module-178">
                    <p>You haven't follow any manga<br>You need to <a href="{{route('login')}}">Login</a> to follow manga </p>
                    <p class="text-center"><img src="http://www.nettruyenpro.com/Data/Sites/1/media/huong-dan-theo-doi-truyen.jpg"
                            alt="Hướng dẫn theo dõi truyện"></p>
                </div>
            </div>
            <!-- Top managa has many views -->
			@include('website.blocks.top_view')
           </div>
        </div>
    </div>
</main>
@endsection