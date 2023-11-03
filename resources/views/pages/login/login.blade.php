<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng Nhập </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/img/logo_qbvvptrna_removebg.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/LoginForm/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/LoginForm/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/LoginForm/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/LoginForm/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/LoginForm/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/LoginForm/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/LoginForm/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/LoginForm/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/LoginForm/css/util.css">
	<link rel="stylesheet" type="text/css" href="/LoginForm/css/main.css">
<!--===============================================================================================-->

<style>
    .wrap-login100 {
        position: relative;
    }

    .back-btn{
        position: absolute;
        top: 20px;
        right: 30px;
    }

    body {
		font-family: 'Roboto', sans-serif !important;
	}

</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
            <div class="wrap-login100">
                <a href="/" class="text-info back-btn">< Về Trang Chủ</a>
				<form class="login100-form validate-form" method="post" action="/logging">
                    @csrf
					<span class="login100-form-title p-b-26" style="font-family: Roboto">
						Đăng Nhập
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

                    @if ($message = Session::get('fail'))
                        <div class="alert alert-danger mt-2 mb-3">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="email" name="email" required>
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Đăng Nhập
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Chưa có tài khoản?
						</span>

						<a class="txt2 text-info" href="/register">
							Đăng Kí
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/LoginForm/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/LoginForm/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/LoginForm/vendor/bootstrap/js/popper.js"></script>
	<script src="/LoginForm/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/LoginForm/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/LoginForm/vendor/daterangepicker/moment.min.js"></script>
	<script src="/LoginForm/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/LoginForm/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/LoginForm/js/main.js"></script>

</body>
</html>