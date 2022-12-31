<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // use seeder to insert data correctly and easily test the system. this can be done with csv seeder later. 

        \App\Models\Admin::factory(1)->create();
        \App\Models\Counsellor::factory(3)->create();
        
        $this->call(CategorySeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AnswerSeeder::class);
        $this->call(CounsellorAnswerSeeder::class);
    }
}
