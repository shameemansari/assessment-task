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
            $table->string('title');
            $table->longText('description')->nullable();
            $table->unsignedSmallInteger('years')->default(0);
            $table->unsignedSmallInteger('months')->default(0);
            $table->unsignedSmallInteger('job_type_id')->nullable();
            $table->unsignedSmallInteger('location_id')->nullable();
            $table->foreign('employer_id')->references('id')->on('employers')->cascadeOnDelete();
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
