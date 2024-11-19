<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style/login.css')}}">
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <title>{{env('APP_NAME')}}</title>
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url({{ asset('assets/img/back_ground.png') }}) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-6 col-md-6 modal-bg-img"
                    style="background-image: url({{ asset('assets/img/logo.png') }});background-size: cover;background-position: center;">
                </div>
                <div class="col-lg-6 col-md-6 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="{{asset('assets/img/logo.png')}}" alt="wrapkit"
                                style="width: 60px; height: 70px">
                        </div>
                        <h2 class="mt-3 text-center">Halaman Login</h2>
                        <p class="text-center">Login Ke Aplikasi </p>
                        <div class="msg-alert" hidden>
                            <div class="alert alert-danger" role="alert">
                                <strong class="alert-title">Login Gagal</strong>
                                <p class="alert-text">Username atau password yang anda gunakan salah !</p>
                            </div>
                        </div>
                        @if ($message=Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            <strong>Error</strong>
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <form action="#" method="post" id="wage">
                            <div class="row login-form">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Username </label>
                                        <input id="email" type="text" class="form-control " name="email" value=""
                                            required autocomplete="email" autofocus placeholder="Email">
                                        <span class="red email"></span>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input id="password" type="password" class="form-control " name="password"
                                            required autocomplete="current-password" placeholder="Password">
                                        <span class="red password"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <div class="show-loading">
                                        <div class="spinner-border" role="status">

                                        </div>
                                        <span class="">Login Proses mohon tunggu...</span>
                                    </div>
                                    <div class="show-button">
                                        <button type="button" onclick="login()" class="btn btn-block btn-dark">Login</button>
                                            <button class="btn btn-block btn-dark">
                                                <img width="20px" style="margin-bottom:3px; margin-right:5px"
                                                    alt="Google sign-in"
                                                    src="{{ asset('assets/img/google.png') }}" />
                                                Login with Google
                                            </button>
                                    </div>	<div class="col-lg-12 text-center mt-5">
                                        Belum Punya Account ? <a href="#" class="text-danger show-register"
                                            onclick="showRegister()">Klik Disini</a>
                                        <br>
                                        Lupa Password ? <a href="#" class="text-danger" onclick="showResetPassword()">Klik
                                            disini</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row reset-password-form" hidden>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="uname">Email</label>
										<input class="form-control" id="uname" type="text"
											placeholder="Gunakan Email Terdaftar">
									</div>
								</div>
								<div class="col-lg-12 text-center">
									<button type="button" class="btn btn-block btn-dark">Reset Password</button>

								</div>
								<div class="col-lg-12 text-center mt-5">
									Ingin Login ? <a href="#" class="text-danger" onclick="showLogin()">Klik disini</a>
								</div>
							</div>
							<!-- show register -->
							<div class="row  register-form" hidden>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="uname">Username</label>
										<input class="form-control" name="username" id="runame" type="text"
											placeholder="Login dengan Email anda">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="uname">Nama</label>
										<input class="form-control" name="username" id="nama" type="text"
											placeholder="Gunakan Nama Anda">
									</div>
								</div>

								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="pwd">Password</label>
										<input class="form-control" id="rpwd" onkeyup="checkPwd()" name="rpassword"
											type="password" placeholder="Password Anda">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="pwd">Ulangi Password</label>
										<input class="form-control" id="trypwd" name="trypassword" onkeyup="checkPwd()"
											type="password" placeholder="Password Anda">
										<span class="red error-password"></span>
									</div>
								</div>

								<div class="col-lg-12 text-center">
									<button type="button" onclick="processRegister()" hidden
										class="btn btn-block btn-dark btn-register">Daftar</button>

									<button class="btn btn-block btn-dark">
										<img width="20px" style="margin-bottom:3px; margin-right:5px"
											alt="Google sign-in"
											src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
										Register with Google
									</button>
								</div>
								<div class="col-lg-12 text-center mt-5">
									Ingin Login ? <a href="#" class="text-danger" onclick="showLogin()">Klik disini</a>
								</div>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/jquery/dist/jquery.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->

    <script>
        $(document).ready(function () {
            show_loading('hide');
            showLogin();
        });
        var wage = document.getElementById("wage");
        wage.addEventListener("keydown", function (e) {
            if (e.code === "Enter") { //checks whether the pressed key is "Enter"
               login();
            }
        });
        $('#btnlogin').on('click', function () {
		$('#login').modal('show');
	});
	$('#sudah').on('click', function () {
		$('#verifikasi_login').submit();
	});
	$('#btntutorial').click(function (e) {
		$('#tutorial').modal('show');
	});
	$(".preloader ").fadeOut();
        function showResetPassword() {
		$('.header-login').text('Reset Password');
		$('.login-form').hide();
		$('.register-form').hide();
		$('.reset-password-form').removeAttr('hidden style');
	}

	function showLogin() {
		$('.header-login').text('Login');
		$('.reset-password-form').hide();
		$('.register-form').hide();
		$('.login-form').removeAttr('hidden style');
	}

	function showRegister() {
		$('.header-login').text('Daftar Account Baru');
		$('.reset-password-form').hide();
		$('.login-form').hide();
		$('.register-form').removeAttr('hidden style');
	}
        const url = "{{ url('') }}";
        $(".preloader ").fadeOut();

        function login() {
            $(".email").text("");
            $(".password").text("");
            show_loading('show');
            $(".msg-alert").attr("hidden", "true");
            let data = {
                email: $("#email").val(),
                password: $("#password").val(),
                _token: "{{ csrf_token() }}"
            }
            setTimeout(function () {
                show_loading('hide');
                proses_login(data)
            }, 3000);
        }

        function proses_login(data) {
            $.ajax({
                type: "POST",
                url: url + "/login/verification",
                data: data,
                dataType: "JSON",
                success: function (response) {
                    if (response.status == 'validationerror') {
                        $(".email").text(response.erors.email);
                        $(".password").text(response.erors.password);
                    } else if (response.status == 'failed') {
                        $('.alert-title').text('Login gagal');
                        $('.alert-text').text("username dan password yang anda gunakan salah !");
                        $(".msg-alert").removeAttr("hidden");

                    } else if (response.status == 'success') {
                        window.location.href = "{{ url('login') }}";
                    }
                },
                error: function () {
                    $('.alert-title').text('service error');
                    $('.alert-text').text('sorry service error');
                    $('.msg-alert').removeAttr('hidden');
                }
            });
        }

        function show_loading(params) {
            if (params == 'show') {
                $(".show-button").hide();
                $(".show-loading").show();
            } else {
                $(".show-button").show();
                $(".show-loading").hide();
            }
        }

    </script>
</body>

</html>
