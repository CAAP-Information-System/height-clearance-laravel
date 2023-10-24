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
            $table->string('app_comp')->nullable();
            $table->string('fee_comp')->nullable();
            $table->string('ep_comp')->nullable();
            $table->string('ge_comp')->nullable();
            $table->string('cs_comp')->nullable();
            $table->string('lp_comp')->nullable();
            $table->string('cp_comp')->nullable();
            $table->string('ar_comp')->nullable();

            $table->string('application_info_remarks')->default('N/A');
            $table->string('elev_plan_remarks')->default('N/A');
            $table->string('geodetic_eng_remarks')->default('N/A');
            $table->string('control_station_remarks')->default('N/A');
            $table->string('loc_plan_remarks')->default('N/A');
            $table->string('comp_process_report_remarks')->default('N/A');
            $table->string('additional_req_remarks')->default('N/A');;
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
