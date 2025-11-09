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
        Schema::create('parking_slots', function (Blueprint $table) 
        {
            $table->id();
            $table->unsignedBigInteger('block_id');
            $table->unsignedBigInteger('camera_id')->nullable();
            $table->unsignedBigInteger('parking_lamp_id')->nullable();
            $table->string('slot_number');
            // $table->enum('status', ['available', 'occupied', 'booked'])->default('available');
            $table->unsignedTinyInteger('status')->default(1);
            $table->string('vehicle_number_plate')->nullable();
            $table->string('vehicle_image')->nullable();

            $table->foreign('block_id')->references('id')->on('parking_blocks')->onDelete('cascade');
            $table->foreign('camera_id')->references('id')->on('cameras')->onDelete('cascade');
            $table->foreign('parking_lamp_id')->references('id')->on('parking_lamps')->onDelete('cascade');
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parking_slots');
    }
};
