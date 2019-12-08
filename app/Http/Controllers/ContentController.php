<?php

namespace App\Http\Controllers;

use App\SiteContent;
use Illuminate\Http\Request;

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

}
