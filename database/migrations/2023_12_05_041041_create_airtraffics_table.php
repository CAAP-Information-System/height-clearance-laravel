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
        Schema::create('airtraffics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('application_id')->constrained('applications');
            $table->string('evaluation_status')->nullable();
            $table->string('doc_compliance_result')->nullable();
            $table->string('crit_area_result')->nullable();
            $table->string('reference_aerodrome')->nullable();
            $table->integer('max_allowed_top_elev')->nullable();
            $table->string('height_eval_remarks')->nullable();
            $table->integer('proposed_top_elev')->nullable();
            $table->enum('eval_result', ['Approved', 'Denied'])->nullable();
            $table->enum('supervisor_result', ['Approved', 'Denied'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airtraffics');
    }
};
