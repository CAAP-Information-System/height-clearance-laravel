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
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->string('permit_type');
            $table->string('building_type')->default('Not Applicable');
            $table->string('owner_fname');
            $table->string('owner_lname');
            $table->string('owner_email');
            $table->string('owner_address');
            $table->integer('owner_landline');
            $table->integer('owner_mobile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};