<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('representatives', function (Blueprint $table) {
            $table->id();
            $table->string('rep_fname');
            $table->string('rep_lname');
            $table->string('rep_company');
            $table->string('rep_office_address');
            $table->integer('rep_landline');
            $table->integer('rep_mobile');
            $table->string('rep_email');
            // $table->foreignId('application_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('representatives');
    }
};
