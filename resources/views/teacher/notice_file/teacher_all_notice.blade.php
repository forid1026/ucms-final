@extends('teacher.layout.teacher_master')
@section('teacher')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js                                                                            ">
    </script>
    <!-- Main content -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-size: 25px;">Teacher Notice Board</h3>
                        </div>
                        <div class="card-body">
                            @if (count($teacherNotice) > 0)
                                @foreach ($teacherNotice as $notice)
                                    <div class="notice-section mb-5">
                                        <h5 class="">{{ $notice->title }}</h5>
                                        <div class="inner-div d-flex justify-content-between align-items-center">
                                            <p class="mb-0">Published Date:
                                                {{ date('d M, Y', strtotime($notice->created_ate)) }}
                                            </p>
                                            <a href="{{ route('teacher.notice.detail', $notice->id) }}"
                                                class="btn btn-sm btn-outline-info mb-0">Read More <i class='bx bx-chevrons-right'></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @else
                                <h4 class="text-muted text-center">No Notice Publised Yet</h4>
                            @endif


                        </div>
                    </div>

                </div>
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
