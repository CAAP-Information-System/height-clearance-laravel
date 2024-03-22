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
        Schema::create('edited_aerodromes', function (Blueprint $table) {
            $table->id();
            $table->string('site_address')->default('Not Applicable');
            $table->string('extension_desc')->default('N/A');
            $table->integer('proposed_height')->default(0);
            $table->integer('height_of_existing_structure')->default(0);
            $table->integer('lat_deg')->default(0);
            $table->integer('lat_min')->default(0);
            $table->integer('lat_sec')->default(0);
            $table->integer('long_deg')->default(0);
            $table->integer('long_min')->default(0);
            $table->integer('long_sec')->default(0);
            $table->integer('orthometric_height')->default(0);

            $table->string('evaluation_status')->default('N/A');
            $table->string('doc_compliance_result')->default('N/A');
            $table->string('crit_area_result')->default('N/A');
            $table->string('reference_aerodrome')->default('N/A');
            $table->integer('max_allowed_top_elev')->default(0);
            $table->string('height_eval_remarks')->default('N/A');
            $table->integer('proposed_top_elev')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edited_aerodromes');
    }
};
