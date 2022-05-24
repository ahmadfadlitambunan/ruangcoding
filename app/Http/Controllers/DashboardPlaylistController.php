<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.playlists.create', [
            'playlists' => Playlist::all()
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
            'playlists' => Playlist::all(),
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
    }
}
