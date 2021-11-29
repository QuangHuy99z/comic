@extends('admin.layouts.master')
@section('content')
<style>
    #content {
        padding: 3.75px 7.5px;
    }
    input, textarea {
        font-size: 16px !important;
    }
</style>
<div class="app-inner-layout">
    <div class="app-inner-layout__header-boxed p-0">
        <div class="app-inner-layout__header page-title-icon-rounded text-white bg-premium-dark mb-4">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon"><i class="pe-7s-umbrella icon-gradient bg-sunny-morning"></i></div>
                        <div>
                            Add Genres
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-dice mr-3 text-muted opacity-6"> </i>
                        Add Genres
                    </div>
                </div>
                <div class="card-body">
                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                        <form action="{{route('admin.genres.create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Genres Name">
                            </div>
                            <div class="form-group">
                                <label for="content">Description</label>
                                <textarea class="form-control" id="content" name="description" placeholder="Enter Genres Content" rows="6"></textarea>
                            </div>
                            <button type="submit" style="font-size: 16px" class="btn btn-primary">Submit</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection