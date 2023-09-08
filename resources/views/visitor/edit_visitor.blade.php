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
                            <h3 class="card-title">Update Visitor</h3>
                        </div>
                        <!-- form start -->
                        <form class="p-3" action="{{ route('update.visitor') }}" method="POST">
                            @csrf
                            <p>Customer Address: <b>{{ $visitor_info->address }}</b> </p>
                            <input type="hidden" value="{{ $visitor_info->id }}" name="id">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                                    name="name" value="{{ $visitor_info->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter Email" value="{{ $visitor_info->email }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Enter Phone"
                                    name="phone" value="{{ $visitor_info->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" placeholder="Type your Address" class="form-control" id="address" cols="30"
                                    rows="10">
                                    {{ $visitor_info->address }}
                                </textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('#basicForm').parsley();
    </script>
@endsection
