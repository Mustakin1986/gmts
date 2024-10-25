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
        Schema::create('bundles', function (Blueprint $table) {
            $table->id();
            $table->string('buyer_name');
            $table->string('Po_No');
            $table->string('Style_modle_No');
            $table->integer('cutting_No');
            $table->integer('marker_length');
            $table->integer('marker_Width');
            $table->integer('marker_pcs');
            $table->integer('lot_No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bundles');
    }
};
