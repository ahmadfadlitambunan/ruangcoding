<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index($course_id, $playlist_id){
        $result = Video::where('playlist_id', $playlist_id)->get();

        $video_id = $result[0]->id;

        // return $video_id;
        // return view('videos', [
        //     'videos' => $result
        // ]);

        return redirect()->route('video', [ 'video_id' => $video_id,
                                            'course_id' => $course_id,
                                            'playlist_id' => $playlist_id
                        ]);
        // return
    }

    public function show($course_id, $playlist_id, $video_id){
        $allVid = Video::where('playlist_id', $playlist_id)->get();
        /*
            SELECT * FROM videos WHERE `playlist_id` = $playlist_id 
        */
        $mainVid = Video::find($video_id);
        /*
            SELECT * FROM videos WHERE `id` = $video_id
        */

        return view('videos', [
            'videos' => $allVid,
            'mainVid' => $mainVid
        ]);
    }

    public function ajaxVideo(Request $request)
    {   
        $url = $request->page;
        $video_id = explode("/", $url);

        $result = Video::find($video_id[4]);

        // return view('ajaxvideo', [
        //     'video' => $result
        // ]);

        return response()->json([
            'title' => $result->title,
            'html'=> "
                        <div class='main-video' id='main-video'>
                            <div class='video'>
                                <video src='" . asset('storage/' . $result->file_name)."' controls autoplay></video>
                                <h3 class='title'>". $result->title ."</h3>
                                <p>". $result->desc ."</p>
                            </div>
                                <div class='border-button text-center mb-2'>
                                <a href='/quiz/'". $result->playlist->id ."' >Mulai kuis</a>
                            </div>
                        </div>
                    ",
        ]);
    }
}
