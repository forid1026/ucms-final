@extends('teacher.layout.teacher_master')
@section('meta')
    <title>UCMS - Teacher Dashboard</title>
@endsection
@section('teacher')
<div class="page-content">
    <div class="row">
        <div class="col">
            <h5 class="text-muted">Hello {{ Auth::user()->name}} ,Welcome to UCMS</h5>
        </div>
    </div>
</div>
@endsection

