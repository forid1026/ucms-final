@extends('admin.layout.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="{{ route('send.sms.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">User Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="phone_number"
                                                placeholder="Enter Phone Number" required />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Message</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea name="message" placeholder="Type your message here" id="message" class="form-control" cols="30"
                                                rows="10" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-info px-4" value="Send Message" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
