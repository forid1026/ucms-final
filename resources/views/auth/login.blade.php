<!doctype html>
<html lang="en">

<head>
    <title>Student Login</title>
    <style>
        body.login-form {
            background: #0f5586;
        }

        h1 {
            color: #0f5586 !important;
        }
    </style>
    @include('admin.layout.head')
</head>

<body class="login-form">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        {{-- <img src="{{ asset('backend/assets/images/logo-new.png') }}" width="50%"
                                            alt=""> --}}
                                        <img src="{{ asset('backend/assets/images/nub-logo.png') }}" width="100"
                                            alt="">
                                    </div>
                                    <div class="mb-4 text-center">
                                        <h1>Hello NUBIAN,</h1>
                                        <h5>Please Login to Your Account!</h5>
                                    </div>
                                    <div class="form-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form class="row g-3" action="{{ route('login') }}" autocomplete="off"
                                            method="POST">
                                            @csrf
                                            <div class="col-12">
                                                <input type="text" name="login" class="form-control"
                                                    id="inputEmailAddress" placeholder="Student ID">
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="inputChoosePassword" name="password"
                                                        placeholder="Enter Password"> <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"> <a
                                                    href="{{ route('password.request') }}">Forgot Password ?</a>
                                            </div>
                                            <div class="mt-4">
                                                {!! NoCaptcha::renderJs() !!}
                                                {!! NoCaptcha::display() !!}
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="help-block">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: #0f5586;">Sign in</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-center ">
                                                    <p class="mb-0">Don't have an account yet? <a
                                                            href="{{ route('register') }}">Sign up here</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- <div class="login-separater text-center mb-5"> <span>OR SIGN IN WITH</span>
                                        <hr />
                                    </div>
                                    <div class="list-inline contacts-social text-center">
                                        <a href="javascript:;"
                                            class="list-inline-item bg-facebook text-white border-0 rounded-3"><i
                                                class="bx bxl-facebook"></i></a>
                                        <a href="javascript:;"
                                            class="list-inline-item bg-twitter text-white border-0 rounded-3"><i
                                                class="bx bxl-twitter"></i></a>
                                        <a href="javascript:;"
                                            class="list-inline-item bg-google text-white border-0 rounded-3"><i
                                                class="bx bxl-google"></i></a>
                                        <a href="javascript:;"
                                            class="list-inline-item bg-linkedin text-white border-0 rounded-3"><i
                                                class="bx bxl-linkedin"></i></a>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    @include('admin.layout.script')
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>

</html>
