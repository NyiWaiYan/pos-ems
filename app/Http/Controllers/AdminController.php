<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminDestroy(Request $request){
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification=array(
            'message'=>'Logout Successfully',
            'alert-type'=>'info'
        );
        
        return redirect('/logout')->with($notification);
    }

    public function AdminLogoutPage(){
        return view('admin.admin_logout');
    }

    public function AdminProfile(){
        $id=Auth::user()->id;
        $adminData=User::find($id);
        $username=str_replace(' ', '', $adminData->name);
        return view('admin.admin_profile_view',compact('adminData','username'));
    }

    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
           $file = $request->file('photo');
           @unlink(public_path('upload/admin_image/'.$data->photo));
           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_image'),$filename);
           $data['photo'] = $filename;
        }
            
        $data->save();
        $notification=array(
            'message'=>'Admin Profile Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }

    public function changepassword(){
        return view('admin.change_password');
    }

    public function updatePassword(Request $request){
        //validation
        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required|confirmed',
        ]);
        //Matching the old password
        if(!Hash::check($request->old_password,Auth::user()->password)){
            $notification=array(
                'message'=>'Old password does not match',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification=array(
            'message'=>'Password changed successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
}
