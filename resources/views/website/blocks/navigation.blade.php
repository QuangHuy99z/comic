<?php
	use App\Models\Genres;
    $genres = Genres::latest()->get();
?>
<nav class="main-nav hidden-xs">
	<div class="inner">
		<div class="container">
			<div class='Module Module-144'>
				<div class='ModuleContent'>
					<ul class="nav navbar-nav main-menu">
						<li class="{{ Request::path() == '/' ? 'active' : '' }}">
							<a target="_self" href="/">
								<i class="fa fa-home hidden-xs">
								</i>
								<span class="visible-xs">Trang chủ</span>
							</a>
						</li>
						<li class="{{ Request::path() == 'theo-doi' ? 'active' : '' }}">
							<a target="_self"  href="{{route('follow')}}">Theo dõi</a>
						</li>
						<li class="dropdown {{ Request::path() == 'tim-truyen' ? 'active' : '' }}">
							<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
								target="_self" href="{{route('genre')}}">Thể loại <i
									class="fa fa-caret-down"></i></a>
							<style>
								.main-menu > li a strong {
									color: #333 !important;
								}
							</style>
							<ul class="dropdown-menu megamenu">
								<li>
									<div class="clearfix">
										<div class="col-sm-4">
												<ul class="nav">
													<li>
														<a  data-title="Tất cả thể loại truyện tranh"
															href="{{route('genre')}}" target="_self">
															<strong style="color: #e74c3c !important;">Tất cả</strong>
														</a>
													</li>
													
												</ul>
										</div>
										@foreach($genres as $genre)
											<div class="col-sm-4">
												<ul class="nav">
													<li>
														<a data-title="{{$genre->description}}"
															href="{{route('genre_detail', $genre->slug)}}" target="_self">
															<strong <?php 
																if (url()->current() == route('genre_detail', $genre->slug)){
																	echo "style='color: #ae4ad9 !important'";
																}
															?>
															 >{{$genre->name}}</strong>
														</a>
													</li>
													
												</ul>
											</div>
										@endforeach	
										<div class="col-sm-12 hidden-xs">
											<p class="tip">
											</p>
										</div>
									</div>
								</li>
							</ul>
						</li>
						<li>
							<a target="_blank" rel="noopener noreferrer"
								href="https://www.facebook.com/groups/nettruyenonline/">Group</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>