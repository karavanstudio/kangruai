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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('education_level', [
                'ELEMENTARY SCHOOL',
                'JUNIOR HIGH SCHOOL',
                'SENIOR HIGH SCHOOL',
                'VOCATIOANL SCHOOL',
                'UNIVERSITY',
                'WORK',
                'UNEMPLOYMENT',
            ]);
            $table->string('major')->nullable();
            $table->string('job_title')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
