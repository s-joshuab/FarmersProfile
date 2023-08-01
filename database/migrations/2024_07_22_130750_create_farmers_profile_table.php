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
            $table->string('s_name');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('extension_name');
            $table->string('sex');
            $table->string('name_of_spouse');
            $table->string('mothers_maiden_name');
            $table->string('contact_number');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('religion');
            $table->string('civil_status');
            $table->string('highest_formal_educational'); // Fixed column name
            $table->boolean('PWD');
            $table->boolean('4Ps_beneficiary'); // Changed data type to boolean
            $table->string('main_livelihood');
            $table->string('farm_location');
            $table->integer('farming_and_nonfarming'); // gross
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
