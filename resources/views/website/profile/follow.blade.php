@extends('website.layouts.master')
@section('content')
<main class="main">
  <div class="container">
    <div id="ctl00_Breadcrumbs_pnlWrapper">
      <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
            href="/" class="itemcrumb active" itemprop="item"
            itemtype="http://schema.org/Thing"><span itemprop="name">Trang chủ</span></a>
          <meta itemprop="position" content="2">
        </li>
        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
            href="{{route('comic-follow')}}" class="selectedcrumb">Truyện đang theo dõi</a>
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
                Truyện đang theo dõi
              </h1>
              <section class="comics-followed comics-followed-withpaging user-table clearfix">
                <div class="alert alert-success">Truyện chưa đọc sẽ hiển thị ở đầu danh sách, nhấn vào "Đã đọc" nếu
                  truyện đọc rồi.</div>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>
                        </th>
                        <th class="nowrap">Tên truyện</th>
                        <th class="nowrap">Xem gần nhất</th>
                        <th class="nowrap">Chap mới nhất</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="unread">
                        <td>
                          <a class="image" href="/truyen-tranh/stalker-x-stalker-20634">
                            <img src="//st.imageinstant.net/data/comics/154/stalker-x-stalker.jpg" class="lazy"
                              data-original="//st.imageinstant.net/data/comics/154/stalker-x-stalker.jpg"
                              alt="Stalker x Stalker" style="display: inline;">
                          </a>
                        </td>
                        <td>
                          <a class="comic-name" href="/truyen-tranh/stalker-x-stalker-20634">Stalker x Stalker</a>
                          <div class="follow-action">
                            <a href="javascript:void(0)" class="mark-as-read" data-id="20634">
                              <i class="fa fa-check">
                              </i> Đã đọc
                            </a>
                            <a href="javascript:void(0)" class="follow-link" data-id="20634">
                              <i class="fa fa-times">
                              </i> Bỏ theo dõi
                            </a>
                          </div>
                        </td>
                        <td class="nowrap chapter">
                          <time class="time">25 phút trước</time>
                        </td>
                        <td class="nowrap chapter">
                          <a href="/truyen-tranh/stalker-x-stalker/chap-46/793385" title="Chapter 46">Chapter 46</a>
                          <br>
                          <time class="time">52 phút trước</time>
                        </td>
                      </tr>
                    </tbody>
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