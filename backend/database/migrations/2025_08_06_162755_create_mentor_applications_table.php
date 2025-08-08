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
        Schema::create('mentor_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mentor_id'); // foreign to user_id
            $table->unsignedBigInteger('mentee_id'); // foreign to user_id
            $table->text('message');
            $table->string('status'); // pending, accepted, rejected, withdrawn
            $table->timestamp('responded_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentor_applications');
    }
};
