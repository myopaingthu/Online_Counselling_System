<?php

namespace App\Http\Controllers;

use App\Http\Requests\WelcomeAnswerSaveRequest;

class AnswerController extends Controller
{
    /**
     * Store question answers from questions page.
     *
     * @param App\Http\Requests\WelcomeAnswerSaveRequest $request
     * @return \Illuminate\Http\Response
     */
    public function saveUserAnswers(WelcomeAnswerSaveRequest $request)
    {
        $previous_answers = $request->session()->get('answers');
        $answers = $request->answer_ids;
        $answers = array_merge($answers, $previous_answers);
        $request->session()->put('answers', $answers);
        return redirect()->route('users.counsellors');
    }
}
