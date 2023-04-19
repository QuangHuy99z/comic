@extends('admin.layouts.auth')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-2"></div>
        <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
                <i class="fa fa-key" aria-hidden="true"></i>
            </div>
            <div class="col-lg-12 login-title">
                ADMIN PANEL
            </div>

            <div class="col-lg-12 login-form">
                <div class="col-lg-12 login-form">
                    <form action="{{route('admin.login')}}" method="POST" autocomplete="off">
                        @csrf
                        @if(session()->has('message'))
                        <div class="alert alert-danger">
                            <div style="color:red;">
                                {{ session()->get('message') }}
                            </div>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <div style="color:red;">
                                {{ $error }}
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="form-group">
                            <label class="form-control-label" autocomplete="off" required="required">EMAIL</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" autocomplete="off" required="required">PASSWORD</label>
                            <input type="password" name="password" class="form-control" i>
                        </div>

                        <div class="col-lg-12 loginbttm">
                            <div class="col-lg-6 login-btm login-text">
                                <!-- Error Message -->
                            </div>
                            <div class="col-lg-6 login-btm login-button">
                                <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
        </div>
    </div>





    @endsection