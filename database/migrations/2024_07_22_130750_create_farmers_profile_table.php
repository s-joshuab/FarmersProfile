<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersProfileTable extends Migration
{
    public function up()
    {
        Schema::create('farmers_profile', function (Blueprint $table) {
            $table->id();
            $table->integer('farmers_number');
            $table->string('reference_control_no')->nullable();
            $table->string('status');
            $table->string('sname');
            $table->string('fname');
            $table->string('mname');
            $table->string('ename');
            $table->string('sex');
            $table->string('spouse');
            $table->string('maiden'); //mothers
            $table->string('number');
            $table->date('dob'); //date of birth
            $table->string('pob'); //place of birth
            $table->string('religion');
            $table->string('civil_status');
            $table->string('highest_formal_educational'); // Fixed column name
            $table->boolean('PWD');
            $table->boolean('benefits'); // Changed data type to boolean
            $table->string('main_livelihood');
            $table->integer('gross'); // gross
            $table->integer('parcels');
            $table->boolean('ARB');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('municipality_id');
            $table->unsignedBigInteger('barangay_id');
            $table->string('street');
            $table->string('house');

            $table->foreign('province_id')->references('id')->on('province')->onDelete('cascade');
            $table->foreign('municipality_id')->references('id')->on('municipality')->onDelete('cascade');
            $table->foreign('barangay_id')->references('id')->on('barangay')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('farmers_profile');
    }
}
