<div id="ctl00_divRight" class="right-side col-md-4 cmszone">
    <div class='comics-followed-block Module Module-172'>
        <div class='ModuleContent'></div>
    </div>
    <div class="visited-comics"></div>
    <div class='comic-wrap Module Module-168'>
        <div class='ModuleContent'>
            <div class="box-tab box darkBox">
                <ul class="tab-nav clearfix">
                    <li>
                        <a rel="nofollow" title="BXH truyện tranh theo ngày" href="{{route('genre')}}">Top Manga</a>
                    </li>
                </ul>
                <div class="tab-pane">
                    <div id="topMonth">
                        <ul class="list-unstyled">
                            @php
                            $i = 1;
                            $chapter_ids = [];
                            @endphp
                            @if(session()->has('history') && session()->get('history') != null)
                            @foreach(session()->get('history') as $id => $history)
                            @php
                            $chapter_ids[$id] = $history['chapter_ids'];
                            @endphp
                            @endforeach
                            @endif
                            @foreach ($top_comics as $top_comic)
                            
                            <li class="clearfix">
                                <span class="txt-rank fn-order pos1">{{'0'. $i ++}}</span>
                                <div class="t-item">
                                    <a class="thumb" title="{{$top_comic->name}}" href="{{route('comic', $top_comic->slug)}}">
                                        <img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-original="{{asset('/uploads/comics/'.$top_comic->image)}}" alt="{{$top_comic->name}}">
                                    </a>
                                    <h3 class="title">
                                        <a href="{{route('comic', $top_comic->slug)}}">{{$top_comic->name}}</a>
                                    </h3>
                                    <p class="chapter top">

                                        <a href="{{$top_comic->chapters->count() != 0 ? route('chapter', [$top_comic->slug, $top_comic->last_chapter->number, $top_comic->last_chapter->id]) : ''}}" class="visited-comics"
                                            <?php 

                                                if (count($chapter_ids) == 0) {
                                                    echo 'style="color: #000"';
                                                } else if($top_comic->chapters->count() != 0 && count($chapter_ids) && isset($chapter_ids[$top_comic->id]) && in_array($top_comic->last_chapter->id, $chapter_ids[$top_comic->id])) {
                                                    echo '';
                                                } else {
                                                    echo 'style="color: #000"';
                                                }
                                            ?> 
                                            data-comic-id="{{$top_comic->id}}" data-chapter-id="{{ $top_comic->chapters->count() != 0 ? $top_comic->last_chapter->id : ''}}" data-chapter-link="{{ $top_comic->chapters->count() != 0 ? route('chapter', [$top_comic->slug, $top_comic->last_chapter->number, $top_comic->id]) : ''}}" title="{{isset($top_comic->chapter) ? 'Chapter ' . $top_comic->chapter->number : ''}}">
                                            {{isset($top_comic->chapter) ? 'Chapter ' . $top_comic->last_chapter->number : 'No chapter'}}
                                        </a>
                                        <span class="view pull-right">
                                            {{$top_comic->ranks_count}}
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="topWeek">
                    </div>
                    <div id="topDay">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>