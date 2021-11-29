@extends('website.layouts.master')
@section('content')
@section('title')
	Login - CommicBuddy
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
                        href="{{route('login')}}" class="selectedcrumb">Login</a></li>
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
                                                    tabindex="10" class="form-control" placeholder="Email...">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Password
                                                </label>
                                                <input name="password" type="password"
                                                    id="ctl00_mainContent_login1_LoginCtrl_Password" tabindex="10"
                                                    class="form-control" placeholder="Password...">
                                            </div>
                                        </div>
                                        <div class="login-action">
                                            <div class="form-group">
                                                <a id="ctl00_mainContent_login1_LoginCtrl_lnkRegisterExtraLink"
                                                    class="login-link"
                                                    href="{{route('register')}}">Don't have a account yet?</a>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit"
                                                    value="Login"
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