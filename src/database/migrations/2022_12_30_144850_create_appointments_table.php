<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('counsellor_id');
            $table->foreign('counsellor_id')->references('id')->on('counsellors')->constrained()->onDelete('cascade');
            $table->tinyInteger('appointment_method')->comment('1 for online and 0 for offline.');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('user_email');
            $table->tinyInteger('status')->default(0)->comment('0 for pending and 1 for accept and 2 for decline.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
