<?php
    use App\Models\Genres;
    $genres = Genres::latest()->get();
?>
<div class="dropdown-genres mrt10 mrb10 visible-sm visible-xs">
    <select class="form-control changed-redirect">
        <option selected="" value="{{route('genre')}}">All Genres
        </option>
        @foreach($genres as $genre)
            <option value="{{route('genre_detail', $genre->slug)}}">{{$genre->name}}</option>
        @endforeach
    </select>
</div>