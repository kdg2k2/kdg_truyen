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
                                    <div class="col-4 col-md-2"><a class="dropdown-item genres-item" title="{{ $item->mota }}" href="/the-loai/action">{{ $item->tentheloai }}</a></div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </li>
                <li class="nav-item d-inline d-lg-none"><a class="nav-link" data-toggle="dropdown" href="#"
                        aria-expanded="false"><i class="far fa-stream"></i></a>
                    <div class="dropdown-menu w-100"><a class="dropdown-item" href="/bxh"><i
                                class="far fa-crown"></i><span class="ml-1">BXH</span></a><a class="dropdown-item"
                            href="/history"><i class="fas fa-history"></i><span class="ml-1">Lịch sử đọc
                                truyện</span></a></div>
                </li>
                <li class="nav-item mr-2 d-none d-lg-inline"><a class="nav-link" href="/bxh"><i
                            class="far fa-crown"></i><span class="ml-1">BXH</span></a></li>
                <li class="nav-item mr-2 d-none d-lg-inline"><a class="nav-link" href="/history"><i
                            class="fas fa-history"></i><span class="ml-1">Lịch sử</span></a></li>
            </ul>
            <ul class="navbar-nav flex-row right-nav-wrapper">
                <div class="dropdown-menu search-result">
                    <ul id="search-list" class="others-list"></ul>
                </div>
                <li class="nav-item dropdown d-lg-none d-inline-block"><a id="mb-search-icon" class="nav-link"><i
                            class="fad fa-search"></i></a></li>
                <form class="form-inline ml-3 d-none d-md-inline align-self-center position-relative" method="GET"
                    action="/tim-kiem">
                    <div class="input-group input-group-sm"><input id="web-search" name="q"
                            class="form-control form-control-navbar" type="search" autocomplete="off"
                            placeholder="Tìm kiếm" aria-label="Search">
                        <div class="input-group-append"><button class="btn btn-navbar" type="submit"><i
                                    class="fas fa-search"></i></button></div>
                    </div>
                </form>
                <li class="nav-item mr-2"><a class="nav-link" href="/login"><i class="far fa-sign-in"></i><span
                            class="d-none d-lg-inline ml-1">Login</span></a></li>
                <li class="nav-item d-none d-md-inline"><a class="nav-link" href="/register"><i
                            class="far fa-user"></i><span class="d-none d-lg-inline ml-1">Register</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>