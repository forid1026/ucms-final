@extends('admin.layout.admin_master')
@section('admin')
    <div class="page-content">
        <div class="row">
            <div class="col-12  d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-1">All Register Users</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mt-4">
                            <table class="table align-middle mb-0 table-hover" id="Transaction-History">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Info</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="{{ asset($user->photo) }}" class="rounded-circle"
                                                            width="46" height="46" alt="" />
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-1 font-14">{{ $user->name }}</h6>
                                                        <p class="mb-0 font-13 text-secondary">{{ $user->username }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            {{-- <td>{{ date('d-M,Y', strtotime($teacher->birth_date)) }}</td> --}}
                                            <td>
                                                @if ($user->status == 'active')
                                                    <div class="badge rounded-pill text-success  p-2 text-uppercase px-3">
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
                                                    @if ($user->status == 'active')
                                                        <a id="deactivate" href="{{ route('deactive.user', $user->id) }}"
                                                            class="text-info">
                                                            <i class='bx bx-power-off'></i>
                                                        </a>
                                                    @elseif ($user->status == 'inactive')
                                                        <a id="approved" href="{{ route('approved.user', $user->id) }}"
                                                            class="ms-3 text-secondary">
                                                            <i class='bx bx-like'></i>
                                                    @endif
                                                    <a id="delete" href="{{ route('delete.user', $user->id) }}"
                                                        class="ms-3 text-danger"><i class="bx bxs-trash"></i></a>
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
