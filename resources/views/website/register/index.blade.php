@extends('website.layouts.master')
@section('content')
@section('title')
	Register - NetTruyen
@endsection
<main class="main" style="margin-bottom: 240px !important">
    <div class="container">
        <div id="ctl00_Breadcrumbs_pnlWrapper">
            <ul class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                        href="{{route('home')}}" class="itemcrumb active" itemprop="item"
                        itemtype="http://schema.org/Thing"><span itemprop="name">Home</span></a>
                    <meta itemprop="position" content="2">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                        href="{{route('register')}}" class="selectedcrumb">Register</a></li>
            </ul>
        </div>
        <div class="row">
            <form action="{{route('register')}}" method="post" enctype="multipart">
                @csrf
                <div id="ctl00_divCenter" class="full-width col-sm-12">
                    <div id="ctl00_mainContent_pnlLogin">
                        <div id="ctl00_mainContent_pnlStandardLogin" class="login-wrapper">
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <div class="user-page clearfix">
                                        <h1 class="postname">
                                            Register
                                        </h1>
                                        <div id="ctl00_mainContent_login1_LoginCtrl_pnlLContainer" class="signup-wrapper">
                                            @if(session()->has('message'))
                                                <div class="alert alert-danger">
                                                    {{ session()->get('message') }}
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="ctl00_mainContent_login1_LoginCtrl_UserName"
                                                    class="control-label">Full Name</label>
                                                <input name="name" type="text" required
                                                    maxlength="100" id="ctl00_mainContent_login1_LoginCtrl_UserName"
                                                    tabindex="10" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="ctl00_mainContent_login1_LoginCtrl_UserName"
                                                    class="control-label">Email</label>
                                                <input name="email" type="text" required
                                                    maxlength="100" id="ctl00_mainContent_login1_LoginCtrl_UserName"
                                                    tabindex="10" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Password
                                                </label>
                                                <input name="password" type="password" required
                                                    id="ctl00_mainContent_login1_LoginCtrl_Password" tabindex="10"
                                                    class="form-control">
                                                <span class="remember-me hidden"><input
                                                        id="ctl00_mainContent_login1_LoginCtrl_RememberMe" type="checkbox"
                                                        name="ctl00$mainContent$login1$LoginCtrl$RememberMe"
                                                        checked="checked" tabindex="10">
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="login-action">
                                            <div class="form-group">
                                                <input type="submit" name="ctl00$mainContent$login1$LoginCtrl$Login"
                                                    value="Register" id="ctl00_mainContent_login1_LoginCtrl_Login"
                                                    tabindex="10" class="btn btn-primary">
                                            </div>
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