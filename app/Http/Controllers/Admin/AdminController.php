<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $students = User::where('role', 'student')->where('status', 'active')->get();
        $teachers = User::where('role', 'teacher')->where('status', 'active')->get();
        $pendingUsers = User::where('status', 'inactive')->get();
        $notices = Notice::get();
        $birthdayUser = User::whereDate('created_at', '=', (new DateTime())->format('Y-m-d'))->get();
        // dd($birthdayUser);
        return view('admin.index', compact('students', 'teachers', 'notices', 'pendingUsers'));
    } //end method

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }

    public function RedirectDashboard()
    {
        return redirect()->route('admin.dashboard');
    }

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    } //end method

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->birth_date = $request->date_of_birth;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(('upload/admin_images'), $fileName);
            $data['photo'] = $fileName;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end method

    public function ChangeAdminPassword()
    {
        return view('admin.admin_change_password');
    } //end method

    public function UpdatePassword(Request $request)
    {
        // dd('hello');
        // validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_new_password' => 'required|same:new_password'
        ]);


        // match the old password
        $hashedPassword = auth::user()->password;
        if (!Hash::check($request->old_password, $hashedPassword)) {
            return back()->with('error', "Old Password Doesn't Match!");
        } else {
            // update the new password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            return back()->with('status', 'Password Change Successfully');
        }
    }
    // public function UpdateAdminPassword(Request $request)
    // {
    //     dd('hello');
    //     // validation
    //     $request->validate([
    //         'old_password' => 'required',
    //         'new_password' => 'required',
    //         'confirm_new_password' => 'required|same:new_password'
    //     ]);


    //     // match the old password
    //     $hashedPassword = auth::user()->password;
    //     if (!Hash::check($request->old_password, $hashedPassword)) {
    //         return back()->with('error', "Old Password Doesn't Match!");
    //     } else {
    //         // update the new password
    //         User::whereId(auth()->user()->id)->update([
    //             'password' => Hash::make($request->new_password)
    //         ]);
    //         return back()->with('status', 'Password Change Successfully');
    //     }
    // }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }



    public function UsersAll()
    {
        $users = User::where('status', 'inactive')->get();
        return view('admin.register_users.all_users', compact('users'));
    }

    public function ApprovedUser($id)
    {
        $userInfo = User::findOrFail($id);
        $userId = Str::limit($userInfo->username, 1);
        // dd($userId);

        $teacherId = Str::startsWith($userInfo->username, '03');
        $studentId = Str::startsWith($userInfo->username, '04');

        if ($teacherId == true) {
            User::findOrFail($id)->update([
                'role' => 'teacher',
                'status' => 'active',
            ]);
            $notification = array(
                'message' => 'User Approved to teacher Successfully',
                'alert_type' => 'success'
            );
            return redirect()->back()->with($notification);
        } elseif ($studentId == true) {
            User::findOrFail($id)->update([
                'status' => 'active',
                'role' => 'student'
            ]);
            $notification = array(
                'message' => 'User Approved to stundet Successfully',
                'alert_type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function DeactivedUser($id)
    {
        User::findOrFail($id)->update([
            'status' => 'inactive'
        ]);
        $notification = array(
            'message' => 'Student Deactivated Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteUser($id)
    {
        User::findOrFail($id)->delete();
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
