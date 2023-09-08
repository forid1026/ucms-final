@extends('student.layout.student_master')
@section('meta')
    <title>UCMS - Student Dashboard</title>
@endsection
@section('student')
    <div class="page-content">
        <div class="row">
            <div class="col">
                <h5 class="text-muted">Hello {{ Auth::user()->name}} ,Welcome to UCMS</h5>
            </div>
        </div>
    </div>
@endsection
