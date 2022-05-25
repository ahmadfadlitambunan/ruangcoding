<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardPlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.playlists.index', [
            'playlists' => Playlist::all()
        ]);
        //SELECT * FROM playlists;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.playlists.create', [
            'playlists' => Playlist::all(),
            'courses' => Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required',
            'course_id' => 'max:5'
        ]);

        $validatedData['desc'] = strip_tags($request->desc);
        Playlist::create($validatedData);
        /*
            INSERT INTO `playlists` (`name`, `DESC`, `course_id`, `updated_at`, `created_at`) VALUES (
                $validatedData->name,
                $validatedData->desc,
                $validatedData->course_id,
                now(),
                now());
        */

        return redirect('/dashboard/playlists')->with('success', "Playlist Baru Telah Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        return view('dashboard.playlists.show', [
            'playlist' => $playlist
        ]);
        // SELECT * FROM playlist WHERE id = $playlist->id
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        return view('dashboard.playlists.edit', [
            'playlist' => $playlist,
            'courses' => Course::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required',
            'course_id' => 'max:5'
        ]);

        $validatedData['desc'] = strip_tags($request->desc);
        
        Playlist::where('id', $playlist->id)
            ->update($validatedData);

         /*
                UPDATE `playlists` SET 
                    `name` = $validatedData-> name
                    `DESC` = $validatedData->desc
                    `course_id` = $validatedData->course_id 
                    `playlists`.`updated_at` = now()
                 WHERE `id` = $playlist_id;
         */

        return redirect('/dashboard/playlists')->with('success', "Playlist Telah Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        Playlist::destroy($playlist->id);
        return redirect('/dashboard/playlists')->with('success', "Kelas Telah Berhasil Dihapus");

        // DELETE FROM `playlists` WHERE `id` = $playlist->id
    }
}
