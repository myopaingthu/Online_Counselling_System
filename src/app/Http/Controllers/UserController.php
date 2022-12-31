<?php

namespace App\Http\Controllers;

use App\Http\Requests\WelcomeAnswerSaveRequest;
use App\Models\Question;

class UserController extends Controller
{
    /**
     * Display welcome page with a few starting questions.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcomeIndex()
    {
        $default_questions = Question::default()
            ->with('answers')
            ->get();
        return view('users.welcome')->with('questions', $default_questions);
    }

    /**
     * Store default question answers from welcome page.
     *
     * @param App\Http\Requests\WelcomeAnswerSaveRequest $request
     * @return \Illuminate\Http\Response
     */
    public function welcomePost(WelcomeAnswerSaveRequest $request)
    {
        $answers = $request->answer_ids;
        $request->session()->put('answers', $answers);
        return redirect()->route('users.categories');
    }
}
