<?php

namespace App\Http\Controllers;

use App\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class ContentController extends Controller
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
        $content = SiteContent::all();
        return view('admin.site-mgt')->with('content', $content);
    }
    public function change_content(Request $request)
    {
        $content = SiteContent::find($request->id);
        
        // dd( $request->all() );

        // Update h1
        if( $request->h1 != null )
        {
            $content->h1 = $request->h1;
            $content->save();
        }
        if ( $request->h2 != null )
        {
            $content->h2 = $request->h2;
            $content->save();
        }
        if ( $request->p != null )
        {
            $content->p = $request->p;
            $content->save();
        }
        if ( $request->url != null )
        {
            $content->url = $request->url;
            $content->save();
        }
        if ( $request->img != null )
        {
            if( $content->slug == 'services' )
            {
                $content->img = $request->img;
                $content->save();
            }
            else
            {
                $this->validate($request, [
                    'img' => 'image|mimes:jpg,png,bmp,jpeg,gif,svg|max:12000',
                ]);
    
                // Update image
                if( $content->slug == 'clients' )
                {
                    $in_folder = 'img/clients/';
                }
                else{ $in_folder = 'img/'; }
    
                // Delete existing picture
                if($content->img != null)
                {
                    $path = public_path().'/'. $in_folder .$content->img;
                    if (file_exists($path))
                    {
                        unlink($path);
                    }
                }
    
                $image = $request->img;
                // Set unique name
                $name = Str::lower(
                    pathinfo( $image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . uniqid() . '.' . $image->getClientOriginalExtension() );
                // Move to folder and set the uniwue name
                $image->move($in_folder, $name);
                // Store image with file name in db
                $content->img = $name;
    
                $content->save();
            }
        }

        // Redirect back
        return Redirect::route('site.mgt');
    }
}
