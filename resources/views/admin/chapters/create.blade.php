@extends('admin.layouts.master')
@section('content')
<style>
    .file-chooser{
        text-align: center;
        margin: 15px;
    }
    p {
        margin:20px !important;
    }
    .file-uploader {
        background-color: #dbefe9;
        border-radius: 3px;
        color: #242424;
    }

    .file-uploader__message-area {
        font-size: 18px;
        padding: 1em;
        text-align: center;
        color: #377a65;
    }

    .file-list {
        background-color: #fff;
        font-size: 16px;
    }

    .file-list__name {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .file-list li {
        height: 30px;
        line-height: 30px;
        margin-left: 0.5em;
        border: none;
        overflow: hidden;
    }

    .removal-button {
        width: 20%;
        border: none;
        background-color: #d65d38;
        color: white;
    }

    .removal-button::before {
        content: "X";
    }

    .removal-button:focus {
        outline: 0;
    }

    .file-uploader {
        max-width: 400px;
        height: auto;
        margin: 2em auto;
    }

    .file-uploader * {
        display: block;
    }

    .file-uploader input[type="submit"] {
        margin-top: 2em;
        float: right;
    }

    .file-list {
        margin: 0 auto;
        max-width: 90%;
    }

    .file-list__name {
        max-width: 70%;
        float: left;
    }

    .removal-button {
        display: inline-block;
        height: 100%;
        float: right;
    }

    .file-uploader__submit-button {
        width: 100%;
        border: none;
        font-size: 1.5em;
        padding: 1em;
        background-color: #72bfa7;
        color: white;
    }

    .file-uploader__submit-button:hover {
        background-color: #a7d7c8;
    }

    .file-list li:after,
    .file-uploader:after {
        content: "";
        display: table;
        clear: both;
    }

    .hidden {
        display: none;
    }

    .hidden input {
        display: none;
    }

    .error {
        background-color: #d65d38;
        color: white;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    ul,
    li {
        margin: 0;
        padding: 0;
    }
    input {
        width: 100% !important;
        font-size: 16px !important;
    }
    .select2-results__options{
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
                            Thêm chapter
                            <div class="page-title-subheading" style="visibility: hidden;">Example of a Dashboard page
                                built
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
                        Add Chapters
                    </div>
                </div>
                <div class="card-body">
                    <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                        <form action="{{route('admin.chapters.create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="chapter_number">Chapter Number</label>
                                <input type="number" class="form-control" name="chapter_number" id="chapter_number" value="1">
                            </div>
                            <div class="form-group">
                                <label for="comic_name">Comic</label>
                                <select class="form-control js-example-basic-single" name="comic_name" id="comic_name">
                                    <option value="" disabled hidden selected>Choose comic</option>
                                    @foreach($comics as $comic)
                                    <option value="{{$comic->id}}">{{$comic->name}}</option>
                                    @endforeach
                                </select>
                                <script>
                                    $(document).ready(function () {
                                        $('.js-example-basic-single').select2(
                                            {
                                                placeholder: 'Choose comic',
                                            }
                                        );
                                    });
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="chapter_image">Chapter Image</label>
                                <div style="border: 1px solid black">
                                    <div class="file-uploader__message-area">
                                        <p>Select a file to upload</p>
                                    </div>
                                    <div class="file-chooser" style="margin-bottom: 20px">
                                        <input class="file-chooser__input" type="file" name="chapter_image[]" multiple>
                                    </div>
                                </div>
                               
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