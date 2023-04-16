@extends('website.layouts.master')
@section('content')
@section('title')
CommicBuddy
@endsection
<main class="main">
	<div class="container">
		<div id="ctl00_divAlt1" class="altcontent1 cmszone">
			<div class='top-comics Module Module-183'>
				<div class='ModuleContent'>
					<h2 class="page-title">Recommend Manga <i class="fa fa-angle-right"></i></h2>
					<div class="items-slide">
						<div class="owl-carousel clearfix">
							@foreach ($sliders as $slider)
							<div class="item">
								<a href="{{route('comic', $slider->slug)}}">
									<img class="lazyOwl" src="{{asset('/uploads/comics/'.$slider->image)}}" data-src="{{asset('/uploads/comics/'.$slider->image)}}" alt="Chiến Hồn Tuyệt Thế">
								</a>
								<div class="slide-caption">
									<h3>
										<a href="{{route('comic', $slider->slug)}}" title="{{$slider->name}}">{{$slider->name}}</a>
									</h3>
									<a href="http://www.nettruyenpro.com/truyen-tranh/chien-hon-tuyet-the/chap-285/793301" title="{{isset($slider->chapter) ? 'Chapter' . $slider->chapter->number : ''}}">{{isset($slider->chapter) ? 'Chapter ' . $slider->chapter->number : ''}}</a>
								</div>
							</div>
							@endforeach
						</div>
						<a href="#" class="prev" aria-label="Trước">
						</a>
						<a href="#" class="next" aria-label="Sau">
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div id="ctl00_divCenter" class="center-side col-md-8">
				<div class='Module Module-163'>
					<div class='ModuleContent'>
						<div class="items">
							<h1 class="page-title">Latest Updated <i class="fa fa-angle-right"></i></h1>
							<div class="row">
								@foreach ($comics as $comic)
								<div class="item">
									<figure class="clearfix">
										<div class="image">
											<a title="{{$comic->name}}" href="{{route('comic', $comic->slug)}}">
												<img src="{{asset('/uploads/comics/'.$comic->image)}}" class="lazy" data-original="{{asset('/uploads/comics/'.$comic->image)}}" alt="{{$comic->name}}">
											</a>
											<div class="view clearfix">
												<span class="pull-left"></span>
											</div>
										</div>
										<figcaption>
											<h3>
												<a class="jtip" data-jtip="#truyen-tranh-{{$comic->id}}" href="{{route('comic', $comic->slug)}}">{{$comic->name}}</a>
											</h3>
											<ul>
												@php
												$count = 0;
												@endphp
												@foreach ($comic->chapters as $chapter)
												@if($count++ < 3) <li class="chapter clearfix">
													<a style="color: #000" href="{{route('chapter', [$comic->slug, $chapter->number, $chapter->id])}}" title="Chapter {{$chapter->number}}">
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
													<a title="{{$comic->name}}" href="{{route('comic', $comic->slug)}}">
														<img class="img_a" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="{{asset('/uploads/comics/'.$comic->image)}}" alt="{{$comic->name}}">
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
														<label>Author</label>
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
						<div id="ctl00_mainContent_ctl00_divPager" class="pagination-outter">
							{{ $comics->links('vendor.pagination.name') }}
						</div>
					</div>
				</div>
			</div>
			<!-- Top managa has many views -->
			@include('website.blocks.top_view')
		</div>
	</div>
</main>
@endsection