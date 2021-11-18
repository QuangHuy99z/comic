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
                        <span style="color: red; text-transform: uppercase;">
                            {{$comic->name}}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                        <form action="{{route('admin.chapters.create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="comic_name" style="display: block; color: red">Comic</label>
                                <input class="form-control" name="comic_name" id="comic_name" value="{{$comic->name}}" disabled>
                            </div>
                            @foreach ($comic->chapters as $chapter)
                                <div class="form-group">
                                    <label for="chapter_number" style="color: red">Chapter Number {{$chapter->number}}</label>
                                    <div class="container" style="margin-top: 10px">
                                        <div class="row">
                                            <div class="owl-carousel owl-theme">
                                                @foreach($chapter->chapter_images as $chapter_image)
                                                        <img src="{{asset('/uploads/comics/'.$chapter_image->image)}}" data-src="{{asset('/uploads/comics/'.$chapter_image->image)}}" class="img-responsive owl-lazy" alt="Image" style="width:100%">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <script>
                                $('.owl-carousel').owlCarousel({
                                    autoplay:true,
                                    lazyLoad: true,
                                    loop:true,
                                    autoplayTimeout:3000,
                                    autoplayHoverPause:true,
                                    margin:10,
                                    dots: false,
                                    nav:false,
                                    responsive:{
                                        0:{
                                            items:1
                                        },
                                        4:{
                                            items:2
                                        },
                                        600:{
                                            items:3
                                        },
                                        1000:{
                                            items:4
                                        }
                                    },
                                })
                                
                            </script>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection