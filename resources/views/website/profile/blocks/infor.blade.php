<div class="col-md-3 col-sm-4">
      <section class="user-sidebar clearfix">
            <div class="userinfo clearfix">
                  <figure>
                        <img alt="" src="{{Auth::guard('web')->user()->avatar != null ? asset('/uploads/customers/'.Auth::guard('web')->user()->avatar) : '//st.imageinstant.net/data/siteimages/anonymous.png'}}" class="avatar user-img">
                        <figcaption>
                              <div class="title">Tài khoản của</div>
                              <div class="user-name">
                                    {{Auth::guard('web')->user()->name}}
                              </div>
                        </figcaption>
                  </figure>
            </div>
            <i class="fa fa-angle-down"></i>
      </section>
      <nav class="user-sidelink clearfix">
            <ul>
                  <li class="hvr-sweep-to-right {{ Request::path() == 'thong-tin-chung' ? 'active' : '' }}"><a href="{{route('general')}}"><i
                                    class="fa fa-tachometer"></i> Thông tin chung</a></li>
                  <li class="hvr-sweep-to-right {{ Request::path() == 'thong-tin-ca-nhan' ? 'active' : '' }}"><a href="{{route('profile')}}"><i
                                    class="fa fa-info-circle"></i> Thông tin tài khoản</a></li>
                  <li class="hvr-sweep-to-right {{ Request::path() == 'doi-mat-khau' ? 'active' : '' }}"><a href="{{route('change-password')}}"><i
                                    class="fa fa-lock"></i> Đổi mật khẩu</a></li>
                  <li class="hvr-sweep-to-right"><a href="{{route('logout')}}"><i
                                    class="fa fa-sign-out"></i> Thoát</a></li>
            </ul>
      </nav>
</div>