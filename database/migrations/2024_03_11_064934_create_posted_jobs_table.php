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
        Schema::create('posted_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('title', 150);
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('years')->default(0);
            $table->unsignedSmallInteger('months')->default(0);
            $table->unsignedBigInteger('job_type_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('employer_id')->references('id')->on('employers')->cascadeOnDelete();
            $table->foreign('location_id')->references('id')->on('locations')->cascadeOnDelete();
            $table->foreign('job_type_id')->references('id')->on('job_types')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posted_jobs');
    }
};
