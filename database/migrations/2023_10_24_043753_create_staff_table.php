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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('compliance_status')->nullable();
            $table->string('elev_plan_remarks')->nullable();;
            $table->string('geodetic_eng_remarks')->nullable();;
            $table->string('control_station_remarks')->nullable();;
            $table->string('loc_plan_remarks')->nullable();;
            $table->string('comp_process_report_remarks')->nullable();;
            $table->string('additional_req_remarks')->nullable();;
            $table->string('doc_compliance_result')->nullable();
            $table->string('crit_area_result')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
