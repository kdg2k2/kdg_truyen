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
                                            <h5>Cập nhật thông tin truyện</h5>
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
                                            <li class="breadcrumb-item"><a href="#!">Truyện</a>
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

                                                    @if ($message = Session::get('success'))
                                                    <div class="alert alert-success">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                    @endif

                                                    <form action="/admin/truyen/{{ $truyen->id }}/update" method="post"
                                                        class="post-form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Tên truyện</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="tentruyen" required 
                                                                    value="{{ $truyen->tentruyen }}">
                                                            </div>
                                                            <span class="text-danger">@error('tentruyen')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Tên khác</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    name="tenkhac" value="{{ $truyen->tenkhac }}">
                                                            </div>
                                                            <span class="text-danger">@error('tenkhac')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Tác giả</label>
                                                            <div class="col-sm-10">
                                                                <select class="custom-select" id="tacgia"
                                                                    name="tacgia[]" required multiple>
                                                                    @foreach ($tacgia as $item)
                                                                    <option value="{{ $item->id }}" {{ in_array($item->id, $arr_tacgia) ? 'selected' : '' }}>
                                                                    {{ $item->tentacgia }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <span class="text-danger">@error('tacgia')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Thể loại</label>
                                                            <div class="col-sm-10">
                                                                <select class="custom-select" id="theloai"
                                                                    name="theloai[]" required multiple>
                                                                    @foreach ($theloai as $item)
                                                                    <option value="{{ $item->id }}" {{ in_array($item->id, $arr_theloai) ? 'selected' : '' }}>
                                                                    {{ $item->tentheloai }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <span class="text-danger">@error('theloai')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Mô tả</label>
                                                            <div class="col-sm-10">
                                                                <textarea rows="5" cols="5" class="form-control"
                                                                    name="mota">{{ $truyen->mota }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Trạng thái</label>
                                                            <div class="col-sm-10">
                                                                <select class="custom-select" name="status" required>
                                                                    <option value="1" @if($truyen->status == 1) selected @endif>Hoàn thành</option>
                                                                    <option value="0" @if($truyen->status == 0) selected @endif>Đang tiến hành</option>
                                                                </select>
                                                            </div>
                                                            <span class="text-danger">@error('status')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Ảnh đại diện</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" class="form-control input-image-show"
                                                                    name="path">
                                                            </div>
                                                            <input type="hidden" name="hidden_image"
                                                                value="{{ $truyen->path }}">
                                                            <div class="image-container mx-auto mt-2">
                                                                <img class="image-show" src="{{ asset($truyen->path) }}"
                                                                    alt="">
                                                            </div>
                                                            <span class="text-danger">@error('path')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group d-flex justify-content-between">
                                                            <button class="btn btn-success waves-effect waves-light"
                                                                type="submit">Cập nhật</button>
                                                            <a class="btn btn-info waves-effect waves-light"
                                                                type="submit" href="/admin/truyen-manager">Danh sách</a>
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

        <script>
            $(document).ready(function () {
                $('#theloai').select2();
                $('#tacgia').select2();

                document.querySelector('.input-image-show').addEventListener('change', function () {
                    var imageContainer = document.querySelector('.image-container');
                    imageContainer.innerHTML = '';
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            var image = document.createElement('img');
                            image.classList.add('image-show');
                            image.src = e.target.result;
                            imageContainer.appendChild(image);
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            })
        </script>
</body>

</html>