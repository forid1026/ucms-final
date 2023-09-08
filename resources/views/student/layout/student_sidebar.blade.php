@php
    $id = Auth::user()->id;
    $studentData = App\Models\User::find($id);
@endphp
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            {{-- <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon"> --}}
            <img src="{{ asset('upload/student_images/'.$studentData->photo) }}" class="logo-icon rounded img-thumbnail"
                alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{ $studentData->name }}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ URL('/dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="menu-label">Chat</li>
        <li>
            <a href="{{ route('chatify') }}" target="_blank">
                <div class="parent-icon">
                    <i class='bx bx-conversation'></i>
                </div>
                <div class="menu-title">Chat</div>
            </a>
        </li>
        <li class="menu-label">Notice Manage</li>
        <li>
            <a href="{{ route('student.notice') }}">
                <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">All Notice</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
