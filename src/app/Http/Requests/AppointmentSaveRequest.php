<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'counsellor_id' => 'required',
            'appointment_method' => 'required',
            'user_email' => 'required|email',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required'
        ];
    }
}
