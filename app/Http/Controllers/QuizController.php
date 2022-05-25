<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Playlist;

class QuizController extends Controller
{
    public function index(Playlist $play)
    {
        
        $results = $play->quizzes;  
        // return $results; 
        $results->toJson();
        return view('quiz', [
            'quizzes' => $results,
            'id' => $play->id
        ]);
    }
}
