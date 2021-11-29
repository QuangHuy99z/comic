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
            <div id="ctl00_divRight" class="right-side col-md-4 cmszone">
				<div class='comics-followed-block Module Module-172'>
					<div class='ModuleContent'></div>
				</div>
				<div class="visited-comics"></div>
				<div class='comic-wrap Module Module-168'>
					<div class='ModuleContent'>
						<div class="box-tab box darkBox">
							<ul class="tab-nav clearfix">
								
								<li>
									<a rel="nofollow"
										href="/tim-truyen?status=-1&amp;sort=12">Top Manga</a>
								</li>
						
							</ul>
							<div class="tab-pane">
								<div id="topMonth">
									<ul class="list-unstyled">
										@php
											$i = 1;
										@endphp
										@foreach ($top_comics as $top_comic)
											<li class="clearfix">
												<span class="txt-rank fn-order pos1">{{'0'. $i ++}}</span>
												<div class="t-item">
													<a class="thumb" title="{{$top_comic->name}}"
														href="{{route('comic', $top_comic->slug)}}">
														<img class="lazy"
															src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
															data-original="{{asset('/uploads/comics/'.$top_comic->image)}}"
															alt="{{$top_comic->name}}">
													</a>
													<h3 class="title">
														<a
															href="{{route('comic', $top_comic->slug)}}">{{$top_comic->name}}</a>
													</h3>
													<p class="chapter top">
														<a href="{{$top_comic->chapters->count() != 0 ? route('chapter', [$top_comic->slug, $top_comic->last_chapter->number]) : ''}}"
															title="{{isset($top_comic->chapter) ? 'Chapter ' . $top_comic->chapter->number : ''}}">{{isset($top_comic->chapter) ? 'Chapter ' . $top_comic->last_chapter->number : ''}}</a>
														<span class="view pull-right"></span>
													</p>
												</div>
											</li>
										@endforeach
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
    </div>
</main>
@endsection