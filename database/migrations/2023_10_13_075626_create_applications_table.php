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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('permit_type');
            $table->string('building_type')->nullable();
            $table->string('owner_fname');
            $table->string('owner_lname');
            $table->string('owner_email');
            $table->string('owner_address');
            $table->integer('owner_landline');
            $table->integer('owner_mobile');
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

            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
