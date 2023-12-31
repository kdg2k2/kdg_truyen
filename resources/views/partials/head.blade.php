
<meta name="csrf-token" content="{{ csrf_token() }}">
@if (Session::has('loginId'))
    <meta name="loginId" content="{{ Session::get('loginId') }}">
@endif
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> KdgTruyen</title>
<link rel="stylesheet" href="{{ asset('/Main_template/vendor/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('/Main_template/vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('/Main_template/css/app.css') }}">
<link href="{{ asset('/Main_template/favicon.ico') }}" rel="icon" type="image/vnd.microsoft.icon">
<link href="{{ asset('/Main_template/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
<link href="{{ asset('/Main_template/favicon.ico') }}" rel="icon" type="image/x-icon">
<meta name="csrf-token" content="WoZOIG1Eb1sXr7AMvLTGMo8AO9TbH6EKZVpUDmWI">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-42595306-7"
    type="8f607098fd4ff38b6cf39054-text/javascript"></script>
{{-- <script type="8f607098fd4ff38b6cf39054-text/javascript">
    window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-42595306-7');
</script> --}}
<meta property="og:title" content>
<meta property="og:description" content>
<meta property="og:image" content>
<meta property="og:url" content>
<link rel="stylesheet" href="{{ asset('/Main_template/vendor/adminlte/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('/Main_template/vendor/owl-carousel2/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('/Main_template/vendor/owl-carousel2/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    
