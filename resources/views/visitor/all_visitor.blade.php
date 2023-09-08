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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12 py-5">
                    <!-- jquery validation -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">All Visitor</h3>
                        </div>
                        <!-- form start -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sl</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">EMail</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($all_visitor as $key => $visitor)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $visitor->name }}</td>
                                        <td>{{ $visitor->email }}</td>
                                        <td>{{ $visitor->phone }}</td>
                                        <td>{{ $visitor->address }}</td>
                                        <td>
                                            <a href="{{ route('edit.visitor', $visitor->id) }}"class="btn btn-info">
                                                <i class="fas fa-edit    "></i>
                                            </a>
                                            <a id="delete" href="{{ route('delete.visitor', $visitor->id) }}"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('#basicForm').parsley();
    </script>
@endsection
