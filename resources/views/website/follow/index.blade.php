@extends('website.layouts.master')
@section('content')
@section('title')
	Truyện đang theo dõi - NetTruyen
@endsection
<main class="main">
    <div class="container">
        <div id="ctl00_Breadcrumbs_pnlWrapper">
            <ul class="breadcrumb">
                <li itemprop="itemListElement"><a
                        href="/" class="itemcrumb" itemprop="item"
                        itemtype="http://schema.org/Thing"><span itemprop="name">Trang chủ</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                        href="{{route('follow')}}" class="itemcrumb active" itemprop="item"
                        itemtype="http://schema.org/Thing"><span itemprop="name">Theo dõi</span></a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
        <div class="row">
            <div id="ctl00_divCenter" class="center-side col-md-8">
                <div class="Module Module-178">
                    <p>Bạn chưa theo dõi truyện nào cả. Để theo dõi truyện, nhấn vào <u>Theo dõi</u> như hình bên
                        dưới:<br>Bạn nên <a href="{{route('login')}}">Đăng nhập</a> để truy cập truyện đã theo dõi của bạn ở bất cứ đâu
                    </p>
                    <p class="text-center"><img src="http://www.nettruyenpro.com/Data/Sites/1/media/huong-dan-theo-doi-truyen.jpg"
                            alt="Hướng dẫn theo dõi truyện"></p>
                </div>
            </div>
            <div id="ctl00_divRight" class="right-side col-md-4 cmszone">
                <div class="comic-wrap Module Module-168">
                    <div class="ModuleContent">
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
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos1">01</span>
                                            <div class="t-item">
                                                <a class="thumb" title="Truyện tranh Võ Luyện Đỉnh Phong"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/vo-luyen-dinh-phong-17696">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/32/vo-luyen-dinh-phong.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/32/vo-luyen-dinh-phong.jpg"
                                                        alt="Võ Luyện Đỉnh Phong" style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/vo-luyen-dinh-phong-17696">Võ
                                                        Luyện Đỉnh Phong</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/vo-luyen-dinh-phong/chap-1708/793266"
                                                        title="Chapter 1708">Chapter 1708</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 21.452.584</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos2">02</span>
                                            <div class="t-item">
                                                <a class="thumb" title="Truyện tranh Chiến Hồn Tuyệt Thế"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/chien-hon-tuyet-the-30951">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/231/chien-hon-tuyet-the.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/231/chien-hon-tuyet-the.jpg"
                                                        alt="Chiến Hồn Tuyệt Thế" style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/chien-hon-tuyet-the-30951">Chiến
                                                        Hồn Tuyệt Thế</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/chien-hon-tuyet-the/chap-287/793377"
                                                        title="Chapter 287">Chapter 287</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 7.847.183</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos3">03</span>
                                            <div class="t-item">
                                                <a class="thumb" title="Truyện tranh Tu Tiên Trở Về Tại Vườn Trường"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/tu-tien-tro-ve-tai-vuon-truong-25383">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/39/tu-tien-tro-ve-tai-vuon-truong.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/39/tu-tien-tro-ve-tai-vuon-truong.jpg"
                                                        alt="Tu Tiên Trở Về Tại Vườn Trường" style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/tu-tien-tro-ve-tai-vuon-truong-25383">Tu
                                                        Tiên Trở Về Tại Vườn Trường</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/tu-tien-tro-ve-tai-vuon-truong/chap-283/792343"
                                                        title="Chapter 283">Chapter 283</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 6.597.475</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos4">04</span>
                                            <div class="t-item">
                                                <a class="thumb" title="Truyện tranh Trọng Sinh Đô Thị Tu Tiên"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/trong-sinh-do-thi-tu-tien-194169">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/213/trong-sinh-do-thi-tu-tien.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/213/trong-sinh-do-thi-tu-tien.jpg"
                                                        alt="Trọng Sinh Đô Thị Tu Tiên" style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/trong-sinh-do-thi-tu-tien-194169">Trọng
                                                        Sinh Đô Thị Tu Tiên</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/trong-sinh-do-thi-tu-tien/chap-675/792542"
                                                        title="Chapter 675">Chapter 675</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 6.033.193</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos5">05</span>
                                            <div class="t-item">
                                                <a class="thumb" title="Truyện tranh Hệt Như Hàn Quang Gặp Nắng Gắt"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/het-nhu-han-quang-gap-nang-gat-28247">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/87/het-nhu-han-quang-gap-nang-gat.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/87/het-nhu-han-quang-gap-nang-gat.jpg"
                                                        alt="Hệt Như Hàn Quang Gặp Nắng Gắt" style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/het-nhu-han-quang-gap-nang-gat-28247">Hệt
                                                        Như Hàn Quang Gặp Nắng Gắt</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/het-nhu-han-quang-gap-nang-gat/chap-231/792558"
                                                        title="Chapter 231">Chapter 231</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 5.963.963</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos6">06</span>
                                            <div class="t-item">
                                                <a class="thumb"
                                                    title="Truyện tranh Cô Vợ Nhỏ Nuông Chiều Quá Lại Thành Ác!!"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/co-vo-nho-nuong-chieu-qua-lai-thanh-ac-21447">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/199/co-vo-nho-nuong-chieu-qua-lai-thanh-ac.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/199/co-vo-nho-nuong-chieu-qua-lai-thanh-ac.jpg"
                                                        alt="Cô Vợ Nhỏ Nuông Chiều Quá Lại Thành Ác!!"
                                                        style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/co-vo-nho-nuong-chieu-qua-lai-thanh-ac-21447">Cô
                                                        Vợ Nhỏ Nuông Chiều Quá Lại Thành Ác!!</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/co-vo-nho-nuong-chieu-qua-lai-thanh-ac/chap-224.5/782089"
                                                        title="Chapter 224.5">Chapter 224.5</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 5.577.440</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <span class="txt-rank fn-order pos7">07</span>
                                            <div class="t-item">
                                                <a class="thumb"
                                                    title="Truyện tranh Ông Xã Kết Hôn Thử, Mạnh Thêm Chút Nữa Đi"
                                                    href="http://www.nettruyenpro.com/truyen-tranh/ong-xa-ket-hon-thu-manh-them-chut-nua-di-28887">
                                                    <img class="lazy"
                                                        src="//st.imageinstant.net/data/comics/215/ong-xa-ket-hon-thu-manh-them-chut-nua-di-3384.jpg"
                                                        data-original="//st.imageinstant.net/data/comics/215/ong-xa-ket-hon-thu-manh-them-chut-nua-di-3384.jpg"
                                                        alt="Ông Xã Kết Hôn Thử, Mạnh Thêm Chút Nữa Đi"
                                                        style="display: inline;">
                                                </a>
                                                <h3 class="title">
                                                    <a
                                                        href="http://www.nettruyenpro.com/truyen-tranh/ong-xa-ket-hon-thu-manh-them-chut-nua-di-28887">Ông
                                                        Xã Kết Hôn Thử, Mạnh Thêm Chút Nữa Đi</a>
                                                </h3>
                                                <p class="chapter top">
                                                    <a href="http://www.nettruyenpro.com/truyen-tranh/ong-xa-ket-hon-thu-manh-them-chut-nua-di/chap-444/792914"
                                                        title="Chapter 444">Chapter 444</a>
                                                    <span class="view pull-right">
                                                        <i class="fa fa-eye">
                                                        </i> 5.438.963</span>
                                                </p>
                                            </div>
                                        </li>
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