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
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('school_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('regno');
            $table->string('village');
            $table->string('police');
            $table->string('dist');
            $table->string('pin');
            $table->string('state');
            $table->string('contact');
            $table->string('principle');
            $table->string('website');
            $table->string('logo');
            $table->string('password');
            $table->integer('otp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
