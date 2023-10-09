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
        Schema::create('representative', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('rep_fname');
            $table->string('rep_lname');
            $table->string('company');
            $table->string('office_address');
            $table->date('submission_date');
            $table->string('receipt_num');
            $table->integer('mobile');
            $table->string('email');
            $table->date('date_of_or');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('representative');
    }
};
