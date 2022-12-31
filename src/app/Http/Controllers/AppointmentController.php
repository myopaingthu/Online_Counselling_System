<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Mail;
use App\Http\Requests\AppointmentSaveRequest;
use App\Mail\NotifyUserMail;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Store appointment date and time with user email.
     *
     * @param App\Http\Requests\AppointmentSaveRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentSaveRequest $request)
    {
        Appointment::create($request->all());
        return redirect()->route('welcome')->withSuccess('Appoinment created successfully.');
    }

    /**
     * Display all appointments respective to loggedin counsellor.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user = Auth::guard('counsellor')->user();
        $appointments = Appointment::where('counsellor_id', $auth_user->id)
            ->get();
        return view('counsellors.appointments.index')->with('appointments', $appointments);
    }

    /**
     * Display appointment and accept decline action.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('counsellors.appointments.show')->with('appointment', $appointment);
    }

    /**
     * Change the status of appointment status.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => $request->status]);
        Mail::to($appointment->user_email)->send(new NotifyUserMail($appointment));

        return redirect()->route('appointments.index')->withSuccess('Appoinment updated successfully.');
    }
}
