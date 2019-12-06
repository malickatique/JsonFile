<?php

namespace App\Http\Controllers;

use App\CloudFiles;
use App\SiteSettings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $site = SiteSettings::first();
        return view('index')->with('site', $site);
    }
    public function geStates($id)
    {
        $states = DB::table("states")
                    ->where("country_id",$id)
                    ->pluck("state_name","id");
        return response()->json($states);
    }
    public function geCities($id)
    {
        $cities= DB::table("cities")
                    ->where("state_id",$id)
                    ->pluck("city_name","id");
        // dd( $cities );
        return response()->json($cities);
    }
}
