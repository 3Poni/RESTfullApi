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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('dealer_name');
            $table->string('dealer_manager');
            $table->integer('credit_sum');
            $table->integer('credit_term');
            $table->integer('credit_rate');
            $table->text('credit_description');
            $table->string('credit_status');
            $table->unsignedBigInteger('bank_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
