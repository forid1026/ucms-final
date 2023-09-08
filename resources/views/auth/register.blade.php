<!doctype html>
<html lang="en">

<head>
    <title>User Register</title>
    <style>
        body#register-wrapper {
            background: #0f5586;
            height: 90vh;
        }

        #main-regis-wrapper {
            width: 100%;
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) !important;
        }
    </style>
    @include('admin.layout.head')
</head>

<body class="" id="register-wrapper">

    <div class="wrapper" id="main-regis-wrapper">
        <div class="d-flex align-items-center justify-content-center">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">

                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('backend/assets/images/nub-logo.png') }}" width="100"
                                            alt="">
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class="">Register Form</h5>
                                        <p class="mb-0">Please fill the below details to create your account</p>
                                    </div>

                                    <div class="form-body">
                                        {{-- @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @elseif(session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif --}}

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('register') }}" class="row g-3" autocomplete="off">
                                            @csrf
                                            <div class="col-6">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Name">
                                            </div>
                                            <div class="col-6">
                                                <label for="username" class="form-label">User ID</label>
                                                <input type="text" name="username" maxlength="11"
                                                    class="form-control" id="username"
                                                    placeholder="Student | Teacher ID">
                                            </div>
                                            <div class="col-6">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="Email">
                                            </div>
                                            <div class="col-6">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="tel" class="form-control" id="phone"
                                                    placeholder="Phone" name="phone">
                                            </div>
                                            <div class="col-6">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="inputChoosePassword" name="password"
                                                        placeholder="Enter Password"> <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class="bx bx-hide"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="inputChoosePassword" class="form-label">Confirm
                                                    Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control border-end-0" id="inputChoosePassword"
                                                        placeholder="Confirm Password"> <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class="bx bx-hide"></i></a>
                                                </div>
                                            </div>
                                            {{-- <div class="col-12">
                                                <label for="inputSelectCountry" class="form-label">Country</label>
                                                <select class="form-select" id="inputSelectCountry"
                                                    aria-label="Default select example">
                                                    <option selected="">India</option>
                                                    <option value="1">United Kingdom</option>
                                                    <option value="2">America</option>
                                                    <option value="3">Dubai</option>
                                                </select>
                                            </div> --}}
                                            {{-- <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">I read
                                                        and agree to Terms &amp; Conditions</label>
                                                </div>
                                            </div> --}}
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: #0f5586;">Sign up</button>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="text-center ">
                                                    <p class="mb-0">Already have an account? <a
                                                            href="{{ route('login') }}">Sign in here</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
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
