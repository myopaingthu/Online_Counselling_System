<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Session;

class CounsellorAuthController extends Controller
{
    /**
     * To show login page
     *
     * @return View login form
     */
    public function index()
    {
        return view('counsellors.login');
    }

    /**
     * To Login the user
     * 
     * @param App\Http\Requests\LoginRequest $request
     * @return redirect()
     */
    public function postLogin(LoginRequest $request)
    {
        Session::flush();
        $credentials = $request->only('email', 'password');
        if (Auth::guard('counsellor')->attempt($credentials)) {
            return redirect()
                ->intended(route('appointments.index'))
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials');
    }

    /**
     * To logout the user
     *
     * @return redirect()
     */
    public function logout()
    {
        Session::flush();
        Auth::guard('counsellor')->logout();
        return redirect()->route('welcome');
    }
}
