<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://cute0pets.tk/asset/backend/css/style.css">
    <link href="https://demo.dashboardpack.com/architectui-html-pro/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
    <style>
        body {
            font-size: 16px !important;
        }
        .card-header .header-icon {
            font-size: 30px;
            padding: 20px 0 20px 0;
        }
        .app-page-title .page-title-heading {
            font-size: 20px;
            font-weight: 400;
            display: flex;
            align-content: center;
            align-items: center;
        }
        .card-header-title.font-size-lg.text-capitalize.font-weight-normal{
            font-size: 16px !important;
        }
        .actions-icon-btn .btn-icon-only {
            padding-left: 0;
            padding-right: 0;
            color: #495057;
            border: none;
            outline: none;
            font-size: 16px !important;
        }
        .actions-icon-btn .btn-icon-only .btn-icon-wrapper {
            font-size: 25px;
            width: 30px;
            text-align: center;
        }
        .form-control{
            height: 40px;
        }
        button#TooltipDemo{
            color: #212529 !important;
            background: #f7b924 !important;
            border-color: #f7b924 !important;
        }
    </style>
    <script src="//code.jquery.com/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <style>
        ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
            color: red;
            font-size: 14px;
        }
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
            color: red !important;
            opacity: 1;
        }
        ::-moz-placeholder { /* Mozilla Firefox 19+ */
            color: red !important;
            opacity: 1;
        }
        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: red !important;
        }
        ::-ms-input-placeholder { /* Microsoft Edge */
            color: red !important;
        }

        ::placeholder { /* Most modern browsers support this now. */
            color: red !important;
        }
        input[placeholder], [placeholder], *[placeholder] {
            color: red !important;
        }
        .select2-selection.select2-selection--single{
            height: 38px;
            border: 1pxsolid #ced4da;
            border-radius: 0.25rem;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 36px;
        }
        .select2.select2-container.select2-container--default.select2-container--above{
            width: 100% !important;
        }
        .select2-container--default .select2-search--inline .select2-search__field {
            padding-left: 6px !important;
        }
    </style>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        @include('admin.blocks.header')
        @include('admin.blocks.setting')
        <div class="app-main">
            @include('admin.blocks.sidebar')
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-pro/assets/scripts/main.d810cf0ae7f39f28f336.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
</body>
</html>