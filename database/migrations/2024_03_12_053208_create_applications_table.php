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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('seeker_id');
            $table->text('headline')->nullable();
            $table->longText('cover_letter')->nullable();
            $table->foreign('seeker_id')->references('id')->on('seekers')->cascadeOnDelete();
            $table->foreign('employer_id')->references('id')->on('employers')->cascadeOnDelete();
            $table->foreign('job_id')->references('id')->on('posted_jobs')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
