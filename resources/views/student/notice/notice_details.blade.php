@extends('student.layout.student_master')
@section('student')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js                                                                            ">
    </script>
    <!-- Main content -->
    <div class="page-content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Notice Details</h6>
                    </div>
                    <div class="card-body">
                        <h3>{{ $noticeDetails->title }}</h3>
                        <p>{!! $noticeDetails->description !!}</p>
                        {{--  @php
                                $extension = pathinfo($noticeDetails->notice_file, PATHINFO_EXTENSION);
                            @endphp  --}}

                        @if ($noticeDetails->notice_file != null)
                            <iframe src="{{ asset($noticeDetails->notice_file) }}" frameBorder="2" scrolling="auto"
                                height="500" width="100%"></iframe>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
