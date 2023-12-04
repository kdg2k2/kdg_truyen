<!DOCTYPE html>
<html lang="en">

<head>
    @include('pages.admin.partials.head')
</head>

<body>
    @include('pages.admin.partials.loader')

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('pages.admin.partials.header')
            @include('pages.admin.partials.sidebar')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <div class="pcoded-content">

                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-server bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Quản lý báo cáo lỗi</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="/logged"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Truyện tranh</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Báo cáo lỗi</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">

                                        <div class="card">

                                            @if ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <p>{{ $message }}</p>
                                            </div>
                                            @endif

                                            <div class="card-block">
                                                <table class="table display data-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Url</th>
                                                            <th>Mô tả</th>
                                                            <th class="col-1"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($report as $item)
                                                        <tr>
                                                            <td><a target="_blank" class="{{ $item->status == 0 ? 'text-danger' : '' }}" href="{{ $item->url }}">{{ $item->url }}</a></td>
                                                            <td  class="{{ $item->status == 0 ? 'text-danger' : '' }}">{{ $item->des }}</td>
                                                            <td>
                                                                <a href="#!" data-toggle="modal"
                                                                    data-id="{{ $item->id }}"
                                                                    data-target="#delete-item-model"
                                                                    class="btn btn-danger btn-sm {{ $item->status == 1 ? 'disabled' : '' }}">Hoàn thành</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="delete-item-model" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Xác nhận đã sửa lỗi?</p>
                                </div>
                                <div class="modal-footer">
                                    <button id="btn-delete-item" type="button" class="btn btn-danger">Đã sửa</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form name="delete-item-form" method="POST">
                        @csrf
                    </form>

                    <div id="styleSelector"></div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.admin.partials.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var id;
            var deleteForm = document.forms['delete-item-form'];

            //lấy id để xóa
            $('#delete-item-model').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                id = button.data('id');
            })

            //xóa id
            var btn_delete_item = document.getElementById('btn-delete-item')
            btn_delete_item.onclick = function () {
                deleteForm.action = "/admin/report/" + id + "/update";
                deleteForm.submit();
            }
        });
    </script>
</body>

</html>