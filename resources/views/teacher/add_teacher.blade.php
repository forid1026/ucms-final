@extends('admin.layout.admin_master')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <style>
        .parsley-errors-list {
            list-style: none;
            padding: 0;
            color: red;
        }
    </style>
    <!-- Main content -->
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Add New Teacher</h5>
            </div>
            <div class="card-body p-4">
                <form id="basicForm" action="{{ route('store.teacher') }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif



                    <div class="form-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="text" name="name" class="form-control" id="name" required
                                        required data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup"
                                        data-parsley-required-message="Name is required."
                                        data-parsley-pattern-message="Name Must Be Alphabet." placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <input type="text" maxlength="11" name="username"
                                            class="form-control  @error('username') is-invalid @enderror" id="username"
                                            required HTML5 data-parsley-type="integer"
                                            data-parsley-error-message="Username is Required" placeholder="Teacher ID">

                                        @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Email" required data-parsley-error-message="Email is Required">

                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="tel" name="phone"
                                        class="form-control @error('password') is-invalid @enderror" id="phone"
                                        placeholder="Phone" required
                                        data-parsley-pattern="/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/"
                                        data-parsley-trigger="keyup"
                                        data-parsley-required-message="Phone Number is required."
                                        data-parsley-pattern-message="Invalid Phone Number.">

                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <input data-parsley-minlength="8" type="password" name="password"
                                        class="form-control  @error('password') is-invalid @enderror" id="password"
                                        placeholder="Password" required
                                        data-parsley-error-message="Required, Password is must be 8 digit!">

                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <input data-parsley-minlength="8" type="password" name="confirm_password"
                                        class="form-control @error('confirm_new_password') is-invalid @enderror"
                                        id="confirm_password" placeholder="Password" required
                                        data-parsley-error-message="Required, Password is must be 8 digit!">
                                    @error('confirm_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="text" name="date_of_birth" class="form-control date_picker"
                                        id="date_of_birth" placeholder="Date of Birth" required
                                        data-parsley-error-message="Birth Date is required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <div class="col text-secondary">
                                        <label for="" class="mb-2"><b>Student Image</b></label>
                                        <input type="file" name="teacher_image" id="teacher_image" class="form-control">
                                    </div>
                                    <div class="col-12 mt-3 text-secondary">
                                        <img id="showImage" src=" {{ url('upload/no-image.jpg') }}" alt="Admin"
                                            width="200px" height="200px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-info">Add Teacher</button>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script>
        $(document).ready(function() {
            // image on load
            $('#teacher_image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);

            });
        });
    </script>
    <script>
        $('#basicForm').parsley();
    </script>
@endsection
