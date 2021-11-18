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
                            Thêm truyện
                            <div class="page-title-subheading" style="visibility: hidden;">Example of a Dashboard page built
                                with Architect.</div>
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
                <form action="{{route('admin.comics.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="ui-layout__sections">
                        <div class="ui-layout__section ui-layout__section--primary">
                            <div class="ui-layout__item">
                                <section class="ui-card" id="product-form-container">
                                    <div class="ui-card__section">
                                        <div class="ui-type-container">
                                            <div class="next-input-wrapper">
                                                <label class="next-label" for="product-name">
                                                    Tên truyện
                                                </label>
                                                <input required="" id="product-name""
                                                    placeholder="Nhập tên truyện" class="next-input" size="30"
                                                    type="text" name="name">
                                            </div>
                                            <div class="next-input-wrapper">
                                                <label class="next-label" for="product-name">
                                                    Tiêu đề truyện
                                                </label>
                                                <input required="" id="title""
                                                    placeholder="Nhập tiêu đề truyện" class="next-input" size="30"
                                                    type="text" name="title">
                                            </div>
                                            <div class="next-input-wrapper">
                                                <label class="next-label" for="content">Nội dung</label>
                                                <textarea name="content" id="content"
                                                    rows="6"></textarea>
                                            </div>
                                            <script>
                                                CKEDITOR.replace('content', {
                                                    height: "200px",
                                                })
                                                CKEDITOR.config.autoParagraph = false;
                                                CKEDITOR.on('instanceReady', function (e) {
                                                    // First time
                                                    e.editor.document.getBody().setStyle('color', 'red');
                                                    e.editor.document.getBody().setStyle('background-color', '#fff');
                                                });
                                            </script>

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
                                                    <h2 class="next-heading">Ảnh sản phẩm</h2>
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
                                                                        id="ht-cre-product-add-image">Sửa
                                                                        ảnh</a>
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
                                                <img src="" onerror="this.src='https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg'" alt="customer-image" class="img-avatar" id="img-avatar" style="width:100%;">
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
                                        <h3 class="ui-heading">Trạng thái</h3>
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
                                                                    <input type="radio" name="status" id="active-true" checked
                                                                        value="Ongoing" class="next-radio">
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
                                                                        class="next-radio">
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
                                        <h2 class="ui-heading">Phân loại</h2>
                                    </header>
                                    <div class="ui-card__section">
                                        <div class="ui-type-container">
                                            <div class="next-input-wrapper">
                                                <label for="product_product_type">Tác giả</label>
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
                                                            </select>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    $('.authors_select2').select2(
                                                                        {
                                                                            placeholder: 'Input author',
                                                                            tags: true,
                                                                        },
                                                                    );
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="next-input-wrapper">
                                                <label for="product_vendor">Thể loại</label>
                                                <div
                                                    class="ui-popover__container ui-popover__container--full-width-container">
                                                    <div>
                                                        <div class="next-field__connected-wrapper">
                                                            <select class="next-input select1 select2-hidden-accessible"
                                                                name="genres[]" tabindex="-1" aria-hidden="true"
                                                                multiple required>
                                                                <option value="">Nhập thể loại</option>
                                                                @foreach($genres as $genre)
                                                                    <option value="{{$genre->id}}">{{ $genre->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    $(".select1").select2(
                                                                        {
                                                                            placeholder: "Nhập thể loại",
                                                                            allowClear: true,
                                                                            language: {
                                                                                noResults: function () {
                                                                                    return 'Thể loại không tồn tại';
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
                    <div class="ui-page-actions">
                        <style>
                            a.btn {
                                font-size: 16px !important;
                            }
                            button.btn.btn-primary {
                                font-size: 16px !important;
                            }
                        </style>
                        <div class="ui-page-actions__container">
                            <div class="ui-page-actions__actions ui-page-actions__actions--primary">
                                <div class="ui-page-actions__button-group">
                                    <a class="btn" data-allow-default="1" href="{{route('admin.comics.index')}}">Hủy</a>
                                    <button name="button" type="submit" value="Lưu" class="btn btn-primary">
                                    Lưu
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>

    </div>

</div>
@endsection