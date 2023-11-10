<?php

use App\Models\Lecture;
use App\Models\Plan;
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
        Schema::create('plans_lectures', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Plan::class)->nullable();
            $table->foreignIdFor(Lecture::class)->nullable();
            $table->integer('listen_order')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans_lectures');
    }
};
