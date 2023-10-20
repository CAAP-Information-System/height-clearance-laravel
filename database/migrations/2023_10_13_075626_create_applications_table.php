<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->enum('type_of_structure', ['Residential', 'Commercial']);
            $table->string('site_address');
            $table->string('extension_desc')->nullable();
            $table->integer('proposed_height');
            $table->integer('height_of_existing_structure')->nullable();
            $table->date('submission_date');
            $table->integer('lat_deg');
            $table->integer('lat_min');
            $table->integer('lat_sec');
            $table->integer('long_deg');
            $table->integer('long_min');
            $table->integer('long_sec');
            $table->integer('orthometric_height');
            $table->string('elevation_plan')->nullable();
            $table->string('geodetic_eng_cert')->nullable();
            $table->string('control_station')->nullable();
            $table->string('loc_plan')->nullable();
            $table->string('comp_process_report')->nullable();
            $table->string('additional_req')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
