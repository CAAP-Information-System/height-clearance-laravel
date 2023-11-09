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
            $table->enum('type_of_structure', ['Residential', 'Commercial'])->nullable();
            $table->string('site_address')->default('Not Applicable');
            $table->string('extension_desc')->default('Not Applicable');
            $table->integer('proposed_height')->nullable();
            $table->integer('height_of_existing_structure')->nullable();
            $table->integer('lat_deg')->nullable();
            $table->integer('lat_min')->nullable();
            $table->integer('lat_sec')->nullable();
            $table->integer('long_deg')->nullable();
            $table->integer('long_min')->nullable();
            $table->integer('long_sec')->nullable();
            $table->integer('orthometric_height')->nullable();

            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
