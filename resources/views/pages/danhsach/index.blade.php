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
                        <li class="active"><a href="#">Danh sách truyện</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-dark">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">Danh sách truyện</h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item">
                                        <select id="list-sort" name="sort" class="form-control bg-dark">
                                            <option value="az">A - Z</option>
                                            <option value="za">Z - A</option>
                                            <option value="update">Mới cập nhật</option>
                                            <option value="new">Truyện mới</option>
                                            <option value="top">Xem nhiều</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body bg-dark">
                                <div class="row">
                                    @if (isset($truyen))
                                        @foreach ($truyen as $item)
                                        <div class="thumb-item-flow col-6 col-md-3">
                                            <div class="thumb-wrapper" data-id="8648" data-is-loaded="0">
                                                <a href="{{ $item->slug }}">
                                                    <div class="a6-ratio">
                                                        <div class="content img-in-ratio lazyloaded" data-bg=""
                                                            style=" background-image: url('{{ asset($item->path) }}'); "></div>
                                                    </div>
                                                </a>
                                                @php
                                                $tap = App\Tap::where('id_truyen', $item->id)->max('id');
                                                $tentap = App\Tap::find($tap);
                                                @endphp
                                                <div class="thumb-detail">
                                                    @if ($tap)
                                                    <div class="thumb_attr chapter-title text-truncate"
                                                        title="{{ $tentap->tentap }}">
                                                        <a href="{{ $item->slug }}/{{ $tentap->id }}"
                                                            title="{{ $tentap->tentap }}">{{ $tentap->tentap }}</a>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="manga-badge">
                                                    @if ($tap)
                                                    <span class="badge badge-info"><time class="timeago"
                                                            title="{{ $tentap->updated_at }}"
                                                            datetime="{{ $tentap->updated_at }}">
                                                            ...
                                                        </time>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="thumb_attr series-title">
                                                <a href="{{ $item->slug }}" title="{{ $item->tentruyen }}">{{
                                                    $item->tentruyen }}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif

                                    @if (isset($arr_truyen))
                                        @foreach ($arr_truyen as $truyen)
                                            @php
                                                $item = App\Truyen::findOrFail($truyen);
                                            @endphp
                                            <div class="thumb-item-flow col-6 col-md-3">
                                                <div class="thumb-wrapper" data-id="8648" data-is-loaded="0">
                                                    <a href="{{ $item->slug }}">
                                                        <div class="a6-ratio">
                                                            <div class="content img-in-ratio lazyloaded" data-bg=""
                                                                style=" background-image: url('{{ asset($item->path) }}'); "></div>
                                                        </div>
                                                    </a>
                                                    @php
                                                    $tap = App\Tap::where('id_truyen', $item->id)->max('id');
                                                    $tentap = App\Tap::find($tap);
                                                    @endphp
                                                    <div class="thumb-detail">
                                                        @if ($tap)
                                                        <div class="thumb_attr chapter-title text-truncate"
                                                            title="{{ $tentap->tentap }}">
                                                            <a href="{{ $item->slug }}/{{ $tentap->id }}"
                                                                title="{{ $tentap->tentap }}">{{ $tentap->tentap }}</a>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="manga-badge">
                                                        @if ($tap)
                                                        <span class="badge badge-info"><time class="timeago"
                                                                title="{{ $tentap->updated_at }}"
                                                                datetime="{{ $tentap->updated_at }}">
                                                                ...
                                                            </time>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="thumb_attr series-title">
                                                    <a href="{{ $item->slug }}" title="{{ $item->tentruyen }}">{{
                                                        $item->tentruyen }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="pagination_wrap">
                                    <a href="https://truyentranhlh.net/danh-sach?sort=update&amp;page=1"
                                        class="paging_item paging_prevnext prev disabled">Đầu</a><a
                                        href="https://truyentranhlh.net/danh-sach?sort=update&amp;page=1"
                                        class="paging_item page_num current">1</a><a
                                        href="https://truyentranhlh.net/danh-sach?sort=update&amp;page=2"
                                        class="paging_item page_num">2</a><a
                                        href="https://truyentranhlh.net/danh-sach?sort=update&amp;page=3"
                                        class="paging_item page_num">3</a><a class="paging_item">...</a><a
                                        href="https://truyentranhlh.net/danh-sach?sort=update&amp;page=319"
                                        class="paging_item paging_prevnext next">Cuối</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                                                <a href="/the-loai/{{ $item->id }}" title="{{ $item->mota }}">{{ $item->tentheloai }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('partials/footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var hoanthanh = document.getElementById('hoanthanh');
            var dangtienhanh = document.getElementById('dangtienhanh');
            const urlParams = new URLSearchParams(window.location.search);
            const sortParam = urlParams.get('sort');
            const hoanthanhParam = urlParams.get('hoanthanh');
            const dangtienhanhParam = urlParams.get('dangtienhanh');

            //set checked theo url
            if (hoanthanhParam) {
                hoanthanh.checked = true;
            }
            if (dangtienhanhParam) {
                dangtienhanh.checked = true;
            }

            //không cho check cả 2 checkbox
            hoanthanh.addEventListener('change', function () {
                if (this.checked) {
                    dangtienhanh.checked = false;
                }
            });
            dangtienhanh.addEventListener('change', function () {
                if (this.checked) {
                    hoanthanh.checked = false;
                }
            });

            //submit button
            $('#btn-submit-filter').on('click', function () {
                var url = new URLSearchParams();
                if (hoanthanh.checked) {
                    url.set('hoanthanh', 1);
                }
                if (dangtienhanh.checked) {
                    url.set('dangtienhanh', 1);
                }
                window.location.href = '?' + url.toString();
            })

            //set active cho select
            $('option').each(function () {
                if ($(this).val() === sortParam) {
                    $(this).attr('selected', 'selected');
                }
            });

            //select change
            $('#list-sort').on('change', function () {
                window.location.href = '?sort=' + $(this).val();
            });
        });
    </script>
</body>

</html>