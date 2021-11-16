<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{route('admin.chapters.index')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="content">Chapter Number</label>
            <input type="text" class="form-control" id="number" name="number" placeholder="Enter Chapter Number">
        </div>
    </form>
</body>

</html>