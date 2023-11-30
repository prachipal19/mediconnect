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
        Schema::create('patients', function (Blueprint $table) {
           
                $table->increments('id');
                $table->string('email')->nullable();
                $table->string('name')->nullable();
                $table->string('password')->nullable();
                $table->string('address')->nullable();
                $table->string('nic')->nullable();
                $table->date('date_of_birth')->nullable();
                $table->string('telephone')->nullable();
                $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
