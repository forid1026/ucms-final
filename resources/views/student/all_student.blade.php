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
                                <h6 class="mb-1">All Student</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <a href="{{ route('add.student') }}" class="btn btn-sm btn-info px-4 radius-30">
                                    <i class='bx bxs-plus-circle'></i>Add Student</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover" id="Transaction-History">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Info</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allStudents as $key => $student)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="{{ asset($student->photo) }}" class="rounded-circle"
                                                            width="46" height="46" alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">{{ $student->name }}</h6>
                                                        <p class="mb-0 font-13 text-secondary">{{ $student->username }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->email }}</td>
                                            {{-- <td>{{ date('d-M,Y', strtotime($student->birth_date)) }}</td> --}}
                                            <td>
                                                @if ($student->status == 'active')
                                                    <div class="badge rounded-pill  text-success  p-2 text-uppercase px-3">
                                                        <i class="bx bxs-circle me-1"></i>Active
                                                    </div>
                                                @else
                                                    <div class="badge rounded-pill text-danger  p-2 text-uppercase px-3">
                                                        <i
                                                            class="bx bx-radio-circle-marked bx-burst bx-rotate-90 align-middle font-18 me-1"></i>
                                                        <span>Pending</span>
                                                    </div>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('edit.student', $student->id) }}" class="text-info"><i
                                                            class="bx bxs-edit"></i>
                                                    </a>
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#userDataModal"
                                                        data-name="{{ $student->name }}" data-email="{{ $student->email }}"
                                                        data-username="{{ $student->username }}"
                                                        data-birth_date="{{ $student->birth_date }}"
                                                        data-phone="{{ $student->phone }}"
                                                        data-photo="{{ $student->photo }}" href=""
                                                        class="ms-3 text-secondary student-details">
                                                        <i class='bx bxs-low-vision'></i>
                                                    </a>
                                                
                                                    @if ($student->status == 'active')
                                                        <a id="deactivate"
                                                            href="{{ route('deactive.user', $student->id) }}"
                                                            class="text-info ms-3 ">
                                                            <i class='bx bxs-dislike'></i>
                                                        </a>
                                                    @endif

                                                    <a id="delete" href="{{ route('delete.student', $student->id) }}"
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
    @include('student.student_details')

    <script>
        $(document).on('click', '.student-details', function(e) {
            let name = $(this).data('name');
            let username = $(this).data('username');
            let email = $(this).data('email');
            let phone = $(this).data('phone');
            let birthDate = $(this).data('birth_date');
            let photo = $(this).data('photo');

            console.log(photo);


            $('#name').val(name);
            $('.student-name').text(name);
            $('#username').val(username);
            $('#email').val(email);
            $('#phone').val(phone);
            $('#birth_date').val(birthDate);
            let url = "http://127.0.0.1:8000/";
            let imgUrl = url.concat(photo);
            $("#userImg").attr("src", imgUrl);
        });
    </script>
@endsection
