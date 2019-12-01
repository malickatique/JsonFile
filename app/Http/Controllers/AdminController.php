<?php

namespace App\Http\Controllers;

use App\CloudSettings;
use App\CloudFiles;
use Hash;
use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //Specify required role for this controller here in checkRole:xyz
        $this->middleware(['auth', 'checkRole:admin']); 
    }
    
    public function index()
    {
        //
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function profile_pic_update(Request $request)
    {
        $this->validate($request, [
	    	// 'image' => 'mimes:jpeg,bmp,png', //only allow this type extension file.
        ]);
        $admin = User::find(Auth::user()->id);

        // Upload thumbnail
        if($request->image)
        {
            if(Auth::user()->imageurl!=null)
            {
                $path = public_path().'/img/profile_pic/'.$admin->imageurl;
                if (file_exists($path))
                {
                    unlink($path);
                }
            }
            $image = $request->image;
            // Set unique name
            $name = Str::lower(
                pathinfo( $image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . uniqid() . '.' . $image->getClientOriginalExtension() );
            // Move to folder and set the uniwue name
            $image->move('img/profile_pic/', $name);
            // Store image with file name in db
            $admin->imageurl = $name;
        }
        $admin->save();
        return Redirect::back()->withErrors(['msg'=> 'Profile picture updated successfully!']);
        //  
    }
    public function profile_password_update(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6|max:90',
            'retype_password' => 'required|min:6|max:90',
        ]);

        $oldPassword = Auth::user()->password;
        $typed_old_password = $request->input('old_password');

        if(Hash::check($typed_old_password, $oldPassword)){

            //get admin id
            $id = Auth::user()->id;
            $admin = User::find($id);
            if($request->input('new_password') == $request->input('retype_password')){
                $admin->password = bcrypt($request->input('new_password'));
                $admin->save();
                return Redirect::back()->withErrors(['msg'=> 'Password changed successfully!']);
            }
            else{
                return Redirect::back()->withErrors(['msg'=> 'Password not changed!']);
            }
        }
        else{
            return Redirect::back()->withErrors(['msg'=> 'Password mismatch!']);
        }
    }
    public function profile_info_update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4|max:90',
            // 'email' => 'required|string|email|max:90|unique:users',
            // 'retype_password' => 'required|min:6|max:90',
        ]);

        $admin = User::find(Auth::user()->id);
        $admin->name = $request->name;
        // $admin->email = $request->email;
        $admin->save();
        return Redirect::back()->withErrors(['msg'=> 'Profile updated successfully!']);

    }
    public function file_mgt()
    {        
        $files = CloudFiles::where('id', '>=', 1)->get();
        // $fileInfo = CloudFiles::where('id', '=', $file_id)->first();
        $cloud = CloudSettings::first();
        
        return view('admin.file-mgt')->with('files', $files);

        dd($files);
    }
    public function user_mgt()
    {        
        $users = User::where('id', '>=', 1)->get();
        
        return view('admin.user-mgt')->with('users', $users);

        dd($users);
    }
    public function del_db_file(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return Redirect::back();
    }
    public function del_user(Request $request)
    {
        $user = User::find($request->user_id);
        $user->delete();
        return Redirect::back();
    }
}