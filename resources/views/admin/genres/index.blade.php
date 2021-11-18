@extends('admin.layouts.master')
@section('content')
<style>
    .dataTables_scrollBody{
        max-height: none !important;
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
                            Tất cả các sản phẩm
                            <div class="page-title-subheading" style="visibility: hidden;">Example of a Dashboard page built
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
                        List of Comics
                    </div>
                    <div class="btn-actions-pane-right actions-icon-btn">
                        <div class="btn-group dropdown">
                            <a href="{{route('admin.genres.create')}}">
                                <div type="button" class="btn-icon btn-icon-only btn btn-link">
                                    Add <i class="pe-7s-plus btn-icon-wrapper"></i>
                                </div>
                            </a>  
                         
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($genres as $genre)
                                    <tr>
                                        <td><a href="{{route('admin.genres.edit', $genre->id)}}" style="color: #495057; text-decoration: none;">{{$genre->name}}</a></td>
                                        <td><a href="{{route('admin.genres.edit', $genre->id)}}" style="color: #495057; text-decoration: none;">{{$genre->description}}</a></td>
                                        <td><a href="{{route('admin.genres.edit', $genre->id)}}" style="color: #495057; text-decoration: none;">{{$genre->created_at}}</a></td>
                                    </tr>
                                </a>
                            @endforeach    
        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      
    </div>
</div>
@endsection