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
        Schema::create('usersimg_table', function (Blueprint $table) {
            $table->id();
            $table->string('img_desc');
            $table->int('img_size');
            $table->string('img_name');
            $table->longblob('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersimg_table');
    }
};
