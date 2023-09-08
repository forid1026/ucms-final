<?php

namespace App\Http\Controllers;

//namespace
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function AllVisitor()
    {
        $all_visitor = Visitor::all();
        $all_user = Visitor::all();
        return view('visitor.all_visitor', compact('all_visitor'));
    } //end method



    public function StoreVisitor(Request $request)
    {
        // dd($request->all());
        // Eloquent
        Visitor::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Visitor Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.visitor')->with($notification);
    } //end method

    public function EditVisitor($id)
    {
        $visitor_info = Visitor::findOrFail($id);
        return view('visitor.edit_visitor', compact('visitor_info'));
    }

    public function UpdateVisitor(Request $request)
    {
        $visitor_id = $request->id;

        Visitor::findOrFail($visitor_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $notification = array(
            'message' => 'Visitor Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.visitor')->with($notification);
    } //end method
    public function DeleteVisitor($id)
    {
        Visitor::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Visitor Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.visitor')->with($notification);
    }
}
