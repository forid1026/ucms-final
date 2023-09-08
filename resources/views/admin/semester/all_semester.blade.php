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
                                <h6 class="mb-1">All Semester</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <a href="{{ route('add.semester') }}" class="btn btn-sm btn-info px-4 radius-30">
                                    <i class='bx bxs-plus-circle'></i>Add Semester</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover" id="Transaction-History">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Semester Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allSemester as $key => $semester)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $semester->semester_name }}</td>

                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('edit.semester', $semester->id) }}"
                                                        class="text-info"><i class="bx bxs-edit"></i>
                                                    </a>
                                                    <a id="delete" href="{{ route('delete.semester', $semester->id) }}"
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
@endsection
