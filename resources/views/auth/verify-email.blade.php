<!doctype html>
<html lang="en">


@include('admin.layout.head')
<style>
    body.varify-form {
        background: #0F5586;
        position: relative;
    }

    .btn-primary {
        background: #0F5586;
    }

    body {
        height: 90vh;
    }

    #custom {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body class="varify-form">
    <!--wrapper-->
    <div class="wrapper" id="custom">
        <div class="d-flex align-items-center justify-content-center my-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 mx-auto">
                        <div class="card mb-0 shadow">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="col-12">
                                        <h2 class="text-center mb-3">Login Here</h2>
                                    </div>
                                    <div class="text-center mb-4">
                                        <p class="mb-0">Thanks for signing up! Before getting started, could you
                                            verify your email address by clicking on the link we just emailed to you? If
                                            you didn't receive the email, we will gladly send you another.</p>
                                    </div>
                                    <div class="form-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{-- {{ session('status') }} --}}
                                                A new verification link has been sent to the email address you provided
                                                during registration.
                                            </div>
                                        @elseif(session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-around">
                                                <form method="POST" action="{{ route('verification.send') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-dark">
                                                        <span style="font-size: 12px;">RESET VARIFICATION EMAIL</span>
                                                    </button>
                                                </form>
                                                <p class="mb-0">

                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <button type="submit"
                                                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                        {{ __('Log Out') }}
                                                    </button>
                                                </form>
                                                </p>
                                            </div>
                                        </div>
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
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    @include('admin.layout.script')
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>

</html>
