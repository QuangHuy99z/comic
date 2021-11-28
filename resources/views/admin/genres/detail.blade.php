@extends('admin.layouts.master')
@section('content')
<div class="app-inner-layout">
    <div class="app-inner-layout__header-boxed p-0">
        <div class="app-inner-layout__header page-title-icon-rounded text-white bg-premium-dark mb-4">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon"><i class="pe-7s-umbrella icon-gradient bg-sunny-morning"></i></div>
                        <div>
                            {{$genre->name}}
                            <div class="page-title-subheading" style="visibility: hidden;">Example of a Dashboard page
                                built
                                with Architect.</div>
                        </div>


                    </div>

                </div>

            </div>
        </div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-dice mr-3 text-muted opacity-6"> </i>
                        Add Comic
                    </div>
                </div>
                <div class="card-body">
                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                        <form action="{{route('admin.genres.edit', $genre->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{$genre->name}}" id="name" name="name"
                                    placeholder="Enter Genre Name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    placeholder="Enter Genre Description" rows="6">{{$genre->description}}</textarea>
                            </div>

                            <button type="submit" style="font-size: 14px" class="btn btn-primary">Submit</button>
                        </form>
                        <form action="{{route('admin.genres.delete', $genre->id)}}" method="post">
                            @csrf
                            <button type="submit" style="float: right; color:red; font-size: 14px" class="btn btn-lg btn-danger text-uppercase">Delete</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection