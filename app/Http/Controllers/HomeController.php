<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keyword;
use App\Location;
use App\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
        $videos = Video::with('keywords')
                ->get();

        foreach ($videos as $video) {
            if ($video->location_id != null) {
                $video["location"] = $video->location;
            }
        }

        $keywords = Keyword::all();
        $locations = Location::all();
        
        return view('videos/list')->with([
                    'videos' => $videos,
                    'keywords' => $keywords,
                    'locations' => $locations
        ]);
    }
}
