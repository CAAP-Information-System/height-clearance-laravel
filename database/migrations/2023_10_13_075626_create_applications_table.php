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
            $table->string('permit_type');
            $table->string('building_type')->nullable();
            $table->enum('type_of_structure', ['Residential', 'Commercial']);
            $table->string('site_address');
            $table->integer('proposed_height');
            $table->date('submission_date');
            $table->string('receipt_num');
            $table->date('date_of_or');
            $table->integer('height_of_existing_structure');
            $table->integer('lat_deg');
            $table->integer('lat_min');
            $table->integer('lat_sec');
            $table->integer('long_deg');
            $table->integer('long_min');
            $table->integer('long_sec');
            $table->integer('orthometric_height');
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