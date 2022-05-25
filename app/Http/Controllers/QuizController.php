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
         /*
            SELECT * FROM `playlists` WHERE `id` = $id;
            SELECT * FROM `quizzes` WHERE `playlist_id` = $id; 
        */

        // return $results; 
        $results->toJson();
        return view('quiz', [
            'quizzes' => $results,
            'id' => $play->id
        ]);
    }
}
