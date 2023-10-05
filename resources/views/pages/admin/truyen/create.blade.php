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
                                            <h5>Thêm mới truyện</h5>
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

                                                    @if ($message = Session::get('fail'))
                                                    <div class="alert alert-danger">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                    @endif

                                                    <form action="/admin/truyen/store" method="post" class="post-form"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Tên truyện</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    name="tentruyen">
                                                            </div>
                                                            <span class="text-danger">@error('tentruyen')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Tác giả</label>
                                                            <div class="col-sm-10">
                                                                <select class="custom-select" id="tacgia"
                                                                    name="tacgia[]" required multiple>
                                                                    @foreach ($tacgia as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->tentacgia
                                                                        }}</option>
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
                                                                    <option value="{{ $item->id }}">{{ $item->tentheloai
                                                                        }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <span class="text-danger">@error('theloai')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row" hidden>
                                                            <label class="col-sm-2 col-form-label">Slug</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="slug">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Mô tả</label>
                                                            <div class="col-sm-10">
                                                                <textarea rows="5" cols="5" class="form-control"
                                                                    name="mota"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Ảnh đại diện</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" class="form-control input-image-show"
                                                                    name="path">
                                                            </div>
                                                            <div class="image-container mx-auto mt-2"></div>
                                                            <span class="text-danger">@error('path')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group d-flex justify-content-between">
                                                            <button class="btn btn-success waves-effect waves-light"
                                                                type="submit">Thêm mới</button>
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

                document.querySelector('.post-form').addEventListener('submit', function (e) {
                    e.preventDefault();

                    var titleInput = document.querySelector('input[name="tentruyen"]');
                    var titleValue = titleInput.value;

                    var slugInput = document.querySelector('input[name="slug"]');
                    slugInput.value = createSlug(titleValue);

                    this.submit();
                })

                function createSlug(str) {
                    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
                    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
                    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
                    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
                    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
                    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
                    str = str.replace(/đ/g, "d");
                    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
                    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
                    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
                    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
                    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
                    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
                    str = str.replace(/Đ/g, "D");
                    // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
                    str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
                    str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
                    // Remove extra spaces
                    // Bỏ các khoảng trắng liền nhau
                    str = str.replace(/ + /g, " ");
                    str = str.trim();
                    // Remove punctuations
                    // Bỏ dấu câu, kí tự đặc biệt
                    str = str.replace(
                        /!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g,
                        " "
                    );

                    // // Chuyển văn bản thành chữ thường
                    str = str.toLowerCase();

                    // // Xóa bỏ khoảng trắng
                    str = str.replace(/\s/g, '');

                    return str;
                }
            });

        </script>
</body>

</html>