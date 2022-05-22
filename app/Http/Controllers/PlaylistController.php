<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;

class PlaylistController extends Controller
{
    public function index($id)
    {
        $result = Playlist::where('course_id', $id)->get();
        /*
            SELECT * FROM playlist WHERE course_id = $id;
        */

        return view('playlists', [
            'playlists' => $result
        ]);

    }
}
