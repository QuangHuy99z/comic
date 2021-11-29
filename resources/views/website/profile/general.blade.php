@extends('website.layouts.master')
@section('content')
@section('title')
	General Information - CommicBuddy
@endsection
<main class="main">
  <div class="container">
    <div id="ctl00_Breadcrumbs_pnlWrapper">
      <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
            href="/" class="itemcrumb active" itemprop="item"
            itemtype="http://schema.org/Thing"><span itemprop="name">Home</span></a>
          <meta itemprop="position" content="2">
        </li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
            href="{{route('general')}}" class="selectedcrumb">General Information</a></li>
      </ul>
    </div>
    <div class="row">
      <div id="ctl00_divCenter" class="full-width col-sm-12">
        <script>var referrer = document.querySelector('meta[name="referrer"]'); if (null != referrer) referrer.setAttribute("content", "no-referrer"); else { var meta = document.createElement("meta"); meta.name = "referrer", meta.content = "no-referrer", document.getElementsByTagName("head")[0].appendChild(meta) }</script>
        <div class="row">
          @include('website.profile.blocks.infor')
          <div class="col-md-9 col-sm-8">
            <div class="user-page clearfix">
              <h1 class="postname">
                General Information
              </h1>
              <div class="row">
                <div class="col-xs-12 col-md-6">
                  <div class="account-info clearfix">
                    <h2 class="posttitle">
                      Account information
                    </h2>
                    <a class="link" href="{{route('profile')}}">Edit</a>
                    <div class="info-detail">
                      <div class="group">
                        <div class="label">Full name</div>
                        <div class="detail">
                          {{Auth::guard('web')->user()->name}}
                        </div>
                      </div>
                      <div class="group">
                        <div class="label">Email</div>
                        <div class="detail">
                          {{Auth::guard('web')->user()->email}}
                        </div>
                      </div>
                    </div>
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