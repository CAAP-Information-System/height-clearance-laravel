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
        Schema::create('application_queues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('application_id')->constrained('applications');
            $table->unsignedBigInteger('queue_id')->nullable();
            $table->string('adms_eval')->default('Awaiting');
            $table->string('adms_supervisor')->default('Awaiting');
            $table->string('adms_chief')->default('Awaiting');
            $table->string('ats_eval')->default('Awaiting');
            $table->string('ats_supervisor')->default('Awaiting');
            $table->string('ats_chief')->default('Awaiting');
            $table->string('ans_eval')->default('Awaiting');
            $table->string('ans_supervisor')->default('Awaiting');
            $table->string('ans_chief')->default('Awaiting');
            $table->string('odg_sign')->default('Awaiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_queues');
    }
};
