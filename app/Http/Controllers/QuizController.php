<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Playlist;

class QuizController extends Controller
{
    public function index(Playlist $play)
    {
        return view('quiz', [
            'playlist_id' => $play->id
        ]);
    }

    public function fetchQuiz(Request $request)
    {
        $results = Quiz::findOrFail($request->id);
        return $results;
        return response()->json([
            'numb' => $results[0]->id,
            'question' =>  $results[0]->content,
            'answer' => $results[0]->answer,
        ]);
    }
}
