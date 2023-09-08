@php
    $id = Auth::user()->id;
    $teacherData = App\Models\User::find($id);
@endphp
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            {{-- <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon"> --}}
            <img src="{{ asset('upload/teacher_images/' . $teacherData->photo) }}" class="logo-icon rounded img-thumbnail"
                alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">{{ $teacherData->name }}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('teacher.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <li> <a href="app-emailbox.html"><i class='bx bx-radio-circle'></i>Email</a>
                </li>
                <li> <a href="app-chat-box.html"><i class='bx bx-radio-circle'></i>Chat Box</a>
                </li>
                <li> <a href="app-file-manager.html"><i class='bx bx-radio-circle'></i>File Manager</a>
                </li>
                <li> <a href="app-contact-list.html"><i class='bx bx-radio-circle'></i>Contatcs</a>
                </li>
                <li> <a href="app-to-do.html"><i class='bx bx-radio-circle'></i>Todo List</a>
                </li>
                <li> <a href="app-invoice.html"><i class='bx bx-radio-circle'></i>Invoice</a>
                </li>
                <li> <a href="app-fullcalender.html"><i class='bx bx-radio-circle'></i>Calendar</a>
                </li>
            </ul>
        </li> --}}
        <li class="menu-label">Sms Manage</li>
        <li>
            <a href="{{ route('send.sms.teacher') }}">
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
        <li class="menu-label">Notice Manage</li>
        <li>
            <a href="{{ route('teacher.notice') }}">
                <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Notice for You</div>
            </a>
        </li>
        <li class="menu-label">Manage Student Notice </li>
        <li>
            <a href="{{ route('all.notice.teacher') }}">
                <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">Student Notice</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
