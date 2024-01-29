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
        Schema::create('badge_profile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('badge_id');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('badge_id')->references('id')->on('badges')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('badge_profile');
    }
};
