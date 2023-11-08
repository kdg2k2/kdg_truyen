<nav id="navbar" class="navbar navbar-dark bg-lhmanga navbar-expand shadow-sm">
    <div class="container pc-relative">
        <div id="mb-search-wrapper" class="d-none d-md-none">
            <div class="mb-search-content d-flex flex-row">
                <form class="form-inline mb-search-form flex-grow-1" method="GET" action="/tim-kiem">
                    <div class="input-group input-group-sm"><input class="form-control form-control-navbar"
                            autocomplete="off" name="q" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append"><button class="btn btn-navbar" type="submit"><i
                                    class="fas fa-search"></i></button></div>
                    </div>
                </form><button id="mb-search-close-btn" class="btn btn-navbar ml-1"><i
                        class="fas fa-times"></i></button>
            </div>
        </div><a class="navbar-brand" href="/"><img src="/Main_template/favicon.ico" width="30" height="30"
                class="d-inline-block align-top" alt>
            <p class="ml-1 d-none d-md-inline">KdgTruyen</p>
        </a>
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false"><i
                            class="far fa-books"></i><span class="d-none d-lg-inline ml-1">Thể loại</span></a>
                    <div class="dropdown-menu manga-mega-menu genres-menu w-100" style="overflow: auto;">
                        <div class="row no-gutters">
                            @php
                            $theloai = App\Theloai::all();
                            @endphp
                            @if ($theloai)
                            @foreach ($theloai as $item)
                            <div class="col-4 col-md-2"><a class="dropdown-item genres-item" title="{{ $item->mota }}"
                                    href="/the-loai/{{ $item->id }}">{{ $item->tentheloai }}</a></div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </li>
                <li class="nav-item d-inline d-lg-none">
                    {{-- <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false"><i
                            class="far fa-history"></i></a>
                    <div class="dropdown-menu w-100">
                        <a class="dropdown-item" href="/bxh"><i class="far fa-crown"></i><span
                                class="ml-1">BXH</span></a>
                            </div> --}}
                    <a class="nav-link" href="/history"><i class="fas fa-history"></i></a>
                </li>
                {{-- <li class="nav-item mr-2 d-none d-lg-inline"><a class="nav-link" href="/bxh"><i
                            class="far fa-crown"></i><span class="ml-1">BXH</span></a></li> --}}
                <li class="nav-item mr-2 d-none d-lg-inline"><a class="nav-link" href="/history"><i
                            class="fas fa-history"></i><span class="ml-1">Lịch sử</span></a></li>
            </ul>
            <ul class="navbar-nav flex-row right-nav-wrapper">
                <div class="dropdown-menu search-result">
                    <ul id="search-list" class="others-list"></ul>
                </div>
                <li class="nav-item dropdown d-lg-none d-inline-block"><a id="mb-search-icon" class="nav-link"><i
                            class="fad fa-search"></i></a></li>
                <div class="form-inline ml-3 d-none d-md-inline align-self-center position-relative">
                    <div class="input-group input-group-sm"><input id="web-search" name="q"
                            class="form-control form-control-navbar" type="search" autocomplete="off"
                            placeholder="Tìm kiếm" aria-label="Search">
                        <div class="input-group-append"><button class="btn btn-navbar" type="submit"><i
                                    class="fas fa-search"></i></button></div>
                    </div>
                </div>
                @if (Session::has('loginId'))
                @php
                    $tb = App\Thongbao::where('id_user', Session::get('loginId'))->orderByDesc('id')->get();
                    $arr_tb = App\Thongbao::where('id_user', Session::get('loginId'))->where('status', '=', 0)->pluck('id')->toArray();
                @endphp
                <li class="nav-item dropdown"><a data-toggle="dropdown" href="#"
                        aria-expanded="false" class="nav-link position-relative">
                        <i data-v-387fbf3e="" class="fad fa-globe-asia"></i>
                        @if(isset($arr_tb) && count($arr_tb) > 0)
                            <span class="notification-count" id="notification-count">{{ count($arr_tb) }}</span>
                        @endif
                        <!---->
                    </a>
                    <div class="dropdown-menu manga-mega-menu dropdown-menu-right notification-menu">
                        <span class="dropdown-header d-flex flex-row justify-content-between">
                            <span>Thông báo</span> 
                            @if (isset($arr_tb))
                                <span id="mark_read_all" onclick="readAll({{ json_encode($arr_tb) }})">
                                    Đánh dấu đã đọc tất cả
                                </span>
                            @endif
                        </span>
                        <div data-v-387fbf3e="" class="dropdown-divider"></div>
                            @if (count($tb) > 0)
                                <ul data-v-387fbf3e="" class="notification-list">
                                    @foreach ($tb as $item)
                                        <a href="/{{ $item->tap->truyen->slug }}/{{ $item->id_tap }}" id="thongbao{{ $item->id }}" onclick="updateThongBao(this)">
                                            <li data-v-387fbf3e="" class="notification-item d-flex flex-row @if($item->status == 0) bg_thongbao @endif">
                                                <div data-v-387fbf3e="" class="notification-img flex-grow-0"
                                                    style="background: url({{ asset($item->tap->truyen->path) }}) center center no-repeat;">
                                                </div>
                                                <div data-v-387fbf3e="" class="notification-right d-flex flex-grow-1 flex-column ml-1">
                                                    <p data-v-387fbf3e="" class="title">{{ $item->noidung }}</p> <time data-v-387fbf3e="" datetime="{{ $item->created_at }}"
                                                        class="timeago" title="{{ $item->created_at }}">{{ $item->created_at }}</time>
                                                </div>
                                            </li>
                                        </a>
                                    @endforeach
                                </ul>
                            @else
                            <div class="notification-item d-flex flex-row">
                                <span class="mx-auto">Chưa có thông báo</span>
                            </div>
                            @endif
                        {{-- <div class="dropdown-divider"></div> <a href="/me/notification" class="dropdown-item dropdown-footer">Xem tất cả</a> --}}
                    </div>
                </li>
                <li class="nav-item dropdown"><a data-toggle="dropdown" href="#" aria-expanded="false"
                        class="nav-link" style="padding: 0px; margin-top: 4px;">
                        <div class="d-flex">
                            <div class="d-none d-lg-inline" style="margin-top: 2px;">{{
                                App\User::findOrFail(Session::get('loginId'))->username }}</div>
                            <div class="image"><img alt="User Image" height="35" width="35"
                                    src="{{ asset('/img/user.png') }}" class="rounded-circle"
                                    style="margin-top: -2px; margin-left: 10px;"></div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg manga-mega-menu dropdown-menu-right">
                        @if (App\User::findOrFail(Session::get('loginId'))->role == 'admin')
                        <a href="/logged" class="dropdown-item"><i class="far fa-user"></i> Trang quản trị </a>
                        @endif
                        <a href="/me" class="dropdown-item"><i class="far fa-id-card"></i> Trang cá nhân </a>
                        <div class="dropdown-divider"></div><a href="/theodoi/{{ Session::get('loginId') }}" class="dropdown-item"><i
                                class="far fa-books"></i> Tủ sách </a>
                        <div class="dropdown-divider"></div><a href="/logout"
                            class="dropdown-item dropdown-footer logout-btn" style="cursor: pointer;"><i
                                class="far fa-sign-out"></i> Đăng xuất </a>
                    </div>
                </li>
                @else
                <li class="nav-item mr-2"><a class="nav-link" href="/login"><i class="far fa-sign-in"></i><span
                            class="d-none d-lg-inline ml-1">Login</span></a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>