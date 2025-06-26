<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_cleaner', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_job_id')->constrained('business_jobs')->onDelete('cascade');
            $table->foreignId('cleaner_id')->constrained()->onDelete('cascade');
            $table->dateTime('assigned_at')->nullable();
            $table->string('status')->default('assigned');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_cleaner');
    }
}; 