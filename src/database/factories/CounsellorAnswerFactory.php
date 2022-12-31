<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Counsellor;
use Illuminate\Database\Eloquent\Factories\Factory;

class CounsellorAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'counsellor_id' => Counsellor::all()->random()->id,
            'answer_id' => Answer::all()->random()->id,
        ];
    }
}
