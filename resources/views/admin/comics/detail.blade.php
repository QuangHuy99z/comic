@extends('admin.layouts.master')
@section('content')
<style>
    a {
        text-decoration: none !important;
    }

    a:hover i {
        color: red !important;
    }

    .dataTables_scrollBody {
        max-height: none !important;
    }

    .border-right {
        border-right: none !important;
    }

    input[type="text"] {
        width: 100%;
    }

    a.disabled {
        pointer-events: none;
        cursor: default;
    }
    button.ui-button.btn-primary {
        top: -20px;
        left: -8px;
    }
    button.ui-button.btn-destroy {
        top: 24px;
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
                            <a class="<?php if($prev->count() != 0){
                                                        echo '';
                                                    }else echo 'disabled';  
                                                    ?>" href="<?php if($prev->count() != 0){
                                                        echo $prev[0]->id;
                                                    }else echo 'javascript:void(0)';  
                                                    ?>"">
                                <div type=" button" class="btn-icon btn-icon-only btn-link">
                                <i class="pe-7s-angle-left btn-icon-wrapper" style="font-size: 40px; width: 30px"></i>
                        </div>
                        </a>
                        <a style="color: #637381;" class="<?php if($next->count() != 0){
                                                        echo '';
                                                    }else echo 'disabled';  
                                                    ?>" href="<?php if($next->count() != 0){
                                                        echo $next[0]->id;
                                                    }else echo 'javascript:void(0)';  
                                                    ?>">
                            <div type="button" class="btn-icon btn-icon-only btn-link">
                                <i class="pe-7s-angle-right btn-icon-wrapper" style="font-size: 40px; width: 30px"></i>

                            </div>
                        </a>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.comics.edit', $comic->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-layout__sections">
                        <div class="ui-layout__section ui-layout__section--primary">
                            <div class="ui-layout__item">
                                <section class="ui-card" id="product-form-container">
                                    <div class="ui-card__section">
                                        <div class="ui-type-container">
                                            <div class="next-input-wrapper">
                                                <label class="next-label" for="product-name">
                                                    Comic Name
                                                </label>
                                                <input required="" id="product-name" value="{{$comic->name}}"
                                                    placeholder="Nhập tên sản phẩm" class="next-input" size="30"
                                                    type="text" name="name">
                                            </div>
                                            <div class="next-input-wrapper">
                                                <label class="next-label" for="product-name">
                                                    Comic Title
                                                </label>
                                                <input required="" id="title" value="{{$comic->title}}"
                                                    placeholder="Nhập tên sản phẩm" class="next-input" size="30"
                                                    type="text" name="title">
                                            </div>
                                            <div class="next-input-wrapper">
                                                <label class="next-label" for="content">Content</label>
                                                <textarea name="content" style="padding: 5px 10px">{{$comic->content}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <section class="ui-card" id="product-images-container">
                                    <div data-define="{ imageActions: new Bizweb.ProductCreateImageActions(this, $context) }"
                                        data-context="imageActions" id="product-images-content"
                                        data-tg-refresh="product-images-content">
                                        <header class="next-card__header">
                                            <div class="next-grid next-grid--no-padding next-grid--vertically-centered">
                                                <div class="next-grid__cell">
                                                    <h2 class="next-heading">Comic Image</h2>
                                                </div>
                                                <div class="next-grid__cell next-grid__cell--no-flex">
                                                    <div
                                                        class="next-grid next-grid--no-outside-padding next-grid--vertically-centered">
                                                        <div class="next-grid__cell next-grid__cell--no-flex">
                                                            <div class="styled-file-input">
                                                                <div class="btn btn--link" style="display:flex;">
                                                                    <a href="#"
                                                                        class="ui-button btn--link change-avatar updateavatar"
                                                                        style="padding:0 15px;"
                                                                        id="ht-cre-product-add-image">Edit Image
                                                                        </a>
                                                                        <input type="file" id="uploadAvatar" style="display:none;" accept="image/x-png,image/gif,image/jpeg" name="fimage" onchange="document.getElementById('img-avatar').src = window.URL.createObjectURL(this.files[0])">
                                                                    <script>

                                                                        $('.updateavatar').click(function (e) {
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
                                                <img src="{{asset('/uploads/comics/'.$comic->image)}}" onerror="this.onerror=null; this.src='{{$no_product_image}}'" alt="customer-image" class="img-avatar" id="img-avatar" style="display:block; margin: 0 auto; width: 400px; height: 400px;">
                                                <!-- Process if image is null -->
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>

                        </div>
                        <div class="ui-layout__section ui-layout__section--secondary">
                            <div class="ui-layout__item">
                                <div class="next-card">
                                    <header class="next-card__header">
                                        <h3 class="ui-heading">Status</h3>
                                    </header>
                                    <section class="next-card__section">
                                        <div class="visibility" id="PublishingPanel" data-context="publishingPanel">
                                            <div class="ui-form__section">
                                                <div class="ui-form__element">
                                                    <fieldset class="ui-choice-list">
                                                        <ul>
                                                            <li>
                                                                <div class="next-input-wrapper">
                                                                    <label class="next-label next-label--switch"
                                                                        for="active-true">
                                                                        Ongoing
                                                                    </label>
                                                                    <input type="radio" name="status" id="active-true"
                                                                        value="Ongoing" class="next-radio"
                                                                        {{($comic->status
                                                                    == 'Ongoing' ?
                                                                    'checked' : '')}}>
                                                                    <span class="next-radio--styled"></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="next-input-wrapper">
                                                                    <label class="next-label next-label--switch"
                                                                        for="active-false">
                                                                        Not Ongoing
                                                                    </label>
                                                                    <input type="radio" name="status"
                                                                        id="active-false" value="Not Ongoing"
                                                                        class="next-radio" {{($comic->status == 'Not Ongoing' ?
                                                                    'checked' : '')}}>
                                                                    <span class="next-radio--styled"></span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <div class="ui-layout__item">
                                <section class="ui-card ui-card--type-aside">
                                    <header class="ui-card__header">
                                        <h2 class="ui-heading">Comic Category</h2>
                                    </header>
                                    <div class="ui-card__section">
                                        <div class="ui-type-container">
                                            <div class="next-input-wrapper">
                                                <label for="product_product_type">Authors</label>
                                                <div
                                                    class="ui-popover__container ui-popover__container--full-width-container">
                                                    <div>
                                                        <div class="next-field__connected-wrapper">
                                                            <style>
                                                                .select2-results__options {
                                                                    font-size: 16px !important;
                                                                }

                                                                .select2-container .select2-selection--single {
                                                                    height: 40px;
                                                                }

                                                                .select2-container--default .select2-selection--single .select2-selection__rendered {
                                                                    color: #444;
                                                                    line-height: 28px;
                                                                }
                                                            </style>
                                                            <select
                                                                class="next-input select2 select2-hidden-accessible authors_select2"
                                                                name="authors[]" multiple required>
                                                                <option value="">Input Authors</option>
                                                                @foreach($authors as $author)
                                                                    @if (in_array($author->id, $all_authors_of_current_comic))
                                                                        <option value="{{$author->id}}" selected >{{ $author->name }}</option>
                                                                    @else
                                                                        <option value="{{$author->id}}" >{{ $author->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    $('.authors_select2').select2(
                                                                        {
                                                                            placeholder: 'Input author',
                                                                            allowClear: true,
                                                                            language: {
                                                                                noResults: function () {
                                                                                    return 'Author not found';
                                                                                },
                                                                            },
                                                                            escapeMarkup: function (markup) {
                                                                                return markup;
                                                                            },
                                                                        },
                                                                    );
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="next-input-wrapper">
                                                <label for="product_vendor">Genres</label>
                                                <div
                                                    class="ui-popover__container ui-popover__container--full-width-container">
                                                    <div>
                                                        <div class="next-field__connected-wrapper">
                                                            <select class="next-input select1 select2-hidden-accessible"
                                                                name="genres[]" tabindex="-1" aria-hidden="true"
                                                                multiple required>
                                                                <option value="">Input Genres</option>
                                                                @foreach($genres as $genre)
                                                                    @if (in_array($author->id, $all_genres_of_current_comic))
                                                                    <option value="{{$genre->id}}" selected >{{ $genre->name }}</option>
                                                                    @else
                                                                    <option value="{{$genre->id}}" >{{ $genre->name }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    $(".select1").select2(
                                                                        {
                                                                            placeholder: "Input Genres",
                                                                            allowClear: true,
                                                                            language: {
                                                                                noResults: function () {
                                                                                    return 'Genre not found';
                                                                                },
                                                                            },
                                                                            escapeMarkup: function (markup) {
                                                                                return markup;
                                                                            },
                                                                        }

                                                                    );
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="ui-page-actions__container">
                        <div class="ui-page-actions__actions ui-page-actions__actions--secondary">
                            <div class="ui-page-actions__button-group">
                                    <button class="ui-button btn-destroy" type="submit" name="button">Save</button>
                            </div>

                        </div>
                    </div>
                </form>
                <form action="{{route('admin.comics.delete', $comic->id)}}" method="post">
                    @csrf
                    <div class="ui-page-actions__actions ui-page-actions__actions--primary">
                        <div class="ui-page-actions__button-group">
                            <button name="button" type="submit"
                                class="ui-button btn-primary">
                                Delete
                            </button>
                        </div>
                    </div>
                </form>            
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection