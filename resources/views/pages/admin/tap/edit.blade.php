<!DOCTYPE html>
<html lang="en">

<head>
    @include('pages.admin.partials.head')

    <style>
        .image-container img {
            width: 300px;
            max-height: 200px;
        }

        .tap-show {
            margin: 2px;
            height: 120px;
            width: 80px;
        }
    </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                                            <h5>Cập nhật</h5>
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
                                            <li class="breadcrumb-item"><a href="#!">Tác giả</a>
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

                                                    <form action="/admin/tap/{{ $tap->id }}/update" method="post"
                                                        class="post-form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Truyện</label>
                                                            <div class="col-sm-10">
                                                                <select name="id_truyen" id="id_truyen"
                                                                    class="form-control form-control-inverse">
                                                                    <option value="" selected>[Chọn Truyện]</option>
                                                                    @foreach ($truyen as $item)
                                                                    <option value="{{ $item->id }}" @if ($tap->id_truyen
                                                                        == $item->id)
                                                                        selected
                                                                        @endif>{{ $item->tentruyen
                                                                        }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <span class="text-danger">@error('id_truyen')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Tên chương</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="tentap"
                                                                    value="{{ $tap->tentap }}" required>
                                                            </div>
                                                            <span class="text-danger">@error('tentap')
                                                                {{ $message }}
                                                                @enderror</span>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label" for="tap">Slide
                                                                Ảnh</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" class="form-control input-tap"
                                                                    name="path[]" accept="image/*" multiple>
                                                            </div>
                                                            <div class="tap-container mt-1">
                                                                @php
                                                                if($tap->path != null){
                                                                $images = json_decode($tap->path);
                                                                foreach ($images as $item) {
                                                                $sourceImage = asset($item);
                                                                echo "<img class='tap-show' src='$sourceImage'>";
                                                                }
                                                                }
                                                                @endphp
                                                            </div>
                                                        </div>
                                                        <span class="text-danger">@error('tap')
                                                            {{ $message }}
                                                            @enderror</span>

                                                        <div class="form-group d-flex justify-content-between mt-3">
                                                            <button class="btn btn-success waves-effect waves-light"
                                                                type="submit">Cập nhật</button>
                                                            <a class="btn btn-info waves-effect waves-light"
                                                                type="submit" href="/admin/tap-manager">Danh
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
        <script>
            $(document).ready(function(){
                $('#id_truyen').select2();
            })
            
            function loadImage(url) {
                return new Promise(function (resolve, reject) {
                    var img = new Image();
                    img.onload = function () {
                        resolve(img);
                    };
                    img.src = url;
                });
            }

            document.querySelector('.input-tap').addEventListener('change', async function (event) {
                var container = document.querySelector('.tap-container');
                container.innerHTML = '';
                var files = event.target.files;

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var imageUrl = URL.createObjectURL(file);
                    var img = await loadImage(imageUrl);

                    var imageElement = document.createElement('img');
                    imageElement.classList.add('tap-show');
                    imageElement.src = img.src;

                    container.appendChild(imageElement);
                }
            });

        </script>
</body>

</html>