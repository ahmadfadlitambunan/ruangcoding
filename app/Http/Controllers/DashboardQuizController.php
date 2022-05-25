<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Playlist;
use App\Models\Course
;
use Illuminate\Http\Request;

class DashboardQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.quizzes.index', [
            'quizzes' => Quiz::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.quizzes.create', [
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
       
        $validated = $request->validate([
            'name' => 'required|max:255',
            'question' => 'required|max:255',
            'access_type' => 'required|max:255',
            'playlist_id' => 'required',
            'option1' => 'required|max:255',
            'option2' => 'required|max:255',
            'option3' => 'required|max:255',
            'option4' => 'required|max:255',
            'option' => 'required',
        ]);

        if($validated['option'] == 1){
            $validated['answer'] = $validated['option1'];
        } elseif($validated['option'] == 2) {
            $validated['answer'] = $validated['option2'];
        } elseif($validated['option'] == 3) {
            $validated['answer'] = $validated['option3'];
        } else {
            $validated['answer'] = $validated['option4'];
        }

        Quiz::create($validated);

        return redirect("/dashboard/quizzes")->with('success', "Kuis baru telah ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        return view('dashboard.quizzes.show', [
            'quiz' => $quiz
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        return view('dashboard.quizzes.edit', [
            'quiz' => $quiz,
            'courses' => Course::all()
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'question' => 'required|max:255',
            'access_type' => 'required|max:255',
            'playlist_id' => 'required',
            'option1' => 'required|max:255',
            'option2' => 'required|max:255',
            'option3' => 'required|max:255',
            'option4' => 'required|max:255',
            'option' => 'required',
        ]);

        // jawaban
        if($validated['option'] == 1){
            $validated['answer'] = $validated['option1'];
        } elseif($validated['option'] == 2) {
            $validated['answer'] = $validated['option2'];
        } elseif($validated['option'] == 3) {
            $validated['answer'] = $validated['option3'];
        } else {
            $validated['answer'] = $validated['option4'];
        }

        Quiz::where('id', $quiz->id)->update([
            'name' => $validated['name'],
            'playlist_id' => $validated['playlist_id'],
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'option1' => $validated['option1'],
            'option2' => $validated['option2'],
            'option3' => $validated['option3'],
            'option4' => $validated['option4'],
            'access_type' => $validated['access_type']
        ]);

        return redirect("/dashboard/quizzes")->with('success', "Kuis telah sukses diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        Quiz::destroy($quiz->id);
        return redirect('/dashboard/quizzes')->with('success', "Quiz Telah Berhasil Dihapus");
    }

    public function fetchPlaylist($request)
    {
        $result = Playlist::where('course_id', $request)->get();

        return response()->json($result);
    }

    /**
     * SELECT * FROM `playlists` WHERE `course_id` = $request
     */
}
