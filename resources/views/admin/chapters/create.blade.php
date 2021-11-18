<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Chapter</title>
</head>

<body>
    <form action="{{route('admin.chapters.create')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="content">Chapter Number</label>
            <input type="text" class="form-control" id="number" name="number" placeholder="Enter Chapter Number">
        </div>
        <div class="form-group">
            <label for="content">Comic Name</label>
            <dd>
                <select class="form-control" name="comics" id="comics" multiple>
                    @foreach($comics as $comic)
                    <option value="{{$comic->id}}" selected>{{$comic->name}}</option>
                    @endforeach
                </select>
            </dd>
        </div>
        <label for="content">Chapter Image</label>
        <input type="file" class="form-control" name="chapter_images[]" multiple />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>