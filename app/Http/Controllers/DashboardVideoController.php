<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.videos.index', [
            'videos' => Video::all()
        ]);
        /*
            SELECT * FROM `videos`
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.videos.create', [
            'courses' => Course::all()
        ]);
        /*
            SELECT * FROM `courses`
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'access_type' => 'required',
            'playlist_id' => 'required',
            'thumb_img' => 'image|file|max:1024',
            'file_name' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);

        if($request->file('thumb_img')) {
            $validated['thumb_img'] = $request->file('thumb_img')->store('thumb-img');
        }
        if($request->file('file_name')) {
            $validated['file_name'] = $request->file('file_name')->store('vidio-belajar');
        }

        Video::create($validated);

        /**
         * INSERT INTO `videos` (`title`, `DESC`, `access_type`, `playlist_id`, `file_name`) VALUES (
         *                  $request->title, 
         *                  $request->desc, 
         *                  $request->access_type, 
         *                  $request->playlist_id,          
         *                  $request->file_name);
         */

        return redirect('/dashboard/videos')->with('success', "Video berhasil ditambahkan");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('dashboard.videos.show', [
            'video' => $video
        ]);

        /*
            SELECT * FROM `videos` WHERE id = $video->id
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('dashboard.videos.edit', [
            'video' => $video,
            'courses' => Course::all()
        ]); 

        /**
         * SELECT * FROM `videos` WHERE id = $video->id
         * SELECT * FROM `courses
         */

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Video::destroy($video->id);
        return redirect('/dashboard/videos')->with('success', "VideoTelah Berhasil Dihapus");
    }
}
