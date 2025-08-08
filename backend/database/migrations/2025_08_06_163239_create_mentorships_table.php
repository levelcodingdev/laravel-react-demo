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
        Schema::create('mentorships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mentor_id'); // foreign to user_id
            $table->unsignedBigInteger('mentee_id'); // foreign to user_id
            $table->timestamp('started_at');
            $table->timestamp('ended_at')->nullable();
            $table->string('status'); // active, completed, terminated
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentorships');
    }
};
