<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://demo.dashboardpack.com/architectui-html-pro/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
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
</body>
</html>