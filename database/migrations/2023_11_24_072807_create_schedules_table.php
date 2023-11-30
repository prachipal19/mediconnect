<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->nullable();
            $table->string('title')->nullable();
            $table->date('schedule_date')->nullable();
            $table->time('schedule_time')->nullable();
            $table->integer('number_of_patients')->nullable();
            $table->timestamps();

            $table->index('doctor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
