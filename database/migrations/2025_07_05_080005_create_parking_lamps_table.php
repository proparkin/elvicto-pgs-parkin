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
        Schema::create('parking_lamps', function (Blueprint $table) 
        {
            $table->id();
            $table->string('name');
            $table->string('lamp_device_id')->unique();
            $table->unsignedBigInteger('tuya_account_id')->nullable();

            $table->foreign('tuya_account_id')->references('id')->on('tuya_accounts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_lamps');
    }
};
