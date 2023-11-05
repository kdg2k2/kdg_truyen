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
                        <li class="active"><a href="#">Theo dõi</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-dark">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><i class="fa fa-heart"></i> Theo dõi</h3>
                            </div>
                            <div class="card-body bg-dark">
                                <div class="row">
                                    @if (count($theodoi) > 0)
                                    <table class="table display data-table">
                                        <thead>
                                            <tr>
                                                <th>Tên truyện</th>
                                                <th class="col-3">Xem gần nhất</th>
                                                <th class="col-3">Chap mới nhất</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($theodoi as $item)
                                            <tr id="{{ $item->id }}">
                                                <td class="d-flex">
                                                    <a href="/{{ $item->truyen->slug }}">@if ($item->truyen->path)
                                                        <img style="max-height: 60px; width: 50px"
                                                            src="{{ asset($item->truyen->path) }}">
                                                        @else
                                                        <img style="max-height: 60px; width: 50px"
                                                            src="{{ asset('img/null_image.png') }}">
                                                        @endif</a>
                                                    <div class="ml-3">
                                                        <a href="/{{ $item->truyen->slug }}"><p class="mb-2"><b>{{ $item->truyen->tentruyen }}</b></p></a>
                                                        <a href="#!" data-toggle="modal"
                                                        data-id="{{ $item->id }}" data-id_truyen="{{ $item->truyen->id }}"
                                                        data-target="#delete-item-model"
                                                        class="text-danger mb-0"><i class="fa fa-ban" aria-hidden="true"></i>
                                                        Bỏ theo dõi</a>
                                                    </div>
                                                </td>
                                                @php
                                                    $last = App\Lichsu::where('id_user', Session::get('loginId'))->where('id_truyen', $item->truyen->id)->first();
                                                    $new = App\Tap::where('id_truyen', $item->truyen->id)->max('id');
                                                @endphp
                                                <td>@if (isset($last))
                                                    <a href="/{{ App\Truyen::findOrFail($item->truyen->id)->slug }}/{{ $last->id_tap }}">{{ $last->tap->tentap }}</a>
                                                @endif</td>
                                                <td>@if (isset($new))
                                                    <a href="/{{ App\Truyen::findOrFail($item->truyen->id)->slug }}/{{ $new }}">{{ App\Tap::findOrFail($new)->tentap }}</a>
                                                @endif</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p class="mx-auto">Chưa theo dõi truyện nào</p>
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
                    <p>Xác nhận bỏ theo dõi?</p>
                </div>
                <div class="modal-footer">
                    <button id="btn-delete-item" type="button" class="btn btn-danger">Bỏ theo dõi</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
    
    @include('partials/footer')

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var loginId = "{{ $loginId }}";
            var id_truyen;
            var id_theodoi;
            $('#delete-item-model').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                id_theodoi = button.data('id');
                id_truyen = button.data('id_truyen');
            })
            $('#btn-delete-item').click(function(){
                if (id_theodoi != undefined) {
                    $('#delete-item-model').modal('hide');
                    $.ajax({
                        method: 'post',
                        url: '/post_theodoi/' + loginId + '/' + id_truyen,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    }).done(function(t){
                        t.status == 'delete' ? document.getElementById(id_theodoi).remove() : alertify.alert("Đã có lỗi xảy ra khi bỏ theo dõi!");
                    })
                }
            })
        })
    </script>
</body>

</html>