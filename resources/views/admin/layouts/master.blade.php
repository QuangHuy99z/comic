<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://demo.dashboardpack.com/architectui-html-pro/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
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