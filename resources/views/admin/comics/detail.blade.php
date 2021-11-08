@extends('admin.layouts.master')
@section('content')
<style>
    .dataTables_scrollBody {
        max-height: none !important;
    }
    .border-right {
        border-right: none !important;
    }
    input[type="text"]{
        width: 100%;
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
                            {{$comic->name}}
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
                        <a href="{{route('admin.comics.index')}}">Comics</a>&nbsp/&nbsp{{$comic->name}}
                    </div>
                    <div class="btn-actions-pane-right actions-icon-btn">
                        <div class="btn-group dropdown">
                            <a href="{{route('admin.comics.create')}}">
                                <div type="button" class="btn-icon btn-icon-only btn btn-link">
                                    Add <i class="pe-7s-plus btn-icon-wrapper"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <form action="{{route('admin.comics.edit', $comic->id)}}" method="post">
                            <div class="row">
                                @csrf 
                                <aside class="col-sm-5 border-right">
                                    <article class="gallery-wrap">
                                        <div class="img-big-wrap">
                                            <div> <a href="#"><img src="{{$comic->image}}" style="width: 100%; height: 100%"></a>
                                            </div>
                                            <input type="text" name="image" value="{{$comic->image}}">
                                        </div>

                                    </article>
                                </aside>
                                <aside class="col-sm-7">
                                    <article class="card-body p-5">
                                        <h3 class="title mb-3"><input type="text" name="name" placeholder=""value="{{$comic->name}}"></h3>

                                        <p class="price-detail-wrap">
                                            <span class="price h3 text-warning">
                                                <span class="currency"></span><span class="num"><input type="text" name="title" value="{{$comic->title}}"></span>
                                            </span>
                                        </p>
                                        <dl class="param param-feature">
                                            <dt>Author</dt>
                                            <dd><input type="text" value="12345611"></dd>
                                        </dl>
                                        <dl class="param param-feature">
                                            <dt>Status</dt>
                                            <dd><input type="text" value="{{$comic->status}}" name="status"></dd>
                                        </dl>
                                        <dl class="param param-feature">
                                            <dt>Genres</dt>
                                            <dd>
                                                <select class="form-control" name="category[]" id="genres" multiple>
                                                        @foreach($comic->genres as $genre)
                                                            <option value="{{$genre->id}}" selected>{{ $genre->name }}</option>
                                                        @endforeach                              
                                                </select>
                                            </dd>
                                        </dl>
                                        <dl class="param param-feature">
                                            <dt>Change Genres</dt>
                                            <dd>
                                                <select class="form-control" name="genres[]" id="genres" multiple>
                                                    @foreach($genres as $genre)
                                                        <option value="{{$genre->id}}">{{ $genre->name }}</option>
                                                    @endforeach
                                                </select>
                                            </dd>
                                        </dl>
                                        <dl class="param param-feature">
                                            <dt>Chapters</dt>
                                            <dd><input type="text" value="{{$comic->status}}"></dd>
                                        </dl> <!-- item-property-hor .// -->
                                        <dl class="item-property">
                                            <dt>Description</dt>
                                            <dd class="text-content-comic">
                                                <p>
                                                    <textarea name="content" id="" style="width:100%" rows="10">{{$comic->content}}</textarea>
                                                </p>
                                            </dd>
                                        </dl>
                                    
                                        <hr>
                                    
                                        <hr>
                                        <button type="submit" class="btn btn-lg btn-primary text-uppercase">Update</button>
                                    
                                        </div>
                                    </article> <!-- card-body.// -->
                                </aside>
                            </div>
                        </form>
                        <form action="{{route('admin.comics.delete', $comic->id)}}" method="post">
                            @csrf
                            <button type="submit" style="float: right; margin-top: -85px; margin-right: 47px;" class="btn btn-lg btn-danger text-uppercase">Delete</button>
                        </form>
                    </div>
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