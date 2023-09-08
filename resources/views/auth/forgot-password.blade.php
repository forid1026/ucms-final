<!doctype html>
<html lang="en">

<head>

    <title>Forgot Password</title>
    <style>
        body.login-form {
            background: #0f5586;
        }
    </style>
    @include('admin.layout.head')
</head>

<body class="login-form">
    <!--wrapper-->
    <div class="wrapper">
        <div class="authentication-forgot d-flex align-items-center justify-content-center">
            <div class="card forgot-box">
                <div class="card-body">
                    <div class="p-3">
                        <div class="text-center">
                            <img class="d-block m-auto" src="{{ asset('backend/assets/images/nub-logo.png') }}"
                                width="100" alt="">
                        </div>
                        <h4 class="mt-2 font-weight-bold text-center">Forgot Password?</h4>
                        <p class="text-muted text-center">Enter your registered email ID to reset the password</p>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif


                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="my-4">
                                <label class="form-label">Email id</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Email">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #0f5586;">Send</button>
                                <a href="{{ route('login') }}" class="btn btn-light"><i
                                        class="bx bx-arrow-back me-1"></i>Back to Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    @include('admin.layout.script')
    <!--Password show & hide js -->
    <!--app JS-->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>

</html>
