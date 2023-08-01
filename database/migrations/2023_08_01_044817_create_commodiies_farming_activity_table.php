<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommodiiesFarmingActivityTable extends Migration
{
    public function up()
    {
        Schema::create('commodiies_farming_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commodiies_id');
            $table->unsignedBigInteger('farming_activity_id');

            $table->foreign('commodiies_id')->references('id')->on('commodities')->onDelete('cascade');
            $table->foreign('farming_activity_id')->references('id')->on('farming_activity')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commodiies_farming_activity');
    }
}
