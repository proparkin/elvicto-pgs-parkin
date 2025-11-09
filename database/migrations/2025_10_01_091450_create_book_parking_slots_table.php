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
        Schema::create('book_parking_slots', function (Blueprint $table) 
        {
            Schema::create('bookings', function (Blueprint $table) 
            {
                $table->id();
                $table->string("booking_number");
                $table->string("customer_vehicle_registration");
                $table->unsignedBigInteger("parking_lot_id");
                $table->unsignedBigInteger("customer_vehicle_type_id");
                $table->timestamp("booking_start")->nullable();
                $table->timestamp("booking_end")->nullable();
                $table->string("booking_status");
                $table->timestamps(); // created_at, updated_at
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_parking_slots');
    }
};
