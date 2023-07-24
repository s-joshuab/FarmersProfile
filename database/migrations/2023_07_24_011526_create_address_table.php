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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmers_id');
            $table->unsignedBigInteger('regions_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('municipality_id');
            $table->unsignedBigInteger('barangay_id');


            $table->foreign('farmers_id')->references('id')->on('farmers_profile')->onDelete('cascade');
            $table->foreign('regions_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('province')->onDelete('cascade');
            $table->foreign('municipality_id')->references('id')->on('municipality')->onDelete('cascade');
            $table->foreign('barangay_id')->references('id')->on('barangay')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
