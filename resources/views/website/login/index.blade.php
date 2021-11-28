@extends('website.layouts.master')
@section('content')
@section('title')
	Đăng nhập - NetTruyen
@endsection
<main class="main" style="margin-bottom: 240px !important">
    <div class="container">
        <div id="ctl00_Breadcrumbs_pnlWrapper">
            <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                        href="{{route('home')}}" class="itemcrumb active" itemprop="item"
                        itemtype="http://schema.org/Thing"><span itemprop="name">Trang chủ</span></a>
                    <meta itemprop="position" content="2">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                        href="{{route('login')}}" class="selectedcrumb">Đăng nhập</a></li>
            </ul>
        </div>
        <div class="row">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div id="ctl00_divCenter" class="full-width col-sm-12">
                    <div id="ctl00_mainContent_pnlLogin">
                        <div id="ctl00_mainContent_pnlStandardLogin" class="login-wrapper">
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="user-page clearfix">
                                        <h1 class="postname">
                                            Login
                                        </h1>
                                        <div id="ctl00_mainContent_login1_LoginCtrl_pnlLContainer" class="signup-wrapper">
                                            @if(session()->has('message'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('message') }}
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="ctl00_mainContent_login1_LoginCtrl_UserName"
                                                    class="control-label">Email</label>
                                                <input name="email" type="text"
                                                    maxlength="100" id="ctl00_mainContent_login1_LoginCtrl_UserName"
                                                    tabindex="10" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Password
                                                </label>
                                                <input name="password" type="password"
                                                    id="ctl00_mainContent_login1_LoginCtrl_Password" tabindex="10"
                                                    class="form-control" placeholder="Mật khẩu">
                                            </div>
                                        </div>
                                        <div class="login-action">
                                            <div class="form-group">
                                                <a id="ctl00_mainContent_login1_LoginCtrl_lnkPasswordRecovery"
                                                    class="login-link login-to-recover"
                                                    href="#">Quên mật
                                                    khẩu</a>
                                                <a id="ctl00_mainContent_login1_LoginCtrl_lnkRegisterExtraLink"
                                                    class="login-link"
                                                    href="{{route('register')}}">Đăng
                                                    ký mới</a>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit"
                                                    value="Đăng nhập"
                                                    tabindex="10" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="open-login mrb20">
                                        <div class="form-group">
                                            <a class="btn login-facebook" href="#">
                                                <i class="fa fa-facebook"></i>
                                                <span>Đăng nhập bằng Facebook</span>
                                            </a>
                                        </div>
                                        <div class="form-group">
                                            <a class="btn login-google" href="#">
                                                <i class="fa fa-google-plus"></i>
                                                <span>Đăng nhập bằng Google</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection