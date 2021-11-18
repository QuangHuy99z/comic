@extends('admin.layouts.master')
@section('content')
<style>
.dataTables_scrollBody {
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
                        List of Genres
                    </div>
                </div>
                <div class="card-body">
                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Avatar</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $user)
                            <tr>
                                <td><a href="" style="color: #495057; text-decoration: none;">{{$user->name}}</a></td>
                                <td><a href="" style="color: #495057; text-decoration: none;">{{$user->email}}</a></td>
                                <td><a href="" style="color: #495057; text-decoration: none;">{{$user->status}}</a></td>
                                <td><a href="" style="color: #495057; text-decoration: none;">{{$user->avatar}}</a></td>
                                <td><a href="" style="color: #495057; text-decoration: none;">{{$user->position}}</a>
                                </td>
                                <td>
                                    <form action="{{route('admin.users.delete', $user->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                            </a>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Avatar</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="main-card mb-3 card">
        <div class="no-gutters row">
            <div class="col-md-6 col-xl-4">
                <div class="widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-right ml-0 mr-3">
                            <div class="widget-numbers text-success">1896</div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Orders</div>
                            <div class="widget-subheading">Last year expenses</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-right ml-0 mr-3">
                            <div class="widget-numbers text-warning">$ 14M</div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading">Products Sold</div>
                            <div class="widget-subheading">Total revenue streams</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-right ml-0 mr-3">
                            <div class="widget-numbers text-danger">45.9%</div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading">Followers</div>
                            <div class="widget-subheading">People Interested</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-xl-none d-md-block col-md-6 col-xl-4">
                <div class="widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-right ml-0 mr-3">
                            <div class="widget-numbers text-danger">45.9%</div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading">Followers</div>
                            <div class="widget-subheading">People Interested</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection