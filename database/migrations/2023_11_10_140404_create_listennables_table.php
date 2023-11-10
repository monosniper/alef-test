<?php

use App\Models\Lecture;
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
        Schema::create('listennables', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Lecture::class);
            $table->integer('listennable_id');
            $table->string('listennable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listennables');
    }
};
