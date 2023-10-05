<!DOCTYPE html>
<html lang="en">

<head>
    @include('pages.admin.partials.head')

    <style>
        .image-container img {
            width: 300px;
            max-height: 200px;
        }
    </style>
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
                                            <h5>Thêm mới thể loại</h5>
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
                                            <li class="breadcrumb-item"><a href="#!">Thể loại</a>
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
                                            <div class="card-block">
                                                <div class="card-block">

                                                    @if ($message = Session::get('fail'))
                                                    <div class="alert alert-danger">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                    @endif

                                                    <form action="/admin/theloai/store" method="post" class="post-form"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Tên thể loại</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    name="tentheloai" required>
                                                            </div>
                                                            <span class="text-danger">@error('tentheloai')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Mô tả</label>
                                                            <div class="col-sm-10">
                                                                <textarea required rows="5" cols="5"
                                                                    class="form-control" name="mota"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group d-flex justify-content-between">
                                                            <button class="btn btn-success waves-effect waves-light"
                                                                type="submit">Thêm mới</button>
                                                            <a class="btn btn-info waves-effect waves-light"
                                                                type="submit" href="/admin/theloai-manager">Danh
                                                                sách</a>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="styleSelector"></div>
                    </div>
                </div>
            </div>
        </div>

        @include('pages.admin.partials.footer')
</body>

</html>