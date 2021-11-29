<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading" style="font-size:18px">Menu</li>
                <li>
                    <a href="{{route('admin.comics.index')}}" style="font-size: 18px;">
                        <i class="metismenu-icon pe-7s-browser" style="font-size: 20px"></i>Comics
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.chapters.index')}}" style="font-size: 18px;">
                        <i class="metismenu-icon pe-7s-plugin" style="font-size: 20px"></i>Chapters
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.genres.index')}}" style="font-size: 18px;">
                        <i class="metismenu-icon pe-7s-plugin" style="font-size: 20px"></i>Genres
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.users.index')}}" style="font-size: 18px;">
                        <i class="metismenu-icon pe-7s-plugin" style="font-size: 20px"></i>Users
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>