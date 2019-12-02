<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use App\CloudSettings;
use App\CloudFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;
use File;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //Specify required role for this controller here in checkRole:xyz
        $this->middleware(['auth', 'checkRole:user']); 
    }
    public function user_profile()
    {       
        $id = Auth::user()->id;
        $files = CloudFiles::where('user_id', '=', $id)->get();
        $total_spent = 0;
        foreach ($files as $file) {
            if($file->status == '5')
            {
                $total_spent += $file->price;
            }
        }
        $info['total_files'] = $files->count();
        $info['total_spent'] = $total_spent;
        
        return view('user.profile')->with('info', $info);
    }
    public function index()
    {
        //
        $id = Auth::user()->id;
        $files = CloudFiles::where('user_id', '=', $id)->get();
        $total_spent = 0;
        foreach ($files as $file) {
            if($file->status == '5')
            {
                $total_spent += $file->price;
            }
        }
        $info['total_files'] = $files->count();
        $info['total_spent'] = $total_spent;
        return view('user.index')->with('files', $files)->with('info', $info);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function download_file()
    {   
        $file_id=1;      
        $id = Auth::user()->id;
        $fileInfo = CloudFiles::where('user_id', '=', $id)->where('status', '=', '5')->first();
        $cloud = CloudSettings::first();
        $download_url = Storage::disk($cloud->disk_name)->url('output/'.$fileInfo->file_name, $fileInfo->file_name);
        $file = $fileInfo;
        $file['download_url'] = $download_url;
        // dd($file);
        return view('user.download')->with('file', $file);
    }
    public function payment_verification(Request $request)
    {
        // return $request->all();
        try {
            //charge user...
            $charge = Stripe::charges()->create([
                'amount' => 31,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => 'malickateeq@gmail.com',
                'metadata' => [
                    //
                    // 'contents' => 'contentss',
                    // 'quantity' => 'quantitity'
                ],
            ]);
            
            // Success 
            $id = Auth::user()->id;
            $fileInfo = CloudFiles::where('user_id', '=', $id)->first();
            $fileInfo->status = '5';
            $fileInfo->save();
            return Redirect::route('user.download');

        } catch (CardErrorException $e) {
            dd($e);
            // return Redirect::back()->withErrors('Payment method not verified!', 'payment');
        }
    }

    // File uploading to cloud
    public function processFile(Request $request)
    {
        if($request->file_name->getClientOriginalExtension() != 'json')
        {        
            return Redirect::back()->withErrors('Please upload a json file!', 'file');
        }

        // Upload file to Cloud/input
        $file_id = $this->uploadToCloudInput($request);

        // Move file to Server/input
        $this->moveFileToServerInput($file_id);

        // Process File
        $this->mainFileProcessing($file_id);

        // Move to server/output folder
        $this->moveFileToServerOutput($file_id);

        // Upload file to Cloud
        $this->uploadToCloudOutput($file_id);

        // Generate Download link

        $fileInfo = CloudFiles::find($file_id);
        return view('user.pay-for-it')->with('fileInfo', $fileInfo);
        
    }
    public function uploadToCloudInput(Request $request)
    {
        // initialize variables
        $cloud = CloudSettings::first();
        $file = $request->file('file_name');
        
        // Set File name
        $set_file_name = 'JsonFile'.uniqid().'.'.$file->getClientOriginalExtension();
        
        // $is_file_upload = Storage::disk('dropbox')->putFileAs('path', $fileToUpload, 'fileName.jpg');
        $result = Storage::disk($cloud->disk_name)->putFileAs('input', $file, $set_file_name);
        
        if($result)
        {
            $cloudFile = new CloudFiles();
            $cloudFile->file_name = $set_file_name;
            $cloudFile->path = 'input';

            $file_size = $file->getSize();
            $cloudFile->file_size = $this->getFileSize($file_size);
            $cloudFile->price = $this->getPrice($file_size);
            $cloudFile->status = '1';
            $cloudFile->user_id = Auth::user()->id;
            $cloudFile->save();

            return $cloudFile->id;
            // return Redirect::back()->withErrors(['msg'=> 'File uploaded successfully.']);
        }
        else
        {
            return Redirect::back()->withErrors(['msg'=> 'An error occured while uploading your file!']);
        }
    }
    public function moveFileToServerInput($file_id)
    {
        $fileInfo = CloudFiles::find($file_id);
        // $fileInfo = CloudFiles::where('id', '=', $file_id)->first();
        $cloud = CloudSettings::first();

        // Get file from cloud
        $fileContents = Storage::disk($cloud->disk_name)->get('input/'.$fileInfo->file_name);

        // Move to "storage/input" folder
        $isStore = Storage::disk('local')->put('input/'.$fileInfo->file_name, $fileContents);

        // Delete from cloud
        $isDelete = Storage::disk($cloud->disk_name)->delete('input/'.$fileInfo->file_name);

        $fileInfo->status = '2';
        $fileInfo->save();
        
        return true;
    }
    public function mainFileProcessing($file_id)
    {
        $fileInfo = CloudFiles::find($file_id);
        // $fileInfo = CloudFiles::where('id', '=', $file_id)->first();
        
        // Get file from local input
        $fileContents = Storage::disk('local')->get('input/'.$fileInfo->file_name);
        // Perform file processing here

        // 

        $fileInfo->status = '3';
        $fileInfo->save();

        return true;

    }
    public function moveFiletoServerOutput($file_id)
    {
        $fileInfo = CloudFiles::find($file_id);
        // $fileInfo = CloudFiles::where('id', '=', $file_id)->first();

        // Get file server/input
        $fileContents = Storage::disk('local')->get('input/'.$fileInfo->file_name);

        // Move to "storage/output" folder
        $isStore = Storage::disk('local')->put('output/'.$fileInfo->file_name, $fileContents);

        // Delete from server/input
        $isDelete = Storage::disk('local')->delete('input/'.$fileInfo->file_name);

        $fileInfo->status = '3';
        $fileInfo->save();

        return true;
    }
    public function uploadToCloudOutput($file_id)
    {
        $fileInfo = CloudFiles::find($file_id);
        // $fileInfo = CloudFiles::where('id', '=', $file_id)->first();

        $cloud = CloudSettings::first();

        // Get file from server/output
        $fileContents = Storage::disk('local')->get('output/'.$fileInfo->file_name);

        // Move to "cloud/output" folder
        $result = Storage::disk($cloud->disk_name)->put('output/'. $fileInfo->file_name, $fileContents);

        // Delete from server/output
        $isDelete = Storage::disk('local')->delete('output/'.$fileInfo->file_name);

        $fileInfo->status = '4';
        $fileInfo->save();

        return true;
    }
    public function getDownloadLink($file_id)
    {
        $fileInfo = CloudFiles::find($file_id);
        // $fileInfo = CloudFiles::where('id', '=', $file_id)->first();

        $cloud = CloudSettings::first();

        // To link
        $headers = array(
            'Content-Type: application/json',
            );
        return redirect(Storage::disk($cloud->disk_name)->download('output/'.$fileInfo->file_name, $fileInfo->file_name,
                $headers));

        // dd('here');
    }
    public  function test()
    {        
        $fileInfo = CloudFiles::find(1);
        // $fileInfo = CloudFiles::where('id', '=', $file_id)->first();

        $cloud = CloudSettings::first();

        $download_url = Storage::disk($cloud->disk_name)->url('output/'.$fileInfo->file_name, $fileInfo->file_name);

        return $download_url;

    }
    public function getFileSize($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
    public function getPrice($bytes)
    {
        // 1 Mb = 395$
        $price = 0;
        $bytes = number_format($bytes / 1048576, 5); // 1048576 bytes == 1 MB
        $price = number_format($bytes*395, 2);
        return $price;
    }

    // User profile update
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

        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        return Redirect::back()->withErrors(['msg'=> 'Profile updated successfully!']);
    }
    // User profile update
}