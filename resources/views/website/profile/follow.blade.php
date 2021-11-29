@extends('website.layouts.master')
@section('content')
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
            href="{{route('comic-follow')}}" class="selectedcrumb">Followed manga</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div id="ctl00_divCenter" class="full-width col-sm-12">
        <div class="row">
          @include('website.profile.blocks.infor')
          <div class="col-md-9 col-sm-8">
            <div class="user-page clearfix">
              <h1 class="postname">
                Followed manga
              </h1>
              <section class="comics-followed comics-followed-withpaging user-table clearfix">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>
                        </th>
                        <th class="nowrap">Comic name</th>
                        <th class="nowrap">Latest read</th>
                        <th class="nowrap">Latest chapter</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection