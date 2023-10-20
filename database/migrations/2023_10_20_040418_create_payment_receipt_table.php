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
        Schema::create('payment_receipt', function (Blueprint $table) {
            $table->id();
            $table->string('fee_receipt')->nullable();
            $table->string('receipt_num');
            $table->unsignedBigInteger('application_id'); // Foreign key
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade'); // Define the foreign key relationship

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_receipt');
    }
};
