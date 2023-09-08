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
                <h6 class="card-title">Add New Semester</h5>
            </div>
            <div class="card-body p-4">
                <form id="basicForm" action="{{ route('store.semester') }}" method="POST" enctype="multipart/form-data"
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
                            <div class="col">
                                <div class="mb-3">
                                    <input type="text" name="semester_name"
                                        class="form-control @error('semester_name') is-invalid @enderror" id="name"
                                        required data-parsley-required-message="Name is required."
                                        placeholder="Enter your name">

                                    @error('semester_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-info">Add Semester</button>
                            </div>
                        </div><!--end row-->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script>
        $('#basicForm').parsley();
    </script>
@endsection
