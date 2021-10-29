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
                            Thêm sản phẩm
                            <div class="page-title-subheading">Example of a Dashboard page built
                                with Architect.</div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                            class="btn-shadow mr-3 btn btn-dark">
                            <i class="fa fa-star"></i>
                        </button>
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="btn-shadow dropdown-toggle btn btn-info">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-business-time fa-w-20"></i>
                                </span>
                                Buttons
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-inbox"></i>
                                            <span> Inbox</span>
                                            <div class="ml-auto badge badge-pill badge-secondary">86
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-book"></i>
                                            <span> Book</span>
                                            <div class="ml-auto badge badge-pill badge-danger">5
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-picture"></i>
                                            <span> Picture</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a disabled class="nav-link disabled">
                                            <i class="nav-link-icon lnr-file-empty"></i>
                                            <span> File Disabled</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
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
                        Add Comic
                    </div>
                </div>
                <div class="card-body">
                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                        <form action="{{route('admin.comics.create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Comic Name">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Comic Title">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="text" class="form-control" id="image" name="image" placeholder="Enter Image">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <input type="text" class="form-control" id="content" name="content" placeholder="Enter Comic Content">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
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