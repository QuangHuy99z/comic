@extends('admin.layouts.master')
@section('content')
<div class="app-inner-layout">
    <div class="app-inner-layout__header-boxed p-0">
        <div class="app-inner-layout__header page-title-icon-rounded text-white bg-premium-dark mb-4">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>
                            {{$user->name}}
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
                        Author Details
                    </div>
                </div>
                <div class="card-body">
                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                        <form action="{{route('admin.users.edit', $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{$user->name}}" id="name" name="name" placeholder="Enter User Name" style="font-size: 15px" required>
                            </div>
                            <section class="ui-card" id="product-images-container" style="margin-bottom: 10px">
                                <div data-define="{ imageActions: new Bizweb.ProductCreateImageActions(this, $context) }" data-context="imageActions" id="product-images-content" data-tg-refresh="product-images-content">
                                    <header class="next-card__header">
                                        <div class="next-grid next-grid--no-padding next-grid--vertically-centered">
                                            <div class="next-grid__cell">
                                                <h2 class="next-heading">User Image</h2>
                                            </div>
                                            <div class="next-grid__cell next-grid__cell--no-flex">
                                                <div class="next-grid next-grid--no-outside-padding next-grid--vertically-centered">
                                                    <div class="next-grid__cell next-grid__cell--no-flex">
                                                        <div class="styled-file-input">
                                                            <div class="btn btn--link" style="display:flex;">
                                                                <a href="#" class="ui-button btn--link change-avatar updateavatar" style="padding:0 15px;" id="ht-cre-product-add-image">Edit Image
                                                                </a>
                                                                <input type="file" id="uploadAvatar" style="display:none;" accept="image/x-png,image/gif,image/jpeg" name="avatar" onchange="document.getElementById('img-avatar').src = window.URL.createObjectURL(this.files[0])">
                                                                <script>
                                                                    $('.updateavatar').click(function(e) {
                                                                        e.preventDefault();
                                                                        $("#uploadAvatar").trigger('click');
                                                                    })
                                                                </script>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="next-card__section">
                                        <div class="next-upload-dropzone__wrapper">
                                            <!-- Upload Image -->
                                            <img src="{{asset('/uploads/users/'.$user->avatar)}}" onerror="this.onerror=null; this.src='{{$no_product_image}}'" alt="customer-image" class="img-avatar" id="img-avatar" style="display:block; margin: 0 auto; width: 400px; height: 400px;">
                                            <!-- Process if image is null -->
                                        </div>
                                    </div>
                                </div>
                            </section>


                            <button type="submit" style="font-size: 14px" class="btn btn-primary">Submit</button>
                        </form>
                        <form action="{{route('admin.users.delete', $user->id)}}" method="post">
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