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
                                    @foreach ($truyen as $item)
                                    <div class="thumb-item-flow col-6 col-md-3">
                                        <div class="thumb-wrapper" data-id="8648" data-is-loaded="0">
                                            <a href="{{ $item->slug }}">
                                                <div class="a6-ratio">
                                                    <div class="content img-in-ratio lazyloaded" data-bg=""
                                                        style=" background-image: url('{{ $item->path }}'); "></div>
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
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/action">Action</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/adult">Adult</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/adventure">Adventure</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/anime">Anime</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/chuyen-sinh">Chuyển Sinh</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/co-dai">Cổ Đại</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/comedy">Comedy</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/comic">Comic</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/demons">Demons</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/detective">Detective</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/doujinshi">Doujinshi</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/drama">Drama</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/dam-my">Đam Mỹ</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/ecchi">Ecchi</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/fantasy">Fantasy</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/gender-bender">Gender Bender</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/harem">Harem</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/historical">Historical</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/horror">Horror</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/huyen-huyen">Huyền Huyễn</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/isekai">Isekai</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/josei">Josei</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/mafia">Mafia</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/magic">Magic</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/manhua">Manhua</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/manhwa">Manhwa</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/martial-arts">Martial Arts</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/mature">Mature</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/military">Military</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/mystery">Mystery</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/ngon-tinh">Ngôn Tình</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/one-shot">One shot</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/psychological">Psychological</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/romance">Romance</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/school-life">School Life</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/sci-fi">Sci-fi</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/seinen">Seinen</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/shoujo">Shoujo</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/shoujo-ai">Shoujo Ai</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/shounen">Shounen</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/shounen-ai">Shounen Ai</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/slice-of-life">Slice of life</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/smut">Smut</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/sports">Sports</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/supernatural">Supernatural</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/tragedy">Tragedy</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/trong-sinh">Trọng Sinh</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/truyen-mau">Truyện M�&nbsp;u</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/webtoon">Webtoon</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/xuyen-khong">Xuyên Không</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/yaoi">Yaoi</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/yuri">Yuri</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/mecha">Mecha</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/cooking">Cooking</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/trung-sinh">Trùng Sinh</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/gourmet">Gourmet</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/dark-fantasy">Dark Fantasy</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/manga">Manga</a>
                                    </li>
                                    <li class="filter-type_item col-4 text-nowrap">
                                        <a href="https://truyentranhlh.net/the-loai/isekai-1">Isekai</a>
                                    </li>
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

            //set active cho select
            $('option').each(function () {
                if ($(this).val() === sortParam) {
                    $(this).attr('selected', 'selected');
                }
            });

            //select change
            $('#list-sort').on('change', function () {
                var url = '/danh-sach?sort='+ $(this).val();
                window.location.href = url;
            });
        });
    </script>
</body>

</html>