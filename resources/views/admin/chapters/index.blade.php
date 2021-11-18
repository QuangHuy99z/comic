<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form>
        @csrf
        <div class="form-group">
            <label for="content">Chapter Number</label>
        </div>
        @foreach($chapter as $chapter)
        {{$chapter->number}}
        @endforeach
    </form>
</body>

</html>