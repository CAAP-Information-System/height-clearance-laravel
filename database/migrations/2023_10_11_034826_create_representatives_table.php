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
        Schema::create('representatives', function (Blueprint $table) {
            $table->id();
            $table->string('rep_fname');
            $table->string('rep_lname');
            $table->string('rep_company');
            $table->string('rep_office_address');
            $table->date('rep_submission_date');
            $table->string('rep_receipt_num');
            $table->integer('rep_landline');
            $table->integer('rep_mobile');
            $table->string('rep_email');
            $table->date('rep_date_of_or');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representatives');
    }
};
