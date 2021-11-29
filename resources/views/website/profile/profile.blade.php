@extends('website.layouts.master')
@section('content')
@section('title')
	Account Information - NetTruyen
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
                        href="{{route('profile')}}" class="selectedcrumb">Your account</a></li>
            </ul>
        </div>
        <div class="row">
            <form action="{{route('profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div id="ctl00_divCenter" class="full-width col-sm-12">
                    <div class="row">
                        @include('website.profile.blocks.infor')
                        <div class="col-md-9 col-sm-8">
                            <div id="ctl00_mainContent_pnlUser" class="user-page clearfix">
                                <h1 class="postname">
                                    Your account
                                </h1>
                                <div class="account-info clearfix">
                                    <h2 class="posttitle">Update your account</h2>
                                    <div class="account-form clearfix">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                @if(session()->has('message'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                                <div class="form-group">
                                                    <label for="ctl00_mainContent_txtEmail" class="control-label">
                                                        Email</label>
                                                    <input name="email" type="text"
                                                        value="{{Auth::guard('web')->user()->email}}" id="ctl00_mainContent_txtEmail"
                                                        disabled="disabled" tabindex="10"
                                                        class="aspNetDisabled form-control">
                                                    <span id="ctl00_mainContent_regexEmail" style="display:none;"></span>
                                                    <span id="ctl00_mainContent_rfvEmail" style="display:none;"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ctl00_mainContent_txtFirstName"
                                                        class="control-label">Name</label>
                                                    <input name="name" type="text"
                                                        value="{{Auth::guard('web')->user()->name}}" maxlength="100"
                                                        id="ctl00_mainContent_txtFirstName" class="form-control">
                                                    <span id="ctl00_mainContent_FirstNameRequired" class="error"
                                                        style="display:none;">Input your name</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div id="ctl00_mainContent_divAvatar" class="form-group avatar-control">
                                                    <label class="control-label">Avatar</label>
                                                    <div class="forminput">
                                                        <img alt=""
                                                            src="{{Auth::guard('web')->user()->avatar != null ? asset('/uploads/customers/'.Auth::guard('web')->user()->avatar) : '//st.imageinstant.net/data/siteimages/anonymous.png'}}"
                                                            class="avatar user-img">
                                                        <input type="file" name="avatar"
                                                            id="ctl00_mainContent_fileUploader">
                                                        <span class="avatar-note">jpg,jpeg,gif,png &lt;2MB</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button-wrap">
                                            <input type="submit" name="ctl00$mainContent$btnUpdate" value="Update" id="ctl00_mainContent_btnUpdate" class="btn btn-primary">
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