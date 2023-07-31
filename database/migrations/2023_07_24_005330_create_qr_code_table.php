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
        Schema::create('qr_code', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmers_id'); // Assuming the ID in farmers_profile is an unsigned integer
            $table->string('qr_image');
            $table->foreign('farmers_id')->references('id')->on('farmers_profile')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_code');
    }
};
