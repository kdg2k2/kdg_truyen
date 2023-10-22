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
                        <h3 class="card-title">Bình luận</h3>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('partials/footer')

    <script>
        function selectChange(selectElement) {
            var slug = "{{ $truyen->slug }}";
            var selectedValue = selectElement.value;
            window.location.href = '/' + slug + '/' + selectedValue;
        }

    </script>
</body>

</html>