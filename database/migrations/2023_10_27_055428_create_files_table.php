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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_id')->nullable();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->string('uploaded_by')->nullable();
            $table->string('elevation_plan')->nullable();
            $table->string('geodetic_eng_cert')->nullable();
            $table->string('control_station')->nullable();
            $table->string('loc_plan')->nullable();
            $table->string('comp_process_report')->nullable();
            $table->string('additional_req')->nullable();
            $table->string('fee_receipt')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
