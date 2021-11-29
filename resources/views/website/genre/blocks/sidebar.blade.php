<?php
    use App\Models\Genres;
    $genres = Genres::latest()->get();
?>
<div id="ctl00_divRight" class="right-side col-md-4 cmszone">
    <div class="box darkBox genres hidden-sm hidden-xs Module Module-179">
        <div class="ModuleContent">
            <h2 class="module-title"><b>Genres</b></h2>
            <ul class="nav">
                <li class="{{ Request::path() == 'tim-truyen' ? 'active' : '' }}">
                    <a target="_self" href="{{route('genre')}}">All Genres</a>
                </li>
                @foreach($genres as $genre)
                    <li>
                        <a <?php 
                            if (url()->current() == route('genre_detail', $genre->slug)){
                                echo "style='color: #ae4ad9 !important'";
                            }
                        ?> target="_self" href="{{route('genre_detail', $genre->slug)}}">{{$genre->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>