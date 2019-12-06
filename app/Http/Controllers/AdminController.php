<?php

namespace App\Http\Controllers;

use App\CloudSettings;
use App\CloudFiles;
use App\SiteSettings;
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
        $this->middleware(['auth', 'checkRole:admin', 'verified']); 
    }
    
    public function index()
    {
        //
        $files = CloudFiles::all();
        $total_earning = 0;
        foreach ($files as $file) {
            if($file->status == '5')
            {
                $total_earning += $file->price;
            }
        }

        $info['total_files'] = $files->count();
        $info['total_users'] = User::where('role', '=', 'user')->count();
        $info['total_earning'] = $total_earning;
        return view('admin.index')->with('info', $info);
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
        $id = Auth::user()->id;
        $this->validate($request, [
            'name' => 'required|min:4|max:90',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);
        $admin = User::find(Auth::user()->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
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
        $file = CloudFiles::find($request->file_id);
        $file->delete();
        return Redirect::back();
    }
    public function del_user(Request $request)
    {
        $user = User::find($request->user_id);
        if($user->role == 'admin')
        {
            
        }
        $user->delete();
        return Redirect::back();
    }
    public function cloud_index()
    {
        $cloud = CloudSettings::first();
        return view('admin.cloud-settings')->with('cloud', $cloud);
    }
    public function cloud_token(Request $request)
    {
        $cloud = CloudSettings::first();
        $cloud->token = $request->token;
        $cloud->save();

        config(['app.DROPBOX_TOKEN' => $request->token]);
        // dd( config('app.DROPBOX_TOKEN') );
        return Redirect::back();
    }
    public function cloud_folder(Request $request)
    {
        $cloud = CloudSettings::first();
        $cloud->folder = $request->folder;
        $cloud->save();
        return Redirect::back();
    }
    public function site_settings()
    {
        $site = SiteSettings::first();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_name(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_name = $request->site_name;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_logo_text(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_logo_text = $request->site_logo_text;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_header_text(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_header_text = $request->site_header_text;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_about_us(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_about_us = $request->site_about_us;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_address(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_address = $request->site_address;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_facebook(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_facebook = $request->site_facebook;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_twitter(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_twitter = $request->site_twitter;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_instagram(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_instagram = $request->site_instagram;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_linkedin(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_linkedin = $request->site_linkedin;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_email(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_email = $request->site_email;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_phone(Request $request)
    {
        $site = SiteSettings::first();
        $site->site_phone = $request->site_phone;
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
    public function site_header_pic(Request $request)
    {
        $this->validate($request, [ 
            'site_header_pic' => 'required|image|mimes:jpg,png,bmp,jpeg,gif,svg|max:12000',
        ]);

        $site = SiteSettings::first();

        // Upload thumbnail
        if($request->site_header_pic)
        {
            if($site->site_header_pic!=null)
            {
                $path = public_path().'/'.'img/'.$site->site_header_pic;
                if (file_exists($path))
                {
                    unlink($path);
                }
            }
            $image = $request->site_header_pic;
            // Set unique name
            $name = Str::lower(
                pathinfo( $image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . uniqid() . '.' . $image->getClientOriginalExtension() );
            // Move to folder and set the uniwue name
            $image->move('img/', $name);
            // Store image with file name in db
            $site->site_header_pic = $name;
        }
        
        $site->save();
        return view('admin.site-settings')->with('site', $site);
    }
}