@extends('admin.layout.admin_master')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <div class="page-content">
        <div class="row">
            <div class="col-12  d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-1">All Notice</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <a href="{{ route('add.notice') }}" class="btn btn-sm btn-info px-4 radius-30">
                                    <i class='bx bxs-plus-circle'></i>Add Notice</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover" id="Transaction-History">
                                <thead class="table-light">
                                    <tr>
                                        <td>Sl</td>
                                        <td>Title</td>
                                        <td>description</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allNotices as $key => $notice)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $notice->title }}</td>
                                            <td>
                                                @php
                                                    $body = Str::limit($notice->description, 50);
                                                @endphp
                                                {!! $body !!}
                                            </td>
                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a type="button" data-bs-toggle="modal"
                                                        data-bs-target="#noticeDataModal" 
                                                        data-title="{{ $notice->title }}"
                                                        data-description="{!! $notice->description !!}"
                                                        data-notice_file="{{ $notice->notice_file }}"
                                                        data-publisded_date="{{ date('d M, Y', strtotime($notice->created_at)) }}"
                                                        href="" class="ms-3 text-secondary notice-details">
                                                        <i class='bx bxs-low-vision'></i>
                                                    </a>
                                                    <a href="{{ route('edit.notice', $notice->id) }}" class="text-info ms-3"><i
                                                            class="bx bxs-edit"></i>
                                                    </a>
                                                    <a id="delete" href="{{ route('delete.notice', $notice->id) }}"
                                                        class="ms-3 text-danger"><i class="bx bxs-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.notice_file.notice_details')

    <script>
        $(document).on('click', '.notice-details', function(e) {
            let title = $(this).data('title');
            let description = $(this).data('description');
            let publisded_date = $(this).data('publisded_date');
            let notice_file = $(this).data('notice_file');

            $('.notice-title').text(title);
            $('.notice-description').html(description);
            $('.published_date').text(publisded_date);
            let url = "http://127.0.0.1:8000/";
            let noticeUrl = url.concat(notice_file);
            let imgNoticeUrl = url.concat(notice_file);
            $("#noticeUrl").attr("src", noticeUrl);
            $("#imgNoticeUrl").attr("src", imgNoticeUrl);
        });
    </script>
@endsection
