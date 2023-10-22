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
                <div class="row d-md-table w-md-100">
                    <div class="col-12 col-md-8 float-md-left">
                        <div class="card card-dark">
                            <div class="card-body bg-dark p-1">
                                <section class="feature-section clear">
                                    <main class="section-body">
                                        <div class="top-part">
                                            <div class="row">
                                                <div class="left-column col-12 col-md-4">
                                                    <div class="series-cover">
                                                        <div class="a6-ratio">
                                                            <div class="content img-in-ratio"
                                                                style="background-image: url('{{ $truyen->path }}')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-md-row flex-column justify-content-between my-2">
                                                        @php
                                                            $arr_tap = App\Tap::where('id_truyen', $truyen->id)->pluck('id')->toArray();
                                                        @endphp
                                                        @if ($arr_tap)
                                                            <a href="/{{ $truyen->slug }}/{{ min($arr_tap) }}"><button
                                                                class="btn btn-default btn-xs-block bg-lhmanga mb-1 mb-md-0 text-white">
                                                                Chương đầu </button></a>
                                                            <a href="/{{ $truyen->slug }}/{{ max($arr_tap) }}"><button
                                                                class="btn btn-default btn-xs-block bg-lhmanga text-white">
                                                                Chương cuối </button></a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <div class="series-name-group"><span class="series-name"><a
                                                                href="/Main_template/truyen-tranh/100-nin-no-eiyuu-o-sodateta-saikyou-yogensha-wa-boukensha-ni-natte-mo-sekaijuu-no-deshi-kara-shitawarete-masu-lhmanga">
                                                                {{$truyen->tentruyen}}</a></span></div>
                                                    <div class="series-information">
                                                        <div class="info-item"><span class="info-name">Tên
                                                                khác:</span><span class="info-value ">{{ $truyen->tenkhac }}</span></div>
                                                        <div class="info-item"><span class="info-name">Thể
                                                                loại:</span>
                                                            <span class="info-value">
                                                                @foreach ($truyen->truyen_theloai as $item)
                                                                <a href="/the-loai/{{ $item->theloai->id }}">
                                                                    <span class="badge badge-info bg-lhmanga mx-1"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title>{{$item->theloai->tentheloai}}
                                                                    </span>
                                                                </a>
                                                                @endforeach
                                                            </span>
                                                        </div>
                                                        <div class="info-item"><span class="info-name">Tác giả:</span>
                                                            <span class="info-value ">
                                                                @foreach ($truyen->truyen_tacgia as $item)
                                                                <a
                                                                    href="#">{{$item->tacgia->tentacgia}}</a>
                                                                @endforeach
                                                            </span>
                                                        </div>
                                                        <div class="info-item">
                                                            <span class="info-name">Tình trạng:</span>
                                                            <span class="info-value">
                                                                <a href="#!">
                                                                @if ($truyen->status == 1)
                                                                    Hoàn thành
                                                                @else
                                                                    Đang tiến hành
                                                                @endif</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 bottom-features">
                                                        <div class="side-features">
                                                            <div class="row">
                                                                <div class="w-20 feature-item"><a id="like"
                                                                        class="side-feature-button button-like like"><span
                                                                            class="d-block feature-value"><i
                                                                                class="far fa-thumbs-up"></i></span><span
                                                                            class="block feature-name">140</span></a>
                                                                </div>
                                                                <div class="w-20 feature-item"><a id="dislike"
                                                                        class="side-feature-button button-like"><span
                                                                            class="d-block feature-value"><i
                                                                                class="far fa-thumbs-down"></i></span><span
                                                                            class="block feature-name">0</span></a>
                                                                </div>
                                                                <div class="w-20 feature-item"><a id="collect"
                                                                        class="side-feature-button button-follow follow"><span
                                                                            class="d-block feature-value"><i
                                                                                class="far fa-heart"></i></span><span
                                                                            class="block feature-name">802</span></a>
                                                                </div>
                                                                <div class="w-20 feature-item">
                                                                    <div class="series-rating rated"><label
                                                                            for="open-rating"
                                                                            class="side-feature-button button-rate"><span
                                                                                class="d-block feature-value"><i
                                                                                    class="far fa-star"></i></span><span
                                                                                class="d-block feature-name"><span
                                                                                    class="d-none d-md-block">Đánh
                                                                                    giá</span><span
                                                                                    class="d-block d-md-none">5/5</span></span></label>
                                                                        <input type="checkbox" id="open-rating">
                                                                        <div class="series-evaluation clear"><span
                                                                                class="star-evaluate-item star-5"
                                                                                data-value="5"><i
                                                                                    class="fas fa-star"></i></span><span
                                                                                class="star-evaluate-item star-4"
                                                                                data-value="4"><i
                                                                                    class="fas fa-star"></i></span>
                                                                            <span class="star-evaluate-item star-3"
                                                                                data-value="3"><i
                                                                                    class="fas fa-star"></i></span><span
                                                                                class="star-evaluate-item star-2"
                                                                                data-value="2"><i
                                                                                    class="fas fa-star"></i></span><span
                                                                                class="star-evaluate-item star-1"
                                                                                data-value="1"><i
                                                                                    class="fas fa-star"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="w-20 feature-item"><label for="open-sharing"
                                                                        class="side-feature-button"><span
                                                                            class="d-block feature-value"><i
                                                                                class="fas fa-share-alt"></i></span><span
                                                                            class="d-block feature-name"><span
                                                                                class="d-none d-md-block">Chia
                                                                                sẻ</span><span
                                                                                class="d-block d-md-none">Share</span></span></label>
                                                                    <input type="checkbox" id="open-sharing">
                                                                    <div class="sharing-box"><a class="sharing-item"
                                                                            href><i class="fab fa-facebook-f"></i></a><a
                                                                            class="sharing-item" href><i
                                                                                class="fab fa-twitter"></i></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bottom-part">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row statistic-list">
                                                        <div class="col-4 statistic-item block-wide at-mobile">
                                                            <div class="statistic-name">Lần cuối</div>
                                                            <div class="statistic-value"><time class="timeago"
                                                                    title="{{ $truyen->updated_at }}"
                                                                    datetime="{{ $truyen->updated_at }}">{{ $truyen->updated_at }}
                                                                </time></div>
                                                        </div>
                                                        <div class="col-4 statistic-item">
                                                            <div class="statistic-name">27 đánh giá </div>
                                                            <div class="statistic-value">5 <small>/5</small></div>
                                                        </div>
                                                        <div class="col-4 statistic-item">
                                                            <div class="statistic-name">Lượt xem</div>
                                                            <div class="statistic-value">206242</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="summary-wrapper col-12">
                                                    <div class="series-summary">
                                                        <h4>Tóm tắt</h4>
                                                        <div class="summary-content">
                                                            <p>{{$truyen->mota}}</p>
                                                        </div>
                                                        <div class="summary-more d-none more-state">
                                                            <div class="see_more">Xem thêm</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </main>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 float-md-right">
                        {{-- <div class="card card-dark">
                            <div class="card-body bg-dark series-users p-0 m-0">
                                <div class="series-owner group-mem"><img width="50px" height="50px"
                                        src="/Main_template/storage/images/raw/bc86a987-8a48-4a2a-bde0-07a06968678c.jpg">
                                    <div class="series-owner-title"><span class="series-owner_name"><a
                                                href="/Main_template/thanh-vien/17765">Ngô Quang
                                                Khánh</a></span></div>
                                </div>
                                <div class="fantrans-section">
                                    <div class="fantrans-name">Nhóm dịch</div>
                                    <div class="fantrans-value"><a href="/Main_template/nhom-dich/lhmanga">LHMANGA</a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card card-dark card-hidden-mb">
                            <div class="card-header">
                                <h3 class="card-title">Truyện cùng tác giả</h3>
                                <div class="card-tools d-block d-md-none"><button type="button" class="btn btn-tool"
                                        data-card-widget="collapse"><i class="fas fa-plus"></i></button></div>
                            </div>
                            <div class="card-body bg-dark">
                                <ul class="others-list">
                                    @foreach ($truyen_same_tacgia as $item)
                                        @if ($loop->index < 4)
                                            @php
                                                $truyen = App\Truyen::find($item);
                                            @endphp
                                            @if ($truyen)
                                                <li>
                                                    <div class="others-img no-padding">
                                                        <div class="a6-ratio">
                                                            <div class="content img-in-ratio"
                                                                style="background-image: url('{{ $truyen->path }}')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="others-info">
                                                        <h5 class="others-name"><a
                                                                href="/{{ $truyen->slug }}">{{ $truyen->tentruyen }}</a></h5><small class="series-summary" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $truyen->mota }}</small>
                                                    </div>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
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
                    </div>
                    <div class="col-12 col-md-8 float-md-left">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title"> Danh sách chương ({{ count($truyen->tap) }}) </h3>
                                <div class="card-tools d-block d-md-none"><button type="button" class="btn btn-tool"
                                        data-card-widget="collapse"><i class="fas fa-minus"></i></button></div>
                            </div>
                            <div class="card-body bg-dark">
                                <ul class="list-chapters at-series">
                                    @foreach ($truyen->tap as $item)
                                    <a href="/{{ $truyen->slug }}/{{ $item->id }}"
                                    title="{{ $item->tentap }}">
                                    <li>
                                        <div class="chapter-name text-truncate"> {{ $item->tentap }} </div>
                                        <div class="chapter-time">{{ $item->updated_at }}</div>
                                    </li>
                                </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title"> Bình luận </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('partials/footer')
</body>

</html>