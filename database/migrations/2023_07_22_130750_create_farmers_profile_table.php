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
            $table->unsignedBigInteger('qrcode_id')->nullable();
            $table->string('reference_control_no')->nullable();
            $table->string('status');
            $table->string('s_name');
            $table->string('f_name');
            $table->string('m_name');
            $table->string('extension_name');
            $table->string('sex');
            $table->string('name_of_spouse')->nullable();
            $table->string('mothers_maiden_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('religion')->nullable();
            $table->string('civil_status');
            $table->unsignedBigInteger('high_formal_educational_id')->nullable();
            $table->boolean('PWD')->nullable();
            $table->unsignedBigInteger('4Ps_beneficiary_id')->nullable();
            $table->string('main_livelihood')->nullable();
            $table->unsignedBigInteger('farming_activity_id')->nullable();
            $table->string('farm_location')->nullable();
            $table->unsignedBigInteger('Machineries_id')->nullable();
            $table->unsignedBigInteger('gross_annual_income_last_year_id')->nullable();
            $table->integer('parcels')->nullable();
            $table->boolean('ARB')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('qrcode_id')->references('id')->on('qrcodes')->onDelete('set null');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('high_formal_educational_id')->references('id')->on('educationals')->onDelete('cascade');
            $table->foreign('farming_activity_id')->references('id')->on('farming_activities')->onDelete('cascade');
            $table->foreign('Machineries_id')->references('id')->on('machineries')->onDelete('cascade');
            $table->foreign('gross_annual_income_last_year_id')->references('id')->on('income_last_years')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('farmers_profile');
    }
}
