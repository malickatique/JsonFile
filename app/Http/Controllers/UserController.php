<?php

namespace App\Http\Controllers;
use Hash;
use App\User;
use App\CloudSettings;
use App\SiteSettings;
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
        $this->middleware(['auth', 'checkRole:user', 'verified']); 
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
    public function user_payment_index()
    {
        // dd( session()->all() );
        if( session('file_status') == '4' )
        {   
            $fileInfo['file_name'] = session('file_name');
            $fileInfo['file_size'] = session('file_size');
            $fileInfo['file_price'] = session('file_price');
            return view('user.pay-for-it')->with('fileInfo', $fileInfo);
        }
        else
        {
            return redirect(route('user.convert'));
        }
    }
    public function download_file()
    {   
        // dd( session()->all() );
        if( session('file_status') != '5' )
        {
            return redirect(route('user.convert'));
        }
        // else if( session('file_status') == '4' )
        // {
        //     return redirect(route('user.payment'));
        // }

        $file_id= session('file_id');
        $id = Auth::user()->id;

        $fileInfo = CloudFiles::where('id', '=', $file_id)->first();
        $cloud = CloudSettings::first();

        $download_url = Storage::disk($cloud->disk_name)->url('output/'.session('file_name'), $fileInfo->file_name);
        $file = $fileInfo;
        $file['download_url'] = $download_url;
        // dd($file);
        return view('user.download')->with('file', $file);
    }
    public function payment_verification(Request $request)
    {
        if( (int)session('file_status') > 0 )
        {
            try {
                //charge user...
                $charge = Stripe::charges()->create([
                    'amount' => (int)session('file_status'),
                    'currency' => 'USD',    // UK Dollar GBP
                    'source' => $request->stripeToken,
                    'description' => 'Order',
                    'receipt_email' => Auth::user()->email,
                    'metadata' => [
                        //
                        // 'contents' => 'contentss',
                        // 'quantity' => 'quantitity'
                    ],
                ]);
                
                // Success 
                $id = Auth::user()->id;
                $fileInfo = new CloudFiles;
                $fileInfo->user_id = $id;
                $fileInfo->file_name = session('file_name');
                $fileInfo->status = '5';
                $fileInfo->file_size = session('file_size');
                $fileInfo->price = session('file_price');
                $fileInfo->save();
                session([
                    'comment' => 'payment compelted',
                    'file_id' => $fileInfo->id,
                ]);

                session([
                    'file_status' => '5',
                    'comment' => 'user has been charged!!'
                ]);
                return Redirect::route('user.download');
    
            } catch (CardErrorException $e) {
                // dd($e);
                return Redirect::back()->withErrors( $e->getMessage(), 'payment' );
            }
        }
        else
        {
            return Redirect::back()->withErrors('An error occuured in the network, please try again!', 'payment');
        }

    }

    // File uploading to cloud
    public function setFileSession(Request $request)
    {
        // dd(session()->all());
        $file = $request->file('file_name');
        
        // Set File name
        $set_file_name = 'JsonFile'.uniqid().'.'.$file->getClientOriginalExtension();
        $file_size = $file->getSize();

        // Set session
        // $request->session()->put('key', 'val')
        session([
            'file_name' => $set_file_name,
            'file_location' => 'cloud input',
            'file_size' => $this->getFileSize($file_size),  // size in KB, MB etc
            'file_price' => $this->getPrice($file_size),
            'file_status' => '0',
            'user_id' => Auth::user()->id,
            'comment' => 'setting session',
        ]);
    }
    public function processFile(Request $request)
    {

        if($request->file_name->getClientOriginalExtension() != 'json')
        {        
            return Redirect::back()->withErrors('Please upload a json file!', 'file');
        }
        // Store file info in session
        $this->setFileSession($request);

        // Upload file to Cloud/input
        $this->uploadToCloudInput($request);
        
        // Move file to Server/input
        $this->moveFileToServerInput();

        // Process File
        $this->mainFileProcessing();

        // Move to server/output folder
        $this->moveFileToServerOutput();

        // Upload file to Cloud
        $this->uploadToCloudOutput();

        // Generate Download link

        return Redirect::route('user.payment');
        
    }
    public function uploadToCloudInput(Request $request)
    {
        // initialize variables
        $cloud = CloudSettings::first();
        $file = $request->file('file_name');

        // Set File name
        $set_file_name = session('file_name');
    
        // $is_file_upload = Storage::disk('dropbox')->putFileAs('path', $fileToUpload, 'fileName.jpg');
        $result = Storage::disk($cloud->disk_name)->putFileAs('input', $file, $set_file_name);
        if($result)
        {
            session([
                'file_status' => '1',
                'comment' => 'file uploaded to cloud..',
            ]);
        }
        
    }
    public function moveFileToServerInput()
    {
        $cloud = CloudSettings::first();

        // Get file from cloud
        $fileContents = Storage::disk($cloud->disk_name)->get('input/'.session('file_name'));

        // Move to "storage/input" folder
        $isStore = Storage::disk('local')->put('input/'.session('file_name'), $fileContents);

        // Delete from cloud
        $isDelete = Storage::disk($cloud->disk_name)->delete('input/'.session('file_name'));

        session([
            'file_status' => '2',
            'comment' => 'fie moved to server input folder'
        ]);
        
    }
    public function mainFileProcessing()
    {
        
        
        // Get file from local input
        $fileContents = Storage::disk('local')->get('input/'.session('file_name'));
        // Perform file processing here

        // 
        session([
            // 'file_size' => '', // Update file size after processing here
            'file_status' => '3',
            'comment' => 'file_processed in server'
        ]);

    }
    public function moveFiletoServerOutput()
    {
        // Get file server/input
        $fileContents = Storage::disk('local')->get('input/'.session('file_name'));

        // Move to "storage/output" folder
        $isStore = Storage::disk('local')->put('output/'.session('file_name'), $fileContents);

        // Delete from server/input
        $isDelete = Storage::disk('local')->delete('input/'.session('file_name'));

        session([
            'file_status' => '4',
            'comment' => 'file moved to server output folder'
        ]);
    }
    public function uploadToCloudOutput()
    {

        $cloud = CloudSettings::first();

        // Get file from server/output
        $fileContents = Storage::disk('local')->get('output/'.session('file_name'));

        // Move to "cloud/output" folder
        $result = Storage::disk($cloud->disk_name)->put('output/'. session('file_name'), $fileContents);

        // Delete from server/output
        $isDelete = Storage::disk('local')->delete('output/'.session('file_name'));

        session([
            'comment' => 'file moved to cloud output folder',
        ]);
    }
    public function getDownloadLink($file_id)
    {
        $fileInfo = CloudFiles::find( session('file_id') );
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
        $site = SiteSettings::first();
        $price_per_mb = $site->price_per_mb;
        $price = 0;
        $bytes = number_format($bytes / 1048576, 5); // 1048576 bytes == 1 MB
        $price = number_format($bytes* $price_per_mb, 2);
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