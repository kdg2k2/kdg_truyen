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
                                            <h5>Thêm mới</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="/logged"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Quản lý người dùng</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Tài khoản</a>
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

                                                    <form action="/admin/user/store" method="post" class="post-form"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Username</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="username" required value="{{ old('username') }}">
                                                            </div>
                                                            <span class="text-danger">@error('username')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                                                            </div>
                                                            <span class="text-danger">@error('email')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" class="form-control" name="password" required value="{{ old('password') }}">
                                                            </div>
                                                            <span class="text-danger">@error('password')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Role</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-select form-control" name="role" required>
                                                                    <option value="user" selected>user</option>
                                                                    <option value="admin">admin</option>
                                                                </select>
                                                            </div>
                                                            <span class="text-danger">@error('username')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group d-flex justify-content-between">
                                                            <button class="btn btn-success waves-effect waves-light"
                                                                type="submit">Thêm mới</button>
                                                            <a class="btn btn-info waves-effect waves-light"
                                                                type="submit" href="/admin/user-manager">Danh
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