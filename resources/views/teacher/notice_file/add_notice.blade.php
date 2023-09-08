@extends('teacher.layout.teacher_master')
@section('teacher')
    <style>
        .parsley-errors-list {
            list-style: none;
            padding: 0;
            margin: 0;
            color: red;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Main content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add Notice</h3>
                        </div>
                        <!-- form start -->
                        <form id="basicForm" action="{{ route('store.notice.teacher') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label for="title" class="mb-2">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" required
                                        required data-parsley-required-message="Title is required."
                                        placeholder="Notice Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="notice_type" class="mb-2">Notice Type</label>
                                    <br>
                                    <input type="radio" name="notice_type" id="notice_type" value="all_student"> All
                                    student
                                    {{-- <input type="radio" name="notice_type" id="notice_type" value="all_teacher"> All
                                    teacher --}}
                                    <input type="radio" name="notice_type" id="notice_type" value="semester_wise">
                                    Semester Wise
                                </div>
                                <div class="form-group mb-3" id="semester_column" style="display: none;">
                                    <label for="semester_id" class="mb-2">Semester Name</label>
                                    <select class="form-control" name="semester_id" id="semester_id">
                                        <option selected disabled>Select Semester</option>
                                        @foreach ($semesters as $semester)
                                            <option value="{{ $semester->id }}">{{ $semester->semester_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3" id="section_column" style="display: none;">
                                    <label for="section_id" class="mb-2">Section Name</label>
                                    <select class="form-control" name="section_id" id="section_id">
                                        <option selected disabled>Select Semester</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->section_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description" class="mb-2">Description</label>
                                    <textarea id="editor" name="description" placeholder="Notice Description">
                                    </textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="notice_file" class="mb-2">Notice File</label>
                                    <input type="file" name="notice_file" class="form-control" id="notice_file">
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Add Notice</button>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    {{-- get section name --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#semester_id').on('change', function() {
                let semesterId = $(this).val();
                console.log(semesterId);
                $.ajax({
                    url: '{{ route('get.section') }}?semester_id=' + semesterId,
                    type: 'GET',
                    success: function(data) {
                        console.log('data', data);
                        let html = '<option value="">Select Section </option>';
                        $.each(data, function(key, value) {
                            console.log(value);
                            html += '<option value=" ' + value.id + ' "> ' +
                                value.section_name + '</option>';
                        });
                        $("#section_id").html(html);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '#notice_type', function() {
                let notice_type = $(this).val();
                if (notice_type == 'semester_wise') {
                    $('#semester_column').show();
                    $('#section_column').show();
                } else {
                    $('#semester_column').hide();
                    $('#section_column').hide();
                }
            });
        });
    </script>
@endsection
