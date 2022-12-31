<?php

namespace App\Http\Controllers;

use App\Models\Counsellor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class CounsellorController extends Controller
{
    /**
     * Display counsellors accroding to user's answers.
     *
     * @return \Illuminate\Http\Response
     */
    public function userCounsellorIndex()
    {
        $answer_ids = session('answers');
        $counsellors = Counsellor::whereHas('counsellorAnswers', function (Builder $query) use ($answer_ids) {
            $query->whereIn('answer_id', $answer_ids);
        })->get();
        return view('users.counsellors')->with('counsellors', $counsellors);
    }

    /**
     * Display counsellor detail and appointment create form.
     *
     * @return \Illuminate\Http\Response
     */
    public function appointmentIndex($counsellor_id)
    {
        $counsellor = Counsellor::findOrFail($counsellor_id);
        return view('users.create-appointment')->with('counsellor', $counsellor);
    }

    /**
     * Display all counsellors.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminCounsellorIndex()
    {
        $counsellors = Counsellor::all();
        return view('admin.counsellors.index')->with('counsellors', $counsellors);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $counsellor = Counsellor::findOrFail($id);
        $counsellor->delete();
        return response()->json(['success' => true], JsonResponse::HTTP_OK);
    }
}
