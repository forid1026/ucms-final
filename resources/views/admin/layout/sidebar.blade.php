@php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
@endphp
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            {{-- <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon"> --}}
            <img src="{{ asset('upload/admin_images/' . $adminData->photo) }}" class="logo-icon rounded img-thumbnail"
                alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{ $adminData->name }}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        
        <li class="menu-label">Register User</li>
        <li>
            <a href="{{ route('users.all') }}">
                <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Register Users</div>
            </a>
        </li>
        <li class="menu-label">Sms Manage</li>
        <li>
            <a href="{{ route('send.sms') }}">
                <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Send Sms</div>
            </a>
        </li>
        <li>
            <a href="{{ route('chatify') }}" target="_blank">
                <div class="parent-icon">
                    <i class='bx bx-conversation'></i>
                </div>
                <div class="menu-title">Chat</div>
            </a>
        </li>
        <li class="menu-label">Student Manage</li>
        <li>
            <a href="{{ route('all.student') }}">
                <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Student</div>
            </a>
        </li>
        <li class="menu-label">Teacher Manage</li>
        <li>
            <a href="{{ route('all.teacher') }}">
                <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Teacher</div>
            </a>
        </li>
        <li class="menu-label">Semester Manage</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Semester</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.semester') }}"><i class='bx bx-radio-circle'></i>All Semester</a>
                </li>
            </ul>
            <ul>
                <li> <a href="{{ route('all.section') }}"><i class='bx bx-radio-circle'></i>All Section</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Notice Manage</li>
        <li>
            <a href="{{ route('all.notice') }}">
                <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">All Notice</div>
            </a>
        </li>
        
    </ul>
    <!--end navigation-->
</div>
