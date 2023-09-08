@extends('admin.layout.admin_master');
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <style>
        .parsley-errors-list {
            list-style: none;
            padding: 0;
            color: red;
        }
    </style>
    <!-- Main content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title">Add New Section</h5>
                </div>
                <div class="card-body p-4">
                    <form id="basicForm" action="{{ route('store.section') }}" method="POST" autocomplete="off">
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
                                <div class="col-12">
                                    <div class="mb-3">
                                        <select class="form-control" name="semester_id" id="semester_id" required
                                            data-parsley-required-message="Semester is required.">
                                            <option selected disabled>Select Semester</option>
                                            @foreach ($semesters as $semester)
                                                <option value="{{ $semester->id }}">{{ $semester->semester_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <input type="text" name="section_name" placeholder="Section Name"
                                            class="form-control" id="section_name" required
                                            data-parsley-required-message="Section Name is required.">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-sm btn-info">Add Section</button>
                                </div>
                            </div><!--end row-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script>
        $('#basicForm').parsley();
    </script>
@endsection
