@extends('admin.layouts.auth')
@section('content')
<form action="{{route('admin.login')}}" method="post">
    @csrf
    <div class="hand"></div>
    <div class="hand rgt"></div>
    <h1>Login</h1>
    @if(session()->has('message'))
        <div style="color:red; margin-bottom: 20px">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="form-group">
        <input required="required" name="email" class="form-control" />
        <label class="form-label">Email</label>
    </div>
    <div class="form-group">
        <input id="password" type="password" required="required" name="password" class="form-control" />
        <label class="form-label">Password</label>
        <button class="btn">Login </button>
    </div>
    </form>
@endsection