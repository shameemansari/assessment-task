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
        Schema::create('job_skills', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('job_id')->references('id')->on('posted_jobs')->cascadeOnDelete();
            $table->foreign('skill_id')->references('id')->on('skills')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_skills');
    }
};
