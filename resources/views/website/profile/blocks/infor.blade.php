<div class="col-md-3 col-sm-4">
      <section class="user-sidebar clearfix">
            <div class="userinfo clearfix">
                  <figure>
                        <img alt="" src="{{Auth::guard('web')->user()->avatar != null ? asset('/uploads/customers/'.Auth::guard('web')->user()->avatar) : '//st.imageinstant.net/data/siteimages/anonymous.png'}}" class="avatar user-img">
                        <figcaption>
                              <div class="title">This account belong to</div>
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
                  <li class="hvr-sweep-to-right {{ Request::path() == 'general' ? 'active' : '' }}"><a href="{{route('general')}}"><i
                                    class="fa fa-tachometer"></i> General information</a></li>
                  <li class="hvr-sweep-to-right {{ Request::path() == 'personal-information' ? 'active' : '' }}"><a href="{{route('profile')}}"><i
                                    class="fa fa-info-circle"></i> Account information</a></li>
                  <li class="hvr-sweep-to-right {{ Request::path() == 'change-password' ? 'active' : '' }}"><a href="{{route('change-password')}}"><i
                                    class="fa fa-lock"></i> Change password</a></li>
                  <li class="hvr-sweep-to-right"><a href="{{route('logout')}}"><i
                                    class="fa fa-sign-out"></i> Sign-Out</a></li>
            </ul>
      </nav>
</div>