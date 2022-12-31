<?php

namespace App\Http\Controllers;

use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display questions choose page with chosen category.
     *
     * @return \Illuminate\Http\Response
     */
    public function userQuestionIndex($category_id)
    {
        $questions = Question::where('category_id', $category_id)
            ->get();
        return view('users.questions')->with('questions', $questions);
    }
}
