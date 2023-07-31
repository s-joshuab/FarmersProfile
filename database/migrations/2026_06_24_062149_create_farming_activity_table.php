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
        Schema::create('farming_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmers_id');
            $table->unsignedBigInteger('commodities_id');
            $table->string('farm_size');
            $table->string('farm_location');

           $table->foreign('farmers_id')->references('id')->on('farmers_profile')->onDelete('cascade');//kitaem jay form boss jay pagpilyan hahah
            $table->foreign('commodities_id')->references('id')->on('commodities')->onDelete('cascade');//kitaem jay form boss jay pagpilyan hahah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farming_activity');
    }
};
