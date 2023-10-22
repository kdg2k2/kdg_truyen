<!DOCTYPE html>
<html>

<head>
    @include('partials/head')
</head>

<body class>
    <div id="app">
        @include('partials.header')
        <main class="main-wrapper">
            <div class="btn-back-to-top"><i class="fas fa-angle-double-up"></i></div>
            <div class="container">
                <div class="row custom">
                    <ul class="breadcrumb">
                        <li class="completed">
                            <a href="/"><i class="fad fa-home"></i><span class="d-none d-md-inline-block">Trang
                                    Chủ</span></a>
                        </li>
                        <li class="active"><a href="#">Lịch sử đọc</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-dark">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><i class="fas fa-history"></i> Lịch sử đọc</h3>
                                {{-- <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item">
                                        <select id="list-sort" name="sort" class="form-control bg-dark">
                                            <option value="az">A - Z</option>
                                            <option value="za">Z - A</option>
                                            <option value="update">Mới cập nhật</option>
                                            <option value="new">Truyện mới</option>
                                            <option value="top">Xem nhiều</option>
                                        </select>
                                    </li>
                                </ul> --}}
                            </div>
                            <div class="card-body bg-dark">
                                <div class="row">
                                    @if (isset($lichsu))
                                    @foreach ($lichsu as $item)
                                    @php
                                    $tap = App\Tap::findOrFail($item->id_tap);
                                    $truyen = App\Truyen::findOrFail($item->id_truyen);
                                    @endphp
                                    <div class="thumb-item-flow col-6 col-md-2">
                                        <div class="thumb-wrapper" data-id="8648" data-is-loaded="0">
                                            <a href="{{ $truyen->slug }}">
                                                <div class="a6-ratio">
                                                    <div class="content img-in-ratio"
                                                        style="background-color: rgba(0, 0, 0, 0); background-position: 0% 0%; background-repeat: repeat; background-attachment: scroll; background-image: url({{ asset($truyen->path) }}); background-size: cover !important; background-origin: padding-box; background-clip: border-box;">
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="thumb-detail">
                                                @if ($tap)
                                                <div class="thumb_attr chapter-title text-truncate"
                                                    title="{{ $tap->tentap }}">
                                                    <a href="{{ $truyen->slug }}/{{ $tap->id }}"
                                                        title="{{ $tap->tentap }}">Đọc tiếp {{ $tap->tentap }}</a>
                                                </div>
                                                @endif
                                            </div>
                                            {{-- <div class="action-wrapper">
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fa fa-times mr-1"></i>Xóa
                                                </button>
                                            </div> --}}
                                        </div>
                                        <div class="thumb_attr series-title">
                                            <a href="{{ $truyen->slug }}" title="{{ $truyen->tentruyen }}">{{
                                                $truyen->tentruyen }}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Tình trạng</h3>
                            </div>
                            <div class="card-body bg-dark">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="dangtienhanh"
                                            name="dangtienhanh" /><label for="dangtienhanh"
                                            class="custom-control-label">Đang tiến hành</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="hoanthanh"
                                            name="hoanthanh" /><label for="hoanthanh" class="custom-control-label">Đã
                                            hoàn thành</label>
                                    </div>
                                    <button id="btn-submit-filter" type="button" class="btn btn-block btn-warning mt-3">
                                        Áp dụng
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Thể loại</h3>
                            </div>
                            <div class="card-body bg-dark">
                                <ul class="filter-type unstyled clear row">
                                    @php
                                    $theloai = App\Theloai::all();
                                    @endphp
                                    @if ($theloai)
                                    @foreach ($theloai as $item)
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="/the-loai/{{ $item->id }}" title="{{ $item->mota }}">{{
                                            $item->tentheloai }}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </main>
    </div>
    @include('partials/footer')

</body>

</html>