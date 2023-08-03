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
        Schema::create('farmersprofile', function (Blueprint $table) {
            $table->id();
            $table->string('farm_number');
            $table->string('ref_no');
            $table->string('status');
            $table->string('sname');
            $table->string('fname');
            $table->string('mname');
            $table->string('ename');
            $table->string('sex');
            $table->string('spouse')->nullable();
            $table->string('mother');
            $table->unsignedBigInteger('number')->unique(); // Assuming 'number' is an ID column.
            $table->unsignedBigInteger('regions_id');
            $table->unsignedBigInteger('provinces_id');
            $table->unsignedBigInteger('municipalities_id');
            $table->unsignedBigInteger('barangays_id');
            $table->string('purok');
            $table->string('house')->nullable();
            $table->string('dob');
            $table->string('pob');
            $table->string('religion');
            $table->string('cstatus');
            $table->string('education');
            $table->string('pwd');
            $table->string('benefits');
            $table->string('livelihood');
            $table->unsignedBigInteger('crops_id')->nullable(); // Assuming 'crops_id' is a foreign key.
            $table->unsignedBigInteger('machinery_id')->nullable(); // Assuming 'machinery_id' is a foreign key.
            $table->string('gross'); // Adjust precision and scale according to your requirements.
            $table->integer('parcels'); // Assuming 'parcels' is an integer.
            $table->string('arb');


            // Define foreign key constraints
            $table->foreign('regions_id')->references('id')->on('regions');
            $table->foreign('provinces_id')->references('id')->on('provinces');
            $table->foreign('municipalities_id')->references('id')->on('municipalities');
            $table->foreign('barangays_id')->references('id')->on('barangays');
            $table->foreign('crops_id')->references('id')->on('crops');
            $table->foreign('machinery_id')->references('id')->on('machinery');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmersprofile');
    }
};
