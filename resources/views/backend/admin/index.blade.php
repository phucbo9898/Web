<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('backend/login/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/login/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">

    <div class="container-login100" style="background-image: url('/backend/login/images/bg-01.jpg');">
        {{--    <div class="container-login100" style="background: mediumpurple">--}}
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

                <form role="form" action="{{route('admin.postLogin')}}" method="post">
                    {{--                    <form class="login100-form validate-form">--}}
                    @csrf
                    <span class="login100-form-title p-b-49">
						Login
					</span>
                    <div class="wrap-input100 m-b-23" {{--data-validate="Username is reauired"--}}>
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="Type your email">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>
{{--                    @if ($errors->has('email'))--}}
{{--                        <span class="invalid-feedback" role="alert"--}}
{{--                              style="color:red;">{{ $errors->first('email') }}</span>--}}
{{--                    @endif--}}
                    @if ($errors->has('email'))
                        <span style="color: #932ab6; font-weight: 600"><i class="fa fa-info"></i> {{ $errors->first('email') }}</span>
                    @endif
                    <div class="wrap-input100 validate-input" {{--data-validate="Password is required"--}}>
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
{{--                        @if ($errors->has('password'))--}}
{{--                            <span class="invalid-feedback" role="alert"--}}
{{--                                  style="color:red;">{{ $errors->first('password') }}</span>--}}
{{--                        @endif--}}
                    </div>
                    <br>
                    @if ($errors->has('password'))
                        <span style="color: #932ab6; font-weight: 600"><i class="fa fa-info"></i> {{ $errors->first('password') }}</span>
                    @endif
                    @if(session('msg'))
                        <div class="form-group has-feedback"><span href="#" style="color: #932ab6; font-weight: 600"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>{{ session('msg') }}</span>
                        </div>
                    @endif
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" id="remember"> Ghi nhớ
                        </label>
                    </div>
                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Login
                            </button>
                        </div>
                    </div>
                    {{--                </form>--}}
                </form>
            </div>
        </div>
    </div>
    {{--    </form>--}}


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('backend/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('backend/login/vendor/animsition/js/animsition.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('backend/login/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{ asset('backend/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('backend/login/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('backend/login/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ asset('backend/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('backend/login/js/main.js')}}"></script>

</body>
</html>
