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
            $table->string('application_number')->default('');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->string('permit_type');
            $table->string('building_type')->default('Not Applicable');
            $table->string('status')->default('Pending');
            $table->string('process_status')->default('Queued for ADMS evaluation');
            $table->enum('type_of_structure', ['Residential', 'Commercial'])->nullable();
            $table->string('site_address')->default('Not Applicable');
            $table->string('extension_desc')->nullable();
            $table->integer('proposed_height')->nullable();
            $table->integer('height_of_existing_structure')->nullable();
            $table->integer('lat_deg')->nullable();
            $table->integer('lat_min')->nullable();
            $table->integer('lat_sec')->nullable();
            $table->integer('long_deg')->nullable();
            $table->integer('long_min')->nullable();
            $table->integer('long_sec')->nullable();
            $table->integer('orthometric_height')->nullable();
            $table->integer('is_ForEval')->default('1');

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
