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
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fad fa-fire-alt"></i> Truyện hot trong ngày </h3>
                    </div>
                    <div class="card-body bg-dark">
                        <div class="row owl-carousel owl-theme owl-loaded owl-drag d-none">
                            <div class="owl-stage-outer">
                                <div class="owl-stage">
                                    @foreach ($truyen_view as $item)
                                    <div class="owl-item" style="width: 225px;">
                                        <div class="popular-thumb-item col-12">
                                            <div class="thumb-wrapper">
                                                <a
                                                    href="{{ $item->slug }}">
                                                    <div class="a6-ratio">
                                                        <div class="content img-in-ratio"
                                                            style="background-image: url('{{ $item->path }}')">
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="thumb-detail">
                                                    @php
                                                        $tap = App\Tap::where('id_truyen', $item->id)->max('id');
                                                        if ($tap) {
                                                            $tentap = App\Tap::find($tap);
                                                        }
                                                    @endphp
                                                    @if ($tap)
                                                    <div class="thumb_attr chapter-title text-truncate" title="{{ $tentap->tentap }}">
                                                        <a href="{{ $item->slug }}/{{ $tentap->id }}"
                                                            title="{{ $tentap->tentap }}">{{ $tentap->tentap }}</a>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="manga-badge">
                                                    <span class="badge badge-info">
                                                        <time class="timeago" title="{{ $tentap->updated_at }}" datetime="{{ $tentap->updated }}"><time class="timeago" datetime="{{ $tentap->updated_at }}">{{ $tentap->updated_at }}</time></time>
                                                    </span>
                                                    @if ($item->view > 5)
                                                        <span class="badge badge-danger ml-1 pulse-animation">Hot</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="thumb_attr series-title">
                                                <a href="{{ $item->slug }}" title="{{$item->tentruyen}}">{{$item->tentruyen}}</a></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation"
                                    class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button"
                                    role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-sparkles"></i> Truyện mới cập nhật </h3>
                            </div>
                            <div class="card-body bg-dark">
                                {{-- <div class="text-center"><a href="/the-loai/manga?sort=update"
                                        class="btn btn-nation btn-default bg-lhmanga text-white mr-1">Truyện Nhật</a><a
                                        href="/the-loai/manhua?sort=update"
                                        class="btn btn-nation btn-default bg-lhmanga text-white mr-1">Truyện Trung</a>
                                    <a href="/the-loai/manhwa?sort=update"
                                        class="btn btn-nation btn-default bg-lhmanga text-white mr-1">Truyện Hàn</a>
                                </div> --}}
                                <div class="row">
                                    @foreach ($truyen_update as $item)
                                        <div class="thumb-item-flow col-6 col-md-3">
                                            <div class="thumb-wrapper">
                                                <a href="{{ $item->slug }}">
                                                    <div class="a6-ratio">
                                                        <div class="content img-in-ratio lazyloaded"
                                                            data-bg="{{ $item->path }}"
                                                            style="background-image: url('{{ $item->path }}')">
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="thumb-detail">
                                                    <div class="thumb_attr chapter-title text-truncate">
                                                        @php
                                                            $tap = App\Tap::where('id_truyen', $item->id)->max('id');
                                                            $tentap = App\Tap::find($tap);
                                                        @endphp
                                                        @if ($tap)
                                                            <a href="{{ $item->slug }}/{{ $tentap->id }}">
                                                                {{ $tentap->tentap }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                @if ($tap)
                                                <div class="manga-badge"><span class="badge badge-info"><time class="timeago" datetime="{{ $tentap->updated_at }}">{{ $tentap->updated_at }}</time></span></div>
                                                @endif
                                            </div>
                                            <div class="thumb_attr series-title"><a
                                                    href="{{ $item->slug }}">{{ $item->tentruyen }}</a></div>
                                        </div>
                                    @endforeach
                                    
                                    <div class="thumb-item-flow col-6 col-md-3 see-more">
                                        <div class="thumb-wrapper">
                                            <div class="a6-ratio">
                                                <div class="content img-in-ratio"
                                                    style="background-image: url('{{ asset('/Main_template/storage/images/raw/no-cover.png') }}');">
                                                </div>
                                            </div>
                                            <a href="/danh-sach?sort=update">
                                                <div class="thumb-see-more">
                                                    <div class="see-more-inside">
                                                        <div class="see-more-content">
                                                            <div class="see-more-icon"><i
                                                                    class="fas fa-arrow-circle-right"></i></div>
                                                            <div class="see-more-text">Xem thêm</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-sparkles"></i> Truyện mới nhất </h3>
                            </div>
                            <div class="card-body bg-dark">
                                <div class="row">
                                    @foreach ($truyen_new as $item)
                                        <div class="thumb-item-flow col-6 col-md-3">
                                            <div class="thumb-wrapper">
                                                <a href="{{ $item->slug }}">
                                                    <div class="a6-ratio">
                                                        <div class="content img-in-ratio lazyloaded"
                                                            data-bg="{{ $item->path }}"
                                                            style="background-image: url('{{ $item->path }}')">
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="thumb-detail">
                                                    <div class="thumb_attr chapter-title text-truncate">
                                                        @php
                                                            $tap = App\Tap::where('id_truyen', $item->id)->max('id');
                                                            $tentap = App\Tap::find($tap);
                                                        @endphp
                                                        @if ($tap)
                                                            <a href="{{ $item->slug }}/{{ $tentap->id }}">
                                                                {{ $tentap->tentap }}
                                                            </a>
                                                        @endif    
                                                    </div>
                                                </div>
                                                @if ($tap)
                                                <div class="manga-badge"><span class="badge badge-info"><time class="timeago" datetime="{{ $tentap->created_at }}">{{ $tentap->created_at }}</time></span>
                                                    @if (now()->diffInHours($item->created_at) <= 42)
                                                        <span class="badge badge-success ml-1 pulse-animation">New</span>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                            <div class="thumb_attr series-title"><a
                                                    href="{{ $item->slug }}">{{ $item->tentruyen }}</a></div>
                                        </div>
                                    @endforeach
                                    <div class="thumb-item-flow col-6 col-md-3 see-more">
                                        <div class="thumb-wrapper">
                                            <div class="a6-ratio">
                                                <div class="content img-in-ratio"
                                                    style="background-image: url('{{ asset('/Main_template/storage/images/raw/no-cover.png') }}');">
                                                </div>
                                            </div>
                                            <a href="/danh-sach?sort=new">
                                                <div class="thumb-see-more">
                                                    <div class="see-more-inside">
                                                        <div class="see-more-content">
                                                            <div class="see-more-icon"><i
                                                                    class="fas fa-arrow-circle-right"></i></div>
                                                            <div class="see-more-text">Xem thêm</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-dark card-hidden-mb">
                            <div class="card-header">
                                <h3 class="card-title"> Mạng xã hội </h3>
                                <div class="card-tools d-block d-md-none"><button type="button" class="btn btn-tool"
                                        data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
                            </div>
                            <div class="card-body bg-dark">
                                <ul class="others-list">
                                    <li>
                                        <div class="card-body bg-dark p-0 m-0"><a href="https://discord.gg/kKZUFFZMfY"
                                                target="_blank"><img
                                                    src="https://cdn1.lhmanga.com/Store/Manga/Screenshot_65_64758170ebc3d.jpg"
                                                    width="100%"></a></div>
                                    </li>
                                    <li>
                                        <div class="card-body bg-dark p-0"><a
                                                href="https://www.facebook.com/tramchuyensinh" target="_blank"><img
                                                    src="https://cdn1.lhmanga.com/Store/Manga/Screenshot_66_64758ac6442eb.jpg"
                                                    width="100%"></a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fad fa-history"></i> Lịch sử đọc truyện </h3>
                            </div>
                            <div class="card-body bg-dark p-0 m-0">
                                <ul id="manga-history" class="others-list mx-2"></ul>
                            </div>
                        </div>
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fad fa-comments-alt"></i> Bình luận mới nhất </h3>
                            </div>
                            {{-- <div class="card-body bg-dark">
                                <div class="comment-item-at-index">
                                    <div class="comment-info">
                                        <div class="comment-top">
                                            <div class="comment-user_ava"><img
                                                    src="{{ asset('/Main_template/storage/images/raw/no-avatar.png') }}"></div><a
                                                href="/thanh-vien/11343" rel="nofollow"
                                                class="comment-user_name strong">john25</a><small
                                                class="comment-location"><time class="timeago"
                                                    title="2023-09-04 23:44:05"
                                                    datetime="2023-09-04 23:44:05">2023-09-04 23:44:05</time></small>
                                        </div>
                                        <div class="comment-content"> Có vẻ thú vị ta </div><span
                                            class="series-name text-truncate"><a
                                                href="/Main_template/truyen-tranh/co-nang-dep-trai-va-cau-be-toc-vang">Cô
                                                Nàng Đẹp Trai Và Cậu Bé Tóc Vàng</a></span>
                                    </div>
                                </div>
                                <div class="comment-item-at-index">
                                    <div class="comment-info">
                                        <div class="comment-top">
                                            <div class="comment-user_ava"><img
                                                    src="{{ asset('/Main_template/storage/images/raw/no-avatar.png') }}"></div><a
                                                href="/thanh-vien/29981" rel="nofollow"
                                                class="comment-user_name strong">Keith</a><small
                                                class="comment-location"><time class="timeago"
                                                    title="2023-09-04 23:36:38"
                                                    datetime="2023-09-04 23:36:38">2023-09-04 23:36:38</time></small>
                                        </div>
                                        <div class="comment-content"> Ơ, end rồi á? Đám cưới đâuu? </div><span
                                            class="series-name text-truncate"><a
                                                href="/Main_template/truyen-tranh/cigarette-cherry">Cigarette &amp;
                                                Cherry</a></span>
                                    </div>
                                </div>
                                <div class="comment-item-at-index">
                                    <div class="comment-info">
                                        <div class="comment-top">
                                            <div class="comment-user_ava"><img
                                                    src="/Main_template/storage/images/raw/63650820-23f2-43e8-bdf8-e506a0740359.jpg">
                                            </div><a href="/thanh-vien/18190" rel="nofollow"
                                                class="comment-user_name strong">Đinh Trí Dũng</a>
                                            <small class="comment-location"><time class="timeago"
                                                    title="2023-09-04 23:14:12"
                                                    datetime="2023-09-04 23:14:12">2023-09-04 23:14:12</time></small>
                                        </div>
                                        <div class="comment-content"> Đa hệ long </div><span
                                            class="series-name text-truncate"><a
                                                href="/Main_template/truyen-tranh/tsuki-ga-michibiku-isekai-douchuu">Tsuki
                                                ga Michibiku Isekai Douchuu</a></span>
                                    </div>
                                </div>
                                <div class="comment-item-at-index">
                                    <div class="comment-info">
                                        <div class="comment-top">
                                            <div class="comment-user_ava"><img
                                                    src="{{ asset('/Main_template/storage/images/raw/no-avatar.png') }}"></div><a
                                                href="/thanh-vien/24194" rel="nofollow"
                                                class="comment-user_name strong">Alan390</a><small
                                                class="comment-location"><time class="timeago"
                                                    title="2023-09-04 23:01:53"
                                                    datetime="2023-09-04 23:01:53">2023-09-04 23:01:53</time></small>
                                        </div>
                                        <div class="comment-content"> c25 vơn lại thêm 1 con mắm nữ thần hentai...
                                        </div><span class="series-name text-truncate"><a
                                                href="/Main_template/truyen-tranh/thuan-thu-su-o-di-gioi">Thuần Thú Sư Ở
                                                Dị Giới</a></span>
                                    </div>
                                </div>
                                <div class="comment-item-at-index">
                                    <div class="comment-info">
                                        <div class="comment-top">
                                            <div class="comment-user_ava"><img
                                                    src="/Main_template/storage/images/raw/61f29f34-318e-474e-8423-db66e110382d.jpg">
                                            </div><a href="/thanh-vien/31357" rel="nofollow"
                                                class="comment-user_name strong">Kasumi-chan</a>
                                            <small class="comment-location"><time class="timeago"
                                                    title="2023-09-04 22:56:27"
                                                    datetime="2023-09-04 22:56:27">2023-09-04 22:56:27</time></small>
                                        </div>
                                        <div class="comment-content"> Ra mắt nhà chồng 🐧🐧🐧🐧 </div><span
                                            class="series-name text-truncate"><a
                                                href="/Main_template/truyen-tranh/hiep-sy-cong-chua-la-nang-dau-toc-man-di">Hiệp
                                                sỹ công chúa là nàng dâu tộc Man Di</a></span>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('partials/footer')
</body>

</html>