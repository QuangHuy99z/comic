<?php
    use App\Models\Genres;
    $categories = Genres::latest()->limit(8)->get();
?>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 copyright" itemscope itemtype="http://schema.org/Organization">
                <a itemprop="url" href="/">
                    <img itemprop="logo" src="//st.imageinstant.net/data/logos/logo-nettruyen.png"
                        alt="NetTruyen - Truyện tranh Online" />
                </a>
                <div class="mrt10">
                    <div class="fb-page lazy-module" data-type="facebook"
                        data-href="https://www.facebook.com/nettruyen/" data-height="160" data-small-header="true"
                        data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false">
                        <blockquote cite="https://www.facebook.com/nettruyen/" class="fb-xfbml-parse-ignore"><a
                                rel="nofollow noopener" target="_blank"
                                href="https://www.facebook.com/nettruyen/">NetTruyen.com - Cộng đồng truyện
                                tranh Việt</a></blockquote>
                    </div>
                </div>
                <p>
                    Copyright © 2015 NetTruyen
                </p>
            </div>
            <div class="col-sm-8">
                <div class='Module Module-55'>
                    <div class='ModuleContent'>
                        <div class="link-footer">
                            <h4>Thể loại</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <a target="_self" href="#">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>