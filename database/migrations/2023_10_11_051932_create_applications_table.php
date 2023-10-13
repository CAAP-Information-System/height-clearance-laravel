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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('owner_address');
            $table->string('email');
            $table->integer('landline');
            $table->integer('mobile');
            $table->string('permit_type');
            $table->string('building_type')->nullable();
            $table->string('type_of_structure');
            $table->string('site_address');
            $table->integer('proposed_height');
            $table->integer('height_of_existing_structure');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
