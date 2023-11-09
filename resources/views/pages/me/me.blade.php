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
                        <li class="active"><a href="#">Tài khoản</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-dark">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3"><i class="fas fa-history"></i> Tài khoản</h3>
                            </div>
                            <div class="card-body bg-dark">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif

                                <form action="/me" method="post" class="post-form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="username" required
                                                value="{{ $user->username }}">
                                        </div>
                                        <span class="text-danger">@error('username')
                                            {{ $message }}
                                            @enderror</span>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" required
                                                value="{{ $user->email }}">
                                        </div>
                                        <span class="text-danger">@error('email')
                                            {{ $message }}
                                            @enderror</span>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Nhập mật khẩu nếu cần đổi">
                                        </div>
                                        <span class="text-danger">@error('password')
                                            {{ $message }}
                                            @enderror</span>
                                    </div>

                                    <div class="form-group d-flex justify-content-between">
                                        <button class="btn btn-success waves-effect waves-light" type="submit">Cập
                                            nhật</button>
                                    </div>
                                </form>
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