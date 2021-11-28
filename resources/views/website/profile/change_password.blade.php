@extends('website.layouts.master')
@section('content')
@section('title')
	Đổi mật khẩu - NetTruyen
@endsection
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
                        href="{{route('change-password')}}" class="selectedcrumb">Đổi mật
                        khẩu</a></li>
            </ul>
        </div>
        <div class="row">
            <form action="{{route('change-password')}}" method="post">
                @csrf
                <div id="ctl00_divCenter" class="full-width col-sm-12">
                    <div class="row">
                        @include('website.profile.blocks.infor')
                        <div class="col-md-9 col-sm-8">
                            <div id="ctl00_mainContent_pnlPassword" class="user-page clearfix">
                                <h1 class="postname">
                                    Change password
                                </h1>
                                <div class="row">
                                    <div class="col-sm-9">
                                    @if(session()->has('message'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                        <table id="ctl00_mainContent_ChangePassword1" cellspacing="0" cellpadding="0"
                                            style="width:100%;border-collapse:collapse;">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div id="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_divCurrentPassword"
                                                            class="form-group">
                                                            <label
                                                                for="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_CurrentPassword"
                                                                class="control-label">Old password</label>
                                                            <input
                                                                name="old_password"
                                                                type="password"
                                                                id="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_CurrentPassword"
                                                                class="form-control">
                                                            <span
                                                                id="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_CurrentPasswordRequired"
                                                                title="Vui lòng nhập Mật khẩu cũ." class="error"
                                                                style="display:none;">Vui lòng nhập Mật khẩu cũ.</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_NewPassword"
                                                                class="control-label">New password</label>
                                                            <input
                                                                name="new_password"
                                                                type="password"
                                                                id="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_NewPassword"
                                                                class="form-control">
                                                            <span
                                                                id="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_NewPasswordRequired"
                                                                title="Vui lòng nhập Mật khẩu mới." class="error"
                                                                style="display:none;">Vui lòng nhập Mật khẩu mới.</span>
                                                            <span
                                                                id="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_NewPasswordRulesValidator"
                                                                class="error" style="display:none;"></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                for="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_ConfirmNewPassword"
                                                                class="control-label">Confirm new password</label>
                                                            <input
                                                                name="confirm_password"
                                                                type="password"
                                                                id="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_ConfirmNewPassword"
                                                                class="form-control">
                                                            <span
                                                                id="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_ConfirmNewPasswordRequired"
                                                                title="Vui lòng nhập Xác nhận mật khẩu." class="error"
                                                                style="display:none;">Vui lòng nhập Xác nhận mật
                                                                khẩu.</span>
                                                            <span
                                                                id="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_NewPasswordCompare"
                                                                title="Mật khẩu không khớp." class="error"
                                                                style="display:none;">Mật khẩu không khớp.</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit"
                                                                name="change_password"
                                                                value="Đổi mật khẩu"
                                                                id="ctl00_mainContent_ChangePassword1_ChangePasswordContainerID_ChangePasswordPushButton"
                                                                class="btn btn-primary">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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