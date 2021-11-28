<header class="header">
	<div class="navbar">
		<div class="container">
			<div class="navbar-header">
				<div class='navbar-brand Module'><a class="logo" title="Truyện tranh online" href="/"><img
							alt="Logo NetTruyen" src="//st.imageinstant.net/data/logos/logo-nettruyen.png" /></a></div>
				<div class="navbar-form navbar-left hidden-xs search-box">
					<form action="{{route('genre')}}" method="Get">
						<div class="input-group">
								<input type="text" name="keyword" class="search-comic form-control" placeholder="Tìm truyện... "
									autocomplete="off" />
								<div class="input-group-btn">
									<input type="submit" value="" class="searchbutton btn btn-default" />
								</div>
						</div>
						<script>
								let input = document.querySelector(".search-comic");
								let button = document.querySelector(".searchbutton");

								button.disabled = true; //setting button state to disabled

								input.addEventListener("input", stateHandle);

								function stateHandle() {
									if (document.querySelector(".search-comic").value === "") {
										button.disabled = true; //button remains disabled
										console.log('disabled')
									} else {
										button.disabled = false; //button is enabled
										console.log('enabled')
									}
								}
						</script>
					</form>
				</div>
				<button type="button" class="search-button-icon visible-xs" aria-label="Search">
					<i class="fa fa-search"></i>
				</button>
				<button type="button" class="navbar-toggle" aria-label="Menu">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<ul class="nav-account list-inline hidden-xs pull-right">
				<li style="display:none;">
                    <script>var globalOpts = {};</script>
                </li>
				@if(Auth::guard('web')->check())
				<li class="dropdown"><a data-toggle="dropdown" class="user-menu fn-userbox dropdown-toggle"
						href="javascript:void(0);"><img class="fn-thumb" alt=""
							src="{{Auth::guard('web')->user()->avatar != null ? asset('/uploads/customers/'.Auth::guard('web')->user()->avatar) : '//st.imageinstant.net/data/siteimages/anonymous.png'}}"> <span>Cá nhân</span> <i
							class="fa fa-caret-down"></i></a>
					<ul class="dropdown-menu">
						<li><a rel="nofollow" class="user-profile-link-desktop"
								href="{{route('general')}}"><i class="fa fa-user"></i>
								Trang cá nhân</a></li>

						<li><a rel="nofollow" id="user_logout_desktop" href="{{route('logout')}}"><i
									class="fa fa-sign-out"></i> Thoát</a></li>
					</ul>
				</li>
				@else
					<li class="login-link">
						<a rel="nofollow" href="{{route('login')}}">Đăng nhập</a>
					</li>
					<li class="register-link">
						<a rel="nofollow" href="{{route('register')}}">Đăng ký</a>
					</li>
				@endif
			</ul>
		</div>
	</div>
</header>