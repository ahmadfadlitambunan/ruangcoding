<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Plan;
use App\Models\Playlist;
use App\Models\Video;

class SearchController extends Controller
{
    public function search(Request $request)
    {   
        $courses = Course::where('name', 'like', '%' . request('search') . '%')
                ->orWhere('desc', 'like', '%' . request('search') . '%')
                ->get();

        $playlists = Playlist::where('name', 'like', '%' . request('search') . '%')
        ->orWhere('desc', 'like', '%' . request('search') . '%')
        ->get();

        $videos = Video::where('title', 'like', '%' . request('search') . '%')
        ->orWhere('desc', 'like', '%' . request('search') . '%')
        ->get();

        return view('search', [
            'courses' => $courses,
            'playlists' => $playlists,
            'videos' => $videos
        ]);
    }
}
