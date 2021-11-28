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
</main>
@endsection