<!DOCTYPE html>
<html>

<head>
    @include('partials/head')

    <style>
        .alertify-notifier.ajs-bottom {
            bottom: 50px !important;
        }
    </style>
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
                                                                style="background-image: url('{{ asset($truyen->path) }}')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-flex flex-md-row flex-column justify-content-between my-2">
                                                        @php
                                                        $arr_tap = App\Tap::where('id_truyen',
                                                        $truyen->id)->pluck('id')->toArray();
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
                                                                href="/{{ $truyen->slug }}">
                                                                {{$truyen->tentruyen}}</a></span></div>
                                                    <div class="series-information">
                                                        <div class="info-item"><span class="info-name">Tên
                                                                khác:</span><span class="info-value ">{{
                                                                $truyen->tenkhac }}</span></div>
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
                                                                <a href="#">{{$item->tacgia->tentacgia}}</a>
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
                                                                <div class="w-25 feature-item">
                                                                    <a id="like"
                                                                        class="side-feature-button button-like like">
                                                                        <span class="d-block feature-value">
                                                                            @php
                                                                            if(Session::has('loginId')){
                                                                            $like = App\Like::where('id_truyen',
                                                                            $truyen->id)->where('id_user',
                                                                            Session::get('loginId'))->first();
                                                                            }
                                                                            @endphp
                                                                            <i class="
                                                                            @if(isset($like))
                                                                                fas
                                                                            @else
                                                                                far
                                                                            @endif
                                                                            fa-thumbs-up"></i>
                                                                        </span>
                                                                        <span class="block feature-name">{{
                                                                            count(App\Like::where('id_truyen',
                                                                            $truyen->id)->get()) }}</span>
                                                                    </a>
                                                                </div>
                                                                <div class="w-25 feature-item">
                                                                    <a id="dislike"
                                                                        class="side-feature-button button-like">
                                                                        <span class="d-block feature-value">
                                                                            @php
                                                                            if(Session::has('loginId')){
                                                                            $dis = App\Dislike::where('id_truyen',
                                                                            $truyen->id)->where('id_user',
                                                                            Session::get('loginId'))->first();
                                                                            }
                                                                            @endphp
                                                                            <i class="
                                                                            @if(isset($dis))
                                                                                fas
                                                                            @else
                                                                                far
                                                                            @endif
                                                                            fa-thumbs-down"></i>
                                                                        </span>
                                                                        <span class="block feature-name">{{
                                                                            count(App\Dislike::where('id_truyen',
                                                                            $truyen->id)->get()) }}</span>
                                                                    </a>
                                                                </div>
                                                                <div class="w-25 feature-item">
                                                                    <a id="collect"
                                                                        class="side-feature-button button-follow follow">
                                                                        <span class="d-block feature-value">
                                                                            @php
                                                                            if(Session::has('loginId')){
                                                                            $c = App\Theodoi::where('id_truyen',
                                                                            $truyen->id)->where('id_user',
                                                                            Session::get('loginId'))->first();
                                                                            }
                                                                            @endphp
                                                                            <i class="
                                                                            @if(isset($c))
                                                                                fas
                                                                            @else
                                                                                far
                                                                            @endif
                                                                            fa-heart"></i>
                                                                        </span>
                                                                        <span class="block feature-name">{{
                                                                            count(App\Theodoi::where('id_truyen',
                                                                            $truyen->id)->get()) }}</span>
                                                                    </a>
                                                                </div>
                                                                <div class="w-25 feature-item">
                                                                    <label for="open-sharing"
                                                                        class="side-feature-button">
                                                                        <span class="d-block feature-value">
                                                                            <i class="fas fa-share-alt"></i>
                                                                        </span>
                                                                        <span class="d-block feature-name">
                                                                            <span class="d-none d-md-block">Chia
                                                                                sẻ</span>
                                                                            <span class="d-block d-md-none">Share</span>
                                                                        </span>
                                                                    </label>
                                                                    <input type="checkbox" id="open-sharing">
                                                                    <div class="sharing-box">
                                                                        <a class="sharing-item" id="fb_share" href>
                                                                            <i class="fab fa-facebook-f"></i>
                                                                        </a>
                                                                        <a class="sharing-item" id="tw_share" href>
                                                                            <i class="fab fa-twitter"></i>
                                                                        </a>
                                                                    </div>
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
                                                            @php
                                                            $updated_at = App\Tap::where('id_truyen',
                                                            $truyen->id)->max('updated_at');
                                                            @endphp
                                                            <div class="statistic-name">Lần cuối</div>
                                                            <div class="statistic-value"><time class="timeago"
                                                                    title="{{ $updated_at }}"
                                                                    datetime="{{ $updated_at }}">{{
                                                                    $updated_at }}
                                                                </time></div>
                                                        </div>
                                                        <div class="col-4 statistic-item">
                                                            <div class="statistic-name">Số chương</div>
                                                            <div class="statistic-value">{{ count($arr_tap) }}</div>
                                                        </div>
                                                        <div class="col-4 statistic-item">
                                                            <div class="statistic-name">Lượt xem</div>
                                                            <div class="statistic-value">{{ $truyen->view }}</div>
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
                                    @if ($loop->index < 4) @php $t=App\Truyen::find($item); @endphp @if ($t && $t->id !=
                                        $truyen->id)
                                        <li>
                                            <div class="others-img no-padding">
                                                <div class="a6-ratio">
                                                    <div class="content img-in-ratio"
                                                        style="background-image: url('{{ $t->path }}')">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="others-info">
                                                <h5 class="others-name"><a href="/{{ $t->slug }}">{{ $t->tentruyen
                                                        }}</a></h5><small class="series-summary"
                                                    style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{
                                                    $t->mota }}</small>
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
                                    <a href="/{{ $truyen->slug }}/{{ $item->id }}" title="{{ $item->tentap }}">
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
                            <div class="card-body bg-dark">
                                <div class="ln-comment-body">
                                    <div id="ln-comment-submit" class="ln-comment-form clear">
                                        <textarea id="cmt_txt" style="max-height: 300px; background-color: #353535;
                                        border: 1px solid #2d2d2d; color:#fafafa"></textarea>
                                        <div class="comment_toolkit clear">
                                            <input type="button" value="Đăng bình luận" id="cmt_btn">
                                        </div>
                                    </div>
                                </div>
                                @php
                                $comments = App\Binhluan::where('id_truyen', $truyen->id)->orderByDesc('id')->get();
                                @endphp
                                <div class="ln-comment-group" id="cmt_container">
                                    @if (count($comments) > 0)
                                        @foreach ($comments as $item)
                                        <div class="ln-comment-group" id="{{ $item->id }}">
                                            <div class="ln-comment-item clear">
                                                <div class="ln-comment-user_ava">
                                                    @if ($item->user->path)
                                                    <img src="{{ asset($item->user->path) }}">
                                                    @else
                                                    <img src="{{ asset('/img/no-avatar.png') }}">
                                                    @endif
                                                </div>
                                                <div class="ln-comment-info">
                                                    <div class="ln-comment-wrapper">
                                                        <div class="ln-comment-user_name"><a href="#" class="strong">{{
                                                                $item->user->username }}</a>
                                                        </div>
                                                        <div class="ln-comment-content long-text" style="max-height: 100%;">
                                                            <p>{{ $item->noidung }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="visible-toolkit">
                                                        <span class="ln-comment-time">
                                                            <time title="{{ $item->created_at }}"
                                                                datetime="{{ $item->created_at }}" class="timeago">{{
                                                                $item->created_at }}</time>
                                                        </span>
                                                    </div>
                                                </div>
                                                @if (Session::has('loginId'))
                                                    @if ($item->id_user == Session::get('loginId') ||
                                                    App\User::findOrFail(Session::get('loginId'))->role == 'admin')
                                                    <div class="ln-comment-menu none-m">
                                                        <div class="ln-comment-toolkit-item"><i class="fad fa-trash"
                                                                data-toggle="modal" data-id="{{ $item->id }}"
                                                                data-target="#delete-item-model"></i></div>
                                                    </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="modal fade" id="delete-item-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Xác nhận xóa hay không?</p>
                </div>
                <div class="modal-footer">
                    <button id="btn-delete-item" type="button" class="btn btn-danger">Xoá bỏ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>

    @include('partials/footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var loginId = "{{ $loginId }}";
            var id_truyen = "{{ $truyen->id }}";
            var current_url = window.location.href;
            var org_url = window.location.origin;

            $('#collect').click(function () {
                if (loginId != "") {
                    $.ajax({
                        method: 'post',
                        url: '/post_theodoi/' + loginId + '/' + id_truyen,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    }).done(function (t) {
                        var e = $("#collect");
                        "insert" == t.status ? alertify.alert("Bạn đã theo dõi truyện.") : alertify.alert("Bạn đã ngừng theo dõi truyện.")
                        e.find("i").toggleClass("far fas")
                        e.find(".feature-name").text(t.count)
                    })
                } else {
                    alertify.alert("Bạn phải đăng nhập để thao tác!");
                }
            });

            function checkLike() {
                var likeIcon = $('#like').find('i');
                var dislikeIcon = $('#dislike').find('i');

                if (likeIcon.hasClass('fas')) {
                    $('#dislike').attr('disabled', true);
                } else if (dislikeIcon.hasClass('fas')) {
                    $('#like').attr('disabled', true);
                } else {
                    $('#like').attr('disabled', false);
                    $('#dislike').attr('disabled', false);
                }
            }
            checkLike();

            $('#like').click(function () {
                if (loginId != "") {
                    $.ajax({
                        method: 'post',
                        url: '/post_like/' + loginId + '/' + id_truyen,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    }).done(function (t) {
                        var e = $("#like");
                        "insert" == t.status ? alertify.alert("Bạn đã like truyện.") : alertify.alert("Bạn đã huỷ like truyện.")
                        e.find("i").toggleClass("far fas")
                        e.find(".feature-name").text(t.count)
                        checkLike();
                    })
                } else {
                    alertify.alert("Bạn phải đăng nhập để thao tác!");
                }
            });

            $('#dislike').click(function () {
                if (loginId != "") {
                    $.ajax({
                        method: 'post',
                        url: '/post_dislike/' + loginId + '/' + id_truyen,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    }).done(function (t) {
                        var e = $("#dislike");
                        "insert" == t.status ? alertify.alert("Bạn đã dislike truyện.") : alertify.alert("Bạn đã huỷ dislike truyện.")
                        e.find("i").toggleClass("far fas")
                        e.find(".feature-name").text(t.count)
                        checkLike();
                    })
                } else {
                    alertify.alert("Bạn phải đăng nhập để thao tác!");
                }
            });

            $('#fb_share').click(function(){
                window.open('https://www.facebook.com/sharer/sharer.php?u='+current_url, 'facebook-share-dialog', "width=626, height=436");
            })

            $('#tw_share').click(function(){
                window.open("https://twitter.com/intent/tweet?url=" + current_url, 'facebook-share-dialog', "width=626, height=436");
            })

            $('#cmt_btn').click(function(){
                var txt = $('#cmt_txt').val();
                if (loginId != "") {
                    if (txt.length > 0) {
                        $.ajax({
                            method: 'post',
                            url: '/post_comment/' + loginId + '/' + id_truyen + '/' + txt,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        }).done(function (t) {
                            $('#cmt_txt').val('');
                            var e = $("#cmt_container");
                            var formattedTime = moment(t.binhluan.created_at).fromNow();
                            var z = `
                            <div class="ln-comment-group" id="${t.binhluan.id}">
                                <div class="ln-comment-item clear">
                                    <div class="ln-comment-user_ava">
                                        <img src="${t.binhluan.path != null ? org_url+'/'+t.binhluan.path : org_url+'/img/no-avatar.png'}">
                                    </div>
                                    <div class="ln-comment-info">
                                        <div class="ln-comment-wrapper">
                                            <div class="ln-comment-user_name"><a href="#"
                                                    class="strong">${t.binhluan.username}</a>
                                            </div>
                                            <div class="ln-comment-content long-text" style="max-height: 100%;">
                                                <p>${t.binhluan.noidung}</p>
                                            </div>
                                        </div>
                                        <div class="visible-toolkit">
                                            <span class="ln-comment-time">
                                                <time title="${t.binhluan.created_at}" datetime="${t.binhluan.created_at}"
                                                    class="timeago">${formattedTime}</time>
                                            </span>
                                        </div>
                                        <div class="ln-comment-menu none-m">
                                            <div class="ln-comment-toolkit-item"><i class="fad fa-trash" data-toggle="modal" data-id="${t.binhluan.id}"
                                                        data-target="#delete-item-model"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                            "insert" === t.status ? e.prepend(z) : alertify.alert("Đã có lỗi xảy ra khi bình luận!");
                        })
                    }else{
                        alertify.alert("Bạn chưa nhập nội dung!");
                    }
                } else {
                    alertify.alert("Bạn phải đăng nhập để thao tác!");
                }
            })

            var id_cmt;
            $('#delete-item-model').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                id_cmt = button.data('id');
            })
            $('#btn-delete-item').click(function(){
                if (id_cmt != undefined) {
                    $('#delete-item-model').modal('hide');
                    $.ajax({
                        method: 'post',
                        url: '/delete_comment/' + id_cmt,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    }).done(function(t){
                        t == 'ok' ? document.getElementById(id_cmt).remove() : alertify.alert("Đã có lỗi xảy ra khi xoá bình luận!");
                    })
                }
            })
        })
    </script>
</body>

</html>