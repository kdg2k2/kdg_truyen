<!DOCTYPE html>
<html>

<head>
    @include('partials/head')
    <style>
        .rd_sd-button_item2 {
            display: inline-block;
            font-size: 20px;
            font-weight: 400;
            border-bottom: 1px solid #ccc;
            width: 25%;
            text-align: center;
            padding: 10px 0;
        }

        .select_2{
            border-radius: 5px;
            padding: 0;
            margin-top: 10px;
        }
    </style>
</head>

<body class>
    <div id="app">
        @include('partials.header')
        <main class="main-wrapper">
            <div class="btn-back-to-top"><i class="fas fa-angle-double-up"></i></div>
            <div class="container">
                @php
                    $arr_tap = App\Tap::where('id_truyen', $truyen->id)->pluck('id')->toArray();
                    $tap_trc = array_search($tap->id, $arr_tap) - 1;
                    $tap_sau = array_search($tap->id, $arr_tap) + 1;
                @endphp
                <section id="rd-side_icon">
                    <a class="rd_sd-button_item rd_top-left" @if($tap->id == min($arr_tap)) disabled="disabled" @endif href="@if(isset($arr_tap[$tap_trc])) /{{ $truyen->slug }}/{{ $arr_tap[$tap_trc] }} @endif"><i class="fas fa-backward"></i></a>
                    <a class="rd_sd-button_item" href="/{{ $truyen->slug }}"><i class="fas fa-home"></i></a>
                    <select class="rd_sd-button_item select_2" onchange="selectChange(this)">
                        @foreach ($arr_tap as $item)
                            <option value="{{ $item }}" @if($item == $tap->id) selected @endif>{{ App\Tap::findOrFail($item)->tentap }}</option>
                        @endforeach
                    </select>
                    {{-- <a id="rd-info_icon" data-affect="#rd_sidebar.chapters" class="rd_sd-button_item"><i class="fas fa-bars"></i></a> --}}
                    <a class="rd_sd-button_item rd_top-right" @if($tap->id == max($arr_tap)) disabled="disabled" @endif href="@if(isset($arr_tap[$tap_sau])) /{{ $truyen->slug }}/{{ $arr_tap[$tap_sau] }} @endif"><i class="fas fa-forward"></i></a>
                </section>
                <div class="row custom">
                    <ul class="breadcrumb">
                        <li class="completed"><a href="/"><i class="fad fa-home"></i><span
                                    class="d-none d-md-inline-block">Trang chủ</span></a>
                        </li>
                        <li class="d-none d-md-block"><a href="/danh-sach">Danh sách truyện</a>
                        </li>
                        <li class="d-none d-md-block"><a href="/{{ $truyen->slug }}">
                                {{ $truyen->tentruyen }}</a>
                        </li>
                        <li class="active"><a href="#">{{ $tap->tentap }}</a>
                        </li>
                    </ul>
                </div>
                <div class="text-center mb-3">
                    <error-report :manga_id="3899" :chapter_id="145271"></error-report>
                </div>
                <center>
                    <a class="rd_sd-button_item2 rd_top-left" @if($tap->id == min($arr_tap)) disabled="disabled" @endif href="@if(isset($arr_tap[$tap_trc])) /{{ $truyen->slug }}/{{ $arr_tap[$tap_trc] }} @endif"><i class="fas fa-backward"></i></a>
                    <select class="rd_sd-button_item2 select_2" onchange="selectChange(this)">
                        @foreach ($arr_tap as $item)
                            <option value="{{ $item }}" @if($item == $tap->id) selected @endif>{{ App\Tap::findOrFail($item)->tentap }}</option>
                        @endforeach
                    </select>
                    <a class="rd_sd-button_item2 rd_top-right" @if($tap->id == max($arr_tap)) disabled="disabled" @endif href="@if(isset($arr_tap[$tap_sau])) /{{ $truyen->slug }}/{{ $arr_tap[$tap_sau] }} @endif"><i class="fas fa-forward"></i></a>
                </center><br>
                <div id="chapter-content">
                    @php
                    if($tap->path != null){
                        $images = json_decode($tap->path);
                        foreach ($images as $item) {
                            $sourceImage = asset($item);
                            echo "<img class='lazy' src='$sourceImage'>";
                        }
                    }
                    @endphp
                </div>
                <center>
                    <a class="rd_sd-button_item2 rd_top-left" @if($tap->id == min($arr_tap)) disabled="disabled" @endif href="@if(isset($arr_tap[$tap_trc])) /{{ $truyen->slug }}/{{ $arr_tap[$tap_trc] }} @endif"><i class="fas fa-backward"></i></a>
                    <select class="rd_sd-button_item2 select_2" onchange="selectChange(this)">
                        @foreach ($arr_tap as $item)
                            <option value="{{ $item }}" @if($item == $tap->id) selected @endif>{{ App\Tap::findOrFail($item)->tentap }}</option>
                        @endforeach
                    </select>
                    <a class="rd_sd-button_item2 rd_top-right" @if($tap->id == max($arr_tap)) disabled="disabled" @endif href="@if(isset($arr_tap[$tap_sau])) /{{ $truyen->slug }}/{{ $arr_tap[$tap_sau] }} @endif"><i class="fas fa-forward"></i></a>
                </center><br>
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
                        @if (count($comments) > 0)
                        <div class="ln-comment-group" id="cmt_container">
                            @foreach ($comments as $item)
                            <div class="ln-comment-group" id="{{ $item->id }}">
                                <div class="ln-comment-item clear">
                                    <div class="ln-comment-user_ava"><img
                                            src="{{ asset('/img/no-avatar.png') }}"></div>
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
                        </div>
                        @endif
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

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            function selectChange(selectElement) {
                var slug = "{{ $truyen->slug }}";
                var selectedValue = selectElement.value;
                window.location.href = '/' + slug + '/' + selectedValue;
            }
        
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
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
                            var e = $("#cmt_container");
                            var formattedTime = moment(t.binhluan.created_at).fromNow();
                            var z = `
                            <div class="ln-comment-group" id="${t.binhluan.id}">
                                <div class="ln-comment-item clear">
                                    <div class="ln-comment-user_ava"><img src="{{ asset('/img/no-avatar.png') }}"></div>
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
                            "insert" == t.status ? e.prepend(z) : alertify.alert("Đã có lỗi xảy ra khi bình luận!");
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
            })
        });
    </script>
</body>

</html>