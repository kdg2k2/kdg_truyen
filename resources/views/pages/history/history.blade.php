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
                            </div>
                            <div class="card-body bg-dark">
                                <div class="row">
                                    @if (count($lichsu) > 0)
                                        @foreach ($lichsu as $item)
                                            @php
                                            $tap = App\Tap::findOrFail($item->id_tap);
                                            $truyen = App\Truyen::findOrFail($item->id_truyen);
                                            @endphp
                                            <div class="thumb-item-flow col-6 col-md-2" id="{{ $item->id }}">
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
                                                    <div class="action-wrapper">
                                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-id="{{ $item->id }}"
                                                            data-target="#delete-item-model">
                                                            <i class="fa fa-times mr-1"></i>Xóa
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="thumb_attr series-title">
                                                    <a href="{{ $truyen->slug }}" title="{{ $truyen->tentruyen }}">{{
                                                        $truyen->tentruyen }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    <p class="mx-auto">Chưa có lịch sử</p>
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

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var id_lichsu;
            $('#delete-item-model').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                id_lichsu = button.data('id');
            })
            $('#btn-delete-item').click(function(){
                $('#delete-item-model').modal('hide');
                $.ajax({
                    method: 'post',
                    url: '/delete_lichsu/' + id_lichsu,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                }).done(function(t){
                    t == 'ok' ? document.getElementById(id_lichsu).remove() : alertify.alert("Đã có lỗi xảy ra khi xoá lịch sử!");
                })
            })
        })
    </script>
</body>

</html>