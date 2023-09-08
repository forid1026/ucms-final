<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Default\BirthdayWishController;
use App\Http\Controllers\Home\NoticeController;
use App\Http\Controllers\Home\SemesterController;
use App\Http\Controllers\Home\SmsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/add/visitor', function () {
    return view('visitor.add_visitor');
});

Route::get('/frontend-page', function () {
    return view('frontend.index');
});

Route::get('/frontend-contact', function () {
    return view('frontend.contact');
});

// create, read, delete, update

Route::get('/all/visitor', [VisitorController::class, 'AllVisitor'])->name('all.visitor');
Route::post('/store/visitor', [VisitorController::class, 'StoreVisitor'])->name('store.visitor');
Route::get('/edit/visitor/{id}', [VisitorController::class, 'EditVisitor'])->name('edit.visitor');
Route::post('/update/visitor', [VisitorController::class, 'UpdateVisitor'])->name('update.visitor');
Route::get('/delete/visitor/{id}', [VisitorController::class, 'DeleteVisitor'])->name('delete.visitor');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/', [AdminController::class, 'RedirectDashboard'])->name('redirect.dashboard');
    Route::get('/dashboard', [AdminController::class, 'RedirectDashboard'])->name('redirect.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'ChangeAdminPassword'])->name('change.admin.password');
    Route::post('update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');


    Route::get('users/all', [AdminController::class, 'UsersAll'])->name('users.all');
    Route::get('/approved/user/{id}', [AdminController::class, 'ApprovedUser'])->name('approved.user');
    Route::get('/deactivate/user/{id}', [AdminController::class, 'DeactivedUser'])->name('deactive.user');
    Route::get('/delete/user/{id}', [AdminController::class, 'DeleteUser'])->name('delete.user');


    // teacher All Route
    Route::controller(TeacherController::class)->group(function () {
        Route::get('/all/teacher', 'AllTeacher')->name('all.teacher');
        Route::get('/add/teacher', 'AddTeacher')->name('add.teacher');
        Route::post('/store/teacher', 'StoreTeacher')->name('store.teacher');
        Route::get('/edit/teacher/{id}', 'EditTeacher')->name('edit.teacher');
        Route::post('/update/teacher/', 'UpdateTeacher')->name('update.teacher');
        Route::get('/delete/teacher/{id}', 'DeleteTeacher')->name('delete.teacher');
        Route::get('/approved/teacher/{id}', 'ApprovedTeacher')->name('approved.teacher');
        Route::get('/deactivate/teacher/{id}', 'DeactivedTeacher')->name('deactive.teacher');
    });
    // student All Route
    Route::controller(StudentController::class)->group(function () {
        Route::get('/all/student', 'AllStudent')->name('all.student');
        Route::get('/add/student', 'AddStudent')->name('add.student');
        Route::post('/store/student', 'StoreStudent')->name('store.student');
        Route::get('/edit/student/{id}', 'EditStudent')->name('edit.student');
        Route::post('/update/student/', 'UpdateStudent')->name('update.student');
        Route::get('/delete/student/{id}', 'DeleteStudent')->name('delete.student');
        Route::get('/approved/student/{id}', 'ApprovedStudent')->name('approved.student');
        Route::get('/deactivate/student/{id}', 'DeactivedStudent')->name('deactive.student');
    });

    // semester All Route
    Route::controller(SemesterController::class)->group(function () {
        Route::get('/all/semester', 'AllSemester')->name('all.semester');
        Route::get('/add/semester', 'AddSemester')->name('add.semester');
        Route::post('/store/semester', 'StoreSemester')->name('store.semester');
        Route::get('/edit/semester/{id}', 'EditSemester')->name('edit.semester');
        Route::post('/update/semester/', 'UpdateSemester')->name('update.semester');
        Route::get('/delete/semester/{id}', 'DeleteSemester')->name('delete.semester');

        // all section route
        Route::get('/all/section', 'AllSection')->name('all.section');
        Route::get('/add/section', 'AddSection')->name('add.section');
        Route::post('/store/section', 'StoreSection')->name('store.section');
        Route::get('/edit/section/{id}', 'EditSection')->name('edit.section');
        Route::post('/update/section/', 'UpdateSection')->name('update.section');
        Route::get('/delete/section/{id}', 'DeleteSection')->name('delete.section');
        Route::get('/get/section', 'GetSection')->name('get.section');
    });


    // notification All Route
    Route::controller(NoticeController::class)->group(function () {
        Route::get('/all/notice', 'AllNotice')->name('all.notice');
        Route::get('/add/notice', 'AddNotice')->name('add.notice');
        Route::post('/store/notice', 'StoreNotice')->name('store.notice');
        Route::get('/edit/notice/{id}', 'EditNotice')->name('edit.notice');
        Route::post('/update/notice/', 'UpdateNotice')->name('update.notice');
        Route::get('/delete/notice/{id}', 'DeleteNotice')->name('delete.notice');
        Route::get('/mark-as-read',  'markAsRead')->name('mark-as-read');
    });

    // notification All Route
    Route::controller(BirthdayWishController::class)->group(function () {
        Route::get('/all/birthday', 'TodaysBirthDay')->name('all.birthday');
    });


    // send sms All Route
    Route::controller(SmsController::class)->group(function () {
        Route::get('/send-sms', 'SenDSMS')->name('send.sms');
        Route::post('/send-sms/store', 'SenDSMSStore')->name('send.sms.store');
    });
}); //end admin middleware


Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'TeacherDashboard'])->name('teacher.dashboard');
    Route::get('/', [TeacherController::class, 'RedirectDashboard'])->name('redirect.teacher.dashboard');
    Route::get('/teacher/logout', [TeacherController::class, 'TeacherLogout'])->name('teacher.logout');
    Route::get('/teacher/profile', [TeacherController::class, 'TeacherProfile'])->name('teacher.profile');
    Route::post('/teacher/profile/store', [TeacherController::class, 'TeacherProfileStore'])->name('teacher.profile.store');
    Route::get('/teacher/change/password', [TeacherController::class, 'ChangeTeacherPassword'])->name('change.teacher.password');
    Route::post('/teacher/update/password', [TeacherController::class, 'UpdateTeacherPassword'])->name('teacher.update.password');



    // send sms All Route
    Route::controller(SmsController::class)->group(function () {
        Route::get('/send-sms/teacher', 'SendSMSTeacher')->name('send.sms.teacher');
        Route::post('/send-sms/store/teacher', 'SendSMSStoreTeacher')->name('send.sms.store.teacher');
    });


    // notification All Route
    Route::controller(NoticeController::class)->group(function () {
        Route::get('/all/notice/teacher', 'AllNoticeTeacher')->name('all.notice.teacher');
        Route::get('/add/notice/teacher', 'AddNoticeTeacher')->name('add.notice.teacher');
        Route::post('/store/notice/teacher', 'StoreNoticeTeacher')->name('store.notice.teacher');
        Route::get('/edit/notice/teacher/{id}', 'EditNoticeTeacher')->name('edit.notice.teacher');
        Route::post('/update/notice/teacher', 'EditNoticeTeacher')->name('update.notice.teacher');
        Route::get('/delete/notice/teacher/{id}', 'DeleteNoticeTeacher')->name('delete.notice.teacher');


        // notice all method
        Route::get('/teacher/notice', [TeacherController::class, 'TeacherNotice'])->name('teacher.notice');
        Route::get('/teacher/notice/detail/{id}', [TeacherController::class, 'TeacherNoticeDetail'])->name('teacher.notice.detail');
    });
}); //end teacher middleware


Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/profile', [StudentController::class, 'StudentProfile'])->name('student.profile');
    Route::post('/student/profile/store', [StudentController::class, 'StudentProfileStore'])->name('student.profile.store');
    Route::get('/student/change/password', [StudentController::class, 'ChangeStudentPassword'])->name('change.student.password');
    Route::post('/update/change/password', [StudentController::class, 'UpdateStudentPassword'])->name('update.student.password');
    Route::get('/student/logout', [StudentController::class, 'StudentLogout'])->name('student.logout');

    // notice all method
    Route::get('/student/notice', [StudentController::class, 'StudentNotice'])->name('student.notice');
    Route::get('/student/notice/detail/{id}', [StudentController::class, 'StudentNoticeDetail'])->name('student.notice.detail');
}); //end teacher middleware


Route::get('/dashboard', function () {
    return view('student.student_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/teacher/login', [TeacherController::class, 'TeacherLogin'])->name('teacher.login');
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
// Route::get('/student/dashboard', [StudentController::class, 'StudentDashboard'])->name('student.dashboard');
